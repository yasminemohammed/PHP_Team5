-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: iti_cafeteria
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.20.04.3

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories`
(
    `id`   int          NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK
TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories`
VALUES (3, 'Cold Drinks'),
       (2, 'Food'),
       (1, 'Hot Drinks'),
       (4, 'Hot Food');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK
TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `items`
(
    `id`             int            NOT NULL AUTO_INCREMENT,
    `order_id`       int DEFAULT NULL,
    `product_id`     int DEFAULT NULL,
    `amount`         decimal(10, 0) NOT NULL,
    `price_per_unit` decimal(10, 0) NOT NULL,
    `quantity`       int            NOT NULL,
    PRIMARY KEY (`id`),
    KEY              `order_id` (`order_id`),
    KEY              `product_id` (`product_id`),
    CONSTRAINT `items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
    CONSTRAINT `items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK
TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items`
VALUES (1, 1, 6, 20, 5, 4),
       (2, 1, 5, 20, 10, 2),
       (3, 2, 6, 20, 5, 4),
       (4, 2, 5, 20, 10, 2),
       (5, 3, 6, 20, 5, 4),
       (6, 3, 5, 20, 10, 2);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK
TABLES;

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_status`
(
    `id`           int NOT NULL AUTO_INCREMENT,
    `order_id`     int DEFAULT NULL,
    `order_status` enum('processing','out for delivery','done') DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY            `order_id` (`order_id`),
    CONSTRAINT `order_status_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_status`
--

LOCK
TABLES `order_status` WRITE;
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;
INSERT INTO `order_status`
VALUES (1, 1, 'processing'),
       (2, 2, 'processing'),
       (3, 3, 'processing');
/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;
UNLOCK
TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders`
(
    `id`          int            NOT NULL AUTO_INCREMENT,
    `customer_id` int DEFAULT NULL,
    `amount`      decimal(10, 0) NOT NULL,
    `roomNo`      int            NOT NULL,
    `notes`       text,
    `order_date`  timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY           `customer_id` (`customer_id`),
    CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK
TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders`
VALUES (1, 1, 40, 12, 'tea is too much sugar', '2022-07-06 00:32:01'),
       (2, 1, 40, 12, 'tea is too much sugar', '2022-07-06 01:06:08'),
       (3, 1, 40, 12, 'tea is too much sugar', '2022-07-06 01:06:22');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK
TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products`
(
    `id`           int          NOT NULL AUTO_INCREMENT,
    `name`         varchar(100) NOT NULL,
    `featureImage` varchar(100) DEFAULT NULL,
    `price`        int          NOT NULL,
    `isAvailable`  tinyint(1) DEFAULT '1',
    `category_id`  int          NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `name` (`name`),
    KEY            `category_id` (`category_id`),
    CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK
TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products`
VALUES (3, 'Yansoon', 'FB_IMG_1603009485885.jpg', 5, 1, 1),
       (4, 'Shawrma', 'FB_IMG_1617727342104.jpg', 35, 1, 2),
       (5, 'coffee', NULL, 10, 1, 1),
       (6, 'tea', '', 5, 1, 1),
       (7, 'enab', NULL, 10, 1, 1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK
TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users`
(
    `id`        int          NOT NULL AUTO_INCREMENT,
    `firstName` varchar(100) NOT NULL,
    `lastName`  varchar(100) DEFAULT NULL,
    `username`  varchar(100) NOT NULL,
    `email`     varchar(100) NOT NULL,
    `password`  varchar(100) NOT NULL,
    `avatar`    varchar(100) DEFAULT NULL,
    `roomNo`    int          DEFAULT NULL,
    `ext`       varchar(100) DEFAULT NULL,
    `role`      int          DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `username` (`username`),
    UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK
TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users`
VALUES (1, 'amar', 'ahmed', 'ammar', 'amar@gmail.com', '$2y$10$618muY07s7L5gvfES9x.g.IRl7VS/flHZXCIneP0pCK.OTe6a2rU6',
        '', 10, '1111', 0),
       (2, 'mohamed', 'ffff', 'amar', 'ahmed@ahmed.com', '$2y$10$618muY07s7L5gvfES9x.g.IRl7VS/flHZXCIneP0pCK.OTe6a2rU6',
        NULL, NULL, NULL, 1),
       (4, 'mohamed', 'ffff', 'mohamed', 'mohamed@ahmed.com',
        '$2y$10$d2.emAJY8yrsfmj3QUyKWOEDxvQy899hfO.XZGdbwIot5gua6dvjS', NULL, NULL, NULL, 0),
       (5, 'moaz', 'ffff', 'moaz', 'moaz@ahmed.com', '$2y$10$Fj7.y.8l7jHkPI7j7kXZve/4nEenFsWDRwstKBLZ.9s.liRluYTM2',
        NULL, NULL, NULL, 0),
       (7, 'aaaa', 'ffff', 'aaa', 'aaa@ahmed.com', '$2y$10$M8yS/oEPSmHikEdQisGjvOqxRKWIuZFM04Oej7V2rnxL0ra1J1jSK', NULL,
        NULL, NULL, 0),
       (8, '', '', '', '', '$2y$10$deWMESkjsR64iOyqguLpoeEkCCcL2ww7qFW0jrWvvIZ9ithLuV3uy', NULL, NULL, NULL, 0),
       (9, 'ggggg', 'ffff', 'gggggg', 'ggggg@ahmed.com', '$2y$10$Yxn7wHkWBCo35hM7j793YOieHzZfKnaMyryBuHIJRV.SUbuf0qLsy',
        'Array', 2, '2356', 0),
       (11, 'fddfgfd', 'fffffgdfgd', 'gfdgdf', 'fdgdg@ahmed.com',
        '$2y$10$df2QCVrDvuaawJtqjSW7i.JPqlVpPViODJiQFGiTb7PvNSrbneRTu', 'FB_IMG_1592021890734.jpg', 4, '2356ff', 0),
       (16, '', '', 'ddddd', 'ddddss@gmail.com', '$2y$10$VqdCCHWZ6yJojfyV0AK.se4JZLTwl4VPZv5Zln5roZhc2YOg8S28C', '', 0,
        '', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK
TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-06 20:09:55
