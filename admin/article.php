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
  'price' => ''
];



// if (isset($_GET['id'])) {
//   //requête pour récupérer les données de l'article en cas de modification
//   $car = getCarById($pdo, $_GET['id']);
//   if ($car === false) {
//     $errors[] = "L'article n\'existe pas";
//   }
//   $pageTitle = "Formulaire modification article";
// } else {
//   $pageTitle = "Formulaire ajout article";
// }

// if (isset($_POST['saveCar'])) {

//   //@todo gérer la gestion des erreurs sur les champs (champ vide etc.)

//   $fileName = null;
//   // Si un fichier est envoyé
//   if (isset($_FILES["file"]["tmp_name"]) && $_FILES["file"]["tmp_name"] != '') {
//     $checkImage = getimagesize($_FILES["file"]["tmp_name"]);
//     if ($checkImage !== false) {
//       $fileName = slugify(basename($_FILES["file"]["name"]));
//       $fileName = uniqid() . '-' . $fileName;



//       /* On déplace le fichier uploadé dans notre dossier upload, dirname(__DIR__) 
//                 permet de cibler le dossier parent car on se trouve dans admin
//             */
//       if (move_uploaded_file($_FILES["file"]["tmp_name"], dirname(__DIR__) . _CARS_IMAGES_FOLDER_ . $fileName)) {
//         if (isset($_POST['image'])) {
//           // On supprime l'ancienne image si on a posté une nouvelle
//           unlink(dirname(__DIR__) . _CARS_IMAGES_FOLDER_ . $_POST['image']);
//         }
//       } else {
//         $errors[] = 'Le fichier n\'a pas été uploadé';
//       }
//     } else {
//       $errors[] = 'Le fichier doit être une image';
//     }
//   } else {
//     // Si aucun fichier n'a été envoyé
//     if (isset($_GET['id'])) {
//       if (isset($_POST['delete_image'])) {
//         // Si on a coché la case de suppression d'image, on supprime l'image
//         unlink(dirname(__DIR__) . _CARS_IMAGES_FOLDER_ . $_POST['image']);
//       } else {
//         $fileName = $_POST['image'];
//       }
//     }
//   }
//   /* On stocke toutes les données envoyés dans un tableau pour pouvoir afficher
//        les informations dans les champs. C'est utile pas exemple si on upload un mauvais
//        fichier et qu'on ne souhaite pas perdre les données qu'on avait saisit.
//     */
//   $car = [
//     'brand' => $_POST['brand'],
//     'model' => $_POST['model'],
//     'detail' => $_POST['detail'],
//     'price' => $_POST['price'],
//     'fuel_type' => $_POST['fuel_type'],
//     'mileage' => $_POST['mileage'],
//     'image' => $fileName
//   ];
//   // Si il n'y a pas d'erreur on peut faire la sauvegarde
//   if (!$errors) {
//     if (isset($_GET["id"])) {
//       // Avec (int) on s'assure que la valeur stockée sera de type int
//       $id = (int)$_GET["id"];
//     } else {
//       $id = null;
//     }
//     // On passe toutes les données à la fonction saveArticle
//     $res = saveCar($pdo, $_POST["brand"], $_POST['model'], $_POST['year'], $_POST['fuel_type'], $_POST['mileage'], $_POST['price'], $fileName, $_POST['detail'], $id);

//     if ($res) {
//       $messages[] = "L'article a bien été sauvegardé";
//       //On vide le tableau article pour avoir les champs de formulaire vides
//       if (!isset($_GET["id"])) {
//         $car = [
//           'brand' => '',
//           'model' => '',
//           'mileage' => '',
//           'detail' => '',
//           'fuel_type' => '',
//           'year' => '',
//           'price' => ''
//         ];
//       }
//     } else {
//       $errors[] = "L'article n'a pas été sauvegardé";
//     }
//   }
// }

// 
?>
<!-- le bon code -->
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
        unlink(dirname(__DIR__) . _CARS_IMAGES_FOLDER_ . $_POST['image']);
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
    'image' => $fileName
  ];

  // Si aucune erreur, on peut faire la sauvegarde
  if (!$errors) {
    $id = isset($_GET["id"]) ? (int)$_GET["id"] : null;

    // Passe toutes les données à la fonction saveCar
    $res = saveCar($pdo, $car['brand'], $car['model'], $car['year'], $car['fuel_type'], $car['mileage'], $car['price'], $car['image'], $car['detail'], $id);

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
          'price' => ''
        ];
      }
    } else {
      $errors[] = "La voiture n'a pas été sauvegardée";
    }
  }
}
?>
<!-- fin du bon code -->


