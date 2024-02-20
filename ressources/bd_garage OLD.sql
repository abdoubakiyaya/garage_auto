CREATE TABLE IF NOT EXISTS `users` (
    `idUser` INT AUTO_INCREMENT PRIMARY KEY, `last_name` VARCHAR(255), `first_name` VARCHAR(255), `email` VARCHAR(255) NOT NULL, `password` VARCHAR(255) NOT NULL, `role` VARCHAR(255)
);

INSERT INTO
    `users` (
        `last_name`, `first_name`, `email`, `password`, `role`
    )
VALUES (
        'John', 'Doe', 'john.doe@example.com', '$2y$10$hv2m6oFnpMs6sZmpyNK1r.iWEJO/CU96h7b95VjYCC5Msw.lGdn8G', 'admin'
    ),
    (
        'Jane', 'Smith', 'jane.smith@example.com', '$2y$10$hv2m6oFnpMs6sZmpyNK1r.iWEJO/CU96h7b95VjYCC5Msw.lGdn8G', NULL
    ),
    (
        'Test', 'User', 'test@example.com', '$2y$10$hv2m6oFnpMs6sZmpyNK1r.iWEJO/CU96h7b95VjYCC5Msw.lGdn8G', NULL
    ),
    (
        '', '', '', '$2y$10$eykUugBFueqld5/lRvMMFe2S4M969lk1AInfLcmzP0/V0JD/FoEDe', 'user'
    ),
    (
        'test', 'test', 'test@test.com', '$2y$10$K8oIyLMRZifbHstmtIWWHuNs8uy1OgyIhdtJHhNv.cRe19f3v3g32', 'user'
    ),
    (
        'user', 'user', 'user@user.fr', '$2y$10$lNVfCgz7CpnjLGQGcpK.XeDX9IiConAzlBdJqvsfVQpMa.mPS3yYK', 'user'
    ),
    (
        'abd', 'bk', 'bkabd@tom.fr', '$2y$10$JiPvWjbsVFhbR821TZ3rjO1YTg3DRjU2YcvR3YaAarcWmVZ6W13P6', 'user'
    ),
    (
        'dd', 'bd', 'bd@dd.dd', '$2y$10$.KjqZteeI6qNA/o1Mg1PpOO8iAnSIVr4Yg.4gc/LsWdtTHO3.dm7i', 'admin'
    );

CREATE TABLE IF NOT EXISTS `cars` (
    `idCars` INT AUTO_INCREMENT PRIMARY KEY, `brand` varchar(255) NOT NULL, `model` varchar(255) NOT NULL, `year` int(11) NOT NULL, `fuel_type` varchar(50) NOT NULL, `mileage` int(11) NOT NULL, `price` decimal(10, 2) NOT NULL, `image` varchar(255) DEFAULT NULL, `detail` text DEFAULT NULL, `status` int(11) DEFAULT NULL
);

INSERT INTO
    `cars` (
        `brand`, `model`, `year`, `fuel_type`, `mileage`, `price`, `image`, `detail`, `status`
    )
