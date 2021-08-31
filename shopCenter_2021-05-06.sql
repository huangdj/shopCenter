# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.29-0ubuntu0.18.04.1)
# Database: shopCenter
# Generation Time: 2021-05-06 05:36:06 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table addresses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `addresses`;

CREATE TABLE `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `province` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '' COMMENT '省',
  `city` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '' COMMENT '市',
  `area` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '' COMMENT '区',
  `detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '' COMMENT '详细地址',
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;

INSERT INTO `addresses` (`id`, `customer_id`, `name`, `tel`, `province`, `city`, `area`, `detail`, `status`, `created_at`, `updated_at`)
VALUES
	(1,1,'黄栋进','13419566683','湖北','武汉','江夏区','纸坊街武昌大道简朴寨',0,'2021-02-13 15:01:34','2021-04-15 23:04:57'),
	(3,3,'周清','18717150321','湖北','武汉','江夏区','周家湾',1,'2021-02-13 19:36:49','2021-02-14 11:37:30'),
	(4,3,'Zhonqing','18812345678','湖北','黄石','大冶市','还地桥镇',0,'2021-02-13 19:40:52','2021-02-14 11:37:30'),
	(5,7,'在一起','111111111111','湖北','仙桃','仙桃','23',0,'2021-02-26 14:35:14','2021-03-12 22:10:39'),
	(8,7,'默默','555555','北京','北京市','东城区','匿名',1,'2021-03-11 21:55:38','2021-03-12 22:10:39'),
	(9,4,'周定丁','13762881395','贵州省','黔东南苗族侗族自治州','从江县','停洞镇',1,'2021-03-13 16:32:39','2021-03-13 16:32:39'),
	(10,1,'好好学习','13212345678','内蒙古自治区','呼和浩特市','土默特左旗','我们不熟没关系，天这么热一会就熟了',1,'2021-04-15 23:04:27','2021-04-15 23:04:57');

/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table adverts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `adverts`;

CREATE TABLE `adverts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT '1' COMMENT '1：首页轮播图；2：中间广告图',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `adverts` WRITE;
/*!40000 ALTER TABLE `adverts` DISABLE KEYS */;

INSERT INTO `adverts` (`id`, `image`, `type`)
VALUES
	(1,'https://image.holyzq.com/T56ji8IIT9dktaHmcMFNPQIzoR66NSrZhXEK9jwX.jpg',1),
	(2,'https://image.holyzq.com/T1dVfpNEIiMCvJr3jwJonUznRndXU7HmbOwLmtkG.jpg',1),
	(4,'https://image.holyzq.com/jSU1kkDKG4BRWSFynKfpHfIaAvBWIZBeYsEPdIcu.jpg',1),
	(5,'https://image.holyzq.com/aJBuceDCWSn12jrqhD0fvc7NSJAatI4Q4OYRG2V8.jpg',1),
	(6,'https://image.holyzq.com/CtbUDQIrphhbVgp9wRFuhbY0FatJMqjGX5FW3Hlf.jpg',2);

/*!40000 ALTER TABLE `adverts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table appraises
# ------------------------------------------------------------

DROP TABLE IF EXISTS `appraises`;

CREATE TABLE `appraises` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `content` text,
  `image` varchar(255) DEFAULT NULL,
  `is_show` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `appraises` WRITE;
/*!40000 ALTER TABLE `appraises` DISABLE KEYS */;

INSERT INTO `appraises` (`id`, `order_id`, `product_id`, `customer_id`, `content`, `image`, `is_show`, `created_at`, `updated_at`)
VALUES
	(1,36,2,1,'好好','https://www.holyzq.com/vendor/wechat/images/pic.png',1,'2021-03-08 16:11:29','2021-03-08 16:20:19'),
	(2,35,17,1,'只有管不住自己的嘴，没有减不下来的肥','https://image.holyzq.com/jqgo5Tdw7IeRAdkiWucXxYN23zt7g9Tjf17zVjzE.jpg',1,'2021-03-23 06:39:44','2021-04-02 10:15:37');

/*!40000 ALTER TABLE `appraises` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table brands
# ------------------------------------------------------------

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_show` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;

INSERT INTO `brands` (`id`, `name`, `image`, `is_show`, `created_at`, `updated_at`)
VALUES
	(1,'七匹狼','https://image.holyzq.com/fN5QOrNUgN8rfOGaB4QA4dpUdwlVKRR1sndna90a.png',1,'2021-01-25 14:46:38','2021-01-25 16:20:55'),
	(2,'小米','https://image.holyzq.com/hleoS0PI5NlWSiLpGzIf2lXN9uyhalQ5kADW7jvJ.png',0,'2021-01-25 14:47:54','2021-01-25 16:29:51'),
	(3,'德芙','https://image.holyzq.com/xWXI7f2xEhYPC4j3quTEaJCX59vUUp5yZJoHxP8J.png',0,'2021-01-25 14:50:29','2021-01-25 14:50:29'),
	(4,'周大福','https://image.holyzq.com/bOebkdIJYtfF7jipFxDER21vCDTo7ZZbEuNKX0r4.png',0,'2021-01-25 14:50:50','2021-01-25 14:50:50'),
	(5,'NB','https://image.holyzq.com/hFL6AcCJ2qvPU5y2PPtvnMHRuhTk1NDFtvAsXSdy.png',0,'2021-01-25 14:51:14','2021-01-25 14:59:07'),
	(6,'陈二狗','https://image.holyzq.com/13pHFXeZYVVpD92GKsRElvna1pVuPKP5a6ENeBX0.png',0,'2021-02-25 17:00:43','2021-02-25 17:00:43');

/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table carts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;

INSERT INTO `carts` (`id`, `customer_id`, `product_id`, `num`, `created_at`, `updated_at`)
VALUES
	(1,2,8,5,'2021-02-13 12:01:12','2021-02-13 12:02:31'),
	(2,2,2,1,'2021-02-13 12:34:52','2021-02-13 12:34:52'),
	(4,2,9,1,'2021-02-13 13:43:41','2021-02-13 13:43:41'),
	(27,9,2,1,'2021-02-24 18:21:57','2021-02-24 18:21:57'),
	(28,10,8,1,'2021-02-25 14:37:02','2021-02-25 14:37:02'),
	(29,10,10,1,'2021-02-25 14:37:16','2021-02-25 14:37:16'),
	(65,4,17,1,'2021-03-13 16:31:29','2021-03-13 16:33:27'),
	(78,15,8,4,'2021-04-03 16:11:28','2021-04-03 16:11:39'),
	(81,1,8,8,'2021-04-16 15:44:16','2021-04-27 18:52:06');

/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '前端断点标记',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `parent_id`, `name`, `mark`, `image`, `created_at`, `updated_at`)
VALUES
	(1,0,'副食','m1','',NULL,NULL),
	(2,1,'粮油',NULL,'https://image.holyzq.com/cIQyW1Usyq67q9UUBXcLEo2UZsDQbjYGkfi54vm5.jpg',NULL,'2021-01-05 07:41:39'),
	(3,1,'生鲜',NULL,'https://image.holyzq.com/AUhTeaCTbuSYxeK84km5RyEXRvbi6qUBTRIcPO8p.jpg',NULL,'2021-01-05 07:41:51'),
	(4,1,'零食',NULL,'https://image.holyzq.com/KstUOWnQjCQL791yemBH9zxzDqXALFnbjpZ58tAT.jpg',NULL,'2021-01-05 07:42:02'),
	(5,0,'日化','m2','',NULL,NULL),
	(6,5,'卫生纸',NULL,'https://image.holyzq.com/kyTte3qCN1aA95OVqOFPjSs98gP8dRis9mazPKkn.jpg',NULL,'2021-01-05 07:42:56'),
	(7,5,'尿不湿',NULL,'https://image.holyzq.com/rJv2BBlOLpW8awYyegNpWfeBQnS2ULQ9YKZonRcG.jpg',NULL,'2021-01-05 07:43:07'),
	(8,5,'洗发水',NULL,'https://image.holyzq.com/PCbwV9O1Zidha43GZJAQLjFB9in5Cxovus7QWJAd.jpg',NULL,'2021-01-05 07:43:17'),
	(9,5,'沐浴露',NULL,'https://image.holyzq.com/UMMdCKhw3WIcY4PQ5QoCDGQtvfR5I4Xi3CQvXBGp.jpg',NULL,'2021-01-05 07:43:43'),
	(12,5,'针织',NULL,'https://image.holyzq.com/ZDzYaAcU7dvWdEBL8Ub7OU80hrFl73pOx78Bsine.png','2021-01-06 16:07:23','2021-01-06 16:07:23');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category_product`;

CREATE TABLE `category_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `category_product` WRITE;
/*!40000 ALTER TABLE `category_product` DISABLE KEYS */;

INSERT INTO `category_product` (`id`, `category_id`, `product_id`)
VALUES
	(1,12,1),
	(2,2,2),
	(3,7,3),
	(4,2,4),
	(5,8,5),
	(6,9,5),
	(7,9,6),
	(8,9,7),
	(9,4,8),
	(10,6,9),
	(11,12,10),
	(12,3,11),
	(13,12,14),
	(14,6,15),
	(15,3,16),
	(16,4,17);

/*!40000 ALTER TABLE `category_product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table collections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `collections`;

CREATE TABLE `collections` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `collections` WRITE;
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;

INSERT INTO `collections` (`id`, `customer_id`, `product_id`, `created_at`, `updated_at`)
VALUES
	(1,2,2,'2021-02-13 12:34:59','2021-02-13 12:34:59'),
	(2,3,8,'2021-02-13 19:35:06','2021-02-13 19:35:06'),
	(4,1,8,'2021-02-22 17:30:30','2021-02-22 17:30:30'),
	(8,1,10,'2021-02-22 17:55:09','2021-02-22 17:55:09'),
	(10,7,5,'2021-02-24 17:13:41','2021-02-24 17:13:41'),
	(12,7,10,'2021-02-26 12:24:14','2021-02-26 12:24:14'),
	(19,1,1,'2021-03-01 17:24:46','2021-03-01 17:24:46');

/*!40000 ALTER TABLE `collections` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table configs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `configs`;

CREATE TABLE `configs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `money` decimal(10,2) DEFAULT '0.00' COMMENT '设置下单金额',
  `receive` text COMMENT '领取优惠券说明',
  `point_money` decimal(10,3) DEFAULT '0.000' COMMENT '积分兑现比例 1：1000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `configs` WRITE;
/*!40000 ALTER TABLE `configs` DISABLE KEYS */;

INSERT INTO `configs` (`id`, `money`, `receive`, `point_money`, `created_at`, `updated_at`)
VALUES
	(1,300.00,'本次优惠券，全场商品均可使用。每位顾客只能领取一次，请在有效期内使用，过期无效！',0.001,'2021-02-10 19:15:23','2021-03-01 08:17:41');

