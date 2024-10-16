-- Creacion de la base de datos
CREATE DATABASE IF NOT EXISTS db_tfphp CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;

-- Acceso a la base de datos
USE db_tfphp;

-- Creacion de la tabla users_data
CREATE TABLE IF NOT EXISTS users_data(
    idUser INT AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(45) NOT NULL,
    apellidos VARCHAR(45) NOT NULL,
    email  VARCHAR(60) UNIQUE NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    fnac DATE NOT NULL,
    direccion VARCHAR(90),
    sexo ENUM('Mujer', 'Hombre', 'Neutro'),
    PRIMARY KEY(idUser)
)ENGINE=INNODB;

-- Creacion de la tabla users_login
CREATE TABLE IF NOT EXISTS users_login(
    idLogin INT AUTO_INCREMENT NOT NULL,
    userslogin_idUser INT NOT NULL UNIQUE,
    usuario VARCHAR(45) NOT NULL UNIQUE,
    usuario_password VARCHAR(255) NOT NULL,
    rol ENUM('admin', 'user') NOT NULL,
    PRIMARY KEY(idLogin),
    FOREIGN KEY(userslogin_idUser) REFERENCES users_data(idUser)
)ENGINE=INNODB;

-- Creacion de la tabla citas
CREATE TABLE IF NOT EXISTS citas(
    idCita INT AUTO_INCREMENT NOT NULL,
    citas_idUser INT NOT NULL,
    fechaCita DATE NOT NULL,
    motivoCita VARCHAR(90),
    PRIMARY KEY(idCita),
    FOREIGN KEY(citas_idUser) REFERENCES users_data(idUser)
)ENGINE=INNODB;

-- Creacion de la tabla noticias
CREATE TABLE IF NOT EXISTS noticias(
    idNoticia INT AUTO_INCREMENT NOT NULL,
    titulo VARCHAR(45) NOT NULL UNIQUE,
    imagen VARCHAR(255) NOT NULL,
    texto VARCHAR(300) NOT NULL,
    fecha DATE NOT NULL,
    noticias_idUser INT NOT NULL,
    PRIMARY KEY(idNoticia),
    FOREIGN KEY(noticias_idUser) REFERENCES users_data(idUser)
)ENGINE=INNODB; 

-- Insert into --> 2 profiles creation
-- 1 usuario
-- 1 admin
-- 1 cita