<!DOCTYPE html>
<html>
<body>

<h1>使用 XMLHttpRequest 获取文件的内容</h1>

<p>JSON 格式的内容能够轻松转换为 JavaScript 对象。</p>
<p>The  following is JSON Name : </p>

<p id="demo"> demo message</p>

<script>
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    document.getElementById("demo").innerHTML = myObj.name;
    //document.getElementById("demo").innerHTML = this.responseText;
  }
};
xmlhttp.open("GET", "http://8.142.163.140:31656/MySQL/create_lab_env/test/json_demo.txt", true);
xmlhttp.send();

</script>

<p>查看 <a href="http://www.w3school.com.cn/example/json/json_demo.txt" target="_blank">json_demo.txt</a></p>

</body>
</html>

