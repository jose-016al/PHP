DROP DATABASE IF EXISTS noticias;

CREATE DATABASE noticias COLLATE utf8mb4_spanish_ci;

USE noticias;

CREATE TABLE users (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    user VARCHAR(25) NOT NULL,
    password VARCHAR(255) NOT NULL,
    id_rol INT NOT NULL
);

CREATE TABLE noticias (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    url VARCHAR(255) NOT NULL,
    mostrar INT NOT NULL,
    id_user INT NOT NULL,
    getLikes INT NOT NULL,
    getDislikes INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id)
);

CREATE TABLE votaciones (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    voto INT,
    id_user INT NOT NULL,
    id_noticia INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id),
    FOREIGN KEY (id_noticia) REFERENCES noticias(id)
);

INSERT INTO users(user, password, id_rol) VALUES ("jose_016al", md5("211099"), 0);
INSERT INTO users(user, password, id_rol) VALUES ("inma", md5("1234"), 1);
INSERT INTO users(user, password, id_rol) VALUES ("alberto", md5("1234"), 1);
INSERT INTO users(user, password, id_rol) VALUES ("daulin", md5("1234"), 1);

INSERT INTO noticias(title, url, mostrar, id_user, getLikes, getDislikes) VALUES ("titulo", "https://www.google.com/", 1, 1, 0, 0);
INSERT INTO noticias(title, url, mostrar, id_user, getLikes, getDislikes) VALUES ("Primera noticia", "https://www.google.com/", 1, 2, 0, 0);
INSERT INTO noticias(title, url, mostrar, id_user, getLikes, getDislikes) VALUES ("Segunda noticia", "https://www.google.com/", 1, 3, 0, 0);
