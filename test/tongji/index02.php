<?php
//以图形的形式输出数据库中的记录数
if(($fp=fopen("counter.txt","r"))==false){
echo "打开文件失败!";
}else{
$counter=fgets($fp,1024);
fclose($fp);
//通过GD2函数创建画布
$im=imagecreate(240,24);
$gray=imagecolorallocate($im,255,255,255);
$color =imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255)); //定义字体颜色
//输出中文字符
$text=iconv("gb2312","utf-8","网站的访问量:"); //对指定的中文字符串进行转换
$font = "Fonts/FZHCJW.TTF";
imagettftext($im,14,0,20,18,$color,$font,$text); //输出中文
//输出网站的访问次数
imagestring($im,5,160,5,$counter,$color);
imagepng($im);
imagedestroy($im);
}
?>
