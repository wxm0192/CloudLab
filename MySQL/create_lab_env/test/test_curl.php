<?php
// 创建一个cURL资源
$ch = curl_init();

// 设置URL和相应的选项
curl_setopt($ch, CURLOPT_URL, "http:www.w3cschool.cn/");
curl_setopt($ch, CURLOPT_HEADER, 0);

// 抓取URL并把它传递给浏览器
if(curl_exec($ch))
	echo "ok\n";
else
 	echo "Failed\n";


// 关闭cURL资源，并且释放系统资源
curl_close($ch);
?>
