-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: techfinder
-- ------------------------------------------------------
-- Server version	5.7.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `elements_elements_set`
--
DROP TABLE IF EXISTS `elements_elements_set`;
CREATE TABLE `elements_elements_set` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `elements_id` bigint(20) NOT NULL,
  `elements_set_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK38B5242494368I73` (`elements_id`),
  KEY `FK38B5242493368Y73` (`elements_set_id`),
  CONSTRAINT `FK35G8282792068C76` FOREIGN KEY (`elements_id`) REFERENCES `elements` (`id`),
  CONSTRAINT `FK38G7242492568C76` FOREIGN KEY (`elements_set_id`) REFERENCES `elements_set` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
LOCK TABLES `elements_elements_set` WRITE;
INSERT INTO `elements_elements_set` VALUES(NULL, 1, 24),
(NULL, 2, 11),(NULL, 2, 17),(NULL, 2, 18),(NULL, 2, 19),(NULL, 2, 20),
(NULL, 3, 4),
(NULL, 3, 5),
(NULL, 3, 3),
(NULL, 3, 15),(NULL, 3, 9),
(NULL, 3, 7),
(NULL, 3, 8),
(NULL, 3, 12),
(NULL, 3, 21),
(NULL, 4, 4),
(NULL, 4, 5),
(NULL, 4, 3),
(NULL, 4, 15),(NULL, 4, 9),
(NULL, 4, 7),
(NULL, 4, 8),
(NULL, 4, 12),
(NULL, 4, 21),
(NULL, 5, 4),
(NULL, 5, 5),
(NULL, 5, 3),
(NULL, 5, 15),(NULL, 5, 9),
(NULL, 5, 7),
(NULL, 5, 8),
(NULL, 5, 12),
(NULL, 5, 21),
(NULL, 6, 4),
(NULL, 6, 5),
(NULL, 6, 3),
(NULL, 6, 24),
(NULL, 6, 7),
(NULL, 6, 8),
(NULL, 6, 10),
(NULL, 6, 12),
(NULL, 6, 21),
(NULL, 7, 24),
(NULL, 7, 11),(NULL, 7, 17),(NULL, 7, 18),(NULL, 7, 19),(NULL, 7, 20),
(NULL, 7, 12),
(NULL, 8, 24),
(NULL, 8, 10),
(NULL, 8, 12),
(NULL, 8, 21),
(NULL, 9, 4),
(NULL, 9, 5),
(NULL, 9, 3),
(NULL, 9, 7),
(NULL, 9, 8),
(NULL, 9, 12),
(NULL, 9, 21),
(NULL, 10, 11),(NULL, 10, 17),(NULL, 10, 18),(NULL, 10, 19),(NULL, 10, 20),
(NULL, 10, 12),
(NULL, 11, 4),
(NULL, 11, 5),
(NULL, 11, 3),
(NULL, 11, 15),(NULL, 11, 9),
(NULL, 11, 7),
(NULL, 11, 8),
(NULL, 11, 10),
(NULL, 11, 12),
(NULL, 11, 21),
(NULL, 12, 4),
(NULL, 12, 5),
(NULL, 12, 3),
(NULL, 12, 15),(NULL, 12, 9),
(NULL, 12, 7),
(NULL, 12, 8),
(NULL, 12, 10),
(NULL, 12, 12),
(NULL, 12, 21),
(NULL, 13, 4),
(NULL, 13, 5),
(NULL, 13, 3),
(NULL, 13, 15),(NULL, 13, 9),
(NULL, 13, 7),
(NULL, 13, 8),
(NULL, 13, 10),
(NULL, 13, 12),
(NULL, 13, 21),
(NULL, 14, 4),
(NULL, 14, 5),
(NULL, 14, 3),
(NULL, 14, 15),(NULL, 14, 9),
(NULL, 14, 7),
(NULL, 14, 8),
(NULL, 14, 10),
(NULL, 14, 12),
(NULL, 14, 21),
(NULL, 15, 4),
(NULL, 15, 5),
(NULL, 15, 3),
(NULL, 15, 15),(NULL, 15, 9),
(NULL, 15, 7),
(NULL, 15, 8),
(NULL, 15, 10),
(NULL, 15, 12),
(NULL, 15, 21),
(NULL, 16, 4),
(NULL, 16, 5),
(NULL, 16, 3),
(NULL, 16, 15),(NULL, 16, 9),
(NULL, 16, 24),
(NULL, 16, 7),
(NULL, 16, 8),
(NULL, 16, 10),
(NULL, 16, 12),
(NULL, 16, 21),
(NULL, 17, 4),
(NULL, 17, 5),
(NULL, 17, 3),
(NULL, 17, 24),
(NULL, 17, 7),
(NULL, 17, 8),
(NULL, 17, 12),
(NULL, 17, 21),
(NULL, 18, 11),(NULL, 18, 17),(NULL, 18, 18),(NULL, 18, 19),(NULL, 18, 20),
(NULL, 18, 12),
(NULL, 19, 4),
(NULL, 19, 5),
(NULL, 19, 3),
(NULL, 19, 15),(NULL, 19, 9),
(NULL, 19, 7),
(NULL, 19, 8),
(NULL, 19, 10),
(NULL, 19, 12),
(NULL, 19, 21),
(NULL, 20, 4),
(NULL, 20, 5),
(NULL, 20, 3),
(NULL, 20, 15),(NULL, 20, 9),
(NULL, 20, 7),
(NULL, 20, 8),
(NULL, 20, 10),
(NULL, 20, 12),
(NULL, 20, 21),
(NULL, 21, 4),
(NULL, 21, 5),
(NULL, 21, 3),
(NULL, 21, 15),(NULL, 21, 9),
(NULL, 21, 7),
(NULL, 21, 8),
(NULL, 21, 12),
(NULL, 21, 21),
(NULL, 22, 4),
(NULL, 22, 5),
(NULL, 22, 3),
(NULL, 22, 15),(NULL, 22, 9),
(NULL, 22, 7),
(NULL, 22, 8),
(NULL, 22, 12),
(NULL, 22, 21),
(NULL, 23, 4),
(NULL, 23, 5),
(NULL, 23, 3),
(NULL, 23, 15),(NULL, 23, 9),
(NULL, 23, 7),
(NULL, 23, 8),
(NULL, 23, 12),
(NULL, 23, 21),
(NULL, 24, 4),
(NULL, 24, 5),
(NULL, 24, 3),
(NULL, 24, 15),(NULL, 24, 9),
(NULL, 24, 7),
(NULL, 24, 8),
(NULL, 24, 12),
(NULL, 24, 21),
(NULL, 25, 4),
(NULL, 25, 5),
(NULL, 25, 3),
(NULL, 25, 15),(NULL, 25, 9),
(NULL, 25, 7),
(NULL, 25, 8),
(NULL, 25, 10),
(NULL, 25, 12),
(NULL, 25, 21),
(NULL, 26, 4),
(NULL, 26, 5),
(NULL, 26, 3),
(NULL, 26, 15),(NULL, 26, 9),
(NULL, 26, 7),
(NULL, 26, 8),
(NULL, 26, 10),
(NULL, 26, 12),
(NULL, 26, 21),
(NULL, 27, 4),
(NULL, 27, 5),
(NULL, 27, 3),
(NULL, 27, 15),(NULL, 27, 9),
(NULL, 27, 7),
(NULL, 27, 8),
(NULL, 27, 10),
(NULL, 27, 12),
(NULL, 27, 21),
(NULL, 28, 4),
(NULL, 28, 5),
(NULL, 28, 3),
(NULL, 28, 15),(NULL, 28, 9),
(NULL, 28, 7),
(NULL, 28, 8),
(NULL, 28, 10),
(NULL, 28, 12),
(NULL, 28, 21),
(NULL, 29, 4),
(NULL, 29, 5),
(NULL, 29, 3),
(NULL, 29, 15),(NULL, 29, 9),
(NULL, 29, 7),
(NULL, 29, 8),
(NULL, 29, 10),
(NULL, 29, 12),
(NULL, 29, 21),
(NULL, 30, 4),
(NULL, 30, 5),
(NULL, 30, 3),
(NULL, 30, 15),(NULL, 30, 9),
(NULL, 30, 7),
(NULL, 30, 8),
(NULL, 30, 10),
(NULL, 30, 12),
(NULL, 30, 21),
(NULL, 31, 4),
(NULL, 31, 5),
(NULL, 31, 3),
(NULL, 31, 15),(NULL, 31, 9),
(NULL, 31, 7),
(NULL, 31, 8),
(NULL, 31, 12),
(NULL, 31, 21),
(NULL, 32, 4),
(NULL, 32, 5),
(NULL, 32, 3),
(NULL, 32, 15),(NULL, 32, 9),
(NULL, 32, 7),
(NULL, 32, 8),
(NULL, 32, 12),
(NULL, 32, 21),
(NULL, 33, 4),
(NULL, 33, 5),
(NULL, 33, 3),
(NULL, 33, 15),(NULL, 33, 9),
(NULL, 33, 7),
(NULL, 33, 8),
(NULL, 33, 12),
(NULL, 33, 21),
(NULL, 34, 4),
(NULL, 34, 5),
(NULL, 34, 3),
(NULL, 34, 15),(NULL, 34, 9),
(NULL, 34, 7),
(NULL, 34, 8),
(NULL, 34, 12),
(NULL, 34, 21),
(NULL, 35, 4),
(NULL, 35, 5),
(NULL, 35, 3),
(NULL, 35, 7),
(NULL, 35, 8),
(NULL, 35, 12),
(NULL, 35, 21),
(NULL, 36, 11),(NULL, 36, 17),(NULL, 36, 18),(NULL, 36, 19),(NULL, 36, 20),
(NULL, 36, 7),
(NULL, 36, 8),
(NULL, 36, 12),
(NULL, 37, 4),
(NULL, 37, 5),
(NULL, 37, 3),
(NULL, 37, 15),(NULL, 37, 9),
(NULL, 37, 7),
(NULL, 37, 8),
(NULL, 37, 12),
(NULL, 37, 21),
(NULL, 38, 4),
(NULL, 38, 5),
(NULL, 38, 3),
(NULL, 38, 15),(NULL, 38, 9),
(NULL, 38, 7),
(NULL, 38, 8),
(NULL, 38, 12),
(NULL, 38, 21),
(NULL, 39, 4),
(NULL, 39, 5),
(NULL, 39, 3),
(NULL, 39, 15),(NULL, 39, 9),
(NULL, 39, 7),
(NULL, 39, 8),
(NULL, 39, 12),
(NULL, 39, 21),
(NULL, 40, 4),
(NULL, 40, 5),
(NULL, 40, 3),
(NULL, 40, 15),(NULL, 40, 9),
(NULL, 40, 7),
(NULL, 40, 8),
(NULL, 40, 12),
(NULL, 40, 21),
(NULL, 41, 4),
(NULL, 41, 5),
(NULL, 41, 3),
(NULL, 41, 15),(NULL, 41, 9),
(NULL, 41, 7),
(NULL, 41, 8),
(NULL, 41, 12),
(NULL, 41, 21),
(NULL, 42, 4),
(NULL, 42, 5),
(NULL, 42, 3),
(NULL, 42, 15),(NULL, 42, 9),
(NULL, 42, 7),
(NULL, 42, 8),
(NULL, 42, 12),
(NULL, 42, 21),
(NULL, 43, 4),
(NULL, 43, 5),
(NULL, 43, 3),
(NULL, 43, 7),
(NULL, 43, 8),
(NULL, 43, 12),
(NULL, 43, 21),
(NULL, 44, 4),
(NULL, 44, 5),
(NULL, 44, 3),
(NULL, 44, 15),(NULL, 44, 9),
(NULL, 44, 7),
(NULL, 44, 8),
(NULL, 44, 12),
(NULL, 44, 21),
(NULL, 45, 4),
(NULL, 45, 5),
(NULL, 45, 3),
(NULL, 45, 15),(NULL, 45, 9),
(NULL, 45, 7),
(NULL, 45, 8),
(NULL, 45, 12),
(NULL, 45, 21),
(NULL, 46, 4),
(NULL, 46, 5),
(NULL, 46, 3),
(NULL, 46, 15),(NULL, 46, 9),
(NULL, 46, 7),
(NULL, 46, 8),
(NULL, 46, 12),
(NULL, 46, 21),
(NULL, 47, 4),
(NULL, 47, 5),
(NULL, 47, 3),
(NULL, 47, 15),(NULL, 47, 9),
(NULL, 47, 7),
(NULL, 47, 8),
(NULL, 47, 12),
(NULL, 47, 21),
(NULL, 48, 4),
(NULL, 48, 5),
(NULL, 48, 3),
(NULL, 48, 15),(NULL, 48, 9),
(NULL, 48, 7),
(NULL, 48, 8),
(NULL, 48, 12),
(NULL, 48, 21),
(NULL, 49, 4),
(NULL, 49, 5),
(NULL, 49, 3),
(NULL, 49, 15),(NULL, 49, 9),
(NULL, 49, 7),
(NULL, 49, 8),
(NULL, 49, 12),
(NULL, 49, 21),
(NULL, 50, 4),
(NULL, 50, 5),
(NULL, 50, 3),
(NULL, 50, 15),(NULL, 50, 9),
(NULL, 50, 7),
(NULL, 50, 8),
(NULL, 50, 12),
(NULL, 50, 21),
(NULL, 51, 4),
(NULL, 51, 5),
(NULL, 51, 3),
(NULL, 51, 15),(NULL, 51, 9),
(NULL, 51, 7),
(NULL, 51, 8),
(NULL, 51, 12),
(NULL, 51, 21),
(NULL, 52, 4),
(NULL, 52, 5),
(NULL, 52, 3),
(NULL, 52, 15),(NULL, 52, 9),
(NULL, 52, 7),
(NULL, 52, 8),
(NULL, 52, 12),
(NULL, 52, 21),
(NULL, 53, 4),
(NULL, 53, 5),
(NULL, 53, 3),
(NULL, 53, 7),
(NULL, 53, 8),
(NULL, 53, 12),
(NULL, 53, 21),
(NULL, 54, 11),(NULL, 54, 17),(NULL, 54, 18),(NULL, 54, 19),(NULL, 54, 20),
(NULL, 54, 12),
(NULL, 55, 4),
(NULL, 55, 5),
(NULL, 55, 3),
(NULL, 55, 15),(NULL, 55, 9),
(NULL, 55, 7),
(NULL, 55, 8),
(NULL, 55, 12),
(NULL, 55, 21),
(NULL, 56, 4),
(NULL, 56, 5),
(NULL, 56, 3),
(NULL, 56, 15),(NULL, 56, 9),
(NULL, 56, 7),
(NULL, 56, 8),
(NULL, 56, 12),
(NULL, 56, 21),
(NULL, 57, 4),
(NULL, 57, 5),
(NULL, 57, 3),
(NULL, 57, 15),(NULL, 57, 9),
(NULL, 57, 7),
(NULL, 57, 8),
(NULL, 57, 12),
(NULL, 57, 21),
(NULL, 58, 4),
(NULL, 58, 5),
(NULL, 58, 3),
(NULL, 58, 15),(NULL, 58, 9),
(NULL, 58, 7),
(NULL, 58, 8),
(NULL, 58, 12),
(NULL, 58, 21),
(NULL, 59, 4),
(NULL, 59, 5),
(NULL, 59, 3),
(NULL, 59, 15),(NULL, 59, 9),
(NULL, 59, 7),
(NULL, 59, 8),
(NULL, 59, 12),
(NULL, 59, 21),
(NULL, 60, 4),
(NULL, 60, 5),
(NULL, 60, 3),
(NULL, 60, 15),(NULL, 60, 9),
(NULL, 60, 7),
(NULL, 60, 8),
(NULL, 60, 12),
(NULL, 60, 21),
(NULL, 61, 4),
(NULL, 61, 5),
(NULL, 61, 3),
(NULL, 61, 15),(NULL, 61, 9),
(NULL, 61, 7),
(NULL, 61, 8),
(NULL, 61, 12),
(NULL, 61, 21),
(NULL, 62, 4),
(NULL, 62, 5),
(NULL, 62, 3),
(NULL, 62, 15),(NULL, 62, 9),
(NULL, 62, 7),
(NULL, 62, 8),
(NULL, 62, 12),
(NULL, 62, 21),
(NULL, 63, 4),
(NULL, 63, 5),
(NULL, 63, 3),
(NULL, 63, 15),(NULL, 63, 9),
(NULL, 63, 7),
(NULL, 63, 8),
(NULL, 63, 12),
(NULL, 63, 21),
(NULL, 64, 4),
(NULL, 64, 5),
(NULL, 64, 3),
(NULL, 64, 15),(NULL, 64, 9),
(NULL, 64, 7),
(NULL, 64, 8),
(NULL, 64, 12),
(NULL, 64, 21),
(NULL, 65, 4),
(NULL, 65, 5),
(NULL, 65, 3),
(NULL, 65, 15),(NULL, 65, 9),
(NULL, 65, 7),
(NULL, 65, 8),
(NULL, 65, 12),
(NULL, 65, 21),
(NULL, 66, 4),
(NULL, 66, 5),
(NULL, 66, 3),
(NULL, 66, 15),(NULL, 66, 9),
(NULL, 66, 7),
(NULL, 66, 8),
(NULL, 66, 12),
(NULL, 66, 21),
(NULL, 67, 4),
(NULL, 67, 5),
(NULL, 67, 3),
(NULL, 67, 15),(NULL, 67, 9),
(NULL, 67, 7),
(NULL, 67, 8),
(NULL, 67, 12),
(NULL, 67, 21),
(NULL, 68, 4),
(NULL, 68, 5),
(NULL, 68, 3),
(NULL, 68, 15),(NULL, 68, 9),
(NULL, 68, 7),
(NULL, 68, 8),
(NULL, 68, 12),
(NULL, 68, 21),
(NULL, 69, 4),
(NULL, 69, 5),
(NULL, 69, 3),
(NULL, 69, 15),(NULL, 69, 9),
(NULL, 69, 7),
(NULL, 69, 8),
(NULL, 69, 12),
(NULL, 69, 21),
(NULL, 70, 4),
(NULL, 70, 5),
(NULL, 70, 3),
(NULL, 70, 15),(NULL, 70, 9),
(NULL, 70, 7),
(NULL, 70, 8),
(NULL, 70, 12),
(NULL, 70, 21),
(NULL, 71, 4),
(NULL, 71, 5),
(NULL, 71, 3),
(NULL, 71, 15),(NULL, 71, 9),
(NULL, 71, 7),
(NULL, 71, 8),
(NULL, 71, 12),
(NULL, 71, 21),
(NULL, 72, 4),
(NULL, 72, 5),
(NULL, 72, 3),
(NULL, 72, 15),(NULL, 72, 9),
(NULL, 72, 7),
(NULL, 72, 8),
(NULL, 72, 12),
(NULL, 72, 21),
(NULL, 73, 4),
(NULL, 73, 5),
(NULL, 73, 3),
(NULL, 73, 15),(NULL, 73, 9),
(NULL, 73, 7),
(NULL, 73, 8),
(NULL, 73, 12),
(NULL, 73, 21),
(NULL, 74, 4),
(NULL, 74, 5),
(NULL, 74, 3),
(NULL, 74, 15),(NULL, 74, 9),
(NULL, 74, 7),
(NULL, 74, 8),
(NULL, 74, 12),
(NULL, 74, 21),
(NULL, 75, 4),
(NULL, 75, 5),
(NULL, 75, 3),
(NULL, 75, 15),(NULL, 75, 9),
(NULL, 75, 7),
(NULL, 75, 8),
(NULL, 75, 12),
(NULL, 75, 21),
(NULL, 76, 4),
(NULL, 76, 5),
(NULL, 76, 3),
(NULL, 76, 15),(NULL, 76, 9),
(NULL, 76, 7),
(NULL, 76, 8),
(NULL, 76, 12),
(NULL, 76, 21),
(NULL, 77, 4),
(NULL, 77, 5),
(NULL, 77, 3),
(NULL, 77, 15),(NULL, 77, 9),
(NULL, 77, 7),
(NULL, 77, 8),
(NULL, 77, 12),
(NULL, 77, 21),
(NULL, 78, 4),
(NULL, 78, 5),
(NULL, 78, 3),
(NULL, 78, 15),(NULL, 78, 9),
(NULL, 78, 7),
(NULL, 78, 8),
(NULL, 78, 12),
(NULL, 78, 21),
(NULL, 79, 4),
(NULL, 79, 5),
(NULL, 79, 3),
(NULL, 79, 15),(NULL, 79, 9),
(NULL, 79, 7),
(NULL, 79, 8),
(NULL, 79, 12),
(NULL, 79, 21),
(NULL, 80, 4),
(NULL, 80, 5),
(NULL, 80, 3),
(NULL, 80, 15),(NULL, 80, 9),
(NULL, 80, 7),
(NULL, 80, 8),
(NULL, 80, 12),
(NULL, 80, 21),
(NULL, 81, 4),
(NULL, 81, 5),
(NULL, 81, 3),
(NULL, 81, 15),(NULL, 81, 9),
(NULL, 81, 7),
(NULL, 81, 8),
(NULL, 81, 12),
(NULL, 81, 21),
(NULL, 82, 4),
(NULL, 82, 5),
(NULL, 82, 3),
(NULL, 82, 15),(NULL, 82, 9),
(NULL, 82, 7),
(NULL, 82, 8),
(NULL, 82, 12),
(NULL, 82, 21),
(NULL, 83, 4),
(NULL, 83, 5),
(NULL, 83, 3),
(NULL, 83, 15),(NULL, 83, 9),
(NULL, 83, 7),
(NULL, 83, 8),
(NULL, 83, 12),
(NULL, 83, 21),
(NULL, 84, 12),
(NULL, 85, 15),(NULL, 85, 9),
(NULL, 85, 12),
(NULL, 86, 15),(NULL, 86, 9),
(NULL, 86, 12),
(NULL, 87, 15),(NULL, 87, 9),
(NULL, 87, 12),
(NULL, 88, 15),(NULL, 88, 9),
(NULL, 88, 12),
(NULL, 89, 15),(NULL, 89, 9),
(NULL, 89, 12),
(NULL, 90, 4),
(NULL, 90, 5),
(NULL, 90, 3),
(NULL, 90, 15),(NULL, 90, 9),
(NULL, 90, 7),
(NULL, 90, 8),
(NULL, 90, 12),
(NULL, 90, 21),
(NULL, 91, 15),(NULL, 91, 9),
(NULL, 91, 12),
(NULL, 92, 4),
(NULL, 92, 5),
(NULL, 92, 3),
(NULL, 92, 15),(NULL, 92, 9),
(NULL, 92, 7),
(NULL, 92, 8),
(NULL, 92, 12),
(NULL, 92, 21),
(NULL, 93, 15),(NULL, 93, 9),
(NULL, 94, 15),(NULL, 94, 9),
(NULL, 95, 15),(NULL, 95, 9),
(NULL, 96, 15),(NULL, 96, 9),
(NULL, 97, 15),(NULL, 97, 9),
(NULL, 98, 15),(NULL, 98, 9),
(NULL, 99, 15),(NULL, 99, 9),
(NULL, 100, 15),(NULL, 100, 9),
(NULL, 101, 15),(NULL, 101, 9),
(NULL, 102, 15),(NULL, 102, 9),
(NULL, 103, 15),(NULL, 103, 9),
(NULL, 104, 15),(NULL, 104, 9),
(NULL, 105, 15),(NULL, 105, 9),
(NULL, 106, 15),(NULL, 106, 9),
(NULL, 107, 15),(NULL, 107, 9),
(NULL, 108, 15),(NULL, 108, 9),
(NULL, 109, 15),(NULL, 109, 9),
(NULL, 110, 15),(NULL, 110, 9),
(NULL, 111, 15),(NULL, 111, 9),
(NULL, 112, 15),(NULL, 112, 9),
(NULL, 113, 15),(NULL, 113, 9),
(NULL, 114, 15),(NULL, 114, 9),
(NULL, 115, 15),(NULL, 115, 9),
(NULL, 116, 15),(NULL, 116, 9),
(NULL, 117, 15),(NULL, 117, 9),
(NULL, 118, 15),(NULL, 118, 9);
UNLOCK TABLES;

