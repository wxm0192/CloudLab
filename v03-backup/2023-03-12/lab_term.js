                var redo_counter = 0;
                var counter = document.getElementById("counter");
                var session_ip;
                var term_url;
                var lab_ready = 0;

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
                        window.location.href = 'http://8.142.163.140:31656/MySQL/create_lab_env/test/err_lab_id.php?lab_id=' + lab_id;
                }

                console.log(lab_id);

                //div03.src = "http://8.142.163.140:31656/MySQL/create_lab_env/test02-5.php?lab_id=" + lab_id;
                //div03.src = "http://8.142.163.140:31656/MySQL/create_lab_env/test02-5-1.php" ;

                function crt_res_01() {
                        //Create required resource 
                        //div03.src = "http://8.142.163.140:31656/MySQL/create_lab_env/test02-5.php?lab_id=" + lab_id;
                        var request = new XMLHttpRequest();
                        // 实例化请求对象
                        request.onreadystatechange = function () {
                                if (this.readyState === 4 && this.status === 200) {
                                        //document.getElementById("msg1").innerHTML =   this.responseText ;
                                        document.getElementById("msg1").innerHTML = "Create";
                                }
                        };
                        request.open("GET", "http://8.142.163.140:31656/MySQL/create_lab_env/test02-5.php?lab_id=" + lab_id);
                        request.setRequestHeader("If-Modified-Since", "0");
                        request.setRequestHeader("Cache-Control", "no-cache");
                        request.send();

                }

                function crt_res_02() {
                        //Active the resource and get IP for the resource , and set the IP in lad_session table . 
                        //div03.src = "http://8.142.163.140:31656/MySQL/create_lab_env/test02-5-1.php" ;
                        var request = new XMLHttpRequest();
                        // 实例化请求对象
                        request.onreadystatechange = function () {
                                if (this.readyState === 4 && this.status === 200) {
                                        //document.getElementById("msg1").innerHTML =   this.responseText ;
                                        document.getElementById("msg1").innerHTML = "Activate";
                                }
                        };
                        request.open("GET", "http://8.142.163.140:31656/MySQL/create_lab_env/test02-5-1.php");
                        request.setRequestHeader("If-Modified-Since", "0");
                        request.setRequestHeader("Cache-Control", "no-cache");
                        request.send();

                }

                function release_lab() {

                        div03.src = "http://8.142.163.140:31656/MySQL/create_lab_env/test02-6.php";
			setTimeout(function () {
                        	div03.src = "http://8.142.163.140:31656/v03/ok_to_home.php";
            			console.log('return to Home Page ');
        			}, 2000);
                        /*
                            // 创建 XMLHttpRequest 对象
                            var request = new XMLHttpRequest();
                            // 实例化请求对象
                            request.onreadystatechange = function () {
                                if (this.readyState === 4 && this.status === 200) {
                                    document.getElementById("msg1").innerHTML =   this.responseText ;
                                }
                            };
                            request.open("GET", "http://8.142.163.140:31656/MySQL/create_lab_env/test02-6.php");
                            request.setRequestHeader("If-Modified-Since", "0");
                            request.setRequestHeader("Cache-Control", "no-cache");
                            request.send();
                        */
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
                        request.open("GET", "http://8.142.163.140:31656/MySQL/create_lab_env/get_session_ip.php");
                        request.setRequestHeader("If-Modified-Since", "0");
                        request.setRequestHeader("Cache-Control", "no-cache");
                        request.send();
                }

                setTimeout(crt_res_01, 100);
                setTimeout(crt_res_02, 2000);
                var left_url = "http://8.142.163.140:31656/v02/left_" + lab_id + ".html";
                div02.src = left_url;

                var btn01 = document.getElementById("btn01");
                btn01.addEventListener("click", release_lab)
                //setTimeout(get_session_ip, 2000);

                function check_ip() {
                        redo_counter = redo_counter + 2;
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
                setTimeout(check_ip, 2000);
        //check_ip();
