create database animales;

use animales;

create table mascota(
    id integer primary key not null,
    nombre varchar(50) not null
);

INSERT INTO mascota values(1, 'Zahira');
INSERT INTO mascota values(2, 'Sasha');
INSERT INTO mascota values(3, 'Tokepi');
INSERT INTO mascota values(4, 'Illidan');