<?php
ini_set("display_errors", "On");//打开错误提示
ini_set("error_reporting",E_ALL);//显示所有错误

function get_current_session_ip_addr($lab_id_i,$session_id_i )
{
        $file_path="./lab_session_ip.txt" ;
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
                        list($lab_id, $session_id,$ip_addr ) = explode(":", $file_arr[$i] );
                        if($lab_id == $lab_id_i and $session_id_i ==  $session_id )
                        {
                                $searched = 1   ;
                                return $ip_addr ;
                        }
                }

                if( $searched == 0   )
                        {
                                printf("<br> The required lab session not found , lab_id is %d <br> Session_id is %d <br> " , $lab_id_i, $session_id_i  );
                                return -1 ;
                        }
        }
        else
        {

                printf( "<br> File %s doest not  exist ! <br> ", $file_path );
        }
}

function add_session_ip($lab_id_i , $session_id_i , $ip_i ) 
{

        $file_path="./lab_session_ip.txt" ;
        if(is_file( $file_path ))
        {
                //取文件里面的值
                $file_arr = file($file_path);
		$fp=fopen($file_path , 'a+' ) ;
                $searched = 0   ;
                for($i=0;$i<count($file_arr);$i++)
                {
                        //逐行读取文件内容
                        //echo "file line :".$file_arr[$i]."<br />";
                        //echo "file line :".$file_arr[$i]."<br />";
                        list($lab_id, $session_id,$ip_addr ) = explode(":", $file_arr[$i] );
                        if($lab_id == $lab_id_i and $session_id_i ==  $session_id )
                        {
                                $searched = 1   ;
                		/*
				for($i=0;$i<count($file_arr);$i++)
                		{
                        		printf("<br> This the writing string : %s <br> " ,  $file_arr[$i] );
                        		fwrite($fp,$file_arr[$i]);
                		}
				*/
				fclose($fp ) ;
                                return -1       ;
                        }
                }

                if( $searched == 0   )
                        {
                                printf("<br> The required lab session added  , lab_id is %d <br> Session_id is %d <br> " , $lab_id_i, $session_id_i  );
				$file_arr[$i]="$lab_id_i".":"."$session_id_i".":"."$ip_i".PHP_EOL;
				rewind($fp);

                		/*for($i=0;$i<count($file_arr);$i++)
                		{
				*/
                        		printf("<br> This the writing string : %s <br> " ,  $file_arr[$i] );
                        		fwrite($fp,$file_arr[$i]);
                		/*
				}
				*/
				fclose($fp ) ;

                                return 0  ;
                        }
        }
        else
        {

                printf( "<br> File %s doest not  exist ! <br> ", $file_path );
        }
	 fclose($fp ) ;

}

function del_session_ip($lab_id_i , $session_id_i , $ip_i ) 
{
        //返回值： 1 ： 删除成功  0：未找到记录  -1： 文件不存在 
        $file_path="./lab_session_ip.txt" ;
        if(is_file( $file_path ))
        {
                //取文件里面的值
                $file_arr = file($file_path);
		$fp=fopen($file_path , 'w+' ) ;
                $searched = 0   ;
                for($i=0;$i<count($file_arr);$i++)
                {
                        //逐行读取文件内容
                        //echo "file line :".$file_arr[$i]."<br />";
                        //echo "file line :".$file_arr[$i]."<br />";
                        list($lab_id, $session_id,$ip_addr ) = explode(":", $file_arr[$i] );
                        if($lab_id == $lab_id_i and $session_id_i ==  $session_id and $ip_addr == $ip_i )
                        {
                                $searched = 1   ;
                        	printf("<br> This the deleting  string : %s <br> " ,  $file_arr[$i] );
				$file_arr[$i] = PHP_EOL ;
                        }
                }

                if( $searched == 0   )
                        {
                                printf("<br> The required lab session not found   , lab_id is %d <br> Session_id is %d <br> " , $lab_id_i, $session_id_i  );
                        }
		rewind($fp);
                for($i=0; $i<count($file_arr); $i++)
                	{
                       		printf("<br> This the writing string : %s <br> " ,  $file_arr[$i] );
				if( $file_arr[$i] != PHP_EOL )
                       			fwrite($fp,$file_arr[$i]);
			}

		fclose($fp ) ;
                return $searched  ;
        }
        else
        {

                printf( "<br> File %s doest not  exist ! <br> ", $file_path );
		return -1 ;
        }
	 fclose($fp ) ;

}

$ip= get_current_session_ip_addr(2 ,1  ) ;
 echo "$ip"."<br>" ;
$ip= get_current_session_ip_addr(2 ,2  ) ;
 echo "$ip"."<br>" ;
$ip= get_current_session_ip_addr(3 ,1  ) ;
 echo "$ip"."<br>" ;

$rvl=add_session_ip( 5,1, "196.168.10.1" ) ; 
 echo "Add result : ".$rvl ;
 echo "<br>" ; 

echo "This is a test line <br>" ;
?>

