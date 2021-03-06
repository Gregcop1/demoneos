-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: local_neos_demoneos
-- ------------------------------------------------------
-- Server version	5.5.40-0+wheezy1

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
-- Table structure for table `flow_doctrine_migrationstatus`
--

DROP TABLE IF EXISTS `flow_doctrine_migrationstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flow_doctrine_migrationstatus` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flow_doctrine_migrationstatus`
--

LOCK TABLES `flow_doctrine_migrationstatus` WRITE;
/*!40000 ALTER TABLE `flow_doctrine_migrationstatus` DISABLE KEYS */;
INSERT INTO `flow_doctrine_migrationstatus` VALUES ('20110613223837'),('20110613224537'),('20110620155001'),('20110620155002'),('20110714212900'),('20110824124835'),('20110824124935'),('20110824125035'),('20110824125135'),('20110824181409'),('20110919164835'),('20110920104739'),('20110920125736'),('20110923125535'),('20110923125536'),('20110923125537'),('20110923125538'),('20110925123119'),('20110925123120'),('20110928114048'),('20111215172027'),('20120328152041'),('20120329220340'),('20120329220341'),('20120329220342'),('20120329220343'),('20120329220344'),('20120412093748'),('20120420132456'),('20120429213445'),('20120429213446'),('20120429213447'),('20120429213448'),('20120520211354'),('20120521125401'),('20120525141545'),('20120625211647'),('20120829124549'),('20120930203452'),('20120930211542'),('20121001181137'),('20121001201712'),('20121001202223'),('20121001204512'),('20121011140946'),('20121014005902'),('20121030221151'),('20121030221352'),('20121031190213'),('20130201104344'),('20130213130515'),('20130218100324'),('20130319131400'),('20130522131641'),('20130522132835'),('20130605174712'),('20130702151425'),('20130730151319'),('20130919143352'),('20130930182839'),('20131111235827'),('20131129110302'),('20131205174631'),('20140206124123'),('20140208173140'),('20140325173151');
/*!40000 ALTER TABLE `flow_doctrine_migrationstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_flow_mvc_routing_objectpathmapping`
--

DROP TABLE IF EXISTS `typo3_flow_mvc_routing_objectpathmapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_flow_mvc_routing_objectpathmapping` (
  `objecttype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uripattern` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pathsegment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`objecttype`,`uripattern`,`pathsegment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_flow_mvc_routing_objectpathmapping`
--

LOCK TABLES `typo3_flow_mvc_routing_objectpathmapping` WRITE;
/*!40000 ALTER TABLE `typo3_flow_mvc_routing_objectpathmapping` DISABLE KEYS */;
/*!40000 ALTER TABLE `typo3_flow_mvc_routing_objectpathmapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_flow_resource_publishing_abstractpublishingconfiguration`
--

DROP TABLE IF EXISTS `typo3_flow_resource_publishing_abstractpublishingconfiguration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_flow_resource_publishing_abstractpublishingconfiguration` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `dtype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_flow_resource_publishing_abstractpublishingconfiguration`
--

LOCK TABLES `typo3_flow_resource_publishing_abstractpublishingconfiguration` WRITE;
/*!40000 ALTER TABLE `typo3_flow_resource_publishing_abstractpublishingconfiguration` DISABLE KEYS */;
/*!40000 ALTER TABLE `typo3_flow_resource_publishing_abstractpublishingconfiguration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_flow_resource_resource`
--

DROP TABLE IF EXISTS `typo3_flow_resource_resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_flow_resource_resource` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `resourcepointer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fileextension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publishingconfiguration` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`persistence_object_identifier`),
  KEY `IDX_B4D45B323CB65D1` (`resourcepointer`),
  KEY `IDX_B4D45B32A4A851AF` (`publishingconfiguration`),
  CONSTRAINT `FK_B4D45B32A4A851AF` FOREIGN KEY (`publishingconfiguration`) REFERENCES `typo3_flow_resource_publishing_abstractpublishingconfiguration` (`persistence_object_identifier`),
  CONSTRAINT `typo3_flow_resource_resource_ibfk_1` FOREIGN KEY (`resourcepointer`) REFERENCES `typo3_flow_resource_resourcepointer` (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_flow_resource_resource`
--

