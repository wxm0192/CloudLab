<?php
$number = 9;
$str = "北京";

list($lab_id, $image, $tag, $network, $start_ip, $session_limit, $time_limit) = explode(":", "1:my_web_ssh:09.01.01:biz_net:169.10.0.3:10:30");
/*$lab_id="1"; 
$image="image-ssh"; 
$tag="v01" ;
$network="biz_network" ;
 $start_ip="169.10.0.3" ; 
*/
$part2 =   "/root/app/controller/docker-lab-start.sh "." new "."  "."$image"."  "."$tag"."  "."$network"."  "."$start_ip"  ;

$part1 = " ssh root@172.20.0.1  "."\" ".$part2."\"" ;   
echo $part1  ;
$str="\""."Beijing"."   "."Tianjin" ;

 list($a_s , $b_s , $c_s , $d_s) = explode(".",  "172.10.0.2") ;
	 $current_session_id="5";
	 $session_limit="5"; 
	$d_s=(int)$d_s;
        $current_session_id=(int)$current_session_id ;
        $session_limit=(int)$session_limit;

	 if($current_session_id >= $session_limit )
                {
                printf("<br> Reach the session limit , waiting someone to eixt . <br> Lab_id : %d    <br>Session_counter: %d  <br>", 1 , $current_session_id) ;
                return("-1") ;
                }
        else
                {
                $d_s += $current_session_id  ;
                $d_s -= 1  ;
                $ip_add="$a_s"."."."$b_s"."."."$c_s"."."."$d_s" ;
		echo "<br> $ip_add<br>" ;
		}

printf("在%s有 %u 百万辆自行车。",$str,$number);
?>
