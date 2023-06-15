<?php
header('Content-type:text/html;charset=utf-8');
session_start();
$_SESSION['name']='孙胜利';
$_SESSION['email']='1205429372@qq.com';
$_SESSION['url']='sifangku.com';

echo "set session \n" ;

echo "This is contect of Session with name : ".$_SESSION['name']."<br>";
echo "This is contect of Session with email : ".$_SESSION['email']."<br>";
echo "This is contect of Session with url : ".$_SESSION['url']."<br>";

?>

