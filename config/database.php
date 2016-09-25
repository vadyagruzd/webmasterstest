<?php

define("SERVER", 'localhost');
define("USER", 'root');
define("PASSWORD", '');
define("DB_NAME", 'webmasterstest');

session_start();

//mysql_connect(SERVER, USER, PASSWORD) or die (mysql_error ());
//mysql_select_db(DB_NAME) or die (mysql_error ());
$dbh = new PDO('mysql:host='.SERVER.';dbname='.DB_NAME.'', USER, PASSWORD, array(
    PDO::ATTR_PERSISTENT => true
));
