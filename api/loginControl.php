<?php

include 'db.php';
session_start();

$method = htmlspecialchars($_POST['method']);
$username = htmlspecialchars($_POST['user']);
$password = htmlspecialchars($_POST['pass']);
$who = htmlspecialchars($_POST['who']);


//login user attempt------------

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
            $_SESSION["user"] = $username;
          

            echo "3";
        } else {
            echo "2";
        }
    } else {
        echo "1";
    }

//signup user attempt------------
} else {


    echo "sign up failed";
}
