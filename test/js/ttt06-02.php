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
<p >Public IP  : <span id="pip"></span></p>
<p >Private IP  : <span id="pv_ip"></span></p>
<p >ECS Status : <span id="ecs_status"></span></p>
<p >ECS Status in if : <span id="ecs_status1"></span></p>
<p >ECS Status out  if : <span id="ecs_status2"></span></p>
<button onclick="Start_ECS()">Click to start the ECS  </button>
<button onclick="Stop_ECS()">Click to stop the ECS  </button>
<br>
<br>
<button onclick="Stop_Checking()">Click to stop checking </button>
<button onclick="Start_Checking()">Click to start checking </button>
<br>
<br>
<button onclick="Get_public_ip()">Get Public IP  </button>
<button onclick="ssh_vm()">SSH VM  </button>
<p >eid in get pip   : <span id="debug1"></span></p>
<p >Debug  : <span id="debug"></span></p>
<p >return test in get pip  : <span id="debug01"></span></p>
<script>
var num = 0;
var flag = 0 ;
var ecs_status  = "Stopping" ;
var eid ;
var pip;
var pv_ip;
function Stop_Checking() {
	flag = 1 ;
	return ;
	}
function Start_Checking() {
	flag = 0 ;
	startCount() ;
	}
function ssh_vm() {
	flag = 0 ;
    	var request = new XMLHttpRequest();
    	// 实例化请求对象
    	request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
        	//var return_string  = this.responseText;
		//return_string =  return_string.replace(/[\r\n]/g,"");
		//Get_public_ip();
        	}
        };
	var url="/test/js/ssh_vm.php?pv_ip="+pv_ip ;
    	request.open("GET", url);
	request.send();
	//Get and display ECS Public IP 
	}


function Get_public_ip() {
    	var request = new XMLHttpRequest();
    	// 实例化请求对象
    	request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
        	//var return_string  = this.responseText;
		//return_string =  return_string.replace(/[\r\n]/g,"");

 	var myObj = JSON.parse(this.responseText);
            document.getElementById("debug01").innerHTML = this.responseText        ;
            //document.getElementById("ECS").innerHTML = myObj.Instances.Instance[0].Status;
            //document.getElementById("ECS2").innerHTML = myObj.Instances.Instance[1].Status;
        pip  = myObj.Instances.Instance[0].PublicIpAddress.IpAddress;
        document.getElementById("pip").innerHTML = pip ;
        pv_ip  = myObj.Instances.Instance[0].NetworkInterfaces.NetworkInterface[0].PrimaryIpAddress ;
        document.getElementById("pv_ip").innerHTML = pv_ip ;
        	}
        };
		//Waiting for further debugging ......................................................................................
		document.getElementById("debug1").innerHTML = eid   ;
		var tmp_str = eid ;
		//tmp_str = tmp_str.replace(/\"/g , "");
		if(tmp_str != null ) {
			tmp_str = tmp_str.replace(/\"/g , "");
		}
		//tmp_str=eid.replace(/\"/g,"");
		var ECS_file = "/test/js/"+tmp_str+".out"
		document.getElementById("debug").innerHTML = "This is the file Name :"+ECS_file   ;
		request.open("GET", ECS_file,true);
		request.send();
	}

function Start_ECS() {
	flag = 0 ;
    	var request = new XMLHttpRequest();
    	// 实例化请求对象
    	request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
        	//var return_string  = this.responseText;
		//return_string =  return_string.replace(/[\r\n]/g,"");
		Get_public_ip();
        	}
        };
    	request.open("GET", "/test/js/start_ecs.php");
	request.send();
	//Get and display ECS Public IP 
	}

function Stop_ECS() {
	flag = 0 ;
    	var request = new XMLHttpRequest();
    	// 实例化请求对象
    	request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
    		document.getElementById("debug").innerHTML = this.responseText  ;
        	//var return_string  = this.responseText;
		//return_string =  return_string.replace(/[\r\n]/g,"");
        	}
        };
	eid=eid.replace(/\"/g,""); 
	var  file_name ="/test/js/end_ecs.php?&eid="+eid ;
    	document.getElementById("debug").innerHTML = file_name ;
    	request.open("GET", file_name ) ;
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
    	request.open("GET", "/test/js/ecs_status");
	request.setRequestHeader("If-Modified-Since","0"); 
   	request.setRequestHeader("Cache-Control","no-cache");
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

