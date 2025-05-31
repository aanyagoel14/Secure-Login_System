<?php
require_once('database.php');

class User {
    public function get_all_users() {
        $db = db_connection();
        $query = "SELECT ID, Username FROM users";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create_user($username, $password) {
        $db = db_connection();
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (Username, Password) VALUES (?, ?)";
        $stmt = $db->prepare($query);
        return $stmt->execute([$username, $hashed_password]);
    }

    public function find_by_username($username) {
        $db = db_connection();
        $query = "SELECT ID, Username, Password FROM users WHERE Username = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}