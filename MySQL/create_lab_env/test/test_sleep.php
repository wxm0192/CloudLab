<?php
namespace MySQL\create_lab_env ;
class Lab {
        public  $lab_conf ;
        public  $lab_id ;
        public  $lab_category ;
        public  $image ;
        public  $tag    ;
        public  $level  ;
        public  $session_limit ;
        public  $time_limit ;
        public  $lab_type ;
        public  $author_id ;
        public  $author ;
        public  $online_date ;
}
$my_lab=new Lab();
$my_lab->lab_type = "vm" ; 
echo date('h:i:s') . "<br>";
if($my_lab->lab_type == "vm" )
	{
		echo "will sleep 10";
		sleep(10);
	}
echo date('h:i:s') . "<br>";

echo "In main\n";
/*
echo date('h:i:s') . "<br>";
 
// 延长 5 秒
sleep(5);
 
// 再次输出时间
echo date('h:i:s');
*/
?>
