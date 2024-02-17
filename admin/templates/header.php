<?php

$adminMenu = [
  'index.php' => 'Tableau de bord',
  'prestations.php' => 'Prestations',
  'articles.php' => 'Articles',
  'horaire.php' => 'Horaires',
  'utilisateurs.php' => 'Utilisateurs',
  'commentaires.php' => 'Commentaires',
];
?>


<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Grage V.Parrot</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <!-- cdn icons fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>
  <div class="d-flex">
    <header class="">
      <div class="d-flex flex-column flex-shrink-0 p-4 text-bg-dark flex-wrap" style="height: 100%;">
        <div class="dropdown py-4">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong><?= isset($_SESSION['user']['first_name']) ? $_SESSION['user']['first_name'] : 'Admin'; ?></strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small">
            <p></p>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="/logout.php">Déconnexion</a></li>
          </ul>
        </div>

        <ul class="nav nav-pills flex-column ">
          <?php foreach ($adminMenu as $page => $titre) { ?>
            <li class="nav-item"><a href="<?= $page; ?>" class="nav-link text-white 
            <?php if (basename($_SERVER['SCRIPT_NAME']) === $page) {
              echo 'active';
            } ?>"><?= $titre; ?></a></li>
          <?php } ?>
        </ul>

        <div class="text-center mt-auto pb-5">
          <hr>
          <a href="/" class="text-white text-decoration-none">
            <span class="fs-4 fw-bold text-nowrap">Grage V.Parrot</span>
          </a>
        </div>
      </div>
    </header>
    <main class="d-flex flex-column px-4">