<?php
$cmd = "jsfkjsdlkjdksljk ";
//$cmd = "jsfkjsdlkjdksljk new";
 $cmd_match = strstr($cmd, 'new');
                if(  $cmd_match != false  )
                        {
                                $status = "Running" ;

                                echo "<br>Update status : " ;
                                echo "finished  to update a record <br>" ;
                        }
                        else
                        {
                                echo "released the lab env ";
                        }
?>
