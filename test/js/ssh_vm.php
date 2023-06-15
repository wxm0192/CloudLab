<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>iframe纵向分隔条拖拽伸缩</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>


<body scroll="yes">
<?php
        $pv_ip= $_GET['pv_ip'] ;
                //printf( "No lab _id is assigned:%d <br>",$mylab_id) ;
        if(empty($pv_ip))
                {
                echo "No pv_ip is assigned <br>".$mylab_id;
                return -1 ;
                }
        //echo "<br>Here is the lab_id <br>". $mylab_id."<br>" ;




 $ip_addr=$pv_ip ; 
echo "This is the IP ".$pv_ip ;
 if($ip_addr == "-1" )
        {
                printf("<br>Failed to get lab session IP : %s <br>", $ip_addr);
                return -1 ;
        }
 //printf("<br>this is the lab session IP returned from function : %s<br> " ,  $ip_addr  ) ;

echo "This is the IP ".$ip_addr ;
echo "<iframe id=\"bi\" name=\"bottom\" src=\"http://39.99.153.25:8033/?hostname=".$ip_addr."&username=root&password=V2FCQzI0ODA=\" ></iframe>" ;
?>
</body>
</html>

