<!DOCTYPE html>
<html>
<body>

<h1>XMLHttpRequest 对象</h1>

<button type="button" onclick="loadDoc()">请求数据</button>

<p id="demo"></p>
 
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "http://8.142.163.140:31656/MySQL/create_lab_env/test/echo.php?time="+Math.random(), true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
  xhttp.send("fname=Bill&lname=Gates");
}
</script>

</body>
</html>