VALUES (
        'Honda', 'Civic', 2021, 'Essence', 12000, 22000.00, 'honda_civic.jpg', 'La Honda Civic est appréciée pour son économie de carburant et son expérience de conduite confortable.', 1
    ),
    (
        'Ford', 'Focus', 2020, 'Diesel', 18000, 18000.00, 'ford_focus.jpg', 'La Ford Focus offre une conduite agile et une technologie embarquée avancée.', 1
    ),
    (
        'Chevrolet', 'Malibu', 2022, 'Essence', 10000, 27000.00, 'chevrolet_malibu.jpg', 'La Chevrolet Malibu associe confort et élégance pour des trajets en toute sérénité.', 1
    ),
    (
        'Volkswagen', 'Passat', 2022, 'Diesel', 14000, 29000.00, 'vw_passat.jpg', 'La Volkswagen Passat allie élégance et performance pour une expérience de conduite exceptionnelle.', 1
    ),
    (
        'BMW', '3 Series', 2022, 'Essence', 13000, 35000.00, 'bmw_3series.jpg', 'La BMW Série 3 incarne le luxe et la sportivité dans une berline sophistiquée.', 1
    ),
    (
        'Mercedes-Benz', 'C-Class', 2021, 'Essence', 14000, 33000.00, 'mercedes_cclass.jpg', 'La Mercedes-Benz Classe C offre un intérieur somptueux et une conduite en douceur.', 1
    ),
    (
        'Audi', 'A4', 2020, 'Essence', 12000, 31000.00, 'audi_a4.jpg', 'L\'Audi A4 allie élégance et performance dans une berline de luxe polyvalente.', 1
    ),
    (
        'Hyundai', 'Elantra', 2022, 'Essence', 11000, 23000.00, 'hyundai_elantra.jpg', 'L\'Hyundai Elantra offre une technologie avancée et un design moderne.', 1
    ),
    (
        'Kia', 'Forte', 2021, 'Essence', 9000, 21000.00, 'kia_forte.jpg', 'La Kia Forte propose des fonctionnalités haut de gamme et une expérience de conduite agréable.', 1
    ),
    (
        'Mazda', 'Mazda3', 2020, 'Essence', 17000, 20000.00, 'mazda_mazda3.jpg', 'La Mazda3 est une compacte élégante et dynamique qui offre une conduite exceptionnelle.', 1
    ),
    (
        'Subaru', 'Impreza', 2022, 'Essence', 13000, 27000.00, 'subaru_impreza.jpg', 'La Subaru Impreza offre une traction intégrale et une fiabilité reconnue.', 1
    ),
    (
        'Toyota', 'Camry', 2021, 'Essence', 15000, 28000.00, 'toyota_camry.jpg', 'La Toyota Camry est une berline spacieuse et confortable, idéale pour les trajets longs.', 1
    ),
    (
        'Honda', 'Accord', 2020, 'Essence', 16000, 26000.00, 'honda_accord.jpg', 'La Honda Accord est une berline familiale réputée pour sa qualité et sa sécurité.', 1
    ),
    (
        'Ford', 'Mustang', 2022, 'Essence', 9000, 40000.00, 'ford_mustang.jpg', 'La Ford Mustang est une légende de l\'automobile, alliant puissance et style emblématique.', 1
    ),
    (
        'Chevrolet', 'Camaro', 2021, 'Essence', 10000, 38000.00, 'chevrolet_camaro.jpg', 'La Chevrolet Camaro est une voiture de sport légendaire avec des performances hors pair.', 1
    ),
    (
        'Nissan', 'Maxima', 2020, 'Essence', 13000, 32000.00, 'nissan_maxima.jpg', 'La Nissan Maxima offre luxe et performance dans une berline haut de gamme.', 1
    ),
    (
        'Volkswagen', 'Atlas', 2022, 'Essence', 14000, 35000.00, 'vw_atlas.jpg', 'Le Volkswagen Atlas est un SUV spacieux offrant des options de sièges polyvalentes.', 1
    ),
    (
        'BMW', 'X3', 2021, 'Essence', 12000, 38000.00, 'bmw_x3.jpg', 'Le BMW X3 est un SUV compact de luxe qui allie confort et performances.', 1
    ),
    (
        'Mercedes-Benz', 'GLC', 2018, 'Essence', 11000, 39000.00, 'mercedes_glc.jpg', 'Le Mercedes-Benz GLC propose une expérience de conduite sophistiquée dans un SUV élégant.', 1
    );

CREATE TABLE IF NOT EXISTS `commentaires` (
    `idCommentaire` INT AUTO_INCREMENT PRIMARY KEY, `nom_utilisateur` varchar(255) NOT NULL, `note` int(11) NOT NULL, `commentaire` text NOT NULL, `statut` enum('en_attente', 'approuvé') DEFAULT 'en_attente', `date_creation` timestamp NOT NULL DEFAULT current_timestamp()
);

INSERT INTO
    `commentaires` (
        `nom_utilisateur`, `note`, `commentaire`, `statut`, `date_creation`
    )
