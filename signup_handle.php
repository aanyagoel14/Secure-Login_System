<?php
ob_start(); 
session_start();
require_once('database.php');
require_once('user.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validate inputs
    if (empty($username) || empty($password) || empty($confirm_password)) {
        $_SESSION['signup_error'] = "All fields are required";
        header("Location: signup.php");
        exit;
    }

    if ($password !== $confirm_password) {
        $_SESSION['signup_error'] = "Passwords do not match";
        header("Location: signup.php");
        exit;
    }

    // Replace the existing password validation with:
    if (strlen($password) < 8) {
        $_SESSION['signup_error'] = "Password must be at least 10 characters long";
        header("Location: signup.php");
        exit;
    }

    try {
        $user = new User();
        $existing_user = $user->find_by_username($username);

        if ($existing_user) {
            $_SESSION['signup_error'] = "Username already exists";
            header("Location: signup.php");
            exit;
        }

        if ($user->create_user($username, $password)) {
            $_SESSION['signup_success'] = "Account created successfully! Please login.";
            header("Location: login.php");
            exit;
        }
    } catch (Exception $e) {
        $_SESSION['signup_error'] = "Registration failed. Please try again.";
        header("Location: signup.php");
        exit;
    }
}

header("Location: signup.php");
exit;