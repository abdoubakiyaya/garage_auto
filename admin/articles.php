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



// $errors = [];
// $messages = [];
// $car = [
//     'brand' => '',
//     'model' => '',
//     'mileage' => '',
//     'detail' => '',
//     'fuel_type' => '',
//     'year' => '',
//     'price' => ''
// ];

// $categories = getCategories($pdo);

// if (isset($_GET['id'])) {
//     //requête pour récupérer les données de l'article en cas de modification
//     $car = getCarById($pdo, $_GET['id']);
//     if ($car === false) {
//         $errors[] = "L'article n\'existe pas";
//     }
//     $pageTitle = "Formulaire modification article";
// } else {
//     $pageTitle = "Formulaire ajout article";
// }

// if (isset($_POST['saveCar'])) {

//     //@todo gérer la gestion des erreurs sur les champs (champ vide etc.)

//     $fileName = null;
//     // Si un fichier est envoyé
//     if (isset($_FILES["file"]["tmp_name"]) && $_FILES["file"]["tmp_name"] != '') {
//         $checkImage = getimagesize($_FILES["file"]["tmp_name"]);
//         if ($checkImage !== false) {
//             $fileName = slugify(basename($_FILES["file"]["name"]));
//             $fileName = uniqid() . '-' . $fileName;



//             /* On déplace le fichier uploadé dans notre dossier upload, dirname(__DIR__) 
//                 permet de cibler le dossier parent car on se trouve dans admin
//             */
//             if (move_uploaded_file($_FILES["file"]["tmp_name"], dirname(__DIR__) . _CARS_IMAGES_FOLDER_ . $fileName)) {
//                 if (isset($_POST['image'])) {
//                     // On supprime l'ancienne image si on a posté une nouvelle
//                     unlink(dirname(__DIR__) . _CARS_IMAGES_FOLDER_ . $_POST['image']);
//                 }
//             } else {
//                 $errors[] = 'Le fichier n\'a pas été uploadé';
//             }
//         } else {
//             $errors[] = 'Le fichier doit être une image';
//         }
//     } else {
//         // Si aucun fichier n'a été envoyé
//         if (isset($_GET['id'])) {
//             if (isset($_POST['delete_image'])) {
//                 // Si on a coché la case de suppression d'image, on supprime l'image
//                 unlink(dirname(__DIR__) . _CARS_IMAGES_FOLDER_ . $_POST['image']);
//             } else {
//                 $fileName = $_POST['image'];
//             }
//         }
//     }
//     /* On stocke toutes les données envoyés dans un tableau pour pouvoir afficher
//        les informations dans les champs. C'est utile pas exemple si on upload un mauvais
//        fichier et qu'on ne souhaite pas perdre les données qu'on avait saisit.
//     */
//     $car = [
//         'brand' => $_POST['brand'],
//         'model' => $_POST['model'],
//         'detail' => $_POST['detail'],
//         'price' => $_POST['price'],
//         'fuel_type' => $_POST['fuel_type'],
//         'mileage' => $_POST['mileage'],
//         'image' => $fileName
//     ];
//     // Si il n'y a pas d'erreur on peut faire la sauvegarde
//     if (!$errors) {
//         if (isset($_GET["id"])) {
//             // Avec (int) on s'assure que la valeur stockée sera de type int
//             $id = (int)$_GET["id"];
//         } else {
//             $id = null;
//         }
//         // On passe toutes les données à la fonction saveArticle
//         $res = saveCar($pdo, $_POST["brand"], $_POST["detail"], $fileName, (int)$_POST["year"], $id);

//         if ($res) {
//             $messages[] = "L'article a bien été sauvegardé";
//             //On vide le tableau article pour avoir les champs de formulaire vides
//             if (!isset($_GET["id"])) {
//                 $brand = [
//                     'brand' => '',
//                     'model' => '',
//                     'mileage' => '',
//                     'detail' => '',
//                     'fuel_type' => '',
//                     'year' => '',
//                     'price' => ''
//                 ];
//             }
//         } else {
//             $errors[] = "L'article n'a pas été sauvegardé";
//         }
//     }
// }

// 
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








<?php require_once __DIR__ . "/templates/footer.php"; ?>