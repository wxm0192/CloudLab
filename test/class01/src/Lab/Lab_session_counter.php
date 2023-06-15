<?php
namespace Lab;
class Lab_session_counter {
	public  $lab_id ;
	public  $lab_session_counter  ;
	public  $lab_conf ;
	public function  __construct($lab_id_i ) 
	{
		global $db_conn ; 
		$my_lab = new Lab( $lab_id_i );
		$this->lab_conf = $my_lab->lab_conf ;

		$sql = "SELECT lab_id , lab_session_counter  FROM Lab_session_counter  where lab_id = '$lab_id_i' ";
		$result = mysqli_query($db_conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
			echo "<br>";
			//var_dump($row);
			//print_r($row);
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
		//echo "lab_session_counter is :".(int)$this->lab_session_counter ;
		return (int)$this->lab_session_counter ;
	}

	public function  increase_lab_session_counter( ) 
	{
		global $db_conn ;
		if($this->lab_session_counter < $this->lab_conf['session_limit'])
			{
				$this->lab_session_counter =  $this->lab_session_counter +  1 ;
				$sql = "UPDATE  Lab_session_counter set lab_session_counter = '$this->lab_session_counter'
						  where lab_id = '$this->lab_id' ";
				$retval = mysqli_query( $db_conn, $sql );
				return  $this->lab_session_counter ;
			}
		else
			{
				echo "Reach Session Limit " ; 
				return -1 ; 
			}
	}

	public function  decrease_lab_session_counter( ) 
	{
		global $db_conn ;
		if($this->lab_session_counter > 0 )
			{
				$this->lab_session_counter =  $this->lab_session_counter -  1 ;
				$sql = "UPDATE  Lab_session_counter set lab_session_counter = '$this->lab_session_counter'
						  where lab_id = '$this->lab_id' ";
				$retval = mysqli_query( $db_conn, $sql );
				return  $this->lab_session_counter ;
			}
		else
			{
				echo "No session for this lab  " ; 
				return -1 ; 
			}
	}
}
?>
