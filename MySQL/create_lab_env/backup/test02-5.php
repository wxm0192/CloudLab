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
$db_conn = $lab_db_conn->conn ;

//print_r($db_conn);
$lab_id = $_GET['lab_id'] ;
 session_id();
 session_start();
 $_SESSION['lab_id']=$lab_id ; 
echo "\n Lab ID is : ".$lab_id."\n";
$my_lab = new Lab($lab_id);
$my_lab->lab_list();
$my_lab_session_counter = new Lab_Session_Counter($lab_id);
echo "\n";
//print_r($my_lab_session_counter->lsc_record );
print_r($my_lab_session_counter );
echo "\n";

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

$my_session = new Lab_Session($lab_id, 0 , 0 ) ;    //  (lad_id , session_id , user_id) 
$_SESSION['session_id']=$my_session->session_id  ;
echo "\nSessionID: $my_session->session_id  \n";
//$my_session = NULL ;
print_r($my_session);
echo "\n";
$rev_ip=$my_session-> activate_session( )    ; // return an IP

if( checkIp($rev_ip) )
	$my_session-> set_session_ip($rev_ip ) ;
else
	{
	echo "Failed to activate the session and faile to get IP";
	$my_session->destroy_lab_session();
	exit -1 ;
	}

//$my_session->set_session_ip("202.1.1.1" ) ;
$my_session->set_session_status("Running" ) ;
echo "\n";
echo "This is the status:".$my_session-> get_session_status( )."\n" ;
//$my_session = new Lab_Session(1,1,0 ) ;    //  (lad_id , session_id , user_id) 
echo "This is the Session IP: ".$my_session-> get_session_ip( )."\n" ;
echo "\n";
print_r($my_session);
echo "\n";
//$my_session->destroy_lab_session();
echo "\n";
//print_r($my_session);

?>
