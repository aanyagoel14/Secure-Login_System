<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <?php if (isset($_SESSION['login_error'])): ?>
    <div class="alert alert-error"><?= $_SESSION['login_error'] ?></div>
    <?php unset($_SESSION['login_error']); ?>
  <?php endif; ?>

  <?php if (isset($_SESSION['signup_success'])): ?>
    <div class="alert alert-success"><?= $_SESSION['signup_success'] ?></div>
    <?php unset($_SESSION['signup_success']); ?>
  <?php endif; ?>

  <h2>Login</h2>
  <form method="POST" action="login_handle.php">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
  </form>
  <p><a href="signup.php">Don't have an account? Create one</a></p>
</body>
</html>