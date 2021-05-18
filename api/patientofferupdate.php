<?php

include 'db.php';

$method = htmlspecialchars($_POST['method']);    
$paid = htmlspecialchars($_POST['paid']);
$aid = htmlspecialchars($_POST['aid']);


//testing
// $paid = 8;
// $aid = 1;
// $method = "canceled";


if ($method == "accept") {
    flush();
  $db->query_prepared('UPDATE AppOffer SET status = "accepted", replydt = NOW()  WHERE pa_id = ? AND aid = ? ',[$paid, $aid]);
  $result = $db->queryResult();
  echo 1;  //accept ok
}
else if($method == "declined"){
     $db->query_prepared('UPDATE AppOffer SET status = "declined", replydt = NOW()  WHERE pa_id = ? AND aid = ? ',[$paid, $aid]);
  $result = $db->queryResult();

  echo 2;  //declined success
}else{
     $db->query_prepared('UPDATE AppOffer SET status = "cancelled"  WHERE pa_id = ? AND aid = ? ',[$paid, $aid]);
  $result = $db->queryResult();

  echo 3;  //canceled

}
