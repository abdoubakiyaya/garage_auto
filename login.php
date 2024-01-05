<?php

require_once 'lib/config.php';
require_once 'lib/session.php';
require_once 'lib/pdo.php';
require_once 'lib/user.php';

require_once 'templates/header.php';


$errors = [];
$messages = [];


if (isset($_POST['loginUser'])) {

  $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);
  if ($user) {
    session_regenerate_id(true);
    $_SESSION['user'] = $user;
    if ($user['role'] === 'admin') {
      header('location: admin/index.php');
    } else {
      header('location: index.php');
    }
  } else {
    $errors[] = 'Email ou mot de passe incorrect';
  }
}

?>



<?php foreach ($messages as $message) { ?>
  <div class="alert text-center alert-success" role="alert">
    <?= $message; ?>
  </div>
<?php } ?>
<?php foreach ($errors as $error) { ?>
  <div class="alert text-center alert-danger" role="alert">
    <?= $error; ?>
  </div>
<?php } ?>


<div class="form-signin m-auto" style="max-width: 330px; padding: 1rem">
  <form method="post">
    <!-- <img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <div class="text-center">
      <h1 class="h3 mb-3 fw-bold">Connexion</h1>
    </div>

    <div class="form-floating mb-3">
      <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
      <label for="email">Address email</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
      <label for="password">Mot de passe</label>
    </div>

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
    <input class="btn btn-primary w-100 py-2" value="Connexion" name="loginUser" type="submit">
    <p class="mt-5 mb-3 text-body-secondary">© 2012–2023</p>
  </form>
</div>


<?php
require_once __DIR__ . "/templates/footer.php";
?>