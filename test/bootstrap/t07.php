<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="renderer" content="webkit">
<!--
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.7.2/jquery.min.js"></script>
    <style type="text/css">
	/***        *{padding:0px;margin:0px;border: } ***/
        html,body{width:100%;height:100%;}
    </style>
-->
    <title>动手实验室精简版</title>
<script src="resize.js" type="text/javascript" charset="utf-8"></script>

</head>
<body scroll="no">
<form action="lab_exit.php"  style="display: inline">
<input id="msg1" style="background-color: white;color:black;text-align:center;font-size: 60%;margin-left: 50px;"  type="text" value="公网地址：">
 &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; 
<input style="background-color: linen;color:red;text-align:center;font-size: 60%"  type="submit" value="退出实验">
</form>

<iframe id="li" name="left"  frameborder="0" style="height:100%;border:thick;position:absolute;top:50px;left:0px;z-index:1;border: 1px solid;"></iframe>
<div id="s" style="height:100%;position:absolute;z-index:3;cursor:move;margin-top:35px;">
    <img style="height:100%;position:absolute;z-index:1;" src="https://images2017.cnblogs.com/blog/391710/201708/391710-20170806153534897-940657970.png"/>
    <div style="height:100%;width:100%;position:absolute;z-index:2;margin-left:0px;margin-top:50px;padding:0px;filter:alpha(opacity=0);opacity:0;background-color:#fee;" id="drag"></div>
</div>

<iframe id="ri" name="right"  frameborder="0" style="height:100%;border:thick;position:absolute;top:50px;right:0px;z-index:1;border: 1px solid;"></iframe>



</body>

</html>
