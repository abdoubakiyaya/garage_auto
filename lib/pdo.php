<?php
require_once __DIR__ . "/config.php";


//
if (getenv('JAWSDB_URL') !== false) {

  $dbparts = parse_url(getenv('JAWSDB_URL'));

  $hostname = $dbparts['host'];
  $username = $dbparts['user'];
  $password = $dbparts['pass'];
  $database = ltrim($dbparts['path'], '/');
} else {
  // connexion locale
  $hostname = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'bd_garage';
}

try {
  $pdo = new PDO("mysql:host={$hostname};dbname={$database};charset=utf8mb4", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die('Erreur : ' . $e->getMessage());
}
