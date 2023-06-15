
 <?php
include 'lab_functions.php' ;
include 'lab_msg_functions.php' ;
$mylab_id = 101 ;
$lab_session_id =4 ;
$lab_session_ip = "172.30.2.183";
 $ret_no = del_session_ip( $mylab_id ,  $lab_session_id , $lab_session_ip );
        var_dump( $ret_no ) ;
?>
