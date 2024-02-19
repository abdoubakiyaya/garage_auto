CREATE TABLE `cars` (
    `idCars` int(11) NOT NULL, `brand` varchar(255) NOT NULL, `model` varchar(255) NOT NULL, `year` int(11) NOT NULL, `fuel_type` varchar(50) NOT NULL, `mileage` int(11) NOT NULL, `price` decimal(10, 2) NOT NULL, `image` varchar(255) DEFAULT NULL, `detail` text DEFAULT NULL
);

ALTER TABLE cars MODIFY COLUMN idCars INT AUTO_INCREMENT PRIMARY KEY;

INSERT INTO
    cars (
        brand, model, year, fuel_type, mileage, price, image, detail
    )
VALUES (
        'Toyota', 'Corolla', 2022, 'Essence', 15000, 25000, 'toyota_corolla.jpg', 'La Toyota Corolla est une voiture compacte populaire avec une réputation de fiabilité exceptionnelle.'
    ),
    (
        'Honda', 'Civic', 2021, 'Essence', 12000, 22000, 'honda_civic.jpg', 'La Honda Civic est appréciée pour son économie de carburant et son expérience de conduite confortable.'
    ),
    (
        'Ford', 'Focus', 2020, 'Diesel', 18000, 18000, 'ford_focus.jpg', 'La Ford Focus offre une conduite agile et une technologie embarquée avancée.'
    ),
    (
        'Chevrolet', 'Malibu', 2022, 'Essence', 10000, 27000, 'chevrolet_malibu.jpg', 'La Chevrolet Malibu associe confort et élégance pour des trajets en toute sérénité.'
    ),
    (
        'Volkswagen', 'Passat', 2022, 'Diesel', 14000, 29000, 'vw_passat.jpg', 'La Volkswagen Passat allie élégance et performance pour une expérience de conduite exceptionnelle.'
    );

INSERT INTO
    cars (
        brand, model, year, fuel_type, mileage, price, image, detail
    )
VALUES (
        'BMW', '3 Series', 2022, 'Essence', 13000, 35000, 'bmw_3series.jpg', 'La BMW Série 3 incarne le luxe et la sportivité dans une berline sophistiquée.'
    ),
    (
        'Mercedes-Benz', 'C-Class', 2021, 'Essence', 14000, 33000, 'mercedes_cclass.jpg', 'La Mercedes-Benz Classe C offre un intérieur somptueux et une conduite en douceur.'
    ),
    (
        'Audi', 'A4', 2020, 'Essence', 12000, 31000, 'audi_a4.jpg', 'L\'Audi A4 allie élégance et performance dans une berline de luxe polyvalente.'
    ),
    (
        'Hyundai', 'Elantra', 2022, 'Essence', 11000, 23000, 'hyundai_elantra.jpg', 'L\'Hyundai Elantra offre une technologie avancée et un design moderne.'
    ),
    (
        'Kia', 'Forte', 2021, 'Essence', 9000, 21000, 'kia_forte.jpg', 'La Kia Forte propose des fonctionnalités haut de gamme et une expérience de conduite agréable.'
    );

INSERT INTO
    cars (
        brand, model, year, fuel_type, mileage, price, image, detail
    )
VALUES (
        'Mazda', 'Mazda3', 2020, 'Essence', 17000, 20000, 'mazda_mazda3.jpg', 'La Mazda3 est une compacte élégante et dynamique qui offre une conduite exceptionnelle.'
    ),
    (
        'Subaru', 'Impreza', 2022, 'Essence', 13000, 27000, 'subaru_impreza.jpg', 'La Subaru Impreza offre une traction intégrale et une fiabilité reconnue.'
    ),
    (
        'Toyota', 'Camry', 2021, 'Essence', 15000, 28000, 'toyota_camry.jpg', 'La Toyota Camry est une berline spacieuse et confortable, idéale pour les trajets longs.'
    ),
    (
        'Honda', 'Accord', 2020, 'Essence', 16000, 26000, 'honda_accord.jpg', 'La Honda Accord est une berline familiale réputée pour sa qualité et sa sécurité.'
    ),
    (
        'Ford', 'Mustang', 2022, 'Essence', 9000, 40000, 'ford_mustang.jpg', 'La Ford Mustang est une légende de l\'automobile, alliant puissance et style emblématique.'
    );

INSERT INTO
    cars (
        brand, model, year, fuel_type, mileage, price, image, detail
    )
