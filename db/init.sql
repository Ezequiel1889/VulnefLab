CREATE TABLE usuarios (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(30) NOT NULL,
    password VARCHAR(50) NOT NULL,
    puesto VARCHAR(30) NOT NULL
);

-- Usuarios para practicar Fuerza Bruta o SQLi
INSERT INTO usuarios (usuario, password, puesto) VALUES ('admin', 'p4ssw0rd123', 'Administrador');
INSERT INTO usuarios (usuario, password, puesto) VALUES ('ezequiel', 'pentester2026', 'Security Expert');