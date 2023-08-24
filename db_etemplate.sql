/*
 Navicat Premium Data Transfer

 Source Server         : Laragon MySQL
 Source Server Type    : MySQL
 Source Server Version : 80034 (8.0.34)
 Source Host           : localhost:3306
 Source Schema         : db_etemplate

 Target Server Type    : MySQL
 Target Server Version : 80034 (8.0.34)
 File Encoding         : 65001

 Date: 19/08/2023 16:32:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED NULL DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for media
-- ----------------------------
DROP TABLE IF EXISTS `media`;
CREATE TABLE `media`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `collection_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `media_uuid_unique`(`uuid` ASC) USING BTREE,
  INDEX `media_model_type_model_id_index`(`model_type` ASC, `model_id` ASC) USING BTREE,
  INDEX `media_order_column_index`(`order_column` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of media
-- ----------------------------
INSERT INTO `media` VALUES (2, 'App\\Models\\User', 1, '587e1070-a509-4967-b21e-dcb7cf1efc8f', 'profile-image', 'a5ff2565-428f-4469-a6d1-1f7c607bb9d1', 'a5ff2565-428f-4469-a6d1-1f7c607bb9d1.JPG', 'image/jpeg', 'public', 'public', 99255, '[]', '[]', '{\"preview\": true}', '[]', 1, '2023-08-18 00:45:35', '2023-08-18 00:45:36');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_11_22_075938_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (6, '2022_11_24_045841_add_column_to_permissions_table', 1);
INSERT INTO `migrations` VALUES (7, '2022_11_29_075437_add_columns_to_users_table', 1);
INSERT INTO `migrations` VALUES (8, '2022_11_29_092803_create_pending_user_emails_table', 1);
INSERT INTO `migrations` VALUES (9, '2022_11_29_120935_create_media_table', 1);
INSERT INTO `migrations` VALUES (10, '2022_12_12_104230_create_settings_table', 1);
INSERT INTO `migrations` VALUES (11, '2022_12_12_105531_create_general_settings', 1);
INSERT INTO `migrations` VALUES (12, '2023_01_03_064912_create_jobs_table', 1);
INSERT INTO `migrations` VALUES (13, '2023_08_17_070720_create_owners_table', 2);
INSERT INTO `migrations` VALUES (14, '2023_08_17_085213_create_product_types_table', 3);
INSERT INTO `migrations` VALUES (15, '2023_08_17_103540_create_product_categories_table', 4);
INSERT INTO `migrations` VALUES (16, '2023_08_17_123751_create_products_table', 5);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 2);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 3);

-- ----------------------------
-- Table structure for owners
-- ----------------------------
DROP TABLE IF EXISTS `owners`;
CREATE TABLE `owners`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of owners
-- ----------------------------
INSERT INTO `owners` VALUES (5, 'Dikki Nur Rahmat', '082225904118', 'Muntang', '2023-08-18 00:22:57', '2023-08-18 00:22:57');
INSERT INTO `owners` VALUES (6, 'Salsabilla Natasya Ariandi', '085155225719', 'Tegalpingen', '2023-08-18 00:23:21', '2023-08-18 00:23:21');
INSERT INTO `owners` VALUES (7, 'Puput Winanda', '087737056561', 'Panican', '2023-08-18 00:23:38', '2023-08-18 00:23:38');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for pending_user_emails
-- ----------------------------
DROP TABLE IF EXISTS `pending_user_emails`;
CREATE TABLE `pending_user_emails`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pending_user_emails_user_type_user_id_index`(`user_type` ASC, `user_id` ASC) USING BTREE,
  INDEX `pending_user_emails_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pending_user_emails
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'user create', 'user', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (2, 'user update', 'user', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (3, 'user delete', 'user', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (4, 'user show', 'user', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (5, 'user index', 'user', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (6, 'permission index', 'permission', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (7, 'permission create', 'permission', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (8, 'permission update', 'permission', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (9, 'permission delete', 'permission', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (10, 'permission show', 'permission', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (11, 'role index', 'role', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (12, 'role create', 'role', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (13, 'role update', 'role', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (14, 'role delete', 'role', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (15, 'role show', 'role', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (16, 'database_backup viewAny', 'database_backup', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (17, 'database_backup create', 'database_backup', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (18, 'database_backup delete', 'database_backup', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (19, 'database_backup download', 'database_backup', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (20, 'menu users_list', 'menu', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (21, 'menu role_permission', 'menu', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (22, 'menu role_permission_permissions', 'menu', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (23, 'menu role_permission_roles', 'menu', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (24, 'menu database_backup', 'menu', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `permissions` VALUES (25, 'owner index', 'owner', 'web', '2023-08-17 07:27:08', '2023-08-17 07:27:10');
INSERT INTO `permissions` VALUES (26, 'owner create', 'owner', 'web', '2023-08-17 07:27:55', '2023-08-17 07:28:03');
INSERT INTO `permissions` VALUES (27, 'owner update', 'owner', 'web', '2023-08-17 07:27:58', '2023-08-17 07:28:06');
INSERT INTO `permissions` VALUES (28, 'owner delete', 'owner', 'web', '2023-08-17 07:28:00', '2023-08-17 07:28:09');
INSERT INTO `permissions` VALUES (29, 'product_type index', 'product_type', 'web', '2023-08-17 09:50:38', '2023-08-17 09:50:40');
INSERT INTO `permissions` VALUES (30, 'product_type create', 'product_type', 'web', '2023-08-17 09:50:59', '2023-08-17 09:51:02');
INSERT INTO `permissions` VALUES (31, 'product_type update', 'product_type', 'web', '2023-08-17 09:51:37', '2023-08-17 09:51:42');
INSERT INTO `permissions` VALUES (32, 'product_type delete', 'product_type', 'web', '2023-08-17 09:51:39', '2023-08-17 09:51:44');
INSERT INTO `permissions` VALUES (33, 'product_category index', 'product_category', 'web', '2023-08-17 11:20:48', '2023-08-17 11:20:51');
INSERT INTO `permissions` VALUES (34, 'product_category create', 'product_category', 'web', '2023-08-17 11:20:53', '2023-08-17 11:20:55');
INSERT INTO `permissions` VALUES (35, 'product_category update', 'product_category', 'web', '2023-08-17 11:20:58', '2023-08-17 11:21:00');
INSERT INTO `permissions` VALUES (36, 'product_category delete', 'product_category', 'web', '2023-08-17 11:21:02', '2023-08-17 11:21:05');
INSERT INTO `permissions` VALUES (37, 'product index', 'product', 'web', '2023-08-17 14:22:31', '2023-08-17 14:22:42');
INSERT INTO `permissions` VALUES (38, 'product create', 'product', 'web', '2023-08-17 14:22:34', '2023-08-17 14:22:45');
INSERT INTO `permissions` VALUES (39, 'product update', 'product', 'web', '2023-08-17 14:22:36', '2023-08-17 14:22:48');
INSERT INTO `permissions` VALUES (40, 'product delete', 'product', 'web', '2023-08-17 14:22:39', '2023-08-17 14:22:50');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for product_categories
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_categories
-- ----------------------------
INSERT INTO `product_categories` VALUES (7, 'Jual Tanah', '2023-08-18 00:24:08', '2023-08-18 00:24:24');
INSERT INTO `product_categories` VALUES (8, 'Sewa Tanah', '2023-08-18 00:24:18', '2023-08-18 00:24:18');
INSERT INTO `product_categories` VALUES (9, 'Siap Panen', '2023-08-18 00:24:34', '2023-08-18 00:24:34');
INSERT INTO `product_categories` VALUES (10, 'Hasil Panen', '2023-08-18 00:24:41', '2023-08-18 00:24:41');

-- ----------------------------
-- Table structure for product_types
-- ----------------------------
DROP TABLE IF EXISTS `product_types`;
CREATE TABLE `product_types`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_types
-- ----------------------------
INSERT INTO `product_types` VALUES (6, 'Padi', '2023-08-18 00:23:50', '2023-08-18 00:24:49');
INSERT INTO `product_types` VALUES (7, 'Tanah', '2023-08-18 00:23:55', '2023-08-18 00:23:55');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `period` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_categories_id` bigint UNSIGNED NOT NULL,
  `product_type_id` bigint UNSIGNED NOT NULL,
  `owner_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `product_categories_id`(`product_categories_id` ASC, `product_type_id` ASC, `owner_id` ASC) USING BTREE,
  INDEX `owner_id`(`owner_id` ASC) USING BTREE,
  INDEX `product_type_id`(`product_type_id` ASC) USING BTREE,
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_ibfk_3` FOREIGN KEY (`product_categories_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (12, 'Padi 1', '1 Kg', NULL, 'Indonesia', 'Padi 1', 9, 6, 5, '2023-08-18 00:25:18', '2023-08-18 00:25:18');
INSERT INTO `products` VALUES (13, 'Padi 2', '2 Kg', NULL, 'Indonesia', 'Padi 2', 10, 7, 7, '2023-08-18 00:25:39', '2023-08-18 14:02:27');
INSERT INTO `products` VALUES (14, 'Padi 3', '3 Kg', NULL, 'Indonesia', 'Padi 3', 10, 6, 7, '2023-08-18 00:26:35', '2023-08-18 00:26:35');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (2, 1);
INSERT INTO `role_has_permissions` VALUES (3, 1);
INSERT INTO `role_has_permissions` VALUES (4, 1);
INSERT INTO `role_has_permissions` VALUES (5, 1);
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (7, 1);
INSERT INTO `role_has_permissions` VALUES (8, 1);
INSERT INTO `role_has_permissions` VALUES (9, 1);
INSERT INTO `role_has_permissions` VALUES (10, 1);
INSERT INTO `role_has_permissions` VALUES (11, 1);
INSERT INTO `role_has_permissions` VALUES (12, 1);
INSERT INTO `role_has_permissions` VALUES (13, 1);
INSERT INTO `role_has_permissions` VALUES (14, 1);
INSERT INTO `role_has_permissions` VALUES (15, 1);
INSERT INTO `role_has_permissions` VALUES (16, 1);
INSERT INTO `role_has_permissions` VALUES (17, 1);
INSERT INTO `role_has_permissions` VALUES (18, 1);
INSERT INTO `role_has_permissions` VALUES (19, 1);
INSERT INTO `role_has_permissions` VALUES (20, 1);
INSERT INTO `role_has_permissions` VALUES (21, 1);
INSERT INTO `role_has_permissions` VALUES (22, 1);
INSERT INTO `role_has_permissions` VALUES (23, 1);
INSERT INTO `role_has_permissions` VALUES (24, 1);
INSERT INTO `role_has_permissions` VALUES (25, 1);
INSERT INTO `role_has_permissions` VALUES (26, 1);
INSERT INTO `role_has_permissions` VALUES (27, 1);
INSERT INTO `role_has_permissions` VALUES (28, 1);
INSERT INTO `role_has_permissions` VALUES (29, 1);
INSERT INTO `role_has_permissions` VALUES (30, 1);
INSERT INTO `role_has_permissions` VALUES (31, 1);
INSERT INTO `role_has_permissions` VALUES (32, 1);
INSERT INTO `role_has_permissions` VALUES (33, 1);
INSERT INTO `role_has_permissions` VALUES (34, 1);
INSERT INTO `role_has_permissions` VALUES (35, 1);
INSERT INTO `role_has_permissions` VALUES (36, 1);
INSERT INTO `role_has_permissions` VALUES (37, 1);
INSERT INTO `role_has_permissions` VALUES (38, 1);
INSERT INTO `role_has_permissions` VALUES (39, 1);
INSERT INTO `role_has_permissions` VALUES (40, 1);
INSERT INTO `role_has_permissions` VALUES (1, 2);
INSERT INTO `role_has_permissions` VALUES (2, 2);
INSERT INTO `role_has_permissions` VALUES (3, 2);
INSERT INTO `role_has_permissions` VALUES (4, 2);
INSERT INTO `role_has_permissions` VALUES (5, 2);
INSERT INTO `role_has_permissions` VALUES (6, 2);
INSERT INTO `role_has_permissions` VALUES (8, 2);
INSERT INTO `role_has_permissions` VALUES (10, 2);
INSERT INTO `role_has_permissions` VALUES (11, 2);
INSERT INTO `role_has_permissions` VALUES (13, 2);
INSERT INTO `role_has_permissions` VALUES (15, 2);
INSERT INTO `role_has_permissions` VALUES (20, 2);
INSERT INTO `role_has_permissions` VALUES (21, 2);
INSERT INTO `role_has_permissions` VALUES (22, 2);
INSERT INTO `role_has_permissions` VALUES (23, 2);
INSERT INTO `role_has_permissions` VALUES (2, 3);
INSERT INTO `role_has_permissions` VALUES (4, 3);
INSERT INTO `role_has_permissions` VALUES (5, 3);
INSERT INTO `role_has_permissions` VALUES (20, 3);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'super-admin', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `roles` VALUES (2, 'admin', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');
INSERT INTO `roles` VALUES (3, 'user', 'web', '2023-08-14 09:04:55', '2023-08-14 09:04:55');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locked` tinyint(1) NOT NULL,
  `payload` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `settings_group_index`(`group` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'general-settings', 'logo', 0, '\"https://ifl3x.me/images/logo.svg\"', '2023-08-14 09:02:27', '2023-08-14 09:02:27');
INSERT INTO `settings` VALUES (2, 'general-settings', 'favicon', 0, '\"https://ifl3x.me/images/favicon.png\"', '2023-08-14 09:02:27', '2023-08-14 09:02:27');
INSERT INTO `settings` VALUES (3, 'general-settings', 'dark_logo', 0, '\"https://ifl3x.me/images/dark-logo.svg\"', '2023-08-14 09:02:27', '2023-08-14 09:02:27');
INSERT INTO `settings` VALUES (4, 'general-settings', 'guest_logo', 0, '\"https://ifl3x.me/images/guest-logo.svg\"', '2023-08-14 09:02:27', '2023-08-14 09:02:27');
INSERT INTO `settings` VALUES (5, 'general-settings', 'guest_background', 0, '\"https://ifl3x.me/images/guest-background.svg\"', '2023-08-14 09:02:27', '2023-08-14 09:02:27');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `post_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'RainPedia', 'rainpedia@icloud.com', NULL, NULL, NULL, NULL, '2023-08-14 09:04:56', '$2y$10$1YAjgZGORp4QCbf6GwgR8ug7ThrvCvuTSTS1ZJzGHlnKfHyhPEm26', '3uOsi22mpI6LVxJrFuYtTwVaWJNHSsjVNuoCaxw2b0DnStAo3k0j8bTTiWtY', '2023-08-14 09:04:56', '2023-08-14 09:04:56');
INSERT INTO `users` VALUES (2, 'iFlex', 'ifl3xvn@gmail.com', NULL, NULL, NULL, NULL, '2023-08-14 09:04:56', '$2y$10$21NKEf10lGJ5g4zFnOhhPOGvYR33qtzqCG0wQfkeKHHJe9Jb5t4wG', NULL, '2023-08-14 09:04:56', '2023-08-14 09:04:56');
INSERT INTO `users` VALUES (3, 'Salsabilla Natasya', 'ntysabila@icloud.com', NULL, NULL, NULL, NULL, '2023-08-14 09:04:56', '$2y$10$kLgmFWzwhdQ8xfNnP14TseuHN6xYv.gB9PbzyPHT2Cu.vgKFaBLbC', NULL, '2023-08-14 09:04:56', '2023-08-14 09:04:56');

SET FOREIGN_KEY_CHECKS = 1;
