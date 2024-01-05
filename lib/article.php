<?php

function getCarById(PDO $pdo, int $id): array|bool
{
  $query = $pdo->prepare("SELECT * FROM cars WHERE idCars = :idCars");
  $query->bindValue(":idCars", $id, PDO::PARAM_INT);
  $query->execute();
  return $query->fetch(PDO::FETCH_ASSOC);
}

function getCars(PDO $pdo, int $limit = null, int $page = null): array|bool
{
  $sql = "SELECT * FROM cars ORDER BY idCars DESC";

  if ($limit && !$page) {
    $sql .= " LIMIT  :limit";
  }
  if ($limit && $page) {
    $sql .= " LIMIT :offest, :limit";
  }

  $query = $pdo->prepare($sql);

  if ($limit) {
    $query->bindValue(":limit", $limit, PDO::PARAM_INT);
  }
  if ($page) {
    $offset = ($page - 1) * $limit;
    $query->bindValue(":offest", $offset, PDO::PARAM_INT);
  }

  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function getTotalCars(PDO $pdo): int|bool
{
  $sql = "SELECT COUNT(*) as total FROM cars";
  $query = $pdo->prepare($sql);
  $query->execute();

  $result = $query->fetch(PDO::FETCH_ASSOC);
  return $result['total'];
}


function saveCar(PDO $pdo, string $brand, string $model, int $year, string $fuel_type, int $mileage, int $price, ?string $image, string $detail, int $id = null): bool
{
  if ($id === null) {
    // Insertion d'une nouvelle voiture
    $query = $pdo->prepare("INSERT INTO cars (brand, model, year, fuel_type, mileage, price, image, detail) "
      . "VALUES(:brand, :model, :year, :fuel_type, :mileage, :price, :image, :detail)");
  } else {
    // Mise à jour d'une voiture existante
    $query = $pdo->prepare("UPDATE cars SET brand = :brand, model = :model, year = :year, fuel_type = :fuel_type, "
      . "mileage = :mileage, price = :price, image = :image, detail = :detail WHERE idCars = :idCars");

    $query->bindValue(':idCars', $id, PDO::PARAM_INT);
  }

  // Les paramètres communs pour l'insertion et la mise à jour
  $query->bindValue(':brand', $brand, PDO::PARAM_STR);
  $query->bindValue(':model', $model, PDO::PARAM_STR);
  $query->bindValue(':year', $year, PDO::PARAM_INT);
  $query->bindValue(':fuel_type', $fuel_type, PDO::PARAM_STR);
  $query->bindValue(':mileage', $mileage, PDO::PARAM_INT);
  $query->bindValue(':price', $price, PDO::PARAM_INT);
  $query->bindValue(':image', $image, PDO::PARAM_STR);
  $query->bindValue(':detail', $detail, PDO::PARAM_STR);

  return $query->execute();
}

function deleteCar(PDO $pdo, int $id): bool
{

  $query = $pdo->prepare("DELETE FROM cars WHERE idCars = :idCars");
  $query->bindValue(':idCars', $id, $pdo::PARAM_INT);

  $query->execute();
  if ($query->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}
