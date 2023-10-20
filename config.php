<?php
//start session 
session_start();

//create constants to store non repeating values
define('SITEURL','http://localhost/TWs/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'onlineteaching');
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); //database conncection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //selecting database
?>
 