--
-- Table structure for table `elements_set`
--
DROP TABLE IF EXISTS `elements_set`;
CREATE TABLE `elements_set` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

LOCK TABLES `elements_set` WRITE;
INSERT INTO `elements_set` VALUES(1, 'Excimer laser ablation system'),
(2, 'fusion/step heating system'),
(3, 'SF-ICP-MS'),
(4, 'Q-ICP-MS'),
(5, 'Q3-ICP-MS'),
(6, 'MC-ICP-MS'),
(7, 'LA-ICP-MS'),
(8, 'LA-SF-ICP-MS'),
(9, 'AES'),
(10, 'Electron microprobe'),
(11, 'Noble gas spectrometers'),
(12, 'SIMS'),
(13, 'TIMS'),
(14, 'Stable Isotope Ratio Mass Spectrometer'),
(15, 'MP-AES'),
(16, 'SHRIMP'),
(17, 'MC-MS-Noble Gas (Ar)'),
(18, 'MS-Noble Gas (Ar)'),
(19, 'Step-heating (Ar)'),
(20, 'MS-Noble Gas (He)'),
(21, 'XRF'),
(22, 'EMP'),
(23, 'alpha counter'),
(24, 'Elemental Analyser CHNS'),
(25, 'Automated fission track counting system'),
(26, 'Griggs press'),
(27, 'Piston cylinder'),
(28, 'Multi-anvil press'),
(29, 'Diamond-anvil press'),
(30, 'Raman microscope'),
(31, 'Fourier Transform IR microscope'),
(32, 'EA-IRMS'),
(33, 'CG-IRMS');
UNLOCK TABLES;
  
