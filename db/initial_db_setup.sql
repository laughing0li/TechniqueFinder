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
INSERT INTO `contact` VALUES (183,0,'Engineering','','',18,'02 8079 2500','help@intersect.org.au','Intersect Australia');
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
INSERT INTO `location` VALUES (1,5,1,'ND','Madsen Building F09, The University of Sydney, NSW 2006','Australian Centre for Microscopy & Microanalysis','NSW','The University of Sydney'),(2,3,2,'ND','The University of Queensland, St. Lucia, QLD 4072','Centre for Microscopy and Microanalysis','QLD','The University of Queensland'),(3,1,3,'ND','The University of Western Australia, 35 Stirling Hwy, Crawley, WA 6009','Centre for Microscopy, Characterisation and Analysis','WA','The University of Western Australia'),(4,0,4,'ND','Chemical Sciences Building (F10), Kensington, UNSW, Sydney, NSW, 2052','Electron Microscope Unit','NSW','The University of New South Wales'),(5,0,5,'ND','RN Robertson BLD, Sullivans Creek Rd, Canberra, ACT, 2601','Centre for Advanced Microscopy ','ACT','The Australian National University'),(6,2,6,'ND','Medical School North, Frome Road, The University of Adelaide, SA, 5005','Adelaide Microscopy','SA','SARF – The University of Adelaide'),(7,0,7,'ND','University of South Australia, Mawson Lakes Campus, Mawson Lakes, SA, 5095','Ian Wark Research Institute ','SA','SARF – University of South Australia'),(8,0,8,'ND','Physical Sciences Building, Sturt Road, Bedford Park, SA, 5042','Flinders Microscopy','SA','SARF – Flinders University'),(11,0,9,'LL','Townsville, QLD, 4811','Advanced Analytical Centre','QLD','James Cook University'),(12,1,10,'LL','2 George Street, Gardens Point Campus,Brisbane, QLD, 4001','Analytical Electron Microscopy Facility ','QLD','Queensland University of Technology'),(13,0,11,'LL','RMIT University, Melbourne, VIC, 3001','RMIT Microscopy and Microanalysis Facility','VIC','RMIT University'),(14,0,12,'LL','5 Portarlington Rd, East Geelong, VIC, 3219 ','AAHL Biosecurity Microscopy Facility (ABMF)','VIC','CSIRO'),(15,0,13,'LL','Sydney, NSW, 2109','Optical Microcharacterisation Facility','NSW','Macquarie University'),(16,0,14,'LL','Kent Street, Bentley, WA 6102','John de Laeter Centre of Mass Spectrometry','WA','Curtin University of Technology'),(17,0,15,'ND','10 Innovation Walk, Clayton Campus\r\nMonash University\r\nVictoria, 3800','Monash Centre for Electron Microscopy','VIC','Monash University'),(18,0,16,'ND','Level 13, 50 Carrington St, Sydney, NSW 2000','Engineering','NSW','Intersect Australia Ltd');
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
INSERT INTO `option_choice` VALUES (71,0,1,'Age','LEFT','BIOLOGY'),
(77,0,1,'Elemental Composition','LEFT','BIOLOGY'),
(78,0,1,'Isotopic Analysis','LEFT','BIOLOGY'),
(72,0,1,'Bio Right Option 1','RIGHT','BIOLOGY'),
(73,0,2,'Bio Right Option 2','RIGHT','BIOLOGY'),
(74,0,1,'Phy Left Option 1','LEFT','PHYSICS'),
(75,0,1,'Phy Right Option 1','RIGHT','PHYSICS'),
(76,0,2,'Phy Right Option 2','RIGHT','PHYSICS');
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
INSERT INTO `option_combination` VALUES (1955,0,17,1,71,72),(1957,0,154,1,74,75);
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
INSERT INTO `static_content` VALUES (1,7,'<h1>Find the techniques and facilities to fit your research project</h1>\r\n\r\n<p>Use TechFi to identify and understand the analysis techniques available to researchers through Australian Geochemistry Network. You will find the contact details of our expert staff for each technique. They can provide you with all the information you need and guide you through the planning, training, data collection and interpretation stages of your experiments.</p>\r\n','tf.home.quickGuide'),
(2,3,'','tf.home.optionsExplanation'),
(3,3,'<h1>\r\n	Choices for biological sciences</h1>\r\n<p>\r\n	The choices offered below are based on the fact that many experiments in the biological sciences involve the interaction or relationship of two things. For instance, you might want to look at the interaction of one protein with another protein, a cell with the extracellular matrix, or possibly one thing within another such as metal ions in the hard tissue of insect teeth or a particular cell type in an organ. There are also options to study the structure, migration or isolation of a single item.</p>\r\n<p>\r\n	Choose one item from each list and then click the Show Possible Techniques button to see what techniques could help in your experiment.</p>\r\n','tf.biologyChoices.quickGuide'),
(4,5,'<p>and</p>\r\n','tf.biologyChoices.comparison.title'),
(5,2,'Step 1: Choose a sample\r\n','tf.biologyChoices.left.title'),
(6,2,'Step 2: Choose another sample\r\n','tf.biologyChoices.right.title'),
(7,1,'<h1>Choices for the physical sciences</h1>\r\n\r\n<p>Choose the type and scale of investigation you want to do.</p>\r\n','tf.physicsChoices.quickGuide'),
(8,0,'<p>at the scale of</p>\r\n','tf.physicsChoices.comparison.title'),
(9,2,'<p>Step 1: Choose a property</p>\r\n','tf.physicsChoices.left.title'),
(10,2,'<p>Step 2: Choose a size scale</p>\r\n','tf.physicsChoices.right.title'),
(11,0,'If you know what you want to explore, type it into the search box and click \'go\'.','tf.home.searchExplanation'),
(12,9,'<p>Unused</p>\r\n','tf.menu'),
(13,1,'This list shows the techniques currently available at the Microscopy Australia.','tf.home.allTechniquesExplanation'),
(14,15,'<div style=\"position:absolute; top:55px\">\r\n<h2>TechFi or industry enquiries:</h2>\r\n\r\n<p><a href=\"mailto:jenny.whiting@micro.org.au\">Dr Jenny Whiting</a><br />\r\nMicroscopy Australia Marketing & Business Development Manager<br />\r\nTel: +61 2 9114 0566<br />\r\n<a href=\"mailto:jenny.whiting@micro.org.au\">jenny.whiting@micro.org.au</a></p>\r\n\r\n<p><img alt=\"TechFi\" src=\"http://micro.org.au/techniquefinder/assets/images/TechFi-2018-Reg-310px.png\" style=\"    bottom: -242px;height: 214px;position: absolute;width: 310px;margin-left: -57px;\" /></p>\r\n</div>\r\n','tf.home.infoboxContent'),
(15,0,'','tf.tracking.intersect'),
(16,3,'','tf.tracking.ammrf'),
(17,3,'<h1>\r\n	Geochemical Analysis</h1>\r\n<p>\r\n	The choices offered below are based on the fact that many experiments in the geochemical sciences involve the interaction or relationship of two things.</p>\r\n<p>\r\n	Choose one item from each list and then click the Show Possible Techniques button to see what techniques could help in your experiment.</p>\r\n','tf.geochemChoices.quickGuide'),
(18,5,'<p>and</p>\r\n','tf.geochemChoices.comparison.title'),
(19,2,'Step 1: Choose a research interest\r\n','tf.geochemChoices.left.title'),
(20,2,'Step 2: Choose elements, isotopic system or minerals\r\n','tf.geochemChoices.right.title');


