<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="textml; charset=utf-8" />
<title>Hot Class</title>
<style type="text/css">
.box{ position:absolute;}
</style>
<script>
window.onload=function()
{
    var oBox=document.getElementById('box');
    adjustResize();
    window.onresize=window.onscroll=adjustResize;
    function adjustResize()
    {
        var iWidth=document.documentElement.clientWidth;
        var iHegiht=Math.max(document.documentElement.clientHeight,document.body.clientHeight);
        oBox.style.left=(iWidth-oBox.offsetWidth)/2+'px';
        oBox.style.top=(iHegiht-oBox.offsetHeight)/2+'px';
    }
}
</script>
</head>

<body>
<p align="center">热门课程</p>
<div class="box" id="box">
    <iframe width="900" height="450" frameborder="0" scrolling="no" src="//player.bilibili.com/player.html?aid=929943406&bvid=BV1GK4y1m7P2&cid=317985342&page=1"></iframe>
</div>
</body>
<html>
