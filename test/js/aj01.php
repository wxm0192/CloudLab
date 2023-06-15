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
  xhttp.open("GET", "/test/js/testjson.php", true);
  xhttp.send();
}
</script>

</body>
</html>

