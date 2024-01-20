<?php
require_once __DIR__ . "/config.php";
require_once __DIR__ . "/pdo.php";

if (isset($_POST["action"])) {
  $query = "SELECT * FROM cars WHERE status = '1'";

  if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
    $query .= " AND price BETWEEN :minimum_price AND :maximum_price";
  }

  if (isset($_POST["minimum_mileage"], $_POST["maximum_mileage"]) && !empty($_POST["minimum_mileage"]) && !empty($_POST["maximum_mileage"])) {
    $query .= " AND mileage BETWEEN :minimum_mileage AND :maximum_mileage";
  }

  if (isset($_POST["brand"])) {
    $brand_filter = implode("','", $_POST["brand"]);
    $query .= " AND brand IN('" . $brand_filter . "')";
  }

  if (isset($_POST["year"])) {
    $year_filter = implode("','", $_POST["year"]);
    $query .= " AND year IN('" . $year_filter . "')";
  }

  $statement = $pdo->prepare($query);

  if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
    $statement->bindParam(':minimum_price', $_POST["minimum_price"], PDO::PARAM_INT);
    $statement->bindParam(':maximum_price', $_POST["maximum_price"], PDO::PARAM_INT);
  }

  if (isset($_POST["minimum_mileage"], $_POST["maximum_mileage"]) && !empty($_POST["minimum_mileage"]) && !empty($_POST["maximum_mileage"])) {
    $statement->bindParam(':minimum_mileage', $_POST["minimum_mileage"], PDO::PARAM_INT);
    $statement->bindParam(':maximum_mileage', $_POST["maximum_mileage"], PDO::PARAM_INT);
  }

  $statement->execute();
  $result = $statement->fetchAll();
  $total_row = $statement->rowCount();
  $output = '';

  if ($total_row > 0) {
    foreach ($result as $row) {
      $output .= '
                <div class="col">
                    <img src="/uploads/articles/' . $row['image'] . '" class="card-img-top" alt="' . $row['brand'] . '">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-marque fw-bold">' . $row['brand'] . ' - ' . $row['model'] . '</h6>
                            <h6 class="card-type-carburant fw-bold">' . $row['fuel_type'] . '</h6>
                            <h6 class="card-annee">Année ' . $row['year'] . '</h6>
                            <h6 class="card-kilometrage">' . $row['mileage'] . ' kilomètres</h6>
                            <hr>
                            <h6 class="card-price fw-bold">' . $row['price'] . '</h6>
                        </div>
                        <div class="text-center pb-3">
                            <a href="/voiture.php?id=' . $row['idCars'] . '" class="btn btn-sm btn-dark">
                                Détails
                            </a>
                        </div>
                    </div>
                </div>
            ';
    }
  } else {
    $output = '<h3>No Data Found</h3>';
  }

  echo $output;
}
