<?php 

namespace mynamespace ; 
function test( $test ){

//    $test = '123';

    echo func_get_arg(2);

}

test( '321' , "345", "567" );

//定义一个常量
define("GREETING","Hello world!");

echo constant("GREETING");
echo "<br>";
echo  __NAMESPACE__ ;
?>
