<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
// adminOnly();

require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/prestation.php";
require_once __DIR__ . "/templates/header.php";

if (isset($_GET['page'])) {
  $page = (int)$_GET['page'];
} else {
  $page = 1;
}

$prestations = getPrestations($pdo, _ADMIN_ITEM_PER_PAGE_, $page);

$totalPrestations = getTotalPrestations($pdo);

$totalPages = ceil($totalPrestations / _ADMIN_ITEM_PER_PAGE_);


?>

<div class="m-auto">
  <h1 class="display-5 fw-bold text-body-emphasis">Prestations</h1>
  <div class="d-flex gap-2 justify-content-left  py-5">
    <a class="btn btn-primary d-inline-flex align-items-left" href="prestation.php">
      Ajouter une Prestation
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
      <?php foreach ($prestations as $prestation) { ?>
        <tr>
          <th scope="row"><?= $prestation["idPrestation"]; ?></th>
          <td><?= $prestation["prestation_name"]; ?></td>
          <td><a href="prestation.php?id=<?= $prestation['idPrestation'] ?>">Modifier</a>
            | <a href="prestation_delete.php?id=<?= $prestation['idPrestation'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette prestation ?')">Supprimer</a></td>
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




<?php require_once __DIR__ . "/templates/footer.php"; ?>