-- Table structure for table `elements`
--
DROP TABLE IF EXISTS `elements`;
CREATE TABLE `elements` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL,
  `symbol` varchar(3) NOT NULL,
  `atomic_number` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `fulltext_index` (`name`,`symbol`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elements`
--
LOCK TABLES `elements` WRITE;
INSERT INTO `elements` VALUES(NULL, 'Hydrogen','H','1'),
(NULL, 'Helium','He','2'),
(NULL, 'Lithium','Li','3'),
(NULL, 'Beryllium','Be','4'),
(NULL, 'Boron','B','5'),
(NULL, 'Carbon','C','6'),
(NULL, 'Nitrogen','N','7'),
(NULL, 'Oxygen','O','8'),
(NULL, 'Fluorine','F','9'),
(NULL, 'Neon','Ne','10'),
(NULL, 'Sodium','Na','11'),
(NULL, 'Magnesium','Mg','12'),
(NULL, 'Aluminum','Al','13'),
(NULL, 'Silicon','Si','14'),
(NULL, 'Phosphorus','P','15'),
(NULL, 'Sulfur','S','16'),
(NULL, 'Chlorine','Cl','17'),
(NULL, 'Argon','Ar','18'),
(NULL, 'Potassium','K','19'),
(NULL, 'Calcium','Ca','20'),
(NULL, 'Scandium','Sc','21'),
(NULL, 'Titanium','Ti','22'),
(NULL, 'Vanadium','V','23'),
(NULL, 'Chromium','Cr','24'),
(NULL, 'Manganese','Mn','25'),
(NULL, 'Iron','Fe','26'),
(NULL, 'Cobalt','Co','27'),
(NULL, 'Nickel','Ni','28'),
(NULL, 'Copper','Cu','29'),
(NULL, 'Zinc','Zn','30'),
(NULL, 'Gallium','Ga','31'),
(NULL, 'Germanium','Ge','32'),
(NULL, 'Arsenic','As','33'),
(NULL, 'Selenium','Se','34'),
(NULL, 'Bromine','Br','35'),
(NULL, 'Krypton','Kr','36'),
(NULL, 'Rubidium','Rb','37'),
(NULL, 'Strontium','Sr','38'),
(NULL, 'Yttrium','Y','39'),
(NULL, 'Zirconium','Zr','40'),
(NULL, 'Niobium','Nb','41'),
(NULL, 'Molybdenum','Mo','42'),
(NULL, 'Technetium','Tc','43'),
(NULL, 'Ruthenium','Ru','44'),
(NULL, 'Rhodium','Rh','45'),
(NULL, 'Palladium','Pd','46'),
(NULL, 'Silver','Ag','47'),
(NULL, 'Cadmium','Cd','48'),
(NULL, 'Indium','In','49'),
(NULL, 'Tin','Sn','50'),
(NULL, 'Antimony','Sb','51'),
(NULL, 'Tellurium','Te','52'),
(NULL, 'Iodine','I','53'),
(NULL, 'Xenon','Xe','54'),
(NULL, 'Cesium','Cs','55'),
(NULL, 'Barium','Ba','56'),
(NULL, 'Lanthanum','La','57'),
(NULL, 'Cerium','Ce','58'),
(NULL, 'Praseodymium','Pr','59'),
(NULL, 'Neodymium','Nd','60'),
(NULL, 'Promethium','Pm','61'),
(NULL, 'Samarium','Sm','62'),
(NULL, 'Europium','Eu','63'),
(NULL, 'Gadolinium','Gd','64'),
(NULL, 'Terbium','Tb','65'),
(NULL, 'Dysprosium','Dy','66'),
(NULL, 'Holmium','Ho','67'),
(NULL, 'Erbium','Er','68'),
(NULL, 'Thulium','Tm','69'),
(NULL, 'Ytterbium','Yb','70'),
(NULL, 'Lutetium','Lu','71'),
(NULL, 'Hafnium','Hf','72'),
(NULL, 'Tantalum','Ta','73'),
(NULL, 'Tungsten','W','74'),
(NULL, 'Rhenium','Re','75'),
(NULL, 'Osmium','Os','76'),
(NULL, 'Iridium','Ir','77'),
(NULL, 'Platinum','Pt','78'),
(NULL, 'Gold','Au','79'),
(NULL, 'Mercury','Hg','80'),
(NULL, 'Thallium','Tl','81'),
(NULL, 'Lead','Pb','82'),
(NULL, 'Bismuth','Bi','83'),
(NULL, 'Polonium','Po','84'),
(NULL, 'Astatine','At','85'),
(NULL, 'Radon','Rn','86'),
(NULL, 'Francium','Fr','87'),
(NULL, 'Radium','Ra','88'),
(NULL, 'Actinium','Ac','89'),
(NULL, 'Thorium','Th','90'),
(NULL, 'Protactinium','Pa','91'),
(NULL, 'Uranium','U','92'),
(NULL, 'Neptunium','Np','93'),
(NULL, 'Plutonium','Pu','94'),
(NULL, 'Americium','Am','95'),
(NULL, 'Curium','Cm','96'),
(NULL, 'Berkelium','Bk','97'),
(NULL, 'Californium','Cf','98'),
(NULL, 'Einsteinium','Es','99'),
(NULL, 'Fermium','Fm','100'),
(NULL, 'Mendelevium','Md','101'),
(NULL, 'Nobelium','No','102'),
(NULL, 'Lawrencium','Lr','103'),
(NULL, 'Rutherfordium','Rf','104'),
(NULL, 'Dubnium','Db','105'),
(NULL, 'Seaborgium','Sg','106'),
(NULL, 'Bohrium','Bh','107'),
(NULL, 'Hassium','Hs','108'),
(NULL, 'Meitnerium','Mt','109'),
(NULL, 'Darmstadtium','Ds','110'),
(NULL, 'Roentgenium','Rg','111'),
(NULL, 'Copernicium','Cn','112'),
(NULL, 'Nihonium','Nh','113'),
(NULL, 'Flerovium','Fl','114'),
(NULL, 'Moscovium','Mc','115'),
(NULL, 'Livermorium','Lv','116'),
(NULL, 'Tennessine','Ts','117'),
(NULL, 'Oganesson','Og','118');
UNLOCK TABLES;

--
-- View structure for view `elements_view`
--
DROP VIEW IF EXISTS `elements_view`;
CREATE VIEW `elements_view` AS
SELECT es.id as elements_set_id, e.name, e.symbol, e.atomic_number
from elements_elements_set ees join elements e on ees.elements_id = e.id
               join elements_set es on es.id = ees.elements_set_id;

--
-- Table structure for table `case_study`
--

DROP TABLE IF EXISTS `case_study`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `case_study` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `fulltext_index` (`name`,`url`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `case_study`
--

LOCK TABLES `case_study` WRITE;
/*!40000 ALTER TABLE `case_study` DISABLE KEYS */;
INSERT INTO `case_study` VALUES (1,0,'<p>Sample Case Study</p>\r\n','https://intersect.org.au/');
/*!40000 ALTER TABLE `case_study` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL,
  `contact_position` varchar(255) NOT NULL,
  `title` varchar(25) NOT NULL,
  `technique_contact` bit(1) NOT NULL,
  `location_id` bigint(20) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK38B7242092368C73` (`location_id`),
  FULLTEXT KEY `fulltext_index` (`name`,`contact_position`,`telephone`,`email`),
  CONSTRAINT `FK38B7242092368C73` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1, 1, 'MQ GeoAnalytical Contact Position','MQ GeoAnalytical Contact Title','',1,'+61 (2) 9850 4402','mqga@mq.edu.au','MQ GeoAnalytical Contact Name'),
