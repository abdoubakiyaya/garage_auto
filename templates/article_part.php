<div class="col">
  <div class="card">
    <img src="/uploads/articles/<?= htmlentities($car["image"]) ?>" class="card-img-top" alt="<?= htmlentities($car["marque"]) ?>">
    <div class="card-body">
      <h6 class="card-marque fw-bold"><?= htmlentities($car["marque"]) ?></h6>
      <h6 class="card-type-carburant fw-bold"><?= htmlentities($car["tipe_de_carburant"]) ?></h6>
      <h6 class="card-annee"><?= htmlentities($car["annee"]) ?></h6>
      <h6 class="card-kilometrage"><?= htmlentities($car["kilometrage"]) ?></h6>
      <hr>
      <h6 class="card-price fw-bold"><?= htmlentities($car["prix"]) ?></h6>
    </div>
    <div class="text-center pb-3">
      <a href="/voiture.php?id=<?= htmlentities($key) ?>" class="btn btn-sm btn-dark">
        Détails
      </a>
    </div>
  </div>
</div>