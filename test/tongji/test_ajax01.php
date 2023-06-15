<!DOCTYPE html>
<html lang="en">
 <link rel="stylesheet" type="text/css" href="/doc/comm.css" /> 
    <head>
        <title>ajax局部刷新</title>
        <style>
            .userMenu {
                float: left;
                width: 200px;
            }
            
            #content {
                float: left;
            }
        </style>
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
  <div class="header">
         <h3>学习热门课程   掌握最新技术</h3>
       </div>

    </head>
 
    <body>
        <div class="userWrap">
            <ul class="userMenu">
                <li class="current" data-id="docker">Docker 入门</li>
                <li data-id="mysql">MySQL</li>
                <li data-id="redis">Redis</li>
                <li data-id="kafka">Kafka</li>
            </ul>
            <div id="content"></div>
        </div>
    </body>
    <script>
        $(function() {
            $(".userMenu").on("click", "li", function() {
                var sId = $(this).data("id"); //获取data-id的值
                window.location.hash = sId; //设置锚点
                loadInner(sId);
            });
 
            function loadInner(sId) {
                var sId = window.location.hash;
                var pathn, i;
                switch(sId) {
                    case "#docker":
                        pathn = "play_docker.php";
                        i = 0;
                        break;　　　　　　　
                    case "#mysql":
                        pathn = "play_mysql.php";
                        i = 1;
                        break;
                    case "#redis":
                        pathn = "play_redis.php";
                        i = 2;
                        break;
                    case "#kafka":
                        pathn = "play_kafka.php";
                        i = 3;
                        break;　　　　　　
                    default:
                        pathn = "play_docker.php";
                        i = 0;
                        break;
                }
                $("#content").load(pathn); //加载相对应的内容
                $(".userMenu li").eq(i).addClass("current").siblings().removeClass("current"); //当前列表高亮
            }
            var sId = window.location.hash;
            loadInner(sId);
        });
    </script>
 <p style="text-align:right;">
                <span style="font-weight:normal;"><a href="http://39.99.153.25/v02/f01.php">点击返回主页</a><br />
</span>
 </p>

</html>
