-- MySQL dump 10.13  Distrib 8.2.0, for Linux (x86_64)
--
-- Host: localhost    Database: mccodes
-- ------------------------------------------------------
-- Server version	8.2.0

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
-- Dumping data for table `announcements`
--

LOCK TABLES `announcements` WRITE;
/*!40000 ALTER TABLE `announcements` DISABLE KEYS */;
/*!40000 ALTER TABLE `announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `applications`
--

LOCK TABLES `applications` WRITE;
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `attacklogs`
--

LOCK TABLES `attacklogs` WRITE;
/*!40000 ALTER TABLE `attacklogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `attacklogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `bankxferlogs`
--

LOCK TABLES `bankxferlogs` WRITE;
/*!40000 ALTER TABLE `bankxferlogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `bankxferlogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `blacklist`
--

LOCK TABLES `blacklist` WRITE;
/*!40000 ALTER TABLE `blacklist` DISABLE KEYS */;
/*!40000 ALTER TABLE `blacklist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cashxferlogs`
--

LOCK TABLES `cashxferlogs` WRITE;
/*!40000 ALTER TABLE `cashxferlogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `cashxferlogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `challengebots`
--

LOCK TABLES `challengebots` WRITE;
/*!40000 ALTER TABLE `challengebots` DISABLE KEYS */;
/*!40000 ALTER TABLE `challengebots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `challengesbeaten`
--

LOCK TABLES `challengesbeaten` WRITE;
/*!40000 ALTER TABLE `challengesbeaten` DISABLE KEYS */;
/*!40000 ALTER TABLE `challengesbeaten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'London','The capital of the UK, a global financial hub, and home to landmarks such as Buckingham Palace and the Tower of London.',0),(2,'New York City','The most populous city in the U.S., known for Times Square, Wall Street, Broadway, and the Statue of Liberty.',0),(3,'Tokyo','Japan’s capital and the world\'s most populous metropolitan area, famous for its technology, cuisine, and culture.',0);
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `contactlist`
--

LOCK TABLES `contactlist` WRITE;
/*!40000 ALTER TABLE `contactlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `contactlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `coursesdone`
--

LOCK TABLES `coursesdone` WRITE;
/*!40000 ALTER TABLE `coursesdone` DISABLE KEYS */;
/*!40000 ALTER TABLE `coursesdone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `crimegroups`
--

LOCK TABLES `crimegroups` WRITE;
/*!40000 ALTER TABLE `crimegroups` DISABLE KEYS */;
/*!40000 ALTER TABLE `crimegroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `crimes`
--

LOCK TABLES `crimes` WRITE;
/*!40000 ALTER TABLE `crimes` DISABLE KEYS */;
/*!40000 ALTER TABLE `crimes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `crystalmarket`
--

LOCK TABLES `crystalmarket` WRITE;
/*!40000 ALTER TABLE `crystalmarket` DISABLE KEYS */;
/*!40000 ALTER TABLE `crystalmarket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `crystalxferlogs`
--

LOCK TABLES `crystalxferlogs` WRITE;
/*!40000 ALTER TABLE `crystalxferlogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `crystalxferlogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dps_accepted`
--

LOCK TABLES `dps_accepted` WRITE;
/*!40000 ALTER TABLE `dps_accepted` DISABLE KEYS */;
/*!40000 ALTER TABLE `dps_accepted` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fedjail`
--

LOCK TABLES `fedjail` WRITE;
/*!40000 ALTER TABLE `fedjail` DISABLE KEYS */;
/*!40000 ALTER TABLE `fedjail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `forum_forums`
--

LOCK TABLES `forum_forums` WRITE;
/*!40000 ALTER TABLE `forum_forums` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_forums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `forum_posts`
--

LOCK TABLES `forum_posts` WRITE;
/*!40000 ALTER TABLE `forum_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `forum_topics`
--

LOCK TABLES `forum_topics` WRITE;
/*!40000 ALTER TABLE `forum_topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `friendslist`
--

LOCK TABLES `friendslist` WRITE;
/*!40000 ALTER TABLE `friendslist` DISABLE KEYS */;
/*!40000 ALTER TABLE `friendslist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `gangevents`
--

LOCK TABLES `gangevents` WRITE;
/*!40000 ALTER TABLE `gangevents` DISABLE KEYS */;
/*!40000 ALTER TABLE `gangevents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `gangs`
--

LOCK TABLES `gangs` WRITE;
/*!40000 ALTER TABLE `gangs` DISABLE KEYS */;
/*!40000 ALTER TABLE `gangs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `gangwars`
--

LOCK TABLES `gangwars` WRITE;
/*!40000 ALTER TABLE `gangwars` DISABLE KEYS */;
/*!40000 ALTER TABLE `gangwars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `houses`
--

LOCK TABLES `houses` WRITE;
/*!40000 ALTER TABLE `houses` DISABLE KEYS */;
INSERT INTO `houses` VALUES (1,'Default House',0,100);
/*!40000 ALTER TABLE `houses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `imarketaddlogs`
--

LOCK TABLES `imarketaddlogs` WRITE;
/*!40000 ALTER TABLE `imarketaddlogs` DISABLE KEYS */;
INSERT INTO `imarketaddlogs` VALUES (1,1,50,1,1,1743251827,'Inveteratus added Cheezburger x2 to the item market for 50 money');
/*!40000 ALTER TABLE `imarketaddlogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `imbuylogs`
--

LOCK TABLES `imbuylogs` WRITE;
/*!40000 ALTER TABLE `imbuylogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `imbuylogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `imremovelogs`
--

LOCK TABLES `imremovelogs` WRITE;
/*!40000 ALTER TABLE `imremovelogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `imremovelogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,1,1,7),(2,2,1,4),(3,3,1,4),(4,1,1,5),(5,4,1,0);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `itembuylogs`
--

LOCK TABLES `itembuylogs` WRITE;
/*!40000 ALTER TABLE `itembuylogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `itembuylogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `itemmarket`
--

LOCK TABLES `itemmarket` WRITE;
/*!40000 ALTER TABLE `itemmarket` DISABLE KEYS */;
INSERT INTO `itemmarket` VALUES (1,1,1,50,'money',2);
/*!40000 ALTER TABLE `itemmarket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,1,'Cheezburger','Yum yum',150,100,1,1,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:2;}',0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,0),(2,2,'Dagger','Short and pointy',250,200,1,0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',5,0),(3,2,'Sword','Better than a dagger',750,650,1,0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',10,0),(4,3,'Leather Armor','Provides limited protection',800,600,1,0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,5);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `itemselllogs`
--

LOCK TABLES `itemselllogs` WRITE;
/*!40000 ALTER TABLE `itemselllogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemselllogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `itemtypes`
--

LOCK TABLES `itemtypes` WRITE;
/*!40000 ALTER TABLE `itemtypes` DISABLE KEYS */;
INSERT INTO `itemtypes` VALUES (1,'Food'),(2,'weapons'),(3,'armour');
/*!40000 ALTER TABLE `itemtypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `itemxferlogs`
--

LOCK TABLES `itemxferlogs` WRITE;
/*!40000 ALTER TABLE `itemxferlogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemxferlogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `jaillogs`
--

LOCK TABLES `jaillogs` WRITE;
/*!40000 ALTER TABLE `jaillogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jaillogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `jobranks`
--

LOCK TABLES `jobranks` WRITE;
/*!40000 ALTER TABLE `jobranks` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `mail`
--

LOCK TABLES `mail` WRITE;
/*!40000 ALTER TABLE `mail` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `oclogs`
--

LOCK TABLES `oclogs` WRITE;
/*!40000 ALTER TABLE `oclogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `oclogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `orgcrimes`
--

LOCK TABLES `orgcrimes` WRITE;
/*!40000 ALTER TABLE `orgcrimes` DISABLE KEYS */;
/*!40000 ALTER TABLE `orgcrimes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `papercontent`
--

LOCK TABLES `papercontent` WRITE;
/*!40000 ALTER TABLE `papercontent` DISABLE KEYS */;
INSERT INTO `papercontent` VALUES ('Here you can put game news, or prehaps an update log.');
/*!40000 ALTER TABLE `papercontent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `polls`
--

LOCK TABLES `polls` WRITE;
/*!40000 ALTER TABLE `polls` DISABLE KEYS */;
/*!40000 ALTER TABLE `polls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `preports`
--

LOCK TABLES `preports` WRITE;
/*!40000 ALTER TABLE `preports` DISABLE KEYS */;
/*!40000 ALTER TABLE `preports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `referals`
--

LOCK TABLES `referals` WRITE;
/*!40000 ALTER TABLE `referals` DISABLE KEYS */;
/*!40000 ALTER TABLE `referals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'validate_period','15','string'),(2,'validate_on','0','bool'),(3,'regcap_on','0','bool'),(4,'hospital_count','0','int'),(5,'jail_count','0','int'),(6,'sendcrys_on','1','bool'),(7,'sendbank_on','1','bool'),(8,'ct_refillprice','12','int'),(9,'ct_iqpercrys','5','int'),(10,'ct_moneypercrys','200','int'),(11,'staff_pad','Here you can store notes for all staff to see.','string'),(12,'willp_item','0','int'),(13,'jquery_location','js/jquery-1.7.1.min.js','string'),(14,'use_timestamps_over_crons','1','bool'),(15,'game_name','MCCodes V2','string'),(16,'game_description','MCCodes Made Good','string'),(17,'game_owner','','string');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shopitems`
--

LOCK TABLES `shopitems` WRITE;
/*!40000 ALTER TABLE `shopitems` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shops`
--

LOCK TABLES `shops` WRITE;
/*!40000 ALTER TABLE `shops` DISABLE KEYS */;
/*!40000 ALTER TABLE `shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `stafflog`
--

LOCK TABLES `stafflog` WRITE;
/*!40000 ALTER TABLE `stafflog` DISABLE KEYS */;
INSERT INTO `stafflog` VALUES (1,1,1743227318,'Added item type Food','172.20.0.1'),(2,1,1743227380,'Created item Chheseburger','172.20.0.1'),(3,1,1743227399,'Gave 10 of item ID 1 to user ID 1','172.20.0.1'),(4,1,1743228609,'Added item type weapons','172.20.0.1'),(5,1,1743228617,'Added item type armour','172.20.0.1'),(6,1,1743228663,'Created item Dagger','172.20.0.1'),(7,1,1743228760,'Created item Sword','172.20.0.1'),(8,1,1743228781,'Gave 5 of item ID 2 to user ID 1','172.20.0.1'),(9,1,1743228793,'Gave 5 of item ID 3 to user ID 1','172.20.0.1'),(10,1,1743248581,'Created item Leather Armor','172.20.0.1'),(11,1,1743248601,'Gave 1 of item ID 4 to user ID 1','172.20.0.1');
/*!40000 ALTER TABLE `stafflog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `staffnotelogs`
--

LOCK TABLES `staffnotelogs` WRITE;
/*!40000 ALTER TABLE `staffnotelogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `staffnotelogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `surrenders`
--

LOCK TABLES `surrenders` WRITE;
/*!40000 ALTER TABLE `surrenders` DISABLE KEYS */;
/*!40000 ALTER TABLE `surrenders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `unjaillogs`
--

LOCK TABLES `unjaillogs` WRITE;
/*!40000 ALTER TABLE `unjaillogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `unjaillogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','7b23ebf0c53d007bc0f69c78b11811a0','99270494','admin@example.com',1,0,0,0,1743252409,'172.20.0.1',0,4,92,100,5,5,12,100,100,1,0,0,'',0,2,'Male',1,1743174729,0,0,0,0,0,0,'','','',0,-1,'',0,'','','172.20.0.1','',1743245177,'',0,0,0,0,'',0,'','',0,0,0,0,0,0,'',3,2,4,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `userstats`
--

LOCK TABLES `userstats` WRITE;
/*!40000 ALTER TABLE `userstats` DISABLE KEYS */;
INSERT INTO `userstats` VALUES (1,24.3547,25.258,31.61,10,10);
/*!40000 ALTER TABLE `userstats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `votes`
--

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `willps_accepted`
--

LOCK TABLES `willps_accepted` WRITE;
/*!40000 ALTER TABLE `willps_accepted` DISABLE KEYS */;
/*!40000 ALTER TABLE `willps_accepted` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29 12:47:45
