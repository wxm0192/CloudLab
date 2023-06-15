<?php
//使用SESSION前必须调用该函数。
Session_start();
 
ini_set('session.gc_maxlifetime', "30");

//注册一个SESSION变量       

/*
$_SESSION['lab_id']="我是黑旋风李逵!";   
$_SESSION['lab_session_id']="mynameislikui";
$_SESSION['lab_start_time']=time();
*/
 
function get_current_session_id($lab_id_i)
{
        $file_path="./s_counter.txt" ;
        if(is_file( $file_path ))
        {
                //取文件里面的值
                $file_arr = file($file_path);
                $searched = 0   ;
                for($i=0;$i<count($file_arr);$i++)
                {
                        //逐行读取文件内容
                        //echo "file line :".$file_arr[$i]."<br />";
                        //echo "file line :".$file_arr[$i]."<br />";
                        list($lab_id, $session_counter ) = explode(":", $file_arr[$i] );
                        if($lab_id == $lab_id_i )
                        {
                                $searched = 1   ;
                                return $session_counter ;
                        }
                }

                if( $searched == 0   )
                        {
                                printf("<br> The required lab session not found , lab_id is %d <br> " , $lab_id_i  );
                                return -1 ;
                        }
        }
        else
        {

                printf( "<br> File %s doest not  exist ! <br> ", $file_path );
        }
}


$mylab_id= $_GET['lab-id'] ;
if(empty($mylab_id)) 
	{
	echo "No lab _id is assigned <br>"; 
	return -1 ; 
	}
$_SESSION['lab_id']=$mylab_id ;

echo "Here is the lab session id returned :".get_current_session_id( $mylab_id)."<br>" ;
echo "Here is lab_id from browser : ". $mylab_id."<br>" ;
echo "Here is the lab ID :".$_SESSION['lab_id']."<br>" ;
echo "Here is the lab session id :".$_SESSION['lab_session_id']."<br>" ;
echo "Here is the start time :".$_SESSION['lab_start_time']."<br>" ;

/*
if(empty($_SESSION['lab_session_id']) )
	{
	$_SESSION['lab_session_id']=get_current_session_id( (int)$mylab_id);
	echo "Here is the lab session id returned :".get_current_session_id( $mylab_id)."<br>" ;
	$_SESSION['lab_start_time']=time();
	}
*/
if((int)$_SESSION['lab_session_id']<1 or empty($_SESSION['lab_session_id']) )
	{
	$_SESSION['lab_session_id']=get_current_session_id( (int)$mylab_id);
	echo "Here is the lab session id returned :".get_current_session_id( $mylab_id)."<br>" ;
	$_SESSION['lab_start_time']=time();
	}

     
echo "Here is the lab ID :".$_SESSION['lab_id']."<br>" ;
echo "Here is the lab session id :".$_SESSION['lab_session_id']."<br>" ;
echo "Here is the start time :".$_SESSION['lab_start_time']."<br>" ;

?>
