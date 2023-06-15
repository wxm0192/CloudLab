DROP  TABLE IF EXISTS  Lab_session ;
CREATE TABLE Lab_session (
        lab_id INT(6) ,
        session_id INT(6) NOT NULL ,
        session_ip  VARCHAR(30) NOT NULL,
        session_status   VARCHAR(30) NOT NULL,
        start_time  VARCHAR(30) ,
        start_time_stamp  TIMESTAMP   DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
        user_name  VARCHAR(30) ,
        source_ip  VARCHAR(30) 
        ) ;
DROP  TABLE IF EXISTS  Lab_session_counter ;
CREATE TABLE Lab_session_counter (
        lab_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        lab_session_counter  INT(6) NOT NULL 
	) ;
INSERT INTO Lab_session_counter (lab_id , lab_session_counter   ) VALUES (1 , 0 );
INSERT INTO Lab_session_counter (lab_id , lab_session_counter   ) VALUES (31 , 0 );
