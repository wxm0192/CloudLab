<?PHP
header("Location: http://www.php.net"); 
exit;   
//在每个重定向之后都必须加上“exit",避免发生错误后，继续执行。
?> 

<?php 
//@title:PHP定时跳转 
//@功能:等待指定的时间，然后再跳转到指定页面（代替html meta方式） 
header("refresh:3;url=http://axgle.za.net"); 
print("正在加载，请稍等...<br>三秒后自动跳转~~~"); 
//补充说明： 
//若等待时间为0，则与header("location:")等效。 
//header重定向 就等价于替用户在地址栏输入url
?>   
