<?php

include 'db.php';

$method = htmlspecialchars($_POST['method']);    
$paid = htmlspecialchars($_POST['paid']);
$aid = htmlspecialchars($_POST['aid']);


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

if ($method == "accept") {
    flush();
    $db->query_prepared('UPDATE patient SET pa_name = ?, ssn = ?, dob =?, pa_address =?, pa_phone = ?,
                    email=?, max_travel_distance = ? WHERE pa_id = ?',
                    [$paname, $ssn, $dob, $paaddress, $paphone, $email, $maxtravel, $id]);
$result = $db->queryResult();
  echo 1;  //accept ok
}
else if($method == "declined"){


  echo 2;  //declined success
}else{

  echo 3;  //canceled

}