/*!40000 ALTER TABLE `static_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technique`
--

DROP TABLE IF EXISTS `technique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `technique` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL,
  `summary` longtext NOT NULL,
  `keywords` longtext NOT NULL,
  `description` longtext NOT NULL,
  `name` varchar(255) NOT NULL,
  `alternative_names` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  FULLTEXT KEY `fulltext_index` (`name`,`alternative_names`,`summary`,`description`,`keywords`)
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technique`
--

LOCK TABLES `technique` WRITE;
/*!40000 ALTER TABLE `technique` DISABLE KEYS */;
INSERT INTO `technique` VALUES (17,19,'<p>Shorter&nbsp;f<strong>or</strong><em>ma</em><u>tt</u><span style=\"color:#e74c3c\">able</span> description.</p>\r\n','Example, keywords','<p><span style=\"font-size:18px\">Longer</span> f<strong>or</strong><em>ma</em><u>tt</u><span style=\"color:#e74c3c\">able</span> description.</p>\r\n','Sample Technique','Alternative Sample Technique Name'),(154,0,'<p>Short Description</p>\r\n','keywords, sample','<p>Long&nbsp;Description</p>\r\n','Another Sample Technique','Alternative Technique name');
/*!40000 ALTER TABLE `technique` ENABLE KEYS */;
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
INSERT INTO `technique_contact` VALUES (17,183),(154,183);
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
