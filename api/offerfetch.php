<?php

include 'profilefetch.php';

$paid = $patientData->pa_id;
$paid = 9;
// echo $paid;
$havePending = 0;
flush();
$db->query_prepared('SELECT * FROM AppOffer WHERE pa_id = ? AND status = "pending"', [$paid]);
$dbshow = $db->queryResult();

// var_dump($dbshow[0]->pa_id);

if (is_null($dbshow[0]->aid)) {
    //echo "failed"; t
    $havePending = 0;
    echo "no";

} else {
    // not null, means have a pending offer
    $havePending = 1;
    $html = $dbshow[0];

    $db->query_prepared('SELECT  FROM AppOffer WHERE pa_id = ? AND status = "pending"', [$paid]);
    $dbshow = $db->queryResult();
    
    $db->query_prepared('SELECT  a.pr_id FROM AvailableApp a JOIN AppOffer p on a.aid = p.aid WHERE pr_id = ?', [$pr_id] );
    $tables = $db->queryResult();
    $pro = $results2[0]->num;
    
    echo $html->pa_id;
    echo $html->aid;
    echo $html->offerdt;
    echo $html->deadlinedt;
}

// $db->query_prepared('SELECT * FROM AppOffer WHERE pa_id = ? AND status = "pending"', [$paid]);
// $result = $db->queryResult();