/*!40000 ALTER TABLE `configs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table coupons
# ------------------------------------------------------------

DROP TABLE IF EXISTS `coupons`;

CREATE TABLE `coupons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '优惠券的标题',
  `value` decimal(10,0) DEFAULT NULL COMMENT '优惠券面值',
  `total` int(10) unsigned DEFAULT NULL COMMENT '全站可兑换的数量',
  `recived` int(10) DEFAULT '0' COMMENT '领取数',
  `used` int(10) DEFAULT '0' COMMENT '使用数量',
  `min_amount` decimal(10,2) DEFAULT '0.00' COMMENT '使用该优惠券的最低订单金额',
  `not_before` datetime DEFAULT NULL COMMENT '在这个时间之前不可用',
  `not_after` datetime DEFAULT NULL COMMENT '在这个时间之后不可用',
  `enabled` tinyint(1) DEFAULT '1' COMMENT '优惠券是否生效',
  `description` text COMMENT '使用说明',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;

INSERT INTO `coupons` (`id`, `name`, `value`, `total`, `recived`, `used`, `min_amount`, `not_before`, `not_after`, `enabled`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'实付满99元使用',10,100,13,0,99.00,'2021-02-23 00:00:00','2021-03-01 00:00:00',1,'\"实付满99元满减10元优惠券\"使用须知：\r\n\r\n\"实付满99元满减10元优惠券\"使用有效期：自领取之日起到规定过期时间内有效，逾期将自动作废。具体使用规定如下：\r\n\r\n您可以在下单时选择使用该优惠券进行付款，付款时等同现金支付，优惠券一经使用不能退换。另：未经许可，不得转让或做其他商业用途，否则一切后果自负！','2021-02-23 16:34:04','2021-02-26 21:16:57'),
	(2,'实付满1000元使用',150,10,10,0,1000.00,'2021-02-23 00:00:00','2021-02-28 00:00:00',1,'\"实付满1000元减150元优惠券\"使用须知：\r\n\r\n\"实付满1000元减150元优惠券\"使用有效期：自领取之日起到规定过期时间内有效，逾期将自动作废。具体使用规定如下：\r\n\r\n您可以在下单时选择使用该优惠券进行付款，付款时等同现金支付，优惠券一经使用不能退换。另：未经许可，不得转让或做其他商业用途，否则一切后果自负！','2021-02-23 16:55:59','2021-02-28 14:51:04'),
	(3,'实付满500元使用',50,50,6,0,500.00,'2021-03-01 00:00:00','2021-03-10 00:00:00',1,'\"实付满500元减50元优惠券\"使用须知：\r\n\r\n\"实付满500元减50元优惠券\"使用有效期：自领取之日起到规定过期时间内有效，逾期将自动作废。具体使用规定如下：\r\n\r\n您可以在下单时选择使用该优惠券进行付款，付款时等同现金支付，优惠券一经使用不能退换。另：未经许可，不得转让或做其他商业用途，否则一切后果自负！','2021-03-01 10:23:26','2021-03-01 19:32:21');

/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table customers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` tinyint(11) DEFAULT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `headimgurl` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;

INSERT INTO `customers` (`id`, `openid`, `sex`, `nickname`, `country`, `city`, `province`, `headimgurl`, `address_id`, `created_at`, `updated_at`)
VALUES
	(1,'oRjx76Va3JqY1cNrnxE96sLZCKac',1,'Holyzq','澳大利亚','墨尔本','维多利亚','https://thirdwx.qlogo.cn/mmopen/vi_32/hBG9icueGvjSE9K0Is55esZ3ykZl0ejal18L6uaQOGFn7KibammKoZfSpX2670SWTQVpOsJTMKIJlKudvegyBc3w/132',10,'2021-02-13 14:46:38','2021-04-15 23:04:57'),
	(2,'oRjx76QA0gOQqS7sEpW1AZbehulM',1,'王凯','中国','漳州','福建','https://thirdwx.qlogo.cn/mmopen/vi_32/ZOt05ibpnKCQRTtqA4ebggG0EeD1EHibST1FlYHG2tHpJZnlribGbqJkSDxJxiacZFZjdS3fckIv1hL1r1MLukn7XA/132',NULL,'2021-02-13 15:45:29','2021-02-13 15:45:29'),
	(3,'oRjx76dTbStZDud8ZbbMH-_cmK_c',2,'周清','中国','武汉','湖北','https://thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTJIF3zgOm7o2zHicAecaS2t9L7n0b1v41YnLh5gibnicUhsh2E30Hfm39Av9vLfsIfggN0pSZzibj0FUA/132',3,'2021-02-13 19:33:42','2021-03-18 01:46:01'),
	(4,'oRjx76SuH-0sL2XdqiVWLNikQTe0',1,'₂₀₂₁','中国','邵阳','湖南','https://thirdwx.qlogo.cn/mmopen/vi_32/DYAIOgq83erkq3BjhjRC4cpQFYX5QYJSjVrZx3syGqDoYQXibzH0NL7KMSDiboSZ5Iszyt554icUEsjqicVicm6WV0Q/132',9,'2021-02-14 09:54:28','2021-03-13 16:32:39'),
	(5,'oRjx76efEKCaHDE1-_qGUecdrrVU',1,'','JP','Abiko-shi','Chiba-ken','https://thirdwx.qlogo.cn/mmopen/vi_32/TALdklo5g04IKfCL66RreCexVRdeibCCxWXAIcfgw95gnNg4ZPsLg42qDicQGbunMBUySWNcFecYmUXkQFxm9r3Q/132',NULL,'2021-02-18 18:02:10','2021-02-18 18:02:10'),
	(6,'oRjx76ZfxHRzQg60HNjFE9fW65k0',1,'如果如果。','中国','武汉','湖北','https://thirdwx.qlogo.cn/mmopen/vi_32/bYHm9Zr4vIYOBbaY2HmWzGS523T1IuSSCorrqOrLZCEDPb0ibc38nxiaEO2hpCPneOgsxLvcpzqibPqb2aDpvbibJQ/132',NULL,'2021-02-18 19:25:26','2021-02-18 19:25:26'),
	(7,'oRjx76a-AOt3NxqlOlZF2OTJOH40',1,'Crush ：','也门','','','https://thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKNBnKxtV8icHcniaLpLIdsibqHlEs2gQhEUPNG0hDRJGL4OMZxl3e68xbQe5HsYqDgibl8GNWnIrWXMg/132',8,'2021-02-22 21:47:43','2021-03-12 22:10:39'),
	(8,'oRjx76ajMUTa2IsHZLsPRpwf_y5w',1,'哈里布朗','中国','黄石','湖北','https://thirdwx.qlogo.cn/mmopen/vi_32/syprRnNGKqLn7lfHz7W8spPzhO5icxzeXUria3Jh8duFnyFoOxTialzutibWEZKIqboobhriaSDqg15trPFhu9XXwiaw/132',NULL,'2021-02-23 10:16:45','2021-02-23 10:16:45'),
	(9,'oRjx76XnK6FXJwukuWj2UPEvD5dc',1,'You !   com on.','中国','武汉','湖北','https://thirdwx.qlogo.cn/mmopen/vi_32/DYAIOgq83eribIyaH21DXAoAV4prljMiax6UZXEnicuUKNeO59sDVkfKwZ4uLfhQgII4LLch26gOnFQ0A0oiciboxiaQ/132',NULL,'2021-02-24 18:18:52','2021-02-24 18:18:52'),
	(10,'oRjx76WXbb7pBC6csAarmTGMXM84',1,'A小纪','中国','黄石','湖北','https://thirdwx.qlogo.cn/mmopen/vi_32/bCPJIRjHtqibmFYUX4UwZ4vtpUETBRU8kCaEBhExLNTm0WELE3CukHBVkbG7qzuO4GhXoEbUKY4Griakb1M5fPjQ/132',NULL,'2021-02-25 14:36:54','2021-02-25 14:36:54'),
	(11,'oRjx76UPbg95CODf9SshRrotEAjc',1,'Nj-袁主管','中国','武汉','湖北','https://thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKwyPoUrHYibbrbX7Uhza263W9dnHU2YnzloYqu1qoKiacpY6vCaHsWaVibMZFzIbgI6H0tI3aVxunUA/132',NULL,'2021-03-02 21:41:40','2021-03-02 21:41:40'),
	(12,'oRjx76VIwtOuB17hmqbGsMPyhaUc',2,'58同镇～停洞2号站','中国','黔东南','贵州','https://thirdwx.qlogo.cn/mmopen/vi_32/JKXuicCj2ib7F1kozVcqOY5PEHWLMrHIj6JRQG9aGzoh0od98yqRdBXcE4MbjGiavBicbUDbqxhffEr5Jgewcp88icA/132',NULL,'2021-03-02 23:30:57','2021-03-02 23:30:57'),
	(13,'oRjx76cyl8mnud2h6KFYzzsB3RHE',1,'A  ','中国','武汉','湖北','https://thirdwx.qlogo.cn/mmopen/vi_32/nyeePZrHLwesMj1sicHGFRjh6He0Qh2nEwpT1EgsdG6PDDGibQe92mB4wOvwsUNjMKyvXRoayDKiadYJOkLquPicTA/132',NULL,'2021-03-04 18:18:58','2021-03-04 18:18:58'),
	(14,'oRjx76WER11svjv1LJ-Vl7U2WUls',2,'梅琳','中国','宜昌','湖北','https://thirdwx.qlogo.cn/mmopen/vi_32/lbSZAia9rYcZuB8ribcf7DkqqpWhkMKbZFTacoCLsgFRvXFvkDtwJUeHLZmL5bucdfO6uG6Rs20fGwRoibbWZUdew/132',NULL,'2021-03-05 18:32:46','2021-03-05 18:32:46'),
	(15,'oRjx76Y5M4Roxi3kdRyuv3QBidhQ',2,'刘靓青','中国','武汉','湖北','https://thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTJTEeDX3ThSgWsSdwhNPNyhRObCCO4yoVmX7gUVK6vhDfV8FBYT8ltSo5BRLN9KDo6PcB9XVgic0bA/132',NULL,'2021-04-03 16:11:10','2021-04-03 16:11:10');

/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table expresses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `expresses`;

CREATE TABLE `expresses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `code` varchar(45) CHARACTER SET utf8 DEFAULT '',
  `url` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `shipping_money` decimal(10,2) DEFAULT NULL,
  `shipping_free` decimal(10,2) DEFAULT NULL,
  `is_enable` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `expresses` WRITE;
/*!40000 ALTER TABLE `expresses` DISABLE KEYS */;

INSERT INTO `expresses` (`id`, `name`, `code`, `url`, `shipping_money`, `shipping_free`, `is_enable`, `created_at`, `updated_at`)
VALUES
	(1,'顺丰速运','shunfeng','www.shunfeng.com',10.00,0.00,1,'2017-08-29 13:56:33','2021-01-30 23:54:40'),
	(2,'韵达快递','yunda','www.yunda.com',8.00,0.00,1,'2017-08-29 13:57:37','2021-01-30 23:54:36'),
	(11,'京东快递','jd','https://www.jd.com/',0.00,0.00,1,'2021-02-01 13:24:14','2021-02-01 13:24:17');

