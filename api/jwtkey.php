
<?php
require '../vendor/autoload.php';
use \Firebase\JWT\JWT;
$key = "zz2310jz1jz1433";

function issuetoken($id, $who)
{
    global $key;
    $time = time();
    $nextWeek = time() + (1);
    $payload = array(
        "iat" => $time,
        "exp" => $nextWeek,
        "userName" => $id,
        "who" => $who,
    );
    //HS256 by default
    $jwt = JWT::encode($payload, $key);
    return $jwt;
}

function backid($jwt)
{
    global $key;
    try{
        $decoded = JWT::decode($jwt, $key, array('HS256'));
        $backid =array("id"=>$decoded->iat ,"who"=>$decoded->iat);
        return $backid;
    }
    catch(Exception $e){
        //0 means failed to pass
        return 0;

    }
}

$k = issuetoken("h","name");
// echo $k;
//echo "/n";
//$old = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLm9yZyIsImF1ZCI6Imh0dHA6XC9cL2V4YW1wbGUuY29tIiwiaWF0IjoxNjIwODU3NDc5LCJleHAiOjE2MjA4NTc0ODB9.eF5qxBpgnTo8y8DxBZx1UEjpok4Nbi9uU02LR4A3jXg";
$ha = backid($k);
//echo $ha['id'];