<?php
$mysqli = new mysqli('your_mysql_host', 'your_db_user', 'your_db_password', 'your_db_name');

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "Connected successfully";
?>