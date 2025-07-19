<?php
session_start();

// 1. Connect to DB
$host = "127.0.0.1";
$user = "root";
$password = ""; // ✅ Your actual DB password is empty
$database = "auw";
$port = 3307;

$conn = new mysqli($host, $user, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Get input safely
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    echo "<p style='color:red;'>❌ Email and password are required.</p>";
    exit;
}

// 3. Fetch user by email
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // 4. Verify password
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['first_name'];
        header("Location: dashboard.php"); // ✅ redirect after successful login
        exit();
    } else {
        echo "<p style='color:red;'>❌ Invalid password.</p>";
    }
} else {
    echo "<p style='color:red;'>❌ User not found.</p>";
}

$conn->close();
?>
