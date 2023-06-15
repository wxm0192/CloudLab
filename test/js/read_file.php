<?php
    $a = file('./ecs_status');
    /*foreach($a as $line => $content){
        echo 'line '.($line + 1).':'.$content;
    }
*/
$handle = @fopen("./ecs_status", "r");
    if ($handle) {
        while (($info = fgets($handle, 1024)) !== false) {
            echo $info.'<br>';
        }
        fclose($handle);
    }                  
	echo "<br>";
	echo $a[0];
?>
