<?php
namespace Lab;

class Db_connect {
	public $conn ; 

	private $servername = "172.30.2.171";
	private $username = "root";
	private $password = "root";
	private $dbname = "shiyan";
	
	public function __construct() 
	{
		$this->conn = new \mysqli($this->servername, $this->username, $this->password,$this->dbname);
                //var_dump( $this->conn->server_info) ;
                echo "<br>";
                //var_dump( mysqli::server_info) ;
                echo "<br>";
                // 检测连接
                if ($conn->connect_error) {
                        die("连接失败: " . $conn->connect_error);
                        }
                echo "连接成功";
		
	}
}
?>
