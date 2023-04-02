drop database if exists library;

create database library; 

use library; 

create table tb_admin_info 

(

admin_id int(3) auto_increment not null primary key, 

admin_user varchar(15) not null,

admin_pwd varchar(15) not null

);

insert into tb_admin_info values('001','Tom','Jerry'); 

insert into tb_admin_info values('002','root','root');

