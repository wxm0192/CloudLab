 <?php
                session_id() ;
                session_start() ;
                $lab_id ;
                $lab_id =  $_SESSION['lab_id'] ;
                if( $lab_id == 0)
                        {
                                 $lab_id= $_GET['lab_id'] ;
				 echo $lab_id ;
                                 return $lab_id ;
                        }
                if( $lab_id == 0)
                        {
				 echo $lab_id ;
                                 return 1  ;
                        }
	 echo $lab_id ;
?>
