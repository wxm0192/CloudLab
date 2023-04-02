<?php
namespace  MySQL\create_lab_env ;
include '../Msg_Class.php';
$msg = new  Msg();
$msg->send_msg( 10000  , "This is test message "); 
$ret_string=$msg->get_msg() ;
echo $ret_string ;

?>
