<?php
namespace v03 ;
include './common.php' ;
include './Lab_Session_Counter.php' ;
include './Lab_Session.php' ;
//header('Content-Type: text/html; charset=utf-8');
//header('content-type:text/html; charset=utf-8');
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
// $_SESSION['lab_id']=$lab_id ; 
//echo "\n Lab ID is : ".$lab_id."\n";

$this_session_id=$_SESSION['session_id'];
 //global $db_conn ;
$i=0 ;
$arr=array();
		$log->f_log("logging in get_lab_infor");
		$log->f_log("Lab id in Session is : ".$_SESSION['lab_id']);
        	$log->f_log("Session id in Session is : ".$_SESSION['session_id']);
        	$log->f_log("Lab id in GET   is : ".$_GET['lab_id']);


                $sql = "SELECT  * FROM Lab WHERE lab_id = $lab_id ";
                $result = mysqli_query($db_conn, $sql);
		//var_dump($result);
		//print_r($result);
                if (mysqli_num_rows($result) > 0) {
                        // 输出数据
                        while($row = mysqli_fetch_assoc($result)) {
				$arr[$i]=$row ;
				//print_r($arr[$i]);
				$i++ ;
                        	//echo "<br>"."id: " . $row["lab_id"]. " - Desc: " . $row["lab_desc"];
				/*
				echo "<tr>";
                        	echo "<td>".$row["lab_id"]."</td>";
                        	echo "<td>"."<a href=\"t-div01.html\">".$row["lab_desc"]."</a>"."</td>";
				echo "</tr>";
				*/
                        }
			echo json_encode($arr);
			return 1 ;
                }
                else {
                        echo "0 结果";
                        return -1 ;
                }

?>
