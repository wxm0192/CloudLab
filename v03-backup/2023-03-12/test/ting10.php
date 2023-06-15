<!DOCTYPE html>
<html>

<head>
        <style>
                /*
                div {
                        width: 500px;
                        height: 20px;
                        top: 200px;
                        left: 10px;
                        background-color: #de1717;
                        position: absolute;
                }
                */
        </style>

        <script src="http://apps.bdimg.com/libs/jquery/1.7.2/jquery.min.js"></script>
        <script>
                var obj;
                function d_load() {
                        var txt3 = document.createElement("div");  // 通过 DOM 创建元素
                        obj = txt3;
                        //$(txt3).text("Hello world!");
                        $(txt3).load('demo_test.txt');
                        //$(txt3).load('http://8.142.163.140:31656/v03/test/demo_test.txt');
                        txt3.style.top = y;

                        
                        //$("img").after(txt3);
                        console.log("load into div");
                        if (btn.offsetLeft > mid_X) {
                                //x = document.body.clientWidth - btn.clientWidth + 5 + 'px';
                                x = document.body.clientWidth - btn.offsetLeft + 50 + 'px';
                                txt3.style.right = x;
                                txt3.style.position = "absolute";
                                console.log("offsetRight: "+ x) ;
                        }
                        else {
                                //var x = btn.offsetLeft + btn.clientWidth + 5 + 'px';
                                x = btn.offsetLeft + btn.clientWidth + 5 + 'px';
                                txt3.style.left = x;
                                txt3.style.position = "absolute";
                                console.log("offsetLeft: "+ x) ;
                        }
                        $("#btn").after(txt3);
                }


                function d_unload() {
                        //obj.style.display = 'none';
                        obj.remove();
                }

                

        </script>
</head>

<body>

        <img src="eg_w3school.gif" alt="W3School Logo" />
        <br><br>
        <button id="btn" ; onmouseover="d_load()" ; onmouseout="d_unload()" ; style="left: 50px; position: absolute"; >在图片后面添加文本</button>
        <script>
                var btn = document.getElementById('btn');
                var mid_X = $(window).width() / 2;

                var x = btn.offsetLeft + btn.clientWidth + 5 + 'px';
                var y = btn.offsetTop - 5 + 'px';
        </script>

</body>

</html>
