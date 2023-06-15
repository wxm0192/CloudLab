<?php
$text = ' How can a clam cram in a clean cream can? ';
echo strlen($text); // 45
echo '<br>' ;
$text = trim($text);
echo $text; // How can a clam cram in a clean cream can?
echo '<br>' ;
echo strtoupper($text); // HOW CAN A CLAM CRAM IN A CLEAN CREAM CAN?
echo '<br>' ;
echo strtolower($text); // how can a clam cram in a clean cream can?
echo '<br>' ;
$text = str_replace('can', 'could', $text);
echo $text; // How could a clam cram in a clean cream could?
echo '<br>' ;
echo substr($text, 2, 6); // w coul
echo '<br>' ;
var_dump(strpos($text, 'can')); // false
echo '<br>' ;
var_dump(strpos($text, 'could')); // 4
echo '<br>' ;
?>
