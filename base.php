/*
 Navicat Premium Data Transfer

 Source Server         : AppInnova
 Source Server Type    : MySQL
 Source Server Version : 80032
 Source Host           : rastreo.appinnova.digital:3306
 Source Schema         : gpst

 Target Server Type    : MySQL
 Target Server Version : 80032
 File Encoding         : 65001

 Date: 10/03/2023 09:38:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for databasechangelog
-- ----------------------------
DROP TABLE IF EXISTS `databasechangelog`;
CREATE TABLE `databasechangelog`  (
  `ID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `AUTHOR` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FILENAME` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `DATEEXECUTED` datetime NOT NULL,
  `ORDEREXECUTED` int NOT NULL,
  `EXECTYPE` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `MD5SUM` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `DESCRIPTION` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `COMMENTS` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `TAG` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `LIQUIBASE` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `CONTEXTS` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `LABELS` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `DEPLOYMENT_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for databasechangeloglock
-- ----------------------------
DROP TABLE IF EXISTS `databasechangeloglock`;
CREATE TABLE `databasechangeloglock`  (
  `ID` int NOT NULL,
  `LOCKED` bit(1) NOT NULL,
  `LOCKGRANTED` datetime NULL DEFAULT NULL,
  `LOCKEDBY` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_attributes
-- ----------------------------
DROP TABLE IF EXISTS `tc_attributes`;
CREATE TABLE `tc_attributes`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `type` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `attribute` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `expression` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_calendars
-- ----------------------------
DROP TABLE IF EXISTS `tc_calendars`;
CREATE TABLE `tc_calendars`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data` mediumblob NOT NULL,
  `attributes` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_commands
-- ----------------------------
DROP TABLE IF EXISTS `tc_commands`;
CREATE TABLE `tc_commands`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `type` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `textchannel` bit(1) NOT NULL DEFAULT b'0',
  `attributes` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_commands_queue
-- ----------------------------
DROP TABLE IF EXISTS `tc_commands_queue`;
CREATE TABLE `tc_commands_queue`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `deviceid` int NOT NULL,
  `type` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `textchannel` bit(1) NOT NULL DEFAULT b'0',
  `attributes` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_commands_queue_deviceid`(`deviceid`) USING BTREE,
  CONSTRAINT `fk_commands_queue_deviceid` FOREIGN KEY (`deviceid`) REFERENCES `tc_devices` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_device_attribute
-- ----------------------------
DROP TABLE IF EXISTS `tc_device_attribute`;
CREATE TABLE `tc_device_attribute`  (
  `deviceid` int NOT NULL,
  `attributeid` int NOT NULL,
  INDEX `fk_user_device_attribute_attributeid`(`attributeid`) USING BTREE,
  INDEX `fk_user_device_attribute_deviceid`(`deviceid`) USING BTREE,
  CONSTRAINT `fk_user_device_attribute_attributeid` FOREIGN KEY (`attributeid`) REFERENCES `tc_attributes` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_user_device_attribute_deviceid` FOREIGN KEY (`deviceid`) REFERENCES `tc_devices` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_device_command
-- ----------------------------
DROP TABLE IF EXISTS `tc_device_command`;
CREATE TABLE `tc_device_command`  (
  `deviceid` int NOT NULL,
  `commandid` int NOT NULL,
  INDEX `fk_device_command_commandid`(`commandid`) USING BTREE,
  INDEX `fk_device_command_deviceid`(`deviceid`) USING BTREE,
  CONSTRAINT `fk_device_command_commandid` FOREIGN KEY (`commandid`) REFERENCES `tc_commands` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_device_command_deviceid` FOREIGN KEY (`deviceid`) REFERENCES `tc_devices` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_device_driver
-- ----------------------------
DROP TABLE IF EXISTS `tc_device_driver`;
CREATE TABLE `tc_device_driver`  (
  `deviceid` int NOT NULL,
  `driverid` int NOT NULL,
  INDEX `fk_device_driver_deviceid`(`deviceid`) USING BTREE,
  INDEX `fk_device_driver_driverid`(`driverid`) USING BTREE,
  CONSTRAINT `fk_device_driver_deviceid` FOREIGN KEY (`deviceid`) REFERENCES `tc_devices` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_device_driver_driverid` FOREIGN KEY (`driverid`) REFERENCES `tc_drivers` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_device_geofence
-- ----------------------------
DROP TABLE IF EXISTS `tc_device_geofence`;
CREATE TABLE `tc_device_geofence`  (
  `deviceid` int NOT NULL,
  `geofenceid` int NOT NULL,
  INDEX `fk_device_geofence_deviceid`(`deviceid`) USING BTREE,
  INDEX `fk_device_geofence_geofenceid`(`geofenceid`) USING BTREE,
  CONSTRAINT `fk_device_geofence_deviceid` FOREIGN KEY (`deviceid`) REFERENCES `tc_devices` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_device_geofence_geofenceid` FOREIGN KEY (`geofenceid`) REFERENCES `tc_geofences` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_device_maintenance
-- ----------------------------
DROP TABLE IF EXISTS `tc_device_maintenance`;
CREATE TABLE `tc_device_maintenance`  (
  `deviceid` int NOT NULL,
  `maintenanceid` int NOT NULL,
  INDEX `fk_device_maintenance_deviceid`(`deviceid`) USING BTREE,
  INDEX `fk_device_maintenance_maintenanceid`(`maintenanceid`) USING BTREE,
  CONSTRAINT `fk_device_maintenance_deviceid` FOREIGN KEY (`deviceid`) REFERENCES `tc_devices` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_device_maintenance_maintenanceid` FOREIGN KEY (`maintenanceid`) REFERENCES `tc_maintenances` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_device_notification
-- ----------------------------
DROP TABLE IF EXISTS `tc_device_notification`;
CREATE TABLE `tc_device_notification`  (
  `deviceid` int NOT NULL,
  `notificationid` int NOT NULL,
  INDEX `fk_device_notification_deviceid`(`deviceid`) USING BTREE,
  INDEX `fk_device_notification_notificationid`(`notificationid`) USING BTREE,
  CONSTRAINT `fk_device_notification_deviceid` FOREIGN KEY (`deviceid`) REFERENCES `tc_devices` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_device_notification_notificationid` FOREIGN KEY (`notificationid`) REFERENCES `tc_notifications` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_device_order
-- ----------------------------
DROP TABLE IF EXISTS `tc_device_order`;
CREATE TABLE `tc_device_order`  (
  `deviceid` int NOT NULL,
  `orderid` int NOT NULL,
  INDEX `fk_device_order_deviceid`(`deviceid`) USING BTREE,
  INDEX `fk_device_order_orderid`(`orderid`) USING BTREE,
  CONSTRAINT `fk_device_order_deviceid` FOREIGN KEY (`deviceid`) REFERENCES `tc_devices` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_device_order_orderid` FOREIGN KEY (`orderid`) REFERENCES `tc_orders` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_devices
-- ----------------------------
DROP TABLE IF EXISTS `tc_devices`;
CREATE TABLE `tc_devices`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `uniqueid` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastupdate` timestamp NULL DEFAULT NULL,
  `positionid` int NULL DEFAULT NULL,
  `groupid` int NULL DEFAULT NULL,
  `attributes` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `phone` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `model` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `contact` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `category` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `disabled` bit(1) NULL DEFAULT b'0',
  `status` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `geofenceids` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `expirationtime` timestamp NULL DEFAULT NULL,
  `motionstate` bit(1) NULL DEFAULT b'0',
  `motiontime` timestamp NULL DEFAULT NULL,
  `motiondistance` double NULL DEFAULT 0,
  `overspeedstate` bit(1) NULL DEFAULT b'0',
  `overspeedtime` timestamp NULL DEFAULT NULL,
  `overspeedgeofenceid` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `uniqueid`(`uniqueid`) USING BTREE,
  INDEX `fk_devices_groupid`(`groupid`) USING BTREE,
  INDEX `idx_devices_uniqueid`(`uniqueid`) USING BTREE,
  CONSTRAINT `fk_devices_groupid` FOREIGN KEY (`groupid`) REFERENCES `tc_groups` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 72 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_drivers
-- ----------------------------
DROP TABLE IF EXISTS `tc_drivers`;
CREATE TABLE `tc_drivers`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `uniqueid` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `attributes` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `uniqueid`(`uniqueid`) USING BTREE,
  INDEX `idx_drivers_uniqueid`(`uniqueid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_events
-- ----------------------------
DROP TABLE IF EXISTS `tc_events`;
CREATE TABLE `tc_events`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `eventtime` timestamp NULL DEFAULT NULL,
  `deviceid` int NULL DEFAULT NULL,
  `positionid` int NULL DEFAULT NULL,
  `geofenceid` int NULL DEFAULT NULL,
  `attributes` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `maintenanceid` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `event_deviceid_servertime`(`deviceid`, `eventtime`) USING BTREE,
  CONSTRAINT `fk_events_deviceid` FOREIGN KEY (`deviceid`) REFERENCES `tc_devices` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 207634 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_geofences
-- ----------------------------
DROP TABLE IF EXISTS `tc_geofences`;
CREATE TABLE `tc_geofences`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `area` varchar(4096) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `attributes` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `calendarid` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_geofence_calendar_calendarid`(`calendarid`) USING BTREE,
  CONSTRAINT `fk_geofence_calendar_calendarid` FOREIGN KEY (`calendarid`) REFERENCES `tc_calendars` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 73 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_group_attribute
-- ----------------------------
DROP TABLE IF EXISTS `tc_group_attribute`;
CREATE TABLE `tc_group_attribute`  (
  `groupid` int NOT NULL,
  `attributeid` int NOT NULL,
  INDEX `fk_group_attribute_attributeid`(`attributeid`) USING BTREE,
  INDEX `fk_group_attribute_groupid`(`groupid`) USING BTREE,
  CONSTRAINT `fk_group_attribute_attributeid` FOREIGN KEY (`attributeid`) REFERENCES `tc_attributes` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_group_attribute_groupid` FOREIGN KEY (`groupid`) REFERENCES `tc_groups` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_group_command
-- ----------------------------
DROP TABLE IF EXISTS `tc_group_command`;
CREATE TABLE `tc_group_command`  (
  `groupid` int NOT NULL,
  `commandid` int NOT NULL,
  INDEX `fk_group_command_commandid`(`commandid`) USING BTREE,
  INDEX `fk_group_command_groupid`(`groupid`) USING BTREE,
  CONSTRAINT `fk_group_command_commandid` FOREIGN KEY (`commandid`) REFERENCES `tc_commands` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_group_command_groupid` FOREIGN KEY (`groupid`) REFERENCES `tc_groups` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_group_driver
-- ----------------------------
DROP TABLE IF EXISTS `tc_group_driver`;
CREATE TABLE `tc_group_driver`  (
  `groupid` int NOT NULL,
  `driverid` int NOT NULL,
  INDEX `fk_group_driver_driverid`(`driverid`) USING BTREE,
  INDEX `fk_group_driver_groupid`(`groupid`) USING BTREE,
  CONSTRAINT `fk_group_driver_driverid` FOREIGN KEY (`driverid`) REFERENCES `tc_drivers` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_group_driver_groupid` FOREIGN KEY (`groupid`) REFERENCES `tc_groups` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_group_geofence
-- ----------------------------
DROP TABLE IF EXISTS `tc_group_geofence`;
CREATE TABLE `tc_group_geofence`  (
  `groupid` int NOT NULL,
  `geofenceid` int NOT NULL,
  INDEX `fk_group_geofence_geofenceid`(`geofenceid`) USING BTREE,
  INDEX `fk_group_geofence_groupid`(`groupid`) USING BTREE,
  CONSTRAINT `fk_group_geofence_geofenceid` FOREIGN KEY (`geofenceid`) REFERENCES `tc_geofences` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_group_geofence_groupid` FOREIGN KEY (`groupid`) REFERENCES `tc_groups` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_group_maintenance
-- ----------------------------
DROP TABLE IF EXISTS `tc_group_maintenance`;
CREATE TABLE `tc_group_maintenance`  (
  `groupid` int NOT NULL,
  `maintenanceid` int NOT NULL,
  INDEX `fk_group_maintenance_groupid`(`groupid`) USING BTREE,
  INDEX `fk_group_maintenance_maintenanceid`(`maintenanceid`) USING BTREE,
  CONSTRAINT `fk_group_maintenance_groupid` FOREIGN KEY (`groupid`) REFERENCES `tc_groups` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_group_maintenance_maintenanceid` FOREIGN KEY (`maintenanceid`) REFERENCES `tc_maintenances` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_group_notification
-- ----------------------------
DROP TABLE IF EXISTS `tc_group_notification`;
CREATE TABLE `tc_group_notification`  (
  `groupid` int NOT NULL,
  `notificationid` int NOT NULL,
  INDEX `fk_group_notification_groupid`(`groupid`) USING BTREE,
  INDEX `fk_group_notification_notificationid`(`notificationid`) USING BTREE,
  CONSTRAINT `fk_group_notification_groupid` FOREIGN KEY (`groupid`) REFERENCES `tc_groups` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_group_notification_notificationid` FOREIGN KEY (`notificationid`) REFERENCES `tc_notifications` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_group_order
-- ----------------------------
DROP TABLE IF EXISTS `tc_group_order`;
CREATE TABLE `tc_group_order`  (
  `groupid` int NOT NULL,
  `orderid` int NOT NULL,
  INDEX `fk_group_order_groupid`(`groupid`) USING BTREE,
  INDEX `fk_group_order_orderid`(`orderid`) USING BTREE,
  CONSTRAINT `fk_group_order_groupid` FOREIGN KEY (`groupid`) REFERENCES `tc_groups` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_group_order_orderid` FOREIGN KEY (`orderid`) REFERENCES `tc_orders` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_groups
-- ----------------------------
DROP TABLE IF EXISTS `tc_groups`;
CREATE TABLE `tc_groups`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `groupid` int NULL DEFAULT NULL,
  `attributes` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_groups_groupid`(`groupid`) USING BTREE,
  CONSTRAINT `fk_groups_groupid` FOREIGN KEY (`groupid`) REFERENCES `tc_groups` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_keystore
-- ----------------------------
DROP TABLE IF EXISTS `tc_keystore`;
CREATE TABLE `tc_keystore`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `publickey` mediumblob NOT NULL,
  `privatekey` mediumblob NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_maintenances
-- ----------------------------
DROP TABLE IF EXISTS `tc_maintenances`;
CREATE TABLE `tc_maintenances`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `type` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `start` double NOT NULL DEFAULT 0,
  `period` double NOT NULL DEFAULT 0,
  `attributes` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_notifications
-- ----------------------------
DROP TABLE IF EXISTS `tc_notifications`;
CREATE TABLE `tc_notifications`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `attributes` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `always` bit(1) NOT NULL DEFAULT b'0',
  `calendarid` int NULL DEFAULT NULL,
  `notificators` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_notification_calendar_calendarid`(`calendarid`) USING BTREE,
  CONSTRAINT `fk_notification_calendar_calendarid` FOREIGN KEY (`calendarid`) REFERENCES `tc_calendars` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_orders
-- ----------------------------
DROP TABLE IF EXISTS `tc_orders`;
CREATE TABLE `tc_orders`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `uniqueid` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `fromaddress` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `toaddress` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `attributes` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_positions
-- ----------------------------
DROP TABLE IF EXISTS `tc_positions`;
CREATE TABLE `tc_positions`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `protocol` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `deviceid` int NOT NULL,
  `servertime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `devicetime` timestamp NOT NULL,
  `fixtime` timestamp NOT NULL,
  `valid` bit(1) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `altitude` float NOT NULL,
  `speed` float NOT NULL,
  `course` float NOT NULL,
  `address` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `attributes` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `accuracy` double NOT NULL DEFAULT 0,
  `network` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `position_deviceid_fixtime`(`deviceid`, `fixtime`) USING BTREE,
  CONSTRAINT `fk_positions_deviceid` FOREIGN KEY (`deviceid`) REFERENCES `tc_devices` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1581790 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_servers
-- ----------------------------
DROP TABLE IF EXISTS `tc_servers`;
CREATE TABLE `tc_servers`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `registration` bit(1) NOT NULL DEFAULT b'1',
  `latitude` double NOT NULL DEFAULT 0,
  `longitude` double NOT NULL DEFAULT 0,
  `zoom` int NOT NULL DEFAULT 0,
  `map` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `bingkey` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `mapurl` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `readonly` bit(1) NOT NULL DEFAULT b'0',
  `twelvehourformat` bit(1) NOT NULL DEFAULT b'0',
  `attributes` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `forcesettings` bit(1) NOT NULL DEFAULT b'0',
  `coordinateformat` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `devicereadonly` bit(1) NULL DEFAULT b'0',
  `limitcommands` bit(1) NULL DEFAULT b'0',
  `poilayer` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `announcement` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `disablereports` bit(1) NULL DEFAULT b'0',
  `overlayurl` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `fixedemail` bit(1) NULL DEFAULT b'0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_statistics
-- ----------------------------
DROP TABLE IF EXISTS `tc_statistics`;
CREATE TABLE `tc_statistics`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `capturetime` timestamp NOT NULL,
  `activeusers` int NOT NULL DEFAULT 0,
  `activedevices` int NOT NULL DEFAULT 0,
  `requests` int NOT NULL DEFAULT 0,
  `messagesreceived` int NOT NULL DEFAULT 0,
  `messagesstored` int NOT NULL DEFAULT 0,
  `attributes` varchar(4096) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mailsent` int NOT NULL DEFAULT 0,
  `smssent` int NOT NULL DEFAULT 0,
  `geocoderrequests` int NOT NULL DEFAULT 0,
  `geolocationrequests` int NOT NULL DEFAULT 0,
  `protocols` varchar(4096) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_user_attribute
-- ----------------------------
DROP TABLE IF EXISTS `tc_user_attribute`;
CREATE TABLE `tc_user_attribute`  (
  `userid` int NOT NULL,
  `attributeid` int NOT NULL,
  INDEX `fk_user_attribute_attributeid`(`attributeid`) USING BTREE,
  INDEX `fk_user_attribute_userid`(`userid`) USING BTREE,
  CONSTRAINT `fk_user_attribute_attributeid` FOREIGN KEY (`attributeid`) REFERENCES `tc_attributes` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_user_attribute_userid` FOREIGN KEY (`userid`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_user_calendar
-- ----------------------------
DROP TABLE IF EXISTS `tc_user_calendar`;
CREATE TABLE `tc_user_calendar`  (
  `userid` int NOT NULL,
  `calendarid` int NOT NULL,
  INDEX `fk_user_calendar_calendarid`(`calendarid`) USING BTREE,
  INDEX `fk_user_calendar_userid`(`userid`) USING BTREE,
  CONSTRAINT `fk_user_calendar_calendarid` FOREIGN KEY (`calendarid`) REFERENCES `tc_calendars` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_user_calendar_userid` FOREIGN KEY (`userid`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_user_command
-- ----------------------------
DROP TABLE IF EXISTS `tc_user_command`;
CREATE TABLE `tc_user_command`  (
  `userid` int NOT NULL,
  `commandid` int NOT NULL,
  INDEX `fk_user_command_commandid`(`commandid`) USING BTREE,
  INDEX `fk_user_command_userid`(`userid`) USING BTREE,
  CONSTRAINT `fk_user_command_commandid` FOREIGN KEY (`commandid`) REFERENCES `tc_commands` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_user_command_userid` FOREIGN KEY (`userid`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_user_device
-- ----------------------------
DROP TABLE IF EXISTS `tc_user_device`;
CREATE TABLE `tc_user_device`  (
  `userid` int NOT NULL,
  `deviceid` int NOT NULL,
  INDEX `fk_user_device_deviceid`(`deviceid`) USING BTREE,
  INDEX `user_device_user_id`(`userid`) USING BTREE,
  CONSTRAINT `fk_user_device_deviceid` FOREIGN KEY (`deviceid`) REFERENCES `tc_devices` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_user_device_userid` FOREIGN KEY (`userid`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_user_driver
-- ----------------------------
DROP TABLE IF EXISTS `tc_user_driver`;
CREATE TABLE `tc_user_driver`  (
  `userid` int NOT NULL,
  `driverid` int NOT NULL,
  INDEX `fk_user_driver_driverid`(`driverid`) USING BTREE,
  INDEX `fk_user_driver_userid`(`userid`) USING BTREE,
  CONSTRAINT `fk_user_driver_driverid` FOREIGN KEY (`driverid`) REFERENCES `tc_drivers` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_user_driver_userid` FOREIGN KEY (`userid`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_user_geofence
-- ----------------------------
DROP TABLE IF EXISTS `tc_user_geofence`;
CREATE TABLE `tc_user_geofence`  (
  `userid` int NOT NULL,
  `geofenceid` int NOT NULL,
  INDEX `fk_user_geofence_geofenceid`(`geofenceid`) USING BTREE,
  INDEX `fk_user_geofence_userid`(`userid`) USING BTREE,
  CONSTRAINT `fk_user_geofence_geofenceid` FOREIGN KEY (`geofenceid`) REFERENCES `tc_geofences` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_user_geofence_userid` FOREIGN KEY (`userid`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_user_group
-- ----------------------------
DROP TABLE IF EXISTS `tc_user_group`;
CREATE TABLE `tc_user_group`  (
  `userid` int NOT NULL,
  `groupid` int NOT NULL,
  INDEX `fk_user_group_groupid`(`groupid`) USING BTREE,
  INDEX `fk_user_group_userid`(`userid`) USING BTREE,
  CONSTRAINT `fk_user_group_groupid` FOREIGN KEY (`groupid`) REFERENCES `tc_groups` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_user_group_userid` FOREIGN KEY (`userid`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_user_maintenance
-- ----------------------------
DROP TABLE IF EXISTS `tc_user_maintenance`;
CREATE TABLE `tc_user_maintenance`  (
  `userid` int NOT NULL,
  `maintenanceid` int NOT NULL,
  INDEX `fk_user_maintenance_maintenanceid`(`maintenanceid`) USING BTREE,
  INDEX `fk_user_maintenance_userid`(`userid`) USING BTREE,
  CONSTRAINT `fk_user_maintenance_maintenanceid` FOREIGN KEY (`maintenanceid`) REFERENCES `tc_maintenances` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_user_maintenance_userid` FOREIGN KEY (`userid`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_user_notification
-- ----------------------------
DROP TABLE IF EXISTS `tc_user_notification`;
CREATE TABLE `tc_user_notification`  (
  `userid` int NOT NULL,
  `notificationid` int NOT NULL,
  INDEX `fk_user_notification_notificationid`(`notificationid`) USING BTREE,
  INDEX `fk_user_notification_userid`(`userid`) USING BTREE,
  CONSTRAINT `fk_user_notification_notificationid` FOREIGN KEY (`notificationid`) REFERENCES `tc_notifications` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_user_notification_userid` FOREIGN KEY (`userid`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_user_order
-- ----------------------------
DROP TABLE IF EXISTS `tc_user_order`;
CREATE TABLE `tc_user_order`  (
  `userid` int NOT NULL,
  `orderid` int NOT NULL,
  INDEX `fk_user_order_userid`(`userid`) USING BTREE,
  INDEX `fk_user_order_orderid`(`orderid`) USING BTREE,
  CONSTRAINT `fk_user_order_orderid` FOREIGN KEY (`orderid`) REFERENCES `tc_orders` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_user_order_userid` FOREIGN KEY (`userid`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_user_user
-- ----------------------------
DROP TABLE IF EXISTS `tc_user_user`;
CREATE TABLE `tc_user_user`  (
  `userid` int NOT NULL,
  `manageduserid` int NOT NULL,
  INDEX `fk_user_user_userid`(`userid`) USING BTREE,
  INDEX `fk_user_user_manageduserid`(`manageduserid`) USING BTREE,
  CONSTRAINT `fk_user_user_manageduserid` FOREIGN KEY (`manageduserid`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_user_user_userid` FOREIGN KEY (`userid`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tc_users
-- ----------------------------
DROP TABLE IF EXISTS `tc_users`;
CREATE TABLE `tc_users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hashedpassword` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `salt` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `readonly` bit(1) NOT NULL DEFAULT b'0',
  `administrator` bit(1) NULL DEFAULT NULL,
  `map` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `latitude` double NOT NULL DEFAULT 0,
  `longitude` double NOT NULL DEFAULT 0,
  `zoom` int NOT NULL DEFAULT 0,
  `twelvehourformat` bit(1) NOT NULL DEFAULT b'0',
  `attributes` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `coordinateformat` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `disabled` bit(1) NULL DEFAULT b'0',
  `expirationtime` timestamp NULL DEFAULT NULL,
  `devicelimit` int NULL DEFAULT -1,
  `userlimit` int NULL DEFAULT 0,
  `devicereadonly` bit(1) NULL DEFAULT b'0',
  `phone` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `limitcommands` bit(1) NULL DEFAULT b'0',
  `login` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `poilayer` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `disablereports` bit(1) NULL DEFAULT b'0',
  `fixedemail` bit(1) NULL DEFAULT b'0',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE,
  INDEX `idx_users_email`(`email`) USING BTREE,
  INDEX `idx_users_login`(`login`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
