
 
<!DOCTYPE html>
<html>
<body>

<p>带 break 的循环</p>

<p id="demo1"></p>
<p id="demo2"></p>

<script>
var text = "";
var i;
for (i = 0; i < 30; i++) {
  if (i%3 === 0) { continue; }
  text += "数字是 " + i + "<br>";
  //sleep(5);
}
document.getElementById("demo1").innerHTML = text;
</script>

<script type="text/javascript" src="testjson.php">
</script>
<script type="text/javascript" >
document.getElementById("demo2").innerHTML = jstext;
    //alert(jstext);
    //alert(test);
</script>

</body>
</html>
