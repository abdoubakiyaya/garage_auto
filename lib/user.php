<?php
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
