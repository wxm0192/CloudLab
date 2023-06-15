<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="renderer" content="webkit">
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.7.2/jquery.min.js"></script>
    <title>动手实验室精简版</title>
	<p id="msg1" style="font-size:5px"> 公网地址： </p>
	<p id="msg2" style="font-size:5px"> URL： </p>
	<p id="msg3" style="font-size:5px"> URL response  </p>
	<iframe id="ri" name="right"  frameborder="1" style="height:100%;border:thick;position:absolute;top:50px;right:0px;z-index:1;border: 1px solid;"></iframe>
<script type="text/javascript">
var url_str="http://39.99.153.25:8033/?hostname=172.30.2.190:22&username=root&password=V2FCQzI0ODA=" ;
var url_ok = 0 ;



function url_check(){
        if(url_ok  == 1 )
                {
                        document.getElementById("ri").src=  url_str ;
                        return ;
                }

    // 创建 XMLHttpRequest 对象
        var request = new XMLHttpRequest();
        // 实例化请求对象
        request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
		document.getElementById("msg3").innerHTML = this.responseText;
                var str_op = this.responseText.search("Hostname");
                 if(str_op > 1)
                {
                        // Continue for checking if return page include Hostname
			document.getElementById("msg2").innerHTML = "found the Hostname string" ;
                }
                else
                {
                        url_ok = 1;
                        //document.getElementById("msg0").innerHTML =  "waiting for status to become running   "+str_op;
			document.getElementById("ri").src=  url_str ;
                }


                }
        };
        request.open("GET", "url_str" );
        request.setRequestHeader("If-Modified-Since","0");
        request.setRequestHeader("Cache-Control","no-cache");
        request.send();
        //setTimeout(url_check ,1000);
}

document.getElementById("msg1").innerHTML = "URL:" + window.url_str ;
url_check() ; 

</script>

</body>

</html>
