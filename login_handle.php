<?php
ob_start(); 
require_once('database.php');
require_once('user.php');
session_start();

unset($_SESSION['signup_success']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    try {
        $user = new User();
        $user_data = $user->find_by_username($username);

        if ($user_data) {
            if (password_verify($password, $user_data['Password'])) {
                $_SESSION['user_id'] = $user_data['ID'];
                $_SESSION['username'] = $user_data['Username'];
                ob_end_clean();
                header("Location: dashboard.php");
                exit;
            } else {
                $_SESSION['login_error'] = "Invalid password";
            }
        } else {
            $_SESSION['login_error'] = "Username not found";
        }
    } catch (PDOException $e) {
        error_log("Login error: " . $e->getMessage());
        $_SESSION['login_error'] = "System error";
    }

    ob_end_clean();
    header("Location: login.php");
    exit;
}