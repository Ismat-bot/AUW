<?php
// forgot_password.php

$host = '127.0.0.1';
$db_user = 'root';
$db_password = '';  // If your root has no password
$db_name = 'auw';
$port = 3307;

$conn = new mysqli($host, $db_user, $db_password, $db_name, $port);

// Check DB connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);

    // Check if user exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        // User exists — generate reset token
        $token = bin2hex(random_bytes(32));
        $expiry = date("Y-m-d H:i:s", time() + 3600); // 1 hour from now

        $stmt->close();

        // Save token in DB
        $stmt = $conn->prepare("UPDATE users SET reset_token = ?, token_expiry = ? WHERE email = ?");
        $stmt->bind_param("sss", $token, $expiry, $email);
        $stmt->execute();
        $stmt->close();

        // Build reset link
        $resetLink = "http://localhost:8080/AUW/reset_password.html?token=$token";

        echo "<p><strong>Reset Link:</strong> <a href='$resetLink'>$resetLink</a></p>";
        echo "<p><em>(This is for development only — in production you would email this.)</em></p>";

    } else {
        echo "<p style='color:red;'>No account found with that email address.</p>";
    }
}
?>
