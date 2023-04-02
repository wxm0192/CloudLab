<?php
$str1="labpod-6-8:10.244.1.84:Running";
list($pod_name, $pod_ip, $pod_status) = explode(":", $str1);
echo "Pod Name   is : ".$pod_name."\n";
echo "Pod IP     is : ".$pod_ip."\n";
echo "Pod Status is : ".$pod_status."\n";

?>
