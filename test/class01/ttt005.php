<?php
$a = 1;

$b = 2;

function Sum()

{

    global $a, $b; //在里面声明为全局变量

    $b = $a + $b;

}

Sum();


echo "direct call :" ;
echo $b;

?>
