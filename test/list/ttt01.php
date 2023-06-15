<?php
function get_lab_conf($lab_id_i)
{
$file_path = "./lab.conf";
if(file_exists($file_path))
{
        printf("This is the inputed lab_id : %d <br> ", $lab_id_i);
        $file_arr = file($file_path);
        (int)$searched=0 ;
        for($i=0;$i<count($file_arr);$i++)
        {
                //逐行读取文件内容
        //echo "file line :".$file_arr[$i]."<br />";
        //echo "file line :".$file_arr[$i]."<br />";
                list($lab_id, $image, $tag, $network, $start_ip, $session_limit, $time_limit, $type ) = explode(":", $file_arr[$i] );
                //echo "<br />" ;
                //echo "lab_id : ".$lab_id;
                if  ($lab_id == $lab_id_i )
                        {
                        //echo  "<br />" ;
                        //printf("Here is the returned values : %d  <br> " ,  $lab_id );
                        $searched=1 ;
                        return($file_arr[$i]) ;
                        }
        }

        if( $searched == 0 );
        {
                        printf("The required lab configuration not found : %d <br> ", $lab_id_i );
                        return   -1 ;
        }


}
}

function show_lab_conf($lab)
{ list($lab_id, $image, $tag, $network, $start_ip, $session_limit, $time_limit, $type) = explode(":", $lab );
        echo "<br />" ;
        echo "lab_id : ".$lab_id;
        echo "<br />" ;
        echo "image:".$image;
        echo "<br />" ;
        echo "tag:".$tag;
        echo "<br />" ;
        echo "netowrk:".$network;
        echo "<br />" ;
        echo "start_ip:".$start_ip;
        echo "<br />" ;
        echo "session_limit:".$session_limit;
        echo "<br />" ;
        echo "time_limit:".$time_limit   ;
        echo "<br />" ;
        echo "type:".$type   ;
        echo "<br />" ;
	
	echo "String length is : ".strlen($type)."<br>" ;
	$type = str_replace(PHP_EOL, '', $type);
	//$type = preg_replace('//s*/', '', $type);
	echo "String length is : ".strlen($type)."<br>" ;
	if (strcmp($type, "vm") == 0) {
			echo "Will create VM for lab <br>";
	}
	else
	{
			echo "Type is :".$type."<br>";
	}

}


$lab_conf =  get_lab_conf(102);
show_lab_conf($lab_conf);
?>