(2, 1, 'Centre Director','Centre Director','',2,'+61 8 9266 2108','DirectorJdLC@curtin.edu.au','Prof. Brent McInnes'),
(3, 1, 'School Operations Officer','School Operations Officer','',3,'+61 3 8344 9395','jmcook@unimelb.edu.au','Joanne Patton');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL,
  `priority` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `center_name` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `institution` (`institution`),
  FULLTEXT KEY `fulltext_index` (`institution`,`center_name`,`address`,`state`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,1,1,'ND','10 Sir Christopher Ondaatje Ave, Room 205 Macquarie University NSW 2109','MQ GeoAnalytical','NSW','Macquarie University'),
(2,1,1,'ND','Building 301 Curtin University Bentley WA 6102','John de Laeter Research Centre','WA','Curtin University'),
(3,1,1,'ND','McCoy Building Corner Swanston & Elgin streets The University of Melbourne Parkville, Vic 3010','The School of Geography, Earth & Atmospheric Sciences','Vic','The University of Melbourne');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL,
  `thumbnail_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `original_id` bigint(20) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `media_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK62F6FE4E62EBA10` (`original_id`),
  KEY `FK62F6FE469B5D915` (`thumbnail_id`),
  FULLTEXT KEY `fulltext_index` (`caption`),
  CONSTRAINT `FK62F6FE469B5D915` FOREIGN KEY (`thumbnail_id`) REFERENCES `media_file` (`id`),
  CONSTRAINT `FK62F6FE4E62EBA10` FOREIGN KEY (`original_id`) REFERENCES `media_file` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES(1, 1, 1, 'ALPHA', 1, 'ALPHA caption', 'image'),
(2, 1, 2, 'CHNS', 2, 'CHNS caption', 'image'),
(3, 1, 3, 'EMP', 3, 'EMP caption', 'image'),
(4, 1, 4, 'FISSION-TRACK', 4, 'FISSION-TRACK caption', 'image'),
(5, 1, 5, 'IRMS', 5, 'IRMS caption', 'image'),
(6, 1, 6, 'K-AR', 6, 'K-AR caption', 'image'),
(7, 1, 7, 'LA-MC-ICP-MS', 7, 'LA-MC-ICP-MS caption', 'image'),
(8, 1, 8, 'LA-XX-ICP-MS', 8, 'LA-XX-ICP-MS caption', 'image'),
(9, 1, 9, 'LU-HF', 9, 'LU-HF caption', 'image'),
(10, 1, 10, 'MAP', 10, 'MAP caption', 'image'),
(11, 1, 11, 'MC-ICP-MS', 11, 'MC-ICP-MS caption', 'image'),
(12, 1, 12, 'MP-AES', 12, 'MP-AES caption', 'image'),
(13, 1, 13, 'NOBLE-GAS', 13, 'NOBLE-GAS caption', 'image'),
(14, 1, 14, 'RE-OS', 14, 'RE-OS caption', 'image'),
(15, 1, 15, 'SF-ICP-MS', 15, 'SF-ICP-MS caption', 'image'),
(16, 1, 16, 'SF-ICP-MS', 16, 'SF-ICP-MS caption', 'image'),
(17, 1, 17, 'SHRIMP', 17, 'SHRIMP caption', 'image'),
(18, 1, 18, 'TIMS', 18, 'TIMS caption', 'image'),
(19, 1, 19, 'U-PB', 19, 'U-PB caption', 'image'),
(20, 1, 20, 'U-TH-SM-HE', 20, 'U-TH-SM-HE caption', 'image'),
(21, 1, 21, 'XRF', 21, 'XRF caption', 'image');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_file`
--

DROP TABLE IF EXISTS `media_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_file` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL,
  `height` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `width` int(11) NOT NULL,
  `mime` varchar(255) NOT NULL,
  `size` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_file`
--

LOCK TABLES `media_file` WRITE;
/*!40000 ALTER TABLE `media_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_file` ENABLE KEYS */;
INSERT INTO `media_file` VALUES (1, 1, 288, 'ALPHA.png', 400, 'image/png', 199140),
(2, 1, 288, 'CHNS.jpg', 400, 'image/jpg', 199140), 
(3, 1, 288, 'EMP.jpg', 400, 'image/jpg', 199140), 
(4, 1, 288, 'FISSION-TRACK.webp', 400, 'image/webp', 199140), 
(5, 1, 288, 'IRMS.jpg', 400, 'image/jpg', 199140), 
(6, 1, 288, 'K-AR.png', 400, 'image/png', 199140), 
(7, 1, 288, 'LA-MC-ICP-MS.jpg', 400, 'image/jpg', 199140), 
(8, 1, 288, 'LA-XX-ICP-MS.jpg', 400, 'image/jpg', 199140), 
(9, 1, 288, 'LU-HF.gif', 400, 'image/gif', 199140), 
(10, 1, 288, 'MAP.jpg', 400, 'image/jpg', 199140), 
(11, 1, 288, 'MC-ICP-MS.jpg', 400, 'image/jpg', 199140), 
(12, 1, 288, 'MP-AES.webp', 400, 'image/webp', 199140), 
(13, 1, 288, 'NOBLE-GAS.png', 400, 'image/png', 199140), 
(14, 1, 288, 'RE-OS.jpg', 400, 'image/jpg', 199140), 
(15, 1, 288, 'SF-ICP-MS.jpg', 400, 'image/jpg', 199140), 
(16, 1, 288, 'SF-ICP-MS.webp', 400, 'image/webp', 199140), 
(17, 1, 288, 'SHRIMP.jpg', 400, 'image/jpg', 199140), 
(18, 1, 288, 'TIMS.jpg', 400, 'image/jpg', 199140), 
(19, 1, 288, 'U-PB.gif', 400, 'image/gif', 199140), 
(20, 1, 288, 'U-TH-SM-HE.jpg', 400, 'image/jpg', 199140), 
(21, 1, 288, 'XRF.jpg', 400, 'image/png', 199140); 
UNLOCK TABLES;

--
-- Table structure for table `media_in_section`
--

DROP TABLE IF EXISTS `media_in_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_in_section` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL,
  `technique_id` bigint(20) NOT NULL,
  `priority` int(11) NOT NULL,
  `media_id` bigint(20) NOT NULL,
  `section` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKA1C10D0662953801` (`technique_id`),
  KEY `FKA1C10D061DF1B01` (`media_id`),
  CONSTRAINT `FKA1C10D061DF1B01` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`),
  CONSTRAINT `FKA1C10D0662953801` FOREIGN KEY (`technique_id`) REFERENCES `technique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_in_section`
--

LOCK TABLES `media_in_section` WRITE;
/*!40000 ALTER TABLE `media_in_section` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_in_section` ENABLE KEYS */;
INSERT INTO `media_in_section` VALUES (10, 1, 10, 1, 15, 'LIST'),
(16, 1, 16, 1, 11, 'LIST'),
(17, 1, 17, 1, 11, 'LIST'),
(18, 1, 18, 1, 11, 'LIST'),
(19, 1, 19, 1, 11, 'LIST'),
(20, 1, 20, 1, 11, 'LIST'),
(21, 1, 21, 1, 16, 'LIST'),
(22, 1, 22, 1, 16, 'LIST'),
(23, 1, 23, 1, 18, 'LIST'),
(24, 1, 24, 1, 18, 'LIST'),
(25, 1, 25, 1, 5, 'LIST'),
(26, 1, 26, 1, 12, 'LIST'),
(27, 1, 27, 1, 17, 'LIST'),
(28, 1, 28, 1, 13, 'LIST'),
(29, 1, 29, 1, 13, 'LIST'),
(30, 1, 30, 1, 13, 'LIST'),
(31, 1, 31, 1, 13, 'LIST'),
(32, 1, 32, 1, 13, 'LIST'),
(33, 1, 33, 1, 13, 'LIST'),
(34, 1, 34, 1, 21, 'LIST'),
(35, 1, 35, 1, 21, 'LIST'),
(36, 1, 36, 1, 3, 'LIST'),
(37, 1, 37, 1, 1, 'LIST'),
(38, 1, 38, 1, 2, 'LIST'),
(39, 1, 39, 1, 2, 'LIST'),
(40, 1, 40, 1, 4, 'LIST'),
(49, 1, 49, 1, 5, 'LIST'),
(50, 1, 50, 1, 11, 'LIST'),
(51, 1, 51, 1, 5, 'LIST'),
(52, 1, 52, 1, 5, 'LIST');
UNLOCK TABLES;

--
-- Table structure for table `option_choice`
--

DROP TABLE IF EXISTS `option_choice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `option_choice` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL,
  `priority` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `science` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `fulltext_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `option_choice`
--

