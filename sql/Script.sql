DROP TABLE IF EXISTS Lugar_Pertenece_Estilo;
DROP TABLE IF EXISTS Lugar;
DROP TABLE IF EXISTS Usuario;
DROP PROCEDURE IF EXISTS SP_Registrarse;
DROP PROCEDURE IF EXISTS SP_Obtener_Informacion;
DROP PROCEDURE IF EXISTS SP_Iniciar_Sesion;
DROP PROCEDURE IF EXISTS SP_Asignar_Estilo;
DROP PROCEDURE IF EXISTS SP_Registrar_Lugar;

CREATE TABLE Lugar(dummy int);
ALTER TABLE Lugar ADD Id int NOT NULL AUTO_INCREMENT PRIMARY KEY;
ALTER TABLE Lugar ADD Nombre varchar(64) NOT NULL;
ALTER TABLE Lugar ADD Lat double;
ALTER TABLE Lugar ADD Lon double;
ALTER TABLE Lugar ADD Descripcion varchar(128);
ALTER TABLE Lugar DROP COLUMN dummy;

CREATE TABLE Lugar_Pertenece_Estilo(dummy int);
ALTER TABLE Lugar_Pertenece_Estilo ADD Id_Lugar int NOT NULL;
ALTER TABLE Lugar_Pertenece_Estilo ADD Senderos bit NOT NULL;
ALTER TABLE Lugar_Pertenece_Estilo ADD Comida_Vegetariana bit NOT NULL;
ALTER TABLE Lugar_Pertenece_Estilo ADD Guias_Turisticos bit NOT NULL;
ALTER TABLE Lugar_Pertenece_Estilo ADD Souvenirs bit NOT NULL;
ALTER TABLE Lugar_Pertenece_Estilo ADD Aire_Libre bit NOT NULL;
ALTER TABLE Lugar_Pertenece_Estilo ADD Zona_Deportiva bit NOT NULL;
ALTER TABLE Lugar_Pertenece_Estilo ADD Discapacitado bit;
ALTER TABLE Lugar_Pertenece_Estilo ADD Fumado bit;
ALTER TABLE Lugar_Pertenece_Estilo ADD Animales bit;
ALTER TABLE Lugar_Pertenece_Estilo ADD Nombre_Estilo varchar(64) NOT NULL;
ALTER TABLE Lugar_Pertenece_Estilo DROP COLUMN dummy;
ALTER TABLE Lugar_Pertenece_Estilo ADD CONSTRAINT FK_Id_lugar FOREIGN KEY (Id_Lugar) REFERENCES Lugar(Id);
ALTER TABLE Lugar_Pertenece_Estilo ADD CONSTRAINT PK_Lugar_Pertenece_Estilo PRIMARY KEY(Nombre_Estilo, Id_Lugar);
ALTER TABLE Lugar_Pertenece_Estilo ADD CONSTRAINT CK_Nombre_Estilo CHECK (Nombre_Estilo IN('Aventurero', 'Gastronomico', 'Historico', 'Relajacion'));

INSERT INTO Lugar_Pertenece_Estilo VALUES(1,1,0,0,0,1,1,0,1,1,'Relajacion');
INSERT INTO Lugar_Pertenece_Estilo VALUES(2,0,0,1,0,1,1,0,1,1,'Aventurero');
INSERT INTO Lugar_Pertenece_Estilo VALUES(3,1,0,0,0,1,1,0,1,1,'Relajacion');
INSERT INTO Lugar_Pertenece_Estilo VALUES(4,0,0,0,1,1,1,0,0,1,'Aventurero');
INSERT INTO Lugar_Pertenece_Estilo VALUES(5,0,0,1,1,1,0,0,0,1,'Aventurero');
INSERT INTO Lugar_Pertenece_Estilo VALUES(6,0,1,0,1,0,0,1,1,0,'Gastronomico');
INSERT INTO Lugar_Pertenece_Estilo VALUES(7,0,1,0,0,1,0,1,0,0,'Gastronomico');
INSERT INTO Lugar_Pertenece_Estilo VALUES(8,0,1,1,0,1,0,1,0,0,'Gastronomico');
INSERT INTO Lugar_Pertenece_Estilo VALUES(9,1,1,1,1,1,0,1,0,0,'Gastronomico');
INSERT INTO Lugar_Pertenece_Estilo VALUES(10,0,1,0,0,0,0,1,1,0,'Gastronomico');
INSERT INTO Lugar_Pertenece_Estilo VALUES(11,0,0,1,1,0,0,1,0,0,'Historico');
INSERT INTO Lugar_Pertenece_Estilo VALUES(12,0,0,1,1,0,0,1,0,0,'Historico');
INSERT INTO Lugar_Pertenece_Estilo VALUES(13,1,0,1,0,0,0,0,0,0,'Historico');
INSERT INTO Lugar_Pertenece_Estilo VALUES(14,0,0,1,1,0,0,1,1,0,'Historico');
INSERT INTO Lugar_Pertenece_Estilo VALUES(15,1,0,0,1,1,0,1,1,1,'Historico');

CREATE TABLE Usuario(dummy int);
ALTER TABLE Usuario ADD Id int NOT NULL AUTO_INCREMENT PRIMARY KEY;
ALTER TABLE Usuario ADD Login varchar(64) UNIQUE NOT NULL;
ALTER TABLE Usuario ADD Pass varchar(128) NOT NULL;
ALTER TABLE Usuario ADD Rol bit;