/*!40000 ALTER TABLE `expresses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;

INSERT INTO `failed_jobs` (`id`, `connection`, `queue`, `payload`, `exception`, `failed_at`)
VALUES
	(1,'redis','default','{\"uuid\":\"995420c3-f0ff-4e3b-8bd1-51e0929ce4b6\",\"displayName\":\"App\\\\Jobs\\\\CloseOrder\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CloseOrder\",\"command\":\"O:19:\\\"App\\\\Jobs\\\\CloseOrder\\\":9:{s:8:\\\"\\u0000*\\u0000order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";i:30;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"},\"id\":\"fNn0YRyPYWNMgf7dnGvNBgzsyRDuyrfq\",\"attempts\":0}','Illuminate\\Database\\Eloquent\\ModelNotFoundException: No query results for model [App\\Models\\Order]. in /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php:481\nStack trace:\n#0 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(102): Illuminate\\Database\\Eloquent\\Builder->firstOrFail()\n#1 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(57): App\\Jobs\\CloseOrder->restoreModel(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#2 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesModels.php(45): App\\Jobs\\CloseOrder->getRestoredPropertyValue(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#3 [internal function]: App\\Jobs\\CloseOrder->__wakeup()\n#4 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(53): unserialize(\'O:19:\"App\\\\Jobs\\\\...\')\n#5 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\RedisJob), Array)\n#6 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#7 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(306): Illuminate\\Queue\\Worker->process(\'redis\', Object(Illuminate\\Queue\\Jobs\\RedisJob), Object(Illuminate\\Queue\\WorkerOptions))\n#8 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(132): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\RedisJob), \'redis\', Object(Illuminate\\Queue\\WorkerOptions))\n#9 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(112): Illuminate\\Queue\\Worker->daemon(\'redis\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#10 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'redis\', \'default\')\n#11 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#12 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#13 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#14 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#15 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#16 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Command.php(134): Illuminate\\Container\\Container->call(Array)\n#17 /var/www/shopCenter/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#18 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#19 /var/www/shopCenter/vendor/symfony/console/Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 /var/www/shopCenter/vendor/symfony/console/Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#21 /var/www/shopCenter/vendor/symfony/console/Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#22 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#23 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#24 /var/www/shopCenter/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 {main}','2021-03-17 10:03:27'),
	(2,'redis','default','{\"uuid\":\"2be4985e-81f1-4e1d-ac3c-70c869853fea\",\"displayName\":\"App\\\\Jobs\\\\CloseOrder\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CloseOrder\",\"command\":\"O:19:\\\"App\\\\Jobs\\\\CloseOrder\\\":9:{s:8:\\\"\\u0000*\\u0000order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:6;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";i:30;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"},\"id\":\"ZfW9SMfJZrRdk2jRhAc4aCDm5HefP1vD\",\"attempts\":0}','Illuminate\\Database\\Eloquent\\ModelNotFoundException: No query results for model [App\\Models\\Order]. in /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php:481\nStack trace:\n#0 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(102): Illuminate\\Database\\Eloquent\\Builder->firstOrFail()\n#1 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(57): App\\Jobs\\CloseOrder->restoreModel(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#2 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesModels.php(45): App\\Jobs\\CloseOrder->getRestoredPropertyValue(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#3 [internal function]: App\\Jobs\\CloseOrder->__wakeup()\n#4 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(53): unserialize(\'O:19:\"App\\\\Jobs\\\\...\')\n#5 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\RedisJob), Array)\n#6 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#7 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(306): Illuminate\\Queue\\Worker->process(\'redis\', Object(Illuminate\\Queue\\Jobs\\RedisJob), Object(Illuminate\\Queue\\WorkerOptions))\n#8 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(132): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\RedisJob), \'redis\', Object(Illuminate\\Queue\\WorkerOptions))\n#9 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(112): Illuminate\\Queue\\Worker->daemon(\'redis\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#10 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'redis\', \'default\')\n#11 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#12 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#13 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#14 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#15 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#16 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Command.php(134): Illuminate\\Container\\Container->call(Array)\n#17 /var/www/shopCenter/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#18 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#19 /var/www/shopCenter/vendor/symfony/console/Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 /var/www/shopCenter/vendor/symfony/console/Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#21 /var/www/shopCenter/vendor/symfony/console/Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#22 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#23 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#24 /var/www/shopCenter/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 {main}','2021-03-17 10:04:09'),
	(3,'redis','default','{\"uuid\":\"0dc19eb6-a21b-40f2-8075-ab8b3a97ad3f\",\"displayName\":\"App\\\\Jobs\\\\CloseOrder\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CloseOrder\",\"command\":\"O:19:\\\"App\\\\Jobs\\\\CloseOrder\\\":9:{s:8:\\\"\\u0000*\\u0000order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";i:30;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"},\"id\":\"zQ6SKmgVX0GLKKFqdC7kQNSZKc8hNZsS\",\"attempts\":0}','Illuminate\\Database\\Eloquent\\ModelNotFoundException: No query results for model [App\\Models\\Order]. in /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php:481\nStack trace:\n#0 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(102): Illuminate\\Database\\Eloquent\\Builder->firstOrFail()\n#1 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(57): App\\Jobs\\CloseOrder->restoreModel(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#2 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesModels.php(45): App\\Jobs\\CloseOrder->getRestoredPropertyValue(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#3 [internal function]: App\\Jobs\\CloseOrder->__wakeup()\n#4 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(53): unserialize(\'O:19:\"App\\\\Jobs\\\\...\')\n#5 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\RedisJob), Array)\n#6 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#7 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(306): Illuminate\\Queue\\Worker->process(\'redis\', Object(Illuminate\\Queue\\Jobs\\RedisJob), Object(Illuminate\\Queue\\WorkerOptions))\n#8 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(132): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\RedisJob), \'redis\', Object(Illuminate\\Queue\\WorkerOptions))\n#9 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(112): Illuminate\\Queue\\Worker->daemon(\'redis\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#10 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'redis\', \'default\')\n#11 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#12 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#13 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#14 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#15 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#16 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Command.php(134): Illuminate\\Container\\Container->call(Array)\n#17 /var/www/shopCenter/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#18 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#19 /var/www/shopCenter/vendor/symfony/console/Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 /var/www/shopCenter/vendor/symfony/console/Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#21 /var/www/shopCenter/vendor/symfony/console/Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#22 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#23 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#24 /var/www/shopCenter/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 {main}','2021-03-17 10:07:33'),
	(4,'redis','default','{\"uuid\":\"9bb44867-24af-497e-971f-adfc37f9e25f\",\"displayName\":\"App\\\\Jobs\\\\CloseOrder\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CloseOrder\",\"command\":\"O:19:\\\"App\\\\Jobs\\\\CloseOrder\\\":9:{s:8:\\\"\\u0000*\\u0000order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";i:30;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"},\"id\":\"nfTUpokkv4xQfJ7qf5n7QJu2vLFcW3Rd\",\"attempts\":0}','Illuminate\\Database\\Eloquent\\ModelNotFoundException: No query results for model [App\\Models\\Order]. in /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php:481\nStack trace:\n#0 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(102): Illuminate\\Database\\Eloquent\\Builder->firstOrFail()\n#1 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(57): App\\Jobs\\CloseOrder->restoreModel(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#2 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesModels.php(45): App\\Jobs\\CloseOrder->getRestoredPropertyValue(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#3 [internal function]: App\\Jobs\\CloseOrder->__wakeup()\n#4 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(53): unserialize(\'O:19:\"App\\\\Jobs\\\\...\')\n#5 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\RedisJob), Array)\n#6 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#7 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(306): Illuminate\\Queue\\Worker->process(\'redis\', Object(Illuminate\\Queue\\Jobs\\RedisJob), Object(Illuminate\\Queue\\WorkerOptions))\n#8 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(132): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\RedisJob), \'redis\', Object(Illuminate\\Queue\\WorkerOptions))\n#9 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(112): Illuminate\\Queue\\Worker->daemon(\'redis\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#10 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'redis\', \'default\')\n#11 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#12 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#13 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#14 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#15 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#16 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Command.php(134): Illuminate\\Container\\Container->call(Array)\n#17 /var/www/shopCenter/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#18 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#19 /var/www/shopCenter/vendor/symfony/console/Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 /var/www/shopCenter/vendor/symfony/console/Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#21 /var/www/shopCenter/vendor/symfony/console/Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#22 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#23 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#24 /var/www/shopCenter/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 {main}','2021-03-17 10:08:42'),
	(5,'redis','default','{\"uuid\":\"ffb3c0a1-eb23-4f5f-9d46-de06bab66fce\",\"displayName\":\"App\\\\Jobs\\\\CloseOrder\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CloseOrder\",\"command\":\"O:19:\\\"App\\\\Jobs\\\\CloseOrder\\\":9:{s:8:\\\"\\u0000*\\u0000order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";i:30;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"},\"id\":\"qybxN4Hs2rkkLLWOqaEaMU0UPy0d8guq\",\"attempts\":0}','Illuminate\\Database\\Eloquent\\ModelNotFoundException: No query results for model [App\\Models\\Order]. in /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php:481\nStack trace:\n#0 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(102): Illuminate\\Database\\Eloquent\\Builder->firstOrFail()\n#1 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(57): App\\Jobs\\CloseOrder->restoreModel(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#2 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesModels.php(45): App\\Jobs\\CloseOrder->getRestoredPropertyValue(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#3 [internal function]: App\\Jobs\\CloseOrder->__wakeup()\n#4 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(53): unserialize(\'O:19:\"App\\\\Jobs\\\\...\')\n#5 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\RedisJob), Array)\n#6 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#7 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(306): Illuminate\\Queue\\Worker->process(\'redis\', Object(Illuminate\\Queue\\Jobs\\RedisJob), Object(Illuminate\\Queue\\WorkerOptions))\n#8 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(132): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\RedisJob), \'redis\', Object(Illuminate\\Queue\\WorkerOptions))\n#9 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(112): Illuminate\\Queue\\Worker->daemon(\'redis\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#10 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'redis\', \'default\')\n#11 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#12 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#13 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#14 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#15 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#16 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Command.php(134): Illuminate\\Container\\Container->call(Array)\n#17 /var/www/shopCenter/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#18 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#19 /var/www/shopCenter/vendor/symfony/console/Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 /var/www/shopCenter/vendor/symfony/console/Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#21 /var/www/shopCenter/vendor/symfony/console/Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#22 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#23 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#24 /var/www/shopCenter/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 {main}','2021-03-17 10:12:16'),
	(6,'redis','default','{\"uuid\":\"264c3de8-8250-497f-b68f-8904109313ce\",\"displayName\":\"App\\\\Jobs\\\\CloseOrder\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CloseOrder\",\"command\":\"O:19:\\\"App\\\\Jobs\\\\CloseOrder\\\":9:{s:8:\\\"\\u0000*\\u0000order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";i:30;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"},\"id\":\"oerGiArFIvyhdECVNFmXkBnJ9dl8DPsS\",\"attempts\":0}','Illuminate\\Database\\Eloquent\\ModelNotFoundException: No query results for model [App\\Models\\Order]. in /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php:481\nStack trace:\n#0 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(102): Illuminate\\Database\\Eloquent\\Builder->firstOrFail()\n#1 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(57): App\\Jobs\\CloseOrder->restoreModel(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#2 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesModels.php(45): App\\Jobs\\CloseOrder->getRestoredPropertyValue(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#3 [internal function]: App\\Jobs\\CloseOrder->__wakeup()\n#4 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(53): unserialize(\'O:19:\"App\\\\Jobs\\\\...\')\n#5 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\RedisJob), Array)\n#6 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#7 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(306): Illuminate\\Queue\\Worker->process(\'redis\', Object(Illuminate\\Queue\\Jobs\\RedisJob), Object(Illuminate\\Queue\\WorkerOptions))\n#8 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(132): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\RedisJob), \'redis\', Object(Illuminate\\Queue\\WorkerOptions))\n#9 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(112): Illuminate\\Queue\\Worker->daemon(\'redis\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#10 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'redis\', \'default\')\n#11 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#12 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#13 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#14 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#15 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#16 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Command.php(134): Illuminate\\Container\\Container->call(Array)\n#17 /var/www/shopCenter/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#18 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#19 /var/www/shopCenter/vendor/symfony/console/Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 /var/www/shopCenter/vendor/symfony/console/Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#21 /var/www/shopCenter/vendor/symfony/console/Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#22 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#23 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#24 /var/www/shopCenter/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 {main}','2021-03-17 10:16:34'),
	(7,'redis','default','{\"uuid\":\"7cbbed99-0040-470a-b9c1-1c2c3254f544\",\"displayName\":\"App\\\\Jobs\\\\CloseOrder\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CloseOrder\",\"command\":\"O:19:\\\"App\\\\Jobs\\\\CloseOrder\\\":9:{s:8:\\\"\\u0000*\\u0000order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";i:30;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"},\"id\":\"oeiBazy6fSSUpW6P9RnA2jgQozg77tF3\",\"attempts\":0}','Illuminate\\Database\\Eloquent\\ModelNotFoundException: No query results for model [App\\Models\\Order]. in /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php:481\nStack trace:\n#0 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(102): Illuminate\\Database\\Eloquent\\Builder->firstOrFail()\n#1 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(57): App\\Jobs\\CloseOrder->restoreModel(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#2 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesModels.php(45): App\\Jobs\\CloseOrder->getRestoredPropertyValue(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#3 [internal function]: App\\Jobs\\CloseOrder->__wakeup()\n#4 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(53): unserialize(\'O:19:\"App\\\\Jobs\\\\...\')\n#5 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\RedisJob), Array)\n#6 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#7 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(306): Illuminate\\Queue\\Worker->process(\'redis\', Object(Illuminate\\Queue\\Jobs\\RedisJob), Object(Illuminate\\Queue\\WorkerOptions))\n#8 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(132): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\RedisJob), \'redis\', Object(Illuminate\\Queue\\WorkerOptions))\n#9 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(112): Illuminate\\Queue\\Worker->daemon(\'redis\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#10 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'redis\', \'default\')\n#11 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#12 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#13 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#14 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#15 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#16 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Command.php(134): Illuminate\\Container\\Container->call(Array)\n#17 /var/www/shopCenter/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#18 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#19 /var/www/shopCenter/vendor/symfony/console/Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 /var/www/shopCenter/vendor/symfony/console/Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#21 /var/www/shopCenter/vendor/symfony/console/Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#22 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#23 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#24 /var/www/shopCenter/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 {main}','2021-03-17 10:17:31'),
	(8,'redis','default','{\"uuid\":\"9e6b818d-fef9-43f6-b37b-5421bae616d1\",\"displayName\":\"App\\\\Jobs\\\\CloseOrder\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CloseOrder\",\"command\":\"O:19:\\\"App\\\\Jobs\\\\CloseOrder\\\":9:{s:8:\\\"\\u0000*\\u0000order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";i:30;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"},\"id\":\"pTZKVbObH61xifTg7A7CMNsbUEyTbLpj\",\"attempts\":0}','Illuminate\\Database\\Eloquent\\ModelNotFoundException: No query results for model [App\\Models\\Order]. in /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php:481\nStack trace:\n#0 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(102): Illuminate\\Database\\Eloquent\\Builder->firstOrFail()\n#1 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(57): App\\Jobs\\CloseOrder->restoreModel(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#2 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/SerializesModels.php(45): App\\Jobs\\CloseOrder->getRestoredPropertyValue(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#3 [internal function]: App\\Jobs\\CloseOrder->__wakeup()\n#4 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(53): unserialize(\'O:19:\"App\\\\Jobs\\\\...\')\n#5 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\RedisJob), Array)\n#6 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#7 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(306): Illuminate\\Queue\\Worker->process(\'redis\', Object(Illuminate\\Queue\\Jobs\\RedisJob), Object(Illuminate\\Queue\\WorkerOptions))\n#8 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(132): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\RedisJob), \'redis\', Object(Illuminate\\Queue\\WorkerOptions))\n#9 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(112): Illuminate\\Queue\\Worker->daemon(\'redis\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#10 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'redis\', \'default\')\n#11 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#12 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#13 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#14 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#15 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Container/Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#16 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Command.php(134): Illuminate\\Container\\Container->call(Array)\n#17 /var/www/shopCenter/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#18 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#19 /var/www/shopCenter/vendor/symfony/console/Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 /var/www/shopCenter/vendor/symfony/console/Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#21 /var/www/shopCenter/vendor/symfony/console/Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#22 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Console/Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#23 /var/www/shopCenter/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#24 /var/www/shopCenter/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 {main}','2021-03-17 10:18:28');

/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table get_coupons
# ------------------------------------------------------------

DROP TABLE IF EXISTS `get_coupons`;

CREATE TABLE `get_coupons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '优惠券使用状态，1：未使用；2：已使用',
  `expired` tinyint(1) DEFAULT '1' COMMENT '是否过期，1：未过期；0：已过期',
  `expired_at` datetime DEFAULT NULL COMMENT '优惠券过期时间',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `get_coupons` WRITE;
/*!40000 ALTER TABLE `get_coupons` DISABLE KEYS */;

