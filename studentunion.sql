/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50713
 Source Host           : localhost:3306
 Source Schema         : studentunion

 Target Server Type    : MySQL
 Target Server Version : 50713
 File Encoding         : 65001

 Date: 25/11/2018 01:37:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth
-- ----------------------------
DROP TABLE IF EXISTS `auth`;
CREATE TABLE `auth` (
  `auth_id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(32) DEFAULT NULL,
  `auth_pid` varchar(32) DEFAULT NULL,
  `auth_c` varchar(64) DEFAULT NULL,
  `auth_a` varchar(64) DEFAULT NULL,
  `auth_path` varchar(128) DEFAULT NULL,
  `auth_level` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for auth_group
-- ----------------------------
DROP TABLE IF EXISTS `auth_group`;
CREATE TABLE `auth_group` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `title` char(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `rules` char(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_group
-- ----------------------------
BEGIN;
INSERT INTO `auth_group` VALUES (1, '全部权限', 1, '1,3,6,29,31,34,35,36,37,38,39');
INSERT INTO `auth_group` VALUES (2, '普通权限', 1, '1,3,6,34,35,36');
COMMIT;

-- ----------------------------
-- Table structure for auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `auth_group_access`;
CREATE TABLE `auth_group_access` (
  `uid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `group_id` mediumint(8) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_group_access
-- ----------------------------
BEGIN;
INSERT INTO `auth_group_access` VALUES (1, 1);
INSERT INTO `auth_group_access` VALUES (10, 2);
COMMIT;

-- ----------------------------
-- Table structure for auth_rule
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
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
BEGIN;
INSERT INTO `auth_rule` VALUES (1, 'Admin/Index/index', '后台首页', 1, '', 0);
INSERT INTO `auth_rule` VALUES (3, 'Admin/Index/main', '主界面', 1, '', 1);
INSERT INTO `auth_rule` VALUES (6, 'Admin/User/listUser', '用户管理', 1, '', 7);
INSERT INTO `auth_rule` VALUES (29, 'Admin/Auth/listRule', '权限列表', 1, '', 10);
INSERT INTO `auth_rule` VALUES (30, 'Admin/Auth/listGroup', '用户组列表', 1, '', 10);
INSERT INTO `auth_rule` VALUES (31, 'Admin/Auth/listAdmin', '管理员列表', 1, '', 10);
INSERT INTO `auth_rule` VALUES (34, 'Admin/User/add', '用户添加', 1, '', 7);
INSERT INTO `auth_rule` VALUES (35, 'Admin/User/edit', '用户编辑', 1, '', 7);
INSERT INTO `auth_rule` VALUES (36, 'Admin/User/delete', ' 用户删除', 1, '', 7);
INSERT INTO `auth_rule` VALUES (37, 'Admin/Auth/addAdmin', '', 1, '', 10);
INSERT INTO `auth_rule` VALUES (38, 'Admin/Auth/editAdmin', '', 1, '', 10);
INSERT INTO `auth_rule` VALUES (39, 'Admin/Auth/delAdmin', '', 1, '', 10);
COMMIT;

-- ----------------------------
-- Table structure for manager
-- ----------------------------
DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `mg_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `mg_admin` varchar(150) DEFAULT NULL,
  `mg_password` varchar(150) DEFAULT NULL,
  `create_time` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`mg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of manager
-- ----------------------------
BEGIN;
INSERT INTO `manager` VALUES (1, 'admin', '123456', NULL);
INSERT INTO `manager` VALUES (10, 'zhangsan', '123456', '2018-11-24 22:47:35');
COMMIT;

-- ----------------------------
-- Table structure for studentinfo
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of studentinfo
-- ----------------------------
BEGIN;
INSERT INTO `studentinfo` VALUES (1, '121232', '学生会', '张三1', '1班', '男', '123456', '4561321', 'werwa@qq.com', '564313', '团员', '主席', '干部', '三好学生', '不错', '程序员', '2018-11-16', '2018-11-25 01:25:35');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
