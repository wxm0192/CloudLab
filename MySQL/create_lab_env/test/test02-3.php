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

/*
echo "start to new lab_session_counter "; 
print_r($my_lab_session_counter->lsc_record );
echo "start to increase"; 
echo $my_lab_session_counter->increase_lab_session_counter( );
$my_lab_session_counter = new Lab_Session_Counter(1);
print_r($my_lab_session_counter->lsc_record );
echo "start to decrease"; 
$my_lab_session_counter->decrease_lab_session_counter( );
$my_lab_session_counter = new Lab_Session_Counter(1);
print_r($my_lab_session_counter->lsc_record );
*/

$my_session = new Lab_Session(1,0,0 ) ;    //  (lad_id , session_id , user_id) 
//$my_session = NULL ;
print_r($my_session);
//$my_session-> set_session_ip("10.1.1.1" ) ;
//$rev_ip=$my_session-> activate_session( )    ; // return an IP
//$my_session-> set_session_ip($rev_ip ) ;
$my_session-> set_session_ip("202.1.1.1" ) ;
$my_session-> set_session_status("Running" ) ;
echo "This is the status:".$my_session-> get_session_status( ) ;
$my_session = new Lab_Session(1,1,0 ) ;    //  (lad_id , session_id , user_id) 
print_r($my_session);
//unset($my_session);


?>
