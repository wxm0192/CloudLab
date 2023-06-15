<?php
$names = ['Harry', 'Ron', 'Hermione'];
foreach ($names as $name) {
echo $name . " ";
}
echo "<br>" ; 
foreach ($names as $key => $name) {
echo $key . " -> " . $name . " ";
}
