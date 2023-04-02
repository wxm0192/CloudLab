<?php
$servername = "172.30.2.171";
$username = "root";
$password = "root";
$dbname = "shiyan";
header('content-type:application/json;charset=utf8');
// 创建连接
# Tip: 如果你使用其他端口（默认为3306），为数据库参数添加空字符串，如: new mysqli("localhost", "username", "password", "", port)
$mysql = new mysqli($servername, $username, $password,$dbname);


$con = mysqli_connect($servername,$username ,$password );
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db_selected = mysqli_select_db($con,$dbname );
$sql = "SELECT * from Lab_conf";
$result = mysqli_query($con , $sql);
$row=mysqli_fetch_assoc($result);
while($row )
	{
	echo $row['_msg'];
	echo "<br>";
	print_r( json_encode($row));
	echo "<br>";
	$row=mysqli_fetch_assoc($result);
	}

mysqli_close($con);


?>
