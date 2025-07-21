<?php

$host = '127.0.0.1';
$db_user = 'root';
$db_password = '';  // If your root has no password
$db_name = 'auw';
$port = 3307;

$conn = new mysqli($host, $db_user, $db_password, $db_name, $port);

if($conn->connect_error){
    echo "Failed to connect DB".$conn->connect_error;
}
?>