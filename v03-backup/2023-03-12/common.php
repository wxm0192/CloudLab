<?php
namespace v03 ;
define('DB_SERVER', '10.102.161.40'); 
define('DB_USER', 'wxm'); 
define('DB_PWD', 'wxm123321'); 
define('DB_NAME', 'shiyan'); 
define('ROOTPATH', '/usr/share/nginx/www/'); 
define('LOG_FILE_NAME', 'log/log'); 

class Log {
	public $fp ; 
        public function __construct()
	{
	$log_file = ROOTPATH.LOG_FILE_NAME ;
	if(file_exists($log_file))
		{
		$this->fp = fopen($log_file , 'a+' ) ;
		if(!is_null($this->fp))
			return 0	;
		else
			{
			echo "Failed to open log file ";
			return -1 ;
			}
		}
	else 
		{
		echo "Log file does not exist";
		return -1 ;
		}
	}
        public function f_log($msg)  
	{
 		date_default_timezone_set('PRC');
		//echo date("Y-m-d H:i:s",time());
		$logger=" Lab_id:".$_SESSION['lab_id']." Session_id:".$_SESSION['session_id'] ;
		$log_msg =  date("Y-m-d H:i:s",time()).":".$logger." : ".$msg.PHP_EOL ;
		$rev=fwrite($this->fp,$log_msg );
		if( $rev > 0)
			return $rev ;
		else
			{
			echo " Log file writing error ";
			return -1 ; 
			}
	}

	public function __destruct() 
	{
		fclose($this->fp); 
	}
}//End of class Log 

/*
function f_log($msg)
{
	$log_file = ROOTPATH.LOG_FILE_NAME ;
	if(file_exists($log_file))
		{
		printf("This is the inputed msg  : %s <br> ", $msg);
		$fp=fopen($log_file , 'a+' ) ;
 		date_default_timezone_set('PRC');
		echo date("Y-m-d H:i:s",time());
		$log_msg =  date("Y-m-d H:i:s",time())." : ".$msg.PHP_EOL ;
		fwrite($fp,$log_msg );
		fclose($fp); 
		}
	else 
		echo "Log file does not exist";
}
*/

class db_connect {
        public $conn ;

        private $servername = DB_SERVER     ;
        private $username = DB_USER ;
        private $password = DB_PWD ;
        private $dbname = DB_NAME ;

        public function __construct()
        {
		global $log ;
                $this->conn = new \mysqli($this->servername, $this->username, $this->password,$this->dbname);
                //$this->conn = new \mysqli(DB_SERVER, DB_USER, DB_PWD ,DB_NAME);
                //var_dump( $this->conn->server_info) ;
                //echo "<br>";
                //var_dump( mysqli::server_info) ;
                //echo "<br>";
                // 检测连接
                if ($this->conn->connect_error) {
                        $log->f_log("连接失败: " . $this->conn->connect_error);
			return(-1) ;
                        }
                $log->f_log("连接成功: " . $this->conn->connect_error);
                //var_dump( $this->conn) ;
                //echo "连接成功";

        }
}

/*
function get_db_connection() 
{
$conn = new mysqli(DB_SERVER, DB_USER, DB_PWD ,DB_NAME);
if ($conn->connect_error) {
        f_log("连接失败: " . $conn->connect_error);
	return(-1) ;
        }
echo "数据库连接成功";
return($conn);
}
*/


class Lab {
	public  $lab_conf ;
	public  $lab_id ;
	public  $lab_category ;
	public  $image ;
	public  $tag    ; 
	public  $level  ; 
	public  $session_limit ;
	public  $time_limit ;
	public  $lab_type ;
	public  $author_id ;
	public  $author ;
	public  $online_date ;

