<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/tools.php";
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/user.php";

require_once __DIR__ . "/templates/header.php";



$errors = [];
$messages = [];
if (isset($_POST['addUser'])) {
  /*
        @todo ajouter la vérification sur les champs
    */
  $res = addUser($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']);
  if ($res) {
    $messages[] = 'Merci pour votre inscription';
  } else {
    $errors[] = 'Une erreur s\'est produite lors de votre inscription';
  }
}

?>


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
<div class="m-auto card my-5" style="max-width: 500px; padding: 1rem">
  <div class="text-center">
    <h1 class="fs-3 fw-bold py-4">Ajouter un utilisateur</h1>
  </div>
  <form method="POST">
    <div class="mb-3">
      <label for="first_name" class="form-label">Prénom</label>
      <input type="text" class="form-control" id="first_name" name="first_name">
    </div>
    <div class="mb-3">
      <label for="last_name" class="form-label">Nom</label>
      <input type="text" class="form-control" id="last_name" name="last_name">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Mot de passe</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>

    <input type="submit" name="addUser" class="btn btn-primary" value="Enregistrer">

  </form>
</div>


<?php
require_once 'templates/footer.php';
