<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/lib/article.php";
require_once __DIR__ . "/lib/config.php"; //connexion
require_once __DIR__ . "/lib/pdo.php"; //connexion



//$cars = getCars($pdo);
//$query = "SELECT * FROM cars WHERE status = '1' ORDER BY idCars DESC";
//$query = "SELECT * FROM cars ORDER BY idCars DESC";
//$stmt = $pdo->query($query);
//$cars = $stmt->fetch(PDO::FETCH_ASSOC);
// $query = "SELECT * FROM cars WHERE status = '1' ORDER BY idCars DESC";
// $cars = getCars($pdo, $limit, $page);
//------------------------------
$query = "SELECT * FROM cars WHERE status = '1' ORDER BY idCars DESC";
$stmt = $pdo->query($query);

?>

<section>
  <div class="price-range-block">


    <div class="container">
      <div class="row">
        <div class="col-md-3 bg-success pt-3">
          <span class="filter-heading">Price:</span>
          <div id="slider-range" class="price-filter-range bg-danger" name="rangeInput"></div>

          <div style="margin:20px auto">
            <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" />
            <input type="number" min=0 max="100000" oninput="validity.valid||(value='100000');" id="max_price" class="price-range-field" />
          </div>

          <!-- <div id="searchResults" class="search-results-block"></div> -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- cars -->
<section>
  <div class="container py-5">
    <div id="searchResults" class="search-results-block bg-primary">

      <div class="row row-cols-1 row-cols-md-4 g-4 text-start">

        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          // Utilisez les données de la ligne comme nécessaire
          $idCars = $row['idCars'];
          $brand = $row['brand'];
          $model = $row['model'];
          $year = $row['year'];
          $fuel_type = $row['fuel_type'];
          $mileage = $row['mileage'];
          $price = $row['price'];
          $image = $row['image'];
          $detail = $row['detail'];

        ?>
          <div class="col">
            <div class="card">
              <img src="<?= _CARS_IMAGES_FOLDER_ ?>/<?= htmlentities($image) ?>" class="card-img-top" alt="<?= htmlentities($brand) ?>">
              <div class="card-body">
                <h6 class="card-marque fw-bold"><?= htmlentities($brand) ?> - <?= htmlentities($model) ?></h6>
                <h6 class="card-type-carburant fw-bold"><?= htmlentities($fuel_type) ?></h6>
                <h6 class="card-annee">Année <?= htmlentities($year) ?></h6>
                <h6 class="card-kilometrage"><?= htmlentities($mileage) ?> kilomètres</h6>
                <hr>
                <h6 class="card-price fw-bold"><?= htmlentities($price) ?></h6>
              </div>
              <div class="text-center pb-3">
                <a href="/voiture.php?id=<?= htmlentities($idCars) ?>" class="btn btn-sm btn-dark">
                  Détails
                </a>
              </div>
            </div>
          </div>
        <?php  } ?>
      </div>

    </div>

  </div>
</section>

<?php
require_once __DIR__ . "/templates/footer.php";
?>



<!--  -->
<!--  -->
<!--  -->
<?php
require_once __DIR__ . "/templates/header.php";
//require_once __DIR__ . "/lib/article.php";
require_once __DIR__ . "/lib/config.php"; //connexion
require_once __DIR__ . "/lib/pdo.php"; //connexion
?>

<!-- <script>
  alert("hello");
</script> -->
<div class="container">
  <div class="row">
    <br />
    <h2 class="py-5" align="center">Voitutrs d'occasions</h2>
    <br />
    <div class="col-md-3">
      <div class="list-group">
        <h3>Price</h3>
        <input type="hidden" id="hidden_minimum_price" value="0" />
        <input type="hidden" id="hidden_maximum_price" value="65000" />
        <p id="price_show">1000 - 65000</p>
        <div class="bg-success" id="price_range"></div>
      </div>
      <div class="list-group">
        <h3>Marque</h3>
        <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
          <?php

          $query = "SELECT DISTINCT(brand) FROM cars WHERE status = '1' ORDER BY idCars DESC";
          $statement = $pdo->prepare($query);
          $statement->execute();
          $result = $statement->fetchAll();
          foreach ($result as $row) {
          ?>
            <div class="list-group-item checkbox">
              <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['brand']; ?>"> <?php echo $row['brand']; ?></label>
            </div>
          <?php
          }

          ?>
        </div>
      </div>

      <!-- <div class="list-group">
        <h3>RAM</h3>
        <?php

        $query = "
                    SELECT DISTINCT(product_ram) FROM product WHERE product_status = '1' ORDER BY product_ram DESC
                    ";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach ($result as $row) {
        ?>
          <div class="list-group-item checkbox">
            <label><input type="checkbox" class="common_selector ram" value="<?php echo $row['product_ram']; ?>"> <?php echo $row['product_ram']; ?> GB</label>
          </div>
        <?php
        }

        ?>
      </div> -->

      <!-- <div class="list-group">
        <h3>Internal Storage</h3>
        <?php
        $query = "
                    SELECT DISTINCT(product_storage) FROM product WHERE product_status = '1' ORDER BY product_storage DESC
                    ";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach ($result as $row) {
        ?>
          <div class="list-group-item checkbox">
            <label><input type="checkbox" class="common_selector storage" value="<?php echo $row['product_storage']; ?>"> <?php echo $row['product_storage']; ?> GB</label>
          </div>
        <?php
        }
        ?>
      </div> -->
    </div>

    <div class="col-md-9 bg-info">
      <br />
      <div class="row filter_data">

      </div>
    </div>
  </div>

</div>

<?php
require_once __DIR__ . "/templates/footer.php";

?>
<!--  -->