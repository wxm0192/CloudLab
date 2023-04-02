<?php
namespace MySQL\create_lab_env ;
include 'common.php' ;
include 'Lab_Session_Counter.php' ;
include 'Lab_Session.php' ;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>ul li 横排居中</title>
    <style type="text/css">
        *{
            border: 0px;
            padding: 0px;
            background-color: rgb(238, 230, 219);
        }
        ul {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
        }

        table {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
        }

        ul li {
            list-style: none;
            text-align: center;
            line-height: 30px;
            padding: 10px;
            height: 30px;
            width: 100px;
            margin: 0 10px;
        }

        #div01 {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            height: 50%;
            width: 100%;
            display: inline-block;
            font-size:small;
        }

        .p-tbl01 {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            height: 10%;
            width: 24%;
            display: inline-block;
        }

        .t-class {
            display: flex;
            position: relative;
            justify-content: center;
            background-color: aqua;

        }
    </style>
</head>

<body>
    <div>
        <ul>
            <li>Home

            </li>
            <li>Browse</li>

        </ul>
        <ul>
            <li>Home
                <!--

                
                <span> Home01</span>
                <span>Link01</span>
            -->
            </li>
            <li>Browse</li>

        </ul>
    </div>
    <div id="div01">
        <div class="p-tbl01">
            <p class="t-class">基础实验</p>
            <table border="0">
                <tr>
                    <th>实验编号</th>
                    <th>实验内容</th>
                    
                </tr>
                <tr>
<?php
//header('content-type:html; charset=utf-8');
header('Content-Type: text/html; charset=utf-8');
//header('content-type:text/html; charset=utf-8');
$lab_db_conn ;    //Lab DB class 
$db_conn ;       //common  DB connector class 
$log = new Log() ;
$log->f_log("Test for log");
//header('content-type:application/json;charset=utf8');
$lab_db_conn  = new db_connect() ;
$db_conn = $lab_db_conn->conn ;

//print_r($db_conn);
$lab_id = $_GET['lab_id'] ;
 session_id();
 session_start();
 //$_SESSION['lab_id']=$lab_id ; 
//echo "\n Lab ID is : ".$lab_id."\n";

$this_session_id=$_SESSION['session_id'];
 //global $db_conn ;

                $sql = "SELECT  * FROM Lab  ";
                $result = mysqli_query($db_conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                        // 输出数据
                        while($row = mysqli_fetch_assoc($result)) {
                        	//echo "<br>"."id: " . $row["lab_id"]. " - Desc: " . $row["lab_desc"];
				echo "<tr>";
                        	echo "<td>".$row["lab_id"]."</td>";
                        	echo "<td>"."<a href=\"t-div01.html\">".$row["lab_desc"]."</a>"."</td>";
				echo "</tr>";
                        }
			return 1 ;
                }
                else {
                        echo "0 结果";
                        return -1 ;
                }

?>
 <td>实验02</td>
                    <td>NFS testing</td>
                </tr>
            </table>
        </div>
<div>
<body>
