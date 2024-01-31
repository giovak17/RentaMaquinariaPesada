-- SQLBook: Code
#rentaMachine



create table ciudades(
	codigo varchar(20)primary key,
	nombre varchar(30)
	);

	
INSERT INTO `ciudades` (`codigo`, `nombre`) VALUES
('TIJ', 'Tijuana');


create table almacenes (
	codigo varchar(50) primary key,
	nombre varchar(30) unique,
	numTel varchar(15),
	colonia varchar(30), 
	cp varchar(6),
	num int,
	calle varchar(40),
	ciudad varchar(20),
	FOREIGN KEY (ciudad) REFERENCES ciudades(codigo)
		);

		
INSERT INTO `almacenes` (`codigo`, `nombre`, `numTel`, `colonia`, `cp`, `num`, `calle`, `ciudad`) VALUES
('ALV', 'Alvarez', '6641899448', 'Mariano Sur', '22321', 9408, 'Vicente Guerrero', 'TIJ');

create table maquinas(
	codigo int primary key auto_increment,
	numSerie varchar(60) unique,
	almacen varchar(50), 
	modelo varchar(50),
	FOREIGN KEY (almacen) REFERENCES almacenes(codigo),
	FOREIGN KEY (modelo) REFERENCES modelos(numModelo)
	);

INSERT INTO `maquinas` (`codigo`, `numSerie`, `almacen`, `modelo`) VALUES
(1, 'sfsafsadfs54545', 'ALV', 'F150'),
(6, 'fdsdf', 'ALV', '454'),
(7, '', 'ALV', '454'),
(11, 'safdsafsafsafsafsafsafdsafdsafsdaf', 'ALV', '454'),
(14, '12121212121212121212121212', 'ALV', '454'),
(15, '1333333', 'ALV', '454'),
(18, 'fdsdf78778787', 'ALV', '454'),
(24, '12321321313213', 'ALV', '454'),
(25, '53535353453454325432566', 'ALV', '454');


create table modelos(
	numModelo varchar(50) primary key,
	anoFabricacion int,
	capacidadCarga varchar(50),
	nombreModelo varchar(30),
	descripcion varchar(80),
	foto varchar(50),
	precioDia float,
	marca  varchar(20),
	FOREIGN KEY (marca) REFERENCES Marcas(codigo)
	); 

	INSERT INTO `modelos` (`numModelo`, `anoFabricacion`, `capacidadCarga`, `nombreModelo`, `descripcion`, `foto`, `precioDia`, `marca`) VALUES
('454', 2021, '155555', 'baja', 'esta bien nalgona', '2', 1500, 'MOPAR'),
('F150', 2005, '1500', 'sfsafsafsaf', 'esta bien mamalona', '1', 1500, 'MOPAR');

create table Marcas(
	codigo varchar(20) primary key,
	nombreMarca varchar(50) unique
	);

	INSERT INTO `marcas` (`codigo`, `nombreMarca`) VALUES
('MOPAR', 'Chrysler');


