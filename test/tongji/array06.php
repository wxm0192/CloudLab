<?php
 
//请创建一个数组变量arr,并尝试创建一个关联数组，键是apple，值是苹果
$arr=array();
 
$arr[] = array('apple'=>'苹果', 'apple1'=>'苹果','apple2'=>'苹果', 'apple3'=>'苹果');
$arr[] = array('apple4'=>'苹果', 'apple5'=>'苹果','apple6'=>'苹果', 'apple7'=>'苹果');
$arr[] = array('apple4'=>'www', 'apple5'=>'苹果','apple6'=>'苹果', 'apple8'=>'苹果','apple7'=>'苹果');
 
if( isset($arr) ) {print_r($arr);}

echo $arr[2]['apple4'] ;
 
$A01 =array();

$A01[] = array('1' , '5', '6' );
$A01[] = array('1' , '5', '9' );
if( isset($A01) ) {print_r($A01);}
echo $A01[1][2] ;
?>
 
