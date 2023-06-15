<?php
define("CONSTANT", "Hello world.");
echo CONSTANT; // 输出 "Hello world."
echo Constant; // 输出 "Constant" 并导致 Notice

define("GREETING", "Hello you.", true);
echo GREETING; // 输出 "Hello you."
echo Greeting; // 输出 "Hello you."

// PHP 7 起就可以运行了
define('ANIMALS', array(
    'dog',
    'cat',
    'bird'
));
echo ANIMALS[1]; // 输出 "cat"

?>
