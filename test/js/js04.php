<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JavaScript</title>
</head>
<body>
    <script type="text/javascript">
        var myFun = function (str = 'JavaScript'){
            document.write(str + "<br>");
        };

        setTimeout(myFun, 500, 'Hello');
        setTimeout(myFun, 1000);
        setTimeout(function(){
            document.write("定时器<br>");
        }, 1500)
        setTimeout("document.write(\"setTimeout()\")", 2000);
    </script>
</body>
</html>
