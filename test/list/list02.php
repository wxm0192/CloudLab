
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

echo "<script> document.getElementById(\"external\").src=\"http://www.ifeng.com\" </script> " ;
?>

