<?php
	$link = mysqli_connect('172.30.2.171', 'root', 'root123321');
	//$link = mysqli_connect('172.30.2.171', 'root', 'root','shiyan');
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	echo 'Connected successfully';
	mysqli_close($link);
?>
