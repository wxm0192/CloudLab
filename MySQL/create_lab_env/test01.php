<?php
namespace MySQL\create_lab_env ;
include 'common.php' ;
$db_conn ;
$log;
$log = new Log() ; 
$log->f_log("Test for class log ");
header('content-type:application/json;charset=utf8');
$lab_db_conn  = new db_connect() ;

//global $db_conn ;
//f_log("Test for log");
/*
$db_conn = $lab_db_conn->conn ;
$result = mysqli_query($db_conn , "SELECT *  FROM Lab_Session_Counter  where lab_id = '2' ;  ");

   echo 'Result error :  ' . mysqli_error($db_conn );
   echo 'Result errno :  ' . mysqli_errno($db_conn );
*/
$log->f_log("Test for class log ");
unset( $log) ;





/*
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	echo "<br>";
	//var_dump($row);
	print_r($row);
	return($row);
	}
}
else {
	echo "Init  lab_session_counter failed ";
	return -1 ;
}

 $sql = "SELECT *  FROM Lab_Session_Counter  where lab_ida = '1' ";
                $result = mysqli_query($db_conn, $sql);
		echo "\n";
 		echo "SQL result : ".mysqli_error($db_conn)."<br>"."Status" ;
 		echo "SQL result : ".$db_conn->mysqli_error."<br>"."Status" ;
		echo "\n";
 		echo "SQL result : ".mysqli_connect_errno()."<br>"."Status" ;
 		echo "SQL result : ".$db_conn->mysqli_errno."<br>"."Status" ;
		echo "\n";
                if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                        echo "<br>";
                        //var_dump($row);
                        print_r($row);
                        return($row);
                        }
                }
                else {
                        echo "Init  lab_session_counter failed ";
                        return -1 ;
                }
*/
?>
