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

function getTotalPrestations(PDO $pdo): int|bool
{
  $sql = "SELECT COUNT(*) as total FROM prestations";
  $query = $pdo->prepare($sql);
  $query->execute();

  $result = $query->fetch(PDO::FETCH_ASSOC);
  return $result['total'];
}

function savePrestation(PDO $pdo, string $prestation_name, string $description, int $price, string $image, int $id = null): bool
{
  if ($id === null) {
    // Insertion d'une nouvelle prestation
    $query = $pdo->prepare("INSERT INTO prestations (prestation_name, description, price, image) "
      . "VALUES(:prestation_name, :description, :price, :image)");
  } else {
    // Mise à jour d'une prestation existante
    $query = $pdo->prepare("UPDATE prestations SET prestation_name = :prestation_name, description = :description, "
      . "price = :price, image = :image WHERE idPrestation = :idPrestation");

    $query->bindValue(':idPrestation', $id, PDO::PARAM_INT);
  }

  // Les paramètres communs pour l'insertion et la mise à jour
  $query->bindValue(':prestation_name', $prestation_name, PDO::PARAM_STR);
  $query->bindValue(':description', $description, PDO::PARAM_STR);
  $query->bindValue(':price', $price, PDO::PARAM_INT);
  $query->bindValue(':image', $image, PDO::PARAM_STR);

  return $query->execute();
}

function deletePrestation(PDO $pdo, int $id): bool
{

  $query = $pdo->prepare("DELETE FROM prestations WHERE idPrestation = :idPrestation");
  $query->bindValue(':idPrestation', $id, $pdo::PARAM_INT);

  $query->execute();
  if ($query->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}
