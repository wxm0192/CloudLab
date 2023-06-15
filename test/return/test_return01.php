<?php
$aaa=123 ;
function writeName()
{
    echo "Kai Jim Refsnes";
    return("return from function writeName " );

//    return "return from function writeName " ;
	
}
 
echo "My name is ";
$a=writeName();
echo $a ;
return writeName() ;
?>
