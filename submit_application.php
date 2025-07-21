<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$host = '127.0.0.1';
$db_user = 'root';
$db_password = '';  // If your root has no password
$db_name = 'auw';
$port = 3307;

$conn = new mysqli($host, $db_user, $db_password, $db_name, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect and sanitize inputs (you may want to do more validation)
$full_name = $_POST['full_name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$gender = $_POST['gender'] ?? '';
$date_of_birth = $_POST['date_of_birth'] ?? '';
$nationality = $_POST['nationality'] ?? '';
$university_name = $_POST['university_name'] ?? '';
$cgpa = isset($_POST['cgpa']) ? floatval($_POST['cgpa']) : 0.0;
$major = $_POST['major'] ?? '';
$graduation_year = $_POST['graduation_year'] ?? '';
$statement = $_POST['statement'] ?? '';
$username = $_POST['username'] ?? '';
$password_plain = $_POST['password'] ?? '';
$hashed_password = password_hash($password_plain, PASSWORD_DEFAULT);

// Validate required fields
if (!$full_name || !$email || !$username || !$password_plain) {
    die("Please fill in all required fields.");
}

$sql = "INSERT INTO undergraduate_details 
(full_name, email, phone, gender, date_of_birth, nationality, university_name, cgpa, major, graduation_year, statement, username, password)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// Bind parameters: s=string, d=double (float), i=integer
// Types: full_name (s), email (s), phone (s), gender (s), date_of_birth (s), nationality (s),
// university_name (s), cgpa (d), major (s), graduation_year (s), statement (s), username (s), password (s)
$stmt->bind_param(
    "sssssssssssss", 
    $full_name, $email, $phone, $gender, $date_of_birth, $nationality, 
    $university_name, $cgpa, $major, $graduation_year, $statement, $username, $hashed_password
);

if ($stmt->execute()) {
    $_SESSION['applicant'] = [
        "Full Name" => $full_name,
        "Email" => $email,
        "Phone" => $phone,
        "Gender" => $gender,
        "Date of Birth" => $date_of_birth,
        "Nationality" => $nationality,
        "University Name" => $university_name,
        "CGPA" => $cgpa,
        "Major" => $major,
        "Graduation Year" => $graduation_year,
        "Statement" => $statement,
        "Username" => $username
    ];
    header("Location: application_success.php");
    exit();
} else {
    echo "Error: " . htmlspecialchars($stmt->error);
}

$stmt->close();
$conn->close();
?>
