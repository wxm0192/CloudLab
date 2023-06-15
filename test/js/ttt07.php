<!DOCTYPE html>
<html>
<body>
<p>通过循环获取服务器文件的内容 ， 根据文件的内容判断是否要退出循环</p>
<p id="count"></p>
<p >ECS Status : <span id="ecs_status"></span></p>
<p >ECS Status in if : <span id="ecs_status1"></span></p>
<script>
var num = 0;
var ecs_status  = "Stopping" ;
//创建XMLHttpRequest 对象
//参数：无
//返回值：XMLHttpRequest 对象
function createXHR () {
    var XHR = [  //兼容不同浏览器和版本得创建函数数组
        function () { return new XMLHttpRequest () },
        function () { return new ActiveXObject ("Msxml2.XMLHTTP") },
        function () { return new ActiveXObject ("Msxml3.XMLHTTP") },
        function () { return new ActiveXObject ("Microsoft.XMLHTTP") }
    ];
    var xhr = null;
    //尝试调用函数，如果成功则返回XMLHttpRequest对象，否则继续尝试
    for (var i = 0; i < XHR.length; i ++) {
        try {
            xhr = XHR[i]();
        } catch(e) {
            continue  //如果发生异常，则继续下一个函数调用
        }
        break;  //如果成功，则中止循环
    }
    return xhr;  //返回对象实例
}

function startCount(){
    	document.getElementById("count").innerHTML = num;
    	//document.getElementById("count").value = num;
	document.getElementById("ecs_status").innerHTML = ecs_status ;      
	//ecs_status = "Stopping";

	var xhr = createXHR();  //实例化XMLHttpRequest 对象
	xhr.open ("GET", "/test/js/ecs_status", false);  //建立连接
	xhr.send(null);  //发送请求
	console.log(xhr.responseText);  //接收数据
	//document.getElementById("ecs_status1").innerHTML = xhr.responseText;

	ecs_status =  xhr.responseText ;
	document.getElementById("ecs_status").innerHTML = ecs_status ;
 	//if(ecs_status == "Running" || ecs_status != "Running")
 	//if(ecs_status == "Running")
 	if( xhr.responseText == "Running")
		{
			//document.write(ecs_status);
			//document.getElementById("ecs_status1").innerHTML = ecs_status ;
			document.getElementById("ecs_status1").innerHTML = xhr.responseText  ;
			return ;
		}

	num += 1 ;
	if ( num > 60 )
		{
			return ; 
		}
 	setTimeout(startCount,2000);    //setTimeout是超时调用，使用递归模拟间歇调用
}    

setTimeout(startCount,2000);

</script>
</body>
</html>

