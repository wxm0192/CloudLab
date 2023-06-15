<?php


Session_start();

//注册一个SESSION变量
$_SESSION['name']="实验一：";
$_SESSION['passwd']="mynameislikui";
$_SESSION['time']=time();

    //首先判断有没有统计的文件
    if(is_file("s_counter.txt")){
            //取文件里面的值
            $s_count=file_get_contents("s_counter.txt");
            //累加
            $s_count++;
            //累加后的值存进文件
            file_put_contents("s_counter.txt", $s_count);
            //输出pv数
            echo"实验时间到 ， 退出登录 。";
    } else {
            //没有统计的文件,创建文件 同时给文件里一个初始值
        file_put_contents("s_counter.txt",1);
            //输出一下当前的pv是:1
            echo"当前pv数是:1";
    }

echo $_SESSION['name'];
echo '<br /> ';
echo $_SESSION['passwd'];
echo '<br /> ';
echo date('Y m d H:i:s', $_SESSION['time']);

?>

