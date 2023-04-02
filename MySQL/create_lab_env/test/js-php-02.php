
<script language="JavaScript">
var Y=<?php echo date('Y')?>,M=<?php echo date('n')?>,D=<?php echo date('j')?>;
console.log(Y+":"+M+":"+D);
<?php 
session_id(); 
session_start(); 
 $_SESSION['lab_id']=1 ;
?>

var lab_id = <?php echo $_SESSION['lab_id'];   ?> ;
console.log(lab_id);
        if (lab_id == 0) {
                lab_id = <?php echo $_GET['lab_id']; ?> ;
                //lab_id = 1;
        }

 console.log(lab_id);

</script>
