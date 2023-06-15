<?php
header('Content-type:text/html;charset=utf-8');
session_start();

echo "set session \n" ;

echo "This is contect of Session with name : ".$_SESSION['name']."\n";
echo "This is contect of Session with email : ".$_SESSION['email']."\n";
echo "This is contect of Session with url : ".$_SESSION['url']."\n";
session_destroy();
?>

