<?php
namespace v03 ;
class Lab_Session_Counter {
	public  $lsc_record ;
	public  $lab_id     ;
	public  $lab_session_counter ;
	public function  __construct($lab_id_i ) 
	{
		global $db_conn ; 
 		global $log ;
		$sql = "SELECT *  FROM Lab_Session_Counter  where lab_id = '$lab_id_i' ";
		$result = mysqli_query($db_conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
			//echo "<br>";
			//var_dump($row);
			//print_r($row);
			$this->lsc_record = $row ; 
			$this->lab_id     = $row['lab_id'] ; 
			$this->lab_session_counter = $row['lab_session_cnt']; 
			$log->f_log( "Get Lab_Session_Counter : ".json_encode($this));
			return($this->lsc_record);
			}
		}
		else {
	 		$sql = " INSERT INTO Lab_Session_Counter ( lab_id , lab_session_cnt   )
                        VALUES (
                        '$lab_id_i'     ,
                        '0'               
			)" ;
			$result = mysqli_query($db_conn, $sql);
			if (!$result) {
				echo "Failed to insert new record to lab_session_counter ";
				$log->f_log("Failed to insert new record to increase_lab_session_counter ".mysqli_error($db_conn));
				throw new \Exception("could not add Lab_Session_Counter  to the database.");
				}
			
			$this->lab_id = $lab_id_i   ; 
			$this->lab_session_counter = 0 ; 
			$log->f_log( "Add new record to increase_lab_session_counter with lab_session_cnt = 0  ".$lab_id_i);
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
		global $log     ; 
		
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
				$log->f_log("Failed to update for increase_lab_session_counter ".mysqli_error($db_conn));
				return(-1);
    				//die('Invalid query: ' . mysql_error());
				}

			$log->f_log("Increased lab_session_counter : ".$this->lab_session_counter);
			return  $this->lab_session_counter ;
			}
		else
			{
				echo "Reach Session Limit " ; 
				$log->f_log("Increase lab_session_counter : "."Reach Session Limit"."Lab ID:".$this->lab_id);
				return( -1) ; 
			}
	}

	public function  decrease_lab_session_counter( ) 
	{
		global $db_conn ;
		global $log     ; 
		if($this->lab_session_counter > 0 )
			{
				$this->lab_session_counter =  $this->lab_session_counter -  1 ;
				$sql = "UPDATE  Lab_Session_Counter set lab_session_cnt = '$this->lab_session_counter'
						  where lab_id = '$this->lab_id' ";
				$result = mysqli_query( $db_conn, $sql );
				if (!$result) {
					echo "failed to update for decrease_lab_session_counter ";
					$log->f_log("failed to update for decrease_lab_session_counter ".mysqli_error($db_conn));
					return(-1);
				}
				return(  $this->lab_session_counter );
			}
		else
			{
				echo "No record for this session in Lab_Session_Counter  " ; 
				$log->f_log("No record for this session in Lab_Session_Counter  : "
						."Lab ID:".$this->lab_id);
				return( -1) ; 
			}
	}
}
?>
