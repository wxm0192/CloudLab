<!DOCTYPE html>
<html lang="en">
	<head>
		<!--设置当前HTML文件的字符编码-->
		
		<!--compatible兼容的，设置浏览器的兼容模式版本（让IE使用最新的渲染引擎工作）-->
		
		<!--声明当前网页在移动端浏览器展示的相关设置-->
		<!-- 
			viewport表示用户是否可以缩放页面
			width指定视区的逻辑宽度
			device-width指定视区宽度应为设备的屏幕宽度
			initial-scale指令用于设置Web页面的初始化缩放比例
			initial-scale-1则将显示未经缩放的Web文档
		 -->
		
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>Bootstrap基本的HTML模板</title>
		<!--引入Bootstrap核心样式表(CSS)文件-->
		<link  rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
		<!--引入html5shiv.min.js让浏览器可以识别HTML5的新标签-->
		<!--引入respond.min.js让低版本浏览器可以使用CSS3的媒体查询-->
		<!--[if It IE 9]>
		<script src="html5shiv/html5shiv.min.js"></script>
		<script src="Respond/respond.min.js"></script>
		<![endif]-->
		<!--自己写的CSS样式文件放head最下面-->
	</head>
	<body>
		<div><h1>Hello,world!</h1></div>


<div class="container">
    <div class="row">
        <div class="col-md-4">4列 List </div>
        <div class="col-md-8">8列</div>
    </div>
</div>
<input type="text" class="form-control"/><!--但是会占一整行-->
<!--可行的是，-->
<div class="row">
    <div class="col-md-3">
        <input type="text" class="form-control"/>
    </div>
</div>

		<!-- Bootstrap的所有JS组件都是依赖jQuery的，所以必须放在前边-->
		<script src="js/jquery.js"></script>
		<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。-->
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<!--自己写的js文件放在body最下面-->
	</body>
</html>

