<?php
header('content-type:application/json;charset=utf8');
echo "Start a shell command <br>";
echo "new Docker <br>";
$output="";
$command = '/usr/share/nginx/www/MySQL/create_lab_env/docker-lab-start.sh  new my_web_ssh 22.1.31  6 8 ';
//$command = '/usr/share/nginx/www/MySQL/create_lab_env/docker-lab-start.sh  new my_web_ssh 22.1  6 8 ';
$return_string = exec($command, $output, $return_var);
echo "return_string is : ".$return_string."\n" ;
echo "This is the output of print_r: "."\n" ;
print_r($output) ;
echo "\nreturn_var    is :".$return_var   ;
if($return_var == 4)
	{
	echo "Failed to create Docker ENV , exit";
	exit -1 ;
	}


$output="";
echo "\nget Docker\n ";
$command = '/usr/share/nginx/www/MySQL/create_lab_env/docker-lab-start.sh  get  my_web_ssh 22.1.31  6 8 ';
$return_string = exec($command, $output, $return_var);
echo "return_string is : ".$return_string."\n" ;
echo "This is the output of print_r: "."\n" ;
print_r($output) ;
echo "\nreturn_var    is :".$return_var   ;


$output="";
echo "\ndel Docker\n ";
$command = '/usr/share/nginx/www/MySQL/create_lab_env/docker-lab-start.sh  del  my_web_ssh 22.1.31  6 8 ';
$return_string = exec($command, $output, $return_var);
echo "return_string is : ".$return_string."\n" ;
echo "This is the output of print_r: "."\n" ;
print_r($output) ;
?>
