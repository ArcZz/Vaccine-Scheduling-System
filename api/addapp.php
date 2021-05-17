<?php

include 'db.php';

$date = htmlspecialchars($_POST['date']);
$pr_id = htmlspecialchars($_POST['pr_id']);
$num = htmlspecialchars($_POST['num']);

//testing
// $method = "addApp";
// $pr_id = 1;
// $date = "2021-06-20 08:08:08";
// $num = 5;


flush();

$db->query_prepared('INSERT INTO AvailableApp(pr_id, appdt, number_available)
                        VALUES(?,?,?);', [$pr_id, $date, $num]);
$result2 = $db->queryResult();

echo "1";


// if ($method == "save") {
//     echo "1"; //add appointment success
// } else {
//     echo "0"; //no update
// }
