CREATE TABLE usuarios(
    id          int(255) auto_increment not null,
    nombre      varchar(100) not null,
    apellidos   varchar(100) not null,
    email       varchar(255) not null,
    password    varchar(255) not null,
    fecha       date not null,
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

CREATE TABLE categorias(
    id      int(255) auto_increment not null,
    nombre  varchar(100),
    CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE entradas(
    id              int(255) auto_increment not null,
    usuario_id      int(255) not null,
    categoria_id    int(255) not null,
    titulo          varchar(255) not null,
    descripcion     MEDIUMTEXT,
    fecha           date not null,
    CONSTRAINT pk_entradas PRIMARY KEY(id),
    CONSTRAINT fk_entrada_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
    CONSTRAINT fk_entrada_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id) ON DELETE NO ACTION
)ENGINE=InnoDb;

-- Inserciones en la tabla usuarios
INSERT INTO usuarios (nombre, apellidos, email, password, fecha) VALUES
('Juan', 'Pérez', 'user1@example.com', '$2y$04$AMkeeuz6ZOGOCasyJLm4wOdAdz7aYPu.n/QJ4oCFMD48ij5BLsegi', '2025-02-01'),
('Ana', 'Gómez', 'user2@example.com', '$2y$04$AMkeeuz6ZOGOCasyJLm4wOdAdz7aYPu.n/QJ4oCFMD48ij5BLsegi', '2025-02-02'),
('Carlos', 'López', 'user3@example.com', '$2y$04$AMkeeuz6ZOGOCasyJLm4wOdAdz7aYPu.n/QJ4oCFMD48ij5BLsegi', '2025-02-03');

-- Inserciones en la tabla categorias
INSERT INTO categorias (nombre) VALUES
('Tecnología'),
('Salud'),
('Deportes');

-- Inserciones en la tabla entradas
INSERT INTO entradas (usuario_id, categoria_id, titulo, descripcion, fecha) VALUES
(1, 1, 'Nuevo avance en IA', 'Descripción sobre inteligencia artificial.', '2025-02-10'),
(2, 2, 'Beneficios de la meditación', 'Cómo la meditación mejora la salud mental.', '2025-02-11'),
(3, 3, 'Resultados de la última jornada', 'Resumen de los partidos de fútbol.', '2025-02-12');
