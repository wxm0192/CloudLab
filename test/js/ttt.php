<?php
$php_test = file_get_contents('ecs_status');
echo $php_test ;
$php_test=str_replace("\n","",$php_test);
echo $php_test ;
 
//$php_test="String from testjson" ;
//echo "<br>" ;
//$php_test='The ECS status is running ';
echo "var jstext='$php_test';"; 
echo "<br>"; 
echo "$php_test"; 
echo "<br>"; 
echo '$php_test'; 
?> 
