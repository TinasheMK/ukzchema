-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: localhost    Database: ukz
-- ------------------------------------------------------
-- Server version	8.0.20-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `applicants`
--

DROP TABLE IF EXISTS `applicants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applicants` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_names` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_dob` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_phone` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_street` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_zip` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominees` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `read_constitution` tinyint DEFAULT NULL,
  `certify_details` tinyint DEFAULT NULL,
  `uk_resident` tinyint DEFAULT NULL,
  `orderID` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `token` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicants`
--

LOCK TABLES `applicants` WRITE;
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;
INSERT INTO `applicants` VALUES (1,'Joe',NULL,'Munapo','1994-12-07 01:31:00','jmunapo@outlook.com','3463 H 3','Mutare','Zimbabwe','ZW','m','+263 77 569 6233','Mutare','Zimbabwe','1998-01-19 01:31:00','wbt@gmail.com','Web T Munapo','+263 77 714 4384','3463 H3','MT','[{\"dob\": \"2001-06-07T01:31:00.000Z\", \"email\": \"plaxy@gmail.com\", \"full_name\": \"Pla An Munapo\", \"zimbabwean_by\": \"birth\"}]',1,1,1,'44P488494M8108014','2020-04-28 23:52:00','2020-05-11 23:24:14',NULL,'accepted','code-lWFxEP8q8gNlL4APLu4JoMkb5zXS15Aox7WM83zM'),(2,'Plaxedes','Anesu','Munapo','2001-06-07T20:33:00.000Z','plax.anemunapo@gmail.com','3463 H 3','Mutare','Zimbabwe','MT','f','+263 77 569 6266','Mutare','Zimbabwe','1994-12-07T20:33:00.000Z','jmunapo@gmail.com','Josiah Munapo','+263 77 569 6233','3463 H 3','MT','[{\"dob\": \"1998-01-09T20:33:00.000Z\", \"email\": \"wbt@gmail.com\", \"full_name\": \"Tafadzwa Munapo\", \"zimbabwean_by\": \"birth\"}]',1,1,1,'6GS77095DW624443C','2020-04-29 18:39:49','2020-04-29 18:39:49',NULL,'pending',NULL),(3,'David',NULL,'Munapo','2003-12-02T20:53:00.000Z','divamunapo@gmail.com','3463 H 3','Mutare','Zimbabwe','MT','m','+263 77 569 6233','Mutare','Zimbabwe','1994-12-07T20:53:00.000Z','jmunapo@gmail.com','Josiah Munapo','+263 77 569 6233','3463 H 3',NULL,'[{\"dob\": \"1998-01-19T20:53:00.000Z\", \"email\": \"wbt@gmail.com\", \"full_name\": \"Webster Munapo\", \"zimbabwean_by\": \"birth\"}, {\"dob\": \"1974-08-08T20:56:00.000Z\", \"email\": \"achads@gmail.com\", \"full_name\": \"Agnes Chadambuka\", \"zimbabwean_by\": \"spouse\"}]',1,1,1,'61J50941HE043702E','2020-04-29 19:00:02','2020-04-29 19:00:02',NULL,'pending',NULL),(10,'Sibongile',NULL,'Simango','1998-01-23T23:27:00.000Z','sibosimango@gmail.com','2448 Hobhouse 3','Mutare','Zimbabwe','Mt','f','+263 77 911 5362','Mutare','Zimbabwe','1994-12-11T23:27:00.000Z','loe@gmail.com','Lorrean Simango','+263 77 236 3566','Test zimunya','Mt','[{\"full_name\":\"Joe Munapo\",\"email\":\"ceo@nhembe.co.zw\",\"dob\":\"1994-12-06T23:27:00.000Z\",\"zimbabwean_by\":\"birth\"}]',1,1,1,'7L349918J3820505U','2020-04-29 22:31:43','2020-04-29 22:31:43',NULL,'pending',NULL),(12,'John',NULL,'Doe','1977-08-10T23:46:00.000Z','jdoe@gmail.com','Umm','Umm','Ireland','Umm','m','+263 77 639 6233','Ok','Ireland','1997-08-06T23:46:00.000Z','hson@gmail.com','J Doe son','+263 77 522 3322','Kkk','Umm','[{\"full_name\":\"Umm ko chii\",\"email\":\"chii@gmail.com\",\"dob\":\"2010-01-06T23:46:00.000Z\",\"zimbabwean_by\":\"birth\"}]',1,1,1,'94E98994GU9466022','2020-04-29 22:48:55','2020-04-29 22:48:55',NULL,'pending',NULL);
/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_rows` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int unsigned NOT NULL,
  `field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rows`
