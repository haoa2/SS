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
-- Table `SS`.`post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SS`.`post` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `session_id` VARCHAR(45) NULL COMMENT '',
  `content` VARCHAR(200) NOT NULL COMMENT '',
  `subject` VARCHAR(100) NOT NULL DEFAULT 'General' COMMENT '',
  `image` VARCHAR(200) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SS`.`like`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SS`.`like` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `post_id` INT UNSIGNED NOT NULL COMMENT '',
  `session_id` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)  COMMENT '',
  INDEX `usr_likes_post_idx` (`post_id` ASC)  COMMENT '',
  CONSTRAINT `usr_likes_post`
    FOREIGN KEY (`post_id`)
    REFERENCES `SS`.`post` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SS`.`comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SS`.`comment` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `post_id` INT UNSIGNED NOT NULL COMMENT '',
  `session_id` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)  COMMENT '',
  INDEX `usr_comments_post_idx` (`post_id` ASC)  COMMENT '',
  CONSTRAINT `usr_comments_post`
    FOREIGN KEY (`post_id`)
    REFERENCES `SS`.`post` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
