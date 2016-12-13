-- --------------------------------------------------------
-- Host:                         192.168.1.201
-- Server version:               5.6.27-log - Source distribution
-- Server OS:                    Linux
-- HeidiSQL version:             7.0.0.4218
-- Date/time:                    2016-12-07 12:10:10
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for www_bestfu_com
DROP DATABASE IF EXISTS `www_bestfu_com`;
CREATE DATABASE IF NOT EXISTS `www_bestfu_com` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `www_bestfu_com`;


-- Dumping structure for table www_bestfu_com.www_bestfu_access
DROP TABLE IF EXISTS `www_bestfu_access`;
CREATE TABLE IF NOT EXISTS `www_bestfu_access` (
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色ID，www_bestfu_role表id外键',
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '节点ID，www_bestfu_node表id外键',
  `level` tinyint(1) NOT NULL DEFAULT '1',
  `module` varchar(64) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限表';

-- Dumping data for table www_bestfu_com.www_bestfu_access: ~60 rows (approximately)
/*!40000 ALTER TABLE `www_bestfu_access` DISABLE KEYS */;
INSERT INTO `www_bestfu_access` (`role_id`, `node_id`, `level`, `module`) VALUES
	(2, 7, 1, ''),
	(2, 8, 1, ''),
	(2, 9, 1, ''),
	(5, 2, 1, ''),
	(5, 1, 1, ''),
	(5, 7, 1, ''),
	(5, 10, 1, ''),
	(5, 13, 1, ''),
	(5, 18, 1, ''),
	(5, 17, 1, ''),
	(5, 23, 1, ''),
	(5, 3, 1, ''),
	(5, 5, 1, ''),
	(5, 8, 1, ''),
	(5, 9, 1, ''),
	(5, 11, 1, ''),
	(5, 12, 1, ''),
	(5, 14, 1, ''),
	(5, 19, 1, ''),
	(5, 20, 1, ''),
	(5, 21, 1, ''),
	(5, 22, 1, ''),
	(5, 24, 1, ''),
	(4, 2, 1, ''),
	(4, 10, 1, ''),
	(4, 13, 1, ''),
	(4, 15, 1, ''),
	(4, 18, 1, ''),
	(4, 17, 1, ''),
	(4, 23, 1, ''),
	(4, 3, 1, ''),
	(4, 11, 1, ''),
	(4, 12, 1, ''),
	(4, 14, 1, ''),
	(4, 16, 1, ''),
	(4, 19, 1, ''),
	(4, 20, 1, ''),
	(4, 21, 1, ''),
	(4, 22, 1, ''),
	(4, 24, 1, ''),
	(1, 2, 1, ''),
	(1, 7, 1, ''),
	(1, 10, 1, ''),
	(1, 13, 1, ''),
	(1, 15, 1, ''),
	(1, 18, 1, ''),
	(1, 17, 1, ''),
	(1, 23, 1, ''),
	(1, 3, 1, ''),
	(1, 8, 1, ''),
	(1, 9, 1, ''),
	(1, 11, 1, ''),
	(1, 12, 1, ''),
	(1, 14, 1, ''),
	(1, 16, 1, ''),
	(1, 19, 1, ''),
	(1, 20, 1, ''),
	(1, 21, 1, ''),
	(1, 22, 1, ''),
	(1, 24, 1, '');
/*!40000 ALTER TABLE `www_bestfu_access` ENABLE KEYS */;


-- Dumping structure for table www_bestfu_com.www_bestfu_article
DROP TABLE IF EXISTS `www_bestfu_article`;
CREATE TABLE IF NOT EXISTS `www_bestfu_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT '' COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `m_id` int(11) NOT NULL DEFAULT '0' COMMENT '前台菜单ID',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='文章';

-- Dumping data for table www_bestfu_com.www_bestfu_article: ~2 rows (approximately)
/*!40000 ALTER TABLE `www_bestfu_article` DISABLE KEYS */;
INSERT INTO `www_bestfu_article` (`id`, `title`, `content`, `m_id`, `addtime`) VALUES
	(1, '', '&lt;p&gt;\r\n	深圳市贝多福科技有限公司是一家专门从事智慧城市、智慧社区、智能酒店、智能家庭、智能办公的实施方案、产品研发及营销运营的综\r\n合性高科技企业。公司具有进出口权，产品销往全球。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	公司专注智能应用的高端服务品牌,专业提供BESTFU品牌系列智能家居控制系统，专门服务于智能生活市场,为用户提供更方便、更安全、\r\n更舒适的智能化居住环境。公司产品具备稳定、可靠、安全易用、个性化组合、方便等特点。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	公司自成立以来，秉着智能、科技、生活、情感四合一的思想，创造美好生活，轻松享受，物联科技，全面掌握。凭借对国际最新应用技\r\n术引进与强大技术实力，紧密结合客户实际情况，为客户提供完整而全方位的服务，已取得良好的效益，并受到客户的高度评价与赞誉。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	公司以深圳为总部，建立了北京、上海、广州、西安、成都、杭州等分支机构，并构成覆盖全国主要地区的销售网络。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	公司拥有一批高素质及经验丰富的设计工程师、销售工程师，以支持我们提供的全方位解决方案和服务，已成为众多知名品牌的代理商，\r\n并与众多知名公司保持的良好合作关系。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	以客户为中心、品质第一、服务至上为公司始终如一的追求。新世纪，新的团队，我们将以崭新的形象为客户提供优质的产品、完善的方\r\n案和一流的服务。\r\n&lt;/p&gt;', 3, 1480319925),
	(2, '', '&lt;p class=&quot;differ&quot;&gt;\r\n	一、Android软件工程师\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	岗位职责：\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	1、负责主导智能家居项目Android系统框架设计开发，完成产品软件或者软件模块的代码编写；\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	2、根据设计任务书或者客户需求，分析产品的基本功能和实现方式，负责Android项目的架构设计、方案的制定，编写软件工程文档和软件流程图；\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	3、配合硬件组和测试组，解决软件相关的技术问题；\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	4、完成上级交办的其它临时事务。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	职位要求：\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	1、25到35岁，本科及以上学历，电子信息、通讯工程等相关专业，3年以上Android平台开发经验；\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	2、精通Android下的驱动或应用开发，熟练的Android GUI程序开发技能；\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	3、熟悉NDK/JNI、C/C++、XMPP、JSON、ANDROIDFRAMEWORK开发，熟悉Java各种编程方法；\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	4、熟练掌握HTTP、SOCKET、TCP网络连接；\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	5、性格开朗，主动性、责任心强，工作效率高；\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	6、热爱软件开发工作，对智能家居行业有强烈的兴趣。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	二、服务器开发工程师　（云方向）\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	岗位职责：\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	1、参于公司相关项目的数据库的开发；\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	2、负责系统的需求分析和总体设计、核心开发。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	岗位要求：\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	1、计算机相关专业，1年以上相关工作经验或同等工作经验者；\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	2、过往工作中有参于大型项目开发经历；\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	3、熟悉常用开源框架、常用设计模式，阅读过两个以上开源项目源码，有系统设计经验；\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	4、有良好的编码习惯和技术文档编写能力；\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	5、工作严谨细致，良好的逻辑思维及接受能力，具有抗压能力，有项目攻坚能力。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	三、服务器开发工程师（网络通讯方向）\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	岗位职责：\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	1、负责P2P服务端的架构设计、策略制定。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	2、负责P2P系统Server端（Linux平台）的模块设计、代码开发和程序优化。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	岗位要求：\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	1、2年以上Linux开发经验。熟悉Linux系统编程，Linux网络编程；\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	2、熟练掌握C/C++程序设计，熟悉STL和TCP/IP通信原理；\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	3、有良好的编码习惯和技术文档编写能力；\r\n&lt;/p&gt;\r\n&lt;p class=&quot;differ&quot;&gt;\r\n	4、工作严谨细致，良好的逻辑思维及接受能力，具有抗压能力，有项目攻坚能力。\r\n&lt;/p&gt;', 6, 1480320338),
	(3, '', '&lt;p&gt;\r\n	以下为您和贝多福之间的一份法律协议的条款。深圳市贝多福科技有限公司是一家专门从事智慧城市、智慧社区、智能酒店、智能家庭、\r\n智能办公的实施方案、产品研发及营销运营的综合性高科技企业。公司具有进出口权，产品销往全球。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	公司专注智能应用的高端服务品牌,专业提供BESTFU品牌系列智能家居控制系统，专门服务于智能生活市场,为用户提供更方便、更安全、\r\n更舒适的智能化居住环境。公司产品具备稳定、可靠、安全易用、个性化组合、方便等特点。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	公司自成立以来，秉着智能、科技、生活、情感四合一的思想，创造美好生活，轻松享受，物联科技，全面掌握。凭借对国际最新应用技\r\n术引进与强大技术实力，紧密结合客户实际情况，为客户提供完整而全方位的服务，已取得良好的效益，并受到客户的高度评价与赞誉。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	公司以深圳为总部，建立了北京、上海、广州、成都、杭州等分支机构，并构成覆盖全国主要地区的销售网络。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	公司拥有一批高素质及经验丰富的设计工程师、销售工程师，以支持我们提供的全方位解决方案和服务，已成为众多知名品牌的代理商，\r\n并与众多知名公司保持的良好合作关系。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	以客户为中心、品质第一、服务至上为公司始终如一的追求。新世纪，新的团队，我们将以崭新的形象为客户提供优质的产品、完善的方\r\n案和一流的服务。\r\n&lt;/p&gt;', 7, 1480320496);
/*!40000 ALTER TABLE `www_bestfu_article` ENABLE KEYS */;


-- Dumping structure for table www_bestfu_com.www_bestfu_config
DROP TABLE IF EXISTS `www_bestfu_config`;
CREATE TABLE IF NOT EXISTS `www_bestfu_config` (
  `key` varchar(64) NOT NULL DEFAULT '' COMMENT '键',
  `value` varchar(128) NOT NULL DEFAULT '' COMMENT '值'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统设置';

-- Dumping data for table www_bestfu_com.www_bestfu_config: ~13 rows (approximately)
/*!40000 ALTER TABLE `www_bestfu_config` DISABLE KEYS */;
INSERT INTO `www_bestfu_config` (`key`, `value`) VALUES
	('ABOUT_CLASS_ID', '3'),
	('JOBS_CLASS_ID', '6'),
	('LEGAL_CLASS_ID', '7'),
	('BACKSTAGE_TITLE', '贝多福后台管理系统'),
	('BACKSTAGE_VERSION', 'v1.0.0.0'),
	('WEBSITE_TITLE', '深圳市贝多福科技有限公司'),
	('WEBSITE_KEYWORD', '贝多福,深圳市贝多福科技有限公司'),
	('WEBSITE_DESCRIPTION', '深圳市贝多福科技有限公司是一家专门从事智慧城市、智慧社区、智能酒店、智能家庭、智能办公的实施方案、产品研发及营销运营的综合性高科技企业。公司具有进出口权，产品销往全球。'),
	('WEBSITE_COPYRIGHT', '贝多福科技有限公司版权所有 2001-2017'),
	('WEBSITE_ICP', '粤ICP备13009515号-1'),
	('WEBSITE_VERSION', 'V1.0.0.3'),
	('SERVICE_HOTLINE', '0086-755-83820505'),
	('SERVICE_TIME', '09:00-18:00');
/*!40000 ALTER TABLE `www_bestfu_config` ENABLE KEYS */;


-- Dumping structure for table www_bestfu_com.www_bestfu_contact
DROP TABLE IF EXISTS `www_bestfu_contact`;
CREATE TABLE IF NOT EXISTS `www_bestfu_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(256) DEFAULT '',
  `value` varchar(256) DEFAULT '',
  `sort` smallint(6) NOT NULL DEFAULT '1' COMMENT '排序，type不为4时有效',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态，type不为4时有效；0-开启，1-关闭',
  `type` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1-服务热线，2-邮箱，3-微信公众号，4-地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='联系我们';

-- Dumping data for table www_bestfu_com.www_bestfu_contact: ~8 rows (approximately)
/*!40000 ALTER TABLE `www_bestfu_contact` DISABLE KEYS */;
INSERT INTO `www_bestfu_contact` (`id`, `key`, `value`, `sort`, `status`, `type`) VALUES
	(1, '集团', '0755-83820505', 1, 0, 1),
	(2, '未来+', '0755-86119579', 2, 0, 1),
	(3, '农场+', '0755-83820505-803', 3, 0, 1),
	(5, '服务邮箱', 'Service@bestfu.com', 1, 0, 2),
	(6, '未来+', 'weilaijia@bestfu.com', 2, 0, 2),
	(8, '贝多福商业', '\\public\\uploads\\20161129\\65868bd13d58884abbcc354c73a48baa.png', 1, 0, 3),
	(10, '未来+', '\\public\\uploads\\20161129\\531d22255f6285f7648a822337dd1f53.png', 2, 0, 3),
	(12, '深圳市福田保税区桃花路32号鑫瑞科大厦5楼东501#', '\\public\\uploads\\20161129\\8e5ed9dd8ca94a752845d3705ee6d983.png', 1, 0, 4);
/*!40000 ALTER TABLE `www_bestfu_contact` ENABLE KEYS */;


-- Dumping structure for table www_bestfu_com.www_bestfu_industry
DROP TABLE IF EXISTS `www_bestfu_industry`;
CREATE TABLE IF NOT EXISTS `www_bestfu_industry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL DEFAULT '' COMMENT '标题',
  `thumb` varchar(128) NOT NULL DEFAULT '' COMMENT '背景图片',
  `style` varchar(32) NOT NULL DEFAULT '' COMMENT '样式',
  `url` varchar(256) NOT NULL DEFAULT '' COMMENT '链接地址',
  `sort` smallint(8) NOT NULL DEFAULT '1' COMMENT '排序',
  `newtab` tinyint(2) NOT NULL DEFAULT '0' COMMENT '新窗口打开；0-是，1-否',
  `location` tinyint(2) NOT NULL DEFAULT '0' COMMENT '位置；0-大图标，1-小图标',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态；0-显示，1-关闭',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='行业领域';

-- Dumping data for table www_bestfu_com.www_bestfu_industry: ~5 rows (approximately)
/*!40000 ALTER TABLE `www_bestfu_industry` DISABLE KEYS */;
INSERT INTO `www_bestfu_industry` (`id`, `title`, `thumb`, `style`, `url`, `sort`, `newtab`, `location`, `status`, `addtime`) VALUES
	(1, '智慧空间', '\\public\\uploads\\20161129\\327e4a4c5890a4aef908bcbf3b3d4146.png', 'space', 'http://ispace.bestfu.com', 1, 0, 0, 0, 1480410959),
	(2, '创客+', '\\public\\uploads\\20161129\\6b576fdc3dbdd39e10d91a51bd3a1e88.png', 'maker', 'http://maker.bestfu.com', 1, 0, 1, 0, 1480411484),
	(3, '农场+', '\\public\\uploads\\20161129\\dabfe98a5d8922ebad3f02300b528b7b.png', 'farm', 'http://farm.bestfu.com', 2, 0, 0, 0, 1480413231),
	(4, '未来+', '\\public\\uploads\\20161129\\b066bbbd3b4b99aa62abf926d7fe7422.png', 'future', 'http://www.fuplus.cn', 2, 0, 1, 0, 1480414467),
	(5, '音乐+', '\\public\\uploads\\20161129\\9ba7af9dcc21b9a9d17757e8073d1da8.png', 'music', '', 3, 0, 1, 0, 1480414550);
/*!40000 ALTER TABLE `www_bestfu_industry` ENABLE KEYS */;


-- Dumping structure for table www_bestfu_com.www_bestfu_menu
DROP TABLE IF EXISTS `www_bestfu_menu`;
CREATE TABLE IF NOT EXISTS `www_bestfu_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL DEFAULT '' COMMENT '名称',
  `url` varchar(64) NOT NULL DEFAULT '' COMMENT 'url',
  `sort` smallint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否开启；0开启，1关闭',
  `ishead` tinyint(2) NOT NULL DEFAULT '0' COMMENT '头部显示；0显示，1不显示',
  `isfoot` tinyint(2) NOT NULL DEFAULT '0' COMMENT '底部显示；0显示，1不显示',
  `remark` varchar(256) NOT NULL DEFAULT '' COMMENT '菜单说明',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='前台菜单';

-- Dumping data for table www_bestfu_com.www_bestfu_menu: ~7 rows (approximately)
/*!40000 ALTER TABLE `www_bestfu_menu` DISABLE KEYS */;
INSERT INTO `www_bestfu_menu` (`id`, `title`, `url`, `sort`, `status`, `ishead`, `isfoot`, `remark`, `addtime`) VALUES
	(1, '首页', 'index/index', 0, 0, 0, 1, '', 1479803767),
	(2, '新闻', 'news/index', 1, 0, 0, 1, '', 1479804003),
	(3, '集团简介', 'about/index', 2, 0, 0, 1, '', 1479804048),
	(4, '服务支持', 'service/index', 3, 0, 0, 1, '', 1479804088),
	(5, '联系我们', 'contact/index', 6, 0, 0, 0, '', 1479804130),
	(6, '工作机会', 'jobs/index', 4, 0, 1, 0, '', 1479804190),
	(7, '法律声明', 'legal/index', 5, 0, 1, 0, '', 1479804238);
/*!40000 ALTER TABLE `www_bestfu_menu` ENABLE KEYS */;


-- Dumping structure for table www_bestfu_com.www_bestfu_message
DROP TABLE IF EXISTS `www_bestfu_message`;
CREATE TABLE IF NOT EXISTS `www_bestfu_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '姓名',
  `mobile` varchar(32) NOT NULL DEFAULT '' COMMENT '电话',
  `email` varchar(128) DEFAULT '' COMMENT 'Email',
  `address` varchar(256) DEFAULT '' COMMENT '地址',
  `content` text NOT NULL COMMENT '留言内容',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '留言时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='留言列表';

-- Dumping data for table www_bestfu_com.www_bestfu_message: ~0 rows (approximately)
/*!40000 ALTER TABLE `www_bestfu_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `www_bestfu_message` ENABLE KEYS */;


-- Dumping structure for table www_bestfu_com.www_bestfu_news
DROP TABLE IF EXISTS `www_bestfu_news`;
CREATE TABLE IF NOT EXISTS `www_bestfu_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL DEFAULT '' COMMENT '新闻标题',
  `thumb` varchar(256) NOT NULL DEFAULT '' COMMENT '缩略图',
  `intro` text NOT NULL COMMENT '新闻简介',
  `content` text NOT NULL COMMENT '新闻内容',
  `sort` smallint(6) NOT NULL DEFAULT '1' COMMENT '排序',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '新闻状态：0-显示，1-关闭',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '发表时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='新闻列表';

-- Dumping data for table www_bestfu_com.www_bestfu_news: ~6 rows (approximately)
/*!40000 ALTER TABLE `www_bestfu_news` DISABLE KEYS */;
INSERT INTO `www_bestfu_news` (`id`, `title`, `thumb`, `intro`, `content`, `sort`, `status`, `addtime`) VALUES
	(1, '中兴智汇贝多福战略合作新闻发布会在深举行', '\\public\\uploads\\20161125\\364dd0b3bdc83d5d292651257f84b575.png', '2016年8月19日，注定是一个不平凡的日子，这一天中兴智汇与贝多福联手打造智能家居旗舰，两家公司领军人物签署了战略合作协议，并宣布成立合资公司，联手布局智能家居及智能硬件的生态系统,中兴智汇贝多福战略合作新闻发布会在中兴集团全球总部（深圳）举行，中兴智汇科技股份有限公司董事总经理张益峰先生在新闻发布会上致辞，贝多福科技创始人齐玉田董事长作了 “引领物联行业，点亮智慧生活”的主题演讲。', '&lt;!--\r\n&lt;div&gt;\r\n	--&gt;\r\n	&lt;div class=&quot;video&quot;&gt;\r\n		&lt;embed src=&quot;http://player.youku.com/player.php/sid/XMTY5ODg0Mzg0OA==/v.swf&quot; quality=&quot;high&quot; width=&quot;800&quot; height=&quot;500&quot; align=&quot;middle&quot; allowscriptaccess=&quot;always&quot; type=&quot;application/x-shockwave-flash&quot; /&gt;\r\n	&lt;/div&gt;\r\n	&lt;p class=&quot;plan-title&quot;&gt;\r\n		引领物联行业点亮智慧生活\r\n	&lt;/p&gt;\r\n	&lt;p class=&quot;plan-content&quot;&gt;\r\n		2016年8月19日，注定是一个不平凡的日子，这一天中兴智汇与贝多福联手打造智能家居旗舰，两家公司领军人物签署了战略合作协议，并宣布成立合资公司，联手布局智能家居及智能硬件的生态系统。\r\n	&lt;/p&gt;\r\n	&lt;div class=&quot;img-box&quot;&gt;\r\n		&lt;img src=&quot;/public/index/images/news/news1.jpg&quot; /&gt; \r\n		&lt;p&gt;\r\n			资料图片\r\n		&lt;/p&gt;\r\n	&lt;/div&gt;\r\n	&lt;p class=&quot;plan-content&quot;&gt;\r\n		中兴智汇贝多福战略合作新闻发布会在中兴集团全球总部（深圳）举行，中兴智汇科技股份有限公司董事总经理张益峰先生在新闻发布会上致辞，贝多福科技创始人齐玉田董事长作了 “引领物联行业，点亮智慧生活”的主题演讲；来自电器、家俱、装饰、地产、酒店、智能家居、建筑智能化等行业的企业家，盛和资本、深创投和普禾资本等投资机构，以及来自新浪、搜狐、网易、腾讯、优酷、新闻网等10家媒体的代表等近100人出席了发布会。发布会上，住友集团智尚酒店、澳特莱恩电器、柏茨墙体技术、圆方园实业等8家企业分别与中兴智汇贝多福的合资公司签订了合作协议。\r\n	&lt;/p&gt;\r\n	&lt;p class=&quot;plan-content&quot;&gt;\r\n		中兴智汇科技股份有限公司是中兴集团旗下专注于智能穿戴、智能医疗、智能家居等产品开发的子公司，市场营销网络覆盖全国并延伸到全球160多个国家和地区；深圳市贝多福科技有限公司拥有物联网领域多项关键核心技术专利。\r\n	&lt;/p&gt;\r\n	&lt;div class=&quot;img-box&quot;&gt;\r\n		&lt;img src=&quot;/public/index/images/news/news2.jpg&quot; /&gt; \r\n		&lt;p&gt;\r\n			中兴智汇贝多福签署战略合作协议\r\n		&lt;/p&gt;\r\n	&lt;/div&gt;\r\n	&lt;div class=&quot;img-box&quot;&gt;\r\n		&lt;img src=&quot;/public/index/images/news/news3.jpg&quot; /&gt; \r\n		&lt;p&gt;\r\n			贝多福智汇总裁齐玉田先生演讲\r\n		&lt;/p&gt;\r\n	&lt;/div&gt;\r\n	&lt;div class=&quot;img-box&quot;&gt;\r\n		&lt;img src=&quot;/public/index/images/news/news4.jpg&quot; /&gt; \r\n		&lt;p&gt;\r\n			中兴智汇董事总经理张益峰先生演讲\r\n		&lt;/p&gt;\r\n	&lt;/div&gt;\r\n	&lt;div class=&quot;img-box&quot;&gt;\r\n		&lt;img src=&quot;/public/index/images/news/news5.jpg&quot; /&gt; \r\n		&lt;p&gt;\r\n			住友集团智尚酒店CEO章建春先生演讲\r\n		&lt;/p&gt;\r\n	&lt;/div&gt;\r\n	&lt;p class=&quot;plan-content&quot;&gt;\r\n		演讲中，齐玉田先生介绍了他的专利技术成果：人类在思考如何改造和利用地球的过程中都有一个共同的最简数学模型；利用这个数学模型贝多福团队研发出了被称为“智慧容器”的两种智能硬件模块，让任何不懂技术的人都可以用这两种模块像拼积木一样任意组合并通过手机APP把自己想法传输给“智慧容器”，创造出有社会价值和经济价值的应用，并可分享给其他人使用，人人都可以成为发明家，人人都可以为社会贡献自己的智慧；齐玉田说，该技术可以应用于人类生产生活的各个领域，比如农业专家可以利用贝多福的智能硬件模块把各种植物的种植思想复制到农业大棚中或阳台花盆中，让不会种地的人瞬间得到种植思想，如果每亩地的使用该种植思想收费100元，1万亩地农业专家就可以获得100万元的收益；该技术的普及和推广将加速人类实现智慧地球的进程，让每个只要有想法的人都有可能成为百万富翁，贝多福公司正在搭建这样的思想分享和创造平台。\r\n	&lt;/p&gt;\r\n	&lt;p class=&quot;plan-content&quot;&gt;\r\n		据了解该技术目前已经成功应用于智能家居、智慧农业、智慧音乐、创客平台等多个领域。中兴智汇贝多福的强强联手，将对中国物联网技术产生引领的灯塔效果，必然加速物联网技术在各个行业的产业化应用。\r\n	&lt;/p&gt;\r\n	&lt;p class=&quot;source&quot;&gt;\r\n		新闻出处：&lt;a href=&quot;http://shenzhen.sina.com.cn/news/zh/2016-08-23/detail-ifxvcsrm2272176.shtml&quot;&gt;新浪网&lt;/a&gt; \r\n	&lt;/p&gt;', 1, 0, 1471914000),
	(2, '物联由我，跨界合作贝多福智慧社区综合解决方案', '\\public\\uploads\\20161125\\e420c704bc427f44f3bce9d85aa4d930.png', '第十二届"广州国际建筑电气技术展览会"于2015年6月9至12日在广州中国进出口商品交易会展馆举办，参展商和观众人数再创新高。本届展会云集来自11个国家及地区、共298家参展商（2014：290家），包括来自比利时、法国、德国、意大利、香港、中国、日本、瑞士、台湾、英国及美国的多家企业,此外，今年展会亦再度与广州国际照明展览会同期举行。', '&lt;!--\r\n&lt;div&gt;\r\n	--&gt;\r\n	&lt;p class=&quot;plan-img&quot;&gt;\r\n		&lt;img src=&quot;/public/index/images/news/news1.png&quot; /&gt; \r\n	&lt;/p&gt;\r\n	&lt;p class=&quot;plan-title&quot;&gt;\r\n		贝多福展位E18\r\n	&lt;/p&gt;\r\n	&lt;p class=&quot;plan-content&quot;&gt;\r\n		第十二届&quot;广州国际建筑电气技术展览会&quot;于2015年6月9至12日在广州中国进出口商品交易会展馆举办，参展商和观众人数再创新高。本届展会云集来自11个国家及地区、共298家参展商（2014：290家），包括来自比利时、法国、德国、意大利、香港、中国、日本、瑞士、台湾、英国及美国的多家企业。此外，今年展会亦再度与广州国际照明展览会同期举行，两展成功迎来了来自131国家及地区、共135,990名观众(2014年:129,885 名)，人数较去年增长4.7%。\r\n	&lt;/p&gt;\r\n	&lt;p class=&quot;plan-content&quot;&gt;\r\n		新华社、中新社、央视财经、央视国际、人民网、凤凰网、网易、新浪、文汇报、中国日报、国际商报、中国经营报、中国贸易报、香港商报、澳门日报、华尔街日报、法兰克福汇报、广东卫视、华南都市报、广州日报等百多家资深媒体报道了展会盛况。\r\n	&lt;/p&gt;\r\n&lt;img class=&quot;plan-img2&quot; src=&quot;/public/index/images/news/news2.png&quot; /&gt; \r\n	&lt;p class=&quot;plan-content&quot;&gt;\r\n		广州国际建筑电气技术展览会，在业内的影响力和知名度较高，因此我们今年借由参展，推广全系列的智能家居产品，包括智慧社区、智慧酒店、智慧农场应用、智能照明等， 以及完整的解决方案。作为智能家居的公司，我们发现消费者对于智能家居产品的需求不断上升，亦认可智能控制系统的巨大发展潜力，配合行业趋势，传感执行器将成为市场的主打产品。\r\n	&lt;/p&gt;\r\n	&lt;p class=&quot;plan-content&quot;&gt;\r\n		对我们来说，广州国际建筑电气技术展览会是推广新产品、打响品牌的最佳渠道。 \r\n                        通过以往展会，我们明显感觉到物联网技术的巨大进步和突破，整个市场正逐步壮大，这个展会比较贴合市场发展步伐。\r\n	&lt;/p&gt;\r\n	&lt;p class=&quot;plan-content&quot;&gt;\r\n		本次我司展台搭建共80平方米，展位布局豪华，规模宏大，主要展示我司产品、智慧家居、智慧酒店、农场+，以及相关综合解决方案；\r\n	&lt;/p&gt;\r\n	&lt;p class=&quot;plan-content&quot;&gt;\r\n		本次展会专业观众将达到15万人次，为期4天，海外观众占20%，国内观众80%，展览面积2万平方米，300余家参展企业，17场专业高端行业研讨会，涵盖超过90个讲题。\r\n	&lt;/p&gt;\r\n	&lt;p class=&quot;plan-img3&quot;&gt;\r\n		&lt;img src=&quot;/public/index/images/news/news3.png&quot; /&gt; \r\n	&lt;/p&gt;', 2, 0, 1462928400),
	(5, '贝多福引领智慧生活，高交会展现品质人生', '\\public\\uploads\\20161201\\5c5676e232c08ee142c71e921e72fb25.jpg', '享有“中国科技第一展”之称的高交会，将于2015年11月16日在深圳举行。至今以连续成功举办16届，是目前中国规模最大，最具影响力的科技类展会。中国国际高新科技成果交易会（简称高交会)由中国商务部、科技部、工信部、国家发改委、教育部、农业部、国家知识产局、中国科学院、中国工程院等部委和深圳市人民政府共同举办，此次高交会主题是“创新创业，跨界融合”。', '&lt;div style=&quot;text-align:center;&quot;&gt;\r\n	&lt;img src=&quot;/public/index/images/4_1.jpg&quot; /&gt; \r\n&lt;/div&gt;\r\n&lt;p&gt;\r\n	享有“中国科技第一展”之称的高交会，将于2015年11月16日在深圳举行。至今已连续成功举办16届，是目前中国规模最大，最具影响力的科技类展会。中国国际高新科技成果交易会（简称高交会)由中国商务部、科技部、工信部、国家发改委、教育部、农业部、国家知识产局、中国科学院、中国工程院等部委和深圳市人民政府共同举办，此次高交会主题是“创新创业，跨界融合”。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	我公司将参加“2015年第17届高交会展”，这次会展我公司以“个性思想，智慧生活”为主题，展示了一系列智能家居产品，分为四个系列：&lt;br /&gt;\r\n智慧灯光控制、智慧电器控制、智慧远程安防、智慧门窗控制。\r\n&lt;/p&gt;\r\n&lt;div style=&quot;text-align:center;&quot;&gt;\r\n	&lt;img src=&quot;/public/index/images/4_2.jpg&quot; /&gt;&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;/div&gt;\r\n&lt;div style=&quot;text-align:center;&quot;&gt;\r\n	&lt;img src=&quot;/public/index/images/4_3.jpg&quot; /&gt;&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;/div&gt;\r\n&lt;div style=&quot;text-align:center;&quot;&gt;\r\n	&lt;img src=&quot;/public/index/images/4_4.jpg&quot; /&gt;&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;/div&gt;\r\n&lt;div style=&quot;text-align:center;&quot;&gt;\r\n	&lt;img src=&quot;/public/index/images/4_5.jpg&quot; /&gt;&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;\r\n	贝多福公司自成立以来，秉着智能、科技、生活、情感四合一的思想，把智慧带入情感，将科技融入生活，使我们的产品更富有人情味，更具有个性特征。设计师的每一款都独具特色，使得物物相联，物联互通，人与物互通，自由随心，这让我们每一款产品，都成为用户的忠诚的朋友。\r\n我们拥有一整套完善齐全的智慧家居解决方案，可以针对不同客户类型，例如：公寓、商业住宅、别墅、会所、写字楼、星级酒店、企业、商业卖场等，免费量身定做，提供满足个性化需要求的解决方案。让我们的系统充满您的思想，我们的团队秉承“更安全，更稳定，更智能，更简洁，更实惠”的商业理念，愿为您创造舒适、温馨、智能的生活环境。\r\n&lt;/p&gt;', 3, 0, 1447203600),
	(6, '2014中国智慧空间产业发展论坛在深圳隆重开幕', '\\public\\uploads\\20161201\\0c9b7a9e23f3497c62e82850a7992593.jpg', '在国家信息中心专家委员会，中国通信工业协会物联网专家委员会，北京交通大学工程研究院，深圳市经济贸易和信息化委员会等单位及相关领导的大力指导下，由中国智慧空间产业发展联盟（筹）主办，深圳市贝多福科技有限公司承办的"2014中国智慧空间产业发展论坛"暨"智慧生活生态链构建与新品发布会"于10月20日下午在深圳市华侨城洲际大酒店隆重开幕。', '&lt;div style=&quot;text-align:center;&quot;&gt;\r\n	点亮智慧生活 构筑智慧空间&lt;br /&gt;\r\n2014中国智慧空间产业发展论坛在深圳隆重开幕&lt;br /&gt;\r\n贝多福科技有限公司总经理齐玉田在论坛上作主旨演讲&lt;br /&gt;\r\n&lt;img src=&quot;/public/index/images/1.jpg&quot; /&gt;&lt;br /&gt;\r\n论坛主会场&lt;br /&gt;\r\n&lt;img src=&quot;/public/index/images/2.jpg&quot; /&gt;&lt;br /&gt;\r\n深圳市政协副主席    张效民&lt;br /&gt;\r\n&lt;img src=&quot;/public/index/images/3.jpg&quot; /&gt;&lt;br /&gt;\r\n深圳市经济贸易和信息化委员会副主任    贾兴东&lt;br /&gt;\r\n&lt;img src=&quot;/public/index/images/4.jpg&quot; /&gt;&lt;br /&gt;\r\n深圳市贝多福科技有限公司总经理    齐玉田&lt;br /&gt;\r\n&lt;img src=&quot;/public/index/images/5.jpg&quot; /&gt;&lt;br /&gt;\r\n论坛对话环节&lt;br /&gt;\r\n&lt;img src=&quot;/public/index/images/6.jpg&quot; /&gt;&lt;br /&gt;\r\n智慧生活生态链构建与贝多福新品发布仪式&lt;br /&gt;\r\n&lt;img src=&quot;/public/index/images/7.jpg&quot; /&gt;&lt;br /&gt;\r\n深圳市贝多福科技有限公司战略投资签约仪式&lt;br /&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;\r\n	在国家信息中心专家委员会，中国通信工业协会物联网专家委员会，北京交通大学工程研究院，深圳市经济贸易和信息化委员会等单位及相关领导的大力指导下，由中国智慧空间产业发展联盟（筹）主办，深圳市贝多福科技有限公司承办的&quot;2014中国智慧空间产业发展论坛&quot;暨&quot;智慧生活生态链构建与新品发布会&quot;于10月20日下午在深圳市华侨城洲际大酒店隆重开幕。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	贝多福科技有限公司总经理、中国通信工业协会物联网专家委员会专家委员齐玉田在论坛上作《智慧生活个性思想》主旨演讲。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	深圳市政协副主席张效民、深圳市经济贸易和信息化委员会副主任贾兴东、北京交通大学工程研究院常务副院长、中国通信工业协会物联网专家委员会副主任、国家物联网重大应用示范工程专家组成员黄磊、中国互联网金融智库专家、中关村大数据产业联盟副秘书长颜阳、深圳市信息惠民推进办副主任信息惠民国家试点城市指导专家组专家、电子政务云计算应用技术国家工程实验室主任连樟文等来自国家、深圳市相关部门及行业协会的领导专家在论坛上致辞并演讲。论坛还吸引了来自物联网、IT、房产、传媒等相关产业的企业代表，高校及研究机构的专业人士，相关媒体人士200多人参加了论坛活动。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	对于中国经济来说，2014年是跌宕起伏的一年，物联网成为新经济发展的引擎和源动力。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	北京交通大学工程研究院常务副院长、中国通信工业协会物联网专家委员会副主任、国家物联网重大应用示范工程专家组成员黄磊说，在移动互联网、大数据与云计算、智慧生活等领域的新理念、新技术、新产品的大力推动下，智慧空间产业应运而生。国内智慧空间产业模式发生了急剧的变化，从而在传统行业也引发了一系列革新，甚至产生了颠覆性的影响。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	智慧空间是指应用物联网、大数据、人工智能等科学技术方法，在实现人与人、人与物、物与物之间实时主动感知交互的基础上，以人的需求为中心目标，智能化地主动调用控制各类装备、手段为人服务，从而极大地方便人类生活与生产的一个相对有限的空间范围。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因此，本届论坛以物联网发展为源动力，以&quot;点亮智慧生活，构筑智慧空间， 引领物联网技术应用创新发展&quot;为主题，旨在推进物联网技术创新应用，加强产业链间相互交流合作，共同探讨物联网行业飞速发展带来的机遇与挑战，分析融合当前国内外背景下的智慧产业的格局，分享来自不同行业与角度成功经验和先进技术，从而推动智慧城市的发展。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	论坛认为，互联网在时时刻刻推进中国经济发展，在经济领域，互联网加速向传统产业渗透，产业边界日益交融，新型商务模式和服务经济加速兴起，衍生了新智慧生活空间等新的业态。由于互联网、智慧生活等产业的发展，数字化生活已成为人们日常生活不可分割的重要组成部分，同时也加速并影响着资本的运作流向，以及传统商业营销向数字营销发展的脚步。无论是资本的精准化投放还是内容化的切入，无一不是针对人们愈发丰富多彩的数字化生活做出的同步创新。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因此，本次论坛被业界评论为目前国内最专业和最具创新亮点的物联网智慧生活产业盛会之一。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	论坛除了演讲之外，还安排了圆桌对话环节，通过物联网领袖人物的不同理念交锋，带来物联网理念的&quot;干货&quot;，引起了在场观众的共鸣。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	对话环节由中国通信工业协会物联网专家委员会秘书长刘兵兵主持。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本次论坛期间，在相关部门领导的支持和帮助下还成立了以深圳市贝多福科技有限公司为主要发起单位的&quot;中国智慧空间产业发展联盟&quot;筹备工作组，这一联盟将涵盖了政府部门、运营商、系统集成厂商、应用方等整个物联网产业链上的相关单位。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	联盟将以推动物联网的技术进步、应用推广和产业化为目标，以企业为主体，市场为导向，为上下游相关产业集聚创新和应用推广搭建合作平台，实现优势互补、资源共享、协同发展、推动行业标准制订，共同打造具有整体竞争力的中国智慧空间产业链。联盟的成立将对中国物联网智慧空间产业的发展发挥重要作用。\r\n&lt;/p&gt;', 4, 0, 1413853200),
	(7, '【2014诺奖深度解读】物理学奖：照亮世界的蓝光LED', '\\public\\uploads\\20161201\\f746fc203ffe7749eb28605c55be072d.jpg', '2014年10月7日，诺贝尔物理学奖揭晓，分别授予日本名古屋大学的赤崎勇（Isamu Akasaki）、天野浩（Hiroshi Amano）以及美国加州大学圣巴巴拉分校的中村修二（ShujiNakamura），以表彰他们在发明一种新型高效节能光源方面的贡献，即蓝色发光二极管(LED)。', '&lt;div style=&quot;text-align:center;&quot;&gt;\r\n                        &lt;img src=&quot;/public/index/images/2_1.jpg&quot;/&gt;\r\n                        &lt;/div&gt;\r\n                        &lt;p&gt;\r\n                        2014年10月7日，诺贝尔物理学奖揭晓，分别授予日本名古屋大学的赤崎勇（Isamu Akasaki）、天野浩（Hiroshi Amano）以及美国加州大学圣巴巴拉分校的中村修二（ShujiNakamura），以表彰他们在发明一种新型高效节能光源方面的贡献，即蓝色发光二极管(LED)。\r\n                        &lt;/p&gt;\r\n                        &lt;p&gt;\r\n                        根据阿尔弗雷德•诺贝尔的遗嘱：诺贝尔奖授予那些对全人类的福祉作出重大贡献的成就。通过蓝色LED技术的应用，人类可以使用一种全新的手段产生白色光源。相比旧式的灯具，LED灯具有更加持久、更加高效的优点。\r\n                        &lt;/p&gt;\r\n                        &lt;div style=&quot;text-align:center;&quot;&gt;\r\n                        &lt;img src=&quot;/public/index/images/2_2.jpg&quot;/&gt;&lt;br /&gt;\r\n                        诺贝尔奖公布现场：使用蓝光LED拼成的A.Nobel字样\r\n                        &lt;/div&gt;\r\n                        &lt;p&gt;\r\n                        诺奖官网称，红色与绿色发光二极管已经伴随我们超过半个世纪，但我们还需要蓝光的到来才能彻底革新整个照明技术领域，因为只有完整的采用红、绿、蓝三原色之后，我们才能产生照亮我们世界的白色光源。但尽管工业界和学界付出了巨大的努力，产生蓝色光源的技术挑战仍然持续了超过30年之久。\r\n                        &lt;/p&gt;\r\n                        &lt;p&gt;\r\n                        诺贝尔奖委员会主席，瑞典查尔姆斯理工大学的皮尔•德尔辛教授(Per Delsing)介绍了此次获奖人成果的来之不易，&quot;有趣的是，很多大公司此前都曾尝试做这件事，但他们都失败了。但这几个人就是坚持着不肯放弃，他们一次又一次的实验，并最终取得了成功。&quot;\r\n                        &lt;/p&gt;\r\n                        &lt;p&gt;\r\n                        赤崎勇、天野浩、中村修二在上世纪90年代早期，从半导体中发现蓝色光束，是日本产研结合的成果。当时，赤崎勇和天野浩在日本名古屋大学工作，而中村修二则在位于四国岛上的德岛市内一家名为&quot;日亚化学&quot;(Nichia Chemicals)的小公司工作。在GaN（氮化镓，一种发光材料）LED的研究阶段，赤崎勇领导的研究小组取得了出色的成果，在之后的实用化及高亮度化阶段，中村修二则发挥了重要作用。（这里要注明一下，从原理上来说，好几种材料都能实现蓝色发光功能。其中，氮化镓是最受人冷落的。但恰恰只因&quot;其他人没有采用&quot;，中村便决定了他的选择。）当他们通过半导体产生出蓝色光源时，照明技术革命的大门打开了。白炽灯照亮了整个20世纪，而21世纪将是LED灯的时代。\r\n                        &lt;/p&gt;\r\n                        &lt;p&gt;\r\n                        中村修二后来被誉为&quot;蓝光LED之父&quot;。\r\n                        &lt;/p&gt;\r\n                        &lt;div style=&quot;text-align:center;&quot;&gt;\r\n                        发光二极管工作原理\r\n                        &lt;img src=&quot;/public/index/images/2_3.jpg&quot;/&gt;&lt;br /&gt;\r\n                        上方是LED的工作原理，下方的是蓝色LED的工作原理\r\n                        &lt;/div&gt;\r\n                        &lt;p&gt;\r\n                        LED技术与手机，电脑，以及所有其他基于量子现象原理的现代技术一样，源于同样的工程技术手段。一根发光二极管内包括几个分层：n层带有多余负电荷，p层则电子数不足，你也可以将其理解为这里存在多余的带有正电的空洞，或&quot;正电穴&quot;。\r\n                        &lt;/p&gt;\r\n                        &lt;p&gt;\r\n                        在它们之间是一层活动层，当向半导体施加一个电压，就会驱动带负电的电子层与正电穴层之间的相互作用。当电子与正电穴相遇，两者就会结合并产生光线。（这一过程产生光线的波长完全取决于半导体的性质。蓝光波长很短，只有某些特定材料可以产生这一波长的光线。）\r\n                        &lt;/p&gt;\r\n                        &lt;p&gt;\r\n                        高效节能&lt;br /&gt;\r\n                        ​LED灯在工作过程中，直接将电能转换为光能。​\r\n                        &lt;/p&gt;\r\n                        &lt;p&gt;\r\n                        而白炽灯和卤钨灯等传统光源，则依赖电流加热一根灯丝后，实现发光，电能首先是被转化为热，只有很小一部分转化成了光。两者相比，要实现相同发光效果，新型LED灯所消耗的能源就要低得多。另外，LED技术目前仍在不断被改进，其发光效率还在不断提升。最新的记录已经突破了300流明/瓦，而一般的灯泡这一指标是16流明/瓦，日光灯则是70流明/瓦。考虑到当今世界的电力消耗有近四分之一用于照明，如果全部使用高效节能的LED灯，那么可以节约地球资源，反馈到经济效益上是非常明显的。\r\n                        &lt;/p&gt;\r\n                        &lt;div style=&quot;text-align:center;&quot;&gt;\r\n                        &lt;img src=&quot;/public/index/images/2_4.jpg&quot;/&gt;&lt;br /&gt;\r\n                        相比于其他光源，LED灯所需功率更低\r\n                        &lt;/div&gt;\r\n                        &lt;p&gt;\r\n                        由于LED灯所需的能量较低，廉价到本地太阳能就能给LED灯供能，这对提高全球15亿无法接受电网供应的人们的生活质量方面，同样有着非常明朗的前途。\r\n                        &lt;/p&gt;\r\n                        &lt;p&gt;\r\n                        持久性强&lt;br /&gt;\r\n                        LED灯不仅照明效率高，持久性也更强。通常情况下按白炽灯工作寿命1000小时算，超过这个时间后灯丝就被烧坏，荧光灯的点亮时间是白炽灯的10倍，为1万小时， LED灯则要高达10万小时。&lt;br /&gt;\r\n                        因此，尽管蓝光LED仅仅被发明了20年，但它已带来了一种全新的白光生产方式，我们全部人都因此受益。&lt;br /&gt;\r\n                        &lt;/p&gt;\r\n                        &lt;p&gt;\r\n                        历史：&lt;br /&gt;\r\n                        最早使用半导体实现发光的报道要见于1907年，由1909年的诺贝尔奖获得者，无线电与电报发明者马可尼的同事亨利•罗德(Henry J. Round)实现。随后在1920年代和1930年代，苏联的奥列格•罗塞夫(Oleg V. Losev)对发光原理进行了详尽考察。然而不管是罗德还是罗塞夫，他们都缺乏能真正理解这一现象所需的知识。人们还需要等待数十年的时间，直到电致发光原理提出之后，事情才有了真正的进展。&lt;br /&gt;\r\n                        1950年代末，红色发光二极管被研制出来。它们被应用在了电子手表以及计算器等设备之中，或是作为各种电子设备的开关提示器。在这一技术的发展初期，人们便已经清楚的意识到需要研制一种具有更短波长，因此也具有更高光子能量的二极管，以便实现白色光源。很多实验室为此进行了努力，但最后都以失败告终。&lt;br /&gt;\r\n                        ​和其他革命性的产品被发明出来一样，三位诺贝尔奖获得者在挑战蓝色LED光源过程中，同样进行了数千次的实验，他们自己建造了所需要的设备，学习有关技术。大多数时候他们都失败了，但这并没有让他们丧失信心，这是一个实验室最宝贵的品质。​\r\n                        &lt;/p&gt;', 5, 0, 1412902800),
	(8, '阿里开盘价92.7美元，我们富豪榜又要重排了！', '\\public\\uploads\\20161201\\4931e839f8a9be138a5fbb9727935519.jpg', '阿里巴巴开盘价：开盘价92.7美元！​昨晚，阿里巴巴将发行价定为每股68美元。事实上，这个发行价也让阿里巴巴的市值达到了1676亿美元，比起它在美国的参照物亚马逊的1500亿美元都要高出不少。​但在敲钟结束后不久，现场集合竞价信息就显示，阿里巴巴开盘价或在80美元-83美元之间。随后，开盘价询价区间多次上调，涨至82-85美元。​在这个时候，马云坐不住了，开始在大厅不停溜达。​', '&lt;div style=&quot;text-align:center;&quot;&gt;\r\n	&lt;img src=&quot;/public/index/images/3_1.jpg&quot; /&gt; \r\n&lt;/div&gt;\r\n&lt;p&gt;\r\n	阿里巴巴开盘价：开盘价92.7美元！&lt;br /&gt;\r\n昨晚，阿里巴巴将发行价定为每股68美元。事实上，这个发行价也让阿里巴巴的市值达到了1676亿美元，比起它在美国的参照物亚马逊的1500亿美元都要高出不少。&lt;br /&gt;\r\n但在敲钟结束后不久，现场集合竞价信息就显示，阿里巴巴开盘价或在80美元-83美元之间。随后，开盘价询价区间多次上调，涨至82-85美元。&lt;br /&gt;\r\n在这个时候，马云坐不住了，开始在大厅不停溜达。&lt;br /&gt;\r\n就在前一刻，他还在接受美国媒体NBC采访。他说到自己第一次到美国的经历，看到车水马龙霓虹闪烁，他要建立中国的事业，他说自己像美国电影里的阿甘一样，他曾经看过这个电影不下数十次。他说他不关心股价，只关心能不能很好服务客户。他认为应该相信科技，相信年轻人。&lt;br /&gt;\r\n马云在CNBC上说，&quot;14年前，我问妻子，你希望我成为一个有钱人，还是一名受人敬仰的商人？她说是后者，因为她从没想过我会成为有钱人。&quot; 现在，他希望15年后，阿里能和微软相提并论，做到比沃尔玛更大。&lt;br /&gt;\r\n第三次开盘价询价区间，又涨至84到87美元。马云钻进了做市商巴克莱的房间里。&lt;br /&gt;\r\n据其他媒体同行透露，现场的交易员，已经开始讨论发行价究竟会在92还是94美元。&lt;br /&gt;\r\n第四轮开盘价询价区间，升至86到88美元。开盘价指示区间收窄。&lt;br /&gt;\r\n第五轮开盘价询价区间，升至87到89美元。如果以89美元作为开盘价，阿里的市值将达到2300亿美元，相当于摩根大通的市值，大于甲骨文市值。甲骨文公创始人、身家513亿美元在福布斯全球富豪榜排名第五的拉里·埃里森，就在今日早晨，宣布辞去该公司CEO职务。&lt;br /&gt;\r\n第六轮，升至88至90美元。截至此时，询价时间已经超过推特的79分钟，创下纽交所近10年来询价时间记录。&lt;br /&gt;\r\n第七轮，升至89到91美元。如果按上限91美元计算，这个时候，阿里巴巴的市值已经超过了亚马逊的1530亿美元加上eBay的670亿美元。&lt;br /&gt;\r\n第八轮询价，价格区间调整至90到91美元。开盘价指示区间继续收窄。&lt;br /&gt;\r\n第九轮询价，价格区间调整至91到92美元。但同一时间段，作为阿里巴巴大股东之一的雅虎股价变化不大，目前上涨幅度不到0.5%。&lt;br /&gt;\r\n询价进入第十轮，价格区间调整至92到93美元。腾讯港股市值约合1512亿美元，百度美股市值794亿美元，合计2306亿美元。此时阿里巴巴市值已经非常接近百度与腾讯市值之和。\r\n&lt;/p&gt;\r\n&lt;div style=&quot;text-align:center;&quot;&gt;\r\n	&lt;img src=&quot;/public/index/images/3_2.jpg&quot; /&gt; \r\n&lt;/div&gt;\r\n&lt;p&gt;\r\n	北京时间11点46分。马云和一大波人开始聚集在巴克莱门口，等待最后开盘价宣布。&lt;br /&gt;\r\n北京时间23时53分，开盘价92.7美元，大涨36.3%。市值近2300亿美元。苹果目前市值约6100亿美元，谷歌市值4000亿美元。&lt;br /&gt;\r\n尽管没有具体持股员工的数据，但各方分析认为，阿里此次IPO将是中国有史以来最大的一次造富运动。阿里巴巴在杭州总部搭建了纽交所式建筑站台，庆祝在纽交所上市。&lt;br /&gt;\r\n同时，福布斯富豪榜的名次也将发生变动。&lt;br /&gt;\r\n14年前孙正义的软银向阿里巴巴投资了2000万美元，如今这笔投资的价值已经变成了500多亿，持有阿里34%的股份。在此次阿里上市中，孙正义没有抛售所持的阿里股份。他表示，不会出售阿里股份，这次不卖，以后也是，无论股价是否有变化，软银都会是阿里最坚定支持者。\r\n&lt;/p&gt;', 6, 0, 1411174800);
/*!40000 ALTER TABLE `www_bestfu_news` ENABLE KEYS */;


-- Dumping structure for table www_bestfu_com.www_bestfu_node
DROP TABLE IF EXISTS `www_bestfu_node`;
CREATE TABLE IF NOT EXISTS `www_bestfu_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '节点英文标识',
  `title` varchar(64) NOT NULL DEFAULT '' COMMENT '节点名称',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态；0开启，1关闭',
  `remark` varchar(255) DEFAULT '' COMMENT '备注',
  `sort` smallint(6) DEFAULT '1' COMMENT '排序',
  `pid` int(11) NOT NULL DEFAULT '1' COMMENT '父ID',
  `level` tinyint(2) NOT NULL DEFAULT '1' COMMENT '级别（类型）；1模块，2列表，3操作',
  `develop` tinyint(2) NOT NULL DEFAULT '1' COMMENT '开发者模式；0-是，1-否',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='节点表';

-- Dumping data for table www_bestfu_com.www_bestfu_node: ~23 rows (approximately)
/*!40000 ALTER TABLE `www_bestfu_node` DISABLE KEYS */;
INSERT INTO `www_bestfu_node` (`id`, `name`, `title`, `status`, `remark`, `sort`, `pid`, `level`, `develop`) VALUES
	(1, 'node/index', '菜单管理', 0, '菜单管理模块', 8, 0, 1, 1),
	(2, 'system/index', '系统管理', 0, '系统管理模块', 9, 0, 1, 1),
	(3, 'system/index', '系统设置', 0, '', 1, 2, 2, 1),
	(4, 'node/index', '后台菜单', 0, '', 1, 1, 2, 0),
	(5, 'menu/index', '前台菜单', 0, '', 0, 1, 2, 0),
	(7, 'user/index', '用户管理', 0, '', 1, 0, 1, 1),
	(8, 'user/index', '用户列表', 0, '', 1, 7, 2, 1),
	(9, 'role/index', '角色列表', 0, '', 2, 7, 2, 1),
	(10, 'banner/index', '图片管理', 0, '', 2, 0, 1, 1),
	(11, 'banner/index', '首页轮播图', 0, '', 1, 10, 2, 1),
	(12, 'banner/banner', '菜单BANNER图', 0, '', 2, 10, 2, 1),
	(13, 'news/index', '新闻管理', 0, '', 4, 0, 1, 1),
	(14, 'news/index', '新闻列表', 0, '', 1, 13, 2, 1),
	(15, 'message/index', '留言管理', 0, '', 7, 0, 1, 1),
	(16, 'message/index', '留言列表', 0, '', 1, 15, 2, 1),
	(17, 'article/index', '文章管理', 0, '', 5, 0, 1, 1),
	(18, 'contact/index', '联系我们', 0, '', 6, 0, 1, 1),
	(19, 'contact/index', '联系我们', 0, '', 1, 18, 2, 1),
	(20, 'article/about', '集团简介', 0, '', 1, 17, 2, 1),
	(21, 'article/jobs', '工作机会', 0, '', 2, 17, 2, 1),
	(22, 'article/legal', '法律声明', 0, '', 3, 17, 2, 1),
	(23, 'industry/index', '行业领域', 0, '', 3, 0, 1, 1),
	(24, 'industry/index', '领域列表', 0, '', 1, 23, 2, 1);
/*!40000 ALTER TABLE `www_bestfu_node` ENABLE KEYS */;


-- Dumping structure for table www_bestfu_com.www_bestfu_picture
DROP TABLE IF EXISTS `www_bestfu_picture`;
CREATE TABLE IF NOT EXISTS `www_bestfu_picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL DEFAULT '' COMMENT '标题',
  `thumb` varchar(256) NOT NULL DEFAULT '' COMMENT '存储路径',
  `sort` smallint(6) NOT NULL DEFAULT '1' COMMENT '排序',
  `url` varchar(256) DEFAULT '' COMMENT '链接地址',
  `m_id` int(11) NOT NULL DEFAULT '0' COMMENT '所属菜单，type为1时生效',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态；0显示，1关闭',
  `type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '类型；0首页轮播图，1菜单banner图',
  `tab` tinyint(2) NOT NULL DEFAULT '0' COMMENT '新窗口打开；0是，1否',
  `remark` varchar(256) DEFAULT '' COMMENT '说明',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '上传时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='banner图片';

-- Dumping data for table www_bestfu_com.www_bestfu_picture: ~10 rows (approximately)
/*!40000 ALTER TABLE `www_bestfu_picture` DISABLE KEYS */;
INSERT INTO `www_bestfu_picture` (`id`, `title`, `thumb`, `sort`, `url`, `m_id`, `status`, `type`, `tab`, `remark`, `addtime`) VALUES
	(1, '首页轮播图1', '\\public\\uploads\\20161123\\2d7b704f954c7d84356dd2a6c25c6ae8.png', 2, 'http://www.bdf.com/news-1.shtml', 0, 0, 0, 0, '', 1479890673),
	(2, '首页轮播图2', '\\public\\uploads\\20161123\\cd2a72ea197eb1a1588beea3fc71bcdc.png', 4, '', 0, 0, 0, 0, '', 1479891198),
	(3, '首页轮播图3', '\\public\\uploads\\20161123\\336e7c5d738eb901961200c039bc652b.jpg', 1, '', 0, 0, 0, 0, '', 1479894037),
	(4, '首页轮播图4', '\\public\\uploads\\20161123\\65d625e0cbd67adb3e35e252fdb2f04f.png', 3, '', 0, 0, 0, 0, '', 1479894090),
	(9, '联系我们banner图', '\\public\\uploads\\20161206\\e022a2d3810ac0322f8a2a4642113a92.png', 1, '', 5, 0, 1, 1, '联系我们', 1479979045),
	(11, '新闻banner图', '\\public\\uploads\\20161124\\bbefa44f73721f768dc8c594f487f499.png', 1, '', 2, 0, 1, 0, '新闻banner图', 1479987870),
	(12, '集团简介Banner图', '\\public\\uploads\\20161128\\f6c9f6e18347825b609bfcb21d6032e6.jpg', 1, '', 3, 0, 1, 0, '', 1480311884),
	(13, '工作机会banner图', '\\public\\uploads\\20161128\\3a2f26021740bb6025dfacaf33911a36.jpg', 1, '', 6, 0, 1, 0, '', 1480311913),
	(14, '法律声明banner图', '\\public\\uploads\\20161128\\0a99ab8b77ab8c6c4e62644b5f9df62e.jpg', 1, '', 7, 0, 1, 0, '', 1480311943),
	(15, '服务支持banner图', '\\public\\uploads\\20161128\\fdc24db3da9efa7abfd335a69ba4fdfc.jpg', 1, '', 4, 0, 1, 0, '', 1480311993);
/*!40000 ALTER TABLE `www_bestfu_picture` ENABLE KEYS */;


-- Dumping structure for table www_bestfu_com.www_bestfu_role
DROP TABLE IF EXISTS `www_bestfu_role`;
CREATE TABLE IF NOT EXISTS `www_bestfu_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '角色名称',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态；0开启，1关闭',
  `remark` varchar(255) DEFAULT '' COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- Dumping data for table www_bestfu_com.www_bestfu_role: ~2 rows (approximately)
/*!40000 ALTER TABLE `www_bestfu_role` DISABLE KEYS */;
INSERT INTO `www_bestfu_role` (`id`, `name`, `status`, `remark`) VALUES
	(1, '超级管理员', 0, '超级管理员'),
	(4, '普通管理员', 0, '普通管理员');
/*!40000 ALTER TABLE `www_bestfu_role` ENABLE KEYS */;


-- Dumping structure for table www_bestfu_com.www_bestfu_role_user
DROP TABLE IF EXISTS `www_bestfu_role_user`;
CREATE TABLE IF NOT EXISTS `www_bestfu_role_user` (
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色ID，www_bestfu_role表id外键',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID，www_bestfu_user表uid外键'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户角色对应表';

-- Dumping data for table www_bestfu_com.www_bestfu_role_user: ~2 rows (approximately)
/*!40000 ALTER TABLE `www_bestfu_role_user` DISABLE KEYS */;
INSERT INTO `www_bestfu_role_user` (`role_id`, `user_id`) VALUES
	(1, 2),
	(4, 6);
/*!40000 ALTER TABLE `www_bestfu_role_user` ENABLE KEYS */;


-- Dumping structure for table www_bestfu_com.www_bestfu_user
DROP TABLE IF EXISTS `www_bestfu_user`;
CREATE TABLE IF NOT EXISTS `www_bestfu_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '密码',
  `email` varchar(128) NOT NULL DEFAULT '' COMMENT '邮箱',
  `phone` varchar(16) DEFAULT '' COMMENT '手机',
  `realname` varchar(64) DEFAULT '' COMMENT '真实姓名',
  `address` varchar(128) DEFAULT '' COMMENT '地址',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '用户状态，0-正常，1-禁用',
  `is_del` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否删除，0-未删除，1-已删除',
  `lasttime` int(11) DEFAULT '0' COMMENT '上次登录时间',
  `lastip` varchar(16) DEFAULT '' COMMENT '上次登录地址',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- Dumping data for table www_bestfu_com.www_bestfu_user: ~3 rows (approximately)
/*!40000 ALTER TABLE `www_bestfu_user` DISABLE KEYS */;
INSERT INTO `www_bestfu_user` (`uid`, `username`, `password`, `email`, `phone`, `realname`, `address`, `status`, `is_del`, `lasttime`, `lastip`, `addtime`) VALUES
	(1, 'root', '###91d809cd04377cd7e94b5a15ce1f951c', 'liangjian@bestfu.com', '15934854815', '梁健', '西安市科技二路西安软件园汉韵阁B301', 0, 0, 1481083577, '127.0.0.1', 1478480400),
	(2, 'admin', '###1b2967588713b658dd803ed0c94d726d', '', '', '', '', 0, 0, 1481081777, '127.0.0.1', 1479698372),
	(6, 'guest', '###1b2967588713b658dd803ed0c94d726d', '', '', '', '', 0, 0, 1480922663, '127.0.0.1', 1479890918);
/*!40000 ALTER TABLE `www_bestfu_user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
