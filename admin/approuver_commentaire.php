<?php

require_once __DIR__ . "/../admin/templates/header.php";
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/pdo.php";


// Connexion à la base de données

// Récupérer l'ID du commentaire à approuver depuis l'URL
$idCommentaire = isset($_GET['id']) ? $_GET['id'] : null;

if ($idCommentaire) {
  // Mettre à jour le statut du commentaire à "approuvé"
  $sql = "UPDATE commentaires SET statut = 'approuvé' WHERE idCommentaire = :idCommentaire";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':idCommentaire', $idCommentaire, PDO::PARAM_INT);
  $stmt->execute();

  // Rediriger l'employé vers la page précédente (interface employé)
  header("Location: commentaires.php");
  exit;
} else {
  // Gérer le cas où l'ID du commentaire n'est pas valide
  echo "ID de commentaire invalide.";
}