INSERT INTO `get_coupons` (`id`, `customer_id`, `coupon_id`, `status`, `expired`, `expired_at`, `created_at`, `updated_at`)
VALUES
	(1,1,1,1,0,'2021-03-01 00:00:00','2021-02-26 16:09:06','2021-04-15 23:06:56'),
	(2,4,1,1,1,'2021-02-28 00:00:00','2021-02-26 19:02:05','2021-02-26 19:02:05'),
	(3,3,1,2,0,'2021-02-28 00:00:00','2021-02-26 21:16:57','2021-03-05 20:56:11'),
	(16,7,3,1,1,'2021-03-10 00:00:00','2021-03-01 12:47:48','2021-03-01 12:47:48'),
	(17,1,3,2,0,'2021-03-10 00:00:00','2021-03-01 17:30:20','2021-04-15 23:06:56'),
	(18,3,3,1,1,'2021-03-10 00:00:00','2021-03-01 19:32:21','2021-03-01 19:32:21');

/*!40000 ALTER TABLE `get_coupons` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2021_01_02_200245_create_categories_table',2);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table notices
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notices`;

CREATE TABLE `notices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `notices` WRITE;
/*!40000 ALTER TABLE `notices` DISABLE KEYS */;

INSERT INTO `notices` (`id`, `title`, `created_at`, `updated_at`)
VALUES
	(1,'商城开业狂欢！部分功能暂未开通，持续升级！','2021-01-07 18:32:54','2021-01-07 18:32:54'),
	(2,'新品上架啦，欢迎新老顾客前来选购！',NULL,'2021-02-24 14:38:03'),
	(3,'商城发放优惠券啦~，福利多多，赶快去抢喽~',NULL,'2021-02-24 14:39:00');

/*!40000 ALTER TABLE `notices` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_address
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_address`;

CREATE TABLE `order_address` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `province` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `city` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `area` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `detail` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `name` varchar(45) CHARACTER SET utf8 DEFAULT '',
  `tel` varchar(45) CHARACTER SET utf8 DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `order_address` WRITE;
/*!40000 ALTER TABLE `order_address` DISABLE KEYS */;

INSERT INTO `order_address` (`id`, `order_id`, `province`, `city`, `area`, `detail`, `name`, `tel`)
VALUES
	(2,2,'湖北','武汉','江夏区','纸坊街武昌大道简朴寨','黄栋进','13419566683'),
	(7,7,'湖北','武汉','江夏区','纸坊街武昌大道简朴寨','黄栋进','13419566683'),
	(11,11,'湖北','武汉','江夏区','纸坊街武昌大道简朴寨','黄栋进','13419566683'),
	(12,12,'湖北','武汉','江夏区','纸坊街武昌大道简朴寨','黄栋进','13419566683'),
	(14,14,'湖北','武汉','江夏区','纸坊街武昌大道简朴寨','黄栋进','13419566683'),
	(17,17,'湖北','仙桃','仙桃','23','在一起','111111111111'),
	(19,19,'湖北','武汉','江夏区','纸坊街武昌大道简朴寨','黄栋进','13419566683'),
	(21,21,'湖北','武汉','江夏区','周家湾','周清','18717150321'),
	(23,23,'湖北','武汉','江夏区','纸坊街武昌大道简朴寨','黄栋进','13419566683'),
	(25,25,'湖北','武汉','江夏区','纸坊街武昌大道简朴寨','黄栋进','13419566683'),
	(26,26,'湖北','武汉','江夏区','纸坊街武昌大道简朴寨','黄栋进','13419566683'),
	(27,27,'上海','上海市','徐汇区','田园一路广谱大厦一楼门卫','huangdj','13888888888'),
	(28,28,'上海','上海市','徐汇区','田园一路广谱大厦一楼门卫','huangdj','13888888888'),
	(29,29,'上海','上海市','徐汇区','田园一路广谱大厦一楼门卫','huangdj','13888888888'),
	(30,30,'湖北','武汉','江夏区','周家湾','周清','18717150321'),
	(31,31,'上海','上海市','徐汇区','田园一路广谱大厦一楼门卫','huangdj','13888888888'),
	(34,34,'上海','上海市','徐汇区','田园一路广谱大厦一楼门卫','huangdj','13888888888'),
	(35,35,'上海','上海市','徐汇区','田园一路广谱大厦一楼门卫','huangdj','13888888888'),
	(36,36,'上海','上海市','徐汇区','田园一路广谱大厦一楼门卫','huangdj','13888888888'),
	(37,37,'湖北','仙桃','仙桃','23','在一起','111111111111'),
	(38,38,'上海','上海市','徐汇区','田园一路广谱大厦一楼门卫','huangdj','13888888888'),
	(39,39,'湖北','武汉','江夏区','纸坊街武昌大道简朴寨','黄栋进','13419566683'),
	(40,40,'湖北','武汉','江夏区','周家湾','周清','18717150321'),
	(41,41,'湖北','武汉','江夏区','纸坊街武昌大道简朴寨','黄栋进','13419566683'),
	(42,42,'北京','北京市','东城区','匿名','默默','555555'),
	(43,43,'北京','北京市','东城区','匿名','默默','555555'),
	(44,44,'北京','北京市','东城区','匿名','默默','555555'),
	(45,45,'湖北','武汉','江夏区','纸坊街武昌大道简朴寨','黄栋进','13419566683'),
	(46,46,'北京','北京市','东城区','匿名','默默','555555'),
	(47,47,'湖北','武汉','江夏区','纸坊街武昌大道简朴寨','黄栋进','13419566683'),
	(48,48,'湖北','武汉','江夏区','纸坊街武昌大道简朴寨','黄栋进','13419566683'),
	(49,49,'内蒙古自治区','呼和浩特市','土默特左旗','我们不熟没关系，天这么热一会就熟了','好好学习','13212345678');

/*!40000 ALTER TABLE `order_address` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_products`;

CREATE TABLE `order_products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `num` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `order_products` WRITE;
/*!40000 ALTER TABLE `order_products` DISABLE KEYS */;

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `num`)
VALUES
	(1,2,8,5),
	(2,2,7,1),
	(10,7,7,1),
	(14,11,7,1),
	(15,12,7,1),
	(16,12,8,5),
	(19,14,7,1),
	(20,14,8,5),
	(25,17,8,1),
	(26,17,11,3),
	(27,17,5,2),
	(30,19,7,1),
	(31,19,8,8),
	(34,21,9,5),
	(35,21,8,1),
	(39,23,1,2),
	(40,23,4,3),
	(41,23,8,2),
	(43,25,2,1),
	(44,26,8,5),
	(45,27,4,2),
	(46,27,8,5),
	(47,27,16,2),
	(48,28,17,8),
	(49,29,17,9),
	(50,30,14,6),
	(51,30,17,7),
	(52,31,15,11),
	(55,34,14,31),
	(56,35,17,9),
	(57,36,2,1),
	(58,37,11,4),
	(59,37,8,3),
	(60,38,17,8),
	(61,39,15,11),
	(62,40,17,8),
	(63,41,15,11),
	(64,42,4,4),
	(65,43,8,5),
	(66,44,11,1),
	(67,44,3,1),
	(68,45,9,1),
	(69,45,4,4),
	(70,46,5,6),
	(71,47,2,2),
	(72,48,8,5),
	(73,49,9,5);

