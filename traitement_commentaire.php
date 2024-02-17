<?php
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/pdo.php";



// Récupération des données du formulaire
$nomUtilisateur = $_POST['nom_utilisateur'];
$note = $_POST['note'];
$commentaire = $_POST['commentaire'];

// Inséretion commentaire dans la base de données avec le statut "en_attente"
$sql = "INSERT INTO commentaires (nom_utilisateur, note, commentaire, statut) VALUES (:nom_utilisateur, :note, :commentaire, 'en_attente')";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nom_utilisateur', $nomUtilisateur);
$stmt->bindParam(':note', $note);
$stmt->bindParam(':commentaire', $commentaire);
$stmt->execute();

// Rediriger l'utilisateur vers la page d'accueil après avoir soumis le commentaire
echo "Votre commentaire a été soumis avec succès et est en attente de validation.";
header("Location: index.php");
exit;
