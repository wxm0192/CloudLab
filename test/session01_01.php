<?php
   session_id( );
   session_start();
	echo "Session ID: ".session_id( )."<br>";
	$_SESSION['lab_id']= 1 ;
	printf("This is lab_id in first session :%s <br>", $_SESSION['lab_id']);
   session_id( );
   session_start();
	printf("This is lab_id after session_id and second session_start  :%s <br>", $_SESSION['lab_id']);
   session_id( );
	if(session_reset())
		{
			echo "<br> reset successfully <br>"; 
		}
	else
		{
			echo "<br> Failed to seset session  <br>"; 
			return -1 ; 
		}
	echo "<br>Session ID after session reset ".session_id( )."<br>";
	printf("This ia lab_id  after session reset  :%s <br>", $_SESSION['lab_id']);
	session_destroy();
	echo "<br>Session ID after session destroy  ".session_id( )."<br>";
	printf("This ia lab_id  after session destroy   :%s <br>", $_SESSION['lab_id']);
	
?>
