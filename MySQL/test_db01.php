<?php

$mysqli = new mysqli("172.30.2.171",  "root","root123321", "shiyan");

if(!$mysqli) {

echo"database error";

}else{

echo"php env successful";

}

$mysqli->close();

?>
