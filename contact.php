<?php
require_once 'templates/header.php';
?>




<div class="container">
  <div class="row">
    <div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
          <?php
          require __DIR__ . "/templates/formulaire_part.php";
          ?>
        </div>
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Le garage V. Parrot vous acueille</h1>
          <div class="">
            <h3 class="mb-4">Heures d'ouverture</h3>
            <?php
            require __DIR__ . "/templates/horaire_part.php";
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<?php
require_once __DIR__ . "/templates/footer.php";
?>