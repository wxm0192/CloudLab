<?php

echo "Start a shell command <br>";

$command = '/usr/share/nginx/www/MySQL/create_lab_env/docker-lab-start.sh  new my_web_ssh 22.1.31  6 8 ';
$a = passthru($command, $rev);
echo $a ;


$command = '/usr/share/nginx/www/MySQL/create_lab_env/docker-lab-start.sh  get  my_web_ssh 22.1.31  6 8 ';
$a = passthru($command, $rev);
echo $a ;

$command = '/usr/share/nginx/www/MySQL/create_lab_env/docker-lab-start.sh  del  my_web_ssh 22.1.31  6 8 ';
$a = passthru($command, $rev);
echo $a ;
?>
