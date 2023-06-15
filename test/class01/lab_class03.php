<?php
namespace test\calss;
include 'lab_functions.php';
class Lab {
	public  $lab_conf ;
	private $lab_id ;
	private $image_id ;
	private $tag    ; 
	private $net_work;
	private $ip     ;
	private $session_limit ;
	private $time_limit ;
	private $type ;

	public function get_lab_conf($lab_id_i)
		{
			$file_path = "./lab.conf";
			if(file_exists($file_path))
			{
				printf("This is the inputed lab_id : %d <br> ", $lab_id_i);
				$file_arr = file($file_path);
				(int)$searched=0 ;
				for($i=0;$i<count($file_arr);$i++)
				{
					//逐行读取文件内容
					echo "file line :".$file_arr[$i]."<br />";
					list($lab_id, $image, $tag, $network, $start_ip, $session_limit, $time_limit, $type) = explode(":", $file_arr[$i] );
					if  ($lab_id == $lab_id_i )
						{
						$searched=1 ;
						return($file_arr[$i]) ;
						}
				}

				if( $searched == 0 ) 
				{
						printf("The required lab configuration not found : %d <br> ", $lab_id_i );
						return   -1 ;
				}


			}
		}

	public function __construct($lab_id_i) {
		$lab=$this->get_lab_conf($lab_id_i) ;
		if($lab == -1)
		{
			echo "Failed to create lab ";
			return -1 ; 
		}
		$this->lab_conf = $lab ;
	
		list($lab_id, $image_id, $tag, $net_work, $ip, $session_limit, $time_limit, $type) = explode(":", $lab );
		
		$this->lab_id = $lab_id ; 
		$this->image_id = $image_id ; 
		$this->tag = $tag ; 
		$this->net_work = $net_work ; 
		$this->ip = $ip ; 
		$this->session_limit = $session_limit ; 
		$this->time_limit = $time_limit  ; 
		$this->type = $type  ; 

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
				'type' => $this->type ) ;               
		print_r($a);
		} 
	


}


class Session {
	public  $lab_id ;
	public  $lab    ;
	public  $session_id ; 
	public  $session_ip ;
	
	public function  __construct($lab_id_i) {
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

//header( 'Content-Type:text/html;charset=utf-8 ');
//header('Content-type: application/atom+xml');
header('Content-type: text/css');


$my_lab= new Lab( $_GET['lab_id'] ) ;
//$my_lab = new Lab( 1  ) ;
$my_lab->lab_list() ;
/*var_dump($my_lab) ;
echo "This lab conf: "."<br>"; 
var_dump($my_lab->lab_conf) ;
echo "This lab conf: "."<br>"; 
print_r($my_lab->lab_conf) ;
*/
//$my_session = new Session(  102  ) ; 
$my_session = new Session(  $_GET['lab_id'] ) ; 
echo "<br>";
$my_session->list_lab_session_id() ;

session_destroy() ; 
?>
