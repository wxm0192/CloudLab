<?php
echo str_repeat("<b>test for flush</br>",4096); //随便输出一段代码立即输出
for ($i = 1; $i <= 50; $i++) {
ob_flush();
flush();
echo $i.'<br/>';
sleep(rand(0, 1));
}
?>
