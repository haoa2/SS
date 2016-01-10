/*
 Navicat MySQL Data Transfer

 Source Server         : notedicenjuan.com
 Source Server Type    : MySQL
 Source Server Version : 50542
 Source Host           : notedicenjuan.com
 Source Database       : notedice_SS

 Target Server Type    : MySQL
 Target Server Version : 50542
 File Encoding         : utf-8

 Date: 01/05/2016 14:20:59 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(45) DEFAULT NULL,
  `secret_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `coment_secret_idx` (`secret_id`),
  CONSTRAINT `coment_secret` FOREIGN KEY (`secret_id`) REFERENCES `secret` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `likes`
-- ----------------------------
DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `secret_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `likes_secrets_idx` (`secret_id`),
  KEY `likes_user_idx` (`user_id`),
  CONSTRAINT `likes_secrets` FOREIGN KEY (`secret_id`) REFERENCES `secret` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `likes_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `secret`
-- ----------------------------
DROP TABLE IF EXISTS `secret`;
CREATE TABLE `secret` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(200) NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `creation_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `secret_user_idx` (`user_id`),
  CONSTRAINT `secret_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `pw` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECKS = 1;
