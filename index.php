<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/lib/menu.php";
require_once __DIR__ . "/lib/prestation.php";
require_once __DIR__ . "/lib/article.php";

?>

<!-- title reparations -->
<section>
  <div class="position-relative overflow-hidden p-3 p-md-3 m-md-5 text-center bg-body-tertiary">
    <div class="col-lg-6 p-lg-5 mx-auto my-5">
      <h1 class="display-3 fs-1 fw-bold">Prestations entretien & réparation</h1>
    </div>
    <div class="product-device shadow-lg d-none d-lg-block d-xl-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-lg-block d-xl-block"></div>
  </div>
</section>

<!-- prestations -->
<section>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-6 g-4 text-start">
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
  <div class=" container divider ">
    <hr>
  </div>
</section>

<!-- title cars -->
<section>
  <div class="container ">
    <div class="  px-4 py-5 text-center">
      <div class="py-5">
        <h1 class="display-5 fw-bold text-dark">Trouver votre voiture de rêve</h1>
        <div class="col-lg-6 mx-auto">
          <p class="fs-5 mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <button type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">Custom button</button>
            <button type="button" class="btn btn-outline-primary btn-lg px-4">Secondary</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- cars -->
<section>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4 text-start">
      <?php foreach ($cars as $key => $car) {
        require __DIR__ . "/templates/article_part.php";
      } ?>
    </div>
  </div>
</section>

<!-- voir plus -->
<section>
  <div class="container">
    <div class="text-center py-5">
      <a class="" href="">voir plus de voitures<i class="fa-solid fa-arrow-right m-2"></i></a>
    </div>
  </div>
</section>


<?php
require_once __DIR__ . "/templates/footer.php";

?>