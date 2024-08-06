-- MySQL dump 10.13  Distrib 8.0.39, for Linux (x86_64)
--
-- Host: localhost    Database: db_vmarker
-- ------------------------------------------------------
-- Server version	8.0.39-0ubuntu0.22.04.1

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
-- Table structure for table `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fornecedores` (
  `id_fornecedor` int NOT NULL AUTO_INCREMENT,
  `nome_vendedor` varchar(255) NOT NULL,
  `email_vendedor` varchar(255) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `razao_social` varchar(255) NOT NULL,
  `nome_fantasia` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular_vendedor` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedores`
--

LOCK TABLES `fornecedores` WRITE;
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
INSERT INTO `fornecedores` VALUES (21,'VINICIUS ','vbanetyy@gmail.com','47.615.378/0001-63','Maria AParecida','UPSTREAM DE BENS ','12982590753','12123112313','2024-08-06 02:07:44',NULL),(23,'Devid Marrone','marrone@gmail.com','11.111.414/0001-00','MB LTDA','PARTICIPACOES LTDA','11982590711','12123111245','2024-08-06 13:09:10',NULL),(24,'UPSTREAM','upstreamadm@gmail.com','00010447000154','Mercedes bens LA','LTDA','1199990111','12310505601','2024-08-06 13:10:00',NULL),(25,'Maria Magdala','Mariam@gmail.com','11110447000115','Dev Programadora','DD LTDA','18019095050','01105601600','2024-08-06 13:12:56',NULL),(26,'Denilson','dene@gmail.com','89.752.144/0001-44','DENILSON J LTDA','Denilson LTDA','22999591545','11981841199','2024-08-06 13:15:56',NULL),(27,'MARVADO GETTATEN','marvado@gmail.com','15410447000115','marvado bens LA','MAR LTDA','55992591545','12123112313','2024-08-06 13:17:58',NULL),(28,'Jones Dogy','jd@gmail.com','03920932039230990','Marta Jones Dogy','MJD LA','19992595477','1561561561','2024-08-06 16:24:21',NULL),(29,'Beatriz Brigagão','bia_bb@gmail.com','109222901290','RS mp20','MARIANE MP','12982590753','23019210990','2024-08-06 16:25:03',NULL),(30,'BATISTA','batista@gmail.com','30239093213','Adman AP','Edman LTDA','1112090909','3029302390','2024-08-06 16:25:36',NULL),(31,'Martins Tester','vbatest@gmail.com','3209209091','Teste Tester','TESER MBA','516015605600','54645605606','2024-08-06 16:27:07',NULL),(32,'Marcelo Ribeiro','mb@gmail.com','15.065.06501/560','Social MD','Social MD LTDA','1181909090','105156016','2024-08-06 17:18:14',NULL);
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `id_fornecedor` int NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `valor_produto` decimal(10,2) NOT NULL,
  `peso` decimal(10,2) NOT NULL,
  `quantidade_estoque` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `id_fornecedor` (`id_fornecedor`),
  CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedores` (`id_fornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (8,26,'TV BOX',500.00,200.00,20,'2024-08-06 17:37:51',NULL),(9,32,'Mesa redonda magno',900.00,109.00,8,'2024-08-06 17:38:16',NULL);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-06 19:33:04
