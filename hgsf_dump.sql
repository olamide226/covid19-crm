-- MySQL dump 10.13  Distrib 5.7.33, for Linux (x86_64)
--
-- Host: localhost    Database: hgsf
-- ------------------------------------------------------
-- Server version	5.7.33-0ubuntu0.16.04.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `publicationDate` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_assignment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` VALUES ('basicUserRole',4,1565167996),('basicUserRole',13,1565167996),('basicUserRole',15,1565167996),('basicUserRole',17,1585606962),('basicUserRole',27,1585606962),('basicUserRole',33,1585932083),('basicUserRole',35,1586616902),('basicUserRole',37,1586894806),('basicUserRole',39,1586894955),('basicUserRole',41,1586895106),('basicUserRole',43,1586895326),('basicUserRole',45,1586895499),('basicUserRole',47,1586895624),('basicUserRole',49,1586895727),('basicUserRole',51,1586895887),('basicUserRole',53,1586896079),('basicUserRole',55,1586896168),('basicUserRole',57,1586896286),('basicUserRole',59,1586896446),('basicUserRole',61,1586896542),('basicUserRole',63,1586896629),('basicUserRole',65,1586896717),('basicUserRole',67,1586896831),('basicUserRole',69,1586896935),('basicUserRole',71,1586897019),('basicUserRole',73,1586897126),('basicUserRole',75,1586897229),('basicUserRole',77,1586897331),('basicUserRole',79,1586897417),('basicUserRole',81,1586897495),('basicUserRole',83,1586897586),('basicUserRole',85,1586897662),('basicUserRole',87,1586897756),('basicUserRole',89,1586897888),('basicUserRole',91,1586898026),('basicUserRole',93,1586898107),('basicUserRole',95,1586898246),('basicUserRole',97,1586898368),('basicUserRole',99,1586898484),('basicUserRole',101,1586898593),('basicUserRole',103,1586898712),('basicUserRole',105,1586898952),('basicUserRole',107,1586899028),('basicUserRole',109,1586899141),('supervisor',5,1585601471);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `group_code` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  KEY `fk_auth_item_group_code` (`group_code`),
  CONSTRAINT `fk_auth_item_group_code` FOREIGN KEY (`group_code`) REFERENCES `auth_item_group` (`code`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES ('/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('//*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('//controller',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('//crud',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('//extension',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('//form',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('//index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('//model',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('//module',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/asset/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/asset/compress',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/asset/template',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/boi/*',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/boi/chat',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/boi/chatchecker',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/boi/chatcheckerhist',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/boi/create',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/boi/delete',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/boi/excel',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/boi/index',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/boi/notify',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/boi/statchat',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/boi/update',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/boi/updatechat',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/boi/view',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/cache/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/cache/flush',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/cache/flush-all',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/cache/flush-schema',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/cache/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/call-source/*',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/call-source/create',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/call-source/delete',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/call-source/index',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/call-source/update',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/call-source/view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/casetwo/*',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/casetwo/create',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/casetwo/delete',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/casetwo/dta-records',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/casetwo/excel',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/casetwo/index',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/casetwo/sla-update',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/casetwo/sla-view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/casetwo/update',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/casetwo/view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/category/*',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/category/create',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/category/delete',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/category/index',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/category/update',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/category/view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/caterer/*',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/caterer/call-records',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/caterer/create',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/caterer/delete',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/caterer/excel',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/caterer/index',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/caterer/update',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/caterer/view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/caterers/*',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/caterers/create',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/caterers/delete',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/caterers/excel',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/caterers/index',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/caterers/update',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/caterers/view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/comment/*',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/comment/create',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/comment/delete',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/comment/index',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/comment/update',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/comment/view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/complaint/*',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/complaint/call-records',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/complaint/create',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/complaint/delete',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/complaint/excel',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/complaint/index',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/complaint/update',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/complaint/view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/conversations/*',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/conversations/admin',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/conversations/create',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/conversations/delete',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/conversations/escalate',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/conversations/index',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/conversations/sla',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/conversations/sla-update',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/conversations/sla-view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/conversations/update',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/conversations/view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/conversations/viewonly',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/debug/*',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/debug/default/*',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/debug/default/db-explain',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/debug/default/download-mail',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/debug/default/index',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/debug/default/toolbar',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/debug/default/view',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/debug/user/*',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/debug/user/reset-identity',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/debug/user/set-identity',3,NULL,NULL,NULL,1566286785,1566286785,NULL),('/ecrm-conversations/*',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/ecrm-conversations/create',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/ecrm-conversations/delete',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/ecrm-conversations/index',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/ecrm-conversations/update',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/ecrm-conversations/view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/enquiry/*',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/enquiry/call-records',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/enquiry/create',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/enquiry/delete',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/enquiry/excel',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/enquiry/index',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/enquiry/update',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/enquiry/view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/entry-source/*',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/entry-source/create',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/entry-source/delete',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/entry-source/index',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/entry-source/update',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/entry-source/view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/existpaylogs/*',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/existpaylogs/admin',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/existpaylogs/create',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/existpaylogs/delete',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/existpaylogs/escalate',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/existpaylogs/index',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/existpaylogs/sla',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/existpaylogs/sla-update',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/existpaylogs/sla-view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/existpaylogs/update',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/existpaylogs/view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/existpaylogs/viewonly',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/fixture/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/fixture/load',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/fixture/unload',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/gii/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/gii/default/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/gii/default/action',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/gii/default/diff',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/gii/default/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/gii/default/preview',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/gii/default/view',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/hello/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/hello/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/help/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/help/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/hgsf/*',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/hgsf/chat',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/hgsf/chatchecker',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/hgsf/chatcheckerhist',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/hgsf/create',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/hgsf/delete',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/hgsf/excel',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/hgsf/index',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/hgsf/notify',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/hgsf/statchat',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/hgsf/update',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/hgsf/updatechat',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/hgsf/view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/kwikcash/*',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/kwikcash/create',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/kwikcash/delete',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/kwikcash/index',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/kwikcash/update',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/kwikcash/view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/mail/*',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/mail/create',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/mail/delete',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/mail/index',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/mail/mailer',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/mail/options',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/mail/update',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/mail/view',3,NULL,NULL,NULL,1566286784,1566286784,NULL),('/message/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/message/config',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/message/extract',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/migrate/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/migrate/create',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/migrate/down',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/migrate/history',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/migrate/mark',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/migrate/new',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/migrate/redo',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/migrate/to',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/migrate/up',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/paylogs/*',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/paylogs/admin',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/paylogs/create',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/paylogs/delete',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/paylogs/escalate',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/paylogs/index',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/paylogs/sla',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/paylogs/sla-update',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/paylogs/sla-view',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/paylogs/update',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/paylogs/view',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/paylogs/viewonly',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/product/*',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/product/create',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/product/delete',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/product/index',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/product/update',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/product/view',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/*',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/achat',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/ajax',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/captcha',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/chatajax',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/contact',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/error',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/index',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/login',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/logout',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/notify',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/recentchat',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/recovery-reports',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/reports',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/stats',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/update-chat',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/users-chat',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/site/vreports',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/sla/*',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/sla/create',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/sla/delete',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/sla/fetch',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/sla/index',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/sla/mailer',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/sla/update',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/sla/view',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/sub-category/*',3,NULL,NULL,NULL,1567073928,1567073928,NULL),('/sub-category/create',3,NULL,NULL,NULL,1567073928,1567073928,NULL),('/sub-category/delete',3,NULL,NULL,NULL,1567073928,1567073928,NULL),('/sub-category/index',3,NULL,NULL,NULL,1567073928,1567073928,NULL),('/sub-category/update',3,NULL,NULL,NULL,1567073928,1567073928,NULL),('/sub-category/view',3,NULL,NULL,NULL,1567073928,1567073928,NULL),('/tm-conversations/*',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tm-conversations/create',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tm-conversations/delete',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tm-conversations/index',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tm-conversations/update',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tm-conversations/view',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tm-reasons/*',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tm-reasons/create',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tm-reasons/delete',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tm-reasons/index',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tm-reasons/update',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tm-reasons/view',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tmverification/*',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tmverification/chart',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tmverification/create',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tmverification/delete',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tmverification/excel',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tmverification/index',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tmverification/update',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tmverification/verification',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tmverification/view',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tradermoni-outgoing/*',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tradermoni-outgoing/create',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tradermoni-outgoing/delete',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tradermoni-outgoing/excel',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tradermoni-outgoing/index',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tradermoni-outgoing/update',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/tradermoni-outgoing/view',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/user-management/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth-item-group/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth-item-group/bulk-activate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth-item-group/bulk-deactivate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth-item-group/bulk-delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth-item-group/create',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth-item-group/delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth-item-group/grid-page-size',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth-item-group/grid-sort',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth-item-group/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth-item-group/toggle-attribute',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth-item-group/update',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth-item-group/view',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth/captcha',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth/change-own-password',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth/confirm-email',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth/confirm-email-receive',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth/confirm-registration-email',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth/login',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth/logout',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth/password-recovery',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth/password-recovery-receive',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/auth/registration',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/permission/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/permission/bulk-activate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/permission/bulk-deactivate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/permission/bulk-delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/permission/create',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/permission/delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/permission/grid-page-size',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/permission/grid-sort',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/permission/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/permission/refresh-routes',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/permission/set-child-permissions',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/permission/set-child-routes',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/permission/toggle-attribute',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/permission/update',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/permission/view',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/role/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/role/bulk-activate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/role/bulk-deactivate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/role/bulk-delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/role/create',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/role/delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/role/grid-page-size',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/role/grid-sort',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/role/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/role/set-child-permissions',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/role/set-child-roles',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/role/toggle-attribute',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/role/update',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/role/view',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user-permission/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user-permission/set',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user-permission/set-roles',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user-visit-log/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user-visit-log/bulk-activate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user-visit-log/bulk-deactivate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user-visit-log/bulk-delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user-visit-log/create',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user-visit-log/delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user-visit-log/grid-page-size',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user-visit-log/grid-sort',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user-visit-log/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user-visit-log/toggle-attribute',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user-visit-log/update',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user-visit-log/view',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user/*',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user/bulk-activate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user/bulk-deactivate',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user/bulk-delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user/change-password',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user/create',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user/delete',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user/grid-page-size',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user/grid-sort',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user/index',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user/toggle-attribute',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user/update',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/user-management/user/view',3,NULL,NULL,NULL,1426062189,1426062189,NULL),('/verify/*',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/verify/create',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/verify/delete',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/verify/index',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/verify/update',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/verify/view',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/whitelist/*',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/whitelist/create',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/whitelist/delete',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/whitelist/index',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/whitelist/update',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/whitelist/view',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/wlist/*',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/wlist/delete',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/wlist/index',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('/wlist/view',3,NULL,NULL,NULL,1566286783,1566286783,NULL),('Admin',1,'Admin',NULL,NULL,1565167598,1565167598,NULL),('assignRolesToUsers',2,'Assign roles to users',NULL,NULL,1426062189,1426062189,'userManagement'),('basicUser',2,'Basic User Permissions',NULL,NULL,1565169076,1565169076,'basicUser'),('basicUserRole',1,'Basic user group',NULL,NULL,1565167671,1565167671,NULL),('bindUserToIp',2,'Bind user to IP',NULL,NULL,1426062189,1426062189,'userManagement'),('changeOwnPassword',2,'Change own password',NULL,NULL,1426062189,1426062189,'userCommonPermissions'),('changeUserPassword',2,'Change user password',NULL,NULL,1426062189,1426062189,'userManagement'),('commonPermission',2,'Common permission',NULL,NULL,1426062188,1426062188,NULL),('createUsers',2,'Create users',NULL,NULL,1426062189,1426062189,'userManagement'),('deleteUsers',2,'Delete users',NULL,NULL,1426062189,1426062189,'userManagement'),('editUserEmail',2,'Edit user email',NULL,NULL,1426062189,1426062189,'userManagement'),('editUsers',2,'Edit users',NULL,NULL,1426062189,1426062189,'userManagement'),('supervisor',1,'Supervisor Group',NULL,NULL,1565167635,1565167635,NULL),('viewRegistrationIp',2,'View registration IP',NULL,NULL,1426062189,1426062189,'userManagement'),('viewUserEmail',2,'View user email',NULL,NULL,1426062189,1426062189,'userManagement'),('viewUserRoles',2,'View user roles',NULL,NULL,1426062189,1426062189,'userManagement'),('viewUsers',2,'View users',NULL,NULL,1426062189,1426062189,'userManagement'),('viewVisitLog',2,'View visit log',NULL,NULL,1426062189,1426062189,'userManagement');
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` VALUES ('basicUser','/boi/chatchecker'),('basicUser','/boi/chatcheckerhist'),('basicUser','/boi/index'),('basicUser','/boi/notify'),('basicUser','/boi/statchat'),('basicUser','/boi/updatechat'),('basicUser','/caterer/call-records'),('basicUser','/caterer/create'),('basicUser','/caterer/index'),('basicUser','/caterer/update'),('basicUser','/caterer/view'),('basicUser','/caterers/create'),('basicUser','/caterers/index'),('basicUser','/caterers/update'),('basicUser','/caterers/view'),('basicUser','/complaint/call-records'),('basicUser','/complaint/create'),('basicUser','/complaint/index'),('basicUser','/complaint/update'),('basicUser','/complaint/view'),('basicUser','/conversations/create'),('basicUser','/enquiry/create'),('basicUser','/enquiry/index'),('basicUser','/enquiry/update'),('basicUser','/enquiry/view'),('basicUser','/existpaylogs/create'),('basicUser','/existpaylogs/escalate'),('basicUser','/existpaylogs/index'),('basicUser','/existpaylogs/sla'),('basicUser','/existpaylogs/sla-update'),('basicUser','/existpaylogs/sla-view'),('basicUser','/existpaylogs/update'),('basicUser','/existpaylogs/view'),('basicUser','/existpaylogs/viewonly'),('basicUser','/hgsf/chat'),('basicUser','/hgsf/chatchecker'),('basicUser','/hgsf/chatcheckerhist'),('basicUser','/hgsf/create'),('basicUser','/hgsf/index'),('basicUser','/hgsf/notify'),('basicUser','/hgsf/statchat'),('basicUser','/hgsf/update'),('basicUser','/hgsf/updatechat'),('basicUser','/hgsf/view'),('basicUser','/paylogs/create'),('basicUser','/paylogs/escalate'),('basicUser','/paylogs/index'),('basicUser','/paylogs/sla'),('basicUser','/paylogs/sla-update'),('basicUser','/paylogs/sla-view'),('basicUser','/paylogs/update'),('basicUser','/paylogs/view'),('basicUser','/paylogs/viewonly'),('basicUser','/site/achat'),('basicUser','/site/ajax'),('basicUser','/site/chatajax'),('basicUser','/site/index'),('basicUser','/site/notify'),('basicUser','/site/recentchat'),('basicUser','/site/update-chat'),('basicUser','/site/users-chat'),('changeOwnPassword','/user-management/auth/change-own-password'),('assignRolesToUsers','/user-management/user-permission/set'),('assignRolesToUsers','/user-management/user-permission/set-roles'),('viewVisitLog','/user-management/user-visit-log/grid-page-size'),('viewVisitLog','/user-management/user-visit-log/index'),('viewVisitLog','/user-management/user-visit-log/view'),('editUsers','/user-management/user/bulk-activate'),('editUsers','/user-management/user/bulk-deactivate'),('deleteUsers','/user-management/user/bulk-delete'),('changeUserPassword','/user-management/user/change-password'),('createUsers','/user-management/user/create'),('deleteUsers','/user-management/user/delete'),('viewUsers','/user-management/user/grid-page-size'),('viewUsers','/user-management/user/index'),('editUsers','/user-management/user/update'),('viewUsers','/user-management/user/view'),('Admin','assignRolesToUsers'),('basicUserRole','basicUser'),('supervisor','basicUser'),('Admin','changeOwnPassword'),('basicUserRole','changeOwnPassword'),('supervisor','changeOwnPassword'),('Admin','changeUserPassword'),('Admin','createUsers'),('Admin','deleteUsers'),('Admin','editUsers'),('editUserEmail','viewUserEmail'),('supervisor','viewUserEmail'),('assignRolesToUsers','viewUserRoles'),('supervisor','viewUserRoles'),('Admin','viewUsers'),('assignRolesToUsers','viewUsers'),('changeUserPassword','viewUsers'),('createUsers','viewUsers'),('deleteUsers','viewUsers'),('editUsers','viewUsers'),('supervisor','viewUsers'),('supervisor','viewVisitLog');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_group`
--

DROP TABLE IF EXISTS `auth_item_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_group` (
  `code` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_group`
--

