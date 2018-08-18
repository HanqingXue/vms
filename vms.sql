-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-08-18 10:29:35
-- 服务器版本： 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vms`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_attraction`
--

CREATE TABLE `tp_attraction` (
  `attrs_id` int(11) NOT NULL,
  `attr_name` text CHARACTER SET utf8 NOT NULL,
  `attr_type` text CHARACTER SET utf8 NOT NULL,
  `attr_score` int(11) NOT NULL,
  `attr_lowest_price` int(11) NOT NULL,
  `attr_desc` text CHARACTER SET utf8 NOT NULL,
  `attr_addr` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tp_attraction`
--

INSERT INTO `tp_attraction` (`attrs_id`, `attr_name`, `attr_type`, `attr_score`, `attr_lowest_price`, `attr_desc`, `attr_addr`) VALUES
(0, '北京大学', '名胜古迹', 5, 7, '中国第一最高学府', '北京市海淀区颐和园路5号'),
(1, '北京大学博物馆', '文博', 4, 0, '北京大学的博物馆', '北京市海淀区颐和园路6号');

-- --------------------------------------------------------

--
-- 表的结构 `tp_attr_tickets`
--

CREATE TABLE `tp_attr_tickets` (
  `ticket_id` int(11) NOT NULL,
  `ticket_attr_id` int(11) NOT NULL,
  `ticket_name` text CHARACTER SET utf8 NOT NULL,
  `ticket_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tp_attr_tickets`
--

INSERT INTO `tp_attr_tickets` (`ticket_id`, `ticket_attr_id`, `ticket_name`, `ticket_price`) VALUES
(1, 0, '北京大学燕园校区门票', 7),
(2, 0, '北京大学语音讲解门票', 10),
(3, 1, '北京大学博物馆门票', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tp_cart`
--

CREATE TABLE `tp_cart` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL DEFAULT '0' COMMENT '购物人',
  `goods_id` int(11) NOT NULL DEFAULT '0',
  `num` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `tp_checkin`
--

CREATE TABLE `tp_checkin` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `room_id` int(11) NOT NULL DEFAULT '0' COMMENT '酒店ID',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '姓名',
  `IDcard` char(18) NOT NULL DEFAULT '' COMMENT '身份证',
  `number` char(50) DEFAULT '' COMMENT '房号',
  `mobile` varchar(11) NOT NULL DEFAULT '' COMMENT '手机',
  `indate` varchar(25) NOT NULL DEFAULT '' COMMENT '入住日期',
  `outdate` varchar(25) NOT NULL DEFAULT '' COMMENT '退房日期',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '房费',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '定金',
  `total_shopping` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '购物总金额',
  `pay_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '结算状态',
  `mark` text,
  `reservation` tinyint(1) NOT NULL DEFAULT '0' COMMENT '预定状态',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '退房状态',
  `create_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `tp_goods`
--

CREATE TABLE `tp_goods` (
  `goods_id` int(11) NOT NULL,
  `goods_price` float NOT NULL,
  `goods_title` text CHARACTER SET utf8 NOT NULL,
  `goods_content` text CHARACTER SET utf8 NOT NULL,
  `goods_cover` text NOT NULL,
  `good_intro` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tp_goods`
--

INSERT INTO `tp_goods` (`goods_id`, `goods_price`, `goods_title`, `goods_content`, `goods_cover`, `good_intro`) VALUES
(1, 49.6, '春笋 新鲜 野生 现挖农产品新鲜蔬菜竹笋', '竹笋（英语：bamboo shoot），是竹的幼芽，也称为笋。竹为多年生常绿禾本目植物，食用部分为初生、嫩肥、短壮的芽或鞭。竹原产中国，类型众多，适应性强，分布极广。\r\n在中国自古被当作“菜中珍品”。竹笋是中国传统佳肴，味香质脆，食用和栽培历史极为悠久。《诗经》中就有“加豆之实，笋菹鱼醢”、“其籁伊何，惟笋及蒲”等诗句，表明了人民食用竹笋有2500年以至3000年的历史。\r\n中医认为竹笋味甘、微寒，无毒。在药用上具有清热化痰、益气和胃、治消渴、利水道、利膈爽胃等功效。竹笋还具有低脂肪、低糖、多纤维的特点，食用竹笋不仅能促进肠道蠕动，帮助消化，去积食，防便秘，并有预防大肠癌的功效。', '/assets/img/good1.png', '/assets/img/good1_intro.png'),
(2, 20.14, '有机黄米养生粥 \r\n泥河湾 有机黄小米养生粥 杂粮', '黄米又称黍、糜子、黄米、夏小米、黄小米，有糯质和非糯质之别，糯质黍多作以醇酒，非糯质黍，称为穄，以食用为主。原产中国北方，是古代黄河流域重要的粮食作物之一。照字典的解释，是去了壳的黍子的果实，比小米稍大，颜色淡黄，煮熟后很黏。黄米可用于煮粥、做糕、做米饭和酿酒。黄米、小米同出北方，但在北方人眼里，黄米是要高于小米的。人们拿它当江米使，有些地方还拿它做糕待客。', '/assets/img/good2.png', '/assets/img/good2_intro.png'),
(3, 100.12, '  天贵 买2送48.8鸭1只 风干鸡咸鸡 鸡肉700g以上 腊肉咸肉 非熟食烧鸡 农家散养土鸡腌制整只  ', '土鸡，家禽的一种。有别于笼养的肉鸡。其中以“山坡散养土鸡”为最好，公鸡冠大而红，性烈好斗，母鸡鸡冠极小。土鸡也叫草鸡、笨鸡，是指从古代家养驯化而成，从未经过任何杂交和优化配种，长期以自然觅食或结合粗饲喂养而成，具有较强的野外觅食和生存能力。具有耐粗饲、就巢性强和抗病力强等特性，肉质鲜美。', '/assets/img/good3.png', '/assets/img/good3_intro.png'),
(4, 15.5, '农家新语 陕西大荔冬枣3斤 脆甜鲜枣 现摘新鲜水果 顺丰速运', '鲜枣(又名鲜食枣)，是指没有经过加工直接从枣树采摘下来的枣果。鲜枣的营养价值比干制品枣类营养价值高很多，但由于保鲜技术缺陷，导致不利于保存。所以鲜枣的保鲜期比较短暂，建议即摘即食。', '/assets/img/good4.png', '/assets/img/good4_intro.jpg.dpg');

-- --------------------------------------------------------

--
-- 表的结构 `tp_log_imgs`
--

CREATE TABLE `tp_log_imgs` (
  `imgid` int(11) NOT NULL,
  `imgurl` text NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tp_log_imgs`
--

INSERT INTO `tp_log_imgs` (`imgid`, `imgurl`, `section_id`) VALUES
(1, 'https://img1.qunarzz.com/travel/d8/1808/73/7c4661e097a772b5.jpg_r_640x427x70_7d06e433.jpg', 2),
(2, 'https://img1.qunarzz.com/travel/d8/1808/73/7c4661e097a772b5.jpg_r_640x427x70_7d06e433.jpg', 2);

-- --------------------------------------------------------

--
-- 表的结构 `tp_log_sections`
--

CREATE TABLE `tp_log_sections` (
  `section_id` int(11) NOT NULL,
  `section_content` text CHARACTER SET utf8 NOT NULL,
  `section_title` text CHARACTER SET utf8 NOT NULL,
  `travels_id` int(11) NOT NULL,
  `section_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tp_log_sections`
--

INSERT INTO `tp_log_sections` (`section_id`, `section_content`, `section_title`, `travels_id`, `section_url`) VALUES
(1, '依然留恋秦朝吗？我问我自己。答案是肯定的。我爱大漠孤烟，我爱盔甲弓箭，我爱铜镜胭脂，我更钟情于完成华夏大一统的秦始皇。也许战乱的秦朝什么也给不了我，但却能给我一个意念，让我盼着收复中原那辉煌的一天。有梦总归是好的。\r\n\r\n西安，作为六朝古都，丝绸之路起点，有着浓厚的历史文化底蕴，仿佛她有很多很多的秘密等待着我们去探寻，古朴中又透漏着一些贵族之气，很遗憾这次没有深入的去了解这座城，只是选择前往最为著名的秦始皇兵马俑，让我梦回秦朝，圆了昨日的梦。在即将抵达西安城区的时候，临窗远远的便能看到秦岭的雄姿，不禁让我想起了《白鹿原》、《秋菊打官司》、《平凡的世界》等经典之作，也让我想起了羊头巾、毛马甲、红腰带还有陕北民歌。丰镐都城、秦阿房宫、兵马俑，汉未央宫、长乐宫，隋大兴城，唐大明宫、兴庆宫等都勾勒出了浓厚的“长安情结”。', '梦回秦朝，千古一帝成就泱泱大国', 2, 'https://img1.qunarzz.com/travel/d8/1808/73/7c4661e097a772b5.jpg_r_640x427x70_7d06e433.jpg'),
(2, '“措温布”是青海湖的藏语名，是中国最大的内陆湖泊，也是青海省名称的由来，湖泊地域面积辽阔，环湖一圈360公里，湖水浩瀚无边又蔚蓝空灵。湖的周围被群山环抱，而贴近湖畔则是苍茫的草原，景色壮观优美。青海湖湖水的颜色会随着天气和光线变化，美不胜收，面对着这样的美景大家一致通过峰哥的建议——环湖游，360公里环湖游沿途处处是美景，湖边大片的油菜花盛开，黄色的花田和一望无际的蓝色湖水相互配衬，景色绝美。\r\n\r\n青海湖周边开发了一些景点，湖南处有主景区二郎剑景区，可以乘船游湖；西侧是鸟岛，每年4-6月有数十万只鸟类可供观赏拍摄；湖东以沙滩风光和娱乐为主的沙岛景区，著名的日月山、倒淌河等；北侧则有金银滩和原子城等景点。另外在青海湖周围有很多当地牧民私有的草场，可以直接去到湖边，只要支付给牧民们每人10-20元左右的费用便可。', '寻觅青海湖，那4538平方公里的浩瀚苍穹', 2, 'https://img1.qunarzz.com/travel/d7/1807/ee/f45399becd6136b5.jpg_r_640x426x70_2a168268.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `tp_order`
--

CREATE TABLE `tp_order` (
  `id` int(11) NOT NULL,
  `order_sn` varchar(100) NOT NULL DEFAULT '' COMMENT '订单编号',
  `cid` int(11) NOT NULL DEFAULT '0' COMMENT '入住人ID',
  `c_name` varchar(50) NOT NULL DEFAULT '' COMMENT '入住人',
  `mobile` char(15) NOT NULL DEFAULT '',
  `pay_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `actual_pay` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '实付',
  `payable` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '应付',
  `create_time` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `tp_picture`
--

CREATE TABLE `tp_picture` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '主键id自增',
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '路径',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片链接',
  `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件 sha1编码',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `tp_picture`
--

INSERT INTO `tp_picture` (`id`, `path`, `url`, `md5`, `sha1`, `status`, `create_time`) VALUES
(1, '/Uploads/Picture/2018-05-09/5af2b4f413eec.png', '', 'ae23b389d4b6c521df0940bd06e59708', '48626f7d143f24da3e2c73c2db9c7a0b9703a3ff', 1, 1525855476),
(2, '/Uploads/Picture/2018-05-09/5af2ccb30527a.png', '', '35c1ecf0cc8f123cc22ba2a34543fb61', '2147c677fdf53b8d71f0787884c45966f681866a', 1, 1525861554),
(3, '/Uploads/Picture/2018-05-10/5af3e2bb83253.jpg', '', '20cd8b88635f7d94f32c6d4e378402a0', 'f96388ed94e237e68f8eeb1796e3f0bccaf4dc42', 1, 1525932731),
(6, '/Uploads/Picture/2018-05-21/5b029b360f980.jpg', '', '3f5935dcaed415f8372a63481e26f671', 'c4456caac63d4346a9148d40b4519e7e52d3d3e6', 1, 1526897461),
(8, '/Uploads/Picture/2018-05-24/5b06519c4c283.png', '', 'c1f3feec860fba3aed3e3eaefd5a8060', '99ac7ebf4ea0da101e6d5bb63a0be01554863ff9', 1, 1527140764),
(9, '/Uploads/Picture/2018-05-28/5b0ba30d07e2f.png', '', 'd7224ddf9c34053c8a80ec93e271f2ba', '184fc954eac7b3d65f804a560e63a4ae4105cdca', 1, 1527489293),
(10, '/Uploads/Picture/2018-06-06/5b174bd5a0fcd.jpg', '', '53e758fda8e2f207ea29bf114a4874a9', 'e751b8c0d8794570f22aa33b63220ab6befd8860', 1, 1528253397),
(11, '/Uploads/Picture/2018-06-19/5b2864961f2a3.jpg', '', 'a23d3f86dd2541525db0836537080560', 'e1e8293eae06b13985985fea23aaa00965abda98', 1, 1529373845);

-- --------------------------------------------------------

--
-- 表的结构 `tp_product`
--

CREATE TABLE `tp_product` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `uid` int(11) NOT NULL DEFAULT '0',
  `hid` int(11) NOT NULL DEFAULT '0' COMMENT '酒店ID',
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '分类ID',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `price` varchar(255) NOT NULL DEFAULT '0' COMMENT '价格',
  `photo` varchar(100) NOT NULL COMMENT '图片',
  `unit` char(20) NOT NULL DEFAULT '' COMMENT '单位',
  `number` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '数量',
  `sales_number` int(11) NOT NULL DEFAULT '0' COMMENT '销量',
  `should_money` varchar(50) NOT NULL DEFAULT '0' COMMENT '应售出金额',
  `actual_money` varchar(50) NOT NULL DEFAULT '0' COMMENT '实售出金额',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `tp_room`
--

CREATE TABLE `tp_room` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `hotelId` int(10) NOT NULL COMMENT '酒店id',
  `type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '房屋类型',
  `room_number` char(50) NOT NULL DEFAULT '0' COMMENT '房间号',
  `znePrice` int(10) NOT NULL DEFAULT '0' COMMENT '价格',
  `delegatecancelPrice` int(10) NOT NULL DEFAULT '0' COMMENT '代理可取消价格',
  `delegatePrice` int(10) NOT NULL DEFAULT '0' COMMENT '代理不可取消价格',
  `hasWindow` int(1) NOT NULL DEFAULT '1' COMMENT '有无窗户：默认有',
  `hasWifi` int(1) NOT NULL DEFAULT '1' COMMENT '有无wifi：默认有',
  `hasClean` tinyint(1) NOT NULL DEFAULT '0' COMMENT '打扫',
  `hasRepair` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否维修',
  `equipmentCondtion` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '配套设施情况',
  `floor` varchar(100) NOT NULL DEFAULT '1' COMMENT '楼层：默认1楼',
  `square` int(4) NOT NULL COMMENT '面积：平米',
  `bedScale` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '床大小',
  `availablePerson` int(3) NOT NULL COMMENT '可入住人数',
  `roomCount` int(3) NOT NULL COMMENT '总房间数量',
  `otherInfo` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '其他信息',
  `count` int(10) NOT NULL COMMENT '可用房屋数量',
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '房屋附图',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '入住状态',
  `reservation` tinyint(1) NOT NULL DEFAULT '0' COMMENT '预订状态',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `tp_room`
--

INSERT INTO `tp_room` (`id`, `uid`, `hotelId`, `type`, `room_number`, `znePrice`, `delegatecancelPrice`, `delegatePrice`, `hasWindow`, `hasWifi`, `hasClean`, `hasRepair`, `equipmentCondtion`, `floor`, `square`, `bedScale`, `availablePerson`, `roomCount`, `otherInfo`, `count`, `image`, `status`, `reservation`, `create_time`, `update_time`) VALUES
(1, 0, 0, '双人大床房', '201', 240, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 2, 0, '', 0, '<img src=\"https://mail.qq.com/cgi-bin/viewfile?f=97C391B16879DAB4BC1F85A4ED858785F517EE91F4258C37082EF4341602DFF49222F28F59367981DB897435BFDA25DF83C9EE33ACE445A6C71903BE66F9C666119F3F71BBD8B105BE7C9A0CC2CE0D3E308F12011DD1B2685697D9ED268EAA6E&sid=coOlZe16nO7CCRJJ&net=1909085193\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2ca933b87fb.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2ca933de482.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2ca933ee74f.jpg\" alt=\"\" />', 0, 0, 1529649503, 1529653570),
(2, 0, 2, '双人大床房', '202', 240, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 2, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caa8cabbf7.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caa8ccdb44.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caa8ce3042.jpg\" alt=\"\" />', 0, 0, 1529653905, 1529653905),
(3, 0, 1, '双人大床房', '203', 240, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 2, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529653977),
(4, 0, 1, '双人大床房', '204', 240, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 2, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529653977),
(5, 0, 2, '双人大床房', '205', 240, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 2, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529653977),
(6, 0, 1, '双人大床房', '206', 240, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 2, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529653977),
(7, 0, 1, '双人大床房', '207', 240, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 2, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529653977),
(8, 0, 1, '双人大床房', '208', 240, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 2, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529653977),
(9, 0, 1, '双人大床房', '209', 240, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 2, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529653977),
(10, 0, 1, '双人大床房', '210', 240, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 2, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529653977),
(11, 0, 1, '双人大床房', '211', 240, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 2, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529653977),
(12, 0, 1, '民俗火炕房', '212', 600, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 5, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529767503),
(13, 0, 1, '民俗火炕房', '213', 600, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 5, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529767589),
(14, 0, 1, '家庭豪华套房', '214', 360, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 3, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529767469),
(15, 0, 1, '双人大床房', '215', 240, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 2, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529653977),
(16, 0, 1, '双人大床房', '216', 240, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 2, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529653977),
(17, 0, 1, '民俗火炕房', '217', 600, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 5, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529767550),
(18, 0, 1, '双人大床房', '218', 240, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 2, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529653977),
(19, 0, 1, '双人大床房', '219', 240, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 2, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529653977),
(20, 0, 1, '双人大床房', '220', 600, 0, 0, 1, 1, 1, 0, '全', '2', 20, '1.5*1.8', 5, 0, '', 0, '<img src=\"/Uploads/Editor/2018-06-22/5b2caad45edb1.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad484c62.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-06-22/5b2caad49fd69.jpg\" alt=\"\" />', 0, 0, 1529653977, 1529767570);

-- --------------------------------------------------------

--
-- 表的结构 `tp_room_type`
--

CREATE TABLE `tp_room_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `del_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `tp_room_type`
--

INSERT INTO `tp_room_type` (`id`, `name`, `create_time`, `update_time`, `del_flag`) VALUES
(18, '双人标准间', 1529638080, 1529638080, 0),
(19, '双人大床房', 1529638092, 1529638092, 0),
(20, '民俗火炕房', 1529638110, 1529638110, 0),
(21, '三人标准间', 1529638127, 1529638127, 0),
(22, '三人豪华间', 1529638139, 1529638139, 0),
(23, '家庭豪华套房', 1529638156, 1529638156, 0),
(24, '双人豪华间', 1529638417, 1529638417, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tp_travelogs`
--

CREATE TABLE `tp_travelogs` (
  `travels_id` int(11) NOT NULL,
  `travels_name` text CHARACTER SET utf8 NOT NULL,
  `travels_date` date NOT NULL,
  `travels_length` int(11) NOT NULL,
  `travels_content` text CHARACTER SET utf8 NOT NULL,
  `travels_authors` text CHARACTER SET utf8 NOT NULL,
  `travels_ketword` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tp_travelogs`
--

INSERT INTO `tp_travelogs` (`travels_id`, `travels_name`, `travels_date`, `travels_length`, `travels_content`, `travels_authors`, `travels_ketword`) VALUES
(1, '2018青海湖大环线', '2018-07-29', 7, '四年前来过一次青海，\r\n\r\n自此以后广阔的草原，成群的牛羊，湛蓝天空上大朵的云彩，金灿灿的油菜花，纯净如宝石一样的青海湖，雅丹地貌，七彩丹霞，三江源头碧蓝的黄河水，这些绝美如画的景色深深的印在脑海里，魂牵梦萦\r\n\r\n浓郁的藏式咸奶茶，酸到颤抖但爱到不能自拔的牦牛酸奶，香气四溢的烤羊肉，看似普通但内藏乾坤的土火锅，治愈我挑食坏毛病的地道面食，这些很难在北京吃到的正宗美味足以让我思念成疾\r\n\r\n当地人淳朴爽朗的笑容，质朴敦厚热情好客的民风，还有每年都会微信问我一次什么时候还会再来青海玩的心地善良的才让大叔，一切的一切都让我无比想念\r\n\r\n四年以后我终于又来到了这片一直让我念念不忘的土地上\r\n\r\n一切都还如当初一样美好，我做了一个大胆又冒险的决定\r\n\r\n不再像以往一样规划细致的行程安排，随心而定，随遇而安\r\n\r\n不再像上次一样包车游玩，我要真真切切地感受在路上的一切\r\n\r\n只买来程不买返程，等到我真的觉得玩过瘾了，再决定回去的日子\r\n\r\n人生第一次自驾游献给让我思念多年的青海\r\n\r\n自驾启程，不问归期，我只要出发不要目的', '作者：农小乐', '青海湖'),
(2, '西北谣', '2018-08-14', 6, '原本的计划是去呼伦贝尔的，但是由于回家晚，自己再做攻略，订机票，酒店什么的麻烦又很耗时间。正好我爹的同事自驾去了青海，反馈青海路况还不错海拔也不是特别高，（因为要考虑到我娘的高原反应。之前开车去过红原，结果因为我娘的高反，在红原到若尔盖的半路上就灰溜溜的开回家了）一合计，干脆一家人开上车，边行边玩自驾去青海。\r\n\r\n从没去过北方的南方girl，这次真是见识了我国大西北的壮（cang）美（liang）风光。沿途从四川的青山绿水行到甘肃的黄土高坡，从西南的温婉多情到西北的刚毅沉默；四川的山遍覆林木，像是穿着丝绸衣服的少女，然后往甘肃交界的地方像是披着绿纱的裸体女人，再往北行刀削斧凿的山岩，完全裸露，被风刻出的岩体像是西北汉子的胸膛一样刚毅……强行装逼，其实我想的是我大四川的山看起来就像铺着一层厚厚的抹茶粉的松软可口的蛋糕，越往西北走，越觉得山是撒着细细的，薄薄的一层抹茶粉的饼干；然后是光裸的红枣糕，厚实；最后是生了霉的馍馍（不怪我恶心，一窝窝的深色的草在光裸的山岩上，周围都是笔芯粗细的草杆，真的看起来像馍馍上长了深色的霉点）。如果时间不是特别赶的话，强行建议自驾，不仅可以欣赏沿途风光，而且行动更自由。', '作者：92农家乐', '青海湖');

-- --------------------------------------------------------

--
-- 表的结构 `tp_ucenter_member`
--

CREATE TABLE `tp_ucenter_member` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '用户ID',
  `hid` int(11) NOT NULL DEFAULT '0' COMMENT '酒店ID',
  `username` char(16) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `email` char(32) NOT NULL DEFAULT '' COMMENT '用户邮箱',
  `mobile` char(15) NOT NULL COMMENT '用户手机',
  `reg_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '注册时间',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `last_login_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '用户状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表' ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `tp_ucenter_member`
--

INSERT INTO `tp_ucenter_member` (`id`, `hid`, `username`, `password`, `email`, `mobile`, `reg_time`, `reg_ip`, `last_login_time`, `last_login_ip`, `update_time`, `status`) VALUES
(1, 0, 'admin', 'f46c8f9321f3ecd3c1bbec8ff4288feb', '', '', 1529638511, 1035290410, 1529813434, 1971861353, 1529638511, 1),
(2, 1, '13752062348', 'dd64899932a388de3962064ccbf60ed1', '', '', 1529637908, 1035290410, 1530421882, 3748136813, 1529637908, 1);

-- --------------------------------------------------------

--
-- 表的结构 `vms_devices`
--

CREATE TABLE `vms_devices` (
  `device_id` int(11) NOT NULL,
  `device_name` varchar(16) NOT NULL,
  `device_number` varchar(32) NOT NULL,
  `device_phone_num` varchar(32) NOT NULL,
  `device_phone_category_id` int(32) NOT NULL,
  `device_message_category` varchar(32) NOT NULL,
  `device_install_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_devices`
--

INSERT INTO `vms_devices` (`device_id`, `device_name`, `device_number`, `device_phone_num`, `device_phone_category_id`, `device_message_category`, `device_install_time`) VALUES
(33, '设备88888887', '88888887', '18245046297', 0, '1', '2016-07-12'),
(34, '设备14141414', '14141414', '13113131313', 0, '1', '2016-07-14');

-- --------------------------------------------------------

--
-- 表的结构 `vms_device_phone`
--

CREATE TABLE `vms_device_phone` (
  `device_phone_category_id` int(11) NOT NULL,
  `device_phone_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_device_phone`
--

INSERT INTO `vms_device_phone` (`device_phone_category_id`, `device_phone_name`) VALUES
(0, '移动'),
(1, '联通'),
(2, '电信');

-- --------------------------------------------------------

--
-- 表的结构 `vms_hotel`
--

CREATE TABLE `vms_hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` text CHARACTER SET utf8 NOT NULL,
  `hotel_type` varchar(64) CHARACTER SET utf32 NOT NULL,
  `hotel_addr` varchar(64) CHARACTER SET utf8 NOT NULL,
  `hotel_price` varchar(64) CHARACTER SET utf8 NOT NULL,
  `hotel_city` varchar(64) CHARACTER SET utf8 NOT NULL,
  `hotel_check_day` date NOT NULL,
  `hotel_wifi` tinyint(1) NOT NULL,
  `hotel_car_park` tinyint(1) NOT NULL,
  `hotelluggage` int(11) NOT NULL,
  `hotel_meeting` tinyint(1) NOT NULL,
  `hotel_feature` int(11) NOT NULL,
  `hotel_decoration_time` date NOT NULL,
  `hotel_start_business_time` date NOT NULL,
  `hotel_create_time` date NOT NULL,
  `hotel_update_time` date NOT NULL,
  `hotel_photo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `vms_hotel`
--

INSERT INTO `vms_hotel` (`hotel_id`, `hotel_name`, `hotel_type`, `hotel_addr`, `hotel_price`, `hotel_city`, `hotel_check_day`, `hotel_wifi`, `hotel_car_park`, `hotelluggage`, `hotel_meeting`, `hotel_feature`, `hotel_decoration_time`, `hotel_start_business_time`, `hotel_create_time`, `hotel_update_time`, `hotel_photo`) VALUES
(1, '92农家乐1号', '二星级/经济', '北京北京市海淀区', '200', '北京', '2018-08-13', 1, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(2, '92农家乐2号', '二星级/经济', '天津天津市南开区', '150', '天津', '2018-08-08', 1, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(3, '92农家乐1号', '三星级/高档', '北京北京市海淀区', '150', '北京', '2018-08-08', 1, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- 表的结构 `vms_materials`
--

CREATE TABLE `vms_materials` (
  `material_id` bigint(20) NOT NULL,
  `material_name` varchar(64) NOT NULL,
  `material_total_amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_materials`
--

INSERT INTO `vms_materials` (`material_id`, `material_name`, `material_total_amount`) VALUES
(1, '物资 #1', 100),
(2, '物资 #2', 500),
(3, '物资 #3', 200),
(4, '物资 #4', 10);

-- --------------------------------------------------------

--
-- 表的结构 `vms_material_allocation`
--

CREATE TABLE `vms_material_allocation` (
  `material_id` bigint(20) NOT NULL,
  `vehicle_id` bigint(20) NOT NULL,
  `material_amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_material_allocation`
--

INSERT INTO `vms_material_allocation` (`material_id`, `vehicle_id`, `material_amount`) VALUES
(1, 1, 0),
(1, 2, 30),
(1, 4, 30),
(2, 2, 50),
(2, 3, 50),
(3, 1, 50);

-- --------------------------------------------------------

--
-- 表的结构 `vms_message_send`
--

CREATE TABLE `vms_message_send` (
  `device_message_category` int(11) NOT NULL,
  `message_send_name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_message_send`
--

INSERT INTO `vms_message_send` (`device_message_category`, `message_send_name`) VALUES
(0, '短信'),
(1, '联网');

-- --------------------------------------------------------

--
-- 表的结构 `vms_options`
--

CREATE TABLE `vms_options` (
  `option_id` int(4) NOT NULL,
  `option_key` varchar(64) NOT NULL,
  `option_name` varchar(32) NOT NULL,
  `option_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_options`
--

INSERT INTO `vms_options` (`option_id`, `option_key`, `option_name`, `option_value`) VALUES
(1, 'speed-lower-bound', '车速 下限', '0'),
(2, 'speed-upper-bound', '车速 上限', '80'),
(3, 'engine-speed-lower-bound', '发送机转速 下限', '0'),
(4, 'engine-speed-upper-bound', '发送机转速 上限', '1800'),
(5, 'mileage-lower-bound', '里程 下限', '0'),
(6, 'mileage-upper-bound', '里程 上限', '2000'),
(7, 'fuel-quantity-lower-bound', '燃油油量 下限', '0'),
(8, 'fuel-quantity-upper-bound', '燃油油量 上限', '100'),
(9, 'steering-oil-volumn-lower-bound', '转向油量 下限', '110'),
(10, 'steering-oil-volumn-upper-bound', '转向油量 上限', '1000'),
(11, 'steering-oil-temperature-lower-bound', '转向油温 下限', '0'),
(12, 'steering-oil-temperature-upper-bound', '转向油温 上限', '100'),
(13, 'left-brake-pressure-lower-bound', '左制动器气压 下限', '0'),
(14, 'left-brake-pressure-upper-bound', '左制动器气压 上限', '100'),
(15, 'right-brake-pressure-lower-bound', '右制动器气压 下限', '0'),
(16, 'right-brake-pressure-upper-bound', '右制动器气压 上限', '100'),
(17, 'left-brake-hydraulic-lower-bound', '左制动器液压 下限', '0'),
(18, 'left-brake-hydraulic-upper-bound', '左制动器液压 上限', '100'),
(19, 'right-brake-hydraulic-lower-bound', '右制动器液压 下限', '0'),
(20, 'right-brake-hydraulic-upper-bound', '右制动器液压 上限', '100'),
(21, 'actuator-temperature-lower-bound', '分动器温度 下限', '0'),
(22, 'actuator-temperature-upper-bound', '分动器温度 上限', '100'),
(23, 'gearbox-radiator-temperature-lower-bound', '变速散热器温度 下限', '0'),
(24, 'gearbox-radiator-temperature-upper-bound', '变速散热器温度 上限', '100'),
(25, '1-bridge-brake-pedal-temperature-lower-bound', '1桥制动踏片温度 下限', '0'),
(26, '1-bridge-brake-pedal-temperature-upper-bound', '1桥制动踏片温度 上限', '1000'),
(27, '1-bridge-temperature-lower-bound', '1桥温度 下限', '0'),
(28, '1-bridge-temperature-upper-bound', '1桥温度 上限', '99.9'),
(29, '2-bridge-brake-pedal-temperature-lower-bound', '2桥制动踏片温度 下限', '0'),
(30, '2-bridge-brake-pedal-temperature-upper-bound', '2桥制动踏片温度 上限', '100'),
(31, '2-bridge-temperature-lower-bound', '2桥温度 下限', '0'),
(32, '2-bridge-temperature-upper-bound', '2桥温度 上限', '100'),
(33, 'AB-line-voltage-lower-bound', 'AB线电压 下限', '220'),
(34, 'AB-line-voltage-upper-bound', 'AB线电压 上限', '380'),
(35, 'BC-line-voltage-lower-bound', 'BC线电压 下限', '220'),
(36, 'BC-line-voltage-upper-bound', 'BC线电压 上限', '380'),
(37, 'AC-line-voltage-lower-bound', 'AC线电压 下限', '220'),
(38, 'AC-line-voltage-upper-bound', 'AC线电压 上限', '380'),
(39, 'A-phase-voltage-lower-bound', 'A相电压 下限', '230'),
(40, 'A-phase-voltage-upper-bound', 'A相电压 上限', '380'),
(41, 'B-phase-voltage-lower-bound', 'B相电压 下限', '230'),
(42, 'B-phase-voltage-upper-bound', 'B相电压 上限', '380'),
(43, 'C-phase-voltage-lower-bound', 'C相电压 下限', '230'),
(44, 'C-phase-voltage-upper-bound', 'C相电压 上限', '380'),
(45, 'A-phase-current-lower-bound', 'A相电流 下限', '0'),
(46, 'A-phase-current-upper-bound', 'A相电流 上限', '10'),
(47, 'B-phase-current-lower-bound', 'B相电流 下限', '0'),
(48, 'B-phase-current-upper-bound', 'B相电流 上限', '10'),
(49, 'C-phase-current-lower-bound', 'C相电流 下限', '0'),
(50, 'C-phase-current-upper-bound', 'C相电流 上限', '10'),
(51, 'frequency-lower-bound', '频率 下限', '0'),
(52, 'frequency-upper-bound', '频率 上限', '1000'),
(53, 'battery-temperature-lower-bound', '蓄电池温度 下限', '0'),
(54, 'battery-temperature-upper-bound', '蓄电池温度 上限', '100'),
(55, 'battery-voltage-lower-bound', '蓄电池电压 下限', '230'),
(56, 'battery-voltage-upper-bound', '蓄电池电压 上限', '380'),
(57, 'battery-current-lower-bound', '蓄电池组电流 下限', '0'),
(58, 'battery-current-upper-bound', '蓄电池组电流 上限', '10'),
(59, 'engine-oil-temperature-lower-bound', '机组油温 下限', '0'),
(60, 'engine-oil-temperature-upper-bound', '机组油温 上限', '100'),
(61, 'engine-oil-pressure-lower-bound', '机组油压 下限', '0'),
(62, 'engine-oil-pressure-upper-bound', '机组油压 上限', '100'),
(63, 'engine-water-temperature-lower-bound', '机组水温 下限', '0'),
(64, 'engine-water-temperature-upper-bound', '机组水温 上限', '100');

-- --------------------------------------------------------

--
-- 表的结构 `vms_vehicles`
--

CREATE TABLE `vms_vehicles` (
  `vehicle_id` bigint(20) NOT NULL,
  `vehicle_name` varchar(64) NOT NULL,
  `vehicle_drive_mode_id` int(4) NOT NULL,
  `vehicle_passengers` int(4) NOT NULL,
  `vehicle_mass` int(8) NOT NULL,
  `vehicle_load_mass` int(8) NOT NULL,
  `vehicle_max_mass` int(8) NOT NULL,
  `vehicle_max_load_mass` int(8) NOT NULL,
  `vehicle_outline_long` int(8) NOT NULL,
  `vehicle_outline_width` int(8) NOT NULL,
  `vehicle_outline_height` int(8) NOT NULL,
  `vehicle_max_speed` int(8) NOT NULL,
  `vehicle_wheelbase` int(8) NOT NULL,
  `vehicle_track` int(8) NOT NULL,
  `vehicle_front_overhang` int(8) NOT NULL,
  `vehicle_rear_overhang` int(8) NOT NULL,
  `vehicle_min_ground_clearance` int(8) NOT NULL,
  `vehicle_max_climbing_degree` int(8) NOT NULL,
  `vehicle_max_side_inclination_angle` int(8) NOT NULL,
  `vehicle_category_id` int(11) NOT NULL,
  `vehicle_displacement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_vehicles`
--

INSERT INTO `vms_vehicles` (`vehicle_id`, `vehicle_name`, `vehicle_drive_mode_id`, `vehicle_passengers`, `vehicle_mass`, `vehicle_load_mass`, `vehicle_max_mass`, `vehicle_max_load_mass`, `vehicle_outline_long`, `vehicle_outline_width`, `vehicle_outline_height`, `vehicle_max_speed`, `vehicle_wheelbase`, `vehicle_track`, `vehicle_front_overhang`, `vehicle_rear_overhang`, `vehicle_min_ground_clearance`, `vehicle_max_climbing_degree`, `vehicle_max_side_inclination_angle`, `vehicle_category_id`, `vehicle_displacement`) VALUES
(3, '黑A00002', 1, 6, 10000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3.0'),
(15, '黑B00001', 2, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '3.0'),
(18, '黑A66666', 1, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2.2');

-- --------------------------------------------------------

--
-- 表的结构 `vms_vehicle_catrgories`
--

CREATE TABLE `vms_vehicle_catrgories` (
  `vehicle_category_id` int(11) NOT NULL,
  `vehicle_catrgories_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_vehicle_catrgories`
--

INSERT INTO `vms_vehicle_catrgories` (`vehicle_category_id`, `vehicle_catrgories_name`) VALUES
(0, '管理用车'),
(1, '生产用车'),
(2, '后勤用车');

-- --------------------------------------------------------

--
-- 表的结构 `vms_vehicle_drive_modes`
--

CREATE TABLE `vms_vehicle_drive_modes` (
  `vehicle_drive_mode_id` int(4) NOT NULL,
  `vehicle_drive_mode_slug` varchar(32) NOT NULL,
  `vehicle_drive_mode_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_vehicle_drive_modes`
--

INSERT INTO `vms_vehicle_drive_modes` (`vehicle_drive_mode_id`, `vehicle_drive_mode_slug`, `vehicle_drive_mode_name`) VALUES
(1, 'two-wheel-drive', '两轮驱动'),
(2, 'four-wheel-drive', '四轮驱动');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tp_attraction`
--
ALTER TABLE `tp_attraction`
  ADD PRIMARY KEY (`attrs_id`);

--
-- Indexes for table `tp_attr_tickets`
--
ALTER TABLE `tp_attr_tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `tp_cart`
--
ALTER TABLE `tp_cart`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tp_checkin`
--
ALTER TABLE `tp_checkin`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `room_id` (`room_id`) USING BTREE;

--
-- Indexes for table `tp_goods`
--
ALTER TABLE `tp_goods`
  ADD PRIMARY KEY (`goods_id`);

--
-- Indexes for table `tp_log_imgs`
--
ALTER TABLE `tp_log_imgs`
  ADD PRIMARY KEY (`imgid`);

--
-- Indexes for table `tp_log_sections`
--
ALTER TABLE `tp_log_sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `tp_order`
--
ALTER TABLE `tp_order`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tp_picture`
--
ALTER TABLE `tp_picture`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tp_product`
--
ALTER TABLE `tp_product`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tp_room`
--
ALTER TABLE `tp_room`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `hotelId` (`hotelId`) USING BTREE;

--
-- Indexes for table `tp_room_type`
--
ALTER TABLE `tp_room_type`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `type` (`id`) USING BTREE;

--
-- Indexes for table `tp_travelogs`
--
ALTER TABLE `tp_travelogs`
  ADD PRIMARY KEY (`travels_id`);

--
-- Indexes for table `tp_ucenter_member`
--
ALTER TABLE `tp_ucenter_member`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`) USING BTREE,
  ADD KEY `status` (`status`) USING BTREE;

--
-- Indexes for table `vms_devices`
--
ALTER TABLE `vms_devices`
  ADD PRIMARY KEY (`device_id`),
  ADD UNIQUE KEY `device_name` (`device_name`),
  ADD UNIQUE KEY `device_number` (`device_number`),
  ADD KEY `device_phone_category_id` (`device_phone_category_id`),
  ADD KEY `device_message_category` (`device_message_category`);

--
-- Indexes for table `vms_device_phone`
--
ALTER TABLE `vms_device_phone`
  ADD PRIMARY KEY (`device_phone_category_id`);

--
-- Indexes for table `vms_hotel`
--
ALTER TABLE `vms_hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `vms_materials`
--
ALTER TABLE `vms_materials`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `vms_material_allocation`
--
ALTER TABLE `vms_material_allocation`
  ADD PRIMARY KEY (`material_id`,`vehicle_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `vms_message_send`
--
ALTER TABLE `vms_message_send`
  ADD PRIMARY KEY (`device_message_category`),
  ADD KEY `device_message_category` (`device_message_category`);

--
-- Indexes for table `vms_options`
--
ALTER TABLE `vms_options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `vms_vehicles`
--
ALTER TABLE `vms_vehicles`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `vehicle_drive_mode_id` (`vehicle_drive_mode_id`),
  ADD KEY `vehicle_category_id` (`vehicle_category_id`);

--
-- Indexes for table `vms_vehicle_catrgories`
--
ALTER TABLE `vms_vehicle_catrgories`
  ADD PRIMARY KEY (`vehicle_category_id`),
  ADD KEY `vms_vehicle_catrgories_id` (`vehicle_category_id`);

--
-- Indexes for table `vms_vehicle_drive_modes`
--
ALTER TABLE `vms_vehicle_drive_modes`
  ADD PRIMARY KEY (`vehicle_drive_mode_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `tp_cart`
--
ALTER TABLE `tp_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `tp_checkin`
--
ALTER TABLE `tp_checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `tp_order`
--
ALTER TABLE `tp_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `tp_picture`
--
ALTER TABLE `tp_picture`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id自增', AUTO_INCREMENT=12;

--
-- 使用表AUTO_INCREMENT `tp_product`
--
ALTER TABLE `tp_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- 使用表AUTO_INCREMENT `tp_room`
--
ALTER TABLE `tp_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用表AUTO_INCREMENT `tp_room_type`
--
ALTER TABLE `tp_room_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用表AUTO_INCREMENT `tp_ucenter_member`
--
ALTER TABLE `tp_ucenter_member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户ID', AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `vms_devices`
--
ALTER TABLE `vms_devices`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- 使用表AUTO_INCREMENT `vms_materials`
--
ALTER TABLE `vms_materials`
  MODIFY `material_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `vms_message_send`
--
ALTER TABLE `vms_message_send`
  MODIFY `device_message_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `vms_options`
--
ALTER TABLE `vms_options`
  MODIFY `option_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- 使用表AUTO_INCREMENT `vms_vehicles`
--
ALTER TABLE `vms_vehicles`
  MODIFY `vehicle_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用表AUTO_INCREMENT `vms_vehicle_drive_modes`
--
ALTER TABLE `vms_vehicle_drive_modes`
  MODIFY `vehicle_drive_mode_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
