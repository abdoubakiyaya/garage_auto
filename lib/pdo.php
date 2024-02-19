<?php
require_once __DIR__ . "/config.php";


$url = getenv('JAWSDB_URL');

if ($url) {
  $dbparts = parse_url($url);
  $hostname = $dbparts['host'];
  $username = $dbparts['user'];
  $password = $dbparts['pass'];
  $database = ltrim($dbparts['path'], '/');

  try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    echo "Connexion à la base de données JawsDB réussie.";
  } catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
  }
} else {
  echo "La variable d'environnement JAWSDB_URL n'est pas définie.";
}
