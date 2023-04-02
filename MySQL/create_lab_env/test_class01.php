<?php
/*
function f1()
	{
		echo "f1"  ;
	}
*/
$aaa=123;
class Lab 
{
	private function f1()
	{
		global $aaa ;
		echo "f1"  ;
		echo "Display aaa in class Lab with f1:".$aaa."\n";
		//return NULL ; 
	}

	public function __construct()
	{
		$this->f1();
		return NULL ; 
	}

}
$lab = new Lab() ; 
//$lab->f1() ;
if(is_null($lab) )
if($lab == NULL  )
 echo "New Class return a NULL" ;

?>