	public function get_lab_conf($lab_id_i  )
	{
		global $db_conn ; 
		$sql = "SELECT  * FROM Lab where lab_id = '$lab_id_i' ";
		$result = mysqli_query($db_conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			// 输出数据
			while($row = mysqli_fetch_assoc($result)) {
			//echo "<br>"."id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
			//echo "<br>";
			//var_dump($row);
			//echo "Display row contect after select";
			//print_r($row);
			return $row ;
			}
		}
		else {
			echo "0 结果";
			return -1 ;
		}
	}

	public function __construct( $lab_id_i ) {
		global $log ;
		$lab=$this->get_lab_conf($lab_id_i) ;
		if($lab == -1)
		{
			echo "Failed to get  lab conf  ";
			 throw new \Exception("could not get Lab Configueration .");
		}
		$this->lab_conf = $lab ;
		$log->f_log( "Create a new Lab:".json_encode( $this->lab_conf ));	
		
		$this->lab_id         = $lab['lab_id'] ; 
		$this->image          = $lab['image'] ; 
		$this->lab_category   = $lab['lab_category'] ; 
		$this->tag            = $lab['tag']  ; 
		$this->session_limit  = $lab['session_limit'] ; 
		$this->time_limit     = $lab['time_limit']  ; 
		$this->lab_type       = $lab['lab_type']  ; 
		$this->level          = $lab['level']  ; 
		$this->author_id      = $lab['author_id']  ; 
		$this->author         = $lab['author']  ; 
		$this->online_date    = $lab['online_date']  ; 

		session_id();
		session_start();
		$_SESSION['lab_id']=$lab_id_i ;
		$log->f_log("_SESSION['lab_id']:".$_SESSION['lab_id']);	
	}

	public function lab_list() {
		/*
		$a = array (	'lab_id' => $this->lab_id ,
				'image_id'=> $this->image_id , 
				'tag' => $this->tag ,               
				'net_work' => $this->net_work ,               
				'start_ip' => $this->start_ip ,               
				'session_limit' => $this->session_limit ,               
				'time_limit' => $this->time_limit ,               
				'author_id' => $this->author_id  ,               
				'type' => $this->lab_type ) ;               
		print_r($a);
		*/
		print_r($this);
		} 
	
	public function get_lab_session_id() {

		}


}


/*
function get_lab_conf($lab_id_i)
{
global $db_conn ;
echo "<br>";
$sql = "SELECT *   FROM Lab  where lab_id = '$lab_id_i' ";
$result = $db_conn->query( $sql);
if ($result->num_rows > 0) {
		// 输出数据
			while($row = $result->fetch_assoc()) {
			echo "<br>"."lab_id: " . $row["lab_id"]. "lab_type:". $row["lab_type"]. "<br>";
			echo "<br>";
			var_dump($row);
                        return($row);
			}
		}
		else {
			echo "0 结果";
			return(-1) ;
		}
}
*/

function checkIp($ip)
{
    $arr = explode('.',$ip);
    if(count($arr) != 4){
        return false;
    }else{
        for($i = 0;$i < 4;$i++){
            if(($arr[$i] <'0') || ($arr[$i] > '255')){
                return false;
            }
        }
    }
    return true;
}

function checkStatus($ss)
{
        $ss=strtolower($ss);
        $s=array("running","stopped","pending","initializing","starting","created");
        //echo count($s) ;
        //print_r($s);
        foreach($s as $key=>$val)
        {
                //echo $key.'-----'.$val." \n";
                if($ss == $val)
                        {
                                return true ;
                        }
        }
        return false ;
}

function get_interval($ss)
{

	$s_time=strtotime($ss);
        $e_time =  strtotime("now") ;
        $diff_time = $e_time - $s_time ;
        return intval($diff_time / 60);

}


function destroy_session($l_id , $s_id)
{
        $lab_id = $l_id ;
        $session_id = $s_id ;

        //$url = "https://www.ifeng.com/";
        $url = "http://8.142.163.140:31656/v03/test02-6-1.php?lab_id=".$lab_id."&session_id=".$session_id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 我们在POST数据哦！
        /*
        curl_setopt($ch, CURLOPT_POST, 1);
        // 把post的变量加上
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        */
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;

}


?>
