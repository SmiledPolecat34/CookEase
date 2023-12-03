-- MariaDB dump 10.19-11.1.2-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: cookease
-- ------------------------------------------------------
-- Server version	11.1.2-MariaDB

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES
(1,'Entrée'),
(2,'Plat'),
(3,'Dessert'),
(4,'Boisson'),
(5,'Sauce'),
(6,'Accompagnement'),
(7,'Gazeux');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredients`
--

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;
INSERT INTO `ingredients` VALUES
(1,'Farine'),
(2,'Sucre'),
(3,'Lait'),
(4,'Oeufs'),
(5,'Beurre'),
(6,'Sel'),
(7,'Poivre'),
(8,'Huile d\'olive'),
(9,'Pommes de terre'),
(10,'Oignon'),
(11,'Ail'),
(12,'Crème fraîche'),
(13,'Fromage'),
(14,'Poulet'),
(15,'Boeuf'),
(16,'Porc'),
(17,'Agneau'),
(18,'Saumon'),
(19,'Thon'),
(20,'Crevettes'),
(21,'Riz'),
(22,'Pâtes'),
(23,'Tomates'),
(24,'Carottes'),
(25,'Courgettes'),
(26,'Brocoli'),
(27,'Champignons'),
(28,'Épinards'),
(29,'Haricots verts'),
(30,'Poivrons'),
(31,'Concombre'),
(32,'Avocat'),
(33,'Fraise'),
(34,'Banane'),
(35,'Pomme'),
(36,'Orange'),
(37,'Citron'),
(38,'Ananas'),
(39,'Mangue'),
(40,'Melon'),
(41,'Pastèque'),
(42,'Kiwi'),
(43,'Poire'),
(44,'Cerise'),
(45,'Raisin'),
(46,'Noix'),
(47,'Amandes'),
(48,'Noisettes'),
(49,'Pistaches'),
(50,'Cannelle'),
(51,'Vanille'),
(52,'Basilic'),
(53,'Persil'),
(54,'Menthe'),
(55,'Thym'),
(56,'Origan'),
(57,'Coriandre'),
(58,'Curry'),
(59,'Paprika'),
(60,'Gingembre'),
(61,'Miel'),
(62,'Vinaigre balsamique'),
(63,'Moutarde'),
(64,'Ketchup'),
(65,'Sauce soja'),
(66,'Sauce Worcestershire'),
(67,'Crème de tartre'),
(68,'Levure chimique'),
(69,'Poudre à pâte'),
(70,'Gélatine'),
(71,'Mascarpone');
/*!40000 ALTER TABLE `ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recette_ingredient`
--

DROP TABLE IF EXISTS `recette_ingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recette_ingredient` (
  `recette_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`recette_id`,`ingredient_id`),
  KEY `ingredient_id` (`ingredient_id`),
  CONSTRAINT `recette_ingredient_ibfk_1` FOREIGN KEY (`recette_id`) REFERENCES `recettes` (`id`),
  CONSTRAINT `recette_ingredient_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recette_ingredient`
--

LOCK TABLES `recette_ingredient` WRITE;
/*!40000 ALTER TABLE `recette_ingredient` DISABLE KEYS */;
INSERT INTO `recette_ingredient` VALUES
(35,5,NULL),
(35,7,NULL),
(35,8,NULL),
(35,9,NULL),
(35,10,NULL),
(35,11,NULL);
/*!40000 ALTER TABLE `recette_ingredient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recettes`
--

DROP TABLE IF EXISTS `recettes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recettes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `difficulty` int(11) NOT NULL,
  `preparation_time` int(11) NOT NULL,
  `utensils` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `steps` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`steps`)),
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `recettes_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recettes`
--

LOCK TABLES `recettes` WRITE;
/*!40000 ALTER TABLE `recettes` DISABLE KEYS */;
INSERT INTO `recettes` VALUES
(35,'Tiramisu','https://dxpulwm6xta2f.cloudfront.net/eyJidWNrZXQiOiJhZGMtZGV2LWltYWdlcy1yZWNpcGVzIiwia2V5Ijoic2h1dHRlcnN0b2NrXzU2OTAzMzQ3My5qcGciLCJlZGl0cyI6eyJqcGVnIjp7InF1YWxpdHkiOjgwfSwicG5nIjp7InF1YWxpdHkiOjgwfSwid2VicCI6eyJxdWFsaXR5Ijo4MH19fQ==',3,13,NULL,2,3,NULL);
/*!40000 ALTER TABLE `recettes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-03 17:47:14
