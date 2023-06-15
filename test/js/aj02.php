<!DOCTYPE html>
<html>
<body>

<div id="demo">
<h1>XMLHttpRequest 对象</h1>
<button type="button" onclick="re_load()">修改内容</button>
 <p>ECS Status is ：<span id="ecs_status2"></span></p>
</div>

<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "/test/js/ecs_status", true);
  document.getElementById("ecs_status2").innerHTML =  xhttp.send();
  //xhttp.send();
}

function re_load() {
	var intervalID ;
	intervalID = setInterval(loadDoc, 1000);
}
</script>

</body>
</html>

