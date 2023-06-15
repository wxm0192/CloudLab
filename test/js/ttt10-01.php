<!DOCTYPE html>
<html>
<META HTTP-EQUIV="pragma" CONTENT="no-cache"> 
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate"> 
<META HTTP-EQUIV="expires" CONTENT="0">
<body>

<h1>从服务器上的 PHP 获取 JSON 数据</h1>

<p> END flag :  <span id="flag"></span> </p>
<p id="demo"></p>
<p> ECS status : <span id="ECS"></span> </p>
<p> ECS Public IP  : <span id="pip"></span> </p>
<p> File name  : <span id="fname"></span> </p>
<p> Debug  : <span id="debug"></span> </p>

<script>
var flag=0 ;
var eid='"i-8vb6fnl1m8kfcq1lrh1f"'
function Get_ECS_status() 
{
	var xmlhttp = new XMLHttpRequest();

	if(flag == 1 )
		{
	    		document.getElementById("flag").innerHTML = "end the function " ;
			return ;
		}

	xmlhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
	    //myObj = JSON.parse(this.responseText);
	    //document.getElementById("demo").innerHTML = myObj.name;
	    //document.getElementById("demo").innerHTML = this.responseText ;
	    document.getElementById("debug").innerHTML = this.responseText ;
	    myObj = JSON.parse(this.responseText);
	    document.getElementById("ECS").innerHTML = myObj.Instances.Instance[0].Status;
	    //document.getElementById("ECS2").innerHTML = myObj.Instances.Instance[1].Status;
	    document.getElementById("pip").innerHTML = myObj.Instances.Instance[0].PublicIpAddress.IpAddress[0];
	    //document.getElementById("pip").innerHTML = myObj.PublicIpAddress.IpAddress[0];

		/*ecs_status = this.responseText ;
		ecs_status = ecs_status.replace(/[\r\n]/g,"");
	    	document.getElementById("ECS").innerHTML = ecs_status ;                          
		
		if ( ecs_status == "Running") 
			{
				document.getElementById("demo").innerHTML = "The ECS2 is running " ;
				flag = 1  ;
			}
		*/
	    //document.getElementById("demo").innerHTML = myObj.TotalCount;
	  }
	};
	eid=eid.replace(/\"/g , "");
	var File_name = "/test/js/"+eid+".out" ;
	    document.getElementById("fname").innerHTML = File_name ;
	xmlhttp.open("GET", File_name , true);
	//xmlhttp.open("GET", "/test/js/ecs_status", true);
	xmlhttp.send();

	 //setTimeout(Get_ECS_status,1000);
}
Get_ECS_status() ;
//setTimeout(Get_ECS_status,1000);
/*
if(Get_ECS_status() == true)
	{
		return ; 
	}
*/
</script>

</body>
</html>