LOCK TABLES `auth_item_group` WRITE;
/*!40000 ALTER TABLE `auth_item_group` DISABLE KEYS */;
INSERT INTO `auth_item_group` VALUES ('basicUser','Basic User',1565167916,1565167916),('supervisor','Supervisor',1565167951,1565167951),('userCommonPermissions','User common permission',1426062189,1426062189),('userManagement','User management',1426062189,1426062189);
/*!40000 ALTER TABLE `auth_item_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_message`
--

DROP TABLE IF EXISTS `chat_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL AUTO_INCREMENT,
  `to_user_id` int(11) DEFAULT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`chat_message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_message`
--

LOCK TABLES `chat_message` WRITE;
/*!40000 ALTER TABLE `chat_message` DISABLE KEYS */;
INSERT INTO `chat_message` VALUES (1,3,1,'hows is the chat?','2019-08-09 13:19:13',0),(2,3,1,'from Joshua','2019-08-09 13:19:24',0);
/*!40000 ALTER TABLE `chat_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_phone` bigint(15) DEFAULT NULL,
  `agent_id` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT 'end_chat = 0, in_response = 1, not_reponded = 2',
  `case_id` int(11) DEFAULT NULL,
  `is_typing` int(1) DEFAULT NULL COMMENT 'not_typing = 0, typing = 1',
  `chat_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `case_id` (`case_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Test Mayor',9092093002,1,0,20190809,NULL,'2019-08-09 12:57:05'),(2,'Jane Doe',8082938992,3,0,201908091,1,'2019-08-09 14:42:22');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_chat`
--

DROP TABLE IF EXISTS `customer_chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user` bigint(15) DEFAULT NULL,
  `to_user` bigint(15) DEFAULT NULL,
  `chat_message` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT 'end_chat = 0, in_response = 1, not_reponded = 2',
  `case_id` int(11) DEFAULT NULL,
  `chat_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_chat`
--

LOCK TABLES `customer_chat` WRITE;
/*!40000 ALTER TABLE `customer_chat` DISABLE KEYS */;
INSERT INTO `customer_chat` VALUES (1,9092093002,1,'How can i register?',0,20190809,'2019-08-09 12:57:05'),(2,1,9092093002,'You can register by visting our website at www,jamiue.com',0,20190809,'2019-08-09 12:57:05'),(3,8082938992,3,'How do i join the hgsf?',0,201908091,'2019-08-09 14:42:22'),(4,3,8082938992,'Thank you for contacting HGSF contact center\n',0,201908091,'2019-08-09 14:42:22'),(5,3,8082938992,'Kindly visit hgsf-global.org and you will be guided on the procedures to follow\n',0,201908091,'2019-08-09 14:42:22');
/*!40000 ALTER TABLE `customer_chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generator`
--

DROP TABLE IF EXISTS `generator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generator` (
  `create_date` date NOT NULL,
  `sequence` int(4) NOT NULL AUTO_INCREMENT,
  `time_created` time NOT NULL,
  PRIMARY KEY (`create_date`,`sequence`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generator`
--

LOCK TABLES `generator` WRITE;
/*!40000 ALTER TABLE `generator` DISABLE KEYS */;
INSERT INTO `generator` VALUES ('2019-08-07',1,'00:00:00'),('2019-08-07',2,'16:00:14'),('2019-08-07',3,'16:00:15'),('2019-08-07',4,'16:01:23'),('2019-08-07',5,'16:01:23'),('2019-08-07',6,'16:08:36'),('2019-08-07',7,'16:08:36'),('2019-08-07',8,'16:16:15'),('2019-08-07',9,'16:16:15'),('2019-08-07',10,'16:17:05'),('2019-08-07',11,'16:17:06'),('2019-08-07',12,'16:25:08'),('2019-08-07',13,'16:26:00'),('2019-08-07',14,'16:26:00'),('2019-08-07',15,'16:26:08'),('2019-08-07',16,'16:26:08'),('2019-08-07',17,'16:27:50'),('2019-08-07',18,'16:27:51'),('2019-08-07',19,'16:31:55'),('2019-08-07',20,'16:31:56'),('2019-08-07',21,'16:35:18'),('2019-08-07',22,'16:35:18'),('2019-08-07',23,'16:35:22'),('2019-08-07',24,'16:35:22'),('2019-08-07',25,'16:35:59'),('2019-08-07',26,'16:35:59'),('2019-08-07',27,'16:36:59'),('2019-08-07',28,'16:36:59'),('2019-08-07',29,'16:37:16'),('2019-08-07',30,'16:37:17'),('2019-08-07',31,'16:38:41'),('2019-08-07',32,'16:38:41'),('2019-08-07',33,'16:38:56'),('2019-08-07',34,'16:38:56'),('2019-08-07',35,'16:41:42'),('2019-08-07',36,'16:41:42'),('2019-08-07',37,'16:42:28'),('2019-08-07',38,'16:42:28'),('2019-08-07',39,'16:44:51'),('2019-08-07',40,'16:44:51'),('2019-08-07',41,'16:45:30'),('2019-08-07',42,'16:45:30'),('2019-08-07',43,'16:45:53'),('2019-08-07',44,'16:45:53'),('2019-08-07',45,'16:46:57'),('2019-08-07',46,'16:46:57'),('2019-08-07',47,'16:49:07'),('2019-08-07',48,'16:49:07'),('2019-08-07',49,'16:51:05'),('2019-08-07',50,'16:51:05'),('2019-08-07',51,'16:52:51'),('2019-08-07',52,'16:52:51'),('2019-08-07',53,'16:59:05'),('2019-08-07',54,'17:00:34'),('2019-08-07',55,'17:00:34'),('2019-08-07',56,'17:02:18'),('2019-08-07',57,'17:02:18'),('2019-08-07',58,'17:03:40'),('2019-08-07',59,'17:03:40'),('2019-08-07',60,'17:03:58'),('2019-08-07',61,'17:03:58'),('2019-08-07',62,'17:05:04'),('2019-08-07',63,'17:05:04'),('2019-08-07',64,'17:05:58'),('2019-08-07',65,'17:05:58'),('2019-08-07',66,'17:06:19'),('2019-08-07',67,'17:06:19'),('2019-08-07',68,'17:08:17'),('2019-08-07',69,'17:08:17'),('2019-08-07',70,'17:08:31'),('2019-08-07',71,'17:08:31'),('2019-08-07',72,'17:09:07'),('2019-08-07',73,'17:09:07'),('2019-08-07',74,'17:09:43'),('2019-08-07',75,'17:09:43'),('2019-08-07',76,'17:11:06'),('2019-08-07',77,'17:12:47'),('2019-08-07',78,'17:12:47'),('2019-08-07',79,'17:12:49'),('2019-08-07',80,'17:12:49'),('2019-08-07',81,'17:13:38'),('2019-08-07',82,'17:13:38'),('2019-08-07',83,'17:15:02'),('2019-08-07',84,'17:16:40'),('2019-08-07',85,'17:16:40'),('2019-08-07',86,'17:17:00'),('2019-08-07',87,'17:17:00'),('2019-08-07',88,'17:19:15'),('2019-08-07',89,'17:19:16'),('2019-08-07',90,'17:19:43'),('2019-08-07',91,'17:19:43'),('2019-08-07',92,'17:20:01'),('2019-08-07',93,'17:22:30'),('2019-08-07',94,'17:22:30'),('2019-08-07',95,'17:22:45'),('2019-08-07',96,'17:22:51'),('2019-08-07',97,'17:22:51'),('2019-08-07',98,'17:29:03'),('2019-08-07',99,'17:29:03'),('2019-08-07',100,'17:29:54'),('2019-08-07',101,'17:29:54'),('2019-08-07',102,'17:33:39'),('2019-08-07',103,'17:42:08'),('2019-08-07',104,'17:42:08'),('2019-08-07',105,'17:43:03'),('2019-08-07',106,'17:43:03'),('2019-08-07',107,'17:43:59'),('2019-08-07',108,'17:43:59'),('2019-08-07',109,'17:45:42'),('2019-08-07',110,'17:45:42'),('2019-08-07',111,'17:49:20'),('2019-08-07',112,'17:49:20'),('2019-08-07',113,'17:50:44'),('2019-08-07',114,'17:50:44'),('2019-08-07',115,'17:50:48'),('2019-08-07',116,'17:50:53'),('2019-08-07',117,'17:51:02'),('2019-08-07',118,'17:51:02'),('2019-08-07',119,'17:51:19'),('2019-08-07',120,'17:51:19'),('2019-08-07',121,'17:52:03'),('2019-08-07',122,'17:52:03'),('2019-08-07',123,'17:52:24'),('2019-08-07',124,'17:52:24'),('2019-08-07',125,'17:53:56'),('2019-08-07',126,'17:54:27'),('2019-08-07',127,'17:54:27'),('2019-08-07',128,'18:00:43'),('2019-08-07',129,'18:01:48'),('2019-08-07',130,'18:02:53'),('2019-08-07',131,'18:02:53'),('2019-08-07',132,'18:04:32'),('2019-08-07',133,'18:04:32'),('2019-08-07',134,'18:22:09'),('2019-08-07',135,'18:22:50'),('2019-08-07',136,'18:23:12'),('2019-08-07',137,'18:23:12'),('2019-08-07',138,'18:23:24'),('2019-08-07',139,'18:23:24'),('2019-08-07',140,'18:24:53'),('2019-08-07',141,'18:25:34'),('2019-08-07',142,'18:26:51'),('2019-08-07',143,'18:39:04'),('2019-08-07',144,'18:41:13'),('2019-08-07',145,'18:41:13'),('2019-08-07',146,'18:42:11'),('2019-08-07',147,'18:42:20'),('2019-08-07',148,'18:42:20'),('2019-08-07',149,'18:43:50'),('2019-08-07',150,'18:43:50'),('2019-08-07',151,'18:44:28'),('2019-08-07',152,'18:44:28'),('2019-08-07',153,'18:45:12'),('2019-08-07',154,'18:45:12'),('2019-08-07',155,'18:45:25'),('2019-08-07',156,'18:45:25'),('2019-08-07',157,'18:55:54'),('2019-08-07',158,'18:55:54'),('2019-08-07',159,'19:00:18'),('2019-08-07',160,'19:00:18'),('2019-08-07',161,'19:03:02'),('2019-08-07',162,'19:03:02'),('2019-08-07',163,'19:03:17'),('2019-08-07',164,'19:06:54'),('2019-08-07',165,'19:06:54'),('2019-08-07',166,'19:22:08'),('2019-08-07',167,'19:22:08'),('2019-08-07',168,'19:22:27'),('2019-08-07',169,'19:22:27'),('2019-08-07',170,'19:22:44'),('2019-08-07',171,'19:22:44'),('2019-08-07',172,'19:22:59'),('2019-08-07',173,'19:22:59'),('2019-08-07',174,'19:22:59'),('2019-08-07',175,'19:22:59'),('2019-08-07',176,'19:23:07'),('2019-08-07',177,'19:23:07'),('2019-08-07',178,'19:23:49'),('2019-08-07',179,'19:23:49'),('2019-08-07',180,'19:24:01'),('2019-08-07',181,'19:24:01'),('2019-08-07',182,'19:24:12'),('2019-08-07',183,'19:24:12'),('2019-08-07',184,'19:26:21'),('2019-08-07',185,'19:26:30'),('2019-08-07',186,'19:26:44'),('2019-08-07',187,'19:27:38'),('2019-08-07',188,'19:27:38'),('2019-08-07',189,'19:27:46'),('2019-08-07',190,'19:27:46'),('2019-08-07',191,'19:28:10'),('2019-08-07',192,'19:29:10'),('2019-08-07',193,'19:29:10'),('2019-08-07',194,'19:29:33'),('2019-08-07',195,'19:30:30'),('2019-08-07',196,'19:30:30'),('2019-08-07',197,'19:30:47'),('2019-08-07',198,'19:30:47'),('2019-08-07',199,'19:31:13'),('2019-08-07',200,'19:32:59'),('2019-08-07',201,'19:33:43'),('2019-08-07',202,'19:34:35'),('2019-08-07',203,'19:34:36'),('2019-08-07',204,'19:34:54'),('2019-08-07',205,'19:34:54'),('2019-08-07',206,'19:34:58'),('2019-08-07',207,'19:35:13'),('2019-08-07',208,'19:35:13'),('2019-08-07',209,'19:36:10'),('2019-08-07',210,'19:37:07'),('2019-08-07',211,'19:37:07'),('2019-08-07',212,'19:37:14'),('2019-08-07',213,'19:37:14'),('2019-08-07',214,'19:37:37'),('2019-08-07',215,'19:37:37'),('2019-08-07',216,'19:38:17'),('2019-08-07',217,'19:38:17'),('2019-08-07',218,'19:38:46'),('2019-08-07',219,'19:39:42'),('2019-08-07',220,'19:39:42'),('2019-08-07',221,'19:40:37'),('2019-08-07',222,'19:40:37'),('2019-08-07',223,'19:40:44'),('2019-08-07',224,'19:40:44'),('2019-08-07',225,'19:41:10'),('2019-08-07',226,'19:41:18'),('2019-08-07',227,'19:41:34'),('2019-08-07',228,'19:41:56'),('2019-08-07',229,'19:41:56'),('2019-08-07',230,'19:43:26'),('2019-08-07',231,'19:43:26'),('2019-08-07',232,'19:46:46'),('2019-08-07',233,'19:46:46'),('2019-08-07',234,'19:47:03'),('2019-08-07',235,'19:47:46'),('2019-08-07',236,'19:47:54'),('2019-08-07',237,'19:48:18'),('2019-08-07',238,'19:50:07'),('2019-08-07',239,'19:50:26'),('2019-08-07',240,'19:50:26'),('2019-08-07',241,'19:50:32'),('2019-08-07',242,'19:51:21'),('2019-08-07',243,'19:51:21'),('2019-08-07',244,'19:52:54'),('2019-08-07',245,'19:52:54'),('2019-08-07',246,'19:53:06'),('2019-08-07',247,'19:53:18'),('2019-08-07',248,'19:55:55'),('2019-08-07',249,'19:56:53'),('2019-08-07',250,'19:57:35'),('2019-08-07',251,'19:58:01'),('2019-08-07',252,'19:58:02'),('2019-08-07',253,'19:58:03'),('2019-08-07',254,'19:58:18'),('2019-08-07',255,'19:58:58'),('2019-08-07',256,'19:58:58'),('2019-08-07',257,'20:00:01'),('2019-08-07',258,'20:00:01'),('2019-08-07',259,'20:00:11'),('2019-08-07',260,'20:00:11'),('2019-08-07',261,'20:00:29'),('2019-08-07',262,'20:00:55'),('2019-08-07',263,'20:01:01'),('2019-08-07',264,'20:01:06'),('2019-08-07',265,'20:01:11'),('2019-08-07',266,'20:01:15'),('2019-08-07',267,'20:01:28'),('2019-08-07',268,'20:01:28'),('2019-08-07',269,'20:01:29'),('2019-08-07',270,'20:01:29'),('2019-08-07',271,'20:01:29'),('2019-08-07',272,'20:01:29'),('2019-08-07',273,'20:03:21'),('2019-08-07',274,'20:03:21'),('2019-08-07',275,'20:03:36'),('2019-08-07',276,'20:03:36'),('2019-08-07',277,'20:03:52'),('2019-08-07',278,'20:04:04'),('2019-08-07',279,'20:04:04'),('2019-08-07',280,'20:05:00'),('2019-08-07',281,'20:05:10'),('2019-08-07',282,'20:09:14'),('2019-08-07',283,'20:09:14'),('2019-08-07',284,'20:10:05'),('2019-08-07',285,'20:10:05'),('2019-08-07',286,'20:10:16'),('2019-08-07',287,'20:10:16'),('2019-08-07',288,'20:10:30'),('2019-08-07',289,'20:10:42'),('2019-08-07',290,'20:11:52'),('2019-08-07',291,'20:11:52'),('2019-08-07',292,'20:17:12'),('2019-08-07',293,'20:17:12'),('2019-08-07',294,'20:17:41'),('2019-08-07',295,'20:17:41'),('2019-08-07',296,'20:18:14'),('2019-08-07',297,'20:18:14'),('2019-08-07',298,'20:18:18'),('2019-08-07',299,'20:18:18'),('2019-08-07',300,'20:18:40'),('2019-08-07',301,'20:18:40'),('2019-08-07',302,'20:19:24'),('2019-08-07',303,'20:19:24'),('2019-08-07',304,'20:20:09'),('2019-08-07',305,'20:20:09'),('2019-08-07',306,'20:23:14'),('2019-08-07',307,'20:23:14'),('2019-08-07',308,'20:24:21'),('2019-08-07',309,'20:24:56'),('2019-08-07',310,'20:24:56'),('2019-08-07',311,'20:26:10'),('2019-08-07',312,'20:26:10'),('2019-08-07',313,'20:26:18'),('2019-08-07',314,'20:26:18'),('2019-08-07',315,'20:34:27'),('2019-08-07',316,'20:34:27'),('2019-08-07',317,'20:36:42'),('2019-08-07',318,'20:36:42'),('2019-08-07',319,'20:36:54'),('2019-08-07',320,'20:36:54'),('2019-08-07',321,'20:38:30'),('2019-08-07',322,'20:39:17'),('2019-08-07',323,'20:39:17'),('2019-08-07',324,'20:39:39'),('2019-08-07',325,'20:39:39'),('2019-08-07',326,'20:40:54'),('2019-08-07',327,'20:40:54'),('2019-08-07',328,'20:43:07'),('2019-08-07',329,'20:43:25'),('2019-08-07',330,'20:43:25'),('2019-08-07',331,'20:44:08'),('2019-08-07',332,'20:44:24'),('2019-08-07',333,'20:44:24'),('2019-08-07',334,'20:44:35'),('2019-08-07',335,'20:44:35'),('2019-08-07',336,'20:45:29'),('2019-08-07',337,'20:45:47'),('2019-08-07',338,'20:45:47'),('2019-08-07',339,'20:46:25'),('2019-08-07',340,'20:46:30'),('2019-08-07',341,'20:46:30'),('2019-08-07',342,'20:47:03'),('2019-08-07',343,'20:47:03'),('2019-08-07',344,'20:47:57'),('2019-08-07',345,'20:47:57'),('2019-08-08',1,'07:02:14'),('2019-08-08',2,'07:02:14'),('2019-08-08',3,'07:08:53'),('2019-08-08',4,'07:10:18'),('2019-08-08',5,'07:10:26'),('2019-08-08',6,'07:10:26'),('2019-08-08',7,'07:10:44'),('2019-08-08',8,'07:17:42'),('2019-08-08',9,'07:17:42'),('2019-08-08',10,'07:27:04'),('2019-08-08',11,'07:28:22'),('2019-08-08',12,'07:28:22'),('2019-08-08',13,'07:28:52'),('2019-08-08',14,'07:28:52'),('2019-08-08',15,'08:23:26'),('2019-08-08',16,'08:23:26'),('2019-08-08',17,'08:23:51'),('2019-08-08',18,'08:23:51'),('2019-08-08',19,'08:23:57'),('2019-08-08',20,'08:23:57'),('2019-08-08',21,'08:24:10'),('2019-08-08',22,'08:24:10'),('2019-08-08',23,'09:02:35'),('2019-08-08',24,'09:02:36'),('2019-08-08',25,'09:04:29'),('2019-08-08',26,'09:04:29'),('2019-08-08',27,'09:07:28'),('2019-08-08',28,'09:10:32'),('2019-08-08',29,'09:10:32'),('2019-08-08',30,'09:15:14'),('2019-08-08',31,'09:15:15'),('2019-08-08',32,'09:15:25'),('2019-08-08',33,'09:15:25'),('2019-08-08',34,'09:18:02'),('2019-08-08',35,'09:19:24'),('2019-08-08',36,'09:20:16'),('2019-08-08',37,'09:30:05'),('2019-08-08',38,'09:30:05'),('2019-08-08',39,'09:32:06'),('2019-08-08',40,'09:32:06'),('2019-08-08',41,'09:35:41'),('2019-08-08',42,'09:35:41'),('2019-08-08',43,'09:38:55'),('2019-08-08',44,'09:38:55'),('2019-08-08',45,'09:41:00'),('2019-08-08',46,'09:41:00'),('2019-08-08',47,'09:47:02'),('2019-08-08',48,'09:47:02'),('2019-08-08',49,'09:48:24'),('2019-08-08',50,'09:48:25'),('2019-08-08',51,'09:49:12'),('2019-08-08',52,'09:49:12'),('2019-08-08',53,'09:50:03'),('2019-08-08',54,'09:50:03'),('2019-08-08',55,'09:53:45'),('2019-08-08',56,'10:02:15'),('2019-08-08',57,'10:02:15'),('2019-08-08',58,'10:05:18'),('2019-08-08',59,'10:05:18'),('2019-08-08',60,'10:05:41'),('2019-08-08',61,'10:07:15'),('2019-08-08',62,'10:07:15'),('2019-08-08',63,'10:12:34'),('2019-08-08',64,'10:12:34'),('2019-08-08',65,'10:13:57'),('2019-08-08',66,'10:32:24'),('2019-08-08',67,'10:32:24'),('2019-08-08',68,'10:32:28'),('2019-08-08',69,'10:32:28'),('2019-08-08',70,'10:34:01'),('2019-08-08',71,'10:34:01'),('2019-08-08',72,'10:34:45'),('2019-08-08',73,'10:34:45'),('2019-08-08',74,'10:34:52'),('2019-08-08',75,'10:34:52'),('2019-08-08',76,'10:34:58'),('2019-08-08',77,'10:34:58'),('2019-08-08',78,'10:35:29'),('2019-08-08',79,'10:35:29'),('2019-08-08',80,'10:42:35'),('2019-08-08',81,'10:42:35'),('2019-08-08',82,'10:44:06'),('2019-08-08',83,'10:44:06'),('2019-08-08',84,'10:52:28'),('2019-08-08',85,'10:52:28'),('2019-08-08',86,'10:57:14'),('2019-08-08',87,'10:57:15'),('2019-08-08',88,'11:06:46'),('2019-08-08',89,'11:14:38'),('2019-08-08',90,'11:14:38'),('2019-08-08',91,'11:22:29'),('2019-08-08',92,'11:22:29'),('2019-08-08',93,'11:24:03'),('2019-08-08',94,'11:24:23'),('2019-08-08',95,'11:26:48'),('2019-08-08',96,'11:28:43'),('2019-08-08',97,'11:28:43'),('2019-08-08',98,'11:34:48'),('2019-08-08',99,'11:34:48'),('2019-08-08',100,'11:34:58'),('2019-08-08',101,'11:34:58'),('2019-08-08',102,'11:39:56'),('2019-08-08',103,'11:39:56'),('2019-08-08',104,'11:43:06'),('2019-08-08',105,'11:43:06'),('2019-08-08',106,'11:44:39'),('2019-08-08',107,'11:44:39'),('2019-08-08',108,'11:45:47'),('2019-08-08',109,'11:45:47'),('2019-08-08',110,'11:46:03'),('2019-08-08',111,'11:46:03'),('2019-08-08',112,'11:47:17'),('2019-08-08',113,'11:47:17'),('2019-08-08',114,'11:49:28'),('2019-08-08',115,'11:49:28'),('2019-08-08',116,'11:53:10'),('2019-08-08',117,'11:53:10'),('2019-08-08',118,'11:53:36'),('2019-08-08',119,'11:53:37'),('2019-08-08',120,'11:57:42'),('2019-08-08',121,'11:57:42'),('2019-08-08',122,'11:58:11'),('2019-08-08',123,'11:58:11'),('2019-08-08',124,'11:58:20'),('2019-08-08',125,'11:58:21'),('2019-08-08',126,'12:00:05'),('2019-08-08',127,'12:00:05'),('2019-08-08',128,'12:00:27'),('2019-08-08',129,'12:00:27'),('2019-08-08',130,'12:08:50'),('2019-08-08',131,'12:08:50'),('2019-08-08',132,'12:10:20'),('2019-08-08',133,'12:10:20'),('2019-08-08',134,'12:14:23'),('2019-08-08',135,'12:14:23'),('2019-08-08',136,'12:14:42'),('2019-08-08',137,'12:14:42'),('2019-08-08',138,'12:18:12'),('2019-08-08',139,'12:18:12'),('2019-08-08',140,'12:19:16'),('2019-08-08',141,'12:20:30'),('2019-08-08',142,'12:20:30'),('2019-08-08',143,'12:20:42'),('2019-08-08',144,'12:20:42'),('2019-08-08',145,'12:22:16'),('2019-08-08',146,'12:22:17'),('2019-08-08',147,'12:23:28'),('2019-08-08',148,'12:23:35'),('2019-08-08',149,'12:23:35'),('2019-08-08',150,'12:23:56'),('2019-08-08',151,'12:23:56'),('2019-08-08',152,'12:24:04'),('2019-08-08',153,'12:24:04'),('2019-08-08',154,'12:25:26'),('2019-08-08',155,'12:26:20'),('2019-08-08',156,'12:26:20'),('2019-08-08',157,'12:29:13'),('2019-08-08',158,'12:29:13'),('2019-08-08',159,'12:32:47'),('2019-08-08',160,'12:32:47'),('2019-08-08',161,'12:32:51'),('2019-08-08',162,'12:32:51'),('2019-08-08',163,'12:32:57'),('2019-08-08',164,'12:32:57'),('2019-08-08',165,'12:33:09'),('2019-08-08',166,'12:33:09'),('2019-08-08',167,'12:35:45'),('2019-08-08',168,'12:36:25'),('2019-08-08',169,'12:36:25'),('2019-08-08',170,'12:37:17'),('2019-08-08',171,'12:38:10'),('2019-08-08',172,'12:38:11'),('2019-08-08',173,'12:38:29'),('2019-08-08',174,'12:38:29'),('2019-08-08',175,'12:40:50'),('2019-08-08',176,'12:40:50'),('2019-08-08',177,'12:41:11'),('2019-08-08',178,'12:41:12'),('2019-08-08',179,'12:41:13'),('2019-08-08',180,'12:42:06'),('2019-08-08',181,'12:42:06'),('2019-08-08',182,'12:42:09'),('2019-08-08',183,'12:42:09'),('2019-08-08',184,'12:42:11'),('2019-08-08',185,'12:42:11'),('2019-08-08',186,'12:42:14'),('2019-08-08',187,'12:42:14'),('2019-08-08',188,'12:42:14'),('2019-08-08',189,'12:42:14'),('2019-08-08',190,'12:42:16'),('2019-08-08',191,'12:42:16'),('2019-08-08',192,'12:42:24'),('2019-08-08',193,'12:42:24'),('2019-08-08',194,'12:42:27'),('2019-08-08',195,'12:42:27'),('2019-08-08',196,'12:42:28'),('2019-08-08',197,'12:42:28'),('2019-08-08',198,'12:42:37'),('2019-08-08',199,'12:42:37'),('2019-08-08',200,'12:42:37'),('2019-08-08',201,'12:42:37'),('2019-08-08',202,'12:43:07'),('2019-08-08',203,'12:43:09'),('2019-08-08',204,'12:43:10'),('2019-08-08',205,'12:43:11'),('2019-08-08',206,'12:43:18'),('2019-08-08',207,'12:43:36'),('2019-08-08',208,'12:43:36'),('2019-08-08',209,'12:43:40'),('2019-08-08',210,'12:43:40'),('2019-08-08',211,'12:44:09'),('2019-08-08',212,'12:44:09'),('2019-08-08',213,'12:44:14'),('2019-08-08',214,'12:44:14'),('2019-08-08',215,'12:44:17'),('2019-08-08',216,'12:44:17'),('2019-08-08',217,'12:45:20'),('2019-08-08',218,'12:45:21'),('2019-08-08',219,'12:45:33'),('2019-08-08',220,'12:45:34'),('2019-08-08',221,'12:45:45'),('2019-08-08',222,'12:45:45'),('2019-08-08',223,'12:45:46'),('2019-08-08',224,'12:45:59'),('2019-08-08',225,'12:45:59'),('2019-08-08',226,'12:46:27'),('2019-08-08',227,'12:46:27'),('2019-08-08',228,'12:47:21'),('2019-08-08',229,'12:47:21'),('2019-08-08',230,'12:47:28'),('2019-08-08',231,'12:47:28'),('2019-08-08',232,'12:56:09'),('2019-08-08',233,'12:56:54'),('2019-08-08',234,'12:56:54'),('2019-08-08',235,'12:57:39'),('2019-08-08',236,'12:57:39'),('2019-08-08',237,'12:57:42'),('2019-08-08',238,'12:57:42'),('2019-08-08',239,'12:57:45'),('2019-08-08',240,'12:57:45'),('2019-08-08',241,'12:58:46'),('2019-08-08',242,'12:58:46'),('2019-08-08',243,'12:58:49'),('2019-08-08',244,'12:58:49'),('2019-08-08',245,'13:01:09'),('2019-08-08',246,'13:02:13'),('2019-08-08',247,'13:02:13'),('2019-08-08',248,'13:02:21'),('2019-08-08',249,'13:02:21'),('2019-08-08',250,'13:03:50'),('2019-08-08',251,'13:03:50'),('2019-08-08',252,'13:05:24'),('2019-08-08',253,'13:05:24'),('2019-08-08',254,'13:06:51'),('2019-08-08',255,'13:09:35'),('2019-08-08',256,'13:09:35'),('2019-08-08',257,'13:09:39'),('2019-08-08',258,'13:09:39'),('2019-08-08',259,'13:09:46'),('2019-08-08',260,'13:09:46'),('2019-08-08',261,'13:09:50'),('2019-08-08',262,'13:09:50'),('2019-08-08',263,'13:09:59'),('2019-08-08',264,'13:09:59'),('2019-08-08',265,'13:10:33'),('2019-08-08',266,'13:10:33'),('2019-08-08',267,'13:10:41'),('2019-08-08',268,'13:10:41'),('2019-08-08',269,'13:10:43'),('2019-08-08',270,'13:10:43'),('2019-08-08',271,'13:11:02'),('2019-08-08',272,'13:11:02'),('2019-08-08',273,'13:11:08'),('2019-08-08',274,'13:11:08'),('2019-08-08',275,'13:23:43'),('2019-08-08',276,'13:35:35'),('2019-08-08',277,'13:35:35'),('2019-08-08',278,'13:36:09'),('2019-08-08',279,'13:36:09'),('2019-08-08',280,'13:37:54'),('2019-08-08',281,'13:37:54'),('2019-08-08',282,'13:39:28'),('2019-08-08',283,'13:39:28'),('2019-08-08',284,'13:39:32'),('2019-08-08',285,'13:39:32'),('2019-08-08',286,'13:40:14'),('2019-08-08',287,'13:40:14'),('2019-08-08',288,'13:40:45'),('2019-08-08',289,'13:40:45'),('2019-08-08',290,'13:41:55'),('2019-08-08',291,'13:41:55'),('2019-08-08',292,'13:42:34'),('2019-08-08',293,'13:42:35'),('2019-08-08',294,'13:45:02'),('2019-08-08',295,'13:45:02'),('2019-08-08',296,'13:45:42'),('2019-08-08',297,'13:45:42'),('2019-08-08',298,'13:52:35'),('2019-08-08',299,'13:52:35'),('2019-08-08',300,'13:53:09'),('2019-08-08',301,'13:53:09'),('2019-08-08',302,'13:58:13'),('2019-08-08',303,'13:58:13'),('2019-08-08',304,'14:00:25'),('2019-08-08',305,'14:00:25'),('2019-08-08',306,'14:00:50'),('2019-08-08',307,'14:00:50'),('2019-08-08',308,'14:16:19'),('2019-08-08',309,'14:16:54'),('2019-08-08',310,'14:19:22'),('2019-08-08',311,'14:19:41'),('2019-08-08',312,'14:19:43'),('2019-08-08',313,'14:19:43'),('2019-08-08',314,'14:32:20'),('2019-08-08',315,'14:39:34'),('2019-08-08',316,'14:39:34'),('2019-08-08',317,'14:39:48'),('2019-08-08',318,'14:39:48'),('2019-08-08',319,'14:39:54'),('2019-08-08',320,'14:39:54'),('2019-08-08',321,'14:39:57'),('2019-08-08',322,'14:40:08'),('2019-08-08',323,'14:42:06'),('2019-08-08',324,'14:43:40'),('2019-08-08',325,'14:43:40'),('2019-08-08',326,'14:44:47'),('2019-08-08',327,'14:48:01'),('2019-08-08',328,'14:50:24'),('2019-08-08',329,'14:50:25'),('2019-08-08',330,'14:54:02'),('2019-08-08',331,'14:55:47'),('2019-08-08',332,'14:56:29'),('2019-08-08',333,'15:01:16'),('2019-08-08',334,'15:03:19'),('2019-08-08',335,'15:03:30'),('2019-08-08',336,'15:03:33'),('2019-08-08',337,'15:03:46'),('2019-08-08',338,'15:05:18'),('2019-08-08',339,'15:05:23'),('2019-08-08',340,'15:09:44'),('2019-08-08',341,'15:09:55'),('2019-08-08',342,'15:10:06'),('2019-08-08',343,'15:10:08'),('2019-08-08',344,'15:10:54'),('2019-08-08',345,'15:11:41'),('2019-08-08',346,'15:11:41'),('2019-08-08',347,'15:12:24'),('2019-08-08',348,'15:13:57'),('2019-08-08',349,'15:14:16'),('2019-08-08',350,'15:14:41'),('2019-08-08',351,'15:19:25'),('2019-08-08',352,'15:19:46'),('2019-08-08',353,'15:19:46'),('2019-08-08',354,'15:19:49'),('2019-08-08',355,'15:19:49'),('2019-08-08',356,'15:19:51'),('2019-08-08',357,'15:19:51'),('2019-08-08',358,'15:20:18'),('2019-08-08',359,'15:21:45'),('2019-08-08',360,'15:22:01'),('2019-08-08',361,'15:22:40'),('2019-08-08',362,'15:22:43'),('2019-08-08',363,'15:22:52'),('2019-08-08',364,'15:22:52'),('2019-08-08',365,'15:23:04'),('2019-08-08',366,'15:24:02'),('2019-08-08',367,'15:24:02'),('2019-08-08',368,'15:24:13'),('2019-08-08',369,'15:24:13'),('2019-08-08',370,'15:24:36'),('2019-08-08',371,'15:24:38'),('2019-08-08',372,'15:26:04'),('2019-08-08',373,'15:26:36'),('2019-08-08',374,'15:26:37'),('2019-08-08',375,'15:29:46'),('2019-08-08',376,'15:29:59'),('2019-08-08',377,'15:32:38'),('2019-08-08',378,'15:33:12'),('2019-08-08',379,'15:33:38'),('2019-08-08',380,'15:36:23'),('2019-08-08',381,'15:36:49'),('2019-08-08',382,'15:37:09'),('2019-08-08',383,'15:37:31'),('2019-08-08',384,'15:37:31'),('2019-08-08',385,'15:37:41'),('2019-08-08',386,'15:38:35'),('2019-08-08',387,'15:39:09'),('2019-08-08',388,'15:40:00'),('2019-08-08',389,'15:40:00'),('2019-08-08',390,'15:42:39'),('2019-08-08',391,'15:42:39'),('2019-08-08',392,'15:43:34'),('2019-08-08',393,'15:43:34'),('2019-08-08',394,'15:43:42'),('2019-08-08',395,'15:43:42'),('2019-08-08',396,'15:46:29'),('2019-08-08',397,'15:46:29'),('2019-08-08',398,'15:46:36'),('2019-08-08',399,'15:47:43'),('2019-08-08',400,'15:47:43'),('2019-08-08',401,'15:47:55'),('2019-08-08',402,'15:47:55'),('2019-08-08',403,'15:48:07'),('2019-08-08',404,'15:48:07'),('2019-08-08',405,'15:48:34'),('2019-08-08',406,'15:48:34'),('2019-08-08',407,'15:49:05'),('2019-08-08',408,'15:49:05'),('2019-08-08',409,'15:49:08'),('2019-08-08',410,'15:49:09'),('2019-08-08',411,'15:49:33'),('2019-08-08',412,'15:49:33'),('2019-08-08',413,'15:49:38'),('2019-08-08',414,'15:49:38'),('2019-08-08',415,'15:50:06'),('2019-08-08',416,'15:50:06'),('2019-08-08',417,'15:50:09'),('2019-08-08',418,'15:51:01'),('2019-08-08',419,'15:51:01'),('2019-08-08',420,'15:51:19'),('2019-08-08',421,'15:51:20'),('2019-08-08',422,'15:51:57'),('2019-08-08',423,'15:51:57'),('2019-08-08',424,'15:52:04'),('2019-08-08',425,'15:52:05'),('2019-08-08',426,'15:52:23'),('2019-08-08',427,'15:52:23'),('2019-08-08',428,'15:53:13'),('2019-08-08',429,'15:53:13'),('2019-08-08',430,'15:54:08'),('2019-08-08',431,'15:54:08'),('2019-08-08',432,'15:55:53'),('2019-08-08',433,'15:55:53'),('2019-08-08',434,'15:57:24'),('2019-08-08',435,'15:57:24'),('2019-08-08',436,'15:58:55'),('2019-08-08',437,'16:01:07'),('2019-08-08',438,'16:01:07'),('2019-08-08',439,'16:03:27'),('2019-08-08',440,'16:03:31'),('2019-08-08',441,'16:03:38'),('2019-08-08',442,'16:06:02'),('2019-08-08',443,'16:07:22'),('2019-08-08',444,'16:07:22'),('2019-08-08',445,'16:07:33'),('2019-08-08',446,'16:07:40'),('2019-08-08',447,'16:08:48'),('2019-08-08',448,'16:08:48'),('2019-08-08',449,'16:09:56'),('2019-08-08',450,'16:10:00'),('2019-08-08',451,'16:10:00'),('2019-08-08',452,'16:10:25'),('2019-08-08',453,'16:10:45'),('2019-08-08',454,'16:10:45'),('2019-08-08',455,'16:11:05'),('2019-08-08',456,'16:11:06'),('2019-08-08',457,'16:11:44'),('2019-08-08',458,'16:12:24'),('2019-08-08',459,'16:12:24'),('2019-08-08',460,'16:12:37'),('2019-08-08',461,'16:12:57'),('2019-08-08',462,'16:12:57'),('2019-08-08',463,'16:13:45'),('2019-08-08',464,'16:14:10'),('2019-08-08',465,'16:14:10'),('2019-08-08',466,'16:14:46'),('2019-08-08',467,'16:14:46'),('2019-08-08',468,'16:15:28'),('2019-08-08',469,'16:15:28'),('2019-08-08',470,'16:16:46'),('2019-08-08',471,'16:16:46'),('2019-08-08',472,'16:17:04'),('2019-08-08',473,'16:17:04'),('2019-08-08',474,'16:17:43'),('2019-08-08',475,'16:17:44'),('2019-08-08',476,'16:17:50'),('2019-08-08',477,'16:17:51'),('2019-08-08',478,'16:18:02'),('2019-08-08',479,'16:18:03'),('2019-08-08',480,'16:18:34'),('2019-08-08',481,'16:18:34'),('2019-08-08',482,'16:19:33'),('2019-08-08',483,'16:19:44'),('2019-08-08',484,'16:19:44'),('2019-08-08',485,'16:20:01'),('2019-08-08',486,'16:20:01'),('2019-08-08',487,'16:22:23'),('2019-08-08',488,'16:22:23'),('2019-08-08',489,'16:23:54'),('2019-08-08',490,'16:25:17'),('2019-08-08',491,'16:25:17'),('2019-08-08',492,'16:26:51'),('2019-08-08',493,'16:26:52'),('2019-08-08',494,'16:27:34'),('2019-08-08',495,'16:27:43'),('2019-08-08',496,'16:27:43'),('2019-08-08',497,'16:28:00'),('2019-08-08',498,'16:28:00'),('2019-08-08',499,'16:29:43'),('2019-08-08',500,'16:31:29'),('2019-08-08',501,'16:33:03'),('2019-08-08',502,'16:35:18'),('2019-08-08',503,'16:35:18'),('2019-08-08',504,'16:35:36'),('2019-08-08',505,'16:35:52'),('2019-08-08',506,'16:35:52'),('2019-08-08',507,'16:36:01'),('2019-08-08',508,'16:36:56'),('2019-08-08',509,'16:38:21'),('2019-08-08',510,'16:38:44'),('2019-08-08',511,'16:38:44'),('2019-08-08',512,'16:40:33'),('2019-08-08',513,'16:41:48'),('2019-08-08',514,'16:42:22'),('2019-08-08',515,'16:49:09'),('2019-08-08',516,'16:49:09'),('2019-08-08',517,'16:49:33'),('2019-08-08',518,'16:50:42'),('2019-08-08',519,'16:50:49'),('2019-08-08',520,'16:53:02'),('2019-08-08',521,'16:53:02'),('2019-08-08',522,'16:55:45'),('2019-08-08',523,'16:55:58'),('2019-08-08',524,'16:55:58'),('2019-08-08',525,'16:56:22'),('2019-08-08',526,'16:56:23'),('2019-08-08',527,'16:56:55'),('2019-08-08',528,'16:58:19'),('2019-08-08',529,'16:58:23'),('2019-08-08',530,'16:58:26'),('2019-08-08',531,'17:01:27'),('2019-08-08',532,'17:01:27'),('2019-08-08',533,'17:02:30'),('2019-08-08',534,'17:02:30'),('2019-08-08',535,'17:03:06'),('2019-08-08',536,'17:03:25'),('2019-08-08',537,'17:04:54'),('2019-08-08',538,'17:08:43'),('2019-08-08',539,'17:11:37'),('2019-08-08',540,'17:11:37'),('2019-08-08',541,'17:12:40'),('2019-08-08',542,'17:13:29'),('2019-08-08',543,'17:13:29'),('2019-08-08',544,'17:16:40'),('2019-08-08',545,'17:16:40'),('2019-08-08',546,'17:20:54'),('2019-08-08',547,'17:20:54'),('2019-08-08',548,'17:21:01'),('2019-08-08',549,'17:21:02'),('2019-08-08',550,'17:21:10'),('2019-08-08',551,'17:21:12'),('2019-08-08',552,'17:21:20'),('2019-08-08',553,'17:21:21'),('2019-08-08',554,'17:28:35'),('2019-08-08',555,'17:28:35'),('2019-08-08',556,'17:28:45'),('2019-08-08',557,'17:28:45'),('2019-08-08',558,'17:29:25'),('2019-08-08',559,'17:29:26'),('2019-08-08',560,'17:30:41'),('2019-08-08',561,'17:30:41'),('2019-08-08',562,'17:31:00'),('2019-08-08',563,'17:43:14'),('2019-08-08',564,'17:43:14'),('2019-08-08',565,'17:44:05'),('2019-08-08',566,'17:51:54'),('2019-08-08',567,'17:53:03'),('2019-08-08',568,'17:53:03'),('2019-08-08',569,'17:54:22'),('2019-08-08',570,'17:55:31'),('2019-08-08',571,'17:56:19'),('2019-08-08',572,'17:58:47'),('2019-08-08',573,'17:58:47'),('2019-08-08',574,'18:00:49'),('2019-08-08',575,'18:00:49'),('2019-08-08',576,'18:02:21'),('2019-08-08',577,'18:06:33'),('2019-08-08',578,'18:06:33'),('2019-08-08',579,'18:06:54'),('2019-08-08',580,'18:08:00'),('2019-08-08',581,'18:08:00'),('2019-08-08',582,'18:09:02'),('2019-08-08',583,'18:09:16'),('2019-08-08',584,'18:09:16'),('2019-08-08',585,'18:09:58'),('2019-08-08',586,'18:09:58'),('2019-08-08',587,'18:10:09'),('2019-08-08',588,'18:10:09'),('2019-08-08',589,'18:11:04'),('2019-08-08',590,'18:11:04'),('2019-08-08',591,'18:11:23'),('2019-08-08',592,'18:12:06'),('2019-08-08',593,'18:12:09'),('2019-08-08',594,'18:12:09'),('2019-08-08',595,'18:12:29'),('2019-08-08',596,'18:12:40'),('2019-08-08',597,'18:12:40'),('2019-08-08',598,'18:12:51'),('2019-08-08',599,'18:13:32'),('2019-08-08',600,'18:14:13'),('2019-08-08',601,'18:14:13'),('2019-08-08',602,'18:14:16'),('2019-08-08',603,'18:14:16'),('2019-08-08',604,'18:14:37'),('2019-08-08',605,'18:14:37'),('2019-08-08',606,'18:14:59'),('2019-08-08',607,'18:15:16'),('2019-08-08',608,'18:15:16'),('2019-08-08',609,'18:15:22'),('2019-08-08',610,'18:15:22'),('2019-08-08',611,'18:15:27'),('2019-08-08',612,'18:15:27'),('2019-08-08',613,'18:15:28'),('2019-08-08',614,'18:15:28'),('2019-08-08',615,'18:15:31'),('2019-08-08',616,'18:15:31'),('2019-08-08',617,'18:16:23'),('2019-08-08',618,'18:16:53'),('2019-08-08',619,'18:16:53'),('2019-08-08',620,'18:16:56'),('2019-08-08',621,'18:16:56'),('2019-08-08',622,'18:17:28'),('2019-08-08',623,'18:17:35'),('2019-08-08',624,'18:17:36'),('2019-08-08',625,'18:17:56'),('2019-08-08',626,'18:17:56'),('2019-08-08',627,'18:20:01'),('2019-08-08',628,'18:20:01'),('2019-08-08',629,'18:20:03'),('2019-08-08',630,'18:20:03'),('2019-08-08',631,'18:20:16'),('2019-08-08',632,'18:20:16'),('2019-08-08',633,'18:20:25'),('2019-08-08',634,'18:20:25'),('2019-08-08',635,'18:21:24'),('2019-08-08',636,'18:21:58'),('2019-08-08',637,'18:22:42'),('2019-08-08',638,'18:22:42'),('2019-08-08',639,'18:23:35'),('2019-08-08',640,'18:24:42'),('2019-08-08',641,'18:25:00'),('2019-08-08',642,'18:25:00'),('2019-08-08',643,'18:25:12'),('2019-08-08',644,'18:25:12'),('2019-08-08',645,'18:25:34'),('2019-08-08',646,'18:25:34'),('2019-08-08',647,'18:25:34'),('2019-08-08',648,'18:25:34'),('2019-08-08',649,'18:25:35'),('2019-08-08',650,'18:26:31'),('2019-08-08',651,'18:27:27'),('2019-08-08',652,'18:29:09'),('2019-08-08',653,'18:31:19'),('2019-08-08',654,'18:31:31'),('2019-08-08',655,'18:32:42'),('2019-08-08',656,'18:36:13'),('2019-08-08',657,'18:36:21'),('2019-08-08',658,'18:36:21'),('2019-08-08',659,'18:36:28'),('2019-08-08',660,'18:36:28'),('2019-08-08',661,'18:37:47'),('2019-08-08',662,'18:37:47'),('2019-08-08',663,'18:38:11'),('2019-08-08',664,'18:38:46'),('2019-08-08',665,'18:38:46'),('2019-08-08',666,'18:38:53'),('2019-08-08',667,'18:38:53'),('2019-08-08',668,'18:39:55'),('2019-08-08',669,'18:39:55'),('2019-08-08',670,'18:39:56'),('2019-08-08',671,'18:39:57'),('2019-08-08',672,'18:39:57'),('2019-08-08',673,'18:40:02'),('2019-08-08',674,'18:40:02'),('2019-08-08',675,'18:40:02'),('2019-08-08',676,'18:40:02'),('2019-08-08',677,'18:40:25'),('2019-08-08',678,'18:40:25'),('2019-08-08',679,'18:40:30'),('2019-08-08',680,'18:40:51'),('2019-08-08',681,'18:43:44'),('2019-08-08',682,'18:44:37'),('2019-08-08',683,'18:44:37'),('2019-08-08',684,'18:45:42'),('2019-08-08',685,'18:45:42'),('2019-08-08',686,'18:45:51'),('2019-08-08',687,'18:46:07'),('2019-08-08',688,'18:46:07'),('2019-08-08',689,'18:46:30'),('2019-08-08',690,'18:46:31'),('2019-08-08',691,'18:46:57'),('2019-08-08',692,'18:46:57'),('2019-08-08',693,'18:53:47'),('2019-08-08',694,'18:53:47'),('2019-08-08',695,'18:57:29'),('2019-08-08',696,'18:57:30'),('2019-08-08',697,'18:59:34'),('2019-08-08',698,'18:59:34'),('2019-08-08',699,'18:59:41'),('2019-08-08',700,'18:59:41'),('2019-08-08',701,'19:00:02'),('2019-08-08',702,'19:00:03'),('2019-08-08',703,'19:00:35'),('2019-08-08',704,'19:00:35'),('2019-08-08',705,'19:03:58'),('2019-08-08',706,'19:03:58'),('2019-08-08',707,'19:06:19'),('2019-08-08',708,'19:07:09'),('2019-08-08',709,'19:07:09'),('2019-08-09',1,'08:41:06'),('2019-08-09',2,'08:41:21'),('2019-08-09',3,'08:41:21'),('2019-08-09',4,'08:48:04'),('2019-08-09',5,'08:49:02'),('2019-08-09',6,'08:49:02'),('2019-08-09',7,'08:50:09'),('2019-08-09',8,'08:50:09'),('2019-08-09',9,'08:55:02'),('2019-08-09',10,'08:55:39'),('2019-08-09',11,'08:55:39'),('2019-08-09',12,'08:56:16'),('2019-08-09',13,'08:56:43'),('2019-08-09',14,'08:56:43'),('2019-08-09',15,'08:59:41'),('2019-08-09',16,'09:04:23'),('2019-08-09',17,'09:04:23'),('2019-08-09',18,'09:04:38'),('2019-08-09',19,'09:04:39'),('2019-08-09',20,'09:05:05'),('2019-08-09',21,'09:05:05'),('2019-08-09',22,'09:10:01'),('2019-08-09',23,'09:10:38'),('2019-08-09',24,'09:10:38'),('2019-08-09',25,'09:13:37'),('2019-08-09',26,'09:14:15'),('2019-08-09',27,'09:14:15'),('2019-08-09',28,'09:17:20'),('2019-08-09',29,'09:17:23'),('2019-08-09',30,'09:17:23'),('2019-08-09',31,'09:20:15'),('2019-08-09',32,'09:20:15'),('2019-08-09',33,'09:25:35'),('2019-08-09',34,'09:25:35'),('2019-08-09',35,'09:29:42'),('2019-08-09',36,'09:29:42'),('2019-08-09',37,'09:32:17'),('2019-08-09',38,'09:32:17'),('2019-08-09',39,'09:53:38'),('2019-08-09',40,'09:53:39'),('2019-08-09',41,'09:59:41'),('2019-08-09',42,'09:59:41'),('2019-08-09',43,'10:01:13'),('2019-08-09',44,'10:01:43'),('2019-08-09',45,'10:01:43'),('2019-08-09',46,'10:01:52'),('2019-08-09',47,'10:01:52'),('2019-08-09',48,'10:02:03'),('2019-08-09',49,'10:02:03'),('2019-08-09',50,'10:03:12'),('2019-08-09',51,'10:03:12'),('2019-08-09',52,'10:04:20'),('2019-08-09',53,'10:05:27'),('2019-08-09',54,'10:05:27'),('2019-08-09',55,'10:06:05'),('2019-08-09',56,'10:06:05'),('2019-08-09',57,'10:07:38'),('2019-08-09',58,'12:22:26'),('2019-08-09',59,'12:22:26'),('2019-08-09',60,'12:26:35'),('2019-08-09',61,'12:26:35'),('2019-08-09',62,'12:26:37'),('2019-08-09',63,'12:26:37'),('2019-08-09',64,'14:14:16'),('2019-08-09',65,'14:14:16'),('2019-08-09',66,'14:14:21'),('2019-08-09',67,'14:14:21'),('2019-08-09',68,'14:14:22'),('2019-08-09',69,'14:14:22'),('2019-08-09',70,'14:14:24'),('2019-08-09',71,'14:14:24'),('2019-08-09',72,'15:14:23'),('2019-08-09',73,'15:14:23'),('2019-08-09',74,'15:21:28'),('2019-08-09',75,'15:21:58'),('2019-08-09',76,'15:21:58'),('2019-08-09',77,'15:27:56'),('2019-08-09',78,'15:27:56'),('2019-08-09',79,'15:37:49'),('2019-08-09',80,'15:37:49'),('2019-08-09',81,'15:41:01'),('2019-08-14',1,'08:26:44'),('2019-08-14',2,'08:26:44'),('2019-08-14',3,'08:26:57'),('2019-08-14',4,'08:26:57'),('2019-08-14',5,'08:27:06'),('2019-08-14',6,'08:27:06'),('2019-08-14',7,'11:40:00'),('2019-08-14',8,'15:12:26'),('2019-08-14',9,'15:12:26'),('2019-08-20',1,'08:37:36'),('2019-08-20',2,'08:37:36'),('2019-08-20',3,'08:37:36'),('2019-08-20',4,'08:37:36'),('2019-08-20',5,'08:37:41'),('2019-08-20',6,'08:37:41'),('2019-08-20',7,'09:16:32'),('2019-08-20',8,'09:16:32'),('2019-08-20',9,'09:16:40'),('2019-08-20',10,'09:16:40'),('2019-08-20',11,'09:36:42'),('2019-08-20',12,'09:36:42'),('2019-08-20',13,'09:36:48'),('2019-08-20',14,'09:36:48'),('2019-08-20',15,'09:36:55'),('2019-08-20',16,'09:36:55'),('2019-08-20',17,'09:37:50'),('2019-08-21',1,'10:38:06'),('2019-08-21',2,'10:38:06'),('2019-08-21',3,'10:38:09'),('2019-08-21',4,'10:38:09'),('2019-08-21',5,'11:11:07'),('2019-08-21',6,'11:11:07'),('2019-08-21',7,'11:11:09'),('2019-08-21',8,'11:11:09'),('2019-08-21',9,'11:18:28'),('2019-08-21',10,'11:18:28'),('2019-08-21',11,'13:12:53'),('2019-08-21',12,'13:12:54'),('2019-08-21',13,'13:49:53'),('2019-08-21',14,'13:49:53'),('2019-08-21',15,'14:12:36'),('2019-08-21',16,'14:12:54'),('2019-08-21',17,'14:12:55'),('2019-08-21',18,'14:14:44'),('2019-08-21',19,'14:14:59'),('2019-08-21',20,'14:16:18'),('2019-08-21',21,'14:17:09'),('2019-08-21',22,'14:17:09'),('2019-08-21',23,'14:18:33'),('2019-08-21',24,'14:18:33'),('2019-08-21',25,'14:24:17'),('2019-08-21',26,'14:24:17'),('2019-08-21',27,'14:26:45'),('2019-08-21',28,'14:26:45'),('2019-08-21',29,'14:34:50'),('2019-08-21',30,'14:34:50'),('2019-08-21',31,'14:35:59'),('2019-08-21',32,'14:35:59'),('2019-08-21',33,'14:38:51'),('2019-08-21',34,'14:38:51'),('2019-08-21',35,'14:40:00'),('2019-08-21',36,'14:40:01'),('2019-08-21',37,'15:28:26'),('2019-08-21',38,'15:28:27'),('2019-08-21',39,'15:28:32'),('2019-08-21',40,'15:28:32'),('2019-08-21',41,'15:31:02'),('2019-08-21',42,'15:31:02'),('2019-08-21',43,'15:31:58'),('2019-08-21',44,'15:31:59'),('2019-08-21',45,'15:37:10'),('2019-08-21',46,'15:37:10'),('2019-08-21',47,'15:37:35'),('2019-08-21',48,'15:37:35'),('2019-08-21',49,'15:37:57'),('2019-08-21',50,'15:37:57'),('2019-08-21',51,'15:38:18'),('2019-08-21',52,'15:38:18'),('2019-08-21',53,'15:39:18'),('2019-08-21',54,'15:39:18'),('2019-08-21',55,'15:40:06'),('2019-08-21',56,'15:40:06'),('2019-08-21',57,'15:40:51'),('2019-08-21',58,'15:40:51'),('2019-08-21',59,'15:41:35'),('2019-08-21',60,'15:41:36'),('2019-08-21',61,'15:47:25'),('2019-08-21',62,'15:47:26'),('2019-08-21',63,'15:53:41'),('2019-08-21',64,'15:53:41'),('2019-08-21',65,'15:54:13'),('2019-08-21',66,'15:54:13'),('2019-08-21',67,'15:55:01'),('2019-08-21',68,'15:55:01'),('2019-08-21',69,'15:56:05'),('2019-08-21',70,'15:56:05'),('2019-08-21',71,'15:56:14'),('2019-08-21',72,'15:56:14'),('2019-08-21',73,'15:56:38'),('2019-08-21',74,'15:56:39'),('2019-08-21',75,'15:57:17'),('2019-08-21',76,'15:57:18'),('2019-08-21',77,'16:09:44'),('2019-08-21',78,'16:09:44'),('2019-08-21',79,'16:40:32'),('2019-08-21',80,'16:40:32'),('2019-08-22',1,'17:17:20'),('2019-08-22',2,'17:17:20'),('2019-08-22',3,'17:21:54'),('2019-08-22',4,'17:21:54'),('2019-08-22',5,'17:23:19'),('2019-08-22',6,'17:23:19'),('2019-08-22',7,'17:23:29'),('2019-08-22',8,'17:23:29'),('2019-08-23',1,'08:30:27'),('2019-08-23',2,'08:30:27'),('2019-08-23',3,'08:30:30'),('2019-08-23',4,'08:30:30'),('2019-08-23',5,'08:30:54'),('2019-08-23',6,'08:30:54'),('2019-08-23',7,'08:34:43'),('2019-08-23',8,'08:34:43'),('2019-08-23',9,'08:34:58'),('2019-08-23',10,'08:34:58'),('2019-08-23',11,'08:42:07'),('2019-08-23',12,'08:42:07'),('2019-08-23',13,'08:43:11'),('2019-08-23',14,'08:43:11'),('2019-08-23',15,'09:10:15'),('2019-08-23',16,'09:10:15'),('2019-08-23',17,'09:10:29'),('2019-08-23',18,'09:10:29'),('2019-08-23',19,'14:06:03'),('2019-08-23',20,'14:06:03'),('2019-08-27',1,'12:18:11'),('2019-08-27',2,'12:18:11'),('2019-08-27',3,'12:18:29'),('2019-08-27',4,'12:18:30'),('2019-08-27',5,'12:22:31'),('2019-08-27',6,'12:22:31'),('2019-08-27',7,'15:21:24'),('2019-08-27',8,'15:21:24'),('2019-08-30',1,'10:05:39'),('2019-08-30',2,'10:05:39'),('2019-08-30',3,'10:05:54'),('2019-08-30',4,'10:05:54'),('2019-08-30',5,'10:06:15'),('2019-08-30',6,'10:06:15'),('2019-08-30',7,'10:06:26'),('2019-08-30',8,'10:06:26'),('2019-08-30',9,'10:09:27'),('2019-08-30',10,'10:09:27'),('2019-08-30',11,'10:32:59'),('2019-08-30',12,'10:32:59'),('2019-08-30',13,'10:33:25'),('2019-08-30',14,'10:33:25'),('2019-08-30',15,'10:33:34'),('2019-08-30',16,'10:33:34'),('2019-08-30',17,'10:53:01'),('2019-08-30',18,'10:53:02'),('2019-08-30',19,'11:00:07'),('2019-08-30',20,'11:06:33'),('2019-08-30',21,'11:07:21'),('2019-08-30',22,'11:08:39'),('2019-08-30',23,'11:11:05'),('2019-08-30',24,'11:12:31'),('2019-08-30',25,'11:16:56'),('2019-08-30',26,'11:17:28'),('2019-08-30',27,'11:37:02'),('2019-08-30',28,'11:38:30'),('2019-08-30',29,'11:39:26'),('2019-08-30',30,'11:40:41'),('2019-08-30',31,'11:42:13'),('2019-08-30',32,'11:47:36'),('2019-08-30',33,'11:49:41'),('2019-08-30',34,'11:51:41'),('2019-08-30',35,'11:53:06'),('2019-08-30',36,'11:53:08'),('2019-08-30',37,'11:57:18'),('2019-08-30',38,'11:57:19'),('2019-08-30',39,'12:25:51'),('2019-08-30',40,'12:26:57'),('2019-08-30',41,'12:27:48'),('2019-08-30',42,'12:33:07'),('2019-08-30',43,'12:34:44'),('2019-08-30',44,'12:35:13'),('2019-08-30',45,'14:19:57'),('2019-08-30',46,'14:21:06'),('2019-08-30',47,'14:26:11'),('2019-08-30',48,'14:26:41'),('2019-09-02',1,'11:29:51'),('2019-09-02',2,'11:29:51'),('2019-09-02',3,'11:29:53'),('2019-09-02',4,'11:29:53'),('2019-09-02',5,'13:47:20'),('2019-09-02',6,'13:47:20'),('2019-09-03',1,'13:44:24'),('2019-09-03',2,'13:51:19'),('2019-09-03',3,'13:51:58'),('2019-09-03',4,'13:51:59'),('2019-09-03',5,'13:52:21'),('2019-09-03',6,'13:52:38'),('2019-09-03',7,'18:19:27'),('2019-09-04',1,'14:37:51'),('2019-09-04',2,'14:37:51'),('2019-09-04',3,'14:46:14'),('2019-09-04',4,'14:47:04'),('2019-09-04',5,'14:48:56'),('2019-09-04',6,'14:48:56'),('2019-09-04',7,'14:49:15'),('2019-09-04',8,'15:13:12'),('2019-09-04',9,'15:13:22'),('2019-09-04',10,'15:16:20'),('2019-09-04',11,'15:16:21'),('2019-09-04',12,'15:16:42'),('2019-09-04',13,'15:16:43'),('2019-09-04',14,'15:17:55'),('2019-09-04',15,'15:24:44'),('2019-09-04',16,'15:27:14'),('2019-09-04',17,'15:27:14'),('2019-09-04',18,'15:28:54'),('2019-09-04',19,'15:31:16'),('2019-09-04',20,'15:31:37'),('2019-09-04',21,'15:48:40'),('2019-09-04',22,'15:49:58'),('2019-09-04',23,'15:52:59'),('2019-09-04',24,'15:54:42'),('2019-09-04',25,'15:54:43'),('2019-09-04',26,'15:54:45'),('2019-09-04',27,'15:54:48'),('2019-09-04',28,'15:54:48'),('2019-09-04',29,'15:54:52'),('2019-09-04',30,'15:54:52'),('2019-09-04',31,'15:55:14'),('2019-09-04',32,'17:54:43'),('2019-09-04',33,'17:54:43'),('2019-09-05',1,'09:07:40'),('2019-09-05',2,'11:38:36'),('2019-09-05',3,'11:38:36'),('2019-09-05',4,'11:38:37'),('2019-09-05',5,'11:38:38'),('2019-09-05',6,'11:40:01'),('2019-09-05',7,'11:40:01'),('2019-09-05',8,'11:40:17'),('2019-09-05',9,'11:40:17'),('2019-09-05',10,'11:40:47'),('2019-09-05',11,'11:40:47'),('2019-09-05',12,'15:04:06'),('2019-09-05',13,'15:04:06'),('2019-09-05',14,'15:04:23'),('2019-09-05',15,'15:04:23'),('2019-09-05',16,'15:34:00'),('2019-09-05',17,'15:45:37'),('2019-09-05',18,'15:45:37'),('2019-09-05',19,'15:46:01'),('2019-09-05',20,'15:46:01'),('2019-09-06',1,'11:07:37'),('2019-09-06',2,'11:07:37'),('2019-09-09',1,'14:20:39'),('2019-09-09',2,'14:20:40'),('2019-09-09',3,'14:25:08'),('2019-09-09',4,'14:25:09'),('2019-09-09',5,'14:26:01'),('2019-09-09',6,'14:26:01'),('2019-09-09',7,'14:26:08'),('2019-09-09',8,'14:26:08'),('2019-09-09',9,'14:26:42'),('2019-09-09',10,'14:26:43'),('2019-09-09',11,'14:28:24'),('2019-09-09',12,'14:28:26'),('2019-09-09',13,'14:30:08'),('2019-09-09',14,'14:30:08'),('2019-09-09',15,'14:35:59'),('2019-09-09',16,'14:35:59'),('2019-09-09',17,'14:43:00'),('2019-09-09',18,'14:43:01'),('2019-09-16',1,'11:39:23'),('2019-09-16',2,'11:39:23'),('2019-09-16',3,'11:40:53'),('2019-09-16',4,'12:11:57'),('2019-09-16',5,'12:11:57'),('2019-09-16',6,'12:12:11'),('2019-09-16',7,'12:12:11'),('2019-09-16',8,'12:17:51'),('2019-09-16',9,'12:17:51'),('2019-09-16',10,'12:18:16'),('2019-09-16',11,'12:18:16'),('2019-09-16',12,'12:19:28'),('2019-09-16',13,'12:19:28'),('2019-09-16',14,'12:20:18'),('2019-09-16',15,'12:21:09'),('2019-09-16',16,'12:22:13'),('2019-09-16',17,'12:22:13'),('2019-09-16',18,'12:25:04'),('2019-09-16',19,'12:25:04'),('2019-09-16',20,'12:25:30'),('2019-09-16',21,'12:25:30'),('2019-09-16',22,'12:26:15'),('2019-09-16',23,'12:27:22'),('2019-09-16',24,'12:27:58'),('2019-09-16',25,'12:27:58'),('2019-09-16',26,'14:23:33'),('2019-09-16',27,'14:23:34'),('2019-09-16',28,'14:24:43'),('2019-09-16',29,'14:24:43'),('2019-09-16',30,'14:41:04'),('2019-09-16',31,'14:41:04'),('2019-09-16',32,'14:44:54'),('2019-09-16',33,'14:44:54'),('2019-09-16',34,'14:45:13'),('2019-09-16',35,'14:45:13'),('2019-09-16',36,'14:48:42'),('2019-09-16',37,'14:48:42'),('2019-09-16',38,'14:49:37'),('2019-09-16',39,'14:49:37'),('2019-09-16',40,'14:51:01'),('2019-09-16',41,'14:51:01'),('2019-09-16',42,'14:58:25'),('2019-09-16',43,'14:58:25'),('2019-09-16',44,'14:58:25'),('2019-09-16',45,'15:00:22'),('2019-09-16',46,'15:00:22'),('2019-09-16',47,'15:01:48'),('2019-09-16',48,'15:07:28'),('2019-09-16',49,'15:07:28'),('2019-09-16',50,'15:07:30'),('2019-09-16',51,'15:07:30'),('2019-09-16',52,'15:08:48'),('2019-09-16',53,'15:09:09'),('2019-09-16',54,'15:09:09'),('2019-09-16',55,'15:10:31'),('2019-09-16',56,'15:10:31'),('2019-09-16',57,'15:10:51'),('2019-09-16',58,'15:10:51'),('2019-09-16',59,'15:15:18'),('2019-09-16',60,'15:15:18'),('2019-09-16',61,'15:15:54'),('2019-09-16',62,'15:15:54'),('2019-09-16',63,'15:16:53'),('2019-09-16',64,'15:16:54'),('2019-09-16',65,'15:17:25'),('2019-09-16',66,'15:17:25'),('2019-09-16',67,'15:18:06'),('2019-09-16',68,'15:18:06'),('2019-09-16',69,'15:24:47'),('2019-09-16',70,'15:25:33'),('2019-09-16',71,'15:27:28'),('2019-09-16',72,'15:27:28'),('2019-09-16',73,'15:28:53'),('2019-09-16',74,'15:28:54'),('2019-09-16',75,'15:43:11'),('2019-09-16',76,'15:43:14'),('2019-09-16',77,'15:43:37'),('2019-09-16',78,'15:53:54'),('2019-09-16',79,'15:53:54'),('2019-09-16',80,'15:54:45'),('2019-09-16',81,'15:54:46'),('2019-09-16',82,'16:09:53'),('2019-09-16',83,'16:09:53'),('2019-09-16',84,'16:11:51'),('2019-09-16',85,'16:11:51'),('2019-09-16',86,'16:12:20'),('2019-09-16',87,'16:12:20'),('2019-09-16',88,'16:12:31'),('2019-09-16',89,'16:12:31'),('2019-09-16',90,'16:16:40'),('2019-09-16',91,'16:16:40'),('2019-09-16',92,'16:18:37'),('2019-09-16',93,'16:18:37'),('2019-09-16',94,'16:20:01'),('2019-09-16',95,'16:20:01'),('2019-09-16',96,'16:22:37'),('2019-09-16',97,'16:22:37'),('2019-09-16',98,'16:22:50'),('2019-09-16',99,'16:22:50'),('2019-09-16',100,'16:23:03'),('2019-09-16',101,'16:23:03'),('2019-09-16',102,'16:23:25'),('2019-09-16',103,'16:23:25'),('2019-09-16',104,'16:25:55'),('2019-09-16',105,'16:25:55'),('2019-09-16',106,'16:28:29'),('2019-09-16',107,'16:28:29'),('2019-09-16',108,'16:33:55'),('2019-09-16',109,'16:33:55'),('2019-09-16',110,'18:10:42'),('2019-09-16',111,'18:10:44'),('2019-09-19',1,'14:27:27'),('2019-11-07',1,'18:11:27'),('2019-11-07',2,'18:11:30'),('2019-11-07',3,'18:12:04'),('2019-11-07',4,'18:12:22'),('2019-11-07',5,'18:13:22'),('2019-11-07',6,'18:13:22'),('2019-11-07',7,'18:13:39'),('2019-11-07',8,'18:14:51'),('2019-11-07',9,'18:18:37'),('2019-11-07',10,'18:37:29'),('2019-11-07',11,'18:37:33'),('2019-11-18',1,'14:40:11'),('2019-11-18',2,'14:40:53'),('2019-11-18',3,'14:41:29'),('2019-11-18',4,'14:41:29'),('2019-11-18',5,'14:43:33'),('2019-11-18',6,'14:43:53'),('2019-11-18',7,'14:45:08'),('2019-11-18',8,'14:46:50'),('2019-11-18',9,'14:47:16'),('2019-11-18',10,'14:52:38'),('2019-11-18',11,'14:52:38'),('2019-11-18',12,'14:54:00'),('2019-11-18',13,'14:54:00'),('2019-11-18',14,'15:00:30'),('2019-11-18',15,'15:02:59'),('2019-11-18',16,'15:02:59'),('2019-11-18',17,'15:04:46'),('2019-11-18',18,'15:06:55'),('2019-11-18',19,'15:06:55'),('2019-11-18',20,'15:07:40'),('2019-11-18',21,'15:07:44'),('2019-11-18',22,'15:09:56'),('2019-11-18',23,'15:10:36'),('2019-11-18',24,'15:15:19'),('2019-11-18',25,'15:16:39'),('2019-11-18',26,'15:17:36'),('2019-11-18',27,'15:22:06'),('2019-11-18',28,'15:22:06'),('2019-11-18',29,'15:24:23'),('2019-11-18',30,'15:25:00'),('2019-11-18',31,'15:26:17'),('2019-11-18',32,'15:26:48'),('2019-11-18',33,'15:26:48'),('2019-11-22',1,'10:35:51'),('2019-11-22',3,'10:35:51'),('2019-11-22',5,'10:36:04'),('2019-11-22',7,'10:36:04'),('2019-11-22',9,'10:36:15'),('2019-11-22',11,'10:36:30'),('2019-11-22',13,'10:36:32'),('2019-11-22',15,'10:36:48'),('2019-11-22',17,'10:37:10'),('2019-11-22',19,'10:37:11'),('2019-11-22',21,'10:38:29'),('2019-11-22',23,'10:38:57'),('2019-11-22',25,'10:38:57'),('2019-11-22',27,'10:51:04'),('2019-11-22',29,'10:51:04'),('2019-11-22',31,'10:51:19'),('2019-11-22',33,'10:51:32'),('2019-11-22',35,'10:51:32'),('2019-11-22',37,'10:51:37'),('2019-11-22',39,'10:51:37'),('2019-11-22',41,'10:52:28'),('2019-11-22',43,'10:52:29'),('2019-11-22',45,'10:52:45'),('2019-11-22',47,'10:52:46'),('2020-03-30',1,'11:01:18'),('2020-03-30',3,'11:01:18'),('2020-03-30',5,'11:02:08'),('2020-03-30',7,'11:02:08'),('2020-03-30',9,'11:02:24'),('2020-03-30',11,'11:02:24'),('2020-03-30',13,'11:02:35'),('2020-03-30',15,'11:02:35'),('2020-03-30',17,'11:02:42'),('2020-03-30',19,'11:02:42'),('2020-03-30',21,'11:02:54'),('2020-03-30',23,'11:02:54'),('2020-03-30',25,'11:05:00'),('2020-03-30',27,'11:05:00'),('2020-03-30',29,'11:12:47'),('2020-03-30',31,'11:12:47'),('2020-03-30',33,'11:22:48'),('2020-03-30',35,'11:22:48'),('2020-03-30',37,'11:31:28'),('2020-03-30',39,'11:31:28'),('2020-03-30',41,'11:39:30'),('2020-03-30',43,'11:39:30'),('2020-03-30',45,'11:40:14'),('2020-03-30',47,'11:40:14'),('2020-03-30',49,'11:40:31'),('2020-03-30',51,'11:40:31'),('2020-03-30',53,'11:59:59'),('2020-03-30',55,'11:59:59'),('2020-03-30',57,'12:06:06'),('2020-03-30',59,'12:06:06'),('2020-03-30',61,'12:06:42'),('2020-03-30',63,'12:06:42'),('2020-03-30',65,'12:11:38'),('2020-03-30',67,'12:11:38'),('2020-03-30',69,'12:13:37'),('2020-03-30',71,'12:13:37'),('2020-03-30',73,'12:24:55'),('2020-03-30',75,'12:24:55'),('2020-03-30',77,'12:30:11'),('2020-03-30',79,'12:30:11'),('2020-03-30',81,'12:32:07'),('2020-03-30',83,'12:32:07'),('2020-03-30',85,'12:36:24'),('2020-03-30',87,'12:36:24'),('2020-03-30',89,'12:51:56'),('2020-03-30',91,'12:51:56'),('2020-03-30',93,'13:00:43'),('2020-03-30',95,'13:00:43'),('2020-03-30',97,'13:05:15'),('2020-03-30',99,'13:05:15'),('2020-03-30',101,'13:26:42'),('2020-03-30',103,'13:26:42'),('2020-03-30',105,'13:26:43'),('2020-03-30',107,'13:26:43'),('2020-03-30',109,'13:27:06'),('2020-03-30',111,'13:27:06'),('2020-03-30',113,'13:31:50'),('2020-03-30',115,'13:31:50'),('2020-03-30',117,'13:32:57'),('2020-03-30',119,'13:32:57'),('2020-03-30',121,'13:33:01'),('2020-03-30',123,'13:33:01'),('2020-03-30',125,'13:35:41'),('2020-03-30',127,'13:35:41'),('2020-03-30',129,'13:40:06'),('2020-03-30',131,'13:40:06'),('2020-03-30',133,'13:40:18'),('2020-03-30',135,'13:40:18'),('2020-03-30',137,'13:40:48'),('2020-03-30',139,'13:40:48'),('2020-03-30',141,'13:41:31'),('2020-03-30',143,'13:41:31'),('2020-03-30',145,'13:46:36'),('2020-03-30',147,'13:46:36'),('2020-03-30',149,'13:49:53'),('2020-03-30',151,'13:49:53'),('2020-03-30',153,'13:50:59'),('2020-03-30',155,'13:51:05'),('2020-03-30',157,'13:51:33'),('2020-03-30',159,'13:53:45'),('2020-03-30',161,'14:05:50'),('2020-03-30',163,'14:37:53'),('2020-03-30',165,'14:40:01'),('2020-03-30',167,'14:42:11'),('2020-03-30',169,'14:42:45'),('2020-03-30',171,'14:44:20'),('2020-03-30',173,'14:45:48'),('2020-03-30',175,'14:47:11'),('2020-03-30',177,'15:05:55'),('2020-03-30',179,'19:29:20'),('2020-03-30',181,'19:39:13'),('2020-03-30',183,'19:45:10'),('2020-03-30',185,'20:56:58'),('2020-03-30',187,'21:51:35'),('2020-03-30',189,'21:51:35'),('2020-03-30',191,'21:57:38'),('2020-03-30',193,'22:06:47'),('2020-03-30',195,'22:14:18'),('2020-03-30',197,'22:39:32'),('2020-03-30',199,'22:40:52'),('2020-03-30',201,'22:42:06'),('2020-03-30',203,'22:43:58'),('2020-03-30',205,'22:44:01'),('2020-03-30',207,'23:24:06'),('2020-03-30',209,'23:44:13'),('2020-03-30',211,'23:44:30'),('2020-03-31',1,'07:09:58'),('2020-03-31',3,'07:10:03'),('2020-03-31',5,'07:21:32'),('2020-03-31',7,'07:23:00'),('2020-03-31',9,'07:24:19'),('2020-03-31',11,'12:35:00'),('2020-03-31',13,'12:49:03'),('2020-04-02',1,'09:17:18'),('2020-04-02',3,'12:08:41'),('2020-04-08',1,'13:22:38'),('2020-04-08',3,'13:24:26'),('2020-04-15',1,'01:27:56'),('2020-04-16',1,'13:17:45'),('2020-04-16',3,'14:14:50'),('2020-04-16',5,'15:28:59'),('2020-04-16',7,'15:30:18'),('2020-04-16',9,'17:08:01'),('2020-11-24',1,'12:44:56'),('2021-05-07',1,'12:53:42'),('2021-05-07',3,'12:53:54'),('2021-05-07',5,'12:54:24'),('2021-05-07',7,'12:56:34'),('2021-05-07',9,'12:56:37');
/*!40000 ALTER TABLE `generator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hgsf`
--

DROP TABLE IF EXISTS `hgsf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hgsf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `phone_number` bigint(13) DEFAULT NULL,
  `state` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `lga` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `member_id` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `last_pay_date` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `amount_paid` decimal(17,2) DEFAULT NULL,
  `amount_due` decimal(17,2) DEFAULT NULL,
  `status` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `account_no` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `bank` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `phone_number` (`phone_number`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hgsf`
--

LOCK TABLES `hgsf` WRITE;
/*!40000 ALTER TABLE `hgsf` DISABLE KEYS */;
INSERT INTO `hgsf` VALUES (1,'Joseph Hanatu',7030989045,'Abuja','Kuje','10001','Caterer','30-Jul-19',80000.00,100000.00,'Verified','29142269','DIAMOND BANK '),(2,'Maryam Micah',9081968854,'Abuja','Abaji','10002','Farmer','28-Jun-19',0.00,60000.00,'Verified','76407135','DIAMOND BANK'),(3,'Ishaya Jonathan',7066587131,'Abuja','Kwali','10003','Farmer','28-Jun-19',0.00,60000.00,'Verified','2909234','UNION BANK'),(4,'Tatari William',8036260767,'Abuja','Bwari','10004','Farmer','28-Jul-19',60000.00,60000.00,'Verified','727802002','ACCESS BANK'),(5,'Abmya Ibrahim',9097522549,'Abuja','Gwagwalada','10005','Caterer','30-Jul-19',80000.00,80000.00,'Verified','66280450','STERLING BANK'),(6,'Archibong Happiness',9068154115,'Lagos','Anka','10006','Caterer','26-Jun-19',0.00,80000.00,'Verified','338676233','GTB'),(7,'Attahiru Bello',8032116804,'Zamfara','Zurmi','10007','Farmer','26-Jun-19',0.00,60000.00,'Verified','2211800875','ZENITH BANK'),(8,'Ibrahim Sadiya',8136699702,'Zamfara','Gusau','10008','Transporter','26-Jun-19',0.00,50000.00,'Verified','1401094961','ECOBANK'),(9,'Suleiman Hidayat',7068636441,'Zamfara','Bakura','10009','Transporter','29-May-19',0.00,100000.00,'Verified','54878332','ACCESS BANK'),(10,'Garkuwa Umar',8133239729,'Zamfara','Tsafe','10010','Transporter','29-May-19',0.00,100000.00,'Verified','3115811016','FCMB '),(11,'Sama\'ila Hajara',9033542376,'Zamfara','Maru','10011','Transporter','29-May-19',0.00,100000.00,'Verified','29279125','UNION BANK'),(12,'Ezejiegu Maria',8134090561,'Anambra','Nnewi South','10012','Transporter','29-May-19',0.00,100000.00,'Verified','1500816949','HERITAGE BANK '),(13,'Ezejiegu Christopher',7031351790,'Anambra','Idemili South','10013','Caterer','29-May-19',0.00,160000.00,'Verified','3073479483','FIRST BANK'),(14,'Ilonzeh Peter',8036780154,'Anambra','0gbaru','10014','Caterer','29-May-19',0.00,160000.00,'Verified','6552850594','FIDELITY BANK'),(15,'Odutuyo Mary',8066868305,'Ogun','Ifo','10015','Caterer','29-May-19',0.00,160000.00,'Verified','2094121573','UBA'),(16,'Olawale Omolayo',8076546173,'Ogun','Ewekoro','10016','Caterer','29-May-19',0.00,160000.00,'Verified','2085831942','UBA'),(17,'Adejare Rasidat',9082614199,'Ogun','Ijebu North','10017','Caterer','29-May-19',0.00,160000.00,'Verified','2212468335','ZENITH BANK'),(18,'Adurosakin Abibat',8147588972,'Ogun','Ijebu Ode','10018','Caterer','28-Jul-19',80000.00,80000.00,'Verified','3041001027','FIRST BANK'),(19,'Olaniyi Funmilayo',8161881945,'Ogun','Abeokuta North','10019','Caterer','28-Jul-19',80000.00,80000.00,'Verified','122265967','WEMA BANK'),(20,'Ebuehi Happy',7036701829,'Ogun','Ifo','10020','Caterer','28-Jul-19',80000.00,80000.00,'Verified','22691287','DIAMOND BANK'),(21,'Edward Babatunde',8057397850,'Ogun','Ado-0do','10021','Farmer','28-Jul-19',60000.00,60000.00,'Verified','116031393','GTB'),(22,'Ayanfunsho Fausat',7060651187,'Ogun','Abeokuta South','10022','Caterer','28-Jul-19',80000.00,80000.00,'Verified','52444415','DIAMOND BANK'),(23,'Agboola Kehinde',8032450136,'Ogun','Ifo','10023','Transporter','28-Jul-19',50000.00,50000.00,'Verified','105581249','DIAMOND BANK'),(24,'Soyemi Oluwatoyin',8181222625,'Ogun','Ijebu North East','10024','Farmer','28-Jul-19',60000.00,60000.00,'Verified','33062905','ACCESS BANK'),(25,'Dekumo Gbenetimi',7012364324,'Bayelsa','Ogbia','10025','Caterer','',0.00,0.00,'Pending','3025857678','SKYE BANK'),(26,'Sunday Christian',9029623651,'Bayelsa','Southern Ijaw','10026','Caterer','',0.00,0.00,'Pending','2022190929','UBA'),(27,'Azangu Godfrey',8149020536,'Bayelsa','Yenagoa','10027','Transporter','',0.00,0.00,'Pending','3059748028','FIRST BANK'),(28,'Joshua Inatebegha',9065381477,'Bayelsa','Yenagoa','10028','Transporter','',0.00,0.00,'Pending','3222416018','FCMB '),(29,'Walson Rita',8065878150,'Bayelsa','Yenagoa','10029','Transporter','',0.00,0.00,'Pending','10149709','STERLING BANK'),(30,'Hilary Fredrick',9036830225,'Bayelsa','Yenagoa','10030','Transporter','',0.00,0.00,'Pending','2172682371','ECOBANK'),(31,'Daniel Grace',8102486486,'Bayelsa','Yenagoa','10031','Transporter','',0.00,0.00,'Pending','3050240842','FIRST BANK'),(32,'Adio Olusegun',8058103448,'Oyo','Egbeda','10032','Farmer','',0.00,0.00,'Pending','1500889176','HERITAGE BANK '),(33,'Ibukun Ojo',9051854199,'Oyo','Egbeda','10033','Farmer','',0.00,0.00,'Rejected','2118060277','UBA'),(34,'Sogo Samson',8132872885,'Oyo','Egbeda','10034','Farmer','',0.00,0.00,'Rejected','111951456','UNION BANK'),(35,'Olabode Adegunrin',8036273916,'Oyo','Atisbo','10035','Farmer','',0.00,0.00,'Rejected','2123065236','UBA'),(36,'Adewale Adetunji',8080712318,'Oyo','Akinyele','10036','Caterer','',0.00,0.00,'Rejected','19709745','UNITY BANK'),(37,'Abiodun Adeyemi',8166748767,'Oyo','Akinyele','10037','Caterer','',0.00,0.00,'Rejected','2102941900','UBA'),(38,'Oyediran Adebayo',8068083056,'Oyo','Akinyele','10038','Caterer','',0.00,0.00,'Rejected','44212758','DIAMOND BANK'),(39,'Osayande Enongie',8072330641,'Edo','Afijio','10039','Transporter','',0.00,0.00,'Rejected','2022920144','UBA'),(40,'Omorodion Gloria',8156745624,'Edo','Afijio','10040','Transporter','',0.00,0.00,'Rejected','2107061586','UBA');
/*!40000 ALTER TABLE `hgsf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hgsf_bank`
--

DROP TABLE IF EXISTS `hgsf_bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hgsf_bank` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `institution_code` varchar(10) NOT NULL,
  `bank` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hgsf_bank`
--

LOCK TABLES `hgsf_bank` WRITE;
/*!40000 ALTER TABLE `hgsf_bank` DISABLE KEYS */;
INSERT INTO `hgsf_bank` VALUES (1,'ACCESS','Access Bank'),(2,'CHAMS','Chamsmobile'),(3,'CITI','Citibank'),(4,'DIAMOND','Diamond Bank'),(5,'ECO','Ecobank'),(6,'ENTERPRISE','Enterprise Bank'),(7,'FCMB','FCMB'),(8,'FIDELITY','Fidelity Bank'),(9,'FBN','First Bank'),(10,'GTB','GTBank'),(11,'HERITAGE','Heritage Bank'),(12,'JAIZ','Jaiz'),(13,'KEYSTONE','Keystone Bank'),(14,'MAINSTREET','MainStreet Bank'),(15,'SKYE','Skye Bank'),(16,'STANBIC','Stanbic IBTC'),(17,'STANDARD','Standard Chartered'),(18,'STERLING','Sterling Bank'),(19,'SUNTRUST','SunTrust Bank'),(20,'UBA','UBA'),(21,'UNION','Union Bank'),(22,'UNITY','Unity Bank'),(23,'WEMA','Wema Bank'),(24,'ZENITH','Zenith Bank');
/*!40000 ALTER TABLE `hgsf_bank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hgsf_call_source`
--

DROP TABLE IF EXISTS `hgsf_call_source`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hgsf_call_source` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hgsf_call_source`
--

LOCK TABLES `hgsf_call_source` WRITE;
/*!40000 ALTER TABLE `hgsf_call_source` DISABLE KEYS */;
INSERT INTO `hgsf_call_source` VALUES (1,'IVR'),(2,'Mobile');
/*!40000 ALTER TABLE `hgsf_call_source` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hgsf_call_type`
--

DROP TABLE IF EXISTS `hgsf_call_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hgsf_call_type` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hgsf_call_type`
--

LOCK TABLES `hgsf_call_type` WRITE;
/*!40000 ALTER TABLE `hgsf_call_type` DISABLE KEYS */;
INSERT INTO `hgsf_call_type` VALUES (1,'Incoming'),(2,'Outgoing');
/*!40000 ALTER TABLE `hgsf_call_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hgsf_category`
--

DROP TABLE IF EXISTS `hgsf_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hgsf_category` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hgsf_category`
--

LOCK TABLES `hgsf_category` WRITE;
/*!40000 ALTER TABLE `hgsf_category` DISABLE KEYS */;
INSERT INTO `hgsf_category` VALUES (1,'Enquiry'),(2,'Complaints');
/*!40000 ALTER TABLE `hgsf_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hgsf_comment`
--

DROP TABLE IF EXISTS `hgsf_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hgsf_comment` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `comments` varchar(2000) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `category_id` int(3) NOT NULL,
  `product_id` int(3) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `sla_urgency` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `cat_id_fk2` (`category_id`),
  CONSTRAINT `cat_id_fk2` FOREIGN KEY (`category_id`) REFERENCES `hgsf_category` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `product_id_fk2` FOREIGN KEY (`product_id`) REFERENCES `hgsf_product` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hgsf_comment`
--

LOCK TABLES `hgsf_comment` WRITE;
/*!40000 ALTER TABLE `hgsf_comment` DISABLE KEYS */;
INSERT INTO `hgsf_comment` VALUES (1,'Test 1',1,1,1,1,0),(3,'Suspected - Test 2',1,1,1,1,0),(5,'Confirmed - Test 1',2,1,1,1,0),(7,'Confirmed - Test 2',2,1,1,1,0),(9,'Suspected complaint test 1',1,2,2,1,0),(11,'Suspected complaint test 2',1,2,2,1,0),(13,'Confirmed complaint test 1',2,2,2,1,0),(15,'Confirmed complaint test 3',2,2,2,1,0),(17,'Test 5',3,1,1,1,0);
/*!40000 ALTER TABLE `hgsf_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hgsf_conversations`
--

DROP TABLE IF EXISTS `hgsf_conversations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hgsf_conversations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_number` bigint(20) DEFAULT NULL COMMENT 'contains number generated from ''generator'' table in format 201806060001(bigint)',
  `ticket_status` varchar(32) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `phone_no` varchar(100) DEFAULT NULL,
  `member_id` varchar(100) DEFAULT NULL,
  `entry_category` varchar(50) DEFAULT NULL COMMENT 'category of information whether it is correct, incomplete call, wrong info by customers..etc',
  `association` varchar(200) DEFAULT NULL,
  `amount_paid` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `date_paid` varchar(20) DEFAULT NULL COMMENT 'date BOI customer claims to have paid',
  `comment_id` int(12) DEFAULT NULL COMMENT 'complaints and comments by customers..(mostly predefined)',
  `other_comment` varchar(2000) DEFAULT NULL,
  `cc_agent_response` varchar(2000) DEFAULT NULL,
  `fraud_status` tinyint(1) DEFAULT '0',
  `cc_agent_action` varchar(2000) DEFAULT NULL,
  `user_id` int(10) NOT NULL COMMENT 'CC Agent ID who created the form',
  `entry_source_id` int(3) NOT NULL COMMENT 'Means of communication used to reach Agents. i.e Call, Sms, Chat…',
  `call_source_id` int(11) DEFAULT '3',
  `call_type_id` int(2) NOT NULL DEFAULT '1',
  `category_id` int(5) NOT NULL COMMENT 'identifier ID for respective forms.  enquiry = 4, fraud = 5, kwikcash = 6, loan reconciliations = 1, dta = 2, aggregator = 3',
  `sub_category` varchar(100) DEFAULT NULL,
  `agent_phone_no` varchar(30) DEFAULT NULL COMMENT 'third party agent phone number',
  `agent_name` varchar(100) DEFAULT NULL COMMENT 'third party Agent name ',
  `payment_medium` varchar(3000) DEFAULT NULL COMMENT 'means of payment. Mostly used in fraud',
  `cbr_amt_repaid` decimal(17,2) NOT NULL DEFAULT '0.00',
  `cbr_amt_due` decimal(17,2) NOT NULL DEFAULT '0.00',
  `cbr_amt_default` decimal(17,2) NOT NULL DEFAULT '0.00',
  `product_id` int(3) NOT NULL DEFAULT '1' COMMENT 'This is either marketmoni or tradermoni',
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'timestamp when the agent logged information',
  `created_date` datetime DEFAULT NULL COMMENT 'actual date customer called to drop information to be logged.',
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sla_id` int(11) DEFAULT NULL,
  `sla_due_time` timestamp NULL DEFAULT NULL,
  `sla_urgency` tinyint(1) DEFAULT '0',
  `sla_level` tinyint(2) DEFAULT '1',
  `cbflag` char(1) NOT NULL DEFAULT 'N' COMMENT 'Customer Callback flag',
  `state_id` int(12) DEFAULT NULL COMMENT 'complaints and comments by customers..(mostly predefined)',
  `lga_id` int(11) DEFAULT NULL,
  `details` varchar(250) DEFAULT NULL,
  `account_no` varchar(20) DEFAULT NULL,
  `bank_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ecrm_cat_id_fk` (`category_id`),
  KEY `ecrm_user_id_fk` (`user_id`),
  KEY `member_id` (`member_id`) USING BTREE,
  KEY `comment_id_fk` (`comment_id`),
  KEY `entry_source_fk` (`entry_source_id`),
  KEY `call_source_fk` (`call_source_id`),
  KEY `product_id_fk` (`product_id`),
  KEY `call_type_id` (`call_type_id`),
  KEY `sla_fk` (`sla_id`),
  KEY `phone_no` (`phone_no`),
  CONSTRAINT `call_source_fk` FOREIGN KEY (`call_source_id`) REFERENCES `hgsf_call_source` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `call_type_fk` FOREIGN KEY (`call_type_id`) REFERENCES `hgsf_call_type` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `category_fk` FOREIGN KEY (`category_id`) REFERENCES `hgsf_category` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `comment_id_fk` FOREIGN KEY (`comment_id`) REFERENCES `hgsf_comment` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `entry_source_fk` FOREIGN KEY (`entry_source_id`) REFERENCES `hgsf_entry_source` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `hgsf_conversations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `hgsf_product` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `sla_fk` FOREIGN KEY (`sla_id`) REFERENCES `hgsf_sla_old` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hgsf_conversations`
--

LOCK TABLES `hgsf_conversations` WRITE;
/*!40000 ALTER TABLE `hgsf_conversations` DISABLE KEYS */;
INSERT INTO `hgsf_conversations` VALUES (1,2202003300163,NULL,'Musa |Ada','08023136857',NULL,NULL,'CBT',NULL,NULL,40,'ok','ok',0,'ok',6,1,2,1,2,'1',NULL,NULL,NULL,0.00,0.00,0.00,2,'2020-03-30 13:39:14',NULL,'2020-03-30 13:39:14',NULL,NULL,0,1,'N',15,277,'ok',NULL,NULL),(3,2202003300169,NULL,'YAYA ABU','08031345555',NULL,NULL,'FURORE',NULL,NULL,30,'AS IS ','OK',0,'',6,2,NULL,1,2,'2',NULL,NULL,NULL,0.00,0.00,0.00,1,'2020-03-30 13:43:42',NULL,'2020-03-30 13:43:42',NULL,NULL,0,1,'N',2,19,'AS IS',NULL,NULL);
/*!40000 ALTER TABLE `hgsf_conversations` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `set_initial_sla` BEFORE INSERT ON `hgsf_conversations` FOR EACH ROW IF (NEW.ticket_status = 'open') 
THEN
SELECT sla_urgency
INTO  @urgency1  from hgsf_comment where hgsf_comment.id = NEW.comment_id;
SELECT hgsf_sla.id, hgsf_sla.duration 
INTO @sla1, @duration1 FROM hgsf_sla 
WHERE hgsf_sla.product_id = NEW.product_id	AND hgsf_sla.category_id = NEW.category_id AND
hgsf_sla.is_fraud = NEW.fraud_status AND hgsf_sla.level = 1 AND hgsf_sla.is_urgent = @urgency1;

SET NEW.sla_id = @sla1,
NEW.sla_due_time = DATE_ADD(NOW(), INTERVAL @duration1 HOUR),
NEW.sla_urgency = @urgency1;
END IF */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `conv_history` BEFORE UPDATE ON `hgsf_conversations` FOR EACH ROW insert into hgsf_conversations_history (
	 `old_id`,  
  `ticket_number`, 
  `ticket_status`, 
  `customer_name`, 
  `phone_no`, 
  `member_id`,
  `entry_category`, 
  `association`,
  `amount_paid`,
  `date_paid`, 
  `comment_id`,
  `other_comment`,
  `cc_agent_response`,
  `fraud_status`,
  `cc_agent_action`, 
  `user_id`, 
  `entry_source_id`,
  `call_type_id`, 
  `call_source_id`,
  `category_id`, 
  `agent_phone_no`, 
  `agent_name`, 
  `payment_medium`,
  `product_id`, 
  `entry_date`, 
  `created_date`,
   cbr_amt_repaid,
   cbr_amt_due,
   cbr_amt_default,
	sla_id,
	sla_due_time,
	sla_urgency,
    sla_level,
	cbflag,
	state_id)
	
