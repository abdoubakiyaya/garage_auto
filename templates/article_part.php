<?php

$image_path = getCarImage($car["image"]); //erreur d'image

?>




<div class="col">
  <div class="card">
    <img src="/uploads/articles/<?= htmlentities($car["image"]) ?>" class="card-img-top" alt="<?= htmlentities($car["brand"]) ?>">
    <div class="card-body">
      <h6 class="card-marque fw-bold"><?= htmlentities($car["brand"]) ?></h6>
      <h6 class="card-type-carburant fw-bold"><?= htmlentities($car["fuel_type"]) ?></h6>
      <h6 class="card-annee"><?= htmlentities($car["year"]) ?></h6>
      <h6 class="card-kilometrage"><?= htmlentities($car["mileage"]) ?></h6>
      <hr>
      <h6 class="card-price fw-bold"><?= htmlentities($car["price"]) ?></h6>
    </div>
    <div class="text-center pb-3">
      <a href="/voiture.php?id=<?= htmlentities($car["idCars"]) ?>" class="btn btn-sm btn-dark">
        Détails
      </a>
    </div>
  </div>
</div>