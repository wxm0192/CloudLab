<?php
 
 
echo "<pre />";
session_start();         //1、开启session
$sessId = session_id();  //2、获取当前的session_id。这样带到其他页面拿这个id去找session
 
$_SESSION['name'] = 'xigua';    //3、将数据存到session中
$_SESSION['age'] = 26;
var_dump($_SESSION);
?>

<html>
    <head>
    </head>
    <body>
    <button οnclick="myHref()">跳转按钮</button>

 	<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.7.2/jquery.min.js"></script>
    	<style type="text/css">
	
        <script>
            var sessId = '<?php echo $sessId;?>';       //将2、生成的session_id，带到url上
            console.log(sessId);
            function myHref(){
                    window.location.href = 'http://39.99.153.25/test/test_session_herf_01.php?id=' + sessId;
            }
        </script>
    </body>
</html>
