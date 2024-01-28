<?php

function addUser(PDO $pdo, string $first_name, string $last_name, string $email, string $password)
{
  // Définition du rôle par défaut
  $role = "user";

  // Requête SQL avec le champ de rôle
  $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `role`) VALUES (:first_name, :last_name, :email, :password, :role);";
  $query = $pdo->prepare($sql);

  // Hachage du mot de passe
  $password = password_hash($password, PASSWORD_DEFAULT);

  // Liaisons de paramètres
  $query->bindParam(':first_name', $first_name, PDO::PARAM_STR);
  $query->bindParam(':last_name', $last_name, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->bindParam(':role', $role, PDO::PARAM_STR); // Le rôle est maintenant fixé à "user"

  // Exécution de la requête
  return $query->execute();
}


function verifyUserLoginPassword(PDO $pdo, string $email, string $password)
{

  $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");

  $query->bindParam(':email', $email, PDO::PARAM_STR);

  $query->execute();
  $user = $query->fetch();

  if ($user && password_verify($password, $user['password'])) {
    return $user;
  } else {
    return false;
  }
}
