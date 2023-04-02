<?php
header('content-type:application/json;charset=utf8');
echo "Start a shell command <br>";

$command = '/usr/share/nginx/www/controller/product/pod_ip_check.sh  labpod-1-2 ddd ';
$return_string = exec($command, $output, $return_var);
                echo "The command exec return_string is : ".$return_string."\n" ;
		print_r($output);
?>
