/*
 Navicat MySQL Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 50617
 Source Host           : localhost:3306
 Source Schema         : cms

 Target Server Type    : MySQL
 Target Server Version : 50617
 File Encoding         : 65001

 Date: 08/06/2018 10:25:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cms_adver
-- ----------------------------
DROP TABLE IF EXISTS `cms_adver`;
CREATE TABLE `cms_adver`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '//编号',
  `title` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//标题',
  `thumbnail` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//图片',
  `link` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//链接',
  `info` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//描述',
  `type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '//类型',
  `state` tinyint(1) NOT NULL DEFAULT 0 COMMENT '//是否前台广告',
  `date` datetime(0) NOT NULL COMMENT '//时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 35 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cms_adver
-- ----------------------------
INSERT INTO `cms_adver` VALUES (24, '腾讯开始进军网游市场', '', 'http:www.baidu.com', '', 1, 1, '2018-06-07 11:30:15');
INSERT INTO `cms_adver` VALUES (25, '新浪微博开始大量招聘', '', 'http:www.baidu.com', '', 1, 1, '2018-06-07 11:30:25');
INSERT INTO `cms_adver` VALUES (26, 'YangWeb俱乐部开始PHP教程', '', 'http:www.baidu.com', '', 1, 1, '2018-06-07 11:30:45');
INSERT INTO `cms_adver` VALUES (27, '网易开始代理魔兽世界', '', 'http:www.baidu.com', '', 1, 1, '2018-06-07 11:30:55');
INSERT INTO `cms_adver` VALUES (28, '水润BB霜，买一赠一', '/CMS/uploads/20180607/20180607053113142.png', 'http:www.baidu.com', '', 2, 1, '2018-06-07 11:31:15');
INSERT INTO `cms_adver` VALUES (29, '生活家买一送三', '/CMS/uploads/20180607/20180607053136308.png', 'http:www.baidu.com', '', 2, 1, '2018-06-07 11:31:39');
INSERT INTO `cms_adver` VALUES (30, '暑假人气网游推荐', '/CMS/uploads/20180607/20180607053154333.png', 'http:www.baidu.com', '', 2, 1, '2018-06-07 11:31:56');
INSERT INTO `cms_adver` VALUES (31, '爱制造旗舰店', '/CMS/uploads/20180607/20180607053217221.jpg', 'http:www.baidu.com', '', 3, 1, '2018-06-07 11:32:19');
INSERT INTO `cms_adver` VALUES (32, 'test', '/CMS/uploads/20180607/20180607053237235.jpg', 'http:www.baidu.com', '', 3, 1, '2018-06-07 11:32:39');
INSERT INTO `cms_adver` VALUES (33, 'test011', '/CMS/uploads/20180607/20180607053255442.jpg', 'http:www.baidu.com', '', 3, 1, '2018-06-07 11:32:58');

-- ----------------------------
-- Table structure for cms_comment
-- ----------------------------
DROP TABLE IF EXISTS `cms_comment`;
CREATE TABLE `cms_comment`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '//id',
  `user` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//评论者',
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//内容',
  `state` tinyint(1) NOT NULL DEFAULT 0 COMMENT '//状态',
  `manner` tinyint(1) NOT NULL COMMENT '//态度',
  `cid` mediumint(8) UNSIGNED NOT NULL COMMENT '//文档id',
  `sustain` smallint(6) UNSIGNED NOT NULL COMMENT '//支持率',
  `oppose` smallint(6) UNSIGNED NOT NULL COMMENT '//反对率',
  `date` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 58 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cms_comment
-- ----------------------------
INSERT INTO `cms_comment` VALUES (47, 'yangyi', '我一个女性朋友，刚参加工作不久，为了买个苹果手机，现在弄的房租都交不起了，上海房租便宜的都是每人1000多一月，她找我来借钱，我就晕了，我跟她说了现在收入远跟不上支出，她依然盲目消费，典型的月光族，还要负债消费，值得这样吗？', 1, 1, 46, 0, 0, '2018-06-06 09:16:49');
INSERT INTO `cms_comment` VALUES (48, 'yang', ' 特朗普上台的最高理想本是要复苏美国的经济，可是这次关门事件无异于给了他和美国现在的核心领导团队一个当头棒喝。\r\n\r\n不过好在，掰扯了几天后，1月22日，美国参议院共和党和民主党总算达成了临时协议，为期三天的政府停摆总算结束了。\r\n\r\n但是这次维持政府正常运作的拨款也仅能持续三周，在不断发酵的民意背后，美国政坛所面临的压力也空前巨大。\r\n\r\n本文来源公众号海外眼，更多海外资讯请关注海外眼！', 1, 1, 46, 0, 0, '2018-06-06 09:17:34');
INSERT INTO `cms_comment` VALUES (49, 'admin', '很多美国人对克林顿任期内的那次超长时间的政府关闭还记忆犹新，当时很多政府机构不再办公，非核心联邦政府的工人被迫休假，47万5千名核心雇员在没有收入的情况下继续上班。', 1, 1, 46, 0, 0, '2018-06-06 09:17:49');
INSERT INTO `cms_comment` VALUES (50, 'test01', '这样耗到了12月22日，眼瞅着又没钱了，只能再通过一个短期临时预算议案，扛到了2018年1月18日。\r\n\r\n眨眼又到了1月18日，说好了事不过三，于是这次特朗普同学决定发挥自己总统的魅力，亲自游说了一番，众议院以一个非常勉强的票数（230:197）通过了一个新的临时预算法案（没错还是临时的），为美国政府提供四周的资金到2月16日。', 1, 1, 46, 1, 0, '2018-06-06 09:18:07');
INSERT INTO `cms_comment` VALUES (51, 'test03', '家都知道，美国政府这两天关门了......\r\n\r\n没有错，就是美国联邦政府，关门了......\r\n\r\n作为全美最土豪的公司，联邦政府关门的理由也是十分的出人意料——没钱了......', 1, 1, 46, 0, 0, '2018-06-06 09:18:19');
INSERT INTO `cms_comment` VALUES (52, '游客', '归属在联邦政府名下的国家公园和一些著名建筑都将停止对外开放，这其中就包括了自由女神像和黄石国家公园这种世界闻名的旅游景点。', 1, 1, 46, 2, 0, '2018-06-06 09:18:33');
INSERT INTO `cms_comment` VALUES (53, 'yang', 'test..........', 1, 1, 46, 2, 0, '2018-06-06 09:49:49');
INSERT INTO `cms_comment` VALUES (54, 'admin', 'test..00', 1, 1, 46, 5, 1, '2018-06-06 09:53:53');

-- ----------------------------
-- Table structure for cms_content
-- ----------------------------
DROP TABLE IF EXISTS `cms_content`;
CREATE TABLE `cms_content`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '//编号',
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//标题',
  `nav` mediumint(8) UNSIGNED NOT NULL COMMENT '//栏目号',
  `attr` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//属性',
  `tag` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//标签',
  `keyword` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//关键字',
  `thumbnail` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//缩略图',
  `source` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//文章来源',
  `author` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//作者',
  `info` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//简介',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//详细内容',
  `commend` tinyint(1) NOT NULL DEFAULT 1 COMMENT '//是否允许评论',
  `count` smallint(6) NOT NULL DEFAULT 0 COMMENT '//浏览次数',
  `gold` smallint(6) NOT NULL DEFAULT 0 COMMENT '//消费金币',
  `sort` tinyint(1) NOT NULL DEFAULT 0 COMMENT '//排序',
  `readlimit` tinyint(1) NOT NULL DEFAULT 0 COMMENT '//阅读权限',
  `color` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//颜色',
  `date` datetime(0) NOT NULL COMMENT '//发布时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 50 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cms_content
-- ----------------------------
INSERT INTO `cms_content` VALUES (43, 'test。。。', 26, '无属性', '杂谈', '大象', '/CMS/uploads/20180604/20180604075728559.jpg', 'yang', 'yang', '机关、伏火、毒气、怪兽、致幻剂……这些都不是盗墓贼最恐惧的东西。', '<p>作为盗墓贼，每次前往古代大墓开展工作时，心中最恐惧的是什么？</p><p>在各路盗墓文学和影视剧中，古墓堪称是世界上最恐怖的地方，除了遍布杀人机关，甚至都不太受自然规律的束缚：</p><p><img src=\"https://r.sinaimg.cn/large/article/78400c1e0754a490a866ad3780699536\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_png/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxLO1qTUnmOwsuhpFlyHfQGZQk7VoKA6DyGZ4YfL5USZMffiapXvmY4jw/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\" style=\"max-width: 100%;\"/></p><p><span style=\"color:#717071\">▍隐蔽机关的攻击</span></p><p><img src=\"https://r.sinaimg.cn/large/article/f2902a1c2d488ed843cf5dccb6c919b7\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_png/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxVVeI3tXEQzmXOJVuCaIxQJqKoB5UBo6I3qzryDk0KMP7Ry0g6BP0nw/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\" style=\"max-width: 100%;\"/></p><p><span style=\"color:#717071\">▍大型机械的阻击</span></p><p><img src=\"https://r.sinaimg.cn/large/article/e07acdb29c351b6cc9122bb9acb9be90\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_png/Z08UWq352tkERfPWUdHa4cIBCHs2BHLx0pBVgcTlHtHVuJdTlLlkAUH9u7f24aY0Qtw6uyFbRF082wa1jhIq6Q/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\" style=\"max-width: 100%;\"/></p><p><span style=\"color:#717071\">▍遇人即焚的磷石桥</span></p><p><img src=\"https://r.sinaimg.cn/large/article/04e86770b80c6ee78fbc853296ffff46\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_png/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxyvqgia1vPuhaUzoKuFC0q4bSBKOmNxIrvLlGB51Pv2t1SRLbIkZ1kVQ/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\" style=\"max-width: 100%;\"/></p><p><span style=\"color:#717071\">▍令人癫狂的致幻植物</span></p><p><img src=\"https://r.sinaimg.cn/large/article/18c1a42a90cc3764bcc5382d02770556\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_png/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxUBLFbfq15YR58fExqbExWDh4dK1ahCFAFtLDAgyFtW64ibyV8gZsO4A/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\" style=\"max-width: 100%;\"/></p><p><span style=\"color:#717071\">▍不明生物的看护</span></p><p><img src=\"https://r.sinaimg.cn/large/article/9033ca2da542bb6cc2887305ef9db20c\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_png/Z08UWq352tkERfPWUdHa4cIBCHs2BHLx3q21UVN4dRBEO66orGLicduD3vHq0KKhaVyLjn5B77VNO2qzsxzC1kw/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\" style=\"max-width: 100%;\"/></p><p><span style=\"color:#717071\">▍甚至不死武士的守卫</span></p><p>事实上，现实中的古墓不但不奇幻，而且很多常用的防盗手段，在后人看来都接近弃疗。</p><p>最不堪入目的，莫过于一些古墓中的嘴炮攻击，如 1980\r\n年发现于山东济宁的一块汉代墓门，压槛石上刻有一百多字，诅咒盗墓者断子绝孙。</p><p><img src=\"https://r.sinaimg.cn/large/article/e44ec3c846ce641d3d517b65d6a81a42\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_jpg/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxAEbEAMXEPv7dKVepeZ9546A3DwpZHeF6qjzHDkvfRS9lDciaqRNE43A/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\"/></p><p><span style=\"color:#717071\">▍碑文内容：诸敢发我丘者，令绝毋户后。疾设不详者，使绝毋户后……</span></p><p>1957 年西安郊区发掘的一座隋代贵族少女墓的石棺上，更是言简意赅地刻着「开者即死」四个大字。</p><p><img src=\"https://r.sinaimg.cn/large/article/319b86b598468ae1cb632d266fc40642\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_jpg/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxiaTW9IwtvzMiaZIet8xhciaHIlajXmhOnPg9bXpHYq9EXbrp8Lh5OQpwg/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\" style=\"max-width: 100%;\"/></p><p><span style=\"color:#717071\">▍李静训的石棺及其上方的刻字</span></p><p>这种威胁的结果可想而知，敢于盗墓求财者，不太可能被几句苍白的骂街吓退。</p><p>那么，究竟是什么样的墓葬，才能真的让盗墓贼胆寒？</p><p><br/></p><h1>想象中的机关重重</h1><p>事实上，古人虽然不可能像《鬼吹灯》《盗墓笔记》那样，把陵寝建设成为人类技术与妖术的殿堂，但他们也还是为抵御盗墓贼想尽了办法，并非完全寄希望于嘴炮。</p><p>当然，古人毕竟技术有限，即使今天看来较合情理的机关手法，在历史上都根本无法实现。</p><p>如文艺作品中常见的万箭齐发的自动弓弩，在《史记》《后汉书》等史料中都有记述。但在真实的历史上，要制造出此类仅仅依靠间接接触，甚至声控的组合机械设备，就很不现实。真实的考古发掘中，也从未遇到过此类机关。</p><p><img src=\"https://r.sinaimg.cn/large/article/d80da244847e13e95c6075a9fca3bd8a\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_png/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxcebTtibKQnXRZYOMicKqAMKcCQgsIYDjVUn1HdKc34scibm1mwN2YQSag/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\" style=\"max-width: 100%;\"/></p><p>相比之下，古墓中真实存在的攻击机关往往非常朴素，比如像电影《小鬼当家》中的鬼马儿童一样，在墓道中撒「钉子」。</p><p><img src=\"https://r.sinaimg.cn/large/article/57d116dae6d38b0b95ecbb3a729c3558\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_png/Z08UWq352tkERfPWUdHa4cIBCHs2BHLx6dnDtDQxYibQiaO1iaDTuEVeYt3ibXoYCuIbxHcU0xmOFTyJdbXzXYcGBw/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\"/></p><p><span style=\"color:#717071\">▍1985\r\n年考古学家在成都青龙乡发掘的一座汉代砖室墓中发现的铜蒺藜</span></p><p>相对厉害的，也就是民国时期的报纸记录的，有盗墓贼掉入墓室中的陷阱后，「尸身被锥尖穿烂」。</p><p>不过，传说中的中华古墓防盗神技「伏火」，就并非毫无根据了。</p><p>根据描述，装备了「伏火」的棺木一旦打开，火焰便会「从隙内喷出」，杀伤敌人。</p><p><img src=\"https://r.sinaimg.cn/large/article/5d0e994130c0bedb1c322bc26641cde7\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_png/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxaDWzU0Tj3icSQL3jkrPq1J2Irvib1g131jxfkr3LABVg4Q97ZHibxiaxfA/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\" style=\"max-width: 100%;\"/></p><p>在真实的考古发掘中，确实出现过类似的现象：</p><p><br/></p><blockquote>出火的大致过程是，当某医院工程进行到露出木椁顶上的白膏泥层的时候，施工人员用铁钎向下穿了几个孔，孔里就喷出一股凉气，一接触火种即燃烧，火焰的颜色类似酒精灯，明火无烟。</blockquote><p style=\"text-align:right;\"><em>——湖南省博物馆，中国科学院考古研究所编《长沙马王堆一号汉墓》</em><br/></p><p><strong>不过，将其视为是有意设置的防盗墓手段，完全是后人的过度解读。</strong></p><p>和民间说的「鬼火」一样，「伏火」只是墓内的尸体和其他有机物在腐烂的过程中产生的燃点较低的磷化氢和易燃的甲烷，在与外部坏境接触、或遇到明火的情况下被点燃。由于甲烷质量较轻，在空气中的扩散极快，密闭的棺椁一旦被打开，遇火就可能出现「火从隙内喷出」的非凡景象。</p><p>此外，墓内灌注大量水银、挥发毒气来抵御盗墓的方法，也只有秦始皇陵这种&nbsp;<wbr/><em>bug</em>&nbsp;<wbr/>级别的墓葬才可能采用。一般情况下，盗墓贼们并不用担心毒气的威胁。</p><p><img src=\"https://r.sinaimg.cn/large/article/b9396a4574b2a5a495626d7301974ab0\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_png/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxcxe5dfpbQnZtpWE28yGnHDjFHoViaA6sczrf4gzMfF4PxG9n3EPqv3w/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\" style=\"max-width: 100%;\"/></p><p>古代文献中记载的杀伤盗墓贼的方式，还有「储水」和「积沙」。</p><p>所谓「储水」，指的是在墓室中灌注大量的水，盗墓贼一旦打开墓室，便会面临如电影《闪灵》般喷涌而出的储水，而被活活淹死。</p><p>不过，这种手段对墓室内部的密闭性要求极高，在现实中显然也难以实现。</p><p>相比之下，手法近似、只是改水为沙的「积沙」策略，倒是相对可行，而且在考古发掘中也确实有过类似的发现。</p><p>1950\r\n年，在河南辉县的一座战国时期的高规格墓葬中，考古学家就发现了疑似「积沙」的遗迹，墓内在椁室两侧和邻近墓道的地方都以大石砌墙，墙内则填满了细沙。</p><p>不过，「积沙」并未保住这座大墓。盗墓贼不但进入了这座大墓，而且没有触发积沙即盗走了墓内的大部分随葬品，其墓室还遭到了严重的破坏。</p><p>总体来看，中华防盗古法的效果都不出色：由于历代盗墓贼的频繁光顾，我国现存的古代大墓绝大多数都已经遭遇了不同程度的盗掘。</p><p><img src=\"https://r.sinaimg.cn/large/article/07fd33ad61aaaf14279333a7be235ad3\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_jpg/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxib7iarZW9dX2c0uRhQ4YRDicrRmqiaE8PMoL4931CVXanrMCuvRvrClB7Q/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\" style=\"max-width: 100%;\"/></p><p><span style=\"color:#717071\">▍考古发现的部分西汉大墓被盗掘的情况｜来源《中国国家地理》</span></p><p><img src=\"https://r.sinaimg.cn/large/article/119b86b76bdd513ed45473f5fb2c2f08\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_jpg/Z08UWq352tkERfPWUdHa4cIBCHs2BHLx87dYup7qlAouFpWBmiak98hOePfYXCBLKY5jp8nTY08aNhsZRRoEBjg/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\"/></p><p><span style=\"color:#717071\">▍在发掘秦公一号大墓时，考古学家揭开最表面的耕土层后发现历代累积的盗洞多达 247\r\n个</span></p><p>事实上，古墓防盗设备对贼人的杀伤力，可能还比不上盗墓贼自己因为工作能力有限所造成的失误。</p><p>考古发掘中，不时发现莫名死在盗洞里的疑似盗墓人，看起来也并非是被防盗机关击毙，而更可能是死于通风不善造成的缺氧，或者是不合格的盗洞坍塌后被困。</p><p><img src=\"https://r.sinaimg.cn/large/article/96764247015c72e9a2597a4425fed2fc\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_png/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxOQPS1cTrQCKhhqn17Jia8Fn2QTSl1WmIrEsWKFmSQIL6COWQYicU6zeA/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\"/></p><p><span style=\"color:#717071\">▍河北平山中山王墓盗墓者遗留的工具和兵器</span></p><p><img src=\"https://r.sinaimg.cn/large/article/522f3214dbf99b8d8e015f9d87603e31\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_png/Z08UWq352tkERfPWUdHa4cIBCHs2BHLx6spDaOME68QojKkP1xR7ecL6iaBQ7QsvFdJ7IrL4W71ZV6f14g0BvDQ/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\"/></p><p>古墓防盗如此不堪，难道中国古代的盗墓贼，只要不忌惮挖坟掘墓的道德压力和法律风险，就真的只有升棺发财的喜悦，而完全用不着害怕任何东西吗？</p><p><img src=\"https://r.sinaimg.cn/large/article/f233520d98714e906473bc19b011293d\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_jpg/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxLEYlpU7pibHSd7sETnthnLVqicElIibMLIibzgcPGVEEHW1ah1fs2ib0nTw/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\" style=\"max-width: 100%;\"/></p><p><br/></p><h1>惹不起，还是躲不起</h1><p>很大程度上确实是的——<strong>一大证据是，古人早已意识到，如果想在精心打造的地下陵寝里安享万年，与其费尽心思打击盗墓分子，还不如让他们根本就找不到自己。</strong></p><p>隐匿墓址的做法，早在西汉时期就已经出现。如西汉早期的南越王赵佗，就吸取前人陵墓位置明显的教训，精心隐藏自己的阴宅，令后人不知其处。三国时期的吴国将领吕岱试图盗掘赵佗陵墓时，便「费损而无获」。</p><p><img src=\"https://r.sinaimg.cn/large/article/b143eea39bf2702f6ee32f0e2702e468\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_png/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxWmZz7xt5SkAic2lYh0sn6XylAz9rjtMmJtLeksQdToebyj3JQYGwccw/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\"/></p><p><span style=\"color:#717071\">▍或许是因为继承了爷爷隐匿墓址的策略，考古学家在1983年偶然发现赵佗之孙赵昧的墓葬时，其墓也未曾被盗掘过。</span></p><p>此外，墓主还可以设置「疑冢」或者「虚墓」。</p><p>传说和历史文献中均有不少「疑冢」的故事，然而最著名的曹操「七十二疑冢」，真实性却十分可疑：从考古发掘所见「曹操墓」相对寒酸的状态来看，提倡薄葬的曹操似乎不太可能设置疑冢，更不要说一搞就是七十二个。</p><p><img src=\"https://r.sinaimg.cn/large/article/0c2af1637af19c124fe68dc2940f597c\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_jpg/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxwzj0IBxY4f7lxM5GHLOTXdZQUEADYGeNOKE1I3PTCGJuBXQVEj9Y9w/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\"/></p><p><span style=\"color:#717071\">▍即便如此，曹操墓也还是没有逃脱多次被盗掘的厄运</span></p><p>不过，从历史文献和考古发现来看，「疑冢」在中国古代应该确实存在。</p><p>比如有学者就认为，1965 年辽宁北票发现的一座「墓中无人」的北燕大墓，很可能就是一座虚墓。</p><p><img src=\"https://r.sinaimg.cn/large/article/3fc0cbc859d48b55337c35eb173d261f\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_jpg/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxmF29ia29vB6mkvFibz9LPicpP7mgdtiaEz3P683VGndOaXd7bRYZ6M5ZkQ/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\"/></p><p><span style=\"color:#717071\">▍虽然棺椁内没有尸骨，但通过随葬的刻有「范阳公章」「鎏金铜印」「大司马章」「车骑大将军」的四枚印章等文物发掘者还是判定这座墓的主人就是北燕大将冯素弗。</span></p><p><strong>但无论是隐匿墓址还是设置虚墓，都不是长久之计。因为盗墓贼们的行动，并非每次都是有明确目标的针对性盗掘。更多的情况下，他们都是在古代遗存分布密集的区域内，广泛探寻。</strong></p><p><img src=\"https://r.sinaimg.cn/large/article/6b38403f17ade8e49ab354ee0ddd6f35\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_png/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxCEDBq0XJDHMLW7aD8SN951iarzNCFxTO2xxPUWQ0roNadsQjMTiaqCzw/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\"/></p><p><span style=\"color:#717071\">▍即使隐藏于地下的墓葬有时也会在地表显露出痕迹，比如位于墓葬上方的植被就往往会因为墓葬区域相对肥沃的土壤而更加茂盛。</span></p><p><img src=\"https://r.sinaimg.cn/large/article/614f192147a586c8b97e717a51bf6f56\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_jpg/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxicfVSCv2siczzGyF9dEyZRSmTYvl5JbxzMelFFicQnu57vj0SguUR1YhQ/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\"/></p><p><span style=\"color:#717071\">▍可以很快向地下钻出极深钻孔的洛阳铲是近代盗墓贼用来判定地下是否存在古墓的重要工具</span></p><p>所以，光靠躲也不保险，一旦通过钻探或者其他参考信息确定了墓葬的位置，盗墓贼们当然就会想尽一切办法进入墓室。</p><p>好在，虽然不能用酷炫的机关暗箭从容地击退盗墓贼，但严防死守还是可以做到的。<strong>只要财力足够雄厚，就可以通过升级陵墓的封闭系统，来拒绝盗墓贼的访问。</strong></p><p>普通的夯土和砖墙结构，肯定无法达到要求。改用巨大的石块来封堵，显然效果最佳。</p><p>自春秋战国时期开始，利用巨石封堵墓道、墓口就已经成为最普遍的防盗墓手段。</p><p><img src=\"https://r.sinaimg.cn/large/article/5f866004f229e59acd9800f749016c11\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_png/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxldwLFxibPBe1vwc6QricX1zSA2BhyZUHHzCw0y2kswTvibzO3vRP7fvFQ/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\"/></p><p><span style=\"color:#717071\">▍徐州后楼山汉墓墓道填铺石板示意图</span></p><p><img src=\"https://r.sinaimg.cn/large/article/9c5de0262fcf0e2556f6368a315dc7a5\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_jpg/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxmz1F8HLekoTcRS7y30bWEVpw4AfYUD55CETR4KtXXlJ2n8goibN4zzg/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\" style=\"max-width: 100%;\"/></p><p><span style=\"color:#717071\">▍徐州北洞山西汉楚王墓墓道塞石情况</span></p><p><img src=\"https://r.sinaimg.cn/large/article/44dd4b89d5a4a95d40665baa49cf945e\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_jpg/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxNdbyEe1BAxdHKobqfp9gJUklW0VRiaNXy055y2aRKLgicZMDBtIxqX0g/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\"/></p><p><span style=\"color:#717071\">▍徐州驮篮山西汉楚王墓墓道塞石残迹</span></p><p>为了最大程度地保证墓室外围的坚固程度，很多大墓还会充分利用地形直接在石质的山崖上开凿墓穴，盗墓者只能通过墓道进入，只要墓道及墓室入口处足够坚固，就足以阻挡住绝大多数的盗墓贼了。</p><p><img src=\"https://r.sinaimg.cn/large/article/90827673452bf603dc15eb9dce23452c\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_jpg/Z08UWq352tkERfPWUdHa4cIBCHs2BHLxfAIYW8dOqaZ5Jy1Cd9qqAjY2AqQX7chTH6mKyu2pJ1On7XeUpDmGMQ/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\"/></p><p><span style=\"color:#717071\">▍开凿在崖壁上的西汉中山靖王刘胜之墓</span></p><p>除了以大石阻塞的惯用方法以外，有些大墓，如西汉中山靖王刘胜之墓，墓道还会用融化的铁水浇铸成铁壁，进一步升级封闭性。</p><p>一些防卫严密的大墓，还会在墓门处设置各种石质和铜质的顶门机关，以保证墓门在关闭之后就无法再被轻易打开。</p><p><img src=\"https://r.sinaimg.cn/large/article/c11979dde727b915248ddd8d5b955e7d\" data-origin-src=\"https://mmbiz.qpic.cn/mmbiz_jpg/Z08UWq352tkERfPWUdHa4cIBCHs2BHLx24g6ibAjWF48ud6XzyqaANibXj4RZnFWfcvDyLXGCUmdicDj2esBpHPRg/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1\" alt=\"\" title=\"盗墓最怕遇到什么｜大象公会\" style=\"max-width: 100%;\"/></p><p>不过，即便成功打造了如此庞大的防盗工程，还是不能保证陵墓就一定不会惨遭毒手。</p><p>比如徐州北洞山楚王墓，虽然在墓道里堆满巨石，墓门处还设置了顶门机关，但还是在考古人员 1986\r\n年正式发掘之前就已多次被盗。墓道上层单体就有数吨重的塞石已经被扰乱，塞石缝隙间散落着各种小件文物，考古学家还在部分塞石的前端发现了盗墓贼为便于拖拽而凿出的牛鼻环，墓门也被盗墓者成功打开。</p><p>不过，中国古墓的主人，也并非完全不能让盗墓贼心头一沉。</p><p>据《水经注》记载，汉魏时期，一个名叫张詹的将军在其墓碑背面刻下了这段话：</p><blockquote>白楸之棺，易朽之裳，铜铁不入，丹器不藏，嗟矣后人，幸勿我伤。</blockquote><p>意思是：<strong>我的墓里什么都没有，各位就别进来了。</strong></p><p>如果张将军言行合一，他的墓大概就是盗墓贼最怕碰到的情况——折腾了半天，最后一无所获。</p><p>不过，这一次，张詹并没有让敢于风险投资的盗墓团队失望。 他的墓葬最终还是惨遭盗掘，而且墓中的真实情况其实是：</p><blockquote>金银铜铁锡之器，朱漆雕刻之饰烂然。有一朱漆棺，棺前垂竹帘，隐以金钉……</blockquote><p><br/></p>', 0, 102, 0, 0, 0, 'red', '2018-06-04 15:58:17');
INSERT INTO `cms_content` VALUES (45, '以动漫为名制作涉暴邪典视频，幕后指挥公司道歉称为冲流量', 26, '头条,推荐,加粗,跳转', '杂谈', '动漫|杂谈', '/CMS/uploads/20180604/20180604083639537.jpg', 'yang', 'yang', ' 曾占据YouTube内容库两千分之一的“儿童邪典视频”已经悄无声息地流传到国内。此类视频以可爱的卡通形象为掩盖，长期向儿童输送色情、暴力等观念，YouTube大量下架此类视频后，中国成为其重要传播地。', '<p><strong>充斥色情与暴力的儿童视频</strong></p><p>近日，有网友曝出在外网遭禁的“儿童邪典视频”已经流传到国内。儿童邪典视频，指恶意将知名动画人物进行二次改造，加入暴力、色情等元素后再制作成动画视频或是由真人出演的动漫元素视频，将其上架到视频网站的儿童专区。</p><p>这类视频的名称中通常带有“早教”、“亲子”、“益智动画”等字眼，并且由孩子们熟悉的动画角色出演主角。但在视频中，如米老鼠怀孕需要打针治病、艾莎公主接受开颅手术、小猪佩奇吃大便等匪夷所思的行为都是视频中的常态。</p><p>事件曝光前，在国内多家视频网站搜索“艾莎公主”、“小猪佩奇”等动画经典人物，再加以“怀孕”、“打针”或“大便”等关键词，可以搜索出大量“儿童邪典视频”。</p><p><img src=\"https://r.sinaimg.cn/large/article/e454a6a5bf009816f36cd31e140885fa\" data-origin-src=\"http://p1.pstatp.com/large/5b470004ddb744012ca1\" alt=\"\" title=\"以动漫为名制作涉暴邪典视频，幕后指挥公司道歉称为冲流量\"/></p><p>据澎湃新闻报道，搜狐视频上的账号“星光娱乐秀”，上传内容多为“汪汪队长粗心将艾莎公主撞死”、“绿巨人宝宝的脚丫里钻进了蝎子”等邪典视频，其总播放量已经超过1200万次。</p><p>1月20日，腾讯视频、爱奇艺、优酷、搜狐等视频平台先后作出回应，称已经屏蔽关键词并永久封停相关账号。目前，“蜘蛛侠和艾莎公主”、“天花亲子”和“小飞侠玩具”等视频账号因长期上传此类视频，账号均被封停处理。</p><p>1月22日，全国扫黄打非办官方微博发声，称已部署开展深入监测和清查，对不履行企业主体责任、造成有害视频及信息传播的企业，一经查实，必予严惩。</p><p>1月23日，北京市文化市场行政执法总队下发《关于查禁“儿童邪典视频”工作的紧急通知》，要求各视频网站开展自查。</p><p>虽然多家视频平台的相关账号都被封禁，但对“儿童邪典视频”的出现，有网友评论称：“这个事情远比想象中恐怖，传播学者格伯纳提出的培养理论，就是指暴力画面对儿童的成长有长远影响，不仅会增加儿童的攻击性，更会潜移默化地改造社会。这些动画片都是精心设计的，是由心理学控制术体系的，我更担心这只是冰山一角。”</p><p><strong>公司为搏流量制作“邪典视频”？</strong></p><p>“儿童邪典视频”事件发酵后，有网友发现“欢乐迪士尼频道”是国内最早一批上传“儿童邪典视频”的账号，其背后有专门的公司运营。</p><p>欢乐迪士尼频道在微博的认证为“广州胤钧贸易有限公司”，AI财经社通过第三方信息平台天眼查发现，广州胤钧贸易有限公司为台港澳自然人独资所有，其法人赖慧芸是全额出资50万元的大股东。</p><p>值得注意的是，该公司注册时间为2015年8月，与国外“邪典视频”传入国内的时间相近。</p><p>该公司的经营项目包括多媒体设计服务、美术图案设计服务、动漫及衍生产品设计服务以及文艺创作服务等。而该公司在中华英才网上的公司介绍为：主要是制作视频为主，包括美术教学、短片、短剧和动画片等。</p><p><img src=\"https://r.sinaimg.cn/large/article/0b5e5f80efd14219096244c1c943d19a\" data-origin-src=\"http://p3.pstatp.com/large/5b4500054df0faa16a9e\" alt=\"\" title=\"以动漫为名制作涉暴邪典视频，幕后指挥公司道歉称为冲流量\"/></p><p>另外，该公司曾发布过英文笔译、动漫设计卡通定格动画师、手绘素描画家等职位的招聘信息，薪资在3000元到5000元不等。有论坛网友猜测称，英文笔译或是最初翻译国外“邪典视频”所需。</p><p>据《南方都市报》报道，一名自称是该公司负责视频拍摄和上传的员工称，“老板要求拍什么，我们就拍什么。”</p><p>对于为什么要拍摄此类内容、视频怎么上传、上传到哪些网站，这名员工都表示不清楚，“平时都是我打电话给老板，他都不知道我是谁。主要通过QQ沟通，剧本都是老板发给我的。公司成立了两年，至于拍了多少视频，没去统计过。”</p><p>目前，“欢乐迪士尼频道”已删除微博平台的大量图文，并更名为“海底5万米”。同时，其在多个视频平台的账号已经无法搜索到。</p><p>1月22日晚，@海底5万米\r\n在微博道歉，称公司不是邪教或制作邪典片的公司，当初只是为冲视频流量才制作带有恐怖题材的视频，忽略了该类题材视频给小朋友带来的伤害，并在微博表示歉意。</p><p>有网友找到疑似是公司法人赖慧芸（Kemme Lai）在领英上发布的动态，其最新分享的动态为《How to make poop\r\nslime with baby jamming the\r\ntoilet（如何利用婴儿的粪便制造粘液）》。为此，网友质疑道，其公司制作视频的目的根本不是为了所谓的流量，而是为满足背后老板的恶趣味。</p><p><img src=\"https://r.sinaimg.cn/large/article/36f2a65257c7cac90cc6ccaf863b86a4\" data-origin-src=\"http://p1.pstatp.com/large/5b4400057be0a298d86e\" alt=\"\" title=\"以动漫为名制作涉暴邪典视频，幕后指挥公司道歉称为冲流量\"/></p><p>不过，AI财经社无法证实其为该公司的法人赖慧芸。目前其在领英的相关信息都已全部清空。AI财经社曾多次拨打该公司在招聘平台以及工商信息平台公开的电话号码，始终无人接听。<br/></p><p>另外，1月23日广州市扫黄打非办公室表示，有关部门已对该公司开展调查。</p><p><br/></p>', 1, 114, 0, 0, 0, '', '2018-06-04 16:37:30');
INSERT INTO `cms_content` VALUES (46, '川普压力山大：政坛“内斗”关门，百姓不满，前途渺茫！', 27, '头条,推荐,加粗,跳转', '杂谈|美国', '杂谈|美国|川普', '/CMS/uploads/20180604/20180604083847955.jpg', '121', 'yang', '大家都知道，美国政府这两天关门了......\r\n\r\n没有错，就是美国联邦政府，关门了......\r\n\r\n作为全美最土豪的公司，联邦政府关门的理由也是十分的出人意料——没钱了......', '<p>大家都知道，美国政府这两天关门了......</p><p>没有错，就是美国联邦政府，关门了......</p><p>作为全美最土豪的公司，联邦政府关门的理由也是十分的出人意料——没钱了......</p><p><img src=\"https://r.sinaimg.cn/large/article/f37cd4f2e27b9c9a343bcdead718c87a\" data-origin-src=\"http://p3.pstatp.com/large/5b4b00006b4692d107ac\" alt=\"\" title=\"川普压力山大：政坛“内斗”关门，百姓不满，前途渺茫！\"/></p><p><strong>政府关门背后的猫腻可不少</strong></p><p>简单来讲，政府运行要用钱，而钱来自财政预算，预算要国会批准，而国会不批，那么政府就只好关门大吉了。</p><p>目前，国会里两党斗得你死我活，都想以此为筹码要挟对方，而且双方的分歧还不是一般的大。</p><p><strong>共和党觉得应该增加国防预算，民主党说别的预算也要一并增加，要不就呵呵；</strong></p><p><strong>共和党说“追梦人计划”（童年抵美者暂缓遣返）我们不买单，民主党说呵呵；</strong></p><p><strong>共和党说预算里应该包括我们伟大的墨西哥墙的开支，民主党说呵呵。</strong></p><p>在这种你说什么我都呵呵的态度下，政府的预算就一直都没有批下来。</p><p>本来在今年9月份的时候，政府的预算就已经到期了，因为特朗普和民主党高层达成了协议将债务的期限拖后三个月，于是美国政府得以运行到2017年12月8日。</p><p>然而按照这两派谁都不肯低头的秉性，这三个月的缓冲期也是然并卵，于是在12月8日的时候，参议院不得不通过了一个<strong>短期临时预算议案</strong>，补充少量的资金以防止政府停摆。</p><p>这样耗到了12月22日，眼瞅着又没钱了，只能再通过一个<strong>短期临时预算议案</strong>，扛到了2018年1月18日。</p><p>眨眼又到了1月18日，说好了事不过三，于是这次特朗普同学决定发挥自己总统的魅力，亲自游说了一番，众议院以一个非常勉强的票数<strong>（230:197）</strong>通过了一个新的<strong>临时预算法案</strong>（没错还是临时的），为美国政府提供四周的资金到2月16日。</p><p>然鹅......2月19日参议院以50:49的票数否决了这个临时法案（60票为通过），于是在20日凌晨，美国政府正式宣告停摆，<strong>而20日正是美国总统特朗普上任一周年的日子。</strong></p><p>这样的礼物，也不可谓不精彩了。</p><p>向来爱好以推治国的特朗普照例发推特说：</p><p><img src=\"https://r.sinaimg.cn/large/article/568b93afd3dc0cc239c785a122c75c95\" data-origin-src=\"http://p3.pstatp.com/large/5b480005fe7baa8c0f22\" alt=\"\" title=\"川普压力山大：政坛“内斗”关门，百姓不满，前途渺茫！\"/></p><p>这是我总统任期一周年，民主党是想送我一份惊喜吧......</p><p>从推特也可以看出来特朗普并非十分焦虑，因为美国政府关门这件事在美国历史上也是时有发生的。</p><p>就在特朗普前任奥巴马的任期上，因为两党人士对<strong>“奥巴马医改”</strong>意见不统一，美国政府就被迫关闭过，并且一关就是<strong>16天。</strong></p><p><img src=\"https://r.sinaimg.cn/large/article/b99dd8d6c59c0d1d27bdacf85113f931\" data-origin-src=\"http://p1.pstatp.com/large/5b4700061688c48bbb9c\" alt=\"\" title=\"川普压力山大：政坛“内斗”关门，百姓不满，前途渺茫！\"/></p><p>说来有趣，当时还不是总统的特朗普还因为这件事发推吐槽了奥巴马......如今......</p><p>1995年，克林顿在任时，更是创下了政府前后关门长达27天的记录，并且还因为政府关闭，克林顿不得不取消了前往日本参加亚太经合组织非正式领导人会议的行程。</p><p>可能看到这有朋友就困惑了，为啥美国政府这么死脑筋呢，人还能办信用卡呢，钱不能先花着到时候再还么？</p><p>其实这源于美国的<strong>三权分立</strong>制度，政府是行政部门，预算需要立法部门批准，这样可以使部门和部门之间相互制约和权衡。</p><p>也因此，当拥有立法权的国会不批准预算方案时，行政部门就会因无钱可用而被迫暂时关门。</p><p>早些年的时候美国人也想过像还信用卡那样，先花钱后还款，可是信用卡大家都知道，动不动就刷爆了，政府也是花起钱来剁手都挡不住，所以后来就出了法案不准联邦政府裸奔，必须提前申请预算。</p><p>这种制衡制度本意是好的，既可以避免行政部门开支无度，也可以对国家未来一段时间的发展有一个大致的规划，更也可以平衡行政部门和立法部门之间的权利。</p><p>可是当美国内部政治争端突出的时候，制衡就难免会沦为<strong>“党争”</strong>的工具，两党都以政府关门作为要挟迫使对方让步，最后往往弄得不欢而散。</p><p>所以“关门”这种事大概从1976年到现在发生了十七八次吧，不过大多都是发生在白宫和国会分别为两党控制时期，像现在这样<strong>白宫和国会均为共和党控制</strong>的情况下还发生了政府关门的事件，也算是破天荒的头一回了。</p><p><img src=\"https://r.sinaimg.cn/large/article/a9633eef82060966f7f50990cd461c64\" data-origin-src=\"http://p1.pstatp.com/large/5b4b00006b472ee42532\" alt=\"\" title=\"川普压力山大：政坛“内斗”关门，百姓不满，前途渺茫！\"/></p><p>以往美国政府关门的统计</p><p>这也从某个方面凸显了现在美国内部的矛盾。</p><p>特别是特朗普上台这一年来，不仅是共和党和民主党两党之间争议不断，党派内部的分歧也在加剧。</p><p>在这次事件中，由共和党控制的参议院赞同票也不过才50，反对的却有49。</p><p>特朗普执政一周年和美国政府关闭同一天到来，虽说是一种巧合，但是也有一种宿命的味道。</p><p>作为美国第一个商人出身的总统，特朗普从上台以后采取了很多激进的政策来实现他让美国人重新富裕起来的政治理想。</p><p>但是从推翻奥巴马医改到限入令，从减税到退出巴黎协定、从夏洛茨维尔白人至上骚乱到拉斯维加斯枪支暴力泛滥......</p><p>美国坚持了几十年的自由主义突然改弦更张，新总统大规模颠覆上届政府的政策路线，这让所有的美国人都心存疑虑甚至感到愤怒。</p><p>在反全球化的驱动下，美国政党政治的聚焦议题出现了从“族裔-文化”向“阶层-经济”的应激移动，更是加剧了原本势如水火的两党各自内部不同派别的分歧与分化。</p><p>关门似乎已经成为了逼迫对方让步的手段，大家都以美国政治的运转和美国人民的生活做赌注，看谁先妥协。</p><p>作为全球最大经济体、全球举债能力最强的国家，美国本应是最不可能出现“财务”问题的，但是从现在的状况来看，政府治理能力下降、信用透支已经让美国人民感到深深的不安。</p><p><img src=\"https://r.sinaimg.cn/large/article/0df7a096304bc15ff226959278cb6b26\" data-origin-src=\"http://p3.pstatp.com/large/5b4d00001ff953c5e956\" alt=\"\" title=\"川普压力山大：政坛“内斗”关门，百姓不满，前途渺茫！\"/></p><p><strong>不管原因为哪般，倒霉的还是普通老百姓</strong></p><p><strong>首先，政府关门真的很贵。</strong></p><p>很多美国人对克林顿任期内的那次超长时间的政府关闭还记忆犹新，当时很多政府机构不再办公，非核心联邦政府的工人被迫休假，47万5千名核心雇员在没有收入的情况下继续上班。</p><p>退伍军人的福利被延迟发放，将近600个垃圾站也停止了清理工作。</p><p>后来，2010国会研究事务处再次总结了1995年到1996年这次关闭，政府关闭共计损失了14亿美金。</p><p>这次也同样是如此，住房、环境、教育和商务部门的绝大多数员工已经被迫休假了，很多公共服务也已经暂停。</p><p>企业也不用咨询税改细节了，因为税务人员也都不需要上班了。</p><p>其他核心部门诸如医疗、国防、交通这些估计也只有一些核心员工需要上班，但是没有工资，其他人更是面临着无薪休假的窘境。</p><p>有美国媒体分析，此次联邦政府机构的关门将对社会、经济造成广泛影响，具体的数字则要看政府到底要关闭几天了。</p><p>羊毛出在羊身上，反正最后总是要老百姓来买单。</p><p><strong>其次，自由女神是看不了了。</strong></p><p>归属在联邦政府名下的国家公园和一些著名建筑都将停止对外开放，这其中就包括了自由女神像和黄石国家公园这种世界闻名的旅游景点。</p><p><img src=\"https://r.sinaimg.cn/large/article/4ea94908e30ac7d80afb09c564201ad8\" data-origin-src=\"http://p1.pstatp.com/large/5b480005fe7af31a4acb\" alt=\"\" title=\"川普压力山大：政坛“内斗”关门，百姓不满，前途渺茫！\"/></p><p>在这个时候前往美国旅行的小伙伴，只能用一句倒霉来形容了......</p><p>看不到女神还是次要的，现在无论是前往美国还是离开美国，恐怕签证和护照的处理都会遭到延误。</p><p>然而说到底，钱都是小事，联邦政府关闭对于美国政府<strong>信用</strong>的打击才是最致命的。</p><p>无论是共和党还是民主党心里其实都非常清楚，政府关闭显示了两党合作的失利和政府运作效率的低下，甚至让民主的含义都黯然失色。</p><p>特朗普上台的最高理想本是要复苏美国的经济，可是这次关门事件无异于给了他和美国现在的核心领导团队一个当头棒喝。</p><p>不过好在，掰扯了几天后，1月22日，美国参议院共和党和民主党总算达成了临时协议，<strong>为期三天的政府停摆总算结束了。</strong></p><p>但是这次维持政府正常运作的拨款也仅能持续<strong>三周</strong>，在不断发酵的民意背后，美国政坛所面临的压力也空前巨大。</p><p>本文来源公众号海外眼，更多海外资讯请关注海外眼！</p><p><br/></p>', 1, 151, 0, 0, 0, '', '2018-06-04 16:39:23');
INSERT INTO `cms_content` VALUES (47, '1希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍 ', 29, '头条,推荐,加粗,跳转', '杂谈|希特勒', '军事|杂谈|希特勒', '/CMS/uploads/20180604/20180604084028575.jpg', '', 'yang', '这些照片拍摄于1925年，看到这些照片后，希特勒要求霍夫曼毁掉底片，但他没有照做。而是发表在他的回忆录希特勒是我的朋友中，1955年出版。希特勒在镜子前练习演讲', '<p><span style=\"color: rgb(34, 34, 34); font-family:\"><span style=\"font-size: 22px;\">这些照片拍摄于1925年，看到这些照片后，希特勒要求霍夫曼毁掉底片，但他没有照做。而是发表在他的回忆录希特勒是我的朋友中，1955年出版。希特勒在镜子前练习演讲</span></span><a href=\"http://photo.blog.sina.com.cn/showpic.html#blogid=5d244e8e0102x89b&url=http://album.sina.com.cn/pic/001HKLnwzy7eufkFBLSc4\" target=\"_blank\"><img src=\"http://s5.sinaimg.cn/mw690/001HKLnwzy7eufkFBLSc4&690\" name=\"image_operate_75111506234460205\" alt=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" title=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" width=\"690\" height=\"485\"/></a><br/><br/><a href=\"http://photo.blog.sina.com.cn/showpic.html#blogid=5d244e8e0102x89b&url=http://album.sina.com.cn/pic/001HKLnwzy7eufkMFym56\" target=\"_blank\"><img src=\"http://s7.sinaimg.cn/mw690/001HKLnwzy7eufkMFym56&690\" alt=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" title=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" width=\"577\" height=\"657\"/></a><br/><br/><a href=\"http://photo.blog.sina.com.cn/showpic.html#blogid=5d244e8e0102x89b&url=http://album.sina.com.cn/pic/001HKLnwzy7eufkP6Rr51\" target=\"_blank\"><img src=\"http://s2.sinaimg.cn/mw690/001HKLnwzy7eufkP6Rr51&690\" alt=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" title=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" width=\"690\" height=\"517\"/></a><br/><br/><a href=\"http://photo.blog.sina.com.cn/showpic.html#blogid=5d244e8e0102x89b&url=http://album.sina.com.cn/pic/001HKLnwzy7eufkWuAk54\" target=\"_blank\"><img src=\"http://s5.sinaimg.cn/mw690/001HKLnwzy7eufkWuAk54&690\" alt=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" title=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" width=\"690\" height=\"661\"/></a><br/><br/><a href=\"http://photo.blog.sina.com.cn/showpic.html#blogid=5d244e8e0102x89b&url=http://album.sina.com.cn/pic/001HKLnwzy7eufl2zvU26\" target=\"_blank\"><img src=\"http://s7.sinaimg.cn/mw690/001HKLnwzy7eufl2zvU26&690\" alt=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" title=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" width=\"690\" height=\"519\"/></a><br/><br/><a href=\"http://photo.blog.sina.com.cn/showpic.html#blogid=5d244e8e0102x89b&url=http://album.sina.com.cn/pic/001HKLnwzy7eufl5xOm7e\" target=\"_blank\"><img src=\"http://s15.sinaimg.cn/mw690/001HKLnwzy7eufl5xOm7e&690\" alt=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" title=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" width=\"690\" height=\"523\"/></a><br/><br/><a href=\"http://photo.blog.sina.com.cn/showpic.html#blogid=5d244e8e0102x89b&url=http://album.sina.com.cn/pic/001HKLnwzy7eufl8dofc3\" target=\"_blank\"><img src=\"http://s4.sinaimg.cn/mw690/001HKLnwzy7eufl8dofc3&690\" alt=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" title=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" width=\"635\" height=\"718\"/></a><br/><br/><a href=\"http://photo.blog.sina.com.cn/showpic.html#blogid=5d244e8e0102x89b&url=http://album.sina.com.cn/pic/001HKLnwzy7euflbIWK82\" target=\"_blank\"><img src=\"http://s3.sinaimg.cn/mw690/001HKLnwzy7euflbIWK82&690\" alt=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" title=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" width=\"690\" height=\"481\"/></a><br/><br/><a href=\"http://photo.blog.sina.com.cn/showpic.html#blogid=5d244e8e0102x89b&url=http://album.sina.com.cn/pic/001HKLnwzy7euflemrU9a\" target=\"_blank\"><img src=\"http://s11.sinaimg.cn/mw690/001HKLnwzy7euflemrU9a&690\" alt=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" title=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" width=\"632\" height=\"713\"/></a><br/><br/><a href=\"http://photo.blog.sina.com.cn/showpic.html#blogid=5d244e8e0102x89b&url=http://album.sina.com.cn/pic/001HKLnwzy7euflgogBd5\" target=\"_blank\"><img src=\"http://s6.sinaimg.cn/mw690/001HKLnwzy7euflgogBd5&690\" alt=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" title=\"希特勒最想毁掉的照片，但被摄影师偷偷留下了，充满魔性的摆拍\" width=\"690\" height=\"475\"/></a></p>', 1, 11580, 0, 0, 0, 'blue', '2018-06-04 16:41:02');

-- ----------------------------
-- Table structure for cms_level
-- ----------------------------
DROP TABLE IF EXISTS `cms_level`;
CREATE TABLE `cms_level`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '//编号',
  `level_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//等级名称',
  `level_info` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//等级说明',
  `premission` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//权限',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 67 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cms_level
-- ----------------------------
INSERT INTO `cms_level` VALUES (5, '普通管理员', '除了不能操作别的管理员，其他任何后台功能都可以操作。', '1,14');
INSERT INTO `cms_level` VALUES (6, '超级管理员', '最大的权限，如果只有一个超级管理员的时候，不能删除自己。', '1,2,3,4,5,6,7,8,9,10,11,12,13,14');
INSERT INTO `cms_level` VALUES (4, '发帖专员', '可以发表文章及修改和删除文章的权限。', '1,7');
INSERT INTO `cms_level` VALUES (3, '评论专员', '用于操作用户评论的权限~', '1,8');
INSERT INTO `cms_level` VALUES (2, '会员专员', '只有管理会员的权限，包括新增、删除、修改和查询。', '13');
INSERT INTO `cms_level` VALUES (1, '后台游客', '只能访问后台的权限！', '1');

-- ----------------------------
-- Table structure for cms_link
-- ----------------------------
DROP TABLE IF EXISTS `cms_link`;
CREATE TABLE `cms_link`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '//编号',
  `webname` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//网站名称',
  `weburl` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//网站地址',
  `logourl` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//logo地址',
  `user` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//站长名',
  `type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '//类型',
  `state` tinyint(1) NOT NULL DEFAULT 0 COMMENT '//状态',
  `date` datetime(0) NOT NULL COMMENT '//时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cms_link
-- ----------------------------
INSERT INTO `cms_link` VALUES (1, '网易新闻', 'http://news.163.com', '', '丁磊', 1, 1, '2018-06-07 16:51:57');
INSERT INTO `cms_link` VALUES (2, '优酷视频', 'http://www.youku.com', 'images/youku.png', '古永锵', 2, 1, '2018-06-07 16:52:48');
INSERT INTO `cms_link` VALUES (3, '百度搜索', 'http://www.baidu.com', '', '李彦宏', 1, 1, '2018-06-07 21:20:58');
INSERT INTO `cms_link` VALUES (6, '网易', 'http://www.163.com', 'images/163.png', '丁磊', 2, 1, '2018-06-07 13:33:16');

-- ----------------------------
-- Table structure for cms_manage
-- ----------------------------
DROP TABLE IF EXISTS `cms_manage`;
CREATE TABLE `cms_manage`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '//编号',
  `admin_user` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//管理员账号',
  `admin_pass` char(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//管理员密码',
  `level` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '//管理员等级',
  `login_count` smallint(5) NOT NULL DEFAULT 0 COMMENT '//登录次数',
  `last_ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '000.000.000.000' COMMENT '//最后一次IP',
  `last_time` datetime(0) NOT NULL COMMENT '//最后一次登录时间',
  `reg_time` datetime(0) NOT NULL COMMENT '//注册时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 85 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cms_manage
-- ----------------------------
INSERT INTO `cms_manage` VALUES (82, '<b>1</b>', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 1, 0, '000.000.000.000', '0000-00-00 00:00:00', '2018-06-03 16:29:26');
INSERT INTO `cms_manage` VALUES (4, '樱木花道', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 2, 0, '000.000.000.000', '0000-00-00 00:00:00', '2011-05-19 17:04:41');
INSERT INTO `cms_manage` VALUES (5, '赤木晴子', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 3, '127.0.0.1', '2011-09-10 22:41:38', '2011-05-19 17:04:57');
INSERT INTO `cms_manage` VALUES (6, '樱桃小丸子', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, 1, '127.0.0.1', '2011-09-10 22:47:54', '2011-05-20 15:50:08');
INSERT INTO `cms_manage` VALUES (56, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 176, '127.0.0.1', '2011-11-07 20:46:34', '2011-06-20 11:17:03');
INSERT INTO `cms_manage` VALUES (8, '流川枫', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, 1, '127.0.0.1', '2011-09-14 19:53:14', '2011-05-20 15:52:06');
INSERT INTO `cms_manage` VALUES (53, '蜡笔小新', '7c4a8d09ca3762af61e59520943dc26494f8941b', 5, 1, '127.0.0.1', '2011-09-14 20:46:05', '2011-06-18 21:12:42');
INSERT INTO `cms_manage` VALUES (79, '1213', '761ee866d554db1c7582326a910fac8b9764c345', 1, 0, '000.000.000.000', '0000-00-00 00:00:00', '2018-06-03 12:12:10');
INSERT INTO `cms_manage` VALUES (72, 'yang', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 6, 23, '::1', '2018-06-08 10:20:50', '2018-06-02 09:44:56');
INSERT INTO `cms_manage` VALUES (84, 'test02', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 1, 1, '::1', '2018-06-08 10:15:21', '2018-06-08 10:12:32');

-- ----------------------------
-- Table structure for cms_nav
-- ----------------------------
DROP TABLE IF EXISTS `cms_nav`;
CREATE TABLE `cms_nav`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '//编号',
  `nav_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//导航名',
  `nav_info` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//导航说明',
  `pid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '//子分类',
  `sort` mediumint(8) UNSIGNED NOT NULL COMMENT '//排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 39 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cms_nav
-- ----------------------------
INSERT INTO `cms_nav` VALUES (1, '军事动态', '主要是军事方面的新闻。', 0, 1);
INSERT INTO `cms_nav` VALUES (2, '八卦娱乐', '娱乐界的狗仔新闻集。', 0, 2);
INSERT INTO `cms_nav` VALUES (3, '时尚女人', '关于时尚和女人方面的信息。', 0, 3);
INSERT INTO `cms_nav` VALUES (4, '科技频道', '关于科技方面的资讯。', 0, 4);
INSERT INTO `cms_nav` VALUES (5, '智能手机', '关于智能手机方面的推荐。', 0, 5);
INSERT INTO `cms_nav` VALUES (7, '美容护肤', '关于美容方面的信息。', 0, 7);
INSERT INTO `cms_nav` VALUES (8, '热门汽车', '关于汽车方面的信息。', 0, 8);
INSERT INTO `cms_nav` VALUES (9, '房产家居', '关于房产家居的信息。', 0, 9);
INSERT INTO `cms_nav` VALUES (10, '读书教育', '关于教育方面的信息。', 0, 10);
INSERT INTO `cms_nav` VALUES (11, '股票基金', '关于股票基金的信息。', 0, 11);
INSERT INTO `cms_nav` VALUES (26, '中国军事', '关于中国军事的信息。', 1, 3);
INSERT INTO `cms_nav` VALUES (27, '美国军事', '关于美国军事的信息。', 1, 1);
INSERT INTO `cms_nav` VALUES (29, '日本军事', '关于日本军事方面的信息。', 1, 2);
INSERT INTO `cms_nav` VALUES (30, '韩国军事', '关于韩国军事的信息。', 1, 4);
INSERT INTO `cms_nav` VALUES (32, '朝鲜军事', '关于朝鲜军事的信息。', 1, 5);
INSERT INTO `cms_nav` VALUES (33, '越南军事', '关于越南军事的信息。', 1, 6);

-- ----------------------------
-- Table structure for cms_premission
-- ----------------------------
DROP TABLE IF EXISTS `cms_premission`;
CREATE TABLE `cms_premission`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '//编号，标识',
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//权限名称',
  `info` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//权限描述',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cms_premission
-- ----------------------------
INSERT INTO `cms_premission` VALUES (1, '后台登录', '后台登录');
INSERT INTO `cms_premission` VALUES (2, '清理缓存', '清理缓存');
INSERT INTO `cms_premission` VALUES (3, '管理员管理', '管理员管理');
INSERT INTO `cms_premission` VALUES (4, '等级管理', '等级管理');
INSERT INTO `cms_premission` VALUES (5, '权限设定', '权限设定');
INSERT INTO `cms_premission` VALUES (6, '网站导航', '网站导航');
INSERT INTO `cms_premission` VALUES (7, '文档操作', '文档操作');
INSERT INTO `cms_premission` VALUES (8, '评论审核', '评论审核');
INSERT INTO `cms_premission` VALUES (9, '轮播器管理', '轮播器管理');
INSERT INTO `cms_premission` VALUES (10, '广告管理', '广告管理');
INSERT INTO `cms_premission` VALUES (11, '投票管理', '投票管理');
INSERT INTO `cms_premission` VALUES (12, '审核友情链接', '审核友情链接');
INSERT INTO `cms_premission` VALUES (13, '会员管理', '会员管理');
INSERT INTO `cms_premission` VALUES (14, '系统配置管理', '系统配置管理');

-- ----------------------------
-- Table structure for cms_rotatain
-- ----------------------------
DROP TABLE IF EXISTS `cms_rotatain`;
CREATE TABLE `cms_rotatain`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '//编号',
  `thumbnail` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//图片',
  `title` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//标题',
  `info` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//简介',
  `state` tinyint(1) NOT NULL DEFAULT 0 COMMENT '//是否在前台轮播',
  `link` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//地址',
  `date` datetime(0) NOT NULL COMMENT '//时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cms_rotatain
-- ----------------------------
INSERT INTO `cms_rotatain` VALUES (7, '/CMS/uploads/20180606/20180606152553833.png', '妈咪宝贝', '妈咪宝贝', 1, 'http://www.baidu.com', '2018-06-06 21:26:40');
INSERT INTO `cms_rotatain` VALUES (8, '/CMS/uploads/20180606/20180606152707756.png', '牛仔裤', '牛仔裤', 1, 'http://www.baidu.com', '2018-06-06 21:27:24');
INSERT INTO `cms_rotatain` VALUES (9, '/CMS/uploads/20180606/20180606152732825.png', '支付宝1', '支付宝1', 1, 'http://www.baidu.com', '2018-06-06 21:27:51');
INSERT INTO `cms_rotatain` VALUES (11, '/CMS/uploads/20180606/20180606154629348.jpg', 'test01', '11', 1, 'http://www.baidu.com', '2018-06-06 21:46:38');

-- ----------------------------
-- Table structure for cms_system
-- ----------------------------
DROP TABLE IF EXISTS `cms_system`;
CREATE TABLE `cms_system`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '//编号',
  `webname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//网站名称',
  `page_size` tinyint(2) NOT NULL COMMENT '//普通分页条数',
  `article_size` tinyint(2) NOT NULL COMMENT '//文章分页的条数',
  `nav_size` tinyint(2) NOT NULL COMMENT '//主导航前台显示的个数',
  `updir` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//上传的主目录',
  `ro_time` tinyint(2) NOT NULL COMMENT '//轮播器的速度',
  `ro_num` tinyint(2) NOT NULL COMMENT '//轮播器的个数',
  `adver_text_num` tinyint(2) NOT NULL COMMENT '//文字广告的个数',
  `adver_pic_num` tinyint(2) NOT NULL COMMENT '//图片广告的个数',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cms_system
-- ----------------------------
INSERT INTO `cms_system` VALUES (1, 'YangWeb俱乐部', 10, 8, 10, '/uploads/', 3, 3, 5, 3);

-- ----------------------------
-- Table structure for cms_tag
-- ----------------------------
DROP TABLE IF EXISTS `cms_tag`;
CREATE TABLE `cms_tag`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '//编号',
  `tagname` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//标签名',
  `count` smallint(6) UNSIGNED NOT NULL DEFAULT 1 COMMENT '//访问次数',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 39 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cms_tag
-- ----------------------------
INSERT INTO `cms_tag` VALUES (37, '杂谈|希特勒', 6);
INSERT INTO `cms_tag` VALUES (38, '杂谈|美国', 1);

-- ----------------------------
-- Table structure for cms_user
-- ----------------------------
DROP TABLE IF EXISTS `cms_user`;
CREATE TABLE `cms_user`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '//id',
  `user` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//用户名',
  `pass` char(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//密码',
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//电子邮件',
  `face` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//头像',
  `question` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//提问',
  `answer` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//回答',
  `state` tinyint(1) NOT NULL DEFAULT 1 COMMENT '//会员状态',
  `time` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//最近登录的时间戳',
  `date` datetime(0) NOT NULL COMMENT '//注册时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 141 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cms_user
-- ----------------------------
INSERT INTO `cms_user` VALUES (133, 'yang', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '1151832036@qq.com', '16.gif', '您父亲的姓名？', '654321', 1, '1528203533', '2018-06-05 16:55:38');
INSERT INTO `cms_user` VALUES (134, 'admin', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '1151832036@qq.com', '03.gif', '您父亲的姓名？', '321', 1, '1528203566', '2018-06-05 16:58:50');
INSERT INTO `cms_user` VALUES (135, 'yangyi', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '1151832035@qq.com', '23.gif', '您母亲的职业？', '2121212', 1, '1528348638', '2018-06-05 17:56:37');
INSERT INTO `cms_user` VALUES (136, 'test', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '1151832036@qq.com', '13.gif', '您父亲的姓名？', '2121212', 1, '1528203515', '2018-06-05 17:59:12');
INSERT INTO `cms_user` VALUES (137, 'test01', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '1151832034@qq.com', '16.gif', '您母亲的职业？', '321', 1, '1528203518', '2018-06-05 18:01:57');
INSERT INTO `cms_user` VALUES (138, 'test02', '', '1151832037@qq.com', '06.gif', '您父亲的姓名？', '211', 2, '1528203543', '2018-06-21 21:05:21');
INSERT INTO `cms_user` VALUES (139, 'test03', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '1151832046@qq.com', '09.gif', '您配偶的性别？', '654321', 1, '', '2018-06-05 21:32:46');

-- ----------------------------
-- Table structure for cms_votee
-- ----------------------------
DROP TABLE IF EXISTS `cms_votee`;
CREATE TABLE `cms_votee`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '//编号',
  `title` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//标题',
  `info` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//简介',
  `vid` mediumint(8) NOT NULL DEFAULT 0 COMMENT '//是否主题或项目',
  `count` smallint(6) NOT NULL DEFAULT 0 COMMENT '//投票数',
  `state` tinyint(1) NOT NULL DEFAULT 0 COMMENT '//是否前台首选',
  `date` datetime(0) NOT NULL COMMENT '//时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cms_votee
-- ----------------------------
INSERT INTO `cms_votee` VALUES (1, '您最喜欢的地方菜是什么？', '您最喜欢的地方菜是什么？', 0, 0, 0, '2018-06-07 14:29:55');
INSERT INTO `cms_votee` VALUES (2, '您最喜欢的旅游地区是哪里？', '您最喜欢的旅游地区是哪里？', 0, 0, 1, '2018-06-07 14:30:11');
INSERT INTO `cms_votee` VALUES (4, '浙江杭州', '浙江杭州', 2, 140, 0, '2018-06-07 14:49:50');
INSERT INTO `cms_votee` VALUES (5, '江苏扬州', '江苏扬州', 2, 193, 0, '2018-06-07 19:21:21');
INSERT INTO `cms_votee` VALUES (15, '江苏苏州', '江苏苏州', 2, 35, 0, '2018-06-07 22:38:46');
INSERT INTO `cms_votee` VALUES (16, '浙江宁波', '浙江宁波', 2, 1, 0, '2018-06-07 22:39:39');
INSERT INTO `cms_votee` VALUES (26, '您最喜欢的男歌手是谁呢？', '您最喜欢的男歌手是谁呢？', 0, 0, 0, '2018-06-07 22:52:06');
INSERT INTO `cms_votee` VALUES (27, '您最喜欢的运动是哪项呢？', '您最喜欢的运动是哪项呢？', 0, 0, 0, '2018-06-07 22:52:22');

SET FOREIGN_KEY_CHECKS = 1;
