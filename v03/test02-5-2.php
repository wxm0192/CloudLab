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

// This program is for get Public IP , under developping 
//print_r($db_conn);
//$lab_id = $_GET['lab_id'] ;
 session_id();
 session_start();
 $lab_id = $_SESSION['lab_id'] ; 
if($lab_id == 0 )
	{
		$lab_id= $_GET['lab_id'] ;
	}
	
echo "\n Lab ID is : ".$lab_id."\n";

$this_session_id=$_SESSION['session_id'];
if($this_session_id == NULL )
	$this_session_id = 0;


try     {
        $my_lab = new Lab($lab_id);
        }
catch( Exception $e) {
        echo $e->getMessage();
        exit -1;
        }
echo "This is Lab information:\n";
print_r($my_lab);
echo "This is Lab information:\n";
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
        $my_session = new Lab_Session($lab_id, $this_session_id , 0 ) ;    //  (lad_id , session_id , user_id)
        }
catch( Exception $e) {
        echo $e->getMessage();
        exit -1;
        }
$_SESSION['session_id']=$my_session->session_id  ;
echo "\nSessionID: $my_session->session_id  \n";
print_r($my_session);
echo "\n";
//$my_session-> activate_session( ) ; //Send command to Activate the session 

/*
if( checkIp($rev_ip) )
	$my_session-> set_session_ip($rev_ip ) ;
else
	{
	echo "Failed to activate the session and faile to get IP";
	$my_session->destroy_lab_session();
	exit -1 ;
	}

$my_session->set_session_status("Running" ) ;
*/
echo "This is resource type: ".$mylab->lab_type."\n" ; 
$log->f_log("This is resource type: ".$mylab->lab_type);
if($my_lab->lab_type == "vm")
	{
		sleep(28);
		$log->f_log("sleep 20 for VM ");
	}
if($my_lab->lab_type == "docker")
	{
		sleep(5);
		$log->f_log("sleep 5  for docker ");
	}
$my_session->check_session_IP() ;
$my_session->check_session_status() ;
//$my_session->set_session_status("Running" ) ;
echo "\n";
echo "This is the status:".$my_session-> get_session_status( )."\n" ;
echo "This is the Session IP: ".$my_session-> get_session_ip( )."\n" ;
echo "\n";
print_r($my_session);
echo "\n";

?>