select 	
	 `id`,   
  `ticket_number`, 
  `ticket_status`, 
  `customer_name`, 
  `phone_no`, 
  `member_id`,
  `entry_category`, 
  `association`,
  `amount_paid`,
  `date_paid`, 
  `comment_id`,
  `other_comment`,
  `cc_agent_response`,
  `fraud_status`,
  `cc_agent_action`, 
  `user_id`, 
  `entry_source_id`, 
  `call_type_id`,
  `call_source_id`,
  `category_id`, 
  `agent_phone_no`, 
  `agent_name`, 
  `payment_medium`,
  `product_id`, 
  `entry_date`, 
  `created_date`,
  cbr_amt_repaid,
   cbr_amt_due,
   cbr_amt_default,
	sla_id,
	sla_due_time,
	sla_urgency,
    sla_level,
	NEW.cbflag,
    state_id
    
  FROM hgsf_conversations e
  WHERE e.id = new.id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `set_initial_sla2` BEFORE UPDATE ON `hgsf_conversations` FOR EACH ROW IF (NEW.ticket_status = 'open' AND OLD.sla_id IS NULL ) 
   THEN
      SELECT sla_urgency
      INTO  @urgency1  from hgsf_comment where hgsf_comment.id = NEW.comment_id;
      SELECT hgsf_sla.id, hgsf_sla.duration 
      INTO @sla1, @duration1 FROM hgsf_sla 
      WHERE hgsf_sla.product_id = NEW.product_id  AND hgsf_sla.category_id = NEW.category_id AND
      hgsf_sla.is_fraud = NEW.fraud_status AND hgsf_sla.level = 1 AND hgsf_sla.is_urgent = @urgency1;
      
      SET NEW.sla_id = @sla1,
      NEW.sla_due_time = DATE_ADD(NOW(), INTERVAL @duration1 HOUR),
      NEW.sla_urgency = @urgency1;
  END IF */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `hgsf_conversations_history`
