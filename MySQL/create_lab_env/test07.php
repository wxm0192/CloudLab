<?php

define('DB_SERVER', '10.102.161.40'); 
define('DB_USER', 'wxm'); 
define('DB_PWD', 'wxm123321'); 
define('DB_NAME', 'shiyan'); 
define('ROOTPATH', '/usr/share/nginx/www/'); 
define('LOG_FILE_NAME', 'log/log'); 
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
                echo "start to call system class mysqli "; 
                $this->conn = mysqli_connect(DB_SERVER, DB_USER, DB_PWD ,DB_NAME);
                echo "after  call system class mysqli "; 
                var_dump( $this->conn->server_info) ;
                var_dump( $this->conn) ;
                echo "<br>";
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
echo " new db connector\n ";
$lab_db_conn  = new db_connect() ;
echo " after new db connector ";

?>
