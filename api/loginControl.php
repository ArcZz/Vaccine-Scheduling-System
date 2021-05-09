<?php

include 'db.php';

$method = htmlspecialchars($_POST['method']);
$username = htmlspecialchars($_POST['user']);
$password = htmlspecialchars($_POST['pass']);

//login user attempt------------
if ($method == "login") {
    $db->query_prepared('SELECT pa_password, pa_name, email FROM Patient WHERE email = ?', [$username]);
    $user = $db->queryResult();
    foreach ($user as $row) {

        $uname = $row->pa_name;
        $upassword = $row->pa_password;
        $uemail = $row->email;
    }

    if (isset($uemail)) {
        if ($password == $upassword) {
            setcookie('userid',$uname);
            $_SESSION["user"] = $username;

            echo "success login 3";
        } else {
            echo "password fail 2";
        }
    } else {
        echo "no that user 1";
    }

//signup user attempt------------
} else {

    echo "sign up failed";
}
