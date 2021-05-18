<?php

use function ezsql\functions\eq;
use function ezsql\functions\where;
// THIS IS A JOIN VERSION OF TABLE !!!!!!!!
include 'db.php';
// include 'jwtkey.php';

$pr_id = htmlspecialchars($_POST['pr_id']);

$pr_id = 4;
flush();

$db->query_prepared('SELECT a.aid, a.pr_id, a.appdt, a.number_available, p.pa_id, p.offerdt,p.deadlinedt, p.replydt,p.status FROM AvailableApp a JOIN AppOffer p on a.aid = p.aid WHERE pr_id = ?', [$pr_id] );
$tables = $db->queryResult();

// var_dump($tables);
if (!empty($tables)) {
    $myJSON = json_encode($tables);
    echo $myJSON;

}else{
    echo $pr_id;
}
