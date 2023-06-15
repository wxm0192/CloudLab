
<?php
class Rest01 {
	public $var01;

	public function __construct() {
		//exit -1   ;
		//return NULL ;
		$this->var01 = 0 ;
	}

	public function f1() {
		//exit -1   ;
		//return NULL ;
		$this->var01 = 1 ;
	}

	public function f2() {
		$this->f1() ;  
	}
}

$request01= new Rest01() ;
print_r($request01);
var_dump($request01);

if($request01) 
	echo "ok to create a object\n";
else
	echo "failed to create a object\n";

if($request01 == NULL )
	echo "Create class failed " ; 
$request01->f2();
print_r($request01);


?>
