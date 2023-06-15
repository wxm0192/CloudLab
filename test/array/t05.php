<?php
function checkStatus($ss)
{
	$ss=strtolower($ss);
	$s=array("running","stoped","pending","initializing","starting","created");
	//echo count($s) ;
	//print_r($s);
	foreach($s as $item)
	{
		//echo $key.'-----'.$val." \n";
		echo "\n".$item ;
	}
}
 checkStatus("running"); 
?>
