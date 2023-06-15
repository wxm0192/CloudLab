<html>
<head>
<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<p><b>请在下面的输入字段中键入姓名：</b></p>
<form> 
姓或名：<input type="text" onkeyup="showHint(this.value)">
</form>
<p>建议：<span id="txtHint"></span></p>
</body>
</html>
