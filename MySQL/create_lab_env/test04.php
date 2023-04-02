<?php
//namespace MySQL\create_lab_env ;

define('DB_SERVER', '10.102.161.40'); 
define('DB_USER', 'wxm'); 
define('DB_PWD', 'wxm123321'); 
define('DB_NAME', 'shiyan'); 
define('ROOTPATH', '/usr/share/nginx/www/'); 
define('LOG_FILE_NAME', 'log/log'); 
$lab_db_conn ;    //Lab DB class 
$db_conn ;       //common  DB connector class 
//include 'common.php' ;
header('content-type:application/json;charset=utf8');

class db_connect {
        public  $conn ;
        private $servername = DB_SERVER     ;
        private $username = DB_USER ;
        private $password = DB_PWD ;
        private $dbname = DB_NAME ;

        public function __construct()
        {
                //$this->conn = new \mysqli($this->servername, $this->username, $this->password,$this->dbname);
                //$this->conn = new \mysqli(DB_SERVER, DB_USER, DB_PWD ,DB_NAME);
                $this->conn = mysqli_connect(DB_SERVER, DB_USER, DB_PWD ,DB_NAME);
                //var_dump( $this->conn->server_info) ;
                echo "<br>";
                //var_dump( mysqli::server_info) ;
                echo "<br>";
                // 检测连接
                if ($conn->connect_error) {
                        f_log("连接失败: " . $conn->connect_error);
			return(-1) ;
                        }
                f_log("连接成功: " . $conn->connect_error);
                var_dump( $this->conn) ;
                echo "连接成功";

        }
}
/*
$lab_db_conn  = new db_connect() ;


global $db_conn ;
f_log("Test for log");

$db_conn = $lab_db_conn->$conn ;
*/
//$db_conn = get_db_connection() ;

$db_conn =  new mysqli(DB_SERVER, DB_USER, DB_PWD ,DB_NAME);
print_r($db_conn);
if($db_conn != -1)
{
	print_r($db_conn);
	$lab_id_i = 1 ;
	$lab_conf=get_lab_conf( $lab_id_i);
        printf("This is the lab   : %s <br> ", "Lab ID:". $lab_conf["lab_id"]. "lab_type:". $lab_conf["lab_type"]) ;
}
else 
        echo "Failed to get db connector" ;
?>
