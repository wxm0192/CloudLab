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
<script type="text/javascript">
function copyUrl2(){
    var Url2=document.getElementById("biao1");
    Url2.select(); // 选择对象
    document.execCommand("Copy"); // 执行浏览器复制命令
    alert("已复制好，可贴粘。");
}
</script>


<textarea cols="20" rows="10" id="biao1">用户定义的代码区域</textarea>
<input type="button" onClick="copyUrl2()" value="点击复制代码" />
<ul class="breadcrumb">
  <li class="breadcrumb-item"><a href="#">照片</a></li>
  <li class="breadcrumb-item"><a href="#">2019年秋季</a></li>
  <li class="breadcrumb-item"><a href="#">中国</a></li>
  <li class="breadcrumb-item active">北京</li>
</ul>
</body>
