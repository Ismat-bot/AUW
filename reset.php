<?php
require 'db.php';

if (!isset($_GET['token'])) {
    die("Missing token.");
}
$token = $_GET['token'];

$stmt = $conn->prepare("SELECT * FROM users WHERE reset_token = ? AND token_expiry > NOW()");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
?>
<form action="update_password.php" method="POST">
  <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
  <label>New Password:</label>
  <input type="password" name="new_password" required><br>
  <button type="submit">Reset Password</button>
</form>
<?php
} else {
    echo "Invalid or expired token.";
}
?>
