<?php
// Connect to DB
$host = '127.0.0.1';
$user = 'root';
$pass = '';  // Corrected: your password is empty string
$db = 'auw';
$port = 3307;

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get token from URL
$token = $_GET['token'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'] ?? '';
    $new_password = $_POST['new_password'] ?? '';

    if (!$token || !$new_password) {
        echo "<p style='color:red;'>❌ Token and new password are required.</p>";
        exit;
    }

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Verify token and expiration
    $stmt = $conn->prepare("SELECT email FROM users WHERE reset_token = ? AND reset_expires > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $user = $res->fetch_assoc();
        $email = $user['email'];

        // Update password and clear token/expiration
        $update = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_expires = NULL WHERE email = ?");
        $update->bind_param("ss", $hashed_password, $email);
        if ($update->execute()) {
            echo "<p style='color: green;'>✅ Password successfully reset. You may now <a href='login.php'>login</a>.</p>";
        } else {
            echo "<p style='color: red;'>❌ Error updating password.</p>";
        }
        exit;
    } else {
        echo "<p style='color: red;'>❌ Invalid or expired token.</p>";
        exit;
    }
}
?>

