<?php
session_start();
//销毁所有 session ，销毁的也慢半拍
//session_destroy();
//echo $_SESSION['name1'] ;
//echo $_SESSION['name2'] ;

echo $_SESSION['name1'] ;
echo $_SESSION['name2'] ;
//cookie适用于会员登录，购物车啊。。。
//因为他不占用服务器资源，所以会员特别多，购物车特别多的，就用 cookie
//session 一般用于后台管理登录，人少
//安全性，一段时间不操作会自动过期
?>
