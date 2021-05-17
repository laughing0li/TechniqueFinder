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
-- Table structure for table `element_instrument_type`
--
DROP TABLE IF EXISTS `element_instrument_type`;
CREATE TABLE `element_instrument_type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `element_id` bigint(20) NOT NULL,
  `instrument_type_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK38B5242494368I73` (`element_id`),
  KEY `FK38B5242493368Y73` (`instrument_type_id`),
  CONSTRAINT `FK35G8282792068C76` FOREIGN KEY (`element_id`) REFERENCES `element` (`id`),
  CONSTRAINT `FK38G7242492568C76` FOREIGN KEY (`instrument_type_id`) REFERENCES `instrument_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



--
-- Table structure for table `instrument_type`
--
DROP TABLE IF EXISTS `instrument_type`;
CREATE TABLE `instrument_type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

LOCK TABLES `instrument_type` WRITE;
INSERT INTO `instrument_type` VALUES(NULL, 'Excimer laser ablation system'),
(NULL, 'fusion/step heating system'),
(NULL, 'SF-ICP-MS'),
(NULL, 'ICP-MS'),
(NULL, 'MC-ICP-MS'),
(NULL, 'TIMS'),
(NULL, 'Stable Isotope Ratio Mass Spectrometer'),
(NULL, 'MP-AES'),
(NULL, 'SHRIMP'),
(NULL, 'MC-MS-Noble Gas (Ar)'),
(NULL, 'MS-Noble Gas (Ar)'),
(NULL, 'Step-heating (Ar)'),
(NULL, 'MS-Noble Gas (He)'),
(NULL, 'XRF'),
(NULL, 'EMP'),
(NULL, 'alpha counter'),
(NULL, 'Elemental Analyser CHNS'),
(NULL, 'Automated fission track counting system'),
(NULL, 'Griggs press'),
(NULL, 'Piston cylinder'),
(NULL, 'Multi-anvil press'),
(NULL, 'Diamond-anvil press'),
(NULL, 'Raman microscope'),
(NULL, 'Fourrier Transform IR microscope'),
(NULL, 'EA-IRMS'),
(NULL, 'CG-IRMS');
UNLOCK TABLES;
  
-- Table structure for table `elements`
--
DROP TABLE IF EXISTS `elements`;
CREATE TABLE `elements` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL,
  `symbol` varchar(3) NOT NULL,
  `atomic_number` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
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
INSERT INTO `option_choice` VALUES (71,0,1,'Age Determination','STEP1','GEOCHEM'),
(72,0,1,'Elemental Composition','STEP1','GEOCHEM'),
(73,0,1,'Isotopic Analysis','STEP1','GEOCHEM'),
(74,0,1,'In situ','STEP2','GEOCHEM'),
(75,0,1,'Whole Rock','STEP2','GEOCHEM'),
(76,0,1,'I don''t know','STEP2','GEOCHEM'),
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
INSERT INTO `static_content` VALUES (1,7,'<h1>Find the instruments and facilities to fit your research project</h1>\r\n\r\n<p>Use AGN Instrument Finder to identify and understand the analysis techniques available to researchers through Australian Geochemistry Network. You will find the contact details of our expert staff for each technique. They can provide you with all the information you need and guide you through the planning, training, data collection and interpretation stages of your experiments.</p>\r\n','tf.home.quickGuide'),
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
(13,1,'This list shows the techniques currently available at Australian Geochemistry Network.','tf.home.allTechniquesExplanation'),
(14,15,'<div style=\"position:absolute; top:55px\"></img></div>\r\n','tf.home.infoboxContent'),
(15,0,'','tf.tracking.intersect'),
(16,3,'','tf.tracking.ammrf'),
(17,3,'<h1>\r\n	Geochemical Analysis</h1>\r\n<p>\r\n	The choices offered below are based on the fact that many experiments in the geochemical sciences involve the interaction or relationship of two things.</p>\r\n<p>\r\n	Choose one item from each list and then click the Show Possible Techniques button to see what techniques could help in your experiment.</p>\r\n','tf.geochemChoices.quickGuide'),
(18,5,'<p>then</p>\r\n','tf.geochemChoices.comparison.title'),
(19,2,'Step 1: Choose a research interest\r\n','tf.geochemChoices.step1.title'),
(20,2,'Step 2: Type of analysis', 'tf.geochemChoices.step2.title' ),
(21,2,'Step 3: Choose elements, isotopic system or minerals\r\n','tf.geochemChoices.step3.title');


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
INSERT INTO `technique_metadata` VALUES(1,'Introduction system', 'Introduction system', 'In Situ'),
(2, 'Introduction system', 'Introduction system', 'Both'),
(3, 'SF-ICP-MS', 'Elemental Composition', 'Both'),
(4, 'Q-ICP-MS', 'Elemental Composition', 'Both'),
(5, 'Q3-ICP-MS', 'Elemental Composition', 'Both'),
(6, 'ICP-MS', 'Elemental Composition', 'Bulk'),
(7, 'MC-ICP-MS', 'Isotopic Analysis', 'Bulk'),
(8, 'SF-ICP-MS', 'Elemental Composition', 'Bulk'),
(9, 'TIMS', 'Isotopic Analysis', 'Bulk'),
(10, 'IRMS', 'Isotopic Analysis', 'Bulk'),
(11, 'MP-AES', 'Elemental Composition', 'Bulk'),
(12, 'SIMS', 'Isotopic Analysis', 'In situ'),
(13, 'Noble gas mass spectrometer', 'Age Determination', 'Both'),
(14, 'Noble gas mass spectrometer', 'Age Determination', 'Bulk'),
(15, 'XRF', 'Elemental Composition', 'In situ'),
(16, 'EMP', 'Elemental Composition', 'In situ'),
(17, 'alpha counter', 'Elemental Composition', 'Bulk'),
(18, 'Elemental Analyser CHNS', 'Elemental Composition', 'Bulk'),
(19, 'Unknown', 'Unknown', 'Both'),
(20, 'Experimental Instrument', 'Experimental Instrument', 'Unknown');
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
  `analysis_type` varchar(255), /* TEMPORARY! type of analysis */
  `wavelength` varchar(63),
  `beam_diameter` varchar(63),
  `min_conc` varchar(63),
  `technique` varchar(255), /* ?? */
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
  `technique_metadata_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `model` (`model`),
  FULLTEXT KEY `fulltext_index` (`name`,`instrument_name`,`model`,`manufacturer`,`analysis_type`,`sample_type`,`technique`,`alternative_names`,`summary`,`description`,`keywords`),
  KEY `FK546GF1519AE409C5` (`technique_metadata_id`),
  CONSTRAINT `FK546HF136DC3948AF` FOREIGN KEY (`technique_metadata_id`) REFERENCES `technique_metadata` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technique`
--

LOCK TABLES `technique` WRITE;
/*!40000 ALTER TABLE `technique` DISABLE KEYS */;
INSERT INTO `technique` VALUES(1,'Introduction system','Excimer laser ablation system','RESOlution SE S-155','Resonetics-Australian Scientific Instruments','Polished section','In situ','193 nm','2-300 µm','','','','','',' ','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 1),
(2,'Introduction system','Excimer laser ablation system','RESOlution SE M-50A','Resonetics-Australian Scientific Instruments','Polished section','In situ','193 nm','2-300 µm','','','','','','','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 1),
(3,'Introduction system','Excimer laser ablation system','Analyte G2','Photon Machines Inc.','Polished section','In situ','193 nm','1-400 µm','','','','','','','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 1),
(4,'Introduction system','Excimer laser ablation system','Analyte LSX-213','Photon Machines Inc.','Polished section','In situ','213 nm','4-200 µm','','','','','','','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 1),
(5,'Introduction system','Excimer laser ablation system','Analyte 198-FS','Photon Machines Inc.','Polished section','In situ','198 nm','','','','','','','','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 1),
(6,'Introduction system','Excimer laser ablation system','Analyte Excite','Photon Machines Inc.','Polished section','In situ','193 nm','1-150 µm','','','','','','','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 1),
(7,'Introduction system','Excimer laser ablation system','Lambda Physik',' OPTEX laser','Polished section','In situ','193 nm','','','','','','','','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 1),
(8,'Introduction system','laser fusion/step heating system','Firestar Series V40 CO2 laser','Synrad','Solid','Both','10600 nm','2500 µm','','','','','','','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 2),
(9,'Introduction system','laser fusion/step heating system','Fusions 10.6 CO2 laser','Photon Machines Inc.','Solid','Both','10600 nm','125-6000 µm','','','','','','','','Summary of Introduction system','Description of Introduction system','Keywords of Introduction system',1,'Alternative names for Introduction system', 2),
(10,'SF-ICP-MS','SF-ICP-MS','Element-XR','Thermo-Fisher Scientific','Liquid','Both','','','10 ppb','','','','','','','Summary of SF-ICP-MS','Description of SF-ICP-MS','Keywords of SF-ICP-MS',1,'Alternative names for SF-ICP-MS', 3),
(11,'Q-ICP-MS','Q-ICP-MS','Quadrupole ICPMS 7700 ','Agilent','Introduction system','Both','','','10 ppb','','','','','','','Summary of Q-ICP-MS','Description of Q-ICP-MS','Keywords of Q-ICP-MS',1,'Alternative names for Q-ICP-MS', 4),
(12,'Q-ICP-MS','Q-ICP-MS','Quadrupole ICPMS 7700x','Agilent','Introduction system','Both','','','10 ppb','','','','','','','Summary of Q-ICP-MS','Description of Q-ICP-MS','Keywords of Q-ICP-MS',1,'Alternative names for Q-ICP-MS', 4),
(13,'Q-ICP-MS','Q-ICP-MS','Quadrupole ICPMS 7500','Agilent','Introduction system','Both','','','10 ppb','','','','','','','Summary of Q-ICP-MS','Description of Q-ICP-MS','Keywords of Q-ICP-MS',1,'Alternative names for Q-ICP-MS', 4),
(14,'Q3-ICP-MS','Q3-ICP-MS','Triple Quadrupole (Q3) ICP-MS 8900','Agilent','Introduction system','Both','','','10 ppb','','','','','','','Summary of Q3-ICP-MS','Description of Q3-ICP-MS','Keywords of Q3-ICP-MS',1,'Alternative names for Q3-ICP-MS', 5),
(15,'ICP-MS','ICP-MS','MAP-MS-215/50','Mass Analyser Products','Liquid','Bulk','','','10 ppb','','','','','','','Summary of ICP-MS','Description of ICP-MS','Keywords of ICP-MS',1,'Alternative names for ICP-MS', 6),
(16,'MC-ICP-MS','MC-ICP-MS','Plasma 1','Nu Instruments Ltd','Liquid','Bulk','','','1 ppb','','','','','','','Summary of MC-ICP-MS','Description of MC-ICP-MS','Keywords of MC-ICP-MS',1,'Alternative names for MC-ICP-MS', 7),
(17,'MC-ICP-MS','MC-ICP-MS','Plasma 2','Nu Instruments Ltd','Liquid','Bulk','','','1 ppb','','','','','','','Summary of MC-ICP-MS','Description of MC-ICP-MS','Keywords of MC-ICP-MS',1,'Alternative names for MC-ICP-MS', 7),
(18,'MC-ICP-MS','MC-ICP-MS','Plasma 3','Nu Instruments Ltd','Liquid','Bulk','','','1 ppb','','','','','','','Summary of MC-ICP-MS','Description of MC-ICP-MS','Keywords of MC-ICP-MS',1,'Alternative names for MC-ICP-MS', 7),
(19,'MC-ICP-MS','MC-ICP-MS','Plasma Sapphire','Nu Instruments Ltd','Liquid','Bulk','','','1 ppb','','','','','','','Summary of MC-ICP-MS','Description of MC-ICP-MS','Keywords of MC-ICP-MS',1,'Alternative names for MC-ICP-MS', 7),
(20,'MC-ICP-MS','MC-ICP-MS','Neptune Plus','Thermo-Fisher Scientific','Liquid','Bulk','','','1 ppb','','','','','','','Summary of MC-ICP-MS','Description of MC-ICP-MS','Keywords of MC-ICP-MS',1,'Alternative names for MC-ICP-MS', 7),
(21,'ICP-MS','SF-ICP-MS','Plasma Attom','Nu Instruments Ltd','Liquid','Bulk','','','1 ppb','','','','','','','Summary of ICP-MS','Description of ICP-MS','Keywords of ICP-MS',1,'Alternative names for ICP-MS', 8),
(22,'ICP-MS','SF-ICP-MS','Plasma Attom-ES','Nu Instruments Ltd','Liquid','Bulk','','','1 ppb','','','','','','','Summary of ICP-MS','Description of ICP-MS','Keywords of ICP-MS',1,'Alternative names for ICP-MS', 8),
(23,'TIMS','TIMS','Triton','Thermo Finnigan','Liquid','Bulk','','','1 ppb','','','','','','','Summary of TIMS','Description of TIMS','Keywords of TIMS',1,'Alternative names for TIMS', 9),
(24,'TIMS','TIMS','Triton Plus','Thermo Finnigan','Liquid','Bulk','','','1 ppb','','','','','','','Summary of TIMS','Description of TIMS','Keywords of TIMS',1,'Alternative names for TIMS', 9),
(25,'IRMS','Stable Isotope Ratio Mass Spectrometer','MAT 253+ with EBEX','Thermo Finnigan','Liquid','Bulk','','','','','','','','','','Summary of IRMS','Description of IRMS','Keywords of IRMS',1,'Alternative names for IRMS', 10),
(26,'AES','MP-AES','Argilent 4200','Agilent','Liquid','Bulk','','','','','','','','','','Summary of AES','Description of AES','Keywords of AES',1,'Alternative names for AES', 11),
(27,'SIMS','SHRIMP','SHRIMP 2','Australian Scientific Instruments','Thin_polished section','In situ','','','10 ppt','','','','','','','Summary of SIMS','Description of SIMS','Keywords of SIMS',1,'Alternative names for SIMS', 12),
(28,'Noble gas mass spetrometer','MC-MS-Noble Gas (Ar)','Argus VI','Thermo-Fisher Scientific','Solid','Both','','','','','','','','','','Summary of Noble gas mass spetrometer','Description of Noble gas mass spetrometer','Keywords of Noble gas mass spetrometer',1,'Alternative names for Noble gas mass spetrometer', 13),
(29,'Noble gas mass spetrometer','MS-Noble Gas (Ar)','VG3600','VG Instruments','Solid','Both','','','','','','','','','','Summary of Noble gas mass spetrometer','Description of Noble gas mass spetrometer','Keywords of Noble gas mass spetrometer',1,'Alternative names for Noble gas mass spetrometer', 13),
(30,'Noble gas mass spetrometer','MS-Noble Gas (Ar)','MM5400','Micromass','Solid','Both','','','','','','','','','','Summary of Noble gas mass spetrometer','Description of Noble gas mass spetrometer','Keywords of Noble gas mass spetrometer',1,'Alternative names for Noble gas mass spetrometer', 13),
(31,'Noble gas mass spetrometer','Step-heating (Ar)','Low-blank argon extraction furnace TC-9','Modifications Ltd.','Solid','Bulk','','','','','','','','','','Summary of Noble gas mass spetrometer','Description of Noble gas mass spetrometer','Keywords of Noble gas mass spetrometer',1,'Alternative names for Noble gas mass spetrometer', 14),
(32,'Noble gas mass spetrometer','QMS ( Noble Gas-He)','Alphachron','Australian Scientific instruments','Solid','Both','','','','','','','','','','Summary of Noble gas mass spetrometer','Description of Noble gas mass spetrometer','Keywords of Noble gas mass spetrometer',1,'Alternative names for Noble gas mass spetrometer', 13),
(33,'Noble gas mass spetrometer','MS-Noble Gas (He)','Helium extration system with Pfeiffer Prisma MS','Patterson Instruments Ltd / CSIRO','Solid','Both','','','','','','','','','','Summary of Noble gas mass spetrometer','Description of Noble gas mass spetrometer','Keywords of Noble gas mass spetrometer',1,'Alternative names for Noble gas mass spetrometer', 13),
(34,'XRF','XRF','M4 Tornado Micro XRF','Bruker','Solid','In situ','','','1 %','','','','','','','Summary of XRF','Description of XRF','Keywords of XRF',1,'Alternative names for XRF', 15),
(35,'XRF','XRF','Axios 1kW XRF','PANalytical','Solid','In situ','','','1 %','','','','','','','Summary of XRF','Description of XRF','Keywords of XRF',1,'Alternative names for XRF', 15),
(36,'EMP','EMP','SX-100 Electron microprobe','Cameca','Solid','In situ','','','','','','','','','','Summary of EMP','Description of EMP','Keywords of EMP',1,'Alternative names for EMP', 16),
(37,'alpha counter','alpha counter','Alpha Particle counter','Ortec','Solid','Bulk','','','1 ppm','','','','','','','Summary of alpha counter','Description of alpha counter','Keywords of alpha counter',1,'Alternative names for alpha counter', 17),
(38,'Elemental Analyser CHNS','Elemental Analyser CHNS','Vario EL Cube','Elementar','Solid','Bulk','','','','','10-1000 mg','','','','','Summary of Elemental Analyser CHNS','Description of Elemental Analyser CHNS','Keywords of Elemental Analyser CHNS',1,'Alternative names for Elemental Analyser CHNS', 18),
(39,'Elemental Analyser CHNS','Elemental Analyser CHNS','EA3000','EuroEA','Solid','Bulk','','','','','1-50 mg','','','','','Summary of Elemental Analyser CHNS','Description of Elemental Analyser CHNS','Keywords of Elemental Analyser CHNS',1,'Alternative names for Elemental Analyser CHNS', 18),
(40,'Automated fission track counting system','Automated fission track counting system','Autoscan Deluxe w. ZEISS M2m Microscope','AutoScan','Solid','Both','','','','','','','','','','Summary of Automated fission track counting system','Description of Automated fission track counting system','Keywords of Automated fission track counting system',1,'Alternative names for Automated fission track counting system', 19),
(41,'Experiemental instrument','Griggs press','Griggs apparatus','n/a','','','','','','','','150','3','1600','','Summary of Experiemental instrument','Description of Experiemental instrument','Keywords of Experiemental instrument',1,'Alternative names for Experiemental instrument', 20),
(42,'Experiemental instrument','Piston cylinder','piston-cylinder apparatus','n/a','','','','','','','','','6','2000','','Summary of Experiemental instrument','Description of Experiemental instrument','Keywords of Experiemental instrument',1,'Alternative names for Experiemental instrument', 20),
(43,'Experiemental instrument','Piston cylinder','rapid-quench piston-cylinder apparatus','GUKO Sondermaschinenbau','','','','','','','','','6','2000','','Summary of Experiemental instrument','Description of Experiemental instrument','Keywords of Experiemental instrument',1,'Alternative names for Experiemental instrument', 20),
(44,'Experiemental instrument','Multi-anvil press','multi-anvil apparatus','Bristol University','','','','','','','','10','20','2200','','Summary of Experiemental instrument','Description of Experiemental instrument','Keywords of Experiemental instrument',1,'Alternative names for Experiemental instrument', 20),
(45,'Experiemental instrument','Multi-anvil press','MAX2003','Voggenreiter GmbH','','','','','','','','10','20','2200','','Summary of Experiemental instrument','Description of Experiemental instrument','Keywords of Experiemental instrument',1,'Alternative names for Experiemental instrument', 20),
(46,'Experiemental instrument','Multi-anvil press',' Walker module - 1000 ton-press','Voggenreiter GmbH','','','','','','','','10','20','2200','','Summary of Experiemental instrument','Description of Experiemental instrument','Keywords of Experiemental instrument',1,'Alternative names for Experiemental instrument', 20),
(47,'Experiemental instrument','Diamond-anvil press','diamond-anvil cell apparatus','constructed in house','','','','','','','','','100-600','1500-6000','','Summary of Experiemental instrument','Description of Experiemental instrument','Keywords of Experiemental instrument',1,'Alternative names for Experiemental instrument', 20),
(48,'Experiemental instrument','Raman microscope','LABRAM HR Evolution','Horiba','','','','','','','','','','','','Summary of Experiemental instrument','Description of Experiemental instrument','Keywords of Experiemental instrument',1,'Alternative names for Experiemental instrument', 20),
(49,'Fourrier Transform IR microscope','Fourrier Transform IR microscope','iN10','Thermo-Fisher Scientific','','','','','','','','','','','','Summary of Fourrier Transform IR microscope','Description of Fourrier Transform IR microscope','Keywords of Fourrier Transform IR microscope',1,'Alternative names for Fourrier Transform IR microscope', 20),
(50,'MC-ICP-MS','MC-ICP-MS','Neptune','Thermo-Fisher Scientific','Liquid','Bulk','','','1 ppb','','','','','','','Summary of MC-ICP-MS','Description of MC-ICP-MS','Keywords of MC-ICP-MS',1,'Alternative names for MC-ICP-MS', 7),
(51,'IRMS','EA-IRMS','Flash 2000','Thermo-Fisher Scientific','Liquid','Bulk','','','','','','','','','','Summary of IRMS','Description of IRMS','Keywords of IRMS',1,'Alternative names for IRMS', 10),
(52,'IRMS','CG-IRMS','Delta V Advantage irMS','Thermo-Fisher Scientific','Liquid','Bulk','','','','','','','','','','Summary of IRMS','Description of IRMS','Keywords of IRMS',1,'Alternative names for IRMS', 10);
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
