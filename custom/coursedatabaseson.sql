-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: course
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `statement` text NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `statu` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'Spor','Sporu ihmal etmeyin. Düzenli spor yapın.','https://png.pngtree.com/png-clipart/20190603/original/pngtree-fashion-figure-fitness-beauty-png-image_677023.jpg',1,'2024-11-21 19:56:10',NULL),(2,'Müzik','Temel müzik eğitimi ve enstrüman çalmayı öğrenin.','https://png.pngtree.com/png-clipart/20190705/original/pngtree-vector-music-notes-icon-png-image_4184656.jpg',1,'2024-11-21 20:17:54',NULL),(3,'Sayısal','Sayısalcılar için eğitimler.','https://png.pngtree.com/element_our/20190530/ourlarge/pngtree-educational-math-tool-png-learning-flat-image_1269595.jpg',1,'2024-11-21 20:18:04',NULL),(4,'Sözel','Sözelciler için eğitimler.','https://png.pngtree.com/element_our/20190603/ourlarge/pngtree-learning-law-book-illustration-image_1452089.jpg',0,'2024-11-21 21:19:45',NULL),(5,'Resim','Temel resim eğitimi ve özel alanları öğrenin.','https://png.pngtree.com/png-clipart/20210308/original/pngtree-little-painter-free-png-material-png-image_5768015.jpg',1,'2024-11-21 21:21:41',NULL),(6,'Dil','Yabancı dil öğrenin.','https://png.pngtree.com/element_our/20190603/ourlarge/pngtree-learning-law-book-illustration-image_1452089.jpg',1,'2024-11-22 20:44:24',NULL);
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `lesson_date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `hours` int(11) NOT NULL,
  `classroom` varchar(20) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `quota` int(11) NOT NULL,
  `attended` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `lesson_id` (`lesson_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` VALUES (1,1,'2024-12-03','10:00:00','12:00:00',2,'A3',2,40,2,'2024-12-12 17:21:41','2024-12-12 14:31:03',NULL),(2,4,'2024-12-11','13:00:00','16:00:00',1,'A5',2,30,2,'2024-12-12 17:44:21','2024-12-12 14:44:21',NULL),(3,4,'2024-12-12','09:00:00','12:00:00',2,'Y1',2,30,4,'2024-12-12 17:46:56','2024-12-12 15:33:52',NULL);
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendance_detail`
--

DROP TABLE IF EXISTS `attendance_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendance_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `session_1` varchar(10) DEFAULT 'false',
  `session_2` varchar(10) DEFAULT 'false',
  `session_3` tinyint(1) DEFAULT 0,
  `session_4` tinyint(1) DEFAULT 0,
  `session_5` tinyint(1) DEFAULT 0,
  `session_6` tinyint(1) DEFAULT 0,
  `session_7` tinyint(1) DEFAULT 0,
  `session_8` tinyint(1) DEFAULT 0,
  `session_9` tinyint(1) DEFAULT 0,
  `session_10` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance_detail`
--

