<?php
define('CMD_PATH', '/usr/share/nginx/www/controller/product/');
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
/*
foreach($arr as $key=>$value)
{
echo "\n".$key."----".$value;
}
*/
while($item=each($arr))
{
	echo  "\n".$item['key'].'-----'.$item['value'];
	echo  "\n".$item['0'].'-----'.$item['1'];
	echo "\n"."1"."\n" ;
}

?>
