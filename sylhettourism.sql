-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2019 at 03:00 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sylhettourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `name`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Awesome Place thanks for the information', 'Noyeem', 1, 1, '2019-07-01 10:26:57', '2019-07-01 10:26:57'),
(2, 'Awesome Place', 'Noyeem', 1, 1, '2019-07-08 06:16:18', '2019-07-08 06:16:18'),
(3, 'kefkwekk', 'Noyeem', 6, 1, '2019-11-11 13:56:40', '2019-11-11 13:56:40'),
(4, 'hi', 'Noyeem', 6, 1, '2019-11-11 22:55:18', '2019-11-11 22:55:18'),
(5, 'ffsf', 'Noyeem', 6, 1, '2019-11-11 23:10:39', '2019-11-11 23:10:39'),
(7, 'ssfsf', 'Noyeem', 6, 1, '2019-11-11 23:13:04', '2019-11-11 23:13:04'),
(8, 'ssfsf', 'Noyeem', 6, 1, '2019-11-11 23:13:47', '2019-11-11 23:13:47'),
(9, 'ssfsf', 'Noyeem', 6, 1, '2019-11-11 23:14:15', '2019-11-11 23:14:15'),
(10, 'ssfsf', 'Noyeem', 6, 1, '2019-11-11 23:14:26', '2019-11-11 23:14:26'),
(11, 'ssfsf', 'Noyeem', 6, 1, '2019-11-11 23:14:46', '2019-11-11 23:14:46'),
(12, 'ssfsf', 'Noyeem', 6, 1, '2019-11-11 23:15:56', '2019-11-11 23:15:56');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `title`, `email`, `contact`, `image`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'panshi inn', 'client1@gmail.com', '859239589', '439410.jpg', 'tioaffjkla', '2019-11-09 12:37:29', '2019-11-09 12:37:29'),
(2, 'panshi inn', 'client2@gmail.com', '859239589', '439410.jpg', 'tioaffjkla', '2019-11-09 12:38:36', '2019-11-09 12:38:36'),
(3, 'panshi inn', 'client3@gmail.com', '859239589', '439410.jpg', 'tioaffjkla', '2019-11-09 12:38:46', '2019-11-09 12:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2019_06_03_192102_create_roles_table', 1),
(23, '2019_06_03_193054_create_role_user_table', 1),
(24, '2019_06_15_160316_create_places_table', 1),
(25, '2019_06_19_150358_create_hotels_table', 1),
(26, '2019_06_19_150837_create_restaurants_table', 1),
(27, '2019_06_29_142456_create_comments_table', 2),
(28, '2019_07_01_162303_comments', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `howToGoEng` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `whereToStayEng` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `whereToEatEng` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `howToGoBan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `whereToStayBan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `whereToEatBan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `title`, `image`, `howToGoEng`, `whereToStayEng`, `whereToEatEng`, `howToGoBan`, `whereToStayBan`, `whereToEatBan`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'Tea Garden Sreemongol', 'ratargul_cover.jpg', 'There is more than one way to go to Bisnakandi. Tourists can use the Sylhet-Guainghat Road via the airport and take a left turn to reach Hadarpar from where a local boat may be hired to arrive at Bisnakandi. Visitors can go to Hadarpar by CNG-run auto-rickshaws, which are available for hire at Amberkhana Point in Sylhet city. \r\n\r\nAn alternative would be to go to Pangthumai first, and then hire a boat near Borhill Fall and ride along the branch of the Piyan which flows west towards Bisnakandi. The boat ride, which takes a little over an hour, on the sinuous river with lush green mountains on both sides is an unforgettable experience.', 'There is no accommodation facilities in Bisnakandhi.', 'There is no Dine facility in Bisnakandi. If needed tourist has to take packed food from Sylhet.', 'বিসকান্দী যাওয়ার একাধিক উপায় আছে। পর্যটকরা সিলেট-গুয়িংহাট সড়কটি বিমানবন্দরের মাধ্যমে ব্যবহার করতে পারেন এবং বেষকান্দি পৌঁছানোর জন্য স্থানীয় নৌকাটি ভাড়া করতে হাদারপাড় পৌঁছানোর জন্য বাম দিকে যেতে পারেন। সিলেটের সিটিজেনের অম্বরখানা পয়েন্টে ভাড়া পাওয়া যায় এমন সিএনজি চালিত অটো রিক্সার দর্শকরা হাদরপাড়ে যেতে পারেন।\r\n\r\nএকটি বিকল্প প্রথমে পঙ্গ্থুমাইতে যেতে হবে, এবং তারপর বোরহিল পতনের কাছাকাছি একটি নৌকা ভাড়া এবং পিয়ান শাখা বরাবর যাত্রা যা পশ্চিমে Bisnakandi দিকে প্রবাহিত হবে। নৌকা যাত্রায়, যা এক ঘন্টারও বেশি সময় লাগে, উভয় পাশে সুদৃশ্য সবুজ পাহাড়ের সাথে নিরক্ষীয় নদীর উপর একটি অবিস্মরণীয় অভিজ্ঞতা।', 'বিজনকান্দিতে কোন বাসস্থান নেই।', 'বিসকান্দিতে কোন ডাইন সুবিধা নেই। প্রয়োজন হলে পর্যটকের সিলেট থেকে প্যাকড খাবার নিতে হবে।', 0, '2019-06-26 09:08:13', '2019-06-26 09:08:13'),
(2, 'Jaflong', 'jaflong1.jpg', 'msasfjfjjlfjjjfjfj', 'skskskskksksk', 'akakakka', 'skskskskksks', 'kdkdkdk', 'kdkdkdkka', 0, '2019-08-04 07:31:02', '2019-08-04 07:31:02'),
(3, 'Hazrath Shah Jalal Majar Sharif', 'ratargul_cover.jpg', 'There is more than one way to go to Bisnakandi. Tourists can use the Sylhet-Guainghat Road via the airport and take a left turn to reach Hadarpar from where a local boat may be hired to arrive at Bisnakandi. Visitors can go to Hadarpar by CNG-run auto-rickshaws, which are available for hire at Amberkhana Point in Sylhet city. \r\n\r\nAn alternative would be to go to Pangthumai first, and then hire a boat near Borhill Fall and ride along the branch of the Piyan which flows west towards Bisnakandi. The boat ride, which takes a little over an hour, on the sinuous river with lush green mountains on both sides is an unforgettable experience.', 'There is no accommodation facilities in Bisnakandhi.', 'There is no Dine facility in Bisnakandi. If needed tourist has to take packed food from Sylhet.', 'বিসকান্দী যাওয়ার একাধিক উপায় আছে। পর্যটকরা সিলেট-গুয়িংহাট সড়কটি বিমানবন্দরের মাধ্যমে ব্যবহার করতে পারেন এবং বেষকান্দি পৌঁছানোর জন্য স্থানীয় নৌকাটি ভাড়া করতে হাদারপাড় পৌঁছানোর জন্য বাম দিকে যেতে পারেন। সিলেটের সিটিজেনের অম্বরখানা পয়েন্টে ভাড়া পাওয়া যায় এমন সিএনজি চালিত অটো রিক্সার দর্শকরা হাদরপাড়ে যেতে পারেন।\r\n\r\nএকটি বিকল্প প্রথমে পঙ্গ্থুমাইতে যেতে হবে, এবং তারপর বোরহিল পতনের কাছাকাছি একটি নৌকা ভাড়া এবং পিয়ান শাখা বরাবর যাত্রা যা পশ্চিমে Bisnakandi দিকে প্রবাহিত হবে। নৌকা যাত্রায়, যা এক ঘন্টারও বেশি সময় লাগে, উভয় পাশে সুদৃশ্য সবুজ পাহাড়ের সাথে নিরক্ষীয় নদীর উপর একটি অবিস্মরণীয় অভিজ্ঞতা।', 'বিজনকান্দিতে কোন বাসস্থান নেই।', 'বিসকান্দিতে কোন ডাইন সুবিধা নেই। প্রয়োজন হলে পর্যটকের সিলেট থেকে প্যাকড খাবার নিতে হবে।', 0, '2019-06-26 09:08:13', '2019-06-26 09:08:13'),
(4, 'Bisnakhandi', 'ratargul_cover.jpg', 'There is more than one way to go to Bisnakandi. Tourists can use the Sylhet-Guainghat Road via the airport and take a left turn to reach Hadarpar from where a local boat may be hired to arrive at Bisnakandi. Visitors can go to Hadarpar by CNG-run auto-rickshaws, which are available for hire at Amberkhana Point in Sylhet city. \r\n\r\nAn alternative would be to go to Pangthumai first, and then hire a boat near Borhill Fall and ride along the branch of the Piyan which flows west towards Bisnakandi. The boat ride, which takes a little over an hour, on the sinuous river with lush green mountains on both sides is an unforgettable experience.', 'There is no accommodation facilities in Bisnakandhi.', 'There is no Dine facility in Bisnakandi. If needed tourist has to take packed food from Sylhet.', 'বিসকান্দী যাওয়ার একাধিক উপায় আছে। পর্যটকরা সিলেট-গুয়িংহাট সড়কটি বিমানবন্দরের মাধ্যমে ব্যবহার করতে পারেন এবং বেষকান্দি পৌঁছানোর জন্য স্থানীয় নৌকাটি ভাড়া করতে হাদারপাড় পৌঁছানোর জন্য বাম দিকে যেতে পারেন। সিলেটের সিটিজেনের অম্বরখানা পয়েন্টে ভাড়া পাওয়া যায় এমন সিএনজি চালিত অটো রিক্সার দর্শকরা হাদরপাড়ে যেতে পারেন।\r\n\r\nএকটি বিকল্প প্রথমে পঙ্গ্থুমাইতে যেতে হবে, এবং তারপর বোরহিল পতনের কাছাকাছি একটি নৌকা ভাড়া এবং পিয়ান শাখা বরাবর যাত্রা যা পশ্চিমে Bisnakandi দিকে প্রবাহিত হবে। নৌকা যাত্রায়, যা এক ঘন্টারও বেশি সময় লাগে, উভয় পাশে সুদৃশ্য সবুজ পাহাড়ের সাথে নিরক্ষীয় নদীর উপর একটি অবিস্মরণীয় অভিজ্ঞতা।', 'বিজনকান্দিতে কোন বাসস্থান নেই।', 'বিসকান্দিতে কোন ডাইন সুবিধা নেই। প্রয়োজন হলে পর্যটকের সিলেট থেকে প্যাকড খাবার নিতে হবে।', 0, '2019-06-26 09:08:13', '2019-06-26 09:08:13'),
(5, 'Panthumai Waterfall', 'bisnakandi-cover.jpg', 'There is more than one way to go to Bisnakandi. Tourists can use the Sylhet-Guainghat Road via the airport and take a left turn to reach Hadarpar from where a local boat may be hired to arrive at Bisnakandi. Visitors can go to Hadarpar by CNG-run auto-rickshaws, which are available for hire at Amberkhana Point in Sylhet city. \r\n\r\nAn alternative would be to go to Pangthumai first, and then hire a boat near Borhill Fall and ride along the branch of the Piyan which flows west towards Bisnakandi. The boat ride, which takes a little over an hour, on the sinuous river with lush green mountains on both sides is an unforgettable experience.', 'There is no accommodation facilities in Bisnakandhi.', 'There is no Dine facility in Bisnakandi. If needed tourist has to take packed food from Sylhet.', 'বিসকান্দী যাওয়ার একাধিক উপায় আছে। পর্যটকরা সিলেট-গুয়িংহাট সড়কটি বিমানবন্দরের মাধ্যমে ব্যবহার করতে পারেন এবং বেষকান্দি পৌঁছানোর জন্য স্থানীয় নৌকাটি ভাড়া করতে হাদারপাড় পৌঁছানোর জন্য বাম দিকে যেতে পারেন। সিলেটের সিটিজেনের অম্বরখানা পয়েন্টে ভাড়া পাওয়া যায় এমন সিএনজি চালিত অটো রিক্সার দর্শকরা হাদরপাড়ে যেতে পারেন।\r\n\r\nএকটি বিকল্প প্রথমে পঙ্গ্থুমাইতে যেতে হবে, এবং তারপর বোরহিল পতনের কাছাকাছি একটি নৌকা ভাড়া এবং পিয়ান শাখা বরাবর যাত্রা যা পশ্চিমে Bisnakandi দিকে প্রবাহিত হবে। নৌকা যাত্রায়, যা এক ঘন্টারও বেশি সময় লাগে, উভয় পাশে সুদৃশ্য সবুজ পাহাড়ের সাথে নিরক্ষীয় নদীর উপর একটি অবিস্মরণীয় অভিজ্ঞতা।', 'বিজনকান্দিতে কোন বাসস্থান নেই।', 'বিসকান্দিতে কোন ডাইন সুবিধা নেই। প্রয়োজন হলে পর্যটকের সিলেট থেকে প্যাকড খাবার নিতে হবে।', 0, '2019-06-26 09:08:13', '2019-06-26 09:08:13'),
(6, 'Ratargul Swamp Forest', 'ratargul_cover.jpg', 'There is more than one way to go to Bisnakandi. Tourists can use the Sylhet-Guainghat Road via the airport and take a left turn to reach Hadarpar from where a local boat may be hired to arrive at Bisnakandi. Visitors can go to Hadarpar by CNG-run auto-rickshaws, which are available for hire at Amberkhana Point in Sylhet city. \r\n\r\nAn alternative would be to go to Pangthumai first, and then hire a boat near Borhill Fall and ride along the branch of the Piyan which flows west towards Bisnakandi. The boat ride, which takes a little over an hour, on the sinuous river with lush green mountains on both sides is an unforgettable experience.', 'There is no accommodation facilities in Bisnakandhi.', 'There is no Dine facility in Bisnakandi. If needed tourist has to take packed food from Sylhet.', 'বিসকান্দী যাওয়ার একাধিক উপায় আছে। পর্যটকরা সিলেট-গুয়িংহাট সড়কটি বিমানবন্দরের মাধ্যমে ব্যবহার করতে পারেন এবং বেষকান্দি পৌঁছানোর জন্য স্থানীয় নৌকাটি ভাড়া করতে হাদারপাড় পৌঁছানোর জন্য বাম দিকে যেতে পারেন। সিলেটের সিটিজেনের অম্বরখানা পয়েন্টে ভাড়া পাওয়া যায় এমন সিএনজি চালিত অটো রিক্সার দর্শকরা হাদরপাড়ে যেতে পারেন।\r\n\r\nএকটি বিকল্প প্রথমে পঙ্গ্থুমাইতে যেতে হবে, এবং তারপর বোরহিল পতনের কাছাকাছি একটি নৌকা ভাড়া এবং পিয়ান শাখা বরাবর যাত্রা যা পশ্চিমে Bisnakandi দিকে প্রবাহিত হবে। নৌকা যাত্রায়, যা এক ঘন্টারও বেশি সময় লাগে, উভয় পাশে সুদৃশ্য সবুজ পাহাড়ের সাথে নিরক্ষীয় নদীর উপর একটি অবিস্মরণীয় অভিজ্ঞতা।', 'বিজনকান্দিতে কোন বাসস্থান নেই।', 'বিসকান্দিতে কোন ডাইন সুবিধা নেই। প্রয়োজন হলে পর্যটকের সিলেট থেকে প্যাকড খাবার নিতে হবে।', 0, '2019-06-26 09:08:13', '2019-06-26 09:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `title`, `email`, `contact`, `image`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'nawab kitchen', 'nawab@kichen.com', '75357897', '210878.jpg', 'nawab kitchennawab kitchen', '2019-11-09 13:15:28', '2019-11-09 13:15:28'),
(2, 'nawab kitchen', 'nawab2@kichen.com', '75357897', '210878.jpg', 'nawab kitchennawab kitchen', '2019-11-09 13:15:36', '2019-11-09 13:15:36'),
(3, 'nawab kitchen', 'nawab3@kichen.com', '75357897', '210878.jpg', 'nawab kitchennawab kitchen', '2019-11-09 13:15:43', '2019-11-09 13:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL),
(2, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Noyeem', 'noyeem@gmail.com', '2019-08-08 08:18:12', '$2y$10$9jlgFrmiGVgrPZGpore4d.6M2p2HelWkFZjUGao2xcZ6xlDJ4tVPC', NULL, '2019-06-26 08:55:47', '2019-06-26 08:55:47'),
(2, 'Mahi', 'mahihussain@hotmail.com', '2019-08-08 08:18:12', '$2y$10$9jlgFrmiGVgrPZGpore4d.6M2p2HelWkFZjUGao2xcZ6xlDJ4tVPC', NULL, '2019-06-26 08:56:15', '2019-06-26 08:56:15'),
(11, 'Mahi', 'ecosite49@gmail.com', '2019-08-08 08:24:40', '$2y$10$flbGPJR3.WJQzNPZMy2RMe9m7swHh0NfEegTSq1Sfzv1RWxzz4HD2', 'HbZGHDviDEQWfMLkUpXQldQtmniXHQOgZUuApN6GhPcA2VSeI0Tm9rStYWJf', '2019-08-08 08:24:17', '2019-08-08 09:06:55'),
(12, 'muhon', 'muhon199@gmail.com', '2019-10-29 11:10:59', '$2y$10$9jlgFrmiGVgrPZGpore4d.6M2p2HelWkFZjUGao2xcZ6xlDJ4tVPC', 'joqVMFcJ8EfnW3HbzPuhBp7nJAPmpnQfvISyqKoAeqQNHHN3u2rjH5s1jGJj', '2019-10-29 11:09:29', '2019-10-29 11:12:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hotels_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `restaurants_email_unique` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
