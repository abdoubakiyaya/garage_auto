<?php

// require_once __DIR__ . "/../lib/config.php";
// require_once __DIR__ . "/../lib/session.php";
// require_once __DIR__ . "/../lib/menu.php";

// $currentPage = basename($_SERVER["SCRIPT_NAME"]);
$mainMenu = [
  'index.php' => 'Accueil',
  'voitures.php' => 'Voitures',
  'a_propos.php' => 'À propos',
  'contact.php' => 'Contact',
];


?>



<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <meta name="description" content="<?= htmlentities($mainMenu[$currentPage]["meta_description"]) ?>">
  <title> <?= htmlentities($mainMenu[$currentPage]["title"]) ?> </title> -->
  <!-- slick.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- icones boostrap cdn -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <!-- cdn icons fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- cdn bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <!-- css -->
  <link rel="stylesheet" href="/assets/css/styles.css">
  <!-- jquery ui css cdn filtre -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- jquery ui css cdn filtre -->
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link href="/assets/css/jquery-ui.css" rel="stylesheet">


  <title>Garage V.Parrot</title>

</head>

<body>
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="fw-bold text-dark fs-4 text-nowrap">
          Garage V.Parrot
        </a>
      </div>


      <ul class="nav nav-underline">
        <?php foreach ($mainMenu as $page => $titre) { ?>
          <li class="nav-item"><a href="<?= $page; ?>" class="nav-link <?php if (basename($_SERVER['SCRIPT_NAME']) === $page) {
                                                                          echo 'active';
                                                                        } ?>"><?= $titre; ?></a></li>
        <?php } ?>
      </ul>

      <div class=" mb-2 justify-content-center mb-md-2">

        <?php if (isset($_SESSION['user'])) { ?>
          <a href="logout.php" class="btn btn-outline-primary me-2">Déconnexion</a>

        <?php } else { ?>
          <a href="login.php" class="btn btn-sm btn-outline-primary me-2">login</a>
        <?php } ?>
      </div>
    </header>
  </div>
  <main>