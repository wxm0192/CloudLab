<?php
namespace MySQL\create_lab_env ;
$db_conn ;
include 'common.php' ;
header('content-type:application/json;charset=utf8');
$lab_db_conn  = new db_connect() ;

//global $db_conn ;
f_log("Test for log");

$db_conn = $lab_db_conn->conn ;
$result = mysqli_query("SELECT *  FROM Lab_Session_Counter  where lab_id = 1  ");
if (!$result) {
    echo 'Invalid query: ' . mysqli_error();
}

 $sql = "SELECT *  FROM Lab_Session_Counter  where lab_id = '1' ";
                $result = mysqli_query($db_conn, $sql);
		echo "\n";
 		echo "SQL result : ".mysqli_connect_error()."<br>"."Status" ;
 		echo "SQL result : ".$db_conn->connect_error."<br>"."Status" ;
		echo "\n";
 		echo "SQL result : ".mysqli_connect_errno()."<br>"."Status" ;
 		echo "SQL result : ".$db_conn->connect_errno."<br>"."Status" ;
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
?>
