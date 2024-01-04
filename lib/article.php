<?php


function getCars(PDO $pdo, int $limit = null): array
{
  $sql = "SELECT * FROM cars ORDER BY idCars DESC";
  if ($limit) {
    $sql .= " LIMIT :limit";
  }

  $query = $pdo->prepare($sql);

  if ($limit) {
    $query->bindValue(":limit", $limit, PDO::PARAM_INT);
  }

  $query->execute();
  $cars = $query->fetchAll(PDO::FETCH_ASSOC);

  return $cars;
}


function getCarById(PDO $pdo, int $id): array | bool
{
  $sql = "SELECT * FROM cars WHERE idCars = :idCars";

  $query = $pdo->prepare($sql);

  $query->bindValue(":idCars", $id, PDO::PARAM_INT);

  $query->execute();
  $car = $query->fetch(PDO::FETCH_ASSOC);

  return $car;
}

// erreur d'image
function getCarImage(string|null $image): string
{
  if ($image === null) {
    return _ASSETS_IMAGES_FOLDER_ . "car_default.jpg";
  } else {
    return _CARS_IMAGES_FOLDER_ . htmlentities($image);
  }
}
