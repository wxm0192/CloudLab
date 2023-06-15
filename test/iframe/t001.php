<div >
	<form method="post" action="shijianact.php" style="display: inline">
		<input  id="id01" value="<?php echo "char from php "; ?>">
		&nbsp;&nbsp;
		<input type="submit" name="" value="设置">
		<!---
			<input type="hidden" name="id" value="<?php echo "char from php "; ?>"><input type="submit" name="" value="设置">
		-->
	</form>
	&nbsp;&nbsp;
	<input type="submit" name="" value="一班">
	&nbsp;
	<input type="submit" name="" value="两班">

<script>
	document.getElementById("id01").value  = "from JS" ;
	//document.getElementById("id01").innerHTML  = "from JS" ;
</script>

<form action="lab_exit.php"  style="display: inline">
<input id="msg1" style="background-color: linen;color:red;text-align:center;font-size: 60%;margin-left: 50px;"  type="submit" value="公网地址：">
<input style="background-color: linen;color:red;text-align:center;font-size: 60%"  type="submit" value="退出实验">
<!--
<input style="background-color: linen;color:red;text-align:center;font-size: 60%;margin-left: 1000px;"  type="submit" value="退出实验">
-->
</form>


</div>

