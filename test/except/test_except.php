<?php

class A {
public function  __construct()
	{
		if("1") 
		{ 
			throw new Exception("could not connect to the database."); 
		} 
	}
}


/*
function connectToDatabase() { 
	if("1") 
	{ 
		throw new Exception("could not connect to the database."); 
	} 
}
*/

try{ 
	$a = new A() ;
	//connectToDatabase(); 
	}
catch(Exception $e) {	
	echo $e->getMessage(); 
	}


//function connectToDatabase() { if(!$link = mysql_connect(“myhost”,”myuser”,”mypassw”,”mybd”)) { throw new Exception(“could not connect to the database.”); } }try{ connectToDatabase(); }catch(Exception $e) {echo $e->getMessage(); }

?>
