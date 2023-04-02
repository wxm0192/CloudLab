<?php
	$mysqli = new mysqli('172.30.2.171', 'roo', 'root','shiyan' );
	if(!$mysqli) {
		echo"database error";
		}else{
		echo"php env successful";
	}
	$mysqli->close();
?>
