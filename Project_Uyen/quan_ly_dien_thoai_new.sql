/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100420
 Source Host           : localhost:3306
 Source Schema         : quan_ly_dien_thoai

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
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id của điện thoại',
  `mobile_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'tên điện thoại',
  `category_id` int(255) NOT NULL COMMENT 'phân loại điện thoại',
  `price` bigint(20) NOT NULL COMMENT 'giá tiền điện thoại',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'link ảnh',
  `info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT 'thông tin thêm',
  `created_datetime` datetime(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'ngày tạo',
  `updated_datetime` datetime(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'ngày sửa',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mobile
-- ----------------------------
INSERT INTO `mobile` VALUES (1, 'Điện thoại Samsung Galaxy Z Fold3', 1, 42000000, 'https://cdn.tgdd.vn/Products/Images/42/226935/samsung-galaxy-z-fold-3-silver-1-200x200.jpg', 'Quà 200k', '2021-09-22 17:10:04', '2021-09-22 17:10:04');
INSERT INTO `mobile` VALUES (2, 'Điện thoại Samsung Galaxy A22', 1, 5890000, 'https://cdn.tgdd.vn/Products/Images/42/237603/samsung-galaxy-a22-4g-mint-1-200x200.jpg', 'Quà 300k', '2021-09-22 17:11:02', '2021-09-22 17:11:02');
INSERT INTO `mobile` VALUES (3, 'Điện thoại Samsung Galaxy S21 Ultra', 1, 25990000, 'https://cdn.tgdd.vn/Products/Images/42/226316/samsung-galaxy-s21-ultra-den-600x600-1-200x200.jpg', 'Quà 400k', '2021-09-22 17:11:25', '2021-09-22 17:11:25');
INSERT INTO `mobile` VALUES (4, 'Điện thoại Samsung Galaxy Note 20', 1, 14990000, 'https://cdn.tgdd.vn/Products/Images/42/218355/200-note-20-1-org.png', 'Quà 500k', '2021-09-22 17:11:59', '2021-09-22 17:11:59');
INSERT INTO `mobile` VALUES (5, 'Điện thoại Samsung Galaxy A52', 1, 10990000, 'https://cdn.tgdd.vn/Products/Images/42/235440/samsung-galaxy-a52-5g-thumb-blue-600x600-200x200.jpg', 'Quà 200k', '2021-09-22 17:13:30', '2021-09-22 17:13:30');
INSERT INTO `mobile` VALUES (6, 'Điện thoại iPhone 13 mini', 2, 21990000, 'https://cdn.tgdd.vn/Products/Images/42/236780/iphone-13-mini-pink-1-200x200.jpg', 'Quà 200k', '2021-09-22 17:14:43', '2021-09-22 17:14:43');
INSERT INTO `mobile` VALUES (7, 'Điện thoại iPhone 12', 2, 20490000, 'https://cdn.tgdd.vn/Products/Images/42/213031/iphone-12-do-200x200.jpg', 'Quà 200k', '2021-09-22 17:15:19', '2021-09-22 17:15:19');
INSERT INTO `mobile` VALUES (8, 'Điện thoại iPhone 11', 2, 14990000, 'https://cdn.tgdd.vn/Products/Images/42/153856/iphone-xi-tim-200x200.jpg', 'Quà 400k', '2021-09-22 17:16:12', '2021-09-22 17:16:12');
INSERT INTO `mobile` VALUES (9, 'Điện thoại iPhone XR', 2, 12490000, 'https://cdn.tgdd.vn/Products/Images/42/190325/iphone-xr-trang-600-1-200x200.jpg', 'Quà 200k', '2021-09-22 17:16:35', '2021-09-22 17:16:35');
INSERT INTO `mobile` VALUES (10, 'Điện thoại Xiaomi Mi 11', 3, 16990000, 'https://cdn.tgdd.vn/Products/Images/42/226264/xiaomi-mi-11-xanhduong-600x600-200x200.jpg', 'Quà 400k', '2021-09-22 17:18:25', '2021-09-22 17:18:25');
INSERT INTO `mobile` VALUES (11, 'Điện thoại Xiaomi Mi 10T Pro', 3, 12490000, 'https://cdn.tgdd.vn/Products/Images/42/228136/xiaomi-mi-10t-pro-bac-200x200.jpg', 'Quà 200k', '2021-09-22 17:18:56', '2021-09-22 17:18:56');
INSERT INTO `mobile` VALUES (12, 'Điện thoại Xiaomi Redmi Note 10 Pro', 3, 7490000, 'https://cdn.tgdd.vn/Products/Images/42/229228/xiaomi-redmi-note-10-pro-thumb-vang-dong-600x600-200x200.jpg', 'Quà 200k', '2021-09-22 17:19:28', '2021-09-22 17:19:28');

-- ----------------------------
-- Table structure for mobile_category
-- ----------------------------
DROP TABLE IF EXISTS `mobile_category`;
CREATE TABLE `mobile_category`  (
  `id` int(11) NOT NULL COMMENT 'id hãng điện thoại',
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'tên hãng điện thoại',
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
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id của user',
  `user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'tên tài khoản của user',
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'mật khẩu user',
  `created_datetime` datetime(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'ngày tạo',
  `updated_datetime` datetime(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'ngày sửa',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'thông tin user' ROW_FORMAT = Dynamic;

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
  `user_id` int(11) NOT NULL COMMENT 'id của user',
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'họ và tên của user',
  `birthday` date NULL DEFAULT NULL COMMENT 'sinh nhật',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'địa chỉ email',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES (1, 'Vũ Đình Tuấn', '1994-01-11', 'tuanvd@gmail.com');
INSERT INTO `user_info` VALUES (2, 'Nguyễn Đức Ninh', '1994-01-11', 'ninhnd@gmail.com');
INSERT INTO `user_info` VALUES (3, 'Hoàng Mạnh Kiên ', '1997-01-11', 'kienhm@gmail.com');
INSERT INTO `user_info` VALUES (4, 'Vũ Trí Đăng', '1997-02-11', 'dangvt@gmail.com');
INSERT INTO `user_info` VALUES (5, 'Hoàng Thị Tố Uyên', '1996-01-07', 'uyenhtt@gmail.com');
INSERT INTO `user_info` VALUES (6, 'Hoàng Hồ Linh', '1982-01-01', 'linhh@gmail.com');
INSERT INTO `user_info` VALUES (7, 'Nguyễn Thanh Hoa', '1988-01-07', 'hoant@gmail.com');
INSERT INTO `user_info` VALUES (8, 'Nguyễn Khoa', '1990-06-06', 'khoanguyen@gmail.com');

-- ----------------------------
-- Table structure for user_mobile
-- ----------------------------
DROP TABLE IF EXISTS `user_mobile`;
CREATE TABLE `user_mobile`  (
  `user_id` int(11) NOT NULL COMMENT 'id của user',
  `mobile_id` int(11) NOT NULL COMMENT 'id của mobile',
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
