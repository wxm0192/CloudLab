<!DOCTYPE html>
<html>
<body>

<h1>从服务器上的 PHP 获取 JSON 数据</h1>

<p> END flag :  <span id="flag"></span> </p>
<p id="demo"></p>
<p> ECS1: <span id="ECS1"></span> </p>
<p> ECS2: <span id="ECS2"></span> </p>

<script>
var flag=0 ;
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
	    myObj = JSON.parse(this.responseText);
	    document.getElementById("ECS1").innerHTML = myObj.Instances.Instance[0].Status;
	    document.getElementById("ECS2").innerHTML = myObj.Instances.Instance[1].Status;
		if ( myObj.Instances.Instance[1].Status == "Running") 
			{
				document.getElementById("demo").innerHTML = "The ECS2 is running " ;
				flag = 1  ;
			}
	    //document.getElementById("demo").innerHTML = myObj.TotalCount;
	  }
	};
	xmlhttp.open("GET", "/test/js/ecs_list", true);
	xmlhttp.send();

	 setTimeout(Get_ECS_status,1000);
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