LOCK TABLES `option_choice` WRITE;
/*!40000 ALTER TABLE `option_choice` DISABLE KEYS */;
INSERT INTO `option_choice` VALUES (71,0,1,'Age Determination','STEP1','GEOCHEM'),
(72,0,1,'Elemental Composition','STEP1','GEOCHEM'),
(73,0,1,'Isotopic Analysis','STEP1','GEOCHEM'),
(74,0,1,'Spot Analysis','STEP2','GEOCHEM'),
(75,0,1,'Whole Rock or Mineral Separates','STEP2','GEOCHEM'),
/* (76,0,1,'I don''t know','STEP2','GEOCHEM'), */
(77,0,1,'Phy Left Option 1','LEFT','PHYSICS'),
(78,0,1,'Phy Right Option 1','RIGHT','PHYSICS'),
(79,0,2,'Phy Right Option 2','RIGHT','PHYSICS');
/*!40000 ALTER TABLE `option_choice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `option_combination`
--

DROP TABLE IF EXISTS `option_combination`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `option_combination` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL,
  `technique_id` bigint(20) NOT NULL,
  `priority` int(11) NOT NULL,
  `left_id` bigint(20) NOT NULL,
  `right_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKB65D1A05C1C49DE1` (`left_id`),
  KEY `FKB65D1A0568DDC7AC` (`right_id`),
  KEY `FKB65D1A0562953801` (`technique_id`),
  CONSTRAINT `FKB65D1A0562953801` FOREIGN KEY (`technique_id`) REFERENCES `technique` (`id`),
  CONSTRAINT `FKB65D1A0568DDC7AC` FOREIGN KEY (`right_id`) REFERENCES `option_choice` (`id`),
  CONSTRAINT `FKB65D1A05C1C49DE1` FOREIGN KEY (`left_id`) REFERENCES `option_choice` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1958 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `option_combination`
--

LOCK TABLES `option_combination` WRITE;
/*!40000 ALTER TABLE `option_combination` DISABLE KEYS */;
INSERT INTO `option_combination` VALUES(NULL, 1, 10, 0, 72, 74), (NULL, 1, 10, 0, 72, 75),
(NULL, 1, 11, 0, 72, 74), (NULL, 1, 11, 0, 72, 75),
(NULL, 1, 12, 0, 72, 74), (NULL, 1, 12, 0, 72, 75),
(NULL, 1, 13, 0, 72, 74), (NULL, 1, 13, 0, 72, 75),
(NULL, 1, 14, 0, 72, 74), (NULL, 1, 14, 0, 72, 75),
(NULL, 1, 15, 0, 72, 75),
(NULL, 1, 16, 0, 73, 75),
(NULL, 1, 17, 0, 73, 75),
(NULL, 1, 18, 0, 73, 75),
(NULL, 1, 19, 0, 73, 75),
(NULL, 1, 20, 0, 73, 75),
(NULL, 1, 21, 0, 72, 75),
(NULL, 1, 22, 0, 72, 75),
(NULL, 1, 23, 0, 73, 75),
(NULL, 1, 24, 0, 73, 75),
(NULL, 1, 25, 0, 73, 75),
(NULL, 1, 26, 0, 72, 75),
(NULL, 1, 27, 0, 73, 75),
(NULL, 1, 28, 0, 71, 74), (NULL, 1, 28, 0, 71, 75),
(NULL, 1, 29, 0, 71, 74), (NULL, 1, 29, 0, 71, 75),
(NULL, 1, 30, 0, 71, 74), (NULL, 1, 30, 0, 71, 75),
(NULL, 1, 31, 0, 71, 75),
(NULL, 1, 32, 0, 71, 74), (NULL, 1, 32, 0, 71, 75),
(NULL, 1, 33, 0, 71, 74), (NULL, 1, 33, 0, 71, 75),
(NULL, 1, 34, 0, 72, 75),
(NULL, 1, 35, 0, 72, 75),
(NULL, 1, 36, 0, 72, 75),
(NULL, 1, 37, 0, 72, 75),
(NULL, 1, 38, 0, 72, 75),
(NULL, 1, 39, 0, 72, 75),
(NULL, 1, 50, 0, 73, 75),
(NULL, 1, 51, 0, 73, 75),
(NULL, 1, 52, 0, 73, 75);
/*!40000 ALTER TABLE `option_combination` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pending_email_confirmation`
--

DROP TABLE IF EXISTS `pending_email_confirmation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pending_email_confirmation` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL,
  `timestamp` datetime NOT NULL,
  `user_token` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `email_address` varchar(80) COLLATE utf8_bin NOT NULL,
  `confirmation_token` varchar(80) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `emailconf_token_Idx` (`confirmation_token`),
  KEY `emailconf_timestamp_Idx` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pending_email_confirmation`
--

LOCK TABLES `pending_email_confirmation` WRITE;
/*!40000 ALTER TABLE `pending_email_confirmation` DISABLE KEYS */;
/*!40000 ALTER TABLE `pending_email_confirmation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `full_reference` varchar(2048) NOT NULL,
  `reference_names` varchar(255) NOT NULL,
  `url` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `fulltext_index` (`reference_names`,`title`,`full_reference`,`url`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (24,0,'<p>Reference Title</p>\r\n','<p>Detailed Reference Text</p>\r\n','Sample Reference','http://micro.org.au/');
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL,
  `authority` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `authority` (`authority`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,16,'ROLE_SUPER','Super administrator'),(2,33,'ROLE_ADMIN','Administrator');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_people`
--

DROP TABLE IF EXISTS `role_people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_people` (
  `role_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `FK28B75E787F3750EF` (`role_id`),
  KEY `FK28B75E78246214CF` (`user_id`),
  CONSTRAINT `FK28B75E78246214CF` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK28B75E787F3750EF` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_people`
--

LOCK TABLES `role_people` WRITE;
/*!40000 ALTER TABLE `role_people` DISABLE KEYS */;
INSERT INTO `role_people` VALUES (2,1);
/*!40000 ALTER TABLE `role_people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `static_content`
--

DROP TABLE IF EXISTS `static_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `static_content` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL,
  `text` longtext NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `static_content`
--

LOCK TABLES `static_content` WRITE;
/*!40000 ALTER TABLE `static_content` DISABLE KEYS */;
INSERT INTO `static_content` VALUES (1,7,'<h1>Find the instruments and facilities to fit your research project</h1>\r\n\r\n<p>Use AGN Laborarory Finder to identify and understand the analysis techniques available to researchers through Australian Geochemistry Network. You will find the contact details of our expert staff for each technique. They can provide you with all the information you need and guide you through the planning, training, data collection and interpretation stages of your experiments.</p>\r\n','tf.home.quickGuide'),
(2,3,'','tf.home.optionsExplanation'),
(7,1,'<h1>Choices for Experimental Procedures</h1>\r\n\r\n<p>Choose the type of machine you to want to use.</p>\r\n','tf.expProcChoices.quickGuide'),
(11,0,'If you know what you want to explore, type it into the search box and click \'go\'.','tf.home.searchExplanation'),
(12,9,'<p>Unused</p>\r\n','tf.menu'),
(13,1,'This list shows the techniques currently available at Australian Geochemistry Network.','tf.home.allTechniquesExplanation'),
(14,15,'<div style=\"position:absolute; top:55px\"></img></div>\r\n','tf.home.infoboxContent'),
(15,0,'','tf.tracking.intersect'),
(16,3,'','tf.tracking.ammrf'),
(17,3,'<h1>\r\n	Geochemical Analysis</h1>\r\n<p>\r\n	The choices offered below are based on the fact that many experiments in the geochemical sciences involve the interaction or relationship of two things.</p>\r\n<p>\r\n	Choose one item from each list to see what techniques could help in your experiment.</p>\r\n','tf.geochemChoices.quickGuide'),
(18,5,'<p>then</p>\r\n','tf.geochemChoices.comparison.title'),
(19,2,'Step 1: Choose a research interest\r\n','tf.geochemChoices.step1.title'),
(20,2,'Step 2: Type of analysis', 'tf.geochemChoices.step2.title' ),
(21,2,'Step 3: Choose elements\r\n','tf.geochemChoices.step3.title');


