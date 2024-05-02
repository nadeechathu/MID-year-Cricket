-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2023 at 04:40 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '0 => inactive, 1 => active',
  `type` int NOT NULL DEFAULT '0' COMMENT '0 => post, 1 => product',
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title` text COLLATE utf8mb4_unicode_ci,
  `meta_tag_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `canonical_url` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` int DEFAULT NULL,
  `entity` int NOT NULL DEFAULT '0' COMMENT '0 => posts, 1 => products',
  `entity_id` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0 => new, 1 => replied',
  `show` int NOT NULL DEFAULT '0' COMMENT '0 => no show, 1 => show',
  `is_approved` int NOT NULL DEFAULT '0' COMMENT '0 => not approved, 1 => approved',
  `reply_allowed` int NOT NULL DEFAULT '1' COMMENT '0 => replies not allowed, 1 => replies allowed',
  `type` int NOT NULL DEFAULT '0' COMMENT '0 => comments, 1 => reviews',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` bigint UNSIGNED NOT NULL,
  `comment_id` int NOT NULL,
  `reply` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `mailer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `host` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encryption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0 => inactive, 1 => active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `setting_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `setting_key`, `description`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Site Name', NULL, NULL),
(2, 'site_description', 'Site description goes here', NULL, NULL),
(3, 'site_logo', '', NULL, NULL),
(4, 'analytics', NULL, NULL, NULL),
(5, 'facebook_link', '', NULL, NULL),
(6, 'instagram_link', '', NULL, NULL),
(7, 'twitter_link', '', NULL, NULL),
(8, 'youtube_link', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint UNSIGNED NOT NULL,
  `type` int DEFAULT NULL,
  `src` text COLLATE utf8mb4_unicode_ci,
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0 => no show, 1 => show',
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'can be a post image product image etc',
  `entity_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `type`, `src`, `alt_text`, `status`, `heading`, `caption`, `entity`, `entity_id`, `created_at`, `updated_at`) VALUES
(1, 0, 'http://127.0.0.1:8000/images/uploads/slider/slider_dummy.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 0, 'http://127.0.0.1:8000/images/uploads/slider/slider_dummy.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 0, 'http://127.0.0.1:8000/images/uploads/slider/slider_dummy.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 0, 'http://127.0.0.1:8000/images/uploads/slider/slider_dummy.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_09_101328_add_columns_to_users_table', 1),
(6, '2021_12_09_114336_create_table_roles', 1),
(7, '2021_12_10_091632_create_categories_table', 1),
(8, '2021_12_10_112107_create_tags_table', 1),
(9, '2021_12_13_040451_create_posts_table', 1),
(10, '2021_12_16_082612_create_comments_table', 1),
(11, '2021_12_16_090052_create_comment_replies_table', 1),
(12, '2021_12_17_090618_create_tag_post_table', 1),
(13, '2021_12_20_090142_create_pages_table', 1),
(14, '2021_12_20_091207_create_page_descriptions_table', 1),
(15, '2021_12_20_091952_create_page_meta_data', 1),
(16, '2021_12_21_052302_add_column_category_image_to_categories_table', 1),
(17, '2021_12_21_055842_add_column_user_image_to_users_table', 1),
(18, '2021_12_23_073933_add_column_permission_type_to_permissions_table', 1),
(19, '2021_12_28_074213_create_images_table', 1),
(20, '2021_12_28_074717_create_general_settings_table', 1),
(21, '2021_12_28_102416_add_columns_to_posts_table', 1),
(22, '2021_12_29_064855_add_column_slug_to_posts_table', 1),
(23, '2021_12_31_045951_add_seo_columns_to_categories_table', 1),
(24, '2021_12_31_054657_add_canonical_url_column_to_page_meta_data_table', 1),
(25, '2021_12_31_055751_rename_columns_in_page_meta_data_table', 1),
(26, '2022_01_03_065540_create_site_settings_table', 1),
(27, '2022_01_03_084539_create_site_templates_table', 1),
(28, '2022_01_03_114521_add_column_alt_text_to_images_table', 1),
(29, '2022_01_05_102410_create_user_subscriptions_table', 1),
(30, '2022_01_06_044841_create_email_settings_table', 1),
(31, '2022_01_07_084902_add_reset_token_to_users_table', 1),
(32, '2022_01_10_030610_add_image_columns_to_images_table', 1),
(33, '2022_01_10_065724_create_sub_categories_table', 1),
(34, '2022_01_10_070524_add_page-banner_to_pages_table', 1),
(35, '2022_01_10_121222_add_column_to_pages_table', 1),
(36, '2022_01_10_150204_add_template_image_to_site_templates_table', 1),
(37, '2022_01_10_150928_add_banner_template_to_site_settings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `page_heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` text COLLATE utf8mb4_unicode_ci COMMENT '0 => hidden, 1 => visible',
  `entered_by` bigint DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_descriptions`
--

CREATE TABLE `page_descriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `page_id` bigint NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `language_id` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_meta_data`
--

CREATE TABLE `page_meta_data` (
  `id` bigint UNSIGNED NOT NULL,
  `page_id` bigint NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `canonical_url` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'view_posts', 'post', NULL, NULL),
(2, 'add_posts', 'post', NULL, NULL),
(3, 'edit_posts', 'post', NULL, NULL),
(4, 'delete_posts', 'post', NULL, NULL),
(5, 'view_categories', 'category', NULL, NULL),
(6, 'add_categories', 'category', NULL, NULL),
(7, 'edit_categories', 'category', NULL, NULL),
(8, 'delete_categories', 'category', NULL, NULL),
(9, 'view_tags', 'tag', NULL, NULL),
(10, 'add_tags', 'tag', NULL, NULL),
(11, 'edit_tags', 'tag', NULL, NULL),
(12, 'delete_tags', 'tag', NULL, NULL),
(13, 'view_users', 'user', NULL, NULL),
(14, 'add_users', 'user', NULL, NULL),
(15, 'add_comments', 'comment', NULL, NULL),
(16, 'edit_comments', 'comment', NULL, NULL),
(17, 'delete_comments', 'comment', NULL, NULL),
(18, 'approve_posts', 'post', NULL, NULL),
(19, 'view_comments', 'comment', NULL, NULL),
(20, 'add_pages', 'pages', NULL, NULL),
(21, 'view_pages', 'pages', NULL, NULL),
(22, 'add_permissions', 'user', NULL, NULL),
(23, 'view_permissions', 'settings', NULL, NULL),
(24, 'site_settings', 'settings', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '0' COMMENT '0 => draft, 1 => published',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` int NOT NULL DEFAULT '0',
  `type` int NOT NULL DEFAULT '0' COMMENT '0 => blog, 1 => news',
  `user_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `is_approved` int NOT NULL COMMENT '0 => not approved, 1 => approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL COMMENT '0 => inactive, 1 => active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, NULL, NULL),
(2, 'User', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_number` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `section`, `banner_template`, `template_number`, `created_at`, `updated_at`) VALUES
(1, 'header_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29'),
(2, 'slider_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29'),
(3, 'section1_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29'),
(4, 'section2_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29'),
(5, 'section3_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29'),
(6, 'footer_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29'),
(7, 'category_view_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29'),
(8, 'post_view_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29'),
(9, 'post_card_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `site_templates`
--

CREATE TABLE `site_templates` (
  `id` bigint UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_number` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_templates`
--

INSERT INTO `site_templates` (`id`, `section`, `template_image`, `template_number`, `created_at`, `updated_at`) VALUES
(1, 'header_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29'),
(2, 'slider_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29'),
(3, 'section1_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29'),
(4, 'section2_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29'),
(5, 'section3_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29'),
(6, 'footer_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29'),
(7, 'category_view_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29'),
(8, 'post_view_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29'),
(9, 'post_card_template', NULL, 1, '2023-02-06 22:27:29', '2023-02-06 22:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint DEFAULT NULL,
  `sub_category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '0 => inactive, 1 => active',
  `sub_category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canonical_url` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_tag_description` text COLLATE utf8mb4_unicode_ci,
  `page_title` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `tag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int NOT NULL COMMENT '0 => Post, 1 => Product',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL COMMENT '0 => inactive, 1 => active',
  `role_id` int NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `phone`, `last_name`, `first_name`, `username`, `dob`, `status`, `role_id`, `email_verified_at`, `password`, `remember_token`, `password_reset_token`, `user_image`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '0112654987', 'Admin', 'GUI', 'admin@gmail.com', '2022-05-25', 1, 1, NULL, '$2y$10$d23giNH5OmUknEZRcLo88u2XooLWP/qkZoJMsNJB9Cty3s39WvDnK', NULL, NULL, NULL, '2023-02-06 22:54:16', '2023-02-06 22:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_permissions`
--

CREATE TABLE `user_has_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_has_permissions`
--

INSERT INTO `user_has_permissions` (`id`, `user_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(23, 1, 1, NULL, NULL),
(24, 1, 2, NULL, NULL),
(25, 1, 3, NULL, NULL),
(26, 1, 4, NULL, NULL),
(27, 1, 18, NULL, NULL),
(28, 1, 5, NULL, NULL),
(29, 1, 6, NULL, NULL),
(30, 1, 7, NULL, NULL),
(31, 1, 8, NULL, NULL),
(32, 1, 9, NULL, NULL),
(33, 1, 10, NULL, NULL),
(34, 1, 11, NULL, NULL),
(35, 1, 12, NULL, NULL),
(36, 1, 13, NULL, NULL),
(37, 1, 14, NULL, NULL),
(38, 1, 22, NULL, NULL),
(39, 1, 15, NULL, NULL),
(40, 1, 16, NULL, NULL),
(41, 1, 17, NULL, NULL),
(42, 1, 19, NULL, NULL),
(43, 1, 20, NULL, NULL),
(44, 1, 21, NULL, NULL),
(45, 1, 23, NULL, NULL),
(46, 1, 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_descriptions`
--
ALTER TABLE `page_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_meta_data`
--
ALTER TABLE `page_meta_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_templates`
--
ALTER TABLE `site_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_has_permissions_user_id_foreign` (`user_id`),
  ADD KEY `user_has_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_descriptions`
--
ALTER TABLE `page_descriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_meta_data`
--
ALTER TABLE `page_meta_data`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `site_templates`
--
ALTER TABLE `site_templates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD CONSTRAINT `user_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `user_has_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
