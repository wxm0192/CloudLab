<?php

date_default_timezone_set('PRC');
function get_interval($ss)
{

$s_time=strtotime($ss);
	$e_time =  strtotime("now") ;
	$diff_time = $e_time - $s_time ;
	return intval($diff_time / 60);

}

/*
echo strtotime("2023-03-04 15:24:00");
$s_time=strtotime("2023-03-04 15:24:00");

echo "\n";
echo " Start  time is : \n" ;
echo $s_time ;


//输出明天此时的时间戳
echo "\n";

$e_time =  strtotime("now") ;
echo " End time is : \n" ;
echo $e_time ;

//$diff_time = date_diff($s_time , $e_time ) ; 

echo "Diff Time is :" ;
$diff_time = $e_time - $s_time ;
echo $diff_time  ; 
echo "\n";

*/
echo get_interval("2023-03-04 15:24:00") ;
?>
