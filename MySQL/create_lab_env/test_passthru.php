<?php
header('content-type:application/json;charset=utf8');
echo "Start a shell command <br>";
echo "new Docker <br>";

$command = '/usr/share/nginx/www/MySQL/create_lab_env/docker-lab-start.sh  new my_web_ssh 22.1.31  6 8 ';
$a = passthru($command, $rev);
echo "passthru : ".$a."<br>";
echo "REV:".$rev."<br>";

?>
<?php
echo "get Docker<br> ";
$command = '/usr/share/nginx/www/MySQL/create_lab_env/docker-lab-start.sh  get  my_web_ssh 22.1.31  6 8 ';
//$a = passthru($command, $rev);
//echo "passthru : ".$a."REV:".$rev."<br>" ;
$return_string = exec($command, $output, $return_var);
echo "return_string is : ".$return_string."<br>" ;
echo "output  is : ".print_r($output)."<br>" ;
echo "return_var is : ".$return_var."<br>" ;


?>
<?php
echo "del Docker <br>";
$command = '/usr/share/nginx/www/MySQL/create_lab_env/docker-lab-start.sh  del  my_web_ssh 22.1.31  6 8 ';
$a = passthru($command, $rev);
echo "passthru : ".$a."REV:".$rev ;
?>
