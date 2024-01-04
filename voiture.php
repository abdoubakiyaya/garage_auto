<?php
require_once __DIR__ . "/lib/article.php";

$id = $_GET["id"];
$car = $cars[$id];


require_once __DIR__ . "/lib/menu.php";

$mainMenu["voiture.php"] = ["title" => $car["marque"], "meta_description" => $car["content"], "exclude" => true];

require_once __DIR__ . "/templates/header.php";
?>


<div class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= htmlentities($car["marque"]) ?></h1>
      <p class="lead"><?= htmlentities($car["content"]) ?></p>
      <span>Année <?= htmlentities($car["annee"]) ?> /</span>
      <span><?= htmlentities($car["kilometrage"]) ?> /</span>
      <span> Type de carburant <?= htmlentities($car["tipe_de_carburant"]) ?> </span> <br>
      <strong>Prix <?= htmlentities($car["prix"]) ?></strong>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start py-3">
        <button type="button" class="btn btn-sm btn-outline-secondary btn-lg px-4">Nous contacter</button>
      </div>
    </div>

    <div class="col-lg-6">
      <img src="/uploads/articles/<?= htmlentities($car["image"]) ?>" class="d-block mx-lg-auto img-fluid" alt="<?= htmlentities($car["marque"]) ?>" width="700" height="500" loading="lazy">
    </div>

  </div>
</div>

<?php
require_once __DIR__ . "/templates/footer.php";
?>