-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema SS
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema SS
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `SS` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `SS` ;

-- -----------------------------------------------------
-- Table `SS`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SS`.`user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `username` VARCHAR(50) NOT NULL COMMENT '',
  `pw` VARCHAR(100) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SS`.`secret`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SS`.`secret` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `content` VARCHAR(200) NOT NULL COMMENT '',
  `user_id` INT UNSIGNED NULL COMMENT '',
  `category` VARCHAR(200) NULL COMMENT '',
  `image` VARCHAR(200) NULL COMMENT '',
  `creation_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `secret_user_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `secret_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `SS`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SS`.`likes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SS`.`likes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `secret_id` INT UNSIGNED NOT NULL COMMENT '',
  `user_id` INT UNSIGNED NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `likes_secrets_idx` (`secret_id` ASC)  COMMENT '',
  INDEX `likes_user_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `likes_secrets`
    FOREIGN KEY (`secret_id`)
    REFERENCES `SS`.`secret` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `likes_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `SS`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SS`.`comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SS`.`comment` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `content` VARCHAR(45) NULL COMMENT '',
  `secret_id` INT UNSIGNED NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `coment_secret_idx` (`secret_id` ASC)  COMMENT '',
  CONSTRAINT `coment_secret`
    FOREIGN KEY (`secret_id`)
    REFERENCES `SS`.`secret` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
