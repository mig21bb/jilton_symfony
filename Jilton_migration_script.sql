-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: jilton
-- Source Schemata: jilton
-- Created: Tue Oct 17 13:13:17 2017
-- Workbench Version: 6.3.6
-- ----------------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------------------------------------------------------
-- Schema jilton
-- ----------------------------------------------------------------------------
DROP SCHEMA IF EXISTS `jilton` ;
CREATE SCHEMA IF NOT EXISTS `jilton` ;

-- ----------------------------------------------------------------------------
-- Table jilton.jilton_class
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `jilton`.`jilton_class` (
  `idClass` INT(11) NOT NULL AUTO_INCREMENT,
  `roomClass` VARCHAR(45) NULL DEFAULT NULL,
  `priceMulti` FLOAT NOT NULL DEFAULT '1',
  `defaultPic` VARCHAR(300) NULL DEFAULT NULL,
  PRIMARY KEY (`idClass`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table jilton.jilton_clientes
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `jilton`.`jilton_clientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `apellido` VARCHAR(45) NULL DEFAULT NULL,
  `DNI` VARCHAR(45) NULL DEFAULT NULL,
  `passaporte` VARCHAR(45) NULL DEFAULT NULL,
  `tarjeta` VARCHAR(45) NULL DEFAULT NULL,
  `edad` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1
COMMENT = 'Clientes de los hoteles jilton	';

-- ----------------------------------------------------------------------------
-- Table jilton.jilton_hotel
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `jilton`.`jilton_hotel` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `ubicacion` VARCHAR(45) NULL DEFAULT NULL,
  `estrellas` INT(11) NULL DEFAULT NULL,
  `activo` TINYINT(1) NOT NULL DEFAULT '1',
  `fCreacion` DATETIME NULL DEFAULT NULL,
  `fModificacion` DATETIME NULL DEFAULT NULL,
  `fBorrado` DATETIME NULL DEFAULT NULL,
  `hotelPic` VARCHAR(300) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 26
DEFAULT CHARACTER SET = latin1
COMMENT = 'Tabla de hoteles.';

-- ----------------------------------------------------------------------------
-- Table jilton.jilton_ocupaciones
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `jilton`.`jilton_ocupaciones` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fEntrada` DATETIME NOT NULL,
  `fSalida` DATETIME NULL DEFAULT NULL,
  `fCreacion` DATETIME NULL DEFAULT NULL,
  `activa` TINYINT(1) NOT NULL DEFAULT '1',
  `idCliente` INT(11) NOT NULL,
  `idRoom` INT(18) NOT NULL,
  `precioNoche` FLOAT NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  INDEX `fk_JILTON_OCUPACIONES_JILTON_CLIENTES1_idx` (`idCliente` ASC),
  INDEX `fk_jilton_ocupaciones_jilton_rooms1_idx` (`idRoom` ASC),
  CONSTRAINT `fk_JILTON_OCUPACIONES_JILTON_CLIENTES1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `jilton`.`jilton_clientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jilton_ocupaciones_jilton_rooms1`
    FOREIGN KEY (`idRoom`)
    REFERENCES `jilton`.`jilton_rooms` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1
COMMENT = 'Ocupaciones por planta';

-- ----------------------------------------------------------------------------
-- Table jilton.jilton_plantas
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `jilton`.`jilton_plantas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `numeroPlanta` INT(11) NULL DEFAULT NULL,
  `activa` TINYINT(1) NOT NULL DEFAULT '1',
  `idHotel` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_JILTON_PLANTAS_JILTON_HOTEL` (`idHotel` ASC),
  CONSTRAINT `fk_JILTON_PLANTAS_JILTON_HOTEL`
    FOREIGN KEY (`idHotel`)
    REFERENCES `jilton`.`jilton_hotel` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 158
DEFAULT CHARACTER SET = latin1
COMMENT = 'Plantas del hotel.';

-- ----------------------------------------------------------------------------
-- Table jilton.jilton_rooms
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `jilton`.`jilton_rooms` (
  `id` INT(18) NOT NULL AUTO_INCREMENT,
  `numeroRoom` INT(11) NOT NULL,
  `activa` TINYINT(1) NOT NULL DEFAULT '1',
  `fCreacion` DATETIME NULL DEFAULT NULL,
  `fModificacion` DATETIME NULL DEFAULT NULL,
  `fBorrado` DATETIME NULL DEFAULT NULL,
  `idHotel` INT(11) NOT NULL,
  `numeroPlanta` INT(11) NOT NULL,
  `roomPic` VARCHAR(300) NULL DEFAULT NULL,
  `idClass` INT(11) NOT NULL,
  `precioNoche` FLOAT NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  INDEX `fk_jilton_rooms_jilton_hotel1_idx` (`idHotel` ASC),
  INDEX `fk_jilton_rooms_jilton_plantas1_idx` (`numeroPlanta` ASC),
  INDEX `fk_jilton_rooms_jilton_class1_idx` (`idClass` ASC),
  CONSTRAINT `fk_jilton_rooms_jilton_class1`
    FOREIGN KEY (`idClass`)
    REFERENCES `jilton`.`jilton_class` (`idClass`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_jilton_rooms_jilton_hotel1`
    FOREIGN KEY (`idHotel`)
    REFERENCES `jilton`.`jilton_hotel` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_jilton_rooms_jilton_plantas1`
    FOREIGN KEY (`numeroPlanta`)
    REFERENCES `jilton`.`jilton_plantas` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1041
DEFAULT CHARACTER SET = latin1
COMMENT = 'Habitaciones del hotel';
SET FOREIGN_KEY_CHECKS = 1;
