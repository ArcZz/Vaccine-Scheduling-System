<?php

include 'profilefetch.php';

$paid = $patientData->pa_id;
$paid = 10;
// echo $paid;
$havePending = 0;

flush();
$db->query_prepared('SELECT * FROM AppOffer WHERE pa_id = ? AND status = "pending"', [$paid]);
$dbshow = $db->queryResult();

// var_dump($dbshow[0]->pa_id);

if (is_null($dbshow[0]->aid)) {
    //echo "failed"; this guy dont have offer
    $havePending = 0;
    echo "no";
    //if
//     $db->query_prepared('SELECT * FROM AppOffer WHERE pa_id = ? AND status = "accept"', [$paid]);
// $dbshow = $db->queryResult();

    // // $html  if have accrep=
    // else{

    //      $havePending = 0;
    //       $haveAccept = 0;

    // }

    



} else {
    // not null, means have a pending offer
    $havePending = 1;
    $html = $dbshow[0];

    $db->query_prepared('SELECT  aid  FROM AppOffer WHERE pa_id = ? AND status = "pending"', [$paid]);
    $dbshow = $db->queryResult();
    
    $db->query_prepared('SELECT  a.pr_id FROM AvailableApp a JOIN AppOffer p on a.aid = p.aid WHERE pr_id = ?', [$pr_id] );
    $tables = $db->queryResult();
    $pro = $results2[0]->num;

    // $html
    // $provider
    
    // echo $html->pa_id;
    // echo $html->aid;
    // echo $html->offerdt;
    // echo $html->deadlinedt;
}

// $db->query_prepared('SELECT * FROM AppOffer WHERE pa_id = ? AND status = "pending"', [$paid]);
// $result = $db->queryResult();
