<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Create Account</title>
  <style>
    .alert { padding: 5px; margin: 5px 0; }
    .success { color: green; }
    .error { color: red; }
  </style>
</head>
<body>
  <?php
  if (isset($_SESSION['signup_success'])) {
    echo '<div class="alert success">'.$_SESSION['signup_success'].'</div>';
    unset($_SESSION['signup_success']);
  }

  if (isset($_SESSION['signup_error'])) {
    echo '<div class="alert error">'.$_SESSION['signup_error'].'</div>';
    unset($_SESSION['signup_error']);
  }
  ?>

  <h2>Create Account</h2>
  <form method="POST" action="signup_handle.php">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required 
             title="Must be at least 8 characters"><br><br>
    Confirm Password: <input type="password" name="confirm_password" required><br><br>
    <input type="submit" value="Create Account">
  </form>
  <p><a href="login.php">Already have an account? Login here</a></p>
</body>
</html>