VALUES (
        'nnnnnnnnnnnnn', 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae, et sunt. Unde enim iusto quam fuga magni vel, dolor et sed porro. Corrupti temporibus blanditiis eos vitae unde! A, fugit?\r\n', 'approuvé', '2024-01-11 23:35:52'
    ),
    (
        'nnnnnnnnnnnnn', 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae, et sunt. Unde enim iusto quam fuga magni vel, dolor et sed porro. Corrupti temporibus blanditiis eos vitae unde! A, fugit?\r\n', 'approuvé', '2024-01-11 23:35:56'
    ),
    (
        'nnnnnnnnnnnnn', 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae, et sunt. Unde enim iusto quam fuga magni vel, dolor et sed porro. Corrupti temporibus blanditiis eos vitae unde! A, fugit?\r\n', 'en_attente', '2024-01-11 23:36:01'
    ),
    (
        'dupon', 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero ducimus nulla corporis, et excepturi vero nam deleniti suscipit cum voluptates voluptas praesentium minima at, alias beatae nihil porro! Repellat, asperiores!', 'approuvé', '2024-01-12 00:45:34'
    ),
    (
        'Delorme', 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero ducimus nulla corporis, et excepturi vero nam deleniti suscipit cum voluptates voluptas praesentium minima at, alias beatae nihil porro! Repellat, asperiores!', 'approuvé', '2024-01-12 00:45:52'
    ),
    (
        'John', 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero ducimus nulla corporis, et excepturi vero nam deleniti suscipit cum voluptates voluptas praesentium minima at, alias beatae nihil porro! Repellat, asperiores!', 'approuvé', '2024-01-12 00:46:12'
    );

CREATE TABLE IF NOT EXISTS `horaires` (
    `idHoraires` INT AUTO_INCREMENT PRIMARY KEY, `jour_semaine` varchar(10) NOT NULL, `heure_ouverture` time NOT NULL, `heure_fermeture` time NOT NULL, `ferme` tinyint(1) NOT NULL DEFAULT 0
);

INSERT INTO
    `horaires` (
        `jour_semaine`, `heure_ouverture`, `heure_fermeture`, `ferme`
    )
VALUES (
        'lundi', '09:00:00', '18:00:00', 0
    ),
    (
        'mardi', '09:00:00', '18:00:00', 0
    ),
    (
        'mercredi', '10:00:00', '18:00:00', 0
    ),
    (
        'jeudi', '10:00:00', '18:00:00', 0
    ),
    (
        'vendredi', '10:00:00', '18:00:00', 0
    ),
    (
        'samedi', '10:00:00', '15:00:00', 0
    ),
    (
        'dimanche', '00:00:00', '00:00:00', 1
    );

CREATE TABLE IF NOT EXISTS `prestations` (
    `idPrestation` int(11) AUTO_INCREMENT PRIMARY KEY, `prestation_name` varchar(255) NOT NULL, `description` text DEFAULT NULL, `price` decimal(10, 2) NOT NULL, `image` varchar(255) DEFAULT NULL
);

INSERT INTO
    `prestations` (
        `prestation_name`, `description`, `price`, `image`
    )
VALUES (
        'Révision de base', 'Contrôle technique complet de votre véhicule.', 50.00, 'revision_base.jpg'
    ),
    (
        'Changement d\'huile', 'Vidange d\'huile et remplacement du filtre à huile.', 30.00, 'changement_huile.jpg'
    ),
    (
        'Diagnostic électronique', 'Analyse complète des systèmes électroniques de votre véhicule.', 60.00, 'diagnostic_electronique.jpg'
    ),
    (
        'Remplacement des freins', 'Remplacement des plaquettes et disques de frein.', 80.00, 'remplacement_freins.jpg'
    ),
    (
        'Climatisation', 'Réparation et recharge de votre système de climatisation.', 70.00, 'climatisation.jpg'
    ),
    (
        'Entretien préventif', 'Inspection complète de votre véhicule pour prévenir les pannes.', 80.00, 'entretien_preventif.jpg'
    ),
    (
        'Réparation du moteur', 'Réparation des problèmes moteur majeurs.', 120.00, 'reparation_moteur.jpg'
    ),
    (
        'Alignement des roues', 'Réglage de l\'alignement des roues pour une conduite en douceur.', 40.00, 'alignement_roues.jpg'
    ),
    (
        'Nettoyage intérieur', 'Nettoyage en profondeur de l\'intérieur de votre véhicule.', 25.00, 'nettoyage_interieur.jpg'
    ),
    (
        'Diagnostic des freins', 'Vérification complète du système de freinage.', 45.00, 'diagnostic_freins.jpg'
    ),
    (
        'Remplacement de la batterie', 'Remplacement de la batterie défectueuse par une neuve.', 55.00, 'remplacement_batterie.jpg'
    ),
    (
        'Réparation de la transmission', 'Réparation des problèmes de transmission.', 150.00, 'reparation_transmission.jpg'
    );

