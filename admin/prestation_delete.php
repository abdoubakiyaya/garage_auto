<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
// adminOnly();

require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/tools.php";
require_once __DIR__ . "/../lib/prestation.php";
require_once __DIR__ . "/templates/header.php";

$car = false;
$errors = [];
$messages = [];
if (isset($_GET["id"])) {
  $car =  getPrestationById($pdo, $_GET["id"]);
}
if ($car) {
  if (deletePrestation($pdo, $_GET["id"])) {
    $messages[] = "La prestation a bien été supprimé";
  } else {
    $errors[] = "Une erreur s'est produite lors de la suppression";
  }
} else {
  $errors[] = "La prestation n'existe pas";
}
?>
<div class="row text-center my-5">
  <h1>Supression de la prestation</h1>
  <?php foreach ($messages as $message) { ?>
    <div class="alert alert-success" role="alert">
      <?= $message; ?>
    </div>
  <?php } ?>
  <?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger" role="alert">
      <?= $error; ?>
    </div>
  <?php } ?>
</div>

<?php
require_once('templates/footer.php');
