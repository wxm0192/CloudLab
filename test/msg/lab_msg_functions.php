<?php
function add_lab_session_ip_status(int $lab_id_i , int $session_id_i , $ip_i , $status_i )
{
        //返回值： 0 ： add successfully    -1：add failed  
        $file_path="./lab_session_ip_status.txt" ;
        if(is_file( $file_path ))
        {
                //取文件里面的值
                $file_arr = file($file_path);
                $fp=fopen($file_path , 'w' ) ;
                $searched = 0   ;
		$line_cout = count($file_arr) ;

                for($i=0;$i<count($file_arr);$i++)
                {
                        //逐行读取文件内容
                        //echo "file line :".$file_arr[$i]."<br />";
                        //echo "file line :".$file_arr[$i]."<br />";
                        list($lab_id, $session_id,$ip_addr , $status  ) = explode(":", $file_arr[$i] );
                        if($lab_id == $lab_id_i and $session_id_i ==  $session_id and $ip_addr == $ip_i )
                        //if($lab_id == $lab_id_i and $session_id_i ==  $session_id and strcmp($ip_addr ,  $ip_i) )
                        {
                                $searched = 1   ;
                                printf("<br> Duplicated record  : %s <br> " ,  $file_arr[$i] );
                		//return  -1  ;
                        }
                }
		
		if( $searched == 0 )
		{
			$file_arr[ $line_cout ] = $lab_id_i.":".$session_id_i.":".$ip_i.":".$status_i.PHP_EOL ;
			echo $file_arr[ $line_cout ] ;
			echo "<br> line_count is :".$line_cout."<br>";
		}
                rewind($fp);

		for($i=0; $i< count($file_arr); $i++)
			{
				//printf("<br> This the writing string : %s <br> " ,  $file_arr[$i] );
				if( $file_arr[$i] != PHP_EOL )
					fwrite($fp,$file_arr[$i]);
			}

                fclose($fp ) ;
                return  0  ;
        }
        else
        {

                printf( "<br> File %s doest not  exist ! <br> ", $file_path );
                return -1 ;
        }

}

function update_lab_session_ip_status(int $lab_id_i , int $session_id_i , $ip_i , $status_i )
{
        //返回值： 1 ： 删除成功  0：未找到记录  -1： 文件不存在
        $file_path="./lab_session_ip_status.txt" ;
        if(is_file( $file_path ))
        {
                //取文件里面的值
                $file_arr = file($file_path);
                $fp=fopen($file_path , 'w' ) ;
                $searched = 0   ;
		$line_cout = count($file_arr) ;

                for($i=0;$i<count($file_arr);$i++)
                {
                        //逐行读取文件内容
                        //echo "file line :".$file_arr[$i]."<br />";
                        //echo "file line :".$file_arr[$i]."<br />";
                        list($lab_id, $session_id,$ip_addr , $status  ) = explode(":", $file_arr[$i] );
                        if($lab_id == $lab_id_i and $session_id_i ==  $session_id and $ip_addr == $ip_i )
                        //if($lab_id == $lab_id_i and $session_id_i ==  $session_id and strcmp($ip_addr ,  $ip_i) )
                        {
                                $searched = 1   ;
				$file_arr[ $i ] = $lab_id_i.":".$session_id_i.":".$ip_i.":".$status_i.PHP_EOL ;
                                printf("<br> found and updated   : %s <br> " ,  $file_arr[$i] );
                        }
                }
		
		if( $searched == 0 )
		{
			printf("<br> Failed to find the required record  : %s , %s , %s <br> " ,  $lab_id_i ,  $session_id_i , $ip_i  );
                	//return  -1  ;

		}
 		for($i=0; $i<count($file_arr); $i++)
                        {
                                //printf("<br> This the writing string : %s <br> " ,  $file_arr[$i] );
                                if( $file_arr[$i] != PHP_EOL )
                                        fwrite($fp,$file_arr[$i]);
                        }


                fclose($fp ) ;
                return  0  ;
        }
        else
        {

                printf( "<br> File %s doest not  exist ! <br> ", $file_path );
                return -1 ;
        }

}

