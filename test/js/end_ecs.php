<?php

function  form_ssh_command_vm( )
{
	$eid= $_GET['eid'] ;
        $part2 = "/root/aliyun/end_ecs.sh  ".$eid  ;
        $part1 = " ssh root@172.20.0.1  "."\" ".$part2."\"" ;
        echo "<br> $part1 <br> " ;
        return($part1) ;
}


$ssh_cmd=form_ssh_command_vm(  ) ;
echo  "<br> $ssh_cmd <br> " ;
 $s_out=passthru("$ssh_cmd"  ,$retval );
echo "<br>" ;
                        echo "system return:".$retval ;
                        echo "<br>" ;
                        echo "system out :".$s_out ;

?>
