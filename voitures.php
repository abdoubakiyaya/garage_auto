<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/lib/article.php";
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/pdo.php";

?>


<div class="container">
  <div class="row">
    <br />
    <h2 class="py-5" align="center">Voitutrs d'occasions</h2>
    <br />

    <div class="col-md-3">

      <div class="list-group card p-4 bg-danger-subtle">
        <h3>Prix</h3>
        <input type="hidden" id="hidden_minimum_price" value="0" />
        <input type="hidden" id="hidden_maximum_price" value="65000" />
        <p id="price_show">1000€ - 65000€</p>
        <div class="bg-success" id="price_range"></div>
      </div>

      <div class="list-group card mt-3 p-4 bg-danger-subtle">
        <h3>Kilométrage</h3>
        <input type="hidden" id="hidden_minimum_mileage" value="1000" />
        <input type="hidden" id="hidden_maximum_mileage" value="90000" />
        <p id="mileage_show">1000km - 90000km</p>
        <div class="bg-info" id="mileage_range"></div>
      </div>

      <div class="list-group card mt-3 p-4 bg-danger-subtle">
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

      <div class="list-group card mt-3 p-4 bg-danger-subtle">
        <h3>Années</h3>
        <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
          <?php

          $query = "SELECT DISTINCT(year) FROM cars WHERE status = '1' ORDER BY idCars DESC";
          $statement = $pdo->prepare($query);
          $statement->execute();
          $result = $statement->fetchAll();
          foreach ($result as $row) {
          ?>
            <div class="list-group-item checkbox">
              <label><input type="checkbox" class="common_selector year" value="<?php echo $row['year']; ?>"> <?php echo $row['year']; ?></label>
            </div>
          <?php
          }

          ?>
        </div>
      </div>



    </div>

    <div class="col-md-9 ">
      <br />

      <div class="row row-cols-1 row-cols-md-3 g-4 py-5 filter_data">

      </div>

    </div>

  </div>

</div>



<?php
require_once __DIR__ . "/templates/footer.php";
?>