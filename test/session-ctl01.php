<?php
//使用SESSION前必须调用该函数。
Session_start();
 
ini_set('session.gc_maxlifetime', "5");

//注册一个SESSION变量       
$_SESSION['session_id']="1";   
$_SESSION['time']=time();
 
//如果客户端支持cookie，可通过该链接传递session到下一页。
echo '<br /><a href="./get_session_id.php">通过COOKIE传递SESSION</a>';    
//echo '<br /><a href="page2.php">通过COOKIE传递SESSION</a>';   _fcksavedurl=""page2.php">通过COOKIE传递SESSION</a>';  " 
 
//客户端不支持cookie时，使用该办法传递session.
//echo '<br /><a href="./page02.php?' . SID . '">通过URL传递SESSION</a>';
//echo '<br /><a href="page2.php?' . SID . '">通过URL传递SESSION</a>';

echo '<br /> ';
echo '<br /> ';
echo '<br /> ';
echo "session_id : ".$_SESSION['session_id'];
echo '<br /> ';
echo "Time is :".date('Y m d H:i:s', $_SESSION['time']);

if(isset($_SESSION['expiretime'])) {
 
    if($_SESSION['expiretime'] < time()) {
        unset($_SESSION['expiretime']);
        header('Location: ./logout.php?TIMEOUT'); // 登出
        exit(0);
    } else {
        $_SESSION['expiretime'] = time() + 30; // 刷新时间戳
    }
}

?>