--

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` VALUES (1,1,'id','number','ID',1,0,0,0,0,0,NULL,1),(2,1,'name','text','Name',1,1,1,1,1,1,NULL,2),(3,1,'email','text','Email',1,1,1,1,1,1,NULL,3),(4,1,'password','password','Password',1,0,0,1,1,0,NULL,4),(5,1,'remember_token','text','Remember Token',0,0,0,0,0,0,NULL,5),(6,1,'created_at','timestamp','Created At',0,1,1,0,0,0,NULL,6),(7,1,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),(8,1,'avatar','image','Avatar',0,1,1,1,1,1,NULL,8),(9,1,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}',10),(10,1,'user_belongstomany_role_relationship','relationship','Roles',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}',11),(11,1,'settings','hidden','Settings',0,0,0,0,0,0,NULL,12),(12,2,'id','number','ID',1,0,0,0,0,0,NULL,1),(13,2,'name','text','Name',1,1,1,1,1,1,NULL,2),(14,2,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(15,2,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(16,3,'id','number','ID',1,0,0,0,0,0,NULL,1),(17,3,'name','text','Name',1,1,1,1,1,1,NULL,2),(18,3,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(19,3,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(20,3,'display_name','text','Display Name',1,1,1,1,1,1,NULL,5),(21,1,'role_id','text','Role',1,1,1,1,1,1,NULL,9),(22,5,'id','text','Id',1,0,0,0,0,0,'{}',1),(23,5,'first_name','text','First Name',0,1,1,1,1,1,'{}',2),(24,5,'middle_names','text','Middle Names',0,1,1,1,1,1,'{}',3),(25,5,'last_name','text','Last Name',0,1,1,1,1,1,'{}',4),(26,5,'dob','text','Dob',0,1,1,1,1,1,'{}',5),(27,5,'email','text','Email',0,1,1,1,1,1,'{}',6),(28,5,'street','text','Street',0,1,1,1,1,1,'{}',7),(29,5,'city','text','City',0,1,1,1,1,1,'{}',8),(30,5,'country','text','Country',0,1,1,1,1,1,'{}',9),(31,5,'zip','text','Zip',0,1,1,1,1,1,'{}',10),(32,5,'gender','text','Gender',0,1,1,1,1,1,'{}',11),(33,5,'phone','text','Phone',0,1,1,1,1,1,'{}',12),(34,5,'nok_city','text','Nok City',0,0,1,1,1,1,'{}',13),(35,5,'nok_country','text','Nok Country',0,0,1,1,1,1,'{}',14),(36,5,'nok_dob','text','Nok Dob',0,0,1,1,1,1,'{}',15),(37,5,'nok_email','text','Nok Email',0,0,1,1,1,1,'{}',16),(38,5,'nok_full_name','text','Next of Kin\'s Full Name',0,1,1,1,1,1,'{}',17),(39,5,'nok_phone','text','Next of Kin\'s Phone',0,1,1,1,1,1,'{}',18),(40,5,'nok_street','text','Nok Street',0,0,1,1,1,1,'{}',19),(41,5,'nok_zip','text','Nok Zip',0,0,1,1,1,1,'{}',20),(42,5,'nominees','text','Nominees',0,0,1,0,1,1,'{}',21),(43,5,'read_constitution','text','Read Constitution',0,0,1,1,1,1,'{}',22),(44,5,'certify_details','text','Certify Details',0,0,1,1,1,1,'{}',23),(45,5,'uk_resident','text','Uk Resident',0,0,1,1,1,1,'{}',24),(46,5,'orderID','text','OrderID',0,1,1,1,1,1,'{}',25),(47,5,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',26),(48,5,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',27),(49,5,'deleted_at','timestamp','Deleted At',0,0,1,0,0,1,'{}',28),(50,5,'status','select_dropdown','Status',0,1,1,1,0,1,'{\"default\":\"pending\",\"options\":{\"pending\":\"Pending\",\"accepted\":\"Accepted\",\"rejected\":\"Rejected\"}}',29),(51,5,'token','text','Token',0,1,1,1,1,1,'{}',30),(52,6,'id','text','Id',1,0,0,0,0,0,'{}',1),(53,6,'deleted_at','timestamp','Deleted At',0,0,1,0,0,1,'{}',2),(54,6,'created_at','timestamp','Created At',0,0,1,0,0,1,'{}',3),(55,6,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(56,6,'email','text','Email',0,1,1,1,1,1,'{}',8),(57,6,'first_name','text','First Name',0,1,1,1,1,1,'{}',5),(58,6,'middle_names','text','Middle Names',0,1,1,1,1,1,'{}',6),(59,6,'last_name','text','Last Name',0,1,1,1,1,1,'{}',7),(60,6,'dob','text','Dob',0,0,1,1,1,1,'{}',9),(61,6,'city','text','City',0,0,1,1,1,1,'{}',10),(62,6,'country','text','Country',0,0,1,1,1,1,'{}',11),(63,6,'street','text','Street',0,0,1,1,1,1,'{}',12),(64,6,'zip','text','Zip',0,0,1,1,1,1,'{}',13),(65,6,'gender','text','Gender',0,1,1,1,1,1,'{}',14),(66,6,'phone','text','Phone',0,1,1,1,1,1,'{}',15),(67,6,'nok_city','text','Nok City',0,0,1,1,1,1,'{}',16),(68,6,'nok_country','text','Nok Country',0,0,1,1,1,1,'{}',17),(69,6,'nok_dob','text','Nok Dob',0,0,1,1,1,1,'{}',18),(70,6,'nok_email','text','Nok Email',0,0,1,1,1,1,'{}',19),(71,6,'nok_full_name','text','Nok Full Name',0,0,1,1,1,1,'{}',20),(72,6,'nok_phone','text','Nok Phone',0,0,1,1,1,1,'{}',21),(73,6,'nok_street','text','Nok Street',0,0,1,1,1,1,'{}',22),(74,6,'nok_zip','text','Nok Zip',0,0,1,1,1,1,'{}',23),(75,6,'nominees','text','Nominees',0,0,1,1,1,1,'{}',24),(76,6,'orderID','text','Payment Ref',0,1,1,1,1,1,'{}',25),(77,7,'id','text','Id',1,0,0,0,0,0,'{}',1),(78,7,'deleted_at','timestamp','Deleted At',0,0,1,0,0,1,'{}',14),(79,7,'created_at','timestamp','Added On',0,0,1,0,0,1,'{}',12),(80,7,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',13),(81,7,'member_id','text','Member ID',0,1,1,1,1,1,'{}',2),(82,7,'full_name','text','Full Name',0,1,1,1,1,1,'{}',4),(83,7,'biography','text_area','Biography',0,1,1,1,1,1,'{}',5),(84,7,'dob','timestamp','Date of Birth',0,1,1,1,1,1,'{}',6),(85,7,'dod','timestamp','Date of Death',0,1,1,1,1,1,'{}',7),(86,7,'birth_place','text','Birth Place',0,1,1,1,1,1,'{}',8),(87,7,'death_place','text','Death Place',0,1,1,1,1,1,'{}',9),(88,7,'phone','text','Phone',0,1,1,1,1,1,'{}',10),(89,7,'photo','image','Photo',0,1,1,1,1,1,'{\"resize\":{\"width\":\"1000\",\"height\":null},\"quality\":\"80%\",\"upsize\":true}',11),(90,7,'obituary_belongsto_member_relationship','relationship','Member ID',0,1,1,1,1,1,'{\"model\":\"App\\\\Models\\\\Member\",\"table\":\"members\",\"type\":\"belongsTo\",\"column\":\"member_id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"applicants\",\"pivot\":\"0\",\"taggable\":\"0\"}',3),(91,6,'user_id','text','User Id',0,0,1,1,1,1,'{}',26),(92,6,'bio','text','Bio',0,0,1,1,1,1,'{}',27),(93,7,'goal_amount','number','Goal Amount (£)',0,1,1,1,1,1,'{}',14),(94,7,'donated_amount','number','Donated Amount (£)',0,1,1,1,0,1,'{}',15),(95,7,'member_type','select_dropdown','Member Type',0,1,1,1,1,1,'{\"default\":\"member\",\"options\":{\"member\":\"Member\",\"nominee\":\"Nominee\"}}',16),(96,8,'id','text','Id',1,0,0,0,0,0,'{}',1),(97,8,'user_id','text','User Id',0,1,1,1,1,1,'{}',2),(98,8,'obituary_id','text','Obituary Id',0,1,1,1,1,1,'{}',3),(99,8,'amount','text','Amount',0,1,1,1,1,1,'{}',4),(100,8,'on','timestamp','On',0,1,1,1,1,1,'{}',5),(101,8,'orderID','text','OrderID',0,1,1,1,1,1,'{}',6),(102,8,'deleted_at','timestamp','Deleted At',0,1,1,1,1,1,'{}',7),(103,8,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',8),(104,8,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',9);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint NOT NULL DEFAULT '0',
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController','',1,0,NULL,'2020-04-24 09:41:00','2020-04-24 09:41:00'),(2,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,NULL,'2020-04-24 09:41:00','2020-04-24 09:41:00'),(3,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController','',1,0,NULL,'2020-04-24 09:41:00','2020-04-24 09:41:00'),(5,'applicants','applicants','New Applicant','New Applicants','voyager-list-add','App\\Models\\Applicant',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-04-28 23:55:54','2020-05-11 19:56:34'),(6,'members','members','Member','Members','voyager-people','App\\Models\\Member',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-05-06 16:22:52','2020-05-11 22:10:33'),(7,'obituaries','obituaries','Obituary','Obituaries','voyager-activity','App\\Models\\Obituary',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-05-06 16:37:18','2020-05-11 07:09:30'),(8,'donations','donations','Donation','Donations','voyager-gift','App\\Models\\Donation',NULL,'App\\Http\\Controllers\\AdminDonationController',NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-05-11 09:03:26','2020-05-11 09:04:57');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donations`
--

