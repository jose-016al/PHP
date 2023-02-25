DROP DATABASE IF EXISTS examen;

CREATE DATABASE examen COLLATE utf8mb4_spanish_ci;

USE examen;

CREATE TABLE users (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR(50),
    apellidos VARCHAR(50),
    DNI varchar(50) NOT NULL,
    email VARCHAR(255),
    telefono VARCHAR(9),
    password VARCHAR(255) NOT NULL,
    rol INT NOT NULL
);

CREATE TABLE tiempo (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    inicio DATETIME,
    fin DATETIME,
    incidencias INT DEFAULT 0,
    justificante TEXT,
    user INT NOT NULL,
    FOREIGN KEY (user) REFERENCES users(id)
);

CREATE TABLE trabajos (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    lugar VARCHAR(50),
    descripcion varchar(50),
    fechaSalida DATETIME,
    fechaRegreso DATETIME,
    sueldo FLOAT,
    user INT NOT NULL,
    disponible INT DEFAULT 0,
    FOREIGN KEY (user) REFERENCES users(id)
);

    -- usuarios----------
INSERT INTO users(name, apellidos, DNI, email, telefono, password, rol) VALUES ("jose", "Almiron Lopez", "77552584B", "jose_016al@outlook.ocm", "674853860",  md5("211099"), 0);
INSERT INTO users(name, apellidos, DNI, email, telefono, password, rol) VALUES ("inma", "Almiron Lopez", "11111111A", "inma@outlook.ocm", "111111111",  md5("1234"), 1);

