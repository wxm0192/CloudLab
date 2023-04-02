<?php
namespace MySQL\create_lab_env ;

class Lab_Session {
	public  $session_record ; 
        public  $session_id ;
        public  $user_id ;
        public  $lab_id ;
        public  $session_ip ;
        public  $session_start_time  ;
        public  $session_status  ;
        public  $session_duration  ;
 public function  __construct( ) {
                global $db_conn ;
                global $my_lab ;
                global $my_lab_session_counter ;
                $this->lab_id = $my_lab->lab_id ;
                $session_id = $my_lab_session_counter->increase_lab_session_counter() ;
                if( $session_id > 0 )
                        {
                                $this->session_id =  $session_id ;
                                //echo "this is Session ID : ".$this->$session_id  ;
                        }
                        else
                        {
                                echo "Failed to get Session ID, Failed to new a Session" ;
                                return -1 ;
                        }

 		$this->session_status = "Creating "  ;
                $time = time();         //时间戳
                $nowtime = date('Y-m-d H:i:s',$time);
                $this->session_start_time  = $nowtime   ;
                $this->session_start_time_stamp   = $time   ;

                $sql = " INSERT INTO Lab_session (lab_id , session_id , session_ip , session_status ,   start_time  )
                        VALUES ('$this->lab_id' ,
                        '$this->session_id'     ,
                        '$this->session_ip'     ,
                        '$this->session_status' ,
                        '$this->session_start_time'    )" ;
                        //'$this->session_start_time_stamp') " ;

                $result = mysqli_query($db_conn, $sql);
                echo "SQL result : ".$mysqli->error."<br>"."Status" ;
                if($result)
                        {
                                echo "Insert Lab_session ok " ;
                        }
                        else
                        {
		              echo "Insert Lab_session failed  ".mysqli_error($db_conn) ;
                        }

        }

?>
