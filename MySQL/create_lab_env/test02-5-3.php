<?php
namespace MySQL\create_lab_env ;
include 'common.php' ;
include 'Lab_Session_Counter.php' ;
include 'Lab_Session.php' ;
$lab_db_conn ;    //Lab DB class 
$db_conn ;       //common  DB connector class 
header('content-type:application/json;charset=utf8');

//print_r($db_conn);
$lab_id = $_GET['lab_id'] ;
 session_id();
 session_start();
// $lab_id=$_SESSION['lab_id'] ; 
 $_SESSION['lab_id'] = $lab_id  ; 
 $session_id=$_SESSION['session_id'] ; 
echo "\n Lab ID is : ".$lab_id."\n";
echo "\n Session ID is : ".$session_id."\n";

$_SESSION['session_id'] = 1 ;
$session_id=$_SESSION['session_id'] ; 
echo "\n Lab ID is : ".$lab_id."\n";
echo "\n Session ID is : ".$session_id."\n";

echo "session Destroy\n";
session_destroy();
?>