/*!40000 ALTER TABLE `static_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table 'technique_metadata'
--
DROP TABLE IF EXISTS `technique_metadata`;
CREATE TABLE `technique_metadata` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `category_type` varchar(255) NOT NULL,
  `analysis_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);
LOCK TABLES `technique_metadata` WRITE;
INSERT INTO `technique_metadata` VALUES
(1,'LA-ICP-MS','Elemental Composition','Spot Analysis'),
(2,'LA-SF-ICP-MS','Elemental Composition','Spot Analysis'),
(3,'Electron Micro Probe','Elemental Composition','Spot Analysis'),
(4,'SHRIMP','Elemental Composition','Spot Analysis'),
(5,'XRF','Elemental Composition','Spot Analysis'),
(6,'Fourier Transform InfraRed ','Elemental Composition','Spot Analysis'),
(7,'Raman','Elemental Composition','Spot Analysis'),
(8,'Scanning Electron Microscope','Elemental Composition','Spot Analysis'),
(9,'Q-ICP-MS /Q3-ICP-MS','Elemental Composition','Whole Rock or Mineral Separates'),
(10,'SF-ICP-MS','Elemental Composition','Whole Rock or Mineral Separates'),
(11,'CHNS elemental analyser','Elemental Composition','Whole Rock or Mineral Separates'),
(12,'MP-AES','Elemental Composition','Whole Rock or Mineral Separates'),
(13,'Alpha counter','Elemental Composition','Whole Rock or Mineral Separates'),
(14,'XRF','Elemental Composition','Whole Rock or Mineral Separates'),
(15,'LA-MC-ICP-MS','Isotopic Analysis','Spot Analysis'),
(16,'Helix','Isotopic Analysis','Spot Analysis'),
(17,'SHRIMP','Isotopic Analysis','Spot Analysis'),
(18,'LA-SF-ICP-MS','Isotopic Analysis','Spot Analysis'),
(19,'MC-ICP-MS','Isotopic Analysis','Whole Rock or Mineral Separates'),
(20,'TIMS','Isotopic Analysis','Whole Rock or Mineral Separates'),
(21,'IRMS','Isotopic Analysis','Whole Rock or Mineral Separates'),
(22,'SF-ICP-MS','Isotopic Analysis','Whole Rock or Mineral Separates'),
(23,'Helix','Isotopic Analysis','Whole Rock or Mineral Separates'),
(24,'U-Pb system','Age Determination','Spot Analysis'),
(25,'Fission track','Age Determination','Spot Analysis'),
(26,'U-Th-Sm/He','Age Determination','Spot Analysis'),
(27,'K-Ar','Age Determination','Spot Analysis'),
(28,'Lu-Hf','Age Determination','Spot Analysis'),
(29,'Rb-Sr','Age Determination','Spot Analysis'),
(30,'U-Pb-Th','Age Determination','Whole Rock or Mineral Separates'),
(31,'Re-Os','Age Determination','Whole Rock or Mineral Separates'),
(32,'Sm-Nd','Age Determination','Whole Rock or Mineral Separates'),
(33,'Carbon','Age Determination','Whole Rock or Mineral Separates'),
(34,'Ar-Ar','Age Determination','Whole Rock or Mineral Separates'),
(35,'Lu-Hf','Age Determination','Whole Rock or Mineral Separates'),
(36,'Rb-Sr','Age Determination','Whole Rock or Mineral Separates'),
(37,'Pb-Pb','Age Determination','Whole Rock or Mineral Separates'),
(38,'U-series','Age Determination','Whole Rock or Mineral Separates'),
(101,'Introduction system', 'Introduction system', 'Spot Analysis'),
(102, 'Introduction system', 'Introduction system', 'Both'),
(200, 'Unknown', 'Unknown', 'Both'),
(201, 'Experimental Instrument', 'Experimental Instrument', 'Not applicable'),
(214, 'Noble Gas spectrometer', 'Age Determination', 'Both'),
(215, 'Noble Gas Spectrometer', 'Age Determination', 'Whole Rock or Mineral Separates');
UNLOCK TABLES;

--
-- Table structure for table `technique_metadata_link`
--
DROP TABLE IF EXISTS `technique_metadata_link`;
CREATE TABLE `technique_metadata_link` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `technique_metadata_id` bigint(20) NOT NULL, 
  `technique_id` bigint(20) NOT NULL, 
  PRIMARY KEY (`id`),
  CONSTRAINT `FK546HF136DC3948BF` FOREIGN KEY (`technique_metadata_id`) REFERENCES `technique_metadata` (`id`),
  CONSTRAINT `FK546HF136DC3948AF` FOREIGN KEY (`technique_id`) REFERENCES `technique` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `technique_metadata_link`
--
LOCK TABLES `technique_metadata_link` WRITE;
INSERT INTO `technique_metadata_link` VALUES(NULL, 101, 1),
(NULL, 101, 2), -- Excimer laser ablation system
(NULL, 101, 3), -- Excimer laser ablation system
(NULL, 101, 4), -- Excimer laser ablation system
(NULL, 101, 5), -- Excimer laser ablation system
(NULL, 101, 6), -- Excimer laser ablation system
(NULL, 101, 7), -- Excimer laser ablation system
(NULL, 102, 8), -- laser fusion/step heating system
(NULL, 102, 9), -- laser fusion/step heating system
(NULL, 10, 10), -- SF-ICP-MS
(NULL, 9, 11), -- Q-ICP-MS
(NULL, 9, 12), -- Q-ICP-MS
(NULL, 9, 13), -- Q-ICP-MS
(NULL, 9, 14), -- Q3-ICP-MS
(NULL, 19, 16), -- MC-ICP-MS
(NULL, 30, 16), -- MC-ICP-MS
(NULL, 31, 16), -- MC-ICP-MS
(NULL, 32, 16), -- MC-ICP-MS
(NULL, 19, 17), -- MC-ICP-MS
(NULL, 30, 17), -- MC-ICP-MS
(NULL, 31, 17), -- MC-ICP-MS
(NULL, 32, 17), -- MC-ICP-MS
(NULL, 19, 18), -- MC-ICP-MS
(NULL, 30, 18), -- MC-ICP-MS
(NULL, 31, 18), -- MC-ICP-MS
(NULL, 32, 18), -- MC-ICP-MS
(NULL, 19, 19), -- MC-ICP-MS
(NULL, 30, 19), -- MC-ICP-MS
(NULL, 31, 19), -- MC-ICP-MS
(NULL, 32, 19), -- MC-ICP-MS
(NULL, 19, 20), -- MC-ICP-MS
(NULL, 30, 20), -- MC-ICP-MS
(NULL, 31, 20), -- MC-ICP-MS
(NULL, 32, 20), -- MC-ICP-MS
(NULL, 10, 21), -- SF-ICP-MS
(NULL, 22, 21), -- SF-ICP-MS
(NULL, 10, 22), -- SF-ICP-MS
(NULL, 22, 22), -- SF-ICP-MS
(NULL, 20, 23), -- TIMS
(NULL, 31, 23), -- TIMS
(NULL, 20, 24), -- TIMS
(NULL, 31, 24), -- TIMS
(NULL, 21, 25), -- IRMS
(NULL, 12, 26), -- MP-AES
(NULL, 4, 27), -- SIMS
(NULL, 17, 27), -- SIMS
(NULL, 24, 27), -- SIMS
(NULL, 214, 28), -- Noble gas spectrometer
(NULL, 214, 29), -- Noble gas spectrometer
(NULL, 214, 30), -- Noble gas spectrometer
(NULL, 214, 31), -- Noble gas spectrometer
(NULL, 214, 32), -- Noble gas spectrometer
(NULL, 214, 33), -- Noble gas spectrometer
(NULL, 5, 34), -- XRF
(NULL, 14,34), -- XRF
(NULL, 5, 35), -- XRF
(NULL, 14, 35), -- XRF
(NULL, 3, 36), -- EMP
(NULL, 13, 37), -- alpha counter
(NULL, 11, 38), -- CHNS
(NULL, 11, 39), -- CHNS
(NULL, 25, 40), -- Microscope
(NULL, 201, 41), -- Griggs Press
(NULL, 201, 42), -- Piston cylinder
(NULL, 201, 43), -- Piston cylinder
(NULL, 201, 44), -- Multi-anvil press
(NULL, 201, 45), -- Multi-anvil press
(NULL, 201, 46), -- Multi-anvil press
(NULL, 201, 47), -- Diamond-anvil press
(NULL, 7, 48), -- Raman microscope
(NULL, 6, 49), -- Microscope
(NULL, 19, 50), -- MC-ICP-MS
(NULL, 30, 50), -- MC-ICP-MS
(NULL, 31, 50), -- MC-ICP-MS
(NULL, 32, 50), -- MC-ICP-MS
(NULL, 21, 51), -- IRMS
(NULL, 21, 52); -- IRMS
UNLOCK TABLES;


--
-- Table structure for table `technique`
--
DROP TABLE IF EXISTS `technique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `technique` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,  /* Name of the technique */
  `instrument_name` varchar(255) NOT NULL, /* Type of instrument primary instrument */
  `model` varchar(255), 
  `manufacturer` varchar(255), /* Brand of the instrument */
  `sample_type` varchar(255),    /* type of samples */
  `wavelength` varchar(63),
  `beam_diameter` varchar(63),
  `min_conc` varchar(63),
  `mass` varchar(63),
  `volume` varchar(63),
  `pressure` varchar(63),
  `temperature` varchar(63),
  `ext_reference` varchar(255),
  `summary` longtext, /* short description of the technique */
  `description` longtext NOT NULL, /* a full description of the technique */
  `keywords` longtext NOT NULL,
  `version` bigint(20) NOT NULL,
  `alternative_names` longtext NOT NULL,
  `elements_set_id` bigint(20),
  PRIMARY KEY (`id`),
  UNIQUE KEY `model` (`model`),
  FULLTEXT KEY `fulltext_index` (`name`,`instrument_name`,`model`,`manufacturer`,`sample_type`,`alternative_names`,`summary`,`description`,`keywords`),
  KEY `FK586GF5919AE409C5` (`elements_set_id`),
  CONSTRAINT `FK746HF636DC3948AE` FOREIGN KEY (`elements_set_id`) REFERENCES `elements_set` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technique`
--

LOCK TABLES `technique` WRITE;
/*!40000 ALTER TABLE `technique` DISABLE KEYS */;
INSERT INTO `technique` VALUES(1,'Introduction system','Excimer laser ablation system','RESOlution SE S-155','Resonetics-Australian Scientific Instruments','Polished section','193 nm','2-300 µm','','','','',' ','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 1),
(2,'Introduction system','Excimer laser ablation system','RESOlution SE M-50A','Resonetics-Australian Scientific Instruments','Polished section','193 nm','2-300 µm','','','','','','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 1),
(3,'Introduction system','Excimer laser ablation system','Analyte G2','Photon Machines Inc.','Polished section','193 nm','1-400 µm','','','','','','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 1),
(4,'Introduction system','Excimer laser ablation system','Analyte LSX-213','Photon Machines Inc.','Polished section','213 nm','4-200 µm','','','','','','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 1),
(5,'Introduction system','Excimer laser ablation system','Analyte 198-FS','Photon Machines Inc.','Polished section','198 nm','','','','','','','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 1),
(6,'Introduction system','Excimer laser ablation system','Analyte Excite','Photon Machines Inc.','Polished section','193 nm','1-150 µm','','','','','','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 1),
(7,'Introduction system','Excimer laser ablation system','Lambda Physik','OPTEX laser','Polished section','193 nm','','','','','','','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 1),
(8,'Introduction system','laser fusion/step heating system','Firestar Series V40 CO2 laser','Synrad','Solid','10600 nm','2500 µm','','','','','','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 2),
(9,'Introduction system','laser fusion/step heating system','Fusions 10.6 CO2 laser','Photon Machines Inc.','Solid','10600 nm','125-6000 µm','','','','','','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 2),
(10,'SF-ICP-MS','SF-ICP-MS','Element-XR','Thermo-Fisher Scientific','Liquid','','','10 ppb','','','','','','Summary of SF-ICP-MS','Description of SF-ICP-MS','Keywords of SF-ICP-MS',1,'Alternative names for SF-ICP-MS', 3),
(11,'Q-ICP-MS','Q-ICP-MS','Quadrupole ICPMS 7700 ','Agilent','Introduction system','','','10 ppb','','','','','','Summary of Q-ICP-MS','Description of Q-ICP-MS','Keywords of Q-ICP-MS',1,'Alternative names for Q-ICP-MS', 4),
(12,'Q-ICP-MS','Q-ICP-MS','Quadrupole ICPMS 7700x','Agilent','Introduction system','','','10 ppb','','','','','','Summary of Q-ICP-MS','Description of Q-ICP-MS','Keywords of Q-ICP-MS',1,'Alternative names for Q-ICP-MS', 4),
(13,'Q-ICP-MS','Q-ICP-MS','Quadrupole ICPMS 7500','Agilent','Introduction system','','','10 ppb','','','','','','Summary of Q-ICP-MS','Description of Q-ICP-MS','Keywords of Q-ICP-MS',1,'Alternative names for Q-ICP-MS', 4),
(14,'Q3-ICP-MS','Q3-ICP-MS','Triple Quadrupole (Q3) ICP-MS 8900','Agilent','Introduction system','','','10 ppb','','','','','','Summary of Q3-ICP-MS','Description of Q3-ICP-MS','Keywords of Q3-ICP-MS',1,'Alternative names for Q3-ICP-MS', 5),
(15,'ICP-MS','ICP-MS','MAP-MS-215/50','Mass Analyser Products','Liquid','','','10 ppb','','','','','','Summary of ICP-MS','Description of ICP-MS','Keywords of ICP-MS',1,'Alternative names for ICP-MS', NULL),
(16,'MC-ICP-MS','MC-ICP-MS','Plasma 1','Nu Instruments Ltd','Liquid','','','1 ppb','','','','','','Summary of MC-ICP-MS','Description of MC-ICP-MS','Keywords of MC-ICP-MS',1,'Alternative names for MC-ICP-MS', 6),
(17,'MC-ICP-MS','MC-ICP-MS','Plasma 2','Nu Instruments Ltd','Liquid','','','1 ppb','','','','','','Summary of MC-ICP-MS','Description of MC-ICP-MS','Keywords of MC-ICP-MS',1,'Alternative names for MC-ICP-MS', 6),
(18,'MC-ICP-MS','MC-ICP-MS','Plasma 3','Nu Instruments Ltd','Liquid','','','1 ppb','','','','','','Summary of MC-ICP-MS','Description of MC-ICP-MS','Keywords of MC-ICP-MS',1,'Alternative names for MC-ICP-MS', 6),
(19,'MC-ICP-MS','MC-ICP-MS','Plasma Sapphire','Nu Instruments Ltd','Liquid','','','1 ppb','','','','','','Summary of MC-ICP-MS','Description of MC-ICP-MS','Keywords of MC-ICP-MS',1,'Alternative names for MC-ICP-MS', 6),
(20,'MC-ICP-MS','MC-ICP-MS','Neptune Plus','Thermo-Fisher Scientific','Liquid','','','1 ppb','','','','','','Summary of MC-ICP-MS','Description of MC-ICP-MS','Keywords of MC-ICP-MS',1,'Alternative names for MC-ICP-MS', 6),
(21,'SF-ICP-MS','SF-ICP-MS','Plasma Attom','Nu Instruments Ltd','Liquid','','','1 ppb','','','','','','Summary of SF-ICP-MS','Description of SF-ICP-MS','Keywords of SF-ICP-MS',1,'Alternative names for SF-ICP-MS', 3),
(22,'SF-ICP-MS','SF-ICP-MS','Plasma Attom-ES','Nu Instruments Ltd','Liquid','','','1 ppb','','','','','','Summary of SF-ICP-MS','Description of SF-ICP-MS','Keywords of SF-ICP-MS',1,'Alternative names for SF-ICP-MS', 3),
(23,'TIMS','TIMS','Triton','Thermo Finnigan','Liquid','','','1 ppb','','','','','','Summary of TIMS','Description of TIMS','Keywords of TIMS',1,'Alternative names for TIMS', 13),
(24,'TIMS','TIMS','Triton Plus','Thermo Finnigan','Liquid','','','1 ppb','','','','','','Summary of TIMS','Description of TIMS','Keywords of TIMS',1,'Alternative names for TIMS', 13),
(25,'IRMS','Stable Isotope Ratio Mass Spectrometer','MAT 253+ with EBEX','Thermo Finnigan','Liquid','','','','','','','','','Summary of IRMS','Description of IRMS','Keywords of IRMS',1,'Alternative names for IRMS', 14),
(26,'MP-AES','MP-AES','Agilent 4200','Agilent','Liquid','','','','','','','','','Summary of AES','Description of AES','Keywords of AES',1,'Alternative names for AES', 9),
(27,'SIMS','SHRIMP','SHRIMP 2','Australian Scientific Instruments','Thin_polished section','','','10 ppt','','','','','','Summary of SIMS','Description of SIMS','Keywords of SIMS',1,'Alternative names for SIMS', 16),
(28,'Noble gas mass spectrometer','MC-MS-Noble Gas (Ar)','Argus VI','Thermo-Fisher Scientific','Solid','','','','','','','','','Summary of Noble gas mass spectrometer','Description of Noble gas mass spectrometer','Keywords of Noble gas mass spectrometer',1,'Alternative names for Noble gas mass spectrometer', 17),
(29,'Noble gas mass spectrometer','MS-Noble Gas (Ar)','VG3600','VG Instruments','Solid','','','','','','','','','Summary of Noble gas mass spectrometer','Description of Noble gas mass spectrometer','Keywords of Noble gas mass spectrometer',1,'Alternative names for Noble gas mass spectrometer', 18),
(30,'Noble gas mass spectrometer','MS-Noble Gas (Ar)','MM5400','Micromass','Solid','','','','','','','','','Summary of Noble gas mass spectrometer','Description of Noble gas mass spectrometer','Keywords of Noble gas mass spectrometer',1,'Alternative names for Noble gas mass spectrometer', 18),
(31,'Noble gas mass spectrometer','Step-heating (Ar)','Low-blank argon extraction furnace TC-9','Modifications Ltd.','Solid','','','','','','','','','Summary of Noble gas mass spectrometer','Description of Noble gas mass spectrometer','Keywords of Noble gas mass spectrometer',1,'Alternative names for Noble gas mass spectrometer', 19),
(32,'Noble gas mass spectrometer','QMS ( Noble Gas-He)','Alphachron','Australian Scientific instruments','Solid','','','','','','','','','Summary of Noble gas mass spectrometer','Description of Noble gas mass spectrometer','Keywords of Noble gas mass spectrometer',1,'Alternative names for Noble gas mass spectrometer', NULL),
(33,'Noble gas mass spectrometer','MS-Noble Gas (He)','Helium extration system with Pfeiffer Prisma MS','Patterson Instruments Ltd / CSIRO','Solid','','','','','','','','','Summary of Noble gas mass spectrometer','Description of Noble gas mass spectrometer','Keywords of Noble gas mass spectrometer',1,'Alternative names for Noble gas mass spectrometer', 20),
(34,'XRF','XRF','M4 Tornado Micro XRF','Bruker','Solid','','','1 %','','','','','','Summary of XRF','Description of XRF','Keywords of XRF',1,'Alternative names for XRF', 21),
(35,'XRF','XRF','Axios 1kW XRF','PANalytical','Solid','','','1 %','','','','','','Summary of XRF','Description of XRF','Keywords of XRF',1,'Alternative names for XRF', 21),
(36,'EMP','EMP','SX-100 Electron microprobe','Cameca','Solid','','','','','','','','','Summary of EMP','Description of EMP','Keywords of EMP',1,'Alternative names for EMP', 22),
(37,'alpha counter','alpha counter','Alpha Particle counter','Ortec','Solid','','','1 ppm','','','','','','Summary of alpha counter','Description of alpha counter','Keywords of alpha counter',1,'Alternative names for alpha counter', 23),
(38,'Elemental Analyser CHNS','Elemental Analyser CHNS','Vario EL Cube','Elementar','Solid','','','','10-1000 mg','','','','','Summary of Elemental Analyser CHNS','Description of Elemental Analyser CHNS','Keywords of Elemental Analyser CHNS',1,'Alternative names for Elemental Analyser CHNS', 24),
(39,'Elemental Analyser CHNS','Elemental Analyser CHNS','EA3000','EuroEA','Solid','','','','1-50 mg','','','','','Summary of Elemental Analyser CHNS','Description of Elemental Analyser CHNS','Keywords of Elemental Analyser CHNS',1,'Alternative names for Elemental Analyser CHNS', 24),
(40,'Automated fission track counting system','Automated fission track counting system','Autoscan Deluxe w. ZEISS M2m Microscope','AutoScan','Solid','','','','','','','','','Summary of Automated fission track counting system','Description of Automated fission track counting system','Keywords of Automated fission track counting system',1,'Alternative names for Automated fission track counting system', 25),
(41,'Experimental instrument','Griggs press','Griggs apparatus','n/a','','','','','','150','3','1600','','Summary of Experimental instrument','Description of Experimental instrument','Keywords of Experimental instrument',1,'Alternative names for Experimental instrument', 26),
(42,'Experimental instrument','Piston cylinder','piston-cylinder apparatus','n/a','','','','','','','6','2000','','Summary of Experimental instrument','Description of Experimental instrument','Keywords of Experimental instrument',1,'Alternative names for Experimental instrument', 27),
(43,'Experimental instrument','Piston cylinder','rapid-quench piston-cylinder apparatus','GUKO Sondermaschinenbau','','','','','','','6','2000','','Summary of Experimental instrument','Description of Experimental instrument','Keywords of Experimental instrument',1,'Alternative names for Experimental instrument', 27),
(44,'Experimental instrument','Multi-anvil press','multi-anvil apparatus','Bristol University','','','','','','10','20','2200','','Summary of Experimental instrument','Description of Experimental instrument','Keywords of Experimental instrument',1,'Alternative names for Experimental instrument', 28),
(45,'Experimental instrument','Multi-anvil press','MAX2003','Voggenreiter GmbH','','','','','','10','20','2200','','Summary of Experimental instrument','Description of Experimental instrument','Keywords of Experimental instrument',1,'Alternative names for Experimental instrument', 28),
(46,'Experimental instrument','Multi-anvil press',' Walker module - 1000 ton-press','Voggenreiter GmbH','','','','','','10','20','2200','','Summary of Experimental instrument','Description of Experimental instrument','Keywords of Experimental instrument',1,'Alternative names for Experimental instrument', 28),
(47,'Experimental instrument','Diamond-anvil press','diamond-anvil cell apparatus','constructed in house','','','','','','','100-600','1500-6000','','Summary of Experimental instrument','Description of Experimental instrument','Keywords of Experimental instrument',1,'Alternative names for Experimental instrument', 29),
(48,'Experimental instrument','Raman microscope','LABRAM HR Evolution','Horiba','','','','','','','','','','Summary of Experimental instrument','Description of Experimental instrument','Keywords of Experimental instrument',1,'Alternative names for Experimental instrument', 30),
(49,'Fourier Transform IR microscope','Fourier Transform IR microscope','iN10','Thermo-Fisher Scientific','','','','','','','','','','Summary of Fourier Transform IR microscope','Description of Fourier Transform IR microscope','Keywords of Fourier Transform IR microscope',1,'Alternative names for Fourier Transform IR microscope', 31),
(50,'MC-ICP-MS','MC-ICP-MS','Neptune','Thermo-Fisher Scientific','Liquid','','','1 ppb','','','','','','Summary of MC-ICP-MS','Description of MC-ICP-MS','Keywords of MC-ICP-MS',1,'Alternative names for MC-ICP-MS', 6),
(51,'IRMS','EA-IRMS','Flash 2000','Thermo-Fisher Scientific','Liquid','','','','','','','','','Summary of IRMS','Description of IRMS','Keywords of IRMS',1,'Alternative names for IRMS', 32),
(52,'IRMS','CG-IRMS','Delta V Advantage IRMS','Thermo-Fisher Scientific','Liquid','','','','','','','','','Summary of IRMS','Description of IRMS','Keywords of IRMS',1,'Alternative names for IRMS', 33);
/*!40000 ALTER TABLE `technique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- View structure for view `technique_view`
--
DROP VIEW IF EXISTS `technique_view`;
CREATE VIEW `technique_view` AS
SELECT t.id as technique_id, m.category_type, m.category, m.analysis_type, t.model, t.manufacturer, t.sample_type,
 t.wavelength, t.beam_diameter, t.min_conc, t.mass, t.volume, t.pressure, t.temperature, t.ext_reference, t.summary,
 t.description, t.keywords, t.version, t.alternative_names, t.elements_set_id
