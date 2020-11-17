/*Creación de la base de datos*/
CREATE DATABASE IF NOT EXISTS `discografica`;

/*Asignación en la base de datos*/
USE `discografica`;

/*Estructura de la tabla GRABACIONES*/
CREATE TABLE grabaciones(
    -> id_grabacion INT(10) NOT NULL,
    -> titulo VARCHAR(50) NOT NULL,
    -> categoria VARCHAR(50) NOT NULL,
    -> estado VARCHAR(50) NOT NULL);
);

/*Primary key de la tabla GRABACIONES*/
ALTER TABLE grabaciones
    -> ADD PRIMARY KEY(id_grabacion);

/*Datos de la tabla GRABACIONES*/
INSERT INTO grabaciones(id_grabacion, titulo, categoria, estado) VALUES
    -> (1, "Highway to Hell", "Rock", "Bueno"),
    -> (2, "Whole Lotta Rosie", "Rock", "Malo"),
    -> (3, "Scotland", "Indie", "Regular"),
    -> (5, "Enter Sandman", "Heavy Metal", "Bueno"),
    -> (6, "Wiskey in the Jar", "Heavy Metal", "Malo"),
    -> (7, "Divenire", "Piano", "Regular"),
    -> (8, "Jonny B Goode", "Blues", "Bueno"),
    -> (9, "Master of Puppets", "Heavy Metal", "Malo"),
    -> (10, "Conpenhague", "Indie", "Regular");




