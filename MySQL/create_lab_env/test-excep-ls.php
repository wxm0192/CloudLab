<?php
namespace MySQL\create_lab_env ;
include 'common.php' ;
include 'Lab_Session_Counter.php' ;
include 'Lab_Session.php' ;
$log = new Log() ;
$lab_db_conn  = new db_connect() ;
$db_conn = $lab_db_conn->conn ;

try     {
        $my_lab = new Lab(1);
        }
catch( \Exception $e) {
        echo $e->getMessage();
        exit -1;
        }

$my_lab->lab_list();

try     {
	$my_session = new Lab_Session(1 , 5 ,0 ) ;    //  (lad_id , session_id , user_id) 
        }
catch( \Exception $e) {
	echo "get exception in main function ";
        echo $e->getMessage();
        exit -1;
        }

?>
