<?php
$names = ['Harry', 'Ron', 'Hermione'];
$status = [
'James Potter'=>'alive',
'Tom' => 'dead'
];
$names[] = 'Neville';
$status['age'] = 32;
//print_r($names, $status);
print_r( $status);
echo "<br>" ;
var_dump( $status['James Potter']);
echo "Time is :".time() ;
?>
