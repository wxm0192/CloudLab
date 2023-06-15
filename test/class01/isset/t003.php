<?php 

// 回调函数示范
function my_callback_function() {
    echo 'hello world!';
}

// 回调方法示范
class MyClass {
    static function myCallbackMethod() {
        echo 'Hello World!';
    }
}

// 类型 1：简单的回调
call_user_func('my_callback_function'); 
// 类型 2：静态类方法回调
call_user_func(array('MyClass', 'myCallbackMethod')); 

// 类型 3：对象方法回调
$obj = new MyClass();
call_user_func(array($obj, 'myCallbackMethod'));

/*
// 类型 4：静态类方法回调
call_user_func('MyClass::myCallbackMethod');

// 类型 5：父级静态类回调
class A {
    public static function who() {
        echo "A\n";
    }
}

class B extends A {
    public static function who() {
        echo "B\n";
    }
}

call_user_func(array('B', 'parent::who')); // A

// 类型 6：实现 __invoke 的对象用于回调
class C {
    public function __invoke($name) {
        echo 'Hello ', $name, "\n";
    }
}

$c = new C();
call_user_func($c, 'PHP!');
*/
?>