/*!40000 ALTER TABLE `order_products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_reminds
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_reminds`;

CREATE TABLE `order_reminds` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `out_trade_no` varchar(255) DEFAULT NULL COMMENT '订单号',
  `customer_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `express_id` int(11) NOT NULL DEFAULT '0',
  `express_code` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `express_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pay_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1：线上支付；2：货到付款',
  `total_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `pay_time` timestamp NULL DEFAULT NULL COMMENT '支付时间',
  `picking_time` timestamp NULL DEFAULT NULL COMMENT '配货时间',
  `shipping_time` timestamp NULL DEFAULT NULL COMMENT '发货时间',
  `finish_time` timestamp NULL DEFAULT NULL COMMENT '完成时间',
  `message` varchar(255) DEFAULT NULL COMMENT '订单留言',
  `closed` tinyint(1) DEFAULT '1' COMMENT '1：正常订单，0：超时订单',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`id`, `out_trade_no`, `customer_id`, `status`, `express_id`, `express_code`, `express_money`, `pay_type`, `total_price`, `created_at`, `pay_time`, `picking_time`, `shipping_time`, `finish_time`, `message`, `closed`, `updated_at`)
VALUES
	(2,'20210227015058',1,1,0,'',0.00,1,370.90,'2021-02-27 01:50:58',NULL,NULL,NULL,NULL,NULL,1,'2021-02-27 01:50:58'),
	(7,'20210227174616',1,1,0,'',0.00,1,29.90,'2021-02-27 17:46:16',NULL,NULL,NULL,NULL,NULL,0,'2021-03-17 10:07:21'),
	(11,'20210228151323',1,1,0,'',0.00,1,19.90,'2021-02-28 15:13:23',NULL,NULL,NULL,NULL,NULL,0,'2021-03-17 10:13:10'),
	(12,'20210301112801',1,1,0,'',0.00,1,330.90,'2021-03-01 11:28:01',NULL,NULL,NULL,NULL,NULL,0,'2021-03-17 10:15:58'),
	(14,'20210301115018',1,1,0,'',0.00,1,380.90,'2021-03-01 11:50:18',NULL,NULL,NULL,NULL,NULL,0,'2021-03-17 10:16:37'),
	(17,'20210301124719',7,1,0,'',0.00,1,375.80,'2021-03-01 12:47:19',NULL,NULL,NULL,NULL,NULL,0,'2021-03-17 10:20:25'),
	(19,'20210301125723',1,1,0,'',0.00,1,541.50,'2021-03-01 12:57:23',NULL,NULL,NULL,NULL,NULL,1,'2021-03-01 12:57:23'),
	(21,'20210301193324',3,1,0,'',0.00,1,402.50,'2021-03-01 19:33:24',NULL,NULL,NULL,NULL,NULL,1,'2021-03-01 19:33:24'),
	(23,'20210302112410',1,1,0,'',0.00,2,446.50,'2021-03-02 11:24:11',NULL,NULL,NULL,NULL,NULL,1,'2021-03-02 11:24:11'),
	(25,'20210302145145',1,1,0,'',0.00,1,1649.00,'2021-03-02 14:51:45',NULL,NULL,NULL,NULL,NULL,1,'2021-03-02 14:51:45'),
	(26,'20210302145428',1,1,0,'',0.00,1,351.00,'2021-03-02 14:54:28',NULL,NULL,NULL,NULL,NULL,1,'2021-03-02 14:54:28'),
	(27,'20210305185949',1,1,0,'',0.00,1,524.60,'2021-03-05 18:59:49',NULL,NULL,NULL,NULL,NULL,1,'2021-03-05 18:59:49'),
	(28,'20210305192105',1,1,0,'',0.00,1,319.20,'2021-03-05 19:21:05',NULL,NULL,NULL,NULL,NULL,1,'2021-03-05 19:21:05'),
	(29,'20210305193129',1,1,0,'',0.00,1,359.10,'2021-03-05 19:31:29',NULL,NULL,NULL,NULL,NULL,1,'2021-03-05 19:31:29'),
	(30,'20210305205851',3,1,0,'',0.00,1,338.70,'2021-03-05 20:58:51',NULL,NULL,NULL,NULL,NULL,1,'2021-03-05 20:58:51'),
	(31,'20210306003039',1,1,0,'',0.00,1,328.90,'2021-03-06 00:30:39',NULL,NULL,NULL,NULL,NULL,1,'2021-03-06 00:30:39'),
	(34,'20210306014018',1,1,0,'',0.00,1,306.90,'2021-03-06 01:40:18',NULL,NULL,NULL,NULL,NULL,1,'2021-03-06 01:40:18'),
	(35,'20210306014416',1,6,2,'23232',0.00,1,359.10,'2021-03-06 01:44:16','2021-03-06 01:50:32','2021-03-09 11:20:44','2021-03-09 21:34:39','2021-03-20 09:38:22',NULL,1,'2021-03-23 06:39:44'),
	(36,'20210306014732',1,6,11,'JD0035269525463',0.00,1,1699.00,'2021-03-06 01:47:32','2021-03-06 01:50:32','2021-03-08 16:08:38','2021-03-08 16:08:57','2021-03-08 16:10:47',NULL,1,'2021-03-08 16:11:29'),
	(37,'20210308204146',7,4,11,'JD0035269525463',0.00,1,448.20,'2021-03-08 20:41:46',NULL,'2021-03-10 09:58:13','2021-03-10 10:08:46',NULL,NULL,1,'2021-03-10 10:08:46'),
	(38,'20210310151047',1,1,0,'',0.00,1,319.20,'2021-03-10 15:10:47',NULL,NULL,NULL,NULL,'急用，请尽快发货',0,'2021-03-10 15:35:51'),
	(39,'20210310154026',1,1,0,'',0.00,1,328.90,'2021-03-10 15:40:26',NULL,NULL,NULL,NULL,NULL,0,'2021-03-10 15:40:58'),
	(40,'20210310210325',3,1,0,'',0.00,1,319.20,'2021-03-15 21:03:25',NULL,NULL,NULL,NULL,NULL,0,'2021-03-10 21:33:26'),
	(41,'20210310210409',1,1,0,'',0.00,1,328.90,'2021-03-17 21:04:09',NULL,NULL,NULL,NULL,NULL,0,'2021-03-10 21:34:11'),
	(42,'20210331203313',7,1,0,'',0.00,1,307.60,'2021-03-31 20:33:13',NULL,NULL,NULL,NULL,NULL,0,'2021-03-31 21:03:13'),
	(43,'20210331203414',7,1,0,'',0.00,1,351.00,'2021-03-31 20:34:14',NULL,NULL,NULL,NULL,NULL,0,'2021-03-31 21:04:16'),
	(44,'20210331221917',7,1,0,'',0.00,1,328.00,'2021-03-31 22:19:17',NULL,NULL,NULL,NULL,NULL,0,'2021-03-31 22:49:18'),
	(45,'20210401175409',1,1,0,'',0.00,1,372.50,'2021-04-01 17:54:09',NULL,NULL,NULL,NULL,NULL,0,'2021-04-01 18:24:11'),
	(46,'20210402114442',7,1,0,'',0.00,1,358.80,'2021-04-02 11:44:42',NULL,NULL,NULL,NULL,NULL,0,'2021-04-02 12:14:43'),
	(47,'20210402125810',1,1,0,'',0.00,1,3398.00,'2021-04-02 12:58:10',NULL,NULL,NULL,NULL,NULL,0,'2021-04-02 13:28:12'),
	(48,'20210406162545',1,1,0,'',0.00,1,351.00,'2021-04-06 16:25:45',NULL,NULL,NULL,NULL,NULL,0,'2021-04-06 16:55:47'),
	(49,'20210415230523',1,1,0,'',0.00,1,324.50,'2021-04-15 23:05:23',NULL,NULL,NULL,NULL,NULL,0,'2021-04-15 23:35:24');

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table points
# ------------------------------------------------------------

DROP TABLE IF EXISTS `points`;

CREATE TABLE `points` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL COMMENT '所属会员',
  `order_id` int(11) DEFAULT NULL COMMENT '所属订单',
  `scores` int(11) DEFAULT NULL COMMENT '积分',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `points` WRITE;
/*!40000 ALTER TABLE `points` DISABLE KEYS */;

INSERT INTO `points` (`id`, `customer_id`, `order_id`, `scores`, `created_at`, `updated_at`)
VALUES
	(1,1,2,370,'2021-02-27 01:50:58','2021-02-27 01:50:58'),
	(6,1,7,29,'2021-02-27 17:46:16','2021-02-27 17:46:16'),
	(10,1,11,19,'2021-02-28 15:13:23','2021-02-28 15:13:23'),
	(11,1,12,330,'2021-03-01 11:28:01','2021-03-01 11:28:01'),
	(13,1,14,380,'2021-03-01 11:50:18','2021-03-01 11:50:18'),
	(16,7,17,375,'2021-03-01 12:47:19','2021-03-01 12:47:19'),
	(18,1,19,541,'2021-03-01 12:57:23','2021-03-01 12:57:23'),
	(20,3,21,402,'2021-03-01 19:33:24','2021-03-01 19:33:24'),
	(22,1,23,446,'2021-03-02 11:24:11','2021-03-02 11:24:11'),
	(24,1,25,1649,'2021-03-02 14:51:45','2021-03-02 14:51:45'),
	(25,1,26,351,'2021-03-02 14:54:28','2021-03-02 14:54:28'),
	(26,1,27,524,'2021-03-05 18:59:49','2021-03-05 18:59:49'),
	(27,1,28,319,'2021-03-05 19:21:05','2021-03-05 19:21:05'),
	(28,1,29,359,'2021-03-05 19:31:29','2021-03-05 19:31:29'),
	(29,3,30,338,'2021-03-05 20:58:51','2021-03-05 20:58:51'),
	(30,1,31,328,'2021-03-06 00:30:39','2021-03-06 00:30:39'),
	(33,1,34,306,'2021-03-06 01:40:18','2021-03-06 01:40:18'),
	(34,1,35,359,'2021-03-06 01:44:16','2021-03-06 01:44:16'),
	(35,1,36,1699,'2021-03-06 01:47:32','2021-03-06 01:47:32'),
	(36,7,37,448,'2021-03-08 20:41:46','2021-03-08 20:41:46'),
	(37,1,38,319,'2021-03-10 15:10:47','2021-03-10 15:10:47'),
	(38,1,39,328,'2021-03-10 15:40:26','2021-03-10 15:40:26'),
	(39,3,40,319,'2021-03-10 21:03:25','2021-03-10 21:03:25'),
	(40,1,41,328,'2021-03-10 21:04:09','2021-03-10 21:04:09'),
	(41,7,42,307,'2021-03-31 20:33:13','2021-03-31 20:33:13'),
	(42,7,43,351,'2021-03-31 20:34:14','2021-03-31 20:34:14'),
	(43,7,44,328,'2021-03-31 22:19:17','2021-03-31 22:19:17'),
	(44,1,45,372,'2021-04-01 17:54:09','2021-04-01 17:54:09'),
	(45,7,46,358,'2021-04-02 11:44:42','2021-04-02 11:44:42'),
	(46,1,47,3398,'2021-04-02 12:58:10','2021-04-02 12:58:10'),
	(47,1,48,351,'2021-04-06 16:25:45','2021-04-06 16:25:45'),
	(48,1,49,324,'2021-04-15 23:05:23','2021-04-15 23:05:23');

