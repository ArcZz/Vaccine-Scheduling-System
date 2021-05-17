<?php

include 'db.php';



//userpassword
// $password = 'bass';
  

// $dbpassword = password_hash($password,
//         PASSWORD_BCRYPT, array('cost' => 10));
  
// Use password_verify() function to verify the password matches

// echo $dbpassword;
  
echo password_verify('额螣01', $dbpassword ) . "<br>";
  
// echo password_verify('Password',
//             $dbpassword );
  

// // run below code for our databse


// $db->query_prepared('Update Patient set pa_password = ?', [$dbpassword] );
// $user = $db->queryResult();


// $results = $db->get_results("SELECT COUNT(*) as num FROM Patient");
// //patientnum
// $pnum =  $results[0]->num;

// $results2 = $db->get_results("SELECT COUNT(*) as num FROM Provider");
// //providernum
// $pnum2 =  $results2[0]->num;

// echo $pnum;
// echo $pnum2;

// //update patient
// $password = 'pass';
// for ($i=1; $i<= $pnum; $i++)
// {
// $dbpassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
//  $db->query_prepared('Update Patient set pa_password = ? WHERE pa_id = ? ', [$dbpassword, $i] );
// $user = $db->queryResult();
// }


// $password = 'bass';
// for ($i=1; $i<= $pnum2; $i++)
// {
// $dbpassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
//  $db->query_prepared('Update Provider set pr_password = ? WHERE pr_id = ? ', [$dbpassword, $i] );
// $user = $db->queryResult();
// }


// echo "success";




//test only
//$results2 = $db->get_results("SELECT pa_password FROM Patient WHERE pa_id = 3");
$results2 = $db->get_results("SELECT pr_password FROM Provider WHERE pr_id = 3");
//providernum
$pnum2 =  $results2[0]->pr_password;

echo $pnum2;

echo password_verify('额螣01',
            $pnum2 ) . "<br>";
  
echo password_verify('bass',
            $pnum2 );










//use WhiteHat101\Crypt\APR1_MD5;
// $password = '121@121';
// $email = '121@121';

// $dbpassword= password_hash($password, PASSWORD_BCRYPT);

// //echo $password_encrypted;

// $options = [
//     'salt' => $email,
//     //write your own code to generate a suitable & secured salt
//     'cost' => 12 // the default cost is 10
// ];


// if (password_verify($password, $dbpassword)) {
//     // Success!
//     echo 'Password Matches';
// }else {
//     // Invalid credentials
//     echo 'Password Mismatch';
// }


// use PolyCrypto\PolyAES;

// $password = 'dwqkhqwdioh';
// $salt = 'test@zhang.com';
// $encrypted = PolyAES::withPassword($password, $salt)->encrypt($data);
// echo $encrypted;
// $decrypted = PolyAES::withPassword($password, $salt)->decrypt($encrypted);

// // Check plaintext password against an APR1-MD5 hash

// $password = '121@121';
// $salt = APR1_MD5::salt();
// $dbpass = APR1_MD5::hash('PASSWORD', $salt);

// // Hash a password with a known salt
// //echo $dbpass;

// echo APR1_MD5::check($password, $dbpass);




// // Hash a password with a secure random salt




// if($flag==true){
//     echo "haha";

// }else{
//     echo "wrong";
// }