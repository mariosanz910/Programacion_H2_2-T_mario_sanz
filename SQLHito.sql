-- Primero creamos nuestra base de datos
DROP DATABASE IF EXISTS gestor_tareas;
CREATE DATABASE gestor_tareas;
USE gestor_tareas;

-- Tabla para guardar los usuarios
CREATE TABLE usuarios (
    id INT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla para guardar las tareas
CREATE TABLE tareas (
    id_tarea INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    descripcion TEXT,
    estado ENUM('pendiente', 'completada') DEFAULT 'pendiente',
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

-- Insertar usuarios
INSERT INTO usuarios (id, nombre_usuario, correo, contrasena) VALUES
(99999999, 'juanperez', 'juan.perez@email.com', 'contraseña123'),
(88888888, 'maria123', 'maria.lopez@email.com', 'segura456'),
(77777777, 'carlos_dev', 'carlos.dev@email.com', 'clave789');

-- Insertar tareas asociadas a los usuarios
INSERT INTO tareas (id_usuario, titulo, descripcion, estado) VALUES
(99999999, 'Comprar víveres', 'Comprar leche, pan y huevos en el supermercado', 'pendiente'),
(99999999, 'Preparar presentación', 'Hacer diapositivas para la reunión del viernes', 'pendiente'),
(88888888, 'Enviar informe', 'Enviar el informe mensual a la gerencia', 'completada'),
(88888888, 'Hacer ejercicio', 'Correr 5 km en el parque', 'pendiente'),
(77777777, 'Aprender SQL', 'Revisar curso de SQL en línea', 'completada');

-- SELECT id FROM usuarios WHERE id = 77777777 AND contrasena = "clave789";

SELECT * FROM usuarios;
SELECT * FROM tareas;
