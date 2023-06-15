<?php

function f1($sss)
{
f_log($sss);
}



function f_log($msg)
{
$file_path = "/root/app/v02/log";
if(file_exists($file_path))
	{
        printf("This is the inputed msg  : %s <br> ", $msg);
	$fp=fopen($file_path , 'a+' ) ;
	echo date("Y-m-d H:i",time());
	$log_msg =  date("Y-m-d H:i",time()).$msg.PHP_EOL ;
	fwrite($fp,$log_msg );
	fclose($fp);

	}
}

f1("First Line ") ;
f1("Second Line ") ;
?>
