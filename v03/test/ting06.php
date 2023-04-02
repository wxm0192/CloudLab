<!DOCTYPE html>
<html>
<head>
<script src="http://apps.bdimg.com/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#btn1").click(function(){
    $("#test1").text("Hello world!");
  });
  $("#btn2").click(function(){
    $("#test2").html("<b>Hello world!</b>");
  });
  $("#btn3").click(function(){
    $("#test3").val("Dolly Duck");
  });
});
</script>
<script>
$(document).ready(function(){
  $("#btn5").click(function(){
    $('#test01').load('demo_test.txt');
    //$('#test').load('http://8.142.163.140:31656/v03/test/demo_test.txt');
  })
})

function afterText()
{
var txt1="<b>I </b>";                    // 以 HTML 创建元素
var txt2=$("<i></i>").text("love ");     // 通过 jQuery 创建元素
var txt3=document.createElement("div");  // 通过 DOM 创建元素
//var txt3=document.createElement("big");  // 通过 DOM 创建元素
$(txt3).load('http://8.142.163.140:31656/v03/test/demo_test.txt');
//txt3.innerHTML="jQuery!";
$("img").after(txt1,txt2,txt3);          // 在 img 之后插入新元素
}


</script>
</head>

<body>
<p id="test1">这是段落。</p>
<p id="test2">这是另一个段落。</p>
<p>Input field: <input type="text" id="test3" value="Mickey Mouse"></p>
<button id="btn1">设置文本</button>
<button id="btn2">设置 HTML</button>
<button id="btn3">设置值</button>

<h3 id="test">请点击下面的按钮，通过 jQuery AJAX 改变这段文本。</h3>
<div id="test01">demo for load

</div>
<button id="btn5" type="button">获得外部的内容</button>

<img src="eg_w3school.gif" alt="W3School Logo" />
<br><br>
<button onclick="afterText()">在图片后面添加文本</button>

</body>
</html>

