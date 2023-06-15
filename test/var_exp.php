<?php 
$arr = array(1,2,3);
$fp = fopen('a.txt','a+');
fwrite($fp,var_export($arr,true));

echo "<br>".$arr[0]."<br>";
echo "<br>".$arr[1]."<br>";
echo "<br>".$arr[2]."<br>";

$sss=explode(":","qq:ww:1:200") ;
echo "<br>".$sss[0]."<br>";
echo "<br>".$sss[1]."<br>";
echo "<br>".$sss[2]."<br>";
echo "<br>".$sss[3]."<br>";

echo "<br>"."<br>";
var_export($sss) ;
echo "<br>"."<br>";

$ttt=$sss[0].":".$sss[1].":".$sss[2].":".$sss[3].":".$sss[4] ;

echo "<br>".$ttt."<br>";

fclose($fp);
?>
