<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once('user.php');
$user = new User();
$current_user = $user->find_by_username($_SESSION['username']);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
</head>
<body>
  <h2>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
  <p><a href="logout.php">Logout</a></p>
  
  <?php if ($current_user): ?>
    <h3>Your Account Info:</h3>
    <p>Username: <?= htmlspecialchars($current_user['Username']) ?></p>
    <p>User ID: <?= htmlspecialchars($current_user['ID']) ?></p>
  <?php endif; ?>
</body>
</html>