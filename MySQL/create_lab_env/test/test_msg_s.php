<?php
namespace  MySQL\create_lab_env ;
include '../Msg_Class.php';
$command=$_GET['cmd'];
$msg = new  Msg();
//$command="ls -l";
echo $command ;
$command = ltrim($command, "\"");
$command = rtrim($command, "\"");
$ret_v=$msg->send_msg( 10000, $command  ); 
//$ret_v=$msg->send_msg( 10000  , "ls -l"   ); 
if($ret_v == 0)
	echo " Send successfully !\n";


?>
