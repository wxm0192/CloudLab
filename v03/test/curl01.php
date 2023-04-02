<?php
//$url = "http://localhost/post_output.php";

function destroy_session($l_id , $s_id) 
{
	$lab_id = $l_id ; 
	$session_id = $s_id ; 

	//$url = "https://www.ifeng.com/";
	$url = "http://8.142.163.140:31656/MySQL/create_lab_env/test02-6-1.php?lab_id=".$lab_id."&session_id=".$session_id;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// 我们在POST数据哦！
	/*
	curl_setopt($ch, CURLOPT_POST, 1);
	// 把post的变量加上
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	*/
	$output = curl_exec($ch);
	curl_close($ch);
	echo $output;

}
$l_id = $_GET['lab_id'] ;
$s_id = $_GET['session_id'] ;
destroy_session($l_id , $s_id); 


?>
