<?php
$servername = "10.102.161.40";
$username = "wxm";
$password = "wxm123321";
$dbname = "shiyan";
header('content-type:application/json;charset=utf8');
// 创建连接
# Tip: 如果你使用其他端口（默认为3306），为数据库参数添加空字符串，如: new mysqli("localhost", "username", "password", "", port)
$conn = new mysqli($servername, $username, $password,$dbname);
echo "<br>";
var_dump( $conn->server_info) ;
echo "<br>";
// 检测连接
if ($conn->connect_error) {
	die("连接失败: " . $conn->connect_error);
	}
echo "连接成功";
// 使用 sql 创建数据表
$sql = "SELECT lab_id ,lab_category , image , tag ,network, start_ip , level , session_limit , time_limit, online_date , lab_type   FROM Lab_conf";
$result = mysqli_query($conn, $sql);
//
if (mysqli_num_rows($result) > 0) {
	// 输出数据
	while($row = mysqli_fetch_assoc($result)) {
	//echo "<br>"."id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	echo "<br>";
	var_dump($row);
	}
}
else {
	echo "0 结果";
}
$conn->close();

$conn = new mysqli($servername, $username, $password,$dbname);
var_dump( $conn->server_info) ;
echo "<br>";
//var_dump( mysqli::server_info) ;
echo "<br>";
// 检测连接
if ($conn->connect_error) {
	die("连接失败: " . $conn->connect_error);
	}
echo "连接成功";
$l_id = 31 ;
//$sql = "SELECT lab_id , image , tag ,network, start_ip , level , session_limit , time_limit, online_date  , lab_type  FROM Lab_conf where lab_id = '$l_id' ; ";
$sql = "SELECT lab_id , image , tag ,network, start_ip , level , session_limit , time_limit, online_date  , lab_type  FROM Lab_conf where lab_id = '31' ; ";
//$sql = "SELECT lab_id , image , tag ,network, start_ip , level , session_limit , time_limit, online_date  , lab_type  FROM Lab_conf where lab_id = '$l_id' ; ";
$result = mysqli_query($conn, $sql);
//
if (mysqli_num_rows($result) > 0) {
	// 输出数据
	while($row = mysqli_fetch_assoc($result)) {
	//echo "<br>"."id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	echo "<br>";
	var_dump($row);
	print_r($row);
	}
}
else {
	echo "<br> 查询返回 0 结果";
}
$conn->close();
?>
