<?php
//如果姓名的指定的姓名相同，那么就生成一个 cookie
//完成登录
if(isset($_POST['username']) && $_POST['username']=='oneStopWeb'){
//如果正确了，我生成一个 cookie，再跳转
setcookie('name','web');
header('Location:demo8.php');
}else{
header('Location:demo6.php');
}
?>
