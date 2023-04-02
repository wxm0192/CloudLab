<!DOCTYPE html>
<html>
<head>
<style>
div {
            width: 500px;
            height: 20px;
            top: 200px;
            left:10px;
            background-color: #de1717;
            position: absolute;
        }
</style>

<script src="http://apps.bdimg.com/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
/*
$(document).ready(function(){

function d_load(){

var txt3=document.createElement("div");  // 通过 DOM 创建元素
$(txt3).load('http://8.142.163.140:31656/v03/test/demo_test.txt');
$("img").after(txt3);
}

})
*/

var obj ;

function d_load(){
	var txt3=document.createElement("div");  // 通过 DOM 创建元素
	obj = txt3 ;
	$(txt3).load('http://8.142.163.140:31656/v03/test/demo_test.txt');
	//$("img").after(txt3);
	console.log("load into div");
}

function d_unload(){
	//obj.style.display = 'none';
	obj.remove() ;                 
}

function afterText()
{
var txt1="<b>I </b>";                    // 以 HTML 创建元素
var txt2=$("<i></i>").text("love ");     // 通过 jQuery 创建元素
var txt3=document.createElement("div");  // 通过 DOM 创建元素
//var txt3=document.createElement("big");  // 通过 DOM 创建元素
$(txt3).load('http://8.142.163.140:31656/v03/test/demo_test.txt');
//txt3.innerHTML="jQuery!";
$("img").after(txt1, txt2 , txt3);          // 在 img 之后插入新元素
}


</script>
</head>

<body>

<img src="eg_w3school.gif" alt="W3School Logo" />
<br><br>
<button  id="btn"; onmouseover="d_load()" ; onmouseout="d_unload()">在图片后面添加文本</button>

</body>
</html>

