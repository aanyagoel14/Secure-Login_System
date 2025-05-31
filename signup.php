<?php
session_start(); // ADD THIS AT THE TOP
?>
<!DOCTYPE html>
<html>
<head>
  <title>Create Account</title>
  <style>
    .alert {
      padding: 10px;
      margin: 10px 0;
      border-radius: 4px;
    }
    .alert-success { background: #d4edda; color: #155724; }
    .alert-error { background: #f8d7da; color: #721c24; }
  </style>
</head>
<body>
  <?php
  // Display success message if exists
  if (isset($_SESSION['signup_success'])) {
    echo '<div class="alert alert-success">'.$_SESSION['signup_success'].'</div>';
    unset($_SESSION['signup_success']);
  }

  // Display error message if exists
  if (isset($_SESSION['signup_error'])) {
    echo '<div class="alert alert-error">'.$_SESSION['signup_error'].'</div>';
    unset($_SESSION['signup_error']);
  }
  ?>

  <h2>Create Account</h2>
  <form method="POST" action="signup_handle.php">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required 
             title="Must be at least 8 characters with uppercase, number, and special character"><br><br>
    Confirm Password: <input type="password" name="confirm_password" required><br><br>
    <button type="submit">Create Account</button>
  </form>
  <p><a href="login.php">Already have an account? Login here</a></p>
</body>
</html>