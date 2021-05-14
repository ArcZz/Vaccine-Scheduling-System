
<?php
require '../vendor/autoload.php';
use \Firebase\JWT\JWT;

$key = "zz2310jz1jz1433";

function issuetoken($id, $who)
{
    global $key;
    $time = time();
    $nextWeek = time() + (10000000);
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
        $backid =array("id"=>$decoded->userName ,"who"=>$decoded->who);
        return $backid;
    }
    catch(Exception $e){
        //0 means failed to pass
        return 0;

    }
}



//$k = issuetoken(12,"patient");

// echo $k;
// echo "/n";
// $testjwt = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2MjA5NTU5MDQsImV4cCI6MTYyMDk1NTkwNSwidXNlck5hbWUiOjUyLCJ3aG8iOiJwYXRpZW50In0.sHgBDXuyHeI6bPk5SR6qM4Zvkh8QVL0P4iPRtBgVxdY";
//$testjwt = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2MjA5NTU5MDQsImV4cCI6MTYyMDk1NTkwNSwidXNlck5hbWUiOjUyLCJ3aG8iOiJwYXRpZW50In0.sHgBDXuyHeI6bPk5SR6qM4Zvkh8QVL0P4iPRtBgVxdY";
// $ha = backid($k);

// echo $ha['id'];


// echo $ha['who'];