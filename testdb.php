<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("127.0.0.1", "root", "", "auw", 3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Connected successfully!";
}
?>
