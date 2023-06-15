<?php
$value = "my cookie value";

// 发送一个简单的 cookie
setcookie("TestCookie",$value, time()+60 );
?>

<html>
<body>

<p> 动手实验列表：</p>

<p> CAS基础技能类：</p>
<a href="./test_get01.php?subject=PHP&lab-id=1">实验1: Linux 环境下软件安装</a>
<br>
<a href="./coming_on.php">实验2: 用 Namespace 实现Docker</a>
<br>
<a href="./coming_on.php">实验3: NFS 实现文件共享</a>
<br>
<a href="./coming_on.php">实验4: iSCSI 实现外部存储 </a>
<br>
<a href="./coming_on.php">实验5: OVS 集群实现分布式网络 </a>

<?php
setcookie("cookie[three]","cookiethree");
setcookie("cookie[two]","cookietwo");
setcookie("cookie[one]","cookieone");

    echo "This is the value <br />";
// 输出 cookie （在重载页面后）
if (isset($_COOKIE["cookie"]))
  {
  foreach ($_COOKIE["cookie"] as $name => $value)
    {
    echo "$name : $value <br />";
    echo "This is the value <br />";
    }
  }
?>

</body>
</html>

