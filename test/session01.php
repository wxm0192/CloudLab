<html>
<body>

<?php
/*

*session1.php

*/

session_id("123456");
printf("<br> This is in the session01 : %s <br>", session_id() ) ;

session_start();

$_SESSION['test']="HelloWorld!";
printf("<br> This is in the session01 : %s <br>", $_SESSION['test'] ) ;
//printf("<br> This is in the session01 : %s <br>", session_id() ) ;

//header("location:session02.php");

?>

<p><a href="http://39.99.153.25/test/session02.php" name="2" id="2">Linux JAVA 编译环境建立</a></p>


<body>
<html>
