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
} else {
  // connexion locale
  $hostname = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'garage_automobile_vp';
}

try {
  $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
