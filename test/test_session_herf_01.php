<?php
header("content-type:text/html;charset=utf-8");         //设置编码
echo "<pre />";
 
session_id($_GET['id']);         //4、通过接收test页面传过来的session_id，取出该会话
session_start();                 //5、启动session
echo "<br> This is the called page , trying to show the session information <br>"; 
echo "<hr />";
var_dump($_SESSION);             //6、就可以取出session
?>

