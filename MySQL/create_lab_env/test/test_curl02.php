<?php
        // create curl resource
        $ch = curl_init();

        // set url
        //curl_setopt($ch, CURLOPT_URL, "example.com");
        curl_setopt($ch, CURLOPT_URL, "http://8.142.163.140:31656/MySQL/create_lab_env/test/called_f.php");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);
	echo $output ;
        // close curl resource to free up system resources
        curl_close($ch);     
?>
