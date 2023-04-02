<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div><span>Show lab_id:</span> <span id="msg01"></span></div>
    <script>
        var redo_counter = 0;
        var counter=document.getElementById("counter") ;
        var session_ip ;
        var term_url ;
        var lab_ready = 0 ;
        var msg01=document.getElementById("msg01") ;
 
        var lab_id ;
        lab_id=<?php echo  $_GET['lab_id'] ;  ?> ;
	if(lab_id == 0)
		{
			window.location.href='http://8.142.163.140:31656/MySQL/create_lab_env/test/err_lab_id.php?lab_id='+lab_id;
		}
        console.log(lab_id) ;
        msg01.innerHTML=lab_id ;
        </script>

</body>
</html>
