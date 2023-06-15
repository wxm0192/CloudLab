<?php
namespace MySQL\create_lab_env ;
define('CMD_PATH', '/usr/share/nginx/www/controller/product/');
include_once 'Msg_Class.php';
include_once 'Lab_Session_Counter.php';

class Lab_Session {
	public  $session_record ; 
        public  $lab_id ;
        public  $session_id ;
        public  $user_id ;
        public  $session_ip ;
        public  $session_start_time  ;
        public  $session_status  ;
        public  $session_duration  ;
private function form_command($a)
{
        $cmd=CMD_PATH.$a[0];
        for($i=1 ; $i<count($a); $i++)
                {
                        $cmd = $cmd." ".$a[$i];
                }
        return $cmd ;
}

private function form_docker_command( $cmd_file, $opr_type)
{
	global $db_conn ;
	global $log ;
	global $my_lab ;

	$cmd =$cmd_file." ".$opr_type." ".$my_lab->image." ".$my_lab->tag." "
			.$my_lab->lab_id." ".$this->session_id   ;
	return $cmd ;
}
private function form_vm_command( $cmd_file, $opr_type)
{
	global $db_conn ;
	global $log ;
	global $my_lab ;
	$vm_name="vm"."_".$my_lab->lab_id."_".$this->session_id ;
	$cmd =$cmd_file." ".$opr_type." ".$my_lab->image." ".$vm_name." ".$my_lab->time_limit ;
	return $cmd ;
}
private function get_lab_session($lab_id_i , $session_id_i , $user_id_i)
{
global $db_conn ;
global $log ;
$sql = "SELECT  * FROM Lab_Session  where lab_id = '$lab_id_i' AND user_id = '$user_id_i' AND session_id = '$session_id_i' "  ;
                $result = mysqli_query($db_conn, $sql) ;
		$log->f_log("Get record from  Lab_session ".mysqli_error($db_conn));
                if (mysqli_num_rows($result) > 0) {
                        // 输出数据
                        while($row = mysqli_fetch_assoc($result)) {
                        //print_r($row);
                        $this->session_record     = $row ;
                        $this->session_ip         = $row['session_ip'];
                        $this->session_start_time = $row['session_start_time'];
                        $this->session_status     = $row['session_status'];
                        $this->session_duration   = $row['session_duration'];
			$log->f_log("Get record from  Lab_Session: ".json_encode($row));
                        return $this  ;
                        }
                }
                else {
                        echo "0 Lab_Session found ".mysqli_error($db_conn);
			$log->f_log("0 Lab_Session found ".mysqli_error($db_conn)); 
                        $this->session_record     = NULL ;
                        $this->session_ip         = NULL ;
                        $this->session_start_time = NULL ;
                        $this->session_status     = NULL ;
                        $this->session_duration   =  0  ;
                        echo "Here will throw an exception  ";
                        throw new \Exception("could not get session information  .");
                }
}
private function new_lab_session($lab_id_i , $session_id_i , $user_id_i)
{
global $db_conn ;
global $log ;
global $my_lab  ;
                //$my_lab = new Lab($lab_id_i) ;
		$new_session_id = 1 ;
		$sql="select session_id from Lab_Session where lab_id=".$lab_id_i."  order by session_id ;";
		$result = $db_conn->query( $sql);
        	if ($result->num_rows > 0) {
                        // 输出数据
                                while($row = $result->fetch_assoc()) {
					if( $new_session_id < $row['session_id'] )
						break ;
					 $new_session_id++ ;
                                }
                        }
		if($new_session_id > $my_lab->session_limit ) 
			throw new \Exception("Reach Lab Session limit : ".$new_session_id);
			
		$session_id = $new_session_id ;



		try     {
                	$my_lab_session_counter = new Lab_Session_Counter($this->lab_id);
			}
		catch( \Exception $e) {
			echo $e->getMessage();
                        throw new \Exception("could not new Lab_Session_Counter: ".$session_id_i);
			//exit -1;
			}

                if( $my_lab_session_counter->increase_lab_session_counter() > 0 )
                        {
                                $this->session_id =  $session_id ;
                                //echo "this is Session ID : ".$this->$session_id  ;
                        }
                        else
                        {
				throw new \Exception("Failed to get Session ID, Failed to new a Session");
                        	$this->session_record     = NULL ;
                                return NULL ;
                        }

 		$this->session_status = "Creating"  ;
                $time = time();         //时间戳
          	date_default_timezone_set('PRC');
                $this->session_start_time  = date('Y-m-d H:i:s',$time);
                $this->session_duration = 0 ;                    
                $this->session_ip = ''  ;

                $sql = " INSERT INTO Lab_Session ( session_id ,user_id , lab_id ,  session_ip , session_start_time , session_status ,session_duration   )
                        VALUES (
                        '$this->session_id'     ,
			'$this->user_id' ,
			'$this->lab_id' ,
                        '$this->session_ip'     ,
                        '$this->session_start_time'    ,
                        '$this->session_status' ,
                        '$this->session_duration'    
			)" ;
		echo $sql ;
                $result = mysqli_query($db_conn, $sql);
                echo "SQL result : ".mysqli_error($db_conn)."<br>"."Status" ;
		$log->f_log("Create Lab_Session : Insert  Lab_session ".mysqli_error($db_conn));
                //echo "SQL result : ".$mysqli->error."<br>"."Status" ;
                if($result)
                        {
                                echo "Insert Lab_session ok " ;
				$log->f_log("Insert Lab_session ok ");
				return $this  ;
                        }
                        else
                        {
		              	echo "Insert Lab_session failed  ".mysqli_error($db_conn) ;
				$log->f_log("Insert Lab_session failed ".mysqli_error($db_conn));
                		$rev=$my_lab_session_counter->decrease_lab_session_counter() ;
				$log->f_log("Decrease lab_session_counter  ".$rev);
                              	$this->session_record     = NULL ;
                        	throw new \Exception("could not add  session record to database  .");
                        }
}

public function  __construct($lab_id_i , $session_id_i , $user_id_i ) 
{
 	global $db_conn ;
	$this->session_id = $session_id_i ;
	$this->lab_id = $lab_id_i ;
	$this->user_id = $user_id_i ;
	if($session_id_i > 0 )
	{
		try{
			$this->get_lab_session($lab_id_i , $session_id_i , $user_id_i) ;	
			}
		catch( \Exception $e) {
			echo " Got an exception";
			echo $e->getMessage();
                       	throw new \Exception("failed with get_lab_session :".$session_id_i);
		//	exit -1;
			}

	}
	else
	{
		try{
			$this->new_lab_session($lab_id_i , $session_id_i , $user_id_i) ;	
			}
		catch( \Exception $e) {
			echo $e->getMessage();
                       	throw new \Exception("failed with new_lab_session :".$session_id_i);
		//	exit -1;
			}
	}
}

public function  set_session_ip($ip ) 
{
	global $db_conn ;
	global $log ;
	global $my_lab ;
	//$my_lab  = new Lab( $this->lab_id) ;
	$my_server_type = $my_lab->lab_type ; 
	/*
	if( $my_server_type = "docker" )
		{
		echo " Call Dokcer creater";
		}
	else
		{
		echo " Call VM  creater";
		}
	*/
	$this->session_ip=$ip ;
	$sql = "UPDATE  Lab_Session set session_ip  = '$this->session_ip'
                                                  where lab_id = '$this->lab_id'  AND 
                                                        user_id = '$this->user_id'  AND 
                                                        session_id = '$this->session_id'   
						  ";
        $result = mysqli_query($db_conn, $sql);
        echo "SQL result : ".mysqli_error($db_conn)."<br>"."Status" ;
	$log->f_log("UPDATE  Lab_Session IP  :".mysqli_error($db_conn));
        //echo "SQL result : ".$mysqli->error."<br>"."Status" ;
        if($result)
		{
			echo "Update Lab_session ok " ;
			$log->f_log("Update Lab_session IP  ok:".$ip);
		}
		else
		{
		      echo "Update Lab_session failed  ".mysqli_error($db_conn) ;
			$log->f_log("Update Lab_session IP failed ");
		}

}

public function  set_session_status($status ) 
{
	global $db_conn ;
	global $log ;
	global $my_lab ;
	//$my_lab  = new Lab( $this->lab_id) ;
	$this->session_status=$status ;
	$sql = "UPDATE  Lab_Session set session_status  = '$this->session_status'
                                                  where lab_id = '$this->lab_id'  AND 
                                                        user_id = '$this->user_id'  AND 
                                                        session_id = '$this->session_id'   
						  ";
        $result = mysqli_query($db_conn, $sql);
        echo "SQL result : ".mysqli_error($db_conn)."<br>"."Status" ;
	$log->f_log("UPDATE  Lab_Session Status :".$status.mysqli_error($db_conn));
        //echo "SQL result : ".$mysqli->error."<br>"."Status" ;
        if($result)
		{
			echo "Update Lab_session ok " ;
			$log->f_log("Update Lab_session Status  ok");
		}
		else
		{
		      echo "Update Lab_session failed  ".mysqli_error($db_conn) ;
			$log->f_log("Update Lab_session Status failed ");
		}

}

public function  get_session_status( ) 
{
	global $db_conn ;
	global $log ;
	global $my_lab ;
	$this->get_lab_session($this->lab_id , $this->session_id , $this->user_id) ;
	$log->f_log("Get  Lab_session Status : ".$this->session_status);
	return($this->session_status);
}

public function  get_session_IP( ) 
{
	global $db_conn ;
	global $log ;
	global $my_lab ;
	$this->get_lab_session($this->lab_id , $this->session_id , $this->user_id) ;
	$log->f_log("Get  Lab_session IP : ".$this->session_ip  );
	return($this->session_ip);
}
public function  check_session_IP( ) 
{
	global $db_conn ;
	global $log ;
	global $my_lab ;
	if($my_lab->lab_type == "docker")
		{
		echo " Call docker IP check";
		$podname="labpod-".$this->lab_id."-".$this->session_id ;
		$cmd=array("pod_ip_check.sh",
				$podname );
		$command=$this->form_command($cmd) ;
		}
	if($my_lab->lab_type == "vm")
		{
		echo " Call vm    IP check ";
		$vm_name="labvm-".$this->lab_id."-".$this->session_id ;
		$cmd=array("vm_get_ip.sh",
				$vm_name );
		$command=$this->form_command($cmd) ;
		}

		$return_string = exec($command, $output, $return_var);
                echo "The command exec return_string is : ".$return_string."\n" ;
                $log->f_log("The command exec return_string is : ".$return_string  );
                $log->f_log(implode("\n",$output) );
		$ip=$return_string ; 
		$ip = ltrim($ip, "\"");
		$ip = rtrim($ip, "\"");
		if(checkIp($ip))
			{
				$this->set_session_ip($ip);
			}
			else
			{
				echo "Failed to get  IP";
				return -1 ;
			}
		
}

public function  check_session_status( ) 
{
	global $db_conn ;
	global $log ;
	global $my_lab ;
	if($my_lab->lab_type == "docker")
		{
		echo " Call docker Staus  check";
		$podname="labpod-".$this->lab_id."-".$this->session_id ;
		$cmd=array("pod_status_check.sh",
				$podname );
		$command=$this->form_command($cmd) ;
		}
	if($my_lab->lab_type == "vm")
		{
		echo " Call vm Status  check ";
		$vm_name="labvm-".$this->lab_id."-".$this->session_id ;
		$cmd=array("vm_get_status.sh",
				$vm_name );
		$command=$this->form_command($cmd) ;
		}

		$return_string = exec($command, $output, $return_var);
                echo "The command exec return_string is : ".$return_string."\n" ;
                $log->f_log("The command exec return_string is : ".$return_string  );
                $log->f_log(implode("\n",$output) );
		$status=$return_string ; 
		$status = ltrim($status, "\"");
		$status = rtrim($status, "\"");
		if(checkStatus($status))
			{
				$this->set_session_status($status);
			}
			else
			{
				echo "Failed to get  Status ";
				return -1 ;
			}
		
}

public function  activate_session( ) 
{
	global $db_conn ;
	global $log ;
	global $my_lab ;
	print_r($my_lab);
	$msg = new  Msg();
	if($my_lab->lab_type == "docker")
		{
		echo " Call docker set up";
		$podname="labpod-".$this->lab_id."-".$this->session_id ;
		$image_name=$my_lab->image ;
		$tag_name=$my_lab->tag ;   
		$cmd=array("pod_create.sh",
				$image_name,
				$tag_name,
				$podname );
		}
	if($my_lab->lab_type == "vm")
		{
		echo " Call vm     set up";
		$vm_name="labvm-".$this->lab_id."-".$this->session_id ;
		$image_name=$my_lab->image ;
		$time_limit=$my_lab->time_limit ;
		// Create the VM before activate VM
		$cmd=array("vm_create.sh",
				$image_name,
				$vm_name );
		$command=$this->form_command($cmd) ;
		$msg_type=$this->lab_id * 100 + $this->session_id ; 
		$ret_v=$msg->send_msg( $msg_type, $command  );
		if($ret_v == 0)
			 $log->f_log(" Command message Send successfully !");
		else
			 $log->f_log(" Command message Send failed  !");
		sleep(3);
		$cmd=array("vm_activate.sh",
				$vm_name   ,
				$time_limit );
		}
	$command=$this->form_command($cmd) ;
	$msg_type=$this->lab_id * 100 + $this->session_id ; 
	$ret_v=$msg->send_msg( $msg_type, $command  );
	if($ret_v == 0)
		 $log->f_log(" Command message Send successfully !");
	else
		 $log->f_log(" Command message Send failed  !");
}

public function destroy_lab_session() 
{
	global $db_conn ;
	global $log ;
	global $my_lab ;

	$msg = new  Msg();
	$sql = " delete from Lab_Session  where lab_id = '$this->lab_id'  AND 
                                                        user_id = '$this->user_id'  AND 
                                                        session_id = '$this->session_id'   ";
        $result = mysqli_query($db_conn, $sql);
        echo "SQL result : ".mysqli_error($db_conn)."<br>" ;
	$log->f_log("Delete  Lab_Session  :".mysqli_error($db_conn));
        //echo "SQL result : ".$mysqli->error."<br>"."Status" ;
        if($result)
		{
			echo "Delete Lab_session ok " ;
			$log->f_log("Delete Lab_session  ok");
		}
		else
		{
		      echo "Delete Lab_session failed  ".mysqli_error($db_conn) ;
			$log->f_log("Delete Lab_session s failed (Lab_id Session_id User_id: "
							.$this->lab_id." ".$this->session_id." ".$this->user_id);
		}

	$my_lab_session_counter = new Lab_Session_Counter($this->lab_id);
	$session_id = $my_lab_session_counter->decrease_lab_session_counter() ;
                if( $session_id >= 0 )
                        {
                                echo "OK to decrease Lab_Session_Counter :".$this->lab_id ;
                                $log->f_log( "OK to decrease Lab_Session_Counter :".$this->lab_id  );
                        }
                        else
                        {
                                echo "Failed to decrease Lab_Session_Counter :".$this->lab_id ;
                                $log->f_log("Failed to decrease Lab_Session_Counter :".$this->lab_id );
                        }
	if($my_lab->lab_type == "docker")
		{
		$podname="labpod-".$this->lab_id."-".$this->session_id ;
		$cmd=array("pod_delete.sh",
				$podname );
		//$command=$this->form_command($cmd) ;
		//$msg_type=$this->lab_id * 100 + $this->session_id ; 
		//$ret_v=$msg->send_msg( $msg_type, $command  );
		//if($ret_v == 0)
		//	echo " Send successfully !\n";
		//$log->f_log("The formed command is : ".$command );
		}

	if($my_lab->lab_type == "vm")
		{
		echo " Call vm     set up";
		$vm_name="labvm-".$this->lab_id."-".$this->session_id ;
		$cmd=array("vm_delete.sh",
				$vm_name );
		}
	$command=$this->form_command($cmd) ;
	$log->f_log("The formed command is : ".$command );
	$msg_type=$this->lab_id * 100 + $this->session_id ; 
	$ret_v=$msg->send_msg( $msg_type, $command  );
	if($ret_v == 0)
		 $log->f_log(" Command message Send successfully !");
	else
		 $log->f_log(" Command message Send failed  !");


} // End of destruct

}   // End of Calss 
?>
