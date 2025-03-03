CREATE DATABASE prueba_tecnica;

use prueba_tecnica;

CREATE TABLE areas(
    id      INT PRIMARY KEY AUTO_INCREMENT,
    nombre  VARCHAR(255) NOT NULL
)engine=InnoDB;

CREATE TABLE roles(
    id      INT PRIMARY KEY AUTO_INCREMENT,
    nombre  VARCHAR(255) NOT NULL
)engine=InnoDB;

CREATE TABLE empleados(
    id      INT PRIMARY KEY AUTO_INCREMENT,
    nombre  VARCHAR(255) NOT NULL,
    email   VARCHAR(255) NOT NULL,
    sexo CHAR(1) NOT NULL,
    area_id INT NOT NULL,
    boletin INT NOT NULL,
    descripcion TEXT NOT NULL 
) engine=InnoDB;

CREATE TABLE empleado_rol(
    empleado_id INT PRIMARY KEY AUTO_INCREMENT,
    rol_id  INT NOT NULL
)engine=InnoDB;

INSERT INTO areas (nombre) VALUES ('Dirección General');
INSERT INTO areas (nombre) VALUES ('Recursos Humanos');
INSERT INTO areas (nombre) VALUES ('Finanzas');
INSERT INTO areas (nombre) VALUES ('Contabilidad');
INSERT INTO areas (nombre) VALUES ('Marketing');
INSERT INTO areas (nombre) VALUES ('Ventas');
INSERT INTO areas (nombre) VALUES ('Operaciones');
INSERT INTO areas (nombre) VALUES ('Tecnologías de la Información');
INSERT INTO areas (nombre) VALUES ('Atención al Cliente');
INSERT INTO areas (nombre) VALUES ('Investigación y Desarrollo');
INSERT INTO areas (nombre) VALUES ('Legal');
INSERT INTO areas (nombre) VALUES ('Logística');
INSERT INTO areas (nombre) VALUES ('Compras');
INSERT INTO areas (nombre) VALUES ('Comunicación Corporativa');
INSERT INTO areas (nombre) VALUES ('Calidad');





INSERT INTO roles (nombre) VALUES ('Director General');
INSERT INTO roles (nombre) VALUES ('Gerente de Recursos Humanos');
INSERT INTO roles (nombre) VALUES ('Contador');
INSERT INTO roles (nombre) VALUES ('Analista Financiero');
INSERT INTO roles (nombre) VALUES ('Jefe de Marketing');
INSERT INTO roles (nombre) VALUES ('Ejecutivo de Ventas');
INSERT INTO roles (nombre) VALUES ('Coordinador de Operaciones');
INSERT INTO roles (nombre) VALUES ('Desarrollador de Software');
INSERT INTO roles (nombre) VALUES ('Especialista en Atención al Cliente');
INSERT INTO roles (nombre) VALUES ('Ingeniero de Investigación y Desarrollo');
INSERT INTO roles (nombre) VALUES ('Abogado Corporativo');
INSERT INTO roles (nombre) VALUES ('Jefe de Logística');
INSERT INTO roles (nombre) VALUES ('Comprador');
INSERT INTO roles (nombre) VALUES ('Responsable de Comunicación Corporativa');
INSERT INTO roles (nombre) VALUES ('Coordinador de Calidad');
