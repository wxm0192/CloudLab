<?php
define('CMD_PATH', '/usr/share/nginx/www/controller/product/');
function form_command($a)
{
	$cmd=$a[0];
	for($i=1 ; $i<count($a); $i++)
		{
			$cmd = $cmd." ".$a[$i];
		}
	return $cmd ;
}
$c=array("5","10");
echo count($c) ;
print_r($c);
$command = form_command($c);
echo $command ;
echo "\n";
$c=array(CMD_PATH."pod_create.sh","IMG-1122","latest","labpod-6-8");
$command = form_command($c);
echo $command ;
$arr=array(
	'pod_create'=>"pod_create.sh",
	'pod_ip_check'=>"pod_ip_check.sh",
	'pod_status_check'=>"pod_status_check.sh",
	'pod_delete'=>"pod_delete.sh",
	'vm_create'=>"vm_create.sh",
	'vm_activate'=>"vm_activate.sh",
	'vm_delete'=>"vm_delete.sh",
	'vm_get_ip'=>"vm_get_ip.sh",
	'vm_get_pub_ip'=>"vm_get_pub_ip.sh",
	'vm_get_status'=>"vm_get_status.sh"
);

print_r($arr);
$arg='pod_ip_check';
print_r($arr[$arg]);
$arg='pod_status_check';
print_r($arr[$arg]);

$a1="ww.sh";
$a2="podname";

echo "\n";
$cmd=array(
$a1 ,
$a2);
echo form_command($cmd);

?>
