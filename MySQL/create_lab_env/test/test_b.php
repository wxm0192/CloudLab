<?php
$command="/usr/share/nginx/www/controller/product/pod_create.sh my_web_ssh 22.1.31 labpod-2-3";
//$command="./sleep.sh &";
$return_string = exec($command, $output, $return_var);
print_r($output);
print_r($return_var);
?>


