<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email         = $_POST['email'];
    $first_name    = $_POST['first_name'];
    $middle_name   = !empty($_POST['middle_name']) ? $_POST['middle_name'] : null;
    $last_name     = $_POST['last_name'];
    $country       = $_POST['country'];
    $contact       = $_POST['contact'];
    $academic_year = $_POST['academic_year'];
    $password      = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (email, first_name, middle_name, last_name, password, country, contact, academic_year) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $email, $first_name, $middle_name, $last_name, $password, $country, $contact, $academic_year);

    if ($stmt->execute()) {
        echo "Registration successful. <a href='login.html'>Login now</a>";
    } else {
        echo "Registration failed: " . $stmt->error;
    }
}
?>
