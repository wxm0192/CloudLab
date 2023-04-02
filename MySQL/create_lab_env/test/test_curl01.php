<?php

$url = 'http://www.php.cn';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

curl_exec($ch);

curl_close($ch);

?>
