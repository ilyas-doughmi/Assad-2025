CREATE DATABASE ASSAD;
USE ASSAD;

CREATE TABLE Habitat (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    description TEXT,
    image VARCHAR(255)
);

CREATE TABLE Animal (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    espece VARCHAR(255),
    pays_origin VARCHAR(255),
    habitat_id INT,

    FOREIGN KEY (habitat_id) REFERENCES Habitat(id)
        ON DELETE SET NULL
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50),
    isBanned BOOLEAN DEFAULT FALSE,
    isActive BOOLEAN DEFAULT TRUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Tours (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    description TEXT,
    date_heure_debut DATETIME,
    duree_minutes INT,
    prix DECIMAL(8,2),
    langue VARCHAR(255),
    capacity_max INT,
    status VARCHAR(100),
    guide_id INT,

    FOREIGN KEY (guide_id) REFERENCES users(id)
        ON DELETE SET NULL
);

CREATE TABLE tour_step (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre_etape VARCHAR(150),
    description_etape TEXT,
    order_etape INT,
    tour_id INT,

    FOREIGN KEY (tour_id) REFERENCES Tours(id)
        ON DELETE CASCADE
);

CREATE TABLE Reservation (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    tour_id INT,
    date_reservation DATETIME DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE,
    FOREIGN KEY (tour_id) REFERENCES Tours(id)
        ON DELETE CASCADE
);

CREATE TABLE Comments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    tour_id INT,
    note INT CHECK (note BETWEEN 1 AND 5),
    texte TEXT,
    date_commentaire DATETIME DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE,
    FOREIGN KEY (tour_id) REFERENCES Tours(id)
        ON DELETE CASCADE
);


-- adding admin (password is admin123)

INSERT INTO users(full_name,email,password,role,isActive) VALUES("Ilyas Doughmi","admin@gmail.com","$2y$10$bSuhIS36G5C7c2NuqTXUmu3aBMLh5LYQXjmmAdQQas3aL8puDy7XW","admin",1);

-- inserting habitat
INSERT INTO Habitat (nom, description, image) VALUES
(
    'Savane',
    'Vaste plaine africaine caractérisée par une végétation herbacée et quelques arbres. Habitat naturel des lions, girafes et éléphants.',
    'savane.jpg'
),
(
    'Forêt tropicale',
    'Milieu chaud et humide avec une biodiversité exceptionnelle. Abrite de nombreuses espèces d’oiseaux, de reptiles et de mammifères.',
    'foret_tropicale.jpg'
),
(
    'Désert',
    'Zone aride avec de faibles précipitations et des températures extrêmes. Adapté aux espèces résistantes comme les dromadaires et les fennecs.',
    'desert.jpg'
),
(
    'Zone polaire',
    'Région glaciale aux températures très basses. Habitat des ours polaires, manchots et phoques.',
    'zone_polaire.jpg'
),
(
    'Jungle',
    'Forêt dense et humide avec une végétation luxuriante. Accueille des tigres, singes et serpents.',
    'jungle.jpg'
);


-- inserting animals

INSERT INTO Animal (nom, espece, pays_origin, habitat_id) VALUES
-- Savane
('Lion', 'Panthera leo', 'Kenya', 1),
('Éléphant d’Afrique', 'Loxodonta africana', 'Tanzanie', 1),
('Girafe', 'Giraffa camelopardalis', 'Afrique du Sud', 1),

-- Forêt tropicale
('Perroquet Ara', 'Ara macao', 'Brésil', 2),
('Jaguar', 'Panthera onca', 'Amazonie', 2),
('Grenouille dendrobate', 'Dendrobates tinctorius', 'Colombie', 2),

-- Désert
('Dromadaire', 'Camelus dromedarius', 'Maroc', 3),
('Fennec', 'Vulpes zerda', 'Sahara', 3),
('Scorpion jaune', 'Leiurus quinquestriatus', 'Égypte', 3),

-- Zone polaire
('Ours polaire', 'Ursus maritimus', 'Arctique', 4),
('Manchot empereur', 'Aptenodytes forsteri', 'Antarctique', 4),
('Phoque', 'Phoca vitulina', 'Groenland', 4),

-- Jungle
('Tigre', 'Panthera tigris', 'Inde', 5),
('Singe capucin', 'Cebus capucinus', 'Costa Rica', 5),
('Serpent Boa', 'Boa constrictor', 'Brésil', 5);
