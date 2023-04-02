<?php
namespace  MySQL\create_lab_env ;
include '../Msg_Class.php';
$msg = new  Msg();
while(1)
{
	$ret_string=$msg->get_msg() ;
	print_r($ret_string) ;
}

?>
