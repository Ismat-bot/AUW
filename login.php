<?php
session_start();
require 'db.php';  // your DB connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!$email || !$password) {
        $error = "Please enter both email and password.";
    } else {
        $stmt = $conn->prepare("SELECT id, first_name, last_name, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Correct password: set session variables
                $_SESSION['email'] = $email;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_first_name'] = $user['first_name'];
                $_SESSION['user_last_name'] = $user['last_name'];

                header("Location: index.php");
                exit;
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "No account found with that email.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>AUW Login</title>
  <link rel="stylesheet" href="login.css" />
</head>
<body>
  <div class="background">
    <div class="login-wrapper">
      <div class="login-box">
        <img src="logo.png" alt="Logo" class="logo" />
        <h2>AUW Login</h2>
      </div>
      <form action="login.php" method="POST">
        <label for="email">Email</label>
        <input class="input-field" type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input class="input-field" type="password" id="password" name="password" required>

        <button class="signin-btn" type="submit">Login</button>
      </form>
      <div class="extra-links" style="text-align:center; margin-top:10px;">
        <a href="register.html">Register</a> | 
        <a href="forgot_password.html">Forgot Password?</a>
      </div>
    </div>
  </div>
</body>
</html>