from technique t join technique_metadata_link on t.id = technique_metadata_link.technique_id
               join technique_metadata m on m.id = technique_metadata_link.technique_metadata_id;

--
-- Table structure for table `localisation`
--
DROP TABLE IF EXISTS `localisation`;
CREATE TABLE `localisation` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `location_id` bigint(20) DEFAULT NULL,
  `technique_id` bigint(20) DEFAULT NULL,
  `yr_commissioned` varchar(7),
  `applications` JSON,
  PRIMARY KEY (`id`),
  KEY `FK546GG1519AE409C5` (`location_id`),
  KEY `FK546GH1519AE409C5` (`technique_id`),
  CONSTRAINT `FK546HJ136FC3948AF` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`),
  CONSTRAINT `FK546HJ136EC3948AF` FOREIGN KEY (`technique_id`) REFERENCES `technique` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



LOCK TABLES `localisation` WRITE;
INSERT INTO `localisation` VALUES(NULL, 1, 3,'2013','["geochronology","radiogenic_geochronology","trace_elements","isotopes"]'),
(NULL, 1, 4,'2017','["geochronology","radiogenic_geochronology","trace_elements","isotopes"]'),
(NULL, 1, 5,'2013','["geochronology","radiogenic_geochronology","trace_elements","isotopes"]'),
(NULL, 1, 6,'2015','["geochronology","radiogenic_geochronology","trace_elements","isotopes"]'),
(NULL, 1, 12,'2010','["geochronology","trace_elements"]'),
(NULL, 1, 13,'2004','["geochronology","trace_elements"]'),
(NULL, 1, 14,'2017','["geochronology","radiogenic_geochronology","trace_elements"]'),
(NULL, 1, 16,'2003','["geochronology","radiogenic_geochronology","isotopes"]'),
(NULL, 1, 17,'2015','["geochronology","radiogenic_geochronology","isotopes"]'),
(NULL, 1, 20,'2018','["geochronology","radiogenic_geochronology","isotopes"]'),
(NULL, 1, 21,'2013','["geochronology","radiogenic_geochronology","isotopes"]'),
(NULL, 1, 23,'2005','["geochronology","radiogenic_geochronology","isotopes"]'),
(NULL, 1, 24,'2018','["geochronology","radiogenic_geochronology","isotopes"]'),
(NULL, 1, 25,'2015','["isotopes"]'),
(NULL, 1, 26,'2014','["trace_elements","major_elements"]'),
(NULL, 1, 34,'2017','["isotopes"]'),
(NULL, 1, 35,'2012','["trace_elements","major_elements"]'),
(NULL, 1, 36,'2018','["geochronology"]'),
(NULL, 1, 36,'2005','["geochronology"]'),
(NULL, 1, 37,'n/a','["geochronology","isotopes"]'),
(NULL, 1, 38,'2016','["trace_elements","major_elements"]'),
(NULL, 1, 39,'2015','["trace_elements","major_elements"]'),
(NULL, 1, 41,'n/a','["experimental_petrology"]'),
(NULL, 1, 42,'1976','["experimental_petrology"]'),
(NULL, 1, 43,'2020','["experimental_petrology"]'),
(NULL, 1, 44,'2006','["experimental_petrology"]'),
(NULL, 1, 45,'2019','["experimental_petrology"]'),
(NULL, 1, 46,'2019','["experimental_petrology"]'),
(NULL, 1, 47,'2017','["experimental_petrology"]'),
(NULL, 1, 48,'2008','[]'),
(NULL, 1, 49,'2014','[]'),
(NULL, 2, 1,'2018','["geochronology","trace_elements","isotopes"]'),
(NULL, 2, 1,'2020','["geochronology","trace_elements","isotopes"]'),
(NULL, 2, 2,'2012','["geochronology","radiogenic_geochronology","trace_elements","isotopes"]'),
(NULL, 2, 10,'2013','["trace_elements","isotopes"]'),
(NULL, 2, 10,'2014','["trace_elements","isotopes"]'),
(NULL, 2, 11,'2012','["geochronology","thermochronology","trace_elements","isotopes"]'),
(NULL, 2, 14,'2018','["geochronology","trace_elements","isotopes"]'),
(NULL, 2, 15,'2000','["geochronology","trace_elements","isotopes"]'),
(NULL, 2, 17,'2016','["geochronology","trace_elements","isotopes"]'),
(NULL, 2, 18,'2020','["geochronology","trace_elements","isotopes"]'),
(NULL, 2, 23,'2009','["geochronology","isotopes"]'),
(NULL, 2, 27,'1992','["geochronology","isotopes"]'),
(NULL, 2, 27,'2006','["geochronology","isotopes"]'),
(NULL, 2, 28,'2010','["geochronology"]'),
(NULL, 2, 32,'2010','["thermochronology"]'),
(NULL, 2, 33,'2000','["thermochronology"]'),
(NULL, 2, 40,'2019','["thermochronology"]'),
(NULL, 2, 50,'n/a','["geochronology","radiogenic_geochronology","isotopes"]'),
(NULL, 3, 1,'2016','["geochronology","radiogenic_geochronology","thermochronology","trace_elements","isotopes"]'),
(NULL, 3, 1,'2018','["geochronology","radiogenic_geochronology","thermochronology","trace_elements","isotopes"]'),
(NULL, 3, 7,'2002','["geochronology","thermochronology"]'),
(NULL, 3, 8,'2008','["geochronology","thermochronology"]'),
(NULL, 3, 9,'2012','["geochronology","thermochronology"]'),
(NULL, 3, 11,'2011','["geochronology","trace_elements"]'),
(NULL, 3, 11,'2016','["geochronology","trace_elements"]'),
(NULL, 3, 16,'1998','["geochronology","radiogenic_geochronology","isotopes"]'),
(NULL, 3, 17,'2010','["geochronology","radiogenic_geochronology","isotopes"]'),
(NULL, 3, 19,'2020','["geochronology","radiogenic_geochronology","isotopes"]'),
(NULL, 3, 22,'2017','["geochronology","radiogenic_geochronology","isotopes"]'),
(NULL, 3, 28,'2012','["geochronology","thermochronology"]'),
(NULL, 3, 29,'1993','["geochronology","thermochronology"]'),
(NULL, 3, 30,'2001','["geochronology","thermochronology"]'),
(NULL, 3, 40,'2017','["geochronology","thermochronology"]'),
(NULL, 3, 31,'1993','["geochronology","thermochronology"]'),
(NULL, 2, 51,'n/a','["isotopes"]'),
(NULL, 2, 52,'2012','["isotopes"]'),
(NULL, 2, 52,'2013','["isotopes"]');
UNLOCK TABLES;

--
-- Table structure for table `technique_case_study`
--

DROP TABLE IF EXISTS `technique_case_study`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `technique_case_study` (
  `technique_case_studies_id` bigint(20) DEFAULT NULL,
  `case_study_id` bigint(20) DEFAULT NULL,
  KEY `FK815B95491FA7634A` (`technique_case_studies_id`),
  KEY `FK815B95496B33840` (`case_study_id`),
  CONSTRAINT `FK815B95491FA7634A` FOREIGN KEY (`technique_case_studies_id`) REFERENCES `technique` (`id`),
  CONSTRAINT `FK815B95496B33840` FOREIGN KEY (`case_study_id`) REFERENCES `case_study` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technique_case_study`
