<?php 
class Cladr{
	static function LovePhper($app){
		echo 'Love for - '.$app;
		echo 'Here is in the Class Mthod  '.$app;
	}
}
call_user_func_array(array('Cladr','LovePhper'),[''])
//call_user_func_array(array('Cladr','LovePhper'),['PHP'])

/*
*************************输出*************************
Love for - PHP
*/
 ?> 

