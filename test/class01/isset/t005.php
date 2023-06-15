<?php
// 赋值: <body text='black'>
$bodytag = str_replace("body", "black", "<body text='%body%'>");
echo $bodytag ;
$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
$onlyconsonants = str_replace($vowels, "", "Hello World of PHP");
echo $onlyconsonants ;

$phrase  = "You should eat frrrr ,vegetables, and fiber every day.";
$healthy = array("fruits", "vegetables", "fiber");
$yummy   = array("pizza", "beer", "ice cream" );

$newphrase = str_replace($healthy, $yummy, $phrase, $count);
echo $newphrase ;
echo $count;

$str = str_replace("ll", "", "good golly miss molly!", $count);
echo $str ;
echo $count;
?>