--

LOCK TABLES `technique_case_study` WRITE;
/*!40000 ALTER TABLE `technique_case_study` DISABLE KEYS */;
INSERT INTO `technique_case_study` VALUES (17,1),(154,1);
/*!40000 ALTER TABLE `technique_case_study` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technique_contact`
--

DROP TABLE IF EXISTS `technique_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `technique_contact` (
  `technique_contacts_id` bigint(20) DEFAULT NULL,
  `contact_id` bigint(20) DEFAULT NULL,
  KEY `FK546CF1319BE40BC1` (`contact_id`),
  KEY `FK546CF131DC7947AF` (`technique_contacts_id`),
  CONSTRAINT `FK546CF1319BE40BC1` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`),
  CONSTRAINT `FK546CF131DC7947AF` FOREIGN KEY (`technique_contacts_id`) REFERENCES `technique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technique_contact`
--

LOCK TABLES `technique_contact` WRITE;
/*!40000 ALTER TABLE `technique_contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `technique_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technique_review`
--

DROP TABLE IF EXISTS `technique_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `technique_review` (
  `technique_reviews_id` bigint(20) DEFAULT NULL,
  `review_id` bigint(20) DEFAULT NULL,
  KEY `FK4512C4278F70AFA5` (`technique_reviews_id`),
  KEY `FK4512C427E05E27D3` (`review_id`),
  CONSTRAINT `FK4512C4278F70AFA5` FOREIGN KEY (`technique_reviews_id`) REFERENCES `technique` (`id`),
  CONSTRAINT `FK4512C427E05E27D3` FOREIGN KEY (`review_id`) REFERENCES `review` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technique_review`
--

LOCK TABLES `technique_review` WRITE;
/*!40000 ALTER TABLE `technique_review` DISABLE KEYS */;
INSERT INTO `technique_review` VALUES (17,24),(154,24);
/*!40000 ALTER TABLE `technique_review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL,
  `enabled` bit(1) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `second_email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `reset_password_key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,0,'','21232f297a57a5a743894a0e4a801fc3','','admin','Primary super admin account',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-12  4:30:55
