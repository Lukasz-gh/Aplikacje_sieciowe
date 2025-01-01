-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema pipingDB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pipingDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pipingDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci ;
USE `pipingDB` ;

-- -----------------------------------------------------
-- Table `pipingDB`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pipingDB`.`roles` (
  `idroles` INT NOT NULL AUTO_INCREMENT,
  `roles` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`idroles`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pipingDB`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pipingDB`.`users` (
  `idusers` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(10) NOT NULL,
  `password` VARCHAR(10) NOT NULL,
  `active` INT NOT NULL,
  `idroles` INT NOT NULL,
  PRIMARY KEY (`idusers`),
  INDEX `fk_users_roles_idx` (`idroles` ASC) VISIBLE,
  CONSTRAINT `fk_users_roles`
    FOREIGN KEY (`idroles`)
    REFERENCES `pipingDB`.`roles` (`idroles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pipingDB`.`steel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pipingDB`.`steel` (
  `idsteel` INT NOT NULL AUTO_INCREMENT,
  `gatunek` VARCHAR(10) NOT NULL,
  `granicaPlastycznosci` INT NOT NULL,
  `granicaWytrzymalosci` INT NOT NULL,
  PRIMARY KEY (`idsteel`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pipingDB`.`diameter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pipingDB`.`diameter` (
  `iddiameter` INT NOT NULL AUTO_INCREMENT,
  `DN` VARCHAR(8) NOT NULL,
  `real` DOUBLE NOT NULL,
  PRIMARY KEY (`iddiameter`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pipingDB`.`wallThickness`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pipingDB`.`wallThickness` (
  `idwallThickness` INT NOT NULL AUTO_INCREMENT,
  `wallThickness` DOUBLE NOT NULL,
  PRIMARY KEY (`idwallThickness`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pipingDB`.`fluids`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pipingDB`.`fluids` (
  `idfluids` INT NOT NULL AUTO_INCREMENT,
  `fluid` VARCHAR(45) NOT NULL,
  `cisOperacyjne` DOUBLE NULL,
  `cisObliczeniowe` DOUBLE NOT NULL,
  `tempOperacyjna` DOUBLE NULL,
  `tempObliczeniowa` DOUBLE NOT NULL,
  PRIMARY KEY (`idfluids`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pipingDB`.`calulations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pipingDB`.`calulations` (
  `idcalulations` INT NOT NULL AUTO_INCREMENT,
  `dateTime` DATETIME NOT NULL,
  `naprezeniaProjektowe` DOUBLE NOT NULL,
  `wytrzymaloscZlacza` DOUBLE NOT NULL,
  `korozja` DOUBLE NOT NULL,
  `tolerancjaScianki` DOUBLE NOT NULL,
  `pocienienie` DOUBLE NOT NULL,
  `najmniejszaGrubosc` DOUBLE NOT NULL,
  `idusers` INT NOT NULL,
  `idsteel` INT NOT NULL,
  `iddiameter` INT NOT NULL,
  `idwallThickness` INT NOT NULL,
  `idfluids` INT NOT NULL,
  PRIMARY KEY (`idcalulations`),
  INDEX `fk_calulations_users1_idx` (`idusers` ASC) VISIBLE,
  INDEX `fk_calulations_steel1_idx` (`idsteel` ASC) VISIBLE,
  INDEX `fk_calulations_diameter1_idx` (`iddiameter` ASC) VISIBLE,
  INDEX `fk_calulations_wallThickness1_idx` (`idwallThickness` ASC) VISIBLE,
  INDEX `fk_calulations_fluids1_idx` (`idfluids` ASC) VISIBLE,
  CONSTRAINT `fk_calulations_users1`
    FOREIGN KEY (`idusers`)
    REFERENCES `pipingDB`.`users` (`idusers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_calulations_steel1`
    FOREIGN KEY (`idsteel`)
    REFERENCES `pipingDB`.`steel` (`idsteel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_calulations_diameter1`
    FOREIGN KEY (`iddiameter`)
    REFERENCES `pipingDB`.`diameter` (`iddiameter`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_calulations_wallThickness1`
    FOREIGN KEY (`idwallThickness`)
    REFERENCES `pipingDB`.`wallThickness` (`idwallThickness`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_calulations_fluids1`
    FOREIGN KEY (`idfluids`)
    REFERENCES `pipingDB`.`fluids` (`idfluids`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `pipingDB`.`roles`
-- -----------------------------------------------------
START TRANSACTION;
USE `pipingDB`;
INSERT INTO `pipingDB`.`roles` (`idroles`, `roles`) VALUES (1, 'guest');
INSERT INTO `pipingDB`.`roles` (`idroles`, `roles`) VALUES (2, 'admin');
INSERT INTO `pipingDB`.`roles` (`idroles`, `roles`) VALUES (3, 'projectManager');
INSERT INTO `pipingDB`.`roles` (`idroles`, `roles`) VALUES (4, 'expert');
INSERT INTO `pipingDB`.`roles` (`idroles`, `roles`) VALUES (5, 'engineer');

COMMIT;


-- -----------------------------------------------------
-- Data for table `pipingDB`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `pipingDB`;
INSERT INTO `pipingDB`.`users` (`idusers`, `login`, `password`, `active`, `idroles`) VALUES (100, 'admin', 'admin', 2, 2);
INSERT INTO `pipingDB`.`users` (`idusers`, `login`, `password`, `active`, `idroles`) VALUES (101, 'pm', 'pm', 2, 3);
INSERT INTO `pipingDB`.`users` (`idusers`, `login`, `password`, `active`, `idroles`) VALUES (102, 'eng', 'eng', 2, 5);

COMMIT;


-- -----------------------------------------------------
-- Data for table `pipingDB`.`steel`
-- -----------------------------------------------------
START TRANSACTION;
USE `pipingDB`;
INSERT INTO `pipingDB`.`steel` (`idsteel`, `gatunek`, `granicaPlastycznosci`, `granicaWytrzymalosci`) VALUES (200, 'P195TR1', 195, 320);
INSERT INTO `pipingDB`.`steel` (`idsteel`, `gatunek`, `granicaPlastycznosci`, `granicaWytrzymalosci`) VALUES (201, 'P235TR1', 235, 360);
INSERT INTO `pipingDB`.`steel` (`idsteel`, `gatunek`, `granicaPlastycznosci`, `granicaWytrzymalosci`) VALUES (202, 'P265TR1', 265, 410);

COMMIT;


-- -----------------------------------------------------
-- Data for table `pipingDB`.`diameter`
-- -----------------------------------------------------
START TRANSACTION;
USE `pipingDB`;
INSERT INTO `pipingDB`.`diameter` (`iddiameter`, `DN`, `real`) VALUES (300, 'DN20', 26.9);
INSERT INTO `pipingDB`.`diameter` (`iddiameter`, `DN`, `real`) VALUES (301, 'DN25', 33.7);
INSERT INTO `pipingDB`.`diameter` (`iddiameter`, `DN`, `real`) VALUES (302, 'DN32', 42.4);
INSERT INTO `pipingDB`.`diameter` (`iddiameter`, `DN`, `real`) VALUES (303, 'DN40', 48.3);
INSERT INTO `pipingDB`.`diameter` (`iddiameter`, `DN`, `real`) VALUES (304, 'DN50', 60.3);
INSERT INTO `pipingDB`.`diameter` (`iddiameter`, `DN`, `real`) VALUES (305, 'DN65', 76.1);
INSERT INTO `pipingDB`.`diameter` (`iddiameter`, `DN`, `real`) VALUES (306, 'DN80', 88.9);
INSERT INTO `pipingDB`.`diameter` (`iddiameter`, `DN`, `real`) VALUES (307, 'DN100', 114.3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `pipingDB`.`wallThickness`
-- -----------------------------------------------------
START TRANSACTION;
USE `pipingDB`;
INSERT INTO `pipingDB`.`wallThickness` (`idwallThickness`, `wallThickness`) VALUES (400, 3.6);
INSERT INTO `pipingDB`.`wallThickness` (`idwallThickness`, `wallThickness`) VALUES (401, 4);
INSERT INTO `pipingDB`.`wallThickness` (`idwallThickness`, `wallThickness`) VALUES (402, 4.5);
INSERT INTO `pipingDB`.`wallThickness` (`idwallThickness`, `wallThickness`) VALUES (403, 5);
INSERT INTO `pipingDB`.`wallThickness` (`idwallThickness`, `wallThickness`) VALUES (404, 5.6);
INSERT INTO `pipingDB`.`wallThickness` (`idwallThickness`, `wallThickness`) VALUES (405, 6.3);
INSERT INTO `pipingDB`.`wallThickness` (`idwallThickness`, `wallThickness`) VALUES (406, 7.1);
INSERT INTO `pipingDB`.`wallThickness` (`idwallThickness`, `wallThickness`) VALUES (407, 8);

COMMIT;


-- -----------------------------------------------------
-- Data for table `pipingDB`.`fluids`
-- -----------------------------------------------------
START TRANSACTION;
USE `pipingDB`;
INSERT INTO `pipingDB`.`fluids` (`idfluids`, `fluid`, `cisOperacyjne`, `cisObliczeniowe`, `tempOperacyjna`, `tempObliczeniowa`) VALUES (500, 'Tlen', 10, 12, 40, 50);
INSERT INTO `pipingDB`.`fluids` (`idfluids`, `fluid`, `cisOperacyjne`, `cisObliczeniowe`, `tempOperacyjna`, `tempObliczeniowa`) VALUES (501, 'Gaz ziemny', 8, 10, 40, 50);
INSERT INTO `pipingDB`.`fluids` (`idfluids`, `fluid`, `cisOperacyjne`, `cisObliczeniowe`, `tempOperacyjna`, `tempObliczeniowa`) VALUES (502, 'Woda demi', 6, 8, 90, 100);

COMMIT;

