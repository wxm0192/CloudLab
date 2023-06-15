<!DOCTYPE html>
<html>
<body>

<h1>XMLHttpRequest 对象</h1>

<p id="demo">让 AJAX 改变这段文本。</p>

<button type="button" onclick="loadDoc()">更改内容</button>

<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "http://8.142.163.140:31656/test/bootsrap/t02.php", true);
  xhttp.send();
}
</script>

</body>
</html>

