DROP TABLE IF EXISTS Session ;
DROP TABLE IF EXISTS Lab_Session ;

CREATE TABLE Lab_Session (
        lab_id  INT(6)  ,
        session_id  INT(6)  ,
        user_id  INT(6)  ,
        session_ip   VARCHAR(30) ,
        session_start_time  TIMESTAMP ,
        session_status   VARCHAR(30)  ,
        session_duration INT(6)  , 
	PRIMARY KEY (lab_id,session_id,user_id ) 
        ) ;
