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
  CONSTRAINT `FK_D459C58E6A8ABCDE` FOREIGN KEY (`parent_role`) REFERENCES `typo3_flow_security_policy_role` (`identifier`),
  CONSTRAINT `FK_D459C58E23A1047C` FOREIGN KEY (`flow_policy_role`) REFERENCES `typo3_flow_security_policy_role` (`identifier`)
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
  CONSTRAINT `FK_DAF7A1EB48D8C57E` FOREIGN KEY (`media_tag`) REFERENCES `typo3_media_domain_model_tag` (`persistence_object_identifier`),
  CONSTRAINT `FK_DAF7A1EB1DB69EED` FOREIGN KEY (`media_asset`) REFERENCES `typo3_media_domain_model_asset` (`persistence_object_identifier`)
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
  CONSTRAINT `typo3_party_domain_model_person_ibfk_3` FOREIGN KEY (`persistence_object_identifier`) REFERENCES `typo3_party_domain_model_abstractparty` (`persistence_object_identifier`) ON DELETE CASCADE,
  CONSTRAINT `typo3_party_domain_model_person_ibfk_1` FOREIGN KEY (`name`) REFERENCES `typo3_party_domain_model_personname` (`persistence_object_identifier`),
  CONSTRAINT `typo3_party_domain_model_person_ibfk_2` FOREIGN KEY (`primaryelectronicaddress`) REFERENCES `typo3_party_domain_model_electronicaddress` (`persistence_object_identifier`)
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
INSERT INTO `typo3_typo3cr_domain_model_nodedata` VALUES ('03d4e862-3da9-9ce8-d2cb-33dde6c78abf','live',NULL,'/sites/carvin/subpage/decouvrir-carvin','b8869a96-430e-2321-9153-9800b0140dea',200,'a:1:{s:5:\"title\";s:17:\"Découvrir Carvin\";}','TYPO3.Neos.NodeTypes:Page',0,0,NULL,NULL,0,'a:0:{}',4,'/sites/carvin/subpage','a0f45d74d2a47e5b42dbb6a7064c507f','d751713988987e9331980363e24189ce','a:0:{}','61a62d762255ded52487546b540f3609'),('0e065eaf-433c-0449-810f-d6363f100705','live',NULL,'/sites/carvin/mairie-24-24/teaser','b48ec991-040c-7b26-4362-fb1c09d43f9c',200,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/mairie-24-24','1e318c9b8d20d92e42bcb6aeb9fdcf9d','d751713988987e9331980363e24189ce','a:0:{}','8807b0aa3bbf37b38f95ed03860ba642'),('10c1bd67-3b87-2d6a-f341-b308be747436','live',NULL,'/sites/carvin/mairie-24-24','856a1543-a00c-7685-b1bd-0ed254285f59',300,'a:1:{s:5:\"title\";s:12:\"Mairie 24/24\";}','TYPO3.Neos.NodeTypes:Page',0,0,NULL,NULL,0,'a:0:{}',4,'/sites/carvin','8807b0aa3bbf37b38f95ed03860ba642','d751713988987e9331980363e24189ce','a:0:{}','642afa0c19b16ac6544b08240894835f'),('11be41f9-1399-948c-f0d6-32cb8821a787','live',NULL,'/sites/carvin/subpage/au-service-des-carvinois','547b9467-3c4f-98ba-8133-a97e544fcb00',300,'a:1:{s:5:\"title\";s:24:\"Au service des Carvinois\";}','TYPO3.Neos.NodeTypes:Page',0,0,NULL,NULL,0,'a:0:{}',4,'/sites/carvin/subpage','f2dbcc4fc11947bf8f00514bf623f6bc','d751713988987e9331980363e24189ce','a:0:{}','61a62d762255ded52487546b540f3609'),('141b2e17-a87c-42a4-8528-db3402bd1e2b','live',NULL,'/sites/carvin','617bacb9-6650-2783-e3d1-6d5dbe5d89a3',100,'a:4:{s:4:\"name\";s:6:\"Carvin\";s:5:\"title\";s:4:\"Home\";s:5:\"state\";s:1:\"1\";s:23:\"siteResourcesPackageKey\";s:9:\"GC.Carvin\";}','TYPO3.Neos.NodeTypes:Page',0,0,NULL,NULL,0,'a:0:{}',2,'/sites','642afa0c19b16ac6544b08240894835f','d751713988987e9331980363e24189ce','a:0:{}','dbd87ae51cbf5240fea77283585e69d5'),('2f200266-deef-7331-15fa-d556de44b94e','user-gcopin',NULL,'/','c5d31507-4bce-328a-799e-89e29d6bb0cd',NULL,'a:0:{}','unstructured',0,0,NULL,NULL,0,'a:0:{}',2,'','6666cd76f96956469e7be39d750cc7d9','d751713988987e9331980363e24189ce','a:0:{}','d41d8cd98f00b204e9800998ecf8427e'),('3c9820a2-4596-11fc-b866-98e51ccd2c84','live',NULL,'/sites/carvin/main','0204a4ef-0329-e625-9ac0-4ea0a34305e5',100,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',2,'/sites/carvin','ed096a85cae03258ee15eb8c0a924508','d751713988987e9331980363e24189ce','a:0:{}','642afa0c19b16ac6544b08240894835f'),('4da2358a-816b-6af8-21bb-5e08ec0ce8df','live',NULL,'/sites/carvin/main/text1','f25f5a0e-d225-01b6-1663-02c8a65c7f80',100,'a:1:{s:4:\"text\";s:28:\"<p>This is the homepages</p>\";}','TYPO3.Neos.NodeTypes:Text',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/main','a43e25b5cb7e87bd54561283663b51b2','d751713988987e9331980363e24189ce','a:0:{}','ed096a85cae03258ee15eb8c0a924508'),('61365e30-6d09-ff6f-a640-9de1d19ffe1c','live',NULL,'/sites/carvin/subpage/au-service-des-carvinois/main','473374e0-d8a2-df9e-ec2d-e417a537cf22',100,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/subpage/au-service-des-carvinois','1634442e5abc8ff715ab7b5f9b62554e','d751713988987e9331980363e24189ce','a:0:{}','f2dbcc4fc11947bf8f00514bf623f6bc'),('66ed310c-0af5-3dd4-3228-f3d2b1799761','live',NULL,'/sites/carvin/subpage/main','10d1fe1d-dc37-bf82-6a6a-68f424b7873c',100,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',2,'/sites/carvin/subpage','8c75b1a553f1c69c951f4dfb7b720a17','d751713988987e9331980363e24189ce','a:0:{}','61a62d762255ded52487546b540f3609'),('6ccd8f10-9425-021a-c2d3-b8e94973171e','live',NULL,'/sites/carvin/subpage/decouvrir-carvin/main','aa9cc4e5-e455-e093-a84c-0ebba4ac804b',100,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/subpage/decouvrir-carvin','548a10773ce7ea4af7c00e2d24a98e7b','d751713988987e9331980363e24189ce','a:0:{}','a0f45d74d2a47e5b42dbb6a7064c507f'),('70361f02-69d3-63c5-b5a4-02795d65ec6b','live',NULL,'/sites/carvin/subpage/au-service-des-carvinois/teaser','df6291a0-9ec7-c4c4-b536-d36ae65b48a6',200,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/subpage/au-service-des-carvinois','575b3615688099fb56c511e058e47ffa','d751713988987e9331980363e24189ce','a:0:{}','f2dbcc4fc11947bf8f00514bf623f6bc'),('722b323e-36cf-3e02-47fa-a5712090724c','live',NULL,'/sites/carvin/subpage/decouvrir-carvin/teaser','1dd7da0f-d9c6-b774-3ae7-5fb843fba594',200,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/subpage/decouvrir-carvin','9fc8fa08f5aee97864664f254776f3ac','d751713988987e9331980363e24189ce','a:0:{}','a0f45d74d2a47e5b42dbb6a7064c507f'),('7299fac6-1b2e-1dad-35fe-8d53cf98532e','live',NULL,'/sites/carvin/subpage/marie/teaser','05b97cae-1688-5026-c4ff-da8421ca4f5d',200,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/subpage/marie','92b8f4fcca2373b4609cecb3d8b7a524','d751713988987e9331980363e24189ce','a:0:{}','6d82ec1470dddbc86bfc3a1c51a49a10'),('75584932-700c-9787-d66b-023bf75d9f87','live',NULL,'/sites','aacd13e5-767d-4df9-a940-3c1948d28332',100,'a:0:{}','unstructured',0,0,NULL,NULL,0,'a:0:{}',1,'/','dbd87ae51cbf5240fea77283585e69d5','d751713988987e9331980363e24189ce','a:0:{}','6666cd76f96956469e7be39d750cc7d9'),('76655ebb-131c-7d0b-da06-3758bc7abf29','live',NULL,'/','f579692b-e17d-d1e6-f6b9-dd2801dbc72a',NULL,'a:0:{}','unstructured',0,0,NULL,NULL,0,'a:0:{}',2,'','6666cd76f96956469e7be39d750cc7d9','d751713988987e9331980363e24189ce','a:0:{}','d41d8cd98f00b204e9800998ecf8427e'),('8c76f074-b012-b155-dec1-bd99d5cc4b04','live',NULL,'/sites/carvin/subpage/marie','7d3cb8e7-918c-e9b1-8b01-d726e9de6828',250,'a:3:{s:5:\"title\";s:6:\"Mairie\";s:6:\"layout\";s:0:\"\";s:13:\"subpageLayout\";s:0:\"\";}','TYPO3.Neos.NodeTypes:Page',0,0,NULL,NULL,0,'a:0:{}',6,'/sites/carvin/subpage','6d82ec1470dddbc86bfc3a1c51a49a10','d751713988987e9331980363e24189ce','a:0:{}','61a62d762255ded52487546b540f3609'),('8cb13bcc-f35b-33ff-a36e-6c8fa0a8a860','live',NULL,'/sites/carvin/vie-associative','45cb4114-cbd8-a861-59c0-0691a1c0d0a5',250,'a:1:{s:5:\"title\";s:15:\"Vie associative\";}','TYPO3.Neos.NodeTypes:Page',0,0,NULL,NULL,0,'a:0:{}',4,'/sites/carvin','96d0fa1d3d6aa9ad8c19d3e700d54889','d751713988987e9331980363e24189ce','a:0:{}','642afa0c19b16ac6544b08240894835f'),('977fe8d8-a1c8-97b7-9003-33799b6f4fc0','live',NULL,'/sites/carvin/subpage/main/text1','30767fe2-c0e2-632a-3612-a420efa1cf4f',100,'a:1:{s:4:\"text\";s:33:\"<p>This is the first sub page</p>\";}','TYPO3.Neos.NodeTypes:Text',0,0,NULL,NULL,0,'a:0:{}',2,'/sites/carvin/subpage/main','e86ef07817b964a15742d4b0cb33463d','d751713988987e9331980363e24189ce','a:0:{}','8c75b1a553f1c69c951f4dfb7b720a17'),('b8463622-d6df-37ee-f15c-c04924e32be1','live',NULL,'/sites/carvin/subpage/marie/main','1fa35a3b-1a6c-04f1-3a79-c747d703bf47',100,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/subpage/marie','0e6adca07da1738a254103baaabf7b1c','d751713988987e9331980363e24189ce','a:0:{}','6d82ec1470dddbc86bfc3a1c51a49a10'),('bcf300f5-1ede-3723-47a0-d54d9495c4f1','live',NULL,'/sites/carvin/vie-associative/main','0fdc08d5-f688-2828-ff7f-3a5599a10507',100,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/vie-associative','2e918c324632950027d4795df8d72454','d751713988987e9331980363e24189ce','a:0:{}','96d0fa1d3d6aa9ad8c19d3e700d54889'),('c05cd7a5-5bed-4a1f-7cc2-010ce6c44a72','live',NULL,'/sites/carvin/subpage','5d409e7e-8bc0-b2d7-bc29-7e60b566e547',200,'a:1:{s:5:\"title\";s:9:\"Carvin fr\";}','TYPO3.Neos.NodeTypes:Page',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin','61a62d762255ded52487546b540f3609','d751713988987e9331980363e24189ce','a:0:{}','642afa0c19b16ac6544b08240894835f'),('de3fba94-55d9-f070-9868-62ae9a785491','live',NULL,'/sites/carvin/vie-associative/teaser','d8c077b4-874e-49b9-84e0-ddaf8012f0c4',200,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/vie-associative','54d441e1fb5a6471800295a241f2dce1','d751713988987e9331980363e24189ce','a:0:{}','96d0fa1d3d6aa9ad8c19d3e700d54889'),('ef235ad0-97a9-6e4f-be65-d1ef5c9a583c','live',NULL,'/sites/carvin/mairie-24-24/main','fba5cbe3-fb5c-b9c7-eff2-92f621f70e24',100,'a:0:{}','TYPO3.Neos:ContentCollection',0,0,NULL,NULL,0,'a:0:{}',3,'/sites/carvin/mairie-24-24','2c41e1ef50641473f9b9a26d0106a6b3','d751713988987e9331980363e24189ce','a:0:{}','8807b0aa3bbf37b38f95ed03860ba642');
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
  CONSTRAINT `FK_71DE9CFBE9BFE681` FOREIGN KEY (`baseworkspace`) REFERENCES `typo3_typo3cr_domain_model_workspace` (`name`) ON DELETE SET NULL,
  CONSTRAINT `FK_71DE9CFBBB46155` FOREIGN KEY (`rootnodedata`) REFERENCES `typo3_typo3cr_domain_model_nodedata` (`persistence_object_identifier`)
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

-- Dump completed on 2014-12-15 18:44:41
