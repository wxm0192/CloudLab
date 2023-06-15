<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<p>当前框架</p>
<iframe src="http://39.99.153.25:8033/?hostname=169.10.0.12&username=root&password=V2FCQzI0ODA=" width="1000" height="500" id="currentif" name="currentif"></iframe>
</body>
</html>
<script language="javascript">
window.onload = function(){
   var sd =  window.top.document.getElementById("currentif").contentWindow;   //这里去掉前面的window.top也可以
   var son = sd.document.getElementByClassName("btn btn-primary");
   son.onclick = function(){
       alert("1"+son.value);
      };
}//这里一定要放到onload下。如果直接写，可能导致元素获取失败！

function button_click(){
   var sd =  window.top.document.getElementById("currentif").contentWindow;   //这里去掉前面的window.top也可以
   var son = sd.document.getElementByClassName("btn btn-primary");
   son.onclick = function(){
       alert("1"+son.value);
      };
	 setTimeout(button_check ,1000);
}
 button_click() ;

</script>
