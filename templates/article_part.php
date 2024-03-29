<?php

// $image_path = getCarImage($car["image"]); //erreur d'image

?>



<div class="card-group">
  <div class="card">
    <img src="<?= _CARS_IMAGES_FOLDER_ ?>/<?= htmlentities($car["image"]) ?>" class="card-img-top border" alt="<?= htmlentities($car["brand"]) ?>">
    <div class="card-body">
      <h6 class="card-marque fw-bold"><?= htmlentities($car["brand"]) ?> - <?= htmlentities($car["model"]) ?></h6>
      <h6 class="card-type-carburant fw-bold"><?= htmlentities($car["fuel_type"]) ?></h6>
      <h6 class="card-annee">Année <?= htmlentities($car["year"]) ?></h6>
      <h6 class="card-kilometrage"><?= htmlentities($car["mileage"]) ?> kilomètres</h6>
      <hr>
      <h6 class="card-price fw-bold"><?= htmlentities($car["price"]) ?> €</h6>
    </div>
    <div class="text-center pb-3">
      <a href="/voiture.php?id=<?= htmlentities($car["idCars"]) ?>" class="btn btn-sm btn-dark">
        Détails
      </a>
    </div>
  </div>
</div>