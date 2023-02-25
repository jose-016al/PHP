DROP DATABASE IF EXISTS tienda;

CREATE DATABASE tienda COLLATE utf8mb4_spanish_ci;

USE tienda;

CREATE TABLE users (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    user VARCHAR(25) NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol INT NOT NULL,
    carrito INT NOT NULL
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descripcion TEXT NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    precio INT NOT NULL,
    cantidad INT NOT NULL,
    mostrar INT NOT NULL
);


CREATE TABLE pedidos (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    id_user INT NOT NULL,
    id_producto INT NOT NULL,
    cantidadProductos INT NOT NULL,
    totalPrecio INT NOT NULL, 
    FOREIGN KEY (id_user) REFERENCES users(id),
    FOREIGN KEY (id_producto) REFERENCES productos(id)
);
CREATE TABLE carrito (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    user INT NOT NULL
    pedidos INT NOT NULL,
    total INT,
    fecha DATETIME,
    estado INT NOT NULL,
    FOREIGN KEY (user) REFERENCES users(id),
    FOREIGN KEY (pedidos) REFERENCES pedidos(id)
);

    -- usuarios----------
INSERT INTO users(user, password, rol) VALUES ("jose_016al", md5("211099"), 0);
INSERT INTO users(user, password, rol) VALUES ("inma", md5("1234"), 1);
INSERT INTO users(user, password, rol) VALUES ("alberto", md5("1234"), 1);
INSERT INTO users(user, password, rol) VALUES ("daulin", md5("1234"), 1);

    -- productos----------
INSERT INTO productos(nombre, descripcion, imagen, precio, cantidad, mostrar) VALUES ("", "", "", 0, 0, 0);
INSERT INTO productos(nombre, descripcion, imagen, precio, cantidad, mostrar) VALUES ("Producto 1", "descripcion", "zapato1.jpg", 15, 40, 1);
INSERT INTO productos(nombre, descripcion, imagen, precio, cantidad, mostrar) VALUES ("Producto 2", "descripcion", "zapato1.jpg", 15, 40, 1);
INSERT INTO productos(nombre, descripcion, imagen, precio, cantidad, mostrar) VALUES ("Producto 3", "descripcion", "zapato1.jpg", 15, 40, 1);
INSERT INTO productos(nombre, descripcion, imagen, precio, cantidad, mostrar) VALUES ("Producto 4", "descripcion", "zapato1.jpg", 15, 40, 1);
INSERT INTO productos(nombre, descripcion, imagen, precio, cantidad, mostrar) VALUES ("Producto 5", "descripcion", "zapato1.jpg", 15, 40, 1);
INSERT INTO productos(nombre, descripcion, imagen, precio, cantidad, mostrar) VALUES ("Producto 6", "descripcion", "zapato1.jpg", 15, 40, 1);

    -- pedidos----------
INSERT INTO pedidos(id_user, id_producto, cantidadProductos, totalPrecio) VALUES (1, 1, 0, 0);

    -- carrito----------
INSERT INTO carrito(pedidos, estado) VALUES ((SELECT id FROM pedidos WHERE id_user = 1), 0);