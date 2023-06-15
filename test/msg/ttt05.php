
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
$cmd =  "/root/aliyun/vm_lab_ctl.sh new m-8vb35k67frag92hcy8pa 2110 biz_net 172.30.2.181 60 ";
$ssh_cmd  = " ssh root@172.20.0.1  "." \" ".$cmd." \"" ;
echo $ssh_cmd."<br>" ;
//$ssh_cmd = "ssh root@172.20.0.1 \" /root/aliyun/vm_lab_ctl.sh new m-8vb35k67frag92hcy8pa 2110 biz_net 172.30.2.181 60\" " ;
$s_out=passthru("$ssh_cmd"  ,$retval );
                                echo "<br>" ;
                                echo "system return:".$retval ;
                                echo "<br>" ;
                                echo "system out :".$s_out ;
                                sleep(1) ;
                                if($retval == 0 )
                                        {
                                        $status = "Running" ;
                                        }
                                        else
                                        {
                                        $status = "Abnormal" ;
                                        }

echo $ssh_cmd."<br>" ;
echo $status."<br>"  ;
?>
