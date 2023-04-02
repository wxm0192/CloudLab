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
//var_dump( mysqli::server_info) ;
echo "<br>";
// 检测连接
if ($conn->connect_error) {
	die("连接失败: " . $conn->connect_error);
	}
echo "连接成功";
// 使用 sql 创建数据表
$sql = "DROP TABLE IF EXISTS Lab_conf " ;
if ($conn->query($sql) === TRUE) {
    echo "数据库删除成功";
} else {
    echo "Error deleting  database: " . $conn->error;
    exit( -1) ;
}
/*
if (mysqli_query($conn, $sql)) {
	echo "数据表 Lab_conf Drop 成功";
	} else {
	echo "Drop数据表错误: " . mysqli_error($conn);
	}
*/
$sql = "CREATE TABLE Lab_conf (
	lab_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	lab_category  INT(6) NOT NULL ,
	image  VARCHAR(30) NOT NULL,
	tag  VARCHAR(30) NOT NULL,
	network  VARCHAR(30) NOT NULL,
	start_ip  VARCHAR(30) NOT NULL,
	level   VARCHAR(30) NOT NULL,
	session_limit   INT(4) NOT NULL,
	time_limit   INT(4) NOT NULL,
	lab_type  VARCHAR(30) ,
	lab_desc  VARCHAR(100) ,
	author  VARCHAR(50),
	online_date  TIMESTAMP
	)";
//if (mysqli_query($conn, $sql)) {
if ($conn->query($sql) === TRUE) {
	echo "数据表 Lab_conf 创建成功";
	} else {
	echo "创建数据表错误: " . mysqli_error($conn);
	}
	//$conn->begin_transaction() ;
	//echo "commited : " . mysqli_error($conn)."<br>";
$dd=date("Y-m-d") ;
$sql = "INSERT INTO Lab_conf (lab_id ,lab_category, image , tag ,network, start_ip , level , session_limit , time_limit, online_date ,lab_type  )  
VALUES (1 , 1, 'my_web_ssh',  '09.01.01' , 'biz_net', '169.10.0.3', 0 , 10 , 30 , ' $dd ' , 'docker' );";
//VALUES (1 , 'my_web_ssh',  '09.01.01' , 'biz_net', '169.10.0.3', 0 , 10 , 30 , ' $dd '  );";
$sql .= "INSERT INTO Lab_conf (lab_id ,lab_category,  image , tag ,network, start_ip , level , session_limit , time_limit, online_date ,lab_type  ) 
VALUES (31 , 1, 'lab_redis', '1107' , 'biz_net', '169.10.0.150', 0 , 10 , 30 , ' $dd ' , 'docker' );";
$sql .= "INSERT INTO Lab_conf (lab_id ,lab_category,  image , tag ,network, start_ip , level , session_limit , time_limit, online_date ,lab_type  ) 
VALUES (41 , 1, 'lab_redis', '1108' , 'biz_net', '169.10.0.150', 0 , 10 , 30 , ' $dd ' , 'docker' );";
echo $sql ;
if ($conn->multi_query($sql) === TRUE) {
		echo "新记录插入成功"."<br>";
	
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	//$conn->commit();
	//echo "commited : " . mysqli_error($conn)."<br>";
echo "<br>";
$sql = "SELECT lab_id ,lab_category , image , tag ,network, start_ip , level , session_limit , time_limit, online_date , lab_type   FROM Lab_conf";
$result = $conn->query( $sql);
//$result = mysqli_query($conn, $sql);
//
//if (mysqli_num_rows($result) > 0) {
if ($result->num_rows > 0) {
	// 输出数据
	//while($row = mysqli_fetch_assoc($result)) {
	while($row = $result->fetch_assoc()) {
	echo "<br>"."lab_id: " . $row["lab_id"]. "lab_type:". $row["lab_type"]. "<br>";
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
$sql = "SELECT lab_id ,lab_category , image , tag ,network, start_ip , level , session_limit , time_limit, online_date , lab_type   FROM Lab_conf";
$result = $conn->query( $sql);
//$result = mysqli_query($conn, $sql);
//
//if (mysqli_num_rows($result) > 0) {
if ($result->num_rows > 0) {
	// 输出数据
	//while($row = mysqli_fetch_assoc($result)) {
	while($row = $result->fetch_assoc()) {
	echo "<br>"."lab_id: " . $row["lab_id"]. "lab_type:". $row["lab_type"]. "<br>";
	echo "<br>";
	var_dump($row);
	}
}
else {
	echo "再次打开数据库读出0 结果";
}

$l_id = 41 ;
$sql = "SELECT lab_id , image , tag ,network, start_ip , level , session_limit , time_limit, online_date  , lab_type  FROM Lab_conf where lab_id = '$l_id' ; ";
//$sql = "SELECT lab_id , image , tag ,network, start_ip , level , session_limit , time_limit, online_date  , lab_type  FROM Lab_conf where lab_id = '31' ; ";
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
