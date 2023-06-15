<?php
   session_id( );
   session_start();
	printf("This ia lab_id in first session :%s <br>", $_SESSION['lab_id']);
   session_start();
   session_start();
	 $_SESSION['lab_id']="1";
   echo session_id( "www.169it.com" );
   echo "<br>"."This is session_id():".session_id()."<br>";
	printf("This ia lab_id in first session :%s <br>", $_SESSION['lab_id']);
   echo session_id(  );
   //session_start();
	printf("This ia lab_id after session_id   :%s <br>", $_SESSION['lab_id']);
   echo "<br>"."This is session_id():".session_id()."<br>";
   // 输出 www.169it.com
?>
