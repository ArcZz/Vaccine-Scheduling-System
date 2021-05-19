<?php
include 'db.php';

// crontab -e
// 0 12 * * * lynx -dump http://localhost/Vaccine-Scheduling-System/api/matchApp.php

//calculate Distance
function distance($lat1, $lon1, $lat2, $lon2) {
  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
    return 0;
  }
  else {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;

    return $miles;
  }
}

// check and update any status before assign matching
$status = "vaccinated";
$db->query_prepared('UPDATE AppOffer SET status = ? WHERE status = "accepted" AND DATE_ADD(deadlinedt, INTERVAL 2 DAY) < NOW();', [$status]);

$status = "expired";
$db->query_prepared('UPDATE AppOffer SET status = ? WHERE status = "pending" AND deadlinedt < NOW();', [$status]);


// get unassigned appointments
$unassignedApp = $db->get_results('SELECT A.aid, A.pr_id, appdt, DATE_SUB(appdt, INTERVAL 2 DAY) AS deadlinedt, pr_address, (number_available - IFNULL(takenCount,0)) AS netCount
                      FROM AvailableApp A NATURAL JOIN Provider P
                      LEFT JOIN (SELECT aid, SUM(IF(status = "pending" or status = "accepted" or status = "vaccinated", 1, 0)) AS takenCount
	                               FROM AppOffer
	                               GROUP BY aid) T1 ON A.aid = T1.aid
                      WHERE appdt > NOW()');
// $unassignedApp = $db->queryResult();
$appArray = array();
foreach($unassignedApp as $app){
  for($i=1; $i<= $app->netCount; $i++){
    array_push($appArray, $app);
  }

}
$appTotalCount = count($appArray);
echo 'total unassigned appointment: '.$appTotalCount. "<br>";
echo '<pre>'; print_r($appArray); echo '</pre>';

//get unassigned patients
$unassignedPatient = $db->get_results('SELECT P.pa_id, p_number, max_travel_distance, pa_address, IFNULL(day_of_week, -1) AS day_of_week, IFNULL(starttime, "00:00:00") AS starttime, IFNULL(endtime, "00:00:00") AS endtime
                                        FROM Patient P LEFT JOIN PatientPreferredSlot PS ON P.pa_id = PS.pa_id
                                        LEFT JOIN Slot S on PS.sid = S.sid
                                        WHERE P.pa_id NOT IN (SELECT pa_id
                                        					FROM AppOffer
                                        					WHERE status = "accepted" or status = "pending" or status = "vaccinated")');
$paArrayGroup1 = array();
$paArrayGroup2 = array();
$paArrayGroup3 = array();
foreach($unassignedPatient as $pa){
  if($pa->p_number == 1){
    array_push($paArrayGroup1, $pa);
  }elseif ($pa->p_number == 2) {
    array_push($paArrayGroup2, $pa);
  }else{
    array_push($paArrayGroup3, $pa);
  }
}

echo '<pre>'; print_r($paArrayGroup1); echo '</pre>';


function createMatrix($paArrayGroup, $appArray)
{
  $matrix = array();
  for($i = 0; $i < count($paArrayGroup); $i++){
    $valArray = array();
    $pa_lat = array_reverse(explode(',', $paArrayGroup[$i]->pa_address))[1];
    $pa_lon = array_reverse(explode(',', $paArrayGroup[$i]->pa_address))[0];
    for($j=0; $j < count($appArray); $j++){
      $pr_lat = array_reverse(explode(',', $appArray[$j]->pr_address))[1];
      $pr_lon = array_reverse(explode(',', $appArray[$j]->pr_address))[0];
      $distance = distance($pa_lat, $pa_lon, $pr_lat , $pr_lon);
      // echo "pa_lat: ".$pa_lat.'<br/>';
      // echo "pa_lon: ".$pa_lon.'<br/>';
      // echo "pr_lat: ".$pr_lat.'<br/>';
      // echo "pr_lon: ".$pr_lon.'<br/>';
      echo '<br/>';
      echo "paid: ".$paArrayGroup[$i]->pa_id.'<br/>';
       echo "distance: ".$distance.'<br/>';
       echo "max distance: ".$paArrayGroup[$i]->max_travel_distance.'<br/>';
       $weeknum = date("w", strtotime($appArray[$j]->appdt));
       $time = date("H:i:s", strtotime($appArray[$j]->appdt));
       echo "week number: ".$weeknum."<br/>";
       echo "preferred week number: ".$paArrayGroup[$i]->day_of_week."<br/>";
       echo "app time: ".$time."<br/>";
       echo "start time: ".$paArrayGroup[$i]->starttime."<br/>";
       echo "end time: ".$paArrayGroup[$i]->endtime."<br/>";


      if($distance <= $paArrayGroup[$i]->max_travel_distance && $weeknum == $paArrayGroup[$i]->day_of_week && $time <= $paArrayGroup[$i]->endtime &&  $time >= $paArrayGroup[$i]->starttime){
        array_push($valArray, 1);
      }else{
        array_push($valArray, 0);
      }
    }

    array_push($matrix, $valArray);
  }
  return $matrix;
}

$matrix1 = createMatrix($paArrayGroup1, $appArray);
// test print matrix
 echo '<pre>'; print_r($matrix1); echo '</pre>';


function bpm($bpGraph, $u, &$seen, &$matchR, $N)
{
	for ($v = 0; $v < $N; $v++)
	{
		if ($bpGraph[$u][$v] && !$seen[$v])
		{
			$seen[$v] = true;
			if ($matchR[$v] < 0 || bpm($bpGraph, $matchR[$v],
									$seen, $matchR, $N))
			{
				$matchR[$v] = $u;
				return true;
			}
		}
	}
	return false;
}

function maxBPM($bpGraph, $N, $M)
{
	$matchR = array_fill(0, $N, -1);

	$result = 0;
	for ($u = 0; $u < $M; $u++)
	{
		$seen=array_fill(0, $N, false);
		if (bpm($bpGraph, $u, $seen, $matchR, $N))
			$result++;
	}
  // echo '<pre>'; print_r($matchR); echo '</pre>';
	return $matchR;
}

// get matchings for Group 1.........................................
$matching1 = maxBPM($matrix1, count($appArray), count($paArrayGroup1));
echo '<pre>'; print_r($matching1); echo '</pre>';


// add group 1 matchings to resultPairs
// add matched appointment to array takenApp
$resultPairs = array();  // array of [aid, pa_id, appdt]s
$takenPatient = array();
$takenApp = array();
for ($i=0; $i < count($matching1); $i++) {
  // echo "val: ".$matching1[$i].'<br/>';
  if($matching1[$i] != -1 && !in_array($paArrayGroup1[$matching1[$i]]->pa_id, $takenPatient)){
    array_push($takenPatient, $paArrayGroup1[$matching1[$i]]->pa_id);
    array_push($resultPairs, array($appArray[$i]->aid, $paArrayGroup1[$matching1[$i]]->pa_id, $appArray[$i]->deadlinedt));
    array_push($takenApp, $i);
  }
}
// echo '<pre>'; print_r($resultPairs); echo '</pre>';
// echo '<pre>'; print_r($takenApp); echo '</pre>';
// echo 'taken appointment count: '.count($takenApp). "<br>";



// get matchings for Group 2..........................................
// filter out group1 matched appointment
$appArray2 = array();
for ($i=0; $i < count($appArray); $i++) {
  if(!in_array($i, $takenApp)){
    array_push($appArray2, $appArray[$i]);
  }
}
// echo 'total unassigned appointment after group1 done: '.count($appArray2). "<br>";
// echo '<pre>'; print_r($appArray2); echo '</pre>';

// get matchings for Group 2
$matrix2 = createMatrix($paArrayGroup2, $appArray2);
$matching2 = maxBPM($matrix2, count($appArray2), count($paArrayGroup2));
echo '<pre>'; print_r($matching2); echo '</pre>';

// add group 2 matchings to resultPairs
// add matched appointment to array takenApp2
$takenApp2 = array();
for ($i=0; $i < count($matching2); $i++) {
  // echo "val: ".$matching2[$i].'<br/>';
  if($matching2[$i] != -1 && !in_array($paArrayGroup2[$matching2[$i]]->pa_id, $takenPatient)){
    array_push($takenPatient, $paArrayGroup2[$matching2[$i]]->pa_id);
    array_push($resultPairs, array($appArray2[$i]->aid, $paArrayGroup2[$matching2[$i]]->pa_id, $appArray[$i]->deadlinedt));
    array_push($takenApp2, $i);
  }
}
// echo '<pre>'; print_r($resultPairs); echo '</pre>';
// echo '<pre>'; print_r($takenApp2); echo '</pre>';
// echo 'taken appointment count: '.count($takenApp2). "<br>";



// get matchings for Group 3..........................................
// filter out group2 matched appointment
$appArray3 = array();
for ($i=0; $i < count($appArray2); $i++) {
  if(!in_array($i, $takenApp2)){
    array_push($appArray3, $appArray2[$i]);
  }
}
// echo 'total unassigned appointment after group1 done: '.count($appArray3). "<br>";
// echo '<pre>'; print_r($appArray3); echo '</pre>';

// get matchings for Group 3
$matrix3 = createMatrix($paArrayGroup3, $appArray3);
$matching3 = maxBPM($matrix3, count($appArray3), count($paArrayGroup3));
 echo '<pre>'; print_r($matching3); echo '</pre>';

// add group 3 matchings to resultPairs
for ($i=0; $i < count($matching3); $i++) {
  // echo "val: ".$matching3[$i].'<br/>';
  if($matching3[$i] != -1 && !in_array($paArrayGroup3[$matching3[$i]]->pa_id, $takenPatient)){
    array_push($resultPairs, array($appArray3[$i]->aid, $paArrayGroup3[$matching3[$i]]->pa_id, $appArray[$i]->deadlinedt));
  }
}
 echo '<pre>'; print_r($resultPairs); echo '</pre>';


//add new matchings: update AppOffer table
foreach ($resultPairs as $pair) {
  $aid = $pair[0];
  $pa_id = $pair[1];
  $deadline = $pair[2];
  date_default_timezone_set('US/Eastern');
  $now = date('Y-m-d H:i:s');
  $status = "pending";
  echo "aid: ".$aid.'<br/>';
  echo "pa_id: ".$pa_id.'<br/>';
  echo "deadline: ".$deadline.'<br/>';
  echo "now: ".$now.'<br/>';

  $db->flush();
  $db->query_prepared('SELECT pa_id, aid FROM AppOffer WHERE pa_id = ? AND aid = ?',
                      [$pa_id, $aid]);
  $result = $db->queryResult();
  if(!isset($result[0]->pa_id)){
    // if not exist in DB, then add to DB
    $db->query_prepared('INSERT INTO AppOffer(pa_id, aid, offerdt, deadlinedt,status)
                        VALUES(?,?,?,?,?)',
                        [$pa_id, $aid, $now, $deadline, $status]);
  }else{
    $db->query_prepared('Update AppOffer SET status= "pending", replydt = NULL, offerdt =?, deadlinedt =? WHERE pa_id = ? AND aid = ?',
                                                    [$now, $deadline, $pa_id, $aid]);
  }

}



// ?>
