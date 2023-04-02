<?php

$text = "\t\tThese are a few words :) ...  ";
$binary = "\x09Example string\x0A";
$hello  = "Hello World";
var_dump($text, $binary, $hello);

print "\n";

$command="\"command\"";
echo "The string command is : "."\n".$command."\n";
var_dump($command);
$trimmed = ltrim($command, "\"");
var_dump($trimmed);
$trimmed = rtrim($trimmed, "\"");
var_dump($trimmed);
?>
