<?php
 
// 说明：获取 _SERVER['REQUEST_URI'] 值的通用解决方案
// 来源：drupal-5.1 bootstrap.inc
// 整理：CodeBit.cn ( http://www.CodeBit.cn )
 
function request_uri()
{
     if (isset( $_SERVER [ 'REQUEST_URI' ]))
     {
         $uri = $_SERVER [ 'REQUEST_URI' ];
     }
     else
     {
         if (isset( $_SERVER [ 'argv' ]))
         {
             $uri = $_SERVER [ 'PHP_SELF' ] . '?' . $_SERVER [ 'argv' ][0];
         }
         else
         {
             $uri = $_SERVER [ 'PHP_SELF' ] . '?' . $_SERVER [ 'QUERY_STRING' ];
         }
     }
     return $uri ;
}

echo request_uri() ;
 
echo "<br>"; 
echo  $_SERVER['HTTP_HOST'];
echo "<br>"; 

echo $_SERVER['REQUEST_URI'];
echo "<br>"; 
echo $_SERVER['REQUEST_METHOD'];

?>