DROP TABLE IF EXISTS `donations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `obituary_id` int DEFAULT NULL,
  `amount` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on` timestamp NULL DEFAULT NULL,
  `orderID` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donations`
--

LOCK TABLES `donations` WRITE;
/*!40000 ALTER TABLE `donations` DISABLE KEYS */;
INSERT INTO `donations` VALUES (1,4,1,'15.00','2020-05-11 09:05:59','3EH01166NA4636704',NULL,'2020-05-11 09:05:59','2020-05-11 09:05:59'),(2,4,1,'15.00','2020-05-11 10:25:58','3EH01166NA4636704',NULL,'2020-05-11 10:25:58','2020-05-11 10:25:58'),(3,4,1,'15.00','2020-05-11 10:58:46','3EH01166NA4636704',NULL,'2020-05-11 10:58:46','2020-05-11 10:58:46'),(4,4,1,'15.00','2020-05-11 10:59:45','3EH01166NA4636704',NULL,'2020-05-11 10:59:45','2020-05-11 10:59:45'),(5,4,1,'15.00','2020-05-11 11:08:25','3EH01166NA4636704',NULL,'2020-05-11 11:08:25','2020-05-11 11:08:25'),(6,4,1,'15.00','2020-05-11 11:09:05','3EH01166NA4636704',NULL,'2020-05-11 11:09:05','2020-05-11 11:09:05'),(7,4,1,'15.00','2020-05-11 11:09:37','3EH01166NA4636704',NULL,'2020-05-11 11:09:37','2020-05-11 11:09:37'),(8,4,1,'15.00','2020-05-11 11:16:23','3EH01166NA4636704',NULL,'2020-05-11 11:16:23','2020-05-11 11:16:23'),(9,4,1,'15.00','2020-05-11 11:25:22','3EH01166NA4636704',NULL,'2020-05-11 11:25:22','2020-05-11 11:25:22'),(10,4,2,'20.00','2020-05-11 11:51:32','2EG042797S918505D',NULL,'2020-05-11 11:51:32','2020-05-11 11:51:32'),(11,2,2,'10.00','2020-05-11 12:44:28','5WC458731G820023L',NULL,'2020-05-11 12:44:28','2020-05-11 12:44:28');
/*!40000 ALTER TABLE `donations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `members` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_names` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_country` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_dob` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_full_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_street` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_zip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominees` json DEFAULT NULL,
  `orderID` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `bio` mediumtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,NULL,'2020-05-06 17:10:07','2020-05-07 19:10:18','joemags.apps@gmail.com','Mugore','Barney','Cloud','06.12.1994','Mutare','Zimbabwe','3463 Hobhouse 3','ZIM','m','+263 77 569 6233','Mutare','Ireland','07 December 1994','jmunapo@gmail.com','Joe Munapo','+263 77 569 6233','3463 H 3','ZW','[{\"dob\": \"19 February 1991\", \"email\": \"mj@gmail.com\", \"full_name\": \"Munapo Josiah\", \"zimbabwean_by\": \"birth\"}, {\"dob\": \"06 April 2010\", \"email\": \"tmunapo@gmail.com\", \"full_name\": \"Tafadzwa Munapo\", \"zimbabwean_by\": \"spouse\"}]','41T46117TK1583021',4,'Stay home and avoid touching your face to stop the spread of COVID19'),(2,NULL,'2020-05-08 11:09:04','2020-05-08 11:09:04','mutasaleo1@gmail.com','Leo',NULL,'Mutasa','03.01.2000','Harare','Zimbabwe','21 homestead road Hatfield',NULL,'m','+263 78 336 5009','Harare','Zimbabwe','12.08.1993','mutasaleo1@gmail.com','Boss','+263 77 448 8345','Ehehhjj','+263','[{\"dob\": \"2000-01-20T04:50:00.000Z\", \"email\": \"mutasaleo1@gmail.com\", \"full_name\": \"Leo\", \"zimbabwean_by\": \"spouse\"}]','33R80552YK4008541',5,NULL);
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int unsigned DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,'Dashboard','','_self','voyager-boat',NULL,NULL,1,'2020-04-24 09:41:10','2020-04-24 09:41:10','voyager.dashboard',NULL),(2,1,'Media','','_self','voyager-images',NULL,NULL,10,'2020-04-24 09:41:10','2020-05-06 17:07:42','voyager.media.index',NULL),(3,1,'Users','','_self','voyager-person',NULL,NULL,8,'2020-04-24 09:41:10','2020-05-06 17:07:35','voyager.users.index',NULL),(4,1,'Roles','','_self','voyager-lock',NULL,NULL,5,'2020-04-24 09:41:11','2020-05-06 15:59:16','voyager.roles.index',NULL),(5,1,'Tools','','_self','voyager-tools',NULL,NULL,3,'2020-04-24 09:41:11','2020-05-06 15:59:16',NULL,NULL),(6,1,'Menu Builder','','_self','voyager-list',NULL,5,1,'2020-04-24 09:41:11','2020-04-24 09:49:32','voyager.menus.index',NULL),(7,1,'Database','','_self','voyager-data',NULL,5,2,'2020-04-24 09:41:11','2020-04-24 09:49:36','voyager.database.index',NULL),(8,1,'Compass','','_self','voyager-compass',NULL,5,3,'2020-04-24 09:41:11','2020-04-24 09:49:37','voyager.compass.index',NULL),(9,1,'BREAD','','_self','voyager-bread',NULL,5,4,'2020-04-24 09:41:11','2020-04-24 09:49:38','voyager.bread.index',NULL),(10,1,'Settings','','_self','voyager-settings',NULL,NULL,4,'2020-04-24 09:41:12','2020-05-06 15:59:16','voyager.settings.index',NULL),(11,1,'Hooks','','_self','voyager-hook',NULL,5,5,'2020-04-24 09:41:48','2020-04-24 09:49:39','voyager.hooks',NULL),(12,1,'New Applicants','','_self','voyager-list-add',NULL,NULL,6,'2020-04-28 23:55:56','2020-05-06 17:07:26','voyager.applicants.index',NULL),(13,1,'Member Dashboard','/member','_self','voyager-browser','#000000',NULL,2,'2020-05-06 15:59:07','2020-05-06 15:59:16',NULL,''),(14,1,'Members','','_self','voyager-people',NULL,NULL,7,'2020-05-06 16:22:54','2020-05-06 17:07:35','voyager.members.index',NULL),(15,1,'Obituaries','','_self','voyager-activity',NULL,NULL,9,'2020-05-06 16:37:20','2020-05-06 17:07:41','voyager.obituaries.index',NULL),(16,1,'Donations','','_self','voyager-gift',NULL,NULL,11,'2020-05-11 09:03:27','2020-05-11 09:03:27','voyager.donations.index',NULL);
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'admin','2020-04-24 09:41:10','2020-04-24 09:41:10');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2016_01_01_000000_add_voyager_user_fields',1),(3,'2016_01_01_000000_create_data_types_table',1),(4,'2016_05_19_173453_create_menu_table',1),(5,'2016_10_21_190000_create_roles_table',1),(6,'2016_10_21_190000_create_settings_table',1),(7,'2016_11_30_135954_create_permission_table',1),(8,'2016_11_30_141208_create_permission_role_table',1),(9,'2016_12_26_201236_data_types__add__server_side',1),(10,'2017_01_13_000000_add_route_to_menu_items_table',1),(11,'2017_01_14_005015_create_translations_table',1),(12,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),(13,'2017_03_06_000000_add_controller_to_data_types_table',1),(14,'2017_04_21_000000_add_order_to_data_rows_table',1),(15,'2017_07_05_210000_add_policyname_to_data_types_table',1),(16,'2017_08_05_000000_add_group_to_settings_table',1),(17,'2017_11_26_013050_add_user_role_relationship',1),(18,'2017_11_26_015000_create_user_roles_table',1),(19,'2018_03_11_000000_add_user_settings',1),(20,'2018_03_14_000000_add_details_to_data_types_table',1),(21,'2018_03_16_000000_make_settings_value_nullable',1),(22,'2019_08_19_000000_create_failed_jobs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obituaries`
--

