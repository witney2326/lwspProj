<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'mysql');
define('DB_NAME', 'skote_php');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$gmailid = 'lilongwe.water.sanitation@gmail.com'; // YOUR gmail email
$gmailpassword = ''; // YOUR gmail password
$gmailusername = 'adminLWSP'; // YOUR gmail User name

?>