<?php
$servername = "172.30.2.171";
$username = "root";
$password = "root123321";
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
$sql = "CREATE TABLE  IF NOT EXISTS MyGuests (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	reg_date TIMESTAMP
	)";
if (mysqli_query($conn, $sql)) {
	echo "数据表 MyGuests 创建成功";
	} else {
	echo "创建数据表错误: " . mysqli_error($conn);
	}


$sql = "INSERT INTO MyGuests (id , firstname, lastname, email)
VALUES (1 , '22', 'Doe', 'john@example.com');";
$sql .= "INSERT INTO MyGuests (id , firstname, lastname, email)
VALUES (2,'22', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO MyGuests (id , firstname, lastname, email)
VALUES (3,'22', 'Dooley', 'julie@example.com')";
echo $sql ;
if ($conn->multi_query($sql) === TRUE) {
		echo "新记录插入成功";
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

$my_name="Xiaoming";
$sql = ' UPDATE MyGuests  
        SET firstname='."\"".$my_name."\""." ".' WHERE id=1;';
echo $sql ; 
$result = mysqli_query($conn, $sql);
	var_dump($result);
//$result = mysqli_query($conn, 'UPDATE MyGuests SET firstname="Xiaoming" WHERE id=3;');
	var_dump($result);
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);
//
if (mysqli_num_rows($result) > 0) {
	// 输出数据
	while($row = mysqli_fetch_assoc($result)) {
	echo "<br>"."id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	var_dump($row);
	}
}
else {
	echo "0 结果";
}


$conn->close();
?>
