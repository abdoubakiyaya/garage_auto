<?php
require_once __DIR__ . "/config.php";
require_once __DIR__ . "/pdo.php";
//fetch_data.php

// include('database_connection.php');

if (isset($_POST["action"])) {
  $query = "
		SELECT * FROM cars WHERE status = '1'
	";
  if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
    $query .= "
		 AND price BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "'
		";
  }
  if (isset($_POST["year"])) {
    $year_filter = implode("','", $_POST["year"]);
    $query .= "
		 AND brand IN('" . $year_filter . "')
		";
  }


  $statement = $pdo->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $total_row = $statement->rowCount();
  $output = '';
  if ($total_row > 0) {
    foreach ($result as $row) {
      $output .= '
	        <div class="col bg-warning">
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
