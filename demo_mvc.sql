-- database for test mvc demo basic
-- dbname: demo_mvc
-- Date 11 06 2024

-- Table structure for users
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table users
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john@example.com', '$2y$10$TKh8H1.POLC1IH/33mpZnOghqugu4DePErdiiq.LJxCZN5k6.ZXYa', NULL, '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(2, 'Jane Doe', 'jane@example.com', '$2y$10$TKh8H1.POLC1IH/33mpZnOghqugu4DePErdiiq.LJxCZN5k6.ZXYa', NULL, '2023-01-01 00:00:00', '2023-01-01 00:00:00');

-- Table structure for password_resets
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table password_resets
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('john@example.com', 'token123', '2023-01-01 00:00:00'),
('jane@example.com', 'token456', '2023-01-01 00:00:00');

-- Table structure for posts
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table posts
INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 'First Post', 'This is the body of the first post.', '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(2, 2, 'Second Post', 'This is the body of the second post.', '2023-01-01 00:00:00', '2023-01-01 00:00:00');

-- Table structure for categories
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table categories
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Fruits', 'Fresh and organic fruits', '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(2, 'Vegetables', 'Healthy and green vegetables', '2023-01-01 00:00:00', '2023-01-01 00:00:00');

-- Table structure for products
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table products
INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Apple', 'Fresh red apples', 1.20, '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(2, 1, 'Banana', 'Organic bananas', 0.80, '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(3, 2, 'Carrot', 'Crunchy carrots', 0.50, '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(4, 2, 'Broccoli', 'Fresh green broccoli', 1.50, '2023-01-01 00:00:00', '2023-01-01 00:00:00');
