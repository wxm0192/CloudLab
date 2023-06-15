<!DOCTYPE html>
<html>

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">

        <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.7.2/jquery.min.js"></script>
        <style type="text/css">
        </style>
        <link rel="stylesheet" href="lab_term.css">
        <title>动手实验室精简版</title>
        <script type="text/javascript">
        </script>
        <script type="text/javascript" src="drag.js" charset="utf-8"></script>


</head>

<body scroll="no">
        <!--	
        <p><b>Open Lab : Open the secret of Cloud   </b> </p>
<p id="msg2" style="font-size:5px"> 公网地址： </p>

<form action="lab_exit.php"  style="display: inline; height:15%">
<input id="msg1" style="background-color: white;color:black;text-align:center;font-size: 60%;margin-left: 50px;"  type="text" value="公网地址：">
 &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; 
<input style="background-color: linen;color:red;text-align:center;font-size: 60%"  type="submit" value="退出实验">
</form>
-->
<script>
 var lid  ;
	<?php
        session_id();
        session_start();
	?>

        lid = <?php  $i = $_GET['lab_id'] + 0 ; echo $i ;  ?> ;
        lab_id = <?php  $lab_id = $_SESSION['lab_id'] + 0 ; echo $lab_id ;  ?> ;
        console.log("lab_id get : "+lid);
        if(lab_id != lid && lab_id != 0 ) {
                console.log("lab_id different : "+lid);
                window.location.href = 'http://8.142.163.140:31656/v03/test/diff_lab.php?lad_id=' + lid;
                }
        else {
                console.log("same lab_id        ");
                }
