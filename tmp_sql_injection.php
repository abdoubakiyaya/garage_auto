<?php
try {
  $pdo = new PDO("mysql:dbname=" . _DB_NAME_ . ";host=" . _DB_SERVER_ . ";charset=utf8mb4", _DB_USER_, _DB_PASSWORD_);
} catch (Exception $e) {
  die("Erreur : " . $e->getMessage());
}

$id = $_GET["id"];
$query = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$query->bindValue(":id", $id, PDO::PARAM_INT);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);
