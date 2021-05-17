<?php

include 'db.php';
include 'jwtkey.php';
session_start();
$mehod = isset($_POST['method']) ? $_POST['method'] : null;
$phone = htmlspecialchars($_POST['phone']);
$username = htmlspecialchars($_POST['user']);
$password = htmlspecialchars($_POST['pass']);
$who = htmlspecialchars($_POST['who']);

//login patient

if ($who == "patient") {
    $db->query_prepared('SELECT pa_id, pa_password FROM Patient WHERE email = ?', [$username] );
    $user = $db->queryResult();
    if (isset($user[0]->pa_id)) {
        $dbpassword = $user[0]->pa_password;
        if ( password_verify($password, $dbpassword )) {
            $jwk = issuetoken($user[0]->pa_id, "patient");
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

    $db->query_prepared('SELECT pr_id, pr_password FROM Provider WHERE pr_phone = ?', [$phone] );
    $user = $db->queryResult();
     if (isset($user[0]->pr_id)) {
        $dbpassword2 = $user[0]->pr_password;
        if ( password_verify($password, $dbpassword2)) {
            $jwk = issuetoken($user[0]->pr_id, "provider");
            echo $jwk;
        } else {
            echo 2;
        }
    } else {
         // no user found
        echo 1;
    }

}

