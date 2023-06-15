<?php
namespace test\calss;
class Lab {
	private $lab_id ;
	private $image_id ;
	private $tag    ; 
	private $net_work;
	private $ip     ;
	private $session_limit ;
	private $time_limit ;
	private $type ;

	public function get_lab_conf($lab_id_i)
		{
			$file_path = "./lab.conf";
			if(file_exists($file_path))
			{
				printf("This is the inputed lab_id : %d <br> ", $lab_id_i);
				$file_arr = file($file_path);
				(int)$searched=0 ;
				for($i=0;$i<count($file_arr);$i++)
				{
					//逐行读取文件内容
					echo "file line :".$file_arr[$i]."<br />";
					list($lab_id, $image, $tag, $network, $start_ip, $session_limit, $time_limit, $type) = explode(":", $file_arr[$i] );
					if  ($lab_id == $lab_id_i )
						{
						$searched=1 ;
						return($file_arr[$i]) ;
						}
				}

				if( $searched == 0 );
				{
						printf("The required lab configuration not found : %d <br> ", $lab_id_i );
						return   -1 ;
				}


			}
		}

	public function __construct($lab_id_i) {
			$file_path = "./lab.conf";
			if(file_exists($file_path))
			{
				printf("This is the inputed lab_id : %d <br> ", $lab_id_i);
				$file_arr = file($file_path);
				(int)$searched=0 ;
				for($i=0;$i<count($file_arr);$i++)
				{
					//逐行读取文件内容
					echo "file line :".$file_arr[$i]."<br />";
					list($lab_id, $image, $tag, $network, $start_ip, $session_limit, $time_limit, $type) = explode(":", $file_arr[$i] );
					if  ($lab_id == $lab_id_i )
						{
						$searched=1 ;
						$lab = $file_arr[$i] ;
						echo "file line found :".$lab."<br />";
						break ;
						}
				}

				if( $searched == 0 )
				{
						printf("The required lab configuration not found : %d <br> ", $lab_id_i );
						$lab = -1 ;
				}

			}
		//$lab=get_lab_conf($lab_id_i) ;
		if($lab == -1)
		{
			echo "Failed to create lab ";
			return -1 ; 
		}
	
		list($lab_id, $image_id, $tag, $net_work, $ip, $session_limit, $time_limit, $type) = explode(":", $lab );
		$a = array (	'lab_id' => $lab_id ,
				'image_id'=> $image_id , 
				'tag' => $tag ,               
				'net_work' => $net_work ,               
				'ip' => $ip ,               
				'session_limit' => $session_limit ,               
				'time_limit' => $time_limit ,               
				'type' => $type ) ;               
		print_r($a);
	}

	public function lab_list() {
		$a = array (	'lab_id' => $lab_id ,
				'image_id'=> $image_id , 
				'tag' => $tag ,               
				'net_work' => $net_work ,               
				'session_limit' => $session_limit ,               
				'time_limit' => $time_limit ,               
				'type' => $type ) ;               
		print_r($a);
		} 
	


}

//$= new Lab( $_GET['lab_id'] ) ;
$my_lab = new Lab( 1  ) ;
//$my_lab->lab_list() ;



?>
