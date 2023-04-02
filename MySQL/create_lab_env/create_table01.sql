
DROP TABLE IF EXISTS Lab_Session_Counter ;

CREATE TABLE Lab_Session_Counter (
        lab_id      INT(6)  PRIMARY KEY,
        lab_session_cnt      INT(6)   
        ) ;

INSERT INTO  Lab_Session_Counter  (lab_id , lab_session_cnt )  VALUES ( 1,0 );
INSERT INTO  Lab_Session_Counter  (lab_id , lab_session_cnt )  VALUES (31,0 );
INSERT INTO  Lab_Session_Counter  (lab_id , lab_session_cnt )  VALUES (41,0 );
