<?php
$a = array ('test' => 1, 'hello' => NULL, 'pie' => array('a' => 'apple'));
echo $a['test'] ;
var_dump(isset($a['test']));            // TRUE
echo $a['foo'] ;
var_dump(isset($a['foo']));             // FALSE
echo $a['hello'] ;
var_dump(isset($a['hello']));           // FALSE
 
// 键 'hello' 的值等于 NULL，所以被认为是未设置的
// 如果想检测 NULL 键值，可以试试下边的方法。 
var_dump(array_key_exists('hello', $a)); // TRUE
 
// 更深层次检测
var_dump(isset($a['pie']['a']));        // TRUE
var_dump(isset($a['pie']['b']));        // FALSE
var_dump(isset($a['cake']['a']['b']));  // FALSE
?>
