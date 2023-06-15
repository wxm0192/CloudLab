
 <?php
include 'lab_functions.php' ;
include 'lab_msg_functions.php' ;
$mylab_id = 101 ;
$lab_session_id =3 ;
$lab_session_ip = "172.30.2.182";
$ip_addr = "172.30.2.182";
if($lab_session_ip == $ip_addr)
	{
		echo "Found " ;
	}
	else 
	{
		echo " Not Found " ;
	}
?>
