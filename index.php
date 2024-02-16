<?php
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/lib/prestation.php";
require_once __DIR__ . "/lib/article.php";


$cars = getCars($pdo, _HOME_ARTICLES_LIMIT_);
$prestations = getPrestations($pdo);

?>

<!-- title reparations -->
<section>
  <div class="position-relative overflow-hidden p-3 p-md-3 m-md-5 text-center">
    <div class="col-lg-6 p-lg-5 mx-auto my-5">
      <h1 class="display-3 fs-1 fw-bold">Prestations entretien & réparation</h1>
    </div>
    <div class="product-device shadow-lg d-none d-lg-block d-xl-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-lg-block d-xl-block"></div>
  </div>
</section>

<!-- prestations -->
<section>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-6 g-4 text-start">
      <?php foreach ($prestations as $key => $prestation) { ?>
        <div class="col">
          <div class="card border-0">
            <div>
              <img src="<?= _PRESTATIONS_IMAGES_FOLDER_ ?>/<?= htmlentities($prestation["image"]) ?>" class="card-img-top" alt="<?= htmlentities($prestation["prestation_name"]) ?>">
              <a class="bg-danger text-light p-2 card" href="/prestation.php?id=<?= htmlentities($prestation["idPrestation"]) ?>">Prendre rendez-vous</a>
            </div>

            <div class="card-body">
              <h6 class="card-title fw-bold"><?= htmlentities($prestation["prestation_name"]) ?></h6>
              <h6 class="">A partir de <strong class="text-danger"><?= htmlentities($prestation["price"]) ?></strong></h6>
              <hr>
              <p><?= htmlentities($prestation["description"]) ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- division -->
<section>
  <div class=" container divider ">
    <hr>
  </div>
</section>

<!-- title cars -->
<section>
  <div class="container ">
    <div class="  px-4 py-5 text-center">
      <div class="py-5">
        <h1 class="display-5 fw-bold text-dark">Trouver votre voiture de rêve</h1>
        <div class="col-lg-6 mx-auto">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- cars -->
<section>
  <div class="container">
    <div class="row row-cols-1 justify-content-center row-cols-md-4 g-4">
      <?php foreach ($cars as $key => $car) {
        require __DIR__ . "/templates/article_part.php";
      } ?>
    </div>
  </div>
</section>

<!-- voir plus -->
<section>
  <div class="container">
    <div class="text-center py-5">
      <a class="" href="/voitures.php">voir plus de voitures<i class="fa-solid fa-arrow-right m-2"></i></a>
    </div>
  </div>
</section>

<!-- les commentaires -->
<section>
  <div class="container w-50">
    <hr>
  </div>
</section>


<section class="pt-5 pb-5">
  <div class="container pt-5 pb-5">
    <h2 class="pb-5 text-center">Ils parlent de nous</h2>
    <div class="card-group autoplay m-auto">


      <?php
      // Récupérer les commentaires approuvés
      $sql = "SELECT * FROM commentaires WHERE statut = 'approuvé' ORDER BY date_creation DESC";
      $stmt = $pdo->query($sql);
      $commentaires = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach ($commentaires as $commentaire) {
        echo '<div class="">';
        echo '<div class="m-2 col-sm- card card-mobile p-2 h-">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $commentaire['nom_utilisateur'] . '</h5>';
        echo '<p class="card-text">' . $commentaire['commentaire'] . '</p>';
        echo '<div class="d-flex justify-content-between">';
        echo '<small>' . $commentaire['date_creation'] . '</small>';
        echo '<div>';
        // Étoiles (exemple avec 3 étoiles)
        for ($i = 0; $i < $commentaire['note']; $i++) {
          echo '<span class="text-warning">&#9733;</span>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
</section>

<section>
  <div class="container py-5">
    <div class="row">
      <div class=" col-md-6 m-auto">
        <form method="post" action="traitement_commentaire.php">
          <h2>Ajouter un commentaire</h2>
          <div class="form-group">
            <label for="nom_utilisateur">Nom :</label>
            <input type="text" class="form-control" id="nom_utilisateur" name="nom_utilisateur" required>
          </div>
          <div class="form-group">
            <label for="note">Note :</label>
            <select class="form-control" id="note" name="note">
              <option value="1">1 étoile</option>
              <option value="2">2 étoiles</option>
              <option value="3">3 étoiles</option>
              <option value="4">4 étoiles</option>
              <option value="5">5 étoiles</option>
            </select>
          </div>
          <div class="form-group my-3">
            <label for="commentaire">Commentaire :</label>
            <textarea class="form-control" id="commentaire" name="commentaire" rows="4" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary mb-3">Soumettre le commentaire</button>
        </form>
      </div>


    </div>
  </div>
</section>

<?php
require_once __DIR__ . "/templates/footer.php";

?>