VALUES (
        'Chevrolet', 'Camaro', 2021, 'Essence', 10000, 38000, 'chevrolet_camaro.jpg', 'La Chevrolet Camaro est une voiture de sport légendaire avec des performances hors pair.'
    ),
    (
        'Nissan', 'Maxima', 2020, 'Essence', 13000, 32000, 'nissan_maxima.jpg', 'La Nissan Maxima offre luxe et performance dans une berline haut de gamme.'
    ),
    (
        'Volkswagen', 'Atlas', 2022, 'Essence', 14000, 35000, 'vw_atlas.jpg', 'Le Volkswagen Atlas est un SUV spacieux offrant des options de sièges polyvalentes.'
    ),
    (
        'BMW', 'X3', 2021, 'Essence', 12000, 38000, 'bmw_x3.jpg', 'Le BMW X3 est un SUV compact de luxe qui allie confort et performances.'
    ),
    (
        'Mercedes-Benz', 'GLC', 2020, 'Essence', 11000, 39000, 'mercedes_glc.jpg', 'Le Mercedes-Benz GLC propose une expérience de conduite sophistiquée dans un SUV élégant.'
    );

CREATE TABLE `prestations` (
    `idPrestation` int(11) NOT NULL, `prestation_name` varchar(255) NOT NULL, `description` text DEFAULT NULL, `price` decimal(10, 2) NOT NULL, `image` varchar(255) DEFAULT NULL
);

ALTER TABLE prestations
MODIFY COLUMN idPrestation INT AUTO_INCREMENT PRIMARY KEY;

INSERT INTO
    `prestations` (
        `idPrestation`, `prestation_name`, `description`, `price`, `image`
    )
VALUES (
        1, 'Révision de base', 'Contrôle technique complet de votre véhicule.', 50.00, 'revision_base.jpg'
    ),
    (
        2, 'Changement d\'huile', 'Vidange d\'huile et remplacement du filtre à huile.', 30.00, 'changement_huile.jpg'
    ),
    (
        3, 'Diagnostic électronique', 'Analyse complète des systèmes électroniques de votre véhicule.', 60.00, 'diagnostic_electronique.jpg'
    ),
    (
        4, 'Remplacement des freins', 'Remplacement des plaquettes et disques de frein.', 80.00, 'remplacement_freins.jpg'
    ),
    (
        5, 'Climatisation', 'Réparation et recharge de votre système de climatisation.', 70.00, 'climatisation.jpg'
    ),
    (
        6, 'Entretien préventif', 'Inspection complète de votre véhicule pour prévenir les pannes.', 55.00, 'entretien_preventif.jpg'
    ),
    (
        7, 'Réparation du moteur', 'Réparation des problèmes moteur majeurs.', 120.00, 'reparation_moteur.jpg'
    ),
    (
        8, 'Alignement des roues', 'Réglage de l\'alignement des roues pour une conduite en douceur.', 40.00, 'alignement_roues.jpg'
    ),
    (
        9, 'Nettoyage intérieur', 'Nettoyage en profondeur de l\'intérieur de votre véhicule.', 25.00, 'nettoyage_interieur.jpg'
    ),
    (
        10, 'Diagnostic des freins', 'Vérification complète du système de freinage.', 45.00, 'diagnostic_freins.jpg'
    ),
    (
        11, 'Remplacement de la batterie', 'Remplacement de la batterie défectueuse par une neuve.', 55.00, 'remplacement_batterie.jpg'
    ),
    (
        12, 'Réparation de la transmission', 'Réparation des problèmes de transmission.', 100.00, 'reparation_transmission.jpg'
    );

CREATE TABLE `rendezvous` (
    `idRendezvous` int(11) NOT NULL, `nom` varchar(255) NOT NULL, `prenom` varchar(255) NOT NULL, `email` varchar(255) NOT NULL, `telephone` varchar(20) NOT NULL, `date_rendezvous` date NOT NULL, `heure_rendezvous` time NOT NULL, `message` text DEFAULT NULL, `created_at` timestamp NOT NULL DEFAULT current_timestamp(), `topic` varchar(255) DEFAULT NULL
);

CREATE TABLE horaires (
    idHoraires INT AUTO_INCREMENT PRIMARY KEY, jour_semaine VARCHAR(10) NOT NULL, heure_ouverture TIME NOT NULL, heure_fermeture TIME NOT NULL
);

INSERT INTO
    horaires (
        jour_semaine, heure_ouverture, heure_fermeture
    )
VALUES ('lundi', '09:00', '18:00'),
    ('mardi', '09:00', '18:00'),
    ('mercredi', '09:00', '18:00'),
    ('jeudi', '09:00', '18:00'),
    ('vendredi', '09:00', '18:00'),
    ('samedi', '10:00', '15:00'),
    ('dimanche', 'fermé', 'fermé');

CREATE TABLE commentaires (
    idCommentaire INT AUTO_INCREMENT PRIMARY KEY, nom_utilisateur varchar(255) NOT NULL, note int(11) NOT NULL, commentaire text NOT NULL, statut enum('en_attente', 'approuvé') DEFAULT 'en_attente', date_creation timestamp NOT NULL DEFAULT current_timestamp()
);

ALTER TABLE rendezvous DROP COLUMN topic;

ALTER TABLE rendezvous
MODIFY COLUMN idRendezvous INT AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE horaires ADD COLUMN ferme TINYINT(1) NOT NULL DEFAULT 0;

ALTER TABLE cars ADD COLUMN status INT;

UPDATE cars SET status = 1;