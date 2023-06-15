<?php 
 function form_new_ip($addr , $i )
                {
                         list($a_s , $b_s , $c_s , $d_s) = explode(".",  $addr) ;
                         $d_s = (int)$d_s - 1;
                         $i = (int)$i ;
                         $d_s += $i ;
                         if($d_s > 253 )
                                {
                                        echo "Failed to form the new IP address " ;
                                        return -1 ;
                                }
                         $new_add = "$a_s"."."."$b_s"."."."$c_s"."."."$d_s" ;
                         return($new_add) ;
                }
echo form_new_ip("10.12.13.15",3) ; 


?>
