<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 实例</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>基础进度条</h2>
  <p>如需创建默认进度条，请将 .progress 类添加到容器元素并将 progress-bar 类添加到其子元素。请使用 CSS width 属性设置进度条的宽度：</p>
  <div class="progress">
    <div class="progress-bar" id="demo" style="width:70%"></div>
  </div>
</div>
<button type="button" onclick="p()">
点击我！
</button>
<script>
	document.getElementById("demo").style.dth="20%";
</script>
<script type="text/javascript">

function sleep(time){
 var timeStamp = new Date().getTime();
 var endTime = timeStamp + time;
 while(true){
 if (new Date().getTime() > endTime){
  return;
 } 
 }
}


var i=0;
function p(){
	var s="" ;
	if(i>10) {break ;}

	s=i*10+"%";
	document.getElementById("demo").style.width=s;
		//	sleep(1000);
	setTimeout(p,1000);
}
</script>
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.ifeng.com/" allowfullscreen></iframe>
</div>

</body>
</html>

