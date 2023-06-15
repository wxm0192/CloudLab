<?php
namespace test\class01;
include 'lab_functions.php';
class db_connect {
	public $conn ; 

	private $servername = "172.30.2.171";
	private $username = "root";
	private $password = "root";
	private $dbname = "shiyan";
	
	public function __construct() 
	{
		$this->conn = new \mysqli($this->servername, $this->username, $this->password,$this->dbname);
                var_dump( $this->conn->server_info) ;
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

class Lab {
	public  $lab_conf ;
	private $lab_id ;
	private $image_id ;
	private $tag    ; 
	private $net_work;
	private $ip     ;
	private $session_limit ;
	private $time_limit ;
	private $lab_type ;

	public function get_lab_conf($lab_id_i , $conn )
	{
		$sql = "SELECT lab_id , image , tag ,network, start_ip , level , session_limit , time_limit, online_date   ,lab_type 
												FROM Lab_conf where lab_id = '$lab_id_i' ";
		$result = mysqli_query($conn, $sql);
		//
		if (mysqli_num_rows($result) > 0) {
			// 输出数据
			while($row = mysqli_fetch_assoc($result)) {
			//echo "<br>"."id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
			echo "<br>";
			var_dump($row);
			print_r($row);
			return $row ;
			}
		}
		else {
			echo "0 结果";
			return -1 ;
		}
	}

	public function __construct($lab_id_i, $conn) {
		$lab=$this->get_lab_conf($lab_id_i, $conn) ;
		if($lab == -1)
		{
			echo "Failed to get  lab conf  ";
			return -1 ; 
		}
		$this->lab_conf = $lab ;
		var_dump( $this->lab_conf );	
		
		$this->lab_id = $lab['lab_id'] ; 
		$this->image_id = $lab['image'] ; 
		$this->tag = $lab['tag']  ; 
		$this->net_work = $lab['network'] ; 
		$this->ip = $lab['start_ip'] ; 
		$this->session_limit = $lab['session_limit'] ; 
		$this->time_limit = $lab['time_limit']  ; 
		$this->lab_type = $lab['lab_type']  ; 

		session_id();
		session_start();
		$_SESSION['lab_id']=$lab_id ;
	}

	public function lab_list() {
		$a = array (	'lab_id' => $this->lab_id ,
				'image_id'=> $this->image_id , 
				'tag' => $this->tag ,               
				'net_work' => $this->net_work ,               
				'ip' => $this->ip ,               
				'session_limit' => $this->session_limit ,               
				'time_limit' => $this->time_limit ,               
				'type' => $this->lab_type ) ;               
		print_r($a);
		} 
	


}


class Session {
	public  $lab_id ;
	public  $session_id ; 
	public  $session_ip ;
	public  $session_status  ;
	public  $session_start_time  ;
	
	public function  __construct($lab_id_i, $conn ) {
	$this->lab_id = $lab_id_i ;
	$this->lab = get_lab_conf($lab_id_i);
	$lab_session_id = get_lab_session_id($lab_id_i);
	
	$this->session_id = $lab_session_id ;
	echo "This is the session id :".$this->session_id ;
	$lab_session_ip = get_session_ip($lab_id_i,$lab_session_id);
	$this->session_ip = $lab_session_ip ;
		
	}
	public function  list_lab_session_id() {
		echo $this->session_id ;
		 $a = array (   'lab_id' => $this->lab_id ,
		                'lab' => $this->lab ,
                                'session_id'=> $this->session_id  , 
                                'session_ip'=> $this->session_ip ) ;
                print_r($a);
	}

}

class lab_session_counter {
	public  $lab_id ;
	public  $lab_session_counter  ;
	public  $lab_conf ;
	public function  __construct($lab_id_i, $conn ) 
	{
		$my_lab = new Lab( $lab_id_i, $conn  );
		$this->lab_conf = $my_lab->lab_conf ;
		$sql = "SELECT lab_id , lab_session_counter  FROM Lab_session_counter  where lab_id = '$lab_id_i' ";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
			echo "<br>";
			var_dump($row);
			print_r($row);
			$this->lab_id = $row['lab_id']; 
			$this->lab_session_counter = $row['lab_session_counter']; 
			}
		}
		else {
			echo "Init  lab_session_counter failed ";
			return -1 ;
		}
 	}

	public function  get_lab_session_counter( ) 
	{
		echo "lab_session_counter is :".(int)$this->lab_session_counter ;
		return (int)$this->lab_session_counter ;
	}

	public function  increase_lab_session_counter( $conn ) 
	{
		//echo "lab_session_counter is :".(int)$this->lab_session_counter ;
		if($this->lab_session_counter < $this->lab_conf['session_limit'])
			{
				$this->lab_session_counter =  $this->lab_session_counter +  1 ;
				$sql = "UPDATE  Lab_session_counter set lab_session_counter = '$this->lab_session_counter'
						  where lab_id = '$this->lab_id' ";
				$retval = mysqli_query( $conn, $sql );
				return  $this->lab_session_counter ;
			}
		else
			{
				echo "Reach Session Limit " ; 
				return -1 ; 
			}
	}
}
//header( 'Content-Type:text/html;charset=utf-8 ');
//header('Content-type: application/atom+xml');
header('Content-type: text/css');

$dbc = new db_connect() ;
$my_lab= new Lab( $_GET['lab_id'] , $dbc->conn  ) ;
$my_lab->lab_list() ;
$my_lab_session_counter = new  lab_session_counter ($_GET['lab_id'] , $dbc->conn ) ;
$my_lab_session_counter->get_lab_session_counter() ;
echo "<br>" ;
echo "Session Counter after increase  is :".$my_lab_session_counter->increase_lab_session_counter( $dbc->conn ) ;

$dbc->conn->close();
/*
$my_lab= new Lab( $_GET['lab_id'] ) ;
//$my_lab = new Lab( 1  ) ;
$my_lab->lab_list() ;
var_dump($my_lab) ;
echo "This lab conf: "."<br>"; 
var_dump($my_lab->lab_conf) ;
echo "This lab conf: "."<br>"; 
print_r($my_lab->lab_conf) ;
//$my_session = new Session(  102  ) ; 
$my_session = new Session(  $_GET['lab_id'] ) ; 
echo "<br>";
$my_session->list_lab_session_id() ;

*/
		session_id();
		session_start();
session_destroy() ; 
?>
