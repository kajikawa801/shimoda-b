-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: shimodab1
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

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
-- Table structure for table `dat_replenishment`
--

DROP TABLE IF EXISTS `dat_replenishment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dat_replenishment` (
  `code_replenishment` int(11) NOT NULL AUTO_INCREMENT,
  `code_vmachine` int(11) NOT NULL,
  `code_drink` int(11) NOT NULL,
  PRIMARY KEY (`code_replenishment`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dat_replenishment`
--

LOCK TABLES `dat_replenishment` WRITE;
/*!40000 ALTER TABLE `dat_replenishment` DISABLE KEYS */;
INSERT INTO `dat_replenishment` VALUES (1,1,1),(2,1,2),(3,1,3);
/*!40000 ALTER TABLE `dat_replenishment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dat_request`
--

DROP TABLE IF EXISTS `dat_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dat_request` (
  `code_request` int(11) NOT NULL AUTO_INCREMENT,
  `name_request` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`code_request`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dat_request`
--

LOCK TABLES `dat_request` WRITE;
/*!40000 ALTER TABLE `dat_request` DISABLE KEYS */;
INSERT INTO `dat_request` VALUES (1,'オレンジ'),(2,'オレンジ'),(3,'オレンジ');
/*!40000 ALTER TABLE `dat_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dat_request2`
--

DROP TABLE IF EXISTS `dat_request2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dat_request2` (
  `code_request` int(11) NOT NULL AUTO_INCREMENT,
  `name_request` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`code_request`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dat_request2`
--

LOCK TABLES `dat_request2` WRITE;
/*!40000 ALTER TABLE `dat_request2` DISABLE KEYS */;
INSERT INTO `dat_request2` VALUES (1,'カルピス'),(2,'カルピス'),(3,'カルピス'),(4,'カルピス'),(5,'カルピス'),(6,'カルピス'),(7,'カルピス');
/*!40000 ALTER TABLE `dat_request2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_data`
--

DROP TABLE IF EXISTS `login_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_data` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_data`
--

LOCK TABLES `login_data` WRITE;
/*!40000 ALTER TABLE `login_data` DISABLE KEYS */;
INSERT INTO `login_data` VALUES (1,'kajikawa','kajikawa');
/*!40000 ALTER TABLE `login_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `markers`
--

DROP TABLE IF EXISTS `markers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `markers`
--

LOCK TABLES `markers` WRITE;
/*!40000 ALTER TABLE `markers` DISABLE KEYS */;
INSERT INTO `markers` VALUES (9,'千葉工業大学1号館','千葉県習志野市津田沼2-17-1',35.689220,140.020782,'university','https://www.it-chiba.ac.jp/'),(10,'6号館','千葉県習志野市津田沼2-17-1',35.688702,140.020737,'vending machine','./m_jihannki_6.php'),(11,'4号館','千葉県習志野市津田沼2-17-1',35.688194,140.021362,'vending machine','./m_jihannki_4.php'),(12,'3号館','千葉県習志野市津田沼2-17-1',35.688446,140.021378,'vending machine','./m_jihannki_3.php'),(13,'バス停前','千葉県習志野市津田沼2-17-1',35.689064,140.021652,'vending machine','./m_jihannki_bus.php');
/*!40000 ALTER TABLE `markers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_beverage`
--

DROP TABLE IF EXISTS `mst_beverage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_beverage` (
  `code_drink` int(11) NOT NULL AUTO_INCREMENT,
  `name_drink` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `data_drink` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image_drink` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `code_vmachine` int(11) NOT NULL,
  PRIMARY KEY (`code_drink`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_beverage`
--

LOCK TABLES `mst_beverage` WRITE;
/*!40000 ALTER TABLE `mst_beverage` DISABLE KEYS */;
INSERT INTO `mst_beverage` VALUES (1,'WONDA モーニングショット','コーヒー。アサヒ飲料のWANDAシリーズの定番。\r\n朝のスイッチをオンにする 朝専用 缶コーヒースッと飲めて、キリッと苦味。\r\n“焼きたて・挽きたて・淹れたて”の目覚めるおいしさ。\r\n毎朝のスタートにふさわしい朝専用缶コーヒーです。',130,'wonda_morning.jpg',1),(2,'WONDA 金の微糖','ブラジル最高等級高級豆100%に高級豆で抽出したエスプレッソをブレンドすることで、コク深い味わいとキレのよい後味を実現。\r\n仕事に向かう前に、こだわりのひとときが愉しめるプレミアム微糖缶コーヒーです。',130,'wonda_gold.jpg',1),(3,'三ツ矢サイダー','ろ過を重ねた安心・安全な磨かれた水を使っています。\r\n果実などから集めた香りにより、独自のおいしさがうまれます。\r\n熱を加えていないので、さわやかな味わいが引き立ちます。',120,'mitsuya-cider.jpg',1),(4,'十六茶','「十六茶」は「東洋健康思想」の考え方に基づき、カラダの内外にバランスよく刺激を与えることを目的として、16種類もの健康素材をブレンドしています。',150,'sixteentea.jpg',1),(5,'モンスターエナジー','アメリカで生まれ、世界中で一大ブームを巻き起こしているエナジードリンク、Monster! 誰もがハマる爽快感とパンチのあるテイスト。',210,'monster-energy.jpg',1),(6,'カルピスウォーター','すっきり爽やかな味わい、純水でおいしく仕上げた「カルピス」です。\r\n乳酸菌と酵母、発酵という自然製法が生みだす独自のおいしさを、いつでもどこでも手軽に楽しめます。',150,'calpis_water.jpg',1),(8,'コカ・コーラ','ペットボトル500ml',160,'',2),(9,'リアルゴールド','ペットボトル500ml',160,'',2),(10,'アクエリアス','ペットボトル500ml',160,'',2),(11,'ファンタグレープ','缶350ml',130,'',2),(12,'ドクターペッパー','缶350ml',130,'',2),(13,'綾鷹','ペットボトル500ml',160,'',2),(14,'いろはす','ペットボトル500ml',100,'',2),(15,'ジョージアカフェラテ','ペットボトル500ml',160,'',2),(16,'綾鷹(350ml)','ペットボトル350ml',130,'',2),(17,'アロエ白ぶどう','缶350ml',130,'',2);
/*!40000 ALTER TABLE `mst_beverage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_vmachine`
--

DROP TABLE IF EXISTS `mst_vmachine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_vmachine` (
  `code_vmachine` int(11) NOT NULL AUTO_INCREMENT,
  `name_vmachine` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`code_vmachine`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_vmachine`
--

LOCK TABLES `mst_vmachine` WRITE;
/*!40000 ALTER TABLE `mst_vmachine` DISABLE KEYS */;
INSERT INTO `mst_vmachine` VALUES (1,'四号館１階１',''),(2,'六号館１階',''),(3,'四号館１階２',''),(4,'四号館１階３',''),(5,'三号館１階',''),(6,'三号館２階',''),(7,'バスターミナル１',''),(8,'バスターミナル２',''),(9,'バスターミナル３',''),(10,'五号館１階','');
/*!40000 ALTER TABLE `mst_vmachine` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-30  3:07:22