/*!40000 ALTER TABLE `points` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_galleries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_galleries`;

CREATE TABLE `product_galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `product_galleries` WRITE;
/*!40000 ALTER TABLE `product_galleries` DISABLE KEYS */;

INSERT INTO `product_galleries` (`id`, `product_id`, `img`, `updated_at`, `created_at`)
VALUES
	(1,1,'https://image.holyzq.com/20210106115135_437011.jpg','2021-01-06 19:54:18','2021-01-06 19:54:18'),
	(2,1,'https://image.holyzq.com/20210106115135_997441.jpg','2021-01-06 19:54:18','2021-01-06 19:54:18'),
	(3,1,'https://image.holyzq.com/20210106115135_284084.jpg','2021-01-06 19:54:18','2021-01-06 19:54:18'),
	(4,2,'https://image.holyzq.com/20210107111949_127692.jpg','2021-01-07 19:22:16','2021-01-07 19:22:16'),
	(5,2,'https://image.holyzq.com/20210107111950_916060.jpg','2021-01-07 19:22:16','2021-01-07 19:22:16'),
	(6,2,'https://image.holyzq.com/20210107111950_141685.jpg','2021-01-07 19:22:16','2021-01-07 19:22:16'),
	(7,3,'https://image.holyzq.com/20210107112707_512161.jpg','2021-01-07 19:29:33','2021-01-07 19:29:33'),
	(8,3,'https://image.holyzq.com/20210107112707_455767.jpg','2021-01-07 19:29:33','2021-01-07 19:29:33'),
	(9,3,'https://image.holyzq.com/20210107112707_449803.jpg','2021-01-07 19:29:33','2021-01-07 19:29:33'),
	(10,4,'https://image.holyzq.com/20210107113400_583047.jpg','2021-01-07 19:37:10','2021-01-07 19:37:10'),
	(11,4,'https://image.holyzq.com/20210107113400_847209.jpg','2021-01-07 19:37:10','2021-01-07 19:37:10'),
	(12,4,'https://image.holyzq.com/20210107113400_858801.jpg','2021-01-07 19:37:10','2021-01-07 19:37:10'),
	(13,5,'https://image.holyzq.com/20210125124911_599962.jpg','2021-01-25 20:50:41','2021-01-25 20:50:41'),
	(14,5,'https://image.holyzq.com/20210125124911_804659.jpg','2021-01-25 20:50:41','2021-01-25 20:50:41'),
	(15,5,'https://image.holyzq.com/20210125124911_800128.jpg','2021-01-25 20:50:41','2021-01-25 20:50:41'),
	(16,5,'https://image.holyzq.com/20210125124912_312815.jpg','2021-01-25 20:50:41','2021-01-25 20:50:41'),
	(17,6,'https://image.holyzq.com/20210125130031_753348.jpg','2021-01-25 21:02:01','2021-01-25 21:02:01'),
	(18,6,'https://image.holyzq.com/20210125130031_726935.jpg','2021-01-25 21:02:01','2021-01-25 21:02:01'),
	(19,6,'https://image.holyzq.com/20210125130032_311092.jpg','2021-01-25 21:02:01','2021-01-25 21:02:01'),
	(20,7,'https://image.holyzq.com/20210125130233_649411.jpg','2021-01-25 21:03:37','2021-01-25 21:03:37'),
	(21,7,'https://image.holyzq.com/20210125130234_195885.jpg','2021-01-25 21:03:37','2021-01-25 21:03:37'),
	(22,7,'https://image.holyzq.com/20210125130234_254715.jpg','2021-01-25 21:03:37','2021-01-25 21:03:37'),
	(23,8,'https://image.holyzq.com/20210125130912_955883.jpg','2021-01-25 21:10:31','2021-01-25 21:10:31'),
	(24,8,'https://image.holyzq.com/20210125130912_893258.jpg','2021-01-25 21:10:31','2021-01-25 21:10:31'),
	(25,8,'https://image.holyzq.com/20210125130913_762711.jpg','2021-01-25 21:10:31','2021-01-25 21:10:31'),
	(26,9,'https://image.holyzq.com/20210125131448_196174.jpg','2021-01-25 21:16:00','2021-01-25 21:16:00'),
	(27,9,'https://image.holyzq.com/20210125131448_782292.jpg','2021-01-25 21:16:00','2021-01-25 21:16:00'),
	(28,9,'https://image.holyzq.com/20210125131449_670906.jpg','2021-01-25 21:16:00','2021-01-25 21:16:00'),
	(29,9,'https://image.holyzq.com/20210125131449_118134.jpg','2021-01-25 21:16:00','2021-01-25 21:16:00'),
	(30,10,'https://image.holyzq.com/20210125132148_979159.png','2021-01-25 21:23:14','2021-01-25 21:23:14'),
	(31,10,'https://image.holyzq.com/20210125132149_295431.png','2021-01-25 21:23:14','2021-01-25 21:23:14'),
	(32,10,'https://image.holyzq.com/20210125132149_668039.png','2021-01-25 21:23:14','2021-01-25 21:23:14'),
	(33,11,'https://image.holyzq.com/20210125132705_437910.jpg','2021-01-25 21:28:23','2021-01-25 21:28:23'),
	(34,11,'https://image.holyzq.com/20210125132705_665197.jpg','2021-01-25 21:28:23','2021-01-25 21:28:23'),
	(35,11,'https://image.holyzq.com/20210125132705_337492.jpg','2021-01-25 21:28:23','2021-01-25 21:28:23'),
	(36,14,'https://image.holyzq.com/20210304160808_864370.jpg','2021-03-04 16:09:16','2021-03-04 16:09:16'),
	(37,14,'https://image.holyzq.com/20210304160808_651828.png','2021-03-04 16:09:16','2021-03-04 16:09:16'),
	(38,14,'https://image.holyzq.com/20210304160808_639366.png','2021-03-04 16:09:16','2021-03-04 16:09:16'),
	(39,15,'https://image.holyzq.com/20210304175506_126425.jpg','2021-03-04 17:56:08','2021-03-04 17:56:08'),
	(40,15,'https://image.holyzq.com/20210304175506_475922.jpg','2021-03-04 17:56:08','2021-03-04 17:56:08'),
	(41,15,'https://image.holyzq.com/20210304175506_405660.jpg','2021-03-04 17:56:08','2021-03-04 17:56:08'),
	(42,16,'https://image.holyzq.com/20210304180730_742714.jpg','2021-03-04 18:08:16','2021-03-04 18:08:16'),
	(43,16,'https://image.holyzq.com/20210304180730_165162.jpg','2021-03-04 18:08:16','2021-03-04 18:08:16'),
	(44,16,'https://image.holyzq.com/20210304180730_141032.jpg','2021-03-04 18:08:16','2021-03-04 18:08:16'),
	(45,17,'https://image.holyzq.com/20210304181218_783567.jpg','2021-03-04 18:13:21','2021-03-04 18:13:21'),
	(46,17,'https://image.holyzq.com/20210304181219_317563.jpg','2021-03-04 18:13:21','2021-03-04 18:13:21'),
	(47,17,'https://image.holyzq.com/20210304181219_176888.jpg','2021-03-04 18:13:21','2021-03-04 18:13:21');

/*!40000 ALTER TABLE `product_galleries` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_parames
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_parames`;

CREATE TABLE `product_parames` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `parame_name` varchar(100) DEFAULT NULL COMMENT '商品参数名',
  `parame_value` varchar(255) DEFAULT NULL COMMENT '商品参数值',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `product_parames` WRITE;
/*!40000 ALTER TABLE `product_parames` DISABLE KEYS */;

