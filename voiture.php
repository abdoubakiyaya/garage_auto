<?php
require_once __DIR__ . "/lib/article.php";



require_once __DIR__ . "/lib/menu.php";

$mainMenu["voiture.php"] = ["title" => $car["marque"], "meta_description" => $car["content"], "exclude" => true];

require_once __DIR__ . "/templates/header.php";
?>


<div class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= $car["marque"] ?></h1>
      <p class="lead"><?= $car["content"] ?></p>
    </div>
    <div class="col-lg-6">
      <img src="/uploads/articles/<?= $car["image"] ?>" class="d-block mx-lg-auto img-fluid" alt="<?= $car["marque"] ?>" width="700" height="500" loading="lazy">
    </div>
  </div>
</div>

<?php
require_once __DIR__ . "/templates/footer.php";
?>