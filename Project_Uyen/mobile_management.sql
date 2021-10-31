-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 12:00 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobile_managementi`
--
DROP DATABASE IF EXISTS mobile_management;
CREATE DATABASE IF NOT EXISTS `mobile_management` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mobile_management`;

-- --------------------------------------------------------

--
-- Table structure for table `mobile`
--

CREATE TABLE `mobile` (
  `id` int(11) NOT NULL COMMENT 'mobile id',
  `mobile_name` varchar(255) NOT NULL COMMENT 'mobile name',
  `classification` varchar(255) NOT NULL COMMENT 'mobile classification',
  `price` bigint(20) NOT NULL COMMENT 'price',
  `image` varchar(255) NOT NULL COMMENT 'link image',
  `created_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'created datetime',
  `updated_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'updated datetime'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'user id',
  `user name` varchar(255) NOT NULL COMMENT 'user name',
  `password` varchar(20) NOT NULL COMMENT 'user password',
  `name` varchar(255) NOT NULL COMMENT 'name',
  `created_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'created datetime',
  `updated_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'updated datetime'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='user information';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobile`
--
ALTER TABLE `mobile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dien_thoai`
--
ALTER TABLE `mobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mobile id';

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user id', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100420
 Source Host           : localhost:3306
 Source Schema         : mobile_management

 Target Server Type    : MySQL
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 24/09/2021 22:43:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mobile
-- ----------------------------
DROP TABLE IF EXISTS `mobile`;
CREATE TABLE `mobile`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mobile id',
  `mobile_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'mobile name',
  `category_id` int(255) NOT NULL COMMENT 'mobile classification',
  `price` bigint(20) NOT NULL COMMENT 'mobile price',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'image link',
  `info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT 'infomation',
  `created_datetime` datetime(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'created datetime',
  `updated_datetime` datetime(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'updated datetime',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mobile
-- ----------------------------
INSERT INTO `mobile` VALUES (1, 'Samsung Galaxy Z Fold3', 1, 80000, 'https://cdn.tgdd.vn/Products/Images/42/226935/samsung-galaxy-z-fold-3-silver-1-200x200.jpg', '1,000円のプレゼント', '2021-09-22 17:10:04', '2021-09-22 17:10:04');
INSERT INTO `mobile` VALUES (2, 'Samsung Galaxy A22', 1, 100000, 'https://cdn.tgdd.vn/Products/Images/42/237603/samsung-galaxy-a22-4g-mint-1-200x200.jpg', '2,000円のプレゼント', '2021-09-22 17:11:02', '2021-09-22 17:11:02');
INSERT INTO `mobile` VALUES (3, 'Samsung Galaxy S21 Ultra', 1, 110000, 'https://cdn.tgdd.vn/Products/Images/42/226316/samsung-galaxy-s21-ultra-den-600x600-1-200x200.jpg', '3,000円のプレゼント', '2021-09-22 17:11:25', '2021-09-22 17:11:25');
INSERT INTO `mobile` VALUES (4, 'Samsung Galaxy Note 20', 1, 89000, 'https://cdn.tgdd.vn/Products/Images/42/218355/200-note-20-1-org.png', '4,000円のプレゼント', '2021-09-22 17:11:59', '2021-09-22 17:11:59');
INSERT INTO `mobile` VALUES (5, 'Samsung Galaxy A52', 1, 70000, 'https://cdn.tgdd.vn/Products/Images/42/235440/samsung-galaxy-a52-5g-thumb-blue-600x600-200x200.jpg', '1,000円のプレゼント', '2021-09-22 17:13:30', '2021-09-22 17:13:30');
INSERT INTO `mobile` VALUES (6, 'iPhone 13 mini', 2, 100000, 'https://cdn.tgdd.vn/Products/Images/42/236780/iphone-13-mini-pink-1-200x200.jpg', '1,000円のプレゼント', '2021-09-22 17:14:43', '2021-09-22 17:14:43');
INSERT INTO `mobile` VALUES (7, 'iPhone 12', 2, 98000, 'https://cdn.tgdd.vn/Products/Images/42/213031/iphone-12-do-200x200.jpg', '2,000円のプレゼント', '2021-09-22 17:15:19', '2021-09-22 17:15:19');
INSERT INTO `mobile` VALUES (8, 'iPhone 11', 2, 75000, 'https://cdn.tgdd.vn/Products/Images/42/153856/iphone-xi-tim-200x200.jpg', '3,000円のプレゼントk', '2021-09-22 17:16:12', '2021-09-22 17:16:12');
INSERT INTO `mobile` VALUES (9, 'iPhone XR', 2, 70000, 'https://cdn.tgdd.vn/Products/Images/42/190325/iphone-xr-trang-600-1-200x200.jpg', '1,000円のプレゼント', '2021-09-22 17:16:35', '2021-09-22 17:16:35');
INSERT INTO `mobile` VALUES (10, 'Xiaomi Mi 11', 3, 50000, 'https://cdn.tgdd.vn/Products/Images/42/226264/xiaomi-mi-11-xanhduong-600x600-200x200.jpg', '5,000円のプレゼント', '2021-09-22 17:18:25', '2021-09-22 17:18:25');
INSERT INTO `mobile` VALUES (11, 'Xiaomi Mi 10T Pro', 3, 70000, 'https://cdn.tgdd.vn/Products/Images/42/228136/xiaomi-mi-10t-pro-bac-200x200.jpg', '1,000円のプレゼント', '2021-09-22 17:18:56', '2021-09-22 17:18:56');
INSERT INTO `mobile` VALUES (12, 'Xiaomi Redmi Note 10 Pro', 3, 74900, 'https://cdn.tgdd.vn/Products/Images/42/229228/xiaomi-redmi-note-10-pro-thumb-vang-dong-600x600-200x200.jpg', '3,000円のプレゼント', '2021-09-22 17:19:28', '2021-09-22 17:19:28');

-- ----------------------------
-- Table structure for mobile_category
-- ----------------------------
DROP TABLE IF EXISTS `mobile_category`;
CREATE TABLE `mobile_category`  (
  `id` int(11) NOT NULL COMMENT 'mobile id',
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'mobile maker',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mobile_category
-- ----------------------------
INSERT INTO `mobile_category` VALUES (1, 'Samsung');
INSERT INTO `mobile_category` VALUES (2, 'Apple');
INSERT INTO `mobile_category` VALUES (3, 'Xiaomi');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id user',
  `user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'user name',
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'user password',
  `created_datetime` datetime(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'created datetime',
  `updated_datetime` datetime(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'updated datetime',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'user info' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'tuanvd', '12345678', '2021-09-24 21:55:19', '2021-09-24 21:55:19');
INSERT INTO `user` VALUES (2, 'ninhnd', '87654321', '2021-09-24 22:17:31', '2021-09-24 22:17:31');
INSERT INTO `user` VALUES (3, 'kienhm', '12374585', '2021-09-24 22:17:50', '2021-09-24 22:17:50');
INSERT INTO `user` VALUES (4, 'uyenhtt', '58745214', '2021-09-24 22:18:09', '2021-09-24 22:18:09');
INSERT INTO `user` VALUES (5, 'chivtk', '45612398', '2021-09-24 22:18:34', '2021-09-24 22:18:34');
INSERT INTO `user` VALUES (6, 'linhh', '78541236', '2021-09-24 22:18:47', '2021-09-24 22:18:47');
INSERT INTO `user` VALUES (7, 'hoant', '78123654', '2021-09-24 22:19:34', '2021-09-24 22:19:34');
INSERT INTO `user` VALUES (8, 'khoanguyen', '12345874', '2021-09-24 22:20:02', '2021-09-24 22:20:02');

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info`  (
  `user_id` int(11) NOT NULL COMMENT 'id user',
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'user name',
  `birthday` date NULL DEFAULT NULL COMMENT 'birthday',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'email',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES (1, 'Vu Dinh Tuan', '1994-01-11', 'tuanvd@gmail.com');
INSERT INTO `user_info` VALUES (2, 'Nguyen Duc Ninh', '1994-01-11', 'ninhnd@gmail.com');
INSERT INTO `user_info` VALUES (3, 'Hoang Manh Kien ', '1997-01-11', 'kienhm@gmail.com');
INSERT INTO `user_info` VALUES (4, 'Vu Tri Dang', '1997-02-11', 'dangvt@gmail.com');
INSERT INTO `user_info` VALUES (5, 'Hoang Thi To Uyen', '1996-01-07', 'uyenhtt@gmail.com');
INSERT INTO `user_info` VALUES (6, 'Hoang Ho Linh', '1982-01-01', 'linhh@gmail.com');
INSERT INTO `user_info` VALUES (7, 'Nguyen Thanh Hoa', '1988-01-07', 'hoant@gmail.com');
INSERT INTO `user_info` VALUES (8, 'Nguyen Khoa', '1990-06-06', 'khoanguyen@gmail.com');

-- ----------------------------
-- Table structure for user_mobile
-- ----------------------------
DROP TABLE IF EXISTS `user_mobile`;
CREATE TABLE `user_mobile`  (
  `user_id` int(11) NOT NULL COMMENT 'id user',
  `mobile_id` int(11) NOT NULL COMMENT 'id mobile',
  PRIMARY KEY (`user_id`, `mobile_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_mobile
-- ----------------------------
INSERT INTO `user_mobile` VALUES (1, 3);
INSERT INTO `user_mobile` VALUES (1, 4);
INSERT INTO `user_mobile` VALUES (1, 5);
INSERT INTO `user_mobile` VALUES (1, 7);
INSERT INTO `user_mobile` VALUES (2, 8);
INSERT INTO `user_mobile` VALUES (3, 9);

SET FOREIGN_KEY_CHECKS = 1;