INSERT INTO `product_parames` (`id`, `product_id`, `parame_name`, `parame_value`, `created_at`, `updated_at`)
VALUES
	(1,1,'商品名称','三利毛巾浴巾','2021-01-06 19:54:18','2021-01-06 20:13:32'),
	(2,1,'商品编号','25053128','2021-01-06 19:54:18','2021-01-06 20:13:32'),
	(3,1,'品牌','三利','2021-01-06 19:54:18','2021-01-06 20:13:32'),
	(4,1,'商品毛重','120.00g','2021-01-06 19:54:18','2021-01-06 20:13:32'),
	(5,1,'商品产地','上海','2021-01-06 19:54:18','2021-01-06 20:13:32'),
	(6,1,'材质','棉花','2021-01-06 19:54:18','2021-01-06 20:13:32'),
	(7,1,'特点','超强吸水，不脱毛','2021-01-06 19:54:18','2021-01-06 20:13:32'),
	(8,1,'风格','简约、时尚','2021-01-06 19:54:18','2021-01-06 20:13:32'),
	(9,2,'生产许可证编号','SC11552038220099','2021-01-07 19:22:16','2021-01-07 19:22:16'),
	(10,2,'厂名','贵州茅台酒股份有限公司','2021-01-07 19:22:16','2021-01-07 19:22:16'),
	(11,2,'厂家联系方式','400-722-1919','2021-01-07 19:22:16','2021-01-07 19:22:16'),
	(12,2,'保质期','36500 天','2021-01-07 19:22:16','2021-01-07 19:22:16'),
	(13,2,'品名','飞天茅台','2021-01-07 19:22:16','2021-01-07 19:22:16'),
	(14,2,'净含量','200mL','2021-01-07 19:22:16','2021-01-07 19:22:16'),
	(15,2,'度数','53%Vol','2021-01-07 19:22:16','2021-01-07 19:22:16'),
	(16,2,'包装方式','礼盒装','2021-01-07 19:22:16','2021-01-07 19:22:16'),
	(17,3,'产品名称','Pampers/帮宝适 超薄干爽','2021-01-07 19:29:33','2021-01-07 19:29:33'),
	(18,3,'品牌','Pampers/帮宝适','2021-01-07 19:29:33','2021-01-07 19:29:33'),
	(19,3,'帮宝适超薄干爽','XL128片','2021-01-07 19:29:33','2021-01-07 19:29:33'),
	(20,3,'适用性别','通用','2021-01-07 19:29:33','2021-01-07 19:29:33'),
	(21,3,'适合体重','12KG-17KG','2021-01-07 19:29:33','2021-01-07 19:29:33'),
	(22,3,'适用年龄','2岁 25个月 26个月 27个月','2021-01-07 19:29:33','2021-01-07 19:29:33'),
	(23,3,'包装数量(片)','128','2021-01-07 19:29:33','2021-01-07 19:29:33'),
	(24,3,'产地','中国大陆','2021-01-07 19:29:33','2021-01-07 19:29:33'),
	(25,4,'生产许可证编号','SC10237068200015','2021-01-07 19:37:10','2021-01-07 19:37:10'),
	(26,4,'厂家联系方式','4006581858','2021-01-07 19:37:10','2021-01-07 19:37:10'),
	(27,4,'保质期','540天','2021-01-07 19:37:10','2021-01-07 19:37:10'),
	(28,4,'食品添加剂','无','2021-01-07 19:37:10','2021-01-07 19:37:10'),
	(29,4,'系列','5S一级压榨花生油','2021-01-07 19:37:10','2021-01-07 19:37:10'),
	(30,4,'净含量','11400ml','2021-01-07 19:37:10','2021-01-07 19:37:10'),
	(31,4,'产地','中国大陆','2021-01-07 19:37:10','2021-01-07 19:37:10'),
	(32,5,'商品名称','海飞丝洗发露','2021-01-25 20:50:41','2021-01-25 20:50:41'),
	(33,5,'商品编号','4702894','2021-01-25 20:50:41','2021-01-25 20:50:41'),
	(34,5,'商品毛重','1.15kg','2021-01-25 20:50:41','2021-01-25 20:50:41'),
	(35,5,'商品产地','广东/天津/江苏','2021-01-25 20:50:41','2021-01-25 20:50:41'),
	(36,5,'功效','去屑','2021-01-25 20:50:41','2021-01-25 20:50:41'),
	(37,6,'商品名称','力士沐浴露','2021-01-25 21:02:01','2021-01-25 21:02:01'),
	(38,6,'商品编号','6038412','2021-01-25 21:02:01','2021-01-25 21:02:01'),
	(39,6,'商品毛重','1.1kg','2021-01-25 21:02:01','2021-01-25 21:02:01'),
	(40,6,'商品产地','合肥','2021-01-25 21:02:01','2021-01-25 21:02:01'),
	(41,6,'功效','滋润，保湿，持久留香','2021-01-25 21:02:01','2021-01-25 21:02:01'),
	(42,6,'香型','花香型','2021-01-25 21:02:01','2021-01-25 21:02:01'),
	(43,7,'商品名称','力士沐浴露','2021-01-25 21:03:37','2021-01-25 21:03:37'),
	(44,7,'商品编号','6038412','2021-01-25 21:03:37','2021-01-25 21:03:37'),
	(45,7,'商品毛重','1.1kg','2021-01-25 21:03:37','2021-01-25 21:03:37'),
	(46,7,'商品产地','合肥','2021-01-25 21:03:37','2021-01-25 21:03:37'),
	(47,7,'功效','滋润，保湿，持久留香','2021-01-25 21:03:37','2021-01-25 21:03:37'),
	(48,7,'香型','花香型','2021-01-25 21:03:37','2021-01-25 21:03:37'),
	(49,8,'商品名称','皇冠丹麦曲奇饼干681g','2021-01-25 21:10:31','2021-02-11 00:21:12'),
	(50,8,'商品编号','6939793','2021-01-25 21:10:31','2021-02-11 00:21:12'),
	(51,8,'商品毛重','1.6kg','2021-01-25 21:10:31','2021-02-11 00:21:12'),
	(52,8,'商品产地','丹麦','2021-01-25 21:10:31','2021-02-11 00:21:12'),
	(53,8,'适用人群','老人，儿童，成人','2021-01-25 21:10:31','2021-02-11 00:21:12'),
	(54,8,'类别','曲奇饼干','2021-01-25 21:10:31','2021-02-11 00:21:12'),
	(55,9,'商品名称','清风抽取式面纸','2021-01-25 21:16:00','2021-01-25 21:16:00'),
	(56,9,'商品编号','1437337','2021-01-25 21:16:00','2021-01-25 21:16:00'),
	(57,9,'商品毛重','4.68kg','2021-01-25 21:16:00','2021-01-25 21:16:00'),
	(58,9,'商品产地','江苏/天津','2021-01-25 21:16:00','2021-01-25 21:16:00'),
	(59,9,'层数','3层','2021-01-25 21:16:00','2021-01-25 21:16:00'),
	(60,10,'商品名称','南极人毛衣男半高领','2021-01-25 21:23:14','2021-03-10 16:24:23'),
	(61,10,'商品编号','59479534526','2021-01-25 21:23:14','2021-03-10 16:24:23'),
	(62,10,'商品毛重','300.00g','2021-01-25 21:23:14','2021-03-10 16:24:23'),
	(63,10,'货号','NJRMY1626','2021-01-25 21:23:14','2021-03-10 16:24:23'),
	(64,10,'上市时间','2020年冬季','2021-01-25 21:23:14','2021-03-10 16:24:23'),
	(65,11,'商品名称','澳洲进口谷饲牛肉','2021-01-25 21:28:23','2021-02-22 09:50:39'),
	(66,11,'商品编号','10023524569500','2021-01-25 21:28:23','2021-02-22 09:50:39'),
	(67,11,'商品毛重','10kg','2021-01-25 21:28:23','2021-02-22 09:50:39'),
	(68,11,'分类','雪花牛排','2021-01-25 21:28:23','2021-02-22 09:50:39'),
	(69,11,'饲养方式','有机谷饲','2021-01-25 21:28:23','2021-02-22 09:50:39'),
	(70,12,NULL,NULL,'2021-02-25 16:59:09','2021-02-25 16:59:09'),
	(71,13,NULL,NULL,'2021-02-25 17:08:18','2021-02-25 17:08:18'),
	(72,14,'商品名称','蓝禾医疗','2021-03-04 16:09:16','2021-03-08 09:17:52'),
	(73,14,'生产许可证编号','70829478912','2021-03-04 16:09:16','2021-03-08 09:17:52'),
	(74,14,'商品毛重','0.55kg','2021-03-04 16:09:16','2021-03-08 09:17:52'),
	(75,15,'商品名称','幸福阳光抽纸','2021-03-04 17:56:08','2021-03-08 09:17:38'),
	(76,15,'商品编号','100006017008','2021-03-04 17:56:08','2021-03-08 09:17:38'),
	(77,15,'抽数','130抽及以下','2021-03-04 17:56:08','2021-03-08 09:17:38'),
	(78,15,'层数','3层','2021-03-04 17:56:08','2021-03-08 09:17:38'),
	(79,16,'商品名称','艺芯园绿植盆栽','2021-03-04 18:08:16','2021-03-08 09:17:25'),
	(80,16,'是否含花盆','含盆','2021-03-04 18:08:16','2021-03-08 09:17:25'),
	(81,17,'商品名称','科乐吉四川丑柑','2021-03-04 18:13:21','2021-03-08 09:16:24'),
	(82,17,'类别','丑橘/不知火','2021-03-04 18:13:21','2021-03-08 09:16:24'),
	(83,17,'重量','4000-5999g','2021-03-04 18:13:21','2021-03-08 09:16:24');

