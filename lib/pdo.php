<?php
require_once __DIR__ . "/config.php";


//
if (getenv('JAWSDB_URL') !== false) {
  $dbparts = parse_url(getenv('JAWSDB_URL'));

  $hostname = $dbparts['r4919aobtbi97j46.cbetxkdyhwsb.us-east-1.rds.amazonaws.com'];
  $username = $dbparts['dm8lyomelexxg2mq'];
  $password = $dbparts['t9ogfpak8oj5mc3r'];
  $database = ltrim($dbparts['path'], '/');
} else {
  // connexion locale
  $hostname = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'garage_automobile_vp';
}

try {
  $pdo = new PDO("mysql:host={$hostname};dbname={$database};charset=utf8mb4", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die('Erreur : ' . $e->getMessage());
}
