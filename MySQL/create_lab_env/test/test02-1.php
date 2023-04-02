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

//global $db_conn ;

$db_conn = $lab_db_conn->conn ;
//$db_conn = get_db_connection() ;

//print_r($db_conn);

$my_lab = new Lab(1);
$my_lab->lab_list();
$my_lab_session_counter = new Lab_Session_Counter(1);
//print_r($my_lab_session_counter->lsc_record );
print_r($my_lab_session_counter );


$my_session = new Lab_Session(1,0,0 ) ;    //  (lad_id , session_id , user_id) 
//$my_session = NULL ;
print_r($my_session);
sleep(60);


?>
