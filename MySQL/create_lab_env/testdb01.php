<?php
include 'common.php' ;
//$conn = new mysqli("10.102.161.40", "wxm" ,  "wxm123321" , "shiyan" );
$conn = new mysqli(DB_SERVER, DB_USER, DB_PWD ,DB_NAME);
//echo  mysqli(constant("DB_SERVER"), constant("DB_USER"), constant("DB_PWD") ,constant("DB_NAME"));
//$conn = new mysqli(constant("DB_SERVER"), constant("DB_USER"), constant("DB_PWD") ,constant("DB_NAME"));


//$mysqli = new mysqli("172.30.2.171",  "root","root123321", "shiyan");
echo "<br>";
var_dump( $conn->server_info) ;
if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
        }
echo "连接成功";


$conn->close();

?>

