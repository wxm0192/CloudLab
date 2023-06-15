<?php
    // {path}/index.php
    include 'autoloader.php';
    $tool = new Pierstoval\Tools\MyTool();
	$db_conn ; 
header('Content-type: text/css');
$db_conn ;
date_default_timezone_set("Asia/Shanghai");
//$lab_id = 1  ;
$lab_id = $_GET['lab_id'] ;
$dbc = new Lab\Db_connect() ;
$db_conn = $dbc->conn ;
$my_lab= new Lab\Lab( $lab_id   ) ;
$my_lab->lab_list() ;
$my_lab_session_counter = new  Lab\Lab_session_counter ( $lab_id  ) ;
$my_session_counter = $my_lab_session_counter->get_lab_session_counter() ;
echo "This is current session counter : ".$my_session_counter ;
echo "<br>" ;
//echo "Session Counter after increase  is :".$my_lab_session_counter->increase_lab_session_counter(  ) ;
$my_session = new Lab\Lab_Session() ;
$my_session->show_lab_session() ;
unset($my_session);
unset($my_lab);
unset($my_session_counter);


session_id();
session_start();
session_destroy() ;
$db_conn->close();

unset($dbc );
?>
