<?php
    //首先判断有没有统计的文件
    if(is_file("pv.txt")){
	    //取文件里面的值
	    $count=file_get_contents("pv.txt");
	    //累加
	    $count++;
	    //累加后的值存进文件
	    file_put_contents("pv.txt", $count);
	    //输出pv数
	    echo"您是第 ".$count."  位访问的客人 ， 欢迎您 ！";	
    } else {
	    //没有统计的文件,创建文件 同时给文件里一个初始值
        file_put_contents("pv.txt",1);
	    //输出一下当前的pv是:1
	    echo"当前pv数是:1";
    }
    
?>
