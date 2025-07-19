<?php
session_start();

if (!isset($_SESSION['applicant'])) {
    echo "No application found.";
    exit;
}

$applicant = $_SESSION['applicant'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Application Submitted</title>
  <style>
    body { font-family: Arial; background: #f5f5f5; padding: 20px; }
    .box { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px #ccc; max-width: 700px; margin: auto; }
    h2 { text-align: center; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    td { padding: 8px; border-bottom: 1px solid #ddd; }
    .redirect-msg { margin-top: 20px; color: green; text-align: center; }
  </style>
  <meta http-equiv="refresh" content="10;url=login.php">
</head>
<body>
  <div class="box">
    <h2>Application Submitted Successfully!</h2>
    <table>
      <?php foreach ($applicant as $key => $value): ?>
      <tr>
        <td><strong><?= htmlspecialchars($key) ?></strong></td>
        <td><?= nl2br(htmlspecialchars($value)) ?></td>
      </tr>
      <?php endforeach; ?>
    </table>

    <p class="redirect-msg">You will be redirected to the form in 10 seconds...</p>
  </div>
</body>
</html>

<?php
// Optional: Clear session so they don't resubmit
unset($_SESSION['applicant']);
?>
