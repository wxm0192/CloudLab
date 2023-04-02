<?php
function checkIp($ip)
{
    $arr = explode('.',$ip);
    if(count($arr) != 4){
        return false;
    }else{
        for($i = 0;$i < 4;$i++){
            if(($arr[$i] <'0') || ($arr[$i] > '255')){
                return false;
            }
        }
    }
    return true;
}

if(checkIp("10.1.1.1"))
	echo "This is a valid IP"; 
	else
	echo "This is an illigal IP";

if(checkIp("510.1.1.1"))
	echo "This is a valid IP"; 
	else
	echo "This is an illigal IP";
?>
