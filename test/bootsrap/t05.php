<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>冬奥会</title>
</head>

<body>
    <button id="btn">冬奥会</button>
    <script>
        //事件监听 绑定多个事件; 
        var btn = document.getElementById("btn");
        btn.addEventListener("click", bing);
        btn.addEventListener("click", xue);
        function bing() {
            alert("hello 冰墩墩");
        }
        function xue() {
            alert("hello 雪容融");
        }
    </script>
</body>

</html>

