<!DOCTYPE html>
<html>
<head>
<style>
body {
  background-color: lightblue;
}

h1 {
  color: white;
  text-align: center;
}

p {
  font-family: verdana;
  font-size: 20px;
}
</style>
</head>
<body>
<body>


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

<body>

<h1>动手实验列表：</h1>

<p> CAS基础技能类：</p>
<a href="./test_get01.php?subject=PHP&lab_id=1">实验1: Linux 环境下软件安装</a>
<br>
<a href="./coming_on.php">实验2: 用 Namespace 实现Docker</a>
<br>
<a href="./coming_on.php">实验3: NFS 实现文件共享</a>
<br>
<a href="./coming_on.php">实验4: iSCSI 实现外部存储 </a>
<br>
<a href="./test_session01.php">实验5: OVS 集群实现分布式网络 </a>

</body>


</body>
</html>
