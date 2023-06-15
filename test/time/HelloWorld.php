
<html>
<style>
	* {
	  box-sizing: border-box;
	}

	body {
	  margin: 0;
	  background-color: lightblue;
	}

	/* 设置页眉的样式 */
	.Title {
	  background-color: #f1f1f1;
	  color: red;
	  padding: 5px;
	  text-align: center;
	  background-color: lightblue;
	  font-size: 50px ;
	  /*text-indent: 50px; */
	}

	/* 设置顶部导航栏的样式 */
	.prog01 {
	  overflow: hidden;
	  text-align: center;
	  font-size: 50px ;
	  color: white;
	  background-color: LightGrey ;
	}

	.prog02 {
	  overflow: hidden;
	  text-align: center;
	  font-size: 50px ;
	  color: yellow;
	  background-color: LightGrey ;
	}
	#I01 {
	  text-align: center;
	  color: red;
	  font-size: 20px ;
	}
	#I02 {
	  text-align: center;
	  color: red;
	  font-size: 50px ;
	}

</style>

<body>

<h1 class=Title >Hello World </h1>

<p class=prog01 ; id=I01>This is my first   web message ! </p>
<p class=prog01 ; id=I02>
<?php
date_default_timezone_set("PRC");
// 打印当前时间  PHP_EOL 换行符，兼容不同系统
$dd=date("Y-m-d H:i:s")  . PHP_EOL;
echo $dd  . PHP_EOL;

?>


 </p>

</body>
</html>

