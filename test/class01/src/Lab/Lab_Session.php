<?php
namespace Lab;

class Lab_Session {
	public  $lab_id ;
	public  $session_id ; 
	public  $session_ip ;
	public  $session_status  ;
	public  $session_start_time  ;
	public  $session_start_time_stamp   ;
	
	private function form_new_ip($addr , $i )
		{
			 list($a_s , $b_s , $c_s , $d_s) = explode(".",  $addr) ;
			 //echo "D section is ".$d_s ;
			 $d_s = (int)$d_s ;
			 $i = (int)$i ;
			 $d_s = $d_s + $i -1  ;
			 //echo "D section is ".$d_s ;
			 if($d_s > 253 )
				{
					echo "Failed to form the new IP address " ;
					return -1 ; 
				}
			 $new_add = "$a_s"."."."$b_s"."."."$c_s"."."."$d_s" ;
			 return($new_add) ;
		}

	public function  __construct( ) {
		global $db_conn ; 
		global $my_lab ; 
		global $my_lab_session_counter ;
		$this->lab_id = $my_lab->lab_id ; 
		$session_id = $my_lab_session_counter->increase_lab_session_counter() ; 
		if( $session_id > 0 )
			{
				$this->session_id =  $session_id ;
				//echo "this is Session ID : ".$this->$session_id  ;
			}
			else 
			{
				echo "Failed to get Session ID, Failed to new a Session" ;
				return -1 ; 
			}

		$session_ip = $this->form_new_ip($my_lab->start_ip , $session_id ) ;
		if( $session_ip != -1 )
			{
				$this->session_ip = $session_ip ;
			}
			else 
			{
				echo "Failed to get Session IP, Failed to new a Session" ;
				retunr -1 ; 
			}
		$this->session_status = "Creating "  ;
		$time = time();		//时间戳
		$nowtime = date('Y-m-d H:i:s',$time);
		$this->session_start_time  = $nowtime   ;
		$this->session_start_time_stamp   = $time   ;
			
		$sql = " INSERT INTO Lab_session (lab_id , session_id , session_ip , session_status ,   start_time  ) 
			VALUES ('$this->lab_id' , 
			'$this->session_id'     , 
			'$this->session_ip'     ,
			'$this->session_status' , 
			'$this->session_start_time'    )" ;
			//'$this->session_start_time_stamp') " ;

		$result = mysqli_query($db_conn, $sql);
		echo "SQL result : ".$mysqli->error."<br>"."Status" ;
		if($result)
			{
				echo "Insert Lab_session ok " ;
			}
			else
			{
				echo "Insert Lab_session failed  ".mysqli_error($db_conn) ;
			}

	}
	public function  show_lab_session() {
		//echo "Session ID in show function : ".$this->session_id ;
		 $a = array (   'lab_id' => $this->lab_id ,
                                'session_id'=> $this->session_id  ,
                                'session_ip'=> $this->session_ip   ,
                                'session_start_time'=> $this->session_start_time    ,
                                'session_start_time_stamp'=> $this->session_start_time_stamp    ,
                                'session_status'=> $this->session_status ) ;
                print_r($a);
		//echo "Session ID is : ".$a['session_id'];
	}

	public function __destruct() {
		global $db_conn ; 
		global $my_lab ; 
		global $my_lab_session_counter ;
		$sql = " DELETE FROM  Lab_session WHERE 
				lab_id       = '$this->lab_id '    and 
				session_id   = '$this->session_id' and 
				session_ip   = '$this->session_ip'  " ;
		$result = mysqli_query($db_conn, $sql);
		echo "SQL result : ".$mysqli->error."<br>"."Status" ;
		if($result)
			{
				echo "Delete Lab_session ok " ;
			}
			else
			{
				echo "Delete Lab_session failed  ".mysqli_error($db_conn) ;
			}
		$my_lab_session_counter->decrease_lab_session_counter() ;
	
	}
}

?>
