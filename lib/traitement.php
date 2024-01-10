<?php
require_once __DIR__ . "/config.php";


// Récupération des données du formulaire (supposez que vous avez déjà les données dans des variables)
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$date_rendezvous = $_POST['date_rendezvous'];
$heure_rendezvous = $_POST['heure_rendezvous'];
$message = $_POST['message'];
$topic = $_POST['topic'];

// Connexion à la base de données (remplacez les valeurs par les vôtres)
$pdo = new PDO("mysql:dbname=" . _DB_NAME_ . ";host=" . _DB_SERVER_ . ";charset=utf8mb4", _DB_USER_, _DB_PASSWORD_);

// Préparez la requête SQL d'insertion
$sql = "INSERT INTO rendezvous (nom, prenom, email, telephone, date_rendezvous, heure_rendezvous, message, topic) 
        VALUES (:nom, :prenom, :email, :telephone, :date_rendezvous, :heure_rendezvous, :message, :topic)";

// Utilisez PDO pour exécuter la requête préparée
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':prenom', $prenom);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':telephone', $telephone);
$stmt->bindParam(':date_rendezvous', $date_rendezvous);
$stmt->bindParam(':heure_rendezvous', $heure_rendezvous);
$stmt->bindParam(':message', $message);
$stmt->bindParam(':topic', $topic);

if ($stmt->execute()) {
  echo "Les données ont été insérées avec succès.";
} else {
  echo "Erreur lors de l'insertion des données : " . $stmt->errorInfo()[2];
}
