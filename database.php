<?php

require_once('config.php');

function db_connection()
  try{  
    $db = new PDO('mysql:host=' . DB_HOST, DB_USER, DB_PASSWORD, ';dbname=' . DB_DATABASE, ';port=' . DB_PORT);
    return $db;
  } catch (PDOException $e) {
  
  }    
}

?> 