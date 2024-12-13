-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: gateway01.ap-southeast-1.prod.aws.tidbcloud.com    Database: fashion_shop_db
-- ------------------------------------------------------
-- Server version	5.7.28-TiDB-Serverless

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `role_id` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`) /*T![clustered_index] CLUSTERED */,
  UNIQUE KEY `email` (`email`),
  KEY `fk_1` (`role_id`),
  CONSTRAINT `fk_users_role_id` FOREIGN KEY (`role_id`) REFERENCES `fashion_shop_db`.`roles` (`role_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=150002;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ptp.phamphong@gmail.com','123','Phạm Thanh Phong','1998-12-02',1,NULL),(30002,'vinhnh.dev@gmail.com','Hoangvinh2312','Nguyễn Hoàng Vinh','2024-01-01',1,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/18.jpg'),(60002,'lap@gmail.com','123456','Chí Lập','2024-12-04',30002,NULL),(90002,'phong@gmail.com','123456789','Hoài Phong','2024-11-07',30002,NULL),(90003,'dung@gmail.com','123456','Xuân Dũng','2024-11-07',30002,NULL),(120002,'luuchilap@gmail.com','123','Lưu Chí Lập','0044-02-01',30002,NULL);
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

-- Dump completed on 2024-12-10 21:30:27
