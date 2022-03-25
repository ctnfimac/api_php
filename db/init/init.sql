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