<div class="m-auto p-5">
  <h1><?= $pageTitle; ?></h1>

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


  <!-- <?php if ($car !== false) { ?>
    <div class="container card m-auto" style="max-width: 500px; padding: 1rem">
      <form class="row g-3" method="POST" enctype="multipart/form-data">
        <div class="col-md-6">
          <label for="brand" class="form-label">Marque</label>
          <input type="text" name="brand" class="form-control" id="brand" value="<?= $car['brand']; ?>">
        </div>
        <div class="col-md-6">
          <label for="model" class="form-label">Modèle</label>
          <input type="text" name="model" class="form-control" id="model" value="<?= $car['model']; ?>">
        </div>
        <div class="col-12">
          <label for="mileage" class="form-label">Kilometrage</label>
          <input type="number" name="mileage" class="form-control" id="mileage" value="<?= $car['mileage']; ?>">
        </div>
        <div class="col-md-6">
          <label for="year" class="form-label">Année</label>
          <input type="year" name="year" class="form-control" id="year" value="<?= $car['year']; ?>">
        </div>
        <div class="col-md-6">
          <label for="fuel_type" class="form-label">Type de carburant</label>
          <input type="text" name="fuel_type" class="form-control" id="fuel_type" value="<?= $car['fuel_type']; ?>">
        </div>
        <div class="col-12">
          <label for="price" class="form-label">Prix</label>
          <input type="number" name="price" class="form-control" id="price" value="<?= $car['price']; ?>">
        </div>
        <div class="mb-3">
          <label for="detail" class="form-label">Détails</label>
          <textarea class="form-control" name="detail" id="detail" rows="3" value="<?= $car['detail']; ?>"></textarea>
        </div>
        <div class="mb-3">
          <input type="file" class="form-control" aria-label="file example" required>
        </div>

        <?php if (isset($_GET['id']) && isset($car['image'])) { ?>
          <p>
            <img src="<?= _CARS_IMAGES_FOLDER_ . $car['image'] ?>" alt="<?= $car['brand'] ?>" width="100">
            <label for="delete_image">Supprimer l'image</label>
            <input type="checkbox" name="delete_image" id="delete_image">
            <input type="hidden" name="image" value="<?= $car['image']; ?>">

          </p>
        <?php } ?>

        <div class="col-12">
          <input type="submit" name="saveCar" class="btn btn-primary" value="Enregistrer"></input>
        </div>
      </form>
    </div>
  <?php } ?> -->
  <!--  -->

  <?php if ($car !== false) { ?>
    <div class="container card m-auto" style="max-width: 500px; padding: 1rem">
      <form class="row g-3" method="POST" enctype="multipart/form-data">
        <div class="col-md-6">
          <label for="brand" class="form-label">Marque</label>
          <input type="text" name="brand" class="form-control" id="brand" value="<?= $car['brand']; ?>">
        </div>
        <div class="col-md-6">
          <label for="model" class="form-label">Modèle</label>
          <input type="text" name="model" class="form-control" id="model" value="<?= $car['model']; ?>">
        </div>
        <div class="col-12">
          <label for="mileage" class="form-label">Kilometrage</label>
          <input type="number" name="mileage" class="form-control" id="mileage" value="<?= $car['mileage']; ?>">
        </div>
        <div class="col-md-6">
          <label for="year" class="form-label">Année</label>
          <input type="number" name="year" class="form-control" id="year" value="<?= $car['year']; ?>">
        </div>
        <div class="col-md-6">
          <label for="fuel_type" class="form-label">Type de carburant</label>
          <input type="text" name="fuel_type" class="form-control" id="fuel_type" value="<?= $car['fuel_type']; ?>">
        </div>
        <div class="col-12">
          <label for="price" class="form-label">Prix</label>
          <input type="number" name="price" class="form-control" id="price" value="<?= $car['price']; ?>">
        </div>
        <div class="mb-3">
          <label for="detail" class="form-label">Détails</label>
          <textarea class="form-control" name="detail" id="detail" rows="3"><?= $car['detail']; ?></textarea>
        </div>
        <div class="mb-3">
          <label for="car_image" class="form-label">Image de la voiture</label>
          <input type="file" name="car_image" class="form-control" aria-label="file example" required>
        </div>

        <?php if (isset($_GET['id']) && isset($car['image'])) { ?>
          <div class="mb-3">
            <img src="<?= _CARS_IMAGES_FOLDER_ . $car['image'] ?>" alt="<?= $car['brand'] ?>" width="100">
            <label for="delete_image">Supprimer l'image</label>
            <input type="checkbox" name="delete_image" id="delete_image">
            <input type="hidden" name="image" value="<?= $car['image']; ?>">
          </div>
        <?php } ?>

        <div class="col-12">
          <input type="submit" name="saveCar" class="btn btn-primary" value="Enregistrer"></input>
        </div>
      </form>
    </div>
  <?php } ?>

</div>


<?php require_once __DIR__ . "/templates/footer.php"; ?>