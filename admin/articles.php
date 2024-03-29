<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
// adminOnly();

require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/article.php";
require_once __DIR__ . "/templates/header.php";



if (isset($_GET['page'])) {
  $page = (int)$_GET['page'];
} else {
  $page = 1;
}

$cars = getCars($pdo, _ADMIN_ITEM_PER_PAGE_, $page);

$totalCars = getTotalCars($pdo);

$totalPages = ceil($totalCars / _ADMIN_ITEM_PER_PAGE_);


?>

<div class="m-auto">
  <h1 class="display-5 fw-bold text-body-emphasis">Articles</h1>
  <div class="d-flex gap-2 justify-content-left  py-5">
    <a class="btn btn-primary d-inline-flex align-items-left" href="article.php">
      Ajouter un article
    </a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titre</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($cars as $car) { ?>
        <tr>
          <th scope="row"><?= $car["idCars"]; ?></th>
          <td><?= $car["brand"]; ?></td>
          <td><a href="article.php?id=<?= $car['idCars'] ?>">Modifier</a>
            | <a href="article_delete.php?id=<?= $car['idCars'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <?php if ($totalPages > 1) { ?>

        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
          <li class="page-item">
            <a class="page-link <?php if ($i == $page) {
                                  echo " active";
                                } ?>" href="?page=<?php echo $i; ?>">
              <?php echo $i; ?>
            </a>
          </li>
        <?php } ?>
      <?php } ?>
    </ul>
  </nav>

</div>

<?php

require_once __DIR__ . "/templates/footer.php";
?>