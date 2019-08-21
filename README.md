# User-Account-System
A user account system created with PHP and MySQL. Be sure to replace the database info with your info if you are using this code. I have a YouTube video on this: https://www.youtube.com/watch?v=uB6SqLXdHr4
# Features
With this user account system, you can create an account with a username and a password, add a profile picture, and view other peoples' profiles. Developers can add their own logo for the default profile picture.
# SQL
Here is the SQL I used to create the database table in phpmyadmin with: 
CREATE TABLE `[add database name]`.`[add table name]` ( `id` INT NOT NULL AUTO_INCREMENT , `username` TEXT NOT NULL , `password` TEXT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `pic` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;
