<?php
//创建一个 Cookie
//Cookie 是在你的客户机存一个小文件，这个文件包含你登录时的信息
//setcookie 可以创建一个客户机的 cookie 文件
//第一个参数表示 cookie 的名称，第二个参数表示这个 cookie 名称的值
//所谓的会话结束时，就是当你这个浏览器关闭时，就没有了，就自动删除
//创建一个包含过期的 cookie, 过期时间采用当前的时间戳 + 秒即可
//time()+(7*24*60*60) 表示未来的7 天
//一旦 setcookie 改变了，一刷新浏览器，就会把旧的 cookie 覆盖掉
setcookie('name','oneStopWeb',time()+(7*24*60*60));
if(isset($_COOKIE['name'])){
echo $_COOKIE['name'];
}else{
echo '不存在此用户';
}

//setcookie('name','oneStopWeb',time()+1);
echo $_COOKIE['name'];
?>
