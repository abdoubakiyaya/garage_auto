<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/../lib/session.php";

?>

<div class="container">
  <h1 class="mt-5">Administration des horaires d'ouverture</h1>
  <?php
  // Connexion à la base de données

  // Code pour gérer la soumission du formulaire
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
      // Mettez à jour les horaires d'ouverture dans la base de données
      $daysOfWeek = ["lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"];

      foreach ($daysOfWeek as $day) {
        $openingTime = isset($_POST[$day . '_ouverture']) ? $_POST[$day . '_ouverture'] : null;
        $closingTime = isset($_POST[$day . '_fermeture']) ? $_POST[$day . '_fermeture'] : null;
        $closed = isset($_POST[$day . '_closed']) ? 1 : 0; // Vérifie si la case "fermé" est cochée

        // Préparez et exécutez la requête SQL d'update
        $sql = "UPDATE horaires SET heure_ouverture = :ouverture, heure_fermeture = :fermeture, ferme = :ferme WHERE jour_semaine = :jour";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':ouverture', $openingTime);
        $stmt->bindParam(':fermeture', $closingTime);
        $stmt->bindParam(':jour', $day);
        $stmt->bindParam(':ferme', $closed);
        $stmt->execute();
      }

      echo "Les horaires ont été mis à jour avec succès.";
    } catch (PDOException $e) {
      echo "Erreur : " . $e->getMessage();
    }
  }

  // Code pour afficher les horaires actuels
  $sql = "SELECT * FROM horaires";
  $stmt = $pdo->query($sql);
  $schedules = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <form method="post">

    <table class="table">
      <tr>
        <th>Jour de la semaine</th>
        <th>Heure d'ouverture</th>
        <th>Heure de fermeture</th>
        <th class="text-danger">Fermé</th>
      </tr>
      <?php
      // Affichage des horaires actuels depuis la base de données
      foreach ($schedules as $schedule) {
        echo "<tr>";
        echo "<td>{$schedule['jour_semaine']}</td>";

        if ($schedule['ferme'] == 1) {
          echo "<td colspan='2'>Fermé</td>";
          echo "<td><input type='checkbox' name='{$schedule['jour_semaine']}_closed' checked></td>";
        } else {
          echo "<td><input type='time' name='{$schedule['jour_semaine']}_ouverture' value='{$schedule['heure_ouverture']}'></td>";
          echo "<td><input type='time' name='{$schedule['jour_semaine']}_fermeture' value='{$schedule['heure_fermeture']}'></td>";
          echo "<td><input type='checkbox' name='{$schedule['jour_semaine']}_closed'></td>";
        }

        echo "</tr>";
      }
      ?>
    </table>
    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
  </form>
</div>

<?php

require_once __DIR__ . "/templates/footer.php";
?>