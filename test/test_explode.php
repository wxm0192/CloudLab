<!DOCTYPE html>
<html>
<body>

<?php
$str = 'one,two,three,four';

// 零 limit
print_r(explode(',',$str,0));
 
echo "<br >" ;
echo "<br >" ;

// 正的 limit
print_r(explode(',',$str,2));
echo "<br >" ;
echo "<br >" ;

// 负的 limit
print_r(explode(',',$str,-1));
echo "<br >" ;
?>

<?php
// Example 1
echo "Example 1 <br> " ;
$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);
echo $pieces[0]; // piece1
echo $pieces[1]; // piece2

echo " <br> " ;
$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
// Example 2
echo "Example 2 <br> " ;
$data = "foo:*:1023:1000::/home/foo:/bin/sh";
list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $data);
echo $user; // foo
echo $pass; // *

?>

</body>
</html>
