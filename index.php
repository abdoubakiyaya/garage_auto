<?php
require_once __DIR__ . "/templates/header.php";

$cars = [
  ["marque" => "Audi", "annee" => "2000", "tipe_de_carburant" => "Diesel", "prix" => "4500€", "image" => "1-audi.jpg", "kilometrage" => "20000 km"],
  ["marque" => "Opel", "annee" => "2005", "tipe_de_carburant" => "Gaz", "prix" => "1000€", "image" => "2-opel.jpg", "kilometrage" => "50000 km"],
  ["marque" => "Toyota", "annee" => "2000", "tipe_de_carburant" => "Hydrogene", "prix" => "800€", "image" => "3-toyota.jpg", "kilometrage" => "70000 km"],
  ["marque" => "Dacia", "annee" => "2000", "tipe_de_carburant" => "Essence", "prix" => "600€", "image" => "4-dacia.jpg", "kilometrage" => "92000 km"],
];

$prestations = [

  ["titre" => "Revision", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat nostrum cupiditate nemo. Placeat, quae sit! Nostrum modi iste, ullam et blanditiis, voluptatem molestias aliquid nam veniam sapiente rem cumque magnam.
", "prix" => "45€", "image" => "1-prest.png"],
  ["titre" => "Amortisseurs", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat nostrum cupiditate nemo. Placeat, quae sit! Nostrum modi iste, ullam et blanditiis, voluptatem molestias aliquid nam veniam sapiente rem cumque magnam.
", "prix" => "50€", "image" => "1-prest.png"],
  ["titre" => "Vidange", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat nostrum cupiditate nemo. Placeat, quae sit! Nostrum modi iste, ullam et blanditiis, voluptatem molestias aliquid nam veniam sapiente rem cumque magnam.
", "prix" => "40€", "image" => "1-prest.png"],

];

?>


<!-- titre -->
<section>
  <div class="position-relative overflow-hidden p-3 p-md-3 m-md-5 text-center bg-body-tertiary">
    <div class="col-lg-6 p-lg-5 mx-auto my-5">
      <h1 class="display-3 fs-1 fw-bold">Prestations entretien & réparation</h1>
    </div>
    <div class="product-device shadow-lg d-none d-lg-block d-xl-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-lg-block d-xl-block"></div>
  </div>
</section>
<!--affichage dynamique des prestations -->
<section>
  <div class="container py-5">
    <div class="row row-cols-1 row-cols-md-3 g-4 text-start">
      <?php foreach ($prestations as $key => $prestation) { ?>
        <div class="col">
          <div class="card border-0">
            <img src="/uploads/prestations/<?= $prestation["image"] ?>" class="card-img-top" alt="<?= $prestation["titre"] ?>">
            <div class="card-body">
              <h6 class="card-title fw-bold"><?= htmlentities($prestation["titre"]) ?></h6>
              <h6 class="">A partir de <strong class="text-danger"><?= htmlentities($prestation["prix"]) ?></strong></h6>
              <hr>
              <p><?= htmlentities($prestation["content"]) ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- division -->
<section>
  <div class=" container divided py-5">
    <hr>
  </div>
</section>

<!--affichage dynamique des voitures -->
<section>
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
</section>


<?php
require_once __DIR__ . "/templates/footer.php";

?>