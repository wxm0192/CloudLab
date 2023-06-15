<?php
namespace Lab;

class Lab {
	public  $lab_conf ;
	public  $lab_id ;
	public  $image_id ;
	public  $tag    ; 
	public  $net_work;
	public  $start_ip     ;
	public  $session_limit ;
	public  $time_limit ;
	public  $lab_type ;

	public function get_lab_conf($lab_id_i  )
	{
		global $db_conn ; 
		$sql = "SELECT lab_id , image , tag ,network, start_ip , level , session_limit , time_limit, online_date   ,lab_type 
												FROM Lab_conf where lab_id = '$lab_id_i' ";
		$result = mysqli_query($db_conn, $sql);
		//
		if (mysqli_num_rows($result) > 0) {
			// 输出数据
			while($row = mysqli_fetch_assoc($result)) {
			//echo "<br>"."id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
			echo "<br>";
			//var_dump($row);
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
		$lab=$this->get_lab_conf($lab_id_i) ;
		if($lab == -1)
		{
			echo "Failed to get  lab conf  ";
			return -1 ; 
		}
		$this->lab_conf = $lab ;
		//var_dump( $this->lab_conf );	
		
		$this->lab_id = $lab['lab_id'] ; 
		$this->image_id = $lab['image'] ; 
		$this->tag = $lab['tag']  ; 
		$this->net_work = $lab['network'] ; 
		$this->start_ip = $lab['start_ip'] ; 
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
				'start_ip' => $this->start_ip ,               
				'session_limit' => $this->session_limit ,               
				'time_limit' => $this->time_limit ,               
				'type' => $this->lab_type ) ;               
		print_r($a);
		} 
	
	public function get_lab_session_id() {

		}


}

?>
