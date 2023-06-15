<?php

$ch = curl_init();
$timeout = 5;
curl_setopt ($ch, CURLOPT_URL, '');
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$file_contents = curl_exec($ch);
curl_close($ch);
echo $file_contents;

set_time_limit(5);
echo "Start to count " ;
$i=0 ; 
while ($i<=1000)
{
        echo "i=$i ";
        sleep(5);
        $i++;
}

?>

