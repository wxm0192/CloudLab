<?php

/*

*session2.php

*/

//session_id();

$s_id_01=session_id();
printf("<br> This is  the  session ID of S01 in  session02 : %s <br> ",$s_id_01  );
printf("<br> This is the test in the session02 : %s before session_start  <br> ",$_SESSION['test']);

echo "<br>";
echo "<br>";

session_start() ;
$s_id_02=session_id();
printf("<br> This is  the  session ID of S02 in  session02 : %s after session_start  <br> ",$s_id_02  );
printf("<br> This is the test in the session02 : %s after  session_start  <br> ",$_SESSION['test']);

/* session_start();
$s_id_01=session_id();
printf("<br> This is  the  session ID of S01 in  session02 : %s <br> ",session_start());
$s_id_02=session_id();
printf("<br> This is  the  session ID of S02 in  session02 : %s <br> ",session_start());

echo$_SESSION['test'];
printf("<br> This is in the session02 : %s <br> ",$_SESSION['test']);
*/

?>
