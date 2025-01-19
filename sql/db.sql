-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pos
CREATE DATABASE IF NOT EXISTS `pos` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pos`;

-- Dumping structure for table pos.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos.categories: ~3 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
	(1, 'Medicin', 1, 1, '2025-01-10 18:52:35', '2025-01-10 18:53:25', 1),
	(2, 'Grosary', 1, 1, '2025-01-11 09:25:29', '2025-01-11 14:54:35', 1),
	(20, 'Other', 1, 1, '2025-01-11 14:54:11', '2025-01-11 14:54:11', NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table pos.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos.customers: ~11 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
	(4, 'Sarowar', 'sarowar@gmail.com', '01908032671', 'dinajpur', 1, 1, '2025-01-11 12:09:36', '2025-01-16 05:57:56', 1),
	(8, 'Hasibul', 'hasibul@gmail.com', '01806584324', 'khilkhet dhaka', 1, 1, '2025-01-11 14:56:04', '2025-01-11 14:56:04', NULL),
	(9, 'Sarowar Saykat', 'sarowarsaykat@gmail.com', '01908032671', 'dinajpur', 1, 1, '2025-01-16 05:57:47', '2025-01-16 05:57:47', NULL),
	(10, 'sourov', 'sourov@gmail.com', '01753647124', 'Bogra', 1, 1, '2025-01-18 04:39:12', '2025-01-18 04:39:12', NULL),
	(11, 'Monayem', 'monayem@gmail.com', '01825461571', 'sylhet', 1, 1, '2025-01-18 04:40:14', '2025-01-18 04:40:14', NULL),
	(12, 'Polash', 'polash@gmail.com', '01924642458', 'Rangpur', 1, 1, '2025-01-18 04:41:30', '2025-01-18 04:41:30', NULL),
	(13, 'Ali Akbor', 'akbor@gmail.com', '01723255464', 'chapainawabgonj', 1, 1, '2025-01-18 04:42:57', '2025-01-18 04:42:57', NULL),
	(14, 'Masud', 'masud@gamil.com', '01941642451', 'Cumilla', 1, 1, '2025-01-18 05:24:28', '2025-01-18 05:24:28', NULL),
	(15, 'Nirob', 'nirob@gmail.com', '01824612457', 'dinajpur', 1, 1, '2025-01-18 05:25:55', '2025-01-18 05:25:55', NULL),
	(16, 'Almad Hasan', 'almadhasan@gmail.com', '01624648241', 'Rajshahi', 1, 1, '2025-01-18 05:26:54', '2025-01-18 05:26:54', NULL),
	(17, 'Abir hasan', 'abirhasan@gmail.com', '01806584324', 'borobag mirpur-2', 1, 1, '2025-01-18 05:27:54', '2025-01-18 05:27:54', NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table pos.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table pos.manufacturers
CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos.manufacturers: ~7 rows (approximately)
/*!40000 ALTER TABLE `manufacturers` DISABLE KEYS */;
INSERT INTO `manufacturers` (`id`, `company_name`, `country`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
	(1, 'Squar', 'Bangladesh', 1, 1, '2025-01-10 18:54:33', '2025-01-11 14:38:17', 1),
	(2, 'Magna', 'Japan', 1, 1, '2025-01-13 11:06:19', '2025-01-13 11:06:19', NULL),
	(3, 'Super Software', 'Bangladesh', 1, 1, '2025-01-13 11:17:08', '2025-01-13 11:17:08', NULL),
	(4, 'Incepta Pharmaceuticals Ltd.', 'Japan', 1, 1, '2025-01-18 04:48:29', '2025-01-18 04:48:29', NULL),
	(5, 'ACI Limited', 'Nepal', 1, 1, '2025-01-18 05:01:50', '2025-01-18 05:01:50', NULL),
	(6, 'Emergent BioSolutions', 'Bangladesh', 1, 1, '2025-01-18 05:31:11', '2025-01-18 05:31:11', NULL),
	(7, '3M Health Care', 'India', 1, 1, '2025-01-18 05:35:57', '2025-01-18 05:35:57', NULL);
/*!40000 ALTER TABLE `manufacturers` ENABLE KEYS */;

-- Dumping structure for table pos.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos.migrations: ~33 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2025_01_09_100824_create_manufacturers_table', 1),
	(6, '2025_01_09_112900_create_categories_table', 2),
	(7, '2025_01_09_141757_create_units_table', 3),
	(8, '2025_01_09_162630_create_sub_categories_table', 4),
	(9, '2025_01_10_182521_create_categories_table', 5),
	(10, '2025_01_10_182521_create_units_table', 5),
	(11, '2025_01_10_182612_create_sub_categories_table', 5),
	(12, '2025_01_10_184609_create_manufacturers_table', 6),
	(13, '2025_01_11_054031_create_customars_table', 7),
	(14, '2025_01_11_054547_create_customers_table', 8),
	(15, '2025_01_11_060811_create_customers_table', 9),
	(16, '2025_01_11_064248_create_customers_table', 10),
	(17, '2025_01_11_121146_create_suppliers_table', 11),
	(18, '2025_01_11_125303_create_suppliers_table', 12),
	(19, '2025_01_13_094402_create_products_table', 13),
	(20, '2025_01_13_164112_create_products_table', 14),
	(21, '2025_01_13_181130_create_sales_master_table', 15),
	(22, '2025_01_13_181136_create_sales_details_table', 15),
	(23, '2025_01_15_035026_create_products_table', 16),
	(24, '2025_01_15_050729_create_products_table', 17),
	(25, '2025_01_15_164450_create_sales_master_table', 18),
	(26, '2025_01_15_164452_create_sales_details_table', 18),
	(27, '2025_01_15_174948_create_sales_masters_table', 19),
	(28, '2025_01_16_102151_create_purchase_master_table', 20),
	(29, '2025_01_16_102153_create_purchase_details_table', 20),
	(30, '2025_01_16_160912_create_purchase_masters_table', 21),
	(31, '2025_01_17_093729_create_sales_details_table', 22),
	(32, '2025_01_17_093741_create_sales_masters_table', 22),
	(33, '2025_01_17_112246_create_sales_details_table', 23);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table pos.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos.password_reset_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping structure for table pos.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table pos.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos.products: ~6 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `category_id`, `subcategory_id`, `manufacturer_id`, `unit_id`, `purchase_price`, `sale_price`, `stock`, `image`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
	(1, 'Napa Extra', 1, 3, 2, 2, 250.00, 300.00, 20, '1736917683.jpg', 1, 1, '2025-01-15 05:08:04', '2025-01-15 16:22:59', NULL),
	(2, 'perasita mol', 1, 3, 2, 3, 120.00, 130.00, 20, '1736939849.jpg', 1, 1, '2025-01-15 11:17:29', '2025-01-15 16:24:46', NULL),
	(3, 'Omeprazole', 1, 3, 5, 3, 40.00, 45.00, 250, '1737176663.jpg', 1, 1, '2025-01-18 05:04:23', '2025-01-18 05:04:23', NULL),
	(4, 'Renovo', 1, 3, 1, 2, 20.00, 25.00, 200, '1737176745.jpg', 1, 1, '2025-01-18 05:05:45', '2025-01-18 05:05:45', NULL),
	(5, 'Lozicum', 1, 3, 2, 2, 50.00, 55.00, 500, '1737176839.webp', 1, 1, '2025-01-18 05:07:19', '2025-01-18 05:07:19', NULL),
	(7, 'Abdorin', 1, 1, 7, 3, 120.00, 125.00, 20, '1737178809.jpg', 1, 1, '2025-01-18 05:40:09', '2025-01-18 05:40:09', NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table pos.purchase_details
CREATE TABLE IF NOT EXISTS `purchase_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_master_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos.purchase_details: ~5 rows (approximately)
/*!40000 ALTER TABLE `purchase_details` DISABLE KEYS */;
INSERT INTO `purchase_details` (`id`, `purchase_master_id`, `product_id`, `unit_id`, `purchase_price`, `quantity`, `total`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
	(1, 1, 1, 2, 20.00, 2.00, 40.00, NULL, '2025-01-16 16:10:13', '2025-01-16 17:21:13', NULL),
	(7, 5, 1, 3, 12.00, 10.00, 120.00, NULL, '2025-01-17 05:21:44', '2025-01-17 05:30:19', NULL),
	(8, 5, 1, 2, 12.00, 12.00, 144.00, NULL, '2025-01-17 05:21:44', '2025-01-17 05:30:19', NULL),
	(9, 5, 2, 3, 23.00, 10.00, 230.00, NULL, '2025-01-17 05:21:44', '2025-01-17 05:30:19', NULL),
	(10, 5, 2, 2, 23.00, 15.00, 345.00, NULL, '2025-01-17 05:21:44', '2025-01-17 05:30:19', NULL);
/*!40000 ALTER TABLE `purchase_details` ENABLE KEYS */;

-- Dumping structure for table pos.purchase_masters
CREATE TABLE IF NOT EXISTS `purchase_masters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `total_quantity` decimal(10,2) NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos.purchase_masters: ~2 rows (approximately)
/*!40000 ALTER TABLE `purchase_masters` DISABLE KEYS */;
INSERT INTO `purchase_masters` (`id`, `supplier_id`, `purchase_date`, `total_quantity`, `total_amount`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
	(1, 3, '2025-01-16', 2.00, 40.00, 1, '2025-01-16 16:10:13', '2025-01-16 17:21:13', NULL),
	(5, 1, '2025-01-17', 47.00, 839.00, 1, '2025-01-17 05:21:43', '2025-01-17 05:30:19', NULL);
/*!40000 ALTER TABLE `purchase_masters` ENABLE KEYS */;

-- Dumping structure for table pos.sales_details
CREATE TABLE IF NOT EXISTS `sales_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sales_master_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_price` decimal(15,2) NOT NULL,
  `sale_price` decimal(15,2) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos.sales_details: ~1 rows (approximately)
/*!40000 ALTER TABLE `sales_details` DISABLE KEYS */;
INSERT INTO `sales_details` (`id`, `sales_master_id`, `product_id`, `purchase_price`, `sale_price`, `quantity`, `total`, `unit`, `stock`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
	(2, 30, 2, 120.00, 130.00, 58.00, 7540.00, 'Piece', 20, NULL, '2025-01-17 11:40:15', '2025-01-17 11:40:15', NULL);
/*!40000 ALTER TABLE `sales_details` ENABLE KEYS */;

-- Dumping structure for table pos.sales_masters
CREATE TABLE IF NOT EXISTS `sales_masters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `sale_date` date NOT NULL,
  `total_quantity` decimal(10,2) NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` decimal(15,2) NOT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos.sales_masters: ~1 rows (approximately)
/*!40000 ALTER TABLE `sales_masters` DISABLE KEYS */;
INSERT INTO `sales_masters` (`id`, `customer_id`, `sale_date`, `total_quantity`, `total_amount`, `payment_method`, `payment`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
	(30, 8, '2025-01-17', 58.00, 7540.00, 'Bkash', 500.00, 1, '2025-01-17 11:39:16', '2025-01-17 11:40:15', 1);
/*!40000 ALTER TABLE `sales_masters` ENABLE KEYS */;

-- Dumping structure for table pos.sub_categories
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_categories_category_id_foreign` (`category_id`),
  CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos.sub_categories: ~2 rows (approximately)
/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS */;
INSERT INTO `sub_categories` (`id`, `name`, `category_id`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
	(1, 'Sirap', 1, 1, 1, '2025-01-10 18:53:59', '2025-01-13 11:01:05', 1),
	(3, 'Tablet', 1, 1, 1, '2025-01-11 14:26:21', '2025-01-13 11:01:10', 1);
/*!40000 ALTER TABLE `sub_categories` ENABLE KEYS */;

-- Dumping structure for table pos.suppliers
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `suppliers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos.suppliers: ~6 rows (approximately)
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
	(1, 'Sarowar Saykat', 'sarowar@gmail.com', '01908032671', 'dhaka', 1, 1, '2025-01-11 12:53:54', '2025-01-16 05:58:35', 1),
	(3, 'Imran Hossain', 'imran@gmail.com', '01908032671', 'Rajshahi', 1, 1, '2025-01-11 14:55:23', '2025-01-11 14:55:37', 1),
	(4, 'kamrul hasan', 'kamrul@gmail.com', '01908032671', 'borobag mirpur-2', 1, 1, '2025-01-16 05:59:12', '2025-01-16 05:59:12', NULL),
	(5, 'Jaman', 'jaman@gmail.com', '01806584324', 'Bogra', 1, 1, '2025-01-18 05:46:10', '2025-01-18 05:46:10', NULL),
	(6, 'Nahid Ali', 'nahid@gamil.com', '01956432424', 'Naogaon', 1, 1, '2025-01-18 05:47:56', '2025-01-18 05:47:56', NULL),
	(7, 'Alis islam', 'alis@gmail.com', '01723220124', 'Kagipara Dhaka', 1, 1, '2025-01-18 05:48:56', '2025-01-18 05:48:56', NULL);
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;

-- Dumping structure for table pos.units
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos.units: ~4 rows (approximately)
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` (`id`, `name`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
	(1, 'Kg', 1, 1, '2025-01-10 18:55:20', '2025-01-15 13:47:14', 1),
	(2, 'Dojon', 1, 1, '2025-01-13 11:02:03', '2025-01-15 13:58:46', 1),
	(3, 'Piece', 1, 1, '2025-01-15 13:48:06', '2025-01-15 13:53:25', 1),
	(4, 'Liter', 1, 1, '2025-01-15 13:52:12', '2025-01-15 13:52:12', NULL);
/*!40000 ALTER TABLE `units` ENABLE KEYS */;

-- Dumping structure for table pos.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'sarowar', 'sarowar@gmail.com', NULL, '$2y$10$o/fYKy1nCNW9EamCGdQzv.N.6Qa31RXqAnBKMR2AijIxiYEPWeJj6', NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
