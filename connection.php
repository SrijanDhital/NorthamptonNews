<?php
//establishes a connection with mysql database using php
$server = 'databaseimage';
$username = 'root';
$password = 'srijan1';
$schema = "my_news"; //name of database


//Connection being made to MySQL database.
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password, [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
?>