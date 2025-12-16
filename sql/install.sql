CREATE DATABASE ASSAD;
USE ASSAD;

CREATE TABLE Habitat(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    description TEXT,
    image   VARCHAR(255)
);

CREATE TABLE Animal(
    id  INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    espece  VARCHAR(255),
    pays_origin VARCHAR(255),
    habitat_id  INT,

    FOREIGN KEY (habitat_id) REFERENCES Habitat(id)
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    role VARCHAR(50),
    isActive BOOLEAN,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Tours(
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255),
    description TEXT,
    date_heure_debut DATETIME,
    duree_minutes INT,
    prix DECIMAL,
    langue VARCHAR(255),
    capacity_max INT,
    status VARCHAR(100),
    guide_id INT,

    FOREIGN KEY (guide_id) REFERENCES users(id)
)

CREATE TABLE tour_step(
    id PRIMARY KEY AUTO_INCREMENT,
    titre_etape VARCHAR(150),
    description_etape   TEXT,
    order_etape INT,
    tour_id INT

    FOREIGN KEY (tour_id) REFERENCES Tours(id)
)

CREATE TABLE Reservation(
    id  INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    tour_id INT,
    date_reservation DATETIME
)


CREATE TABLE Comments(
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    tour_id INT,
    note    INT,
    texte   TEXT,
    date_commentaire DATETIME,

    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (tour_id) REFERENCES Tours(id)
)