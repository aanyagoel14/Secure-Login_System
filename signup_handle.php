<?php
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        die('Passwords don\'t match.'); }

    if (strlen($password) < 10) {
        die('Password must be at least 10 characters long.'); }
    
    try {
        $db = db_connection();

        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        if ($stmt->rowCount() > 0) {
            die('Username already exists. Please choose another.'); }

    //     $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    //     $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    //     $stmt->execute([
    //         'username' => $username,
    //         'password' => $hashed_password
    //     ]);

        echo 'Account created successfully. <a href="login.php">Login here</a>';

    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
    }
}
?>
