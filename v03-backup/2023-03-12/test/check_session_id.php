<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div><span>Show lab_id:</span> <span id="msg01"></span></div>
    <div><span>Show session_id:</span> <span id="msg02"></span></div>
    <script>
        <?php
                session_id();
        session_start();
        ?>

        var session_ip;

        var msg01 = document.getElementById("msg01");
        var msg02 = document.getElementById("msg02");

        var lab_id;

        lab_id =<?php echo  $_SESSION['lab_id'];  ?> ;
        console.log("lab_id:"+lab_id);
        msg01.innerHTML = lab_id;
        var session_id;
        session_id =<?php echo  $_SESSION['session_id'];  ?> ;
        console.log("session_id:"+session_id);
        msg02.innerHTML = session_id;
        var lid  ;
        lid = <?php echo $_GET['lab_id'] ;  ?> ;
        console.log("lab_id get : "+lid);
	/*
        if (lab_id != lid)
            window.location.href = 'http://8.142.163.140:31656/MySQL/create_lab_env/test/err_lab_id.php?lad_id=' + lid;
	*/

    </script>

</body>

</html>
