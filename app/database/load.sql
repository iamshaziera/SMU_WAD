drop database if exists user_registration;
create database user_registration;
use user_registration;

create table if not exists user_table
(
    username varchar(255) NOT NULL,
    email_address varchar(255) NOT NULL,
    pass varchar(255) NOT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8;


