-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 3 月 25 日 14:35
-- サーバのバージョン: 5.0.96-community
-- PHP のバージョン: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `te21130_AC`
--
CREATE DATABASE IF NOT EXISTS `te21130_AC` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `te21130_AC`;

-- --------------------------------------------------------

--
-- テーブルの構造 `folder`
--

DROP TABLE IF EXISTS `folder`;
CREATE TABLE IF NOT EXISTS `folder` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(200) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='�ե������' AUTO_INCREMENT=57 ;

--
-- テーブルのデータのダンプ `folder`
--

INSERT INTO `folder` (`id`, `name`) VALUES
(8, '非通知'),
(9, 'セントラルＳＨ'),
(10, 'AC東京'),
(11, 'AC福岡'),
(12, 'KLS貴重品室'),
(13, 'KLS特殊輸送営業所'),
(14, '近鉄航空配送'),
(15, 'KWEニコン営業所'),
(16, 'KWE横浜営業所'),
(17, 'KWE熊本営業所'),
(18, 'KWE鹿児島営業所'),
(19, 'KWE港営業所'),
(20, 'KWE車輌課'),
(22, 'KWE中央営業所'),
(23, 'KWE東京ロジスティクス営業所'),
(24, 'KWE品川営業所'),
(25, 'KWE福岡営業所'),
(26, 'KWK札幌営業所'),
(27, 'KWK函館営業所'),
(28, 'セキトランスポート'),
(29, 'ビーエル商事株式会社'),
(30, '岡田一夫'),
(31, '株式会社 杉山会計'),
(32, '株式会社ビートゥルー'),
(33, '㈱阪急阪神エクスプレス'),
(34, '岩崎正'),
(35, '宮本　将光'),
(36, '京セラｺﾐｭﾆｹｰｼｮﾝｼｽﾃﾑｽﾞ㈱'),
(37, '近配　関東テクニカルセンター'),
(38, '九航・大分事業所'),
(39, '九航・中津営業所'),
(40, '九航・日出営業所'),
(41, '高坂　正昇'),
(42, '山崎　哲也'),
(43, '小関トランスポート'),
(44, '新井　誠'),
(45, '石田　命'),
(46, '大矢　徹夫'),
(47, '第一貨物株式会社'),
(48, '土師　英一'),
(49, '日軽急送'),
(50, '堀内昭男'),
(51, '新大津運輸'),
(52, '鈴木　茂雄'),
(54, '岡田　正巳'),
(55, 'KWE原木分室'),
(56, 'TEST');

-- --------------------------------------------------------

--
-- テーブルの構造 `jyusho`
--

