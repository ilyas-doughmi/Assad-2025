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