</script>

        <div id="iframeTop">
                <div id="top-content">
                        <h2 class="head">
                                云上实验室
                        </h2>
                        <p>
                                <span class="head">
                                        实验描述:
                                </span>
                                <span id="lab_desc">
                                        实验描述
                                </span>
                                <span class="head">
                                        &nbsp&nbsp&nbsp实验时间(分钟）：
                                </span>
                                <span id="time_limit">
                                        实验描述
                                </span>
                                <span>
                                        &nbsp&nbsp&nbsp实验启动用时（秒）:
                                </span>
                                <span id="counter">
                                        Counter
                                </span>
                                <span>
                                        &nbsp&nbsp&nbsp实验剩余时间（分钟）:
                                </span>
                                <span id="lab_remain_time">
                                        Counter
                                </span>
                        <div>
                                <button id="btn01">退出实验</button>
                        </div>

                        </p>
                </div>

        </div>
        <iframe id="li" name="left" src="left_1.html" frameborder="0"></iframe>


        <div id="s">
                <img id="s-img" src="seg.png" />
                <div id="drag"></div>
        </div>

        <!-- 2022/01/31 update for progress showing 
<iframe id="ri" name="right" src="right01.php" frameborder="1" style="height:100%;border:thick;position:absolute;top:50px;right:0px;z-index:1;border: 1px solid;"></iframe>
-->
        <iframe id="ri" name="right" frameborder="1"></iframe>

        <script>
                var redo_counter = 0;
                var counter = document.getElementById("counter");
                var session_ip;
                var term_url;
                var lab_ready = 0;
		var lab_release_time = 0;
		var lab_remain_time = 0;

                function is_ip(ip) {
                        ip_arr = ip.split('.');
                        if (ip_arr.length != 4) {
                                return false;
                        }
                        for (i = 0; i < ip_arr.length; i++) {
                                if (ip_arr[i] < 0 || ip_arr[i] > 255) {
                                        return false;
                                }
                        }
                        return true;
                }
                var div02 = document.getElementById("li");
                var div03 = document.getElementById("ri");

                //div03.src = "https://www.w3school.com.cn/";
                //var lab_id =  1 ;
                var lab_id = 1;
                lab_id =<?php echo $_GET['lab_id']; ?> ;

                if (lab_id == 0) {
                        window.location.href = 'http://8.142.163.140:31656/v03/test/err_lab_id.php?lab_id=' + lab_id;
                }

                console.log(lab_id);

                //div03.src = "http://8.142.163.140:31656/v03/test02-5.php?lab_id=" + lab_id;
                //div03.src = "http://8.142.163.140:31656/v03/test02-5-1.php" ;

                function crt_res_01() {
                        //Create required resource 
                        //div03.src = "http://8.142.163.140:31656/v03/test02-5.php?lab_id=" + lab_id;
                        var request = new XMLHttpRequest();
                        // 实例化请求对象
                        request.onreadystatechange = function () {
                                if (this.readyState === 4 && this.status === 200) {
                                        //document.getElementById("msg1").innerHTML =   this.responseText ;
                                        //document.getElementById("msg1").innerHTML = "Create";
                			console.log(this.responseText);

                                }
                        };
                        request.open("GET", "http://8.142.163.140:31656/v03/test02-5.php?lab_id=" + lab_id);
                        request.setRequestHeader("If-Modified-Since", "0");
                        request.setRequestHeader("Cache-Control", "no-cache");
                        request.send();

                }

                function crt_res_02() {
                        //Active the resource and get IP for the resource , and set the IP in lad_session table . 
                        //div03.src = "http://8.142.163.140:31656/v03/test02-5-1.php" ;
                        var request = new XMLHttpRequest();
                        // 实例化请求对象
                        request.onreadystatechange = function () {
                                if (this.readyState === 4 && this.status === 200) {
                                        //document.getElementById("msg1").innerHTML =   this.responseText ;
                			console.log(this.responseText);
                                        //document.getElementById("msg1").innerHTML = "Activate";
                                }
                        };
                        request.open("GET", "http://8.142.163.140:31656/v03/test02-5-1.php");
                        request.setRequestHeader("If-Modified-Since", "0");
                        request.setRequestHeader("Cache-Control", "no-cache");
                        request.send();

                }

                function release_lab() {

                        div03.src = "http://8.142.163.140:31656/v03/test02-6.php";
                        setTimeout(function () {
                                div03.src = "http://8.142.163.140:31656/v03/ok_to_home.php";
                                console.log('return to Home Page ');
                        }, 2000);
                }


                function get_session_ip() {

                        var session_ip;
                        // 创建 XMLHttpRequest 对象
                        var request = new XMLHttpRequest();
                        var term_url;
                        // 实例化请求对象
                        request.onreadystatechange = function () {
                                if (this.readyState === 4 && this.status === 200) {
                                        session_ip = this.responseText;
                                        console.log(session_ip);
                                        if (is_ip(session_ip)) {
                                                term_url = "http://8.142.163.140:31655/?hostname=" + session_ip + "&username=root&password=V2FCQzI0ODA=";
                                                div03.src = term_url;
                                                lab_ready = 1;
                                        }
                                }
                        };
                        request.open("GET", "http://8.142.163.140:31656/v03/get_session_ip.php");
                        request.setRequestHeader("If-Modified-Since", "0");
                        request.setRequestHeader("Cache-Control", "no-cache");
                        request.send();
                }

                function get_lab_infor() {

                        var lab_type;
                        var time_limit;
                        var level;
                        // 创建 XMLHttpRequest 对象
                        var request = new XMLHttpRequest();
                        var term_url;
                        // 实例化请求对象
                        request.onreadystatechange = function () {
                                if (this.readyState === 4 && this.status === 200) {
                                        var lab_infor = JSON.parse(this.responseText);
                                        //var lab_desc = lab_infor[0].lab_desc;
                                        //level = lab_infor[0].lab_level;
                                        //time_limit = lab_infor[0].time_limit;
                                        var lab_desc = document.getElementById("lab_desc");
                                        lab_desc.innerHTML = lab_infor[0].lab_desc;
                                        var time_limit = document.getElementById("time_limit");
                                        time_limit.innerHTML = lab_infor[0].time_limit;
					lab_release_time = (lab_infor[0].time_limit - 0 ) * 60 * 1000 ;
					
                                	console.log(lab_release_time );
                			setTimeout(release_lab, lab_release_time);
					lab_remain_time = lab_infor[0].time_limit - 0 ;

                                }
                        };
                        request.open("GET", "http://8.142.163.140:31656/v03/test/get_lab_info.php?lab_id=" + lab_id);
                        request.setRequestHeader("If-Modified-Since", "0");
                        request.setRequestHeader("Cache-Control", "no-cache");
                        request.send();
                }

                function show_lab_remain_time() {
                        var  lab_rt = document.getElementById("lab_remain_time");
			lab_remain_time = lab_remain_time -1 ; 
			if(lab_remain_time < 0)
			{
                               	console.log("lab_release_time: "+ lab_remain_time  );
				//window.open('http://8.142.163.140:31656/v03/test/list-table03.php' ) ;
				return ;
			}
			lab_rt.innerHTML = lab_remain_time  ;
                	setTimeout(show_lab_remain_time , 60000);
		}



                get_lab_infor();

                setTimeout(crt_res_01, 100);
                setTimeout(crt_res_02, 2000);
                var left_url = "http://8.142.163.140:31656/v02/left_" + lab_id + ".html";
                div02.src = left_url;

                var btn01 = document.getElementById("btn01");
                btn01.addEventListener("click", release_lab)
                //setTimeout(get_session_ip, 2000);

                function check_ip() {
                        redo_counter = redo_counter + 1;
                        console.log(redo_counter);
                        counter.innerHTML = redo_counter;
                        if (lab_ready == 1)
                                return;
                        div03.src = "http://8.142.163.140:31656/v03/update_redo.php?redo=" + redo_counter;
                        if (redo_counter > 40) {
                                div03.src = "http://8.142.163.140:31656/v03/return_to_home.php";
                                return;
                        }
                        //Try to get Session IP and connect to lab env
                        get_session_ip();
                        if (lab_ready == 1)
                                return;

                        setTimeout(check_ip, 2000);
                }
                setTimeout(check_ip, 1000);
                setTimeout(show_lab_remain_time , 1000);
		
               	console.log("lab_release_time:"+lab_release_time );
                //setTimeout(release_lab, lab_release_time);
        //check_ip();
        </script>
</body>

</html>