DROP TABLE IF EXISTS `jyusho`;
CREATE TABLE IF NOT EXISTS `jyusho` (
  `ID` int(11) NOT NULL auto_increment,
  `JYUSHO` text collate utf8_unicode_ci NOT NULL,
  `BIKOU` text collate utf8_unicode_ci,
  `CREATE_DATE` datetime NOT NULL,
  `UPDATE_DATE` datetime NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='住所マスタ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `ka`
--

DROP TABLE IF EXISTS `ka`;
CREATE TABLE IF NOT EXISTS `ka` (
  `id` int(10) NOT NULL auto_increment,
  `ka_name1` varchar(200) character set utf8 collate utf8_bin NOT NULL COMMENT '会社',
  `ka_name2` varchar(200) character set utf8 collate utf8_bin NOT NULL COMMENT '様',
  `ka_tel` varchar(15) character set utf8 collate utf8_bin NOT NULL,
  `ka_add1` varchar(100) character set utf8 collate utf8_bin NOT NULL COMMENT '都道府県',
  `ka_add2` varchar(200) character set utf8 collate utf8_bin NOT NULL COMMENT '町',
  `ka_add3` varchar(200) character set utf8 collate utf8_bin default NULL COMMENT 'ビル',
  `ka_post` int(7) NOT NULL,
  `from_id` varchar(10) NOT NULL,
  `creat_date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `kihon`
--

DROP TABLE IF EXISTS `kihon`;
CREATE TABLE IF NOT EXISTS `kihon` (
  `id` int(5) NOT NULL auto_increment,
  `FileType` varchar(200) collate utf8_unicode_ci NOT NULL,
  `FilePath` varchar(500) collate utf8_unicode_ci NOT NULL,
  `FileMovePath` varchar(500) collate utf8_unicode_ci NOT NULL,
  `Url` varchar(500) collate utf8_unicode_ci NOT NULL,
  `UserID` varchar(500) collate utf8_unicode_ci NOT NULL,
  `Pass` varchar(500) collate utf8_unicode_ci NOT NULL,
  `UpTime` int(10) NOT NULL,
  `ServerPath` varchar(500) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='���ܾ���' AUTO_INCREMENT=2 ;

--
-- テーブルのデータのダンプ `kihon`
--

INSERT INTO `kihon` (`id`, `FileType`, `FilePath`, `FileMovePath`, `Url`, `UserID`, `Pass`, `UpTime`, `ServerPath`) VALUES
(1, '.pdf', 'C:\\Program Files\\Intercom\\MyFaxV9\\FaxSave', 'C:\\Program Files\\Intercom\\MyFaxV9\\save', 'server40.instantssl.co.jp', 'te21130', 'bitaodayo', 10000, 'public_html/pdf/');

-- --------------------------------------------------------

--
-- テーブルの構造 `mail`
--

DROP TABLE IF EXISTS `mail`;
CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(500) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='�᡼�륢�ɥ쥹' AUTO_INCREMENT=8 ;

--
-- テーブルのデータのダンプ `mail`
--

INSERT INTO `mail` (`id`, `name`) VALUES
(4, 'bitaodayo@gmail.com'),
(5, 'accexp@account-exp.co.jp'),
(6, 'masashi.y@account-exp.co.jp'),
(7, 'donaldzj120@gmail.com');

-- --------------------------------------------------------

--
-- テーブルの構造 `mission`
--

DROP TABLE IF EXISTS `mission`;
CREATE TABLE IF NOT EXISTS `mission` (
  `id` int(10) NOT NULL auto_increment,
  `mission_id` varchar(200) character set utf8 collate utf8_bin NOT NULL,
  `mission_id2` varchar(20) character set utf8 collate utf8_bin NOT NULL default 'FAX' COMMENT '任務ID２',
  `fenpei_id` varchar(40) character set utf8 collate utf8_bin NOT NULL,
  `kaisha_id` varchar(40) character set utf8 collate utf8_bin NOT NULL,
  `zhixing_id` varchar(40) character set utf8 collate utf8_bin NOT NULL,
  `mission_status` int(1) NOT NULL,
  `adm_status` int(1) NOT NULL default '1',
  `del_status` int(1) NOT NULL,
  `recv_date` datetime NOT NULL,
  `fenpei_date` datetime NOT NULL,
  `over_date` datetime NOT NULL,
  `filename` varchar(200) character set utf8 collate utf8_bin NOT NULL,
  `fileover` varchar(200) character set utf8 collate utf8_bin NOT NULL,
  `from_id` varchar(40) character set utf8 collate utf8_bin NOT NULL,
  `memo` varchar(200) character set utf8 collate utf8_bin NOT NULL,
  `siryo` varchar(200) character set utf8 collate utf8_bin default NULL COMMENT '資料',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41556 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `oshirase`
--

DROP TABLE IF EXISTS `oshirase`;
CREATE TABLE IF NOT EXISTS `oshirase` (
  `ID` int(11) NOT NULL auto_increment,
  `Title` varchar(500) collate utf8_unicode_ci NOT NULL,
  `Body` text collate utf8_unicode_ci NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Create_user` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='���Τ餻' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `sagyo`
--

DROP TABLE IF EXISTS `sagyo`;
CREATE TABLE IF NOT EXISTS `sagyo` (
  `id` int(10) NOT NULL auto_increment,
  `year` int(4) NOT NULL,
  `month` int(2) NOT NULL,
  `day` int(2) NOT NULL,
  `sagyo_id1` varchar(20) collate utf8_bin NOT NULL COMMENT '作業ID１',
  `sagyo_id2` varchar(20) collate utf8_bin NOT NULL COMMENT '作業ID２',
  `ka_tel` varchar(15) collate utf8_bin NOT NULL COMMENT '荷受人電話',
  `ka_post` varchar(7) collate utf8_bin default NULL COMMENT '&#65533;&#65533;',
  `sagyo_date` varchar(10) collate utf8_bin NOT NULL,
  `sagyo_time` varchar(10) collate utf8_bin default NULL,
  `ka_name1` varchar(100) collate utf8_bin NOT NULL COMMENT '荷受人１',
  `ka_name2` varchar(100) collate utf8_bin NOT NULL COMMENT '荷送人２',
  `ka_add1` varchar(200) collate utf8_bin NOT NULL COMMENT '住所１',
  `ka_add2` varchar(200) collate utf8_bin NOT NULL COMMENT '住所２',
  `ka_add3` varchar(200) collate utf8_bin NOT NULL COMMENT '住所３',
  `todoke_tel` varchar(15) collate utf8_bin NOT NULL COMMENT 'お届け電話',
  `todoke_add1` varchar(200) collate utf8_bin NOT NULL COMMENT 'お届け住所１',
  `todoke_add2` varchar(200) collate utf8_bin NOT NULL COMMENT 'お届け住所２',
  `todoke_add3` varchar(200) collate utf8_bin NOT NULL COMMENT 'お届け住所３',
  `todoke_name1` varchar(100) collate utf8_bin NOT NULL COMMENT 'お名前１',
  `todoke_name2` varchar(100) collate utf8_bin NOT NULL COMMENT 'お名前２',
  `todoke_post` varchar(7) collate utf8_bin default NULL COMMENT '&#65533;&#65533;&#65533;',
  `egyou` varchar(50) collate utf8_bin NOT NULL COMMENT '扱い営業所',
  `kwe_no` varchar(20) collate utf8_bin default NULL COMMENT 'ＫＷＥ原票Ｎｏ',
  `jikan` varchar(10) collate utf8_bin default NULL COMMENT '時間',
  `kosuu` int(5) default '0' COMMENT '個数',
  `jyuryo` int(8) default '0' COMMENT '重量',
  `kubun` varchar(10) collate utf8_bin default '0' COMMENT '区分',
  `kyori` int(10) default '0' COMMENT '距離',
  `kyori_kane` decimal(10,0) default '0' COMMENT '距離運賃',
  `futai_sagyo` varchar(100) collate utf8_bin default '0' COMMENT '付帯作業',
  `futai_kane` decimal(10,0) default '0' COMMENT '付帯料金',
  `kousoku` decimal(10,0) default '0' COMMENT '高速',
  `cyusya_kane` decimal(10,0) default '0' COMMENT '駐車料金',
  `kihon` decimal(10,0) default '0' COMMENT '基本料金',
  `gokei` decimal(10,0) default '0' COMMENT '運賃合計',
  `hinmei` varchar(50) collate utf8_bin default NULL,
  `hoken` decimal(10,0) default NULL,
  `ka` varchar(50) collate utf8_bin default NULL,
  `siji` varchar(50) collate utf8_bin default NULL,
  `bikou` varchar(200) collate utf8_bin default NULL COMMENT '備考',
  `tokki` varchar(200) collate utf8_bin default NULL COMMENT '特記事項',
  `hiccyaku1` varchar(10) collate utf8_bin default NULL,
  `sonota` varchar(100) collate utf8_bin default NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `from_id` varchar(40) collate utf8_bin default NULL,
  `flag` int(1) NOT NULL,
  `kingaku` decimal(10,0) default NULL,
  `hensin` int(1) NOT NULL,
  PRIMARY KEY  (`id`),
  FULLTEXT KEY `sagyo_id` (`sagyo_id1`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=244 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `seikyusyo`
--

DROP TABLE IF EXISTS `seikyusyo`;
CREATE TABLE IF NOT EXISTS `seikyusyo` (
  `id` int(10) NOT NULL auto_increment,
  `seikyu_hiduke` date NOT NULL,
  `seikyu_from` date NOT NULL,
  `seikyu_to` date NOT NULL,
  `seikyusaki_id` varchar(40) character set utf8 collate utf8_bin NOT NULL,
  `seikyusaki_name` varchar(200) character set utf8 collate utf8_bin NOT NULL,
  `seikyusaki_jyusyo` varchar(200) character set utf8 collate utf8_bin NOT NULL COMMENT '請求先住所',
  `seikyu_kingaku` decimal(10,0) NOT NULL COMMENT '請求金額',
  `file` varchar(200) character set utf8 collate utf8_bin NOT NULL COMMENT '請求書',
  `kazei` decimal(10,0) default '0' COMMENT '課税対象額',
  `hikazei_kosouku` decimal(10,0) default '0' COMMENT '非課税対象額（高速料）',
  `syohizei` decimal(10,0) default '0' COMMENT '消費税',
  `hikazei_cyusya` decimal(10,0) default '0' COMMENT '非課税対象額（駐車料）',
  `sihara_kubun` int(1) NOT NULL COMMENT '支払方法',
  `furikomisaki` varchar(200) character set utf8 collate utf8_bin NOT NULL COMMENT '振込先',
  `creatdate` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `shukkin`
--

DROP TABLE IF EXISTS `shukkin`;
CREATE TABLE IF NOT EXISTS `shukkin` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` varchar(40) character set utf8 collate utf8_bin NOT NULL,
  `shukkin_jikan` datetime NOT NULL,
  `taikin_jikan` datetime default NULL,
  `kinmu_jikan` int(10) default '0',
  `hiduke` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `todoke`
--

DROP TABLE IF EXISTS `todoke`;
CREATE TABLE IF NOT EXISTS `todoke` (
  `id` int(10) NOT NULL auto_increment,
  `todoke_name1` varchar(200) character set utf8 collate utf8_bin NOT NULL COMMENT '会社',
  `todoke_name2` varchar(200) character set utf8 collate utf8_bin NOT NULL COMMENT '様',
  `todoke_tel` varchar(15) character set utf8 collate utf8_bin NOT NULL,
  `todoke_add1` varchar(100) character set utf8 collate utf8_bin NOT NULL COMMENT '都道府県',
  `todoke_add2` varchar(200) character set utf8 collate utf8_bin NOT NULL COMMENT '町',
  `todoke_add3` varchar(200) character set utf8 collate utf8_bin default NULL COMMENT 'ビル',
  `todoke_post` int(7) NOT NULL,
  `from_id` varchar(10) NOT NULL,
  `creat_date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL auto_increment,
  `user_id` varchar(40) character set utf8 collate utf8_bin NOT NULL,
  `password` varchar(200) character set utf8 collate utf8_bin NOT NULL,
  `authority` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `jyouiID` int(10) NOT NULL,
  `lastlogindate` datetime NOT NULL,
  `username` varchar(40) character set utf8 collate utf8_bin NOT NULL,
  `email` varchar(100) character set utf8 collate utf8_bin NOT NULL,
  `user_phone1` varchar(15) character set utf8 collate utf8_bin NOT NULL,
  `user_phone2` varchar(15) character set utf8 collate utf8_bin NOT NULL,
  `user_info1` varchar(100) character set utf8 collate utf8_bin NOT NULL,
  `user_info2` varchar(100) character set utf8 collate utf8_bin NOT NULL,
  `car_info1` varchar(100) character set utf8 collate utf8_bin NOT NULL,
  `car_info2` varchar(100) character set utf8 collate utf8_bin NOT NULL,
  `bangou` varchar(7) character set utf8 collate utf8_unicode_ci default NULL,
  `renban` int(5) default '0',
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `authority`, `status`, `jyouiID`, `lastlogindate`, `username`, `email`, `user_phone1`, `user_phone2`, `user_info1`, `user_info2`, `car_info1`, `car_info2`, `bangou`, `renban`, `create_date`, `modify_date`) VALUES
(115, 'partner', 'Up54UKewUS/Cc4p+KRKGg0PuSo60+y3q9RVItU2hXGnxJFj2NDZxr67C5FEeYW9D3/HVJMab7U8KrnRxu83+hg==', 4, 0, 0, '2020-08-15 19:08:25', 'パートナー01', 'kawashima@webcrest.co.jp', '092-419-2372', '', '', '', '', '', '', 0, '2020-08-15 19:08:03', '0000-00-00 00:00:00'),
(116, 'client', 'jGFSSUG9Kil5rQeATPD3MshJ3qZuHI0Qz5BQQs1rAanNDCwXAMxDA4RkqaNmTZtU15+3iTERdnDwPGVkkpIMTg==', 3, 0, 0, '2020-08-16 13:50:44', '顧客01', 'kawashima@webcrest.co.jp', '092-419-2372', '', '', '', '', '', '', 5, '2020-08-15 19:09:36', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
