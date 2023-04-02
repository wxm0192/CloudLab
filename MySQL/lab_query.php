<?php
$servername = "172.30.2.171";
$username = "root";
$password = "root";
$dbname = "shiyan";
// 创建连接
# Tip: 如果你使用其他端口（默认为3306），为数据库参数添加空字符串，如: new mysqli("localhost", "username", "password", "", port)
$conn = new mysqli($servername, $username, $password,$dbname);
echo "<br>";
var_dump( $conn->server_info) ;
echo "<br>";
var_dump( $conn->server_info) ;
echo "<br>";
//var_dump( mysqli::server_info) ;
echo "<br>";
// 检测连接
if ($conn->connect_error) {
	die("连接失败: " . $conn->connect_error);
	}
	echo "连接成功";
// 使用 sql 创建数据表
/*
$sql = "CREATE TABLE Lab_conf (
	lab_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	image  VARCHAR(30) NOT NULL,
	tag  VARCHAR(30) NOT NULL,
	network  VARCHAR(30) NOT NULL,
	start_ip  VARCHAR(30) NOT NULL,
	level   VARCHAR(30) NOT NULL,
	session_limit   INT(4) NOT NULL,
	time_limit   INT(4) NOT NULL,
	lab_desc  VARCHAR(100) ,
	author  VARCHAR(50),
	online_date  TIMESTAMP
	)";
if (mysqli_query($conn, $sql)) {
	echo "数据表 Lab_conf 创建成功";
	} else {
	echo "创建数据表错误: " . mysqli_error($conn);
	}
	$conn->begin_transaction() ;
	echo "commited : " . mysqli_error($conn)."<br>";
$dd=date("Y-m-d H:i:s") ;
$sql = "INSERT INTO Lab_conf (lab_id , image , tag ,network, start_ip , level , session_limit , time_limit, online_date  )  
VALUES (1 , 'my_web_ssh',  '09.01.01' , 'biz_net', '169.10.0.3', 0 , 10 , 30 , ' $dd '  );";
$sql .= "INSERT INTO Lab_conf (lab_id , image , tag ,network, start_ip , level , session_limit , time_limit, online_date  ) 
VALUES (31 , 'lab_redis', '1107' , 'biz_net', '169.10.0.150', 0 , 10 , 30 , ' $dd '  );";
echo $sql ;
if ($conn->multi_query($sql) === TRUE) {
		echo "新记录插入成功"."<br>";
	
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->commit();
	echo "commited : " . mysqli_error($conn)."<br>";
echo "<br>";
*/
$sql = "SELECT lab_id , image , tag ,network, start_ip , level , session_limit , time_limit, online_date   FROM Lab_conf";
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
?>
