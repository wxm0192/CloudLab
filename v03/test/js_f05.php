<!DOCTYPE html>
<html>
<head>

<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $.get("http://8.142.163.140:31656/MySQL/create_lab_env/test/get_lab_info.php","lab_id=2",function(data,status){
    //$.get("http://8.142.163.140:31656/MySQL/create_lab_env/test/get_lab_info.php?lab_id=1",function(data,status){
	//var lab_info=JSON.parse(data);
      //alert("数据：" + lab_info[0].lab_desc + "\n状态：" + status);
      alert("数据：" + data + "\n状态：" + status);
	$("#msg").html(data );
    },"text");
  });
});
</script>
</head>
<body>

<button>向页面发送 HTTP GET 请求，然后获得返回的结果</button>
<div id="msg"> show returned msg</div>
</body>
</html>
