<?php
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/prestation.php";


require_once __DIR__ . "/templates/header.php";


$mainMenu["prestation.php"] = ["title" => "Réparations et entretiens de voitures", "meta_description" => "Réparations et entretiens de voitures", "exclude" => true];


$error = false;

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $prestation = getPrestationById($pdo, $id);
  if ($prestation) {
    // $image_path = getCarImage($car["image"]); //erreur d'image
    $mainMenu["prestation.php"] = ["title" => $prestation["prestation_name"], "meta_description" => $prestation["description"], "exclude" => true];
  } else {
    $error = true;
  }
} else {
  $error = true;
}


?>



<?php if (!$error) { ?>
  <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">

      <div class="col-10 col-sm-8 col-lg-6">
        <div class="card border-0">
          <div>
            <img src="/uploads/prestations/<?= htmlentities($prestation["image"]) ?>" class="card-img-top" alt="<?= htmlentities($prestation["prestation_name"]) ?>">
          </div>
          <div class="card-body">
            <h6 class="card-title fw-bold"><?= htmlentities($prestation["prestation_name"]) ?></h6>
            <h6 class="">A partir de <strong class="text-danger"><?= htmlentities($prestation["price"]) ?></strong></h6>
            <hr>
            <p><?= htmlentities($prestation["description"]) ?></p>
          </div>
        </div>
      </div>

      <div class="col-lg-6">

        <?php
        require __DIR__ . "/templates/formulaire_part.php";
        ?>
      </div>
    </div>
  </div>
<?php } else { ?> <div class="container py-5">
    <h1>Nous n'avons pas trouver la prestation</h1>
  </div><?php } ?>

<?php
require_once __DIR__ . "/templates/footer.php";
?>