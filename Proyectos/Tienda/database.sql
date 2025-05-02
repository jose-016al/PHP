DROP DATABASE IF EXISTS store;
CREATE DATABASE store COLLATE utf8mb4_spanish_ci;
USE store;

CREATE TABLE users (
    id          INT(255) AUTO_INCREMENT NOT NULL,
    first_name  VARCHAR(100) NOT NULL,
    last_name   VARCHAR(255),
    email       VARCHAR(255) NOT NULL,
    password    VARCHAR(255) NOT NULL,
    role        VARCHAR(20),
    image       VARCHAR(255),
    status      INT NOT NULL,
    CONSTRAINT pk_users PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)  
);

INSERT INTO users VALUES (NULL, 'Admin', 'Admin', 'admin@example.com', '$2y$04$NLYTHgSTtbkTenJy.6eTVOUUQ5kaSaprND08BfIApb0z1tDsXDdVS', 'admin', NULL, 1);
INSERT INTO users VALUES (NULL, 'Jose', 'Almirón López', 'jose@example.com', '$2y$04$NLYTHgSTtbkTenJy.6eTVOUUQ5kaSaprND08BfIApb0z1tDsXDdVS', 'user', NULL, 1);

CREATE TABLE categories (
    id      INT(255) AUTO_INCREMENT NOT NULL,
    name    VARCHAR(100) NOT NULL,
    CONSTRAINT pk_categories PRIMARY KEY(id) 
);

INSERT INTO categories VALUES (NULL, 'Manga corta');
INSERT INTO categories VALUES (NULL, 'Tirantes');
INSERT INTO categories VALUES (NULL, 'Manga larga');
INSERT INTO categories VALUES (NULL, 'Sudaderas');

CREATE TABLE products (
    id              INT(255) AUTO_INCREMENT NOT NULL,
    category_id     INT(255) NOT NULL,
    name            VARCHAR(100) NOT NULL,
    description     TEXT,
    price          FLOAT(100,2) NOT NULL,
    stock           INT(255) NOT NULL,
    offer           VARCHAR(2),
    date_added      DATE NOT NULL,
    image          VARCHAR(255),
    CONSTRAINT pk_products PRIMARY KEY(id),
    CONSTRAINT fk_product_category FOREIGN KEY(category_id) REFERENCES categories(id)
);

INSERT INTO products (id, category_id, name, description, price, stock, offer, date_added, image) VALUES
(NULL, 1, 'Camiseta blanca básica', 'Camiseta de manga corta, 100% algodón.', 9.99, 50, NULL, '2025-03-12', 'camiseta_blanca.jpg'),
(NULL, 1, 'Camiseta estampada', 'Camiseta de manga corta con diseño moderno.', 14.99, 30, '10', '2025-03-12', 'camiseta_estampada.jpg'),
(NULL, 2, 'Top de tirantes negro', 'Top ajustado, ideal para verano.', 12.99, 40, NULL, '2025-03-12', 'top_negro.jpg'),
(NULL, 2, 'Top de tirantes con encaje', 'Top elegante con detalles en encaje.', 19.99, 25, '5', '2025-03-12', 'top_encaje.jpg'),
(NULL, 3, 'Camisa de manga larga azul', 'Camisa formal de manga larga.', 24.99, 20, NULL, '2025-03-12', 'camisa_azul.jpg'),
(NULL, 3, 'Camiseta térmica', 'Camiseta de manga larga térmica para invierno.', 17.99, 35, '15', '2025-03-12', 'camiseta_termica.jpg'),
(NULL, 4, 'Sudadera con capucha', 'Sudadera cómoda y abrigada con capucha.', 29.99, 40, NULL, '2025-03-12', 'sudadera_capucha.jpg'),
(NULL, 4, 'Sudadera oversize', 'Sudadera de estilo suelto y moderno.', 34.99, 30, '20', '2025-03-12', 'sudadera_oversize.jpg');

CREATE TABLE orders (
    id          INT(255) AUTO_INCREMENT NOT NULL,
    user_id     INT(255) NOT NULL,
    province    VARCHAR(100) NOT NULL,
    city        VARCHAR(100) NOT NULL,
    address     VARCHAR(255) NOT NULL,
    cost        FLOAT(200,2) NOT NULL,
    status      VARCHAR(20) NOT NULL,
    date_order  DATE,
    time_order  TIME,
    CONSTRAINT pk_orders PRIMARY KEY(id),
    CONSTRAINT fk_order_user FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE order_lines (
    id          INT(255) AUTO_INCREMENT NOT NULL,
    order_id    INT(255) NOT NULL,
    product_id  INT(255) NOT NULL,
    units       INT(255) NOT NULL,
    CONSTRAINT pk_order_lines PRIMARY KEY(id),
    CONSTRAINT fk_order_line FOREIGN KEY(order_id) REFERENCES orders(id),
    CONSTRAINT fk_order_product FOREIGN KEY(product_id) REFERENCES products(id)
);

CREATE TABLE carts (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    user_id     INT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO carts (user_id) VALUES (1), (2);

CREATE TABLE cart_items (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    cart_id     INT NOT NULL,
    product_id  INT NOT NULL,
    units       INT DEFAULT 1,
    FOREIGN KEY (cart_id) REFERENCES carts(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);
