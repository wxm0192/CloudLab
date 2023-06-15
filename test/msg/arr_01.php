<html>
<body>
<?php
$rtv=array() ;
$lab_id = 5 ;
$lab_session_id = 3 ; 
$status="Running" ;
$rtv['lab_id']=$lab_id ; 
$rtv['lab_session_id']=$lab_session_id ;
$rtv['status']=$status  ;
var_dump($rtv)  ;
echo "<br>";
var_export($rtv)  ;
echo "<br>";
$json_str =  json_encode($rtv, JSON_FORCE_OBJECT , 512);
echo $json_str ;

?>
</body>
