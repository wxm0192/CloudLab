
<html>

<body>
<p id="msg0">Test for iframe </p>
<p id="msg1">Test for iframe </p>
<p id="msg2>Test for iframe </p>

<!--iframe id="external" src="list.php" width="1000" height="300"></iframe> 
<iframe id="external"  width="1000" height="300"></iframe>



</body>

<?php
function checkstr($str){
 $needle ='Running';//判断是否包含a这个字符
 $tmparray = explode($needle,$str);
 if(count($tmparray)>1){
 return true;
 } else{
 return false;
 }
}

$check_string="test string ".PHP_EOL."Running Status ".PHP_EOL."测试字符串";

if( checkstr($check_string))
{
	echo "<br>included" ;
}

 $needle ='Running';
 $tmparray = explode($needle,$check_string);
 echo "<br>This is return : ".$tmparray ;
echo "<br>";
var_dump($tmparray);
 echo "<br>".count($tmparray) ;
?>
<script>
let example = "Example String!";
let ourSubstring = "Example";
 
if (example.includes(ourSubstring)) {
    //console.log("Great :The word Example is in the string.");
	document.getElementById("msg0").innerHTML =  "Great :The word Example is in the string." ;
} else {
    //console.log("The word Example is not in the string.");
	document.getElementById("msg0").innerHTML =  "The word Example is not in the string."  ;
}
</script>
</html>
