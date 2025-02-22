Realizar una web que permita a los usuarios publicar noticias en dicha web. Las noticias son un titulo y una url.  

Además los usuarios pueden votar (una sola vez) con un voto positivo o negativo a cada noticia.  

En la página principal se podrá ver todas las noticias publicadas junto al nombre del usuario que la compartió y el numero de likes y dislikes.  

el usuario administrador podrá ocultar noticias.  

![noticias](noticias.png)

La base de datos que he usado para el programa
```SQL
DROP DATABASE IF EXISTS noticias;

CREATE DATABASE noticias COLLATE utf8mb4_spanish_ci;

USE noticias;

CREATE TABLE users (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    user VARCHAR(25) NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol INT NOT NULL
);

CREATE TABLE noticias (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    url VARCHAR(255) NOT NULL,
    mostrar INT NOT NULL,
    user INT NOT NULL,
    getLikes INT NOT NULL,
    getDislikes INT NOT NULL,
    FOREIGN KEY (user) REFERENCES users(id)
);

CREATE TABLE votaciones (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    voto INT,
    user INT NOT NULL,
    noticia INT NOT NULL,
    FOREIGN KEY (user) REFERENCES users(id),
    FOREIGN KEY (noticia) REFERENCES noticias(id)
);

    -- usuarios----------
INSERT INTO users(user, password, rol) VALUES ("jose_016al", md5("211099"), 0);
INSERT INTO users(user, password, rol) VALUES ("inma", md5("1234"), 1);
INSERT INTO users(user, password, rol) VALUES ("alberto", md5("1234"), 1);
INSERT INTO users(user, password, rol) VALUES ("daulin", md5("1234"), 1);

    -- noticias----------
INSERT INTO noticias(title, url, mostrar, user, getLikes, getDislikes) VALUES ("titulo", "https://www.google.com/", 1, 1, 0, 0);
INSERT INTO noticias(title, url, mostrar, user, getLikes, getDislikes) VALUES ("Primera noticia", "https://www.google.com/", 1, 2, 0, 0);
INSERT INTO noticias(title, url, mostrar, user, getLikes, getDislikes) VALUES ("Segunda noticia", "https://www.google.com/", 1, 3, 0, 0);

    -- votaciones----------
INSERT INTO votaciones(voto, user, noticia) VALUES(1, 1, 1);
INSERT INTO votaciones(voto, user, noticia) VALUES(1, 2, 1);
INSERT INTO votaciones(voto, user, noticia) VALUES(1, 3, 1);
```