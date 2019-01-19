CREATE DATABASE twitter;
CREATE TABLE follow(id int AUTO_INCREMENT PRIMARY KEY, follow_id varchar(240), follower_id varchar(240)); 
CREATE TABLE users(id int AUTO_INCREMENT PRIMARY KEY, user_id varchar(240), user_name varchar(240), password varchar(1000), body varchar(1000), img_path varchar(500));
CREATE TABLE tweet(id int AUTO_INCREMENT PRIMARY KEY, user_id varchar(240), body varchar(430), img_path varchar(500));



