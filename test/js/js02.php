<!DOCTYPE html>
<html>
<body>

<p>带 break 的循环</p>

<p id="demo"></p>

<script>
var text = "";
var i;
for (i = 0; i < 10; i++) {
  if (i%3 === 0) { continue; }
  text += "数字是 " + i + "<br>";
}
document.getElementById("demo").innerHTML = text;
</script>

</body>
</html>
