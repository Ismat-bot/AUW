<?php

$host = '127.0.0.1'; // not localhost
$db_user = 'root';
$db_password = 'simple123';
$db="auw
";
$conn=new mysqli($host,$db_user,$db_password,$db);
if($conn->connect_error){
    echo "Failed to connect DB".$conn->connect_error;
}
?>