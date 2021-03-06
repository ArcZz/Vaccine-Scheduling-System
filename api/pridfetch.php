<?php

use function ezsql\functions\eq;
use function ezsql\functions\where;

include 'db.php';
include 'jwtkey.php';

// please add below codes, it's for cookie check and back user ID.
//http://localhost/Vaccine-Scheduling-System/api/profilefetch.php
//$testk = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2MjA5NjYxNjIsImV4cCI6MTYzMDk2NjE2MiwidXNlck5hbWUiOjU3LCJ3aG8iOiJwYXRpZW50In0.HSEJr0mmmvWDhB-DLliTeqSPgRAXPkcuKXcRCLVaj2M";
//check jwt.
if (!isset($_COOKIE['userdata'])) {
    // if no jwt exist, he need to back to login page
    header("Location: ../index.php");
    exit();
}
//echo $_COOKIE['userdata'];
//check his cookiess
$failreport = 1;
$jwtdata = $_COOKIE["userdata"];
$jwtdata = str_replace(array( '"', '\n'), '', $jwtdata);
//echo $jwtdata;
$iddata = backid($jwtdata);
if (!isset($iddata)) {
    //echo "failed"; test use only, dont use this once u include on html
    $failreport = 0;
}
$finalwho = $iddata['who'];

// this only for patient, if his cookie only for provider, he is not allowed.
if ($finalwho != "provider"){
    header("Location: ../index.php");
    exit();
}
$finalId =  $iddata['id'];

// this id is the patient or provider id / 
$db->query_prepared('SELECT * FROM Provider WHERE pr_id = ?', [$finalId] );
$result = $db->queryResult();
if (is_null($result)) {
  //echo "failed"; test use only, dont use this once u include on  html
    $failreport = 0;
}
 
$prData = $result[0];

// example: how you get value
// $patientData->pr_id;
// $patientData->pr_phone;

