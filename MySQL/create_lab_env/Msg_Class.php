<?php
namespace MySQL\create_lab_env ;
class Msg {
public $msg_id ;
public $msg_type ; 
public $msg_content ;

public function __construct()
{
	$this->msg_id = msg_get_queue(100378);
	return $this->msg_id ;
}

public function send_msg( $msg_type_i , $msg_content_i  )
{
$serialize_needed=false;  // Must the transfer data be serialized ?
$block_send=false;        // Block if Message could not be send (Queue full...) (true/false)
$msgtype_send=$msg_type_i ; 
$msgtype_receive=0;       // Whiche type of Message we want to receive ? (Here, the type is the same as the type we send,
                          // but if you set this to 0 you receive the next Message in the Queue with any type.
$maxsize=400;             // How long is the maximal data you like to receive.
$option_receive=MSG_IPC_NOWAIT; // If there are no messages of the wanted type in the Queue continue without wating.
                          // If is set to NULL wait for a Message.
$message=$msg_content_i  ;
echo "\n Send Msg:".$message."\n";
if(msg_send($this->msg_id,$msgtype_send, $message,$serialize_needed, $block_send,$err)===true)
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

public function get_msg() // Get msg from $msg_id sequentially
{
$serialize_needed=false;  // Must the transfer data be serialized ?
$block_send=false;        // Block if Message could not be send (Queue full...) (true/false)
//$msgtype_send=100*((int) $lab_id) + ((int) $lab_session_id) ;
$msgtype_receive=0;       // Whiche type of Message we want to receive ? (Here, the type is the same as the type we send,
                          // but if you set this to 0 you receive the next Message in the Queue with any type.
$maxsize=400;             // How long is the maximal data you like to receive.
//$option_receive=MSG_IPC_NOWAIT; // If there are no messages of the wanted type in the Queue continue without wating.
$option_receive=0; 
                          // If is set to NULL wait for a Message.
//$message=$lab_id.":".$lab_session_id.":".$ip.":".$cmd.":".$status  ;
/*
$queue_status=msg_stat_queue($this->msg_id);
        if ($queue_status['msg_qnum']>0)
        {
                if (msg_receive($this->msg_id,$msgtype_receive  ,$msgtype_erhalten,$maxsize,$msg_data,$serialize_needed, $option_receive, $err)===true)
                {
                       	echo $msg_data ;  
			return  $msg_data ;
                }
        }
        else
        {
                 return -1  ;
        }
*/
	if (msg_receive($this->msg_id,$msgtype_receive  ,$msgtype_erhalten,$maxsize,$msg_data,$serialize_needed, $option_receive, $err)===true)
                {
                       	echo "\n";
			echo "Msg received is:".$msg_data."\n" ;  
			exec($msg_data, $output, $return_var);
			return  $output ;
                }

}

} //End of Class 
