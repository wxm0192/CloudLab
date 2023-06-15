<!DOCTYPE html>
<html>
<body>

<h1>JavaScript 字符串方法</h1>

<p>单击“试一试”以显示在字符串拆分后的第一个数组元素。</p>

<button onclick="myFunction()">试一试</button>

<p id="demo0"></p>
<p id="demo1"></p>

<script>
function myFunction() {
  var str = "23232:\"sdfdlkklds\"";
  var arr = str.split(":");
  document.getElementById("demo0").innerHTML = arr[0];
  document.getElementById("demo1").innerHTML = arr[1];
}
</script>

</body>
</html>

