<?php

include 'db.php';

$paid =2;
$aid = 27;

$db->query_prepared('Update AppOffer SET status= "noshow" WHERE pa_id = ? AND aid = ?', [$paid, $aid]);
$user = $db->queryResult();



?>
