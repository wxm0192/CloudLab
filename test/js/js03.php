
 
<!DOCTYPE html>
<html>
<body>

<p>带 break 的循环</p>

<p id="demo1"></p>
<p id="demo2"></p>

<script>
var text = "";
var i;
for (i = 0; i < 3; i++) {
  if (i%3 === 0) { continue; }
  text += "数字是 " + i + "<br>";
  sleep(5);
}
document.getElementById("demo1").innerHTML = text;
</script>

<script>
/**
 *  睡眠函数
 *  @param numberMillis -- 要睡眠的毫秒数
 */
function sleep(numberMillis) {
    var now = new Date();
    var exitTime = now.getTime() + numberMillis;
    while (true) {
        now = new Date();
        if (now.getTime() > exitTime)
            return;
    }
}
for(var i = 1; i < 5 ; i++){
    console.info(i);
	document.getElementById("demo2").innerHTML = i ;
    sleep(3000);
}
</script>

</body>
</html>
