<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>菜鸟教程(runoob.com)</title>
<script>
 var sessId = '<?php echo $sessId;?>';       //将2、生成的session_id，带到url上
            console.log(sessId);

function displayDate(){
	document.getElementById("demo").innerHTML=Date();
	 window.location.href = 'http://39.99.153.25/test/test_session_herf_01.php'+sessId  ;
}
</script>
</head>
<body>

<?php


echo "<pre />";
session_start();         //1、开启session
$sessId = session_id();  //2、获取当前的session_id。这样带到其他页面拿这个id去找session

$_SESSION['name'] = 'xigua';    //3、将数据存到session中
$_SESSION['age'] = 26;
var_dump($_SESSION);
?>


<h1>我的第一个 JavaScript 程序</h1>
<p id="demo">这是一个段落</p>

<button type="button" onclick="displayDate()">显示日期</button>

</body>
</html>
