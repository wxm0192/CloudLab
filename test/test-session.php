<?php
session_start();
// store session data
$_SESSION['views']=1;
?>

<html>
<body>

<?php
//retrieve session data
if(isset($_SESSION['views']))
  $_SESSION['views']=$_SESSION['views']+1;

else
  $_SESSION['views']=1;
echo "Views=". $_SESSION['views'];
echo "This is a test for PHP Session ";
echo "<br>" ;
echo "Pageviews=". $_SESSION['views'];
phpinfo() ;
?>

</body>
</html>
