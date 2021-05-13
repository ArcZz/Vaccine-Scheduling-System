<?php

include 'db.php';
session_start();

// $method = htmlspecialchars($_POST['method']);
// $paname = htmlspecialchars($_POST['name']);
// $ssn = htmlspecialchars($_POST['ssn']);
// $dob = htmlspecialchars($_POST['dob']);
// $paaddress = htmlspecialchars($_POST['address']);
// $paphone = htmlspecialchars($_POST['phone']);
// $email = htmlspecialchars($_POST['email']);
// $maxtravel = htmlspecialchars($_POST['distance']);
// $papassword = htmlspecialchars($_POST['password']);

//testing
$method = "signup";
$paname = "Tester1";
$ssn = "123-45-9090";
$dob = "1998-02-12";
$paaddress = "123 5th Ave, New York, NY,  10003, 44.73313503620341, -73.98688182888938";
$paphone = "9171112333";
$email = 'tester1@gamil.com';
$maxtravel = 20;
$papassword = "Tester1!";

if ($method == "signup") {
  // check is patient already in Database
  flush();
  $db->query_prepared('SELECT ssn, email FROM Patient WHERE email = ? OR ssn = ?',
                      [$email, $ssn]);
  $result = $db->queryResult();
  $resultCount = count($result);

  // $birthyear = (int)explode('-', $dob)[0];
  // echo $birthyear;
  // echo gettype($birthyear);

  if ($resultCount > 0){
    echo "0"; //patient already exists
  }
  else{ // create new patient
    //echo "1";
    $birthyear = (int)explode('-', $dob)[0];
    if($birthyear < 1980){
      $pid = 1;
    }
    elseif($birthyear >= 1980 && $birthyear < 2010){
      $pid = 2;
    }
    else{
      $pid = 3;
    }

    $db->query_prepared('INSERT INTO Patient(pa_name, ssn, dob, pa_address,
                        pa_phone, email, max_travel_distance, pa_password, p_number)
                        VALUES(?,?,?,?,?,?,?,?);',
                        [$paname, $ssn, $dob,$paaddress,
                        $paphone, $email, $maxtravel, $papassword, $pid]);
    $db->query_prepared('SELECT pa_id FROM Patient WHERE email = ?', [$email]);
    $result2 = $db->queryResult();
    foreach($result2 as $row){
      echo $row->pa_id;
    }

  }

}
else{
  echo "-1"; //if failed
}