/*!40000 ALTER TABLE `product_parames` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) DEFAULT NULL,
  `theme_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL COMMENT '售价',
  `original_price` decimal(10,2) DEFAULT '0.00' COMMENT '原价',
  `unit` tinyint(1) DEFAULT NULL COMMENT '计量单位',
  `is_top` tinyint(4) DEFAULT NULL,
  `is_recommend` tinyint(4) DEFAULT NULL,
  `is_hot` tinyint(4) DEFAULT NULL,
  `is_new` tinyint(4) DEFAULT NULL,
  `is_onsale` tinyint(4) DEFAULT NULL,
  `is_seckill` tinyint(4) DEFAULT '0' COMMENT '是否参与秒杀',
  `stock` int(11) DEFAULT NULL,
  `full_num` int(11) DEFAULT '0' COMMENT '满额：满多少数量享受折扣',
  `discount` decimal(10,1) DEFAULT '0.0' COMMENT '折扣',
  `description` text CHARACTER SET utf8,
  `expired_at` date DEFAULT NULL COMMENT '商品有效期',
  `content` text,
  `markdown_html_code` text,
  `sales_volume` int(11) DEFAULT '0' COMMENT '销量',
  `start_at` datetime DEFAULT NULL COMMENT '秒杀开始时间',
  `end_at` datetime DEFAULT NULL COMMENT '秒杀结束时间',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `brand_id`, `theme_id`, `name`, `image`, `price`, `original_price`, `unit`, `is_top`, `is_recommend`, `is_hot`, `is_new`, `is_onsale`, `is_seckill`, `stock`, `full_num`, `discount`, `description`, `expired_at`, `content`, `markdown_html_code`, `sales_volume`, `start_at`, `end_at`, `created_at`, `updated_at`)
VALUES
	(1,1,2,'南极人毛衣男2020秋冬新款男士韩版针织衫高领','https://image.holyzq.com/Q7pMiBPC2JjGwvrQg1QcA8Qjg3RxajGcjnf4ws43.jpg',29.90,49.90,4,1,0,1,0,1,0,94,0,0.0,'毛巾/浴巾/干发帽/一次性洗脸巾/发带/童巾/枕巾等系列','2021-10-01','![](https://image.holyzq.com/20210106195059_945424.jpg)\r\n![](https://image.holyzq.com/20210106195108_735536.jpg)\r\n![](https://image.holyzq.com/20210106195116_343390.jpg)\r\n![](https://image.holyzq.com/20210106195123_957068.jpg)','<p><img src=\"https://image.holyzq.com/20210106195059_945424.jpg\" alt=\"\"><br><img src=\"https://image.holyzq.com/20210106195108_735536.jpg\" alt=\"\"><br><img src=\"https://image.holyzq.com/20210106195116_343390.jpg\" alt=\"\"><br><img src=\"https://image.holyzq.com/20210106195123_957068.jpg\" alt=\"\">',2,NULL,NULL,'2021-02-03 22:49:26','2021-03-02 11:24:11'),
	(2,2,9,'飞天 53%vol 500ml 贵州茅台酒（带杯）','https://image.holyzq.com/a47QcdHZNo1hu91nOT22MWqIN3DEslFkmU19Jb0B.jpg',1699.00,1989.00,2,1,0,0,1,1,0,97,0,0.0,'仅限正式PLUS会员预约享抢购资格','2025-10-01','![](https://image.holyzq.com/20210107191929_120698.jpg)\r\n![](https://image.holyzq.com/20210107191937_399430.jpg)','<p><img src=\"https://image.holyzq.com/20210107191929_120698.jpg\" alt=\"\"><br><img src=\"https://image.holyzq.com/20210107191937_399430.jpg\" alt=\"\">',5,NULL,NULL,'2021-02-03 22:49:40','2021-04-02 13:28:12'),
	(3,3,6,'帮宝适纸尿裤XL128片宝宝婴儿尿不湿超薄透气加大号纸尿裤','https://image.holyzq.com/uHden3syHMmzQ42SNQ8uuzOgFFwQ3c1FUGCR1qfD.jpg',229.00,252.00,2,1,0,1,0,1,0,99,0,0.0,'Pampers/帮宝适','2022-10-01','![](https://image.holyzq.com/20210107192643_691228.jpg)\r\n![](https://image.holyzq.com/20210107192651_812694.jpg)','<p><img src=\"https://image.holyzq.com/20210107192643_691228.jpg\" alt=\"\"><br><img src=\"https://image.holyzq.com/20210107192651_812694.jpg\" alt=\"\">',1,NULL,NULL,'2021-02-03 22:50:19','2021-03-31 22:49:18'),
	(4,4,1,'多力葵花籽食用油 5L/桶 加赠250ml小油','https://image.holyzq.com/aRzne8xV3wPxMrJBfqdte5Amsp5xiiBWJbTlRpdF.jpg',76.90,79.80,3,1,1,0,1,1,0,93,0,0.0,'进口葵籽葵花籽油家用','2022-10-01','![](https://image.holyzq.com/20210107193329_699829.jpg)\r\n![](https://image.holyzq.com/20210107193337_954786.jpg)\r\n![](https://image.holyzq.com/20210107193343_810089.jpg)','<p><img src=\"https://image.holyzq.com/20210107193329_699829.jpg\" alt=\"\"><br><img src=\"https://image.holyzq.com/20210107193337_954786.jpg\" alt=\"\"><br><img src=\"https://image.holyzq.com/20210107193343_810089.jpg\" alt=\"\">',13,NULL,NULL,'2021-02-03 22:50:34','2021-04-01 18:24:11'),
	(5,5,6,'海飞丝洗发水清爽去油型1KG（持久去屑清洁止痒清爽柔润）柠檬香','https://image.holyzq.com/MBswS1eEJ5Eeq8fcD2ofbT2mmTfCg9JTdofQ6FQ2.jpg',59.80,72.80,2,0,1,1,0,1,0,100,0,0.0,'超有YOUNG大牌联合，部分第二件0元，多重促销，折扣多多','2022-10-01','![](https://image.holyzq.com/20210125204844_864652.jpg)\r\n![](https://image.holyzq.com/20210125204853_285339.jpg)','<p><img src=\"https://image.holyzq.com/20210125204844_864652.jpg\" alt=\"\"><br><img src=\"https://image.holyzq.com/20210125204853_285339.jpg\" alt=\"\">',6,NULL,NULL,'2021-02-03 22:50:42','2021-04-02 12:14:43'),
	(7,3,4,'力士(LUX)沐浴露 粉润桃花香 淡雅香氛 娇肤香氛沐浴乳1000g','https://image.holyzq.com/P7NXFVuoTjOCczM5vfFGGkt8X2vmJ1HP8suRg2pe.jpg',29.90,36.90,3,1,0,0,1,1,0,67,0,0.0,'联合利华个人护理商品年货节狂欢，部分商品可参与149减100神券','2022-10-01','![](https://image.holyzq.com/20210125210005_386895.jpg)\r\n![](https://image.holyzq.com/20210125210013_241630.jpg)','<p><img src=\"https://image.holyzq.com/20210125210005_386895.jpg\" alt=\"\"><br><img src=\"https://image.holyzq.com/20210125210013_241630.jpg\" alt=\"\">',0,NULL,NULL,'2021-02-03 22:51:00','2021-03-17 10:16:37'),
	(8,3,1,'丹麦进口曲奇 皇冠（Danisa）丹麦曲奇饼干礼盒装681g','https://image.holyzq.com/zSSN7OLstHp7OfhoT3zdi2uG4mqejECNQF8lyVYw.jpg',78.00,88.00,2,1,0,0,1,1,0,71,3,9.0,'玩转皇冠，乐享新年好礼，送上美味祝福','2022-10-01','![](https://image.holyzq.com/20210125210853_466905.jpg)\r\n![](https://image.holyzq.com/20210125210900_530906.jpg)','<p><img src=\"https://image.holyzq.com/20210125210853_466905.jpg\" alt=\"\"><br><img src=\"https://image.holyzq.com/20210125210900_530906.jpg\" alt=\"\">',26,NULL,NULL,'2021-02-10 20:44:25','2021-04-06 16:55:47'),
	(9,1,8,'清风（APP）抽纸 原木纯品金装系列 3层150抽软抽*20包纸巾','https://image.holyzq.com/tNL5QTDdbIFz6tLDXIX1bG5cxs6PZjgaUHzdKsLt.jpg',64.90,79.90,2,0,1,0,1,1,0,39,0,0.0,'清风年货节燃力全开','2022-10-01','![](https://image.holyzq.com/20210125211426_501228.jpg)\r\n![](https://image.holyzq.com/20210125211433_169331.jpg)','<p><img src=\"https://image.holyzq.com/20210125211426_501228.jpg\" alt=\"\"><br><img src=\"https://image.holyzq.com/20210125211433_169331.jpg\" alt=\"\">',11,NULL,NULL,'2021-02-03 22:51:20','2021-04-15 23:35:24'),
	(10,1,2,'南极人毛衣男半高领打底衫加厚上衣2020秋冬新款男装衣服针织衫','https://image.holyzq.com/PRGKDeenNlgUS6UrZAgxQ11N4o9bKhINjYl0VUNU.jpg',79.00,99.00,2,1,0,1,0,1,0,81,2,8.5,'毛衫线衫保暖衣 920深灰 XL','2022-10-01','![](https://image.holyzq.com/20210125212126_818447.jpg)\r\n![](https://image.holyzq.com/20210125212133_177487.jpg)','<p><img src=\"https://image.holyzq.com/20210125212126_818447.jpg\" alt=\"\"><br><img src=\"https://image.holyzq.com/20210125212133_177487.jpg\" alt=\"\">',0,NULL,NULL,'2021-02-10 20:44:25','2021-03-10 16:24:23'),
	(11,4,9,'澳洲进口谷饲牛肉原切M4+和牛雪花牛仔粒','https://image.holyzq.com/6tXAHXElB5j62M3AC1hOQlHX1xdaz1MQhgBdp9m9.jpg',99.00,128.00,1,0,1,0,1,1,0,94,3,6.0,'火锅食材生鲜高端商务宴请家用套餐旅行推荐新鲜牛肉块 500克','2022-10-01','![](https://image.holyzq.com/20210125212644_577032.jpg)\r\n![](https://image.holyzq.com/20210125212654_645359.jpg)','<p><img src=\"https://image.holyzq.com/20210125212644_577032.jpg\" alt=\"\"><br><img src=\"https://image.holyzq.com/20210125212654_645359.jpg\" alt=\"\">',5,NULL,NULL,'2021-02-10 20:44:25','2021-03-31 22:49:18'),
	(14,3,6,'蓝禾医疗口罩','https://image.holyzq.com/w7RlU2rVg0Qx3yc0gw9LvgpjMhRP8CZAbpdm7JuK.jpg',9.90,39.00,6,1,0,0,1,1,1,69,NULL,NULL,'一次性成人医用口罩防尘含熔喷布三层透气挂耳式防护口罩','2023-10-01','![](https://image.holyzq.com/20210304160733_707073.jpg)\r\n![](https://image.holyzq.com/20210304160744_735754.jpg)\r\n![](https://image.holyzq.com/20210304160753_596652.jpg)','<p><img src=\"https://image.holyzq.com/20210304160733_707073.jpg\" alt=\"\"><br><img src=\"https://image.holyzq.com/20210304160744_735754.jpg\" alt=\"\"><br><img src=\"https://image.holyzq.com/20210304160753_596652.jpg\" alt=\"\">',99,'2021-03-04 00:00:00','2021-03-15 00:00:00','2021-03-04 16:09:16','2021-03-08 09:17:52'),
	(15,2,1,'幸福阳光抽纸','https://image.holyzq.com/vCXh1X6kgQMClDMGxKsEmQ0ts7xPKUKvUuzPSZ0F.jpg',29.90,49.90,2,0,1,1,0,1,1,89,NULL,NULL,'旅行系列取式面纸便携式软抽3层110抽20包超值实惠','2023-10-01','![](https://image.holyzq.com/20210304175440_897036.jpg)','<p><img src=\"https://image.holyzq.com/20210304175440_897036.jpg\" alt=\"\">',33,'2021-03-04 00:00:00','2021-03-15 00:00:00','2021-03-04 17:56:08','2021-03-10 21:34:11'),
	(16,1,5,'艺芯园绿植盆栽','https://image.holyzq.com/0naLE4pcFx2s3Z8C60TpJtsw4ktM96BWnFo1RxQk.jpg',9.90,49.90,3,1,1,0,0,1,1,98,NULL,NULL,'办公室植物室内花卉观叶植物小盆景绿萝发财树栀子花','2022-10-01','![](https://image.holyzq.com/20210304180710_131754.jpg)','<p><img src=\"https://image.holyzq.com/20210304180710_131754.jpg\" alt=\"\">',2,'2021-03-04 00:00:00','2021-03-10 00:00:00','2021-03-04 18:08:16','2021-03-08 09:17:25'),
	(17,5,9,'科乐吉四川丑柑','https://image.holyzq.com/hTFcZA5it6CN9BOjEmzG3oqP0ALO9HsPd0zTo4mI.jpg',39.90,49.90,1,1,0,1,0,1,1,67,NULL,NULL,'耙耙柑5斤19.8元，爆甜多汁','2022-10-01','![](https://image.holyzq.com/20210304181157_396229.jpg)','<p><img src=\"https://image.holyzq.com/20210304181157_396229.jpg\" alt=\"\">',49,'2021-03-04 00:00:00','2021-03-15 00:00:00','2021-03-04 18:13:21','2021-03-10 21:33:26');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table searches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `searches`;

CREATE TABLE `searches` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `total_count` int(11) DEFAULT '1' COMMENT '搜索次数',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `total_count` (`total_count`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `searches` WRITE;
/*!40000 ALTER TABLE `searches` DISABLE KEYS */;

INSERT INTO `searches` (`id`, `customer_id`, `keyword`, `total_count`, `created_at`, `updated_at`)
VALUES
	(1,2,'茅台',2,'2021-02-13 12:40:20','2021-02-13 12:41:20'),
	(2,1,'牛仔裤',3,'2021-02-13 14:23:09','2021-02-13 14:23:09'),
	(3,1,'毛巾',1,'2021-02-15 06:52:55','2021-02-15 06:52:55'),
	(4,1,'毛衣',1,'2021-02-15 06:53:07','2021-02-15 06:53:07'),
	(5,7,'密码',1,'2021-04-09 21:47:47','2021-04-09 21:47:47');

/*!40000 ALTER TABLE `searches` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table themes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `themes`;

CREATE TABLE `themes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_left` tinyint(1) DEFAULT '0' COMMENT '是否置左',
  `is_right` tinyint(1) DEFAULT '0' COMMENT '是否置右',
  `is_bottom` tinyint(1) DEFAULT '0' COMMENT '是否置底',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;

INSERT INTO `themes` (`id`, `name`, `image`, `is_left`, `is_right`, `is_bottom`, `created_at`, `updated_at`)
VALUES
	(1,'年货节','https://image.holyzq.com/9DtGS8mZFHqhzdsRktoKju5t5SxgOy6wOKg0bxoK.png',1,0,0,'2021-02-03 22:22:17','2021-02-03 22:22:17'),
	(2,'女人衣柜','https://image.holyzq.com/UFxzGgsR37NuQLpOA9NRgsP2rGfYY3T1DdPvy1xR.png',0,1,0,'2021-02-03 22:23:04','2021-02-03 22:23:04'),
	(3,'数码','https://image.holyzq.com/XTdpQjxqBC6bssF1hHLKLic3op7BIsKrC0SCMlCd.png',0,1,0,'2021-02-03 22:24:07','2021-02-03 22:24:07'),
	(4,'床上用品','https://image.holyzq.com/7nl8fDPnZT0RiYla6GK2KpCooV3VyizgXI0DGHbW.png',0,1,0,'2021-02-03 22:24:33','2021-02-03 22:24:33'),
	(5,'美妆','https://image.holyzq.com/ZoVDu6FkpB9PhluajjP2p9Wl3TdumAdMxIyUIhBP.png',0,1,0,'2021-02-03 22:24:59','2021-02-03 22:24:59'),
	(6,'个护清洁','https://image.holyzq.com/lLPh1szB37dNJzoXszENeJzB0L6yO27eKe5DkRkC.png',0,0,1,'2021-02-03 22:25:30','2021-02-03 22:25:30'),
	(7,'小家电','https://image.holyzq.com/Jh7FCbC6qnvjvKFhFg8Esfer2gjRdG9PteL2ilnB.png',0,0,1,'2021-02-03 22:26:10','2021-02-03 22:26:10'),
	(8,'箱包','https://image.holyzq.com/qRqtJG97mvLDvgcpZB5LYPcD65BSx3iSdO5ps5aq.png',0,0,1,'2021-02-03 22:26:40','2021-02-03 22:26:40'),
	(9,'美食','https://image.holyzq.com/0SWi6Rn5DDIG62tnjCIzoaTW8vc4IrB3NxHjVYjU.png',0,0,1,'2021-02-03 22:26:59','2021-02-03 22:26:59');

/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'holyzq','244500972@qq.com',NULL,'$2y$10$UcCAQlbqe7Fxu770CXzkS.HMxeK6uDxHw9CIFztnVJm6RuOL/qymC','R5Q5i7rXbuWGZDdfJLwi6zHtgwt5szGuC9EcDUtDshpzkQKbYaxKHZFVh9QN','2020-12-31 15:34:49','2021-02-09 23:59:50');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
