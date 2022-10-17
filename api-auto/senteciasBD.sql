-- Creamos la BD
-- CREATE DATABASE nombreBD;
CREATE DATABASE ejemplo_rest_api;

-- Seleccionamos la BD creada;
USE  ejemplo_rest_api;

-- Creamos la tabla a utilizar en el ejemplo: usuario
CREATE TABLE `usuario` (
  `login` varchar(20)  NOT NULL ,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sin nombre',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no email',
  `pass` varchar(100) NOT NULL DEFAULT '1234',
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Ingresamos algunos datos de prueba
INSERT INTO `usuario` (`login`,`pass`,`nombre`,`email`) VALUES
('YoEl','1234','Yo','yo@mail.com'),('Elsa','1234','Elsa Pato','epato@mail.com'),('noc' ,'1234', 'No Se','noc@mail.com');
