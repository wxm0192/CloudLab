<?php
namespace v03 ;
include 'common.php' ;
include 'Lab_Session_Counter.php' ;
include 'Lab_Session.php' ;
$lab_db_conn ;    //Lab DB class 
$db_conn ;       //common  DB connector class 
$log = new Log() ;
$log->f_log("Test for log");
header('content-type:application/json;charset=utf8');
$lab_db_conn  = new db_connect() ;


$db_conn = $lab_db_conn->conn ;

$lab_id = $_GET['lab_id'] ;

session_id();
 session_start();
 $lab_id     = $_SESSION['lab_id'] ;
 $session_id = $_SESSION['session_id'] ;
echo "\nSessionID: ".$session_id;
echo "\n Lab ID is : ".$lab_id."\n";
try     {
        $my_lab = new Lab($lab_id);
        }
catch( Exception $e) {
        echo $e->getMessage();
        exit -1;
        }

$my_lab->lab_list();
try     {
        $my_lab_session_counter = new Lab_Session_Counter($lab_id);
        }
catch( Exception $e) {
        echo $e->getMessage();
        exit -1;
        }

echo "\n";
print_r($my_lab_session_counter );
echo "\n";
try     {
	$my_session = new Lab_Session($lab_id, $session_id ,0 ) ;    //  (lad_id , session_id , user_id) 
        }
catch( Exception $e) {
        echo $e->getMessage();
	session_destroy();
        exit -1;
        }


echo "\n";
print_r($my_session);
echo "\n";
$my_session->destroy_lab_session();
echo "\n";
//print_r($my_session);
session_destroy();

?>
