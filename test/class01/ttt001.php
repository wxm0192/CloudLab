<?php
//namespace test/class;
include 'lab_functions.php';
class db_connect {
	public $conn ; 

	private $servername = "172.30.2.171";
	private $username = "root";
	private $password = "root";
	private $dbname = "shiyan";
	
	public function __construct() 
	{

		echo "This is in Class : " ; 
		echo $this->servername ;
		//echo this->$servername ;
		//$conn = new mysqli("172.30.2.171", "root",  "root" ,  "shiyan");
		//$conn = new mysqli($servername, $username, $password, $dbname);
		//this->$conn = new mysqli(this->$servername, this->$username, this->$password,this->$dbname);
		/*
                var_dump( $conn->server_info) ;
                echo "<br>";
                //var_dump( mysqli::server_info) ;
                echo "<br>";
                // 检测连接
                if ($conn->connect_error) {
                        die("连接失败: " . $conn->connect_error);
                        }
                echo "连接成功";
		*/
		
	}
}
new db_connect() ; 
?>
