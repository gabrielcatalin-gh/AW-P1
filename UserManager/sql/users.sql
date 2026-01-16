-- Crear base de datos
CREATE DATABASE IF NOT EXISTS usermanager
CHARACTER SET utf8
COLLATE utf8_general_ci;

-- Usar la base de datos
USE usermanager;

-- Crear tabla de usuarios
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(80) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol ENUM('admin','user') DEFAULT 'user',
    edad INT NOT NULL
);

