-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: php_28
-- ------------------------------------------------------
-- Server version	5.5.16-log

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
-- Table structure for table `php28_address`
--

DROP TABLE IF EXISTS `php28_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_address` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '收货人ID',
  `name` varchar(32) NOT NULL COMMENT '收货人名称',
  `province` varchar(32) NOT NULL COMMENT '收货人省份',
  `city` varchar(32) NOT NULL COMMENT '收货人城市',
  `area` varchar(32) NOT NULL COMMENT '收货人地区',
  `address` varchar(120) NOT NULL COMMENT '收货人详细地址',
  `phone` varchar(32) NOT NULL COMMENT '收货人电话',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='收货人地址';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_address`
--

LOCK TABLES `php28_address` WRITE;
/*!40000 ALTER TABLE `php28_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `php28_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_admin`
--

DROP TABLE IF EXISTS `php28_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_admin` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理ID',
  `username` varchar(32) NOT NULL COMMENT '管理名称',
  `password` char(32) NOT NULL COMMENT '管理密码',
  `role_id` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '管员角色',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='管理员表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_admin`
--

LOCK TABLES `php28_admin` WRITE;
/*!40000 ALTER TABLE `php28_admin` DISABLE KEYS */;
INSERT INTO `php28_admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3',1),(7,'joe','202cb962ac59075b964b07152d234b70',6),(8,'jojo','d9b1d7db4cd6e70935368a1efb10e377',9);
/*!40000 ALTER TABLE `php28_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_attr`
--

DROP TABLE IF EXISTS `php28_attr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_attr` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `attr_name` varchar(30) NOT NULL COMMENT '属性名称',
  `attr_type` enum('单选','唯一') NOT NULL DEFAULT '唯一' COMMENT '属性类型',
  `type_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '类型ID',
  `attr_option_val` varchar(128) NOT NULL DEFAULT '' COMMENT '属性可选值',
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`),
  CONSTRAINT `php28_attr_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `php28_type` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='属性';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_attr`
--

LOCK TABLES `php28_attr` WRITE;
/*!40000 ALTER TABLE `php28_attr` DISABLE KEYS */;
INSERT INTO `php28_attr` VALUES (1,'屏幕大小','单选',1,'3寸,5寸,6寸'),(2,'颜色','单选',1,'红色,白色,黑色'),(3,'机重量','唯一',1,' 0.5kg'),(4,'尺码','单选',2,' s,m,l'),(5,'颜色','单选',2,' 黑色,白色'),(6,'重量','唯一',2,' 1kg'),(7,'显示器尺寸','单选',4,'11寸,15寸,21寸'),(8,'颜色','唯一',4,' 黑色,白色'),(9,'容量','单选',5,' 10000MA,2000MA'),(10,'颜色','唯一',5,' 黑色,白色'),(11,'显示器','单选',6,' 大,中,小'),(12,'颜色','单选',6,' 黑色,白色');
/*!40000 ALTER TABLE `php28_attr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_auth`
--

DROP TABLE IF EXISTS `php28_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_auth` (
  `auth_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `auth_name` varchar(32) NOT NULL COMMENT '名称',
  `auth_pid` smallint(6) unsigned NOT NULL COMMENT '父ID',
  `auth_m` varchar(30) NOT NULL COMMENT '模块名',
  `auth_c` varchar(32) NOT NULL DEFAULT '' COMMENT '控制器',
  `auth_a` varchar(32) NOT NULL DEFAULT '' COMMENT '操作方法',
  `auth_level` tinyint(4) NOT NULL COMMENT '权限等级',
  PRIMARY KEY (`auth_id`)
) ENGINE=MyISAM AUTO_INCREMENT=181 DEFAULT CHARSET=utf8 COMMENT='权限表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_auth`
--

