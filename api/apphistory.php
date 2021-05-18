<?php

use function ezsql\functions\eq;
use function ezsql\functions\where;

// this is for history!
include 'db.php';
// include 'jwtkey.php';

$pr_id = htmlspecialchars($_POST['pr_id']);


flush();

$db->query_prepared('SELECT * FROM AvailableApp WHERE pr_id = ?', [$pr_id] );
$tables = $db->queryResult();

// var_dump($tables);
if (!empty($tables)) {
    $myJSON = json_encode($tables);
    echo $myJSON;
}else{
    echo $pr_id;
}
