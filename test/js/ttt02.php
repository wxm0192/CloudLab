<!DOCTYPE html>
<html>
<body>

<p>带 break 的循环</p>

<p id="count"></p>
<script>
var num = 0;
function startCount(){
    document.getElementById("count").innerHTML = num;
    //document.getElementById("count").value = num;
    num += 1;
	if (num > 10 ) 
	{
		return ;
	}
    setTimeout(startCount,1000);    //setTimeout是超时调用，使用递归模拟间歇调用
}    
setTimeout(startCount,1000);    
//1s后执行
</script>
</body>
</html>

