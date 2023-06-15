<?php
session_start();
echo "Session_id is : ".$_SESSION['name']; 
echo "<br>" ; 
echo "Time is : ".date('Y m d H:i:s', $_SESSION['time']);
echo "<br>" ; 
echo "Actrual Time is : ".date('Y m d H:i:s', time());
echo "<br>" ; 
echo '<br /><a href="./session-ctl01.php">返回山一页</a>';
?>
