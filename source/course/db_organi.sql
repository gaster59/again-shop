-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2020 at 06:51 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_organi`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_thumb` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `meta_tags` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `meta_tags` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent_id`, `meta_tags`, `meta_description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(3, 'Fresh Meat', 'Fresh Meat', NULL, 'Fresh Meat', 'Fresh Meat', '2020-08-12 07:45:25', 1, '2020-08-16 06:12:58', 1, NULL, NULL),
(4, 'Vegetables', 'Vegetables', NULL, 'Vegetables', 'Vegetables', '2020-08-15 23:40:59', 1, '2020-08-15 23:40:59', NULL, NULL, NULL),
(5, 'Fruit & Nut Gifts', 'Fruit & Nut Gifts', NULL, 'Fruit & Nut Gifts', 'Fruit & Nut Gifts', '2020-08-15 23:41:11', 1, '2020-08-15 23:41:11', NULL, NULL, NULL),
(6, 'Fresh Berries', 'Fresh Berries', NULL, 'Fresh Berries', 'Fresh Berries', '2020-08-15 23:41:23', 1, '2020-08-15 23:41:23', NULL, NULL, NULL),
(7, 'Ocean Foods', 'Ocean Foods', NULL, 'Ocean Foods', 'Ocean Foods', '2020-08-15 23:41:32', 1, '2020-08-15 23:41:32', NULL, NULL, NULL),
(8, 'Butter & Eggs', 'Butter & Eggs', NULL, 'Butter & Eggs', 'Butter & Eggs', '2020-08-15 23:41:41', 1, '2020-08-15 23:41:41', NULL, NULL, NULL),
(9, 'Fastfood', 'Fastfood', NULL, 'Fastfood', 'Fastfood', '2020-08-15 23:41:50', 1, '2020-08-15 23:41:50', NULL, NULL, NULL),
(10, 'Fresh Onion', 'Fresh Onion', NULL, 'Fresh Onion', 'Fresh Onion', '2020-08-15 23:41:59', 1, '2020-08-15 23:41:59', NULL, NULL, NULL),
(11, 'Papayaya & Crisps', 'Papayaya & Crisps', NULL, 'Papayaya & Crisps', 'Papayaya & Crisps', '2020-08-15 23:42:10', 1, '2020-08-15 23:42:10', NULL, NULL, NULL),
(12, 'Oatmeal', 'Oatmeal', NULL, 'Oatmeal', 'Oatmeal', '2020-08-15 23:42:20', 1, '2020-08-15 23:42:20', NULL, NULL, NULL),
(13, 'Fresh Bananas', 'Fresh Bananas', NULL, 'Fresh Bananas', 'Fresh Bananas', '2020-08-15 23:42:30', 1, '2020-08-15 23:42:30', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `response`, `created_at`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `status`) VALUES
(1, 'qwe', 'aa@aa.com', 'qweqwe', '11111', '2020-08-28 10:56:50', '2020-08-28 11:57:10', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `country_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `memo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_first_name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_last_name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` int(11) NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0: moi, 1: dang xu ly, 2: hoan thanh',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `price_down` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_thumb` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_tags` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `price_down` int(11) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `summary`, `avatar`, `avatar_thumb`, `meta_tags`, `meta_description`, `price`, `price_down`, `sort_order`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'cucamelon', 'cucamelon', 'cucamelon', '<p>cucamelon</p>', 'http://test.organi.com/avatar/1/img.jpg', 'http://test.organi.com/avatar/1/', 'cucamelon', 'cucamelon', 20000, 0, 1, '2020-08-23 03:09:07', 1, '2020-08-27 10:28:04', 1, NULL, NULL),
(2, 'celery organic', 'celery-organic', 'celery organic', '<p>celery organic</p>', 'http://test.organi.com/avatar/2/img.jpg', 'http://test.organi.com/avatar/2/', 'celery organic', 'celery organic', 5000, 0, 2, '2020-08-23 03:14:34', 1, '2020-08-26 07:15:56', NULL, NULL, NULL),
(3, 'Chilli red organic', 'chilli-red-organic', 'Chilli red organic', '<p>Chilli red organic</p>', 'http://test.organi.com/avatar/3/img.jpg', 'http://test.organi.com/avatar/3/', 'Chilli red organic', 'Chilli red organic', 31500, 0, 3, '2020-08-23 03:16:50', 1, '2020-08-26 07:16:33', NULL, NULL, NULL),
(4, 'Banana organic', 'banana-organic', 'Banana organic', '<p>Banana organic</p>', 'http://test.organi.com/avatar/4/img.jpg', 'http://test.organi.com/avatar/4/', 'Banana organic', 'Banana organic', 41500, 0, 4, '2020-08-23 03:18:32', 1, '2020-08-26 07:16:47', NULL, NULL, NULL),
(5, 'Gourd organic', 'gourd-organic', 'Gourd organic', '<p>Gourd organic</p>', 'http://test.organi.com/avatar/5/img.jpg', 'http://test.organi.com/avatar/5/', 'Gourd organic', 'Gourd organic', 45000, 0, 5, '2020-08-23 03:19:42', 1, '2020-08-26 07:17:01', NULL, NULL, NULL),
(6, 'Green apple', 'green-apple', 'Green apple', '<p>Green apple</p>', 'http://test.organi.com/avatar/6/img.jpg', 'http://test.organi.com/avatar/6/', 'Green apple', 'Green apple', 49500, 0, 6, '2020-08-23 03:20:44', 1, '2020-08-26 07:17:13', NULL, NULL, NULL),
(7, 'Bamboo leaves', 'bamboo-leaves', 'Bamboo leaves', '<p>Bamboo leaves</p>', 'http://test.organi.com/avatar/7/img.jpg', 'http://test.organi.com/avatar/7/', 'Bamboo leaves', 'Bamboo leaves', 77000, 0, 7, '2020-08-23 03:21:58', 1, '2020-08-26 07:17:27', NULL, NULL, NULL),
(8, 'Chocomint organic', 'chocomint-organic', 'Chocomint organic', '<p>Chocomint organic</p>', 'http://test.organi.com/avatar/8/img.jpg', 'http://test.organi.com/avatar/8/', 'Chocomint organic', 'Chocomint organic', 12600, 0, 8, '2020-08-23 03:22:50', 1, '2020-08-26 07:17:42', NULL, NULL, NULL),
(9, 'Beef tomato organic', 'beef-tomato-organic', 'Beef tomato organic', '<p>Beef tomato organic</p>', 'http://test.organi.com/avatar/9/img.jpg', 'http://test.organi.com/avatar/9/', 'Beef tomato organic', 'Beef tomato organic', 12000, 0, 9, '2020-08-23 03:23:34', 1, '2020-08-26 07:17:59', NULL, NULL, NULL),
(10, 'Baby carrot organic', 'baby-carrot-organic', 'Baby carrot organic', '<p>Baby carrot organic</p>', 'http://test.organi.com/avatar/10/img.jpg', 'http://test.organi.com/avatar/10/', 'Baby carrot organic', 'Baby carrot organic', 58000, 0, 10, '2020-08-23 03:24:18', 1, '2020-08-26 07:18:15', NULL, NULL, NULL),
(11, 'Rice color egg', 'rice-color-egg', 'Rice color egg', '<p>Rice color egg</p>', 'http://test.organi.com/avatar/11/img.jpg', 'http://test.organi.com/avatar/11/', 'Rice color egg', 'Rice color egg', 38000, 0, 11, '2020-08-23 03:26:06', 1, '2020-08-26 07:18:29', NULL, NULL, NULL),
(12, 'erynjii mushroom', 'erynjii-mushroom', 'erynjii mushroom', '<p>erynjii mushroom</p>', 'http://test.organi.com/avatar/12/img.jpg', 'http://test.organi.com/avatar/12/', 'erynjii mushroom', 'erynjii mushroom', 26000, 0, 12, '2020-08-23 03:26:48', 1, '2020-08-26 07:18:45', NULL, NULL, NULL),
(13, 'Yellow lemon USA', 'yellow-lemon-USA', 'Yellow lemon USA', '<p>Yellow lemon USA</p>', 'http://test.organi.com/avatar/13/img.jpg', 'http://test.organi.com/avatar/13/', 'Yellow lemon USA', 'Yellow lemon USA', 62500, 0, 13, '2020-08-23 03:27:53', 1, '2020-08-26 07:19:03', NULL, NULL, NULL),
(14, 'Shiitake-Mushroom 2', 'Shiitake-Mushroom-2', 'Shiitake-Mushroom 2', '<p>Shiitake-Mushroom 2</p>', 'http://test.organi.com/avatar/14/img.jpg', 'http://test.organi.com/avatar/14/', 'Shiitake-Mushroom 2', 'Shiitake-Mushroom 2', 30000, 0, 14, '2020-08-23 03:28:28', 1, '2020-08-26 07:19:33', NULL, NULL, NULL),
(15, 'Button Mushroom 1', 'button-mushroom-1', 'Button Mushroom 1', '<p>Button Mushroom 1</p>', 'http://test.organi.com/avatar/15/img.jpg', 'http://test.organi.com/avatar/15/', 'Button Mushroom 1', 'Button Mushroom 1', 45000, 0, 15, '2020-08-23 03:29:00', 1, '2020-08-23 03:29:00', NULL, NULL, NULL),
(16, 'APPLE CIDE VINEGAR', 'apple-cide-vinegar', 'APPLE CIDE VINEGAR', '<p>APPLE CIDE VINEGAR</p>', 'http://test.organi.com/avatar/16/img.jpg', 'http://test.organi.com/avatar/16/', 'APPLE CIDE VINEGAR', 'APPLE CIDE VINEGAR', 154000, 0, 16, '2020-08-23 03:30:01', 1, '2020-08-26 07:20:58', NULL, NULL, NULL),
(17, 'Mushroom Kinoko gap', 'mushroom-kinoko-gap', 'Mushroom Kinoko gap', '<p>Mushroom Kinoko gap</p>', 'http://test.organi.com/avatar/17/img.jpg', 'http://test.organi.com/avatar/17/', 'Mushroom Kinoko gap', 'Mushroom Kinoko gap', 24000, 0, 17, '2020-08-23 03:31:01', 1, '2020-08-26 07:21:16', NULL, NULL, NULL),
(18, 'Cải dún hữu cơ', 'cai-dun-huu-co', 'Cải dún hữu cơ', '<p>Cải d&uacute;n hữu cơ</p>', 'http://test.organi.com/avatar/18/img.jpg', 'http://test.organi.com/avatar/18/', 'Cải dún hữu cơ', 'Cải dún hữu cơ', 23750, 0, 18, '2020-08-26 07:15:04', 1, '2020-08-26 07:15:04', NULL, NULL, NULL),
(19, 'Bắp cải tím hữu cơ', 'bap-cai-tim-huu-co', 'Bắp cải tím hữu cơ', '<p>Bắp cải t&iacute;m hữu cơ</p>', 'http://test.organi.com/avatar/19/img.jpg', 'http://test.organi.com/avatar/19/', 'Bắp cải tím hữu cơ', 'Bắp cải tím hữu cơ', 34000, 0, 19, '2020-08-26 07:22:07', 1, '2020-08-26 07:22:07', NULL, NULL, NULL),
(20, 'Bắp bò hữu cơ obe', 'bap-bo-huu-co-obe', 'Bắp bò hữu cơ obe', '<p>Bắp b&ograve; hữu cơ obe</p>', 'http://test.organi.com/avatar/20/img.jpg', 'http://test.organi.com/avatar/20/', 'Bắp bò hữu cơ obe', 'Bắp bò hữu cơ obe', 205500, 0, 20, '2020-08-26 07:22:51', 1, '2020-08-26 07:22:51', NULL, NULL, NULL),
(21, 'Mồng tơi hữu cơ', 'mong-toi-huu-co', 'Mồng tơi hữu cơ', '<p>Mồng tơi hữu cơ</p>', 'http://test.organi.com/avatar/21/img.jpg', 'http://test.organi.com/avatar/21/', 'Mồng tơi hữu cơ', 'Mồng tơi hữu cơ', 20000, 0, 21, '2020-08-26 07:23:32', 1, '2020-08-26 07:23:32', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(15, 10, 15, '2020-08-23 03:29:00', '2020-08-23 03:29:00'),
(20, 4, 18, '2020-08-26 07:15:04', '2020-08-26 07:15:04'),
(22, 4, 2, '2020-08-26 07:15:56', '2020-08-26 07:15:56'),
(23, 4, 3, '2020-08-26 07:16:33', '2020-08-26 07:16:33'),
(24, 5, 4, '2020-08-26 07:16:47', '2020-08-26 07:16:47'),
(25, 5, 5, '2020-08-26 07:17:01', '2020-08-26 07:17:01'),
(26, 5, 6, '2020-08-26 07:17:13', '2020-08-26 07:17:13'),
(27, 4, 7, '2020-08-26 07:17:27', '2020-08-26 07:17:27'),
(28, 10, 8, '2020-08-26 07:17:43', '2020-08-26 07:17:43'),
(29, 5, 9, '2020-08-26 07:17:59', '2020-08-26 07:17:59'),
(30, 6, 10, '2020-08-26 07:18:15', '2020-08-26 07:18:15'),
(31, 8, 11, '2020-08-26 07:18:29', '2020-08-26 07:18:29'),
(32, 6, 12, '2020-08-26 07:18:45', '2020-08-26 07:18:45'),
(33, 10, 13, '2020-08-26 07:19:03', '2020-08-26 07:19:03'),
(34, 10, 14, '2020-08-26 07:19:33', '2020-08-26 07:19:33'),
(35, 12, 16, '2020-08-26 07:20:59', '2020-08-26 07:20:59'),
(36, 11, 17, '2020-08-26 07:21:16', '2020-08-26 07:21:16'),
(37, 4, 19, '2020-08-26 07:22:07', '2020-08-26 07:22:07'),
(38, 3, 20, '2020-08-26 07:22:51', '2020-08-26 07:22:51'),
(39, 4, 21, '2020-08-26 07:23:32', '2020-08-26 07:23:32'),
(40, 4, 1, '2020-08-27 10:28:05', '2020-08-27 10:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `path` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_thumb` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `path`, `path_thumb`, `description_image`, `created_at`, `updated_at`) VALUES
(5, 1, 'http://test.organi.com/details/10/img.jpg', 'http://test.organi.com/details/10/', 'cucamelon', '2020-08-26 09:10:47', '2020-08-26 09:10:47'),
(6, 1, 'http://test.organi.com/details/11/img.jpg', 'http://test.organi.com/details/11/', 'cucamelon', '2020-08-26 09:10:47', '2020-08-26 09:10:47'),
(7, 1, 'http://test.organi.com/details/12/img.jpg', 'http://test.organi.com/details/12/', 'cucamelon', '2020-08-26 09:10:47', '2020-08-26 09:10:47');

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
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `token`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tuan Anh', 'trantuananh198610@gmail.com', NULL, '$2y$10$h0iViS71Nn/LazgYFQMkUeeDc.lzQUOAvLoEHMhpRUSSfvNhD0DXG', '', 1, 'QIAwN053MGR4yJmS9aVsdTsto2OCWIwneA1KEQKyD1z9ByF9KxfEwt7CLEIG', '2020-08-09 06:56:34', '2020-08-29 02:23:14', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
