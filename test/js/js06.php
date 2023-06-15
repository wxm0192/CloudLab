<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JavaScript</title>
</head>
<body>
	<?php
	echo "var ECS_Status = 'Running';";
	echo "var ECS_Status = 'Stopping;";
	$check_point=1 ;
	function  Show_ECS():string 
	{
	}
	?>

    <p>当前时间为：<span id="clock"></span></p>
    <p>ECS Status is ：<span id="ecs_status"></span></p>
    <p>ECS Status is ：<span id="ecs_status2"></span></p>
    <p>Check Point is ：<span id="check_point"></span></p>
    <button onclick="stopClock(this);">停止</button><hr>
    <button onclick="delayedAlert(this);">2秒后弹出一个提示框</button>
    <button onclick="clearAlert();">取消</button>
    <script type="text/javascript">
        var intervalID;
	function loadDoc() {
	  var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      document.getElementById("demo").innerHTML =
	      this.responseText;
	    }
	  };
	  xhttp.open("GET", "/test/js/ecs_status", true);
		    document.getElementById("ecs_status2").innerHTML = xhttp.send();
	}
        function showTime() {
            var d = new Date();
            document.getElementById("clock").innerHTML = d.toLocaleTimeString();
	<?php
	$sstt="Running";
	$sstt="Stoping";
	/*
	$sstt=file_get_contents('ecs_status');
	$sstt=str_replace("\n","",$sstt);
	$a = file('./ecs_status');
	*/
	$check_point += 1;
	$handle = @fopen("./ecs_status", "r");
    	if ($handle) {
        	while (($info = fgets($handle, 1024)) !== false) {
            		$sstt =  $info;
        	}
        }
        fclose($handle);
	$sstt=str_replace("\n","",$sstt);

	echo "var ECS_Status = \"$sstt\";";
	echo "var js_check = \"$check_point\";";
	//echo "ECS_Status = 'Stopping;";
	?>
            var ecs_status = ECS_Status ;
            //var ecs_status = "Running " ;
            document.getElementById("ecs_status1").innerHTML = ecs_status ;
            document.getElementById("check_point").innerHTML = js_check  ;
        }

        function showECS() {
            var ecs_status = "Running";
            document.getElementById("ecs_status").innerHTML = ecs_status ;
        }



        function stopClock(e) {
            clearInterval(intervalID);
            e.setAttribute('disabled', true)
        }
        intervalID = setInterval(showTime, 1000);
        intervalID = setInterval(LoadDoc, 1000);
        //intervalID = setInterval(showECS , 1000);

        var timeoutID;
        var that;
        function delayedAlert(e) {
            that = e;
            timeoutID = setTimeout(showAlert, 2000);
            e.setAttribute('disabled', true)
        }
        function showAlert() {
            alert('这是一个提示框。');
            that.removeAttribute('disabled');
        }
        function clearAlert() {
            clearTimeout(timeoutID);
            that.removeAttribute('disabled');
        }
    </script>
</body>
</html>
