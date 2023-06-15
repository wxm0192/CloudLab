
<?php

/**
 * MVC路由功能简单实现
 * @desc 简单实现MVC路由功能
 * $Author: Zhihua_W
 */

class Hello{

	public function index(){
		echo "hello world!";
	}

	public function name($name){
		echo "hello ".$name;
	}
}
call_user_func_array(
        //调用内部function
        //array($obj, $func),
        array("Hello", "name"),
        //传递参数
        //array_slice($URI, 2)
        array("Tom")
    );


?>
