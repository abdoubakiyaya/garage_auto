<?php

require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/pdo.php";



$brand = $_POST['brand'];
$model = $_POST['model'];
$year = $_POST['year'];
$fuel_type = $_POST['fuel_type'];
$mileage = $_POST['mileage'];
$price = $_POST['price'];

$image_id = bin2hex(random_bytes(16)); // Génère un ID hexadécimal de 32 caractères


$stmt = $pdo->prepare("INSERT INTO cars (brand, model, year, fuel_type, mileage, price, image_id) VALUES (:brand, :model, :year, :fuel_type, :mileage, :price, :image_id)");

$stmt->bindValue(':brand', $brand, PDO::PARAM_STR);
$stmt->bindValue(':model', $model, PDO::PARAM_STR);
$stmt->bindValue(':year', $year, PDO::PARAM_INT);
$stmt->bindValue(':fuel_type', $fuel_type, PDO::PARAM_STR);
$stmt->bindValue(':mileage', $mileage, PDO::PARAM_INT);
$stmt->bindValue(':price', $price, PDO::PARAM_STR);
$stmt->bindValue(':image_id', $image_id, PDO::PARAM_STR);

// $stmt->execute();

// --------------------------------------------

if ($stmt->execute()) {
  $car_id = $pdo->lastInsertId();

  if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $image_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $image_name = $car_id . "_" . $image_id . "." . $image_extension;
    $image_path = "/../lib/" . $image_name;
    var_dump($image_path);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
      $update_sql = "UPDATE cars SET image_path = :image_path WHERE car_id = :car_id";
      $update_stmt = $pdo->prepare($update_sql);
      $update_stmt->bindValue(':image_path', $image_path, PDO::PARAM_STR);
      $update_stmt->bindValue(':car_id', $car_id, PDO::PARAM_INT);
      $update_stmt->execute();

      echo "Voiture ajoutée avec succès.";
    } else {
      echo "Erreur lors du téléchargement de l'image.";
    }
  } else {
    echo "Voiture ajoutée avec succès (sans image).";
  }
} else {
  echo "Erreur lors de l'ajout de la voiture.";
}

$pdo = null; // Fermez la connexion à la base de données

?>

// --------------------------------------------------------