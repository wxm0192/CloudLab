<!DOCTYPE html>
<html>
<head>
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange=function() {
    if (this.readyState == 4 && this.status == 200) {
      var lab_id  = JSON.parse(this.responseText)[0].lab_id;
      document.getElementById("demo").innerHTML = lab_id;
    }
  };
  xhttp.open("GET", "http://8.142.163.140:31656/MySQL/create_lab_env/test/list_lab.php" , true);
  xhttp.send();
}
</script>
</head>
<body>

<h1>显示XMLHttpRequest 对象</h1>

<button type="button" onclick="loadDoc()">请求数据</button>

<p>显示Server返回数据</p>

<p id="demo"></p>


</body>
</html>

