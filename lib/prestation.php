<?php


// $prestations = [

//   ["titre" => "Revision", "content" =>
//   "Lorem ipsum dolor sit amet consectetur adipisicing elit ", "prix" => "45€", "image" => "1-prest.png"],

//   ["titre" => "Amortisseurs", "content" =>
//   "Lorem ipsum dolor sit amet consectetur ", "prix" => "50€", "image" => "1-prest.png"],

//   ["titre" => "Vidange", "content" => "Lorem ipsum dolor sit amet consectetur", "prix" => "40€", "image" => "1-prest.png"],
//   ["titre" => "Vidange", "content" => "Lorem ipsum dolor sit amet consectetur", "prix" => "40€", "image" => "1-prest.png"],
//   ["titre" => "Vidange", "content" => "Lorem ipsum dolor sit amet consectetur", "prix" => "40€", "image" => "1-prest.png"],
//   ["titre" => "Vidange", "content" => "Lorem ipsum dolor sit amet consectetur", "prix" => "40€", "image" => "1-prest.png"],

// ];
function getPrestationById(PDO $pdo, int $id): array|bool
{
  $query = $pdo->prepare("SELECT * FROM prestations WHERE idPrestation = :idPrestation");
  $query->bindValue(":idPrestation", $id, PDO::PARAM_INT);
  $query->execute();
  return $query->fetch(PDO::FETCH_ASSOC);
}


function getPrestations(PDO $pdo, int $limit = null): array
{
  $sql = "SELECT * FROM prestations ORDER BY idPrestation DESC";
  if ($limit) {
    $sql .= " LIMIT :limit";
  }

  $query = $pdo->prepare($sql);

  if ($limit) {
    $query->bindValue(":limit", $limit, PDO::PARAM_INT);
  }

  $query->execute();
  $prestations = $query->fetchAll(PDO::FETCH_ASSOC);

  return $prestations;
}
