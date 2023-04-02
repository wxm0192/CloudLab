<?php 
header('content-type:application/json;charset=utf8');
$ch = curl_init(); 
/*
$curl_opt = array( 
  CURLOPT_URL, "http://8.142.163.140:31656/MySQL/create_lab_env/test/called_f.php" , 
  //CURLOPT_RETURNTRANSFER,0, 
  CURLOPT_RETURNTRANSFER,1, 
  //CURLOPT_TIMEOUT,1 
); 
curl_setopt_array($ch, $curl_opt); 
*/
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, "http://8.142.163.140:31656/MySQL/create_lab_env/test/called_f.php");
curl_setopt($ch, CURLOPT_TIMEOUT , 1 );
print_r($curl_opt);

echo "\n";
var_dump($curl_opt);
$a=curl_exec($ch); 

echo  $a ;

$ret = curl_multi_getcontent(  $ch );
echo  $ret ;
curl_close($ch); 
?>
