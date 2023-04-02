DROP TABLE IF EXISTS Lab ;

CREATE TABLE Lab (
        lab_id  INT(6)  PRIMARY KEY,
        lab_category  INT(6) NOT NULL ,
        image  VARCHAR(30) NOT NULL,
        tag  VARCHAR(30) NOT NULL,
        level    INT(6) NOT NULL,
        session_limit   INT(4) NOT NULL,
        time_limit   INT(4) NOT NULL,
        lab_type  VARCHAR(30)  NOT NULL,
        lab_desc  VARCHAR(100) ,
        author_id  int(6) ,
        author  VARCHAR(50),
        online_date  TIMESTAMP
        ) ;


DROP TABLE IF EXISTS Session ;

CREATE TABLE Session (
        session_id  INT(6)  PRIMARY KEY,
        user_id  INT(6)  ,
        lab_id  INT(6)  ,
        session_ip   VARCHAR(30) ,
        start_time  TIMESTAMP ,
        status   INT(6) NOT NULL ,
        duration INT(6) 
        ) ;


DROP TABLE IF EXISTS User ;

CREATE TABLE User (
        user_id     INT(6)  PRIMARY KEY,
        user_name VARCHAR(30)  ,
        u_phone   VARCHAR(30)  ,
        u_weixin  VARCHAR(30)  ,
        u_mail    VARCHAR(30)  ,
        u_age     INT(2)       ,
        u_level     INT(2)       ,
        u_score     INT(4)       ,
        u_amount    INT(4)       ,
        reg_time  TIMESTAMP
        ) ;


DROP TABLE IF EXISTS Misc ;

CREATE TABLE Misc (
        current_session_id     INT(6)  
        ) ;
