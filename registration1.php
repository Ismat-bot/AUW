<?php
// registra.php
$host = '127.0.0.1';
$db_user = 'root';
$db_password = '';  // If your root has no password
$db_name = 'auw';
$port = 3307;

$conn = new mysqli($host, $db_user, $db_password, $db_name, $port);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Only handle POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Collect and trim inputs
    $email = trim($_POST['email'] ?? '');
    $first_name = trim($_POST['first_name'] ?? '');
    $middle_name = trim($_POST['middle_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $country = trim($_POST['country'] ?? '');
    $contact = trim($_POST['contact'] ?? '');
    $academic_year = trim($_POST['academic_year'] ?? '');

    // Basic validation
    $errors = [];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if ($first_name === '') {
        $errors[] = "First name is required.";
    }
    if ($last_name === '') {
        $errors[] = "Last name is required.";
    }
    if ($password === '') {
        $errors[] = "Password is required.";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }
    if ($country === '') {
        $errors[] = "Country is required.";
    }
    if ($contact === '') {
        $errors[] = "Contact number is required.";
    }
    if ($academic_year === '') {
        $errors[] = "Academic year is required.";
    }

    if (count($errors) > 0) {
        // Output errors (you can later redirect or display them nicely)
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        exit;
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo "<p style='color:red;'>Email already registered.</p>";
        $stmt->close();
        exit;
    }
    $stmt->close();

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO users (email, first_name, middle_name, last_name, password, country, contact, academic_year, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssssssss", $email, $first_name, $middle_name, $last_name, $hashed_password, $country, $contact, $academic_year);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Registration successful. <a href='login.html'>Click here to login</a>.</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
    $stmt->close();

} else {
    echo "<p>Invalid request.</p>";
}
$conn->close();
?>
