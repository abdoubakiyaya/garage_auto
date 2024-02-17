<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
// adminOnly();

require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/tools.php";
require_once __DIR__ . "/../lib/article.php";
require_once __DIR__ . "/templates/header.php";


$errors = [];
$messages = [];
$car = [
  'brand' => '',
  'model' => '',
  'mileage' => '',
  'detail' => '',
  'fuel_type' => '',
  'year' => '',
  'price' => '',
  'status' => ''
];


?>

<?php
if (isset($_GET['id'])) {
  $car = getCarById($pdo, $_GET['id']);
  if ($car === false) {
    $errors[] = "La voiture n'existe pas";
  }
  $pageTitle = "Formulaire modification voiture";
} else {
  $pageTitle = "Formulaire ajout voiture";
}

if (isset($_POST['saveCar'])) {
  $fileName = null;

  // Vérifie si un fichier est envoyé
  if (isset($_FILES["car_image"]["tmp_name"]) && $_FILES["car_image"]["tmp_name"] != '') {
    $checkImage = getimagesize($_FILES["car_image"]["tmp_name"]);
    if ($checkImage !== false) {
      $fileName = uniqid() . '-' . slugify(basename($_FILES["car_image"]["name"]));

      // Déplace le fichier uploadé dans le dossier des images
      if (move_uploaded_file($_FILES["car_image"]["tmp_name"], dirname(__DIR__) . _CARS_IMAGES_FOLDER_ . $fileName)) {
        // Supprime l'ancienne image si une nouvelle est téléchargée
        if (isset($_POST['image'])) {
          unlink(dirname(__DIR__) . _CARS_IMAGES_FOLDER_ . $_POST['image']);
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
        unlink(dirname(__DIR__) . _ASSETS_IMAGES_FOLDER_ . $_POST['image']);
      } else {
        $fileName = $_POST['image'];
      }
    }
  }

  // Stocke les données envoyées dans un tableau
  $car = [
    'brand' => $_POST['brand'],
    'model' => $_POST['model'],
    'detail' => $_POST['detail'],
    'price' => $_POST['price'],
    'fuel_type' => $_POST['fuel_type'],
    'mileage' => $_POST['mileage'],
    'year' => $_POST['year'], // Ajout de l'année
    'status' => $_POST['status'],
    'image' => $fileName
  ];

  // Si aucune erreur, on peut faire la sauvegarde
  if (!$errors) {
    $id = isset($_GET["id"]) ? (int)$_GET["id"] : null;

    // Passe toutes les données à la fonction saveCar
    $res = saveCar($pdo, $car['brand'], $car['model'], $car['year'], $car['fuel_type'], $car['mileage'], $car['price'], $car['image'], $car['detail'], $car['status'], $id);

    if ($res) {
      $messages[] = "La voiture a bien été sauvegardée";
      // Vide le tableau voiture pour avoir les champs du formulaire vides
      if (!isset($_GET["id"])) {
        $car = [
          'brand' => '',
          'model' => '',
          'mileage' => '',
          'detail' => '',
          'fuel_type' => '',
          'year' => '',
          'price' => '',
          'status' => ''
        ];
      }
    } else {
      $errors[] = "La voiture n'a pas été sauvegardée";
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


  <?php if ($car !== false) { ?>
    <div class="container m-auto" style="max-width: 500px; padding: 1rem">
      <form class="row g-3" method="POST" enctype="multipart/form-data">
        <div class="col-md-6">
          <label for="brand" class="form-label">Marque</label>
          <input type="text" name="brand" class="form-control" id="brand" value="<?= $car['brand']; ?>" required>
        </div>
        <div class="col-md-6">
          <label for="model" class="form-label">Modèle</label>
          <input type="text" name="model" class="form-control" id="model" value="<?= $car['model']; ?>" required>
        </div>
        <div class="col-12">
          <label for="mileage" class="form-label">Kilometrage</label>
          <input type="number" name="mileage" class="form-control" id="mileage" value="<?= $car['mileage']; ?>" required>
        </div>
        <div class="col-md-6">
          <label for="year" class="form-label">Année</label>
          <input type="number" name="year" class="form-control" id="year" min="1950" max="2100" value="<?= $car['year']; ?>" required>
        </div>
        <div class="col-md-6">
          <label for="fuel_type" class="form-label">Type de carburant</label>
          <input type="text" name="fuel_type" class="form-control" id="fuel_type" value="<?= $car['fuel_type']; ?>" required>
        </div>
        <div class="col-12">
          <label for="price" class="form-label">Prix</label>
          <input type="number" name="price" class="form-control" id="price" value="<?= $car['price']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="detail" class="form-label">Détails</label>
          <textarea class="form-control" name="detail" id="detail" rows="3"><?= $car['detail']; ?></textarea>
        </div>
        <div class="mb-3">
          <label for="car_image" class="form-label">Image de la voiture</label>
          <input type="file" name="car_image" class="form-control" aria-label="file example">
        </div>
        <div class="col-md-6">
          <label for="status" class="form-label">Status</label>
          <select class="form-select" id="status" name="status" value="<?= $car['status']; ?>" required>
            <option value="0">0</option>
            <option value="1" selected>1</option>
          </select>
        </div>
        <p class="fst-italic fs-6"> <span class="text-danger">Attention !</span> Vous devez garder le choix par defaut <span class="text-danger">(1)</span> pour que la voiture ajoutée soit visible sur le site.</p>

        <?php if (isset($_GET['id']) && isset(htmlentities($car['image']))) { ?>
          <div class="mb-3">
            <img src="<?= _CARS_IMAGES_FOLDER_ . htmlentities($car['image']) ?>" alt="<?= htmlentities($car['brand'])  ?>" width="100">
            <label for="delete_image">Supprimer l'image</label>
            <input type="checkbox" name="delete_image" id="delete_image">
            <input type="hidden" name="image" value="<?= htmlentities($car['image']); ?>">
          </div>
        <?php } ?>

        <div class="col-12">
          <input type="submit" name="saveCar" class="btn btn-primary" value="Enregistrer"></input>
        </div>
      </form>
    </div>
  <?php } ?>

</div>

<?php

// require_once __DIR__ . "/templates/footer.php";
?>