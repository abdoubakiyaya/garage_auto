<?php
require_once __DIR__ . "/header.php";

$cars = [
  ["marque" => "Audi", "annee" => "2000", "tipe_de_carburant" => "Diesel", "prix" => "4500€", "image" => "1-audi.jpg", "kilometrage" => "20000 km"],
  ["marque" => "Opel", "annee" => "2005", "tipe_de_carburant" => "Gaz", "prix" => "1000€", "image" => "2-opel.jpg", "kilometrage" => "50000 km"],
  ["marque" => "Toyota", "annee" => "2000", "tipe_de_carburant" => "Hydrogene", "prix" => "800€", "image" => "3-toyota.jpg", "kilometrage" => "70000 km"],
  ["marque" => "Dacia", "annee" => "2000", "tipe_de_carburant" => "Essence", "prix" => "600€", "image" => "4-dacia.jpg", "kilometrage" => "92000 km"],
];

?>


<!-- cars -->
<!-- <section>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4 text-start">
      <?php foreach ($cars as $key => $car) { ?>
        <div class="col">
          <div class="card">
            <img src="/uploads/articles/<?= $car["image"] ?>" class="card-img-top" alt="<?= $car["marque"] ?>">
            <div class="card-body">
              <h6 class="card-marque fw-bold"><?= htmlentities($car["marque"]) ?></h6>
              <h6 class="card-type-carburant fw-bold"><?= htmlentities($car["tipe_de_carburant"]) ?></h6>
              <h6 class="card-annee"><?= htmlentities($car["annee"]) ?></h6>
              <h6 class="card-kilometrage"><?= htmlentities($car["kilometrage"]) ?></h6>
              <hr>
              <h6 class="card-price fw-bold"><?= htmlentities($car["prix"]) ?></h6>
            </div>
            <div class="text-center pb-3">
              <button type="button" class="btn btn-sm btn-dark">
                Détails
              </button>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section> -->


<?php
require_once __DIR__ . "/footer.php";

?>