<?php
$names = ['Harry', 'Ron', 'Hermione'];
$status = [
'name' => 'James Potter',
'status' => 'dead'
];
$names[] = 'Neville';
$status['age'] = 32;
//print_r($names, $status);
print_r( $status);
echo "<br>" ;
var_dump($names, $status);
echo "<br>" ;
var_dump($names);
echo "<br>" ;
var_dump($status);
echo "<br>" ;
var_dump( $status['name']);
var_dump( $status['age']);
?>
