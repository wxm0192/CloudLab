<?php
namespace MySQL\create_lab_env ;
class Lab_Session_Counter {
	public  $lsc_record ;
	public  $lab_id     ;
	public  $lab_session_counter ;
	public function  __construct($lab_id_i ) 
	{
		global $db_conn ; 
		$sql = "SELECT *  FROM Lab_Session_Counter  where lab_id = '$lab_id_i' ";
		$result = mysqli_query($db_conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
			echo "<br>";
			//var_dump($row);
			//print_r($row);
			$this->lsc_record = $row ; 
			$this->lab_id     = $row['lab_id'] ; 
			$this->lab_session_counter = $row['lab_session_cnt']; 
			return($this->lsc_record);
			}
		}
		else {
			echo "Init  lab_session_counter failed ";
			return -1 ;
		}
 	}

	public function  get_lab_session_counter( ) 
	{
		//echo "lab_session_counter is :".(int)$this->lab_session_counter ;
		return (int)$this->lab_session_counter ;
	}

	public function  increase_lab_session_counter( ) 
	{
		global $db_conn ; 
		$lab = new Lab($this->lab_id);
		echo "This current lab_session_counter :".$this->lab_session_counter ;
		echo "This lab_session_limit   :".$lab->session_limit        ;
  		
		if($this->lab_session_counter < $lab->session_limit ) {
			$this->lab_session_counter =  $this->lab_session_counter +  1 ;
			$sql = "UPDATE  Lab_Session_Counter set lab_session_cnt = '$this->lab_session_counter'
						  where lab_id = '$this->lab_id' ";
			$result = mysqli_query( $db_conn, $sql );
			if (!$result) {
				echo "Failed to update for increase_lab_session_counter ";
				return(-1);
    				//die('Invalid query: ' . mysql_error());
				}

			return  $this->lab_session_counter ;
			}
		else
			{
				echo "Reach Session Limit " ; 
				return( -1) ; 
			}
	}

	public function  decrease_lab_session_counter( ) 
	{
		global $db_conn ;
		if($this->lab_session_counter > 0 )
			{
				$this->lab_session_counter =  $this->lab_session_counter -  1 ;
				$sql = "UPDATE  Lab_Session_Counter set lab_session_cnt = '$this->lab_session_counter'
						  where lab_id = '$this->lab_id' ";
				$result = mysqli_query( $db_conn, $sql );
				if (!$result) {
					echo "failed to update for decrease_lab_session_counter ";
					return(-1);
					//die('Invalid query: ' . mysql_error());
				}
				return(  $this->lab_session_counter );
			}
		else
			{
				echo "No session for this lab  " ; 
				return( -1) ; 
			}
	}
}
?>