LOCK TABLES `typo3_flow_resource_resource` WRITE;
/*!40000 ALTER TABLE `typo3_flow_resource_resource` DISABLE KEYS */;
INSERT INTO `typo3_flow_resource_resource` VALUES ('14148fb6-5234-fd4c-6e88-26a186e0b2f3','ae939055564831ad71ed68284e3b6725f29c1045','flying.jpg','jpg',NULL),('1eb38dbc-0580-1280-f293-4749dc1fffe5','0641ce611d5171161c853f70ff1ae0f33dd4dc24','alice-2.jpg','jpg',NULL),('24f8cd98-708a-c664-a08b-73914f39025e','7861cd0cc497284869845b442b46ee25224c4685','queen.jpg','jpg',NULL),('2561f821-2bea-1a41-34d9-862fd368b092','508d533cb989bddf1dbc68b4cb7cc5c72e598cf3','typo3-logo-cornify-small.png','png',NULL),('2710ab07-64b4-242a-a897-4fc10f83d4bd','ee94449bfc53d38d8e286879f38365ef3e9ca215','roses.jpg','jpg',NULL),('2de69658-9cc7-f108-b361-50de3ebd3587','0641ce611d5171161c853f70ff1ae0f33dd4dc24','alice-2.jpg','jpg',NULL),('3640b4ba-a68b-7e2f-4199-d4e3a2b684c3','30d0d71c6e7e4dd53636a8b9a5d5c8fd9b73f10f','alice-1.jpg','jpg',NULL),('3e3c60c3-df00-04f5-fb62-e8e947a1319c','510905a6fae272e24c71a11c3646a96bf9443a70','Mad-Hatter.jpg','jpg',NULL),('4bf693a4-93fe-5cba-4518-4e9897147fe4','85e5d4f8e34ad7dad4a34ba7af45d5584ea3db14','piggy.jpg','jpg',NULL),('4d119e80-eda4-320e-eb34-300ddc5624e4','dd224dfed85490797a385d01ccd91053670d00ce','birds.jpg','jpg',NULL),('57786bc3-d0e5-a181-c9c6-9675ff39cf91','930b8279a553880c49d7a73765778907ce392db5','smoking.jpg','jpg',NULL),('79253932-60ce-86ad-5ad8-265c3cbeac37','30d0d71c6e7e4dd53636a8b9a5d5c8fd9b73f10f','alice-1.jpg','jpg',NULL),('8a4496e4-fa0d-8550-0995-01fd869728bf','bed9a3e45070e97b921877e2bd9c35ba368beca0','TYPO3_Neos-logo_sRGB_color.pdf','pdf',NULL),('8eb0ba0c-bd0b-7da2-0f4d-77149299c2fe','7d0265f93741373a60457ba586f6d7a8c0865a09','cooking.jpg','jpg',NULL),('9a2cd8b5-c9ad-7bad-e483-25fb73a4c562','0d5f77e755f664b393b62ca51a056c06f05e83c6','alicecards.jpg','jpg',NULL),('bf2bdc0d-64fc-ec23-84c4-7db35456dc2b','504f2f8ad00d1a9ef228b288ca42107905c9e22e','people.jpg','jpg',NULL),('c9366596-9bae-1514-d003-76b2e82a6fc3','53e0e394fda7e8943fd5e15f041da1919e03d534','Alice-In-Wonderland.jpg','jpg',NULL),('f814656c-6e15-5ee6-1059-9735fb760816','b1b18947b2bebc44c6bbab46922f2a3856f5e33b','teatime.jpg','jpg',NULL);
/*!40000 ALTER TABLE `typo3_flow_resource_resource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_flow_resource_resourcepointer`
--

DROP TABLE IF EXISTS `typo3_flow_resource_resourcepointer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_flow_resource_resourcepointer` (
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_flow_resource_resourcepointer`
--

LOCK TABLES `typo3_flow_resource_resourcepointer` WRITE;
/*!40000 ALTER TABLE `typo3_flow_resource_resourcepointer` DISABLE KEYS */;
INSERT INTO `typo3_flow_resource_resourcepointer` VALUES ('0641ce611d5171161c853f70ff1ae0f33dd4dc24'),('0d5f77e755f664b393b62ca51a056c06f05e83c6'),('30d0d71c6e7e4dd53636a8b9a5d5c8fd9b73f10f'),('504f2f8ad00d1a9ef228b288ca42107905c9e22e'),('508d533cb989bddf1dbc68b4cb7cc5c72e598cf3'),('510905a6fae272e24c71a11c3646a96bf9443a70'),('53e0e394fda7e8943fd5e15f041da1919e03d534'),('7861cd0cc497284869845b442b46ee25224c4685'),('7d0265f93741373a60457ba586f6d7a8c0865a09'),('85e5d4f8e34ad7dad4a34ba7af45d5584ea3db14'),('930b8279a553880c49d7a73765778907ce392db5'),('ae939055564831ad71ed68284e3b6725f29c1045'),('b1b18947b2bebc44c6bbab46922f2a3856f5e33b'),('bed9a3e45070e97b921877e2bd9c35ba368beca0'),('dd224dfed85490797a385d01ccd91053670d00ce'),('ee94449bfc53d38d8e286879f38365ef3e9ca215');
/*!40000 ALTER TABLE `typo3_flow_resource_resourcepointer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_flow_security_account`
--

DROP TABLE IF EXISTS `typo3_flow_security_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_flow_security_account` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `party` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accountidentifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `authenticationprovidername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `credentialssource` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creationdate` datetime NOT NULL,
  `expirationdate` datetime DEFAULT NULL,
  PRIMARY KEY (`persistence_object_identifier`),
  UNIQUE KEY `flow3_identity_typo3_flow3_security_account` (`accountidentifier`,`authenticationprovidername`),
  KEY `IDX_65EFB31C89954EE0` (`party`),
  CONSTRAINT `typo3_flow_security_account_ibfk_1` FOREIGN KEY (`party`) REFERENCES `typo3_party_domain_model_abstractparty` (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_flow_security_account`
--

LOCK TABLES `typo3_flow_security_account` WRITE;
/*!40000 ALTER TABLE `typo3_flow_security_account` DISABLE KEYS */;
INSERT INTO `typo3_flow_security_account` VALUES ('1890f121-b815-9dff-ae64-e88887e7c6c1','c14c1e9e-d08b-320b-7b8e-5a72ad0030c3','gcopin','Typo3BackendProvider','bcrypt=>$2a$14$iDquQGfRZ1aOaUQYws.YwOIJNZxd78Gbtvh/I9cbPg.Hy5yaSRipy','2014-12-15 17:10:32',NULL);
/*!40000 ALTER TABLE `typo3_flow_security_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_flow_security_account_roles_join`
--

DROP TABLE IF EXISTS `typo3_flow_security_account_roles_join`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_flow_security_account_roles_join` (
  `flow_security_account` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `flow_policy_role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`flow_security_account`,`flow_policy_role`),
  KEY `IDX_ADF11BBC58842EFC` (`flow_security_account`),
  KEY `IDX_ADF11BBC23A1047C` (`flow_policy_role`),
  CONSTRAINT `FK_ADF11BBC23A1047C` FOREIGN KEY (`flow_policy_role`) REFERENCES `typo3_flow_security_policy_role` (`identifier`),
  CONSTRAINT `FK_ADF11BBC58842EFC` FOREIGN KEY (`flow_security_account`) REFERENCES `typo3_flow_security_account` (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_flow_security_account_roles_join`
--

LOCK TABLES `typo3_flow_security_account_roles_join` WRITE;
/*!40000 ALTER TABLE `typo3_flow_security_account_roles_join` DISABLE KEYS */;
INSERT INTO `typo3_flow_security_account_roles_join` VALUES ('1890f121-b815-9dff-ae64-e88887e7c6c1','TYPO3.Neos:Administrator');
/*!40000 ALTER TABLE `typo3_flow_security_account_roles_join` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_flow_security_authorization_resource_securitypublis_861cb`
--

DROP TABLE IF EXISTS `typo3_flow_security_authorization_resource_securitypublis_861cb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_flow_security_authorization_resource_securitypublis_861cb` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `allowedroles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`persistence_object_identifier`),
  CONSTRAINT `FK_234846D521E3D446` FOREIGN KEY (`persistence_object_identifier`) REFERENCES `typo3_flow_resource_publishing_abstractpublishingconfiguration` (`persistence_object_identifier`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_flow_security_authorization_resource_securitypublis_861cb`
--

LOCK TABLES `typo3_flow_security_authorization_resource_securitypublis_861cb` WRITE;
/*!40000 ALTER TABLE `typo3_flow_security_authorization_resource_securitypublis_861cb` DISABLE KEYS */;
/*!40000 ALTER TABLE `typo3_flow_security_authorization_resource_securitypublis_861cb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_flow_security_policy_role`
--

DROP TABLE IF EXISTS `typo3_flow_security_policy_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_flow_security_policy_role` (
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sourcehint` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_flow_security_policy_role`
--

LOCK TABLES `typo3_flow_security_policy_role` WRITE;
/*!40000 ALTER TABLE `typo3_flow_security_policy_role` DISABLE KEYS */;
INSERT INTO `typo3_flow_security_policy_role` VALUES ('Anonymous','system'),('AuthenticatedUser','system'),('Everybody','system'),('TYPO3.Neos:Administrator','policy'),('TYPO3.Neos:Editor','policy'),('TYPO3.Setup:Administrator','policy'),('TYPO3.TYPO3CR:Administrator','policy');
/*!40000 ALTER TABLE `typo3_flow_security_policy_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_flow_security_policy_role_parentroles_join`
--

DROP TABLE IF EXISTS `typo3_flow_security_policy_role_parentroles_join`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_flow_security_policy_role_parentroles_join` (
  `flow_policy_role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`flow_policy_role`,`parent_role`),
  KEY `IDX_D459C58E23A1047C` (`flow_policy_role`),
  KEY `IDX_D459C58E6A8ABCDE` (`parent_role`),
  CONSTRAINT `FK_D459C58E23A1047C` FOREIGN KEY (`flow_policy_role`) REFERENCES `typo3_flow_security_policy_role` (`identifier`),
  CONSTRAINT `FK_D459C58E6A8ABCDE` FOREIGN KEY (`parent_role`) REFERENCES `typo3_flow_security_policy_role` (`identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_flow_security_policy_role_parentroles_join`
--

LOCK TABLES `typo3_flow_security_policy_role_parentroles_join` WRITE;
/*!40000 ALTER TABLE `typo3_flow_security_policy_role_parentroles_join` DISABLE KEYS */;
INSERT INTO `typo3_flow_security_policy_role_parentroles_join` VALUES ('TYPO3.Neos:Administrator','TYPO3.Neos:Editor'),('TYPO3.Neos:Editor','TYPO3.TYPO3CR:Administrator');
/*!40000 ALTER TABLE `typo3_flow_security_policy_role_parentroles_join` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_media_domain_model_asset`
--

DROP TABLE IF EXISTS `typo3_media_domain_model_asset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_media_domain_model_asset` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `dtype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resource` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption` longtext COLLATE utf8_unicode_ci NOT NULL,
  `lastmodified` datetime NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`),
  KEY `IDX_B8306B8EBC91F416` (`resource`),
  CONSTRAINT `FK_B8306B8EBC91F416` FOREIGN KEY (`resource`) REFERENCES `typo3_flow_resource_resource` (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_media_domain_model_asset`
--

LOCK TABLES `typo3_media_domain_model_asset` WRITE;
/*!40000 ALTER TABLE `typo3_media_domain_model_asset` DISABLE KEYS */;
INSERT INTO `typo3_media_domain_model_asset` VALUES ('08aaeb84-dccc-6af4-0086-93499de4e1bc','typo3_media_image','3640b4ba-a68b-7e2f-4199-d4e3a2b684c3','','','2014-12-18 13:33:32'),('0bf33a79-3ee6-cdb2-94f1-95bc46beee0b','typo3_media_image','4d119e80-eda4-320e-eb34-300ddc5624e4','','','2014-12-18 13:34:18'),('10b114c2-7fc3-6e3a-ab8f-0a85a0854143','typo3_media_image','bf2bdc0d-64fc-ec23-84c4-7db35456dc2b','','','2014-12-18 13:34:20'),('11d3aded-fb1a-70e7-1412-0b465b11fcd8','typo3_media_image','1eb38dbc-0580-1280-f293-4749dc1fffe5','','','2014-12-18 13:33:33'),('17602a91-ba2b-c40d-e9fe-10f92ea6bd8b','typo3_media_image','8eb0ba0c-bd0b-7da2-0f4d-77149299c2fe','','','2014-12-18 13:34:18'),('54da13ee-9ced-e56f-aa4f-b1265f35fb0c','typo3_media_image','2561f821-2bea-1a41-34d9-862fd368b092','','','2014-12-18 13:33:23'),('65e3383c-173c-2f2e-1afc-259ba2bd3ca6','typo3_media_image','4bf693a4-93fe-5cba-4518-4e9897147fe4','','','2014-12-18 13:34:13'),('6aac7ce2-b2e1-4e20-6987-42daa4edfbd2','typo3_media_image','3e3c60c3-df00-04f5-fb62-e8e947a1319c','','','2014-12-18 13:33:48'),('6bc60415-af45-b2f4-af11-73b32e4532e9','typo3_media_image','f814656c-6e15-5ee6-1059-9735fb760816','','','2014-12-18 13:34:14'),('8244a1f2-5474-c7c2-0bcb-2c1f53080103','typo3_media_image','24f8cd98-708a-c664-a08b-73914f39025e','','','2014-12-18 13:34:15'),('89cd85cc-270e-0902-7113-d14ac7539c75','typo3_media_asset','8a4496e4-fa0d-8550-0995-01fd869728bf','','','2014-12-18 13:33:53'),('93c55a28-4047-f153-22fa-a0d956b4df01','typo3_media_image','2de69658-9cc7-f108-b361-50de3ebd3587','','','2014-12-18 13:34:09'),('a0178d77-5c04-b829-a613-c9d2b6fb92cb','typo3_media_image','9a2cd8b5-c9ad-7bad-e483-25fb73a4c562','','','2014-12-18 13:34:11'),('a126280f-2a8e-0592-0e14-cc2cd9808bb2','typo3_media_image','c9366596-9bae-1514-d003-76b2e82a6fc3','','','2014-12-18 13:33:48'),('a798ee5d-e75b-3595-578e-056439e1695e','typo3_media_image','14148fb6-5234-fd4c-6e88-26a186e0b2f3','','','2014-12-18 13:34:10'),('b30eeaa8-4a11-0caa-a685-bd845cbb68d8','typo3_media_image','79253932-60ce-86ad-5ad8-265c3cbeac37','','','2014-12-18 13:34:08'),('b674d9cd-4a7f-a33a-be12-9a5efdaedb98','typo3_media_image','2710ab07-64b4-242a-a897-4fc10f83d4bd','','','2014-12-18 13:34:19'),('d08de093-dc6b-55ea-adfc-d894ef87b0e0','typo3_media_image','57786bc3-d0e5-a181-c9c6-9675ff39cf91','','','2014-12-18 13:34:12');
/*!40000 ALTER TABLE `typo3_media_domain_model_asset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_media_domain_model_asset_tags_join`
--

DROP TABLE IF EXISTS `typo3_media_domain_model_asset_tags_join`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_media_domain_model_asset_tags_join` (
  `media_asset` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `media_tag` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`media_asset`,`media_tag`),
  KEY `IDX_DAF7A1EB1DB69EED` (`media_asset`),
  KEY `IDX_DAF7A1EB48D8C57E` (`media_tag`),
  CONSTRAINT `FK_DAF7A1EB1DB69EED` FOREIGN KEY (`media_asset`) REFERENCES `typo3_media_domain_model_asset` (`persistence_object_identifier`),
  CONSTRAINT `FK_DAF7A1EB48D8C57E` FOREIGN KEY (`media_tag`) REFERENCES `typo3_media_domain_model_tag` (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_media_domain_model_asset_tags_join`
--

LOCK TABLES `typo3_media_domain_model_asset_tags_join` WRITE;
/*!40000 ALTER TABLE `typo3_media_domain_model_asset_tags_join` DISABLE KEYS */;
/*!40000 ALTER TABLE `typo3_media_domain_model_asset_tags_join` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_media_domain_model_audio`
--

DROP TABLE IF EXISTS `typo3_media_domain_model_audio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_media_domain_model_audio` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`),
  CONSTRAINT `FK_A2E2074747A46B0A` FOREIGN KEY (`persistence_object_identifier`) REFERENCES `typo3_media_domain_model_asset` (`persistence_object_identifier`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_media_domain_model_audio`
--

LOCK TABLES `typo3_media_domain_model_audio` WRITE;
/*!40000 ALTER TABLE `typo3_media_domain_model_audio` DISABLE KEYS */;
/*!40000 ALTER TABLE `typo3_media_domain_model_audio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_media_domain_model_document`
--

DROP TABLE IF EXISTS `typo3_media_domain_model_document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_media_domain_model_document` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`),
  CONSTRAINT `FK_F089E2F547A46B0A` FOREIGN KEY (`persistence_object_identifier`) REFERENCES `typo3_media_domain_model_asset` (`persistence_object_identifier`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_media_domain_model_document`
--

LOCK TABLES `typo3_media_domain_model_document` WRITE;
/*!40000 ALTER TABLE `typo3_media_domain_model_document` DISABLE KEYS */;
/*!40000 ALTER TABLE `typo3_media_domain_model_document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_media_domain_model_image`
--

DROP TABLE IF EXISTS `typo3_media_domain_model_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_media_domain_model_image` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `imagevariants` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`persistence_object_identifier`),
  CONSTRAINT `FK_7FA2358D47A46B0A` FOREIGN KEY (`persistence_object_identifier`) REFERENCES `typo3_media_domain_model_asset` (`persistence_object_identifier`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_media_domain_model_image`
--

LOCK TABLES `typo3_media_domain_model_image` WRITE;
/*!40000 ALTER TABLE `typo3_media_domain_model_image` DISABLE KEYS */;
INSERT INTO `typo3_media_domain_model_image` VALUES ('08aaeb84-dccc-6af4-0086-93499de4e1bc',359,500,2,'a:0:{}'),('0bf33a79-3ee6-cdb2-94f1-95bc46beee0b',372,500,2,'a:0:{}'),('10b114c2-7fc3-6e3a-ab8f-0a85a0854143',359,500,2,'a:0:{}'),('11d3aded-fb1a-70e7-1412-0b465b11fcd8',353,500,2,'a:0:{}'),('17602a91-ba2b-c40d-e9fe-10f92ea6bd8b',384,500,2,'a:0:{}'),('54da13ee-9ced-e56f-aa4f-b1265f35fb0c',1200,335,3,'a:0:{}'),('65e3383c-173c-2f2e-1afc-259ba2bd3ca6',357,500,2,'a:0:{}'),('6aac7ce2-b2e1-4e20-6987-42daa4edfbd2',1600,500,2,'a:0:{}'),('6bc60415-af45-b2f4-af11-73b32e4532e9',359,500,2,'a:0:{}'),('8244a1f2-5474-c7c2-0bcb-2c1f53080103',364,500,2,'a:0:{}'),('93c55a28-4047-f153-22fa-a0d956b4df01',353,500,2,'a:0:{}'),('a0178d77-5c04-b829-a613-c9d2b6fb92cb',356,500,2,'a:0:{}'),('a126280f-2a8e-0592-0e14-cc2cd9808bb2',1600,500,2,'a:0:{}'),('a798ee5d-e75b-3595-578e-056439e1695e',373,500,2,'a:0:{}'),('b30eeaa8-4a11-0caa-a685-bd845cbb68d8',359,500,2,'a:0:{}'),('b674d9cd-4a7f-a33a-be12-9a5efdaedb98',364,500,2,'a:0:{}'),('d08de093-dc6b-55ea-adfc-d894ef87b0e0',337,500,2,'a:0:{}');
/*!40000 ALTER TABLE `typo3_media_domain_model_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_media_domain_model_tag`
--

DROP TABLE IF EXISTS `typo3_media_domain_model_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_media_domain_model_tag` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_media_domain_model_tag`
--

LOCK TABLES `typo3_media_domain_model_tag` WRITE;
/*!40000 ALTER TABLE `typo3_media_domain_model_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `typo3_media_domain_model_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_media_domain_model_video`
--

DROP TABLE IF EXISTS `typo3_media_domain_model_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_media_domain_model_video` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`),
  CONSTRAINT `FK_C658EBFE47A46B0A` FOREIGN KEY (`persistence_object_identifier`) REFERENCES `typo3_media_domain_model_asset` (`persistence_object_identifier`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_media_domain_model_video`
--

LOCK TABLES `typo3_media_domain_model_video` WRITE;
/*!40000 ALTER TABLE `typo3_media_domain_model_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `typo3_media_domain_model_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_neos_domain_model_domain`
--

DROP TABLE IF EXISTS `typo3_neos_domain_model_domain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_neos_domain_model_domain` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `site` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hostpattern` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`),
  UNIQUE KEY `flow_identity_typo3_neos_domain_model_domain` (`hostpattern`),
  KEY `IDX_F227E8F6694309E4` (`site`),
  CONSTRAINT `typo3_neos_domain_model_domain_ibfk_1` FOREIGN KEY (`site`) REFERENCES `typo3_neos_domain_model_site` (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_neos_domain_model_domain`
--

LOCK TABLES `typo3_neos_domain_model_domain` WRITE;
/*!40000 ALTER TABLE `typo3_neos_domain_model_domain` DISABLE KEYS */;
/*!40000 ALTER TABLE `typo3_neos_domain_model_domain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_neos_domain_model_site`
--

DROP TABLE IF EXISTS `typo3_neos_domain_model_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_neos_domain_model_site` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nodename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `siteresourcespackagekey` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`),
  UNIQUE KEY `flow3_identity_typo3_typo3_domain_model_site` (`nodename`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_neos_domain_model_site`
--

LOCK TABLES `typo3_neos_domain_model_site` WRITE;
/*!40000 ALTER TABLE `typo3_neos_domain_model_site` DISABLE KEYS */;
INSERT INTO `typo3_neos_domain_model_site` VALUES ('07658687-a8de-2a52-9688-5076da7c1d59','Carvin','carvin',1,'GC.Carvin');
/*!40000 ALTER TABLE `typo3_neos_domain_model_site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_neos_domain_model_user`
--

DROP TABLE IF EXISTS `typo3_neos_domain_model_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_neos_domain_model_user` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `preferences` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`persistence_object_identifier`),
  UNIQUE KEY `UNIQ_E3F98B13E931A6F5` (`preferences`),
  CONSTRAINT `typo3_neos_domain_model_user_ibfk_1` FOREIGN KEY (`preferences`) REFERENCES `typo3_neos_domain_model_userpreferences` (`persistence_object_identifier`),
  CONSTRAINT `typo3_neos_domain_model_user_ibfk_2` FOREIGN KEY (`persistence_object_identifier`) REFERENCES `typo3_party_domain_model_abstractparty` (`persistence_object_identifier`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_neos_domain_model_user`
--

LOCK TABLES `typo3_neos_domain_model_user` WRITE;
/*!40000 ALTER TABLE `typo3_neos_domain_model_user` DISABLE KEYS */;
INSERT INTO `typo3_neos_domain_model_user` VALUES ('c14c1e9e-d08b-320b-7b8e-5a72ad0030c3','de67e0f5-8d73-faac-e53d-49624c734858');
/*!40000 ALTER TABLE `typo3_neos_domain_model_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_neos_domain_model_userpreferences`
--

DROP TABLE IF EXISTS `typo3_neos_domain_model_userpreferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_neos_domain_model_userpreferences` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `preferences` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_neos_domain_model_userpreferences`
--

LOCK TABLES `typo3_neos_domain_model_userpreferences` WRITE;
/*!40000 ALTER TABLE `typo3_neos_domain_model_userpreferences` DISABLE KEYS */;
INSERT INTO `typo3_neos_domain_model_userpreferences` VALUES ('de67e0f5-8d73-faac-e53d-49624c734858','a:0:{}');
/*!40000 ALTER TABLE `typo3_neos_domain_model_userpreferences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_neosdemotypo3org_domain_model_registration`
--

DROP TABLE IF EXISTS `typo3_neosdemotypo3org_domain_model_registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_neosdemotypo3org_domain_model_registration` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_neosdemotypo3org_domain_model_registration`
--

LOCK TABLES `typo3_neosdemotypo3org_domain_model_registration` WRITE;
/*!40000 ALTER TABLE `typo3_neosdemotypo3org_domain_model_registration` DISABLE KEYS */;
/*!40000 ALTER TABLE `typo3_neosdemotypo3org_domain_model_registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_party_domain_model_abstractparty`
--

DROP TABLE IF EXISTS `typo3_party_domain_model_abstractparty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_party_domain_model_abstractparty` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `dtype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_party_domain_model_abstractparty`
--

LOCK TABLES `typo3_party_domain_model_abstractparty` WRITE;
/*!40000 ALTER TABLE `typo3_party_domain_model_abstractparty` DISABLE KEYS */;
INSERT INTO `typo3_party_domain_model_abstractparty` VALUES ('c14c1e9e-d08b-320b-7b8e-5a72ad0030c3','typo3_neos_user');
/*!40000 ALTER TABLE `typo3_party_domain_model_abstractparty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_party_domain_model_electronicaddress`
--

DROP TABLE IF EXISTS `typo3_party_domain_model_electronicaddress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_party_domain_model_electronicaddress` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `usagetype` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved` tinyint(1) NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_party_domain_model_electronicaddress`
--

LOCK TABLES `typo3_party_domain_model_electronicaddress` WRITE;
/*!40000 ALTER TABLE `typo3_party_domain_model_electronicaddress` DISABLE KEYS */;
/*!40000 ALTER TABLE `typo3_party_domain_model_electronicaddress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_party_domain_model_person`
--

DROP TABLE IF EXISTS `typo3_party_domain_model_person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_party_domain_model_person` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primaryelectronicaddress` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`persistence_object_identifier`),
  UNIQUE KEY `UNIQ_C60479E15E237E06` (`name`),
  KEY `IDX_C60479E1A7CECF13` (`primaryelectronicaddress`),
  CONSTRAINT `typo3_party_domain_model_person_ibfk_1` FOREIGN KEY (`name`) REFERENCES `typo3_party_domain_model_personname` (`persistence_object_identifier`),
  CONSTRAINT `typo3_party_domain_model_person_ibfk_2` FOREIGN KEY (`primaryelectronicaddress`) REFERENCES `typo3_party_domain_model_electronicaddress` (`persistence_object_identifier`),
  CONSTRAINT `typo3_party_domain_model_person_ibfk_3` FOREIGN KEY (`persistence_object_identifier`) REFERENCES `typo3_party_domain_model_abstractparty` (`persistence_object_identifier`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_party_domain_model_person`
--

LOCK TABLES `typo3_party_domain_model_person` WRITE;
/*!40000 ALTER TABLE `typo3_party_domain_model_person` DISABLE KEYS */;
INSERT INTO `typo3_party_domain_model_person` VALUES ('c14c1e9e-d08b-320b-7b8e-5a72ad0030c3','41968acf-dc7f-388b-02a6-1695e20eb74e',NULL);
/*!40000 ALTER TABLE `typo3_party_domain_model_person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_party_domain_model_person_electronicaddresses_join`
--

DROP TABLE IF EXISTS `typo3_party_domain_model_person_electronicaddresses_join`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_party_domain_model_person_electronicaddresses_join` (
  `party_person` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `party_electronicaddress` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`party_person`,`party_electronicaddress`),
  KEY `IDX_759CC08F72AAAA2F` (`party_person`),
  KEY `IDX_759CC08FB06BD60D` (`party_electronicaddress`),
  CONSTRAINT `typo3_party_domain_model_person_electronicaddresses_join_ibfk_1` FOREIGN KEY (`party_person`) REFERENCES `typo3_party_domain_model_person` (`persistence_object_identifier`),
  CONSTRAINT `typo3_party_domain_model_person_electronicaddresses_join_ibfk_2` FOREIGN KEY (`party_electronicaddress`) REFERENCES `typo3_party_domain_model_electronicaddress` (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_party_domain_model_person_electronicaddresses_join`
--

LOCK TABLES `typo3_party_domain_model_person_electronicaddresses_join` WRITE;
/*!40000 ALTER TABLE `typo3_party_domain_model_person_electronicaddresses_join` DISABLE KEYS */;
/*!40000 ALTER TABLE `typo3_party_domain_model_person_electronicaddresses_join` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_party_domain_model_personname`
--

DROP TABLE IF EXISTS `typo3_party_domain_model_personname`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_party_domain_model_personname` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `othername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_party_domain_model_personname`
--

LOCK TABLES `typo3_party_domain_model_personname` WRITE;
/*!40000 ALTER TABLE `typo3_party_domain_model_personname` DISABLE KEYS */;
INSERT INTO `typo3_party_domain_model_personname` VALUES ('41968acf-dc7f-388b-02a6-1695e20eb74e','','Grégory','','Copin','','gcopin','Grégory Copin');
/*!40000 ALTER TABLE `typo3_party_domain_model_personname` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_typo3cr_domain_model_contentobjectproxy`
--

DROP TABLE IF EXISTS `typo3_typo3cr_domain_model_contentobjectproxy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_typo3cr_domain_model_contentobjectproxy` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `targettype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `targetid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_typo3cr_domain_model_contentobjectproxy`
--

LOCK TABLES `typo3_typo3cr_domain_model_contentobjectproxy` WRITE;
/*!40000 ALTER TABLE `typo3_typo3cr_domain_model_contentobjectproxy` DISABLE KEYS */;
/*!40000 ALTER TABLE `typo3_typo3cr_domain_model_contentobjectproxy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_typo3cr_domain_model_nodedata`
--

DROP TABLE IF EXISTS `typo3_typo3cr_domain_model_nodedata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_typo3cr_domain_model_nodedata` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `workspace` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contentobjectproxy` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(4000) COLLATE utf8_unicode_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sortingindex` int(11) DEFAULT NULL,
  `properties` longblob NOT NULL COMMENT '(DC2Type:objectarray)',
  `nodetype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `removed` tinyint(1) NOT NULL,
  `hidden` tinyint(1) NOT NULL,
  `hiddenbeforedatetime` datetime DEFAULT NULL,
  `hiddenafterdatetime` datetime DEFAULT NULL,
  `hiddeninindex` tinyint(1) NOT NULL,
  `accessroles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `version` int(11) NOT NULL DEFAULT '1',
  `parentpath` varchar(4000) COLLATE utf8_unicode_ci NOT NULL,
  `pathhash` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `dimensionshash` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `dimensionvalues` longblob NOT NULL COMMENT '(DC2Type:objectarray)',
  `parentpathhash` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`),
  UNIQUE KEY `UNIQ_60A956B92DBEC7578D94001992F8FB01` (`pathhash`,`workspace`,`dimensionshash`),
  KEY `IDX_820CADC88D940019` (`workspace`),
  KEY `IDX_820CADC84930C33C` (`contentobjectproxy`),
  KEY `parentpath_sortingindex` (`parentpathhash`,`sortingindex`),
  KEY `identifierindex` (`identifier`),
  KEY `nodetypeindex` (`nodetype`),
  CONSTRAINT `FK_60A956B98D940019` FOREIGN KEY (`workspace`) REFERENCES `typo3_typo3cr_domain_model_workspace` (`name`) ON DELETE SET NULL,
  CONSTRAINT `typo3_typo3cr_domain_model_nodedata_ibfk_2` FOREIGN KEY (`contentobjectproxy`) REFERENCES `typo3_typo3cr_domain_model_contentobjectproxy` (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_typo3cr_domain_model_nodedata`
--

LOCK TABLES `typo3_typo3cr_domain_model_nodedata` WRITE;
/*!40000 ALTER TABLE `typo3_typo3cr_domain_model_nodedata` DISABLE KEYS */;
INSERT INTO `typo3_typo3cr_domain_model_nodedata` VALUES ('020e48ea-f4fc-1226-1a3c-cff3ef996a46','live',NULL,'/sites/carvin/carvinfr/main/node-5492ccc31103e/column0/node-54943ee699be1/column0','ccadc450-0b55-29f9-afba-4af69ce0be22',100,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/carvinfr/main/node-5492ccc31103e/column0/node-54943ee699be1','a4cc63291b3e7d3761e4d6f611b3c016','d751713988987e9331980363e24189ce','a:0:{}','f8c0e82027c339a3fd635912628d5c2f'),('03d4e862-3da9-9ce8-d2cb-33dde6c78abf','live',NULL,'/sites/carvin/carvinfr/decouvrir-carvin','b8869a96-430e-2321-9153-9800b0140dea',200,'a:1:{s:5:\"title\";s:17:\"Découvrir Carvin\";}','TYPO3.Neos.NodeTypes:Page',0,0,NULL,NULL,0,'a:0:{}',5,'/sites/carvin/carvinfr','f150673fbdc59e43993d5bc272595ee2','d751713988987e9331980363e24189ce','a:0:{}','32cf7b228fb2bf64ef2395f49532152b'),('083e9f8c-c804-a3ab-9e2a-d0d0aa33f538','live',NULL,'/sites/carvin/carvinfr/main/node-5492ccc31103e','9c7cf7f2-81ff-3a26-5812-6bbf357f8c8d',325,'a:1:{s:6:\"layout\";s:6:\"orange\";}','GC.Carvin:Slice',0,0,NULL,NULL,0,'a:0:{}',4,'/sites/carvin/carvinfr/main','8df5e03631fa2bb9e5d54307c9a24651','d751713988987e9331980363e24189ce','a:0:{}','558f6ea517e0577e299c579058063401'),('0b376a72-2c05-2cd7-348c-ba07563c6442','live',NULL,'/sites/carvin/carvinfr/main/node-5492ccc31103e/column0','3dcefad0-6f1a-1531-ca9e-6813625e9377',100,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/carvinfr/main/node-5492ccc31103e','a230a7cfb96c5d72ab5ab2f85e69195d','d751713988987e9331980363e24189ce','a:0:{}','8df5e03631fa2bb9e5d54307c9a24651'),('0e065eaf-433c-0449-810f-d6363f100705','live',NULL,'/sites/carvin/mairie-24-24/teaser','b48ec991-040c-7b26-4362-fb1c09d43f9c',200,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/mairie-24-24','1e318c9b8d20d92e42bcb6aeb9fdcf9d','d751713988987e9331980363e24189ce','a:0:{}','8807b0aa3bbf37b38f95ed03860ba642'),('10c1bd67-3b87-2d6a-f341-b308be747436','live',NULL,'/sites/carvin/mairie-24-24','856a1543-a00c-7685-b1bd-0ed254285f59',300,'a:1:{s:5:\"title\";s:12:\"Mairie 24/24\";}','TYPO3.Neos.NodeTypes:Page',0,0,NULL,NULL,0,'a:0:{}',4,'/sites/carvin','8807b0aa3bbf37b38f95ed03860ba642','d751713988987e9331980363e24189ce','a:0:{}','642afa0c19b16ac6544b08240894835f'),('11be41f9-1399-948c-f0d6-32cb8821a787','live',NULL,'/sites/carvin/carvinfr/au-service-des-carvinois','547b9467-3c4f-98ba-8133-a97e544fcb00',300,'a:1:{s:5:\"title\";s:24:\"Au service des Carvinois\";}','TYPO3.Neos.NodeTypes:Page',0,0,NULL,NULL,0,'a:0:{}',5,'/sites/carvin/carvinfr','f620ae081303a2d75e66c0c630cd728c','d751713988987e9331980363e24189ce','a:0:{}','32cf7b228fb2bf64ef2395f49532152b'),('141b2e17-a87c-42a4-8528-db3402bd1e2b','live',NULL,'/sites/carvin','617bacb9-6650-2783-e3d1-6d5dbe5d89a3',100,'a:2:{s:5:\"title\";s:4:\"Home\";s:10:\"targetMode\";s:14:\"firstChildNode\";}','TYPO3.Neos:Shortcut',0,0,NULL,NULL,0,'a:0:{}',3,'/sites','642afa0c19b16ac6544b08240894835f','d751713988987e9331980363e24189ce','a:0:{}','dbd87ae51cbf5240fea77283585e69d5'),('2f200266-deef-7331-15fa-d556de44b94e','user-gcopin',NULL,'/','c5d31507-4bce-328a-799e-89e29d6bb0cd',NULL,'a:0:{}','unstructured',0,0,NULL,NULL,0,'a:0:{}',2,'','6666cd76f96956469e7be39d750cc7d9','d751713988987e9331980363e24189ce','a:0:{}','d41d8cd98f00b204e9800998ecf8427e'),('3c9820a2-4596-11fc-b866-98e51ccd2c84','live',NULL,'/sites/carvin/main','0204a4ef-0329-e625-9ac0-4ea0a34305e5',100,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',2,'/sites/carvin','ed096a85cae03258ee15eb8c0a924508','d751713988987e9331980363e24189ce','a:0:{}','642afa0c19b16ac6544b08240894835f'),('4da2358a-816b-6af8-21bb-5e08ec0ce8df','live',NULL,'/sites/carvin/main/text1','f25f5a0e-d225-01b6-1663-02c8a65c7f80',100,'a:1:{s:4:\"text\";s:28:\"<p>This is the homepages</p>\";}','TYPO3.Neos.NodeTypes:Text',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/main','a43e25b5cb7e87bd54561283663b51b2','d751713988987e9331980363e24189ce','a:0:{}','ed096a85cae03258ee15eb8c0a924508'),('61365e30-6d09-ff6f-a640-9de1d19ffe1c','live',NULL,'/sites/carvin/carvinfr/au-service-des-carvinois/main','473374e0-d8a2-df9e-ec2d-e417a537cf22',100,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',4,'/sites/carvin/carvinfr/au-service-des-carvinois','8b05003c18b758a79ff838db7d67c5d3','d751713988987e9331980363e24189ce','a:0:{}','f620ae081303a2d75e66c0c630cd728c'),('66ed310c-0af5-3dd4-3228-f3d2b1799761','live',NULL,'/sites/carvin/carvinfr/main','10d1fe1d-dc37-bf82-6a6a-68f424b7873c',100,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/carvinfr','558f6ea517e0577e299c579058063401','d751713988987e9331980363e24189ce','a:0:{}','32cf7b228fb2bf64ef2395f49532152b'),('6ccd8f10-9425-021a-c2d3-b8e94973171e','live',NULL,'/sites/carvin/carvinfr/decouvrir-carvin/main','aa9cc4e5-e455-e093-a84c-0ebba4ac804b',100,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',4,'/sites/carvin/carvinfr/decouvrir-carvin','43f06236af2a674b91427091121f1511','d751713988987e9331980363e24189ce','a:0:{}','f150673fbdc59e43993d5bc272595ee2'),('70361f02-69d3-63c5-b5a4-02795d65ec6b','live',NULL,'/sites/carvin/carvinfr/au-service-des-carvinois/teaser','df6291a0-9ec7-c4c4-b536-d36ae65b48a6',200,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',4,'/sites/carvin/carvinfr/au-service-des-carvinois','0df50cc267479e9c2a1cb95e1218d807','d751713988987e9331980363e24189ce','a:0:{}','f620ae081303a2d75e66c0c630cd728c'),('722b323e-36cf-3e02-47fa-a5712090724c','live',NULL,'/sites/carvin/carvinfr/decouvrir-carvin/teaser','1dd7da0f-d9c6-b774-3ae7-5fb843fba594',200,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',4,'/sites/carvin/carvinfr/decouvrir-carvin','a736f32526d12bc010fa22f9f11c4fb4','d751713988987e9331980363e24189ce','a:0:{}','f150673fbdc59e43993d5bc272595ee2'),('7299fac6-1b2e-1dad-35fe-8d53cf98532e','live',NULL,'/sites/carvin/carvinfr/marie/teaser','05b97cae-1688-5026-c4ff-da8421ca4f5d',200,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',4,'/sites/carvin/carvinfr/marie','ae43dd350d39d0306e35af552d880bca','d751713988987e9331980363e24189ce','a:0:{}','5b8a3ae0b6d89631ad6fc3c96751ddb0'),('75584932-700c-9787-d66b-023bf75d9f87','live',NULL,'/sites','aacd13e5-767d-4df9-a940-3c1948d28332',100,'a:0:{}','unstructured',0,0,NULL,NULL,0,'a:0:{}',1,'/','dbd87ae51cbf5240fea77283585e69d5','d751713988987e9331980363e24189ce','a:0:{}','6666cd76f96956469e7be39d750cc7d9'),('76655ebb-131c-7d0b-da06-3758bc7abf29','live',NULL,'/','f579692b-e17d-d1e6-f6b9-dd2801dbc72a',NULL,'a:0:{}','unstructured',0,0,NULL,NULL,0,'a:0:{}',2,'','6666cd76f96956469e7be39d750cc7d9','d751713988987e9331980363e24189ce','a:0:{}','d41d8cd98f00b204e9800998ecf8427e'),('8b508a48-d0de-c318-8f25-0f676e741524','live',NULL,'/sites/carvin/carvinfr/main/node-5492ccc31103e/column0/node-54943ee699be1/column0/node-5494513aa6338','6e4f7347-33c8-0f57-2290-c2702d366910',475,'a:0:{}','GC.Carvin:QuickAccessItem',0,0,NULL,NULL,0,'a:0:{}',6,'/sites/carvin/carvinfr/main/node-5492ccc31103e/column0/node-54943ee699be1/column0','0f6d3d208ee25b42e97f57a70a51748c','d751713988987e9331980363e24189ce','a:0:{}','a4cc63291b3e7d3761e4d6f611b3c016'),('8c76f074-b012-b155-dec1-bd99d5cc4b04','live',NULL,'/sites/carvin/carvinfr/marie','7d3cb8e7-918c-e9b1-8b01-d726e9de6828',250,'a:3:{s:5:\"title\";s:6:\"Mairie\";s:6:\"layout\";s:0:\"\";s:13:\"subpageLayout\";s:0:\"\";}','TYPO3.Neos.NodeTypes:Page',0,0,NULL,NULL,0,'a:0:{}',7,'/sites/carvin/carvinfr','5b8a3ae0b6d89631ad6fc3c96751ddb0','d751713988987e9331980363e24189ce','a:0:{}','32cf7b228fb2bf64ef2395f49532152b'),('8cb13bcc-f35b-33ff-a36e-6c8fa0a8a860','live',NULL,'/sites/carvin/vie-associative','45cb4114-cbd8-a861-59c0-0691a1c0d0a5',250,'a:1:{s:5:\"title\";s:15:\"Vie associative\";}','TYPO3.Neos.NodeTypes:Page',0,0,NULL,NULL,0,'a:0:{}',4,'/sites/carvin','96d0fa1d3d6aa9ad8c19d3e700d54889','d751713988987e9331980363e24189ce','a:0:{}','642afa0c19b16ac6544b08240894835f'),('b3c5c43d-c9ea-9701-8aa9-d9d98518e7db','live',NULL,'/sites/carvin/carvinfr/main/node-5492ccc31103e/column0/node-54943ee699be1','cf7fc836-36f5-f535-c58c-1cb5286d93af',200,'a:0:{}','GC.Carvin:QuickAccess',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/carvinfr/main/node-5492ccc31103e/column0','f8c0e82027c339a3fd635912628d5c2f','d751713988987e9331980363e24189ce','a:0:{}','a230a7cfb96c5d72ab5ab2f85e69195d'),('b8463622-d6df-37ee-f15c-c04924e32be1','live',NULL,'/sites/carvin/carvinfr/marie/main','1fa35a3b-1a6c-04f1-3a79-c747d703bf47',100,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',4,'/sites/carvin/carvinfr/marie','277fc0a1bd06dc58764f81e79815c04c','d751713988987e9331980363e24189ce','a:0:{}','5b8a3ae0b6d89631ad6fc3c96751ddb0'),('bcf300f5-1ede-3723-47a0-d54d9495c4f1','live',NULL,'/sites/carvin/vie-associative/main','0fdc08d5-f688-2828-ff7f-3a5599a10507',100,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/vie-associative','2e918c324632950027d4795df8d72454','d751713988987e9331980363e24189ce','a:0:{}','96d0fa1d3d6aa9ad8c19d3e700d54889'),('c05cd7a5-5bed-4a1f-7cc2-010ce6c44a72','live',NULL,'/sites/carvin/carvinfr','5d409e7e-8bc0-b2d7-bc29-7e60b566e547',200,'a:3:{s:5:\"title\";s:9:\"Carvin fr\";s:6:\"layout\";s:0:\"\";s:13:\"subpageLayout\";s:0:\"\";}','TYPO3.Neos.NodeTypes:Page',0,0,NULL,NULL,0,'a:0:{}',4,'/sites/carvin','32cf7b228fb2bf64ef2395f49532152b','d751713988987e9331980363e24189ce','a:0:{}','642afa0c19b16ac6544b08240894835f'),('de3fba94-55d9-f070-9868-62ae9a785491','live',NULL,'/sites/carvin/vie-associative/teaser','d8c077b4-874e-49b9-84e0-ddaf8012f0c4',200,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/vie-associative','54d441e1fb5a6471800295a241f2dce1','d751713988987e9331980363e24189ce','a:0:{}','96d0fa1d3d6aa9ad8c19d3e700d54889'),('ef235ad0-97a9-6e4f-be65-d1ef5c9a583c','live',NULL,'/sites/carvin/mairie-24-24/main','fba5cbe3-fb5c-b9c7-eff2-92f621f70e24',100,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/mairie-24-24','2c41e1ef50641473f9b9a26d0106a6b3','d751713988987e9331980363e24189ce','a:0:{}','8807b0aa3bbf37b38f95ed03860ba642');
/*!40000 ALTER TABLE `typo3_typo3cr_domain_model_nodedata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_typo3cr_domain_model_nodedimension`
--

DROP TABLE IF EXISTS `typo3_typo3cr_domain_model_nodedimension`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_typo3cr_domain_model_nodedimension` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `nodedata` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`),
  UNIQUE KEY `UNIQ_6C144D3693BDC8E25E237E061D775834` (`nodedata`,`name`,`value`),
  KEY `IDX_6C144D3693BDC8E2` (`nodedata`),
  CONSTRAINT `FK_6C144D3693BDC8E2` FOREIGN KEY (`nodedata`) REFERENCES `typo3_typo3cr_domain_model_nodedata` (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_typo3cr_domain_model_nodedimension`
--

LOCK TABLES `typo3_typo3cr_domain_model_nodedimension` WRITE;
/*!40000 ALTER TABLE `typo3_typo3cr_domain_model_nodedimension` DISABLE KEYS */;
/*!40000 ALTER TABLE `typo3_typo3cr_domain_model_nodedimension` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_typo3cr_domain_model_workspace`
--

DROP TABLE IF EXISTS `typo3_typo3cr_domain_model_workspace`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_typo3cr_domain_model_workspace` (
  `baseworkspace` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rootnodedata` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`name`),
  KEY `IDX_71DE9CFBE9BFE681` (`baseworkspace`),
  KEY `IDX_71DE9CFBBB46155` (`rootnodedata`),
  CONSTRAINT `FK_71DE9CFBBB46155` FOREIGN KEY (`rootnodedata`) REFERENCES `typo3_typo3cr_domain_model_nodedata` (`persistence_object_identifier`),
  CONSTRAINT `FK_71DE9CFBE9BFE681` FOREIGN KEY (`baseworkspace`) REFERENCES `typo3_typo3cr_domain_model_workspace` (`name`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_typo3cr_domain_model_workspace`
--

LOCK TABLES `typo3_typo3cr_domain_model_workspace` WRITE;
/*!40000 ALTER TABLE `typo3_typo3cr_domain_model_workspace` DISABLE KEYS */;
INSERT INTO `typo3_typo3cr_domain_model_workspace` VALUES (NULL,'76655ebb-131c-7d0b-da06-3758bc7abf29','live'),('live','2f200266-deef-7331-15fa-d556de44b94e','user-gcopin');
/*!40000 ALTER TABLE `typo3_typo3cr_domain_model_workspace` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typo3_typo3cr_migration_domain_model_migrationstatus`
--

DROP TABLE IF EXISTS `typo3_typo3cr_migration_domain_model_migrationstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typo3_typo3cr_migration_domain_model_migrationstatus` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `direction` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `applicationtimestamp` datetime NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typo3_typo3cr_migration_domain_model_migrationstatus`
--

LOCK TABLES `typo3_typo3cr_migration_domain_model_migrationstatus` WRITE;
/*!40000 ALTER TABLE `typo3_typo3cr_migration_domain_model_migrationstatus` DISABLE KEYS */;
/*!40000 ALTER TABLE `typo3_typo3cr_migration_domain_model_migrationstatus` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-19 17:29:37
