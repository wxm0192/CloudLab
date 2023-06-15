<html lang=zh>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>iframe</title>
    <style>
        #iframeTop{
            width: 100%;
            height: 15%;
            background-color: #565656;
	    position: absolute ;
            left: 0px;
	    top: 0px;
        }
        #iframeLeft{
            width: 20%;
            height: 85%;
            float: left;
            background-color: #ccc;
	    position: absolute ;
            left: 0px;
	    top: 15%;
        }
        #iframeContent{
            width: 70%;
            height: 85%;
            margin-left: 1%;
            background-color: #fff;
	    position: absolute ;
            left: 16px;
	    top: 15%;
        }
        #seg{
            width: 9px;
            height: 85%;
            background-color: #fff;
	    position: absolute ;
            left: 20%;
	    top: 15%;
        }
    </style>
	<body>
<!---
	<script type="text/javascript" src="jquery.js" charset="utf-8" > </script>
	<script  type="text/javascript"  src="resize.js"  charset="utf-8"></script>
--->
		<div>
		    <iframe id="iframeTop" name="iframeTop" frameborder="0"></iframe>
		    <iframe id="iframeLeft" name="iframeLeft" frameborder="1" src="left.html"></iframe>
		    <iframe id="iframeContent01" name="iframeContent01" frameborder="1"></iframe>
		    <img id="seg" name="seg"  src="seg.png"/>
		</div>
	</body>
<script>
		 document.getElementById("iframeContent01").src="../../../v02/left_101.html"
</script>
</html>

