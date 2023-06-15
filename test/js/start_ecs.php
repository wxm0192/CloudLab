<?php

function  form_ssh_command_vm($image , $ip   )
{
        $part2 = "/root/aliyun/start_ecs.sh  "." $image"."  $ip"  ;
        $part1 = " ssh root@172.20.0.1  "."\" ".$part2."\"" ;
        echo "<br> $part1 <br> " ;
        return($part1) ;
}


$ssh_cmd=form_ssh_command_vm("m-8vb35k67frag92hcy8pa" , "172.30.2.180"   ) ;
echo  "<br> $ssh_cmd <br> " ;
 $s_out=passthru("$ssh_cmd"  ,$retval );
echo "<br>" ;
                        echo "system return:".$retval ;
                        echo "<br>" ;
                        echo "system out :".$s_out ;

?>
