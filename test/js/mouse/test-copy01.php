<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>
<script type="text/javascript">
function copyUrl2(){
    var Url2=document.getElementById("biao1");
    Url2.select(); // 选择对象
    document.execCommand("Copy"); // 执行浏览器复制命令
    alert("已复制好，可贴粘。");
}
</script>


<textarea cols="20" rows="10" id="biao1">用户定义的代码区域</textarea>
<input type="button" onClick="copyUrl2()" value="点击复制代码" />

</html>
