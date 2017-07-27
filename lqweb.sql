/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : lqweb

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-07-26 16:36:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `ad_name` char(50) NOT NULL DEFAULT '' COMMENT '后台登录名称',
  `password` varchar(80) NOT NULL DEFAULT '' COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cg_name` varchar(60) NOT NULL DEFAULT '' COMMENT '分类名称',
  `fid` int(10) NOT NULL DEFAULT '0' COMMENT '父类ID',
  `level` tinyint(3) NOT NULL DEFAULT '0' COMMENT '等级',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '服装', '0', '1');
INSERT INTO `category` VALUES ('2', '手机', '0', '1');
INSERT INTO `category` VALUES ('3', '女装', '1', '2');
INSERT INTO `category` VALUES ('4', '男装', '1', '2');
INSERT INTO `category` VALUES ('5', '连衣裙', '3', '3');
INSERT INTO `category` VALUES ('6', '短裤', '3', '3');
INSERT INTO `category` VALUES ('7', '男士T恤', '4', '3');
INSERT INTO `category` VALUES ('8', '男士牛仔', '4', '3');
INSERT INTO `category` VALUES ('9', '荣耀', '2', '2');
INSERT INTO `category` VALUES ('10', 'OPPO', '2', '2');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `goods_name` varchar(100) NOT NULL DEFAULT '' COMMENT '商品名称',
  `categoryid` int(10) NOT NULL DEFAULT '0' COMMENT '分类ID',
  `goods_price` double NOT NULL DEFAULT '0' COMMENT '商品价格',
  `goods_img` varchar(100) NOT NULL DEFAULT '' COMMENT '商品图片',
  `is_show` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否显示',
  `goods_time` int(18) NOT NULL DEFAULT '0' COMMENT '商品时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
