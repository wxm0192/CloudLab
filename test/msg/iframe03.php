<html>

<body>
<p id="msg0">Test for iframe00 </p>
<p id="msg1">Test for iframe01 </p>
<button type="button" onclick="setflag()">中断状态更新</button>
<button type="button" onclick="resetflag()">开始状态更新</button>
<button type="button" onclick="release_lab()">释放实验环境</button>
<p id="msg2"> </p>

<iframe id="external"  width="1000" height="450"></iframe>


<?php $lab_id = $_GET['lab_id'] ; ?>

</body>
<script language="javascript">
var flag = 0 ;
var redo_count = 2 ;
var vm_ip = "172.30.2.180" ;
var lab_id = '<?php echo $lab_id ;  ?>';
function StartConnect(){
		document.getElementById("external").src="http://39.99.153.25:8033/?hostname=172.30.2.180&username=root&password=V2FCQzI0ODA="
}

StartConnect() ;
//window.onload = function(){
        var _iframe = document.getElementById('external').contentWindow;
        var _div =_iframe.document.getElementById('connect');
	document.getElementById("msg0").innerHTML =  _div.childNodes[0].nodeValue  ;
        //_div.style.backgroundColor = '#ccc';
    //}
//vat connect_flag = $(window.frames["external"].document).find("#connect");
// document.getElementById("msg0").innerHTML =  connect_flag ;
</script>
</html>

