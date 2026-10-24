-- Script de creación de Base de Datos y Tabla Recetas
-- Base de Datos
CREATE DATABASE IF NOT EXISTS arq_2026;
USE arq_2026;

-- Tabla Recetas
CREATE TABLE IF NOT EXISTS recetas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    ingredientes TEXT NOT NULL,
    tiempoPreparacion INT NOT NULL,
    porciones INT NOT NULL,
    dificultad VARCHAR(50) NOT NULL,
    calorias INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Datos de ejemplo (opcional)
INSERT INTO recetas (nombre, ingredientes, tiempoPreparacion, porciones, dificultad, calorias) VALUES
('Jugo de Tomate frio', 'Tomates, cebolla, ajo, caldo', 30, 6, 'Fácil', 150),
('Pizza conmigo', 'anchoas, muzzarella, palmitos, jardinera', 45, 8, 'Fácil', 300),
('Sopa de caracol', 'Si, tu, quieres, bailar', 20, 4, 'Media', 250),
('Guacamole', 'Cuchufrito, habichuela, hot tamale, trucha al escabeche', 25, 4, 'Difícil', 400);
