<?php
session_id();
session_start();

/*
 $lab_id     = $_SESSION['lab_id'] ;
 $session_id = $_SESSION['session_id'] ;

 $_SESSION['lab_id'] = $_GET['lab_id'] ;
 $_SESSION['session_id'] = $_GET['session_id'] ;

*/
echo "Lab id is : ".$_SESSION['lab_id'] ;
echo "\n" ;
echo "<br/>";
echo "Session id is : ".$_SESSION['session_id'] ;
echo "\n" ;


