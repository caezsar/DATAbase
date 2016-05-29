
use dbtest;


CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `admin` varchar(5) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ;


INSERT INTO `users` (`user_name`, `user_pass`,`admin` ) VALUES
( 'caezsar', 'linux', 'admin');


CREATE TABLE info (
id int(20) NOT NULL  AUTO_INCREMENT, 
PRIMARY KEY(id), 
nume VARCHAR(40) NOT NULL,
prenume VARCHAR(40) NOT NULL, 
user_ids int(5) NOT NULL,  
CONSTRAINT fk_user_ids FOREIGN KEY (user_ids) REFERENCES users(user_id)ON DELETE CASCADE, 
in_user varchar(25) NOT NULL,
`text` TEXT  NOT NULL,
`date` varchar(25) NOT NULL,
photo varchar(50) NOT NULL,
dt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL
);

/*  CREATE TABLE info (id int(20) NOT NULL  AUTO_INCREMENT, PRIMARY KEY(id), nume VARCHAR(40) NOT NULL,prenume VARCHAR(40) NOT NULL, user_ids int(5) NOT NULL,  CONSTRAINT fk_user_ids FOREIGN KEY (user_ids) REFERENCES users(user_id)ON DELETE CASCADE, in_user varchar(25) NOT NULL ); */

/*
INSERT INTO info (user_ids, nume, prenume, in_user) VALUES 
( LAST_INSERT_ID('$sessionid'), '$name', '$prenume',  '$sessionname')";
*/

