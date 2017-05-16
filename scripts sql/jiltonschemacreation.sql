CREATE DATABASE `jilton` /*!40100 DEFAULT CHARACTER SET latin1 */;


CREATE TABLE `jilton_class` (
  `idClass` int(11) NOT NULL AUTO_INCREMENT,
  `roomClass` varchar(45) DEFAULT NULL,
  `priceMulti` float NOT NULL DEFAULT '1',
  PRIMARY KEY (`idClass`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

CREATE TABLE `jilton_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `DNI` varchar(45) DEFAULT NULL,
  `passaporte` varchar(45) DEFAULT NULL,
  `tarjeta` varchar(45) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Clientes de los hoteles jilton	';

CREATE TABLE `jilton_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `estrellas` int(11) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  `fCreacion` datetime DEFAULT NULL,
  `fModificacion` datetime DEFAULT NULL,
  `fBorrado` datetime DEFAULT NULL,
  `hotelPic` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COMMENT='Tabla de hoteles.';


CREATE TABLE `jilton_plantas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numeroPlanta` int(11) DEFAULT NULL,
  `activa` int(11) DEFAULT NULL,
  `idHotel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_JILTON_PLANTAS_JILTON_HOTEL` (`idHotel`),
  CONSTRAINT `fk_JILTON_PLANTAS_JILTON_HOTEL` FOREIGN KEY (`idHotel`) REFERENCES `jilton_hotel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1 COMMENT='Plantas del hotel.';

CREATE TABLE `jilton_rooms` (
  `id` int(18) NOT NULL AUTO_INCREMENT,
  `numeroRoom` int(11) NOT NULL,
  `activa` int(11) DEFAULT '1',
  `fCreacion` datetime DEFAULT NULL,
  `fModificacion` datetime DEFAULT NULL,
  `fBorrado` datetime DEFAULT NULL,
  `idHotel` int(11) NOT NULL,
  `numeroPlanta` int(11) NOT NULL,
  `roomPic` varchar(300) DEFAULT NULL,
  `idClass` int(11) NOT NULL,
  `precioNoche` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_jilton_rooms_jilton_hotel1_idx` (`idHotel`),
  KEY `fk_jilton_rooms_jilton_plantas1_idx` (`numeroPlanta`),
  KEY `fk_jilton_rooms_jilton_class1_idx` (`idClass`),
  CONSTRAINT `fk_jilton_rooms_jilton_class1` FOREIGN KEY (`idClass`) REFERENCES `jilton_class` (`idClass`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_jilton_rooms_jilton_hotel1` FOREIGN KEY (`idHotel`) REFERENCES `jilton_hotel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_jilton_rooms_jilton_plantas1` FOREIGN KEY (`numeroPlanta`) REFERENCES `jilton_plantas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 COMMENT='Habitaciones del hotel';
INSERT INTO `jilton_class` (`idClass`,`roomClass`,`priceMulti`) VALUES (22,'test',1);

CREATE TABLE `jilton_ocupaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fEntrada` datetime NOT NULL,
  `fSalida` datetime DEFAULT NULL,
  `fCreacion` datetime DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  `idRoom` int(18) NOT NULL,
  `precioNoche` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_JILTON_OCUPACIONES_JILTON_CLIENTES1_idx` (`idCliente`),
  KEY `fk_jilton_ocupaciones_jilton_rooms1_idx` (`idRoom`),
  CONSTRAINT `fk_JILTON_OCUPACIONES_JILTON_CLIENTES1` FOREIGN KEY (`idCliente`) REFERENCES `jilton_clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_jilton_ocupaciones_jilton_rooms1` FOREIGN KEY (`idRoom`) REFERENCES `jilton_rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Ocupaciones por planta';
