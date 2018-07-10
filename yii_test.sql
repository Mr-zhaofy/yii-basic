/*
Navicat MySQL Data Transfer

Source Server         : yii_basic
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : yii_test

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-07-10 18:16:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for country
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of country
-- ----------------------------
INSERT INTO `country` VALUES ('1', 'AU', 'Australia', '18886000');
INSERT INTO `country` VALUES ('2', 'BR', 'Brazil', '170115000');
INSERT INTO `country` VALUES ('3', 'CA', 'Canada', '1147000');
INSERT INTO `country` VALUES ('4', 'CN', 'Chinas', '1277558000');
INSERT INTO `country` VALUES ('5', 'DE', 'Germany', '82164700');
INSERT INTO `country` VALUES ('6', 'FR', 'France', '59225700');
INSERT INTO `country` VALUES ('7', 'GB', 'United Kingdom', '59623400');
INSERT INTO `country` VALUES ('8', 'IN', 'India', '1013662000');
INSERT INTO `country` VALUES ('9', 'AU', 'Australia', '18886000');
INSERT INTO `country` VALUES ('10', 'BR', 'Brazil', '170115000');
INSERT INTO `country` VALUES ('11', 'CA', 'Canada', '1147000');
INSERT INTO `country` VALUES ('12', 'CN', 'Chinas', '1277558000');
INSERT INTO `country` VALUES ('13', 'DE', 'Germany', '82164700');
INSERT INTO `country` VALUES ('14', 'FR', 'France', '59225700');
INSERT INTO `country` VALUES ('15', 'GB', 'United Kingdom', '59623400');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL,
  `menu_parent_id` int(11) NOT NULL,
  `menu_status` int(11) NOT NULL,
  `add_time` datetime NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '网站首页', '0', '1', '2018-07-06 14:13:06');
INSERT INTO `menu` VALUES ('2', '我的日记', '0', '1', '2018-07-06 14:14:09');
INSERT INTO `menu` VALUES ('3', '学习笔记', '2', '1', '2018-07-06 14:14:29');
INSERT INTO `menu` VALUES ('4', '个人日记', '2', '1', '2018-07-06 14:14:55');
INSERT INTO `menu` VALUES ('5', '收藏文章', '0', '1', '2018-07-06 14:15:13');
INSERT INTO `menu` VALUES ('6', '技术文章', '5', '1', '2018-07-06 14:16:01');
INSERT INTO `menu` VALUES ('7', '娱乐文章', '5', '1', '2018-07-06 14:16:24');
INSERT INTO `menu` VALUES ('8', '关于Me', '0', '1', '2018-07-06 14:17:05');
INSERT INTO `menu` VALUES ('9', '个人简介', '8', '1', '2018-07-06 14:17:21');
INSERT INTO `menu` VALUES ('10', '个人相册', '8', '1', '2018-07-06 14:17:32');
INSERT INTO `menu` VALUES ('11', '留言墙', '0', '1', '2018-07-06 14:18:19');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(200) NOT NULL,
  `news_img` varchar(255) NOT NULL,
  `news_desc` text NOT NULL,
  `news_label` varchar(100) NOT NULL,
  `news_browse_num` int(11) NOT NULL,
  `news_type` int(11) NOT NULL,
  `is_recommend` int(11) NOT NULL,
  `add_time` datetime NOT NULL,
  `news_link` varchar(200) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', 'Cookie与Session的区别-总结很好的文章', 'u=2239146502,165013516&fm=27&gp=0.jpg', '本文分别对Cookie与Session做一个介绍和总结，并分别对两个知识点进行对比分析，让大家对Cookie和Session有一个更深入的了解，并对自己的开发工作中灵活运用带来启示。  cookie机制 Cookies是服务器在本地机器上存储的小段文本并随每一个请求发送至同一个服务器。IETF RFC 2965 HTTP State Management Mechanism 是通用cookie规范。网络服务器用HTTP头向客户端发送cookies，在客户终端，浏览器解析这些cookies并将它们保存为一个本地文件，它会自动将同一服务器的任何请求缚上这些cookies 。具体来说cookie机制采用的是在客户端保持状态的方案。它是在用户端的会话状态的存贮机制，他需要用户打开客户端的cookie支持。cookie的作用就是为了解决HTTP协议无状态的缺陷所作的努力。  正统的cookie分发是通过扩展HTTP协议来实现的，服务器通过在HTTP的响应头中加上一行特殊的指示以提示浏览器按照指示生成相应的cookie。然而纯粹的客户端脚本如JavaScript也可以生成cookie。而cookie的使用是由浏览器按照一定的原则在后台自动发送给服务器的。浏览器检查所有存储的cookie，如果某个cookie所声明的作用范围大于等于将要请求的资源所在的位置，则把该cookie附在请求资源的HTTP请求头上发送给服务器。  cookie的内容主要包括：名字，值，过期时间，路径和域。路径与域一起构成cookie的作用范围。若不设置过期时间，则表示这个cookie的生命期为浏览器会话期间，关闭浏览器窗口，cookie就消失。这种生命期为浏览器会话期的cookie被称为会话cookie。会话cookie一般不存储在硬盘上而是保存在内存里，当然这种行为并不是规范规定的。若设置了过期时间，浏览器就会把cookie保存到硬盘上，关闭后再次打开浏览器，这些cookie仍然有效直到超过设定的过期时间。存储在硬盘上的cookie可以在不同的浏览器进程间共享，比如两个IE窗口。而对于保存在内存里的cookie，不同的浏览器有不同的处理方式。  而session机制采用的是一种在服务器端保持状态的解决方案。同时我们也看到，由于采用服务器端保持状态的方案在客户端也需要保存一个标识，所以session机制可能需要借助于cookie机制来达到保存标识的目的。而session提供了方便管理全局变量的方式 。  session是针对每一个用户的，变量的值保存在服务器上，用一个sessionID来区分是哪个用户session变量,这个值是通过用户的浏览器在访问的时候返回给服务器，当客户禁用cookie时，这个值也可能设置为由get来返回给服务器。  就安全性来说：当你访问一个使用session 的站点，同时在自己机子上建立一个cookie，建议在服务器端的session机制更安全些，因为它不会任意读取客户存储的信息。  session机制 session机制是一种服务器端的机制，服务器使用一种类似于散列表的结构（也可能就是使用散列表）来保存信息。当程序需要为某个客户端的请求创建一个session时，服务器首先检查这个客户端的请求里是否已包含了一个session标识（称为session id），如果已包含则说明以前已经为此客户端创建过session，服务器就按照session id把这个session检索出来使用（检索不到，会新建一个），如果客户端请求不包含session id，则为此客户端创建一个session并且生成一个与此session相关联的session id，session id的值应该是一个既不会重复，又不容易被找到规律以仿造的字符串，这个session id将被在本次响应中返回给客户端保存。  保存这个session id的方式可以采用cookie，这样在交互过程中浏览器可以自动的按照规则把这个标识发挥给服务器。一般这个cookie的名字都是类似于SEEESIONID。但cookie可以被人为的禁止，则必须有其他机制以便在cookie被禁止时仍然能够把session id传递回服务器。  经常被使用的一种技术叫做URL重写，就是把session id直接附加在URL路径的后面。还有一种技术叫做表单隐藏字段。就是服务器会自动修改表单，添加一个隐藏字段，以便在表单提交时能够把session id传递回服务器。  Cookie与Session都能够进行会话跟踪，但是完成的原理不太一样。普通状况下二者均能够满足需求，但有时分不能够运用Cookie，有时分不能够运用Session。下面经过比拟阐明二者的特性以及适用的场所。  1 .存取方式的不同Cookie中只能保管ASCII字符串，假如需求存取Unicode字符或者二进制数据，需求先进行编码。Cookie中也不能直接存取Java对象。若要存储略微复杂的信息，运用Cookie是比拟艰难的。  而Session中能够存取任何类型的数据，包括而不限于String、Integer、List、Map等。Session中也能够直接保管Java Bean乃至任何Java类，对象等，运用起来十分便当。能够把Session看做是一个Java容器类。  2 .隐私策略的不同Cookie存储在客户端阅读器中，对客户端是可见的，客户端的一些程序可能会窥探、复制以至修正Cookie中的内容。而Session存储在服务器上，对客户端是透明的，不存在敏感信息泄露的风险。  假如选用Cookie，比较好的方法是，敏感的信息如账号密码等尽量不要写到Cookie中。最好是像Google、Baidu那样将Cookie信息加密，提交到服务器后再进行解密，保证Cookie中的信息只要本人能读得懂。而假如选择Session就省事多了，反正是放在服务器上，Session里任何隐私都能够有效的保护。  3.有效期上的不同使用过Google的人都晓得，假如登录过Google，则Google的登录信息长期有效。用户不用每次访问都重新登录，Google会持久地记载该用户的登录信息。要到达这种效果，运用Cookie会是比较好的选择。只需要设置Cookie的过期时间属性为一个很大很大的数字。  由于Session依赖于名为JSESSIONID的Cookie，而Cookie JSESSIONID的过期时间默许为–1，只需关闭了阅读器该Session就会失效，因而Session不能完成信息永世有效的效果。运用URL地址重写也不能完成。而且假如设置Session的超时时间过长，服务器累计的Session就会越多，越容易招致内存溢出。  4.服务器压力的不同Session是保管在服务器端的，每个用户都会产生一个Session。假如并发访问的用户十分多，会产生十分多的Session，耗费大量的内存。因而像Google、Baidu、Sina这样并发访问量极高的网站，是不太可能运用Session来追踪客户会话的。  而Cookie保管在客户端，不占用服务器资源。假如并发阅读的用户十分多，Cookie是很好的选择。关于Google、Baidu、Sina来说，Cookie或许是唯一的选择。  5 .浏览器支持的不同Cookie是需要客户端浏览器支持的。假如客户端禁用了Cookie，或者不支持Cookie，则会话跟踪会失效。关于WAP上的应用，常规的Cookie就派不上用场了。  假如客户端浏览器不支持Cookie，需要运用Session以及URL地址重写。需要注意的是一切的用到Session程序的URL都要进行URL地址重写，否则Session会话跟踪还会失效。关于WAP应用来说，Session+URL地址重写或许是它唯一的选择。  假如客户端支持Cookie，则Cookie既能够设为本浏览器窗口以及子窗口内有效（把过期时间设为–1），也能够设为一切阅读器窗口内有效（把过期时间设为某个大于0的整数）。但Session只能在本阅读器窗口以及其子窗口内有效。假如两个浏览器窗口互不相干，它们将运用两个不同的Session。（IE8下不同窗口Session相干）  6.跨域支持上的不同Cookie支持跨域名访问，例如将domain属性设置为“.biaodianfu.com”，则以“.biaodianfu.com”为后缀的一切域名均能够访问该Cookie。跨域名Cookie如今被普遍用在网络中，例如Google、Baidu、Sina等。而Session则不会支持跨域名访问。Session仅在他所在的域名内有效。  仅运用Cookie或者仅运用Session可能完成不了理想的效果。这时应该尝试一下同时运用Cookie与Session。Cookie与Session的搭配运用在实践项目中会完成很多意想不到的效果。', 'php--基础知识', '1', '6', '1', '2018-07-09 06:45:24', 'http://www.aichengxu.com/php/407204.htm');
INSERT INTO `news` VALUES ('2', 'MySQL 5.7 常用操作', 'u=768112361,3951236680&fm=27&gp=0.jpg', '1、登录，查询数据  mysql -u root -p show databases; use information_schema; show tables; desc TABLES; select * from TABLES;   2、修改密码  -- 登录后执行 SET PASSWORD = PASSWORD(\'newpassword\');   3、mysql根据配置文件会限制server接受的数据包大小。有时候大的插入和更新会受max_allowed_packet 参数限制，导致写入或者更新失败。  -- 1. show VARIABLES like \'%max_allowed_packet%\'; -- 2. set global max_allowed_packet = 2*1024*1024*10; -- 3. 重启mysql -- 4. show VARIABLES like \'%max_allowed_packet%\';   4、mysql启停  #MySQL服务器开启，关闭，重启，查看状态   /etc/init.d/mysql start   /etc/init.d/mysql stop   /etc/init.d/mysql restart   /etc/init.d/mysql status   5、将字符编码设置为UTF-8  cd /etc/mysql/mysql.conf.d vi mysqld.cnf  	#在[mysqld]标签下，增加服务器端的字符编码,增加[client]修改客户端编码 	[mysqld] 	character-set-server=utf8 	collation-server=utf8_general_ci 	[client] 	default-character-set=utf8 /etc/init.d/mysql restart   6、让MySQL服务器被远程访问  cd /etc/mysql/mysql.conf.d vi mysqld.cnf  	#修改bind-address127.0.0.1为0.0.0.0 	#bind-address            = 0.0.0.0 mysql -u root -p 	mysql> GRANT ALL PRIVILEGES ON *.* TO root@\"%\" IDENTIFIED BY \"ROOT\";  --ROOT为密码 	mysql> flush privileges; /etc/init.d/mysql restart   7、建立用户  # 新建book用户，密码为book，允许book可以远程访问abc数据库，授权book对abc进行所有数据库 mysql> GRANT ALL ON abc.* to book@\'%\' IDENTIFIED BY \'book\'; #允许book可以本地访问abc数据库，授权book对abc进行所有数据库 mysql> GRANT ALL ON abc.* to book@localhost IDENTIFIED BY \'book\';   8、改变数据存储位置  cd /etc/mysql/mysql.conf.d/ vi mysqld.cnf 	[mysqld] 	datadir         = /var/lib/mysql', 'MYSQL--基础知识', '2', '6', '1', '2018-07-09 06:48:41', 'http://www.aichengxu.com/mysql/24672911.htm');
INSERT INTO `news` VALUES ('3', 'MYSQL索引区别', 'u=2260926939,1550208231&fm=27&gp=0.jpg', '（1）PRIMARY：主键索引。索引列唯一且不能为空；一张表只能有一个主键索引（主键索引通常在建表的时候就指定）  CREATE TABLE T_USER(ID INT NOT NULL,USERNAME VARCHAR(16) NOT NULL,PRIMARY KEY(ID))  　　（2）NORMAL：普通索引。索引列没有任何限制；      建表时指定      CREATE TABLE T_USER(ID INT NOT NULL,USERNAME VARCHAR(16) NOT NULL,INDEX USERNAME_INDEX(USERNAME(16))) //给列USERNAME建普通索引USERNAME_INDEX      ALTER语句指定      ALTER TABLE T_USER ADD INDEX U_INDEX (USERNAME) //给列USERNAME建普通索引 U_INDEX      删除索引      DROP INDEX U_INDEX ON t_user  //删除表t_user中的索引U_INDEX      （3）UNIQUE：唯一索引。索引列的值必须是唯一的，但允许有空；     建表时指定      CREATE TABLE t_user(ID INT NOT NULL,USERNAME VARCHAR(16) NOT NULL,UNIQUE U_INDEX(USERNAME)) //给列USERNAME添加唯一索引T_USER      ALTER语句指定      ALTER TABLE t_user ADD UNIQUE u_index(USERNAME) //给列T_USER添加唯一索引u_index      删除索引      DROP INDEX U_INDEX ON t_user  　　（4）FULLTEXT：全文搜索的索引。FULLTEXT 用于搜索很长一篇文章的时候，效果最好。用在比较短的文本，如果就一两行字的，普通的 INDEX 也可以。索引的新建和删除和上面一致，这里不再列举... 组合索引（复合索引）　', 'MYSQL--索引', '1', '6', '1', '2018-07-09 06:50:03', 'http://www.aichengxu.com/mysql/24672659.htm');
INSERT INTO `news` VALUES ('4', '那么还有1元呢', '8.jpg', '有三个人去住旅馆，住三间房，每间房10元，于是他们一共付给老板30元，第二天，老板觉得三间房只需要25元就够了，于是叫服务生退回5元给三位客人，谁知服务生贪心，只退回每人1元，自己偷偷拿了2元，这样一来便等于那三位客人每人各花了九元，于是三个人一共花了27元，再加上服务生独吞了2元，总共是29元，可是当初他们三个人一共付出30元，那么还有1元呢？', '休闲娱乐篇', '1', '7', '0', '2018-07-09 08:03:54', 'https://www.zbyw.cn/9277.html');
INSERT INTO `news` VALUES ('5', '整蛊语录大收集', '9.jpg', '1、又想起那段纯真岁月，记得有次我悠闲地躺在草地上，看着蓝蓝的天上白云飘。你温柔地陪在我身边，深情地看着我，偶尔在我耳边低语，说：咩-----  2、成为一个顶尖设计师，曾经是无数人的梦想，而你我想应该是最完美的一个，论速度论新颖程度绝对属第一，一晚上就设计一张。好了别看了，快去晒被子吧！  3、我认识的你是最美丽滴，胖乎乎的身材是很可爱滴，爱吃肉的习惯是大家都知道滴，节俭的个性是值得表扬滴。但是每次把碗里的饭都舔干净是没有必要滴。  4、万里无云的天空，溪水哗啦啦流；路边小草迎风摆，花儿更娇美；倾听自然的声音，心情是如此美妙。可是一切却被你瞬间破坏掉。下次放屁拜托选好时间！  5、别驻足：梦想不停追逐；别认输：熬过黑夜有日出；路很苦：汗水是美丽祝福；要记住：成功就在下一步。迈大步，耶，掉坑里了！  6、好男儿志在沙场，一副望远镜，锁定敌人的动向。尽管这个愿望已落空，你仍然拿着望远镜无限憧憬着。。。直到有一天对面楼的姑娘大骂：看什么看？臭流氓！  7、我喜欢抽烟，你喜欢抽风；我喜欢花钱，你喜欢赚钱；我喜欢看笑话，你喜欢闹笑话；别管咱俩啥关系，短信就发给有缘的。  8、我最近可惨了，去奥巴马家擦玻璃、普京家洗碗，好不容易挣到一毛钱，没舍得吃穿，就为发条短信告诉你：近来天冷，多穿衣服！  9、特意为你挖了一个矿，里面有：金榜提名，心心相银，铜心永在，铝战铝胜，钾庭幸福，煤有烦恼，钨忧钨虑，铅途无量！  10、坦白说，我很喜欢你，喜欢你的眼神，快乐的神情，走路的姿态，撒娇的可爱，甚至你睡觉的样子我都着迷，可最让我生气的是，你不逮耗子还老掉毛！  11、我在上面，她在下面。我很想要，她更是垂涎三尺。后来......我很快乐，她很痛。答案：钓鱼。  12、其实有时候你可以把手机关机，退出社交软件，也别登录微博，好好享受一下这份安宁，几天后再把这些打开来看，那时候你会发现：根！本！没！人！联！系！你！  13、神啊！请替我送一个西瓜给那些忘了我，不给我打电话，不给我发短信，不惦记我的家伙们，祝他们吃得饱饱，然后走路踩到西瓜皮。。。  14、林中落英缤纷，白衣胜雪的我屈膝而坐，轻抚瑶琴，你静立一旁，是我惟一的知音。于是，你我成就一段千古流传的佳话—对牛弹琴。。。  15、在人的一生中，人生就是一场经营，有的人经营感情，有的人经营利益，有的人经营幸福，而有的人经营阴谋。哥们，你牛，你经营“吹牛”。', '休闲娱乐篇', '2', '7', '0', '2018-07-09 08:04:59', 'https://www.zbyw.cn/9169.html');
INSERT INTO `news` VALUES ('6', '夕阳下的古城', '5.jpeg', '	提起古城，总给人一种庄重、肃穆的感触来，这竟使凡与其有所牵连的词汇也散发出了一股宁谧、安详的色调，让人肃然起敬。  襄阳原本也是一座古城。十几年前，我来到这座城市，当时给我留下的最初印象是单一、乏味，甚至有些惨淡。但后来对他有了了解，并且渐渐觉得他是可爱的、挺拔的，不尽然只是落寞，至于现在的我对古襄阳有着一种特别的崇敬之情，而且这种情感还夹杂着些许无奈，久久无法释怀。  十几年前的襄阳是古城墙围起来的。走在全国首指最宽阔的护城河旁，河岸是较宽阔的，杂草很多，长得十分肆意，有时站在城墙对面，却也不知道他的存在。筑墙用的材料是那种偌大厚实的青砖，浸透了风雨寒露，显得潮湿、沉稳，给人一种悲壮的沧桑感。凹凸不平的表面密布着青苔，掩盖了粗糙的纹理，而且在油绿的苔衣中隐约可见砖隙间寥落下来的些许苍黄，又让人顿生一种对岁月的敬畏之情。在古城墙的半空破碎处，有时竟会滋生出一簇簇杂草，并且还不时扯出几滴娇艳的野花，昂着头，旁若无人似的，静静地打量着往来的风云。站远望去，映着昏黄的斜阳，那黝黑强壮的肢体便像是在阴蒙中划出的一道飞虹，和着远山健拔的轮廓，显得格外粗犷。  可最近几年，随着城市建设的迅猛发展，古城墙也和城区破屋一样，恍若一夜间全都坍圮，还未及提防，全都没了踪影，被戕害得不见了形骸—真有些古战场血流漂杵时的悲切。伴着古城墙的段段消失，记忆也似乎变得有些落寞，忐忑间觉得失去了什么。文明发展的成果，是一列列严整化一的墙，对此，古城墙也不例外。在其原有的位置上，迅速搭起了一座富于现代化气息的建筑：块块亮灰色的小方砖镶嵌其中；笔直的走势挑拣不出一丁点儿瑕疵。仰望过去，有棱有角的沿边，以及蔓布在墙群上赏心悦目的统一感，便不禁让人赞叹起现代化工具的强大威力。走在繁华拥绕、秩序井然的城外，虽则视线里一派和谐，但潜意识里却总觉得这并非真正意义的城墙，似乎少了什么，很像是被雕琢了的工艺品，又仿佛一位中国的绅士，都不怎么平易近人。  身临江岸，静静地望着三千江水滚滚东流；朔风呼啸，卷起层层浪花，粼闪遄往间，似乎迭现出历史的一景一幕和那非凡岁月里的硝烟与战火；身后，是庄重陆离的临汉门，在风化的墙壁上，透露出的又何尝只是时间的交合与民族血肉的凝结？推古送今，无法更变的只有那无用而又不起眼的层层裂纹。  现如今，磨光的青石台阶已在这里销声匿迹，留下来的只有文明的繁华。襄阳，这座昔时的古城已改头换面，跻身于中国魅力城市之列，少有了兵家要塞应有的豪放，再也承受不起滚滚长江残阳西下的沉重了。或许，在推进与演替之中，被时光冲走的，不仅仅只是青石台阶上那块块暗淡而又毫无规则的斑渍。', '休闲娱乐篇', '1', '7', '0', '2018-07-09 08:08:41', 'https://www.zbyw.cn/8830.html');

-- ----------------------------
-- Table structure for photo
-- ----------------------------
DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo` (
  `pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_url` varchar(200) NOT NULL,
  `add_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of photo
-- ----------------------------
INSERT INTO `photo` VALUES ('1', '1.gif', '2018-07-09 07:36:13');
INSERT INTO `photo` VALUES ('2', '2.jpg', '2018-07-09 07:36:31');
INSERT INTO `photo` VALUES ('3', '3.jpeg', '2018-07-09 07:36:36');
INSERT INTO `photo` VALUES ('4', '4.jpeg', '2018-07-09 07:36:44');
INSERT INTO `photo` VALUES ('5', '5.jpeg', '2018-07-09 07:36:50');
INSERT INTO `photo` VALUES ('6', '6.jpg', '2018-07-09 07:36:56');
INSERT INTO `photo` VALUES ('7', '7.jpg', '2018-07-09 07:37:02');
INSERT INTO `photo` VALUES ('8', '8.jpg', '2018-07-09 07:37:09');
INSERT INTO `photo` VALUES ('9', '9.jpg', '2018-07-09 07:37:15');
