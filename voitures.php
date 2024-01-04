<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/lib/article.php";
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/pdo.php";

$cars = getCars($pdo);



?>


<!-- cars -->
<section>
  <div class="container py-5">
    <div class="row row-cols-1 row-cols-md-4 g-4 text-start">
      <?php foreach ($cars as $key => $car) {
        require __DIR__ . "/templates/article_part.php";
      } ?>
    </div>
  </div>
</section>

<?php
require_once __DIR__ . "/templates/footer.php";
?>