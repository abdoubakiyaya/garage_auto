<?php
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/article.php";

require_once __DIR__ . "/lib/menu.php";

$mainMenu["voiture.php"] = ["title" => "Article introuvable", "meta_description" => "Article introuvable", "exclude" => true];

$error = false;

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $car = getCarById($pdo, $id);

  if ($car) {
    $image_path = getCarImage($car["image"]); //erreur d'image
    $mainMenu["voiture.php"] = ["title" => $car["brand"], "meta_description" => $car["detail"], "exclude" => true];
  } else {
    $error = true;
  }
} else {
  $error = true;
}






require_once __DIR__ . "/templates/header.php";


?>

<?php if (!$error) { ?>

  <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= htmlentities($car["brand"]) ?></h1>
        <p class="lead"><?= htmlentities($car["detail"]) ?></p>
        <span>Année <?= htmlentities($car["year"]) ?> /</span>
        <span><?= htmlentities($car["mileage"]) ?> /</span>
        <span> Type de carburant <?= htmlentities($car["fuel_type"]) ?> </span> <br> <br>
        <strong>Prix <?= htmlentities($car["price"]) ?></strong>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start py-3">
          <button type="button" class="btn btn-sm btn-outline-secondary btn-lg px-4">Nous contacter</button>
        </div>
      </div>

      <div class="col-lg-6">
        <img src="/uploads/articles/<?= htmlentities($car["image"]) ?>" class="d-block mx-lg-auto img-fluid" alt="<?= htmlentities($car["brand"]) ?>" width="700" height="500" loading="lazy">
      </div>

    </div>
  </div>
<?php } else { ?><h1>Article introuvable</h1><?php } ?>

<?php
require_once __DIR__ . "/templates/footer.php";
?>