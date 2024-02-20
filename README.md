Ce projet a été réalisé dans le cadre de ma formation de développeur web et web mobile. Il s'agit d'une application de gestion pour un garage automobile. L'application permettra de gérer les voitures disponibles à la vente, les rendez-vous des clients, les services de maintenance, les heures d'ouvertures, et de recueillir les témoignages des clients.
Vous pouver cloner le projet dépuis mon dépot git. Cherchez le projet garage_auto dans la liste des projets disponible. 
Une fois le projet cloner, aller dans le dossier ressources et télécharger le fichier SQL qui se trouve (db_garage OLD.sql). 
Connectez vous à votre serveur local (host, username, password et db_name)
Importer toutes tables dans votre système de gestion des bases données. 
Dans le fichier config.php, remplacer le nom d'utilisateur et le mot de passe de serveur local
Ensuite dans le fichier pdo.php, configurer votre connexion local, le host, username, mot de passe et remplacer le nom de la base de données par celui celui que vous avez mentionné dans le fichier config.php.
Si vous bien suivie ses étapes, l'application va être fonctionnelle. 
Pour acceder à l'espace admin, vous devez ajouter login.php avec les identifiant (eamil : admin@admin.com/ password : Admin1234). 
Vous pouvez à partir de là créer des utilisateurs avec le formulaire disponible dans votre espace. 
Les utilisateurs (employés) créer ont un espace dedié avec les ressoucres dont ils ont l'autorisation de gérer. 
