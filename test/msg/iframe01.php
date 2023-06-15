<html>

<body>
<p id="msg0">Test for iframe00 </p>
<p id="msg1">Test for iframe01 </p>
<p id="msg2">Test for iframe02 </p>
<button type="button" onclick="setflag()">中断状态更新</button>
<button type="button" onclick="resetflag()">开始状态更新</button>
<button type="button" onclick="release_lab()">释放实验环境</button>
<p id="msg2"> </p>

<iframe id="external"  width="1000" height="300"></iframe>


<?php $lab_id = $_GET['lab_id'] ; ?>

</body>
<script language="javascript">
var flag = 0 ;
var redo_count = 2 ;
var vm_ip = "172.30.2.180" ;
var lab_id = '<?php echo $lab_id ;  ?>';
function StartConnect(){
		document.getElementById("external").src="http://39.99.153.25:8033/?hostname=172.30.2.180&username=root&password=V2FCQzI0ODA="
}
function setflag(){
               flag = 1 ; 
}
function resetflag(){
               	flag = 0 ; 
		startCount();
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
                //document.getElementById("msg0").innerHTML =  this.responseText[0];
                //document.getElementById("msg1").innerHTML =  this.responseText[1];
                //document.getElementById("msg2").innerHTML =  this.responseText[2];
		document.getElementById("external").src= "http://39.99.153.25/test/msg/update_redo.php?redo="+redo_count  ;
		//document.getElementById("external").src= "http://39.99.153.25/test/msg/lab_session_ip_f.php?redo="+redo_count  ;
		//var msg = JSON.parse(this.responseText);
		//if(msg.status == "Running") 
			//{
			//document.getElementById("external").src="http://39.99.153.25:8033/?hostname="+vm_ip+"&username=root&password=V2FCQzI0ODA=" ;
			//flag = 1 ;
			//}
		var needle ='Running';
 		//var str_op = this.responseText.search("Creating");
 		var str_op = this.responseText.search("Running");
		 if(str_op > 1)
		{
		
			flag=1;
                	document.getElementById("msg0").innerHTML =  "Here is ok to connect to web ssh "+str_op;
			//document.getElementById("external").src= "http://39.99.153.25/test/msg/update_redo.php?redo="+redo_count  ;
			var strs= new Array(); //定义一数组
			var url_str ;
			strs=this.responseText.split(":"); //字符分割
			url_str = "http://39.99.153.25:8033/?hostname="+strs[2] +"&username=root&password=V2FCQzI0ODA="; 
                	document.getElementById("msg1").innerHTML =  url_str ;
			document.getElementById("external").src=  url_str ;                     
		}
		else
		{
                	document.getElementById("msg0").innerHTML =  "waiting for status to become running   "+str_op;
		}


 		//var str_seg = this.responseText.split("\n\r");
                //document.getElementById("msg1").innerHTML =  str_seg[0] ;
                //document.getElementById("msg1").innerHTML =   this.responseText ;
		//document.getElementById("external").src= "http://39.99.153.25/test/msg/mesg05.php?redo="+redo_count;
		
		//document.getElementById("external").src="http://39.99.153.25/test/list/list.php"
		// Web ssh URL : http://39.99.153.25:8033/?hostname=172.30.2.180&username=root&password=V2FCQzI0ODA=  
                
                }
        };
        request.open("GET", "http://39.99.153.25/test/msg/update_progress.php");
        request.setRequestHeader("If-Modified-Since","0");
        request.setRequestHeader("Cache-Control","no-cache");
        request.send();
	redo_count++ ;
	 setTimeout(startCount,1000); 
}

function request_send(lab_id_i){

    // 创建 XMLHttpRequest 对象
        var request = new XMLHttpRequest();
        // 实例化请求对象
        request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
                //document.getElementById("msg1").innerHTML =   this.responseText ;
                }
        };
        document.getElementById("msg1").innerHTML =   "msg1 : lab_id in JS : "+lab_id_i ;
        //document.getElementById("msg2").innerHTML =   "http://39.99.153.25/test/msg/get_lab_session_id_ip.php?redo=1&lab_id="+lab_id_i ;
        request.open("GET", "http://39.99.153.25/test/msg/get_lab_session_id_ip.php?redo=1&lab_id="+lab_id_i);
        request.setRequestHeader("If-Modified-Since","0");
        request.setRequestHeader("Cache-Control","no-cache");
        request.send();
	redo_count++ ;
	 //setTimeout(startCount,1000); 
}

function release_lab(){

    // 创建 XMLHttpRequest 对象
        var request = new XMLHttpRequest();
        // 实例化请求对象
        request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
                document.getElementById("msg1").innerHTML =   this.responseText ;
                }
        };
        request.open("GET", "http://39.99.153.25/test/msg/release_lab.php");
        request.setRequestHeader("If-Modified-Since","0");
        request.setRequestHeader("Cache-Control","no-cache");
        request.send();
}

request_send(lab_id) ;
setTimeout(startCount,1000); 
//startCount() ;

</script>
</html>

