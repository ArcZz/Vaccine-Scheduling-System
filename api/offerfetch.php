<?php

include 'profilefetch.php';
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

$paid = $patientData->pa_id;
$paid = 3;
// echo $paid;
$havePending = 0;
$haveAccept = 0;
$haveVaccinated = 0;
flush();
$db->query_prepared('SELECT * FROM AppOffer NATURAL JOIN Patient WHERE pa_id = ? AND status = "pending"', [$paid]);
$pendingshow = $db->queryResult();
$db->flush();
$db->query_prepared('SELECT * FROM AppOffer NATURAL JOIN Patient WHERE pa_id = ? AND status = "accepted"', [$paid]);
$acceptshow = $db->queryResult();
$db->flush();
$db->query_prepared('SELECT * FROM AppOffer WHERE pa_id = ? AND status = "vaccinated"', [$paid]);
$vaccinatedshow = $db->queryResult();

// var_dump($dbshow[0]->pa_id);

if (!is_null($pendingshow[0]->aid)) {
    $havePending = 1;
    // echo "yes have pending";

}
if (!is_null($acceptshow[0]->aid)) {
    //echo "failed"; t
    $haveAccept = 1;
    // echo "yes have accept";
}
if (!is_null($vaccinatedshow[0]->aid)) {
    //echo "failed"; t
    $haveVaccinated = 1;
    // echo "yes have vaccinated";
}

if($havePending == 1){
  $patientInfo = $pendingshow[0];
  // echo '<pre>'; print_r($patientInfo); echo '</pre>';
  $pa_lat = array_reverse(explode(',', $patientInfo->pa_address))[1];
  $pa_lon = array_reverse(explode(',', $patientInfo->pa_address))[0];
  // echo $pa_lat;
  // echo $pa_lon;

  $db->query_prepared('SELECT A.pr_id, pr_name, pr_phone, pr_address, pr_type, appdt
                        FROM AvailableApp A NATURAL JOIN Provider P
                        WHERE aid = ?;', [$patientInfo->pa_id]);
  $vaccinatedshow = $db->queryResult();
  $providerInfo = $vaccinatedshow[0];
  // echo '<pre>'; print_r($providerInfo); echo '</pre>';
  $pr_lat = array_reverse(explode(',', $providerInfo->pr_address))[1];
  $pr_lon = array_reverse(explode(',', $providerInfo->pr_address))[0];
  // echo $pr_lat;
  // echo $pr_lon;
  $distance = distance($pa_lat, $pa_lon, $pr_lat , $pr_lon);
  // echo $distance;


}elseif ($haveAccept == 1) {
  $patientInfo = $acceptshow[0];
  // echo '<pre>'; print_r($patientInfo); echo '</pre>';
  $pa_lat = array_reverse(explode(',', $patientInfo->pa_address))[1];
  $pa_lon = array_reverse(explode(',', $patientInfo->pa_address))[0];
  // echo $pa_lat;
  // echo $pa_lon;

  $db->query_prepared('SELECT A.pr_id, pr_name, pr_phone, pr_address, pr_type, appdt
                        FROM AvailableApp A NATURAL JOIN Provider P
                        WHERE aid = ?;', [$patientInfo->pa_id]);
  $vaccinatedshow = $db->queryResult();
  $providerInfo = $vaccinatedshow[0];
  // echo '<pre>'; print_r($providerInfo); echo '</pre>';
  $pr_lat = array_reverse(explode(',', $providerInfo->pr_address))[1];
  $pr_lon = array_reverse(explode(',', $providerInfo->pr_address))[0];
  // echo $pr_lat;
  // echo $pr_lon;
  $distance = distance($pa_lat, $pa_lon, $pr_lat , $pr_lon);
  // echo $distance;


}
