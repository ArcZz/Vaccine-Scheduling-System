<?php

include 'db.php';

$db->query_prepared('Update AppOffer SET status= "noshow" where = ?', [$dbpassword] );
$user = $db->queryResult();



?>
