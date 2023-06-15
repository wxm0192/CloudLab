<?php
//Here is the simple use case of namespace. See how we can use same named class with the help of namespace. This is how namespace resolve naming collision.

namespace Mobile;

class User
{

    public $name = 'mobile user';
}


echo "<br>" ;

namespace TV ;

class User
{
    public static $name = 'tv user';
}

echo \TV\User::$name;

echo "<br>" ;
$user = new \Mobile\User;
echo $user->name;
$dd =  date('l dS \of F Y h:i:s A');
echo $dd   ;

echo "<br> Time and date combined <br>";
$time = time();//时间戳
$nowtime = date('Y-m-d H:i:s',$time);
echo $nowtime."<br>" ;
//$cc = '2010-11-10 22:19:21' ;                     
$cc =  $nowtime  ;                     
echo "Convert to timestap : ".strtotime($cc);
echo "<br>" ;
echo strtotime("now");
?>
