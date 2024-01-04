<?php

// $cars = [
//   ["marque" => "Audi", "annee" => "2000", "tipe_de_carburant" => "Diesel", "prix" => "4500€", "image" => "1-audi.jpg", "kilometrage" => "20000 km", "content" => "Audi Quickly design and customize responsive mobile-first "],
//   ["marque" => "Opel", "annee" => "2005", "tipe_de_carburant" => "Gaz", "prix" => "1000€", "image" => "2-opel.jpg", "kilometrage" => "50000 km", "content" => "Opel sites with Bootstrap, the world’s most popular front-end open "],
//   ["marque" => "Toyota", "annee" => "2000", "tipe_de_carburant" => "Hydrogene", "prix" => "800€", "image" => "3-toyota.jpg", "kilometrage" => "70000 km", "content" => "Toyota source toolkit, featuring Sass variables and mixins, responsive "],
//   ["marque" => "Dacia", "annee" => "2000", "tipe_de_carburant" => "Essence", "prix" => "600€", "image" => "4-dacia.jpg", "kilometrage" => "92000 km", "content" => "Dacia grid system, extensive prebuilt components, and powerful JavaScript plugins. "],
// ];



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
