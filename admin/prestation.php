<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
// adminOnly();

require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/tools.php";
require_once __DIR__ . "/../lib/prestation.php";
require_once __DIR__ . "/templates/header.php";


$errors = [];
$messages = [];
$prestation = [
  'prestation_name' => '',
  'price' => '',
  'description' => '',
];


?>

<?php
if (isset($_GET['id'])) {
  $prestation = getPrestationById($pdo, $_GET['id']);
  if ($prestation === false) {
    $errors[] = "La prestation n'existe pas";
  }
  $pageTitle = "Formulaire modification prestation";
} else {
  $pageTitle = "Formulaire ajout prestation";
}

if (isset($_POST['savePrestation'])) {
  $fileName = null;

  // Vérifie si un fichier est envoyé
  if (isset($_FILES["prestation_image"]["tmp_name"]) && $_FILES["prestation_image"]["tmp_name"] != '') {
    $checkImage = getimagesize($_FILES["prestation_image"]["tmp_name"]);
    if ($checkImage !== false) {
      $fileName = uniqid() . '-' . slugify(basename($_FILES["prestation_image"]["name"]));

      // Déplace le fichier uploadé dans le dossier des images
      if (move_uploaded_file($_FILES["prestation_image"]["tmp_name"], dirname(__DIR__) . _PRESTATIONS_IMAGES_FOLDER_ . $fileName)) {
        // Supprime l'ancienne image si une nouvelle est téléchargée
        if (isset($_POST['image'])) {
          unlink(dirname(__DIR__) . _PRESTATIONS_IMAGES_FOLDER_ . $_POST['image']);
        }
      } else {
        $errors[] = 'Le fichier n\'a pas été uploadé';
      }
    } else {
      $errors[] = 'Le fichier doit être une image';
    }
  } else {
    // Si aucun fichier n'a été envoyé
    if (isset($_GET['id'])) {
      if (isset($_POST['delete_image'])) {
        // Si on a coché la case de suppression d'image, on supprime l'image
        unlink(dirname(__DIR__) . _PRESTATIONS_IMAGES_FOLDER_ . $_POST['image']);
      } else {
        $fileName = $_POST['image'];
      }
    }
  }

  // Stocke les données envoyées dans un tableau
  $prestation = [
    'prestation_name' => $_POST['prestation_name'],
    'price' => $_POST['price'],
    'description' => $_POST['description'],
    'image' => $fileName
  ];

  // Si aucune erreur, on peut faire la sauvegarde
  if (!$errors) {
    $id = isset($_GET["id"]) ? (int)$_GET["id"] : null;

    // Passe toutes les données à la fonction saveCar
    $res = savePrestation($pdo, $prestation['prestation_name'], $prestation['description'], $prestation['price'], $prestation['image'], $id);

    if ($res) {
      $messages[] = "La prestation a bien été sauvegardée";
      // Vide le tableau voiture pour avoir les champs du formulaire vides
      if (!isset($_GET["id"])) {
        $prestation = [
          'prestation_name' => '',
          'price' => '',
          'description' => '',
        ];
      }
    } else {
      $errors[] = "La prestation n'a pas été sauvegardée";
    }
  }
}
?>


<div class="m-auto pt-3 my-5 card">
  <h1 class="fw-bold fs-3 m-auto"><?= $pageTitle; ?></h1>

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


  <?php if ($prestation !== false) { ?>
    <div class="container m-auto" style="max-width: 500px; padding: 1rem">
      <form class="row g-3" method="POST" enctype="multipart/form-data">
        <div class="col-md-6">
          <label for="prestation_name" class="form-label">Prestation</label>
          <input type="text" name="prestation_name" class="form-control" id="prestation_name" value="<?= $prestation['prestation_name']; ?>">
        </div>
        <div class="col-12">
          <label for="price" class="form-label">Prix</label>
          <input type="number" name="price" class="form-control" id="price" value="<?= $prestation['price']; ?>">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" name="description" id="description" rows="3"><?= $prestation['description']; ?></textarea>
        </div>
        <div class="mb-3">
          <label for="prestation_image" class="form-label">Image de la prestation</label>
          <input type="file" name="prestation_image" class="form-control" aria-label="file example">
        </div>

        <?php if (isset($_GET['id']) && isset($prestation['image'])) { ?>
          <div class="mb-3">
            <img src="<?= _PRESTATIONS_IMAGES_FOLDER_ . $prestation['image'] ?>" alt="<?= $prestation['prestation_name'] ?>" width="100">
            <label for="delete_image">Supprimer l'image</label>
            <input type="checkbox" name="delete_image" id="delete_image">
            <input type="hidden" name="image" value="<?= $prestation['image']; ?>">
          </div>
        <?php } ?>

        <div class="col-12">
          <input type="submit" name="savePrestation" class="btn btn-primary" value="Enregistrer"></input>
        </div>
      </form>
    </div>
  <?php } ?>

</div>

<?php

require_once __DIR__ . "/templates/footer.php";
?>