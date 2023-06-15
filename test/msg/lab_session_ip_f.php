<?php
include 'lab_msg_functions.php';

echo "start to add a record <br>" ;
/*
add_lab_session_ip_status(5, 3 , "172.168.31.180" , "Creating") ;
echo query_lab_session_ip_status(5, 3 , "172.168.31.180" ) ;
update_lab_session_ip_status(5, 3 , "172.168.31.180" , "Running") ;
echo query_lab_session_ip_status(5, 3 , "172.168.31.180" ) ;
del_lab_session_ip_status(5, 3 , "172.168.31.180" ) ;
echo query_lab_session_ip_status(5, 3 , "172.168.31.180" ) ;
*/
$lasting =  $_GET['redo']*1  ;
echo "实验环境的准备需要 1~3 分钟的时间 ， 请耐心等待 ， 可以先看看实验说明啊  , <br>用时 ：".$lasting."秒 ，，，，，";
$msg_id = get_message_id();
//$sss = send_msg($msg_id , $lab_id , $lab_session_id , $ip , $cmd, $status  ) ;
$operation_type = "new";
$image="m-8vb35k67frag92hcy8pa" ;
$tag="0109" ;
$network="biz_net" ;
$ip_addr="172.30.2.180";
$time_limit= 60 ;
$lab_id = 5 ;
$lab_session_id = 3 ;

$cmd = "/root/aliyun/vm_lab_ctl.sh  "." $operation_type "."  "."$image"."  "."$tag"."  "."$network"."  "."$ip_addr"."  ".$time_limit ;
$status = query_lab_session_ip_status($lab_id  , $lab_session_id , $ip_addr ) ;
if($status == -1 )
	{
	$status = "Creating" ;
	add_lab_session_ip_status($lab_id  , $lab_session_id , $ip_addr ,  $status) ;
	$sss = send_msg($msg_id , $lab_id  , $lab_session_id , $ip_addr , $cmd, $status  ) ;
	}
echo $status  ;
echo "<br> get the status of the request <br>" ;

?>
