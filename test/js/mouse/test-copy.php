<!DOCTYPE html>
<html>

<script>
//方法一：用原生的document.execCommand(‘copy’)的方式实现，移动端和PC端都可以使用
//效果：点击复制按钮，复制想复制的区域，例如复制邀请码功能实现
function handleCopy(){
	const range = document.createRange(); 创建range对象
	range.selectNode(document.getElementById('copycode')); //获取复制内容的 id 选择器
	const selection = window.getSelection();  //创建 selection对象
	if (selection.rangeCount > 0) selection.removeAllRanges(); 
			//如果页面已经有选取了的话，会自动删除这个选区，没有选区的话，会把这个选取加入选区
	selection.addRange(range); //将range对象添加到selection选区当中，会高亮文本块
	document.execCommand('copy'); //复制选中的文字到剪贴板
	document.getElementById("inputcode").innerHTML = "write new code";
	this.$toast('复制成功')
	selection.removeRange(range); // 移除选中的元素
}
function writeCopy(){
document.getElementById("inputcode").innerHTML = "write new code";
}
</script>
<div class="my-invitation-num-data"><span id="copycode">commands</span></div>
<div class="my-invitation-num-data"><span id="inputcode">inputcode</span></div>
<button class="copy-btn" onclick="handleCopy()">复制</button>
<button class="write-btn" onclick="writeCopy()">write</button>


<script>
function myFunction() {
    document.getElementById("demo").innerHTML = "段落已被更改。";
}
</script>
</head>

<body>

<h2>Head 中的 JavaScript</h2>

<p id="demo">一个段落。</p>

<button type="button" onclick="myFunction()">试一试</button>

</html>
