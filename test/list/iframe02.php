<html>
<head>
<title>Js控制 iFrame 切换加载网址</title>
</head>
<body>
<a href="javascript:jumpto('http://www.163.com')">网易</a> | 
<a href="javascript:jumpto('http://www.ifeng.com')">百度搜索</a> | 
<a href="javascript:jumpto('http://www.mb5u.com')">模板无忧</a> | 
<script language="javascript">
<!--
    var displaymode=0
    var iframecode='<iframe id="external" style="width:95%;height:388px" src="http://www.mb5u.com"></iframe>'
    if (displaymode==0)
        document.write(iframecode)
        
    function jumpto(inputurl){
        if (document.getElementById&&displaymode==0)
            document.getElementById("external").src=inputurl
        else if (document.all&&displaymode==0)
            document.all.external.src=inputurl
        else {
            if (!window.win2||win2.closed)
                win2=window.open(inputurl)
            else{
                win2.location=inputurl
                win2.focus()
            }
        }
    }
//-->
</script>
</body>
</html>
