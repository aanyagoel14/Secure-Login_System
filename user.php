<?php

require_once('database.php')

class User{
  public function get_all_users() {
    $db = db_connection();
    $stmt = $db->prepare('SELECT * FROM users');
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
    
  }
}