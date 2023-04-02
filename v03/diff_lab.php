<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div><span>Error :Show lab_id:</span> <span id="msg01"></span></div>
 <div>
        <p>
            您有正在进行的实验。
        </p>
        <p>
            请先退出正在进行的实验， 再开始本实验。
        </p>
	 <a href="http://8.142.163.140:31656/v03/list-table05.php" target="_top"> 返回主页面</a>
    </div>


 

    <script>
        var redo_counter = 0;
        var counter=document.getElementById("counter") ;
        var session_ip ;
        var term_url ;
        var lab_ready = 0 ;
        var msg01=document.getElementById("msg01") ;
 
        var lab_id ;
	
	msg01.innerHTML=<?php echo $_GET['lab_id']+0 ;?> ;
	<?php 
		echo "This is Lab ID in GET :".$_GET['lab_id']+0 ;
	?>
	/*
	<?php
	if($_GET['lab_id'] == 0 )
		{
			echo "msg01.innerHTML="."\"lab_id is 0\" ";
		}
	?>
	*/
        </script>

</body>
</html>
