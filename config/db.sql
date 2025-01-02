CREATE DATABASE BiblioSchool;

CREATE Table roles(
    id INT PRIMARY KEY auto_increment,
    nom VARCHAR(50)
);

CREATE Table users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(20) NOT NULL,
    prenom VARCHAR(20),
    email VARCHAR(50) NOT NULL,
    password VARCHAR(20),
    id_role INT,
    Foreign Key (id_role) REFERENCES roles(id)
);

CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(30) NOT NULL
);

CREATE TABLE tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(30) NOT NULL
);


CREATE TABLE livres (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(50) NOT NULL,
    auteur VARCHAR(50) NOT NULL,
    date_creation DATE,
    id_categorie INT,
    FOREIGN KEY (id_categorie) REFERENCES categories(id),
);

CREATE Table livre_tag(
    id INT PRIMARY KEY auto_increment,
    id_livre INT,
    id_tag INT,
    Foreign Key (id_livre) REFERENCES livres(id),
    Foreign Key (id_tag) REFERENCES tags(id)
);

CREATE TABLE etats(
    id INT PRIMARY KEY auto_increment,
    nom VARCHAR(30)
);

CREATE Table reservations(
    id INT PRIMARY KEY auto_increment,
    id_user INT,
    id_livre INT,
    id_etat INT,
    Foreign Key (id_user) REFERENCES users(id),
    Foreign Key (id_livre) REFERENCES livres(id),
    Foreign Key (id_etat) REFERENCES etats(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);