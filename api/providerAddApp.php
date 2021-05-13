<?php

include 'db.php';
include 'jwtkey.php';
session_start();

$id = backid($k);
$method = htmlspecialchars($_POST['method']);  //method = 'addApp'
$appdt = htmlspecialchars($_POST['appdt']);
$numberAvailable = htmlspecialchars($_POST['numberAvailable']);

//testing
// $method = "addApp";
// $id = 1;
// $appdt = "2021-06-20 08:08:08";
// $numberAvailable = 5;


if ($method == "addApp") {
  // check is patient already in Database
  flush();
  $db->query_prepared('INSERT INTO AvailableApp(pr_id, appdt, number_available)
                        VALUES(?,?,?);',
                        [$id, $appdt, $numberAvailable]);
  echo "1";  //add appointment success

  }
else{
  echo "-1"; //no appointment add
}
