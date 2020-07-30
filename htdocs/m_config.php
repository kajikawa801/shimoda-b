<?php
/*
Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
function h($var) {
    if (is_array($var)) {
      return array_map('h', $var);
    } else {
      return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
    }
  }
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'testuser');
define('DB_PASSWORD', 'pass');
define('DB_NAME', 'mydb');

try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    die("Error: Could not connect. " . $e->getMessage());
}
?>
