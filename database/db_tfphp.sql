-- Creacion de la base de datos
CREATE DATABASE IF NOT EXISTS db_tfphp CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;

-- Acceso a la base de datos
USE db_tfphp;

-- Creacion de la tabla users_data
CREATE TABLE IF NOT EXISTS users_data(
    idUser INT UNSIGNED AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(45) NOT NULL,
    apellidos VARCHAR(45) NOT NULL,
    email  VARCHAR(60) UNIQUE NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    fnac DATE NOT NULL,
    direccion VARCHAR(90),
    sexo VARCHAR(15),
    PRIMARY KEY(idUser)
)ENGINE=INNODB;
