-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: inventaire
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB-0+deb9u1

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
-- Table structure for table `Categorie`
--

DROP TABLE IF EXISTS `Categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Categorie` (
  `idCat` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idCat`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categorie`
--

LOCK TABLES `Categorie` WRITE;
/*!40000 ALTER TABLE `Categorie` DISABLE KEYS */;
INSERT INTO `Categorie` VALUES (1,'Art'),(2,'Alimentation'),(3,'Technologies'),(4,'Sport'),(5,'Musique'),(6,'Médias'),(7,'Transport'),(8,'Santé'),(9,'Film');
/*!40000 ALTER TABLE `Categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Produits`
--

DROP TABLE IF EXISTS `Produits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Produits` (
  `prd_id` int(11) NOT NULL AUTO_INCREMENT,
  `prd_nom` varchar(30) DEFAULT NULL,
  `prd_qte` int(11) DEFAULT NULL,
  `prd_pu` float DEFAULT NULL,
  `prd_cat` int(11) DEFAULT NULL,
  PRIMARY KEY (`prd_id`),
  KEY `prd_cat` (`prd_cat`),
  CONSTRAINT `Produits_ibfk_1` FOREIGN KEY (`prd_cat`) REFERENCES `Categorie` (`idCat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Produits`
--

LOCK TABLES `Produits` WRITE;
/*!40000 ALTER TABLE `Produits` DISABLE KEYS */;
INSERT INTO `Produits` VALUES (1,'pomme',52,1.52,1),(5,'vélo',152,112.99,4),(6,'Pokemon',52,7.52,9);
/*!40000 ALTER TABLE `Produits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER`
--

DROP TABLE IF EXISTS `USER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER` (
  `id_user` int(11) NOT NULL,
  `login` varchar(15) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER`
--

LOCK TABLES `USER` WRITE;
/*!40000 ALTER TABLE `USER` DISABLE KEYS */;
INSERT INTO `USER` VALUES (1,'nitharsan','azerty'),(2,'romain','azerty');
/*!40000 ALTER TABLE `USER` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-14 17:18:01
