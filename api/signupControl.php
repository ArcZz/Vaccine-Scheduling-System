<?php

include 'db.php';
include 'jwtkey.php';
session_start();


// {"gender":"option1","fullname":"Tester1",
// "email":"tester1@gamil.com",
// "password":"Tester1",
// "passcon":"Tester1","date":"2021-01-01",
// "phone":"5739996314","ssn":"123-45-9090",
// "address":"7813 3rd Ave,44.73313503620341,-73.98688182888938",
// "long":"44.73313503620341","lat":"-73.98688182888938","max":"40"}



$paname = htmlspecialchars($_POST['fullname']);
$ssn = htmlspecialchars($_POST['ssn']);
$dob = htmlspecialchars($_POST['date']);
$paaddress = htmlspecialchars($_POST['address']);
$paphone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars($_POST['email']);
$maxtravel = htmlspecialchars($_POST['max']);
$papassword = htmlspecialchars($_POST['password']);

//testing
// $method = "signup";
// $paname = "Tester1";
// $ssn = "123-45-9090";
// $dob = "1998-02-12";
// $paaddress = "123 5th Ave, New York, NY,  10003, 44.73313503620341, -73.98688182888938";
// $paphone = "9171112333";
// $email = 'tester1@gamil.com';
// $maxtravel = 20;
// $papassword = "Tester1!";

// check is patient already in Database
flush();
$db->prepareOn();
$db->query_prepared('SELECT pa_id FROM Patient WHERE ssn = ? or email = ?', [$ssn, $email]);
$result = $db->queryResult();

if (isset($result[0]->pa_id)) {
    echo 0; //patient already exists

} else { // create new patient
    //echo "1";
    $birthyear = (int) explode('-', $dob)[0];
    if ($birthyear < 1980) {
        $pid = 1;
    } elseif ($birthyear >= 1980 && $birthyear < 2010) {
        $pid = 2;
    } else {
        $pid = 3;
    }
    $dbpassword = password_hash($papassword, PASSWORD_BCRYPT, array('cost' => 10));
    $db->query_prepared('INSERT INTO Patient(pa_name, ssn, dob, pa_address,
                        pa_phone, email, max_travel_distance, pa_password, p_number)
                        VALUES(?,?,?,?,?,?,?,?,?);',
        [$paname, $ssn, $dob, $paaddress,
            $paphone, $email, $maxtravel, $dbpassword, $pid]);

    $result2 = $db->queryResult();


    $db->query_prepared('SELECT pa_id FROM Patient WHERE email = ?', [$email]);
    $result2 = $db->queryResult();
    $newid = end($result2)->pa_id;
    $jwk = issuetoken($newid, "patient");
    echo $jwk;

}
