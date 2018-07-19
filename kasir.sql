/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 50638
 Source Host           : localhost:8889
 Source Schema         : kasir

 Target Server Type    : MySQL
 Target Server Version : 50638
 File Encoding         : 65001

 Date: 19/07/2018 07:29:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `waktu` datetime DEFAULT NULL,
  `aktifitas` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `id` varchar(10) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- ----------------------------
-- Records of activity
-- ----------------------------
BEGIN;
INSERT INTO `activity` VALUES ('2018-07-18 21:41:05', 'Login', '1');
INSERT INTO `activity` VALUES ('2018-07-18 21:43:25', 'Mengaktifkan menu ID: 1', '1');
INSERT INTO `activity` VALUES ('2018-07-18 21:43:31', 'Menonaktifkan menu ID: 2', '1');
INSERT INTO `activity` VALUES ('2018-07-18 21:43:43', 'Logout', '1');
INSERT INTO `activity` VALUES ('2018-07-18 21:43:55', 'Login', '3');
INSERT INTO `activity` VALUES ('2018-07-18 21:45:29', 'Menambahkan menu ID: 3 ke pesanan ID: ERP18072018-010', '3');
INSERT INTO `activity` VALUES ('2018-07-18 21:47:29', 'Menghapus menu ID: 3 ke pesanan ID: ERP18072018-010', '3');
INSERT INTO `activity` VALUES ('2018-07-18 21:47:48', 'Menambahkan menu ID: 3 ke pesanan ID: ERP18072018-010', '3');
INSERT INTO `activity` VALUES ('2018-07-18 21:47:51', 'Membatalkan / Menghapus pesanan ID: ERP18072018-010', '3');
INSERT INTO `activity` VALUES ('2018-07-18 21:48:12', 'Menambahkan menu ID: 3 ke pesanan ID: ERP18072018-010', '3');
INSERT INTO `activity` VALUES ('2018-07-18 21:48:32', 'Logout', '3');
INSERT INTO `activity` VALUES ('2018-07-18 21:48:36', 'Login', '1');
INSERT INTO `activity` VALUES ('2018-07-18 21:49:42', 'Pembayaran pesanan ID: ERP18072018-010', '1');
INSERT INTO `activity` VALUES ('2018-07-19 05:14:46', 'Login', '1');
INSERT INTO `activity` VALUES ('2018-07-19 06:06:52', 'Logout', '1');
INSERT INTO `activity` VALUES ('2018-07-19 06:29:36', 'Registrasi user baru dengan username x', NULL);
INSERT INTO `activity` VALUES ('2018-07-19 06:31:28', 'Registrasi user baru dengan username indro', NULL);
INSERT INTO `activity` VALUES ('2018-07-19 06:32:40', 'Registrasi user baru dengan username indro', NULL);
INSERT INTO `activity` VALUES ('2018-07-19 06:32:48', 'Login', '6');
COMMIT;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id_menu` int(10) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `harga` varchar(20) COLLATE utf8_swedish_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_swedish_ci DEFAULT NULL,
  `tipe` varchar(10) COLLATE utf8_swedish_ci DEFAULT NULL,
  `img` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- ----------------------------
-- Records of menu
-- ----------------------------
BEGIN;
INSERT INTO `menu` VALUES (1, 'Nasi Goreng', '1000', 'aktif', 'makanan', 'nasigoreng.jpg');
INSERT INTO `menu` VALUES (2, 'Nasi Bakar', '2000', 'nonaktif', 'makanan', 'nasibakar.jpg');
INSERT INTO `menu` VALUES (3, 'Es Teh', '500', 'aktif', 'minuman', 'esteh.jpg');
COMMIT;

-- ----------------------------
-- Table structure for pesanan
-- ----------------------------
DROP TABLE IF EXISTS `pesanan`;
CREATE TABLE `pesanan` (
  `id_pesanan` varchar(20) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `id_menu` int(10) DEFAULT NULL,
  `status_pesanan` varchar(10) COLLATE utf8_swedish_ci DEFAULT NULL,
  `uid` int(10) DEFAULT NULL,
  `no_meja` int(10) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `id_kasir` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- ----------------------------
-- Records of pesanan
-- ----------------------------
BEGIN;
INSERT INTO `pesanan` VALUES ('ERP18072018-001', 1, 'terbayar', 2, 102, '2018-07-18 15:14:18', 2);
INSERT INTO `pesanan` VALUES ('ERP18072018-001', 2, 'terbayar', 2, 102, '2018-07-18 15:14:22', 2);
INSERT INTO `pesanan` VALUES ('ERP18072018-001', 3, 'terbayar', 2, 102, '2018-07-18 15:14:25', 2);
INSERT INTO `pesanan` VALUES ('ERP18072018-002', 2, 'terbayar', 1, 21, '2018-07-18 19:06:17', 1);
INSERT INTO `pesanan` VALUES ('ERP18072018-002', 1, 'terbayar', 1, 21, '2018-07-18 19:06:17', 1);
INSERT INTO `pesanan` VALUES ('ERP18072018-003', 3, 'terbayar', 1, 1321, '2018-07-18 19:15:19', 1);
INSERT INTO `pesanan` VALUES ('ERP18072018-004', 3, 'terbayar', 1, 1, '2018-07-18 20:06:31', 1);
INSERT INTO `pesanan` VALUES ('ERP18072018-005', 2, 'terbayar', 1, 100, '2018-07-18 20:15:43', 1);
INSERT INTO `pesanan` VALUES ('ERP18072018-006', 3, 'terbayar', 1, 2, '2018-07-18 20:16:48', 1);
INSERT INTO `pesanan` VALUES ('ERP18072018-007', 3, 'terbayar', 1, 3, '2018-07-18 20:17:42', 1);
INSERT INTO `pesanan` VALUES ('ERP18072018-008', 3, 'terbayar', 1, 4, '2018-07-18 20:19:53', 1);
INSERT INTO `pesanan` VALUES ('ERP18072018-009', 3, 'terbayar', 3, 2, '2018-07-18 21:25:09', 1);
INSERT INTO `pesanan` VALUES ('ERP18072018-010', 3, 'terbayar', 3, 1, '2018-07-18 21:48:24', 1);
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(10) COLLATE utf8_swedish_ci DEFAULT NULL,
  `level` varchar(20) COLLATE utf8_swedish_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES (1, 'Arif', 'kasir', 'arif', '0FF6C3ACE16359E41E37D40B8301D67F');
INSERT INTO `user` VALUES (2, 'Susi', 'pelayan', 'susi', '536931D80DECB18C33DB9612BDD004D4');
INSERT INTO `user` VALUES (3, 'faris', 'pelayan', 'faris', '7D77E825B80CFF62A72E680C1C81424F');
INSERT INTO `user` VALUES (6, 'indro', 'kasir', 'indro', '82a0ac33dc3e8f9ab3ca9238826ca56b');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
