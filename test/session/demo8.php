<?php
if(isset($_COOKIE['name'])){
echo '欢迎光临：'.$_COOKIE['name'];
}else {
echo '非法登录';
}
?>
