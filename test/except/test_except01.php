<?php

class A {
private function f0()
{
	echo "Here is f0 , throwing a exception ";
	throw new Exception("Here is f0 exception \n"); 
}
public function  __construct()
	{
		try{
			$this->f0() ;        
		}
		catch(Exception $e) {
			echo "Here is in construct function \n";
			echo $e->getMessage();
			throw new Exception("Here is construct  exception \n"); 
		}
	}
}
try{ 
	$a = new A() ;
	//connectToDatabase(); 
	}
catch(Exception $e) {	
	echo "Here is in the main  function\n";
	echo $e->getMessage(); 
	}
?>
