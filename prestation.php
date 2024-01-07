<?php
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/prestation.php";


require_once __DIR__ . "/templates/header.php";


$mainMenu["prestation.php"] = ["title" => "Réparations et entretiens de voitures", "meta_description" => "Réparations et entretiens de voitures", "exclude" => true];


$error = false;

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $prestation = getPrestationById($pdo, $id);
  if ($prestation) {
    // $image_path = getCarImage($car["image"]); //erreur d'image
    $mainMenu["prestation.php"] = ["title" => $prestation["prestation_name"], "meta_description" => $prestation["description"], "exclude" => true];
  } else {
    $error = true;
  }
} else {
  $error = true;
}


?>



<?php if (!$error) { ?>
  <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">

      <div class="col-10 col-sm-8 col-lg-6">
        <div class="card border-0">
          <div>
            <img src="/uploads/prestations/<?= htmlentities($prestation["image"]) ?>" class="card-img-top" alt="<?= htmlentities($prestation["prestation_name"]) ?>">
          </div>
          <div class="card-body">
            <h6 class="card-title fw-bold"><?= htmlentities($prestation["prestation_name"]) ?></h6>
            <h6 class="">A partir de <strong class="text-danger"><?= htmlentities($prestation["price"]) ?></strong></h6>
            <hr>
            <p><?= htmlentities($prestation["description"]) ?></p>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="container mt-5">
          <h1 class="mb-4">Prendre de rendez-vous</h1>
          <form method="post" action="traitement.php"> <!-- Assurez-vous d'ajouter un attribut "method" et "action" au formulaire -->
            <div class="form-row">
              <div class="form-group col-md-6 my-2">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom" required>
              </div>
              <div class="form-group col-md-6 my-2">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>
              </div>
            </div>
            <div class="form-group my-2">
              <label for="email">Adresse e-mail</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse e-mail" required>
            </div>
            <div class="form-group my-2">
              <label for="telephone">Numéro de téléphone</label>
              <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Entrez votre numéro de téléphone" required>
            </div>
            <div class="form-group my-2">
              <label for="date">Date du rendez-vous</label>
              <input type="date" class="form-control" id="date">
            </div>
            <div class="form-group my-2">
              <label for="heure">Heure du rendez-vous</label>
              <input type="time" class="form-control" id="heure">
            </div>
            <div class="form-group my-2">
              <label for="message">Message (facultatif)</label>
              <textarea class="form-control" id="message" name="message" rows="4" placeholder="Entrez votre message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Prendre rendez-vous</button>
          </form>
        </div>

      </div>
    </div>
  </div>
<?php } else { ?> <div class="container py-5">
    <h1>Nous n'avons pas trouver la prestation</h1>
  </div><?php } ?>

<?php
require_once __DIR__ . "/templates/footer.php";
?>