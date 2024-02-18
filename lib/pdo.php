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
  $username = 'vincent_parrot';
  $password = '3f7zhhRn4NH69R23';
  $database = 'garage_automobile_vp';
}

try {
  $pdo = new PDO("mysql:dbname=" . _DB_NAME_ . ";host=" . _DB_SERVER_ . ";charset=utf8mb4", _DB_USER_, _DB_PASSWORD_);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}
