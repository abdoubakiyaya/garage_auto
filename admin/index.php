<?php
require_once __DIR__ . "/templates/header.php";


?>


<div class="container text-center py-5">
  <h1>Administrateur</h1>
</div>

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

<!-- add de cars -->
<!-- <div class="container">
  <div class="w-50 card mx-auto p-4">
    <h1 class="mt-4">Ajouter une voiture d'occasion</h1>
    <form action="/admin/process_add_car.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="brand" class="form-label">Marque:</label>
        <input type="text" class="form-control" id="brand" name="brand" required>
      </div>
      <div class="mb-3">
        <label for="model" class="form-label">Modèle</label>
        <input type="text" class="form-control" id="model" name="model" required>
      </div>
      <div class="mb-3">
        <label for="year" class="form-label">Année</label>
        <input type="date" class="form-control" id="year" name="year" required>
      </div>
      <div class="mb-3">
        <label for="fuel_type" class="form-label">Type de carburant</label>
        <input type="text" class="form-control" id="fuel_type" name="fuel_type" required>
      </div>
      <div class="mb-3">
        <label for="mileage" class="form-label">Kilométrage</label>
        <input type="number" class="form-control" id="mileage" name="mileage" required>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Prix de la voiture</label>
        <input type="number" class="form-control" id="price" name="price" required>
      </div>     

      <div class="mb-3">
        <label for="image" class="form-label">Image de la voiture:</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>

      </div>

      <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
  </div>
</div> -->




<?php
require_once __DIR__ . "/templates/footer.php";

?>