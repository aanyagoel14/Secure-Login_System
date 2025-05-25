<?php

require_once('config.php');

function db_connection(){
  try {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE . ';port=' . DB_PORT;
    $db = new PDO($dsn, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
  } catch (PDOException $e) {
  
  }    
}

?> 