function del_lab_session_ip_status(int $lab_id_i , int $session_id_i , $ip_i  )
{
        //返回值： 1 ： 删除成功  0：未找到记录  -1： 文件不存在
        $file_path="./lab_session_ip_status.txt" ;
        if(is_file( $file_path ))
        {
                //取文件里面的值
                $file_arr = file($file_path);
                $fp=fopen($file_path , 'w' ) ;
                $searched = 0   ;
		$line_cout = count($file_arr) ;

                for($i=0;$i<count($file_arr);$i++)
                {
                        //逐行读取文件内容
                        //echo "file line :".$file_arr[$i]."<br />";
                        //echo "file line :".$file_arr[$i]."<br />";
                        list($lab_id, $session_id,$ip_addr , $status  ) = explode(":", $file_arr[$i] );
                        if($lab_id == $lab_id_i and $session_id_i ==  $session_id and $ip_addr == $ip_i )
                        //if($lab_id == $lab_id_i and $session_id_i ==  $session_id and strcmp($ip_addr ,  $ip_i) )
                        {
                                $searched = 1   ;
				$file_arr[ $i ] = PHP_EOL ;
				printf("<br> Found and deleted  record  : %s , %s , %s <br> " ,  $lab_id_i ,  $session_id_i , $ip_i  );
                        }
                }
		
		if( $searched == 0 )
		{
			printf("<br> Failed to find the required record  : %s , %s , %s <br> " ,  $lab_id_i ,  $session_id_i , $ip_i  );
                	//return  -1  ;

		}
 		for($i=0; $i<count($file_arr); $i++)
                        {
                                //printf("<br> This the writing string : %s <br> " ,  $file_arr[$i] );
                                if( $file_arr[$i] != PHP_EOL )
                                        fwrite($fp,$file_arr[$i]);
                        }


                fclose($fp ) ;
                return  0  ;
        }
        else
        {

                printf( "<br> File %s doest not  exist ! <br> ", $file_path );
                return -1 ;
        }

}
function query_lab_session_ip_status(int $lab_id_i , int $session_id_i , $ip_i  )
{
        //返回值：  ： String : returned status ;  -1：未找到记录  -2： 文件不存在
	if($lab_id_i == NULL or $session_id_i == NULL or  $ip_i == NULL )
		{
		return NULL ;
		}

        $file_path="./lab_session_ip_status.txt" ;
        if(is_file( $file_path ))
        {
                //取文件里面的值
                $file_arr = file($file_path);
                $fp=fopen($file_path , 'r' ) ;
                $searched = 0   ;
		$line_cout = count($file_arr) ;

                for($i=0;$i<count($file_arr);$i++)
                {
                        //逐行读取文件内容
                        //echo "file line :".$file_arr[$i]."<br />";
                        //echo "file line :".$file_arr[$i]."<br />";
                        list($lab_id, $session_id,$ip_addr , $status  ) = explode(":", $file_arr[$i] );
                        if($lab_id == $lab_id_i and $session_id_i ==  $session_id and $ip_addr == $ip_i )
                        //if($lab_id == $lab_id_i and $session_id_i ==  $session_id and strcmp($ip_addr ,  $ip_i) )
                        {
                                $searched = 1   ;
				//printf("<br> Found and rerurned  record  : %s , %s , %s <br> " ,  $lab_id_i ,  $session_id_i , $ip_i  );
				//echo "<br>";
                		fclose($fp ) ;
				return $file_arr[$i] ;
				//return $status ;
                        }
                }
		
		if( $searched == 0 )
		{
			printf("<br> Failed to find the required record  : %s , %s , %s <br> " ,  $lab_id_i ,  $session_id_i , $ip_i  );
                	fclose($fp ) ;
                	return  -1  ;

		}
        }
        else
        {

                printf( "<br> File %s doest not  exist ! <br> ", $file_path );
                return -2 ;
        }

}

function get_message_id() 
{
$queue_s = msg_get_queue(100378);
return $queue_s ;

}

function send_msg($msg_id , $lab_id , $lab_session_id , $ip , $cmd, $status  )
{
$serialize_needed=false;  // Must the transfer data be serialized ?
$block_send=false;        // Block if Message could not be send (Queue full...) (true/false)
$msgtype_send=100*((int) $lab_id) + ((int) $lab_session_id) ;
$msgtype_receive=0;       // Whiche type of Message we want to receive ? (Here, the type is the same as the type we send,
                          // but if you set this to 0 you receive the next Message in the Queue with any type.
$maxsize=400;             // How long is the maximal data you like to receive.
$option_receive=MSG_IPC_NOWAIT; // If there are no messages of the wanted type in the Queue continue without wating.
                          // If is set to NULL wait for a Message.
$message=$lab_id.":".$lab_session_id.":".$ip.":".$cmd.":".$status  ;
if(msg_send($msg_id,$msgtype_send, $message,$serialize_needed, $block_send,$err)===true) 
	{
              	//echo "Message sendet.n";
		return 0 ;
        } 
	else 
	{
              	var_dump($err);
		return -1 ;
       }
}


