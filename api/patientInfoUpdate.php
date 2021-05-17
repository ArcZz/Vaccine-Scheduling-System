<?php


/// this is not used 


include 'db.php';
include 'jwtkey.php';
session_start();


$method = htmlspecialchars($_POST['method']);    //when click on save -> method = 'save'
$paname = htmlspecialchars($_POST['name']);
$ssn = htmlspecialchars($_POST['ssn']);
$dob = htmlspecialchars($_POST['dob']);
$paaddress = htmlspecialchars($_POST['address']);
$paphone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars($_POST['email']);
$maxtravel = htmlspecialchars($_POST['distance']);

//testing
// $id = 26;
// $method = "save";
// $paname = "Tester1";
// $ssn = "123-45-9090";
// $dob = "1998-02-12";
// $paaddress = "123 5th Ave, New York, NY,  10003, 44.73313503620341, -73.98688182888938";
// $paphone = "9171112333";
// $email = 'tester1@gamil.com';
// $maxtravel = 60;

if ($method == "save") {
flush();
$db->query_prepared('UPDATE patient SET pa_name = ?, ssn = ?, dob =?, pa_address =?, pa_phone = ?,
                    email=?, max_travel_distance = ? WHERE pa_id = ?',
                    [$paname, $ssn, $dob, $paaddress, $paphone, $email, $maxtravel, $id]);
$result = $db->queryResult();
echo "1";  //update success
}
else{
  echo "0";  //no update
}
