<!DOCTYPE html>
<html>
<head>
  <title>Create Account</title>
</head>
<body>
  <form method="POST" action="signup_process.php">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    Confirm Password: <input type="password" name="confirm_password" required><br><br>
    <button type="submit">Create Account</button>
  </form>
  <p><a href="login.php">Already have an account? Login here</a></p>
</body>
</html>