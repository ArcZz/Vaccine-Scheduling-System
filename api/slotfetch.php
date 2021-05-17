<?php

use function ezsql\functions\eq;
use function ezsql\functions\where;

include 'profilefetch.php';
// include 'jwtkey.php';

$paid = $patientData->pa_id;
// $paid = 1;
$slotArray = array();

flush();
$db->query_prepared('SELECT sid FROM PatientPreferredSlot WHERE pa_id = ?', [$paid] );
$slots = $db->queryResult();
// echo gettype($slots);
if (is_null($slots)) {
  //echo "failed"; test use only, dont use this once u include on  html
    $failreport = 0;
}else{
  foreach($slots as $slot){
    array_push($slotArray, $slot->sid);
  }
}

//testing
 // echo '<pre>'; print_r($slotArray); echo '</pre>';
// if(in_array('24', $slotArray)){
//   echo 'found';
// }
// else {
//   echo 'not found';
// }


// if(in_array('24', $slotArray)){echo 'found';}
