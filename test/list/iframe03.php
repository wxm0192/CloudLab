<html>

<body>
<p>Test for iframe </p>
<iframe id="external" src="list.php" width="1000" height="300"></iframe>

<p>一些老的浏览器不支持 iframe。</p>
<p>如果得不到支持，iframe 是不可见的。</p>


</body>
<script language="javascript">
var flag = 0 ;
function StartConnect(){
		document.getElementById("external").src="http://39.99.153.25:8033/?hostname=172.30.2.180&username=root&password=V2FCQzI0ODA="
}

function startCount(){
        if(flag == 1 )
                {
                        //document.getElementById("flag").innerHTML = "End the qurying ";
                        return ;
                }

    // 创建 XMLHttpRequest 对象
        var request = new XMLHttpRequest();
        // 实例化请求对象
        request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
                //document.getElementById("return_str").innerHTML =  this.responseText;
                var return_string  = this.responseText;
                return_string =  return_string.replace(/[\r\n]/g,"");
                //document.getElementById("return_str").innerHTML =  return_string   ;
                var arr =  return_string.split(":");
                eid =  arr[0] ;
                ecs_status  =  arr[1] ;
                ecs_status = ecs_status.replace(/[\r\n]/g,"");
                //ecs_status = this.responseText;
                //document.getElementById("eid").innerHTML = eid   ;
                //document.getElementById("ecs_status").innerHTML = ecs_status  ;
                //document.getElementById("ecs_status").innerHTML = ecs_status  ;
                //document.getElementById("ecs_status2").innerHTML = ecs_status ;
		//document.getElementById("external").src="http://39.99.153.25/test/list/list01.php"
		document.getElementById("external").src="http://www.ifeng.com"
                
                }
        };
        request.open("GET", "/test/js/ecs_status");
        request.setRequestHeader("If-Modified-Since","0");
        request.setRequestHeader("Cache-Control","no-cache");
        request.send();

}

function startCount01(){
        if(flag == 1 )
                {
                        //document.getElementById("flag").innerHTML = "End the qurying ";
                        return ;
                }

    // 创建 XMLHttpRequest 对象
        var request = new XMLHttpRequest();
        // 实例化请求对象
        request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
                //document.getElementById("return_str").innerHTML =  this.responseText;
                var return_string  = this.responseText;
                return_string =  return_string.replace(/[\r\n]/g,"");
                //document.getElementById("return_str").innerHTML =  return_string   ;
                var arr =  return_string.split(":");
                eid =  arr[0] ;
                ecs_status  =  arr[1] ;
                ecs_status = ecs_status.replace(/[\r\n]/g,"");
                //ecs_status = this.responseText;
                //document.getElementById("eid").innerHTML = eid   ;
                //document.getElementById("ecs_status").innerHTML = ecs_status  ;
                //document.getElementById("ecs_status").innerHTML = ecs_status  ;
                //document.getElementById("ecs_status2").innerHTML = ecs_status ;
                 if(ecs_status == "\"Running\"")
                        {
	 			setTimeout(StartConnect,40000); 
                                //document.getElementById("ecs_status1").innerHTML = ecs_status ;
                                flag =  1 ;
                        }
                
                }
        };
        request.open("GET", "/test/js/ecs_status");
        request.setRequestHeader("If-Modified-Since","0");
        request.setRequestHeader("Cache-Control","no-cache");
        request.send();

	 setTimeout(startCount01,1000); 
}
startCount() ;

</script>
</html>

