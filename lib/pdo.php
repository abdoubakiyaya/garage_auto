<?php
require_once __DIR__ . "/config.php";

require_once __DIR__ . "/config.php";


//
if (getenv('JAWSDB_URL') !== false) {
  $dbparts = parse_url(getenv('JAWSDB_URL'));

  $hostname = $dbparts['host'];
  $username = $dbparts['user'];
  $password = $dbparts['pass'];
  $database = ltrim($dbparts['path'], '/');

  $sqlContent = file_get_contents('backup.sql');
  $pdo->exec($sqlContent);
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

// $url = getenv('JAWSDB_URL');

// if ($url) {
//   $dbparts = parse_url($url);
//   $hostname = $dbparts['host'];
//   $username = $dbparts['user'];
//   $password = $dbparts['pass'];
//   $database = ltrim($dbparts['path'], '/');

//   try {
//     $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
//     echo "Connexion à la base de données JawsDB réussie.";
//   } catch (PDOException $e) {
//     echo "Erreur de connexion : " . $e->getMessage();
//   }
// } else {
//   echo "La variable d'environnement JAWSDB_URL n'est pas définie.";
// }
