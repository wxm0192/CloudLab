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


function check_session_timeout()
{
	global $db_conn ;
        global $log ;
        //global $my_lab ;
	$sql = " select ls.lab_id ,ls.session_id, ls.user_id ,  ls.session_start_time , lb.lab_type , lb.time_limit 
					from Lab_Session ls  join Lab lb  on  ls.lab_id = lb.lab_id ; " ;
	$result = $db_conn->query( $sql);
	if ($result->num_rows > 0) {
			// 输出数据
				while($row = $result->fetch_assoc()) {
				echo "\n"."lab_id: " . $row["lab_id"]. "lab_type:". $row["lab_type"]. "\n";
				echo "\n";
				var_dump($row);
				$lab_duration =  get_interval($row["session_start_time"]);
				echo  $lab_duration ;                             
				if($lab_duration >  $row["time_limit"] ) {
						echo "Time out \n"; 
						destroy_session( $row["lab_id"],  $row["session_id"]) ;
						}
				else {
						echo "Lab continue \n" ;
					}
					
				//return($row);
				}
			}
			else {
				echo "0 结果";
				return(-1) ;
			}
		//}

}

ignore_user_abort(true);

$num=0;

set_time_limit(0);

do{
	check_session_timeout();
	sleep(60);
}while(true);

?>
