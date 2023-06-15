<!DOCTYPE html>
<html>
<META HTTP-EQUIV="pragma" CONTENT="no-cache"> 
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate"> 
<META HTTP-EQUIV="expires" CONTENT="0">
<body>
<p>Checking ECS Status changing :</p>
<p id="count"></p>
<p >END flag : <span id="flag"></span></p>
<p >Returned string : <span id="return_str"></span></p>
<p >ECS ID     : <span id="eid"></span></p>
<p >ECS Status : <span id="ecs_status"></span></p>
<p >ECS Status in if : <span id="ecs_status1"></span></p>
<p >ECS Status out  if : <span id="ecs_status2"></span></p>
<button onclick="Start_ECS()">Click to start the ECS  </button>
<br>
<br>
<button onclick="Stop_Checking()">Click to stop checking </button>
<button onclick="Start_Checking()">Click to start checking </button>
<script>
var num = 0;
var flag = 0 ;
var ecs_status  = "Stopping" ;
var eid ;
function Stop_Checking() {
	flag = 1 ;
	return ;
	}
function Start_Checking() {
	flag = 0 ;
	startCount() ;
	}

function Start_ECS() {
	flag = 0 ;
    	var request = new XMLHttpRequest();
    	// 实例化请求对象
    	request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
        	document.getElementById("return_str").innerHTML =  this.responseText;
        	var return_string  = this.responseText;
		return_string =  return_string.replace(/[\r\n]/g,"");
        	document.getElementById("return_str").innerHTML =  return_string   ;
		var arr =  return_string.split(":");
		eid =  arr[0] ;
		ecs_status  =  arr[1] ;
		ecs_status = ecs_status.replace(/[\r\n]/g,"");
        	//ecs_status = this.responseText;
        	document.getElementById("eid").innerHTML = eid   ;
        	document.getElementById("ecs_status").innerHTML = ecs_status  ;
		document.getElementById("ecs_status2").innerHTML = ecs_status ;      
		/* if(ecs_status == "\"Running\"") 
			{
				document.getElementById("ecs_status1").innerHTML = ecs_status ;      
				flag =  1 ; 
			}
		*/
        	}
        };
    	request.open("GET", "/test/js/ecs_status");
	request.send();
	}

function startCount(){
	if(flag == 1 ) 
		{
    			document.getElementById("flag").innerHTML = "End the qurying ";
			return ;
		}
		
    	document.getElementById("count").innerHTML = num;
    	//document.getElementById("count").value = num;
	document.getElementById("ecs_status").innerHTML = ecs_status ;      

	// 创建 XMLHttpRequest 对象
    	var request = new XMLHttpRequest();
    	// 实例化请求对象
    	request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
        	document.getElementById("return_str").innerHTML =  this.responseText;
        	var return_string  = this.responseText;
		return_string =  return_string.replace(/[\r\n]/g,"");
        	document.getElementById("return_str").innerHTML =  return_string   ;
		var arr =  return_string.split(":");
		eid =  arr[0] ;
		ecs_status  =  arr[1] ;
		ecs_status = ecs_status.replace(/[\r\n]/g,"");
        	//ecs_status = this.responseText;
        	document.getElementById("eid").innerHTML = eid   ;
        	document.getElementById("ecs_status").innerHTML = ecs_status  ;
        	//document.getElementById("ecs_status").innerHTML = ecs_status  ;
		//document.getElementById("ecs_status2").innerHTML = ecs_status ;      
		/* if(ecs_status == "\"Running\"") 
			{
				document.getElementById("ecs_status1").innerHTML = ecs_status ;      
				flag =  1 ; 
			}
		*/
        	}
        };
    var file_name = "/test/js/ecs_status" ;
    request.open("GET", file_name );
    request.send();
	num += 1 ;
	if ( num > 600 )
	{
		return ; 
	}
 	setTimeout(startCount,1000);    //setTimeout是超时调用，使用递归模拟间歇调用
}    
startCount() ;   
</script>
</body>
</html>

