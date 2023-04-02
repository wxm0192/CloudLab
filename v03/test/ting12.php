<!DOCTYPE html>
<html>
<head>
        <style>
        </style>
        <script src="http://apps.bdimg.com/libs/jquery/1.7.2/jquery.min.js"></script>
        <script>
                function d_load() {
                        //obj.style.display = 'none';
                        this.innerHTML = "Hello World";
                        console.log(this);
                        console.log("in d_load");
                        console.log(this.offsetLeft);
                        console.log(this.offsetTop);
                        console.log(this.id);
                        var txt3 = document.createElement("div");
                        $(txt3).load('demo_test.txt');
                        //$(txt3).text('demo_test.txt');
                        $(txt3).attr('id', 'intro'+this.id);
                        if (this.offsetLeft > mid_X) {
                                //x = document.body.clientWidth - btn.clientWidth + 5 + 'px';
                                x = document.body.clientWidth - this.offsetLeft + 20 + 'px';
                                txt3.style.right = x;
                                txt3.style.position = "absolute";
                                console.log("offsetRight: " + x);
                        }
                        else {
                                //var x = btn.offsetLeft + btn.clientWidth + 5 + 'px';
                                x = this.offsetLeft + this.clientWidth + 5 + 'px';
                                txt3.style.left = x;
                                txt3.style.position = "absolute";
                                console.log("offsetLeft: " + x);
                        }
                        //$("img").after(txt3);
                        
                        $(this).after(txt3);


                }

                function d_unload() {
                        //obj.style.display = 'none';
                        //this.remove();
                        var obj=document.getElementById('intro'+this.id) ;
                        //$("#intro").remove();
                        $(obj).remove();
                }
        </script>
</head>

<body>
        <img src="eg_w3school.gif" alt="W3School Logo" />
        <br><br>
        <button id="btn01" ; class="button" ; style="left: 50px; position: absolute">在图片后面添加文本</button>
        <button id="btn02" ; class="button" ; style="right: 50px; position: absolute">在图片后面添加文本</button>

        

        <script>
                var btns = document.getElementsByClassName("button");

                function d_click(ii) {
                        //alert("div" + ii);
                        console.log("in d_click");
                }
                var mid_X = $(window).width() / 2;
                var i;
                for (i = 0; i < btns.length; i++) {
                        btns[i].style.backgroundColor = "red";
                        //btns[i].onmouseover = "d_load()";
                        btns[i].onmouseover = d_load;
                        btns[i].onmouseout = d_unload;
                        btns[i].onclick = d_click;
                        console.log(i);
                }
        </script>
</body>

</html>