LOCK TABLES `attendance_detail` WRITE;
/*!40000 ALTER TABLE `attendance_detail` DISABLE KEYS */;
INSERT INTO `attendance_detail` VALUES (1,1,4,'true','true',0,0,0,0,0,0,0,0,'2024-12-12 17:21:41','2024-12-12 17:30:54'),(2,1,2,'false','true',0,0,0,0,0,0,0,0,'2024-12-12 17:21:41','2024-12-12 17:31:03'),(3,1,1,'false','true',0,0,0,0,0,0,0,0,'2024-12-12 17:21:41','2024-12-12 17:31:03'),(4,1,3,'true','true',0,0,0,0,0,0,0,0,'2024-12-12 17:21:41','2024-12-12 17:23:33'),(5,2,4,'true','false',0,0,0,0,0,0,0,0,'2024-12-12 17:44:21','2024-12-12 17:44:21'),(6,2,2,'true','false',0,0,0,0,0,0,0,0,'2024-12-12 17:44:21','2024-12-12 17:44:21'),(7,2,1,'false','true',0,0,0,0,0,0,0,0,'2024-12-12 17:44:21','2024-12-12 17:44:21'),(8,2,3,'false','false',0,0,0,0,0,0,0,0,'2024-12-12 17:44:21',NULL),(9,3,4,'true','false',0,0,0,0,0,0,0,0,'2024-12-12 17:46:57','2024-12-12 18:33:52'),(10,3,2,'true','false',0,0,0,0,0,0,0,0,'2024-12-12 17:46:57','2024-12-12 18:31:22'),(11,3,1,'true','true',0,0,0,0,0,0,0,0,'2024-12-12 17:46:57','2024-12-12 17:47:06'),(12,3,3,'true','false',0,0,0,0,0,0,0,0,'2024-12-12 17:46:57','2024-12-12 18:33:28');
/*!40000 ALTER TABLE `attendance_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `statement` text NOT NULL,
  `statu` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `area` (`area_id`),
  CONSTRAINT `area` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES (1,'Fitness',1,'https://png.pngtree.com/png-clipart/20190603/original/pngtree-fashion-figure-fitness-beauty-png-image_677023.jpg','Fitness genel anlamda fit ve zinde olmaktır.',1,'2024-11-21 19:54:33',NULL),(2,'Matematik',3,'https://png.pngtree.com/element_our/20190530/ourlarge/pngtree-educational-math-tool-png-learning-flat-image_1269595.jpg','Matematik; sayılar, felsefe, uzay ve fizik gibi konularla ilgilenir. ',1,'2024-11-21 20:19:30',NULL),(3,'Keman',2,'https://png.pngtree.com/png-clipart/20211115/original/pngtree-violin-exquisite-violin-playing-entertainment-classical-stringed-instruments-png-image_6926571.png','Keman çalmayı öğrenin.',1,'2024-11-22 12:31:25',NULL),(5,'Karakalem',5,'https://png.pngtree.com/png-clipart/20210309/original/pngtree-line-art-pencil-charcoal-hand-draw-rose-flower-png-image_5810359.jpg','Karakalem öğrenin.',1,'2024-11-22 12:31:25',NULL),(6,'Yoga',1,'https://png.pngtree.com/png-clipart/20190603/original/pngtree-fashion-figure-fitness-beauty-png-image_677023.jpg','Yoga çok faydalı bir spordur.',1,'2024-11-21 19:54:33',NULL),(7,'İngilizce',6,'https://png.pngtree.com/png-clipart/20210309/original/pngtree-line-art-pencil-charcoal-hand-draw-rose-flower-png-image_5810359.jpg','İngilizce öğrenin.',1,'2024-11-22 20:44:44',NULL);
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centers`
--

DROP TABLE IF EXISTS `centers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `type` int(3) NOT NULL,
  `image` varchar(200) NOT NULL,
  `ilce` varchar(100) NOT NULL,
  `mahalle` varchar(50) DEFAULT NULL,
  `sokak` varchar(100) NOT NULL,
  `kapi` varchar(5) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `opening_date` date DEFAULT NULL,
  `statu` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centers`
--

LOCK TABLES `centers` WRITE;
/*!40000 ALTER TABLE `centers` DISABLE KEYS */;
INSERT INTO `centers` VALUES (1,'Kasımpaşa Spor Tesisi',1,'/okul1.jpg','Beyoğlu','Bedrettin','Çelik sokak','27','4440160','kasimpasasportesisi@gmail.com','2024-11-20',1),(3,'Kadımehmet Semt Konağı',1,'/okul2.jpg','Beyoğlu','Kadımehmet','İnci sokak','9','4440160','kadimehmetsemtkonagi@gmail.com','2021-10-13',1);
/*!40000 ALTER TABLE `centers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollments`
--

DROP TABLE IF EXISTS `enrollments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `statu` int(1) NOT NULL,
  `cancelled_reason` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student` (`student_id`),
  CONSTRAINT `student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollments`
--

LOCK TABLES `enrollments` WRITE;
/*!40000 ALTER TABLE `enrollments` DISABLE KEYS */;
INSERT INTO `enrollments` VALUES (1,1,1,1,NULL,'2024-12-10 21:02:48','2024-12-10 21:12:20',NULL),(2,1,2,1,NULL,'2024-12-10 21:02:48','2024-12-12 15:31:23',NULL),(3,1,3,1,NULL,'2024-12-10 21:02:48','2024-12-12 16:21:10',NULL),(4,1,4,1,NULL,'2024-12-10 21:02:48','2024-12-12 17:43:13',NULL),(5,2,1,1,NULL,'2024-12-10 21:02:48','2024-12-10 21:12:20',NULL),(6,2,2,1,NULL,'2024-12-10 21:02:48','2024-12-12 15:31:23',NULL),(7,2,3,1,NULL,'2024-12-10 21:02:48','2024-12-12 16:21:10',NULL),(8,2,4,1,NULL,'2024-12-10 21:02:48','2024-12-12 17:43:13',NULL),(9,3,1,1,NULL,'2024-12-10 21:02:48','2024-12-10 21:12:20',NULL),(10,3,2,1,NULL,'2024-12-10 21:02:48','2024-12-12 15:31:23',NULL),(11,3,3,1,NULL,'2024-12-10 21:02:48','2024-12-12 16:21:10',NULL),(12,3,4,1,NULL,'2024-12-10 21:02:48','2024-12-12 17:43:13',NULL),(13,4,1,1,NULL,'2024-12-10 21:02:48','2024-12-10 21:12:20',NULL),(14,4,2,1,NULL,'2024-12-10 21:02:48','2024-12-12 15:31:23',NULL),(15,4,3,1,NULL,'2024-12-10 21:02:48','2024-12-12 16:21:10',NULL),(16,4,4,1,NULL,'2024-12-10 21:02:48','2024-12-12 17:43:13',NULL);
/*!40000 ALTER TABLE `enrollments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_no` varchar(20) DEFAULT NULL,
  `center_id` int(11) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `quota` int(11) DEFAULT NULL,
  `addquota` int(11) DEFAULT NULL,
  `mebno` varchar(20) DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `gender` enum('Male','Female','All') DEFAULT NULL,
  `ageRangeMin` int(11) NOT NULL,
  `ageRangeMax` int(11) NOT NULL,
  `ikamet_only` varchar(11) NOT NULL,
  `student_only` varchar(11) DEFAULT NULL,
  `disabled_only` varchar(11) DEFAULT NULL,
  `statement` text DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `statu` int(1) DEFAULT 1,
  `webactive` varchar(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `lesson_no` (`lesson_no`),
  KEY `center` (`center_id`),
  KEY `teacher` (`teacher_id`),
  KEY `branch` (`branch_id`),
  CONSTRAINT `branch` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `center` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`),
  CONSTRAINT `teacher` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lessons`
--

LOCK TABLES `lessons` WRITE;
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;
INSERT INTO `lessons` VALUES (1,'1000',1,1,2,40,10,NULL,'2024-12-01 00:00:00','2024-12-31 00:00:00',100,NULL,0,0,'0','0','0','Temiz ayakkabı ve havlu ile beraber gelmelisiniz.','blue',1,'0','2024-11-23 10:20:29','2024-12-02 15:49:55'),(2,'1001',3,7,1,20,5,'MB2452','2024-12-01 00:00:00','2025-04-30 00:00:00',90,NULL,0,0,'0','0','0','Derse geç kalmayın. Ders kitapları ile geliniz.','green',1,'0','2024-11-23 10:20:29','2024-12-12 12:33:51'),(3,'1002',1,5,1,10,3,NULL,'2024-12-02 00:00:00','2024-12-22 00:00:00',120,NULL,0,0,'0','0','0','Karakalem tekniği ile resim çizmeyi öğreneceksiniz.','purple',1,'0','2024-11-23 10:20:29','2024-12-12 13:14:41'),(4,'1003',3,6,2,30,10,NULL,'2024-12-08 00:00:00','2024-12-29 00:00:00',100,NULL,0,0,'0','0','0','Yoga dersleri','pink',1,'0','2024-11-23 10:20:29','2024-12-12 15:37:17');
/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lessons_days`
--

DROP TABLE IF EXISTS `lessons_days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lessons_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `hours` int(11) NOT NULL,
  `classroom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lesson` (`lesson_id`),
  CONSTRAINT `lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lessons_days`
--

LOCK TABLES `lessons_days` WRITE;
/*!40000 ALTER TABLE `lessons_days` DISABLE KEYS */;
INSERT INTO `lessons_days` VALUES (1,1,2,'10:00:00','12:00:00',2,'A3'),(2,1,4,'10:00:00','12:00:00',2,'A3'),(3,2,1,'16:00:00','18:00:00',2,'B5'),(4,2,6,'16:00:00','18:00:00',2,'B5'),(5,3,1,'10:00:00','12:00:00',2,'A8'),(6,4,3,'13:00:00','16:00:00',1,'A5'),(7,4,4,'09:00:00','12:00:00',2,'Y1');
/*!40000 ALTER TABLE `lessons_days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staffes`
--

DROP TABLE IF EXISTS `staffes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staffes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `identity` varchar(12) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(150) NOT NULL,
  `statu` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffes`
--

LOCK TABLES `staffes` WRITE;
/*!40000 ALTER TABLE `staffes` DISABLE KEYS */;
INSERT INTO `staffes` VALUES (1,'Ahmet','Candan','28391821218','1979-04-01','5348729928','ahmetcandan@gmail.com','https://i.pravatar.cc/150?img=3',1),(2,'Serdar','Demir','28391821218','1979-04-01','5348729928','serdardemir@gmail.com','https://i.pravatar.cc/150?img=9',1);
/*!40000 ALTER TABLE `staffes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `identity` varchar(11) NOT NULL,
  `birthday` date NOT NULL,
  `birthPlace` varchar(50) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `maritalStatus` int(3) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fatherName` varchar(40) DEFAULT NULL,
  `motherName` varchar(30) DEFAULT NULL,
  `identitySerial` varchar(30) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `is_ikamet` int(11) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `town` varchar(15) DEFAULT NULL,
  `district` varchar(32) DEFAULT NULL,
  `street` varchar(32) DEFAULT NULL,
  `exteriorDoor` varchar(10) DEFAULT NULL,
  `interiorDoor` varchar(10) DEFAULT NULL,
  `statu` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Mert','Demir',NULL,'11111111111','1111-11-11',NULL,NULL,NULL,'5342345520','mertdemir@gmail.com',NULL,NULL,NULL,'https://i.pravatar.cc/150?img=3',1,'4','istanbul','beyoğlu','kaptanpaşa',NULL,NULL,NULL,1),(2,'Elif','Candan',NULL,'17482732118','1997-11-25',NULL,NULL,NULL,'5385609212','elifcandan@gmail.com',NULL,NULL,NULL,'https://i.pravatar.cc/150?img=5',1,'4',NULL,NULL,'',NULL,NULL,NULL,1),(3,'Sinan','Eroglu',NULL,'48210945837','2001-08-12',NULL,NULL,NULL,'54282349911','sinaneroglu@gmail.com',NULL,NULL,NULL,'https://i.pravatar.cc/150?img=6',1,'4',NULL,NULL,'',NULL,NULL,NULL,1),(4,'Ayse','Demir',NULL,'52374390172','1996-12-12',NULL,NULL,NULL,'5368078779','aysedemir@gmail.com',NULL,NULL,NULL,'https://i.pravatar.cc/150?img=7\r\n',1,'4',NULL,NULL,'',NULL,NULL,NULL,1),(5,'Talha','Polat',NULL,'23242342342','1970-01-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(8,'BÜNYAMİN','POLAT','TC','26365120634','1998-04-30','FATİH',1,2,NULL,NULL,'SÜLEYMAN','AYTEN','A40S61659',NULL,NULL,'KAPTANPAŞA  MAH. RESNE SK. GÜVEN AP. NO: 14  İÇ KAPI NO: 8 BEYOĞLU / İSTANBUL','i̇stanbul','beyoğlu','kaptanpaşa  mah.','resne sk.','14','8',1),(10,'MANUEL JACINTO','JIMENEZ LAVAYEN','EKVATOR CUMHURİYETİ','99312910824','1969-12-24','GUAYAQUIL-EKVADOR',1,1,NULL,NULL,'JACINTO ANTONIO','PIEDAD ESTHER','A40L70792',NULL,NULL,'İSTİKLAL  MAH. PİYALEPAŞA BULVARI BUL. M NO: 30/2  İÇ KAPI NO: 26 BEYOĞLU / İSTANBUL','i̇stanbul','beyoğlu','i̇sti̇klal  mah.','pi̇yalepaşa bulvari bulvari','30/2','26',1),(11,'MUHAMMED TALHA','POLAT','TC','26371120406','1997-01-04','BEYOĞLU',1,1,NULL,NULL,'SÜLEYMAN','AYTEN','A28S98814',NULL,NULL,'KAPTANPAŞA  MAH. RESNE SK. GÜVEN AP. NO: 14  İÇ KAPI NO: 8 BEYOĞLU / İSTANBUL','i̇stanbul','beyoğlu','kaptanpaşa  mah.','resne sk.','14','8',1);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `identity` varchar(15) NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `statu` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (1,'Hakan','Yılmaz','57548227493','1997-01-04','5382982428','hakanyilmaz@hotmail.com',1),(2,'Burak','Kara','20394481910','1989-10-15','5316837558','burakkara@gmail.com',1);
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers_branches`
--

DROP TABLE IF EXISTS `teachers_branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers_branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers_branches`
--

LOCK TABLES `teachers_branches` WRITE;
/*!40000 ALTER TABLE `teachers_branches` DISABLE KEYS */;
INSERT INTO `teachers_branches` VALUES (1,1,5),(2,1,7),(3,2,1),(4,2,6);
/*!40000 ALTER TABLE `teachers_branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(44) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `identity` varchar(15) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `statu` int(11) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `remember_token` varchar(80) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'demo@kursiyer360.com','$2y$12$2XZFo14q5f1O7Sn5VY3wh.CGJrgFUY.eo9kl12IyznM.u8nvLmioK','Talha','Polat','23422283838','1997-04-01','5374774616',1,1,'2024-12-12 21:06:38','OVtZithl1rCUoneDfovie3IU5pEPmknsKWM1PmHzYj6cLY1dmYyLvrC7Sx2X','2024-12-12 21:06:38','2024-12-12 21:06:38');
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

-- Dump completed on 2024-12-14 16:50:11
