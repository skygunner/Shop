/*
 * 鸿宇多用户商城 - 数据库
 * Created by PhpStorm.
 * User: Shadow
 * Date: 2016-05-08 0008
 * Time: 18:18
 * Http: www.hongyuvip.com
 */

USE shop;
SET NAMES utf-8;

DROP TABLE IF EXISTS hy_admin;
CREATE TABLE `hy_admin` (
`admin_id`  tinyint UNSIGNED NULL AUTO_INCREMENT COMMENT '管理员自增id编号' ,
`adminname`  varchar(30) NOT NULL COMMENT '管理员用户名' ,
`password`  char(32) NOT NULL COMMENT '密码' ,
`email`  varchar(30) NOT NULL COMMENT '邮箱' ,
`mobile_phone`  varchar(11) NOT NULL COMMENT '手机号' ,
`question`  varchar(30) NOT NULL COMMENT '密保提问' ,
`answer`  varchar(30) NOT NULL COMMENT '密保回答' ,
`reg_time`  timestamp NOT NULL COMMENT '注册时间' ,
`last_login`  int(11) NOT NULL COMMENT '最后一次登录时间' ,
`status`  tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否可用;0否;1是' ,
PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;