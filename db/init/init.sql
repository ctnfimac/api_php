create database animales;

use animales;

create table mascota(
    id int NOT NULL AUTO_INCREMENT,
    nombre varchar(50) not null,
    PRIMARY KEY (id)
);

INSERT INTO mascota(nombre) values('Zahira');
INSERT INTO mascota(nombre) values('Sasha');
INSERT INTO mascota(nombre) values('Tokepi');
INSERT INTO mascota(nombre) values('Illidan');


/**/
CREATE DATABASE ctn_web;

USE ctn_web;

CREATE TABLE banner(
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(40) NOT NULL,
    subtitulo TINYTEXT NOT NULL,
    boton_text VARCHAR(30) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE servicio(
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(25) NOT NULL,
    descripcion TINYTEXT NOT NULL,
    icono VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE articulo(
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(60) NOT NULL,
    imagen_url VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE portfolio(
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(20) NOT NULL UNIQUE,
    descripcion VARCHAR(80),
    imagen_url VARCHAR(255) NOT NULL,
    web_url VARCHAR(255),
    PRIMARY KEY(id)
);

CREATE TABLE tecnologia(
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(40) NOT NULL UNIQUE,
    porcentaje TINYINT NOT NULL DEFAULT 0,
    PRIMARY KEY(id)
);


CREATE TABLE categoria(
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(22) NOT NULL UNIQUE,
    precio INT NOT NULL,
    responsive VARCHAR(1) NOT NULL DEFAULT 'f',
    red_social VARCHAR(1) NOT NULL DEFAULT 'f',
    formulario VARCHAR(1) NOT NULL DEFAULT 'f',
    imagenes TINYINT NOT NULL DEFAULT 12,
    secciones TINYINT NOT NULL DEFAULT 2,
    mails TINYINT NOT NULL DEFAULT 2,
    PRIMARY KEY(id)
);


CREATE TABLE contacto(
    id INT NOT NULL AUTO_INCREMENT,
    descripcion VARCHAR(50) NOT NULL UNIQUE,
    icono VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE red_social(
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(50) NOT NULL UNIQUE,
    icono VARCHAR(255) NOT NULL,
    web_url VARCHAR(255),
    PRIMARY KEY(id)
);