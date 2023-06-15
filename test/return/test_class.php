<?php
/*
function f1()
	{
		echo "f1"  ;
	}
*/
class Lab 
{
	private function f1()
	{
		echo "f1"  ;
		return NULL ; 
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
