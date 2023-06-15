<?php
header('Content-type: text/css');
//$json = '{"foo-bar": 12345}';
$json = '{
"controller": "Book",
"method": "get",
"params": {
"id": "number"
}
}';

$obj = json_decode($json);
//print $obj->{'foo-bar'}; // 12345
var_dump($obj);
print_r( $obj) ; // 12345

?>