CREATE TABLE IF NOT EXISTS `rendezvous` (
    `idRendezvous` int(11) AUTO_INCREMENT PRIMARY KEY, `nom` varchar(255) NOT NULL, `prenom` varchar(255) NOT NULL, `email` varchar(255) NOT NULL, `telephone` varchar(20) NOT NULL, `date_rendezvous` date NOT NULL, `heure_rendezvous` time NOT NULL, `message` text DEFAULT NULL, `created_at` timestamp NOT NULL DEFAULT current_timestamp()
);

INSERT INTO
    `rendezvous` (
        `nom`, `prenom`, `email`, `telephone`, `date_rendezvous`, `heure_rendezvous`, `message`, `created_at`
    )
VALUES (
        'sssssssssss', 'ssssssssssss', 'sssssssssss@sssssssss', '0000000000', '2024-01-24', '03:06:00', 'sssssssssssssssss', '2024-01-10 23:06:12'
    ),
    (
        'sssssssssss', 'ssssssssssss', 'sssssssssss@sssssssss', '0000000000', '2024-01-24', '03:06:00', 'sssssssssssssssss', '2024-01-10 23:13:42'
    ),
    (
        'sssssssssss', 'ssssssssssss', 'sssssssssss@sssssssss', '0000000000', '2024-01-24', '03:06:00', 'sssssssssssssssss', '2024-01-10 23:19:46'
    ),
    (
        'sssssssssss', 'ssssssssssss', 'sssssssssss@sssssssss', '0000000000', '2024-01-24', '03:06:00', 'sssssssssssssssss', '2024-01-10 23:19:58'
    ),
    (
        'sssssssssss', 'ssssssssssss', 'sssssssssss@sssssssss', '0000000000', '2024-01-24', '03:06:00', 'sssssssssssssssss', '2024-01-10 23:20:23'
    ),
    (
        'xxxxxxx', 'xxxxxxxxxx', 'xxxxxxxxxxxxx@xxxxxxx', '022222222', '2024-01-18', '01:21:00', 'xxxxxxxxxxxxxxxxxxxxxx', '2024-01-10 23:21:40'
    ),
    (
        'vvxv', 'vdv', 'dvdv@ddv', '0000000000', '2024-01-24', '02:09:00', 'gdgdegedg', '2024-01-20 22:05:42'
    ),
    (
        'gg', 'gg', 'gg@jkk.gg', '20000000', '2024-02-07', '13:11:00', 'gg', '2024-02-18 09:11:46'
    ),
    (
        'gg', 'gg', 'gg@jkk.gg', '20000000', '2024-02-07', '13:11:00', 'gg', '2024-02-18 09:13:52'
    ),
    (
        'gg', 'gg', 'gg@jkk.gg', '20000000', '2024-02-07', '13:11:00', 'gg', '2024-02-18 09:13:56'
    ),
    (
        'd', 'd', 'gg@jkk.gg', 'dd', '2024-02-18', '13:14:00', 'd', '2024-02-18 09:14:23'
    ),
    (
        'c', 'c', 'c@c', '20000000', '2024-02-07', '23:08:00', 'c', '2024-02-18 19:06:56'
    );