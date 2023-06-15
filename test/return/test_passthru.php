<?php

echo "Start a shell command <br>";

$command = '/usr/share/nginx/www/MySQL/create_lab_env/show-ps.sh';
//$command = '/root/app/v02/MySQL/create_lab_env/show-ps.sh';

passthru($command, $rev);

?>
