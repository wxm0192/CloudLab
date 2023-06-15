<?php session_start();
if($_SESSION[temp]==""){ //判断$_SESSION[temp]==""的值是否为空,其中的temp为自定义的变量
if(($fp=fopen("counter.txt","r"))==false){
echo "打开文件失败!";
}else{
$counter=fgets($fp,1024); //读取文件中数据
fclose($fp); //关闭文本文件
$counter++; //计数器增加1
$fp=fopen("counter.txt","w"); //以写的方式打开文本文件<!---->
fputs($fp,$counter); //将新的统计数据增加1
fclose($fp);
} //关闭文
$_SESSION[temp]=1; //登录以后,$_SESSION[temp]的值不为空,给$_SESSION[temp]赋一个值1
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>通过文本文件统计页面访问量</title>
<style type="text/css">
<!--
.STYLE1 {
font-size: 12px;
font-weight: bold;
}
body {
margin-left: 0px;
margin-top: 0px;
margin-right: 0px;
margin-bottom: 0px;
}.
STYLE2 {
color: #FF0000;
font-weight: bold;
}-->
</style>
</head>
<body>
<table width="995" height="809" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bg.jpg">
<tr>
<td width="131" height="215"> </td>
<td width="714"> </td>
<td width="128"> </td>
</tr>
<tr>
<td height="323"> </td>
<td align="center" valign="top"><table width="660" height="323" border="0" cellpadding="0" cellspacing="0" background="images/bg3.jpg">
<tr>
<td width="671" height="420"><p> <span class="STYLE1">
<p class="STYLE1"><strong>企业精神</strong>：博学、创新、求实、笃行</p>
<p class="STYLE1"><strong>公司理念</strong>：以高新技术为依托，战略性地开发具有巨大市场潜力的高价值的产品。</p>
<p class="STYLE1"><strong>公司远景</strong>：成为拥有核心技术和核心产品的高科技公司，在某些领域具有领先的市场地位。</p>
<p class="STYLE1"><strong>核心价值观</strong>：永葆创业激情、每一天都在进步、容忍失败，鼓励创新、充分信任、平等交流。</p></td>
</tr>
<tr>
<td height="40" align="center"><img src="gd1.php" /></td>
</tr>
</table></td>
<td> </td>
</tr>
<tr>
<td> </td>
<td> </td>
<td> </td>
</tr>
</table>
<p> </p>
</BODY>
</HTML>
