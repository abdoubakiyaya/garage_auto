<?php

require_once __DIR__ . "/../lib/config.php";

?>


<table class="table">

  <tbody>
    <?php
    // Connexion à la base de données
    $pdo = new PDO("mysql:dbname=" . _DB_NAME_ . ";host=" . _DB_SERVER_ . ";charset=utf8mb4", _DB_USER_, _DB_PASSWORD_);

    // Code PHP pour récupérer et afficher les horaires d'ouverture depuis la base de données
    $sql = "SELECT * FROM horaires";
    $stmt = $pdo->query($sql);
    $schedules = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($schedules as $schedule) {
      echo "<tr>";
      echo "<td>{$schedule['jour_semaine']}</td>";
      echo "<td>{$schedule['heure_ouverture']}</td>";
      echo "<td>{$schedule['heure_fermeture']}</td>";
      echo "<tr>";
    }
    ?>
  </tbody>
</table>