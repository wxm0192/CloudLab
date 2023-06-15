<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<script type="text/javascript">
    function ajaxFunction(the_request_url){
        var xmlHttp;
        console.log(xmlHttp);
        try{
            xmlHttp=new XMLHttpRequest();
        }
        catch(e){
            try{
                xmlHttp=new ActiveXObject("Msxm12.XMLHTTP");
            }
            catch(e){
                try{
                    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch(e){
                    alert('你的浏览器不支持AJAX');
                    return false;
                }
            }
        }
        if(xmlHttp){        
            xmlHttp.open('GET',the_request_url,true);
            xmlHttp.onreadystatechange=function(){
                if(xmlHttp.readyState==4){
                    if(xmlHttp.status==200){
                        document.getElementById('vv').innerHTML=xmlHttp.responseText;
                    }
                }
            }
            xmlHttp.send(null);
        }else{
            alert('error');
        }
    }
</script>

<input type="button" di="test" value="test" onclick="ajaxFunction('ajax-3.txt')">

<div id="vv">test aj</div>
</body>
</html>