-- Usuario Admin
INSERT INTO Usuario(Login, Pass, Rol) VALUES('admin', 'admin', 1);

-- Playas
INSERT INTO Lugar (Nombre, Lat, Lon, Descripcion) VALUES('Bondi Beach', -33.890542, 151.274856, '');
INSERT INTO Lugar (Nombre, Lat, Lon, Descripcion) VALUES('Coogee Beach', -33.923036, 151.259052, 'Perfecto para observar el atardecer');
INSERT INTO Lugar (Nombre, Lat, Lon, Descripcion) VALUES('Cronulla Beach', -34.028249, 151.157507, 'Aguas tranquilas');
INSERT INTO Lugar (Nombre, Lat, Lon, Descripcion) VALUES('Manly Beach', -33.800101, 151.287478, 'Torneo de surf semanal');
INSERT INTO Lugar (Nombre, Lat, Lon, Descripcion) VALUES('Maroubra Beach', -33.950198, 151.259302, '');

-- Restaurantes
INSERT INTO Lugar (Nombre, Lat, Lon, Descripcion) VALUES('Gaundi Rest', -33.840542, 151.274856, 'Comida india');
INSERT INTO Lugar (Nombre, Lat, Lon, Descripcion) VALUES('Wagelia Rest', -34.023036, 151.219052, 'Comida costarricense');
INSERT INTO Lugar (Nombre, Lat, Lon, Descripcion) VALUES('Molof Rest', -34.028249, 151.127507, '');
INSERT INTO Lugar (Nombre, Lat, Lon, Descripcion) VALUES('Pantos Rest', -33.800101, 151.257478, 'Comida vegetariana');
INSERT INTO Lugar (Nombre, Lat, Lon, Descripcion) VALUES('Normas Rest', -33.920198, 151.257302, 'Comida mexicana');

-- Museos
INSERT INTO Lugar (Nombre, Lat, Lon, Descripcion) VALUES('Gold Museum', -33.890674, 151.179941, 'Se permite el accesso a mascotas para videntes');
INSERT INTO Lugar (Nombre, Lat, Lon, Descripcion) VALUES('Jade Museum', -33.874441, 151.180266, 'Entrada gratis a menores de 5 annos');
INSERT INTO Lugar (Nombre, Lat, Lon, Descripcion) VALUES('War Museum', -33.897015, 151.194429, '');
INSERT INTO Lugar (Nombre, Lat, Lon, Descripcion) VALUES('Peace Museum', -33.912707, 151.163916, 'Abierto 24 horas los fines de semana');
INSERT INTO Lugar (Nombre, Lat, Lon, Descripcion) VALUES('Art Museum', -33.871986, 151.197137, '');

-- Ingresar un nuevo lugar
DELIMITER $$

CREATE PROCEDURE SP_Registrar_Lugar(IN Nombre_ varchar(64), IN Lat_ double, IN Lon_ double, IN Descripcion_ varchar(128))
BEGIN
	INSERT INTO Lugar (Nombre, Lat, Lon, Descripcion) 
	VALUES (Nombre_, Lat_, Lon_, Descripcion_);
END $$

DELIMITER ;


-- Asignar Estilo
DELIMITER $$

CREATE PROCEDURE SP_Asignar_Estilo(IN Id_Lugar_ int, IN Senderos_ bit, IN Comida_Vegetariana_ bit, IN Guias_Turisticos_ bit, IN Souvenirs_ bit, IN Aire_Libre_ bit, IN Zona_Deportiva_ bit, IN Discapacitado_ bit, IN Fumado_ bit, IN Animales_ bit, IN Nombre_Estilo_ varchar(64))
BEGIN
	INSERT INTO Lugar_Pertenece_Estilo(Id_Lugar, Senderos, Comida_Vegetariana, Guias_Turisticos, Souvenirs, Aire_Libre, Zona_Deportiva, Discapacitado, Fumado, Animales, Nombre_Estilo)
	VALUES (Id_Lugar_, Senderos_, Comida_Vegetariana_, Guias_Turisticos_, Souvenirs_, Aire_libre_, Zona_Deportiva_, Discapacitado_, Fumado_, Animales_,  Nombre_Estilo_);
END $$

DELIMITER ;

-- Registrarse
DELIMITER $$

CREATE PROCEDURE SP_Registrarse(IN Login_ varchar(64), IN Pass_ varchar(128))
BEGIN
	INSERT INTO Usuario(Login, Pass, Rol) VALUES (Login_, Pass_, 0);
END $$

DELIMITER ;

-- Iniciar Sesion
DELIMITER $$

CREATE PROCEDURE SP_Iniciar_Sesion(IN Login_ varchar(64), IN Pass_ varchar(128))
BEGIN
	SELECT Id FROM Usuario WHERE Login = Login_ AND Pass = Pass_; 
END $$

DELIMITER ;

-- Obtener un sitio en especifico
DELIMITER $$

CREATE PROCEDURE SP_Obtener_Informacion(IN Id_ int)
BEGIN
	SELECT * FROM Lugar WHERE Id_ = Id; 
END $$

DELIMITER ;

-- Obtener un sitio en especifico
DELIMITER $$

CREATE PROCEDURE SP_Obtener_Informacion_Total()
BEGIN
	SELECT * FROM Lugar;
END $$

DELIMITER ;