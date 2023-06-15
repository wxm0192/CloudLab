<?php
class Person{    
    public $name;        
    public $age;        
    public $sex;        
    public function __construct($name="", $sex="男", $age=22)
    {  
        $this->name = $name;
        $this->sex  = $sex;
        $this->age  = $age;
    }
    /** * say 说话方法 */
    public function say()
    { 
        echo "我叫：".$this->name."，性别：".$this->sex."，年龄：".$this->age;
    }   

    /** 
     * 声明一个析构方法 
     */

    public function __destruct()
    {
            echo "我觉得我还可以再抢救一下，我的名字叫".$this->name;
    }
}

$Person = new Person("Jerry");
$Person->say() ;  

unset($Person); //销毁上面创建的对象$Person
?>
