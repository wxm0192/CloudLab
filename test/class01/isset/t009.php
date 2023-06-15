<?php
 
class CallableClass
{
    public function __invoke($param1, $param2)
    {
	echo "Here is in the invoke \n" ;
        var_dump($param1,$param2);
	echo "Here is in the invoke \n" ;
    }
}
 
$obj  = new CallableClass;
$obj(123, 456);
 
var_dump(is_callable($obj));

?>

