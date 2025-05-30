<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
</head>
<body>
  <h2>Login</h2>
  <form method="POST" action="login_process.php">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
  </form>
  <p><a href="signup.php">Don't have an account? Create one.</a></p>
</body>
</html>