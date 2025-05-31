<?php
require_once('user.php');

$users = new User();
$user_list = $users->get_all_users();

echo '<pre>';
?>

<h2>Welcome to Our App</h2>
<ul>
  <li><a href="signup.php">Create an Account</a></li>
  <li><a href="login.php">Login</a></li>
</ul>
