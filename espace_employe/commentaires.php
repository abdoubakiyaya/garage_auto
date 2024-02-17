<?php

require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/session.php";

?>


<div class="container">
  <h1 class="mt-5">Modération des commentaires</h1>
  <p>Vous allez retrouvé une liste des commentaires à approuvé, uniquement s'ils ont été soumis par les visiteurs.</p>

  <?php
  // Connexion à la base de données

  // Gestion de la pagination
  $commentairesParPage = 10;
  $pageCourante = isset($_GET['page']) ? $_GET['page'] : 1;
  $debut = ($pageCourante - 1) * $commentairesParPage;

  // Récupérer les commentaires en attente de validation avec pagination
  $sql = "SELECT * FROM commentaires WHERE statut = 'en_attente' LIMIT :debut, :commentairesParPage";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':debut', $debut, PDO::PARAM_INT);
  $stmt->bindParam(':commentairesParPage', $commentairesParPage, PDO::PARAM_INT);
  $stmt->execute();
  $commentaires = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Afficher les commentaires en attente
  echo '<table class="table">';
  echo '<thead>';
  echo '<tr>';
  echo '<th>ID</th>';
  echo '<th>Nom Utilisateur</th>';
  echo '<th>Note</th>';
  echo '<th>Commentaire</th>';
  echo '<th>Actions</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';

  foreach ($commentaires as $commentaire) {
    echo '<tr>';
    echo '<td>' . $commentaire['idCommentaire'] . '</td>';
    echo '<td>' . $commentaire['nom_utilisateur'] . '</td>';
    echo '<td>' . $commentaire['note'] . '</td>';
    echo '<td>' . $commentaire['commentaire'] . '</td>';
    echo '<td>';
    echo '<a href="approuver_commentaire.php?id=' . $commentaire['idCommentaire'] . '" class="btn btn-success">Approuver</a>';
    echo ' ';
    echo '<a href="rejeter_commentaire.php?id=' . $commentaire['idCommentaire'] . '" class="btn btn-danger">Rejeter</a>';
    echo '</td>';
    echo '</tr>';
  }

  echo '</tbody>';
  echo '</table>';

  // Pagination
  $sql = "SELECT COUNT(*) as total FROM commentaires WHERE statut = 'en_attente'";
  $stmt = $pdo->query($sql);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $totalCommentaires = $row['total'];
  $totalPages = ceil($totalCommentaires / $commentairesParPage);

  echo '<ul class="pagination">';
  for ($i = 1; $i <= $totalPages; $i++) {
    echo '<li class="page-item ' . ($i == $pageCourante ? 'active' : '') . '"><a class="page-link" href="commentaires.php?page=' . $i . '">' . $i . '</a></li>';
  }
  echo '</ul>';
  ?>

</div>
<?php

// require_once __DIR__ . "/templates/footer.php";
?>