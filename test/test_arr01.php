
<?php
// 表示由数据库返回的可能记录集的数组
$b[0] = 1;
$b[1] = 2;
$b[2] = 3;
echo count($b).'<br/>';//3


$b[count($b)] = 4;
echo count($b).'<br/>';//3

$a = array(
  array(
    'id' => 5698,
    'first_name' => 'Bill',
    'last_name' => 'Gates',
  ),
  array(
    'id' => 4767,
    'first_name' => 'Steve',
    'last_name' => 'Jobs',
  ) ,
  array(
    'id' => 3809,
    'first_name' => 'Mark',
    'last_name' => 'Zuckerberg',
  )
);
 
$last_names = array_column($a, 'last_name');
//$last_names = array_column($a, 'last_name', 'id');
print_r($last_names);
echo "<br>";
print_r($a[0]['id']);
echo "<br>";
print_r($a[0]['first_name']);
echo "<br>";
print_r($a[0]['last_name']);
echo "<br>";




?>

<?php
$cars=array("porsche","BMW","Volvo");
$arrlength=count($cars);

for($x=0;$x<$arrlength;$x++) {
  echo $cars[$x];
  echo "<br>";
}
?>

<?php
$age=array("Bill"=>"63","Steve"=>"56","Elon"=>"47");

foreach($age as $x=>$x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}
?>
