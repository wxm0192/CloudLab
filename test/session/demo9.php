<?php
session_start(); //开户 session 会话处理
//session 只要用到这个，就必须开启session_start()
//放在文件开头
//创建 session ，直接采用超级全局变量赋值即可
//session 是存在服务器端，一般存放 1440 秒，
//如果网页没有任何操作，会自动销毁，当然，可以通过 php.ini 去修改保存时间
//如果关闭了浏览器，那么也自动销毁。
//及时性，不像 cookie 会慢半拍
$_SESSION['name1'] = 'oneStopWeb';
$_SESSION['name2'] = 'oneStopWeb';
//echo $_SESSION['name'];
// if(isset($_SESSION['name'])){
// echo $_SESSION['name'];
// }else{
// echo '不存在此人。';
// }
//不是删除的方法
// $_SESSION['name'] = '';
//真正的删除方法
//unset($_SESSION['name']);
// if(isset($_SESSION['name'])){
// echo $_SESSION['name'];
// }else{
// echo '不存在此人。';
// }
?>