function get_msg($msg_id) // Get msg from $msg_id sequentially 
{
$serialize_needed=false;  // Must the transfer data be serialized ?
$block_send=false;        // Block if Message could not be send (Queue full...) (true/false)
//$msgtype_send=100*((int) $lab_id) + ((int) $lab_session_id) ;
$msgtype_receive=0;       // Whiche type of Message we want to receive ? (Here, the type is the same as the type we send,
                          // but if you set this to 0 you receive the next Message in the Queue with any type.
$maxsize=400;             // How long is the maximal data you like to receive.
$option_receive=MSG_IPC_NOWAIT; // If there are no messages of the wanted type in the Queue continue without wating.
                          // If is set to NULL wait for a Message.
//$message=$lab_id.":".$lab_session_id.":".$ip.":".$cmd.":".$status  ;
$queue_status=msg_stat_queue($msg_id);
	if ($queue_status['msg_qnum']>0)
	{
		if (msg_receive($msg_id,$msgtype_receive  ,$msgtype_erhalten,$maxsize,$daten,$serialize_needed, $option_receive, $err)===true)
		{
			return  $daten ;
			/*
			echo "Received data".$daten."n";
			$data = json_decode($json_string, true);
			list($lab_id, $lab_session_id, $cmd, $status) = explode(":", $daten );
			echo "  <br>Lab id :".$lab_id ;
			echo "  <br>Lab session  id :".$lab_session_id ;
			echo "  <br>cmd :".$cmd ;
			echo "<br>Status :".$status;
			$message=$lab_id.":".$lab_session_id.":".$cmd.":"."Running" ;
			$msgtype_send=100*((int)$lab_id) + (int)$lab_session_id ;
			echo "Start to send message <br>";
			if(msg_send($queue,$msgtype_send, $message,$serialize_needed, $block_send,$err)==true)
			{
				echo "Message sendet.n";
				echo "sent  message <br>";
				} else {
				echo "sent  message error <br>";
				var_dump($err);
			}
			*/
		}
	}
	else
	{
		 return -1  ;
	}

}


function get_lab_session_id($lab_id_i)    // Get the session id assigned for this session ; get_current_session_id() get the current session id recoreded .
{
	/*
	$lab_conf=get_lab_conf($lab_id_i);
	echo  $lab_conf ;
	if(empty( $lab_conf))
		{
			echo "Faild to get lab configuration , exit <br>";
			return -1 ;
		}
        if( $lab_conf == -1 )
        {
                 printf("The required lab configuration not found : %d <br> ", $lab_id_i );
                 return -1 ;
        }
	*/
        if((int)$_SESSION['lab_session_id']<1 or empty($_SESSION['lab_session_id']) )
                {
                        $lab_session_id=get_current_session_id( (int)$lab_id_i);    // 第一个session 返回值为 -1
                        if((int )$lab_session_id == -1)
                                {
                                 $lab_session_id=0 ;     // 对于第一个session ， lab_session_id 置为 0
                                }
                        $lab_session_id += 1 ;  
			$_SESSION['lab_session_id'] =  $lab_session_id ;
		}
		else 
		{
			$lab_session_id = $_SESSION['lab_session_id'] ;
		}
		return $lab_session_id ;
}

function lab_id_init()    //Get lab_id by _GET() and set  _Session['lab_id']  if _Session['lab_id'] failed , else get lab_id  by  _Session['lab_id']  
{
	session_id();
	session_start();
	$mylab_id= $_SESSION['lab_id'] ;
	if(empty($mylab_id))
			{
				echo "New  lab started  <br>";
				 $mylab_id = $_GET['lab_id'] ;
				if(empty($mylab_id))
					{
						echo "No GET value for lab_id <br>";
						return -1 ; 
					}
					else
					{
						echo "<br>"."lab_id is from _GET   : ".$mylab_id."<br>" ;
						$_SESSION['lab_id']=$mylab_id ;
						return  $mylab_id ;
					}
			}
			else
			{
				echo "<br>"."lab_id is from _Session : ".$mylab_id."<br>" ;
				return  $mylab_id ;
 			}
}
?>
