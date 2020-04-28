/*
 Navicat Premium Data Transfer

 Source Server         : XAMPP
 Source Server Type    : MySQL
 Source Server Version : 100128
 Source Host           : localhost:3306
 Source Schema         : ptsp

 Target Server Type    : MySQL
 Target Server Version : 100128
 File Encoding         : 65001

 Date: 29/04/2020 02:50:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ci_sessions
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions`  (
  `id` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  INDEX `ci_sessions_timestamp`(`timestamp`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_bagian
-- ----------------------------
DROP TABLE IF EXISTS `tbl_bagian`;
CREATE TABLE `tbl_bagian`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bagian` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `singkatan` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_bagian
-- ----------------------------
INSERT INTO `tbl_bagian` VALUES (1, 'Front Office', 'Fo');
INSERT INTO `tbl_bagian` VALUES (2, 'Back Office', 'Bo');
INSERT INTO `tbl_bagian` VALUES (3, 'Kepala Kankemenag', 'Ka');
INSERT INTO `tbl_bagian` VALUES (4, 'Kasubag TU', 'Tu');
INSERT INTO `tbl_bagian` VALUES (5, 'Satker', 'Sk');

-- ----------------------------
-- Table structure for tbl_berkas
-- ----------------------------
DROP TABLE IF EXISTS `tbl_berkas`;
CREATE TABLE `tbl_berkas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_layanan` int(11) NULL DEFAULT NULL,
  `id_ref_berkas` int(11) NULL DEFAULT NULL,
  `file` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ket` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_berkas
-- ----------------------------
INSERT INTO `tbl_berkas` VALUES (1, 2, 1, '2-1-surat_permohonan.jpg', 'Contoh');

-- ----------------------------
-- Table structure for tbl_layanan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_layanan`;
CREATE TABLE `tbl_layanan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_satker` int(11) NULL DEFAULT NULL,
  `id_ref_layanan` int(11) NULL DEFAULT NULL,
  `pemohon` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hp` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fo_acc` int(1) NULL DEFAULT 0,
  `fo_acc_tanggal` datetime(0) NULL DEFAULT '1990-01-01 01:01:01',
  `fo_ket` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `bo_acc` int(1) NULL DEFAULT 0,
  `bo_acc_tanggal` datetime(0) NULL DEFAULT '1990-01-01 01:01:01',
  `bo_ket` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `bo_notif` int(1) NULL DEFAULT 0,
  `ka_acc` int(1) NULL DEFAULT 0,
  `ka_acc_tanggal` datetime(0) NULL DEFAULT '1990-01-01 01:01:01',
  `ka_ket` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `ka_notif` int(1) NULL DEFAULT 0,
  `tu_acc` int(1) NULL DEFAULT 0,
  `tu_acc_tanggal` datetime(0) NULL DEFAULT '1990-01-01 01:01:01',
  `tu_ket` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `tu_notif` int(1) NULL DEFAULT 0,
  `satker_acc` int(1) NULL DEFAULT 0,
  `satker_acc_tanggal` datetime(0) NULL DEFAULT '1990-01-01 01:01:01',
  `satker_ket` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `satker_notif` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_layanan
-- ----------------------------
INSERT INTO `tbl_layanan` VALUES (1, 4, 1, 'Toha', '01234567890', 0, '1990-01-01 01:01:01', NULL, 0, '1990-01-01 01:01:01', NULL, 0, 0, '1990-01-01 01:01:01', NULL, 0, 0, '1990-01-01 01:01:01', NULL, 0, 0, '1990-01-01 01:01:01', NULL, 0);
INSERT INTO `tbl_layanan` VALUES (2, 4, 4, 'Toha', '123', 0, '1990-01-01 01:01:01', NULL, 0, '1990-01-01 01:01:01', NULL, 0, 0, '1990-01-01 01:01:01', NULL, 0, 0, '1990-01-01 01:01:01', NULL, 0, 0, '1990-01-01 01:01:01', NULL, 0);

-- ----------------------------
-- Table structure for tbl_ref_berkas
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ref_berkas`;
CREATE TABLE `tbl_ref_berkas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `berkas` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_ref_berkas
-- ----------------------------
INSERT INTO `tbl_ref_berkas` VALUES (1, 'Surat Permohonan');
INSERT INTO `tbl_ref_berkas` VALUES (2, 'FC Pelunasan Umrah');
INSERT INTO `tbl_ref_berkas` VALUES (3, 'FC KTP');
INSERT INTO `tbl_ref_berkas` VALUES (4, 'Surat Kuasa (Jika Perwakilan)');

-- ----------------------------
-- Table structure for tbl_ref_layanan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ref_layanan`;
CREATE TABLE `tbl_ref_layanan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_satker` int(11) NULL DEFAULT NULL,
  `layanan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alur` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_ref_layanan
-- ----------------------------
INSERT INTO `tbl_ref_layanan` VALUES (1, 4, 'Pembatalan Porsi Jamaah Wafat', 'Alur Pelayanan Pembatalan Porsi Jamaah Wafat');
INSERT INTO `tbl_ref_layanan` VALUES (2, 4, 'Pembatalan Porsi Jamaah Karena Sebab Lain', 'Alur Pelayanan Pembatalan Porsi Jamaah Karena Sebab Lain');
INSERT INTO `tbl_ref_layanan` VALUES (3, 4, 'Pembatalan Nomor Validasi', 'Alur Pelayanan Pembatalan Nomor Validasi');
INSERT INTO `tbl_ref_layanan` VALUES (4, 4, 'Penerbitan Surat Rekomendasi Paspor Umrah', 'Alur Pelayanan Penerbitan Surat Rekomendasi Paspor Umrah');
INSERT INTO `tbl_ref_layanan` VALUES (5, 4, 'Penerbitan Surat Keterangan Cuti Calon Jamaah Haji', 'Alur Pelayanan Penerbitan Surat Keterangan Cuti Calon Jamaah Haji');

-- ----------------------------
-- Table structure for tbl_respon
-- ----------------------------
DROP TABLE IF EXISTS `tbl_respon`;
CREATE TABLE `tbl_respon`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_layanan` int(11) NULL DEFAULT NULL,
  `id_bagian` int(11) NULL DEFAULT NULL,
  `respon` int(1) NULL DEFAULT 0 COMMENT '1. Terima; 2. Tolak',
  `respon_tanggal` datetime(0) NULL DEFAULT '1990-01-01 01:01:01',
  `keterangan` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_respon
-- ----------------------------
INSERT INTO `tbl_respon` VALUES (1, 2, 1, 1, '2020-04-29 01:01:01', NULL);

-- ----------------------------
-- Table structure for tbl_satker
-- ----------------------------
DROP TABLE IF EXISTS `tbl_satker`;
CREATE TABLE `tbl_satker`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `satker` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_satker
-- ----------------------------
INSERT INTO `tbl_satker` VALUES (1, 'Umum', 'um');
INSERT INTO `tbl_satker` VALUES (2, 'Kepegawaian', 'peg');
INSERT INTO `tbl_satker` VALUES (3, 'Keuangan', 'keu');
INSERT INTO `tbl_satker` VALUES (4, 'Haji dan Umrah', 'phu');
INSERT INTO `tbl_satker` VALUES (5, 'Penmad', 'penmad');
INSERT INTO `tbl_satker` VALUES (6, 'PD Pontren', 'pdpontren');
INSERT INTO `tbl_satker` VALUES (7, 'Bimas Islam', 'bimas');
INSERT INTO `tbl_satker` VALUES (8, 'Gara Syari\'ah', 'garasyariah');

-- ----------------------------
-- Table structure for tbl_syarat_berkas
-- ----------------------------
DROP TABLE IF EXISTS `tbl_syarat_berkas`;
CREATE TABLE `tbl_syarat_berkas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_satker` int(11) NULL DEFAULT NULL,
  `id_ref_layanan` int(11) NULL DEFAULT NULL,
  `id_ref_berkas` int(11) NULL DEFAULT NULL,
  `disyaratkan` int(1) NULL DEFAULT NULL COMMENT '1. Disyaratkan; 2. Opsional',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_syarat_berkas
-- ----------------------------
INSERT INTO `tbl_syarat_berkas` VALUES (1, 4, 4, 1, 1);
INSERT INTO `tbl_syarat_berkas` VALUES (2, 4, 4, 2, 1);
INSERT INTO `tbl_syarat_berkas` VALUES (3, 4, 4, 3, 1);
INSERT INTO `tbl_syarat_berkas` VALUES (4, 4, 4, 4, 2);

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `level` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_satker` int(11) NULL DEFAULT NULL,
  `last_login` datetime(0) NULL DEFAULT NULL,
  `locked` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'Administrator', 'admin', 'adminn', 'admin', NULL, NULL, 0);
INSERT INTO `tbl_user` VALUES (2, 'Front Office', 'fo', 'fo', 'fo', NULL, NULL, 0);
INSERT INTO `tbl_user` VALUES (3, 'Back Office', 'bo', 'bo', 'bo', NULL, NULL, 0);
INSERT INTO `tbl_user` VALUES (4, 'Kepala Kankemenag Brebes', 'ka', 'ka', 'ka', NULL, NULL, 0);
INSERT INTO `tbl_user` VALUES (5, 'Kasubag TU', 'tu', 'tu', 'tu', NULL, NULL, 0);
INSERT INTO `tbl_user` VALUES (6, 'Penyelenggara Haji dan Umrah', 'um', 'um', 'sk', 1, NULL, 0);
INSERT INTO `tbl_user` VALUES (7, 'Umum', 'peg', 'peg', 'sk', 2, NULL, 0);
INSERT INTO `tbl_user` VALUES (8, 'Kepegawaian', 'keu', 'keu', 'sk', 3, NULL, 0);
INSERT INTO `tbl_user` VALUES (9, 'Keuangan', 'phu', 'phu', 'sk', 4, NULL, 0);
INSERT INTO `tbl_user` VALUES (10, 'Haji dan Umrah', 'penmad', 'penmad', 'sk', 5, NULL, 0);
INSERT INTO `tbl_user` VALUES (11, 'Penmad', 'pdpontren', 'pdpontren', 'sk', 6, NULL, 0);
INSERT INTO `tbl_user` VALUES (12, 'PD Pontren', 'bimas', 'bimas', 'sk', 7, NULL, 0);
INSERT INTO `tbl_user` VALUES (13, 'Bimas Islam', 'garasyariah', 'garasyariah', 'sk', 8, NULL, 0);

SET FOREIGN_KEY_CHECKS = 1;
