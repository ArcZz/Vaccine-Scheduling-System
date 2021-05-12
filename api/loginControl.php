<?php

include 'db.php';
include 'jwtkey.php';
session_start();

$phone = htmlspecialchars($_POST['phone']);
$username = htmlspecialchars($_POST['user'])?:'';
$password = htmlspecialchars($_POST['pass']);
$who = htmlspecialchars($_POST['who']);

//login patient

if ($who == "patient") {
    $db->query_prepared('SELECT pa_id, pa_password, pa_name, email FROM Patient WHERE email = ?', [$username]);
    $user = $db->queryResult();
    foreach ($user as $row) {

        $uname = $row->pa_name;
        $uid = $row->pa_id;
        $upassword = $row->pa_password;
        $uemail = $row->email;
    }

    if (isset($uemail)) {
        if ($password == $upassword) {
            $jwk = issuetoken($uid, "patient");
            echo $jwk;
        } else {
            echo 2;
        }
    } else {
        // no user found
        echo 1;
    }

// login provider
} else {

    $db->query_prepared('SELECT pr_id, pr_password FROM Provider WHERE pr_phone = ?', [$phone]);
    $user = $db->queryResult();
    if (isset($user[0]->pr_id)) {
        if ($password == $user[0]->pr_password) {
            $jwk = issuetoken( $user[0]->pr_id, "provider");
            echo $jwk;
        } else {
            echo 2;
        }
    } else {
         // no user found
        echo 1;
    }

}