DROP TABLE IF EXISTS `obituaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `obituaries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `member_id` int DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` longtext COLLATE utf8mb4_unicode_ci,
  `dob` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dod` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `death_place` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goal_amount` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `donated_amount` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `member_type` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obituaries`
--

LOCK TABLES `obituaries` WRITE;
/*!40000 ALTER TABLE `obituaries` DISABLE KEYS */;
INSERT INTO `obituaries` VALUES (1,NULL,'2020-05-07 20:32:13','2020-05-11 12:22:31',2,'Andrew Dunbar','Andrew was an actor who was also a stand-in as Theon on GoT. Extremely shocked and saddened to hear of his passing. To lose a loved one so young, I can only imagine what his family are going through. RIP Andrew xxx','1974-01-15 00:30:00','2020-04-22 00:30:00','Belfast, Northern Ireland','Belfast, Northern Ireland','+44758895551','obituaries/May2020/4yRDgd6aD7MC8hmNL73S.jpg',NULL,'105','member'),(2,NULL,'2020-05-07 20:42:00','2020-05-11 12:44:26',1,'Robert Brady','Town officials in Avon and loved ones are remembering Robert F. Brady, Jr. for his passion for public service, after the 65-year-old selectman passed away from COVID-19. \r\n\r\nBrady, who served on multiple boards and committees in Avon over the course of 17 years, died May 4. He had battled health issues in recent years and announced last year he would not seek re-election. But after the coronavirus pandemic postponed the town’s election, he continued to serve on the Board of Selectmen and “guide the town in the face of uncertain times,” town officials wrote in a statement announcing his passing.\r\n\r\n“The Town of Avon lost a champion this week,” Town Administrator Gregory Enos said in a statement. “He was a great supporter of all the hard work put in by the employees of the town. Bob was a wonderful listener and had a big heart. He was always upbeat and had a great sense of humor. We are honored to have worked with him here in Avon and our town will be forever impacted by his leadership. Bob will be remembered fondly by the Avon community and missed tremendously by all.”','1976-06-24 00:39:00','2020-05-07 00:39:00','Brockton','Holbrook','+4471234561235','obituaries/May2020/dmRlnIGwqq8hkOS3lldS.png',NULL,'30',NULL),(3,NULL,'2020-05-07 20:43:00','2020-05-07 20:48:28',1,'Anne Milewski','Anne Milewski, 100, of Milford, beloved wife of the late Milton Milewski, passed away peacefully at Milford Healthcare and Rehabilitation Center on May 4, 2020. Born on April 7, 1920 in Bridgeport to the late Joseph and Pauline Pavlosky, Anne was a 1937 graduate of Warren Harding High School.\r\n\r\nAnne married Milton, her beloved husband of 62 years in 1941. They settled in Stratford where they raised their four children. Anne was an excellent home-maker; her home was always beautifully maintained along with her flower gardens. For many years, she and Milton hosted all the festive holiday gatherings for their family. It was during these times that her cooking and decorating talents were highlighted. Anne was also a bird and animal lover and for several years she raised miniature poodles.\r\n\r\nAnne was a member of Mill River Country Club for 46 years. There, she enjoyed golfing, bowling, and playing bridge and pinochle with “the girls”. She was also an avid fan of the New York Yankees and UCONN Women’s Basketball, but the activity she enjoyed the most was casino gambling. She made weekly bus trips to the casino until she was 90 – always managing to come home with “some of my money”.','1956-06-28 00:43:00','2020-05-05 00:42:00','Milford','107 Broad Street Milford,',NULL,'obituaries/May2020/uVa8Ptama8w1Ic3XKvgG.jpg',NULL,NULL,NULL),(4,NULL,'2020-05-07 20:46:00','2020-05-11 07:08:57',1,'John Doe','A Portland man who served in the U.S. Army during the Vietnam War died April 25 from complications of COVID-19 and diabetes, according to his obituary.\r\n\r\nPatrick Laureat \"Larry\" Dube, 76, joined the Army in 1965 and served until 1977.\r\n\r\nDube, who was a member of the New England Bowling Association and the Central Connecticut Bowling Association, “was an avid and talented bowler for many years of his life,” his obituary said.','1976-07-29 00:45:00','2020-05-07 00:45:00','Portland','Portland','+447754588585','obituaries/May2020/4vGkyEGL1HHfYxPByROL.jpg','10000','10','nominee');
/*!40000 ALTER TABLE `obituaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(1,3),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(16,3),(17,1),(17,3),(18,1),(18,3),(19,1),(19,3),(20,1),(20,3),(21,1),(21,3),(22,1),(22,3),(23,1),(23,3),(24,1),(24,3),(25,1),(25,3),(26,1),(27,1),(27,3),(28,1),(28,3),(29,1),(29,3),(30,1),(30,3),(31,1),(31,3),(32,1),(32,3),(33,1),(33,3),(34,1),(34,3),(35,1),(35,3),(36,1),(36,3),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'browse_admin',NULL,'2020-04-24 09:41:14','2020-04-24 09:41:14'),(2,'browse_bread',NULL,'2020-04-24 09:41:15','2020-04-24 09:41:15'),(3,'browse_database',NULL,'2020-04-24 09:41:15','2020-04-24 09:41:15'),(4,'browse_media',NULL,'2020-04-24 09:41:15','2020-04-24 09:41:15'),(5,'browse_compass',NULL,'2020-04-24 09:41:16','2020-04-24 09:41:16'),(6,'browse_menus','menus','2020-04-24 09:41:17','2020-04-24 09:41:17'),(7,'read_menus','menus','2020-04-24 09:41:18','2020-04-24 09:41:18'),(8,'edit_menus','menus','2020-04-24 09:41:19','2020-04-24 09:41:19'),(9,'add_menus','menus','2020-04-24 09:41:19','2020-04-24 09:41:19'),(10,'delete_menus','menus','2020-04-24 09:41:21','2020-04-24 09:41:21'),(11,'browse_roles','roles','2020-04-24 09:41:22','2020-04-24 09:41:22'),(12,'read_roles','roles','2020-04-24 09:41:24','2020-04-24 09:41:24'),(13,'edit_roles','roles','2020-04-24 09:41:25','2020-04-24 09:41:25'),(14,'add_roles','roles','2020-04-24 09:41:27','2020-04-24 09:41:27'),(15,'delete_roles','roles','2020-04-24 09:41:30','2020-04-24 09:41:30'),(16,'browse_users','users','2020-04-24 09:41:31','2020-04-24 09:41:31'),(17,'read_users','users','2020-04-24 09:41:32','2020-04-24 09:41:32'),(18,'edit_users','users','2020-04-24 09:41:32','2020-04-24 09:41:32'),(19,'add_users','users','2020-04-24 09:41:32','2020-04-24 09:41:32'),(20,'delete_users','users','2020-04-24 09:41:32','2020-04-24 09:41:32'),(21,'browse_settings','settings','2020-04-24 09:41:32','2020-04-24 09:41:32'),(22,'read_settings','settings','2020-04-24 09:41:33','2020-04-24 09:41:33'),(23,'edit_settings','settings','2020-04-24 09:41:33','2020-04-24 09:41:33'),(24,'add_settings','settings','2020-04-24 09:41:33','2020-04-24 09:41:33'),(25,'delete_settings','settings','2020-04-24 09:41:34','2020-04-24 09:41:34'),(26,'browse_hooks',NULL,'2020-04-24 09:41:48','2020-04-24 09:41:48'),(27,'browse_applicants','applicants','2020-04-28 23:55:55','2020-04-28 23:55:55'),(28,'read_applicants','applicants','2020-04-28 23:55:55','2020-04-28 23:55:55'),(29,'edit_applicants','applicants','2020-04-28 23:55:55','2020-04-28 23:55:55'),(30,'add_applicants','applicants','2020-04-28 23:55:55','2020-04-28 23:55:55'),(31,'delete_applicants','applicants','2020-04-28 23:55:55','2020-04-28 23:55:55'),(32,'browse_members','members','2020-05-06 16:22:52','2020-05-06 16:22:52'),(33,'read_members','members','2020-05-06 16:22:52','2020-05-06 16:22:52'),(34,'edit_members','members','2020-05-06 16:22:52','2020-05-06 16:22:52'),(35,'add_members','members','2020-05-06 16:22:52','2020-05-06 16:22:52'),(36,'delete_members','members','2020-05-06 16:22:52','2020-05-06 16:22:52'),(37,'browse_obituaries','obituaries','2020-05-06 16:37:18','2020-05-06 16:37:18'),(38,'read_obituaries','obituaries','2020-05-06 16:37:18','2020-05-06 16:37:18'),(39,'edit_obituaries','obituaries','2020-05-06 16:37:18','2020-05-06 16:37:18'),(40,'add_obituaries','obituaries','2020-05-06 16:37:18','2020-05-06 16:37:18'),(41,'delete_obituaries','obituaries','2020-05-06 16:37:18','2020-05-06 16:37:18'),(42,'browse_donations','donations','2020-05-11 09:03:26','2020-05-11 09:03:26'),(43,'read_donations','donations','2020-05-11 09:03:26','2020-05-11 09:03:26'),(44,'edit_donations','donations','2020-05-11 09:03:26','2020-05-11 09:03:26'),(45,'add_donations','donations','2020-05-11 09:03:26','2020-05-11 09:03:26'),(46,'delete_donations','donations','2020-05-11 09:03:26','2020-05-11 09:03:26');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2020-04-24 09:41:13','2020-04-24 09:41:13'),(2,'user','Normal User','2020-04-24 09:41:14','2020-04-24 09:41:14'),(3,'board_member','Executive Board','2020-05-06 16:28:43','2020-05-06 16:28:43');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site.title','Site Title','UKZ | Chema Association','','text',1,'Site'),(2,'site.description','Site Description','A body to help members with funeral costs in the event of death of nominated loved ones','','text',2,'Site'),(3,'site.logo','Site Logo','','','image',3,'Site'),(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID',NULL,'','text',4,'Site'),(5,'admin.bg_image','Admin Background Image','','','image',5,'Admin'),(6,'admin.title','Admin Title','Voyager','','text',1,'Admin'),(7,'admin.description','Admin Description','Welcome to Voyager. The Missing Admin for Laravel','','text',2,'Admin'),(8,'admin.loader','Admin Loader','','','image',3,'Admin'),(9,'admin.icon_image','Admin Icon Image','','','image',4,'Admin'),(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)',NULL,'','text',1,'Admin'),(11,'social.telegram','Telegram Chat','439081755',NULL,'text',6,'Social'),(13,'member.can_update_nominees','Members can update nominees','1',NULL,'checkbox',7,'Member');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int unsigned NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_roles` (
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,1,'UKZ','admin@ukz.co.uk','users/default.png',NULL,'$2y$10$on77YugkGau71ZkonUPTzuD4pH8aUG2qB7kxg.482W8f3y1Sidnoi','CPIJtNQFYOrQxuQo2sdGXLfnbvFiYXQth1Ar2bLUUM0ijIiiVphyef65GKsJ',NULL,'2020-04-24 09:46:18','2020-04-24 09:46:19'),(3,3,'Demo User','demo@ukz.co.uk','users/default.png',NULL,'$2y$10$VbxaxOdRwIhr2e.6OzVQsuoNV7aC.PURDvWSr2dX9wj3rSPlFFMRi','13eonwf9qjlG2iN8UHAxT51W6LwGkMtcCtYRh9zfyUBdvBjR83pY37kEbren','{\"locale\":\"en\"}','2020-05-06 16:29:53','2020-05-06 16:29:53'),(4,2,'Mugore  Cloud','joemags.apps@gmail.com','users/default.png','2020-05-06 17:10:07','$2y$10$Tnk859CJP/KCm0jaqAPL8ufPHZhqgRO9U8vX4PTW8TySFetn5nWAq',NULL,NULL,'2020-05-06 17:10:05','2020-05-06 17:10:07'),(5,2,'Leo  Mutasa','mutasaleo1@gmail.com','users/default.png','2020-05-08 11:09:04','$2y$10$Qy8c4i9uZt5XWV73Nzg11urlyCQBHuSvhjydMaZqjtf5zPHj79bF.',NULL,NULL,'2020-05-08 11:09:03','2020-05-08 11:09:04');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-12  3:29:09
