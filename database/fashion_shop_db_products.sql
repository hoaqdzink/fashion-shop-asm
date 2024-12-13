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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `original_price` decimal(10,2) DEFAULT NULL,
  `discount_percentage` decimal(5,2) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`) /*T![clustered_index] CLUSTERED */,
  KEY `fk_1` (`category_id`),
  KEY `fk_3` (`user_id`),
  KEY `fk_color` (`color_id`),
  CONSTRAINT `fk_1` FOREIGN KEY (`category_id`) REFERENCES `fashion_shop_db`.`categories` (`category_id`),
  CONSTRAINT `fk_color` FOREIGN KEY (`color_id`) REFERENCES `fashion_shop_db`.`colors` (`color_id`),
  CONSTRAINT `fk_products_category_id` FOREIGN KEY (`category_id`) REFERENCES `fashion_shop_db`.`categories` (`category_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=450001;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (300001,'Tinh Hoa Phố Thị',1650000.00,1700000.00,5.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/4.PNG','',60003,1,1),(300002,'Tối Giản Thanh Tao',700000.00,900000.00,7.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/10.PNG','',60003,1,30001),(300004,'Nhịp Sống Đường Phố',450000.00,500000.00,10.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/9.PNG','',60003,1,2),(330018,'Áo thể thao nam',700000.00,800000.00,9.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/16.png','',60002,1,3),(330019,'Thời trang mùa xuân',900000.00,1000000.00,5.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/13.png','',60002,1,2),(330020,'Áo thun Breeze',200000.00,250000.00,20.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/ao-thun-polo-cv-brezee-10-mau.webp','Áo thun nam được làm từ chất liệu cotton cao cấp, mang lại cảm giác thoáng mát và dễ chịu khi mặc. Thiết kế đơn giản nhưng không kém phần thời trang, phù hợp cho các hoạt động hàng ngày hoặc đi chơi.\r\n',60002,1,2),(330021,'Polo cao cấp',1500000.00,1800000.00,7.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/14.png','',60002,1,3),(330022,'Quần jeans Glamour',350000.00,400000.00,12.50,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/3-86480353-cce3-4c1c-8d7d-7a41271ca430.webp','Quần jeans nữ với kiểu dáng ôm sát, tôn lên vẻ đẹp hình thể. Chất liệu co giãn tốt, giúp bạn thoải mái di chuyển. Phù hợp để phối cùng áo thun hoặc áo sơ mi cho phong cách năng động.',60003,1,3),(330023,'Giày thể thao Dynamic',500000.00,600000.00,16.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/3ae94e34b5f1202cac734cbed291ab85.jpg_720x720q80.jpg','Giày thể thao nam với thiết kế hiện đại, đế giày êm ái giúp bảo vệ đôi chân trong suốt quá trình vận động. Phù hợp cho các hoạt động thể thao hoặc dạo phố.',60002,1,30001),(330024,'Sơ mi thanh lịch',700000.00,900000.00,12.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/12.png','',60002,1,1),(330025,'Thể thao sói ca',1100000.00,1300000.00,2.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/15.png','',60002,1,30001),(330026,'Đồng hồ Prestige',1200000.00,1500000.00,20.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/424.53.40.21.02_1718078088_1721705232.jpg','Đồng hồ nam với khả năng chống nước, dây da bền bỉ. Thiết kế mặt đồng hồ tinh tế, phù hợp cho cả đi làm và đi chơi, giúp bạn luôn tự tin và nổi bật.',60002,1,1),(330027,'Áo chữ V',450000.00,600000.00,13.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/6.PNG','',60003,1,30001),(330028,'Mũ lưỡi trai Vivid',150000.00,180000.00,16.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/vn-11134207-7r98o-lqdhiatxq1ua9c.jpg','Mũ lưỡi trai unisex với nhiều màu sắc trẻ trung, phù hợp cho cả nam và nữ. Chất liệu vải thoáng mát, giúp bảo vệ bạn khỏi ánh nắng mặt trời.',60002,1,3),(360001,'Giày cao gót Grace',600000.00,700000.00,14.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/1103249.webp','Giày cao gót nữ với thiết kế sang trọng, tôn lên vẻ đẹp nữ tính. Chất liệu da cao cấp, mang lại cảm giác thoải mái khi di chuyển.',60005,1,30001),(390001,'Váy liền công sở',550000.00,650000.00,15.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/dam-chu-a-co-dan-tong-phoi-day-no-eo-kk105-36.webp','Váy liền form A thanh lịch, chất liệu thoáng mát, phù hợp đi làm',60003,1,1),(390002,'Áo sơ mi nữ trắng',420000.00,480000.00,12.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/0a4b6541d9d9e6be830d529bf85dab8c.jpg','Áo sơ mi nữ chất liệu lụa mềm mại, form suông nhẹ nhàng',60003,1,3),(390003,'Quần culottes nữ',480000.00,550000.00,13.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/6c3639c0-7002-11ea-a905-5914a0053cca.webp','Quần culottes ống rộng, chất liệu thoáng mát, dễ phối đồ',60003,1,4),(420001,'Áo Polo Nam Premium',450000.00,599000.00,25.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/OIP%20%281%29.jpg','Áo polo nam chất liệu cotton cao cấp, form regular fit thanh lịch. Có nhiều màu sắc: đen, trắng, xanh navy. Phù hợp mặc đi làm hoặc đi chơi.',60002,1,3),(420002,'Quần Jeans Nam Slim Fit',650000.00,899000.00,28.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/OIP%20%283%29.jpg','Quần jeans nam form slim fit, chất jean co giãn thoải mái. Thiết kế hiện đại với màu xanh đậm wash nhẹ. Dễ dàng phối với nhiều loại áo khác nhau.',60002,1,1),(420003,'Áo Sơ Mi Nam Dài Tay Lịch Lãm',399000.00,499000.00,20.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/ao-so-mi-nam-cong-so-mau-xanh-dep-cuc-chat.jpg','Áo sơ mi nam dài tay chất liệu cotton pha, form regular fit. Thiết kế basic dễ mặc, phù hợp môi trường công sở. Có các màu: trắng, xanh nhạt, ghi.',60002,1,2),(420004,'Quần Kaki Nam Casual',399000.00,549000.00,27.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/R%20%281%29.jpg','Quần kaki nam chất liệu cotton khaki cao cấp, form regular fit. Thiết kế basic với nhiều màu sắc: be, xám, đen. Phù hợp mặc đi làm hoặc đi chơi.',60002,1,2),(420005,'Áo Thun Nam Cổ Tròn Cotton',199000.00,299000.00,33.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/balo-thoi-trang-xiaomi-urban-lifestyle-gen2-2_39c29963b5c54d188b05f8da2f5f7a86_master.webp','Áo thun nam cổ tròn chất liệu 100% cotton, form regular fit. Thiết kế đơn giản, dễ mặc với nhiều màu sắc: đen, trắng, xám. Phù hợp mặc hàng ngày.',60002,1,4),(420006,'Mũ Lưỡi Trai Nam Classic',199000.00,299000.00,33.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/mu-luoi-trai-den-tron-9.jpg','Mũ lưỡi trai nam chất liệu cotton cao cấp, thiết kế basic với logo thêu nổi. Có thể điều chỉnh kích thước. Màu sắc: đen, xanh navy, trắng. Phù hợp đi chơi, dã ngoại.',60002,1,30001),(420007,'Kính Mát Nam Chống UV',599000.00,799000.00,25.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/b4c4b49d34939452e9699aecf693ae80.jpg','Kính râm nam tròng polarized chống tia UV, gọng kim loại cao cấp. Thiết kế thời trang, phong cách pilot. Màu tròng: đen, xám khói. Tặng kèm hộp đựng và khăn lau.',60002,1,1),(420008,'Kính Mắt Nam Thời  Trang',155000.00,544000.00,66.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/vn-11134207-7r98o-lkynjgejtz3194.jpg','Kính râm nam tròng polarized chống tia UV, gọng kim loại cao cấp. Thiết kế thời trang, phong cách pilot. Màu tròng: đen, xám khói. Tặng kèm hộp đựng và khăn lau.',60004,1,2),(420009,'Giày Sneaker Nam Năng Động',799000.00,1199000.00,33.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/8d5cd186604fb93560c96eed5cce7231%20%281%29.jpg',' Giày sneaker nam đế cao su êm ái, upper làm từ vải mesh thoáng khí. Thiết kế thể thao năng động, phù hợp đi chơi, tập gym. Màu sắc: trắng-xám, đen full, xanh navy.',60003,1,2),(420010,'Giày Sport Nam Thời Trang',344000.00,675000.00,54.00,'https://phpasm.s3.ap-southeast-2.amazonaws.com/uploads/OIP.jpg','Giày sneaker nam đế cao su êm ái, upper làm từ vải mesh thoáng khí. Thiết kế thể thao năng động, phù hợp đi chơi, tập gym. Màu sắc: trắng-xám, đen full, xanh navy.',60004,1,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-10 21:30:25
