-- CREATE DATABASE ctn_web CHARACTER SET latin1 COLLATE latin1_swedish_ci;
CREATE DATABASE ctn_web CHARACTER SET utf8 COLLATE utf8_general_ci;

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
    titulo VARCHAR(30) NOT NULL,
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
    -- mails TINYINT NOT NULL DEFAULT 2,
    PRIMARY KEY(id)
);


CREATE TABLE contacto(
    id INT NOT NULL AUTO_INCREMENT,
    descripcion VARCHAR(50) NOT NULL UNIQUE,
    icono VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE redsocial(
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(50) NOT NULL UNIQUE,
    icono VARCHAR(255) NOT NULL,
    web_url VARCHAR(255),
    PRIMARY KEY(id)
);


INSERT INTO banner(titulo,subtitulo,boton_text)
VALUES('DISEÑO Y DESARROLLO DE SITIOS WEB','¿Estás buscando rediseñar tú página web o hacer una desde cero?','Mirar precios y categorias');

INSERT INTO servicio(titulo,descripcion,icono)
VALUES('Diseño Web','Diseño y Maqueto el sitio web que necesitas, con las tecnologías que mejor se acoplen a tu proyecto, adaptados a todos los dispositivos.','icon-disenio'),
('Dominios','Registro de dominios .com / .com.ar / .org y otros más','icon-www'),
('Paneles de Administración','Desarrollo Paneles de Administración para que con un simple usuario y contraseña puedas modificar diversos contenidos de tu sitio Web.','icon-panel'),
('Hosting','Distintos servicios de hosting que se adaptan a las necesidades de tu proyecto, permitiendo almacenar información, imágenes, videos o cualquier contenido accesible via web','icon-dominio');


INSERT INTO articulo(titulo, imagen_url)
VALUES('Sitios Web Adaptables a Todos los Dispositivos','img/home/adaptable_imagen.png');

INSERT INTO portfolio(titulo, descripcion, imagen_url, web_url)
VALUES('NO VIOLENCIA BS','Fundación de la no violencia en buenos aires','img/portfolio/1.jpg','http://noviolenciabuenosaires.christianperalta.com'),
('RPSCONSULTORA','Estudio profesional de Contadores','img/portfolio/2.jpg','http://rpsconsultora.com.ar/'),
('UNION LOGISTIC','Maquetación realizada para claseAcreativos','img/portfolio/6.jpg','http://unionlogistic.com.ar/'),
('CONAUT','Proyecto realizado en la unLam','img/portfolio/3.jpg','http://christianperalta.com/bootstrap_conaut/'),
('SIPRO','Empresa dedicada al desarrollo de productos de higiene institucional','img/portfolio/4.jpg','http://sipro.com.ar/');

INSERT INTO tecnologia(nombre, porcentaje)
VALUES('html',85),
('css',90),
('javascript',75),
('bootstrap',70),
('mysql',60),
('java',80),
('php',70),
('spring',65),
('hibernate',65);

INSERT INTO categoria(titulo, precio, responsive, red_social, formulario, imagenes, secciones)
VALUES ('Básica', 150, 't', 't', 't', 12, 2),
('Media', 150, 't', 't', 't', 26, 3),
('Avanzada', 150, 't', 't', 't', 40, 5),
('Diseño Personalizado', 0, 't', 't', 't', 100, 0);


INSERT INTO contacto(descripcion, icono)
VALUES('info@christianperalta.com','icon-correo'),
('Buenos Aires, Argentina','icon-ubicacion'),
('1561870920','icon-whatsapp');


INSERT INTO redsocial(titulo, icono, web_url)
VALUES('linkedin', 'icon-linkedin','https://www.linkedin.com/in/christianperalta87'),
('github','icon-github','https://github.com/ctnfimac');



-- Para la api de transporte
CREATE TABLE usuario
(
    id integer NOT NULL,
    nombre character varying(50),
    direccion character varying(250),
    latitud double precision,
    longitud double precision
);

CREATE TABLE administrador
(
    id SERIAL PRIMARY KEY,
    nombre character varying(50),
    contraseña character varying(50)
);

ALTER TABLE usuario ADD COLUMN barrio varchar(50);
ALTER TABLE usuario ADD COLUMN comuna varchar(50);


INSERT INTO administrador(nombre, contraseña)
VALUES('Christian', '123456');

ALTER TABLE usuario MODIFY id INTEGER PRIMARY KEY AUTO_INCREMENT;