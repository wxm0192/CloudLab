<?php
function checkStatus($ss)
{
	$ss=strtolower($ss);
	$s=array("running","stoped","pending","initializing","starting","created");
	//echo count($s) ;
	//print_r($s);
	foreach($s as $key=>$val)
	{
		//echo $key.'-----'.$val." \n";
		if($ss == $val) 
			{
				return true ;
			}
	}
	return false ;
}
echo "\n";
$ss="stop";
echo $ss;
echo "\n";
if(checkStatus($ss))
	echo "\nFound";
else 
	echo "\nNot Found";
?>