LOCK TABLES `php28_auth` WRITE;
/*!40000 ALTER TABLE `php28_auth` DISABLE KEYS */;
INSERT INTO `php28_auth` VALUES (10,'管理员列表',7,'Home','Admin','showlist',1),(9,'角色列表',7,'Home','Role','showlist',1),(8,'权限列表',7,'Home','Auth','showlist',1),(7,'管理员模块',0,'','','',0),(11,'商品模块',0,'Home','','',0),(53,'类型列表',11,'Goods','Type','showlist',1),(62,'批量删除属性',58,'Goods','Attr','mdel',2),(54,'添加类型',53,'Goods','Type','add',2),(55,'修改类型',53,'Goods','Type','update',2),(56,'删除类型',53,'Goods','Type','del',2),(57,'批量删除类型',53,'Goods','Type','mdel',2),(31,'添加权限',8,'Home','Auth','add',2),(32,'添加角色',9,'Home','Role','add',2),(33,'添加管理员',10,'Home','Admin','add',2),(61,'删除属性',58,'Goods','Attr','del',2),(60,'修改属性',58,'Goods','Attr','update',2),(59,'添加属性',58,'Goods','Attr','add',2),(58,'属性列表',11,'Goods','Attr','showlist',1),(44,'修改管理员',10,'Home','Admin','update',2),(45,'删除管理员',10,'Home','Admin','del',2),(46,'批量删除管理员',10,'Home','Admin','mel',2),(47,'修改角色',9,'Home','Role','update',2),(48,'删除角色',9,'Home','Role','del',2),(49,'批量删除角色',9,'Home','Role','mel',2),(50,'修改权限',8,'Home','Auth','update',2),(51,'删除权限',8,'Home','Auth','del',2),(52,'批量删除权限',8,'Home','Auth','mel',2),(177,'添加推荐位',176,'Goods','Recommend','add',2),(178,'修改推荐位',176,'Goods','Recommend','update',2),(179,'删除推荐位',176,'Goods','Recommend','del',2),(180,'批量删除推荐位',176,'Goods','Recommend','mdel',2),(81,'删除分类',78,'Goods','Category','del',2),(80,'修改分类',78,'Goods','Category','update',2),(79,'添加分类',78,'Goods','Category','add',2),(78,'分类列表',11,'Goods','Category','showlist',1),(113,'品牌列表',11,'Goods','Brand','showlist',1),(118,'商品列表',11,'Goods','Goods','showlist',1),(119,'添加商品',118,'Goods','Goods','add',2),(120,'修改商品',118,'Goods','Goods','update',2),(121,'删除商品',118,'Goods','Goods','del',2),(122,'批量删除商品',118,'Goods','Goods','mdel',2),(114,'添加品牌',113,'Goods','Brand','add',2),(115,'修改品牌',113,'Goods','Brand','update',2),(116,'删除品牌',113,'Goods','Brand','del',2),(117,'批量删除品牌',113,'Goods','Brand','mdel',2),(159,'会员模块',0,'','','',0),(165,'会员等级列表',159,'Member','MemberLevel','showlist',1),(166,'添加会员等级',165,'Member','MemberLevel','add',2),(167,'修改会员等级',165,'Member','MemberLevel','update',2),(168,'删除会员等级',165,'Member','MemberLevel','del',2),(169,'批量删除会员等级',165,'Member','MemberLevel','mdel',2),(176,'推荐位列表',11,'Goods','Recommend','showlist',1);
/*!40000 ALTER TABLE `php28_auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_brand`
--

DROP TABLE IF EXISTS `php28_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_brand` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '品牌ID',
  `brand_name` varchar(64) NOT NULL COMMENT '品牌名称',
  `brand_site_url` varchar(300) NOT NULL DEFAULT '' COMMENT '品牌官网',
  `brand_logo` varchar(300) NOT NULL DEFAULT '' COMMENT '品牌logo',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='品牌表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_brand`
--

LOCK TABLES `php28_brand` WRITE;
/*!40000 ALTER TABLE `php28_brand` DISABLE KEYS */;
INSERT INTO `php28_brand` VALUES (16,'中兴','http://www.zhongxing.com','/'),(17,'东芝笔记本','http://www.lenvon.com','Brand/2015-01-20//54be54bf5902e.jpg'),(15,'联想','http://www.lenvon.com','Brand/2014-12-24//549a46b7b836c.png'),(18,'苹果','http://www.lenvon.com','Brand/2015-01-20//54be54ec25671.jpg');
/*!40000 ALTER TABLE `php28_brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_cart`
--

DROP TABLE IF EXISTS `php28_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_cart` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '购物车ID',
  `member_id` mediumint(8) unsigned NOT NULL COMMENT '会员ID',
  `goods_id` mediumint(8) unsigned NOT NULL COMMENT '商品ID',
  `gaid` varchar(150) NOT NULL DEFAULT '' COMMENT '商品属性ID',
  `gastr` varchar(150) NOT NULL DEFAULT '' COMMENT '商品属性字符串',
  `goods_number` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '商品库存量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='购物车';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_cart`
--

LOCK TABLES `php28_cart` WRITE;
/*!40000 ALTER TABLE `php28_cart` DISABLE KEYS */;
INSERT INTO `php28_cart` VALUES (12,1,14,'57,59','屏幕大小:中<br/>颜色:红色',100),(13,1,9,'49','屏幕大小:小',1),(14,1,11,'53','屏幕大小:中',1);
/*!40000 ALTER TABLE `php28_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_category`
--

DROP TABLE IF EXISTS `php28_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_category` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `cat_name` varchar(128) NOT NULL COMMENT '名称',
  `cat_pid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `cat_section_price` tinyint(4) NOT NULL DEFAULT '5' COMMENT '价格区间',
  `cat_keyword` varchar(300) NOT NULL DEFAULT '' COMMENT '关键字',
  `cat_desc` text NOT NULL COMMENT '详细描述',
  `cat_attr_id` varchar(150) NOT NULL DEFAULT '' COMMENT '属性ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='商品分类';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_category`
--

LOCK TABLES `php28_category` WRITE;
/*!40000 ALTER TABLE `php28_category` DISABLE KEYS */;
INSERT INTO `php28_category` VALUES (17,'移动电源',15,5,' 移动电源 ','好电源','9,10'),(19,'笔记本',15,5,'手机 电脑 移动电源 笔记本','笔记本','11,12'),(15,'电子产品',0,5,'手机 电脑 移动电源 笔记本','手机','9,10,11,12');
/*!40000 ALTER TABLE `php28_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_goods`
--

DROP TABLE IF EXISTS `php28_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_goods` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `goods_name` varchar(64) NOT NULL COMMENT '商品名称',
  `img` varchar(128) NOT NULL DEFAULT '' COMMENT '商品原图片',
  `small_img` varchar(128) NOT NULL DEFAULT '' COMMENT '商品小图',
  `middle_img` varchar(128) NOT NULL DEFAULT '' COMMENT '商品中图',
  `big_img` varchar(128) NOT NULL DEFAULT '' COMMENT '商品大图',
  `cat_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品分类ID',
  `brand_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品品牌ID',
  `shop_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '本店价',
  `market_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `is_on_sale` enum('是','否') NOT NULL DEFAULT '是' COMMENT '是否上价',
  `goods_desc` varchar(300) NOT NULL DEFAULT '' COMMENT '商品描述',
  `type_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品类型ID',
  `rec_id` varchar(300) NOT NULL DEFAULT '' COMMENT '推荐ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='商品表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_goods`
--

LOCK TABLES `php28_goods` WRITE;
/*!40000 ALTER TABLE `php28_goods` DISABLE KEYS */;
INSERT INTO `php28_goods` VALUES (25,'东芝笔记本','Goods/2015-01-20/54be56003e702.jpg','Goods/2015-01-20/small_54be56003e702.jpg','Goods/2015-01-20/mid_54be56003e702.jpg','Goods/2015-01-20/big_54be56003e702.jpg',19,0,3000.00,20000.00,'是','<p>东芝电脑</p>',6,'1'),(24,'苹果电脑','Goods/2015-01-20/54be55a0166a3.jpg','Goods/2015-01-20/small_54be55a0166a3.jpg','Goods/2015-01-20/mid_54be55a0166a3.jpg','Goods/2015-01-20/big_54be55a0166a3.jpg',19,0,3000.00,2500.00,'是','<p>苹果电脑</p>',6,'1'),(23,'联想笔记本','Goods/2015-01-20/54be547cda905.jpg','Goods/2015-01-20/small_54be547cda905.jpg','Goods/2015-01-20/mid_54be547cda905.jpg','Goods/2015-01-20/big_54be547cda905.jpg',19,0,5000.00,5500.00,'是','<p>好电脑</p>',6,'1'),(22,'中兴笔记本','Goods/2015-01-20/54be484815df4.jpg','Goods/2015-01-20/small_54be484815df4.jpg','Goods/2015-01-20/mid_54be484815df4.jpg','Goods/2015-01-20/big_54be484815df4.jpg',19,0,5000.00,5300.00,'是','<p>好笔记本</p>',6,'3'),(21,'10000MA移动电源','Goods/2015-01-20/54be47da363f9.jpg','Goods/2015-01-20/small_54be47da363f9.jpg','Goods/2015-01-20/mid_54be47da363f9.jpg','Goods/2015-01-20/big_54be47da363f9.jpg',17,15,1000.00,120.00,'是','<p>好电源</p>',5,'1');
/*!40000 ALTER TABLE `php28_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_goods_attr`
--

DROP TABLE IF EXISTS `php28_goods_attr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_goods_attr` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `attr_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `goods_attr_val` varchar(64) NOT NULL DEFAULT '' COMMENT '属性值',
  `goods_attr_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '属性价格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='商品属性';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_goods_attr`
--

LOCK TABLES `php28_goods_attr` WRITE;
/*!40000 ALTER TABLE `php28_goods_attr` DISABLE KEYS */;
INSERT INTO `php28_goods_attr` VALUES (1,9,21,' 10000MA',100.00),(2,9,21,' 10000MA',100.00),(3,10,21,'白色',200.00),(4,11,22,' 大',100.00),(5,12,22,' 黑色',100.00),(6,11,22,'中',200.00),(7,12,22,'白色',150.00),(8,11,23,'中',200.00),(9,11,23,' 大',200.00),(10,11,23,'小',200.00),(11,12,23,' 黑色',100.00),(12,12,23,'白色',100.00),(13,11,24,' 大',100.00),(14,11,24,'小',100.00),(15,11,24,'中',100.00),(16,12,24,' 黑色',100.00),(17,12,24,'白色',100.00),(18,11,25,' 大',100.00),(19,12,25,' 黑色',100.00);
/*!40000 ALTER TABLE `php28_goods_attr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_goods_number`
--

DROP TABLE IF EXISTS `php28_goods_number`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_goods_number` (
  `goods_number` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '库存量',
  `goods_attr_id` varchar(128) NOT NULL DEFAULT '' COMMENT '商品属性ID',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品库存量';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_goods_number`
--

LOCK TABLES `php28_goods_number` WRITE;
/*!40000 ALTER TABLE `php28_goods_number` DISABLE KEYS */;
INSERT INTO `php28_goods_number` VALUES (60,'14,16',76),(50,'14,15',76),(40,'13,16',76),(30,'13,15',76),(20,'12,16',76),(100,'12,15',76),(100,'62,65',14),(50,'62,63',14),(100,'59,62',14),(100,'64,65',14),(100,'63,64',14),(100,'59,64',14),(100,'57,65',14),(90,'57,63',14),(100,'57,59',14);
/*!40000 ALTER TABLE `php28_goods_number` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_history`
--

DROP TABLE IF EXISTS `php28_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_history` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `member_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '会员ID',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '会员商品ID',
  `view_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_history`
--

LOCK TABLES `php28_history` WRITE;
/*!40000 ALTER TABLE `php28_history` DISABLE KEYS */;
INSERT INTO `php28_history` VALUES (1,1,9,78),(2,1,8,127),(3,2,9,10),(4,2,8,135),(5,2,10,6),(6,2,11,4),(7,2,13,1),(8,2,12,1),(9,1,10,24),(10,1,13,1),(11,2,14,50),(12,1,14,46),(13,1,11,3),(14,1,0,1),(15,1,0,1),(16,1,0,1),(17,1,12,2),(18,1,0,1),(19,1,0,1),(20,1,0,1),(21,1,0,1);
/*!40000 ALTER TABLE `php28_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_impression`
--

DROP TABLE IF EXISTS `php28_impression`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_impression` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '印象ID',
  `goods_id` mediumint(8) unsigned NOT NULL COMMENT '商品ID',
  `name` varchar(30) NOT NULL COMMENT '印象名称',
  `count` int(11) NOT NULL COMMENT '印象次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='印象';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_impression`
--

LOCK TABLES `php28_impression` WRITE;
/*!40000 ALTER TABLE `php28_impression` DISABLE KEYS */;
INSERT INTO `php28_impression` VALUES (1,9,'很好',6),(2,8,'不错的电脑',1),(3,8,'屏幕大',4),(4,8,'太好了',4),(5,8,'便宜',8),(6,8,'太轻了',17),(7,8,'耐用',2),(8,8,'好',5),(9,14,'不错',3);
/*!40000 ALTER TABLE `php28_impression` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_member`
--

DROP TABLE IF EXISTS `php28_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_member` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '会员ID',
  `username` varchar(32) NOT NULL COMMENT '会员名称',
  `password` varchar(32) NOT NULL COMMENT '会员密码',
  `email` varchar(120) NOT NULL COMMENT '会员邮箱',
  `email_code` char(13) NOT NULL COMMENT '验证码,如果验证成功,就清空',
  `email_code_time` int(10) unsigned NOT NULL COMMENT '验证码有效时间',
  `jifen` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '会员积分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='会员表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_member`
--

LOCK TABLES `php28_member` WRITE;
/*!40000 ALTER TABLE `php28_member` DISABLE KEYS */;
INSERT INTO `php28_member` VALUES (1,'admin','694fd18703e5635d97221601d0498bfb','4334838@qq.com','',1420633697,21000),(2,'joe','694fd18703e5635d97221601d0498bfb','97007623@qq.com','',1420984542,0),(6,'lily','694fd18703e5635d97221601d0498bfb','97007624@qq.com','',1421645721,0);
/*!40000 ALTER TABLE `php28_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_member_level`
--

DROP TABLE IF EXISTS `php28_member_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_member_level` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `level_name` varchar(32) NOT NULL COMMENT '等级名称',
  `top` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '积分上限',
  `bottom` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '积分下限',
  `rate` int(10) unsigned NOT NULL DEFAULT '100' COMMENT '折扣',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='会员等级';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_member_level`
--

LOCK TABLES `php28_member_level` WRITE;
/*!40000 ALTER TABLE `php28_member_level` DISABLE KEYS */;
INSERT INTO `php28_member_level` VALUES (1,'普通会员',0,2000,100),(2,'中级会员',2001,5000,90),(3,'高级会员',5000,25000,70);
/*!40000 ALTER TABLE `php28_member_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_member_price`
--

DROP TABLE IF EXISTS `php28_member_price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_member_price` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '会员价格',
  `level_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '等级ID',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=282 DEFAULT CHARSET=utf8 COMMENT='会员价格';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_member_price`
--

LOCK TABLES `php28_member_price` WRITE;
/*!40000 ALTER TABLE `php28_member_price` DISABLE KEYS */;
INSERT INTO `php28_member_price` VALUES (233,1000.00,1,18),(278,700.00,3,21),(277,800.00,2,21),(275,1000.00,1,22),(7,1000.00,1,75),(8,800.00,2,75),(9,700.00,3,75),(68,700.00,3,76),(67,800.00,2,76),(66,1000.00,1,76),(13,1000.00,1,77),(14,800.00,2,77),(15,700.00,3,77),(69,1000.00,1,1),(70,800.00,2,1),(71,700.00,3,1),(72,1000.00,1,2),(73,800.00,2,2),(74,700.00,3,2),(75,1000.00,1,5),(76,800.00,2,5),(77,700.00,3,5),(78,1000.00,1,6),(79,900.00,2,6),(80,200.00,3,6),(81,1000.00,1,7),(82,800.00,2,7),(83,700.00,3,7),(92,700.00,3,3),(91,800.00,2,3),(90,1000.00,1,3),(181,700.00,3,13),(180,800.00,2,13),(179,900.00,1,13),(178,700.00,3,9),(177,800.00,2,9),(176,900.00,1,9),(123,1000.00,1,10),(124,800.00,2,10),(125,300.00,3,10),(126,900.00,1,11),(127,500.00,2,11),(128,500.00,3,11),(167,700.00,3,12),(166,800.00,2,12),(165,1000.00,1,12),(251,700.00,3,19),(229,700.00,3,15),(228,800.00,2,15),(250,800.00,2,19),(249,1000.00,1,19),(227,1000.00,1,15),(248,700.00,3,20),(247,800.00,2,20),(246,1000.00,1,20),(276,1000.00,1,21),(281,700.00,3,23),(280,800.00,2,23),(279,1000.00,1,23),(274,700.00,3,24),(273,800.00,2,24),(272,1000.00,1,24),(271,700.00,3,25),(270,800.00,2,25),(269,1000.00,1,25);
/*!40000 ALTER TABLE `php28_member_price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_order`
--

DROP TABLE IF EXISTS `php28_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_order` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单基本信息ID',
  `member_id` mediumint(8) unsigned NOT NULL COMMENT '会员ID',
  `addtime` datetime NOT NULL COMMENT '下单时间',
  `name` varchar(32) NOT NULL COMMENT '收货人名称',
  `province` varchar(32) NOT NULL COMMENT '收货人省份',
  `city` varchar(32) NOT NULL COMMENT '收货人城市',
  `area` varchar(32) NOT NULL COMMENT '收货人地区',
  `address` varchar(120) NOT NULL COMMENT '收货人详细地址',
  `phone` varchar(32) NOT NULL COMMENT '收货人电话',
  `pay_method` varchar(32) NOT NULL DEFAULT '' COMMENT '支付方式',
  `pay_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '支付状态:0 表示未支付,1 表示已经支付',
  `post_method` varchar(32) NOT NULL DEFAULT '' COMMENT '发货方式',
  `post_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '发货状态：0 表示未发货,1 表示已经发货,2,表示已经收货',
  `order_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '订单状态:0 表示未确认,1表示已经确认,2 表示已经收货,3 表示申请退货,4 表示申请退货',
  `total_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '订单总价',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订单基本信息';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_order`
--

LOCK TABLES `php28_order` WRITE;
/*!40000 ALTER TABLE `php28_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `php28_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_order_goods`
--

DROP TABLE IF EXISTS `php28_order_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_order_goods` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单商品ID',
  `member_id` mediumint(8) unsigned NOT NULL COMMENT '会员ID',
  `order_id` mediumint(8) unsigned NOT NULL COMMENT '订单ID',
  `goods_id` mediumint(8) unsigned NOT NULL COMMENT '商品ID',
  `goods_attr_id` varchar(32) NOT NULL DEFAULT '' COMMENT '商品属性ID',
  `price` decimal(10,2) NOT NULL COMMENT '商品价格',
  `goods_number` int(10) unsigned NOT NULL COMMENT '购买数据',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订单商品表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_order_goods`
--

LOCK TABLES `php28_order_goods` WRITE;
/*!40000 ALTER TABLE `php28_order_goods` DISABLE KEYS */;
/*!40000 ALTER TABLE `php28_order_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_pics`
--

DROP TABLE IF EXISTS `php28_pics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_pics` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `small_pic` varchar(300) NOT NULL DEFAULT '' COMMENT '商品小图',
  `mid_pic` varchar(300) NOT NULL DEFAULT '' COMMENT '商品中图',
  `pic` varchar(300) NOT NULL DEFAULT '' COMMENT '商品原图',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COMMENT='商品图片';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_pics`
--

LOCK TABLES `php28_pics` WRITE;
/*!40000 ALTER TABLE `php28_pics` DISABLE KEYS */;
INSERT INTO `php28_pics` VALUES (1,'Goods/2015-01-06/pic_small_54ab536488121.jpg','Goods/2015-01-06/pic_mid_54ab536488121.jpg','Goods/2015-01-06/54ab536488121.jpg',1),(2,'Goods/2015-01-06/pic_small_54ab536488c00.jpg','Goods/2015-01-06/pic_mid_54ab536488c00.jpg','Goods/2015-01-06/54ab536488c00.jpg',1),(3,'Goods/2015-01-06/pic_small_54ab5364893e0.jpg','Goods/2015-01-06/pic_mid_54ab5364893e0.jpg','Goods/2015-01-06/54ab5364893e0.jpg',1),(4,'Goods/2015-01-06/pic_small_54ab5562938bf.jpg','Goods/2015-01-06/pic_mid_54ab5562938bf.jpg','Goods/2015-01-06/54ab5562938bf.jpg',2),(5,'Goods/2015-01-06/pic_small_54ab56f2aa29a.jpg','Goods/2015-01-06/pic_mid_54ab56f2aa29a.jpg','Goods/2015-01-06/54ab56f2aa29a.jpg',3),(6,'Goods/2015-01-06/pic_small_54ab579af2cfe.jpg','Goods/2015-01-06/pic_mid_54ab579af2cfe.jpg','Goods/2015-01-06/54ab579af2cfe.jpg',4),(7,'Goods/2015-01-06/pic_small_54ab580b3bdf1.jpg','Goods/2015-01-06/pic_mid_54ab580b3bdf1.jpg','Goods/2015-01-06/54ab580b3bdf1.jpg',5),(8,'Goods/2015-01-06/pic_small_54ab7ad2bfc90.jpg','Goods/2015-01-06/pic_mid_54ab7ad2bfc90.jpg','Goods/2015-01-06/54ab7ad2bfc90.jpg',6),(15,'Goods/2015-01-08/pic_small_54ae944578c21.jpg','Goods/2015-01-08/pic_mid_54ae944578c21.jpg','Goods/2015-01-08/54ae944578c21.jpg',9),(14,'Goods/2015-01-06/pic_small_54ab91c414069.jpg','Goods/2015-01-06/pic_mid_54ab91c414069.jpg','Goods/2015-01-06/54ab91c414069.jpg',8),(13,'Goods/2015-01-06/pic_small_54ab91c413958.jpg','Goods/2015-01-06/pic_mid_54ab91c413958.jpg','Goods/2015-01-06/54ab91c413958.jpg',8),(16,'Goods/2015-01-11/pic_small_54b287e5e73cc.jpg','Goods/2015-01-11/pic_mid_54b287e5e73cc.jpg','Goods/2015-01-11/54b287e5e73cc.jpg',10),(17,'Goods/2015-01-11/pic_small_54b287e5e7ed2.jpg','Goods/2015-01-11/pic_mid_54b287e5e7ed2.jpg','Goods/2015-01-11/54b287e5e7ed2.jpg',10),(18,'Goods/2015-01-11/pic_small_54b2883067640.jpg','Goods/2015-01-11/pic_mid_54b2883067640.jpg','Goods/2015-01-11/54b2883067640.jpg',11),(19,'Goods/2015-01-11/pic_small_54b288db0676c.jpg','Goods/2015-01-11/pic_mid_54b288db0676c.jpg','Goods/2015-01-11/54b288db0676c.jpg',12),(20,'Goods/2015-01-11/pic_small_54b288f933697.jpg','Goods/2015-01-11/pic_mid_54b288f933697.jpg','Goods/2015-01-11/54b288f933697.jpg',13),(25,'Goods/2015-01-14/pic_small_54b5f0df6941d.jpg','Goods/2015-01-14/pic_mid_54b5f0df6941d.jpg','Goods/2015-01-14/54b5f0df6941d.jpg',14),(22,'Goods/2015-01-13/pic_small_54b4f9d5c9563.jpg','Goods/2015-01-13/pic_mid_54b4f9d5c9563.jpg','Goods/2015-01-13/54b4f9d5c9563.jpg',14),(23,'Goods/2015-01-13/pic_small_54b4f9d5cb8d5.jpg','Goods/2015-01-13/pic_mid_54b4f9d5cb8d5.jpg','Goods/2015-01-13/54b4f9d5cb8d5.jpg',14),(24,'Goods/2015-01-13/pic_small_54b4f9d5cc077.jpg','Goods/2015-01-13/pic_mid_54b4f9d5cc077.jpg','Goods/2015-01-13/54b4f9d5cc077.jpg',14),(26,'Goods/2015-01-14/pic_small_54b5f0df6a77c.jpg','Goods/2015-01-14/pic_mid_54b5f0df6a77c.jpg','Goods/2015-01-14/54b5f0df6a77c.jpg',14),(27,'Goods/2015-01-14/pic_small_54b5f0df6b37c.jpg','Goods/2015-01-14/pic_mid_54b5f0df6b37c.jpg','Goods/2015-01-14/54b5f0df6b37c.jpg',14),(28,'Goods/2015-01-14/pic_small_54b5f0df6c063.jpg','Goods/2015-01-14/pic_mid_54b5f0df6c063.jpg','Goods/2015-01-14/54b5f0df6c063.jpg',14),(29,'Goods/2015-01-20/pic_small_54bde515b4c96.jpg','Goods/2015-01-20/pic_mid_54bde515b4c96.jpg','Goods/2015-01-20/54bde515b4c96.jpg',15),(30,'Goods/2015-01-20/pic_small_54bde515b5429.jpg','Goods/2015-01-20/pic_mid_54bde515b5429.jpg','Goods/2015-01-20/54bde515b5429.jpg',15),(31,'Goods/2015-01-20/pic_small_54bdf31e32307.jpg','Goods/2015-01-20/pic_mid_54bdf31e32307.jpg','Goods/2015-01-20/54bdf31e32307.jpg',16),(32,'Goods/2015-01-20/pic_small_54bdf387865c7.jpg','Goods/2015-01-20/pic_mid_54bdf387865c7.jpg','Goods/2015-01-20/54bdf387865c7.jpg',17),(33,'Goods/2015-01-20/pic_small_54bdf8e935964.jpg','Goods/2015-01-20/pic_mid_54bdf8e935964.jpg','Goods/2015-01-20/54bdf8e935964.jpg',18),(34,'Goods/2015-01-20/pic_small_54bdf8e9360f8.jpg','Goods/2015-01-20/pic_mid_54bdf8e9360f8.jpg','Goods/2015-01-20/54bdf8e9360f8.jpg',18),(35,'Goods/2015-01-20/pic_small_54be22749621d.jpg','Goods/2015-01-20/pic_mid_54be22749621d.jpg','Goods/2015-01-20/54be22749621d.jpg',19),(36,'Goods/2015-01-20/pic_small_54be2274969b9.jpg','Goods/2015-01-20/pic_mid_54be2274969b9.jpg','Goods/2015-01-20/54be2274969b9.jpg',19),(37,'Goods/2015-01-20/pic_small_54be22b528eee.jpg','Goods/2015-01-20/pic_mid_54be22b528eee.jpg','Goods/2015-01-20/54be22b528eee.jpg',20),(38,'Goods/2015-01-20/pic_small_54be22b5296c9.jpg','Goods/2015-01-20/pic_mid_54be22b5296c9.jpg','Goods/2015-01-20/54be22b5296c9.jpg',20),(39,'Goods/2015-01-20/pic_small_54be47da78406.jpg','Goods/2015-01-20/pic_mid_54be47da78406.jpg','Goods/2015-01-20/54be47da78406.jpg',21),(40,'Goods/2015-01-20/pic_small_54be484827c3a.jpg','Goods/2015-01-20/pic_mid_54be484827c3a.jpg','Goods/2015-01-20/54be484827c3a.jpg',22),(41,'Goods/2015-01-20/pic_small_54be547d03cc4.jpg','Goods/2015-01-20/pic_mid_54be547d03cc4.jpg','Goods/2015-01-20/54be547d03cc4.jpg',23),(42,'Goods/2015-01-20/pic_small_54be55a0236e8.jpg','Goods/2015-01-20/pic_mid_54be55a0236e8.jpg','Goods/2015-01-20/54be55a0236e8.jpg',24),(43,'Goods/2015-01-20/pic_small_54be5600582b5.jpg','Goods/2015-01-20/pic_mid_54be5600582b5.jpg','Goods/2015-01-20/54be5600582b5.jpg',25);
/*!40000 ALTER TABLE `php28_pics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_recommend`
--

DROP TABLE IF EXISTS `php28_recommend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_recommend` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `rec_name` varchar(120) NOT NULL COMMENT '推荐名称',
  `rec_type` enum('商品','分类') DEFAULT '商品' COMMENT '推荐类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='推荐位';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_recommend`
--

LOCK TABLES `php28_recommend` WRITE;
/*!40000 ALTER TABLE `php28_recommend` DISABLE KEYS */;
INSERT INTO `php28_recommend` VALUES (1,'疯狂抢购','商品'),(2,'双十一抢购','分类'),(3,'限时抢购','商品');
/*!40000 ALTER TABLE `php28_recommend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_remark`
--

DROP TABLE IF EXISTS `php28_remark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_remark` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `member_id` mediumint(8) unsigned NOT NULL COMMENT '会员ID',
  `goods_id` mediumint(8) unsigned NOT NULL COMMENT '商品ID',
  `content` varchar(300) NOT NULL COMMENT '内容',
  `addtime` datetime NOT NULL COMMENT '评论时间',
  `stars` tinyint(3) unsigned NOT NULL DEFAULT '5' COMMENT '评分等级',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COMMENT='评论';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_remark`
--

LOCK TABLES `php28_remark` WRITE;
/*!40000 ALTER TABLE `php28_remark` DISABLE KEYS */;
INSERT INTO `php28_remark` VALUES (1,1,9,'不错哦','2015-01-12 17:01:48',5),(2,1,9,'不错哦','2015-01-12 17:01:17',5),(3,1,9,'不错哦','2015-01-12 17:01:25',5),(4,1,9,'不错哦','2015-01-12 17:01:53',5),(5,1,9,'不错哦','2015-01-12 17:01:56',5),(6,1,9,'不错哦','2015-01-12 18:01:19',5),(7,1,9,'不错哦','2015-01-12 18:01:39',5),(8,1,9,'不错哦','2015-01-12 18:01:40',5),(9,1,9,'不错哦','2015-01-12 18:01:54',5),(10,1,9,'不错哦','2015-01-12 18:01:58',5),(11,1,9,'不错哦','2015-01-12 18:01:18',5),(12,1,9,'不错的手机','2015-01-12 18:01:55',3),(13,1,9,'gfrerere','2015-01-12 18:01:53',5),(14,1,9,'gft','2015-01-12 18:01:06',5),(15,1,9,'4554','2015-01-12 18:01:54',4),(16,1,9,'不错的电脑哦','2015-01-12 19:01:16',5),(17,1,9,'不错的电脑哦','2015-01-12 19:01:50',5),(18,1,9,'不错的电脑哦','2015-01-12 19:01:51',5),(19,1,9,'不错的电脑哦','2015-01-12 19:01:51',5),(20,1,9,'不错的电脑哦','2015-01-12 19:01:51',5),(21,1,9,'不错的电脑哦','2015-01-12 19:01:52',5),(22,1,9,'不错的电脑哦','2015-01-12 19:01:52',5),(23,1,9,'不错的电脑哦','2015-01-12 19:01:52',5),(24,1,9,'不错的电脑哦','2015-01-12 19:01:52',5),(25,1,9,'不错的电脑哦','2015-01-12 19:01:18',5),(26,1,9,'不错的电脑哦','2015-01-12 19:01:18',5),(27,1,9,'不错的电脑哦','2015-01-12 19:01:18',5),(28,1,9,'不错的电脑哦','2015-01-12 19:01:18',5),(29,1,9,'不错的电脑哦','2015-01-12 19:01:19',5),(30,1,9,'不错的电脑哦','2015-01-12 19:01:19',5),(31,1,9,'不错的电脑哦','2015-01-12 19:01:29',5),(32,1,9,'不错的电脑哦','2015-01-12 19:01:29',5),(33,0,8,'好电话','2015-01-12 22:01:19',5),(34,1,8,'很好，不错啊','2015-01-12 22:01:14',5),(35,1,8,'很好，不错啊','2015-01-12 22:01:58',5),(36,1,8,'很好，不错啊','2015-01-12 22:01:59',5),(37,1,8,'不错的电脑哦','2015-01-12 22:01:48',5),(38,1,8,'很好','2015-01-12 23:01:38',5),(39,1,8,'很好','2015-01-12 23:01:38',5),(40,1,8,'很好','2015-01-12 23:01:38',5),(41,1,8,'很好','2015-01-12 23:01:39',5),(42,1,8,'很好','2015-01-12 23:01:39',5),(43,1,8,'很好','2015-01-12 23:01:39',5),(44,1,8,'很好','2015-01-12 23:01:39',5),(45,1,8,'很好','2015-01-13 00:01:16',2),(46,1,8,'很好','2015-01-13 00:01:18',3),(47,1,8,'很好','2015-01-13 00:01:20',2),(48,1,8,'很好','2015-01-13 00:01:20',2),(49,1,8,'很好','2015-01-13 00:01:21',2),(50,1,8,'很好','2015-01-13 00:01:23',1),(51,1,8,'很好','2015-01-13 00:01:24',1),(52,1,8,'很好','2015-01-13 00:01:24',1),(53,1,8,'很好','2015-01-13 00:01:42',3),(54,1,8,'一般一般','2015-01-13 00:01:00',3),(55,1,8,'一般一般','2015-01-13 00:01:23',3),(56,1,8,'一般一般','2015-01-13 00:01:23',3),(57,1,8,'一般一般','2015-01-13 00:01:23',3),(58,1,8,'一般一般','2015-01-13 00:01:23',3),(59,1,8,'一般一般','2015-01-13 00:01:23',3),(60,1,8,'一般一般','2015-01-13 00:01:24',3),(61,1,8,'质量不错','2015-01-13 00:01:45',5),(62,1,8,'不错','2015-01-13 00:01:11',5),(63,1,8,'不错','2015-01-13 00:01:12',5),(64,1,8,'不错','2015-01-13 00:01:12',5),(65,1,8,'不错','2015-01-13 00:01:12',5),(66,2,8,'太好了，','2015-01-13 01:01:36',5),(67,2,8,'非常好','2015-01-13 01:01:11',5),(68,2,8,'还可以','2015-01-13 01:01:18',5),(69,2,14,'很好哦 ','2015-01-13 20:01:18',5),(70,2,14,'很好哦 ','2015-01-13 20:01:18',5);
/*!40000 ALTER TABLE `php28_remark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_role`
--

DROP TABLE IF EXISTS `php28_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_role` (
  `role_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色ID',
  `role_name` varchar(32) NOT NULL COMMENT '角色名称',
  `role_auth_ids` varchar(128) NOT NULL DEFAULT '' COMMENT '角色权限id',
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_role`
--

LOCK TABLES `php28_role` WRITE;
/*!40000 ALTER TABLE `php28_role` DISABLE KEYS */;
INSERT INTO `php28_role` VALUES (6,'经理','26,32,33'),(9,'同学','11,13,14');
/*!40000 ALTER TABLE `php28_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `php28_type`
--

DROP TABLE IF EXISTS `php28_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `php28_type` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `type_name` varchar(32) NOT NULL COMMENT '名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='商业类型';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `php28_type`
--

LOCK TABLES `php28_type` WRITE;
/*!40000 ALTER TABLE `php28_type` DISABLE KEYS */;
INSERT INTO `php28_type` VALUES (1,'手机'),(2,'鞋'),(3,'娃哈哈'),(4,'电脑'),(5,'移动电源'),(6,'笔记本');
/*!40000 ALTER TABLE `php28_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-14 23:02:50
