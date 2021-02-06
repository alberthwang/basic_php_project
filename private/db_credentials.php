<?php 

define("DB_SERVER", "localhost");
define("DB_USER", "webuser");
define("DB_PASS", "password");
define("DB_NAME", "globe_bank");

/*
making test user
mysql> CREATE USER 'webuser'@'localhost' IDENTIFIED BY 'password';
Query OK, 0 rows affected (0.01 sec)

mysql> GRANT ALL PRIVILEGES ON globe_bank.* TO 'webuser'@'localhost' WITH GRANT OPTION;
Query OK, 0 rows affected (0.01 sec)


logging in later 

mysql -u root -p globe_bank
*type pass
to use db by name
can use : USE globe_bank;
*/
?>

