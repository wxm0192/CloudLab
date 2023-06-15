<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JavaScript</title>
</head>
<body>
/*
<?php

function string Show_ECS_status() 
{
ECS_Status = "Running";
returning ECS_Status;
}
*/


?>
    <p>当前时间为：<span id="clock"></span></p>
    <p>ECS Status is ：<span id="ecs_status"></span></p>
    <button onclick="stopClock(this);">停止</button><hr>
    <button onclick="delayedAlert(this);">2秒后弹出一个提示框</button>
    <button onclick="clearAlert();">取消</button>
    <script type="text/javascript">
        var intervalID;
        function showTime() {
            var d = new Date();
            document.getElementById("clock").innerHTML = d.toLocaleTimeString();
/*
	<?php
	echo "var ECS_Status = 'Running';";
	?>
            var ecs_status = ECS_Status ;
*/
            var ecs_status = "Running " ;
            document.getElementById("ecs_status").innerHTML = ecs_status ;
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
