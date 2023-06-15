<html>

<body>
<p id="msg0">Test for iframe00 </p>
<p id="msg1">Test for iframe01 </p>
<p id="msg2">Test for iframe02 </p>

<iframe id="external"  width="1000" height="300"></iframe>


<?php $lab_id = $_GET['lab_id'] ; ?>

</body>
<script language="javascript">
var flag = 0 ;
var redo_count = 2 ;
var vm_ip = "172.30.2.180" ;
var lab_id = '<?php echo $lab_id ; ?>';
function request_send(lab_id_i){
 	document.getElementById("msg1").innerHTML =   "msg1 : lab_id in fucntion : "+lab_id_i ;
	}

//request_send(lab_id) ;

var ret_str="5:3:172.30.2.180:Creating";
var strs= new Array(); //定义一数组

strs=ret_str.split(":"); //字符分割
for (i=0;i<strs.length ;i++ )
{
document.write(strs[i]+"<br/>"); //分割后的字符输出
}

</script>
</html>

