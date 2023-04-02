<!DOCTYPE html>
<html>

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">

        <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.7.2/jquery.min.js"></script>
        <style type="text/css">
                /***        *{padding:0px;margin:0px;border: } ***/
                * {
                        border: 0px;
                        padding: 0px;
                }

                html,
                body {
                        width: 100%;
                        height: 100%;
                }

                #iframeTop {
                        width: 100%;
                        height: 15%;
                        left: 0px;
                        top: 0px;
                        background-color: #565656;
                        position: absolute;
                        z-index: 3;
                }

                #top-content {
                        margin-left: 10px;
                        margin-top:10px;
                        background-color: #565656;
                        color: white ;
                        z-index: 3;
                }

                #li {
                        height: 85%;
                        border: 0;
                        position: absolute;
                        left: 0px;
                        top: 15%;
                        z-index: 1;
                        border: 1px solid;
                }

                #ri {
                        height: 85%;
                        border: thick;
                        position: absolute;
                        right: 0px;
                        top: 15%;
                        z-index: 1;
                        border: 1px solid;
                }

                #s {
                        height: 85%;
                        position: absolute;
                        z-index: 3;
                        cursor: move;
                        top: 15%;
                }

                #s-img {
                        height: 85%;
                        top: 10%;
                        z-index: 1;
                        position: absolute;
                }

                #drag {
                        height: 85%;
                        width: 100%;
                        top: 10%;
                        position: absolute;
                        z-index: 2;
                        margin-left: 0px;
                        padding: 0px;
                        filter: alpha(opacity=0);
                        opacity: 0;
                        background-color: #fee;

                }
        </style>
        <title>动手实验室精简版</title>
        <script type="text/javascript">
                /***
                 *
                 * iframe横向分隔条拖拽伸缩实例 陈建宇 2016-6-14
                 *
                 ***/
                function init() {

                        var li = $("#li");//left iframe
                        var ri = $("#ri");//right iframe
                        var s = $("#s");//中间分割条
                        var img = s.children("img").eq(0);
                        var drag = $("#drag");//分隔条中的拖拽层.

                        var clientWidth = $(window).width();
                        var li_init_width = 270;//上边iframe要显示的宽度,若需要调整默认宽度,请改此值即可.
                        var s_init_width = 10;//分隔条宽度默认值
                        var ri_width = clientWidth - li_init_width - s_init_width;//底部iframe要显示的宽度

                        //初始化
                        li.css("width", li_init_width + "px");
                        ri.css("width", ri_width + "px");
                        s.css("left", li_init_width + "px").css("width", s_init_width + "px");
                        img.css("width", s_init_width + "px").css("box-shadow", "0 0 6px #666");

                        var is_drag = false;//是否点住并进行了拖拽


                        /***
                         * 分隔条事件处理,如果用户执行了mousedown,mousemove,mouseup说明是拖拽,
                         * 如果只执行了mousedown,mouseup说明是点击.
                         */


                        drag.unbind("mousedown").mousedown(function () {
                                //获得分隔条内拖拽层离顶边的距离
                                var li_width = parseInt(li.css("width"));
                                var ri_width = parseInt(ri.css("width"));

                                //分隔条div宽度设为100%,撑满屏,只有这样才能在拖拽分隔条时,有效的控制mouseup事件.
                                s.css("width", "100%").css("left", "0px");
                                img.css("left", li_width);

                                var start_x = event.clientX;

                                drag.unbind("mousemove").mousemove(function (event) {
                                        is_drag = true;
                                        var current_x = event.clientX;
                                        var cha = current_x - start_x;//算偏移差量

                                        li.css("width", (li_width + cha) + "px");
                                        ri.css("width", (ri_width - cha) + "px");
                                        img.css("left", (li_width + cha) + "px");



                                });

                                drag.unbind("mouseup").mouseup(function (event) {
                                        var left = parseInt(img.css("left"));
                                        s.css("width", s_init_width + "px").css("left", left + "px");
                                        img.css("left", "0px");

                                        //处理非拖拽的click情况
                                        if (!is_drag) {

                                                //直接设定固定值
                                                var src = img.attr("src");
                                                if (src.indexOf("toleft") != -1) {
                                                        li.css("width", "0px");
                                                        s.css("left", "0px");
                                                        clientWidth = $(window).width();
                                                        ri.css("width", (clientWidth - s_init_width) + "px");
                                                        img.attr("src", src.replace("toleft", "toright"));
                                                } else {
                                                        li.css("width", li_init_width + "px");
                                                        s.css("left", li_init_width + "px");
                                                        clientWidth = $(window).width();
                                                        ri.css("width", (clientWidth - li_init_width - s_init_width) + "px");
                                                        img.attr("src", src.replace("toright", "toleft"));
                                                }

                                        }

                                        drag.unbind("mousemove");
                                        is_drag = false;



                                });



                        });


                        //当窗口大小发生改变时,重新渲染页面,以使各组件自适应高宽度.
                        $(window).resize(function () {
                                //顶部iframe保持高度不变,改变底部iframe高度
                                var clientWidth = $(window).width();
                                var li_width = parseInt(li.css("width"));
                                var new_ri_width = clientWidth - li_width - s_init_width;
                                ri.css("width", new_ri_width + "px");

                        });

                }


                /***
                 * 加载左边页面方法 陈建宇 2016-6-21
                 * 当右边页面先加载完后再加载左边页面,因为左边页面需要控制右边页面里的iframe
                 * 如果右边页面还没加载完,则会出错,左边页面也会加载失败.
                 */
                /* 
                    function loadLeft(){
                     $("#li").attr("src","left.html");
                 }
                         */


                $(document).ready(function () {

                        init();

                });

        </script>


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
        <div id="iframeTop">
                <div id="top-content">
                        <p>
                                <span class="head">
                                        测试文字
                                </span>
                                <span class="head">
                                        测试分隔符
                                </span>
                                <span>
                                        Redo Counter:
                                </span>
                                <span id="counter">
                                        Counter
                                </span>
                        <div class="head">
                                云上实验室
                        </div>
                        <button id="btn01">退出实验</button>
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
        </script>

</body>

</html>