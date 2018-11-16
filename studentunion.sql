/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : studentunion

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-11-16 00:36:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) DEFAULT '',
  `pid` mediumint(9) NOT NULL COMMENT '父权限ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
INSERT INTO `auth_rule` VALUES ('1', 'Admin/Index/index', '后台首页', '1', '', '0');
INSERT INTO `auth_rule` VALUES ('2', 'Admin/Hospital/listHos', '医院管理', '1', '', '8');
INSERT INTO `auth_rule` VALUES ('3', 'Admin/Index/main', '主界面', '1', '', '1');
INSERT INTO `auth_rule` VALUES ('4', 'Admin/Relative/listRela', '亲友管理', '1', '', '7');
INSERT INTO `auth_rule` VALUES ('5', 'Admin/HistoryVis/listHis', '历史就诊', '1', '', '7');
INSERT INTO `auth_rule` VALUES ('6', 'Admin/User/listUser', '用户管理', '1', '', '7');
INSERT INTO `auth_rule` VALUES ('7', 'Admin/Nav/user', '用户管理', '1', '', '0');
INSERT INTO `auth_rule` VALUES ('8', 'Admin/Nav/hospital', '医院管理', '1', '', '0');
INSERT INTO `auth_rule` VALUES ('9', 'Admin/Nav/config', '功能管理', '1', '', '0');
INSERT INTO `auth_rule` VALUES ('10', 'Admin/Nav/auth', '权限控制', '1', '', '0');
INSERT INTO `auth_rule` VALUES ('11', 'Admin/Hospital/addHos', '添加医院', '1', '', '2');
INSERT INTO `auth_rule` VALUES ('12', 'Admin/Hospital/edit', '修改医院', '1', '', '2');
INSERT INTO `auth_rule` VALUES ('13', 'Admin/Hospital/del', '删除医院', '1', '', '2');
INSERT INTO `auth_rule` VALUES ('24', 'Admin/Department/edit', '修改科室', '1', '', '19');
INSERT INTO `auth_rule` VALUES ('25', 'Admin/Department/delete', '删除科室', '1', '', '19');
INSERT INTO `auth_rule` VALUES ('19', 'Admin/Department/listDep', '科室管理', '1', '', '8');
INSERT INTO `auth_rule` VALUES ('23', 'Admin/Department/add', '添加科室', '1', '', '19');
INSERT INTO `auth_rule` VALUES ('26', 'Admin/Knowledge/listKnow', '健康知识', '1', '', '9');
INSERT INTO `auth_rule` VALUES ('27', 'Admin/Feedback/listAnalyze', '统计分析', '1', '', '9');
INSERT INTO `auth_rule` VALUES ('28', 'Admin/Feedback/listFeedb', '意见反馈', '1', '', '9');
INSERT INTO `auth_rule` VALUES ('29', 'Admin/Auth/listRule', '权限列表', '1', '', '10');
INSERT INTO `auth_rule` VALUES ('30', 'Admin/Auth/listGroup', '用户组列表', '1', '', '10');
INSERT INTO `auth_rule` VALUES ('31', 'Admin/Auth/listAdmin', '管理员列表', '1', '', '10');
INSERT INTO `auth_rule` VALUES ('34', '', '', '1', '', '1');

-- ----------------------------
-- Table structure for `manager`
-- ----------------------------
DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `mg_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `mg_admin` varchar(150) DEFAULT NULL,
  `mg_password` varchar(150) DEFAULT NULL,
  `create_time` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`mg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of manager
-- ----------------------------
INSERT INTO `manager` VALUES ('1', 'admin', '123456', null);
INSERT INTO `manager` VALUES ('8', 'wangzhe', '123', '2017-08-14 11:50:58');
INSERT INTO `manager` VALUES ('9', 'guest', 'guest', '2017-07-09 16:25:36');

-- ----------------------------
-- Table structure for `studentinfo`
-- ----------------------------
DROP TABLE IF EXISTS `studentinfo`;
CREATE TABLE `studentinfo` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `studentnum` varchar(255) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `weixin` varchar(255) DEFAULT NULL,
  `political` varchar(255) DEFAULT NULL,
  `nowposition` varchar(255) DEFAULT NULL,
  `oldposition` varchar(255) DEFAULT NULL,
  `honour` varchar(255) DEFAULT NULL,
  `opinion` text,
  `work` text,
  `inserttime` varchar(255) DEFAULT NULL,
  `updatetime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `num` (`studentnum`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of studentinfo
-- ----------------------------
INSERT INTO `studentinfo` VALUES ('1', '123456', '学生会', '张三', '1班', '男', '123456', '4561321', 'werwa@qq.com', '564313', '团员', '主席', '干部', '三好学生', '不错', '程序员', '2018-11-16', '2018-11-17');
