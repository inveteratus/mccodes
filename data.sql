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
/*!40000 ALTER TABLE `itemmarket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,1,'Cheezburger','A cheezburger is the ultimate comfort food, scientifically designed to make you forget your problems—at least until the food coma kicks in.\r\n\r\n### Anatomy of a Cheezburger \r\n\r\n* **Bun**: Soft, toasty, and the only thing standing between you and a messy disaster.\r\n* **Beef Patty**: The meaty centerpiece, responsible for 90% of the flavor and 100% of the post-meal nap requirement.\r\n* **Cheese**: Melted perfection that holds everything together, both physically and emotionally.\r\n* **Toppings**:\r\n* * **Lettuce & Tomato**: A desperate attempt to make the burger *look* healthy.\r\n* * **Pickles**: The crunchy surprise you either love or fling off in disgust.\r\n* * **Onions**: For adding both flavor and instant social distancing.\r\n* **Sauces**: Ketchup, mustard, mayo, or that mysterious “*secret sauce*” that’s probably just fancy mayo.\r\n\r\n### Why You Need a Cheezburger in Your Life\r\n\r\n* **Instant joy**: One bite, and suddenly everything is okay.\r\n* **Portable**: A full meal you can hold in one hand (unless it’s a triple stack—then you need two hands and a strong grip).\r\n* **Customizable**: Add bacon, extra cheese, or enough jalapeños to question your life choices.\r\n* **Internet Famous**: Immortalized by the legendary \"*I Can Has Cheezburger?*\" meme, proving even cats understand its greatness.\r\n\r\nA cheezburger isn’t just food—it’s a *lifestyle*.',150,100,1,1,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:2;}',0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,0,'cheezburger'),(2,2,'Dagger','A dagger is basically a sword’s adorable, pocket-sized cousin—perfect for when you want to stab someone, but, like, discreetly.\r\n\r\n### Dagger Features\r\n\r\n* **Blade**: Short, pointy, and double-edged—ideal for close combat or opening stubborn snack packages.\r\n* **Hilt**: Small enough to fit in your hand, large enough to make you feel dangerous.\r\n* **Pommel**: Sometimes weighted for balance, sometimes just there to bonk people on the head.\r\n* **Concealability**: Can be hidden in boots, sleeves, or dramatically revealed in a plot twist.\r\n\r\n### How to Use a Dagger Like a Pro\r\n\r\n* **Stabbing**: The classic. Quick, efficient, and guaranteed to ruin someone’s day.\r\n* **Throwing**: A great way to impress (or terrify) friends at parties.\r\n* **Parrying**: Because sometimes the best defense is a tiny offense.\r\n* **Dramatic Flourish**: Spin it in your hand for no reason other than looking cool.\r\n\r\n### Famous Daggers Throughout History\r\n\r\n* **The Kris**: Wavy blade for extra aesthetic intimidation.\r\n* **The Dirk**: The Scottish version—best paired with a kilt and an intimidating accent.\r\n* **The Assassin’s Hidden Blade**: For when you want to shake hands... violently.\r\n* **The Butter Knife**: Technically not a dagger, but still lethal in the right hands.\r\n\r\nDaggers: Because sometimes a sword is just too much effort.',250,200,1,0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',3,0,'dagger'),(3,2,'Sword','A sword is basically a really aggressive butter knife that humans have used for centuries to solve problems—often by creating new ones.\r\n\r\n### Sword Features\r\n\r\n* **Blade**: Long, shiny, and pointy—perfect for making enemies rethink their life choices.\r\n* **Hilt**: The part you hold so you don’t accidentally high-five the sharp end.\r\n* **Pommel**: A fancy counterweight that doubles as a medieval stress ball (for punching things).\r\n* **Edge**: Either one or two sides that strongly discourage handshakes.\r\n\r\n### Swords in Action\r\n\r\n* **Thrusting**: A polite way to introduce your sword to someone… forcefully.\r\n* **Slashing**: For when you want to add a little artistic flair to your attacks.\r\n* **Blocking** : If your enemy also has a sword (which is just rude), you can clang blades together dramatically.\r\n\r\n### Famous Swords Throughout History\r\n\r\n* **Excalibur**: The original \"finders keepers\" sword.\r\n* **Katana**: For when you want your strikes to be both deadly and *aesthetic*.\r\n* **Gladius**: Because Romans believed in efficiency—stab first, ask questions never.\r\n* **Lightsaber**: A sword, but *make it sci-fi* and sound like an angry beehive.\r\n\r\nSwords have been a staple of human civilization for ages, mainly because they’re both effective and look really cool on display.',750,650,1,0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',5,0,'sword'),(4,3,'Leather Armor','Leather armor is the budget-friendly choice for warriors who want *some* protection but also value mobility, comfort, and looking like a medieval biker.\n\n### Key Features of Leather Armor:\n\n* **Material**: Premium-grade cow, deer, or \"mystery hide\" for that rugged, rustic aesthetic.\n* **Flexibility**: Unlike plate armor, you can actually bend your knees and turn your head—a revolutionary concept in medieval fashion.\n* **Lightweight**: Perfect for sneaky rogues, archers, and people who don’t want to sound like a walking tin can.\n* **Breathability**: Keeps you from cooking yourself alive in the sun. (Still, prepare for some *serious* chafing.)\n* **Style Points**: Bonus if you add fur lining, extra straps, or a dramatic hood for *assassin vibes*.\n\n### Protection Level:\n* 🗸 Blocks minor cuts and scratches.\n* 🗸 Can survive a bar fight.\n* 🗙 Stops swords and arrows *only if the enemy is really bad at aiming*.\n* 🗙 Does not protect against existential dread.\n\n### Who Wears Leather Armor?\n\n* **Rogues & Thieves**: Because you can’t pickpocket if you jingle like a chainmail wind chime.\n* **Archers**: When you need to run away *quickly* after missing your shot.\n* **Rangers & Druids**: Because nothing says \"*I love nature*\" like wearing it.\n* **Adventurers on a Budget**: If plate armor is too expensive and cloth armor is just a fancy bathrobe, leather is your best bet.\n\nLeather armor: It won’t stop a sword, but hey—it looks cool and won’t slow you down!\n',800,600,1,0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,'a:4:{s:4:\"stat\";s:6:\"energy\";s:3:\"dir\";s:3:\"pos\";s:8:\"inc_type\";s:6:\"figure\";s:10:\"inc_amount\";i:0;}',0,3,'leather-armor');
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
INSERT INTO `itemtypes` VALUES (1,'Food'),(2,'Weapons'),(3,'Armour');
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
INSERT INTO `papercontent` VALUES ('Mccodes ... reborn.');
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
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `userstats`
--

LOCK TABLES `userstats` WRITE;
/*!40000 ALTER TABLE `userstats` DISABLE KEYS */;
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

-- Dump completed on 2025-03-31  4:48:07
