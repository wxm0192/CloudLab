<?php
include 'json_format_funtions.php' ;
$servername = "172.30.2.171";
$username = "root";
$password = "root";
$dbname = "shiyan";
// 创建连接
# Tip: 如果你使用其他端口（默认为3306），为数据库参数添加空字符串，如: new mysqli("localhost", "username", "password", "", port)
$mysql = new mysqli($servername, $username, $password,$dbname);
$conn=$mysql ;
header('content-type:application/json;charset=utf8');
echo "<br>";
var_dump( $mysql->server_info) ;
echo "<br>";
var_dump( $mysql->server_info) ;
echo "<br>";
echo "<br>";
// 检测连接
if ($mysql->connect_error) {
	die("连接失败: " . $mysql->connect_error);
	}
	echo "连接成功";
$query = "SELECT lab_id , image , tag ,network, start_ip , level , session_limit , time_limit, online_date   FROM Lab_conf";
$result_query = $mysql->query($query) ; 

var_dump($result_query);
$results = array();
while ($row = mysqli_fetch_assoc($result_query)) {
	var_dump($row);
	echo "<br>";
	$results[] = $row;
	}

if($results){

	$json_string =  json_encode($results);
	echo  $json_string        ;
	echo "<br>JSON Show <br>";
	echo file_put_contents("sites.txt", jsonFormat($results));
	}else{
	echo mysql_error();
	}
/* execute multi query */
/*
if ($mysql->multi_query($query)) {
	echo "<br>"; 
	var_dump($mysql);
	echo "<br>"; 
    do {
        if ($result = $mysql->store_result()) {
		echo "<br>"; 
		var_dump($result);
		echo "<br>"; 
		echo "field count :".$result->field_count;
		echo "<br>"; 

            while ($row = $result->fetch_row()) {
                printf("%s   %s\n", $row[0], $row[1]);
		echo "<br>"; 
		var_dump($row);
		echo "<br>"; 
		echo json_encode($row);

            }
            $result->free();
        }
        if ($mysql->more_results()) {
            printf("-----------------\n");
        }
    } while ($mysql->next_result());
}
*/



$mysql->close();
?>
