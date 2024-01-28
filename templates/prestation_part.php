<!-- prestations -->

<div class="card-group">
  <div class="card">
    <div>
      <img src="/uploads/prestations/<?= htmlentities($prestation["image"]) ?>" class="card-img-top h-50" alt="<?= htmlentities($prestation["prestation_name"]) ?>">
      <a class="bg-danger text-light p-2 card" href="/prestation.php?id=<?= htmlentities($prestation["id"]) ?>">Prendre rendez-vous</a>
    </div>
    <div class="card-body">
      <h6 class="card-title fw-bold"><?= htmlentities($prestation["prestation_name"]) ?></h6>
      <h6 class="">à partir de <strong class="text-danger"><?= htmlentities($prestation["price"]) ?> €</strong></h6>
      <hr>
      <p><?= htmlentities($prestation["description"]) ?></p>
    </div>
  </div>
</div>