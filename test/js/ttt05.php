<!DOCTYPE html>
<html>
<body>
<p>通过循环获取服务器文件的内容 ， 根据文件的内容判断是否要退出循环</p>
<p id="count"></p>
<p >ECS Status : <span id="ecs_status"></span></p>
<p >ECS Status in if : <span id="ecs_status1"></span></p>
<script>
var num = 0;
var status ;
function startCount(){
	var ecs_status ;
    document.getElementById("count").innerHTML = num;
    	//document.getElementById("count").value = num;
 	// 创建 XMLHttpRequest 对象
            var request = new XMLHttpRequest();
            // 实例化请求对象
            request.open("GET", "/test/js/ecs_status");
            // 监听 readyState 的变化
            request.onreadystatechange = function() {
                // 检查请求是否成功
                if(this.readyState === 4 && this.status === 200) {
                    // 将来自服务器的响应插入当前页面
		    ecs_status = this.responseText;
                    document.getElementById("ecs_status").innerHTML = ecs_status ;      
		    if(ecs_status != "Running") 
			{
				 //document.write(ecs_status);
				document.getElementById("ecs_status1").innerHTML = ecs_status ;      
				return ;
			}
			    //document.write(ecs_status);
		}
            };
            // 将请求发送到服务器
            request.send();
    	num += 1;
	if (num > 60 ) 
	{
		return ;
	}
    //setTimeout(startCount,1000);    //setTimeout是超时调用，使用递归模拟间歇调用
}    
while ( 



//setTimeout(startCount,1000);    
//1s后执行
</script>
</body>
</html>