--

DROP TABLE IF EXISTS `hgsf_conversations_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hgsf_conversations_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `old_id` int(11) NOT NULL,
  `updated_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ticket_number` bigint(20) DEFAULT NULL COMMENT 'contains number generated from ''generator'' table in format 201806060001(bigint)',
  `ticket_status` varchar(32) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `phone_no` varchar(100) DEFAULT NULL,
  `member_id` varchar(100) DEFAULT NULL,
  `entry_category` varchar(50) DEFAULT NULL COMMENT 'category of information whether it is correct, incomplete call, wrong info by customers..etc',
  `association` varchar(200) DEFAULT NULL,
  `amount_paid` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `date_paid` varchar(100) DEFAULT NULL COMMENT 'date BOI customer claims to have paid',
  `comment_id` int(12) DEFAULT NULL COMMENT 'complaints and comments by customers..(mostly predefined)',
  `other_comment` varchar(2000) DEFAULT NULL,
  `cc_agent_response` varchar(2000) DEFAULT NULL,
  `fraud_status` tinyint(1) DEFAULT NULL,
  `cc_agent_action` varchar(2000) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL COMMENT 'CC Agent ID who created the form',
  `entry_source_id` int(3) DEFAULT NULL COMMENT 'Means of communication used to reach Agents. i.e Call, Sms, Chat…',
  `call_source_id` int(11) DEFAULT NULL,
  `category_id` int(5) DEFAULT NULL COMMENT 'identifier ID for respective forms.  enquiry = 4, fraud = 5, kwikcash = 6, loan reconciliations = 1, dta = 2, aggregator = 3',
  `sub_category` varchar(100) DEFAULT NULL,
  `agent_phone_no` varchar(30) DEFAULT NULL COMMENT 'third party agent phone number',
  `agent_name` varchar(100) DEFAULT NULL COMMENT 'third party Agent name ',
  `payment_medium` varchar(500) DEFAULT NULL COMMENT 'means of payment. Mostly used in fraud',
  `cbr_amt_repaid` decimal(17,2) NOT NULL DEFAULT '0.00',
  `cbr_amt_due` decimal(17,2) NOT NULL DEFAULT '0.00',
  `cbr_amt_default` decimal(17,2) NOT NULL DEFAULT '0.00',
  `product_id` int(3) NOT NULL DEFAULT '1' COMMENT 'This is either marketmoni or tradermoni',
  `entry_date` timestamp NULL DEFAULT NULL COMMENT 'timestamp when the agent logged information',
  `created_date` varchar(100) DEFAULT NULL COMMENT 'actual date customer called to drop information to be logged.',
  `call_type_id` int(3) NOT NULL COMMENT 'Means of communication used to reach Agents. i.e Call, Sms, Chat…',
  `sla_id` int(11) DEFAULT NULL,
  `sla_due_time` timestamp NULL DEFAULT NULL,
  `sla_urgency` tinyint(1) DEFAULT NULL,
  `sla_level` tinyint(2) DEFAULT NULL,
  `cbflag` char(1) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ecrm_cat_id_fk` (`category_id`),
  KEY `ecrm_user_id_fk` (`user_id`),
  KEY `member_id` (`member_id`) USING BTREE,
  KEY `comment_id_fk` (`comment_id`),
  KEY `entry_source_fk` (`entry_source_id`),
  KEY `call_source_fk` (`call_source_id`),
  KEY `product_id_fk` (`product_id`),
  KEY `old_id` (`old_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hgsf_conversations_history`
--

LOCK TABLES `hgsf_conversations_history` WRITE;
/*!40000 ALTER TABLE `hgsf_conversations_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `hgsf_conversations_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hgsf_entry_source`
--

DROP TABLE IF EXISTS `hgsf_entry_source`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hgsf_entry_source` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `source_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hgsf_entry_source`
--

LOCK TABLES `hgsf_entry_source` WRITE;
/*!40000 ALTER TABLE `hgsf_entry_source` DISABLE KEYS */;
INSERT INTO `hgsf_entry_source` VALUES (1,'Phone Call'),(2,'SMS'),(3,'Chat'),(4,'Email'),(5,'Whatsapp');
/*!40000 ALTER TABLE `hgsf_entry_source` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hgsf_lga`
--

DROP TABLE IF EXISTS `hgsf_lga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hgsf_lga` (
  `id` int(11) NOT NULL,
  `lga` varchar(100) DEFAULT NULL,
  `state_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hgsf_lga`
--

LOCK TABLES `hgsf_lga` WRITE;
/*!40000 ALTER TABLE `hgsf_lga` DISABLE KEYS */;
INSERT INTO `hgsf_lga` VALUES (1,'ABA NORTH',1),(2,'ABA SOUTH',1),(3,'AROCHUKWU',1),(4,'BENDE',1),(5,'IKWUANO',1),(6,'ISIALA NGWA NORTH',1),(7,'ISIALA NGWA SOUTH',1),(8,'ISUIKWUATO',1),(9,'OBINGWA',1),(10,'OHAFIA',1),(11,'OSISIOMA',1),(12,'UGWUNAGBO',1),(13,'UKWA EAST',1),(14,'UKWA WEST',1),(15,'UMUAHIA',1),(16,'UMUAHIA SOUTH',1),(17,'UMU-NNEOCHI',1),(18,'DEMSA',2),(19,'FURORE ',2),(20,'GANYE ',2),(21,'GEREI ',2),(22,'GOMBI ',2),(23,'GUYUK ',2),(24,'HONG ',2),(25,'JADA ',2),(26,'LAMURDE ',2),(27,'MADAGALI ',2),(28,'MAIHA ',2),(29,'MAYO-BELWA',2),(30,'MICHIKA ',2),(31,'MUBI NORTH ',2),(32,'MUBI SOUTH ',2),(33,'NUMAN',2),(34,'SHELLENG ',2),(35,'SONG',2),(36,'TUNGO',2),(37,'YOLA NORTH ',2),(38,'YOLA SOUTH ',2),(39,'ABAK',3),(40,'EASTERN OBOLO ',3),(41,'EKET',3),(42,'ESIT EKET (UQUO) ',3),(43,'ESSIEN UDIM ',3),(44,'ETIM EKPO ',3),(45,'ETINAN',3),(46,'IBENO',3),(47,'IBESIKPO/ASUTAN ',3),(48,'IBIONO IBOM ',3),(49,'IKA',3),(50,'IKONO',3),(51,'IKOT ABASI ',3),(52,'IKOT EKPENE ',3),(53,'INI',3),(54,'ITU',3),(55,'MBO',3),(56,'MKPAT ENIN ',3),(57,'NSIT ATAI ',3),(58,'NSIT IBOM ',3),(59,'NSIT UBIUM ',3),(60,'OBOT AKARA ',3),(61,'KOBO',3),(62,'ONNAA',3),(63,'ORON',3),(64,'ORUKANAM',3),(65,'UDUNG UKO ',3),(66,'UKANAFUN',3),(67,'URBAN',3),(68,'URUE OFFONG ORUKO ',3),(69,'UYO',3),(70,'AGUATA',4),(71,'AYAMELUM',4),(72,'ANAMBRA EAST ',4),(73,'ANAMBRA WEST(MBAMILI) ',4),(74,'ANAOCHA',4),(75,'AWKA-NORTH ',4),(76,'AWKA SOUTH ',4),(77,'DUNUKOFIA',4),(78,'EKWUSIGO',4),(79,'IDEMILI NORTH ',4),(80,'IDEMILI SOUTH ',4),(81,'IHIALA',4),(82,'NJIKOKA',4),(83,'NNEWI NORTH ',4),(84,'NNEWI SOUTH ',4),(85,'OGBARU',4),(86,'ONITSHA NORTH ',4),(87,'ONITSHA SOUTH ',4),(88,'ORUMBA NORTH ',4),(89,'ORUMBA SOUTH ',4),(90,'OYI ',4),(91,'ALKALERE',5),(92,'BAUCHI ',5),(93,'BOGORO',5),(94,'DAMBAM',5),(95,'DARAZO',5),(96,'DASS',5),(97,'GAMAWA',5),(98,'GANJUWA',5),(99,'GIADE',5),(100,'ITAS/GADAU ',5),(101,'JAMAâ€™AREâ€™',5),(102,'KATAGUM',5),(103,'KIRFI',5),(104,'MISAU',5),(105,'NINGI',5),(106,'SHIRA',5),(107,'TAFAWA BALEWA ',5),(108,'TORO',5),(109,'WARJI ',5),(110,'ZAKI',5),(111,'BRASS ',6),(112,'EKEREMOR ',6),(113,'KOLOKUMA/OPOKUMA ',6),(114,'NEMBE',6),(115,'OGBIA',6),(116,'SAGBAMA',6),(117,'SOUTHERN IJAW ',6),(118,'YENAGOA',6),(119,'ADO ',7),(120,'AGATU',7),(121,'APA',7),(122,'BURUKU',7),(123,'GBOKO',7),(124,'GUMA',7),(125,'GWER EAST  ',7),(126,'GWER WEST ',7),(127,'KATSINA-ALA ',7),(128,'KONSHISHA',7),(129,'KWANDE',7),(130,'LOGO',7),(131,'MAKURDI',7),(132,'OBI',7),(133,'OGBADIBO',7),(134,'OJU',7),(135,'OHIMINI',7),(136,'OKPOKWU',7),(137,'OTUKPO ',7),(138,'TARKA ',7),(139,'UKUM',7),(140,'USHONGO',7),(141,'VENDEIKYA',7),(142,'ABADAM ',8),(143,'ASKIRA/UBA ',8),(144,'BAMA',8),(145,'BAYO',8),(146,'BIU',8),(147,'CHIBOK ',8),(148,'DAMBOA',8),(149,'DIKWA',8),(150,'GUBIO',8),(151,'GUZAMALA',8),(152,'GWOZA',8),(153,'HAWUL',8),(154,'JERE',8),(155,'KAGA',8),(156,'KALA BALGE ',8),(157,'KONDUGA',8),(158,'KUKAWA',8),(159,'KWAYA KUSAR ',8),(160,'MAFA',8),(161,'MAGUMERI',8),(162,'MAIDUGURI',8),(163,'MARTE',8),(164,'MOBBAR',8),(165,'MONGUNO',8),(166,'NGALA',8),(167,'NGANZAI',8),(168,'SHANI',8),(169,'ABI',9),(170,'AKAMKPA',9),(171,'AKPABUYO',9),(172,'BAKASSI',9),(173,'BEKWARRA',9),(174,'BIASE',9),(175,'BOKI',9),(176,'CALABAR  MUNICIPALITY ',9),(177,'CALABAR SOUTH ',9),(178,'ETUNG',9),(179,'IKOM',9),(180,'OBANLIKU',9),(181,'OBAUBRA',9),(182,'OBUDU',9),(183,'ODUKPANI',9),(184,'OGOJA',9),(185,'YAKURR',9),(186,'YALA',9),(187,'ANIOCHA NORTH ',10),(188,'ANIOCHA SOUTH ',10),(189,'BOMADI',10),(190,'BURUTU',10),(191,'ETHIOPEEAST',10),(192,'ETHIOPEWEST',10),(193,'IKA NORTH-EAST',10),(194,'IKA-SOUTH ',10),(195,'ISOKO-NORTH ',10),(196,'ISOKO-SOUTH',10),(197,'NDOKWA-EAST',10),(198,'NDOKWAWEST',10),(199,'OKPE',10),(200,'OSHIMILINORTH',10),(201,'OSHIMILISOUTH',10),(202,'PATANI',10),(203,'SAPELE',10),(204,'UDU',10),(205,'UGHELLI NORTH ',10),(206,'UGHELLISOUTH',10),(207,'UKWUANI',10),(208,'UVWIE',10),(209,'WARRI-NORTH',10),(210,'WARRI-SOUTH',10),(211,'WARRI-SOUTH WEST',10),(212,'ABAKALIKI',11),(213,'AFIKPO NORTH ',11),(214,'AFIKPO SOUTH ',11),(215,'EBONYI',11),(216,'EZZA NORTH ',11),(217,'EZZA SOUTH ',11),(218,'IKWO',11),(219,'ISHIELU',11),(220,'IVO',11),(221,'IZZI',11),(222,'OHAOZARA',11),(223,'OHAUKWU',11),(224,'ONICHA',11),(225,'AKOKO EDO ',12),(226,'EGOR',12),(227,'ESAN CENTRAL ',12),(228,'ESAN NORTH EAST ',12),(229,'ESSAN SOUTH EAST ',12),(230,'ESAN WEST ',12),(231,'ETSAKO CENTRAL ',12),(232,'ETSAKO EAST ',12),(233,'ETSAKO WEST ',12),(234,'IGUEBEN',12),(235,'IKPOBA/OKHA ',12),(236,'OREDO',12),(237,'ORHIONMWON',12),(238,'OVIA NORTH EAST ',12),(239,'OVIA SOUTH WEST ',12),(240,'OWAN EAST ',12),(241,'OWAN WEST ',12),(242,'UHUNMWODE',12),(243,'ADO EKITI ',13),(244,'EFON',13),(245,'EKITI EAST ',13),(246,'EKITI WEST ',13),(247,'EKITI SOUTH WEST ',13),(248,'EMURE',13),(249,'GBOYIN',13),(250,'IDO/OSI ',13),(251,'IJERO',13),(252,'IKERE',13),(253,'IKOLE',13),(254,'ILEJEMEJE',13),(255,'IREPODU/IFELO DUN ',13),(256,'ISE/ORUN ',13),(257,'MOBA',13),(258,'OYE',13),(259,'ANINRI',14),(260,'AWGU',14),(261,'ENUGU-EAST ',14),(262,'ENUGU-NORTH ',14),(263,'ENUGU-SOUTH ',14),(264,'EZEAGU',14),(265,'IGBO ETITI ',14),(266,'IGBO-EZE NORTH ',14),(267,'IGBO-EZE SOUTH ',14),(268,'ISI-UZO ',14),(269,'NKANU EAST ',14),(270,'NKANU WEST ',14),(271,'NSUKKA',14),(272,'OJI-RIVER ',14),(273,'UDENU',14),(274,'UDI',14),(275,'UZO-UWANI ',14),(276,'ABAJI',15),(277,'BWARI',15),(278,'GWAGWALADA',15),(279,'KUJE',15),(280,'KWALI',15),(281,'MUNICIPAL',15),(282,'AKKO',16),(283,'BALANGA ',16),(284,'BILLIRI ',16),(285,'DUKKU ',16),(286,'FUNAKAYE',16),(287,'GOMBE',16),(288,'KALTUNGO ',16),(289,'KWAMI',16),(290,'NAFADA ',16),(291,'SHONGOM ',16),(292,'YAMALTU/DEBA ',16),(293,'ABOH MBAISE ',17),(294,'AHAIAZU MBAISE ',17),(295,'EHIME MBANO ',17),(296,'EZINIHITTE MBAISE ',17),(297,'IDEATO NORTH ',17),(298,'IDEATO SOUTH ',17),(299,'IHITTE/UBOMA (ISINWEKE) ',17),(300,'IKEDURU (IHO) ',17),(301,'ISIALA MBANO (UMUELEMAI) ',17),(302,'ISU (UMUNDUGBA)',17),(303,'MBAITOLU (NWAORIEUBI)',17),(304,'NGOW OKPALA (UMUNEKE) ',17),(305,'NJABA (NNENASA)',17),(306,'NWANGELE (ONUNWANGELE ) AMAIGBO ',17),(307,'NKWERRE',17),(308,'OBOWO (OTOKO) ',17),(309,'OGUTA (OGUTA) ',17),(310,'OHAJI/EGBEMA (MMAHU EGBEMA) ',17),(311,'OKIGWE (OKIGWE) ',17),(312,'ONUIMO',17),(313,'ORLU',17),(314,'ORSU (AWO IDEMILI) ',17),(315,'ORU-EAST ',17),(316,'ORU-WEST (MGBIDI) ',17),(317,'OWERRI-URBAN (OWERRI) ',17),(318,'OWERRI NORTH (ORIE URATTA) ',17),(319,'OWERRI WEST (UMUGUMA) ',17),(320,'AUYO',18),(321,'BABURA ',18),(322,'BIRNIN-KUDU ',18),(323,'BIRNIWA',18),(324,'BUJI ',18),(325,'DUTSE',18),(326,'GARKI',18),(327,'GAGARAWA',18),(328,'GUMEL',18),(329,'GURI',18),(330,'GWARAM ',18),(331,'GWIWA',18),(332,'HADEJIA',18),(333,'JAHUN',18),(334,'KAFIN-HAUSA ',18),(335,'KAUGAMA',18),(336,'KAZAURE',18),(337,'K/KASAMMA ',18),(338,'KIYAWA',18),(339,'MAIGATARI',18),(340,'M/MADORI ',18),(341,'MIGA',18),(342,'RINGIM',18),(343,'RONI',18),(344,'S/TANKARKAR ',18),(345,'TAURA',18),(346,'YANKWASHI',18),(347,'BIRNIN GWARI ',19),(348,'CHIKUN',19),(349,'GIWA',19),(350,'IGABI',19),(351,'IKARA',19),(352,'JABA',19),(353,'JEMAâ€™Aâ€™',19),(354,'KACHIA',19),(355,'KADUN NORTH ',19),(356,'KADUN SOUTH ',19),(357,'KAGARKO',19),(358,'KAJURU',19),(359,'KAURA',19),(360,'KAURU',19),(361,'KUBAU',19),(362,'KUDAN',19),(363,'LERE',19),(364,'MAKARFI',19),(365,'SABON GARI ',19),(366,'SANGA',19),(367,'SOBA',19),(368,'ZAGON KATAF ',19),(369,'ZARIA',19),(370,'AJINGI ',20),(371,'ALBASU',20),(372,'BAGWAI',20),(373,'BEBEJI',20),(374,'BICHI ',20),(375,'BUNKURE',20),(376,'DALA',20),(377,'DANBATTA',20),(378,'DAWAKIN KUDU ',20),(379,'DAWAKIN TOFA ',20),(380,'DOGUWA',20),(381,'FAGGE',20),(382,'GABASAWA',20),(383,'GARKO',20),(384,'GARUN MALAM ',20),(385,'GAYA',20),(386,'GEZAWA',20),(387,'GWALE',20),(388,'GWARZO',20),(389,'KABO',20),(390,'KANO MUNICIPAL ',20),(391,'KARAYE',20),(392,'KIBIYA',20),(393,'KIRU',20),(394,'KUMBOTSO',20),(395,'KUNCHI',20),(396,'KURA',20),(397,'MAKODA',20),(398,'MINJIBIR',20),(399,'MADOBI',20),(400,'NASARAWA ',20),(401,'RANO',20),(402,'RIMIN GADO ',20),(403,'ROGO',20),(404,'SHANONO',20),(405,'SUMAILA',20),(406,'TAKAI',20),(407,'TARAUNI ',20),(408,'TOFA ',20),(409,'TUDUN WADA ',20),(410,'TSANYAWA ',20),(411,'UNGOGO ',20),(412,'WARAWA ',20),(413,'WUDIL ',20),(414,'BAKORI ',21),(415,'BATAGARAWA ',21),(416,'BATSARI ',21),(417,'BAURE ',21),(418,'BINDAWA ',21),(419,'CHARANCHI ',21),(420,'DANDUME ',21),(421,'DANJA ',21),(422,'DAN MUSA ',21),(423,'DAURA ',21),(424,'DUTSI ',21),(425,'DUTSIN-MA ',21),(426,'FASKARI ',21),(427,'FUNTUA ',21),(428,'INGAWA ',21),(429,'JIBIA ',21),(430,'KAFUR ',21),(431,'KAITA ',21),(432,'KANKARA ',21),(433,'KANKA ',21),(434,'KATSINA ',21),(435,'KURFI ',21),(436,'KUSADA ',21),(437,'MAIâ€™ADUA ',21),(438,'MALUMFASHI ',21),(439,'MANI ',21),(440,'MASHI ',21),(441,'MATAZU ',21),(442,'MUSAWA ',21),(443,'RIMI ',21),(444,'SABUWA ',21),(445,'SAFANA ',21),(446,'SANDAMU ',21),(447,'ZANGO ',21),(448,'ALIERO ',22),(449,'AREWA ',22),(450,'ARGUNGU ',22),(451,'AUGIE ',22),(452,'BAGUDO  ',22),(453,'BIRNIN KEBBI ',22),(454,'BUNZA ',22),(455,'DANDI ',22),(456,'FAKAI ',22),(457,'GWANDU ',22),(458,'JEGA ',22),(459,'KALGO ',22),(460,'KOKO/BESSE ',22),(461,'MAIYAMA ',22),(462,'NGASKI ',22),(463,'SAKABA ',22),(464,'SHANGA ',22),(465,'SURU ',22),(466,'WASAGU/DANKO ',22),(467,'YAURI ',22),(468,'ZURU ',22),(469,'ADAVI ',23),(470,'AJAOKUTA ',23),(471,'ANKPA ',23),(472,'BASSA ',23),(473,'DEKINA ',23),(474,'IBAJI ',23),(475,'IDAH ',23),(476,'IGALA-MELA ',23),(477,'IJUMU ',23),(478,'KABBA/BUNU ',23),(479,'KOGI (KK) ',23),(480,'LOKOJA ',23),(481,'MOPA-MORO ',23),(482,'OFU ',23),(483,'OGORI MAGONGO',23),(484,'OKEHI ',23),(485,'OKEN ',23),(486,'OLAMABORO ',23),(487,'OMALA ',23),(488,'YAGBA EAST ',23),(489,'YAGBA WEST ',23),(490,'ASA',24),(491,'BARUTEN',24),(492,'EDU',24),(493,'EKITI',24),(494,'IFELODUN',24),(495,'ILORIN EAST',24),(496,'ILORIN SOUTH',24),(497,'ILORIN WEST',24),(498,'IREPODUN',24),(499,'ISIN',24),(500,'KALAMA',24),(501,'MORO',24),(502,'OFFA',24),(503,'OKE-ERO',24),(504,'OYUN',24),(505,'PATIGI',24),(506,'AGEGE',25),(507,'AJEROMI/IFELO DUN',25),(508,'ALIMOSHO',25),(509,'AMUWO-ODOFIN',25),(510,'APAPA',25),(511,'BADAGRY',25),(512,'EPE',25),(513,'ETI-OSA',25),(514,'IBEJU/LEKKI',25),(515,'IFAKO-IJAYE',25),(516,'IKEJA',25),(517,'IKORODU',25),(518,'KOSOFE',25),(519,'LAGOS ISLAND',25),(520,'LAGOS MAINLAND',25),(521,'MUSHIN',25),(522,'OJO',25),(523,'OSHODI-ISOLO',25),(524,'SHOMOLU',25),(525,' SURULERE',25),(526,'AKWANGA',26),(527,'AWE',26),(528,'DOMA',26),(529,'KARU',26),(530,'KEANA',26),(531,'KEFFI',26),(532,'KOKONA',26),(533,'LAFIA',26),(534,' NASARAWA',26),(535,'NASARAWA/EGGON',26),(536,' OBI',26),(537,'TOTO',26),(538,'WAMBA',26),(539,'AGAIE',27),(540,'AGWARA',27),(541,'BIDA',27),(542,'BORGU',27),(543,'BOSSO',27),(544,'CHANCHAGA',27),(545,'EDATI',27),(546,'GBAKO',27),(547,'GURARA',27),(548,'KATCHA',27),(549,'KONTAGORA',27),(550,'LAPAI',27),(551,'LAVUN',27),(552,'MAGAMA',27),(553,'MARIGA',27),(554,'MASHEGU',27),(555,'MOKWA',27),(556,'MUNYA',27),(557,'PAIKORO',27),(558,'RAFI',27),(559,'RIJAU',27),(560,'SHIRORO',27),(561,'SULEJA',27),(562,'TAFA',27),(563,'WUSHISHI',27),(564,'ABEOKUTA NORTH',28),(565,'ABEOKUTA SOUTH',28),(566,'ADO-ODO-OTA',28),(567,'EGBADO NORTH',28),(568,'EGBADO SOUTH',28),(569,'EWEKORO',28),(570,'IFO',28),(571,'IJEBU EAST',28),(572,'IJEBU NORTH',28),(573,'IJEBU NORTH EAST',28),(574,'IJEBU ODE',28),(575,'IKENNE',28),(576,'IMEKO/AFON',28),(577,'IPOKIA',28),(578,'OBAFEMI/OWODE',28),(579,'ODEDA',28),(580,'ODOGBOLU',28),(581,'OGUN WATER SIDE',28),(582,'REMO NORTH',28),(583,'SAGAMU',28),(584,'AKOKO NORTH EAST',29),(585,'AKOKO NORTH WEST',29),(586,'AKOKO SOUTH EAST',29),(587,'AKOKO SOUTH WEST',29),(588,'AKURE NORTH',29),(589,'AKURE SOUTH',29),(590,'ESE-ODO',29),(591,'IDANRE',29),(592,'IFEDORE',29),(593,'ILAJE',29),(594,'ILEOLUJI/OKEIGBO',29),(595,'IRELE',29),(596,'ODIGBO',29),(597,'OKITIPUPA',29),(598,'ONDO EAST',29),(599,'ONDO WEST',29),(600,'OSE',29),(601,'OWO',29),(602,'ATAKUMOSA EAST',30),(603,'ATAKUNMOSA WEST',30),(604,'AYEDADE',30),(605,'AYEDIRE',30),(606,'BOLUWA-DURO',30),(607,'BORIPE',30),(608,'EDE NORTH',30),(609,'EDE SOUTH',30),(610,'EGBEDORE',30),(611,'EJIGBO',30),(612,'IFE CENTRAL',30),(613,'IFEDAYO',30),(614,'IFE EAST',30),(615,'IFELODUN',30),(616,'IFE NORTH',30),(617,'IFE SOUTH',30),(618,'ILA',30),(619,'ILESA EAST',30),(620,'ILESA WEST',30),(621,'IREPODUN',30),(622,'IREWOLE',30),(623,'ISOKAN',30),(624,'IWO',30),(625,'OBOKUN',30),(626,'ODO-OTIN',30),(627,'OLA-OLUWA',30),(628,'OLORUNDA',30),(629,'ORIADE',30),(630,'OROLU',30),(631,'OSOGBO',30),(632,'AFIJIO',31),(633,'AKINYELE',31),(634,'ATIBA',31),(635,'ATISBO',31),(636,'EGBEDA',31),(637,'IBADAN NORTH',31),(638,'IBADAN NORTH EAST',31),(639,'IBADAN NORTH WEST',31),(640,'IBADAN SOUTH EAST',31),(641,'IBADAN SOUTH WEST',31),(642,'IBARAPA CENTRAL',31),(643,'IBARAPA EAST',31),(644,'IBARAPA NORTH',31),(645,'IDO',31),(646,'IREPO',31),(647,'ISEYIN',31),(648,'ITESIWAJU',31),(649,'IWAJOWA',31),(650,'KAJOLA',31),(651,'LAGELU',31),(652,'OGBOMOSO NORTH',31),(653,'OGBOMOSO ',31),(654,'OGO-OLUWA',31),(655,'OLORUNSOGO',31),(656,'OLUYOLE',31),(657,'ONA-ARA',31),(658,'OORELOPE',31),(659,'ORIIRE',31),(660,'OYO EAST',31),(661,'OYO WEST',31),(662,'SAKI EAST',31),(663,'SAKI WEST',31),(664,'SURULERE',31),(665,'BARKIN LADI',32),(666,'BASSA',32),(667,'BOKKOS',32),(668,'JOS EAST',32),(669,'JOS NORTH',32),(670,'JOS SOUTH',32),(671,'KANAM',32),(672,'KANKE',32),(673,'LANG-TANG NORTH ',32),(674,'LANG-TANG SOUTH',32),(675,'MANGU',32),(676,'MIKANG',32),(677,'PANKSHIN ',32),(678,'QU AN PAN ',32),(679,'RIYOM',32),(680,'SHENDAM',32),(681,'WASE',32),(682,'ABUA-ODUAL ',33),(683,'AHOADA EAST',33),(684,'AHOADA WEST',33),(685,'AKUKUTORU',33),(686,'ANDONI',33),(687,'ASARI-TORU ',33),(688,'BONNY',33),(689,'DEGEMA',33),(690,'ELEME',33),(691,'EMOHUA ',33),(692,'ETCHE',33),(693,'GOKANA',33),(694,'IKWERRE',33),(695,'KHANA',33),(696,'OBIO/AKPOR ',33),(697,'OGBA/EGBEMA/NDONI',33),(698,'OGU/BOLE',33),(699,'OKIRKA',33),(700,'OMUMA',33),(701,'OPOBO/NKORO ',33),(702,'OYIGBO',33),(703,'PORT HARCOURT',33),(704,'TAI',33),(705,'BENJI',34),(706,'BODINGA ',34),(707,'DANGE/SHUNI ',34),(708,'GADA',34),(709,'GORONYO',34),(710,'GUDU',34),(711,'GWADABAWA ',34),(712,'ILLELA',34),(713,'ISA',34),(714,'KWARE',34),(715,'KEBBE',34),(716,'RABAH',34),(717,'S/BIRNI',34),(718,'SHAGARI',34),(719,'SILAME',34),(720,'SOKOTO NORTH',34),(721,'SOKOTO SOUTH',34),(722,'TAMBUWAL',34),(723,'TANGAZA',34),(724,'TURETA',34),(725,'WAMAKKO',34),(726,'WURNO',34),(727,'YABO',34),(728,'ARDO KOLA ',35),(729,'BALI',35),(730,'DONGA',35),(731,'GASHAKA ',35),(732,'GASSOL',35),(733,'IBI',35),(734,'JALINGO',35),(735,'LAMIDO',35),(736,'KURMI',35),(737,'LAU',35),(738,'SARADAUNA',35),(739,'TAKUM',35),(740,'USSA',35),(741,'WUKARI',35),(742,'YORRO',35),(743,'ZING',35),(744,'BADE',36),(745,'BURSUARI ',36),(746,'DAMATURU ',36),(747,'FIKA ',36),(748,'FUNE',36),(749,'GEIDAM ',36),(750,'GUJBA',36),(751,'GULANI',36),(752,'JAKUSKO',36),(753,'KARASUWA',36),(754,'MACHINA',36),(755,'NANGERE',36),(756,'NGURU',36),(757,'POTISKUM ',36),(758,'TARMUA',36),(759,'Anka',37),(760,'Bakura',37),(761,'BIRNIN MAGAJI',37),(762,'BUKKUYUM',37),(763,'BUNGUDU ',37),(764,'GUMMI ',37),(765,'GUASAU ',37),(766,'KAURA NAMODA',37),(767,'MARADUN',37),(768,'MARU',37),(769,'SHINKAFI ',37),(770,'TALATA MAFARA ',37),(771,'TSAFE ',37),(772,'ZURMI ',37);
/*!40000 ALTER TABLE `hgsf_lga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `hgsf_monthly_statistics`
--

DROP TABLE IF EXISTS `hgsf_monthly_statistics`;
/*!50001 DROP VIEW IF EXISTS `hgsf_monthly_statistics`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `hgsf_monthly_statistics` AS SELECT 
 1 AS `date_format`,
 1 AS `month_year`,
 1 AS `cnt`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `hgsf_product`
--

DROP TABLE IF EXISTS `hgsf_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hgsf_product` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hgsf_product`
--

LOCK TABLES `hgsf_product` WRITE;
/*!40000 ALTER TABLE `hgsf_product` DISABLE KEYS */;
INSERT INTO `hgsf_product` VALUES (1,'Enquiry'),(2,'Complaint');
/*!40000 ALTER TABLE `hgsf_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hgsf_sla`
--

DROP TABLE IF EXISTS `hgsf_sla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hgsf_sla` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(5) DEFAULT NULL,
  `category_id` int(5) DEFAULT NULL,
  `is_fraud` tinyint(1) NOT NULL DEFAULT '0',
  `is_urgent` tinyint(1) NOT NULL DEFAULT '0',
  `duration` int(10) NOT NULL COMMENT 'duration in Hours',
  `user_group` varchar(255) DEFAULT NULL,
  `level` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sla_definer` (`category_id`,`product_id`,`is_fraud`,`is_urgent`,`level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hgsf_sla`
--

LOCK TABLES `hgsf_sla` WRITE;
/*!40000 ALTER TABLE `hgsf_sla` DISABLE KEYS */;
/*!40000 ALTER TABLE `hgsf_sla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hgsf_sla_old`
--

DROP TABLE IF EXISTS `hgsf_sla_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hgsf_sla_old` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(5) DEFAULT NULL,
  `category_id` int(5) DEFAULT NULL,
  `is_fraud` tinyint(1) NOT NULL DEFAULT '0',
  `is_urgent` tinyint(1) NOT NULL DEFAULT '0',
  `duration` int(10) NOT NULL COMMENT 'duration in Hours',
  `user_group` varchar(255) DEFAULT NULL,
  `level` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sla_definer` (`category_id`,`product_id`,`is_fraud`,`is_urgent`,`level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hgsf_sla_old`
--

LOCK TABLES `hgsf_sla_old` WRITE;
/*!40000 ALTER TABLE `hgsf_sla_old` DISABLE KEYS */;
/*!40000 ALTER TABLE `hgsf_sla_old` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hgsf_state_gps`
--

DROP TABLE IF EXISTS `hgsf_state_gps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hgsf_state_gps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(20) DEFAULT NULL,
  `lat` float(10,7) DEFAULT NULL,
  `lng` float(10,7) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `state` (`state_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hgsf_state_gps`
--

LOCK TABLES `hgsf_state_gps` WRITE;
/*!40000 ALTER TABLE `hgsf_state_gps` DISABLE KEYS */;
/*!40000 ALTER TABLE `hgsf_state_gps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hgsf_sub_category`
--

DROP TABLE IF EXISTS `hgsf_sub_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hgsf_sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hgsf_sub_category`
--

LOCK TABLES `hgsf_sub_category` WRITE;
/*!40000 ALTER TABLE `hgsf_sub_category` DISABLE KEYS */;
INSERT INTO `hgsf_sub_category` VALUES (1,'Food & Essential Items'),(2,'Safety & Health'),(3,'Psycho-Social Support'),(4,'Government Support Services'),(5,'Private Sector Support Interventions'),(6,'State Specific Information Services');
/*!40000 ALTER TABLE `hgsf_sub_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mv_boi_loan_recon`
--

DROP TABLE IF EXISTS `mv_boi_loan_recon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mv_boi_loan_recon` (
  `id` int(11) NOT NULL DEFAULT '0',
  `customer_name` varchar(51) CHARACTER SET utf8 DEFAULT NULL,
  `phone_number` bigint(11) DEFAULT NULL,
  `association` varchar(197) CHARACTER SET utf8 DEFAULT NULL,
  `member_id` varchar(21) CHARACTER SET utf8 DEFAULT NULL,
  `state` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `boi_amount` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  `tenure` int(3) DEFAULT NULL,
  `mou_status` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `first_due_date` varchar(17) CHARACTER SET utf8 DEFAULT NULL,
  `amount_due` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `amount_re_paid` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `amount_in_default` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `sub_aggregator` varchar(35) CHARACTER SET utf8 DEFAULT NULL,
  `aggregator` varchar(35) CHARACTER SET utf8 DEFAULT NULL,
  `beneficiary_institution` varchar(21) CHARACTER SET utf8 DEFAULT NULL,
  `nuban` bigint(10) DEFAULT NULL,
  `date_requested` varchar(17) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(27) CHARACTER SET utf8 DEFAULT NULL,
  `reason_for_rejection` varchar(86) CHARACTER SET utf8 DEFAULT NULL,
  `last_change_date` varchar(17) CHARACTER SET utf8 DEFAULT NULL,
  `pending_icu_confirmation_date` varchar(17) CHARACTER SET utf8 DEFAULT NULL,
  `pending_customer_confirmation_date` varchar(17) CHARACTER SET utf8 DEFAULT NULL,
  `pending_f_ire_confirmation_date` varchar(17) CHARACTER SET utf8 DEFAULT NULL,
  `pending_approval_date` varchar(17) CHARACTER SET utf8 DEFAULT NULL,
  `due_for_disbursement_date` varchar(17) CHARACTER SET utf8 DEFAULT NULL,
  `loan_disbursed_successfully_date` varchar(17) CHARACTER SET utf8 DEFAULT NULL,
  `offer_declined_date` varchar(17) CHARACTER SET utf8 DEFAULT NULL,
  `risk_request_denied_date` varchar(17) CHARACTER SET utf8 DEFAULT NULL,
  `request_denied_date` varchar(17) CHARACTER SET utf8 DEFAULT NULL,
  `not_qualified_date` varchar(17) CHARACTER SET utf8 DEFAULT NULL,
  `id_con` int(11) NOT NULL DEFAULT '0',
  `ticket_number` bigint(20) DEFAULT NULL COMMENT 'contains number generated from ''generator'' table in format 201806060001(bigint)',
  `ticket_status` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `phone_number_con` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `entry_category` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'category of information whether it is correct, incomplete call, wrong info by customers..etc',
  `amount` decimal(58,2) DEFAULT NULL,
  `date_paid` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'date BOI customer claims to have paid',
  `comment_id` int(12) DEFAULT NULL COMMENT 'complaints and comments by customers..(mostly predefined)',
  `other_comment` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `cc_agent_response` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `fraud_status` tinyint(1) DEFAULT '0',
  `cc_agent_action` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `cc_agent_name` varchar(201) CHARACTER SET utf8 DEFAULT NULL,
  `source_name` varchar(200) NOT NULL,
  `call_source` varchar(100) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `agent_phone_no` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT 'third party agent phone number',
  `agent_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'third party Agent name ',
  `payment_medium` varchar(3000) CHARACTER SET utf8 DEFAULT NULL COMMENT 'means of payment. Mostly used in fraud',
  `product_name` varchar(50) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'timestamp when the agent logged information',
  `created_date` datetime DEFAULT NULL COMMENT 'actual date customer called to drop information to be logged.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mv_boi_loan_recon`
--

LOCK TABLES `mv_boi_loan_recon` WRITE;
/*!40000 ALTER TABLE `mv_boi_loan_recon` DISABLE KEYS */;
/*!40000 ALTER TABLE `mv_boi_loan_recon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mv_boi_recent_convo`
--

DROP TABLE IF EXISTS `mv_boi_recent_convo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mv_boi_recent_convo` (
  `id` int(11) NOT NULL DEFAULT '0',
  `ticket_number` bigint(20) DEFAULT NULL COMMENT 'contains number generated from ''generator'' table in format 201806060001(bigint)',
  `ticket_status` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `customer_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `phone_no` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `member_id` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `entry_category` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'category of information whether it is correct, incomplete call, wrong info by customers..etc',
  `association` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `amount` decimal(58,2) DEFAULT NULL,
  `date_paid` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'date BOI customer claims to have paid',
  `comment_id` int(12) DEFAULT NULL COMMENT 'complaints and comments by customers..(mostly predefined)',
  `other_comment` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `cc_agent_response` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `fraud_status` tinyint(1) DEFAULT '0',
  `cc_agent_action` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `cc_agent_name` varchar(201) CHARACTER SET utf8 DEFAULT NULL,
  `source_name` varchar(200) NOT NULL,
  `call_source` varchar(100) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `agent_phone_no` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT 'third party agent phone number',
  `agent_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'third party Agent name ',
  `payment_medium` varchar(3000) CHARACTER SET utf8 DEFAULT NULL COMMENT 'means of payment. Mostly used in fraud',
  `product_name` varchar(50) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'timestamp when the agent logged information',
  `created_date` datetime DEFAULT NULL COMMENT 'actual date customer called to drop information to be logged.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mv_boi_recent_convo`
--

LOCK TABLES `mv_boi_recent_convo` WRITE;
/*!40000 ALTER TABLE `mv_boi_recent_convo` DISABLE KEYS */;
/*!40000 ALTER TABLE `mv_boi_recent_convo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `state` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (1,'Abia State'),(2,'Adamawa State'),(3,'Akwa Ibom State'),(4,'Anambra State'),(5,'Bauchi State'),(6,'Bayelsa State'),(7,'Benue State'),(8,'Borno State'),(9,'Cross River State'),(10,'Delta State'),(11,'Ebonyi State'),(12,'Edo State'),(13,'Ekiti State'),(14,'Enugu State'),(15,'Federal Capital Territory'),(16,'Gombe State'),(17,'Imo State'),(18,'Jigawa State'),(19,'Kaduna State'),(20,'Kano State'),(21,'Katsina State'),(22,'Kebbi State'),(23,'Kogi State'),(24,'Kwara State'),(25,'Lagos State'),(26,'Nasarawa State'),(27,'Niger State'),(28,'Ogun State'),(29,'Ondo State'),(30,'Osun State'),(31,'Oyo State'),(32,'Plateau State'),(33,'Rivers State'),(34,'Sokoto State'),(35,'Taraba State'),(36,'Yobe State'),(37,'Zamfara State');
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `full_name` varchar(300) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `superadmin` smallint(6) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(15) DEFAULT NULL,
  `bind_to_ip` varchar(255) DEFAULT NULL,
  `email_confirmed` smallint(1) NOT NULL DEFAULT '0',
  `email` varchar(150) DEFAULT NULL,
  `username_old` varchar(255) DEFAULT '',
  `login_status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'superadmin@hgsfglobal.org',NULL,'Admina','Admina','kz2px152FAWlkHbkZoCiXgBAd-S8SSjF','$2y$13$MhlYe12xkGFnSeK0sO2up.Y9kAD9Ct6JS1i9VLP7YAqd1dFsSylz2',NULL,1,1,1426062188,1565167463,NULL,'',0,'',NULL,1),(3,'awya@ebis.com.ng','Andrew Wya','Andrew','Wya','7d2-Yvm2KHQ4XK3HhAJ6c1U6C4Z9sEpT','$2y$13$BqVGcoX1BCBQzcxJgOW54.VlA8XALdLhtscLKueQS68elr06QgNY.',NULL,1,1,1528799466,0,NULL,NULL,0,'awya@ebis.com.ng','Andrew_Wya',2),(4,'demouser@hgsfglobal.org',NULL,'HgsfUser','HgsfUser','kKQsBkTKcTTnhCY7WXzI4F2L3fFI-hUl','$2y$13$aYIfLg7SF7Qn.JCdEU8eBOOsrysfjvFNn5w0jERUbBLMlTBBLx2LK',NULL,1,0,1565167351,1565167351,'::1','',0,'','',2),(5,'supervisor@hgsfglobal.org',NULL,'Supervisor','Supervisor','M9E68jagOsPfLAIo26sjcB2OdY0b_ukg','$2y$13$.xD0QuJzhTeh6NVMHnNnuul0aPuFFRARg13iGsQDQYAHSXCFoFA6W',NULL,1,0,1565167413,1574416996,'::1','',0,'','',1),(6,'admin','Administrator','Administrator','Administrator','qCG8-xJZbrA55PjLkTK3OgRM4pLMPmlD','$2y$13$TBwBe3o3AIf.4Tlz65Jr6.WbFWtweeDmVTBFaNyitlvj.u9dMiuWO','CVGmvBLySS4FUgdQ2PZpzjdS6aXyHOgo_1528754201',1,1,1528799300,1548930166,NULL,'',1,'admin','admin',2),(7,'rsalami@ebis.com.ng',NULL,'Olarotimi','Salami','AD-WdfLyRPcYoAhnXPmB-tBBQbskaOYF','$2y$13$V4.TnDr6Wmvd2ypv2ap3SeOW34meT.2G2v9C9.MrMa64JFEBU5v6a',NULL,1,0,1568631660,1568631826,'192.168.30.54','',1,'rsalami@ebis.com.ng','',NULL),(11,'user1',NULL,'user1','user1','K5iIME5xcXM7sdONRvDc52tZbmZyy_OM','$2y$13$PL0vxuCx0mEJl790LX9jruXdEXPsn3E6hMBY9PyIlLNn1oVahbgRq',NULL,1,1,1585567665,1597850204,'105.112.182.62','',1,'user1@user.com','',1),(13,'aishadigil',NULL,'Aisha','Digil','WQa5mS-k78LppnMxhpalTwXoJXC44-9N','$2y$13$UVJzG.qluTv2nJC2Vc5sK.uK4qHh.jAH50/g8Rf.SwRpO.1d.cYyy',NULL,1,0,1585592774,1585592813,'197.210.71.148','',1,'isha212us@yahoo.com','',2),(15,'ibrahim.h.suleiman@gmail.com',NULL,'Ibrahim','Suleiman','ysrrh_Qcx5FXvEhU0Zvoiy0w-6MvVfnG','$2y$13$sj/sZC4oNdtI3uA26H1Aou9BlVG06KTXKJ5e42OzPdj0tmVPNeUoq',NULL,1,0,1585592923,1585592923,'197.210.70.66','',1,'ibrahim.h.suleiman@gmail.com','',NULL),(17,'shabagast',NULL,'Alik','Gelayev','TOw6jwdGaTf2myMt_GKR9jeHqnShXZYR','$2y$13$YLiJDAshCrpXYppaT/EQZetxsLeahndATWaYU3ESt1.apknkou2m2',NULL,1,0,1585593594,1585593594,'197.210.71.0','',1,'alexajiduku@gmail.com','',1),(33,'johndoe',NULL,'john','doe','zPaYRXSnjY3aP_vPnqYOtiyTf-riheMr','$2y$13$uAClEqmm3zQPFNTQzcPqbO6SoH.bcq8JBcE/WS1w8fTgdTwWohhta',NULL,1,0,1585932083,1585932083,'105.112.50.70','',0,'psource112@gmail.com','',NULL),(35,'olamideadebayo2001@gmail.com',NULL,'Olamide','adebayo','OxdITQK82iFJRBN1HhkABmaB-_fNPcwE','$2y$13$O0A82ZTZVAAA/ES3NMxvVe4cP8HA5j638TF/rYndA0jNNTfb2yVj2',NULL,1,0,1586616902,1586942471,'197.210.45.108','',1,'olamideadebayo2001@gmail.com','',2),(37,'abdulsalamsalla@gmail.com',NULL,'Abdullsalam','Sallau','yqjmSAWNGEMj9jx445N36lrsATYaa7hu','$2y$13$b02idAItb6gKZox78G6o/ehwG96gRjR3zLONfWFuk1Zl1kUGxwOae',NULL,1,0,1586894806,1586894806,'105.112.70.140','',1,'abdulsalamsalla@gmail.com','',NULL),(39,'gracefillachadu9@gmail.com',NULL,'Gracefill','Achadu','wNZ4XZ_mqf4MsNukocuhMDKyVaUnA1vK','$2y$13$vXTmJ2TyOXmWWWA4M14.n.lDcp06KlaesLL2bpKRmKuu/IQQJ3E96',NULL,1,0,1586894955,1586894955,'105.112.70.140','',1,'gracefillachadu9@gmail.com','',NULL),(41,'oyedoyin01@gmail.com',NULL,'Mansurah','Oyeleke','wdpOtfInTJ3uVppG4aIzJ2tRaz3pF3i0','$2y$13$gxqjgEO8SHo0D.lW1NaDEuRicmQn29SdQQjZTloo6.2rvx4HBiE3u',NULL,1,0,1586895106,1586895106,'105.112.70.140','',1,'oyedoyin01@gmail.com','',1),(43,'saidu_maimuna@yahoo.com',NULL,'Maimuna','Saidu','Ii4vQiUH4TLOdhECDdeINglhAPdHAgHh','$2y$13$4Xd/b4JvBDIHsV7D4BhVJOE1Va1c.3amF3ZZY7nFrej99Q63m/Vgm',NULL,1,0,1586895326,1586895326,'105.112.70.140','',1,'saidu_maimuna@yahoo.com','',NULL),(45,'ojaynpower@gmail.com',NULL,'Obinna','John','QoXBH3JWhokcSzGFZat1WP7fgEVw5CO7','$2y$13$qR/R9Cm.vYzJ9/6SX05UBeXpHn/t7o4ti3oestk3SCXcaD9xpNsMu',NULL,1,0,1586895499,1586895499,'105.112.70.140','',1,'ojaynpower@gmail.com','',NULL),(47,'idunublessing@gmail.com',NULL,'Blessing','Ndace','Lnv8oiYg1aAWTnqeKqG1U7py4KkkbgJP','$2y$13$/3nLIS3qfWNKDOBVcu5kuO0//1ecqqW08g271E0EstCQfskPtgD/2',NULL,1,0,1586895624,1586895624,'105.112.70.140','',1,'idunublessing@gmail.com','',1),(49,'mailabariibome2016@gmail.com',NULL,'Ibome','Malabari','ZACElSXC8lGnVrPL0bzZH85DoWn3SW9h','$2y$13$aS5GzPq3G3gmqgymO5wSu.QvI4PE0EKHt0icYZT4OuOAEMY0iZS7.',NULL,1,0,1586895727,1586895727,'105.112.70.140','',1,'mailabariibome2016@gmail.com','',1),(51,'folakemi16@gmail.com',NULL,'Folakemi','Aduloju','2T668NTcS2_PrE0K1qVLYebMGMDWKfUR','$2y$13$AoBR65pIIVwKFJC/VG0syOuy1XuObwZGklU0qB6j3klpDRH3j8NfG',NULL,1,0,1586895887,1586895887,'105.112.70.140','',1,'folakemi16@gmail.com','',2),(53,'obiobiora492@gmail.com',NULL,'Obi','Obiora','_TMvKJ8YqAzeMfuNA0mu82WcXKcaXmcW','$2y$13$ldcbUKjCLe4thj.forbJceq1Klsajf/1im2lADLDT13lWuAogWscq',NULL,1,0,1586896079,1586896079,'105.112.70.140','',1,'obiobiora492@gmail.com','',NULL),(55,'babayemitemitopedebora@gmail.com',NULL,'Deborah','Babayemi','b2hJYwIr2HIn0ycas4EdxHiyMK7GTTcQ','$2y$13$BxUPS8otBLp/nT9n5DDnR./CehFHVDo2ddFqAPktleLjb/gtxKEMC',NULL,1,0,1586896168,1586896168,'105.112.70.140','',1,'babayemitemitopedebora@gmail.com','',NULL),(57,'racheallade16@gmail.com',NULL,'Rachael','Abioye','UKhLe1zMr6cXi9O-ekD5uUEhBRYLOHVn','$2y$13$lx6XmRLFebNO/uJMIaR3KueD9hMgMINlOxfI9k5GdA01WRJo1kmG.',NULL,1,0,1586896286,1586896286,'105.112.70.140','',1,'racheallade16@gmail.com','',2),(59,'victoriajeremiah40@yahoo.com',NULL,'Victoria','Ameh','axGqeL92US0N3fi2JZ2KFwisxbKHpIz9','$2y$13$obkqMP6qGesaxzvw6apGGeKplbuN2tuu8HJm7dtYgWifz5YR.IZ/a',NULL,1,0,1586896446,1587045087,'105.112.70.140','',1,'victoriajeremiah40@yahoo.com','',1),(61,'ikechukwu.p.n@gmail.com',NULL,'Ikechukwu','Nwanyanwu','oESaUnCANkDfVSRPmT6ZaBkNgCix51UU','$2y$13$GCj1/C7m4aB.ErvIaJ21TuuF71FY4Acf6V6bD6qy5v7QwbNT6/5ke',NULL,1,0,1586896542,1586896542,'105.112.70.140','',1,'ikechukwu.p.n@gmail.com','',1),(63,'zeezealoji@yahoo.com',NULL,'Phoebe','Orji','qrlTu9AXPzONssom1TvBGpS-0vKRB5ob','$2y$13$S2hzeTFdLS./o4lFx.Q.cezVDeGfonIuRec38GaURnGlVdAHLR4ly',NULL,1,0,1586896629,1586896629,'105.112.70.140','',1,'zeezealoji@yahoo.com','',1),(65,'danbabamaryann@gmail.com',NULL,'Maryann','Danbaba','TuVyFQJOxriysq_m2hgtLhWNouKmnCeg','$2y$13$dMI7zPLLMEq6SZfQKZraVeRRNKrPQ0.TZQOHWkrT6eiou/8I1DnMu',NULL,1,0,1586896717,1586896717,'105.112.70.140','',1,'danbabamaryann@gmail.com','',NULL),(67,'iamprincechukwu@gmail.com',NULL,'Prince','Chukwu','63pnG6BcL0FYyMLXOHCcdbdiNVoymVmd','$2y$13$NfQgtXC6n4YKeamx5UpfN.p20E6PhQvpwv8A5J5adTHc2Th4kI7oS',NULL,1,0,1586896831,1587041435,'105.112.70.140','',1,'iamprincechukwu@gmail.com','',1),(69,'azukamara88@gmail.com',NULL,'Amara','Azuka','2S2rcP0cR155y1bL-pclyLcgKBKNwSXZ','$2y$13$QXBH68cHtACq11quVtVTxufD5yjiX8TcU0i9y61UZ.D6ApS5TGf8u',NULL,1,0,1586896935,1586896935,'105.112.70.140','',1,'azukamara88@gmail.com','',NULL),(71,'sadaabba00782@gmail.com',NULL,'Sadiq','Abba','wBIOQ0L0lUp_jvxrhHIwLzN5aBfG2Ycu','$2y$13$OCN4CpNScnzTNOKyyef25.jOOvLQlydbtRY3Cc9kyqQLEKPeoz7O.',NULL,1,0,1586897019,1586897019,'105.112.70.140','',1,'sadaabba00782@gmail.com','',NULL),(73,'esandraswt@gmail.com',NULL,'Sandra','Egbuniwe','3Dh-P6Hfuvbf5wSDWor7jYYfEt--J83p','$2y$13$bJiWl65tnQHh2r1Ut4TXPuLclrLOlAarm/jU5pAouQMDHUoMn9ikG',NULL,1,0,1586897126,1586897126,'105.112.70.140','',1,'esandraswt@gmail.com','',NULL),(75,'harrifoxy@gmail.com',NULL,'Harri','Alhassam','BmLR-j2TGs-lF_ZD_NfqLDmAhf0WbRei','$2y$13$VAqOeSw.eXgWvVmWszdKSuv7mkQbxhFm.H/Zf0cbtHJKEEltKpdoK',NULL,1,0,1586897229,1586897229,'105.112.70.140','',1,'harrifoxy@gmail.com','',NULL),(77,'sucretomz@gmail.com',NULL,'Femi','Oloyede','AvGRPddE-NM0QjCIZrpn_55O2Dgn4ZFP','$2y$13$xalat.BAUrCKOiCtqelDCup13LQlNOpr42DrhALTG4PmJU0GzM7KG',NULL,1,0,1586897331,1586897331,'105.112.70.140','',1,'sucretomz@gmail.com','',NULL),(79,'jessiaca-akagha@yahoo.com',NULL,'Jessica','Akagha','NojwA4n2JuasZk02WHUCG83_7hwuatd9','$2y$13$NeIH.vAfEi0HzEiCtieW8OzJzbo6Tpw6VChny5hZvOV6GWj4KizsG',NULL,1,0,1586897417,1586897417,'105.112.70.140','',1,'jessiaca-akagha@yahoo.com','',NULL),(81,'umarugrin1128@gmail.com',NULL,'Umar','Usman','5HXFR0QmVHHTJjL3izuCFzTpG9wfQRYB','$2y$13$xWwHasK7qQSVq69GuhQeEOXs5S.VYFHGhStRmn/uAGflB50e9xJuS',NULL,1,0,1586897495,1586897495,'105.112.70.140','',1,'umarugrin1128@gmail.com','',NULL),(83,'chairbuad2010@gmail.com',NULL,'Aliyu','Mahmud','H1zw9IvXEbC9zYGNNZOTA4AkM2i82agf','$2y$13$gBkz/4DXLVG3.a0KHHVA6O2fN8SfqC0AWd73rRt8q4tXg4vz25Vf.',NULL,1,0,1586897586,1586897586,'105.112.70.140','',1,'chairbuad2010@gmail.com','',NULL),(85,'estheretim31@gmail.com',NULL,'Esther','Etim','o7YYNMuC8k2gcoNYMiuuGhnaIydTgNHR','$2y$13$DooiOfQPc7CD0qAaOlMP6OkeRiNPSTNUk7N2UGyoIMLw0la8UPhhm',NULL,1,0,1586897662,1587045876,'105.112.70.140','',1,'estheretim31@gmail.com','',1),(87,'vtarbunde@gmail.com',NULL,'Valerie','Tarbunde','1Oc3C6NOhYlXUlGsyIA3dqbLHikxnZRi','$2y$13$JFVQh2CVwOvaJbbuLMC0c..yxOpU66F9XqqHgZxkODveN.yxyfwGm',NULL,1,0,1586897756,1586897756,'105.112.70.140','',1,'vtarbunde@gmail.com','',NULL),(89,'medinaojochideali25@gmail.com',NULL,'Medina','Ali','spUiBHJfe1NoQ5Hj7hB63MJyD6EzptbG','$2y$13$1qY42MmwDTWpMbUBRq//5OHNTsKPqFoAcYV6Fv.TFk31R0jBDbUUe',NULL,1,0,1586897888,1586897888,'105.112.70.140','',1,'medinaojochideali25@gmail.com','',NULL),(91,'adeleke.o.becky@gmail.com',NULL,'Omolola','','zkXumcWHBNG2U8s3jfYlE7Z63XzctOxL','$2y$13$90RejLtEq9eQI7E08C/fRezD0kkspiHZFY0dVYHknoB0IZVfLahru',NULL,1,0,1586898026,1586898026,'105.112.70.140','',1,'adeleke.o.becky@gmail.com','',NULL),(93,'stewilliams2001@gmail.com',NULL,'Stephanie','Bosah','ZoJOyYN3QSqxP84fAnZaj1rI779y7BBE','$2y$13$hj1s9KXjpFAuSI4JFaV7IuxqTqXVRLBqtLFxfM6F97g5fRD0QxMKC',NULL,1,0,1586898107,1586898107,'105.112.70.140','',1,'stewilliams2001@gmail.com','',1),(95,'abbaarre@gmail.com',NULL,'Deborah','Gabriel','Wq5mEkNMu-cG3U6fPp9ZlyNDQmYgOVea','$2y$13$C1kdHQC8pgr3M9CXGP6uZOuute17lQ96oT2InYaKNL5BQmVS1b5hG',NULL,1,0,1586898246,1586898246,'105.112.70.140','',1,'abbaarre@gmail.com','',1),(97,'nkechionwuelingo@gmail.com',NULL,'Nkechi','Onwuelingo','Fbn2mYZZ-DzY8rsH4htukqcVplhNu9Ra','$2y$13$1GMW9o9Nm3akETOgTx5.SOff2nlsqO8fhyZKjJ6O7Y3cfXaIsCNdy',NULL,1,0,1586898368,1586898368,'105.112.70.140','',1,'nkechionwuelingo@gmail.com','',1),(99,'chukwunarub@gmail.com',NULL,'Blessing','Chukwunaru','b3FDVsilAeOgIw-WMu5gEDHRVHYV86ah','$2y$13$1HjSlfxXCEED5Wa20OBTsuMmBIqkLGkWZD0xEZBIXitgUsbgAKpFC',NULL,1,0,1586898484,1586898484,'105.112.70.140','',1,'chukwunarub@gmail.com','',1),(101,'morganbetty4real@yahoo.com',NULL,'Betty','Morgan','aJ8WdU5VyTsZS5aCPA-2eMsVuWGRQZjm','$2y$13$dkPISEpYD.1COBfmX..wjuljwZbitfQCbOh49Q/z50yNPUqHrXjF6',NULL,1,0,1586898593,1586898593,'105.112.70.140','',1,'morganbetty4real@yahoo.com','',1),(103,'patienceogoh14@gmail.com',NULL,'Ajuma','Ojoh','TCwBnfXpi1txQ0tPgpYa_8sgcO-HQQMd','$2y$13$VVTHY900dcvO91wFNjkqpuHDG2Z01w6lCrexpQzOuNXp1g5RMODfa',NULL,1,0,1586898712,1586898712,'105.112.70.140','',1,'patienceogoh14@gmail.com','',1),(105,'barbaraeffiong14@gmail.com',NULL,'Barbara','Effiong','rEbt9KmaigSgYin1CKGfMCqAILXJ3OIP','$2y$13$Wluoym.EZMG3x02XZiGqGOx0zvNwc4CDeFiqGioOrEYEDcs9z1tGK',NULL,1,0,1586898952,1586898952,'105.112.70.140','',1,'barbaraeffiong14@gmail.com','',NULL),(107,'m4mubarak12@gmail.com',NULL,'Mubarak','Mahmood','Eg27N-N920gdbWWTqtQrWkxghiKFAmZq','$2y$13$WWWy5ykCW0qBqZm1fEk0V.V9tayJ9tJyFxGmivFFF6fZ/tePyQeky',NULL,1,0,1586899028,1586899028,'105.112.70.140','',1,'m4mubarak12@gmail.com','',1),(109,'aondonaveve@gmail.com',NULL,'Alfred','Aveve','3jfySmRI6Ojw3ybXdyAmxbWmXM7rkv6r','$2y$13$jeel.jGCsErwPhxioGvDf.FLSPwxx9nN/w6Jxipr.Nge9eyZpwXHi',NULL,1,0,1586899141,1586899141,'105.112.70.140','',1,'aondonaveve@gmail.com','',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_visit_log`
--

DROP TABLE IF EXISTS `user_visit_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_visit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `language` char(2) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `visit_time` int(11) NOT NULL,
  `svisit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` int(1) DEFAULT NULL,
  `browser` varchar(30) DEFAULT NULL,
  `os` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_visit_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_visit_log`
--

LOCK TABLES `user_visit_log` WRITE;
/*!40000 ALTER TABLE `user_visit_log` DISABLE KEYS */;
INSERT INTO `user_visit_log` VALUES (1,'5e81e39c5bb82','105.112.182.62','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',11,1585570716,'2020-03-30 12:18:36',NULL,'Chrome','mac'),(3,'5e81ed49b540c','197.210.70.30','en','Mozilla/5.0 (Linux; Android 8.1.0; TECNO CF8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Mobile Safari/537.36',11,1585573193,'2020-03-30 12:59:53',NULL,'Chrome','Android'),(5,'5e81ee3a001f9','197.210.44.142','en','Mozilla/5.0 (Linux; Android 9; SAMSUNG SM-J415F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/10.2 Chrome/71.0.3578.99 Mobile Safari/537.36',6,1585573433,'2020-03-30 13:03:54',NULL,'Chrome','Android'),(7,'5e81f563bbe61','197.156.228.108','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.5 Safari/605.1.15',6,1585575267,'2020-03-30 13:34:27',NULL,'Safari','mac'),(9,'5e81fe801769b','197.210.70.30','en','Mozilla/5.0 (Linux; Android 8.1.0; TECNO CF8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Mobile Safari/537.36',11,1585577600,'2020-03-30 14:13:20',NULL,'Chrome','Android'),(11,'5e8239590a9a8','197.210.71.170','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36',11,1585592665,'2020-03-30 18:24:25',NULL,'Chrome','mac'),(13,'5e823c86789bf','197.210.44.142','en','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',6,1585593478,'2020-03-30 18:37:58',NULL,'Chrome','Linux'),(15,'5e824be176da8','197.210.71.114','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36',13,1585597409,'2020-03-30 19:43:29',NULL,'Chrome','mac'),(17,'5e824befd9c6c','197.210.71.14','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36',13,1585597423,'2020-03-30 19:43:43',NULL,'Chrome','mac'),(19,'5e824bf43adac','41.190.14.154','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.5 Mobile/15E148 Safari/604.1',13,1585597428,'2020-03-30 19:43:48',NULL,'iPhone','iPhone'),(21,'5e824bf9b138f','197.210.71.0','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36',13,1585597433,'2020-03-30 19:43:53',NULL,'Chrome','mac'),(23,'5e824c8cb610a','197.210.71.80','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36',13,1585597580,'2020-03-30 19:46:20',NULL,'Chrome','mac'),(25,'5e824ca4d0020','197.210.71.0','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36',17,1585597604,'2020-03-30 19:46:44',NULL,'Chrome','mac'),(27,'5e824e0fd0ced','197.210.71.52','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36',13,1585597967,'2020-03-30 19:52:47',NULL,'Chrome','mac'),(29,'5e824e125e1a9','105.112.70.254','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.5 Mobile/15E148 Safari/604.1',13,1585597970,'2020-03-30 19:52:50',NULL,'iPhone','iPhone'),(31,'5e824e131d5c8','105.112.70.254','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.5 Mobile/15E148 Safari/604.1',13,1585597971,'2020-03-30 19:52:51',NULL,'iPhone','iPhone'),(33,'5e824e239e52a','197.210.71.204','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36',11,1585597987,'2020-03-30 19:53:07',NULL,'Chrome','mac'),(35,'5e824e6e4614f','41.190.14.154','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.5 Mobile/15E148 Safari/604.1',11,1585598062,'2020-03-30 19:54:22',NULL,'iPhone','iPhone'),(37,'5e824e76d10ba','105.112.70.254','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.5 Mobile/15E148 Safari/604.1',11,1585598070,'2020-03-30 19:54:30',NULL,'iPhone','iPhone'),(39,'5e824e8a59534','197.210.71.188','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36',13,1585598090,'2020-03-30 19:54:50',NULL,'Chrome','mac'),(41,'5e824e900f5c9','197.210.71.216','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36',11,1585598096,'2020-03-30 19:54:56',NULL,'Chrome','mac'),(43,'5e8253450ce83','102.89.2.211','en','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',6,1585599301,'2020-03-30 20:15:01',NULL,'Chrome','Linux'),(45,'5e825aeac6185','102.89.1.210','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',13,1585601258,'2020-03-30 20:47:38',NULL,'Chrome','mac'),(47,'5e825b78c8e9b','102.89.1.210','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1 Safari/605.1.15',13,1585601400,'2020-03-30 20:50:00',NULL,'Safari','mac'),(49,'5e825bef87f1a','102.89.3.17','en','Mozilla/5.0 (Linux; Android 9; SM-J415F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Mobile Safari/537.36',5,1585601519,'2020-03-30 20:51:59',NULL,'Chrome','Android'),(51,'5e825de1315fc','102.89.1.210','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',11,1585602017,'2020-03-30 21:00:17',NULL,'Chrome','mac'),(53,'5e826296960f0','102.89.1.140','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1 Safari/605.1.15',13,1585603222,'2020-03-30 21:20:22',NULL,'Safari','mac'),(55,'5e82662520b36','102.89.1.140','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1 Safari/605.1.15',NULL,1585604133,'2020-03-30 21:35:33',NULL,'Safari','mac'),(57,'5e826b732a0f9','102.89.0.138','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1 Safari/605.1.15',NULL,1585605491,'2020-03-30 21:58:11',NULL,'Safari','mac'),(59,'5e826f0d8e5b4','102.89.0.138','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1 Safari/605.1.15',NULL,1585606413,'2020-03-30 22:13:33',NULL,'Safari','mac'),(61,'5e826fa42a8af','102.89.0.138','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1 Safari/605.1.15',NULL,1585606564,'2020-03-30 22:16:04',NULL,'Safari','mac'),(63,'5e826fdbe0eb5','102.89.0.138','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',11,1585606619,'2020-03-30 22:16:59',NULL,'Chrome','mac'),(65,'5e8270714f8e4','102.89.1.140','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1 Safari/605.1.15',NULL,1585606769,'2020-03-30 22:19:29',NULL,'Safari','mac'),(67,'5e82716cae28d','102.89.0.138','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1 Safari/605.1.15',27,1585607020,'2020-03-30 22:23:40',NULL,'Safari','mac'),(69,'5e827638ccc69','102.89.1.210','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1 Safari/605.1.15',13,1585608248,'2020-03-30 22:44:08',NULL,'Safari','mac'),(71,'5e827a40a28d0','102.89.1.140','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',11,1585609280,'2020-03-30 23:01:20',NULL,'Chrome','mac'),(73,'5e82de075fb9e','197.210.65.108','en','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36',5,1585634823,'2020-03-31 06:07:03',NULL,'Chrome','Linux'),(75,'5e82deb61acff','197.210.64.64','en','Mozilla/5.0 (Linux; Android 9; SM-J415F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Mobile Safari/537.36',5,1585634998,'2020-03-31 06:09:58',NULL,'Chrome','Android'),(77,'5e82e194f3bf8','197.210.47.60','en','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:73.0) Gecko/20100101 Firefox/73.0',6,1585635732,'2020-03-31 06:22:12',NULL,'Firefox','Linux'),(79,'5e82f5a41b16e','154.73.11.81','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',6,1585640868,'2020-03-31 07:47:48',NULL,'Chrome','mac'),(81,'5e82f5a4389e6','154.73.11.81','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',6,1585640868,'2020-03-31 07:47:48',NULL,'Chrome','mac'),(83,'5e832a6e72fda','197.210.47.132','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',11,1585654382,'2020-03-31 11:33:02',NULL,'Chrome','mac'),(85,'5e859c9f46072','197.210.85.26','en','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',11,1585814687,'2020-04-02 08:04:47',NULL,'Chrome','Windows'),(87,'5e859f789fd49','197.159.70.174','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36',11,1585815416,'2020-04-02 08:16:56',NULL,'Chrome','mac'),(89,'5e85bb1427d5c','197.210.52.59','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36',11,1585822484,'2020-04-02 10:14:44',NULL,'Chrome','mac'),(91,'5e86064b0f2a7','197.210.70.89','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36',11,1585841739,'2020-04-02 15:35:39',NULL,'Chrome','mac'),(93,'5e87495773352','197.159.70.174','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36',11,1585924439,'2020-04-03 14:33:59',NULL,'Chrome','mac'),(95,'5e87565a9c3a6','197.211.61.119','en','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',11,1585927770,'2020-04-03 15:29:30',NULL,'Chrome','Windows'),(97,'5e8764ec5207f','197.210.44.171','en','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36',6,1585931500,'2020-04-03 16:31:40',NULL,'Chrome','Linux'),(99,'5e876674d1262','105.112.50.70','en','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',6,1585931892,'2020-04-03 16:38:12',NULL,'Chrome','Windows'),(101,'5e8dc1fe9ae6f','197.210.52.60','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',11,1586348542,'2020-04-08 12:22:22',NULL,'Chrome','mac'),(103,'5e91da004b9d8','197.210.45.108','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36',6,1586616832,'2020-04-11 14:53:52',NULL,'Chrome','mac'),(105,'5e91ed9a2c93c','197.210.45.108','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36',6,1586621850,'2020-04-11 16:17:30',NULL,'Chrome','mac'),(107,'5e960d3f13a86','105.112.70.140','en','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',6,1586892095,'2020-04-14 19:21:35',NULL,'Chrome','Windows'),(109,'5e96110b76538','197.210.64.212','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36',6,1586893067,'2020-04-14 19:37:47',NULL,'Chrome','mac'),(111,'5e9626e6e9d50','105.112.117.202','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1',99,1586898662,'2020-04-14 21:11:02',NULL,'iPhone','iPhone'),(113,'5e9627af88e6f','105.112.117.202','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1',99,1586898863,'2020-04-14 21:14:23',NULL,'iPhone','iPhone'),(115,'5e9629e350ead','105.112.117.202','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1',99,1586899427,'2020-04-14 21:23:47',NULL,'iPhone','iPhone'),(117,'5e9629fa1aa73','105.112.70.140','en','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',97,1586899450,'2020-04-14 21:24:10',NULL,'Chrome','Windows'),(119,'5e962a39536b8','105.112.70.140','en','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',51,1586899513,'2020-04-14 21:25:13',NULL,'Chrome','Windows'),(121,'5e962a5de2c32','197.210.52.144','en','Mozilla/5.0 (Linux; Android 9; SAMSUNG SM-A705FN) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/11.1 Chrome/75.0.3770.143 Mobile Safari/537.36',107,1586899549,'2020-04-14 21:25:49',NULL,'Chrome','Android'),(123,'5e963874e3487','105.112.121.59','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/62.0.3202.60 Mobile/17D50 Safari/604.1',97,1586903156,'2020-04-14 22:25:56',NULL,'iPhone','iPhone'),(125,'5e963875c1c71','105.112.121.59','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/62.0.3202.60 Mobile/17D50 Safari/604.1',97,1586903157,'2020-04-14 22:25:57',NULL,'iPhone','iPhone'),(127,'5e96483319cbd','197.210.52.114','en','Mozilla/5.0 (Linux; Android 8.1.0; Infinix X5515) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.80 Mobile Safari/537.36',103,1586907187,'2020-04-14 23:33:07',NULL,'Chrome','Android'),(129,'5e96538041675','197.211.57.245','en','Mozilla/5.0 (Linux; Android 9; TECNO KC8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Mobile Safari/537.36',63,1586910080,'2020-04-15 00:21:20',NULL,'Chrome','Android'),(131,'5e96b8f81b300','197.210.84.123','en','Mozilla/5.0 (Linux; Android 8.1.0; TECNO CA7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Mobile Safari/537.36',93,1586936056,'2020-04-15 07:34:16',NULL,'Chrome','Android'),(133,'5e96c63cbf61f','105.112.112.67','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1',99,1586939452,'2020-04-15 08:30:52',NULL,'iPhone','iPhone'),(135,'5e96d2263badb','105.112.156.19','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36',35,1586942502,'2020-04-15 09:21:42',NULL,'Chrome','mac'),(137,'5e971ef01d757','169.159.68.38','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_1_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.1 Mobile/15E148 Safari/604.1',47,1586962160,'2020-04-15 14:49:20',NULL,'iPhone','iPhone'),(139,'5e971f90a540b','169.159.68.38','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_1_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.1 Mobile/15E148 Safari/604.1',47,1586962320,'2020-04-15 14:52:00',NULL,'iPhone','iPhone'),(141,'5e9720fc5bf90','129.205.113.139','en','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36',47,1586962684,'2020-04-15 14:58:04',NULL,'Chrome','Windows'),(143,'5e9756e2431a3','105.112.113.104','en','Mozilla/5.0 (Linux; Android 8.1.0; DUB-LX1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Mobile Safari/537.36',49,1586976482,'2020-04-15 18:48:02',NULL,'Chrome','Android'),(145,'5e9768d10e57a','197.210.70.150','en','Mozilla/5.0 (Linux; Android 9; SAMSUNG SM-A705FN) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/11.1 Chrome/75.0.3770.143 Mobile Safari/537.36',107,1586981073,'2020-04-15 20:04:33',NULL,'Chrome','Android'),(147,'5e98335409695','105.112.70.140','en','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',6,1587032916,'2020-04-16 10:28:36',NULL,'Chrome','Windows'),(149,'5e983b462b8ed','105.112.70.140','en','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',6,1587034950,'2020-04-16 11:02:30',NULL,'Chrome','Windows'),(151,'5e983b4a3f175','197.210.8.62','en','Mozilla/5.0 (Linux; Android 9; SM-J415F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Mobile Safari/537.36',6,1587034954,'2020-04-16 11:02:34',NULL,'Chrome','Android'),(153,'5e983e1ba1029','105.112.46.220','en','Mozilla/5.0 (Linux; Android 9; SM-J610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Mobile Safari/537.36',6,1587035675,'2020-04-16 11:14:35',NULL,'Chrome','Android'),(155,'5e9841cc3bcb9','129.205.113.141','en','Mozilla/5.0 (Linux; Android 6.0.1; SM-N910H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.117 Mobile Safari/537.36',61,1587036620,'2020-04-16 11:30:20',NULL,'Chrome','Android'),(157,'5e9847c59f356','197.210.47.188','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36',6,1587038149,'2020-04-16 11:55:49',NULL,'Chrome','mac'),(159,'5e98543109de2','154.118.82.151','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/81.0.4044.62 Mobile/15E148 Safari/604.1',67,1587041329,'2020-04-16 12:48:49',NULL,'iPhone','iPhone'),(161,'5e9854d004d55','197.211.61.57','en','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36',57,1587041488,'2020-04-16 12:51:28',NULL,'Chrome','Windows'),(163,'5e9854f7c1c23','194.35.233.218','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36',67,1587041527,'2020-04-16 12:52:07',NULL,'Chrome','mac'),(165,'5e98605cec0a3','197.210.28.249','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.5 Mobile/15E148 Safari/604.1',59,1587044444,'2020-04-16 13:40:44',NULL,'iPhone','iPhone'),(167,'5e98628e941ab','194.35.233.218','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36',67,1587045006,'2020-04-16 13:50:06',NULL,'Chrome','mac'),(169,'5e9866614c35e','197.210.70.55','en','Mozilla/5.0 (Linux; Android 9; MRD-LX1F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Mobile Safari/537.36',85,1587045985,'2020-04-16 14:06:25',NULL,'Chrome','Android'),(171,'5e98697283976','197.210.71.73','en','Mozilla/5.0 (Linux; Android 9; MRD-LX1F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Mobile Safari/537.36',85,1587046770,'2020-04-16 14:19:30',NULL,'Chrome','Android'),(173,'5e986b318fda4','197.210.71.227','en','Mozilla/5.0 (Linux; Android 9; Infinix X650B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.119 Mobile Safari/537.36',95,1587047217,'2020-04-16 14:26:57',NULL,'Chrome','Android'),(175,'5e98824ab6657','129.205.113.143','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/80.0.3987.95 Mobile/15E148 Safari/604.1',41,1587053130,'2020-04-16 16:05:30',NULL,'iPhone','iPhone'),(177,'5e9891528f058','129.205.113.141','en','Mozilla/5.0 (Linux; Android 6.0.1; SM-N910H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.117 Mobile Safari/537.36',61,1587056978,'2020-04-16 17:09:38',NULL,'Chrome','Android'),(179,'5e98bb88818aa','105.112.18.249','en','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',6,1587067784,'2020-04-16 20:09:44',NULL,'Chrome','Windows'),(181,'5e98c366ddb5f','197.210.29.137','en','Mozilla/5.0 (Linux; Android 9; SM-J415F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Mobile Safari/537.36',6,1587069798,'2020-04-16 20:43:18',NULL,'Chrome','Android'),(183,'5e9993de0ab3a','129.205.113.149','en','Mozilla/5.0 (Linux; Android 6.0.1; SM-N910H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.117 Mobile Safari/537.36',61,1587123166,'2020-04-17 11:32:46',NULL,'Chrome','Android'),(185,'5e9a26e59a691','197.210.52.143','en','Mozilla/5.0 (Linux; Android 9; MRD-LX1F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Mobile Safari/537.36',85,1587160805,'2020-04-17 22:00:05',NULL,'Chrome','Android'),(187,'5e9a39572ec1c','154.120.75.30','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/81.0.4044.62 Mobile/15E148 Safari/604.1',67,1587165527,'2020-04-17 23:18:47',NULL,'iPhone','iPhone'),(189,'5e9a571137ea7','89.47.62.103','en','Mozilla/5.0 (iPhone; CPU iPhone OS 13_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/81.0.4044.62 Mobile/15E148 Safari/604.1',67,1587173137,'2020-04-18 01:25:37',NULL,'iPhone','iPhone'),(191,'5e9b5e2ff3bc8','197.210.71.60','en','Mozilla/5.0 (Linux; Android 9; MRD-LX1F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Mobile Safari/537.36',85,1587240495,'2020-04-18 20:08:15',NULL,'Chrome','Android'),(193,'5e9f16322ea0c','105.112.58.242','en','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36',6,1587484210,'2020-04-21 15:50:10',NULL,'Chrome','Windows'),(195,'5ea97894e5f49','197.210.71.241','en','Mozilla/5.0 (Linux; Android 8.1.0; Infinix X5515) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.80 Mobile Safari/537.36',103,1588164756,'2020-04-29 12:52:36',NULL,'Chrome','Android'),(197,'5ea98fbc6a78c','105.112.61.195','en','Mozilla/5.0 (Linux; Android 9; SAMSUNG SM-A7050) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/11.1 Chrome/75.0.3770.143 Mobile Safari/537.36',101,1588170684,'2020-04-29 14:31:24',NULL,'Chrome','Android'),(199,'5ea996a398b25','105.112.115.158','en','Mozilla/5.0 (Linux; Android 8.1.0; TECNO LA7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36',109,1588172451,'2020-04-29 15:00:51',NULL,'Chrome','Android'),(201,'5eaab1e3795e7','105.112.120.79','en','Mozilla/5.0 (Linux; Android 9; SAMSUNG SM-A7050) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/11.1 Chrome/75.0.3770.143 Mobile Safari/537.36',101,1588244963,'2020-04-30 11:09:23',NULL,'Chrome','Android'),(203,'5eaab9b0512c1','105.112.120.79','en','Mozilla/5.0 (Linux; Android 9; SAMSUNG SM-A7050) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/11.1 Chrome/75.0.3770.143 Mobile Safari/537.36',101,1588246960,'2020-04-30 11:42:40',NULL,'Chrome','Android'),(205,'5eabcc793fb52','105.112.122.172','en','Mozilla/5.0 (Linux; Android 9; SAMSUNG SM-A7050) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/11.1 Chrome/75.0.3770.143 Mobile Safari/537.36',101,1588317305,'2020-05-01 07:15:05',NULL,'Chrome','Android'),(207,'5eac03a45b45d','105.112.122.172','en','Mozilla/5.0 (Linux; Android 9; SAMSUNG SM-A7050) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/11.1 Chrome/75.0.3770.143 Mobile Safari/537.36',101,1588331428,'2020-05-01 11:10:28',NULL,'Chrome','Android'),(209,'5eac43ab60209','105.112.122.172','en','Mozilla/5.0 (Linux; Android 9; SAMSUNG SM-A7050) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/11.1 Chrome/75.0.3770.143 Mobile Safari/537.36',101,1588347819,'2020-05-01 15:43:39',NULL,'Chrome','Android'),(211,'5eac7a5ae44a8','102.89.1.99','en','Mozilla/5.0 (Linux; Android 8.1.0; TECNO LA7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36',109,1588361818,'2020-05-01 19:36:58',NULL,'Chrome','Android'),(213,'5ead9daf18490','197.210.85.118','en','Mozilla/5.0 (Linux; Android 9; Infinix X650B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.119 Mobile Safari/537.36',95,1588436399,'2020-05-02 16:19:59',NULL,'Chrome','Android'),(215,'5eadcd6daf8f3','105.112.112.156','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36',67,1588448621,'2020-05-02 19:43:41',NULL,'Chrome','mac'),(217,'5eade8c5a4ba0','105.112.112.156','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36',67,1588455621,'2020-05-02 21:40:21',NULL,'Chrome','mac'),(219,'5eade8d4360fb','105.112.112.156','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36',67,1588455636,'2020-05-02 21:40:36',NULL,'Chrome','mac'),(221,'5eade8e56e1c8','105.112.112.156','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36',67,1588455653,'2020-05-02 21:40:53',NULL,'Chrome','mac'),(223,'5eb613604ca5d','105.112.112.181','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36',67,1588990816,'2020-05-09 02:20:16',NULL,'Chrome','mac'),(225,'5eb6ed280fb45','197.210.52.218','en','Mozilla/5.0 (Linux; Android 8.1.0; Infinix X5515) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.80 Mobile Safari/537.36',103,1589046568,'2020-05-09 17:49:28',NULL,'Chrome','Android'),(227,'5ec231188cfab','197.210.70.86','en','Mozilla/5.0 (Linux; Android 8.1.0; Infinix X5515) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.80 Mobile Safari/537.36',103,1589784856,'2020-05-18 06:54:16',NULL,'Chrome','Android'),(229,'5ec68e93af37c','197.210.70.125','en','Mozilla/5.0 (Linux; Android 8.1.0; Infinix X5515) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.80 Mobile Safari/537.36',103,1590070931,'2020-05-21 14:22:11',NULL,'Chrome','Android'),(231,'5ec880d44aa02','197.210.53.191','en','Mozilla/5.0 (Linux; Android 9; Infinix X650B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.119 Mobile Safari/537.36',95,1590198484,'2020-05-23 01:48:04',NULL,'Chrome','Android'),(233,'5ed15e3c7c8d0','129.205.113.50','en','Mozilla/5.0 (Linux; Android 6.0.1; SM-N910H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.117 Mobile Safari/537.36',61,1590779452,'2020-05-29 19:10:52',NULL,'Chrome','Android'),(235,'5f2033117b642','197.159.70.174','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36',11,1595945745,'2020-07-28 14:15:45',NULL,'Chrome','mac'),(237,'5f3d420108af6','197.210.53.12','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36',11,1597850113,'2020-08-19 15:15:13',NULL,'Chrome','mac'),(239,'5f7c4af77889b','197.210.77.121','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36',11,1601981175,'2020-10-06 10:46:15',NULL,'Chrome','mac'),(241,'5fbcf22aa155c','197.156.228.108','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.67 Safari/537.36',6,1606218282,'2020-11-24 11:44:42',NULL,'Chrome','mac'),(243,'5fe30fb07eb00','197.156.228.108','en','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36',6,1608716208,'2020-12-23 09:36:48',NULL,'Chrome','Windows'),(245,'600e3ab298644','129.56.50.117','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36',11,1611545266,'2021-01-25 03:27:46',NULL,'Chrome','mac'),(247,'60952a3dc9db2','197.210.64.10','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.3 Safari/605.1.15',6,1620388413,'2021-05-07 11:53:33',NULL,'Safari','mac'),(249,'60952a6ac1557','197.210.64.10','en','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.3 Safari/605.1.15',1,1620388458,'2021-05-07 11:54:18',NULL,'Safari','mac'),(251,'60952ae8d269e','197.156.229.196','en','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36',1,1620388584,'2021-05-07 11:56:24',NULL,'Chrome','Linux');
/*!40000 ALTER TABLE `user_visit_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `hgsf_monthly_statistics`
--

/*!50001 DROP VIEW IF EXISTS `hgsf_monthly_statistics`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `hgsf_monthly_statistics` AS select date_format(`hgsf_conversations`.`entry_date`,'%Y%m') AS `date_format`,date_format(`hgsf_conversations`.`entry_date`,'%b-%Y') AS `month_year`,count(`hgsf_conversations`.`phone_no`) AS `cnt` from `hgsf_conversations` where (`hgsf_conversations`.`call_type_id` = 1) group by date_format(`hgsf_conversations`.`entry_date`,'%Y%m'),date_format(`hgsf_conversations`.`entry_date`,'%b-%Y') order by date_format(`hgsf_conversations`.`entry_date`,'%Y%m') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-07 13:22:51
