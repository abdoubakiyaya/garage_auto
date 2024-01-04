<?php

require_once __DIR__ . "/../lib/menu.php";

$currentPage = basename($_SERVER["SCRIPT_NAME"]);

?>



<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= $mainMenu[$currentPage]["meta_description"] ?>">
  <title> <?= $mainMenu[$currentPage]["title"] ?> </title>
  <!-- cdn icons fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- cdn bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <!-- css -->
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="fw-bold text-dark fs-4 text-nowrap">
          Garage V.Parrot
        </a>
      </div>

      <ul class="nav nav-underline col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <?php foreach ($mainMenu as $key => $menuItem) {

          if (!$menuItem["exclude"]) {

        ?>
            <li class="nav-item"><a href="<?= $key ?>" class="nav-link rounded-0 <?php
                                                                                  if ($key === $currentPage) {
                                                                                    echo "active";
                                                                                  }

                                                                                  ?> px-2"> <?= $menuItem["navItem"] ?></a></li>
        <?php }
        }
        ?>
      </ul>

      <div class=" mb-2 justify-content-center mb-md-2">
        <button type="button" class="btn btn-outline-primary px-2">
          Mon compte
        </button>
        <button type="button" class="btn btn-primary px-2">
          Déconnexion
        </button>
      </div>
    </header>
  </div>
  <main>