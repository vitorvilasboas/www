-- MySQL dump 10.13  Distrib 5.5.55, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: sorveteria
-- ------------------------------------------------------
-- Server version	5.5.55-0ubuntu0.14.04.1

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
-- Current Database: `sorveteria`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `sorveteria` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sorveteria`;

--
-- Current Database: `phpmyadmin`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `phpmyadmin` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `phpmyadmin`;

--
-- Table structure for table `pma_bookmark`
--

DROP TABLE IF EXISTS `pma_bookmark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pma_bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pma_bookmark`
--

LOCK TABLES `pma_bookmark` WRITE;
/*!40000 ALTER TABLE `pma_bookmark` DISABLE KEYS */;
/*!40000 ALTER TABLE `pma_bookmark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pma_column_info`
--

DROP TABLE IF EXISTS `pma_column_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pma_column_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pma_column_info`
--

LOCK TABLES `pma_column_info` WRITE;
/*!40000 ALTER TABLE `pma_column_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `pma_column_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pma_designer_coords`
--

DROP TABLE IF EXISTS `pma_designer_coords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pma_designer_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `v` tinyint(4) DEFAULT NULL,
  `h` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for Designer';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pma_designer_coords`
--

LOCK TABLES `pma_designer_coords` WRITE;
/*!40000 ALTER TABLE `pma_designer_coords` DISABLE KEYS */;
/*!40000 ALTER TABLE `pma_designer_coords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pma_history`
--

DROP TABLE IF EXISTS `pma_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pma_history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pma_history`
--

LOCK TABLES `pma_history` WRITE;
/*!40000 ALTER TABLE `pma_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `pma_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pma_pdf_pages`
--

DROP TABLE IF EXISTS `pma_pdf_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pma_pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pma_pdf_pages`
--

LOCK TABLES `pma_pdf_pages` WRITE;
/*!40000 ALTER TABLE `pma_pdf_pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pma_pdf_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pma_recent`
--

DROP TABLE IF EXISTS `pma_recent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pma_recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pma_recent`
--

LOCK TABLES `pma_recent` WRITE;
/*!40000 ALTER TABLE `pma_recent` DISABLE KEYS */;
INSERT INTO `pma_recent` VALUES ('root','[{\"db\":\"locadora\",\"table\":\"carro\"}]');
/*!40000 ALTER TABLE `pma_recent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pma_relation`
--

DROP TABLE IF EXISTS `pma_relation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pma_relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pma_relation`
--

LOCK TABLES `pma_relation` WRITE;
/*!40000 ALTER TABLE `pma_relation` DISABLE KEYS */;
/*!40000 ALTER TABLE `pma_relation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pma_table_coords`
--

DROP TABLE IF EXISTS `pma_table_coords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pma_table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float unsigned NOT NULL DEFAULT '0',
  `y` float unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pma_table_coords`
--

LOCK TABLES `pma_table_coords` WRITE;
/*!40000 ALTER TABLE `pma_table_coords` DISABLE KEYS */;
/*!40000 ALTER TABLE `pma_table_coords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pma_table_info`
--

DROP TABLE IF EXISTS `pma_table_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pma_table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pma_table_info`
--

LOCK TABLES `pma_table_info` WRITE;
/*!40000 ALTER TABLE `pma_table_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `pma_table_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pma_table_uiprefs`
--

DROP TABLE IF EXISTS `pma_table_uiprefs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pma_table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`,`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pma_table_uiprefs`
--

LOCK TABLES `pma_table_uiprefs` WRITE;
/*!40000 ALTER TABLE `pma_table_uiprefs` DISABLE KEYS */;
/*!40000 ALTER TABLE `pma_table_uiprefs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pma_tracking`
--

DROP TABLE IF EXISTS `pma_tracking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pma_tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT COMMENT='Database changes tracking for phpMyAdmin';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pma_tracking`
--

LOCK TABLES `pma_tracking` WRITE;
/*!40000 ALTER TABLE `pma_tracking` DISABLE KEYS */;
/*!40000 ALTER TABLE `pma_tracking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pma_userconfig`
--

DROP TABLE IF EXISTS `pma_userconfig`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pma_userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pma_userconfig`
--

LOCK TABLES `pma_userconfig` WRITE;
/*!40000 ALTER TABLE `pma_userconfig` DISABLE KEYS */;
INSERT INTO `pma_userconfig` VALUES ('root','2017-05-23 23:13:46','{\"lang\":\"pt_BR\"}');
/*!40000 ALTER TABLE `pma_userconfig` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `mandala`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `mandala` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `mandala`;

--
-- Table structure for table `mdla_assets`
--

DROP TABLE IF EXISTS `mdla_assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_assets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set parent.',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `level` int(10) unsigned NOT NULL COMMENT 'The cached level in the nested tree.',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The unique name for the asset.\n',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The descriptive title for the asset.',
  `rules` varchar(5120) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'JSON encoded access control.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_asset_name` (`name`),
  KEY `idx_lft_rgt` (`lft`,`rgt`),
  KEY `idx_parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_assets`
--

LOCK TABLES `mdla_assets` WRITE;
/*!40000 ALTER TABLE `mdla_assets` DISABLE KEYS */;
INSERT INTO `mdla_assets` VALUES (1,0,0,139,0,'root.1','Root Asset','{\"core.login.site\":{\"6\":1,\"2\":1},\"core.login.admin\":{\"6\":1},\"core.login.offline\":{\"6\":1},\"core.admin\":{\"8\":1},\"core.manage\":{\"7\":1},\"core.create\":{\"6\":1,\"3\":1},\"core.delete\":{\"6\":1},\"core.edit\":{\"6\":1,\"4\":1},\"core.edit.state\":{\"6\":1,\"5\":1},\"core.edit.own\":{\"6\":1,\"3\":1}}'),(2,1,1,2,1,'com_admin','com_admin','{}'),(3,1,3,6,1,'com_banners','com_banners','{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1}}'),(4,1,7,8,1,'com_cache','com_cache','{\"core.admin\":{\"7\":1},\"core.manage\":{\"7\":1}}'),(5,1,9,10,1,'com_checkin','com_checkin','{\"core.admin\":{\"7\":1},\"core.manage\":{\"7\":1}}'),(6,1,11,12,1,'com_config','com_config','{}'),(7,1,13,16,1,'com_contact','com_contact','{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1}}'),(8,1,17,30,1,'com_content','com_content','{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1},\"core.create\":{\"3\":1},\"core.edit\":{\"4\":1},\"core.edit.state\":{\"5\":1}}'),(9,1,31,32,1,'com_cpanel','com_cpanel','{}'),(10,1,33,34,1,'com_installer','com_installer','{\"core.manage\":{\"7\":0},\"core.delete\":{\"7\":0},\"core.edit.state\":{\"7\":0}}'),(11,1,35,36,1,'com_languages','com_languages','{\"core.admin\":{\"7\":1}}'),(12,1,37,38,1,'com_login','com_login','{}'),(13,1,39,40,1,'com_mailto','com_mailto','{}'),(14,1,41,42,1,'com_massmail','com_massmail','{}'),(15,1,43,44,1,'com_media','com_media','{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1},\"core.create\":{\"3\":1},\"core.delete\":{\"5\":1}}'),(16,1,45,46,1,'com_menus','com_menus','{\"core.admin\":{\"7\":1}}'),(17,1,47,48,1,'com_messages','com_messages','{\"core.admin\":{\"7\":1},\"core.manage\":{\"7\":1}}'),(18,1,49,106,1,'com_modules','com_modules','{\"core.admin\":{\"7\":1}}'),(19,1,107,110,1,'com_newsfeeds','com_newsfeeds','{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1}}'),(20,1,111,112,1,'com_plugins','com_plugins','{\"core.admin\":{\"7\":1}}'),(21,1,113,114,1,'com_redirect','com_redirect','{\"core.admin\":{\"7\":1}}'),(22,1,115,116,1,'com_search','com_search','{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1}}'),(23,1,117,118,1,'com_templates','com_templates','{\"core.admin\":{\"7\":1}}'),(24,1,119,122,1,'com_users','com_users','{\"core.admin\":{\"7\":1}}'),(26,1,123,124,1,'com_wrapper','com_wrapper','{}'),(27,8,18,19,2,'com_content.category.2','Uncategorised','{}'),(28,3,4,5,2,'com_banners.category.3','Uncategorised','{}'),(29,7,14,15,2,'com_contact.category.4','Uncategorised','{}'),(30,19,108,109,2,'com_newsfeeds.category.5','Uncategorised','{}'),(32,24,120,121,2,'com_users.category.7','Uncategorised','{}'),(33,1,125,126,1,'com_finder','com_finder','{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1}}'),(34,1,127,128,1,'com_joomlaupdate','com_joomlaupdate','{}'),(35,1,129,130,1,'com_tags','com_tags','{}'),(36,1,131,132,1,'com_contenthistory','com_contenthistory','{}'),(37,1,133,134,1,'com_ajax','com_ajax','{}'),(38,1,135,136,1,'com_postinstall','com_postinstall','{}'),(39,18,50,51,2,'com_modules.module.1','Main Menu','{}'),(40,18,52,53,2,'com_modules.module.2','Login','{}'),(41,18,54,55,2,'com_modules.module.3','Popular Articles','{}'),(42,18,56,57,2,'com_modules.module.4','Recently Added Articles','{}'),(43,18,58,59,2,'com_modules.module.8','Toolbar','{}'),(44,18,60,61,2,'com_modules.module.9','Quick Icons','{}'),(45,18,62,63,2,'com_modules.module.10','Logged-in Users','{}'),(46,18,64,65,2,'com_modules.module.12','Admin Menu','{}'),(47,18,66,67,2,'com_modules.module.13','Admin Submenu','{}'),(48,18,68,69,2,'com_modules.module.14','User Status','{}'),(49,18,70,71,2,'com_modules.module.15','Title','{}'),(50,18,72,73,2,'com_modules.module.16','Login Form','{}'),(51,18,74,75,2,'com_modules.module.17','Breadcrumbs','{}'),(52,18,76,77,2,'com_modules.module.79','Multilanguage status','{}'),(53,18,78,79,2,'com_modules.module.86','Joomla Version','{}'),(54,18,80,81,2,'com_modules.module.87','Popular Tags','{\"core.delete\":{\"6\":1},\"core.edit\":{\"6\":1,\"4\":1},\"core.edit.state\":{\"6\":1,\"5\":1}}'),(55,18,82,83,2,'com_modules.module.88','Site Information','{\"core.delete\":{\"6\":1},\"core.edit\":{\"6\":1,\"4\":1},\"core.edit.state\":{\"6\":1,\"5\":1}}'),(56,18,84,85,2,'com_modules.module.89','Release News','{\"core.delete\":{\"6\":1},\"core.edit\":{\"6\":1,\"4\":1},\"core.edit.state\":{\"6\":1,\"5\":1}}'),(57,18,86,87,2,'com_modules.module.90','Latest Articles','{\"core.delete\":{\"6\":1},\"core.edit\":{\"6\":1,\"4\":1},\"core.edit.state\":{\"6\":1,\"5\":1},\"module.edit.frontend\":[]}'),(58,18,88,89,2,'com_modules.module.91','User Menu','{\"core.delete\":{\"6\":1},\"core.edit\":{\"6\":1,\"4\":1},\"core.edit.state\":{\"6\":1,\"5\":1}}'),(59,18,90,91,2,'com_modules.module.92','Image Module','{\"core.delete\":{\"6\":1},\"core.edit\":{\"6\":1,\"4\":1},\"core.edit.state\":{\"6\":1,\"5\":1}}'),(60,18,92,93,2,'com_modules.module.93','Search','{\"core.delete\":{\"6\":1},\"core.edit\":{\"6\":1,\"4\":1},\"core.edit.state\":{\"6\":1,\"5\":1}}'),(61,69,27,28,3,'com_content.article.1','Home','{\"core.delete\":{\"6\":1},\"core.edit\":{\"6\":1,\"4\":1},\"core.edit.state\":{\"6\":1,\"5\":1}}'),(63,1,137,138,1,'#__languages.2','#__languages.2','{}'),(64,18,94,95,2,'com_modules.module.94','AS Sequence Slider','{\"core.delete\":[],\"core.edit\":[],\"core.edit.state\":[],\"module.edit.frontend\":[]}'),(65,18,96,97,2,'com_modules.module.95','AS Superfish Menu','{\"core.delete\":[],\"core.edit\":[],\"core.edit.state\":[],\"module.edit.frontend\":[]}'),(66,18,98,99,2,'com_modules.module.96','AS ArtSlider','{\"core.delete\":[],\"core.edit\":[],\"core.edit.state\":[],\"module.edit.frontend\":[]}'),(67,69,21,22,3,'com_content.article.2','Plantio Sustentável','{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1},\"core.create\":{\"3\":1},\"core.edit\":{\"4\":1},\"core.edit.state\":{\"5\":1}}'),(68,18,100,101,2,'com_modules.module.97','JM Slideshow Responsive','{\"core.delete\":[],\"core.edit\":[],\"core.edit.state\":[],\"module.edit.frontend\":[]}'),(69,8,20,29,2,'com_content.category.8','Slides','{}'),(70,69,23,24,3,'com_content.article.3','Agricultura Familiar','{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1},\"core.create\":{\"3\":1},\"core.edit\":{\"4\":1},\"core.edit.state\":{\"5\":1}}'),(71,69,25,26,3,'com_content.article.4','Projeto Mandala','{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1},\"core.create\":{\"3\":1},\"core.edit\":{\"4\":1},\"core.edit.state\":{\"5\":1}}'),(72,18,102,103,2,'com_modules.module.98','Articles - Newsflash (Advanced)','{\"core.delete\":[],\"core.edit\":[],\"core.edit.state\":[],\"module.edit.frontend\":[]}'),(73,18,104,105,2,'com_modules.module.99','JoomSpirit Slider','{\"core.delete\":[],\"core.edit\":[],\"core.edit.state\":[],\"module.edit.frontend\":[]}');
/*!40000 ALTER TABLE `mdla_assets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_associations`
--

DROP TABLE IF EXISTS `mdla_associations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_associations` (
  `id` int(11) NOT NULL COMMENT 'A reference to the associated item.',
  `context` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The context of the associated item.',
  `key` char(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The key for the association computed from an md5 on associated ids.',
  PRIMARY KEY (`context`,`id`),
  KEY `idx_key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_associations`
--

LOCK TABLES `mdla_associations` WRITE;
/*!40000 ALTER TABLE `mdla_associations` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_associations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_banner_clients`
--

DROP TABLE IF EXISTS `mdla_banner_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_banner_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `extrainfo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `metakey` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `own_prefix` tinyint(4) NOT NULL DEFAULT '0',
  `metakey_prefix` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `purchase_type` tinyint(4) NOT NULL DEFAULT '-1',
  `track_clicks` tinyint(4) NOT NULL DEFAULT '-1',
  `track_impressions` tinyint(4) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`),
  KEY `idx_own_prefix` (`own_prefix`),
  KEY `idx_metakey_prefix` (`metakey_prefix`(100))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_banner_clients`
--

LOCK TABLES `mdla_banner_clients` WRITE;
/*!40000 ALTER TABLE `mdla_banner_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_banner_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_banner_tracks`
--

DROP TABLE IF EXISTS `mdla_banner_tracks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_banner_tracks` (
  `track_date` datetime NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL,
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`track_date`,`track_type`,`banner_id`),
  KEY `idx_track_date` (`track_date`),
  KEY `idx_track_type` (`track_type`),
  KEY `idx_banner_id` (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_banner_tracks`
--

LOCK TABLES `mdla_banner_tracks` WRITE;
/*!40000 ALTER TABLE `mdla_banner_tracks` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_banner_tracks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_banners`
--

DROP TABLE IF EXISTS `mdla_banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `imptotal` int(11) NOT NULL DEFAULT '0',
  `impmade` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `clickurl` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custombannercode` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `params` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `own_prefix` tinyint(1) NOT NULL DEFAULT '0',
  `metakey_prefix` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `purchase_type` tinyint(4) NOT NULL DEFAULT '-1',
  `track_clicks` tinyint(4) NOT NULL DEFAULT '-1',
  `track_impressions` tinyint(4) NOT NULL DEFAULT '-1',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reset` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `language` char(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_state` (`state`),
  KEY `idx_own_prefix` (`own_prefix`),
  KEY `idx_metakey_prefix` (`metakey_prefix`(100)),
  KEY `idx_banner_catid` (`catid`),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_banners`
--

LOCK TABLES `mdla_banners` WRITE;
/*!40000 ALTER TABLE `mdla_banners` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_categories`
--

DROP TABLE IF EXISTS `mdla_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `extension` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadesc` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'The meta description for the page.',
  `metakey` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'The meta keywords for the page.',
  `metadata` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'JSON encoded metadata properties.',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `cat_idx` (`extension`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_path` (`path`(100)),
  KEY `idx_left_right` (`lft`,`rgt`),
  KEY `idx_alias` (`alias`(100)),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_categories`
--

LOCK TABLES `mdla_categories` WRITE;
/*!40000 ALTER TABLE `mdla_categories` DISABLE KEYS */;
INSERT INTO `mdla_categories` VALUES (1,0,0,0,13,0,'','system','ROOT','root','','',1,0,'0000-00-00 00:00:00',1,'{}','','','{}',343,'2017-05-10 05:04:12',0,'0000-00-00 00:00:00',0,'*',1),(2,27,1,1,2,1,'uncategorised','com_content','Uncategorised','uncategorised','','',1,0,'0000-00-00 00:00:00',1,'{\"category_layout\":\"\",\"image\":\"\"}','','','{\"author\":\"\",\"robots\":\"\"}',343,'2017-05-10 05:04:12',0,'0000-00-00 00:00:00',0,'*',1),(3,28,1,3,4,1,'uncategorised','com_banners','Uncategorised','uncategorised','','',1,0,'0000-00-00 00:00:00',1,'{\"category_layout\":\"\",\"image\":\"\"}','','','{\"author\":\"\",\"robots\":\"\"}',343,'2017-05-10 05:04:12',0,'0000-00-00 00:00:00',0,'*',1),(4,29,1,5,6,1,'uncategorised','com_contact','Uncategorised','uncategorised','','',1,0,'0000-00-00 00:00:00',1,'{\"category_layout\":\"\",\"image\":\"\"}','','','{\"author\":\"\",\"robots\":\"\"}',343,'2017-05-10 05:04:12',0,'0000-00-00 00:00:00',0,'*',1),(5,30,1,7,8,1,'uncategorised','com_newsfeeds','Uncategorised','uncategorised','','',1,0,'0000-00-00 00:00:00',1,'{\"category_layout\":\"\",\"image\":\"\"}','','','{\"author\":\"\",\"robots\":\"\"}',343,'2017-05-10 05:04:12',0,'0000-00-00 00:00:00',0,'*',1),(7,32,1,9,10,1,'uncategorised','com_users','Uncategorised','uncategorised','','',1,0,'0000-00-00 00:00:00',1,'{\"category_layout\":\"\",\"image\":\"\"}','','','{\"author\":\"\",\"robots\":\"\"}',343,'2017-05-10 05:04:12',0,'0000-00-00 00:00:00',0,'*',1),(8,69,1,11,12,1,'slides','com_content','Slides','slides','','',1,0,'0000-00-00 00:00:00',1,'{\"category_layout\":\"\",\"image\":\"\",\"image_alt\":\"\"}','','','{\"author\":\"\",\"robots\":\"\"}',343,'2017-05-17 19:36:08',343,'2017-05-20 19:40:57',0,'*',1);
/*!40000 ALTER TABLE `mdla_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_contact_details`
--

DROP TABLE IF EXISTS `mdla_contact_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_contact_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `con_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `suburb` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `misc` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_con` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `params` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `catid` int(11) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `webpage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sortname1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sortname2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sortname3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `language` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadata` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if contact is featured.',
  `xreference` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`published`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_featured_catid` (`featured`,`catid`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_contact_details`
--

LOCK TABLES `mdla_contact_details` WRITE;
/*!40000 ALTER TABLE `mdla_contact_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_contact_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_content`
--

DROP TABLE IF EXISTS `mdla_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `introtext` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fulltext` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `urls` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribs` varchar(5120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `metadata` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if article is featured.',
  `language` char(7) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The language code for the article.',
  `xreference` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'A reference to enable linkages to external data sets.',
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_featured_catid` (`featured`,`catid`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_content`
--

LOCK TABLES `mdla_content` WRITE;
/*!40000 ALTER TABLE `mdla_content` DISABLE KEYS */;
INSERT INTO `mdla_content` VALUES (1,61,'Home','getting-started','<p>Página Inicial do Projeto Mandala idealizado por professores do Instituto Federal de Educação, Ciência e Tecnologia do Tocantins - Campus Avançado Formoso do Araguaia</p>','',1,8,'2017-05-10 05:04:12',343,'','2017-05-21 01:08:07',343,0,'0000-00-00 00:00:00','2017-05-10 05:04:12','0000-00-00 00:00:00','{\"image_intro\":\"\",\"float_intro\":\"\",\"image_intro_alt\":\"\",\"image_intro_caption\":\"\",\"image_fulltext\":\"\",\"float_fulltext\":\"\",\"image_fulltext_alt\":\"\",\"image_fulltext_caption\":\"\"}','{\"urla\":false,\"urlatext\":\"\",\"targeta\":\"\",\"urlb\":false,\"urlbtext\":\"\",\"targetb\":\"\",\"urlc\":false,\"urlctext\":\"\",\"targetc\":\"\"}','{\"article_layout\":\"\",\"show_title\":\"\",\"link_titles\":\"\",\"show_tags\":\"\",\"show_intro\":\"\",\"info_block_position\":\"\",\"info_block_show_title\":\"\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_associations\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"urls_position\":\"\",\"alternative_readmore\":\"\",\"article_page_title\":\"\",\"show_publishing_options\":\"\",\"show_article_options\":\"\",\"show_urls_images_backend\":\"\",\"show_urls_images_frontend\":\"\",\"spfeatured_image\":\"\",\"post_format\":\"standard\",\"gallery\":\"\",\"audio\":\"\",\"video\":\"\",\"link_title\":\"\",\"link_url\":\"\",\"quote_text\":\"\",\"quote_author\":\"\",\"post_status\":\"\"}',12,2,'','',1,150,'{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}',0,'*',''),(2,67,'Plantio Sustentável','artigo-1','<p>Texto introdutório referente ao projeto de agricultura sustentável implantado nas dependências do Instituto Federal do Tocantins CA Formoso do Araguaia.</p>\r\n','\r\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.</p>\r\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.</p>',1,8,'2017-05-17 19:20:23',343,'','2017-05-21 02:01:27',343,0,'0000-00-00 00:00:00','2017-05-17 19:20:23','0000-00-00 00:00:00','{\"image_intro\":\"images\\/sampledata\\/parks\\/a_view_to_fagaras_hdr_by_scorpionentity.jpg\",\"float_intro\":\"none\",\"image_intro_alt\":\"\",\"image_intro_caption\":\"\",\"image_fulltext\":\"images\\/sampledata\\/parks\\/8b9f88c0d2dd516c176c760f606f6916.jpg\",\"float_fulltext\":\"left\",\"image_fulltext_alt\":\"\",\"image_fulltext_caption\":\"\"}','{\"urla\":false,\"urlatext\":\"\",\"targeta\":\"\",\"urlb\":false,\"urlbtext\":\"\",\"targetb\":\"\",\"urlc\":false,\"urlctext\":\"\",\"targetc\":\"\"}','{\"article_layout\":\"\",\"show_title\":\"\",\"link_titles\":\"\",\"show_tags\":\"\",\"show_intro\":\"\",\"info_block_position\":\"\",\"info_block_show_title\":\"\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_associations\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"urls_position\":\"\",\"alternative_readmore\":\"Leia mais\",\"article_page_title\":\"\",\"show_publishing_options\":\"\",\"show_article_options\":\"\",\"show_urls_images_backend\":\"\",\"show_urls_images_frontend\":\"\",\"spfeatured_image\":\"\",\"post_format\":\"standard\",\"gallery\":\"\",\"audio\":\"\",\"video\":\"\",\"link_title\":\"\",\"link_url\":\"\",\"quote_text\":\"\",\"quote_author\":\"\",\"post_status\":\"\"}',22,0,'','',1,1,'{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}',1,'*',''),(3,70,'Agricultura Familiar','artigo-2','<p>Texto introdutório referente ao projeto de agricultura sustentável implantado nas dependências do Instituto Federal do Tocantins CA Formoso do Araguaia.</p>\r\n','\r\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.</p>\r\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.</p>',1,8,'2017-05-17 19:38:38',343,'','2017-05-21 02:01:13',343,0,'0000-00-00 00:00:00','2017-05-17 19:38:38','0000-00-00 00:00:00','{\"image_intro\":\"images\\/sampledata\\/parks\\/agricultura-familiar-2-1140x641.jpg\",\"float_intro\":\"none\",\"image_intro_alt\":\"\",\"image_intro_caption\":\"\",\"image_fulltext\":\"images\\/sampledata\\/fruitshop\\/bananas_2.jpg\",\"float_fulltext\":\"right\",\"image_fulltext_alt\":\"\",\"image_fulltext_caption\":\"\"}','{\"urla\":false,\"urlatext\":\"\",\"targeta\":\"\",\"urlb\":false,\"urlbtext\":\"\",\"targetb\":\"\",\"urlc\":false,\"urlctext\":\"\",\"targetc\":\"\"}','{\"article_layout\":\"\",\"show_title\":\"\",\"link_titles\":\"\",\"show_tags\":\"\",\"show_intro\":\"\",\"info_block_position\":\"\",\"info_block_show_title\":\"\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_associations\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"urls_position\":\"\",\"alternative_readmore\":\"Leia mais\",\"article_page_title\":\"\",\"show_publishing_options\":\"\",\"show_article_options\":\"\",\"show_urls_images_backend\":\"\",\"show_urls_images_frontend\":\"\",\"spfeatured_image\":\"\",\"post_format\":\"standard\",\"gallery\":\"\",\"audio\":\"\",\"video\":\"\",\"link_title\":\"\",\"link_url\":\"\",\"quote_text\":\"\",\"quote_author\":\"\",\"post_status\":\"\"}',8,1,'','',1,4,'{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}',1,'*',''),(4,71,'Projeto Mandala','artigo-3','<p>Texto introdutório referente ao projeto de agricultura sustentável implantado nas dependências do Instituto Federal do Tocantins CA Formoso do Araguaia.</p>\r\n','\r\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.</p>\r\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.</p>',1,8,'2017-05-17 19:39:20',343,'','2017-05-21 02:01:41',343,0,'0000-00-00 00:00:00','2017-05-17 19:39:20','0000-00-00 00:00:00','{\"image_intro\":\"images\\/sampledata\\/parks\\/4756981_x720.jpg\",\"float_intro\":\"none\",\"image_intro_alt\":\"\",\"image_intro_caption\":\"\",\"image_fulltext\":\"images\\/sampledata\\/parks\\/landscape\\/800px_pinnacles_western_australia.jpg\",\"float_fulltext\":\"left\",\"image_fulltext_alt\":\"\",\"image_fulltext_caption\":\"\"}','{\"urla\":false,\"urlatext\":\"\",\"targeta\":\"\",\"urlb\":false,\"urlbtext\":\"\",\"targetb\":\"\",\"urlc\":false,\"urlctext\":\"\",\"targetc\":\"\"}','{\"article_layout\":\"\",\"show_title\":\"\",\"link_titles\":\"\",\"show_tags\":\"\",\"show_intro\":\"\",\"info_block_position\":\"\",\"info_block_show_title\":\"\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_associations\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"urls_position\":\"\",\"alternative_readmore\":\"Leia mais\",\"article_page_title\":\"\",\"show_publishing_options\":\"\",\"show_article_options\":\"\",\"show_urls_images_backend\":\"\",\"show_urls_images_frontend\":\"\",\"spfeatured_image\":\"\",\"post_format\":\"standard\",\"gallery\":\"\",\"audio\":\"\",\"video\":\"\",\"link_title\":\"\",\"link_url\":\"\",\"quote_text\":\"\",\"quote_author\":\"\",\"post_status\":\"\"}',8,0,'','',1,3,'{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}',1,'*','');
/*!40000 ALTER TABLE `mdla_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_content_frontpage`
--

DROP TABLE IF EXISTS `mdla_content_frontpage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_content_frontpage` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_content_frontpage`
--

LOCK TABLES `mdla_content_frontpage` WRITE;
/*!40000 ALTER TABLE `mdla_content_frontpage` DISABLE KEYS */;
INSERT INTO `mdla_content_frontpage` VALUES (2,3),(3,2),(4,1);
/*!40000 ALTER TABLE `mdla_content_frontpage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_content_rating`
--

DROP TABLE IF EXISTS `mdla_content_rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_content_rating` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(10) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(10) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_content_rating`
--

LOCK TABLES `mdla_content_rating` WRITE;
/*!40000 ALTER TABLE `mdla_content_rating` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_content_rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_content_types`
--

DROP TABLE IF EXISTS `mdla_content_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_content_types` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `type_alias` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `rules` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_mappings` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `router` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content_history_options` varchar(5120) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'JSON string for com_contenthistory options',
  PRIMARY KEY (`type_id`),
  KEY `idx_alias` (`type_alias`(100))
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_content_types`
--

LOCK TABLES `mdla_content_types` WRITE;
/*!40000 ALTER TABLE `mdla_content_types` DISABLE KEYS */;
INSERT INTO `mdla_content_types` VALUES (1,'Article','com_content.article','{\"special\":{\"dbtable\":\"#__content\",\"key\":\"id\",\"type\":\"Content\",\"prefix\":\"JTable\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"JTable\",\"config\":\"array()\"}}','','{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"title\",\"core_state\":\"state\",\"core_alias\":\"alias\",\"core_created_time\":\"created\",\"core_modified_time\":\"modified\",\"core_body\":\"introtext\", \"core_hits\":\"hits\",\"core_publish_up\":\"publish_up\",\"core_publish_down\":\"publish_down\",\"core_access\":\"access\", \"core_params\":\"attribs\", \"core_featured\":\"featured\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"images\", \"core_urls\":\"urls\", \"core_version\":\"version\", \"core_ordering\":\"ordering\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"catid\", \"core_xreference\":\"xreference\", \"asset_id\":\"asset_id\"}, \"special\":{\"fulltext\":\"fulltext\"}}','ContentHelperRoute::getArticleRoute','{\"formFile\":\"administrator\\/components\\/com_content\\/models\\/forms\\/article.xml\", \"hideFields\":[\"asset_id\",\"checked_out\",\"checked_out_time\",\"version\"],\"ignoreChanges\":[\"modified_by\", \"modified\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\"],\"convertToInt\":[\"publish_up\", \"publish_down\", \"featured\", \"ordering\"],\"displayLookup\":[{\"sourceColumn\":\"catid\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"created_by\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"modified_by\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"} ]}'),(2,'Contact','com_contact.contact','{\"special\":{\"dbtable\":\"#__contact_details\",\"key\":\"id\",\"type\":\"Contact\",\"prefix\":\"ContactTable\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"JTable\",\"config\":\"array()\"}}','','{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"name\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created\",\"core_modified_time\":\"modified\",\"core_body\":\"address\", \"core_hits\":\"hits\",\"core_publish_up\":\"publish_up\",\"core_publish_down\":\"publish_down\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"featured\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"image\", \"core_urls\":\"webpage\", \"core_version\":\"version\", \"core_ordering\":\"ordering\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"catid\", \"core_xreference\":\"xreference\", \"asset_id\":\"null\"}, \"special\":{\"con_position\":\"con_position\",\"suburb\":\"suburb\",\"state\":\"state\",\"country\":\"country\",\"postcode\":\"postcode\",\"telephone\":\"telephone\",\"fax\":\"fax\",\"misc\":\"misc\",\"email_to\":\"email_to\",\"default_con\":\"default_con\",\"user_id\":\"user_id\",\"mobile\":\"mobile\",\"sortname1\":\"sortname1\",\"sortname2\":\"sortname2\",\"sortname3\":\"sortname3\"}}','ContactHelperRoute::getContactRoute','{\"formFile\":\"administrator\\/components\\/com_contact\\/models\\/forms\\/contact.xml\",\"hideFields\":[\"default_con\",\"checked_out\",\"checked_out_time\",\"version\",\"xreference\"],\"ignoreChanges\":[\"modified_by\", \"modified\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\"],\"convertToInt\":[\"publish_up\", \"publish_down\", \"featured\", \"ordering\"], \"displayLookup\":[ {\"sourceColumn\":\"created_by\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"catid\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"modified_by\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"} ] }'),(3,'Newsfeed','com_newsfeeds.newsfeed','{\"special\":{\"dbtable\":\"#__newsfeeds\",\"key\":\"id\",\"type\":\"Newsfeed\",\"prefix\":\"NewsfeedsTable\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"JTable\",\"config\":\"array()\"}}','','{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"name\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created\",\"core_modified_time\":\"modified\",\"core_body\":\"description\", \"core_hits\":\"hits\",\"core_publish_up\":\"publish_up\",\"core_publish_down\":\"publish_down\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"featured\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"images\", \"core_urls\":\"link\", \"core_version\":\"version\", \"core_ordering\":\"ordering\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"catid\", \"core_xreference\":\"xreference\", \"asset_id\":\"null\"}, \"special\":{\"numarticles\":\"numarticles\",\"cache_time\":\"cache_time\",\"rtl\":\"rtl\"}}','NewsfeedsHelperRoute::getNewsfeedRoute','{\"formFile\":\"administrator\\/components\\/com_newsfeeds\\/models\\/forms\\/newsfeed.xml\",\"hideFields\":[\"asset_id\",\"checked_out\",\"checked_out_time\",\"version\"],\"ignoreChanges\":[\"modified_by\", \"modified\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\"],\"convertToInt\":[\"publish_up\", \"publish_down\", \"featured\", \"ordering\"],\"displayLookup\":[{\"sourceColumn\":\"catid\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"created_by\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"modified_by\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"} ]}'),(4,'User','com_users.user','{\"special\":{\"dbtable\":\"#__users\",\"key\":\"id\",\"type\":\"User\",\"prefix\":\"JTable\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"JTable\",\"config\":\"array()\"}}','','{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"name\",\"core_state\":\"null\",\"core_alias\":\"username\",\"core_created_time\":\"registerdate\",\"core_modified_time\":\"lastvisitDate\",\"core_body\":\"null\", \"core_hits\":\"null\",\"core_publish_up\":\"null\",\"core_publish_down\":\"null\",\"access\":\"null\", \"core_params\":\"params\", \"core_featured\":\"null\", \"core_metadata\":\"null\", \"core_language\":\"null\", \"core_images\":\"null\", \"core_urls\":\"null\", \"core_version\":\"null\", \"core_ordering\":\"null\", \"core_metakey\":\"null\", \"core_metadesc\":\"null\", \"core_catid\":\"null\", \"core_xreference\":\"null\", \"asset_id\":\"null\"}, \"special\":{}}','UsersHelperRoute::getUserRoute',''),(5,'Article Category','com_content.category','{\"special\":{\"dbtable\":\"#__categories\",\"key\":\"id\",\"type\":\"Category\",\"prefix\":\"JTable\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"JTable\",\"config\":\"array()\"}}','','{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"title\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created_time\",\"core_modified_time\":\"modified_time\",\"core_body\":\"description\", \"core_hits\":\"hits\",\"core_publish_up\":\"null\",\"core_publish_down\":\"null\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"null\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"null\", \"core_urls\":\"null\", \"core_version\":\"version\", \"core_ordering\":\"null\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"parent_id\", \"core_xreference\":\"null\", \"asset_id\":\"asset_id\"}, \"special\":{\"parent_id\":\"parent_id\",\"lft\":\"lft\",\"rgt\":\"rgt\",\"level\":\"level\",\"path\":\"path\",\"extension\":\"extension\",\"note\":\"note\"}}','ContentHelperRoute::getCategoryRoute','{\"formFile\":\"administrator\\/components\\/com_categories\\/models\\/forms\\/category.xml\", \"hideFields\":[\"asset_id\",\"checked_out\",\"checked_out_time\",\"version\",\"lft\",\"rgt\",\"level\",\"path\",\"extension\"], \"ignoreChanges\":[\"modified_user_id\", \"modified_time\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\", \"path\"],\"convertToInt\":[\"publish_up\", \"publish_down\"], \"displayLookup\":[{\"sourceColumn\":\"created_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"modified_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"parent_id\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"}]}'),(6,'Contact Category','com_contact.category','{\"special\":{\"dbtable\":\"#__categories\",\"key\":\"id\",\"type\":\"Category\",\"prefix\":\"JTable\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"JTable\",\"config\":\"array()\"}}','','{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"title\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created_time\",\"core_modified_time\":\"modified_time\",\"core_body\":\"description\", \"core_hits\":\"hits\",\"core_publish_up\":\"null\",\"core_publish_down\":\"null\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"null\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"null\", \"core_urls\":\"null\", \"core_version\":\"version\", \"core_ordering\":\"null\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"parent_id\", \"core_xreference\":\"null\", \"asset_id\":\"asset_id\"}, \"special\":{\"parent_id\":\"parent_id\",\"lft\":\"lft\",\"rgt\":\"rgt\",\"level\":\"level\",\"path\":\"path\",\"extension\":\"extension\",\"note\":\"note\"}}','ContactHelperRoute::getCategoryRoute','{\"formFile\":\"administrator\\/components\\/com_categories\\/models\\/forms\\/category.xml\", \"hideFields\":[\"asset_id\",\"checked_out\",\"checked_out_time\",\"version\",\"lft\",\"rgt\",\"level\",\"path\",\"extension\"], \"ignoreChanges\":[\"modified_user_id\", \"modified_time\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\", \"path\"],\"convertToInt\":[\"publish_up\", \"publish_down\"], \"displayLookup\":[{\"sourceColumn\":\"created_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"modified_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"parent_id\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"}]}'),(7,'Newsfeeds Category','com_newsfeeds.category','{\"special\":{\"dbtable\":\"#__categories\",\"key\":\"id\",\"type\":\"Category\",\"prefix\":\"JTable\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"JTable\",\"config\":\"array()\"}}','','{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"title\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created_time\",\"core_modified_time\":\"modified_time\",\"core_body\":\"description\", \"core_hits\":\"hits\",\"core_publish_up\":\"null\",\"core_publish_down\":\"null\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"null\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"null\", \"core_urls\":\"null\", \"core_version\":\"version\", \"core_ordering\":\"null\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"parent_id\", \"core_xreference\":\"null\", \"asset_id\":\"asset_id\"}, \"special\":{\"parent_id\":\"parent_id\",\"lft\":\"lft\",\"rgt\":\"rgt\",\"level\":\"level\",\"path\":\"path\",\"extension\":\"extension\",\"note\":\"note\"}}','NewsfeedsHelperRoute::getCategoryRoute','{\"formFile\":\"administrator\\/components\\/com_categories\\/models\\/forms\\/category.xml\", \"hideFields\":[\"asset_id\",\"checked_out\",\"checked_out_time\",\"version\",\"lft\",\"rgt\",\"level\",\"path\",\"extension\"], \"ignoreChanges\":[\"modified_user_id\", \"modified_time\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\", \"path\"],\"convertToInt\":[\"publish_up\", \"publish_down\"], \"displayLookup\":[{\"sourceColumn\":\"created_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"modified_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"parent_id\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"}]}'),(8,'Tag','com_tags.tag','{\"special\":{\"dbtable\":\"#__tags\",\"key\":\"tag_id\",\"type\":\"Tag\",\"prefix\":\"TagsTable\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"JTable\",\"config\":\"array()\"}}','','{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"title\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created_time\",\"core_modified_time\":\"modified_time\",\"core_body\":\"description\", \"core_hits\":\"hits\",\"core_publish_up\":\"null\",\"core_publish_down\":\"null\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"featured\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"images\", \"core_urls\":\"urls\", \"core_version\":\"version\", \"core_ordering\":\"null\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"null\", \"core_xreference\":\"null\", \"asset_id\":\"null\"}, \"special\":{\"parent_id\":\"parent_id\",\"lft\":\"lft\",\"rgt\":\"rgt\",\"level\":\"level\",\"path\":\"path\"}}','TagsHelperRoute::getTagRoute','{\"formFile\":\"administrator\\/components\\/com_tags\\/models\\/forms\\/tag.xml\", \"hideFields\":[\"checked_out\",\"checked_out_time\",\"version\", \"lft\", \"rgt\", \"level\", \"path\", \"urls\", \"publish_up\", \"publish_down\"],\"ignoreChanges\":[\"modified_user_id\", \"modified_time\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\", \"path\"],\"convertToInt\":[\"publish_up\", \"publish_down\"], \"displayLookup\":[{\"sourceColumn\":\"created_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"}, {\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"}, {\"sourceColumn\":\"modified_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"}]}'),(9,'Banner','com_banners.banner','{\"special\":{\"dbtable\":\"#__banners\",\"key\":\"id\",\"type\":\"Banner\",\"prefix\":\"BannersTable\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"JTable\",\"config\":\"array()\"}}','','{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"name\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created\",\"core_modified_time\":\"modified\",\"core_body\":\"description\", \"core_hits\":\"null\",\"core_publish_up\":\"publish_up\",\"core_publish_down\":\"publish_down\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"null\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"images\", \"core_urls\":\"link\", \"core_version\":\"version\", \"core_ordering\":\"ordering\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"catid\", \"core_xreference\":\"null\", \"asset_id\":\"null\"}, \"special\":{\"imptotal\":\"imptotal\", \"impmade\":\"impmade\", \"clicks\":\"clicks\", \"clickurl\":\"clickurl\", \"custombannercode\":\"custombannercode\", \"cid\":\"cid\", \"purchase_type\":\"purchase_type\", \"track_impressions\":\"track_impressions\", \"track_clicks\":\"track_clicks\"}}','','{\"formFile\":\"administrator\\/components\\/com_banners\\/models\\/forms\\/banner.xml\", \"hideFields\":[\"checked_out\",\"checked_out_time\",\"version\", \"reset\"],\"ignoreChanges\":[\"modified_by\", \"modified\", \"checked_out\", \"checked_out_time\", \"version\", \"imptotal\", \"impmade\", \"reset\"], \"convertToInt\":[\"publish_up\", \"publish_down\", \"ordering\"], \"displayLookup\":[{\"sourceColumn\":\"catid\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"}, {\"sourceColumn\":\"cid\",\"targetTable\":\"#__banner_clients\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"}, {\"sourceColumn\":\"created_by\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"modified_by\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"} ]}'),(10,'Banners Category','com_banners.category','{\"special\":{\"dbtable\":\"#__categories\",\"key\":\"id\",\"type\":\"Category\",\"prefix\":\"JTable\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"JTable\",\"config\":\"array()\"}}','','{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"title\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created_time\",\"core_modified_time\":\"modified_time\",\"core_body\":\"description\", \"core_hits\":\"hits\",\"core_publish_up\":\"null\",\"core_publish_down\":\"null\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"null\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"null\", \"core_urls\":\"null\", \"core_version\":\"version\", \"core_ordering\":\"null\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"parent_id\", \"core_xreference\":\"null\", \"asset_id\":\"asset_id\"}, \"special\": {\"parent_id\":\"parent_id\",\"lft\":\"lft\",\"rgt\":\"rgt\",\"level\":\"level\",\"path\":\"path\",\"extension\":\"extension\",\"note\":\"note\"}}','','{\"formFile\":\"administrator\\/components\\/com_categories\\/models\\/forms\\/category.xml\", \"hideFields\":[\"asset_id\",\"checked_out\",\"checked_out_time\",\"version\",\"lft\",\"rgt\",\"level\",\"path\",\"extension\"], \"ignoreChanges\":[\"modified_user_id\", \"modified_time\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\", \"path\"], \"convertToInt\":[\"publish_up\", \"publish_down\"], \"displayLookup\":[{\"sourceColumn\":\"created_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"modified_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"parent_id\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"}]}'),(11,'Banner Client','com_banners.client','{\"special\":{\"dbtable\":\"#__banner_clients\",\"key\":\"id\",\"type\":\"Client\",\"prefix\":\"BannersTable\"}}','','','','{\"formFile\":\"administrator\\/components\\/com_banners\\/models\\/forms\\/client.xml\", \"hideFields\":[\"checked_out\",\"checked_out_time\"], \"ignoreChanges\":[\"checked_out\", \"checked_out_time\"], \"convertToInt\":[], \"displayLookup\":[]}'),(12,'User Notes','com_users.note','{\"special\":{\"dbtable\":\"#__user_notes\",\"key\":\"id\",\"type\":\"Note\",\"prefix\":\"UsersTable\"}}','','','','{\"formFile\":\"administrator\\/components\\/com_users\\/models\\/forms\\/note.xml\", \"hideFields\":[\"checked_out\",\"checked_out_time\", \"publish_up\", \"publish_down\"],\"ignoreChanges\":[\"modified_user_id\", \"modified_time\", \"checked_out\", \"checked_out_time\"], \"convertToInt\":[\"publish_up\", \"publish_down\"],\"displayLookup\":[{\"sourceColumn\":\"catid\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"}, {\"sourceColumn\":\"created_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"}, {\"sourceColumn\":\"user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"}, {\"sourceColumn\":\"modified_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"}]}'),(13,'User Notes Category','com_users.category','{\"special\":{\"dbtable\":\"#__categories\",\"key\":\"id\",\"type\":\"Category\",\"prefix\":\"JTable\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"JTable\",\"config\":\"array()\"}}','','{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"title\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created_time\",\"core_modified_time\":\"modified_time\",\"core_body\":\"description\", \"core_hits\":\"hits\",\"core_publish_up\":\"null\",\"core_publish_down\":\"null\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"null\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"null\", \"core_urls\":\"null\", \"core_version\":\"version\", \"core_ordering\":\"null\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"parent_id\", \"core_xreference\":\"null\", \"asset_id\":\"asset_id\"}, \"special\":{\"parent_id\":\"parent_id\",\"lft\":\"lft\",\"rgt\":\"rgt\",\"level\":\"level\",\"path\":\"path\",\"extension\":\"extension\",\"note\":\"note\"}}','','{\"formFile\":\"administrator\\/components\\/com_categories\\/models\\/forms\\/category.xml\", \"hideFields\":[\"checked_out\",\"checked_out_time\",\"version\",\"lft\",\"rgt\",\"level\",\"path\",\"extension\"], \"ignoreChanges\":[\"modified_user_id\", \"modified_time\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\", \"path\"], \"convertToInt\":[\"publish_up\", \"publish_down\"], \"displayLookup\":[{\"sourceColumn\":\"created_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"}, {\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"modified_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"parent_id\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"}]}');
/*!40000 ALTER TABLE `mdla_content_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_contentitem_tag_map`
--

DROP TABLE IF EXISTS `mdla_contentitem_tag_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_contentitem_tag_map` (
  `type_alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `core_content_id` int(10) unsigned NOT NULL COMMENT 'PK from the core content table',
  `content_item_id` int(11) NOT NULL COMMENT 'PK from the content type table',
  `tag_id` int(10) unsigned NOT NULL COMMENT 'PK from the tag table',
  `tag_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date of most recent save for this tag-item',
  `type_id` mediumint(8) NOT NULL COMMENT 'PK from the content_type table',
  UNIQUE KEY `uc_ItemnameTagid` (`type_id`,`content_item_id`,`tag_id`),
  KEY `idx_tag_type` (`tag_id`,`type_id`),
  KEY `idx_date_id` (`tag_date`,`tag_id`),
  KEY `idx_core_content_id` (`core_content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Maps items from content tables to tags';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_contentitem_tag_map`
--

LOCK TABLES `mdla_contentitem_tag_map` WRITE;
/*!40000 ALTER TABLE `mdla_contentitem_tag_map` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_contentitem_tag_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_core_log_searches`
--

DROP TABLE IF EXISTS `mdla_core_log_searches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_core_log_searches` (
  `search_term` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_core_log_searches`
--

LOCK TABLES `mdla_core_log_searches` WRITE;
/*!40000 ALTER TABLE `mdla_core_log_searches` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_core_log_searches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_extensions`
--

DROP TABLE IF EXISTS `mdla_extensions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_extensions` (
  `extension_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Parent package ID for extensions installed as a package.',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `element` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` tinyint(3) NOT NULL,
  `enabled` tinyint(3) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '1',
  `protected` tinyint(3) NOT NULL DEFAULT '0',
  `manifest_cache` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `params` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `system_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) DEFAULT '0',
  `state` int(11) DEFAULT '0',
  PRIMARY KEY (`extension_id`),
  KEY `element_clientid` (`element`,`client_id`),
  KEY `element_folder_clientid` (`element`,`folder`,`client_id`),
  KEY `extension` (`type`,`element`,`folder`,`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10014 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_extensions`
--

LOCK TABLES `mdla_extensions` WRITE;
/*!40000 ALTER TABLE `mdla_extensions` DISABLE KEYS */;
INSERT INTO `mdla_extensions` VALUES (1,0,'com_mailto','component','com_mailto','',0,1,1,1,'{\"name\":\"com_mailto\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\\t\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_MAILTO_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mailto\"}','','','',0,'0000-00-00 00:00:00',0,0),(2,0,'com_wrapper','component','com_wrapper','',0,1,1,1,'{\"name\":\"com_wrapper\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\\n\\t\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_WRAPPER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"wrapper\"}','','','',0,'0000-00-00 00:00:00',0,0),(3,0,'com_admin','component','com_admin','',1,1,1,1,'{\"name\":\"com_admin\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_ADMIN_XML_DESCRIPTION\",\"group\":\"\"}','','','',0,'0000-00-00 00:00:00',0,0),(4,0,'com_banners','component','com_banners','',1,1,1,0,'{\"name\":\"com_banners\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_BANNERS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"banners\"}','{\"purchase_type\":\"3\",\"track_impressions\":\"0\",\"track_clicks\":\"0\",\"metakey_prefix\":\"\",\"save_history\":\"1\",\"history_limit\":10}','','',0,'0000-00-00 00:00:00',0,0),(5,0,'com_cache','component','com_cache','',1,1,1,1,'{\"name\":\"com_cache\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_CACHE_XML_DESCRIPTION\",\"group\":\"\"}','','','',0,'0000-00-00 00:00:00',0,0),(6,0,'com_categories','component','com_categories','',1,1,1,1,'{\"name\":\"com_categories\",\"type\":\"component\",\"creationDate\":\"December 2007\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_CATEGORIES_XML_DESCRIPTION\",\"group\":\"\"}','','','',0,'0000-00-00 00:00:00',0,0),(7,0,'com_checkin','component','com_checkin','',1,1,1,1,'{\"name\":\"com_checkin\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_CHECKIN_XML_DESCRIPTION\",\"group\":\"\"}','','','',0,'0000-00-00 00:00:00',0,0),(8,0,'com_contact','component','com_contact','',1,1,1,0,'{\"name\":\"com_contact\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_CONTACT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"contact\"}','{\"contact_layout\":\"_:default\",\"show_contact_category\":\"hide\",\"save_history\":\"1\",\"history_limit\":10,\"show_contact_list\":\"0\",\"presentation_style\":\"sliders\",\"show_tags\":\"1\",\"show_info\":\"1\",\"show_name\":\"1\",\"show_position\":\"1\",\"show_email\":\"0\",\"show_street_address\":\"1\",\"show_suburb\":\"1\",\"show_state\":\"1\",\"show_postcode\":\"1\",\"show_country\":\"1\",\"show_telephone\":\"1\",\"show_mobile\":\"1\",\"show_fax\":\"1\",\"show_webpage\":\"1\",\"show_image\":\"1\",\"show_misc\":\"1\",\"image\":\"\",\"allow_vcard\":\"0\",\"show_articles\":\"0\",\"articles_display_num\":\"10\",\"show_profile\":\"0\",\"show_user_custom_fields\":[\"-1\"],\"show_links\":\"0\",\"linka_name\":\"\",\"linkb_name\":\"\",\"linkc_name\":\"\",\"linkd_name\":\"\",\"linke_name\":\"\",\"contact_icons\":\"0\",\"icon_address\":\"\",\"icon_email\":\"\",\"icon_telephone\":\"\",\"icon_mobile\":\"\",\"icon_fax\":\"\",\"icon_misc\":\"\",\"category_layout\":\"_:default\",\"show_category_title\":\"1\",\"show_description\":\"1\",\"show_description_image\":\"0\",\"maxLevel\":\"-1\",\"show_subcat_desc\":\"1\",\"show_empty_categories\":\"0\",\"show_cat_items\":\"1\",\"show_cat_tags\":\"1\",\"show_base_description\":\"1\",\"maxLevelcat\":\"-1\",\"show_subcat_desc_cat\":\"1\",\"show_empty_categories_cat\":\"0\",\"show_cat_items_cat\":\"1\",\"filter_field\":\"0\",\"show_pagination_limit\":\"0\",\"show_headings\":\"1\",\"show_image_heading\":\"0\",\"show_position_headings\":\"1\",\"show_email_headings\":\"0\",\"show_telephone_headings\":\"1\",\"show_mobile_headings\":\"0\",\"show_fax_headings\":\"0\",\"show_suburb_headings\":\"1\",\"show_state_headings\":\"1\",\"show_country_headings\":\"1\",\"show_pagination\":\"2\",\"show_pagination_results\":\"1\",\"initial_sort\":\"ordering\",\"captcha\":\"\",\"show_email_form\":\"1\",\"show_email_copy\":\"1\",\"banned_email\":\"\",\"banned_subject\":\"\",\"banned_text\":\"\",\"validate_session\":\"1\",\"custom_reply\":\"0\",\"redirect\":\"\",\"show_feed_link\":\"1\",\"sef_advanced\":0,\"sef_ids\":0,\"custom_fields_enable\":\"1\"}','','',0,'0000-00-00 00:00:00',0,0),(9,0,'com_cpanel','component','com_cpanel','',1,1,1,1,'{\"name\":\"com_cpanel\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_CPANEL_XML_DESCRIPTION\",\"group\":\"\"}','','','',0,'0000-00-00 00:00:00',0,0),(10,0,'com_installer','component','com_installer','',1,1,1,1,'{\"name\":\"com_installer\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_INSTALLER_XML_DESCRIPTION\",\"group\":\"\"}','{\"show_jed_info\":\"1\",\"cachetimeout\":\"6\",\"minimum_stability\":\"4\"}','','',0,'0000-00-00 00:00:00',0,0),(11,0,'com_languages','component','com_languages','',1,1,1,1,'{\"name\":\"com_languages\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_LANGUAGES_XML_DESCRIPTION\",\"group\":\"\"}','{\"administrator\":\"pt-BR\",\"site\":\"pt-BR\"}','','',0,'0000-00-00 00:00:00',0,0),(12,0,'com_login','component','com_login','',1,1,1,1,'{\"name\":\"com_login\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_LOGIN_XML_DESCRIPTION\",\"group\":\"\"}','','','',0,'0000-00-00 00:00:00',0,0),(13,0,'com_media','component','com_media','',1,1,0,1,'{\"name\":\"com_media\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_MEDIA_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"media\"}','{\"upload_extensions\":\"bmp,csv,doc,gif,ico,jpg,jpeg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,GIF,ICO,JPG,JPEG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS\",\"upload_maxsize\":\"10\",\"file_path\":\"images\",\"image_path\":\"images\",\"restrict_uploads\":\"1\",\"allowed_media_usergroup\":\"3\",\"check_mime\":\"1\",\"image_extensions\":\"bmp,gif,jpg,png\",\"ignore_extensions\":\"\",\"upload_mime\":\"image\\/jpeg,image\\/gif,image\\/png,image\\/bmp,application\\/x-shockwave-flash,application\\/msword,application\\/excel,application\\/pdf,application\\/powerpoint,text\\/plain,application\\/x-zip\",\"upload_mime_illegal\":\"text\\/html\"}','','',0,'0000-00-00 00:00:00',0,0),(14,0,'com_menus','component','com_menus','',1,1,1,1,'{\"name\":\"com_menus\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_MENUS_XML_DESCRIPTION\",\"group\":\"\"}','{\"page_title\":\"\",\"show_page_heading\":0,\"page_heading\":\"\",\"pageclass_sfx\":\"\"}','','',0,'0000-00-00 00:00:00',0,0),(15,0,'com_messages','component','com_messages','',1,1,1,1,'{\"name\":\"com_messages\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_MESSAGES_XML_DESCRIPTION\",\"group\":\"\"}','','','',0,'0000-00-00 00:00:00',0,0),(16,0,'com_modules','component','com_modules','',1,1,1,1,'{\"name\":\"com_modules\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_MODULES_XML_DESCRIPTION\",\"group\":\"\"}','','','',0,'0000-00-00 00:00:00',0,0),(17,0,'com_newsfeeds','component','com_newsfeeds','',1,1,1,0,'{\"name\":\"com_newsfeeds\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_NEWSFEEDS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"newsfeeds\"}','{\"newsfeed_layout\":\"_:default\",\"save_history\":\"1\",\"history_limit\":5,\"show_feed_image\":\"1\",\"show_feed_description\":\"1\",\"show_item_description\":\"1\",\"feed_character_count\":\"0\",\"feed_display_order\":\"des\",\"float_first\":\"right\",\"float_second\":\"right\",\"show_tags\":\"1\",\"category_layout\":\"_:default\",\"show_category_title\":\"1\",\"show_description\":\"1\",\"show_description_image\":\"1\",\"maxLevel\":\"-1\",\"show_empty_categories\":\"0\",\"show_subcat_desc\":\"1\",\"show_cat_items\":\"1\",\"show_cat_tags\":\"1\",\"show_base_description\":\"1\",\"maxLevelcat\":\"-1\",\"show_empty_categories_cat\":\"0\",\"show_subcat_desc_cat\":\"1\",\"show_cat_items_cat\":\"1\",\"filter_field\":\"1\",\"show_pagination_limit\":\"1\",\"show_headings\":\"1\",\"show_articles\":\"0\",\"show_link\":\"1\",\"show_pagination\":\"1\",\"show_pagination_results\":\"1\"}','','',0,'0000-00-00 00:00:00',0,0),(18,0,'com_plugins','component','com_plugins','',1,1,1,1,'{\"name\":\"com_plugins\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_PLUGINS_XML_DESCRIPTION\",\"group\":\"\"}','','','',0,'0000-00-00 00:00:00',0,0),(19,0,'com_search','component','com_search','',1,1,1,0,'{\"name\":\"com_search\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_SEARCH_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"search\"}','{\"enabled\":\"0\",\"search_phrases\":\"1\",\"search_areas\":\"1\",\"show_date\":\"1\",\"opensearch_name\":\"\",\"opensearch_description\":\"\"}','','',0,'0000-00-00 00:00:00',0,0),(20,0,'com_templates','component','com_templates','',1,1,1,1,'{\"name\":\"com_templates\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_TEMPLATES_XML_DESCRIPTION\",\"group\":\"\"}','{\"template_positions_display\":\"0\",\"upload_limit\":\"10\",\"image_formats\":\"gif,bmp,jpg,jpeg,png\",\"source_formats\":\"txt,less,ini,xml,js,php,css,scss,sass\",\"font_formats\":\"woff,ttf,otf\",\"compressed_formats\":\"zip\"}','','',0,'0000-00-00 00:00:00',0,0),(22,0,'com_content','component','com_content','',1,1,0,1,'{\"name\":\"com_content\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_CONTENT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"content\"}','{\"article_layout\":\"as002085free:blog\",\"show_title\":\"1\",\"link_titles\":\"1\",\"show_intro\":\"1\",\"info_block_position\":\"0\",\"info_block_show_title\":\"1\",\"show_category\":\"0\",\"link_category\":\"1\",\"show_parent_category\":\"0\",\"link_parent_category\":\"0\",\"show_associations\":\"0\",\"flags\":\"1\",\"show_author\":\"0\",\"link_author\":\"0\",\"show_create_date\":\"0\",\"show_modify_date\":\"0\",\"show_publish_date\":\"0\",\"show_item_navigation\":\"0\",\"show_vote\":\"0\",\"show_readmore\":\"1\",\"show_readmore_title\":\"0\",\"readmore_limit\":\"100\",\"show_tags\":\"1\",\"show_icons\":\"0\",\"show_print_icon\":\"0\",\"show_email_icon\":\"0\",\"show_hits\":\"0\",\"show_noauth\":\"0\",\"urls_position\":\"0\",\"captcha\":\"0\",\"show_publishing_options\":\"1\",\"show_article_options\":\"1\",\"save_history\":\"1\",\"history_limit\":10,\"show_urls_images_frontend\":\"0\",\"show_urls_images_backend\":\"1\",\"targeta\":0,\"targetb\":0,\"targetc\":0,\"float_intro\":\"left\",\"float_fulltext\":\"left\",\"category_layout\":\"_:blog\",\"show_category_heading_title_text\":\"1\",\"show_category_title\":\"0\",\"show_description\":\"0\",\"show_description_image\":\"0\",\"maxLevel\":\"1\",\"show_empty_categories\":\"0\",\"show_no_articles\":\"1\",\"show_subcat_desc\":\"1\",\"show_cat_num_articles\":\"0\",\"show_cat_tags\":\"1\",\"show_base_description\":\"1\",\"maxLevelcat\":\"-1\",\"show_empty_categories_cat\":\"0\",\"show_subcat_desc_cat\":\"1\",\"show_cat_num_articles_cat\":\"1\",\"num_leading_articles\":\"0\",\"num_intro_articles\":\"3\",\"num_columns\":\"3\",\"num_links\":\"0\",\"multi_column_order\":\"1\",\"show_subcategory_content\":\"0\",\"show_pagination_limit\":\"1\",\"filter_field\":\"hide\",\"show_headings\":\"1\",\"list_show_date\":\"0\",\"date_format\":\"\",\"list_show_hits\":\"1\",\"list_show_author\":\"1\",\"list_show_votes\":\"0\",\"list_show_ratings\":\"0\",\"orderby_pri\":\"order\",\"orderby_sec\":\"rdate\",\"order_date\":\"published\",\"show_pagination\":\"2\",\"show_pagination_results\":\"1\",\"show_featured\":\"show\",\"show_feed_link\":\"1\",\"feed_summary\":\"0\",\"feed_show_readmore\":\"0\",\"custom_fields_enable\":\"1\"}','','',0,'0000-00-00 00:00:00',0,0),(23,0,'com_config','component','com_config','',1,1,0,1,'{\"name\":\"com_config\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_CONFIG_XML_DESCRIPTION\",\"group\":\"\"}','{\"filters\":{\"1\":{\"filter_type\":\"NH\",\"filter_tags\":\"\",\"filter_attributes\":\"\"},\"9\":{\"filter_type\":\"BL\",\"filter_tags\":\"\",\"filter_attributes\":\"\"},\"6\":{\"filter_type\":\"BL\",\"filter_tags\":\"\",\"filter_attributes\":\"\"},\"7\":{\"filter_type\":\"NONE\",\"filter_tags\":\"\",\"filter_attributes\":\"\"},\"2\":{\"filter_type\":\"NH\",\"filter_tags\":\"\",\"filter_attributes\":\"\"},\"3\":{\"filter_type\":\"BL\",\"filter_tags\":\"\",\"filter_attributes\":\"\"},\"4\":{\"filter_type\":\"BL\",\"filter_tags\":\"\",\"filter_attributes\":\"\"},\"5\":{\"filter_type\":\"BL\",\"filter_tags\":\"\",\"filter_attributes\":\"\"},\"8\":{\"filter_type\":\"NONE\",\"filter_tags\":\"\",\"filter_attributes\":\"\"}}}','','',0,'0000-00-00 00:00:00',0,0),(24,0,'com_redirect','component','com_redirect','',1,1,0,1,'{\"name\":\"com_redirect\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_REDIRECT_XML_DESCRIPTION\",\"group\":\"\"}','','','',0,'0000-00-00 00:00:00',0,0),(25,0,'com_users','component','com_users','',1,1,0,1,'{\"name\":\"com_users\",\"type\":\"component\",\"creationDate\":\"April 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_USERS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"users\"}','{\"allowUserRegistration\":\"0\",\"new_usertype\":\"2\",\"guest_usergroup\":\"9\",\"sendpassword\":\"1\",\"useractivation\":\"2\",\"mail_to_admin\":\"1\",\"captcha\":\"\",\"frontend_userparams\":\"1\",\"site_language\":\"0\",\"change_login_name\":\"0\",\"reset_count\":\"10\",\"reset_time\":\"1\",\"minimum_length\":\"4\",\"minimum_integers\":\"0\",\"minimum_symbols\":\"0\",\"minimum_uppercase\":\"0\",\"save_history\":\"1\",\"history_limit\":5,\"mailSubjectPrefix\":\"\",\"mailBodySuffix\":\"\"}','','',0,'0000-00-00 00:00:00',0,0),(27,0,'com_finder','component','com_finder','',1,1,0,0,'{\"name\":\"com_finder\",\"type\":\"component\",\"creationDate\":\"August 2011\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_FINDER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"finder\"}','{\"show_description\":\"1\",\"description_length\":255,\"allow_empty_query\":\"0\",\"show_url\":\"1\",\"show_advanced\":\"1\",\"expand_advanced\":\"0\",\"show_date_filters\":\"0\",\"highlight_terms\":\"1\",\"opensearch_name\":\"\",\"opensearch_description\":\"\",\"batch_size\":\"50\",\"memory_table_limit\":30000,\"title_multiplier\":\"1.7\",\"text_multiplier\":\"0.7\",\"meta_multiplier\":\"1.2\",\"path_multiplier\":\"2.0\",\"misc_multiplier\":\"0.3\",\"stemmer\":\"snowball\"}','','',0,'0000-00-00 00:00:00',0,0),(28,0,'com_joomlaupdate','component','com_joomlaupdate','',1,1,0,1,'{\"name\":\"com_joomlaupdate\",\"type\":\"component\",\"creationDate\":\"February 2012\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.6.2\",\"description\":\"COM_JOOMLAUPDATE_XML_DESCRIPTION\",\"group\":\"\"}','{\"updatesource\":\"default\",\"customurl\":\"\"}','','',0,'0000-00-00 00:00:00',0,0),(29,0,'com_tags','component','com_tags','',1,1,1,1,'{\"name\":\"com_tags\",\"type\":\"component\",\"creationDate\":\"December 2013\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.1.0\",\"description\":\"COM_TAGS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"tags\"}','{\"tag_layout\":\"_:default\",\"save_history\":\"1\",\"history_limit\":5,\"show_tag_title\":\"0\",\"tag_list_show_tag_image\":\"0\",\"tag_list_show_tag_description\":\"0\",\"tag_list_image\":\"\",\"tag_list_orderby\":\"title\",\"tag_list_orderby_direction\":\"ASC\",\"show_headings\":\"0\",\"tag_list_show_date\":\"0\",\"tag_list_show_item_image\":\"0\",\"tag_list_show_item_description\":\"0\",\"tag_list_item_maximum_characters\":0,\"return_any_or_all\":\"1\",\"include_children\":\"0\",\"maximum\":200,\"tag_list_language_filter\":\"all\",\"tags_layout\":\"_:default\",\"all_tags_orderby\":\"title\",\"all_tags_orderby_direction\":\"ASC\",\"all_tags_show_tag_image\":\"0\",\"all_tags_show_tag_descripion\":\"0\",\"all_tags_tag_maximum_characters\":20,\"all_tags_show_tag_hits\":\"0\",\"filter_field\":\"1\",\"show_pagination_limit\":\"1\",\"show_pagination\":\"2\",\"show_pagination_results\":\"1\",\"tag_field_ajax_mode\":\"1\",\"show_feed_link\":\"1\"}','','',0,'0000-00-00 00:00:00',0,0),(30,0,'com_contenthistory','component','com_contenthistory','',1,1,1,0,'{\"name\":\"com_contenthistory\",\"type\":\"component\",\"creationDate\":\"May 2013\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.2.0\",\"description\":\"COM_CONTENTHISTORY_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"contenthistory\"}','','','',0,'0000-00-00 00:00:00',0,0),(31,0,'com_ajax','component','com_ajax','',1,1,1,1,'{\"name\":\"com_ajax\",\"type\":\"component\",\"creationDate\":\"August 2013\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.2.0\",\"description\":\"COM_AJAX_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"ajax\"}','','','',0,'0000-00-00 00:00:00',0,0),(32,0,'com_postinstall','component','com_postinstall','',1,1,1,1,'{\"name\":\"com_postinstall\",\"type\":\"component\",\"creationDate\":\"September 2013\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.2.0\",\"description\":\"COM_POSTINSTALL_XML_DESCRIPTION\",\"group\":\"\"}','','','',0,'0000-00-00 00:00:00',0,0),(33,0,'com_fields','component','com_fields','',1,1,1,0,'{\"name\":\"com_fields\",\"type\":\"component\",\"creationDate\":\"March 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"COM_FIELDS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"fields\"}','','','',0,'0000-00-00 00:00:00',0,0),(34,0,'com_associations','component','com_associations','',1,1,1,0,'{\"name\":\"com_associations\",\"type\":\"component\",\"creationDate\":\"Januar 2017\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"COM_ASSOCIATIONS_XML_DESCRIPTION\",\"group\":\"\"}','','','',0,'0000-00-00 00:00:00',0,0),(102,0,'LIB_PHPUTF8','library','phputf8','',0,1,1,1,'{\"name\":\"LIB_PHPUTF8\",\"type\":\"library\",\"creationDate\":\"2006\",\"author\":\"Harry Fuecks\",\"copyright\":\"Copyright various authors\",\"authorEmail\":\"hfuecks@gmail.com\",\"authorUrl\":\"http:\\/\\/sourceforge.net\\/projects\\/phputf8\",\"version\":\"0.5\",\"description\":\"LIB_PHPUTF8_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"phputf8\"}','','','',0,'0000-00-00 00:00:00',0,0),(103,0,'LIB_JOOMLA','library','joomla','',0,1,1,1,'{\"name\":\"LIB_JOOMLA\",\"type\":\"library\",\"creationDate\":\"2008\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"https:\\/\\/www.joomla.org\",\"version\":\"13.1\",\"description\":\"LIB_JOOMLA_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"joomla\"}','{\"mediaversion\":\"14717e804606e783863ac7845c2f0631\"}','','',0,'0000-00-00 00:00:00',0,0),(104,0,'LIB_IDNA','library','idna_convert','',0,1,1,1,'{\"name\":\"LIB_IDNA\",\"type\":\"library\",\"creationDate\":\"2004\",\"author\":\"phlyLabs\",\"copyright\":\"2004-2011 phlyLabs Berlin, http:\\/\\/phlylabs.de\",\"authorEmail\":\"phlymail@phlylabs.de\",\"authorUrl\":\"http:\\/\\/phlylabs.de\",\"version\":\"0.8.0\",\"description\":\"LIB_IDNA_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"idna_convert\"}','','','',0,'0000-00-00 00:00:00',0,0),(105,0,'FOF','library','fof','',0,1,1,1,'{\"name\":\"FOF\",\"type\":\"library\",\"creationDate\":\"2015-04-22 13:15:32\",\"author\":\"Nicholas K. Dionysopoulos \\/ Akeeba Ltd\",\"copyright\":\"(C)2011-2015 Nicholas K. Dionysopoulos\",\"authorEmail\":\"nicholas@akeebabackup.com\",\"authorUrl\":\"https:\\/\\/www.akeebabackup.com\",\"version\":\"2.4.3\",\"description\":\"LIB_FOF_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"fof\"}','','','',0,'0000-00-00 00:00:00',0,0),(106,0,'LIB_PHPASS','library','phpass','',0,1,1,1,'{\"name\":\"LIB_PHPASS\",\"type\":\"library\",\"creationDate\":\"2004-2006\",\"author\":\"Solar Designer\",\"copyright\":\"\",\"authorEmail\":\"solar@openwall.com\",\"authorUrl\":\"http:\\/\\/www.openwall.com\\/phpass\\/\",\"version\":\"0.3\",\"description\":\"LIB_PHPASS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"phpass\"}','','','',0,'0000-00-00 00:00:00',0,0),(200,0,'mod_articles_archive','module','mod_articles_archive','',0,1,1,0,'{\"name\":\"mod_articles_archive\",\"type\":\"module\",\"creationDate\":\"July 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_ARTICLES_ARCHIVE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_articles_archive\"}','','','',0,'0000-00-00 00:00:00',0,0),(201,0,'mod_articles_latest','module','mod_articles_latest','',0,1,1,0,'{\"name\":\"mod_articles_latest\",\"type\":\"module\",\"creationDate\":\"July 2004\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_LATEST_NEWS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_articles_latest\"}','','','',0,'0000-00-00 00:00:00',0,0),(202,0,'mod_articles_popular','module','mod_articles_popular','',0,1,1,0,'{\"name\":\"mod_articles_popular\",\"type\":\"module\",\"creationDate\":\"July 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_POPULAR_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_articles_popular\"}','','','',0,'0000-00-00 00:00:00',0,0),(203,0,'mod_banners','module','mod_banners','',0,1,1,0,'{\"name\":\"mod_banners\",\"type\":\"module\",\"creationDate\":\"July 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_BANNERS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_banners\"}','','','',0,'0000-00-00 00:00:00',0,0),(204,0,'mod_breadcrumbs','module','mod_breadcrumbs','',0,1,1,1,'{\"name\":\"mod_breadcrumbs\",\"type\":\"module\",\"creationDate\":\"July 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_BREADCRUMBS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_breadcrumbs\"}','','','',0,'0000-00-00 00:00:00',0,0),(205,0,'mod_custom','module','mod_custom','',0,1,1,1,'{\"name\":\"mod_custom\",\"type\":\"module\",\"creationDate\":\"July 2004\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_CUSTOM_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_custom\"}','','','',0,'0000-00-00 00:00:00',0,0),(206,0,'mod_feed','module','mod_feed','',0,1,1,0,'{\"name\":\"mod_feed\",\"type\":\"module\",\"creationDate\":\"July 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_FEED_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_feed\"}','','','',0,'0000-00-00 00:00:00',0,0),(207,0,'mod_footer','module','mod_footer','',0,1,1,0,'{\"name\":\"mod_footer\",\"type\":\"module\",\"creationDate\":\"July 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_FOOTER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_footer\"}','','','',0,'0000-00-00 00:00:00',0,0),(208,0,'mod_login','module','mod_login','',0,1,1,1,'{\"name\":\"mod_login\",\"type\":\"module\",\"creationDate\":\"July 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_LOGIN_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_login\"}','','','',0,'0000-00-00 00:00:00',0,0),(209,0,'mod_menu','module','mod_menu','',0,1,1,1,'{\"name\":\"mod_menu\",\"type\":\"module\",\"creationDate\":\"July 2004\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_MENU_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_menu\"}','','','',0,'0000-00-00 00:00:00',0,0),(210,0,'mod_articles_news','module','mod_articles_news','',0,1,1,0,'{\"name\":\"mod_articles_news\",\"type\":\"module\",\"creationDate\":\"July 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_ARTICLES_NEWS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_articles_news\"}','','','',0,'0000-00-00 00:00:00',0,0),(211,0,'mod_random_image','module','mod_random_image','',0,1,1,0,'{\"name\":\"mod_random_image\",\"type\":\"module\",\"creationDate\":\"July 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_RANDOM_IMAGE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_random_image\"}','','','',0,'0000-00-00 00:00:00',0,0),(212,0,'mod_related_items','module','mod_related_items','',0,1,1,0,'{\"name\":\"mod_related_items\",\"type\":\"module\",\"creationDate\":\"July 2004\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_RELATED_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_related_items\"}','','','',0,'0000-00-00 00:00:00',0,0),(213,0,'mod_search','module','mod_search','',0,1,1,0,'{\"name\":\"mod_search\",\"type\":\"module\",\"creationDate\":\"July 2004\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_SEARCH_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_search\"}','','','',0,'0000-00-00 00:00:00',0,0),(214,0,'mod_stats','module','mod_stats','',0,1,1,0,'{\"name\":\"mod_stats\",\"type\":\"module\",\"creationDate\":\"July 2004\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_STATS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_stats\"}','','','',0,'0000-00-00 00:00:00',0,0),(215,0,'mod_syndicate','module','mod_syndicate','',0,1,1,1,'{\"name\":\"mod_syndicate\",\"type\":\"module\",\"creationDate\":\"May 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_SYNDICATE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_syndicate\"}','','','',0,'0000-00-00 00:00:00',0,0),(216,0,'mod_users_latest','module','mod_users_latest','',0,1,1,0,'{\"name\":\"mod_users_latest\",\"type\":\"module\",\"creationDate\":\"December 2009\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_USERS_LATEST_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_users_latest\"}','','','',0,'0000-00-00 00:00:00',0,0),(218,0,'mod_whosonline','module','mod_whosonline','',0,1,1,0,'{\"name\":\"mod_whosonline\",\"type\":\"module\",\"creationDate\":\"July 2004\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_WHOSONLINE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_whosonline\"}','','','',0,'0000-00-00 00:00:00',0,0),(219,0,'mod_wrapper','module','mod_wrapper','',0,1,1,0,'{\"name\":\"mod_wrapper\",\"type\":\"module\",\"creationDate\":\"October 2004\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_WRAPPER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_wrapper\"}','','','',0,'0000-00-00 00:00:00',0,0),(220,0,'mod_articles_category','module','mod_articles_category','',0,1,1,0,'{\"name\":\"mod_articles_category\",\"type\":\"module\",\"creationDate\":\"February 2010\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_ARTICLES_CATEGORY_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_articles_category\"}','','','',0,'0000-00-00 00:00:00',0,0),(221,0,'mod_articles_categories','module','mod_articles_categories','',0,1,1,0,'{\"name\":\"mod_articles_categories\",\"type\":\"module\",\"creationDate\":\"February 2010\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_ARTICLES_CATEGORIES_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_articles_categories\"}','','','',0,'0000-00-00 00:00:00',0,0),(222,0,'mod_languages','module','mod_languages','',0,1,1,1,'{\"name\":\"mod_languages\",\"type\":\"module\",\"creationDate\":\"February 2010\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.5.0\",\"description\":\"MOD_LANGUAGES_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_languages\"}','','','',0,'0000-00-00 00:00:00',0,0),(223,0,'mod_finder','module','mod_finder','',0,1,0,0,'{\"name\":\"mod_finder\",\"type\":\"module\",\"creationDate\":\"August 2011\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_FINDER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_finder\"}','','','',0,'0000-00-00 00:00:00',0,0),(300,0,'mod_custom','module','mod_custom','',1,1,1,1,'{\"name\":\"mod_custom\",\"type\":\"module\",\"creationDate\":\"July 2004\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_CUSTOM_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_custom\"}','','','',0,'0000-00-00 00:00:00',0,0),(301,0,'mod_feed','module','mod_feed','',1,1,1,0,'{\"name\":\"mod_feed\",\"type\":\"module\",\"creationDate\":\"July 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_FEED_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_feed\"}','','','',0,'0000-00-00 00:00:00',0,0),(302,0,'mod_latest','module','mod_latest','',1,1,1,0,'{\"name\":\"mod_latest\",\"type\":\"module\",\"creationDate\":\"July 2004\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_LATEST_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_latest\"}','','','',0,'0000-00-00 00:00:00',0,0),(303,0,'mod_logged','module','mod_logged','',1,1,1,0,'{\"name\":\"mod_logged\",\"type\":\"module\",\"creationDate\":\"January 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_LOGGED_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_logged\"}','','','',0,'0000-00-00 00:00:00',0,0),(304,0,'mod_login','module','mod_login','',1,1,1,1,'{\"name\":\"mod_login\",\"type\":\"module\",\"creationDate\":\"March 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_LOGIN_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_login\"}','','','',0,'0000-00-00 00:00:00',0,0),(305,0,'mod_menu','module','mod_menu','',1,1,1,0,'{\"name\":\"mod_menu\",\"type\":\"module\",\"creationDate\":\"March 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_MENU_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_menu\"}','','','',0,'0000-00-00 00:00:00',0,0),(307,0,'mod_popular','module','mod_popular','',1,1,1,0,'{\"name\":\"mod_popular\",\"type\":\"module\",\"creationDate\":\"July 2004\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_POPULAR_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_popular\"}','','','',0,'0000-00-00 00:00:00',0,0),(308,0,'mod_quickicon','module','mod_quickicon','',1,1,1,1,'{\"name\":\"mod_quickicon\",\"type\":\"module\",\"creationDate\":\"Nov 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_QUICKICON_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_quickicon\"}','','','',0,'0000-00-00 00:00:00',0,0),(309,0,'mod_status','module','mod_status','',1,1,1,0,'{\"name\":\"mod_status\",\"type\":\"module\",\"creationDate\":\"Feb 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_STATUS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_status\"}','','','',0,'0000-00-00 00:00:00',0,0),(310,0,'mod_submenu','module','mod_submenu','',1,1,1,0,'{\"name\":\"mod_submenu\",\"type\":\"module\",\"creationDate\":\"Feb 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_SUBMENU_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_submenu\"}','','','',0,'0000-00-00 00:00:00',0,0),(311,0,'mod_title','module','mod_title','',1,1,1,0,'{\"name\":\"mod_title\",\"type\":\"module\",\"creationDate\":\"Nov 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_TITLE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_title\"}','','','',0,'0000-00-00 00:00:00',0,0),(312,0,'mod_toolbar','module','mod_toolbar','',1,1,1,1,'{\"name\":\"mod_toolbar\",\"type\":\"module\",\"creationDate\":\"Nov 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_TOOLBAR_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_toolbar\"}','','','',0,'0000-00-00 00:00:00',0,0),(313,0,'mod_multilangstatus','module','mod_multilangstatus','',1,1,1,0,'{\"name\":\"mod_multilangstatus\",\"type\":\"module\",\"creationDate\":\"September 2011\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_MULTILANGSTATUS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_multilangstatus\"}','{\"cache\":\"0\"}','','',0,'0000-00-00 00:00:00',0,0),(314,0,'mod_version','module','mod_version','',1,1,1,0,'{\"name\":\"mod_version\",\"type\":\"module\",\"creationDate\":\"January 2012\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_VERSION_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_version\"}','{\"format\":\"short\",\"product\":\"1\",\"cache\":\"0\"}','','',0,'0000-00-00 00:00:00',0,0),(315,0,'mod_stats_admin','module','mod_stats_admin','',1,1,1,0,'{\"name\":\"mod_stats_admin\",\"type\":\"module\",\"creationDate\":\"July 2004\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_STATS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_stats_admin\"}','{\"serverinfo\":\"0\",\"siteinfo\":\"0\",\"counter\":\"0\",\"increase\":\"0\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"static\"}','','',0,'0000-00-00 00:00:00',0,0),(316,0,'mod_tags_popular','module','mod_tags_popular','',0,1,1,0,'{\"name\":\"mod_tags_popular\",\"type\":\"module\",\"creationDate\":\"January 2013\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.1.0\",\"description\":\"MOD_TAGS_POPULAR_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_tags_popular\"}','{\"maximum\":\"5\",\"timeframe\":\"alltime\",\"owncache\":\"1\"}','','',0,'0000-00-00 00:00:00',0,0),(317,0,'mod_tags_similar','module','mod_tags_similar','',0,1,1,0,'{\"name\":\"mod_tags_similar\",\"type\":\"module\",\"creationDate\":\"January 2013\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.1.0\",\"description\":\"MOD_TAGS_SIMILAR_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_tags_similar\"}','{\"maximum\":\"5\",\"matchtype\":\"any\",\"owncache\":\"1\"}','','',0,'0000-00-00 00:00:00',0,0),(400,0,'plg_authentication_gmail','plugin','gmail','authentication',0,0,1,0,'{\"name\":\"plg_authentication_gmail\",\"type\":\"plugin\",\"creationDate\":\"February 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_GMAIL_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"gmail\"}','{\"applysuffix\":\"0\",\"suffix\":\"\",\"verifypeer\":\"1\",\"user_blacklist\":\"\"}','','',0,'0000-00-00 00:00:00',1,0),(401,0,'plg_authentication_joomla','plugin','joomla','authentication',0,1,1,1,'{\"name\":\"plg_authentication_joomla\",\"type\":\"plugin\",\"creationDate\":\"November 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_AUTH_JOOMLA_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"joomla\"}','','','',0,'0000-00-00 00:00:00',0,0),(402,0,'plg_authentication_ldap','plugin','ldap','authentication',0,0,1,0,'{\"name\":\"plg_authentication_ldap\",\"type\":\"plugin\",\"creationDate\":\"November 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_LDAP_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"ldap\"}','{\"host\":\"\",\"port\":\"389\",\"use_ldapV3\":\"0\",\"negotiate_tls\":\"0\",\"no_referrals\":\"0\",\"auth_method\":\"bind\",\"base_dn\":\"\",\"search_string\":\"\",\"users_dn\":\"\",\"username\":\"admin\",\"password\":\"bobby7\",\"ldap_fullname\":\"fullName\",\"ldap_email\":\"mail\",\"ldap_uid\":\"uid\"}','','',0,'0000-00-00 00:00:00',3,0),(403,0,'plg_content_contact','plugin','contact','content',0,1,1,0,'{\"name\":\"plg_content_contact\",\"type\":\"plugin\",\"creationDate\":\"January 2014\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.2.2\",\"description\":\"PLG_CONTENT_CONTACT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"contact\"}','','','',0,'0000-00-00 00:00:00',1,0),(404,0,'plg_content_emailcloak','plugin','emailcloak','content',0,1,1,0,'{\"name\":\"plg_content_emailcloak\",\"type\":\"plugin\",\"creationDate\":\"November 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_CONTENT_EMAILCLOAK_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"emailcloak\"}','{\"mode\":\"1\"}','','',0,'0000-00-00 00:00:00',1,0),(406,0,'plg_content_loadmodule','plugin','loadmodule','content',0,1,1,0,'{\"name\":\"plg_content_loadmodule\",\"type\":\"plugin\",\"creationDate\":\"November 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_LOADMODULE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"loadmodule\"}','{\"style\":\"xhtml\"}','','',0,'2011-09-18 15:22:50',0,0),(407,0,'plg_content_pagebreak','plugin','pagebreak','content',0,1,1,0,'{\"name\":\"plg_content_pagebreak\",\"type\":\"plugin\",\"creationDate\":\"November 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_CONTENT_PAGEBREAK_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"pagebreak\"}','{\"title\":\"1\",\"multipage_toc\":\"1\",\"showall\":\"1\"}','','',0,'0000-00-00 00:00:00',4,0),(408,0,'plg_content_pagenavigation','plugin','pagenavigation','content',0,1,1,0,'{\"name\":\"plg_content_pagenavigation\",\"type\":\"plugin\",\"creationDate\":\"January 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_PAGENAVIGATION_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"pagenavigation\"}','{\"position\":\"1\"}','','',0,'0000-00-00 00:00:00',5,0),(409,0,'plg_content_vote','plugin','vote','content',0,1,1,0,'{\"name\":\"plg_content_vote\",\"type\":\"plugin\",\"creationDate\":\"November 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_VOTE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"vote\"}','','','',0,'0000-00-00 00:00:00',6,0),(410,0,'plg_editors_codemirror','plugin','codemirror','editors',0,1,1,1,'{\"name\":\"plg_editors_codemirror\",\"type\":\"plugin\",\"creationDate\":\"28 March 2011\",\"author\":\"Marijn Haverbeke\",\"copyright\":\"Copyright (C) 2014 - 2017 by Marijn Haverbeke <marijnh@gmail.com> and others\",\"authorEmail\":\"marijnh@gmail.com\",\"authorUrl\":\"http:\\/\\/codemirror.net\\/\",\"version\":\"5.23.0\",\"description\":\"PLG_CODEMIRROR_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"codemirror\"}','{\"lineNumbers\":\"1\",\"lineWrapping\":\"1\",\"matchTags\":\"1\",\"matchBrackets\":\"1\",\"marker-gutter\":\"1\",\"autoCloseTags\":\"1\",\"autoCloseBrackets\":\"1\",\"autoFocus\":\"1\",\"theme\":\"default\",\"tabmode\":\"indent\"}','','',0,'0000-00-00 00:00:00',1,0),(411,0,'plg_editors_none','plugin','none','editors',0,1,1,1,'{\"name\":\"plg_editors_none\",\"type\":\"plugin\",\"creationDate\":\"September 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_NONE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"none\"}','','','',0,'0000-00-00 00:00:00',2,0),(412,0,'plg_editors_tinymce','plugin','tinymce','editors',0,1,1,0,'{\"name\":\"plg_editors_tinymce\",\"type\":\"plugin\",\"creationDate\":\"2005-2017\",\"author\":\"Ephox Corporation\",\"copyright\":\"Ephox Corporation\",\"authorEmail\":\"N\\/A\",\"authorUrl\":\"http:\\/\\/www.tinymce.com\",\"version\":\"4.5.6\",\"description\":\"PLG_TINY_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"tinymce\"}','{\"configuration\":{\"toolbars\":{\"2\":{\"toolbar1\":[\"bold\",\"underline\",\"strikethrough\",\"|\",\"undo\",\"redo\",\"|\",\"bullist\",\"numlist\",\"|\",\"pastetext\"]},\"1\":{\"menu\":[\"edit\",\"insert\",\"view\",\"format\",\"table\",\"tools\"],\"toolbar1\":[\"bold\",\"italic\",\"underline\",\"strikethrough\",\"|\",\"alignleft\",\"aligncenter\",\"alignright\",\"alignjustify\",\"|\",\"formatselect\",\"|\",\"bullist\",\"numlist\",\"|\",\"outdent\",\"indent\",\"|\",\"undo\",\"redo\",\"|\",\"link\",\"unlink\",\"anchor\",\"code\",\"|\",\"hr\",\"table\",\"|\",\"subscript\",\"superscript\",\"|\",\"charmap\",\"pastetext\",\"preview\"]},\"0\":{\"menu\":[\"edit\",\"insert\",\"view\",\"format\",\"table\",\"tools\"],\"toolbar1\":[\"bold\",\"italic\",\"underline\",\"strikethrough\",\"|\",\"alignleft\",\"aligncenter\",\"alignright\",\"alignjustify\",\"|\",\"styleselect\",\"|\",\"formatselect\",\"fontselect\",\"fontsizeselect\",\"|\",\"searchreplace\",\"|\",\"bullist\",\"numlist\",\"|\",\"outdent\",\"indent\",\"|\",\"undo\",\"redo\",\"|\",\"link\",\"unlink\",\"anchor\",\"image\",\"|\",\"code\",\"|\",\"forecolor\",\"backcolor\",\"|\",\"fullscreen\",\"|\",\"table\",\"|\",\"subscript\",\"superscript\",\"|\",\"charmap\",\"emoticons\",\"media\",\"hr\",\"ltr\",\"rtl\",\"|\",\"cut\",\"copy\",\"paste\",\"pastetext\",\"|\",\"visualchars\",\"visualblocks\",\"nonbreaking\",\"blockquote\",\"template\",\"|\",\"print\",\"preview\",\"codesample\",\"insertdatetime\",\"removeformat\"]}},\"setoptions\":{\"2\":{\"access\":[\"1\"],\"skin\":\"0\",\"skin_admin\":\"0\",\"mobile\":\"0\",\"drag_drop\":\"1\",\"path\":\"\",\"entity_encoding\":\"raw\",\"lang_mode\":\"1\",\"text_direction\":\"ltr\",\"content_css\":\"1\",\"content_css_custom\":\"\",\"relative_urls\":\"1\",\"newlines\":\"0\",\"use_config_textfilters\":\"0\",\"invalid_elements\":\"script,applet,iframe\",\"valid_elements\":\"\",\"extended_elements\":\"\",\"resizing\":\"1\",\"resize_horizontal\":\"1\",\"element_path\":\"1\",\"wordcount\":\"1\",\"image_advtab\":\"0\",\"advlist\":\"1\",\"autosave\":\"1\",\"contextmenu\":\"1\",\"custom_plugin\":\"\",\"custom_button\":\"\"},\"1\":{\"access\":[\"6\",\"2\"],\"skin\":\"0\",\"skin_admin\":\"0\",\"mobile\":\"0\",\"drag_drop\":\"1\",\"path\":\"\",\"entity_encoding\":\"raw\",\"lang_mode\":\"1\",\"text_direction\":\"ltr\",\"content_css\":\"1\",\"content_css_custom\":\"\",\"relative_urls\":\"1\",\"newlines\":\"0\",\"use_config_textfilters\":\"0\",\"invalid_elements\":\"script,applet,iframe\",\"valid_elements\":\"\",\"extended_elements\":\"\",\"resizing\":\"1\",\"resize_horizontal\":\"1\",\"element_path\":\"1\",\"wordcount\":\"1\",\"image_advtab\":\"0\",\"advlist\":\"1\",\"autosave\":\"1\",\"contextmenu\":\"1\",\"custom_plugin\":\"\",\"custom_button\":\"\"},\"0\":{\"access\":[\"7\",\"4\",\"8\"],\"skin\":\"0\",\"skin_admin\":\"0\",\"mobile\":\"0\",\"drag_drop\":\"1\",\"path\":\"\",\"entity_encoding\":\"raw\",\"lang_mode\":\"1\",\"text_direction\":\"ltr\",\"content_css\":\"1\",\"content_css_custom\":\"\",\"relative_urls\":\"1\",\"newlines\":\"0\",\"use_config_textfilters\":\"0\",\"invalid_elements\":\"script,applet,iframe\",\"valid_elements\":\"\",\"extended_elements\":\"\",\"resizing\":\"1\",\"resize_horizontal\":\"1\",\"element_path\":\"1\",\"wordcount\":\"1\",\"image_advtab\":\"1\",\"advlist\":\"1\",\"autosave\":\"1\",\"contextmenu\":\"1\",\"custom_plugin\":\"\",\"custom_button\":\"\"}}},\"sets_amount\":3,\"html_height\":\"550\",\"html_width\":\"750\"}','','',0,'0000-00-00 00:00:00',3,0),(413,0,'plg_editors-xtd_article','plugin','article','editors-xtd',0,1,1,0,'{\"name\":\"plg_editors-xtd_article\",\"type\":\"plugin\",\"creationDate\":\"October 2009\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_ARTICLE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"article\"}','','','',0,'0000-00-00 00:00:00',1,0),(414,0,'plg_editors-xtd_image','plugin','image','editors-xtd',0,1,1,0,'{\"name\":\"plg_editors-xtd_image\",\"type\":\"plugin\",\"creationDate\":\"August 2004\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_IMAGE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"image\"}','','','',0,'0000-00-00 00:00:00',2,0),(415,0,'plg_editors-xtd_pagebreak','plugin','pagebreak','editors-xtd',0,1,1,0,'{\"name\":\"plg_editors-xtd_pagebreak\",\"type\":\"plugin\",\"creationDate\":\"August 2004\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_EDITORSXTD_PAGEBREAK_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"pagebreak\"}','','','',0,'0000-00-00 00:00:00',3,0),(416,0,'plg_editors-xtd_readmore','plugin','readmore','editors-xtd',0,1,1,0,'{\"name\":\"plg_editors-xtd_readmore\",\"type\":\"plugin\",\"creationDate\":\"March 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_READMORE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"readmore\"}','','','',0,'0000-00-00 00:00:00',4,0),(417,0,'plg_search_categories','plugin','categories','search',0,1,1,0,'{\"name\":\"plg_search_categories\",\"type\":\"plugin\",\"creationDate\":\"November 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_SEARCH_CATEGORIES_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"categories\"}','{\"search_limit\":\"50\",\"search_content\":\"1\",\"search_archived\":\"1\"}','','',0,'0000-00-00 00:00:00',0,0),(418,0,'plg_search_contacts','plugin','contacts','search',0,1,1,0,'{\"name\":\"plg_search_contacts\",\"type\":\"plugin\",\"creationDate\":\"November 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_SEARCH_CONTACTS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"contacts\"}','{\"search_limit\":\"50\",\"search_content\":\"1\",\"search_archived\":\"1\"}','','',0,'0000-00-00 00:00:00',0,0),(419,0,'plg_search_content','plugin','content','search',0,1,1,0,'{\"name\":\"plg_search_content\",\"type\":\"plugin\",\"creationDate\":\"November 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_SEARCH_CONTENT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"content\"}','{\"search_limit\":\"50\",\"search_content\":\"1\",\"search_archived\":\"1\"}','','',0,'0000-00-00 00:00:00',0,0),(420,0,'plg_search_newsfeeds','plugin','newsfeeds','search',0,1,1,0,'{\"name\":\"plg_search_newsfeeds\",\"type\":\"plugin\",\"creationDate\":\"November 2005\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_SEARCH_NEWSFEEDS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"newsfeeds\"}','{\"search_limit\":\"50\",\"search_content\":\"1\",\"search_archived\":\"1\"}','','',0,'0000-00-00 00:00:00',0,0),(422,0,'plg_system_languagefilter','plugin','languagefilter','system',0,0,1,1,'{\"name\":\"plg_system_languagefilter\",\"type\":\"plugin\",\"creationDate\":\"July 2010\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_SYSTEM_LANGUAGEFILTER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"languagefilter\"}','','','',0,'0000-00-00 00:00:00',1,0),(423,0,'plg_system_p3p','plugin','p3p','system',0,0,1,0,'{\"name\":\"plg_system_p3p\",\"type\":\"plugin\",\"creationDate\":\"September 2010\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_P3P_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"p3p\"}','{\"headers\":\"NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM\"}','','',0,'0000-00-00 00:00:00',2,0),(424,0,'plg_system_cache','plugin','cache','system',0,0,1,1,'{\"name\":\"plg_system_cache\",\"type\":\"plugin\",\"creationDate\":\"February 2007\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_CACHE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"cache\"}','{\"browsercache\":\"0\",\"cachetime\":\"15\"}','','',0,'0000-00-00 00:00:00',9,0),(425,0,'plg_system_debug','plugin','debug','system',0,1,1,0,'{\"name\":\"plg_system_debug\",\"type\":\"plugin\",\"creationDate\":\"December 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_DEBUG_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"debug\"}','{\"profile\":\"1\",\"queries\":\"1\",\"memory\":\"1\",\"language_files\":\"1\",\"language_strings\":\"1\",\"strip-first\":\"1\",\"strip-prefix\":\"\",\"strip-suffix\":\"\"}','','',0,'0000-00-00 00:00:00',4,0),(426,0,'plg_system_log','plugin','log','system',0,1,1,1,'{\"name\":\"plg_system_log\",\"type\":\"plugin\",\"creationDate\":\"April 2007\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_LOG_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"log\"}','','','',0,'0000-00-00 00:00:00',5,0),(427,0,'plg_system_redirect','plugin','redirect','system',0,0,1,1,'{\"name\":\"plg_system_redirect\",\"type\":\"plugin\",\"creationDate\":\"April 2009\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_SYSTEM_REDIRECT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"redirect\"}','','','',0,'0000-00-00 00:00:00',6,0),(428,0,'plg_system_remember','plugin','remember','system',0,1,1,1,'{\"name\":\"plg_system_remember\",\"type\":\"plugin\",\"creationDate\":\"April 2007\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_REMEMBER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"remember\"}','','','',0,'0000-00-00 00:00:00',7,0),(429,0,'plg_system_sef','plugin','sef','system',0,1,1,0,'{\"name\":\"plg_system_sef\",\"type\":\"plugin\",\"creationDate\":\"December 2007\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_SEF_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"sef\"}','','','',0,'0000-00-00 00:00:00',8,0),(430,0,'plg_system_logout','plugin','logout','system',0,1,1,1,'{\"name\":\"plg_system_logout\",\"type\":\"plugin\",\"creationDate\":\"April 2009\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_SYSTEM_LOGOUT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"logout\"}','','','',0,'0000-00-00 00:00:00',3,0),(431,0,'plg_user_contactcreator','plugin','contactcreator','user',0,0,1,0,'{\"name\":\"plg_user_contactcreator\",\"type\":\"plugin\",\"creationDate\":\"August 2009\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_CONTACTCREATOR_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"contactcreator\"}','{\"autowebpage\":\"\",\"category\":\"34\",\"autopublish\":\"0\"}','','',0,'0000-00-00 00:00:00',1,0),(432,0,'plg_user_joomla','plugin','joomla','user',0,1,1,0,'{\"name\":\"plg_user_joomla\",\"type\":\"plugin\",\"creationDate\":\"December 2006\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_USER_JOOMLA_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"joomla\"}','{\"autoregister\":\"1\",\"mail_to_user\":\"1\",\"forceLogout\":\"1\"}','','',0,'0000-00-00 00:00:00',2,0),(433,0,'plg_user_profile','plugin','profile','user',0,0,1,0,'{\"name\":\"plg_user_profile\",\"type\":\"plugin\",\"creationDate\":\"January 2008\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_USER_PROFILE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"profile\"}','{\"register-require_address1\":\"1\",\"register-require_address2\":\"1\",\"register-require_city\":\"1\",\"register-require_region\":\"1\",\"register-require_country\":\"1\",\"register-require_postal_code\":\"1\",\"register-require_phone\":\"1\",\"register-require_website\":\"1\",\"register-require_favoritebook\":\"1\",\"register-require_aboutme\":\"1\",\"register-require_tos\":\"1\",\"register-require_dob\":\"1\",\"profile-require_address1\":\"1\",\"profile-require_address2\":\"1\",\"profile-require_city\":\"1\",\"profile-require_region\":\"1\",\"profile-require_country\":\"1\",\"profile-require_postal_code\":\"1\",\"profile-require_phone\":\"1\",\"profile-require_website\":\"1\",\"profile-require_favoritebook\":\"1\",\"profile-require_aboutme\":\"1\",\"profile-require_tos\":\"1\",\"profile-require_dob\":\"1\"}','','',0,'0000-00-00 00:00:00',0,0),(434,0,'plg_extension_joomla','plugin','joomla','extension',0,1,1,1,'{\"name\":\"plg_extension_joomla\",\"type\":\"plugin\",\"creationDate\":\"May 2010\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_EXTENSION_JOOMLA_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"joomla\"}','','','',0,'0000-00-00 00:00:00',1,0),(435,0,'plg_content_joomla','plugin','joomla','content',0,1,1,0,'{\"name\":\"plg_content_joomla\",\"type\":\"plugin\",\"creationDate\":\"November 2010\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_CONTENT_JOOMLA_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"joomla\"}','','','',0,'0000-00-00 00:00:00',0,0),(436,0,'plg_system_languagecode','plugin','languagecode','system',0,0,1,0,'{\"name\":\"plg_system_languagecode\",\"type\":\"plugin\",\"creationDate\":\"November 2011\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_SYSTEM_LANGUAGECODE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"languagecode\"}','','','',0,'0000-00-00 00:00:00',10,0),(437,0,'plg_quickicon_joomlaupdate','plugin','joomlaupdate','quickicon',0,1,1,1,'{\"name\":\"plg_quickicon_joomlaupdate\",\"type\":\"plugin\",\"creationDate\":\"August 2011\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_QUICKICON_JOOMLAUPDATE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"joomlaupdate\"}','','','',0,'0000-00-00 00:00:00',0,0),(438,0,'plg_quickicon_extensionupdate','plugin','extensionupdate','quickicon',0,1,1,1,'{\"name\":\"plg_quickicon_extensionupdate\",\"type\":\"plugin\",\"creationDate\":\"August 2011\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_QUICKICON_EXTENSIONUPDATE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"extensionupdate\"}','','','',0,'0000-00-00 00:00:00',0,0),(439,0,'plg_captcha_recaptcha','plugin','recaptcha','captcha',0,0,1,0,'{\"name\":\"plg_captcha_recaptcha\",\"type\":\"plugin\",\"creationDate\":\"December 2011\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.4.0\",\"description\":\"PLG_CAPTCHA_RECAPTCHA_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"recaptcha\"}','{\"public_key\":\"\",\"private_key\":\"\",\"theme\":\"clean\"}','','',0,'0000-00-00 00:00:00',0,0),(440,0,'plg_system_highlight','plugin','highlight','system',0,1,1,0,'{\"name\":\"plg_system_highlight\",\"type\":\"plugin\",\"creationDate\":\"August 2011\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_SYSTEM_HIGHLIGHT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"highlight\"}','','','',0,'0000-00-00 00:00:00',7,0),(441,0,'plg_content_finder','plugin','finder','content',0,0,1,0,'{\"name\":\"plg_content_finder\",\"type\":\"plugin\",\"creationDate\":\"December 2011\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_CONTENT_FINDER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"finder\"}','','','',0,'0000-00-00 00:00:00',0,0),(442,0,'plg_finder_categories','plugin','categories','finder',0,1,1,0,'{\"name\":\"plg_finder_categories\",\"type\":\"plugin\",\"creationDate\":\"August 2011\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_FINDER_CATEGORIES_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"categories\"}','','','',0,'0000-00-00 00:00:00',1,0),(443,0,'plg_finder_contacts','plugin','contacts','finder',0,1,1,0,'{\"name\":\"plg_finder_contacts\",\"type\":\"plugin\",\"creationDate\":\"August 2011\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_FINDER_CONTACTS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"contacts\"}','','','',0,'0000-00-00 00:00:00',2,0),(444,0,'plg_finder_content','plugin','content','finder',0,1,1,0,'{\"name\":\"plg_finder_content\",\"type\":\"plugin\",\"creationDate\":\"August 2011\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_FINDER_CONTENT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"content\"}','','','',0,'0000-00-00 00:00:00',3,0),(445,0,'plg_finder_newsfeeds','plugin','newsfeeds','finder',0,1,1,0,'{\"name\":\"plg_finder_newsfeeds\",\"type\":\"plugin\",\"creationDate\":\"August 2011\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_FINDER_NEWSFEEDS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"newsfeeds\"}','','','',0,'0000-00-00 00:00:00',4,0),(447,0,'plg_finder_tags','plugin','tags','finder',0,1,1,0,'{\"name\":\"plg_finder_tags\",\"type\":\"plugin\",\"creationDate\":\"February 2013\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_FINDER_TAGS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"tags\"}','','','',0,'0000-00-00 00:00:00',0,0),(448,0,'plg_twofactorauth_totp','plugin','totp','twofactorauth',0,0,1,0,'{\"name\":\"plg_twofactorauth_totp\",\"type\":\"plugin\",\"creationDate\":\"August 2013\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.2.0\",\"description\":\"PLG_TWOFACTORAUTH_TOTP_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"totp\"}','','','',0,'0000-00-00 00:00:00',0,0),(449,0,'plg_authentication_cookie','plugin','cookie','authentication',0,1,1,0,'{\"name\":\"plg_authentication_cookie\",\"type\":\"plugin\",\"creationDate\":\"July 2013\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_AUTH_COOKIE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"cookie\"}','','','',0,'0000-00-00 00:00:00',0,0),(450,0,'plg_twofactorauth_yubikey','plugin','yubikey','twofactorauth',0,0,1,0,'{\"name\":\"plg_twofactorauth_yubikey\",\"type\":\"plugin\",\"creationDate\":\"September 2013\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.2.0\",\"description\":\"PLG_TWOFACTORAUTH_YUBIKEY_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"yubikey\"}','','','',0,'0000-00-00 00:00:00',0,0),(451,0,'plg_search_tags','plugin','tags','search',0,1,1,0,'{\"name\":\"plg_search_tags\",\"type\":\"plugin\",\"creationDate\":\"March 2014\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_SEARCH_TAGS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"tags\"}','{\"search_limit\":\"50\",\"show_tagged_items\":\"1\"}','','',0,'0000-00-00 00:00:00',0,0),(452,0,'plg_system_updatenotification','plugin','updatenotification','system',0,1,1,0,'{\"name\":\"plg_system_updatenotification\",\"type\":\"plugin\",\"creationDate\":\"May 2015\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.5.0\",\"description\":\"PLG_SYSTEM_UPDATENOTIFICATION_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"updatenotification\"}','{\"lastrun\":1496854713}','','',0,'0000-00-00 00:00:00',0,0),(453,0,'plg_editors-xtd_module','plugin','module','editors-xtd',0,1,1,0,'{\"name\":\"plg_editors-xtd_module\",\"type\":\"plugin\",\"creationDate\":\"October 2015\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.5.0\",\"description\":\"PLG_MODULE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"module\"}','','','',0,'0000-00-00 00:00:00',0,0),(454,0,'plg_system_stats','plugin','stats','system',0,1,1,0,'{\"name\":\"plg_system_stats\",\"type\":\"plugin\",\"creationDate\":\"November 2013\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.5.0\",\"description\":\"PLG_SYSTEM_STATS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"stats\"}','{\"mode\":3,\"lastrun\":1494392799,\"unique_id\":\"c2132a5b3b3851addcd4fa0df4b81c370a7b696f\",\"interval\":12}','','',0,'0000-00-00 00:00:00',0,0),(455,0,'plg_installer_packageinstaller','plugin','packageinstaller','installer',0,1,1,1,'{\"name\":\"plg_installer_packageinstaller\",\"type\":\"plugin\",\"creationDate\":\"May 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.6.0\",\"description\":\"PLG_INSTALLER_PACKAGEINSTALLER_PLUGIN_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"packageinstaller\"}','','','',0,'0000-00-00 00:00:00',1,0),(456,0,'PLG_INSTALLER_FOLDERINSTALLER','plugin','folderinstaller','installer',0,1,1,1,'{\"name\":\"PLG_INSTALLER_FOLDERINSTALLER\",\"type\":\"plugin\",\"creationDate\":\"May 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.6.0\",\"description\":\"PLG_INSTALLER_FOLDERINSTALLER_PLUGIN_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"folderinstaller\"}','','','',0,'0000-00-00 00:00:00',2,0),(457,0,'PLG_INSTALLER_URLINSTALLER','plugin','urlinstaller','installer',0,1,1,1,'{\"name\":\"PLG_INSTALLER_URLINSTALLER\",\"type\":\"plugin\",\"creationDate\":\"May 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.6.0\",\"description\":\"PLG_INSTALLER_URLINSTALLER_PLUGIN_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"urlinstaller\"}','','','',0,'0000-00-00 00:00:00',3,0),(458,0,'plg_quickicon_phpversioncheck','plugin','phpversioncheck','quickicon',0,1,1,1,'{\"name\":\"plg_quickicon_phpversioncheck\",\"type\":\"plugin\",\"creationDate\":\"August 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_QUICKICON_PHPVERSIONCHECK_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"phpversioncheck\"}','','','',0,'0000-00-00 00:00:00',0,0),(459,0,'plg_editors-xtd_menu','plugin','menu','editors-xtd',0,1,1,0,'{\"name\":\"plg_editors-xtd_menu\",\"type\":\"plugin\",\"creationDate\":\"August 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_EDITORS-XTD_MENU_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"menu\"}','','','',0,'0000-00-00 00:00:00',0,0),(460,0,'plg_editors-xtd_contact','plugin','contact','editors-xtd',0,1,1,0,'{\"name\":\"plg_editors-xtd_contact\",\"type\":\"plugin\",\"creationDate\":\"October 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_EDITORS-XTD_CONTACT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"contact\"}','','','',0,'0000-00-00 00:00:00',0,0),(461,0,'plg_system_fields','plugin','fields','system',0,1,1,0,'{\"name\":\"plg_system_fields\",\"type\":\"plugin\",\"creationDate\":\"March 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_SYSTEM_FIELDS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"fields\"}','','','',0,'0000-00-00 00:00:00',0,0),(462,0,'plg_fields_calendar','plugin','calendar','fields',0,1,1,0,'{\"name\":\"plg_fields_calendar\",\"type\":\"plugin\",\"creationDate\":\"March 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_CALENDAR_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"calendar\"}','','','',0,'0000-00-00 00:00:00',0,0),(463,0,'plg_fields_checkboxes','plugin','checkboxes','fields',0,1,1,0,'{\"name\":\"plg_fields_checkboxes\",\"type\":\"plugin\",\"creationDate\":\"March 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_CHECKBOXES_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"checkboxes\"}','','','',0,'0000-00-00 00:00:00',0,0),(464,0,'plg_fields_color','plugin','color','fields',0,1,1,0,'{\"name\":\"plg_fields_color\",\"type\":\"plugin\",\"creationDate\":\"March 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_COLOR_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"color\"}','','','',0,'0000-00-00 00:00:00',0,0),(465,0,'plg_fields_editor','plugin','editor','fields',0,1,1,0,'{\"name\":\"plg_fields_editor\",\"type\":\"plugin\",\"creationDate\":\"March 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_EDITOR_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"editor\"}','','','',0,'0000-00-00 00:00:00',0,0),(466,0,'plg_fields_imagelist','plugin','imagelist','fields',0,1,1,0,'{\"name\":\"plg_fields_imagelist\",\"type\":\"plugin\",\"creationDate\":\"March 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_IMAGELIST_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"imagelist\"}','','','',0,'0000-00-00 00:00:00',0,0),(467,0,'plg_fields_integer','plugin','integer','fields',0,1,1,0,'{\"name\":\"plg_fields_integer\",\"type\":\"plugin\",\"creationDate\":\"March 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_INTEGER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"integer\"}','{\"multiple\":\"0\",\"first\":\"1\",\"last\":\"100\",\"step\":\"1\"}','','',0,'0000-00-00 00:00:00',0,0),(468,0,'plg_fields_list','plugin','list','fields',0,1,1,0,'{\"name\":\"plg_fields_list\",\"type\":\"plugin\",\"creationDate\":\"March 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_LIST_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"list\"}','','','',0,'0000-00-00 00:00:00',0,0),(469,0,'plg_fields_media','plugin','media','fields',0,1,1,0,'{\"name\":\"plg_fields_media\",\"type\":\"plugin\",\"creationDate\":\"March 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_MEDIA_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"media\"}','','','',0,'0000-00-00 00:00:00',0,0),(470,0,'plg_fields_radio','plugin','radio','fields',0,1,1,0,'{\"name\":\"plg_fields_radio\",\"type\":\"plugin\",\"creationDate\":\"March 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_RADIO_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"radio\"}','','','',0,'0000-00-00 00:00:00',0,0),(471,0,'plg_fields_sql','plugin','sql','fields',0,1,1,0,'{\"name\":\"plg_fields_sql\",\"type\":\"plugin\",\"creationDate\":\"March 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_SQL_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"sql\"}','','','',0,'0000-00-00 00:00:00',0,0),(472,0,'plg_fields_text','plugin','text','fields',0,1,1,0,'{\"name\":\"plg_fields_text\",\"type\":\"plugin\",\"creationDate\":\"March 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_TEXT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"text\"}','','','',0,'0000-00-00 00:00:00',0,0),(473,0,'plg_fields_textarea','plugin','textarea','fields',0,1,1,0,'{\"name\":\"plg_fields_textarea\",\"type\":\"plugin\",\"creationDate\":\"March 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_TEXTAREA_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"textarea\"}','','','',0,'0000-00-00 00:00:00',0,0),(474,0,'plg_fields_url','plugin','url','fields',0,1,1,0,'{\"name\":\"plg_fields_url\",\"type\":\"plugin\",\"creationDate\":\"March 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_URL_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"url\"}','','','',0,'0000-00-00 00:00:00',0,0),(475,0,'plg_fields_user','plugin','user','fields',0,1,1,0,'{\"name\":\"plg_fields_user\",\"type\":\"plugin\",\"creationDate\":\"March 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_USER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"user\"}','','','',0,'0000-00-00 00:00:00',0,0),(476,0,'plg_fields_usergrouplist','plugin','usergrouplist','fields',0,1,1,0,'{\"name\":\"plg_fields_usergrouplist\",\"type\":\"plugin\",\"creationDate\":\"March 2016\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_USERGROUPLIST_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"usergrouplist\"}','','','',0,'0000-00-00 00:00:00',0,0),(477,0,'plg_content_fields','plugin','fields','content',0,1,1,0,'{\"name\":\"plg_content_fields\",\"type\":\"plugin\",\"creationDate\":\"February 2017\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_CONTENT_FIELDS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"fields\"}','','','',0,'0000-00-00 00:00:00',0,0),(478,0,'plg_editors-xtd_fields','plugin','fields','editors-xtd',0,1,1,0,'{\"name\":\"plg_editors-xtd_fields\",\"type\":\"plugin\",\"creationDate\":\"February 2017\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_EDITORS-XTD_FIELDS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"fields\"}','','','',0,'0000-00-00 00:00:00',0,0),(503,0,'beez3','template','beez3','',0,1,1,0,'{\"name\":\"beez3\",\"type\":\"template\",\"creationDate\":\"25 November 2009\",\"author\":\"Angie Radtke\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.\",\"authorEmail\":\"a.radtke@derauftritt.de\",\"authorUrl\":\"http:\\/\\/www.der-auftritt.de\",\"version\":\"3.1.0\",\"description\":\"TPL_BEEZ3_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"templateDetails\"}','{\"wrapperSmall\":\"53\",\"wrapperLarge\":\"72\",\"sitetitle\":\"\",\"sitedescription\":\"\",\"navposition\":\"center\",\"templatecolor\":\"nature\"}','','',0,'0000-00-00 00:00:00',0,0),(504,0,'hathor','template','hathor','',1,1,1,0,'{\"name\":\"hathor\",\"type\":\"template\",\"creationDate\":\"May 2010\",\"author\":\"Andrea Tarr\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"\",\"version\":\"3.0.0\",\"description\":\"TPL_HATHOR_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"templateDetails\"}','{\"showSiteName\":\"0\",\"colourChoice\":\"0\",\"boldText\":\"0\"}','','',0,'0000-00-00 00:00:00',0,0),(506,0,'protostar','template','protostar','',0,1,1,0,'{\"name\":\"protostar\",\"type\":\"template\",\"creationDate\":\"4\\/30\\/2012\",\"author\":\"Kyle Ledbetter\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"\",\"version\":\"1.0\",\"description\":\"TPL_PROTOSTAR_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"templateDetails\"}','{\"templateColor\":\"\",\"logoFile\":\"\",\"googleFont\":\"1\",\"googleFontName\":\"Open+Sans\",\"fluidContainer\":\"0\"}','','',0,'0000-00-00 00:00:00',0,0),(507,0,'isis','template','isis','',1,1,1,0,'{\"name\":\"isis\",\"type\":\"template\",\"creationDate\":\"3\\/30\\/2012\",\"author\":\"Kyle Ledbetter\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"\",\"version\":\"1.0\",\"description\":\"TPL_ISIS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"templateDetails\"}','{\"templateColor\":\"\",\"logoFile\":\"\"}','','',0,'0000-00-00 00:00:00',0,0),(600,802,'English (en-GB)','language','en-GB','',0,1,1,1,'{\"name\":\"English (en-GB)\",\"type\":\"language\",\"creationDate\":\"April 2017\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"en-GB site language\",\"group\":\"\"}','','','',0,'0000-00-00 00:00:00',0,0),(601,802,'English (en-GB)','language','en-GB','',1,1,1,1,'{\"name\":\"English (en-GB)\",\"type\":\"language\",\"creationDate\":\"April 2017\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"en-GB administrator language\",\"group\":\"\"}','','','',0,'0000-00-00 00:00:00',0,0),(700,0,'files_joomla','file','joomla','',0,1,1,1,'{\"name\":\"files_joomla\",\"type\":\"file\",\"creationDate\":\"April 2017\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 - 2017 Open Source Matters. All rights reserved\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"FILES_JOOMLA_XML_DESCRIPTION\",\"group\":\"\"}','','','',0,'0000-00-00 00:00:00',0,0),(802,0,'English (en-GB) Language Pack','package','pkg_en-GB','',0,1,1,1,'{\"name\":\"English (en-GB) Language Pack\",\"type\":\"package\",\"creationDate\":\"April 2017\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0.1\",\"description\":\"en-GB language pack\",\"group\":\"\",\"filename\":\"pkg_en-GB\"}','','','',0,'0000-00-00 00:00:00',0,0),(10000,10002,'PortugusdoBrasilpt-BR','language','pt-BR','',0,1,0,0,'{\"name\":\"Portugu\\u00eas do Brasil (pt-BR)\",\"type\":\"language\",\"creationDate\":\"Maio de 2017\",\"author\":\"Equipe de Tradu\\u00e7\\u00e3o Portugu\\u00eas Brasileiro\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.1.1\",\"description\":\"pt-BR site language\",\"group\":\"\",\"filename\":\"install\"}','{}','','',0,'0000-00-00 00:00:00',0,0),(10001,10002,'PortugusdoBrasilpt-BR','language','pt-BR','',1,1,0,0,'{\"name\":\"Portugu\\u00eas do Brasil (pt-BR)\",\"type\":\"language\",\"creationDate\":\"Maio de 2017\",\"author\":\"Equipe de Tradu\\u00e7\\u00e3o Portugu\\u00eas do Brasil\",\"copyright\":\"Copyright (C) 2005-2017 Open Source Matters. Todos os direitos reservados.\",\"authorEmail\":\"pt-br@joomlacarioca.com.br\",\"authorUrl\":\"http:\\/\\/brasil.joomla.com\",\"version\":\"3.7.1.1\",\"description\":\"Brazilian Portuguese Administrator language\",\"group\":\"\",\"filename\":\"install\"}','{}','','',0,'0000-00-00 00:00:00',0,0),(10002,0,'Português do Brasil (pt-BR)','package','pkg_pt-BR','',0,1,1,0,'{\"name\":\"Portugu\\u00eas do Brasil (pt-BR)\",\"type\":\"package\",\"creationDate\":\"Maio de 2017\",\"author\":\"Equipe de Tradu\\u00e7\\u00e3o Portugu\\u00eas do Brasil\",\"copyright\":\"Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.\",\"authorEmail\":\"pt-br@joomlacarioca.com.br\",\"authorUrl\":\"http:\\/\\/brasil.joomla.com\",\"version\":\"3.7.1.1\",\"description\":\"<div style=\\\"text-align:left;\\\">\\n  <h2>Pacote de Idioma Portugu\\u00eas Brasileiro (pt-BR) completo para Joomla! 3.7.1 instalado com sucesso!<\\/h2>\\n  <h3>Vers\\u00e3o 3.7.1.1 <\\/h3>\\n  <p>Por favor, informe qualquer problema ou assunto relacionado encontrado na p\\u00e1gina <a href=\\\"https:\\/\\/www.facebook.com\\/groups\\/traduzjoomla\\/\\\" target=\\\"_blank\\\">Grupo Tradu\\u00e7\\u00f5es Joomla pt-BR<\\/a> no Facebook.<\\/p>\\n  <p>Traduzido pela <a href=\\\"http:\\/\\/brasil.joomla.com\\/como-participar\\/9-traducao-no-projeto\\\" target=\\\"_blank\\\">Equipe de Tradu\\u00e7\\u00e3o Portugu\\u00eas Brasileiro<\\/a>.<\\/p>\\n  <h2>Successfully installed the Full Brazilian Portugues (pt-BR) Language Pack for Joomla! 3.7.1<\\/h2>\\n  <h3>Version 3.7.1.1<\\/h3>\\n  <p>Please report any bugs or issues at the <a href=\\\"https:\\/\\/www.facebook.com\\/groups\\/traduzjoomla\\/\\\" target=\\\"_blank\\\">pt-BR Translation Group<\\/a> Facebook page.<\\/p>\\n  <p>Translated by the <a href=\\\"http:\\/\\/brasil.joomla.com\\/como-participar\\/9-traducao-no-projeto\\\" target=\\\"_blank\\\">Brazilian Portuguese Translation Team<\\/a>.<\\/p>\\n  <\\/div>\",\"group\":\"\",\"filename\":\"pkg_pt-BR\"}','{}','','',0,'0000-00-00 00:00:00',0,0),(10003,0,'AS 002085 Free','template','as002085free','',0,1,1,0,'{\"name\":\"AS 002085 Free\",\"type\":\"template\",\"creationDate\":\"2015-12-03\",\"author\":\"AS Designing\",\"copyright\":\"AS Designing\",\"authorEmail\":\"\",\"authorUrl\":\"http:\\/\\/www.asdesigning.com\",\"version\":\"2.1.0\",\"description\":\"\\n\\t\\n\\n\\t\\t\\t<img src=\\\"..\\/templates\\/as002085free\\/template_thumbnail.png\\\" align=\\\"left\\\" class=\\\"template_thumbnail\\\" \\n\\t\\t\\t\\t\\tstyle=\\\"margin: 0px 40px 10px 0px; display: none;\\\" \\/>\\n\\t\\t\\t\\t\\t\\n\\t\\t\\t<h1><span  style=\\\"padding-top: 10px; display: block\\\">AS Template 002085 - Free Version for Joomla! 3.x<\\/span><\\/h1>\\n\\t\\t\\t\\n\\t\\t\\t<br \\/><a href=\\\"http:\\/\\/www.astemplates.com\\/joomla-template-documentation\\/436-002085\\\" target=\\\"_blank\\\">Click here<\\/a>  to see the template documentation.\\n\\t\\t\\t<br \\/>Check our <a href=\\\"http:\\/\\/blog.astemplates.com\\/category\\/joomla-tutorial\\/\\\" target=\\\"_blank\\\">Joomla Tutorial<\\/a>.<br \\/>\\n\\t\\t\\t\\n\\t\\t\\t<span style=\\\"color:orange;\\\">\\n\\t\\t\\t<b>Free Version is limited and may not include all configuration parameters and module positions.<\\/b><br \\/><br \\/>\\n\\t\\t\\t<\\/span>\\n\\t\\t\\t \\n\\t\\t\\t<a href=\\\"http:\\/\\/www.astemplates.com\\/joomla-template-details\\/436-002085\\\" target=\\\"_blank\\\">\\n\\t\\t\\t<b style=\\\"color:red;  font-size:18px\\\">DOWNLOAD full free package from here:<\\/b><\\/a><br \\/>\\n\\t\\t\\t<a href=\\\"http:\\/\\/www.astemplates.com\\/joomla-template-details\\/436-002085\\\" target=\\\"_blank\\\">http:\\/\\/www.astemplates.com\\/joomla-template-details\\/436-002085<\\/a>\\n\\t\\t\\t<br \\/><br \\/><br \\/><br \\/>\\n\\n\\t\\t\\t<hr \\/>\\n\\t\\t\\t<h3>Popular AS Templates:<\\/h3><br \\/>\\n\\t\\t\\t    <a href=\\\"http:\\/\\/www.astemplates.com\\/joomla-template-details\\/434-002083\\\" target=\\\"_blank\\\" style=\\\"margin: 10px 20px 20px 0px; display: inline-block\\\">\\n\\t\\t\\t\\t<img src=\\\"http:\\/\\/www.astemplates.com\\/content\\/templates\\/434\\/template.thumbnail.png\\\">\\n\\t\\t\\t\\t<\\/a>\\n\\t\\t\\t    <a href=\\\"http:\\/\\/www.astemplates.com\\/joomla-template-details\\/219-002060\\\" target=\\\"_blank\\\" style=\\\"margin: 10px 20px 20px 0px; display: inline-block\\\">\\n\\t\\t\\t\\t<img src=\\\"http:\\/\\/www.astemplates.com\\/content\\/templates\\/219\\/template.thumbnail.png\\\">\\n\\t\\t\\t\\t<\\/a>\\n\\t\\t\\t    <a href=\\\"http:\\/\\/www.astemplates.com\\/joomla-template-details\\/550-002097\\\" target=\\\"_blank\\\" style=\\\"margin: 10px 20px 20px 0px; display: inline-block\\\">\\n\\t\\t\\t\\t<img src=\\\"http:\\/\\/www.astemplates.com\\/content\\/templates\\/550\\/template.thumbnail.png\\\">\\n\\t\\t\\t\\t<\\/a>\\n\\t\\t\\t    <a href=\\\"http:\\/\\/www.astemplates.com\\/joomla-template-details\\/157-002044\\\" target=\\\"_blank\\\" style=\\\"margin: 10px 20px 20px 0px; display: inline-block\\\">\\n\\t\\t\\t\\t<img src=\\\"http:\\/\\/www.astemplates.com\\/content\\/templates\\/157\\/template.thumbnail.png\\\">\\n\\t\\t\\t\\t<\\/a>\\n\\t\\t\\t    <a href=\\\"http:\\/\\/www.astemplates.com\\/joomla-template-details\\/545-002096\\\" target=\\\"_blank\\\" style=\\\"margin: 10px 20px 20px 0px; display: inline-block\\\">\\n\\t\\t\\t\\t<img src=\\\"http:\\/\\/www.astemplates.com\\/content\\/templates\\/545\\/template.thumbnail.png\\\">\\n\\t\\t\\t\\t<\\/a>\\n\\t\\t\\t\\t\\n\\t\\t\\t    <a href=\\\"http:\\/\\/www.astemplates.com\\/joomla-template-details\\/212-002057\\\" target=\\\"_blank\\\" style=\\\"margin: 10px 20px 20px 0px; display: inline-block\\\">\\n\\t\\t\\t\\t<img src=\\\"http:\\/\\/www.astemplates.com\\/content\\/templates\\/212\\/template.thumbnail.png\\\">\\n\\t\\t\\t\\t<\\/a>\\n\\t\\t\\t    <a href=\\\"http:\\/\\/www.astemplates.com\\/joomla-template-details\\/228-002063\\\" target=\\\"_blank\\\" style=\\\"margin: 10px 20px 20px 0px; display: inline-block\\\">\\n\\t\\t\\t\\t<img src=\\\"http:\\/\\/www.astemplates.com\\/content\\/templates\\/228\\/template.thumbnail.png\\\">\\n\\t\\t\\t\\t<\\/a>\\n\\t\\t\\t    <a href=\\\"http:\\/\\/www.astemplates.com\\/joomla-template-details\\/218-002059\\\" target=\\\"_blank\\\" style=\\\"margin: 10px 20px 20px 0px; display: inline-block\\\">\\n\\t\\t\\t\\t<img src=\\\"http:\\/\\/www.astemplates.com\\/content\\/templates\\/218\\/template.thumbnail.png\\\">\\n\\t\\t\\t\\t<\\/a>\\n\\t\\t\\t    <a href=\\\"http:\\/\\/www.astemplates.com\\/joomla-template-details\\/458-002091\\\" target=\\\"_blank\\\" style=\\\"margin: 10px 20px 20px 0px; display: inline-block\\\">\\n\\t\\t\\t\\t<img src=\\\"http:\\/\\/www.astemplates.com\\/content\\/templates\\/458\\/template.thumbnail.png\\\">\\n\\t\\t\\t\\t<\\/a>\\n\\t\\t\\t    <a href=\\\"http:\\/\\/www.astemplates.com\\/joomla-template-details\\/445-002090\\\" target=\\\"_blank\\\" style=\\\"margin: 10px 20px 20px 0px; display: inline-block\\\">\\n\\t\\t\\t\\t<img src=\\\"http:\\/\\/www.astemplates.com\\/content\\/templates\\/445\\/template.thumbnail.png\\\">\\n\\t\\t\\t\\t<\\/a>\\t\\t\\t\\t\\n\\t\\t\\t<br \\/><br \\/>\\n\\t\",\"group\":\"\",\"filename\":\"templateDetails\"}','{\"theme_style\":\"default\",\"theme_layout\":\"1\",\"theme_responsive\":\"1\",\"logo_img\":\"\",\"logo_slogan\":\"\",\"aside_left_width\":\"4\",\"aside_right_width\":\"4\",\"show_footer_logo\":\"0\",\"footer_logo_img\":\"\",\"footer_copy\":\"1\",\"show_footer_year\":\"1\",\"body_font_family\":\"Lato\",\"heading_font_family\":\"Lato\",\"body_font_size\":\"\",\"h1_font_size\":\"\",\"h2_font_size\":\"\",\"h3_font_size\":\"\",\"h4_font_size\":\"\",\"h5_font_size\":\"\",\"h6_font_size\":\"\",\"featured_page_heading\":\"h1\",\"featured_item_heading\":\"h4\",\"category_page_heading\":\"h1\",\"category_item_heading\":\"h3\",\"blog_page_heading\":\"h1\",\"blog_item_heading\":\"h2\",\"item_item_heading\":\"h1\",\"itemblog_item_heading\":\"h3\",\"totop\":\"1\",\"totop_text\":\"Back to top\",\"todesktop\":\"1\",\"todesktop_text\":\"Back to desktop version\",\"tomobile_text\":\"Back to mobile version\"}','','',0,'0000-00-00 00:00:00',0,0),(10004,0,'AS Sequence Slider','module','mod_as_sequence_slider','',0,1,0,0,'{\"name\":\"AS Sequence Slider\",\"type\":\"module\",\"creationDate\":\"2014-11-05\",\"author\":\"AS Designing\",\"copyright\":\"\",\"authorEmail\":\"\",\"authorUrl\":\"http:\\/\\/www.asdesigning.com\",\"version\":\"1.0.0\",\"description\":\"\\n\\t\\n\\n\\t\\t\\tThis extension is a combination of <a href=\\\"http:\\/\\/www.sequencejs.com\\\" target=\\\"_blank\\\">Sequence Slider<\\/a> script \\n\\t\\t\\tand default Joomla Articles newsflash module.\\n\\t\\t\\t\\n\\t\\t\\t<br \\/>Visit our site for more extensions and templates: <a href=\\\"http:\\/\\/www.astemplates.com\\\" target=\\\"_blank\\\">http:\\/\\/www.astemplates.com<\\/a>.\\n\\t\\t\\t<br \\/><br \\/>\\n\\t\\t\\t\\n\\t\\t\\t<\\/span>\\n\\t\\t\\t<br \\/><br \\/>\\n\\t\",\"group\":\"\",\"filename\":\"mod_as_sequence_slider\"}','{\"catid\":\"\",\"image\":\"1\",\"item_title\":\"1\",\"item_heading\":\"h1\",\"published\":\"0\",\"readmore\":\"1\",\"count\":\"3\",\"ordering\":\"a.publish_up\",\"target\":\"self\",\"theme\":\"0\",\"show_caption\":\"1\",\"autoPlay\":\"1\",\"height\":\"50%\",\"imageLink\":\"false\",\"loader\":\"0\",\"autoPlayDelay\":\"10000\",\"hover\":\"0\",\"navigation\":\"0\",\"pagination\":\"0\",\"playPause\":\"0\",\"thumbnails\":\"false\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"itemid\"}','','',0,'0000-00-00 00:00:00',0,0),(10005,0,'AS Superfish Menu','module','mod_as_superfish_menu','',0,1,0,0,'{\"name\":\"AS Superfish Menu\",\"type\":\"module\",\"creationDate\":\"2014-10-24\",\"author\":\"AS Designing\",\"copyright\":\"\",\"authorEmail\":\"\",\"authorUrl\":\"http:\\/\\/www.asdesigning.com\",\"version\":\"1.0.0\",\"description\":\"\\n\\t\\n\\n\\t\\t\\tThe AS Superfish Menu module displays a main Joomla! template menu for desktop and mobile devices.<br \\/>\\n\\t\\t\\t\\n\\t\\t\\t<br \\/>Visit our site for more extensions: <a href=\\\"http:\\/\\/www.astemplates.com\\\" target=\\\"_blank\\\">http:\\/\\/www.astemplates.com<\\/a>.\\n\\t\\t\\t<br \\/><br \\/>\\n\\t\\t\\t\\n\\t\\t\\t<\\/span>\\n\\t\\t\\t<br \\/><br \\/>\\n\\t\",\"group\":\"\",\"filename\":\"mod_as_superfish_menu\"}','{\"startLevel\":\"1\",\"endLevel\":\"0\",\"showAllChildren\":\"1\",\"moduleclass_sfx\":\"navigation\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"itemid\",\"sf-delay\":\"500\",\"sf-sticky\":\"1\",\"sf-dynamic\":\"0\",\"sf-layout\":\"hor\",\"sf-onclick\":\"0\",\"sf-mobiselect\":\"0\",\"sf-mobinavtext\":\"Navigate to...\",\"sf-mobiclassname\":\"select-menu\",\"sf-mobisubclassname\":\"sub-menu\",\"sf-mobisticky\":\"0\"}','','',0,'0000-00-00 00:00:00',0,0),(10006,0,'AS ArtSlider','module','mod_as_artslider','',0,1,0,0,'{\"name\":\"AS ArtSlider\",\"type\":\"module\",\"creationDate\":\"2013-01-25\",\"author\":\"AS Designing\",\"copyright\":\"AS Designing - All rights reserved\",\"authorEmail\":\"\",\"authorUrl\":\"http:\\/\\/www.asdesigning.com\",\"version\":\"1.1.0\",\"description\":\"\\n\\t\\n\\n\\t\\t\\t<img src=\\\"..\\/modules\\/mod_as_artslider\\/extension_thumbnail.png\\\" align=\\\"left\\\" style=\\\"margin: 0px 10px 10px 0px;\\\" \\/>\\n\\t\\t\\t\\n\\t\\t\\t<h1>AS ArtSlider<\\/h1>\\n\\t\\t\\tThe AS ArtSlider module is a combination of default Joomla Articles Newsflash module and Camera Slideshow jQuery plugin.<br \\/>\\n\\t\\t\\t\\n\\t\\t\\t<br \\/>Visit our site for more extensions: <a href=\\\"http:\\/\\/www.astemplates.com\\\" target=\\\"_blank\\\">http:\\/\\/www.astemplates.com<\\/a>.\\n\\t\\t\\t<br \\/><br \\/>\\n\\t\\t\\t\\n\\t\\t\\t<\\/span>\\n\\t\\t\\t<br \\/><br \\/>\\n\\t\",\"group\":\"\",\"filename\":\"mod_as_artslider\"}','{\"category_id\":\"\",\"show_image\":\"1\",\"show_title\":\"1\",\"title_heading\":\"h2\",\"title_color\":\"\",\"firstword_title_color\":\"\",\"secondword_title_color\":\"\",\"link_title_color\":\"\",\"link_hover_title_color\":\"\",\"readmore\":\"0\",\"readmore_txt\":\"Read More\",\"readmore_gradient_topcolor\":\"\",\"readmore_gradient_bottomcolor\":\"\",\"readmore_bgcolor\":\"\",\"readmore_color\":\"\",\"articles_num\":\"3\",\"ordering\":\"a.publish_up\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"itemid\",\"slider_style\":\"0\",\"slider_alignment\":\"center\",\"slider_height\":\"50%\",\"slider_autoplay\":\"1\",\"slider_mobi_autoplay\":\"0\",\"slider_columns\":\"6\",\"slider_rows\":\"4\",\"slider_slicedcols\":\"6\",\"slider_slicedrows\":\"4\",\"slider_easing\":\"easeInOutExpo\",\"slider_mobieasing\":\"easeInOutExpo\",\"slider_animation\":\"random\",\"slider_mobianimation\":\"simpleFade\",\"slider_grid_diff\":\"250\",\"slider_grid_opacity\":\"0\",\"slider_showtime\":\"5000\",\"slider_transperiod\":\"500\",\"slider_pause\":\"1\",\"slider_stop\":\"0\",\"slider_pagination\":\"1\",\"slider_pagination_radius\":\"14px\",\"slider_pagination_color\":\"\",\"slider_pagination_hovercolor\":\"\",\"slider_navigation\":\"0\",\"slider_hover_navigation\":\"0\",\"slider_play_pause\":\"0\",\"slider_caption\":\"1\",\"slider_caption_color\":\"\",\"slider_caption_fontsize\":\"14px\",\"slider_caption_animation\":\"fadeIn\"}','','',0,'0000-00-00 00:00:00',0,0),(10007,0,'JM Slideshow Responsive','module','mod_jmslideshow','',0,1,0,0,'{\"name\":\"JM Slideshow Responsive\",\"type\":\"module\",\"creationDate\":\"4\\/4\\/2013\",\"author\":\"JoomlaMan.com\",\"copyright\":\"\\u00a9 2012-2013 JoomlaMan.com\",\"authorEmail\":\"info@joomlaman.com\",\"authorUrl\":\"www.joomlaman.com\",\"version\":\"1.3.4\",\"description\":\"\\n        \\n\\t\\t<style type=\\\"text\\/css\\\">\\n\\t\\t\\tspan.readonly { padding: 10px; font-family: Arial; font-size:13px !important; font-weight: normal !important; text-align: justify; color: #4d4d4d; line-height: 24px; }\\n\\t\\t\\tspan.readonly h1 { clear:both; font-family: Georgia, sans-serif; font-size:38px; margin:30px 20px 23px; padding:0px 0px 24px 10px; color:#333; border-bottom: 1px solid #eee; font-weight: normal; }\\n\\t\\t\\tspan.readonly p { margin: 0 26px 10px }\\n\\t\\t\\tspan.readonly p a { color: #8e0b8c }\\n\\t\\t\\tspan.readonly p.homepage { margin-top: 30px }\\n\\t\\t\\tspan.readonly p.license { border-top: 1px solid #eee; font-size: 11px; margin: 30px 26px 0; padding: 6px 0; }\\n\\t\\t<\\/style>\\n\\t\\t<span class=\\\"readonly\\\"><h1>JM Slideshow<small> ver. 1.3.4<\\/small><\\/h1><p>JMS is new generation of our extensions dedicated to Joomla 1.6+.<\\/p><p>With JMS module, you can create slideshow on a site which include various images and article fragments or texts defined by a user. Thanks to slide management system integrated in the module, its support is very easy, intuitive and fast. With the new method of creating module styles you can easily move your slideshow style from one template to other template.<\\/p> <p class=\'homepage\'><a href=\'http:\\/\\/www.joomlaman.com\\/joomla-extensions\\/22-jm-slideshow.html\' target=\'_blank\'>Learn more at the JMS project website.<\\/a><\\/p><p class=\'license\'>JMS is released under the <a target=\\\"_blank\\\" href=\\\"http:\\/\\/www.gnu.org\\/licenses\\/gpl-2.0.html\\\">GNU\\/GPL v2 license.<\\/a><\\/p><\\/span>\\n\\t\\t\\n    \",\"group\":\"\",\"filename\":\"mod_jmslideshow\"}','{\"jmslideshow_responsive\":\"1\",\"jmslideshow_width\":\"700\",\"jmslideshow_image_width\":\"700\",\"jmslideshow_image_height\":\"400\",\"jmslideshow_image_style\":\"1\",\"class_sfx\":\"\",\"slider_source\":\"0\",\"jmslideshow_k2_categories\":\"\",\"jmslideshow_hikashop_categories\":\"\",\"jmslideshow_image_source\":\"0\",\"jmslideshow_article_image_source\":\"3\",\"jmslideshow_ordering\":\"0\",\"jmslideshow_orderby\":\"0\",\"jmslideshow_count\":\"5\",\"jmslideshow_layout\":\"default\",\"jmslideshow_effect\":\"fade\",\"jmslideshow_speed\":\"500\",\"jmslideshow_auto\":\"1\",\"jmslideshow_timeout\":\"5000\",\"jmslideshow_caption_position\":\"topleft\",\"jmslideshow_caption_left\":\"30\",\"jmslideshow_caption_top\":\"30\",\"jmslideshow_caption_right\":\"30\",\"jmslideshow_caption_bottom\":\"30\",\"jmslideshow_caption_width\":\"500\",\"jmslideshow_desc_length\":\"150\",\"jmslideshow_desc_html\":\"\",\"jmslideshow_readmore_text\":\"Read more\",\"jmslideshow_show_nav_buttons\":\"1\",\"jmslideshow_show_pager\":\"1\",\"jmslideshow_pager_type\":\"1\",\"jmslideshow_pager_position\":\"bottomleft\",\"jmslideshow_pager_left\":\"30\",\"jmslideshow_pager_top\":\"30\",\"jmslideshow_pager_right\":\"30\",\"jmslideshow_pager_bottom\":\"30\",\"jmslideshow_include_jquery\":\"2\",\"jmslideshow_about\":\"MOD_JMSLIDESHOW_ABOUT_TAB_DESC\",\"jmslideshow_update\":\"UPDATE will be revealed later!\"}','','',0,'0000-00-00 00:00:00',0,0),(10009,0,'Helix3 - Ajax','plugin','helix3','ajax',0,1,1,0,'{\"name\":\"Helix3 - Ajax\",\"type\":\"plugin\",\"creationDate\":\"Jan 2015\",\"author\":\"JoomShaper.com\",\"copyright\":\"Copyright (C) 2010 - 2015 JoomShaper. All rights reserved.\",\"authorEmail\":\"support@joomshaper.com\",\"authorUrl\":\"www.joomshaper.com\",\"version\":\"2.0\",\"description\":\"Helix3 Framework - Joomla Template Framework by JoomShaper\",\"group\":\"\",\"filename\":\"helix3\"}','{}','','',0,'0000-00-00 00:00:00',0,0),(10010,0,'System - Helix3 Framework','plugin','helix3','system',0,1,1,0,'{\"name\":\"System - Helix3 Framework\",\"type\":\"plugin\",\"creationDate\":\"Jan 2015\",\"author\":\"JoomShaper.com\",\"copyright\":\"Copyright (C) 2010 - 2015 JoomShaper. All rights reserved.\",\"authorEmail\":\"support@joomshaper.com\",\"authorUrl\":\"www.joomshaper.com\",\"version\":\"2.0\",\"description\":\"Helix3 Framework - Joomla Template Framework by JoomShaper\",\"group\":\"\",\"filename\":\"helix3\"}','{}','','',0,'0000-00-00 00:00:00',0,0),(10011,0,'lt_agriculture','template','lt_agriculture','',0,1,1,0,'{\"name\":\"lt_agriculture\",\"type\":\"template\",\"creationDate\":\"Jan 2015\",\"author\":\"LTHEME.com\",\"copyright\":\"Copyright (C) 2010 - 2015 ltheme.com. All rights reserved.\",\"authorEmail\":\"info@ltheme.com\",\"authorUrl\":\"http:\\/\\/www.ltheme.com\",\"version\":\"1.0\",\"description\":\"LT Agriculture - Responsive Agriculture Joomla! template\",\"group\":\"\",\"filename\":\"templateDetails\"}','{\"sticky_header\":\"1\",\"boxed_layout\":\"0\",\"logo_type\":\"image\",\"logo_position\":\"logo\",\"body_bg_repeat\":\"inherit\",\"body_bg_size\":\"inherit\",\"body_bg_attachment\":\"inherit\",\"body_bg_position\":\"0 0\",\"enabled_copyright\":\"1\",\"copyright_position\":\"footer1\",\"copyright\":\"\\u00a9 2015 Your Company. All Rights Reserved. Designed By L.THEME\",\"show_social_icons\":\"\",\"social_position\":\"\",\"facebook\":\"\",\"twitter\":\"\",\"googleplus\":\"\",\"pinterest\":\"\",\"linkedin\":\"\",\"youtube\":\"\",\"enable_contactinfo\":\"1\",\"contact_position\":\"top2\",\"contact_phone\":\"+228 872 4444\",\"contact_email\":\"contact@email.com\",\"comingsoon_mode\":\"0\",\"comingsoon_title\":\"Coming Soon Title\",\"comingsoon_date\":\"5-10-2018\",\"comingsoon_content\":\"Coming soon content\",\"preset\":\"preset1\",\"preset1_bg\":\"#ffffff\",\"preset1_text\":\"#000000\",\"preset1_major\":\"#26aae1\",\"preset2_bg\":\"#ffffff\",\"preset2_text\":\"#000000\",\"preset2_major\":\"#3d449a\",\"preset3_bg\":\"#ffffff\",\"preset3_text\":\"#000000\",\"preset3_major\":\"#2bb673\",\"preset4_bg\":\"#ffffff\",\"preset4_text\":\"#000000\",\"preset4_major\":\"#eb4947\",\"menu\":\"mainmenu\",\"menu_type\":\"mega_offcanvas\",\"menu_animation\":\"menu-fade\",\"enable_body_font\":\"1\",\"body_font\":\"{\\\"fontFamily\\\":\\\"Open Sans\\\",\\\"fontWeight\\\":\\\"300\\\",\\\"fontSubset\\\":\\\"latin\\\",\\\"fontSize\\\":\\\"\\\"}\",\"enable_h1_font\":\"1\",\"h1_font\":\"{\\\"fontFamily\\\":\\\"Open Sans\\\",\\\"fontWeight\\\":\\\"800\\\",\\\"fontSubset\\\":\\\"latin\\\",\\\"fontSize\\\":\\\"\\\"}\",\"enable_h2_font\":\"1\",\"h2_font\":\"{\\\"fontFamily\\\":\\\"Open Sans\\\",\\\"fontWeight\\\":\\\"600\\\",\\\"fontSubset\\\":\\\"latin\\\",\\\"fontSize\\\":\\\"\\\"}\",\"enable_h3_font\":\"1\",\"h3_font\":\"{\\\"fontFamily\\\":\\\"Open Sans\\\",\\\"fontWeight\\\":\\\"regular\\\",\\\"fontSubset\\\":\\\"latin\\\",\\\"fontSize\\\":\\\"\\\"}\",\"enable_h4_font\":\"1\",\"h4_font\":\"{\\\"fontFamily\\\":\\\"Open Sans\\\",\\\"fontWeight\\\":\\\"regular\\\",\\\"fontSubset\\\":\\\"latin\\\",\\\"fontSize\\\":\\\"\\\"}\",\"enable_h5_font\":\"1\",\"h5_font\":\"{\\\"fontFamily\\\":\\\"Open Sans\\\",\\\"fontWeight\\\":\\\"600\\\",\\\"fontSubset\\\":\\\"latin\\\",\\\"fontSize\\\":\\\"\\\"}\",\"enable_h6_font\":\"1\",\"h6_font\":\"{\\\"fontFamily\\\":\\\"Open Sans\\\",\\\"fontWeight\\\":\\\"600\\\",\\\"fontSubset\\\":\\\"latin\\\",\\\"fontSize\\\":\\\"\\\"}\",\"enable_navigation_font\":\"0\",\"enable_custom_font\":\"0\",\"compress_css\":\"0\",\"compress_js\":\"0\",\"lessoption\":\"0\",\"show_post_format\":\"1\",\"commenting_engine\":\"disabled\",\"disqus_devmode\":\"0\",\"intensedebate_acc\":\"\",\"fb_width\":\"500\",\"fb_cpp\":\"10\",\"comments_count\":\"0\",\"social_share\":\"1\"}','','',0,'0000-00-00 00:00:00',0,0),(10012,0,'mod_articles_news_adv','module','mod_articles_news_adv','',0,1,0,0,'{\"name\":\"mod_articles_news_adv\",\"type\":\"module\",\"creationDate\":\"April 2013\",\"author\":\"Joomla! Project\",\"copyright\":\"Copyright (c) 2012-20013 by TemplateMonster - www.templatemonster.com\",\"authorEmail\":\"\",\"authorUrl\":\"www.templatemonster.com\",\"version\":\"1.4.5\",\"description\":\"MOD_ARTICLES_NEWS_ADV_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_articles_news_adv\"}','{\"catid\":\"\",\"count\":\"5\",\"columns\":\"1\",\"ordering\":\"a.publish_up\",\"mod_button\":\"0\",\"custom_link_title\":\"\",\"custom_link_route\":\"0\",\"custom_link_url\":\"http:\\/\\/\",\"item_title\":\"0\",\"item_heading\":\"h4\",\"show_tags\":\"0\",\"published\":\"0\",\"createdby\":\"0\",\"intro_image\":\"0\",\"intro_image_align\":\"none\",\"image\":\"0\",\"readmore\":\"0\",\"bootstrap_layout\":\"0\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"itemid\"}','','',0,'0000-00-00 00:00:00',0,0),(10013,0,'JoomSpirit Slider','module','mod_joomspirit_slider','',0,1,0,0,'{\"name\":\"JoomSpirit Slider\",\"type\":\"module\",\"creationDate\":\"January 2016\",\"author\":\"JoomSpirit\",\"copyright\":\"Copyright 2016 JoomSpirit\",\"authorEmail\":\"contact@template-joomspirit.com\",\"authorUrl\":\"\",\"version\":\"2.6\",\"description\":\"     \\n    \\t \\n\\t\\t<link rel=\\\"stylesheet\\\" href=\\\"..\\/modules\\/mod_joomspirit_slider\\/css_admin.css\\\" type=\\\"text\\/css\\\" \\/>\\n\\t\\t<link href=\'http:\\/\\/fonts.googleapis.com\\/css?family=Comfortaa:400,300,700|Abel|Arizonia|Berkshire+Swash|Cookie|Dosis:400,200,300,500,600,700,800|Droid+Sans:400,700|Francois+One|Gruppo|Playball|Italianno|Lato:400,100,300,400italic,300italic,100italic,700,700italic,900,900italic|Lobster|Lora:400,400italic,700,700italic|Montserrat:400,700|Oleo+Script|Open+Sans+Condensed:300,300italic,700|Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800italic,800|Oswald:400,300,700|Oxygen:400,300,700|PT+Sans+Narrow:400,700|PT+Sans:400,400italic,700,700italic|Prosto+One|Quicksand:400,300,700|Roboto+Condensed:400,300,300italic,400italic,700,700italic|Rokkitt:400,700|Share:400,400italic,700,700italic|Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic|Ubuntu+Condensed|Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic|Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,cyrillic-ext,latin-ext,cyrillic\' rel=\'stylesheet\' type=\'text\\/css\'>\\n\\t\\tThis free module allows you to display a responsive slideshow. Read <a href=\\\"http:\\/\\/www.template-joomspirit.com\\/free-extension-joomla\\/responsive-slideshow\\\" target=\\\"_blank\\\">\\\"How to use\\\" here<\\/a>.<br \\/>It\'s created and distributed by <a href=\\\"http:\\/\\/www.template-joomspirit.com\\\" target=\\\"_blank\\\"><strong>JoomSpirit<\\/strong><\\/a> : the best place to find a beautiful template.<br \\/><br \\/><a href=\\\"http:\\/\\/www.template-joomspirit.com\\\" target=\\\"_blank\\\"><img src=\\\"..\\/modules\\/mod_joomspirit_slider\\/joomspirit.jpg\\\" alt=\\\"\\\" \\/><\\/a>\\n\\t\\t\\n\\t\",\"group\":\"\",\"filename\":\"mod_joomspirit_slider\"}','{\"load_jquery\":\"0\",\"pauseOnHover\":\"true\",\"initDelay\":\"0\",\"randomize\":\"false\",\"kenburns\":\"no-kenburns\",\"rotate_on_scroll\":\"no-rotate-on-scroll\",\"fade_text_on_scroll\":\"fade-text-on-scroll\",\"load_skrollr\":\"true\",\"height_slideshow_desktop\":\"fluid\",\"height_slideshow_desktop_percentage\":\"60\",\"height_slideshow_desktop_px\":\"440\",\"height_slideshow_tablet\":\"fluid\",\"height_slideshow_tablet_percentage\":\"60\",\"height_slideshow_tablet_px\":\"440\",\"height_slideshow_phone\":\"fluid\",\"height_slideshow_phone_percentage\":\"30\",\"height_slideshow_phone_px\":\"440\",\"slide_theme\":\"false\",\"transition\":\"fade\",\"bg_color\":\"transparent\",\"direction\":\"horizontal\",\"animSpeed\":\"2000\",\"pauseTime\":\"6500\",\"shadow_top_image\":\"no\",\"shadow_bottom_image\":\"no\",\"theme_shadow\":\"theme-without-shadow\",\"theme_border\":\"00\",\"theme_border_radius\":\"00\",\"directionNav\":\"white-arrow\",\"controlNav\":\"false\",\"positionNav\":\"bottom\",\"colorNav\":\"light\",\"colorNavActive\":\"#98c138\",\"hide_buttons\":\"500\",\"anim_text\":\"anim-js-slide anim-js-text\",\"bg_color_text\":\"#000000\",\"transparency_bg_text\":\"0\",\"bg_color_text_ie\":\"\",\"bg_caption_shadow\":\"no\",\"position_text\":\"Center\",\"max_width\":\"350\",\"text_shadow\":\"light\",\"font_title\":\"Oswald\",\"custom_font_title\":\"\",\"font_size_title\":\"25px\",\"color_title\":\"#ffffff\",\"font_text\":\"Oswald\",\"custom_font_text\":\"\",\"font_size_text\":\"15px\",\"color_text\":\"#eeeeee\",\"target\":\"_blank\",\"type_link\":\"link_both\",\"read_more\":\"Read more\",\"color_read_more\":\"#e88858\",\"text_under_slideshow\":\"768\",\"hide_text\":\"500\",\"bg_color_text_small_screen\":\"#eeeeee\",\"color_text_small_screen\":\"#444444\",\"fontsize_title_small_screen\":\"16\",\"fontsize_text_small_screen\":\"13\",\"image1alt\":\"\",\"image1title\":\"\",\"image1cap\":\"\",\"font_size_title1\":\"\",\"font_size_text1\":\"\",\"image1customlink\":\"\",\"text_shadow1\":\"default\",\"bg_text1\":\"default\",\"bg_caption_shadow1\":\"default\",\"max_width1\":\"\",\"position_text1\":\"default\",\"anim_text1\":\"default\",\"image2alt\":\"\",\"image2title\":\"\",\"image2cap\":\"\",\"font_size_title2\":\"\",\"font_size_text2\":\"\",\"image2customlink\":\"\",\"text_shadow2\":\"default\",\"bg_text2\":\"default\",\"bg_caption_shadow2\":\"default\",\"max_width2\":\"\",\"position_text2\":\"default\",\"anim_text2\":\"default\",\"image3alt\":\"\",\"image3title\":\"\",\"image3cap\":\"\",\"font_size_title3\":\"\",\"font_size_text3\":\"\",\"image3customlink\":\"\",\"text_shadow3\":\"default\",\"bg_text3\":\"default\",\"bg_caption_shadow3\":\"default\",\"max_width3\":\"\",\"position_text3\":\"default\",\"anim_text3\":\"default\",\"image4alt\":\"\",\"image4title\":\"\",\"image4cap\":\"\",\"font_size_title4\":\"\",\"font_size_text4\":\"\",\"image4customlink\":\"\",\"text_shadow4\":\"default\",\"bg_text4\":\"default\",\"bg_caption_shadow4\":\"default\",\"max_width4\":\"\",\"position_text4\":\"default\",\"anim_text4\":\"default\",\"image5alt\":\"\",\"image5title\":\"\",\"image5cap\":\"\",\"font_size_title5\":\"\",\"font_size_text5\":\"\",\"image5customlink\":\"\",\"text_shadow5\":\"default\",\"bg_text5\":\"default\",\"bg_caption_shadow5\":\"default\",\"max_width5\":\"\",\"position_text5\":\"default\",\"anim_text5\":\"default\",\"image6alt\":\"\",\"image6title\":\"\",\"image6cap\":\"\",\"font_size_title6\":\"\",\"font_size_text6\":\"\",\"image6customlink\":\"\",\"text_shadow6\":\"default\",\"bg_text6\":\"default\",\"bg_caption_shadow6\":\"default\",\"max_width6\":\"\",\"position_text6\":\"default\",\"anim_text6\":\"default\",\"image7alt\":\"\",\"image7title\":\"\",\"image7cap\":\"\",\"font_size_title7\":\"\",\"font_size_text7\":\"\",\"image7customlink\":\"\",\"text_shadow7\":\"default\",\"bg_text7\":\"default\",\"bg_caption_shadow7\":\"default\",\"max_width7\":\"\",\"position_text7\":\"default\",\"anim_text7\":\"default\",\"image8alt\":\"\",\"image8title\":\"\",\"image8cap\":\"\",\"font_size_title8\":\"\",\"font_size_text8\":\"\",\"image8customlink\":\"\",\"text_shadow8\":\"default\",\"bg_text8\":\"default\",\"bg_caption_shadow8\":\"default\",\"max_width8\":\"\",\"position_text8\":\"default\",\"anim_text8\":\"default\",\"image9alt\":\"\",\"image9title\":\"\",\"image9cap\":\"\",\"font_size_title9\":\"\",\"font_size_text9\":\"\",\"image9customlink\":\"\",\"text_shadow9\":\"default\",\"bg_text9\":\"default\",\"bg_caption_shadow9\":\"default\",\"max_width9\":\"\",\"position_text9\":\"default\",\"anim_text9\":\"default\",\"image10alt\":\"\",\"image10title\":\"\",\"image10cap\":\"\",\"font_size_title10\":\"\",\"font_size_text10\":\"\",\"image10customlink\":\"\",\"text_shadow10\":\"default\",\"bg_text10\":\"default\",\"bg_caption_shadow10\":\"default\",\"max_width10\":\"\",\"position_text10\":\"default\",\"anim_text10\":\"default\",\"image11alt\":\"\",\"image11title\":\"\",\"image11cap\":\"\",\"font_size_title11\":\"\",\"font_size_text11\":\"\",\"image11customlink\":\"\",\"text_shadow11\":\"default\",\"bg_text11\":\"default\",\"bg_caption_shadow11\":\"default\",\"max_width11\":\"\",\"position_text11\":\"default\",\"anim_text11\":\"default\",\"image12alt\":\"\",\"image12title\":\"\",\"image12cap\":\"\",\"font_size_title12\":\"\",\"font_size_text12\":\"\",\"image12customlink\":\"\",\"text_shadow12\":\"default\",\"bg_text12\":\"default\",\"bg_caption_shadow12\":\"default\",\"max_width12\":\"\",\"position_text12\":\"default\",\"anim_text12\":\"default\",\"image13alt\":\"\",\"image13title\":\"\",\"image13cap\":\"\",\"font_size_title13\":\"\",\"font_size_text13\":\"\",\"image13customlink\":\"\",\"text_shadow13\":\"default\",\"bg_text13\":\"default\",\"bg_caption_shadow13\":\"default\",\"max_width13\":\"\",\"position_text13\":\"default\",\"anim_text13\":\"default\",\"image14alt\":\"\",\"image14title\":\"\",\"image14cap\":\"\",\"font_size_title14\":\"\",\"font_size_text14\":\"\",\"image14customlink\":\"\",\"text_shadow14\":\"default\",\"bg_text14\":\"default\",\"bg_caption_shadow14\":\"default\",\"max_width14\":\"\",\"position_text14\":\"default\",\"anim_text14\":\"default\",\"image15alt\":\"\",\"image15title\":\"\",\"image15cap\":\"\",\"font_size_title15\":\"\",\"font_size_text15\":\"\",\"image15customlink\":\"\",\"text_shadow15\":\"default\",\"bg_text15\":\"default\",\"bg_caption_shadow15\":\"default\",\"max_width15\":\"\",\"position_text15\":\"default\",\"anim_text15\":\"default\",\"image16alt\":\"\",\"image16title\":\"\",\"image16cap\":\"\",\"font_size_title16\":\"\",\"font_size_text16\":\"\",\"image16customlink\":\"\",\"text_shadow16\":\"default\",\"bg_text16\":\"default\",\"bg_caption_shadow16\":\"default\",\"max_width16\":\"\",\"position_text16\":\"default\",\"anim_text16\":\"default\",\"image17alt\":\"\",\"image17title\":\"\",\"image17cap\":\"\",\"font_size_title17\":\"\",\"font_size_text17\":\"\",\"image17customlink\":\"\",\"text_shadow17\":\"default\",\"bg_text17\":\"default\",\"bg_caption_shadow17\":\"default\",\"max_width17\":\"\",\"position_text17\":\"default\",\"anim_text17\":\"default\",\"image18alt\":\"\",\"image18title\":\"\",\"image18cap\":\"\",\"font_size_title18\":\"\",\"font_size_text18\":\"\",\"image18customlink\":\"\",\"text_shadow18\":\"default\",\"bg_text18\":\"default\",\"bg_caption_shadow18\":\"default\",\"max_width18\":\"\",\"position_text18\":\"default\",\"anim_text18\":\"default\",\"image19alt\":\"\",\"image19title\":\"\",\"image19cap\":\"\",\"font_size_title19\":\"\",\"font_size_text19\":\"\",\"image19customlink\":\"\",\"text_shadow19\":\"default\",\"bg_text19\":\"default\",\"bg_caption_shadow19\":\"default\",\"max_width19\":\"\",\"position_text19\":\"default\",\"anim_text19\":\"default\",\"image20alt\":\"\",\"image20title\":\"\",\"image20cap\":\"\",\"font_size_title20\":\"\",\"font_size_text20\":\"\",\"image20customlink\":\"\",\"text_shadow20\":\"default\",\"bg_text20\":\"default\",\"bg_caption_shadow20\":\"default\",\"max_width20\":\"\",\"position_text20\":\"default\",\"anim_text20\":\"default\",\"image21alt\":\"\",\"image21title\":\"\",\"image21cap\":\"\",\"font_size_title21\":\"\",\"font_size_text21\":\"\",\"image21customlink\":\"\",\"text_shadow21\":\"default\",\"bg_text21\":\"default\",\"bg_caption_shadow21\":\"default\",\"max_width21\":\"\",\"position_text21\":\"default\",\"anim_text21\":\"default\",\"image22alt\":\"\",\"image22title\":\"\",\"image22cap\":\"\",\"font_size_title22\":\"\",\"font_size_text22\":\"\",\"image22customlink\":\"\",\"text_shadow22\":\"default\",\"bg_text22\":\"default\",\"bg_caption_shadow22\":\"default\",\"max_width22\":\"\",\"position_text22\":\"default\",\"anim_text22\":\"default\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"itemid\"}','','',0,'0000-00-00 00:00:00',0,0);
/*!40000 ALTER TABLE `mdla_extensions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_fields`
--

DROP TABLE IF EXISTS `mdla_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0',
  `context` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `group_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `default_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `params` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fieldparams` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` char(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_created_user_id` (`created_user_id`),
  KEY `idx_access` (`access`),
  KEY `idx_context` (`context`(191)),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_fields`
--

LOCK TABLES `mdla_fields` WRITE;
/*!40000 ALTER TABLE `mdla_fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_fields_categories`
--

DROP TABLE IF EXISTS `mdla_fields_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_fields_categories` (
  `field_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`field_id`,`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_fields_categories`
--

LOCK TABLES `mdla_fields_categories` WRITE;
/*!40000 ALTER TABLE `mdla_fields_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_fields_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_fields_groups`
--

DROP TABLE IF EXISTS `mdla_fields_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_fields_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0',
  `context` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `language` char(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_created_by` (`created_by`),
  KEY `idx_access` (`access`),
  KEY `idx_context` (`context`(191)),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_fields_groups`
--

LOCK TABLES `mdla_fields_groups` WRITE;
/*!40000 ALTER TABLE `mdla_fields_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_fields_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_fields_values`
--

DROP TABLE IF EXISTS `mdla_fields_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_fields_values` (
  `field_id` int(10) unsigned NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Allow references to items which have strings as ids, eg. none db systems.',
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `idx_field_id` (`field_id`),
  KEY `idx_item_id` (`item_id`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_fields_values`
--

LOCK TABLES `mdla_fields_values` WRITE;
/*!40000 ALTER TABLE `mdla_fields_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_fields_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_filters`
--

DROP TABLE IF EXISTS `mdla_finder_filters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_filters` (
  `filter_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL,
  `created_by_alias` varchar(255) NOT NULL,
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `map_count` int(10) unsigned NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  `params` mediumtext,
  PRIMARY KEY (`filter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_filters`
--

LOCK TABLES `mdla_finder_filters` WRITE;
/*!40000 ALTER TABLE `mdla_finder_filters` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_filters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_links`
--

DROP TABLE IF EXISTS `mdla_finder_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_links` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `title` varchar(400) DEFAULT NULL,
  `description` text,
  `indexdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `md5sum` varchar(32) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `state` int(5) DEFAULT '1',
  `access` int(5) DEFAULT '0',
  `language` varchar(8) NOT NULL,
  `publish_start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `list_price` double unsigned NOT NULL DEFAULT '0',
  `sale_price` double unsigned NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL,
  `object` mediumblob NOT NULL,
  PRIMARY KEY (`link_id`),
  KEY `idx_type` (`type_id`),
  KEY `idx_title` (`title`(100)),
  KEY `idx_md5` (`md5sum`),
  KEY `idx_url` (`url`(75)),
  KEY `idx_published_list` (`published`,`state`,`access`,`publish_start_date`,`publish_end_date`,`list_price`),
  KEY `idx_published_sale` (`published`,`state`,`access`,`publish_start_date`,`publish_end_date`,`sale_price`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_links`
--

LOCK TABLES `mdla_finder_links` WRITE;
/*!40000 ALTER TABLE `mdla_finder_links` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_links_terms0`
--

DROP TABLE IF EXISTS `mdla_finder_links_terms0`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_links_terms0` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_links_terms0`
--

LOCK TABLES `mdla_finder_links_terms0` WRITE;
/*!40000 ALTER TABLE `mdla_finder_links_terms0` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_links_terms0` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_links_terms1`
--

DROP TABLE IF EXISTS `mdla_finder_links_terms1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_links_terms1` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_links_terms1`
--

LOCK TABLES `mdla_finder_links_terms1` WRITE;
/*!40000 ALTER TABLE `mdla_finder_links_terms1` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_links_terms1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_links_terms2`
--

DROP TABLE IF EXISTS `mdla_finder_links_terms2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_links_terms2` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_links_terms2`
--

LOCK TABLES `mdla_finder_links_terms2` WRITE;
/*!40000 ALTER TABLE `mdla_finder_links_terms2` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_links_terms2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_links_terms3`
--

DROP TABLE IF EXISTS `mdla_finder_links_terms3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_links_terms3` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_links_terms3`
--

LOCK TABLES `mdla_finder_links_terms3` WRITE;
/*!40000 ALTER TABLE `mdla_finder_links_terms3` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_links_terms3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_links_terms4`
--

DROP TABLE IF EXISTS `mdla_finder_links_terms4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_links_terms4` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_links_terms4`
--

LOCK TABLES `mdla_finder_links_terms4` WRITE;
/*!40000 ALTER TABLE `mdla_finder_links_terms4` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_links_terms4` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_links_terms5`
--

DROP TABLE IF EXISTS `mdla_finder_links_terms5`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_links_terms5` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_links_terms5`
--

LOCK TABLES `mdla_finder_links_terms5` WRITE;
/*!40000 ALTER TABLE `mdla_finder_links_terms5` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_links_terms5` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_links_terms6`
--

DROP TABLE IF EXISTS `mdla_finder_links_terms6`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_links_terms6` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_links_terms6`
--

LOCK TABLES `mdla_finder_links_terms6` WRITE;
/*!40000 ALTER TABLE `mdla_finder_links_terms6` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_links_terms6` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_links_terms7`
--

DROP TABLE IF EXISTS `mdla_finder_links_terms7`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_links_terms7` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_links_terms7`
--

LOCK TABLES `mdla_finder_links_terms7` WRITE;
/*!40000 ALTER TABLE `mdla_finder_links_terms7` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_links_terms7` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_links_terms8`
--

DROP TABLE IF EXISTS `mdla_finder_links_terms8`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_links_terms8` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_links_terms8`
--

LOCK TABLES `mdla_finder_links_terms8` WRITE;
/*!40000 ALTER TABLE `mdla_finder_links_terms8` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_links_terms8` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_links_terms9`
--

DROP TABLE IF EXISTS `mdla_finder_links_terms9`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_links_terms9` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_links_terms9`
--

LOCK TABLES `mdla_finder_links_terms9` WRITE;
/*!40000 ALTER TABLE `mdla_finder_links_terms9` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_links_terms9` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_links_termsa`
--

DROP TABLE IF EXISTS `mdla_finder_links_termsa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_links_termsa` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_links_termsa`
--

LOCK TABLES `mdla_finder_links_termsa` WRITE;
/*!40000 ALTER TABLE `mdla_finder_links_termsa` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_links_termsa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_links_termsb`
--

DROP TABLE IF EXISTS `mdla_finder_links_termsb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_links_termsb` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_links_termsb`
--

LOCK TABLES `mdla_finder_links_termsb` WRITE;
/*!40000 ALTER TABLE `mdla_finder_links_termsb` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_links_termsb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_links_termsc`
--

DROP TABLE IF EXISTS `mdla_finder_links_termsc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_links_termsc` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_links_termsc`
--

LOCK TABLES `mdla_finder_links_termsc` WRITE;
/*!40000 ALTER TABLE `mdla_finder_links_termsc` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_links_termsc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_links_termsd`
--

DROP TABLE IF EXISTS `mdla_finder_links_termsd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_links_termsd` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_links_termsd`
--

LOCK TABLES `mdla_finder_links_termsd` WRITE;
/*!40000 ALTER TABLE `mdla_finder_links_termsd` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_links_termsd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_links_termse`
--

DROP TABLE IF EXISTS `mdla_finder_links_termse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_links_termse` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_links_termse`
--

LOCK TABLES `mdla_finder_links_termse` WRITE;
/*!40000 ALTER TABLE `mdla_finder_links_termse` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_links_termse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_links_termsf`
--

DROP TABLE IF EXISTS `mdla_finder_links_termsf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_links_termsf` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_links_termsf`
--

LOCK TABLES `mdla_finder_links_termsf` WRITE;
/*!40000 ALTER TABLE `mdla_finder_links_termsf` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_links_termsf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_taxonomy`
--

DROP TABLE IF EXISTS `mdla_finder_taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_taxonomy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `state` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `access` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `state` (`state`),
  KEY `ordering` (`ordering`),
  KEY `access` (`access`),
  KEY `idx_parent_published` (`parent_id`,`state`,`access`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_taxonomy`
--

LOCK TABLES `mdla_finder_taxonomy` WRITE;
/*!40000 ALTER TABLE `mdla_finder_taxonomy` DISABLE KEYS */;
INSERT INTO `mdla_finder_taxonomy` VALUES (1,0,'ROOT',0,0,0);
/*!40000 ALTER TABLE `mdla_finder_taxonomy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_taxonomy_map`
--

DROP TABLE IF EXISTS `mdla_finder_taxonomy_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_taxonomy_map` (
  `link_id` int(10) unsigned NOT NULL,
  `node_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`node_id`),
  KEY `link_id` (`link_id`),
  KEY `node_id` (`node_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_taxonomy_map`
--

LOCK TABLES `mdla_finder_taxonomy_map` WRITE;
/*!40000 ALTER TABLE `mdla_finder_taxonomy_map` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_taxonomy_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_terms`
--

DROP TABLE IF EXISTS `mdla_finder_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_terms` (
  `term_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weight` float unsigned NOT NULL DEFAULT '0',
  `soundex` varchar(75) NOT NULL,
  `links` int(10) NOT NULL DEFAULT '0',
  `language` char(3) NOT NULL DEFAULT '',
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `idx_term` (`term`),
  KEY `idx_term_phrase` (`term`,`phrase`),
  KEY `idx_stem_phrase` (`stem`,`phrase`),
  KEY `idx_soundex_phrase` (`soundex`,`phrase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_terms`
--

LOCK TABLES `mdla_finder_terms` WRITE;
/*!40000 ALTER TABLE `mdla_finder_terms` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_terms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_terms_common`
--

DROP TABLE IF EXISTS `mdla_finder_terms_common`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_terms_common` (
  `term` varchar(75) NOT NULL,
  `language` varchar(3) NOT NULL,
  KEY `idx_word_lang` (`term`,`language`),
  KEY `idx_lang` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_terms_common`
--

LOCK TABLES `mdla_finder_terms_common` WRITE;
/*!40000 ALTER TABLE `mdla_finder_terms_common` DISABLE KEYS */;
INSERT INTO `mdla_finder_terms_common` VALUES ('a','en'),('about','en'),('after','en'),('ago','en'),('all','en'),('am','en'),('an','en'),('and','en'),('any','en'),('are','en'),('aren\'t','en'),('as','en'),('at','en'),('be','en'),('but','en'),('by','en'),('for','en'),('from','en'),('get','en'),('go','en'),('how','en'),('if','en'),('in','en'),('into','en'),('is','en'),('isn\'t','en'),('it','en'),('its','en'),('me','en'),('more','en'),('most','en'),('must','en'),('my','en'),('new','en'),('no','en'),('none','en'),('not','en'),('nothing','en'),('of','en'),('off','en'),('often','en'),('old','en'),('on','en'),('onc','en'),('once','en'),('only','en'),('or','en'),('other','en'),('our','en'),('ours','en'),('out','en'),('over','en'),('page','en'),('she','en'),('should','en'),('small','en'),('so','en'),('some','en'),('than','en'),('thank','en'),('that','en'),('the','en'),('their','en'),('theirs','en'),('them','en'),('then','en'),('there','en'),('these','en'),('they','en'),('this','en'),('those','en'),('thus','en'),('time','en'),('times','en'),('to','en'),('too','en'),('true','en'),('under','en'),('until','en'),('up','en'),('upon','en'),('use','en'),('user','en'),('users','en'),('version','en'),('very','en'),('via','en'),('want','en'),('was','en'),('way','en'),('were','en'),('what','en'),('when','en'),('where','en'),('which','en'),('who','en'),('whom','en'),('whose','en'),('why','en'),('wide','en'),('will','en'),('with','en'),('within','en'),('without','en'),('would','en'),('yes','en'),('yet','en'),('you','en'),('your','en'),('yours','en');
/*!40000 ALTER TABLE `mdla_finder_terms_common` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_tokens`
--

DROP TABLE IF EXISTS `mdla_finder_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_tokens` (
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weight` float unsigned NOT NULL DEFAULT '1',
  `context` tinyint(1) unsigned NOT NULL DEFAULT '2',
  `language` char(3) NOT NULL DEFAULT '',
  KEY `idx_word` (`term`),
  KEY `idx_context` (`context`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_tokens`
--

LOCK TABLES `mdla_finder_tokens` WRITE;
/*!40000 ALTER TABLE `mdla_finder_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_tokens_aggregate`
--

DROP TABLE IF EXISTS `mdla_finder_tokens_aggregate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_tokens_aggregate` (
  `term_id` int(10) unsigned NOT NULL,
  `map_suffix` char(1) NOT NULL,
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `term_weight` float unsigned NOT NULL,
  `context` tinyint(1) unsigned NOT NULL DEFAULT '2',
  `context_weight` float unsigned NOT NULL,
  `total_weight` float unsigned NOT NULL,
  `language` char(3) NOT NULL DEFAULT '',
  KEY `token` (`term`),
  KEY `keyword_id` (`term_id`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_tokens_aggregate`
--

LOCK TABLES `mdla_finder_tokens_aggregate` WRITE;
/*!40000 ALTER TABLE `mdla_finder_tokens_aggregate` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_tokens_aggregate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_finder_types`
--

DROP TABLE IF EXISTS `mdla_finder_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_finder_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `mime` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_finder_types`
--

LOCK TABLES `mdla_finder_types` WRITE;
/*!40000 ALTER TABLE `mdla_finder_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_finder_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_languages`
--

DROP TABLE IF EXISTS `mdla_languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_languages` (
  `lang_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0',
  `lang_code` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_native` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sef` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metakey` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sitename` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `published` int(11) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lang_id`),
  UNIQUE KEY `idx_sef` (`sef`),
  UNIQUE KEY `idx_langcode` (`lang_code`),
  KEY `idx_access` (`access`),
  KEY `idx_ordering` (`ordering`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_languages`
--

LOCK TABLES `mdla_languages` WRITE;
/*!40000 ALTER TABLE `mdla_languages` DISABLE KEYS */;
INSERT INTO `mdla_languages` VALUES (1,0,'en-GB','English (en-GB)','English (United Kingdom)','en','en_gb','','','','',1,1,2),(2,63,'pt-BR','Português do Brasil (pt-BR)','Português do Brasil (pt-BR)','pt','pt_br','','','','',1,1,1);
/*!40000 ALTER TABLE `mdla_languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_menu`
--

DROP TABLE IF EXISTS `mdla_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menutype` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The type of menu this item belongs to. FK to #__menu_types.menutype',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The display title of the menu item.',
  `alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'The SEF alias of the menu item.',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `path` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The computed path of the menu item based on the alias field.',
  `link` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The actually link the menu item refers to.',
  `type` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The type of link: Component, URL, Alias, Separator',
  `published` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'The published state of the menu link.',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'The parent menu item in the menu tree.',
  `level` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The relative level in the tree.',
  `component_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to #__extensions.id',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to #__users.id',
  `checked_out_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'The time the menu item was checked out.',
  `browserNav` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'The click behaviour of the link.',
  `access` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The access level required to view the menu item.',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The image of the menu item.',
  `template_style_id` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'JSON encoded data for the menu item.',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `home` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Indicates if this menu item is the home or default page.',
  `language` char(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_client_id_parent_id_alias_language` (`client_id`,`parent_id`,`alias`(100),`language`),
  KEY `idx_componentid` (`component_id`,`menutype`,`published`,`access`),
  KEY `idx_menutype` (`menutype`),
  KEY `idx_left_right` (`lft`,`rgt`),
  KEY `idx_alias` (`alias`(100)),
  KEY `idx_path` (`path`(100)),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_menu`
--

LOCK TABLES `mdla_menu` WRITE;
/*!40000 ALTER TABLE `mdla_menu` DISABLE KEYS */;
INSERT INTO `mdla_menu` VALUES (1,'','Menu_Item_Root','root','','','','',1,0,0,0,0,'0000-00-00 00:00:00',0,0,'',0,'',0,61,0,'*',0),(2,'main','com_banners','Banners','','Banners','index.php?option=com_banners','component',1,1,1,4,0,'0000-00-00 00:00:00',0,0,'class:banners',0,'',1,10,0,'*',1),(3,'main','com_banners','Banners','','Banners/Banners','index.php?option=com_banners','component',1,2,2,4,0,'0000-00-00 00:00:00',0,0,'class:banners',0,'',2,3,0,'*',1),(4,'main','com_banners_categories','Categories','','Banners/Categories','index.php?option=com_categories&extension=com_banners','component',1,2,2,6,0,'0000-00-00 00:00:00',0,0,'class:banners-cat',0,'',4,5,0,'*',1),(5,'main','com_banners_clients','Clients','','Banners/Clients','index.php?option=com_banners&view=clients','component',1,2,2,4,0,'0000-00-00 00:00:00',0,0,'class:banners-clients',0,'',6,7,0,'*',1),(6,'main','com_banners_tracks','Tracks','','Banners/Tracks','index.php?option=com_banners&view=tracks','component',1,2,2,4,0,'0000-00-00 00:00:00',0,0,'class:banners-tracks',0,'',8,9,0,'*',1),(7,'main','com_contact','Contacts','','Contacts','index.php?option=com_contact','component',1,1,1,8,0,'0000-00-00 00:00:00',0,0,'class:contact',0,'',21,26,0,'*',1),(8,'main','com_contact_contacts','Contacts','','Contacts/Contacts','index.php?option=com_contact','component',1,7,2,8,0,'0000-00-00 00:00:00',0,0,'class:contact',0,'',22,23,0,'*',1),(9,'main','com_contact_categories','Categories','','Contacts/Categories','index.php?option=com_categories&extension=com_contact','component',1,7,2,6,0,'0000-00-00 00:00:00',0,0,'class:contact-cat',0,'',24,25,0,'*',1),(10,'main','com_messages','Messaging','','Messaging','index.php?option=com_messages','component',1,1,1,15,0,'0000-00-00 00:00:00',0,0,'class:messages',0,'',31,34,0,'*',1),(11,'main','com_messages_add','New Private Message','','Messaging/New Private Message','index.php?option=com_messages&task=message.add','component',1,10,2,15,0,'0000-00-00 00:00:00',0,0,'class:messages-add',0,'',32,33,0,'*',1),(13,'main','com_newsfeeds','News Feeds','','News Feeds','index.php?option=com_newsfeeds','component',1,1,1,17,0,'0000-00-00 00:00:00',0,0,'class:newsfeeds',0,'',41,46,0,'*',1),(14,'main','com_newsfeeds_feeds','Feeds','','News Feeds/Feeds','index.php?option=com_newsfeeds','component',1,13,2,17,0,'0000-00-00 00:00:00',0,0,'class:newsfeeds',0,'',42,43,0,'*',1),(15,'main','com_newsfeeds_categories','Categories','','News Feeds/Categories','index.php?option=com_categories&extension=com_newsfeeds','component',1,13,2,6,0,'0000-00-00 00:00:00',0,0,'class:newsfeeds-cat',0,'',44,45,0,'*',1),(16,'main','com_redirect','Redirect','','Redirect','index.php?option=com_redirect','component',1,1,1,24,0,'0000-00-00 00:00:00',0,0,'class:redirect',0,'',47,48,0,'*',1),(17,'main','com_search','Basic Search','','Basic Search','index.php?option=com_search','component',1,1,1,19,0,'0000-00-00 00:00:00',0,0,'class:search',0,'',49,50,0,'*',1),(18,'main','com_finder','Smart Search','','Smart Search','index.php?option=com_finder','component',1,1,1,27,0,'0000-00-00 00:00:00',0,0,'class:finder',0,'',51,52,0,'*',1),(19,'main','com_joomlaupdate','Joomla! Update','','Joomla! Update','index.php?option=com_joomlaupdate','component',1,1,1,28,0,'0000-00-00 00:00:00',0,0,'class:joomlaupdate',0,'',53,54,0,'*',1),(20,'main','com_tags','Tags','','Tags','index.php?option=com_tags','component',1,1,1,29,0,'0000-00-00 00:00:00',0,1,'class:tags',0,'',55,56,0,'',1),(21,'main','com_postinstall','Post-installation messages','','Post-installation messages','index.php?option=com_postinstall','component',1,1,1,32,0,'0000-00-00 00:00:00',0,1,'class:postinstall',0,'',57,58,0,'*',1),(22,'main','com_associations','Multilingual Associations','','Multilingual Associations','index.php?option=com_associations','component',1,1,1,34,0,'0000-00-00 00:00:00',0,0,'class:associations',0,'',59,60,0,'*',1),(101,'mainmenu','Home','homepage','','homepage','index.php?option=com_content&view=featured','component',1,1,1,22,0,'0000-00-00 00:00:00',0,1,' ',0,'{\"featured_categories\":[\"\"],\"layout_type\":\"blog\",\"num_leading_articles\":\"\",\"num_intro_articles\":\"\",\"num_columns\":\"\",\"num_links\":\"\",\"multi_column_order\":\"\",\"orderby_pri\":\"\",\"orderby_sec\":\"\",\"order_date\":\"\",\"show_pagination\":\"\",\"show_pagination_results\":\"\",\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"\",\"info_block_position\":\"\",\"info_block_show_title\":\"\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_associations\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_vote\":\"\",\"show_readmore\":\"\",\"show_readmore_title\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_hits\":\"\",\"show_tags\":\"\",\"show_noauth\":\"\",\"show_feed_link\":\"\",\"feed_summary\":\"\",\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"menu_show\":1,\"page_title\":\"\",\"show_page_heading\":\"0\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0,\"menulayout\":\"{\\\"width\\\":600,\\\"menuItem\\\":1,\\\"menuAlign\\\":\\\"right\\\",\\\"layout\\\":[{\\\"type\\\":\\\"row\\\",\\\"attr\\\":[{\\\"type\\\":\\\"column\\\",\\\"colGrid\\\":12,\\\"menuParentId\\\":\\\"101\\\",\\\"moduleId\\\":\\\"\\\"}]}]}\",\"megamenu\":\"0\",\"showmenutitle\":\"1\",\"icon\":\"\",\"class\":\"\",\"enable_page_title\":\"0\",\"page_title_alt\":\"\",\"page_subtitle\":\"\",\"page_title_bg_color\":\"\",\"page_title_bg_image\":\"\"}',11,12,1,'*',0),(102,'usermenu','Your Profile','your-profile','','your-profile','index.php?option=com_users&view=profile&layout=edit','component',1,1,1,25,0,'0000-00-00 00:00:00',0,2,'',0,'{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"page_title\":\"\",\"show_page_heading\":0,\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0}',27,28,0,'*',0),(103,'usermenu','Site Administrator','2013-11-16-23-26-41','','2013-11-16-23-26-41','administrator','url',1,1,1,0,0,'0000-00-00 00:00:00',0,6,'',0,'{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1}',35,36,0,'*',0),(104,'usermenu','Submit an Article','submit-an-article','','submit-an-article','index.php?option=com_content&view=form&layout=edit','component',1,1,1,22,0,'0000-00-00 00:00:00',0,3,'',0,'{\"enable_category\":\"0\",\"catid\":\"2\",\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"page_title\":\"\",\"show_page_heading\":0,\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0}',29,30,0,'*',0),(106,'usermenu','Template Settings','template-settings','','template-settings','index.php?option=com_config&view=templates&controller=config.display.templates','component',1,1,1,23,0,'0000-00-00 00:00:00',0,6,'',0,'{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"page_title\":\"\",\"show_page_heading\":0,\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0}',37,38,0,'*',0),(107,'usermenu','Site Settings','site-settings','','site-settings','index.php?option=com_config&view=config&controller=config.display.config','component',1,1,1,23,0,'0000-00-00 00:00:00',0,6,'',0,'{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"page_title\":\"\",\"show_page_heading\":0,\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0}',39,40,0,'*',0),(108,'mainmenu','Galeria','galeria','','galeria','index.php?option=com_content&view=category&layout=as002085free:gallery&id=8','component',1,1,1,22,0,'0000-00-00 00:00:00',0,1,' ',0,'{\"layout_type\":\"blog\",\"show_category_title\":\"\",\"show_description\":\"\",\"show_description_image\":\"\",\"maxLevel\":\"\",\"show_empty_categories\":\"\",\"show_no_articles\":\"\",\"show_subcat_desc\":\"\",\"show_cat_num_articles\":\"\",\"page_subheading\":\"\",\"num_leading_articles\":\"\",\"num_intro_articles\":\"\",\"num_columns\":\"\",\"num_links\":\"\",\"multi_column_order\":\"\",\"show_subcategory_content\":\"\",\"show_filter\":\"1\",\"show_sort\":\"1\",\"sort_effects\":\"\",\"show_layout_mode\":\"1\",\"image_float\":\"use_article\",\"orderby_pri\":\"\",\"orderby_sec\":\"\",\"order_date\":\"\",\"show_pagination\":\"\",\"show_pagination_results\":\"\",\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"\",\"info_block_position\":\"0\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_vote\":\"\",\"show_readmore\":\"\",\"show_readmore_title\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"limt_introtext\":\"10\",\"show_feed_link\":\"\",\"feed_summary\":\"\",\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"menu_show\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0,\"menulayout\":\"{\\\"width\\\":600,\\\"menuItem\\\":1,\\\"menuAlign\\\":\\\"right\\\",\\\"layout\\\":[{\\\"type\\\":\\\"row\\\",\\\"attr\\\":[{\\\"type\\\":\\\"column\\\",\\\"colGrid\\\":12,\\\"menuParentId\\\":\\\"108\\\",\\\"moduleId\\\":\\\"\\\"}]}]}\",\"megamenu\":\"0\",\"showmenutitle\":\"1\",\"icon\":\"\",\"class\":\"\",\"enable_page_title\":\"0\",\"page_title_alt\":\"\",\"page_subtitle\":\"\",\"page_title_bg_color\":\"\",\"page_title_bg_image\":\"\"}',15,16,0,'*',0),(109,'mainmenu','Sobre','sobre','','sobre','index.php?option=com_content&view=article&id=2','component',1,1,1,22,0,'0000-00-00 00:00:00',0,1,' ',0,'{\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"\",\"info_block_position\":\"\",\"info_block_show_title\":\"\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_associations\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_vote\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_hits\":\"\",\"show_tags\":\"\",\"show_noauth\":\"\",\"urls_position\":\"\",\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"menu_show\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0,\"dropdown_position\":\"right\",\"showmenutitle\":\"1\",\"icon\":\"\",\"class\":\"\",\"enable_page_title\":\"0\",\"page_title_alt\":\"\",\"page_subtitle\":\"\",\"page_title_bg_color\":\"\",\"page_title_bg_image\":\"\"}',13,14,0,'*',0),(110,'mainmenu','Contato','contato','','contato','index.php?option=com_content&view=article&id=3','component',1,1,1,22,0,'0000-00-00 00:00:00',0,1,' ',0,'{\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"\",\"info_block_position\":\"\",\"info_block_show_title\":\"\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_associations\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_vote\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_hits\":\"\",\"show_tags\":\"\",\"show_noauth\":\"\",\"urls_position\":\"\",\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"menu_show\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0,\"dropdown_position\":\"right\",\"showmenutitle\":\"1\",\"icon\":\"\",\"class\":\"\",\"enable_page_title\":\"0\",\"page_title_alt\":\"\",\"page_subtitle\":\"\",\"page_title_bg_color\":\"\",\"page_title_bg_image\":\"\"}',19,20,0,'*',0),(111,'mainmenu','Notícias','noticias','','noticias','index.php?option=com_content&view=category&id=2','component',1,1,1,22,0,'0000-00-00 00:00:00',0,1,' ',0,'{\"show_category_title\":\"\",\"show_description\":\"\",\"show_description_image\":\"\",\"maxLevel\":\"\",\"show_empty_categories\":\"\",\"show_no_articles\":\"\",\"show_category_heading_title_text\":\"\",\"show_subcat_desc\":\"\",\"show_cat_num_articles\":\"\",\"show_cat_tags\":\"\",\"page_subheading\":\"\",\"show_pagination_limit\":\"\",\"filter_field\":\"\",\"show_headings\":\"\",\"list_show_date\":\"\",\"date_format\":\"\",\"list_show_hits\":\"\",\"list_show_author\":\"\",\"list_show_votes\":\"\",\"list_show_ratings\":\"\",\"orderby_pri\":\"\",\"orderby_sec\":\"\",\"order_date\":\"\",\"show_pagination\":\"\",\"show_pagination_results\":\"\",\"display_num\":\"10\",\"show_featured\":\"\",\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_associations\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_vote\":\"\",\"show_readmore\":\"\",\"show_readmore_title\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"show_feed_link\":\"\",\"feed_summary\":\"\",\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"menu_show\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0,\"dropdown_position\":\"right\",\"showmenutitle\":\"1\",\"icon\":\"\",\"class\":\"\",\"enable_page_title\":\"0\",\"page_title_alt\":\"\",\"page_subtitle\":\"\",\"page_title_bg_color\":\"\",\"page_title_bg_image\":\"\"}',17,18,0,'*',0);
/*!40000 ALTER TABLE `mdla_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_menu_types`
--

DROP TABLE IF EXISTS `mdla_menu_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_menu_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0',
  `menutype` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `client_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_menutype` (`menutype`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_menu_types`
--

LOCK TABLES `mdla_menu_types` WRITE;
/*!40000 ALTER TABLE `mdla_menu_types` DISABLE KEYS */;
INSERT INTO `mdla_menu_types` VALUES (1,0,'mainmenu','Main Menu','The main menu for the site',0),(2,0,'usermenu','User Menu','A Menu for logged-in Users',0);
/*!40000 ALTER TABLE `mdla_menu_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_messages`
--

DROP TABLE IF EXISTS `mdla_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_messages` (
  `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id_from` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id_to` int(10) unsigned NOT NULL DEFAULT '0',
  `folder_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `priority` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `useridto_state` (`user_id_to`,`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_messages`
--

LOCK TABLES `mdla_messages` WRITE;
/*!40000 ALTER TABLE `mdla_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_messages_cfg`
--

DROP TABLE IF EXISTS `mdla_messages_cfg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cfg_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cfg_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_messages_cfg`
--

LOCK TABLES `mdla_messages_cfg` WRITE;
/*!40000 ALTER TABLE `mdla_messages_cfg` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_messages_cfg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_modules`
--

DROP TABLE IF EXISTS `mdla_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `position` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `module` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `showtitle` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `params` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  `language` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_modules`
--

LOCK TABLES `mdla_modules` WRITE;
/*!40000 ALTER TABLE `mdla_modules` DISABLE KEYS */;
INSERT INTO `mdla_modules` VALUES (1,39,'Main Menu','','',1,'position-1',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_menu',1,1,'{\"menutype\":\"mainmenu\",\"base\":\"\",\"startLevel\":\"1\",\"endLevel\":\"0\",\"showAllChildren\":\"1\",\"tag_id\":\"\",\"class_sfx\":\" nav-pills\",\"window_open\":\"\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"_menu\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"itemid\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}',0,'*'),(2,40,'Login','','',1,'login',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_login',1,1,'',1,'*'),(3,41,'Popular Articles','','',3,'cpanel',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_popular',3,1,'{\"count\":\"5\",\"catid\":\"\",\"user_id\":\"0\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"0\"}',1,'*'),(4,42,'Recently Added Articles','','',4,'cpanel',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_latest',3,1,'{\"count\":\"5\",\"ordering\":\"c_dsc\",\"catid\":\"\",\"user_id\":\"0\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"0\"}',1,'*'),(8,43,'Toolbar','','',1,'toolbar',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_toolbar',3,1,'',1,'*'),(9,44,'Quick Icons','','',1,'icon',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_quickicon',3,1,'',1,'*'),(10,45,'Logged-in Users','','',2,'cpanel',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_logged',3,1,'{\"count\":\"5\",\"name\":\"1\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"0\"}',1,'*'),(12,46,'Admin Menu','','',1,'menu',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_menu',3,1,'{\"layout\":\"\",\"moduleclass_sfx\":\"\",\"shownew\":\"1\",\"showhelp\":\"1\",\"cache\":\"0\"}',1,'*'),(13,47,'Admin Submenu','','',1,'submenu',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_submenu',3,1,'',1,'*'),(14,48,'User Status','','',2,'status',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_status',3,1,'',1,'*'),(15,49,'Title','','',1,'title',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_title',3,1,'',1,'*'),(16,50,'Login Form','','',7,'position-7',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_login',1,1,'{\"greeting\":\"1\",\"name\":\"0\"}',0,'*'),(17,51,'Breadcrumbs','','',1,'position-2',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_breadcrumbs',1,1,'{\"moduleclass_sfx\":\"\",\"showHome\":\"1\",\"homeText\":\"\",\"showComponent\":\"1\",\"separator\":\"\",\"cache\":\"0\",\"cache_time\":\"0\",\"cachemode\":\"itemid\"}',0,'*'),(79,52,'Multilanguage status','','',1,'status',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,'mod_multilangstatus',3,1,'{\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"0\"}',1,'*'),(86,53,'Joomla Version','','',1,'footer',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_version',3,1,'{\"format\":\"short\",\"product\":\"1\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"0\"}',1,'*'),(87,54,'Popular Tags','','',1,'position-7',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_tags_popular',1,1,'{\"maximum\":\"10\",\"timeframe\":\"alltime\",\"order_value\":\"count\",\"order_direction\":\"1\",\"display_count\":0,\"no_results_text\":\"0\",\"minsize\":1,\"maxsize\":2,\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"owncache\":\"1\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}',0,'*'),(88,55,'Site Information','','',3,'cpanel',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_stats_admin',3,1,'{\"serverinfo\":\"1\",\"siteinfo\":\"1\",\"counter\":\"0\",\"increase\":\"0\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"static\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}',1,'*'),(89,56,'Release News','','',0,'postinstall',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_feed',1,1,'{\"rssurl\":\"https:\\/\\/www.joomla.org\\/announcements\\/release-news.feed\",\"rssrtl\":\"0\",\"rsstitle\":\"1\",\"rssdesc\":\"1\",\"rssimage\":\"1\",\"rssitems\":\"3\",\"rssitemdesc\":\"1\",\"word_count\":\"0\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"1\",\"cache_time\":\"900\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}',1,'*'),(90,57,'Latest Articles','','',1,'position2',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_articles_latest',1,1,'{\"catid\":[\"\"],\"count\":\"5\",\"show_featured\":\"\",\"ordering\":\"c_dsc\",\"user_id\":\"0\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"static\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}',0,'*'),(91,58,'User Menu','','',3,'position-7',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_menu',1,1,'{\"menutype\":\"usermenu\",\"base\":\"\",\"startLevel\":\"1\",\"endLevel\":\"0\",\"showAllChildren\":\"1\",\"tag_id\":\"\",\"class_sfx\":\"\",\"window_open\":\"\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"_menu\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"itemid\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}',0,'*'),(92,59,'Image Module','','<p><img src=\"images/headers/blue-flower.jpg\" alt=\"Blue Flower\" /></p>',0,'position-3',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_custom',1,0,'{\"prepare_content\":\"1\",\"backgroundimage\":\"\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"static\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}',0,'*'),(93,60,'Search','','',0,'position-0',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'mod_search',1,1,'{\"label\":\"\",\"width\":\"20\",\"text\":\"\",\"button\":\"0\",\"button_pos\":\"right\",\"imagebutton\":\"1\",\"button_text\":\"\",\"opensearch\":\"1\",\"opensearch_title\":\"\",\"set_itemid\":\"0\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"itemid\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}',0,'*'),(94,64,'AS Sequence Slider','','',1,'as-slider',0,'0000-00-00 00:00:00','2017-05-17 18:26:53','0000-00-00 00:00:00',0,'mod_as_sequence_slider',1,0,'{\"catid\":[\"8\"],\"image\":\"1\",\"item_title\":\"1\",\"link_titles\":\"1\",\"item_heading\":\"h1\",\"published\":\"0\",\"readmore\":\"0\",\"count\":\"3\",\"ordering\":\"a.publish_up\",\"item_url\":\"\",\"target\":\"self\",\"theme\":\"0\",\"show_caption\":\"1\",\"autoPlay\":\"1\",\"height\":\"30%\",\"imageLink\":\"itemsLinks\",\"loader\":\"0\",\"autoPlayDelay\":\"10000\",\"hover\":\"0\",\"navigation\":\"1\",\"pagination\":\"0\",\"playPause\":\"0\",\"thumbnails\":\"false\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"itemid\",\"module_tag\":\"div\",\"bootstrap_size\":\"12\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}',0,'*'),(95,65,'AS Superfish Menu','','',1,'as-mainmenu',0,'0000-00-00 00:00:00','2017-05-20 20:44:48','0000-00-00 00:00:00',1,'mod_as_superfish_menu',1,0,'{\"menutype\":\"mainmenu\",\"startLevel\":\"1\",\"endLevel\":\"0\",\"showAllChildren\":\"0\",\"tag_id\":\"\",\"class_sfx\":\"\",\"window_open\":\"\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"navigation\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"itemid\",\"sf-delay\":\"500\",\"sf-sticky\":\"1\",\"sf-dynamic\":\"0\",\"sf-layout\":\"hor\",\"sf-onclick\":\"0\",\"sf-mobiselect\":\"0\",\"sf-mobinavtext\":\"Navigate to...\",\"sf-mobiclassname\":\"select-menu\",\"sf-mobisubclassname\":\"sub-menu\",\"sf-mobisticky\":\"0\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}',0,'*'),(96,66,'AS ArtSlider','','',1,'as-breadcrumbs',0,'0000-00-00 00:00:00','2017-05-17 18:50:11','0000-00-00 00:00:00',0,'mod_as_artslider',1,0,'{\"category_id\":[\"8\"],\"show_image\":\"0\",\"show_title\":\"1\",\"title_heading\":\"h1\",\"title_color\":\"\",\"firstword_title_color\":\"\",\"secondword_title_color\":\"\",\"link_titles\":\"\",\"link_title_color\":\"\",\"link_hover_title_color\":\"\",\"readmore\":\"0\",\"readmore_txt\":\"Read More\",\"readmore_gradient_topcolor\":\"\",\"readmore_gradient_bottomcolor\":\"\",\"readmore_bgcolor\":\"\",\"readmore_color\":\"\",\"articles_num\":\"3\",\"ordering\":\"a.publish_up\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"itemid\",\"slider_style\":\"0\",\"slider_alignment\":\"center\",\"slider_height\":\"10%\",\"slider_autoplay\":\"1\",\"slider_mobi_autoplay\":\"0\",\"slider_columns\":\"6\",\"slider_rows\":\"4\",\"slider_slicedcols\":\"6\",\"slider_slicedrows\":\"4\",\"slider_easing\":\"easeInOutExpo\",\"slider_mobieasing\":\"easeInOutExpo\",\"slider_animation\":\"random\",\"slider_mobianimation\":\"simpleFade\",\"slider_grid_diff\":\"250\",\"slider_grid_opacity\":\"0\",\"slider_showtime\":\"5000\",\"slider_transperiod\":\"500\",\"slider_pause\":\"1\",\"slider_stop\":\"0\",\"slider_pagination\":\"1\",\"slider_pagination_radius\":\"0px\",\"slider_pagination_color\":\"\",\"slider_pagination_hovercolor\":\"\",\"slider_navigation\":\"0\",\"slider_hover_navigation\":\"0\",\"slider_play_pause\":\"0\",\"slider_caption\":\"1\",\"slider_caption_color\":\"\",\"slider_caption_fontsize\":\"14px\",\"slider_caption_animation\":\"fadeIn\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}',0,'*'),(97,68,'JM Slideshow Responsive','','',1,'slide',0,'0000-00-00 00:00:00','2017-05-17 19:26:27','0000-00-00 00:00:00',0,'mod_jmslideshow',1,0,'{\"jmslideshow_responsive\":\"1\",\"jmslideshow_width\":\"700\",\"jmslideshow_image_width\":\"100%\",\"jmslideshow_image_height\":\"30%\",\"jmslideshow_image_style\":\"fit\",\"class_sfx\":\"\",\"slider_source\":\"1\",\"jmslideshow_categories\":[\"8\"],\"jmslideshow_article_ids\":\"\",\"jmslideshow_k2_ids\":\"\",\"jmslideshow_hikashop_ids\":\"\",\"jmslideshow_foder_image\":\"\",\"jmslideshow_image_source\":\"0\",\"jmslideshow_article_image_source\":\"2\",\"jmslideshow_ordering\":\"ASC\",\"jmslideshow_orderby\":\"1\",\"jmslideshow_count\":\"3\",\"jmslideshow_layout\":\"default\",\"jmslideshow_effect\":\"fade\",\"jmslideshow_speed\":\"500\",\"jmslideshow_auto\":\"1\",\"jmslideshow_timeout\":\"5000\",\"jmslideshow_caption_position\":\"topleft\",\"jmslideshow_caption_left\":\"30\",\"jmslideshow_caption_top\":\"30\",\"jmslideshow_caption_right\":\"30\",\"jmslideshow_caption_bottom\":\"30\",\"jmslideshow_caption_width\":\"500\",\"jmslideshow_desc_length\":\"150\",\"jmslideshow_desc_html\":\"\",\"jmslideshow_readmore_text\":\"Read more\",\"jmslideshow_show_nav_buttons\":\"1\",\"jmslideshow_show_pager\":\"1\",\"jmslideshow_pager_type\":\"1\",\"jmslideshow_pager_position\":\"bottomleft\",\"jmslideshow_pager_left\":\"30\",\"jmslideshow_pager_top\":\"30\",\"jmslideshow_pager_right\":\"30\",\"jmslideshow_pager_bottom\":\"30\",\"jmslideshow_include_jquery\":\"2\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}',0,'*'),(98,72,'Articles - Newsflash (Advanced)','','',1,'as-slider',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,'mod_articles_news_adv',1,1,'{\"catid\":[\"\"],\"count\":\"3\",\"columns\":\"1\",\"ordering\":\"a.publish_up\",\"mod_button\":\"0\",\"custom_link_title\":\"\",\"custom_link_route\":\"0\",\"custom_link_url\":\"http:\\/\\/\",\"custom_link_menu\":\"101\",\"pretext\":\"\",\"item_title\":\"0\",\"link_titles\":\"\",\"item_heading\":\"h4\",\"show_tags\":\"0\",\"published\":\"0\",\"createdby\":\"0\",\"intro_image\":\"0\",\"intro_image_align\":\"none\",\"image\":\"0\",\"readmore\":\"0\",\"bootstrap_layout\":\"0\",\"layout\":\"_:bootstrapCols\",\"moduleclass_sfx\":\"\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"itemid\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}',0,'*'),(99,73,'JoomSpirit Slider','','',1,'as-slider',0,'0000-00-00 00:00:00','2017-05-20 20:45:00','0000-00-00 00:00:00',1,'mod_joomspirit_slider',1,0,'{\"load_jquery\":\"0\",\"pauseOnHover\":\"true\",\"initDelay\":\"0\",\"randomize\":\"false\",\"kenburns\":\"no-kenburns\",\"rotate_on_scroll\":\"no-rotate-on-scroll\",\"fade_text_on_scroll\":\"fade-text-on-scroll\",\"load_skrollr\":\"true\",\"height_slideshow_desktop\":\"fixed-viewport\",\"height_slideshow_desktop_percentage\":\"40\",\"height_slideshow_desktop_px\":\"440\",\"height_slideshow_tablet\":\"fluid\",\"height_slideshow_tablet_percentage\":\"60\",\"height_slideshow_tablet_px\":\"440\",\"height_slideshow_phone\":\"fluid\",\"height_slideshow_phone_percentage\":\"30\",\"height_slideshow_phone_px\":\"440\",\"slide_theme\":\"true\",\"transition\":\"slide\",\"bg_color\":\"transparent\",\"direction\":\"horizontal\",\"animSpeed\":\"2000\",\"pauseTime\":\"6500\",\"shadow_top_image\":\"no\",\"shadow_bottom_image\":\"no\",\"theme_shadow\":\"theme-without-shadow\",\"theme_border\":\"00\",\"theme_border_radius\":\"00\",\"directionNav\":\"false\",\"controlNav\":\"true\",\"positionNav\":\"bottom\",\"colorNav\":\"light\",\"colorNavActive\":\"#98c138\",\"hide_buttons\":\"500\",\"anim_text\":\"anim-js-slide anim-js-text\",\"bg_color_text\":\"#000000\",\"transparency_bg_text\":\"0\",\"bg_color_text_ie\":\"\",\"bg_caption_shadow\":\"no\",\"position_text\":\"Center\",\"max_width\":\"350\",\"text_shadow\":\"light\",\"font_title\":\"Oswald\",\"custom_font_title\":\"\",\"font_size_title\":\"25px\",\"color_title\":\"#ffffff\",\"font_text\":\"Oswald\",\"custom_font_text\":\"\",\"font_size_text\":\"15px\",\"color_text\":\"#eeeeee\",\"target\":\"_blank\",\"type_link\":\"link_both\",\"read_more\":\"Read more\",\"color_read_more\":\"#e88858\",\"text_under_slideshow\":\"768\",\"hide_text\":\"500\",\"bg_color_text_small_screen\":\"#eeeeee\",\"color_text_small_screen\":\"#444444\",\"fontsize_title_small_screen\":\"16\",\"fontsize_text_small_screen\":\"13\",\"image1\":\"images\\/sampledata\\/parks\\/09_03_MIRR_2016.jpg\",\"image1alt\":\"Agricultura Familiar\",\"image1title\":\"Agricultura Familiar\",\"image1cap\":\"Sustentabilidade e qualidade na mesa das fam\\u00edlias brasileiras\",\"color_title1\":\"\",\"font_size_title1\":\"\",\"color_text1\":\"\",\"font_size_text1\":\"\",\"color_read_more1\":\"\",\"image1customlink\":\"\",\"text_shadow1\":\"default\",\"bg_text1\":\"default\",\"bg_caption_shadow1\":\"default\",\"max_width1\":\"\",\"position_text1\":\"default\",\"anim_text1\":\"default\",\"image2\":\"images\\/imagem1.jpg\",\"image2alt\":\"Projeto Mandala\",\"image2title\":\"Projeto Mandala\",\"image2cap\":\"Conhe\\u00e7a o projeto mandala do IFTO CA Formoso do Araguaia\",\"color_title2\":\"\",\"font_size_title2\":\"30px\",\"color_text2\":\"#ffffff\",\"font_size_text2\":\"21px\",\"color_read_more2\":\"\",\"image2customlink\":\"\",\"text_shadow2\":\"default\",\"bg_text2\":\"default\",\"bg_caption_shadow2\":\"default\",\"max_width2\":\"\",\"position_text2\":\"default\",\"anim_text2\":\"default\",\"image3\":\"images\\/imagem3.jpg\",\"image3alt\":\"\",\"image3title\":\"\",\"image3cap\":\"\",\"color_title3\":\"\",\"font_size_title3\":\"\",\"color_text3\":\"\",\"font_size_text3\":\"\",\"color_read_more3\":\"\",\"image3customlink\":\"\",\"text_shadow3\":\"default\",\"bg_text3\":\"default\",\"bg_caption_shadow3\":\"default\",\"max_width3\":\"\",\"position_text3\":\"default\",\"anim_text3\":\"default\",\"image4\":\"\",\"image4alt\":\"\",\"image4title\":\"\",\"image4cap\":\"\",\"color_title4\":\"\",\"font_size_title4\":\"\",\"color_text4\":\"\",\"font_size_text4\":\"\",\"color_read_more4\":\"\",\"image4customlink\":\"\",\"text_shadow4\":\"default\",\"bg_text4\":\"default\",\"bg_caption_shadow4\":\"default\",\"max_width4\":\"\",\"position_text4\":\"default\",\"anim_text4\":\"default\",\"image5\":\"\",\"image5alt\":\"\",\"image5title\":\"\",\"image5cap\":\"\",\"color_title5\":\"\",\"font_size_title5\":\"\",\"color_text5\":\"\",\"font_size_text5\":\"\",\"color_read_more5\":\"\",\"image5customlink\":\"\",\"text_shadow5\":\"default\",\"bg_text5\":\"default\",\"bg_caption_shadow5\":\"default\",\"max_width5\":\"\",\"position_text5\":\"default\",\"anim_text5\":\"default\",\"image6\":\"\",\"image6alt\":\"\",\"image6title\":\"\",\"image6cap\":\"\",\"color_title6\":\"\",\"font_size_title6\":\"\",\"color_text6\":\"\",\"font_size_text6\":\"\",\"color_read_more6\":\"\",\"image6customlink\":\"\",\"text_shadow6\":\"default\",\"bg_text6\":\"default\",\"bg_caption_shadow6\":\"default\",\"max_width6\":\"\",\"position_text6\":\"default\",\"anim_text6\":\"default\",\"image7\":\"\",\"image7alt\":\"\",\"image7title\":\"\",\"image7cap\":\"\",\"color_title7\":\"\",\"font_size_title7\":\"\",\"color_text7\":\"\",\"font_size_text7\":\"\",\"color_read_more7\":\"\",\"image7customlink\":\"\",\"text_shadow7\":\"default\",\"bg_text7\":\"default\",\"bg_caption_shadow7\":\"default\",\"max_width7\":\"\",\"position_text7\":\"default\",\"anim_text7\":\"default\",\"image8\":\"\",\"image8alt\":\"\",\"image8title\":\"\",\"image8cap\":\"\",\"color_title8\":\"\",\"font_size_title8\":\"\",\"color_text8\":\"\",\"font_size_text8\":\"\",\"color_read_more8\":\"\",\"image8customlink\":\"\",\"text_shadow8\":\"default\",\"bg_text8\":\"default\",\"bg_caption_shadow8\":\"default\",\"max_width8\":\"\",\"position_text8\":\"default\",\"anim_text8\":\"default\",\"image9\":\"\",\"image9alt\":\"\",\"image9title\":\"\",\"image9cap\":\"\",\"color_title9\":\"\",\"font_size_title9\":\"\",\"color_text9\":\"\",\"font_size_text9\":\"\",\"color_read_more9\":\"\",\"image9customlink\":\"\",\"text_shadow9\":\"default\",\"bg_text9\":\"default\",\"bg_caption_shadow9\":\"default\",\"max_width9\":\"\",\"position_text9\":\"default\",\"anim_text9\":\"default\",\"image10\":\"\",\"image10alt\":\"\",\"image10title\":\"\",\"image10cap\":\"\",\"color_title10\":\"\",\"font_size_title10\":\"\",\"color_text10\":\"\",\"font_size_text10\":\"\",\"color_read_more10\":\"\",\"image10customlink\":\"\",\"text_shadow10\":\"default\",\"bg_text10\":\"default\",\"bg_caption_shadow10\":\"default\",\"max_width10\":\"\",\"position_text10\":\"default\",\"anim_text10\":\"default\",\"image11\":\"\",\"image11alt\":\"\",\"image11title\":\"\",\"image11cap\":\"\",\"color_title11\":\"\",\"font_size_title11\":\"\",\"color_text11\":\"\",\"font_size_text11\":\"\",\"color_read_more11\":\"\",\"image11customlink\":\"\",\"text_shadow11\":\"default\",\"bg_text11\":\"default\",\"bg_caption_shadow11\":\"default\",\"max_width11\":\"\",\"position_text11\":\"default\",\"anim_text11\":\"default\",\"image12\":\"\",\"image12alt\":\"\",\"image12title\":\"\",\"image12cap\":\"\",\"color_title12\":\"\",\"font_size_title12\":\"\",\"color_text12\":\"\",\"font_size_text12\":\"\",\"color_read_more12\":\"\",\"image12customlink\":\"\",\"text_shadow12\":\"default\",\"bg_text12\":\"default\",\"bg_caption_shadow12\":\"default\",\"max_width12\":\"\",\"position_text12\":\"default\",\"anim_text12\":\"default\",\"image13\":\"\",\"image13alt\":\"\",\"image13title\":\"\",\"image13cap\":\"\",\"color_title13\":\"\",\"font_size_title13\":\"\",\"color_text13\":\"\",\"font_size_text13\":\"\",\"color_read_more13\":\"\",\"image13customlink\":\"\",\"text_shadow13\":\"default\",\"bg_text13\":\"default\",\"bg_caption_shadow13\":\"default\",\"max_width13\":\"\",\"position_text13\":\"default\",\"anim_text13\":\"default\",\"image14\":\"\",\"image14alt\":\"\",\"image14title\":\"\",\"image14cap\":\"\",\"color_title14\":\"\",\"font_size_title14\":\"\",\"color_text14\":\"\",\"font_size_text14\":\"\",\"color_read_more14\":\"\",\"image14customlink\":\"\",\"text_shadow14\":\"default\",\"bg_text14\":\"default\",\"bg_caption_shadow14\":\"default\",\"max_width14\":\"\",\"position_text14\":\"default\",\"anim_text14\":\"default\",\"image15\":\"\",\"image15alt\":\"\",\"image15title\":\"\",\"image15cap\":\"\",\"color_title15\":\"\",\"font_size_title15\":\"\",\"color_text15\":\"\",\"font_size_text15\":\"\",\"color_read_more15\":\"\",\"image15customlink\":\"\",\"text_shadow15\":\"default\",\"bg_text15\":\"default\",\"bg_caption_shadow15\":\"default\",\"max_width15\":\"\",\"position_text15\":\"default\",\"anim_text15\":\"default\",\"image16\":\"\",\"image16alt\":\"\",\"image16title\":\"\",\"image16cap\":\"\",\"color_title16\":\"\",\"font_size_title16\":\"\",\"color_text16\":\"\",\"font_size_text16\":\"\",\"color_read_more16\":\"\",\"image16customlink\":\"\",\"text_shadow16\":\"default\",\"bg_text16\":\"default\",\"bg_caption_shadow16\":\"default\",\"max_width16\":\"\",\"position_text16\":\"default\",\"anim_text16\":\"default\",\"image17\":\"\",\"image17alt\":\"\",\"image17title\":\"\",\"image17cap\":\"\",\"color_title17\":\"\",\"font_size_title17\":\"\",\"color_text17\":\"\",\"font_size_text17\":\"\",\"color_read_more17\":\"\",\"image17customlink\":\"\",\"text_shadow17\":\"default\",\"bg_text17\":\"default\",\"bg_caption_shadow17\":\"default\",\"max_width17\":\"\",\"position_text17\":\"default\",\"anim_text17\":\"default\",\"image18\":\"\",\"image18alt\":\"\",\"image18title\":\"\",\"image18cap\":\"\",\"color_title18\":\"\",\"font_size_title18\":\"\",\"color_text18\":\"\",\"font_size_text18\":\"\",\"color_read_more18\":\"\",\"image18customlink\":\"\",\"text_shadow18\":\"default\",\"bg_text18\":\"default\",\"bg_caption_shadow18\":\"default\",\"max_width18\":\"\",\"position_text18\":\"default\",\"anim_text18\":\"default\",\"image19\":\"\",\"image19alt\":\"\",\"image19title\":\"\",\"image19cap\":\"\",\"color_title19\":\"\",\"font_size_title19\":\"\",\"color_text19\":\"\",\"font_size_text19\":\"\",\"color_read_more19\":\"\",\"image19customlink\":\"\",\"text_shadow19\":\"default\",\"bg_text19\":\"default\",\"bg_caption_shadow19\":\"default\",\"max_width19\":\"\",\"position_text19\":\"default\",\"anim_text19\":\"default\",\"image20\":\"\",\"image20alt\":\"\",\"image20title\":\"\",\"image20cap\":\"\",\"color_title20\":\"\",\"font_size_title20\":\"\",\"color_text20\":\"\",\"font_size_text20\":\"\",\"color_read_more20\":\"\",\"image20customlink\":\"\",\"text_shadow20\":\"default\",\"bg_text20\":\"default\",\"bg_caption_shadow20\":\"default\",\"max_width20\":\"\",\"position_text20\":\"default\",\"anim_text20\":\"default\",\"image21\":\"\",\"image21alt\":\"\",\"image21title\":\"\",\"image21cap\":\"\",\"color_title21\":\"\",\"font_size_title21\":\"\",\"color_text21\":\"\",\"font_size_text21\":\"\",\"color_read_more21\":\"\",\"image21customlink\":\"\",\"text_shadow21\":\"default\",\"bg_text21\":\"default\",\"bg_caption_shadow21\":\"default\",\"max_width21\":\"\",\"position_text21\":\"default\",\"anim_text21\":\"default\",\"image22\":\"\",\"image22alt\":\"\",\"image22title\":\"\",\"image22cap\":\"\",\"color_title22\":\"\",\"font_size_title22\":\"\",\"color_text22\":\"\",\"font_size_text22\":\"\",\"color_read_more22\":\"\",\"image22customlink\":\"\",\"text_shadow22\":\"default\",\"bg_text22\":\"default\",\"bg_caption_shadow22\":\"default\",\"max_width22\":\"\",\"position_text22\":\"default\",\"anim_text22\":\"default\",\"imagefolder\":\"-1\",\"moduleclass_sfx\":\"\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"itemid\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}',0,'*');
/*!40000 ALTER TABLE `mdla_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_modules_menu`
--

DROP TABLE IF EXISTS `mdla_modules_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_modules_menu` (
  `moduleid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`moduleid`,`menuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_modules_menu`
--

LOCK TABLES `mdla_modules_menu` WRITE;
/*!40000 ALTER TABLE `mdla_modules_menu` DISABLE KEYS */;
INSERT INTO `mdla_modules_menu` VALUES (1,0),(2,0),(3,0),(4,0),(6,0),(7,0),(8,0),(9,0),(10,0),(12,0),(13,0),(14,0),(15,0),(16,0),(17,0),(79,0),(86,0),(87,0),(88,0),(89,0),(90,0),(91,0),(92,0),(93,0),(94,0),(95,101),(95,102),(95,104),(95,106),(95,107),(96,101),(96,102),(96,104),(96,106),(96,107),(97,101),(97,102),(97,104),(97,106),(97,107),(98,0),(99,0);
/*!40000 ALTER TABLE `mdla_modules_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_newsfeeds`
--

DROP TABLE IF EXISTS `mdla_newsfeeds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_newsfeeds` (
  `catid` int(11) NOT NULL DEFAULT '0',
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `link` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `numarticles` int(10) unsigned NOT NULL DEFAULT '1',
  `cache_time` int(10) unsigned NOT NULL DEFAULT '3600',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rtl` tinyint(4) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `params` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadata` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `xreference` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`published`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_newsfeeds`
--

LOCK TABLES `mdla_newsfeeds` WRITE;
/*!40000 ALTER TABLE `mdla_newsfeeds` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_newsfeeds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_overrider`
--

DROP TABLE IF EXISTS `mdla_overrider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_overrider` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `constant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `string` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_overrider`
--

LOCK TABLES `mdla_overrider` WRITE;
/*!40000 ALTER TABLE `mdla_overrider` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_overrider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_postinstall_messages`
--

DROP TABLE IF EXISTS `mdla_postinstall_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_postinstall_messages` (
  `postinstall_message_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `extension_id` bigint(20) NOT NULL DEFAULT '700' COMMENT 'FK to #__extensions',
  `title_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Lang key for the title',
  `description_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Lang key for description',
  `action_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `language_extension` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'com_postinstall' COMMENT 'Extension holding lang keys',
  `language_client_id` tinyint(3) NOT NULL DEFAULT '1',
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'link' COMMENT 'Message type - message, link, action',
  `action_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'RAD URI to the PHP file containing action method',
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'Action method name or URL',
  `condition_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'RAD URI to file holding display condition method',
  `condition_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Display condition method, must return boolean',
  `version_introduced` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3.2.0' COMMENT 'Version when this message was introduced',
  `enabled` tinyint(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`postinstall_message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_postinstall_messages`
--

LOCK TABLES `mdla_postinstall_messages` WRITE;
/*!40000 ALTER TABLE `mdla_postinstall_messages` DISABLE KEYS */;
INSERT INTO `mdla_postinstall_messages` VALUES (1,700,'PLG_TWOFACTORAUTH_TOTP_POSTINSTALL_TITLE','PLG_TWOFACTORAUTH_TOTP_POSTINSTALL_BODY','PLG_TWOFACTORAUTH_TOTP_POSTINSTALL_ACTION','plg_twofactorauth_totp',1,'action','site://plugins/twofactorauth/totp/postinstall/actions.php','twofactorauth_postinstall_action','site://plugins/twofactorauth/totp/postinstall/actions.php','twofactorauth_postinstall_condition','3.2.0',1),(2,700,'COM_CPANEL_WELCOME_BEGINNERS_TITLE','COM_CPANEL_WELCOME_BEGINNERS_MESSAGE','','com_cpanel',1,'message','','','','','3.2.0',1),(3,700,'COM_CPANEL_MSG_STATS_COLLECTION_TITLE','COM_CPANEL_MSG_STATS_COLLECTION_BODY','','com_cpanel',1,'message','','','admin://components/com_admin/postinstall/statscollection.php','admin_postinstall_statscollection_condition','3.5.0',1),(4,700,'PLG_SYSTEM_UPDATENOTIFICATION_POSTINSTALL_UPDATECACHETIME','PLG_SYSTEM_UPDATENOTIFICATION_POSTINSTALL_UPDATECACHETIME_BODY','PLG_SYSTEM_UPDATENOTIFICATION_POSTINSTALL_UPDATECACHETIME_ACTION','plg_system_updatenotification',1,'action','site://plugins/system/updatenotification/postinstall/updatecachetime.php','updatecachetime_postinstall_action','site://plugins/system/updatenotification/postinstall/updatecachetime.php','updatecachetime_postinstall_condition','3.6.3',1),(5,700,'COM_CPANEL_MSG_JOOMLA40_PRE_CHECKS_TITLE','COM_CPANEL_MSG_JOOMLA40_PRE_CHECKS_BODY','','com_cpanel',1,'message','','','admin://components/com_admin/postinstall/joomla40checks.php','admin_postinstall_joomla40checks_condition','3.7.0',1),(6,700,'TPL_HATHOR_MESSAGE_POSTINSTALL_TITLE','TPL_HATHOR_MESSAGE_POSTINSTALL_BODY','TPL_HATHOR_MESSAGE_POSTINSTALL_ACTION','tpl_hathor',1,'action','admin://templates/hathor/postinstall/hathormessage.php','hathormessage_postinstall_action','admin://templates/hathor/postinstall/hathormessage.php','hathormessage_postinstall_condition','3.7.0',1);
/*!40000 ALTER TABLE `mdla_postinstall_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_redirect_links`
--

DROP TABLE IF EXISTS `mdla_redirect_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_redirect_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `old_url` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_url` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referer` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `header` smallint(3) NOT NULL DEFAULT '301',
  PRIMARY KEY (`id`),
  KEY `idx_old_url` (`old_url`(100)),
  KEY `idx_link_modifed` (`modified_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_redirect_links`
--

LOCK TABLES `mdla_redirect_links` WRITE;
/*!40000 ALTER TABLE `mdla_redirect_links` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_redirect_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_schemas`
--

DROP TABLE IF EXISTS `mdla_schemas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_schemas` (
  `extension_id` int(11) NOT NULL,
  `version_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`extension_id`,`version_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_schemas`
--

LOCK TABLES `mdla_schemas` WRITE;
/*!40000 ALTER TABLE `mdla_schemas` DISABLE KEYS */;
INSERT INTO `mdla_schemas` VALUES (700,'3.7.0-2017-04-19');
/*!40000 ALTER TABLE `mdla_schemas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_session`
--

DROP TABLE IF EXISTS `mdla_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_session` (
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `client_id` tinyint(3) unsigned DEFAULT NULL,
  `guest` tinyint(4) unsigned DEFAULT '1',
  `time` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `data` mediumtext COLLATE utf8mb4_unicode_ci,
  `userid` int(11) DEFAULT '0',
  `username` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT '',
  PRIMARY KEY (`session_id`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_session`
--

LOCK TABLES `mdla_session` WRITE;
/*!40000 ALTER TABLE `mdla_session` DISABLE KEYS */;
INSERT INTO `mdla_session` VALUES ('pm31euu3nhnoorufapoks9tqu2',0,1,'1496854715','joomla|s:768:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjE6e3M6OToiX19kZWZhdWx0IjtPOjg6InN0ZENsYXNzIjozOntzOjc6InNlc3Npb24iO086ODoic3RkQ2xhc3MiOjI6e3M6NzoiY291bnRlciI7aToxO3M6NToidGltZXIiO086ODoic3RkQ2xhc3MiOjM6e3M6NToic3RhcnQiO2k6MTQ5Njg1NDcxMTtzOjQ6Imxhc3QiO2k6MTQ5Njg1NDcxMTtzOjM6Im5vdyI7aToxNDk2ODU0NzExO319czo4OiJyZWdpc3RyeSI7TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjE6e3M6MTM6ImNvbV9pbnN0YWxsZXIiO086ODoic3RkQ2xhc3MiOjI6e3M6NzoibWVzc2FnZSI7czowOiIiO3M6MTc6ImV4dGVuc2lvbl9tZXNzYWdlIjtzOjA6IiI7fX1zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6OToic2VwYXJhdG9yIjtzOjE6Ii4iO31zOjQ6InVzZXIiO086NToiSlVzZXIiOjE6e3M6MjoiaWQiO2k6MDt9fX1zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6OToic2VwYXJhdG9yIjtzOjE6Ii4iO30=\";',0,'');
/*!40000 ALTER TABLE `mdla_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_tags`
--

DROP TABLE IF EXISTS `mdla_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadesc` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The meta description for the page.',
  `metakey` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The meta keywords for the page.',
  `metadata` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'JSON encoded metadata properties.',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by_alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `modified_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `urls` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tag_idx` (`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_path` (`path`(100)),
  KEY `idx_left_right` (`lft`,`rgt`),
  KEY `idx_alias` (`alias`(100)),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_tags`
--

LOCK TABLES `mdla_tags` WRITE;
/*!40000 ALTER TABLE `mdla_tags` DISABLE KEYS */;
INSERT INTO `mdla_tags` VALUES (1,0,0,3,0,'','ROOT','root','','',1,0,'0000-00-00 00:00:00',1,'{}','','','',0,'2017-05-10 05:04:12','',0,'0000-00-00 00:00:00','','',0,'*',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,1,1,2,1,'joomla','Joomla','joomla','','',1,0,'0000-00-00 00:00:00',1,'{\"tag_layout\":\"\",\"tag_link_class\":\"label label-info\",\"image_intro\":\"\",\"float_intro\":\"\",\"image_intro_alt\":\"\",\"image_intro_caption\":\"\",\"image_fulltext\":\"\",\"float_fulltext\":\"\",\"image_fulltext_alt\":\"\",\"image_fulltext_caption\":\"\"}','','','{\"author\":\"\",\"robots\":\"\"}',343,'2017-05-10 05:04:12','',0,'0000-00-00 00:00:00','','',0,'*',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `mdla_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_template_styles`
--

DROP TABLE IF EXISTS `mdla_template_styles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_template_styles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `template` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `client_id` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `home` char(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `params` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_template` (`template`),
  KEY `idx_home` (`home`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_template_styles`
--

LOCK TABLES `mdla_template_styles` WRITE;
/*!40000 ALTER TABLE `mdla_template_styles` DISABLE KEYS */;
INSERT INTO `mdla_template_styles` VALUES (4,'beez3',0,'0','Beez3 - Default','{\"wrapperSmall\":\"53\",\"wrapperLarge\":\"72\",\"logo\":\"images\\/joomla_black.png\",\"sitetitle\":\"Joomla!\",\"sitedescription\":\"Open Source Content Management\",\"navposition\":\"left\",\"templatecolor\":\"personal\",\"html5\":\"0\"}'),(5,'hathor',1,'0','Hathor - Default','{\"showSiteName\":\"0\",\"colourChoice\":\"\",\"boldText\":\"0\"}'),(7,'protostar',0,'0','protostar - Default','{\"templateColor\":\"\",\"logoFile\":\"\",\"googleFont\":\"1\",\"googleFontName\":\"Open+Sans\",\"fluidContainer\":\"0\"}'),(8,'isis',1,'1','isis - Default','{\"templateColor\":\"\",\"logoFile\":\"\"}'),(9,'as002085free',0,'1','AS 002085 Free - Padrão','{\"theme_style\":\"coffee\",\"theme_layout\":\"1\",\"theme_responsive\":\"1\",\"logo_img\":\"\",\"logo_slogan\":\"\",\"aside_left_width\":\"4\",\"aside_right_width\":\"4\",\"show_footer_logo\":\"0\",\"footer_logo_img\":\"\",\"footer_copy\":\"1\",\"show_footer_year\":\"1\",\"body_font_family\":\"Lato\",\"heading_font_family\":\"Lato\",\"body_font_size\":\"\",\"h1_font_size\":\"\",\"h2_font_size\":\"\",\"h3_font_size\":\"\",\"h4_font_size\":\"\",\"h5_font_size\":\"\",\"h6_font_size\":\"\",\"featured_page_heading\":\"h1\",\"featured_item_heading\":\"h4\",\"category_page_heading\":\"h1\",\"category_item_heading\":\"h3\",\"blog_page_heading\":\"h1\",\"blog_item_heading\":\"h2\",\"item_item_heading\":\"h1\",\"itemblog_item_heading\":\"h3\",\"totop\":\"1\",\"totop_text\":\"Back to top\",\"todesktop\":\"1\",\"todesktop_text\":\"Back to desktop version\",\"tomobile_text\":\"Back to mobile version\"}'),(10,'lt_agriculture',0,'0','lt_agriculture - Padrão','{\"sticky_header\":\"1\",\"favicon\":\"\",\"boxed_layout\":\"1\",\"logo_type\":\"image\",\"logo_position\":\"logo\",\"logo_image\":\"\",\"logo_image_2x\":\"\",\"mobile_logo\":\"\",\"logo_text\":\"\",\"logo_slogan\":\"\",\"body_bg_image\":\"\",\"body_bg_repeat\":\"inherit\",\"body_bg_size\":\"inherit\",\"body_bg_attachment\":\"inherit\",\"body_bg_position\":\"0 0\",\"enabled_copyright\":\"1\",\"copyright_position\":\"footer1\",\"copyright\":\"\\u00a9 2017 IFTO CA Formoso do Araguaia. Todos os direitos Reservados. Desenvolvido por Vitor Vilas Boas\",\"show_social_icons\":\"0\",\"social_position\":\"as-breadcrumbs\",\"facebook\":\"\",\"twitter\":\"\",\"googleplus\":\"\",\"pinterest\":\"\",\"linkedin\":\"\",\"dribbble\":\"\",\"behance\":\"\",\"youtube\":\"\",\"flickr\":\"\",\"skype\":\"\",\"vk\":\"\",\"enable_contactinfo\":\"0\",\"contact_position\":\"top2\",\"contact_phone\":\"+228 872 4444\",\"contact_email\":\"formoso@ifto.edu.br\",\"comingsoon_mode\":\"0\",\"comingsoon_title\":\"Coming Soon Title\",\"comingsoon_date\":\"05-10-2018\",\"comingsoon_content\":\"Coming soon content\",\"preset\":\"preset3\",\"preset1_bg\":\"#ffffff\",\"preset1_text\":\"#000000\",\"preset1_major\":\"#26aae1\",\"preset2_bg\":\"#ffffff\",\"preset2_text\":\"#000000\",\"preset2_major\":\"#3d449a\",\"preset3_bg\":\"#ffffff\",\"preset3_text\":\"#000000\",\"preset3_major\":\"#2bb673\",\"preset4_bg\":\"#ffffff\",\"preset4_text\":\"#000000\",\"preset4_major\":\"#eb4947\",\"layoutlist\":\"default.json\",\"layout\":\"[{\\\"type\\\":\\\"row\\\",\\\"layout\\\":\\\"66\\\",\\\"settings\\\":{\\\"bg_color\\\":\\\"#f02222\\\",\\\"bg_image\\\":\\\"images\\/powered_by.png\\\",\\\"text_color\\\":\\\"#ffffff\\\",\\\"xs_hidden\\\":0,\\\"ms_hidden\\\":0,\\\"md_hidden\\\":0,\\\"bg_repeat\\\":\\\"no-repeat\\\",\\\"bg_img_size\\\":\\\"cover\\\",\\\"bg_position\\\":\\\"contain\\\",\\\"custom_class\\\":\\\"\\\",\\\"fluidrow\\\":0,\\\"margin\\\":\\\"\\\",\\\"padding\\\":\\\"\\\",\\\"hidden_md\\\":0,\\\"hidden_sm\\\":0,\\\"hidden_xs\\\":0,\\\"link_hover_color\\\":\\\"\\\",\\\"link_color\\\":\\\"\\\",\\\"background_position\\\":\\\"0 0\\\",\\\"background_attachment\\\":\\\"fixed\\\",\\\"background_size\\\":\\\"cover\\\",\\\"background_repeat\\\":\\\"no-repeat\\\",\\\"background_image\\\":\\\"\\\",\\\"color\\\":\\\"#999999\\\",\\\"background_color\\\":\\\"#f5f5f5\\\",\\\"name\\\":\\\"Top Bar\\\"},\\\"attr\\\":[{\\\"type\\\":\\\"sp_col\\\",\\\"className\\\":\\\"layout-column col-sm-6\\\",\\\"settings\\\":{\\\"column_type\\\":0,\\\"name\\\":\\\"top1\\\",\\\"custom_class\\\":\\\"\\\",\\\"md_hidden\\\":0,\\\"ms_hidden\\\":0,\\\"xs_hidden\\\":0,\\\"sortableitem\\\":\\\"[object Object]\\\"}},{\\\"type\\\":\\\"sp_col\\\",\\\"className\\\":\\\"layout-column col-sm-6\\\",\\\"settings\\\":{\\\"custom_class\\\":\\\"\\\",\\\"md_hidden\\\":0,\\\"ms_hidden\\\":0,\\\"xs_hidden\\\":0,\\\"name\\\":\\\"top2\\\",\\\"sortableitem\\\":\\\"[object Object]\\\",\\\"column_type\\\":0}}]},{\\\"type\\\":\\\"row\\\",\\\"layout\\\":\\\"39\\\",\\\"settings\\\":{\\\"custom_class\\\":\\\"\\\",\\\"fluidrow\\\":0,\\\"margin\\\":\\\"\\\",\\\"padding\\\":\\\"\\\",\\\"hidden_md\\\":0,\\\"hidden_sm\\\":0,\\\"hidden_xs\\\":0,\\\"link_hover_color\\\":\\\"\\\",\\\"link_color\\\":\\\"\\\",\\\"background_image\\\":\\\"\\\",\\\"color\\\":\\\"\\\",\\\"background_color\\\":\\\"\\\",\\\"name\\\":\\\"Header\\\"},\\\"attr\\\":[{\\\"type\\\":\\\"sp_col\\\",\\\"className\\\":\\\"layout-column col-sm-3\\\",\\\"settings\\\":{\\\"sortableitem\\\":\\\"[object Object]\\\",\\\"md_hidden\\\":0,\\\"ms_hidden\\\":0,\\\"xs_hidden\\\":0,\\\"custom_class\\\":\\\"\\\",\\\"xs_col\\\":\\\"col-xs-8\\\",\\\"sm_col\\\":\\\"\\\",\\\"hidden_md\\\":0,\\\"hidden_sm\\\":0,\\\"hidden_xs\\\":0,\\\"name\\\":\\\"logo\\\",\\\"column_type\\\":0}},{\\\"type\\\":\\\"sp_col\\\",\\\"className\\\":\\\"layout-column col-sm-9\\\",\\\"settings\\\":{\\\"sortableitem\\\":\\\"[object Object]\\\",\\\"custom_class\\\":\\\"\\\",\\\"md_hidden\\\":0,\\\"ms_hidden\\\":0,\\\"xs_hidden\\\":0,\\\"name\\\":\\\"menu\\\",\\\"column_type\\\":0,\\\"hidden_xs\\\":0,\\\"hidden_sm\\\":0,\\\"hidden_md\\\":0,\\\"sm_col\\\":\\\"\\\",\\\"xs_col\\\":\\\"col-xs-4\\\"}}]},{\\\"type\\\":\\\"row\\\",\\\"layout\\\":12,\\\"settings\\\":{\\\"name\\\":\\\"Page Title\\\",\\\"background_color\\\":\\\"\\\",\\\"color\\\":\\\"\\\",\\\"background_image\\\":\\\"\\\",\\\"link_color\\\":\\\"\\\",\\\"link_hover_color\\\":\\\"\\\",\\\"hidden_xs\\\":0,\\\"hidden_sm\\\":0,\\\"hidden_md\\\":0,\\\"padding\\\":\\\"\\\",\\\"margin\\\":\\\"\\\",\\\"fluidrow\\\":1,\\\"custom_class\\\":\\\"\\\"},\\\"attr\\\":[{\\\"type\\\":\\\"sp_col\\\",\\\"className\\\":\\\"layout-column col-sm-12\\\",\\\"settings\\\":{\\\"column_type\\\":0,\\\"name\\\":\\\"title\\\",\\\"hidden_xs\\\":0,\\\"hidden_sm\\\":0,\\\"hidden_md\\\":0,\\\"sm_col\\\":\\\"\\\",\\\"xs_col\\\":\\\"\\\",\\\"custom_class\\\":\\\"\\\"}}]},{\\\"type\\\":\\\"row\\\",\\\"layout\\\":\\\"363\\\",\\\"settings\\\":{\\\"name\\\":\\\"Main Body\\\",\\\"bg_color\\\":\\\"\\\",\\\"bg_image\\\":\\\"\\\",\\\"text_color\\\":\\\"\\\",\\\"link_color\\\":\\\"\\\",\\\"link_hover_color\\\":\\\"\\\",\\\"xs_hidden\\\":0,\\\"ms_hidden\\\":0,\\\"md_hidden\\\":0,\\\"custom_class\\\":\\\"\\\"},\\\"attr\\\":[{\\\"type\\\":\\\"sp_col\\\",\\\"className\\\":\\\"layout-column col-sm-3\\\",\\\"settings\\\":{\\\"sortableitem\\\":\\\"[object Object]\\\",\\\"custom_class\\\":\\\"custom-class\\\",\\\"md_hidden\\\":0,\\\"ms_hidden\\\":0,\\\"xs_hidden\\\":0,\\\"name\\\":\\\"left\\\",\\\"column_type\\\":0}},{\\\"type\\\":\\\"sp_col\\\",\\\"className\\\":\\\"layout-column col-sm-6\\\",\\\"settings\\\":{\\\"sortableitem\\\":\\\"[object Object]\\\",\\\"xs_hidden\\\":0,\\\"ms_hidden\\\":0,\\\"md_hidden\\\":0,\\\"custom_class\\\":\\\"\\\",\\\"name\\\":\\\"\\\",\\\"column_type\\\":1}},{\\\"type\\\":\\\"sp_col\\\",\\\"className\\\":\\\"layout-column col-sm-3\\\",\\\"settings\\\":{\\\"sortableitem\\\":\\\"[object Object]\\\",\\\"column_type\\\":0,\\\"name\\\":\\\"right\\\",\\\"xs_hidden\\\":0,\\\"ms_hidden\\\":0,\\\"md_hidden\\\":0,\\\"custom_class\\\":\\\"class2\\\"}}]},{\\\"type\\\":\\\"row\\\",\\\"layout\\\":\\\"3333\\\",\\\"settings\\\":{\\\"custom_class\\\":\\\"\\\",\\\"fluidrow\\\":0,\\\"margin\\\":\\\"\\\",\\\"padding\\\":\\\"100px 0px\\\",\\\"hidden_md\\\":0,\\\"hidden_sm\\\":0,\\\"hidden_xs\\\":0,\\\"link_hover_color\\\":\\\"\\\",\\\"link_color\\\":\\\"\\\",\\\"background_image\\\":\\\"\\\",\\\"color\\\":\\\"\\\",\\\"background_color\\\":\\\"#f5f5f5\\\",\\\"name\\\":\\\"Bottom\\\"},\\\"attr\\\":[{\\\"type\\\":\\\"sp_col\\\",\\\"className\\\":\\\"layout-column col-sm-3 column-active\\\",\\\"settings\\\":{\\\"sortableitem\\\":\\\"[object Object]\\\",\\\"custom_class\\\":\\\"\\\",\\\"xs_col\\\":\\\"\\\",\\\"sm_col\\\":\\\"col-sm-6\\\",\\\"hidden_md\\\":0,\\\"hidden_sm\\\":0,\\\"hidden_xs\\\":0,\\\"name\\\":\\\"bottom1\\\",\\\"column_type\\\":0}},{\\\"type\\\":\\\"sp_col\\\",\\\"className\\\":\\\"layout-column col-sm-3\\\",\\\"settings\\\":{\\\"column_type\\\":0,\\\"name\\\":\\\"bottom2\\\",\\\"hidden_xs\\\":0,\\\"hidden_sm\\\":0,\\\"hidden_md\\\":0,\\\"sm_col\\\":\\\"col-sm-6\\\",\\\"xs_col\\\":\\\"\\\",\\\"custom_class\\\":\\\"\\\"}},{\\\"type\\\":\\\"sp_col\\\",\\\"className\\\":\\\"layout-column col-sm-3\\\",\\\"settings\\\":{\\\"column_type\\\":0,\\\"name\\\":\\\"bottom3\\\",\\\"hidden_xs\\\":0,\\\"hidden_sm\\\":0,\\\"hidden_md\\\":0,\\\"sm_col\\\":\\\"col-sm-6\\\",\\\"xs_col\\\":\\\"\\\",\\\"custom_class\\\":\\\"\\\"}},{\\\"type\\\":\\\"sp_col\\\",\\\"className\\\":\\\"layout-column col-sm-3\\\",\\\"settings\\\":{\\\"column_type\\\":0,\\\"name\\\":\\\"bottom4\\\",\\\"hidden_xs\\\":0,\\\"hidden_sm\\\":0,\\\"hidden_md\\\":0,\\\"sm_col\\\":\\\"col-sm-6\\\",\\\"xs_col\\\":\\\"\\\",\\\"custom_class\\\":\\\"\\\"}}]},{\\\"type\\\":\\\"row\\\",\\\"layout\\\":12,\\\"settings\\\":{\\\"name\\\":\\\"Footer\\\",\\\"bg_color\\\":\\\"\\\",\\\"bg_image\\\":\\\"\\\",\\\"text_color\\\":\\\"\\\",\\\"link_color\\\":\\\"\\\",\\\"link_hover_color\\\":\\\"\\\",\\\"xs_hidden\\\":0,\\\"ms_hidden\\\":0,\\\"md_hidden\\\":0,\\\"custom_class\\\":\\\"\\\"},\\\"attr\\\":[{\\\"type\\\":\\\"sp_col\\\",\\\"className\\\":\\\"layout-column col-sm-12\\\",\\\"settings\\\":{\\\"sortableitem\\\":\\\"[object Object]\\\",\\\"custom_class\\\":\\\"\\\",\\\"md_hidden\\\":0,\\\"ms_hidden\\\":0,\\\"xs_hidden\\\":0,\\\"name\\\":\\\"footer1\\\",\\\"column_type\\\":0,\\\"hidden_xs\\\":0,\\\"hidden_sm\\\":0,\\\"hidden_md\\\":0,\\\"sm_col\\\":\\\"\\\",\\\"xs_col\\\":\\\"\\\"}}]}]\",\"menu\":\"mainmenu\",\"menu_type\":\"mega\",\"dropdown_width\":\"\",\"menu_animation\":\"menu-fade\",\"enable_body_font\":\"1\",\"body_font\":\"{\\\"fontFamily\\\":\\\"Open Sans\\\",\\\"fontWeight\\\":\\\"300\\\",\\\"fontSubset\\\":\\\"latin\\\",\\\"fontSize\\\":\\\"\\\"}\",\"enable_h1_font\":\"1\",\"h1_font\":\"{\\\"fontFamily\\\":\\\"Open Sans\\\",\\\"fontWeight\\\":\\\"800\\\",\\\"fontSubset\\\":\\\"latin\\\",\\\"fontSize\\\":\\\"\\\"}\",\"enable_h2_font\":\"1\",\"h2_font\":\"{\\\"fontFamily\\\":\\\"Open Sans\\\",\\\"fontWeight\\\":\\\"600\\\",\\\"fontSubset\\\":\\\"latin\\\",\\\"fontSize\\\":\\\"\\\"}\",\"enable_h3_font\":\"1\",\"h3_font\":\"{\\\"fontFamily\\\":\\\"Open Sans\\\",\\\"fontWeight\\\":\\\"regular\\\",\\\"fontSubset\\\":\\\"latin\\\",\\\"fontSize\\\":\\\"\\\"}\",\"enable_h4_font\":\"1\",\"h4_font\":\"{\\\"fontFamily\\\":\\\"Open Sans\\\",\\\"fontWeight\\\":\\\"regular\\\",\\\"fontSubset\\\":\\\"latin\\\",\\\"fontSize\\\":\\\"\\\"}\",\"enable_h5_font\":\"1\",\"h5_font\":\"{\\\"fontFamily\\\":\\\"Open Sans\\\",\\\"fontWeight\\\":\\\"600\\\",\\\"fontSubset\\\":\\\"latin\\\",\\\"fontSize\\\":\\\"\\\"}\",\"enable_h6_font\":\"1\",\"h6_font\":\"{\\\"fontFamily\\\":\\\"Open Sans\\\",\\\"fontWeight\\\":\\\"600\\\",\\\"fontSubset\\\":\\\"latin\\\",\\\"fontSize\\\":\\\"\\\"}\",\"enable_navigation_font\":\"0\",\"navigation_font\":\"{\\\"fontFamily\\\":\\\"ABeeZee\\\",\\\"fontWeight\\\":\\\"regular\\\",\\\"fontSubset\\\":\\\"latin\\\",\\\"fontSize\\\":\\\"\\\"}\",\"enable_custom_font\":\"0\",\"custom_font\":\"{\\\"fontFamily\\\":\\\"ABeeZee\\\",\\\"fontWeight\\\":\\\"regular\\\",\\\"fontSubset\\\":\\\"latin\\\",\\\"fontSize\\\":\\\"\\\"}\",\"custom_font_selectors\":\"\",\"before_head\":\"\",\"before_body\":\"\",\"custom_css\":\"\",\"custom_js\":\"\",\"compress_css\":\"0\",\"compress_js\":\"0\",\"exclude_js\":\"\",\"lessoption\":\"0\",\"show_post_format\":\"1\",\"commenting_engine\":\"disabled\",\"disqus_subdomain\":\"\",\"disqus_devmode\":\"0\",\"intensedebate_acc\":\"\",\"fb_appID\":\"\",\"fb_width\":\"500\",\"fb_cpp\":\"10\",\"comments_count\":\"0\",\"social_share\":\"1\"}');
/*!40000 ALTER TABLE `mdla_template_styles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_ucm_base`
--

DROP TABLE IF EXISTS `mdla_ucm_base`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_ucm_base` (
  `ucm_id` int(10) unsigned NOT NULL,
  `ucm_item_id` int(10) NOT NULL,
  `ucm_type_id` int(11) NOT NULL,
  `ucm_language_id` int(11) NOT NULL,
  PRIMARY KEY (`ucm_id`),
  KEY `idx_ucm_item_id` (`ucm_item_id`),
  KEY `idx_ucm_type_id` (`ucm_type_id`),
  KEY `idx_ucm_language_id` (`ucm_language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_ucm_base`
--

LOCK TABLES `mdla_ucm_base` WRITE;
/*!40000 ALTER TABLE `mdla_ucm_base` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_ucm_base` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_ucm_content`
--

DROP TABLE IF EXISTS `mdla_ucm_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_ucm_content` (
  `core_content_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `core_type_alias` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'FK to the content types table',
  `core_title` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `core_alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `core_body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `core_state` tinyint(1) NOT NULL DEFAULT '0',
  `core_checked_out_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00:00',
  `core_checked_out_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `core_access` int(10) unsigned NOT NULL DEFAULT '0',
  `core_params` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `core_featured` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `core_metadata` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'JSON encoded metadata properties.',
  `core_created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `core_created_by_alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `core_created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `core_modified_user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Most recent user that modified',
  `core_modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `core_language` char(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `core_publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `core_publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `core_content_item_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'ID from the individual type table',
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `core_images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `core_urls` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `core_hits` int(10) unsigned NOT NULL DEFAULT '0',
  `core_version` int(10) unsigned NOT NULL DEFAULT '1',
  `core_ordering` int(11) NOT NULL DEFAULT '0',
  `core_metakey` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `core_metadesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `core_catid` int(10) unsigned NOT NULL DEFAULT '0',
  `core_xreference` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'A reference to enable linkages to external data sets.',
  `core_type_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`core_content_id`),
  KEY `tag_idx` (`core_state`,`core_access`),
  KEY `idx_access` (`core_access`),
  KEY `idx_alias` (`core_alias`(100)),
  KEY `idx_language` (`core_language`),
  KEY `idx_title` (`core_title`(100)),
  KEY `idx_modified_time` (`core_modified_time`),
  KEY `idx_created_time` (`core_created_time`),
  KEY `idx_content_type` (`core_type_alias`(100)),
  KEY `idx_core_modified_user_id` (`core_modified_user_id`),
  KEY `idx_core_checked_out_user_id` (`core_checked_out_user_id`),
  KEY `idx_core_created_user_id` (`core_created_user_id`),
  KEY `idx_core_type_id` (`core_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Contains core content data in name spaced fields';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_ucm_content`
--

LOCK TABLES `mdla_ucm_content` WRITE;
/*!40000 ALTER TABLE `mdla_ucm_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_ucm_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_ucm_history`
--

DROP TABLE IF EXISTS `mdla_ucm_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_ucm_history` (
  `version_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ucm_item_id` int(10) unsigned NOT NULL,
  `ucm_type_id` int(10) unsigned NOT NULL,
  `version_note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Optional version name',
  `save_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editor_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `character_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Number of characters in this version.',
  `sha1_hash` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'SHA1 hash of the version_data column.',
  `version_data` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'json-encoded string of version data',
  `keep_forever` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=auto delete; 1=keep',
  PRIMARY KEY (`version_id`),
  KEY `idx_ucm_item_id` (`ucm_type_id`,`ucm_item_id`),
  KEY `idx_save_date` (`save_date`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_ucm_history`
--

LOCK TABLES `mdla_ucm_history` WRITE;
/*!40000 ALTER TABLE `mdla_ucm_history` DISABLE KEYS */;
INSERT INTO `mdla_ucm_history` VALUES (1,2,10,'Initial content','2017-05-10 05:04:12',343,558,'be28228b479aa67bad3dc1db2975232a033d5f0f','{\"id\":2,\"parent_id\":\"1\",\"lft\":\"1\",\"rgt\":2,\"level\":1,\"path\":\"joomla\",\"title\":\"Joomla\",\"alias\":\"joomla\",\"note\":\"\",\"description\":null,\"published\":1,\"checked_out\":\"0\",\"checked_out_time\":\"0000-00-00 00:00:00\",\"access\":1,\"params\":null,\"metadesc\":null,\"metakey\":null,\"metadata\":null,\"created_user_id\":\"849\",\"created_time\":\"2013-11-16 00:00:00\",\"created_by_alias\":\"\",\"modified_user_id\":\"0\",\"modified_time\":\"0000-00-00 00:00:00\",\"images\":null,\"urls\":null,\"hits\":\"0\",\"language\":\"*\",\"version\":\"1\",\"publish_up\":\"0000-00-00 00:00:00\",\"publish_down\":\"0000-00-00 00:00:00\"}',0),(2,1,1,'Initial content','2017-05-10 05:04:12',343,4539,'4f6bf8f67e89553853c3b6e8ed0a6111daaa7a2f','{\"id\":1,\"asset_id\":54,\"title\":\"Getting Started\",\"alias\":\"getting-started\",\"introtext\":\"<p>It\'s easy to get started creating your website. Knowing some of the basics will help.<\\/p>\\r\\n<h3>What is a Content Management System?<\\/h3>\\r\\n<p>A content management system is software that allows you to create and manage webpages easily by separating the creation of your content from the mechanics required to present it on the web.<\\/p>\\r\\n<p>In this site, the content is stored in a <em>database<\\/em>. The look and feel are created by a <em>template<\\/em>. Joomla! brings together the template and your content to create web pages.<\\/p>\\r\\n<h3>Logging in<\\/h3>\\r\\n<p>To login to your site use the user name and password that were created as part of the installation process. Once logged-in you will be able to create and edit articles and modify some settings.<\\/p>\\r\\n<h3>Creating an article<\\/h3>\\r\\n<p>Once you are logged-in, a new menu will be visible. To create a new article, click on the \\\"Submit Article\\\" link on that menu.<\\/p>\\r\\n<p>The new article interface gives you a lot of options, but all you need to do is add a title and put something in the content area. To make it easy to find, set the state to published.<\\/p>\\r\\n<div>You can edit an existing article by clicking on the edit icon (this only displays to users who have the right to edit).<\\/div>\\r\\n<h3>Template, site settings, and modules<\\/h3>\\r\\n<p>The look and feel of your site is controlled by a template. You can change the site name, background colour, highlights colour and more by editing the template settings. Click the \\\"Template Settings\\\" in the user menu.\\u00a0<\\/p>\\r\\n<p>The boxes around the main content of the site are called modules. \\u00a0You can modify modules on the current page by moving your cursor to the module and clicking the edit link. Always be sure to save and close any module you edit.<\\/p>\\r\\n<p>You can change some site settings such as the site name and description by clicking on the \\\"Site Settings\\\" link.<\\/p>\\r\\n<p>More advanced options for templates, site settings, modules, and more are available in the site administrator.<\\/p>\\r\\n<h3>Site and Administrator<\\/h3>\\r\\n<p>Your site actually has two separate sites. The site (also called the front end) is what visitors to your site will see. The administrator (also called the back end) is only used by people managing your site. You can access the administrator by clicking the \\\"Site Administrator\\\" link on the \\\"User Menu\\\" menu (visible once you login) or by adding \\/administrator to the end of your domain name. The same user name and password are used for both sites.<\\/p>\\r\\n<h3>Learn more<\\/h3>\\r\\n<p>There is much more to learn about how to use Joomla! to create the website you envision. You can learn much more at the <a href=\\\"https:\\/\\/docs.joomla.org\\\" target=\\\"_blank\\\">Joomla! documentation site<\\/a> and on the<a href=\\\"https:\\/\\/forum.joomla.org\\/\\\" target=\\\"_blank\\\"> Joomla! forums<\\/a>.<\\/p>\",\"fulltext\":\"\",\"state\":1,\"catid\":\"2\",\"created\":\"2013-11-16 00:00:00\",\"created_by\":\"849\",\"created_by_alias\":\"\",\"modified\":\"\",\"modified_by\":null,\"checked_out\":null,\"checked_out_time\":null,\"publish_up\":\"2013-11-16 00:00:00\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"\\\",\\\"float_fulltext\\\":\\\"\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_layout\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\"}\",\"version\":1,\"ordering\":null,\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":null,\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":\"\"}',0),(3,1,1,'','2017-05-11 17:15:10',343,4693,'4ee960b7cdf0221c44c7139a7c4535e4ee613b52','{\"id\":1,\"asset_id\":\"61\",\"title\":\"Getting Started\",\"alias\":\"getting-started\",\"introtext\":\"<p>It\'s easy to get started creating your website. Knowing some of the basics will help.<\\/p>\\r\\n<h3>What is a Content Management System?<\\/h3>\\r\\n<p>A content management system is software that allows you to create and manage webpages easily by separating the creation of your content from the mechanics required to present it on the web.<\\/p>\\r\\n<p>In this site, the content is stored in a <em>database<\\/em>. The look and feel are created by a <em>template<\\/em>. Joomla! brings together the template and your content to create web pages.<\\/p>\\r\\n<h3>Logging in<\\/h3>\\r\\n<p>To login to your site use the user name and password that were created as part of the installation process. Once logged-in you will be able to create and edit articles and modify some settings.<\\/p>\\r\\n<h3>Creating an article<\\/h3>\\r\\n<p>Once you are logged-in, a new menu will be visible. To create a new article, click on the \\\"Submit Article\\\" link on that menu.<\\/p>\\r\\n<p>The new article interface gives you a lot of options, but all you need to do is add a title and put something in the content area. To make it easy to find, set the state to published.<\\/p>\\r\\n<div>You can edit an existing article by clicking on the edit icon (this only displays to users who have the right to edit).<\\/div>\\r\\n<h3>Template, site settings, and modules<\\/h3>\\r\\n<p>The look and feel of your site is controlled by a template. You can change the site name, background colour, highlights colour and more by editing the template settings. Click the \\\"Template Settings\\\" in the user menu.<\\/p>\\r\\n<p>The boxes around the main content of the site are called modules. You can modify modules on the current page by moving your cursor to the module and clicking the edit link. Always be sure to save and close any module you edit.<\\/p>\\r\\n<p>You can change some site settings such as the site name and description by clicking on the \\\"Site Settings\\\" link.<\\/p>\\r\\n<p>More advanced options for templates, site settings, modules, and more are available in the site administrator.<\\/p>\\r\\n<h3>Site and Administrator<\\/h3>\\r\\n<p>Your site actually has two separate sites. The site (also called the front end) is what visitors to your site will see. The administrator (also called the back end) is only used by people managing your site. You can access the administrator by clicking the \\\"Site Administrator\\\" link on the \\\"User Menu\\\" menu (visible once you login) or by adding \\/administrator to the end of your domain name. The same user name and password are used for both sites.<\\/p>\\r\\n<h3>Learn more<\\/h3>\\r\\n<p>There is much more to learn about how to use Joomla! to create the website you envision. You can learn much more at the <a href=\\\"https:\\/\\/docs.joomla.org\\/\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\">Joomla! documentation site<\\/a> and on the<a href=\\\"https:\\/\\/forum.joomla.org\\/\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\"> Joomla! forums<\\/a>.<\\/p>\",\"fulltext\":\"\",\"state\":0,\"catid\":\"2\",\"created\":\"2017-05-10 05:04:12\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-11 17:15:10\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-11 17:14:43\",\"publish_up\":\"2017-05-10 05:04:12\",\"publish_down\":\"\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"\\\",\\\"float_fulltext\\\":\\\"\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\"}\",\"version\":2,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"2\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":\"\"}',0),(4,1,1,'','2017-05-11 17:15:39',343,4712,'81466f60d0595db8910045bbe64679503c579fa0','{\"id\":1,\"asset_id\":\"61\",\"title\":\"Getting Started\",\"alias\":\"getting-started\",\"introtext\":\"<p>It\'s easy to get started creating your website. Knowing some of the basics will help.<\\/p>\\r\\n<h3>What is a Content Management System?<\\/h3>\\r\\n<p>A content management system is software that allows you to create and manage webpages easily by separating the creation of your content from the mechanics required to present it on the web.<\\/p>\\r\\n<p>In this site, the content is stored in a <em>database<\\/em>. The look and feel are created by a <em>template<\\/em>. Joomla! brings together the template and your content to create web pages.<\\/p>\\r\\n<h3>Logging in<\\/h3>\\r\\n<p>To login to your site use the user name and password that were created as part of the installation process. Once logged-in you will be able to create and edit articles and modify some settings.<\\/p>\\r\\n<h3>Creating an article<\\/h3>\\r\\n<p>Once you are logged-in, a new menu will be visible. To create a new article, click on the \\\"Submit Article\\\" link on that menu.<\\/p>\\r\\n<p>The new article interface gives you a lot of options, but all you need to do is add a title and put something in the content area. To make it easy to find, set the state to published.<\\/p>\\r\\n<div>You can edit an existing article by clicking on the edit icon (this only displays to users who have the right to edit).<\\/div>\\r\\n<h3>Template, site settings, and modules<\\/h3>\\r\\n<p>The look and feel of your site is controlled by a template. You can change the site name, background colour, highlights colour and more by editing the template settings. Click the \\\"Template Settings\\\" in the user menu.<\\/p>\\r\\n<p>The boxes around the main content of the site are called modules. You can modify modules on the current page by moving your cursor to the module and clicking the edit link. Always be sure to save and close any module you edit.<\\/p>\\r\\n<p>You can change some site settings such as the site name and description by clicking on the \\\"Site Settings\\\" link.<\\/p>\\r\\n<p>More advanced options for templates, site settings, modules, and more are available in the site administrator.<\\/p>\\r\\n<h3>Site and Administrator<\\/h3>\\r\\n<p>Your site actually has two separate sites. The site (also called the front end) is what visitors to your site will see. The administrator (also called the back end) is only used by people managing your site. You can access the administrator by clicking the \\\"Site Administrator\\\" link on the \\\"User Menu\\\" menu (visible once you login) or by adding \\/administrator to the end of your domain name. The same user name and password are used for both sites.<\\/p>\\r\\n<h3>Learn more<\\/h3>\\r\\n<p>There is much more to learn about how to use Joomla! to create the website you envision. You can learn much more at the <a href=\\\"https:\\/\\/docs.joomla.org\\/\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\">Joomla! documentation site<\\/a> and on the<a href=\\\"https:\\/\\/forum.joomla.org\\/\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\"> Joomla! forums<\\/a>.<\\/p>\",\"fulltext\":\"\",\"state\":1,\"catid\":\"2\",\"created\":\"2017-05-10 05:04:12\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-11 17:15:39\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-11 17:15:10\",\"publish_up\":\"2017-05-10 05:04:12\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"\\\",\\\"float_fulltext\\\":\\\"\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\"}\",\"version\":3,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"5\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":\"\"}',0),(5,1,1,'','2017-05-11 17:16:28',343,4701,'80d610b17337a493e4806f26c5cda82d41c2329a','{\"id\":1,\"asset_id\":\"61\",\"title\":\"Home\",\"alias\":\"getting-started\",\"introtext\":\"<p>It\'s easy to get started creating your website. Knowing some of the basics will help.<\\/p>\\r\\n<h3>What is a Content Management System?<\\/h3>\\r\\n<p>A content management system is software that allows you to create and manage webpages easily by separating the creation of your content from the mechanics required to present it on the web.<\\/p>\\r\\n<p>In this site, the content is stored in a <em>database<\\/em>. The look and feel are created by a <em>template<\\/em>. Joomla! brings together the template and your content to create web pages.<\\/p>\\r\\n<h3>Logging in<\\/h3>\\r\\n<p>To login to your site use the user name and password that were created as part of the installation process. Once logged-in you will be able to create and edit articles and modify some settings.<\\/p>\\r\\n<h3>Creating an article<\\/h3>\\r\\n<p>Once you are logged-in, a new menu will be visible. To create a new article, click on the \\\"Submit Article\\\" link on that menu.<\\/p>\\r\\n<p>The new article interface gives you a lot of options, but all you need to do is add a title and put something in the content area. To make it easy to find, set the state to published.<\\/p>\\r\\n<div>You can edit an existing article by clicking on the edit icon (this only displays to users who have the right to edit).<\\/div>\\r\\n<h3>Template, site settings, and modules<\\/h3>\\r\\n<p>The look and feel of your site is controlled by a template. You can change the site name, background colour, highlights colour and more by editing the template settings. Click the \\\"Template Settings\\\" in the user menu.<\\/p>\\r\\n<p>The boxes around the main content of the site are called modules. You can modify modules on the current page by moving your cursor to the module and clicking the edit link. Always be sure to save and close any module you edit.<\\/p>\\r\\n<p>You can change some site settings such as the site name and description by clicking on the \\\"Site Settings\\\" link.<\\/p>\\r\\n<p>More advanced options for templates, site settings, modules, and more are available in the site administrator.<\\/p>\\r\\n<h3>Site and Administrator<\\/h3>\\r\\n<p>Your site actually has two separate sites. The site (also called the front end) is what visitors to your site will see. The administrator (also called the back end) is only used by people managing your site. You can access the administrator by clicking the \\\"Site Administrator\\\" link on the \\\"User Menu\\\" menu (visible once you login) or by adding \\/administrator to the end of your domain name. The same user name and password are used for both sites.<\\/p>\\r\\n<h3>Learn more<\\/h3>\\r\\n<p>There is much more to learn about how to use Joomla! to create the website you envision. You can learn much more at the <a href=\\\"https:\\/\\/docs.joomla.org\\/\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\">Joomla! documentation site<\\/a> and on the<a href=\\\"https:\\/\\/forum.joomla.org\\/\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\"> Joomla! forums<\\/a>.<\\/p>\",\"fulltext\":\"\",\"state\":1,\"catid\":\"2\",\"created\":\"2017-05-10 05:04:12\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-11 17:16:28\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-11 17:15:39\",\"publish_up\":\"2017-05-10 05:04:12\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"\\\",\\\"float_fulltext\\\":\\\"\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\"}\",\"version\":4,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"6\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":\"\"}',0),(6,1,1,'','2017-05-11 17:16:58',343,4705,'5d3362d1fb6c17c99e1611b59084efe37e4e715c','{\"id\":1,\"asset_id\":\"61\",\"title\":\"Home\",\"alias\":\"getting-started\",\"introtext\":\"\",\"fulltext\":\"\\r\\n<p>It\'s easy to get started creating your website. Knowing some of the basics will help.<\\/p>\\r\\n<h3>What is a Content Management System?<\\/h3>\\r\\n<p>A content management system is software that allows you to create and manage webpages easily by separating the creation of your content from the mechanics required to present it on the web.<\\/p>\\r\\n<p>In this site, the content is stored in a <em>database<\\/em>. The look and feel are created by a <em>template<\\/em>. Joomla! brings together the template and your content to create web pages.<\\/p>\\r\\n<h3>Logging in<\\/h3>\\r\\n<p>To login to your site use the user name and password that were created as part of the installation process. Once logged-in you will be able to create and edit articles and modify some settings.<\\/p>\\r\\n<h3>Creating an article<\\/h3>\\r\\n<p>Once you are logged-in, a new menu will be visible. To create a new article, click on the \\\"Submit Article\\\" link on that menu.<\\/p>\\r\\n<p>The new article interface gives you a lot of options, but all you need to do is add a title and put something in the content area. To make it easy to find, set the state to published.<\\/p>\\r\\n<div>You can edit an existing article by clicking on the edit icon (this only displays to users who have the right to edit).<\\/div>\\r\\n<h3>Template, site settings, and modules<\\/h3>\\r\\n<p>The look and feel of your site is controlled by a template. You can change the site name, background colour, highlights colour and more by editing the template settings. Click the \\\"Template Settings\\\" in the user menu.<\\/p>\\r\\n<p>The boxes around the main content of the site are called modules. You can modify modules on the current page by moving your cursor to the module and clicking the edit link. Always be sure to save and close any module you edit.<\\/p>\\r\\n<p>You can change some site settings such as the site name and description by clicking on the \\\"Site Settings\\\" link.<\\/p>\\r\\n<p>More advanced options for templates, site settings, modules, and more are available in the site administrator.<\\/p>\\r\\n<h3>Site and Administrator<\\/h3>\\r\\n<p>Your site actually has two separate sites. The site (also called the front end) is what visitors to your site will see. The administrator (also called the back end) is only used by people managing your site. You can access the administrator by clicking the \\\"Site Administrator\\\" link on the \\\"User Menu\\\" menu (visible once you login) or by adding \\/administrator to the end of your domain name. The same user name and password are used for both sites.<\\/p>\\r\\n<h3>Learn more<\\/h3>\\r\\n<p>There is much more to learn about how to use Joomla! to create the website you envision. You can learn much more at the <a href=\\\"https:\\/\\/docs.joomla.org\\/\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\">Joomla! documentation site<\\/a> and on the<a href=\\\"https:\\/\\/forum.joomla.org\\/\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\"> Joomla! forums<\\/a>.<\\/p>\",\"state\":1,\"catid\":\"2\",\"created\":\"2017-05-10 05:04:12\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-11 17:16:58\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-11 17:16:28\",\"publish_up\":\"2017-05-10 05:04:12\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"\\\",\\\"float_fulltext\\\":\\\"\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\"}\",\"version\":5,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"6\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":\"\"}',0),(7,1,1,'','2017-05-11 17:18:47',343,1963,'60bce09e28a9116cf4dc1cf735ca5b0d9e81b961','{\"id\":1,\"asset_id\":\"61\",\"title\":\"Home\",\"alias\":\"getting-started\",\"introtext\":\"<p>P\\u00e1gina Inicial do Projeto Mandala idealizado por professores do Instituto Federal de Educa\\u00e7\\u00e3o, Ci\\u00eancia e Tecnologia do Tocantins - Campus Avan\\u00e7ado Formoso do Araguaia<\\/p>\",\"fulltext\":\"\",\"state\":1,\"catid\":\"2\",\"created\":\"2017-05-10 05:04:12\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-11 17:18:47\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-11 17:16:58\",\"publish_up\":\"2017-05-10 05:04:12\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"\\\",\\\"float_fulltext\\\":\\\"\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\"}\",\"version\":6,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"7\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":\"\"}',0),(11,8,5,'','2017-05-17 19:36:08',343,549,'47ca052ee1efda85955a45e9a925f867957218c7','{\"id\":8,\"asset_id\":69,\"parent_id\":\"1\",\"lft\":\"11\",\"rgt\":12,\"level\":1,\"path\":null,\"extension\":\"com_content\",\"title\":\"Slides\",\"alias\":\"slides\",\"note\":\"\",\"description\":\"\",\"published\":\"1\",\"checked_out\":null,\"checked_out_time\":null,\"access\":\"1\",\"params\":\"{\\\"category_layout\\\":\\\"\\\",\\\"image\\\":\\\"\\\",\\\"image_alt\\\":\\\"\\\"}\",\"metadesc\":\"\",\"metakey\":\"\",\"metadata\":\"{\\\"author\\\":\\\"\\\",\\\"robots\\\":\\\"\\\"}\",\"created_user_id\":\"343\",\"created_time\":\"2017-05-17 19:36:08\",\"modified_user_id\":null,\"modified_time\":\"2017-05-17 19:36:08\",\"hits\":\"0\",\"language\":\"*\",\"version\":null}',0),(13,3,1,'','2017-05-17 19:38:38',343,4149,'c7c578b6894a3cc2db53183322e4618c7404be1b','{\"id\":3,\"asset_id\":70,\"title\":\"Artigo 2\",\"alias\":\"artigo-2\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"2\",\"created\":\"2017-05-17 19:38:38\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-17 19:38:38\",\"modified_by\":null,\"checked_out\":null,\"checked_out_time\":null,\"publish_up\":\"2017-05-17 19:38:38\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/fruitshop\\\\\\/bananas_2.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\"}\",\"version\":1,\"ordering\":null,\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":null,\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":\"\"}',0),(14,4,1,'','2017-05-17 19:39:20',343,4182,'8aac05102aa5631ef888863a427b671d46db3cb8','{\"id\":4,\"asset_id\":71,\"title\":\"Artigo 3\",\"alias\":\"artigo-3\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"2\",\"created\":\"2017-05-17 19:39:20\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-17 19:39:20\",\"modified_by\":null,\"checked_out\":null,\"checked_out_time\":null,\"publish_up\":\"2017-05-17 19:39:20\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/landscape\\\\\\/800px_pinnacles_western_australia.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\"}\",\"version\":1,\"ordering\":null,\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":null,\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":\"\"}',0),(15,3,1,'','2017-05-17 19:41:30',343,4168,'526dc73f99b9a6d668f3a381794d37c4d9366bee','{\"id\":3,\"asset_id\":\"70\",\"title\":\"Artigo 2\",\"alias\":\"artigo-2\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:38:38\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-17 19:41:30\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-17 19:41:24\",\"publish_up\":\"2017-05-17 19:38:38\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/fruitshop\\\\\\/bananas_2.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\"}\",\"version\":2,\"ordering\":\"1\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":\"\"}',0),(16,4,1,'','2017-05-17 19:41:42',343,4201,'42593ada53e12bba4a0359f6c52f3af93f8ec2ae','{\"id\":4,\"asset_id\":\"71\",\"title\":\"Artigo 3\",\"alias\":\"artigo-3\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:39:20\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-17 19:41:42\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-17 19:41:35\",\"publish_up\":\"2017-05-17 19:39:20\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/landscape\\\\\\/800px_pinnacles_western_australia.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\"}\",\"version\":2,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":\"\"}',0),(17,3,1,'','2017-05-17 20:04:03',343,4169,'3c6bb9871160da6a99af079c21f17b96218ac7cc','{\"id\":3,\"asset_id\":\"70\",\"title\":\"Artigo 2\",\"alias\":\"artigo-2\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:38:38\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-17 20:04:03\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-17 20:03:46\",\"publish_up\":\"2017-05-17 19:38:38\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/fruitshop\\\\\\/bananas_2.jpg\\\",\\\"float_fulltext\\\":\\\"right\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\"}\",\"version\":3,\"ordering\":\"1\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":\"\"}',0),(19,2,1,'','2017-05-20 20:36:39',343,4391,'53cef7fa19e1505a096f98e2b8c960940b10b3e3','{\"id\":2,\"asset_id\":\"67\",\"title\":\"Artigo 1\",\"alias\":\"artigo-1\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:20:23\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-20 20:36:39\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-20 20:36:16\",\"publish_up\":\"2017-05-17 19:20:23\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/8b9f88c0d2dd516c176c760f606f6916.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":10,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":\"\"}',0),(20,1,1,'','2017-05-21 00:49:10',343,2168,'7140fb063e048c8cd0e2761f48bef62678087e65','{\"id\":1,\"asset_id\":\"61\",\"title\":\"Home\",\"alias\":\"getting-started\",\"introtext\":\"<p>P\\u00e1gina Inicial do Projeto Mandala idealizado por professores do Instituto Federal de Educa\\u00e7\\u00e3o, Ci\\u00eancia e Tecnologia do Tocantins - Campus Avan\\u00e7ado Formoso do Araguaia<\\/p>\",\"fulltext\":\"\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-10 05:04:12\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 00:49:10\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 00:48:55\",\"publish_up\":\"2017-05-10 05:04:12\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"\\\",\\\"float_fulltext\\\":\\\"\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":9,\"ordering\":\"2\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"146\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"0\",\"language\":\"*\",\"xreference\":\"\"}',0),(21,2,1,'','2017-05-21 01:08:34',343,4391,'0657720b19fd75d38960c01dec3f33fa8236e77a','{\"id\":2,\"asset_id\":\"67\",\"title\":\"Artigo 1\",\"alias\":\"artigo-1\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:20:23\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 01:08:34\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 01:08:20\",\"publish_up\":\"2017-05-17 19:20:23\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/8b9f88c0d2dd516c176c760f606f6916.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":12,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0),(22,2,1,'','2017-05-21 01:11:46',343,4400,'15c5df4ab2e9986860047ab8b549c4ce9ab035a7','{\"id\":2,\"asset_id\":\"67\",\"title\":\"Artigo 1\",\"alias\":\"artigo-1\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:20:23\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 01:11:46\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 01:11:13\",\"publish_up\":\"2017-05-17 19:20:23\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/8b9f88c0d2dd516c176c760f606f6916.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"Leia mais\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":13,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0),(23,2,1,'','2017-05-21 01:12:40',343,4407,'735a63186b55a2bb295a09099b294bf78d759fb3','{\"id\":2,\"asset_id\":\"67\",\"title\":\"Projeto Mandala\",\"alias\":\"artigo-1\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:20:23\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 01:12:40\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 01:11:46\",\"publish_up\":\"2017-05-17 19:20:23\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/8b9f88c0d2dd516c176c760f606f6916.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"Leia mais\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":14,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0),(24,3,1,'','2017-05-21 01:13:23',343,4393,'c2daeb317266f2bb48ec713ffaea29d5150631c1','{\"id\":3,\"asset_id\":\"70\",\"title\":\"Agricultura Familiar\",\"alias\":\"artigo-2\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:38:38\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 01:13:23\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 01:13:04\",\"publish_up\":\"2017-05-17 19:38:38\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/fruitshop\\\\\\/bananas_2.jpg\\\",\\\"float_fulltext\\\":\\\"right\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"Leia mais\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":4,\"ordering\":\"1\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0),(25,4,1,'','2017-05-21 01:14:25',343,4420,'ddc6ded6ddbf750564afdc3b5589d04ebd6fea15','{\"id\":4,\"asset_id\":\"71\",\"title\":\"Projeto Mandala\",\"alias\":\"artigo-3\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:39:20\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 01:14:25\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 01:13:48\",\"publish_up\":\"2017-05-17 19:39:20\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/landscape\\\\\\/800px_pinnacles_western_australia.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"Leia mais\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":3,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0),(26,2,1,'','2017-05-21 01:14:42',343,4416,'130a5f35248ff5a3a72c5c627e58d0c4a247c23a','{\"id\":2,\"asset_id\":\"67\",\"title\":\"Plantio Sustent\\u00e1vel\",\"alias\":\"artigo-1\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:20:23\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 01:14:42\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 01:14:35\",\"publish_up\":\"2017-05-17 19:20:23\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/8b9f88c0d2dd516c176c760f606f6916.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"Leia mais\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":16,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0),(27,4,1,'','2017-05-21 01:44:34',343,4469,'3cf3f138e0d7adaaa134d7bad5ef351120efd204','{\"id\":4,\"asset_id\":\"71\",\"title\":\"Projeto Mandala\",\"alias\":\"artigo-3\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:39:20\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 01:44:34\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 01:43:35\",\"publish_up\":\"2017-05-17 19:39:20\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/5577708_x720.jpg\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/landscape\\\\\\/800px_pinnacles_western_australia.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"Leia mais\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":4,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0),(28,4,1,'','2017-05-21 01:45:25',343,4473,'9a9b49eed6298c7e49b66d03e1b2ebca6bed75ba','{\"id\":4,\"asset_id\":\"71\",\"title\":\"Projeto Mandala\",\"alias\":\"artigo-3\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:39:20\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 01:45:25\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 01:44:34\",\"publish_up\":\"2017-05-17 19:39:20\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/5577708_x720.jpg\\\",\\\"float_intro\\\":\\\"none\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/landscape\\\\\\/800px_pinnacles_western_australia.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"Leia mais\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":5,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0),(29,4,1,'','2017-05-21 01:47:49',343,4473,'c63d6bd466fdee42890dde12631a9f6dabb1bf9e','{\"id\":4,\"asset_id\":\"71\",\"title\":\"Projeto Mandala\",\"alias\":\"artigo-3\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:39:20\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 01:47:49\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 01:45:25\",\"publish_up\":\"2017-05-17 19:39:20\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/4756981_x720.jpg\\\",\\\"float_intro\\\":\\\"none\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/landscape\\\\\\/800px_pinnacles_western_australia.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"Leia mais\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":6,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0),(30,3,1,'','2017-05-21 01:51:06',343,4461,'4f1db6d6167a8d658c8a158c26ec1b28c4eb4ee7','{\"id\":3,\"asset_id\":\"70\",\"title\":\"Agricultura Familiar\",\"alias\":\"artigo-2\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:38:38\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 01:51:06\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 01:50:40\",\"publish_up\":\"2017-05-17 19:38:38\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/agricultura-familiar-2-1140x641.jpg\\\",\\\"float_intro\\\":\\\"\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/fruitshop\\\\\\/bananas_2.jpg\\\",\\\"float_fulltext\\\":\\\"right\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"Leia mais\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":5,\"ordering\":\"1\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"4\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0),(31,3,1,'','2017-05-21 01:51:14',343,4465,'6409b21975921f9d2094c9577de2285263406d32','{\"id\":3,\"asset_id\":\"70\",\"title\":\"Agricultura Familiar\",\"alias\":\"artigo-2\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:38:38\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 01:51:14\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 01:51:06\",\"publish_up\":\"2017-05-17 19:38:38\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/agricultura-familiar-2-1140x641.jpg\\\",\\\"float_intro\\\":\\\"none\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/fruitshop\\\\\\/bananas_2.jpg\\\",\\\"float_fulltext\\\":\\\"right\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"Leia mais\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":6,\"ordering\":\"1\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"4\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0),(32,2,1,'','2017-05-21 01:51:57',343,4464,'1db51fa7d411cd0228ebe7fc746e66471353a30a','{\"id\":2,\"asset_id\":\"67\",\"title\":\"Plantio Sustent\\u00e1vel\",\"alias\":\"artigo-1\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:20:23\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 01:51:57\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 01:51:34\",\"publish_up\":\"2017-05-17 19:20:23\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/AO-9606.jpg\\\",\\\"float_intro\\\":\\\"none\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/8b9f88c0d2dd516c176c760f606f6916.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"Leia mais\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":17,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0),(33,2,1,'','2017-05-21 01:53:56',343,4441,'a3af4fa1bbe899f671b12e81403ceaddce4a637a','{\"id\":2,\"asset_id\":\"67\",\"title\":\"Plantio Sustent\\u00e1vel\",\"alias\":\"artigo-1\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:20:23\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 01:53:56\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 01:53:26\",\"publish_up\":\"2017-05-17 19:20:23\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"images\\\\\\/imagem2.jpg\\\",\\\"float_intro\\\":\\\"none\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/8b9f88c0d2dd516c176c760f606f6916.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"Leia mais\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":18,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0),(34,2,1,'','2017-05-21 01:54:44',343,4496,'718d429039217e3bf866fbdbcf40717d9fc1f3d8','{\"id\":2,\"asset_id\":\"67\",\"title\":\"Plantio Sustent\\u00e1vel\",\"alias\":\"artigo-1\",\"introtext\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in ipsum leo. Phasellus id nisl dapibus, sagittis lacus id, fringilla nibh. Donec vitae turpis libero.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:20:23\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 01:54:44\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 01:53:56\",\"publish_up\":\"2017-05-17 19:20:23\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/a_view_to_fagaras_hdr_by_scorpionentity.jpg\\\",\\\"float_intro\\\":\\\"none\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/8b9f88c0d2dd516c176c760f606f6916.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"Leia mais\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":19,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0),(35,2,1,'','2017-05-21 02:00:25',343,4468,'5f8e25a28ca536021ee7b14467b531eb9095b962','{\"id\":2,\"asset_id\":\"67\",\"title\":\"Plantio Sustent\\u00e1vel\",\"alias\":\"artigo-1\",\"introtext\":\"<p>Texto introdut\\u00f3rio referente ao projeto de agricultura sustent\\u00e1vel implantado nas depend\\u00eancias do IFTO CA Formoso do Araguaia.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:20:23\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 02:00:25\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 01:54:44\",\"publish_up\":\"2017-05-17 19:20:23\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/a_view_to_fagaras_hdr_by_scorpionentity.jpg\\\",\\\"float_intro\\\":\\\"none\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/8b9f88c0d2dd516c176c760f606f6916.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"Leia mais\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":20,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0),(36,3,1,'','2017-05-21 02:01:13',343,4468,'570cbc7a5b6344add73b725f564685c8fda4d405','{\"id\":3,\"asset_id\":\"70\",\"title\":\"Agricultura Familiar\",\"alias\":\"artigo-2\",\"introtext\":\"<p>Texto introdut\\u00f3rio referente ao projeto de agricultura sustent\\u00e1vel implantado nas depend\\u00eancias do Instituto Federal\\u00a0do Tocantins CA Formoso do Araguaia.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:38:38\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 02:01:13\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 02:00:38\",\"publish_up\":\"2017-05-17 19:38:38\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/agricultura-familiar-2-1140x641.jpg\\\",\\\"float_intro\\\":\\\"none\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/fruitshop\\\\\\/bananas_2.jpg\\\",\\\"float_fulltext\\\":\\\"right\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"Leia mais\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":8,\"ordering\":\"1\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"4\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0),(37,2,1,'','2017-05-21 02:01:27',343,4499,'0e362bc3b9e8e41b10b1c90aff444e96ca665eac','{\"id\":2,\"asset_id\":\"67\",\"title\":\"Plantio Sustent\\u00e1vel\",\"alias\":\"artigo-1\",\"introtext\":\"<p>Texto introdut\\u00f3rio referente ao projeto de agricultura sustent\\u00e1vel implantado nas depend\\u00eancias do Instituto Federal\\u00a0do Tocantins CA Formoso do Araguaia.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:20:23\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 02:01:27\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 02:01:17\",\"publish_up\":\"2017-05-17 19:20:23\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/a_view_to_fagaras_hdr_by_scorpionentity.jpg\\\",\\\"float_intro\\\":\\\"none\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/8b9f88c0d2dd516c176c760f606f6916.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"Leia mais\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":22,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0),(38,4,1,'','2017-05-21 02:01:41',343,4476,'259f93f8b137b3842b18ed1c4cb96f31c95293e7','{\"id\":4,\"asset_id\":\"71\",\"title\":\"Projeto Mandala\",\"alias\":\"artigo-3\",\"introtext\":\"<p>Texto introdut\\u00f3rio referente ao projeto de agricultura sustent\\u00e1vel implantado nas depend\\u00eancias do Instituto Federal\\u00a0do Tocantins CA Formoso do Araguaia.<\\/p>\\r\\n\",\"fulltext\":\"\\r\\n<p>Maecenas et erat at justo commodo imperdiet sed nec est. Curabitur maximus lobortis sapien. Curabitur tincidunt lectus at ex sagittis, et mattis mi lacinia. Nunc suscipit nisi et nisl laoreet, eu ullamcorper lectus pretium. Nullam dapibus vitae tortor id pharetra. Sed eleifend maximus vulputate. Integer convallis rhoncus egestas. Nullam mattis eros vel ex imperdiet gravida. Integer iaculis nisi sit amet pretium tempus. Aliquam egestas eu risus sit amet posuere. Quisque vitae pharetra sem, ac lobortis sem. Cras sed nisi quam. Vivamus suscipit enim nulla, lobortis condimentum lectus ultrices non.<\\/p>\\r\\n<p>Curabitur ut eros faucibus, viverra lorem vitae, malesuada mauris. Phasellus non orci mattis, tristique nunc sed, posuere velit. Morbi consequat nunc at venenatis scelerisque. Fusce ullamcorper, urna eget dignissim tincidunt, risus lorem dictum erat, a semper erat elit at turpis. In hac habitasse platea dictumst. Mauris ac lorem in lacus bibendum aliquam. Cras vel libero quis dui consequat viverra ac tristique ante. Pellentesque imperdiet ipsum vitae tortor facilisis, vel sodales dolor ornare. Nullam ut ipsum ornare dui auctor venenatis in sed ante. Fusce nulla sem, gravida quis imperdiet vulputate, scelerisque ac metus. Nullam ut tortor hendrerit, pharetra magna vitae, placerat orci. Integer sagittis velit vel nisl molestie aliquet. Cras purus augue, vehicula ac euismod vitae, porttitor rutrum enim. Nulla auctor rhoncus enim, tristique pharetra mauris finibus nec. Nam eget mi mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<\\/p>\\r\\n<p>Duis tempor erat vitae efficitur lobortis. Integer eu ligula nec elit pretium aliquam. Sed maximus risus nibh, sit amet pulvinar urna tempor quis. In tempor vehicula eleifend. Suspendisse tempus dolor non tincidunt dictum. Curabitur imperdiet lobortis turpis, in consectetur tortor scelerisque at. Maecenas a eros a sem porttitor commodo lacinia at velit. Vestibulum sodales commodo euismod. Praesent sit amet rutrum enim. Nunc interdum vehicula ex sit amet auctor. In ultrices nec orci nec finibus. Nulla facilisi. Sed et aliquam urna, vitae euismod est.<\\/p>\",\"state\":1,\"catid\":\"8\",\"created\":\"2017-05-17 19:39:20\",\"created_by\":\"343\",\"created_by_alias\":\"\",\"modified\":\"2017-05-21 02:01:41\",\"modified_by\":\"343\",\"checked_out\":\"343\",\"checked_out_time\":\"2017-05-21 02:01:32\",\"publish_up\":\"2017-05-17 19:39:20\",\"publish_down\":\"0000-00-00 00:00:00\",\"images\":\"{\\\"image_intro\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/4756981_x720.jpg\\\",\\\"float_intro\\\":\\\"none\\\",\\\"image_intro_alt\\\":\\\"\\\",\\\"image_intro_caption\\\":\\\"\\\",\\\"image_fulltext\\\":\\\"images\\\\\\/sampledata\\\\\\/parks\\\\\\/landscape\\\\\\/800px_pinnacles_western_australia.jpg\\\",\\\"float_fulltext\\\":\\\"left\\\",\\\"image_fulltext_alt\\\":\\\"\\\",\\\"image_fulltext_caption\\\":\\\"\\\"}\",\"urls\":\"{\\\"urla\\\":false,\\\"urlatext\\\":\\\"\\\",\\\"targeta\\\":\\\"\\\",\\\"urlb\\\":false,\\\"urlbtext\\\":\\\"\\\",\\\"targetb\\\":\\\"\\\",\\\"urlc\\\":false,\\\"urlctext\\\":\\\"\\\",\\\"targetc\\\":\\\"\\\"}\",\"attribs\":\"{\\\"article_layout\\\":\\\"\\\",\\\"show_title\\\":\\\"\\\",\\\"link_titles\\\":\\\"\\\",\\\"show_tags\\\":\\\"\\\",\\\"show_intro\\\":\\\"\\\",\\\"info_block_position\\\":\\\"\\\",\\\"info_block_show_title\\\":\\\"\\\",\\\"show_category\\\":\\\"\\\",\\\"link_category\\\":\\\"\\\",\\\"show_parent_category\\\":\\\"\\\",\\\"link_parent_category\\\":\\\"\\\",\\\"show_associations\\\":\\\"\\\",\\\"show_author\\\":\\\"\\\",\\\"link_author\\\":\\\"\\\",\\\"show_create_date\\\":\\\"\\\",\\\"show_modify_date\\\":\\\"\\\",\\\"show_publish_date\\\":\\\"\\\",\\\"show_item_navigation\\\":\\\"\\\",\\\"show_icons\\\":\\\"\\\",\\\"show_print_icon\\\":\\\"\\\",\\\"show_email_icon\\\":\\\"\\\",\\\"show_vote\\\":\\\"\\\",\\\"show_hits\\\":\\\"\\\",\\\"show_noauth\\\":\\\"\\\",\\\"urls_position\\\":\\\"\\\",\\\"alternative_readmore\\\":\\\"Leia mais\\\",\\\"article_page_title\\\":\\\"\\\",\\\"show_publishing_options\\\":\\\"\\\",\\\"show_article_options\\\":\\\"\\\",\\\"show_urls_images_backend\\\":\\\"\\\",\\\"show_urls_images_frontend\\\":\\\"\\\",\\\"spfeatured_image\\\":\\\"\\\",\\\"post_format\\\":\\\"standard\\\",\\\"gallery\\\":\\\"\\\",\\\"audio\\\":\\\"\\\",\\\"video\\\":\\\"\\\",\\\"link_title\\\":\\\"\\\",\\\"link_url\\\":\\\"\\\",\\\"quote_text\\\":\\\"\\\",\\\"quote_author\\\":\\\"\\\",\\\"post_status\\\":\\\"\\\"}\",\"version\":8,\"ordering\":\"0\",\"metakey\":\"\",\"metadesc\":\"\",\"access\":\"1\",\"hits\":\"0\",\"metadata\":\"{\\\"robots\\\":\\\"\\\",\\\"author\\\":\\\"\\\",\\\"rights\\\":\\\"\\\",\\\"xreference\\\":\\\"\\\"}\",\"featured\":\"1\",\"language\":\"*\",\"xreference\":\"\"}',0);
/*!40000 ALTER TABLE `mdla_ucm_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_update_sites`
--

DROP TABLE IF EXISTS `mdla_update_sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_update_sites` (
  `update_site_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` int(11) DEFAULT '0',
  `last_check_timestamp` bigint(20) DEFAULT '0',
  `extra_query` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT '',
  PRIMARY KEY (`update_site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Update Sites';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_update_sites`
--

LOCK TABLES `mdla_update_sites` WRITE;
/*!40000 ALTER TABLE `mdla_update_sites` DISABLE KEYS */;
INSERT INTO `mdla_update_sites` VALUES (1,'Joomla! Core','collection','https://update.joomla.org/core/list.xml',1,1496854714,''),(2,'Accredited Joomla! Translations','collection','https://update.joomla.org/language/translationlist_3.xml',1,1495500702,''),(3,'Joomla! Update Component Update Site','extension','https://update.joomla.org/core/extensions/com_joomlaupdate.xml',1,1495500706,''),(4,'JoomEXP Update Server','extension','http://project.joomexp.com/nhk/testupdate/extension.xml',0,0,''),(5,'Helix3 - Ajax','extension','http://www.joomshaper.com/updates/plg-ajax-helix3.xml',1,1495500713,''),(6,'System - Helix3 Framework','extension','http://www.joomshaper.com/updates/plg-system-helix3.xml',1,1495500717,''),(7,'shaper_helix3','template','http://www.joomshaper.com/updates/tpl_helix3.xml',1,1495500717,''),(8,'Articles Newsflash (Advanced) module Updates','extension','http://joomlacode.org/gf/project/tm_art_news_adv/scmsvn/?action=browse&path=%2F%2Acheckout%2A%2Ftrunk%2Fextension.xml',1,1495500720,''),(9,'JoomSpirit Slider','extension','http://www.template-joomspirit.com/update-joomspirit-slider/update-joomspirit-slider.xml',1,1495500728,'');
/*!40000 ALTER TABLE `mdla_update_sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_update_sites_extensions`
--

DROP TABLE IF EXISTS `mdla_update_sites_extensions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_update_sites_extensions` (
  `update_site_id` int(11) NOT NULL DEFAULT '0',
  `extension_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`update_site_id`,`extension_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Links extensions to update sites';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_update_sites_extensions`
--

LOCK TABLES `mdla_update_sites_extensions` WRITE;
/*!40000 ALTER TABLE `mdla_update_sites_extensions` DISABLE KEYS */;
INSERT INTO `mdla_update_sites_extensions` VALUES (1,700),(2,802),(2,10002),(3,28),(4,10007),(5,10009),(6,10010),(7,10011),(8,10012),(9,10013);
/*!40000 ALTER TABLE `mdla_update_sites_extensions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_updates`
--

DROP TABLE IF EXISTS `mdla_updates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_updates` (
  `update_id` int(11) NOT NULL AUTO_INCREMENT,
  `update_site_id` int(11) DEFAULT '0',
  `extension_id` int(11) DEFAULT '0',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `element` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `folder` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `client_id` tinyint(3) DEFAULT '0',
  `version` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detailsurl` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `infourl` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_query` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT '',
  PRIMARY KEY (`update_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Available Updates';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_updates`
--

LOCK TABLES `mdla_updates` WRITE;
/*!40000 ALTER TABLE `mdla_updates` DISABLE KEYS */;
INSERT INTO `mdla_updates` VALUES (1,1,700,'Joomla','','joomla','file','',0,'3.7.1','','https://update.joomla.org/core/sts/extension_sts.xml','',''),(2,2,0,'Armenian','','pkg_hy-AM','package','',0,'3.4.4.1','','https://update.joomla.org/language/details3/hy-AM_details.xml','',''),(3,2,0,'Malay','','pkg_ms-MY','package','',0,'3.4.1.2','','https://update.joomla.org/language/details3/ms-MY_details.xml','',''),(4,2,0,'Romanian','','pkg_ro-RO','package','',0,'3.7.0.1','','https://update.joomla.org/language/details3/ro-RO_details.xml','',''),(5,2,0,'Flemish','','pkg_nl-BE','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/nl-BE_details.xml','',''),(6,2,0,'Chinese Traditional','','pkg_zh-TW','package','',0,'3.7.0.2','','https://update.joomla.org/language/details3/zh-TW_details.xml','',''),(7,2,0,'French','','pkg_fr-FR','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/fr-FR_details.xml','',''),(8,2,0,'Galician','','pkg_gl-ES','package','',0,'3.3.1.2','','https://update.joomla.org/language/details3/gl-ES_details.xml','',''),(9,2,0,'Georgian','','pkg_ka-GE','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/ka-GE_details.xml','',''),(10,2,0,'Greek','','pkg_el-GR','package','',0,'3.6.3.2','','https://update.joomla.org/language/details3/el-GR_details.xml','',''),(11,2,0,'Japanese','','pkg_ja-JP','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/ja-JP_details.xml','',''),(12,2,0,'Hebrew','','pkg_he-IL','package','',0,'3.1.1.1','','https://update.joomla.org/language/details3/he-IL_details.xml','',''),(13,2,0,'Hungarian','','pkg_hu-HU','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/hu-HU_details.xml','',''),(14,2,0,'Afrikaans','','pkg_af-ZA','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/af-ZA_details.xml','',''),(15,2,0,'Arabic Unitag','','pkg_ar-AA','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/ar-AA_details.xml','',''),(16,2,0,'Belarusian','','pkg_be-BY','package','',0,'3.2.1.2','','https://update.joomla.org/language/details3/be-BY_details.xml','',''),(17,2,0,'Bulgarian','','pkg_bg-BG','package','',0,'3.6.5.2','','https://update.joomla.org/language/details3/bg-BG_details.xml','',''),(18,2,0,'Catalan','','pkg_ca-ES','package','',0,'3.7.0.1','','https://update.joomla.org/language/details3/ca-ES_details.xml','',''),(19,2,0,'Chinese Simplified','','pkg_zh-CN','package','',0,'3.4.1.2','','https://update.joomla.org/language/details3/zh-CN_details.xml','',''),(20,2,0,'Croatian','','pkg_hr-HR','package','',0,'3.6.5.1','','https://update.joomla.org/language/details3/hr-HR_details.xml','',''),(21,2,0,'Czech','','pkg_cs-CZ','package','',0,'3.6.5.1','','https://update.joomla.org/language/details3/cs-CZ_details.xml','',''),(22,2,0,'Danish','','pkg_da-DK','package','',0,'3.7.0.3','','https://update.joomla.org/language/details3/da-DK_details.xml','',''),(23,2,0,'Dutch','','pkg_nl-NL','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/nl-NL_details.xml','',''),(24,2,0,'Estonian','','pkg_et-EE','package','',0,'3.7.0.1','','https://update.joomla.org/language/details3/et-EE_details.xml','',''),(25,2,0,'Italian','','pkg_it-IT','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/it-IT_details.xml','',''),(26,2,0,'Khmer','','pkg_km-KH','package','',0,'3.4.5.1','','https://update.joomla.org/language/details3/km-KH_details.xml','',''),(27,2,0,'Korean','','pkg_ko-KR','package','',0,'3.7.1.2','','https://update.joomla.org/language/details3/ko-KR_details.xml','',''),(28,2,0,'Latvian','','pkg_lv-LV','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/lv-LV_details.xml','',''),(29,2,0,'Macedonian','','pkg_mk-MK','package','',0,'3.6.5.1','','https://update.joomla.org/language/details3/mk-MK_details.xml','',''),(30,2,0,'Norwegian Bokmal','','pkg_nb-NO','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/nb-NO_details.xml','',''),(31,2,0,'Norwegian Nynorsk','','pkg_nn-NO','package','',0,'3.4.2.1','','https://update.joomla.org/language/details3/nn-NO_details.xml','',''),(32,2,0,'Persian','','pkg_fa-IR','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/fa-IR_details.xml','',''),(33,2,0,'Polish','','pkg_pl-PL','package','',0,'3.7.0.3','','https://update.joomla.org/language/details3/pl-PL_details.xml','',''),(34,2,0,'Portuguese','','pkg_pt-PT','package','',0,'3.7.0.1','','https://update.joomla.org/language/details3/pt-PT_details.xml','',''),(35,2,0,'Russian','','pkg_ru-RU','package','',0,'3.7.0.1','','https://update.joomla.org/language/details3/ru-RU_details.xml','',''),(36,2,0,'English AU','','pkg_en-AU','package','',0,'3.6.5.1','','https://update.joomla.org/language/details3/en-AU_details.xml','',''),(37,2,0,'Slovak','','pkg_sk-SK','package','',0,'3.7.0.2','','https://update.joomla.org/language/details3/sk-SK_details.xml','',''),(38,2,0,'English US','','pkg_en-US','package','',0,'3.6.5.1','','https://update.joomla.org/language/details3/en-US_details.xml','',''),(39,2,0,'Swedish','','pkg_sv-SE','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/sv-SE_details.xml','',''),(40,2,0,'Syriac','','pkg_sy-IQ','package','',0,'3.4.5.1','','https://update.joomla.org/language/details3/sy-IQ_details.xml','',''),(41,2,0,'Tamil','','pkg_ta-IN','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/ta-IN_details.xml','',''),(42,2,0,'Thai','','pkg_th-TH','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/th-TH_details.xml','',''),(43,2,0,'Turkish','','pkg_tr-TR','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/tr-TR_details.xml','',''),(44,2,0,'Ukrainian','','pkg_uk-UA','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/uk-UA_details.xml','',''),(45,2,0,'Uyghur','','pkg_ug-CN','package','',0,'3.3.0.2','','https://update.joomla.org/language/details3/ug-CN_details.xml','',''),(46,2,0,'Albanian','','pkg_sq-AL','package','',0,'3.1.1.2','','https://update.joomla.org/language/details3/sq-AL_details.xml','',''),(47,2,0,'Basque','','pkg_eu-ES','package','',0,'3.6.5.1','','https://update.joomla.org/language/details3/eu-ES_details.xml','',''),(48,2,0,'Hindi','','pkg_hi-IN','package','',0,'3.3.6.2','','https://update.joomla.org/language/details3/hi-IN_details.xml','',''),(49,2,0,'German DE','','pkg_de-DE','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/de-DE_details.xml','',''),(50,2,0,'Serbian Latin','','pkg_sr-YU','package','',0,'3.7.0.1','','https://update.joomla.org/language/details3/sr-YU_details.xml','',''),(51,2,0,'Spanish','','pkg_es-ES','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/es-ES_details.xml','',''),(52,2,0,'Bosnian','','pkg_bs-BA','package','',0,'3.6.5.1','','https://update.joomla.org/language/details3/bs-BA_details.xml','',''),(53,2,0,'Serbian Cyrillic','','pkg_sr-RS','package','',0,'3.7.0.1','','https://update.joomla.org/language/details3/sr-RS_details.xml','',''),(54,2,0,'Vietnamese','','pkg_vi-VN','package','',0,'3.2.1.2','','https://update.joomla.org/language/details3/vi-VN_details.xml','',''),(55,2,0,'Bahasa Indonesia','','pkg_id-ID','package','',0,'3.6.2.1','','https://update.joomla.org/language/details3/id-ID_details.xml','',''),(56,2,0,'Finnish','','pkg_fi-FI','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/fi-FI_details.xml','',''),(57,2,0,'Swahili','','pkg_sw-KE','package','',0,'3.6.5.1','','https://update.joomla.org/language/details3/sw-KE_details.xml','',''),(58,2,0,'Montenegrin','','pkg_srp-ME','package','',0,'3.3.1.2','','https://update.joomla.org/language/details3/srp-ME_details.xml','',''),(59,2,0,'English CA','','pkg_en-CA','package','',0,'3.6.5.1','','https://update.joomla.org/language/details3/en-CA_details.xml','',''),(60,2,0,'French CA','','pkg_fr-CA','package','',0,'3.6.5.1','','https://update.joomla.org/language/details3/fr-CA_details.xml','',''),(61,2,0,'Welsh','','pkg_cy-GB','package','',0,'3.7.0.1','','https://update.joomla.org/language/details3/cy-GB_details.xml','',''),(62,2,0,'Sinhala','','pkg_si-LK','package','',0,'3.3.1.2','','https://update.joomla.org/language/details3/si-LK_details.xml','',''),(63,2,0,'Dari Persian','','pkg_prs-AF','package','',0,'3.4.4.2','','https://update.joomla.org/language/details3/prs-AF_details.xml','',''),(64,2,0,'Turkmen','','pkg_tk-TM','package','',0,'3.5.0.2','','https://update.joomla.org/language/details3/tk-TM_details.xml','',''),(65,2,0,'Irish','','pkg_ga-IE','package','',0,'3.7.0.1','','https://update.joomla.org/language/details3/ga-IE_details.xml','',''),(66,2,0,'Dzongkha','','pkg_dz-BT','package','',0,'3.6.2.1','','https://update.joomla.org/language/details3/dz-BT_details.xml','',''),(67,2,0,'Slovenian','','pkg_sl-SI','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/sl-SI_details.xml','',''),(68,2,0,'Spanish CO','','pkg_es-CO','package','',0,'3.7.0.1','','https://update.joomla.org/language/details3/es-CO_details.xml','',''),(69,2,0,'German CH','','pkg_de-CH','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/de-CH_details.xml','',''),(70,2,0,'German AT','','pkg_de-AT','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/de-AT_details.xml','',''),(71,2,0,'German LI','','pkg_de-LI','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/de-LI_details.xml','',''),(72,2,0,'German LU','','pkg_de-LU','package','',0,'3.7.1.1','','https://update.joomla.org/language/details3/de-LU_details.xml','',''),(73,2,0,'English NZ','','pkg_en-NZ','package','',0,'3.6.5.1','','https://update.joomla.org/language/details3/en-NZ_details.xml','',''),(74,1,0,'Joomla','','joomla','file','',0,'3.7.2','','https://update.joomla.org/core/sts/extension_sts.xml','',''),(75,1,0,'Joomla','','joomla','file','',0,'3.7.2','','https://update.joomla.org/core/sts/extension_sts.xml','','');
/*!40000 ALTER TABLE `mdla_updates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_user_keys`
--

DROP TABLE IF EXISTS `mdla_user_keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_user_keys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `series` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invalid` tinyint(4) NOT NULL,
  `time` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uastring` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `series` (`series`),
  UNIQUE KEY `series_2` (`series`),
  UNIQUE KEY `series_3` (`series`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_user_keys`
--

LOCK TABLES `mdla_user_keys` WRITE;
/*!40000 ALTER TABLE `mdla_user_keys` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_user_keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_user_notes`
--

DROP TABLE IF EXISTS `mdla_user_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_user_notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_user_id` int(10) unsigned NOT NULL,
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `review_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_category_id` (`catid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_user_notes`
--

LOCK TABLES `mdla_user_notes` WRITE;
/*!40000 ALTER TABLE `mdla_user_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_user_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_user_profiles`
--

DROP TABLE IF EXISTS `mdla_user_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_user_profiles` (
  `user_id` int(11) NOT NULL,
  `profile_key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `idx_user_id_profile_key` (`user_id`,`profile_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Simple user profile storage table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_user_profiles`
--

LOCK TABLES `mdla_user_profiles` WRITE;
/*!40000 ALTER TABLE `mdla_user_profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdla_user_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_user_usergroup_map`
--

DROP TABLE IF EXISTS `mdla_user_usergroup_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_user_usergroup_map` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign Key to #__users.id',
  `group_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign Key to #__usergroups.id',
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_user_usergroup_map`
--

LOCK TABLES `mdla_user_usergroup_map` WRITE;
/*!40000 ALTER TABLE `mdla_user_usergroup_map` DISABLE KEYS */;
INSERT INTO `mdla_user_usergroup_map` VALUES (343,8);
/*!40000 ALTER TABLE `mdla_user_usergroup_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_usergroups`
--

DROP TABLE IF EXISTS `mdla_usergroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_usergroups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Adjacency List Reference Id',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_usergroup_parent_title_lookup` (`parent_id`,`title`),
  KEY `idx_usergroup_title_lookup` (`title`),
  KEY `idx_usergroup_adjacency_lookup` (`parent_id`),
  KEY `idx_usergroup_nested_set_lookup` (`lft`,`rgt`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_usergroups`
--

LOCK TABLES `mdla_usergroups` WRITE;
/*!40000 ALTER TABLE `mdla_usergroups` DISABLE KEYS */;
INSERT INTO `mdla_usergroups` VALUES (1,0,1,18,'Public'),(2,1,8,15,'Registered'),(3,2,9,14,'Author'),(4,3,10,13,'Editor'),(5,4,11,12,'Publisher'),(6,1,4,7,'Manager'),(7,6,5,6,'Administrator'),(8,1,16,17,'Super Users'),(9,1,2,3,'Guest');
/*!40000 ALTER TABLE `mdla_usergroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_users`
--

DROP TABLE IF EXISTS `mdla_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `block` tinyint(4) NOT NULL DEFAULT '0',
  `sendEmail` tinyint(4) DEFAULT '0',
  `registerDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `params` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastResetTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Date of last password reset',
  `resetCount` int(11) NOT NULL DEFAULT '0' COMMENT 'Count of password resets since lastResetTime',
  `otpKey` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Two factor authentication encrypted keys',
  `otep` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'One time emergency passwords',
  `requireReset` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Require user to reset password on next login',
  PRIMARY KEY (`id`),
  KEY `idx_name` (`name`(100)),
  KEY `idx_block` (`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=344 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_users`
--

LOCK TABLES `mdla_users` WRITE;
/*!40000 ALTER TABLE `mdla_users` DISABLE KEYS */;
INSERT INTO `mdla_users` VALUES (343,'Super User','admin','vitorvilasboas@ifto.edu.br','$2y$10$2oMHjczVnYO.TC7/a4TEruwDO6yTvB3DI3mpV9IZK/n.a6PnbULG2',0,1,'2017-05-10 05:04:13','2017-05-23 00:59:04','0','','0000-00-00 00:00:00',0,'','',0);
/*!40000 ALTER TABLE `mdla_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_utf8_conversion`
--

DROP TABLE IF EXISTS `mdla_utf8_conversion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_utf8_conversion` (
  `converted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_utf8_conversion`
--

LOCK TABLES `mdla_utf8_conversion` WRITE;
/*!40000 ALTER TABLE `mdla_utf8_conversion` DISABLE KEYS */;
INSERT INTO `mdla_utf8_conversion` VALUES (2);
/*!40000 ALTER TABLE `mdla_utf8_conversion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdla_viewlevels`
--

DROP TABLE IF EXISTS `mdla_viewlevels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdla_viewlevels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rules` varchar(5120) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'JSON encoded access control.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_assetgroup_title_lookup` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdla_viewlevels`
--

LOCK TABLES `mdla_viewlevels` WRITE;
/*!40000 ALTER TABLE `mdla_viewlevels` DISABLE KEYS */;
INSERT INTO `mdla_viewlevels` VALUES (1,'Public',0,'[1]'),(2,'Registered',2,'[6,2,8]'),(3,'Special',3,'[6,3,8]'),(5,'Guest',1,'[9]'),(6,'Super Users',4,'[8]');
/*!40000 ALTER TABLE `mdla_viewlevels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `loja`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `loja` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `loja`;

--
-- Table structure for table `ENTREGA`
--

DROP TABLE IF EXISTS `ENTREGA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ENTREGA` (
  `ent_id` int(11) NOT NULL AUTO_INCREMENT,
  `ent_endereco` varchar(255) DEFAULT NULL,
  `ent_ped_id` int(11) NOT NULL,
  `ent_cli_id` int(11) NOT NULL,
  PRIMARY KEY (`ent_id`),
  KEY `ent_ped_id` (`ent_ped_id`),
  CONSTRAINT `ENTREGA_ibfk_1` FOREIGN KEY (`ent_ped_id`) REFERENCES `pedido` (`ped_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ENTREGA`
--

LOCK TABLES `ENTREGA` WRITE;
/*!40000 ALTER TABLE `ENTREGA` DISABLE KEYS */;
/*!40000 ALTER TABLE `ENTREGA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `cli_id` int(11) unsigned NOT NULL,
  `cli_nome` varchar(255) NOT NULL,
  `cli_end` varchar(50) DEFAULT NULL,
  `cli_end_cidade` varchar(255) DEFAULT NULL,
  `cli_end_cep` char(8) DEFAULT NULL,
  `cli_telefone` varchar(20) DEFAULT NULL,
  `cli_dt_nascimento` date DEFAULT NULL,
  `cli_perc_desconto` decimal(2,2) DEFAULT NULL,
  `cli_uf_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`cli_id`),
  UNIQUE KEY `cliente_id_UNIQUE` (`cli_id`),
  KEY `fk_cliente_estado_idx` (`cli_uf_id`),
  CONSTRAINT `fk_cliente_estado` FOREIGN KEY (`cli_uf_id`) REFERENCES `estado` (`uf_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `uf_id` int(11) unsigned NOT NULL,
  `uf_nome` varchar(100) NOT NULL,
  PRIMARY KEY (`uf_id`),
  UNIQUE KEY `uf_codigo_UNIQUE` (`uf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'TO'),(2,'MA'),(3,'GO');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `ped_id` int(11) NOT NULL AUTO_INCREMENT,
  `ped_tipo` enum('A VISTA','A PRAZO') DEFAULT NULL,
  `ped_dt_entrada` date DEFAULT NULL,
  `ped_valor_total` decimal(7,2) DEFAULT NULL,
  `ped_desconto` decimal(7,2) DEFAULT NULL,
  `ped_dt_saida` date DEFAULT NULL,
  `ped_cli_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`ped_id`),
  KEY `fk_pedido_cliente1_idx` (`ped_cli_id`),
  CONSTRAINT `fk_pedido_cliente1` FOREIGN KEY (`ped_cli_id`) REFERENCES `cliente` (`cli_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_nome` varchar(255) DEFAULT NULL,
  `prod_preco` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos_do_pedido`
--

DROP TABLE IF EXISTS `produtos_do_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos_do_pedido` (
  `pdp_ped_id` int(11) NOT NULL,
  `pdp_prod_id` int(11) NOT NULL,
  `pdp_id` int(11) NOT NULL,
  `pdp_quantidade` int(11) DEFAULT NULL,
  `pdp_valor_unitario` double(10,2) DEFAULT NULL,
  `pdp_valor_total` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`pdp_id`),
  KEY `fk_pedido_has_produto_produto1_idx` (`pdp_prod_id`),
  KEY `fk_pedido_has_produto_pedido1_idx` (`pdp_ped_id`),
  CONSTRAINT `fk_pedido_has_produto_pedido1` FOREIGN KEY (`pdp_ped_id`) REFERENCES `pedido` (`ped_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_has_produto_produto1` FOREIGN KEY (`pdp_prod_id`) REFERENCES `produto` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos_do_pedido`
--

LOCK TABLES `produtos_do_pedido` WRITE;
/*!40000 ALTER TABLE `produtos_do_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `produtos_do_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `fisco`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `fisco` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `fisco`;

--
-- Table structure for table `nota_fiscal`
--

DROP TABLE IF EXISTS `nota_fiscal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_fiscal` (
  `nf_cod` int(11) DEFAULT NULL,
  `item_cod` int(11) DEFAULT NULL,
  `prod_cod` int(11) DEFAULT NULL,
  `valor_un` double(10,2) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `desconto` double(10,2) DEFAULT NULL,
  `nf_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`nf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_fiscal`
--

LOCK TABLES `nota_fiscal` WRITE;
/*!40000 ALTER TABLE `nota_fiscal` DISABLE KEYS */;
INSERT INTO `nota_fiscal` VALUES (1,1,1,25.00,10,5.00,1),(1,2,2,13.50,3,2.00,4);
/*!40000 ALTER TABLE `nota_fiscal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `sisacad`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `sisacad` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sisacad`;

--
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `matricula` varchar(255) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `ifeventos`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `ifeventos` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ifeventos`;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `eve_id` int(11) NOT NULL AUTO_INCREMENT,
  `eve_titulo` varchar(255) DEFAULT NULL,
  `eve_area` varchar(100) DEFAULT NULL,
  `eve_dtinicio` date DEFAULT NULL,
  `eve_dtfim` date DEFAULT NULL,
  `eve_responsavel` varchar(255) DEFAULT NULL,
  `eve_tipo` varchar(255) DEFAULT NULL,
  `eve_local` varchar(255) DEFAULT NULL,
  `eve_endereco` varchar(255) DEFAULT NULL,
  `eve_qtdvagas` int(11) DEFAULT NULL,
  PRIMARY KEY (`eve_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (2,'Semana do Meio Ambiente ccccbvc','Muldisciplinar','2017-06-05','2017-06-07','Rafaela','Oficina','IFTO','Rua do Aï¿½ude S/N Formoso do Araguaia-TO',60),(4,'Semana Agroinformatica','Informatica e Agricultura','2017-11-08','2017-11-15','Demis','Evento INstitucional','IFTO','Rua 10 Centro',140),(5,'ExpoFormoso1','Agronomia','2017-06-10','2017-06-18','Wagner da Grafica','Pecuaria','Espaï¿½o Agropecuï¿½ria','BR 242 KM 341',980),(19,'dsfsdfdsf','sdfsdfsdf','0000-00-00','0000-00-00','sdfsdfsd','sdfsdfsdf','sdfsdfds','sdfsdfsf',34);
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `locadora`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `locadora` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `locadora`;

--
-- Table structure for table `carro`
--

DROP TABLE IF EXISTS `carro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carro` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_placa` char(8) DEFAULT NULL,
  `car_renavan` varchar(45) DEFAULT NULL,
  `car_modelo` varchar(100) DEFAULT NULL,
  `car_ano` int(4) DEFAULT NULL,
  `car_marca` varchar(45) DEFAULT NULL,
  `car_preco` double(10,2) DEFAULT NULL,
  `car_categoria` char(1) DEFAULT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carro`
--

LOCK TABLES `carro` WRITE;
/*!40000 ALTER TABLE `carro` DISABLE KEYS */;
INSERT INTO `carro` VALUES (1,'OXN-0134','76453890','UNO',2008,'FIAT',25000.00,'E'),(2,'JUA-2367','98900982','SANDERO',2005,'RENAULT',43000.00,'D'),(3,'ABA-8964','65234100','PALIO',2013,'FIAT',32000.00,'D'),(4,'YFR-9023','18904556','UNO',2009,'FIAT',29000.00,'E'),(5,'IJH-2056','09785433','COBALT',2012,'CHEVROLET',54000.00,'C'),(6,'TRE-7654','23456789','COROLLA',2016,'TOYOTA',78000.00,'B');
/*!40000 ALTER TABLE `carro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `cli_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nome` varchar(100) DEFAULT NULL,
  `cli_cidade` varchar(70) DEFAULT NULL,
  `cli_sexo` char(1) DEFAULT NULL,
  `cli_dtnasc` date DEFAULT NULL,
  `cli_salario` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`cli_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Marcos','Formoso do Araguaia','M',NULL,NULL),(2,'Maria','Araguatins','F',NULL,NULL),(3,'Jose','Goiania','M',NULL,NULL),(4,'Vitor','Uberlandia','M',NULL,NULL),(5,'Paulo',NULL,'M',NULL,NULL),(6,'Pedro','Araraquara','M','1990-09-12',3500.43),(7,'Julia','Coritiba','F','1997-07-05',945.56),(8,'Joao','Colinas','M','1992-03-13',2100.00),(9,'Mariana','Florianopolis','F','2000-08-22',1300.40),(10,'Thiago','Cuiaba','M','1975-01-01',9800.77),(24,'Ciclano',NULL,'M',NULL,4675.98),(25,'Ciclano',NULL,'M',NULL,4675.98);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locacao`
--

DROP TABLE IF EXISTS `locacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locacao` (
  `loc_cli_id` int(11) NOT NULL,
  `loc_car_id` int(11) NOT NULL,
  `loc_id` int(11) NOT NULL AUTO_INCREMENT,
  `loc_data` date DEFAULT NULL,
  `loc_data_entrega` date DEFAULT NULL,
  PRIMARY KEY (`loc_id`),
  KEY `fk_cliente_has_carro_carro1_idx` (`loc_car_id`),
  KEY `fk_cliente_has_carro_cliente_idx` (`loc_cli_id`),
  CONSTRAINT `fk_cliente_has_carro_carro1` FOREIGN KEY (`loc_car_id`) REFERENCES `carro` (`car_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_has_carro_cliente` FOREIGN KEY (`loc_cli_id`) REFERENCES `cliente` (`cli_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locacao`
--

LOCK TABLES `locacao` WRITE;
/*!40000 ALTER TABLE `locacao` DISABLE KEYS */;
INSERT INTO `locacao` VALUES (1,4,1,'2017-04-23','2017-04-27'),(10,6,2,'2017-05-02','2017-05-05'),(1,2,3,'2017-02-19','2017-02-28'),(7,1,4,'2017-04-08','2017-04-09'),(1,5,5,'2017-03-08','2017-03-13'),(3,3,6,'2017-05-12','2017-05-17');
/*!40000 ALTER TABLE `locacao` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-09 22:21:06
