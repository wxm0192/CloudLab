<?php
namespace MySQL\create_lab_env ;
include 'common.php' ;
include 'Lab_Session_Counter.php' ;
include 'Lab_Session.php' ;
$lab_db_conn ;    //Lab DB class 
$db_conn ;       //common  DB connector class 
$log = new Log() ;
$log->f_log("Test for log");
header('content-type:application/json;charset=utf8');
$lab_db_conn  = new db_connect() ;

/*
	该程序用于删除指定Lab_id， Session_id 的Lab 环境
	http://8.142.163.140:31656/MySQL/create_lab_env/test02-6-1.php?lab_id=23&session_id=1
*/

$db_conn = $lab_db_conn->conn ;

$lab_id = $_GET['lab_id'] ;
$session_id = $_GET['session_id'] ;

session_id();
 session_start();
/*
 $lab_id     = $_SESSION['lab_id'] ;

 $session_id = $_SESSION['session_id'] ;
*/
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
