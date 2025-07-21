<?php
// 1. DB connection setup
$host = '127.0.0.1';
$db_user = 'root';
$db_password = '';  // If your root has no password
$db_name = 'auw';
$port = 3307;

$conn = new mysqli($host, $db_user, $db_password, $db_name, $port);


// 2. Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. Get form data safely
$email = $_POST['email'] ?? '';
$first_name = $_POST['first_name'] ?? '';
$middle_name = $_POST['middle_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$password_raw = $_POST['password'] ?? '';
$country = $_POST['country'] ?? '';
$contact = $_POST['contact'] ?? '';
$academic_year = $_POST['academic_year'] ?? '2026-2027'; // fallback

// 4. Validate required fields
if (empty($email) || empty($first_name) || empty($last_name) || empty($password_raw)) {
    echo "<p style='color:red;'>❌ Please fill in all required fields.</p>";
    exit;
}

// 5. Hash password
$password = password_hash($password_raw, PASSWORD_DEFAULT);

// 6. Prepare insert statement
$sql = "INSERT INTO users (email, first_name, middle_name, last_name, password, country, contact, academic_year)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// 7. Bind and execute
$stmt->bind_param("ssssssss", $email, $first_name, $middle_name, $last_name, $password, $country, $contact, $academic_year);

if ($stmt->execute()) {
    header("Location: login.php?registered=1");
    exit;
} else {
    echo "<p style='color:red;'>❌ Registration failed: " . htmlspecialchars($stmt->error) . "</p>";
}

$stmt->close();
$conn->close();
?>
