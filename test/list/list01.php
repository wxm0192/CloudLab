
<?php
echo "<br>waiting for VM to be started .............. " ;
echo "<br>it will takes 1 ~ 3 minutes to start the lab environment .............. " ;

$file_path = "/app/test/js/ecs_status";
if(file_exists($file_path))
{
        $file_arr = file($file_path);
        for($i=0;$i<count($file_arr);$i++)
        {
                list($ecs_id,$ecs_status) = explode(":", $file_arr[$i] );
                echo "<br>ecs_id :".$ecs_id  ;
                echo "<br>ecs_status :".$ecs_status  ;
	}
}
else
{
	echo "File requested not exist . <br>" ;
}

echo "Try to redirect to www.ifeng.com " ;
//echo "<script> document.getElementById(\"external\").src=\"http://www.ifeng.com\" </script> " ;
$ch = curl_init();
$timeout = 5;
curl_setopt ($ch, CURLOPT_URL, 'http://www.ifeng.com/');
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$file_contents = curl_exec($ch);
curl_close($ch);
echo $file_contents;
?>

