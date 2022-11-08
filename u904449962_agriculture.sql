-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 08:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u904449962_agriculture`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL COMMENT '0 = Administrator | 1 = Customer | 2 = Vendor',
  `status` int(11) NOT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `is_verified` int(11) NOT NULL,
  `valid_id` varchar(255) DEFAULT NULL,
  `requirement` varchar(255) DEFAULT NULL,
  `is_code` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `profile`, `firstname`, `surname`, `email`, `contact`, `birthday`, `gender`, `username`, `password`, `role`, `status`, `month`, `year`, `is_verified`, `valid_id`, `requirement`, `is_code`, `created_at`, `updated_at`) VALUES
(1, '', 'I', 'Agri', 'iagri@gmail.com', '09956425669', NULL, NULL, 'admin', '$2y$10$X7yZxDmLoWN5aMEziCBfXePaz3hUnM4pD.wkx.728bX95NAmAorXy', 0, 0, '4', '2022', 0, NULL, '', 0, '2022-04-10 21:00:31', '2022-11-02 12:37:56'),
(17, '', 'Ronald', 'Valdez', 'ronald.valdez1217@gmail.com', '09278952219', NULL, NULL, 'Ronald', '$2y$10$X7yZxDmLoWN5aMEziCBfXePaz3hUnM4pD.wkx.728bX95NAmAorXy', 1, 0, '9', '2022', 0, NULL, NULL, 120055, '2022-09-26 16:20:15', '2022-11-02 12:39:04'),
(18, '6A4E3C65-765A-4317-8A6F-B4D696D17E06.jpeg', 'Cedrick', 'Camerino', 'Cedrickslash92@gmail.com', '09282720484', '', 'Male', 'Cedrickslash', '$2y$10$lgaw/AJoRPh8pJ6iuD0bGOBNPbnrCcG.f0fS2AR6dt9tTaQUX.pE6', 1, 0, '9', '2022', 0, NULL, NULL, 743883, '2022-09-26 16:41:45', '2022-09-30 05:41:21'),
(19, '20221010_201316.jpg', 'Mikka', 'Distajo', 'mikkadistajo@gmail.com', '09123456789', '', 'Female', 'Mikkay', '$2y$10$X7yZxDmLoWN5aMEziCBfXePaz3hUnM4pD.wkx.728bX95NAmAorXy', 1, 0, '9', '2022', 0, NULL, NULL, 440728, '2022-09-27 00:25:56', '2022-11-08 13:18:39'),
(20, '', 'John', 'Montes', 'schinlex.dival@gmail.com', '09750577988 ', '2000-10-11', NULL, 'John Montes', '$2y$10$lXcD4HMEY//sWcwvgbvvyezi1ktcVUpQuwP0W8v06XsaLkay1kA1W', 1, 0, '9', '2022', 0, NULL, NULL, 650814, '2022-09-27 00:43:14', '2022-09-27 02:23:22'),
(21, '', 'Princess', 'Vasquez', 'johnvonschinlex.dival@my.jru.edu', '09879885651', NULL, NULL, 'yna', '$2y$10$X7yZxDmLoWN5aMEziCBfXePaz3hUnM4pD.wkx.728bX95NAmAorXy', 2, 0, '9', '2022', 2, 'Driver\'s License', 'inbound8288640216272039061.jpg', 0, '2022-09-27 00:49:28', '2022-11-02 12:39:09'),
(23, '', 'Ronald', 'Valdez', 'ronald.valdez1127@gmail.com', '09278952219', NULL, NULL, 'RonaldV', '$2y$10$hmQKe16TPHwCfmKiwONm9Ox/g9KmSd0WPwCJ4JYcwlag53Ql/1pfC', 2, 0, '9', '2022', 1, 'Philhealth ID', '', 0, '2022-09-27 05:59:10', '2022-10-12 14:06:51'),
(26, '', 'Angelo', 'Buenavista', 'angelobuenavista@gmail.com', '09121212121', NULL, NULL, 'Angelo', '$2y$10$URyTxN6xXZdH5OsNRw.XuuB2HhREMZwp5usFBnalOFgnD5mUi6OCa', 1, 0, '9', '2022', 0, NULL, NULL, 839179, '2022-09-28 09:01:51', '2022-09-28 09:01:51'),
(27, '', 'Allison', 'Fajardo', 'allisonfajardo@gmail.com', '09210324451', NULL, NULL, 'Allison', '$2y$10$4I6uxB59hU2jazSCIeLg8.gDVx9evOm6BG7O1nwrSazKDCZ5ZiPDK', 1, 0, '9', '2022', 0, NULL, NULL, 306062, '2022-09-28 09:03:51', '2022-09-28 09:03:51'),
(28, '', 'Marites', 'Dela Cruz', 'maritesdelacruz@gmail.com', '09137693124', NULL, NULL, 'Marites', '$2y$10$WDGMUpaiqCeF5Aq6xZZFQeOiO17o7oQBIhpZUvVGi3Ezmk.gqs2se', 1, 0, '9', '2022', 0, NULL, NULL, 987179, '2022-09-28 11:22:13', '2022-09-28 11:22:13'),
(29, '', 'Wale', 'Diaz', 'walediaz@gmail.com', '09364731751', NULL, NULL, 'Wale', '$2y$10$s6eMUJME9q5bgHuujc70c.lQHxPFS1q3UEaVd/e/sTgiSCULqQfta', 1, 0, '9', '2022', 0, NULL, NULL, 253846, '2022-09-28 11:23:41', '2022-09-28 11:23:41'),
(30, '', 'Xylon', 'Uv ', 'xylonuy@gmail.com', '09277273293', NULL, NULL, 'Xylon', '$2y$10$BSrxY4w8WVP7o24ZCbwAfOaxiRmjxR12Ef7A.bck5D.mJkJ45yfFC', 1, 0, '9', '2022', 0, NULL, NULL, 685867, '2022-09-28 11:27:31', '2022-09-28 11:27:31'),
(31, '', 'Eloy', 'Borja', 'eloyborja@gmail.com', '09355810473', NULL, NULL, 'Eloy', '$2y$10$IUY74MQssSuz8RUeAuJHcenxWKMnc5nXhkGsnmvhNpCbvTEpLn7iu', 1, 0, '9', '2022', 0, NULL, NULL, 301154, '2022-09-28 11:28:48', '2022-09-28 11:28:48'),
(32, '', 'Queenie', 'Bazaar', 'queeniebazaar@gmail.com', '09133482582', NULL, NULL, 'Queenie', '$2y$10$hLFQcSh14J2Dt7cfp53bV.gMqzwu4FZIddysn.oXRHG9W3j/gpVWS', 1, 0, '9', '2022', 0, NULL, NULL, 889876, '2022-09-28 11:33:13', '2022-09-28 11:33:13'),
(33, '', 'Hugo', 'Agcaoili', 'hugoagcaoili@gmail.com', '09177374230', NULL, NULL, 'Hugo', '$2y$10$dx4/u6w1GFMnrPr.APH3NOWuEyfQCtvSfBtu39ddVFsfm9JPlPq6y', 1, 0, '9', '2022', 0, NULL, NULL, 786212, '2022-09-28 11:34:15', '2022-09-28 11:34:15'),
(34, '', 'Vanessa', 'Lacorte', 'vanessalacorte@gmail.com', '09264718480', NULL, NULL, 'Vanessa', '$2y$10$f5x9u/rYzQA9B49EYZc/Xeu9PvK5kubPKSfqvn6bNbDSS7P5ksBye', 1, 0, '9', '2022', 0, NULL, NULL, 729325, '2022-09-28 11:36:10', '2022-09-28 11:36:10'),
(35, '', 'Bianca', 'Rufinno', 'biancarufinno@gmail.com', '09472715901', NULL, NULL, 'Bianca', '$2y$10$vQ5gDTAR8dE8VpdsuXzBG.leR9tz51oqCTGZCBNQunA/cycsOn6dW', 1, 0, '9', '2022', 0, NULL, NULL, 333124, '2022-09-28 11:40:01', '2022-09-28 11:40:01'),
(36, '', 'Will', 'Dasovich', 'willdasovich@gmail.com', '09374721002', NULL, NULL, 'Will', '$2y$10$UWAHtDva7UvRB3xsdzTNNuAKNERaRHw.6fC.HscVxuZIQY1kklYYe', 1, 0, '9', '2022', 0, NULL, NULL, 502458, '2022-09-28 11:42:37', '2022-09-28 11:42:37'),
(37, '', 'Lincoln', 'Velazquez', 'lincolnvelazquez@gmail.com', '09538200117', NULL, NULL, 'Lincoln', '$2y$10$rkqYLuAfD6BdpyU0Dw0VJO3Bb30i/fGg0SSPMy/JNub3RrXTcPh26', 1, 0, '9', '2022', 0, NULL, NULL, 539954, '2022-09-28 11:45:15', '2022-09-28 11:45:15'),
(38, '', 'Mavrick', 'Bautista', 'mavrickbautista@gmail.com', '090018200102', NULL, NULL, 'Mavrick', '$2y$10$5TTvFBpavGPHmMGk1P09heQ77nEgeNJEOWsv3rAiMbFc2g4lUoY.K', 1, 0, '9', '2022', 0, NULL, NULL, 819875, '2022-09-28 11:46:20', '2022-09-28 11:46:20'),
(39, '', 'Kim', 'De Leon', 'kimdeleon@gmail.com', '09230030480', NULL, NULL, 'Kim', '$2y$10$ry/tTPyqRIlsteoQ4mIus.GWroRat4s3LGRtsuNC6ukAZAit5drXm', 1, 0, '9', '2022', 0, NULL, NULL, 699900, '2022-09-28 11:47:56', '2022-09-28 11:47:56'),
(40, '', 'Janel', 'Ilagan', 'janelilagan@gmail.com', '09273700138', NULL, NULL, 'Janel', '$2y$10$DzEXL6jRilFOyWhM4jIimukNxG0L/zvP3VdesqON8Fgkgs0a8M0T2', 1, 0, '9', '2022', 0, NULL, NULL, 357860, '2022-09-28 11:49:50', '2022-09-28 11:49:50'),
(57, NULL, 'Margie', 'Fajardo', 'mamikkajoana.distajo@my.jru.edu', '09173747683', NULL, NULL, 'Margie', '$2y$10$04JrqIFiEiLKg2JyklP7GuNUdimSjwn12tmWpMFp9/q6XN4wEx/X6', 2, 0, '9', '2022', 1, 'Philhealth ID', 'red onion.jpg', 870876, '2022-09-30 07:12:58', '2022-09-30 07:17:21'),
(58, NULL, 'Aris', 'Pulumbarit', 'aris.pulumbarit@jru.edu', '0963897546', NULL, NULL, 'Aris', '$2y$10$R2BLVVxdyrIiyvOBnpB.vOOnri3EB1YS36YsGP7G3Zl8zLbqZ5Hti', 2, 0, '9', '2022', 1, 'Driver\'s License', 'download.jfif', 509520, '2022-09-30 07:17:19', '2022-09-30 07:19:02'),
(61, NULL, 'Paulo', 'Raulo', 'paulo.raulo11@gmail.com', '09750577988', NULL, NULL, 'Paulo', '$2y$10$J.a.d0eSS3XBCJtkkJthZOSxrDHUAUsco6EatTQZJ2NHQY0n36MAu', 2, 0, '10', '2022', 1, 'Driver\'s License', '310446074_1407336719754338_1641377122285284652_n.jpg', 963319, '2022-10-07 03:16:13', '2022-10-07 03:18:57'),
(62, NULL, 'Stephen', 'Curry', 'stephcurrygsw67@gmail.com', '09788567256', NULL, NULL, 'Stephen', '$2y$10$1DOXx27S/T/Q6s.b1d7.U.qwUnEa98YuSxD8pok4ttISq36uUUNRK', 2, 0, '10', '2022', 1, 'Philippine Passport', 'download.jfif', 179092, '2022-10-07 03:52:50', '2022-10-07 03:54:28'),
(63, NULL, 'James', 'Delly', 'delly.james23@gmail.com', '09785641235', NULL, NULL, 'Delly', '$2y$10$JD5FWQYudd1n9DyBgTCYcOoMCH20zf/tZAgEao/FDESey5x6/VkXu', 1, 1, '10', '2022', 0, NULL, NULL, 829197, '2022-10-07 04:08:43', '2022-10-07 04:08:43'),
(64, NULL, 'Gab', 'Dela Cuesta', 'gab.delacuesta12345@gmail.com', '09123456789', NULL, NULL, 'Gab', '$2y$10$p2ySS1sz1kqzK6X4Zm4BdeVGBrbBVMJcGEdrFt5qYlVk0X94hVq7a', 2, 0, '10', '2022', 1, 'Voter\'s ID', '', 284647, '2022-10-07 05:26:32', '2022-10-12 13:56:44'),
(65, NULL, 'Dos', 'Gonzales', 'dos.gonzales12345@gmail.com', '09390045841', NULL, NULL, 'Dos', '$2y$10$jUQNSgC7wBntwN4ayZ4.quEUQlCTYs1UZy8jyk5vO0QHBScHo5a2.', 1, 0, '10', '2022', 0, NULL, NULL, 462002, '2022-10-11 03:57:16', '2022-10-11 03:57:52'),
(66, NULL, 'John', 'Dival', 'von.montes11@gmail.com', '09750577988', NULL, NULL, 'Schinlex', '$2y$10$cr5W5ltNtgnYtB5hbbgEyOwWdCloK85fDF2aAUKa8a9EDSt4gSUxW', 1, 1, '10', '2022', 0, NULL, NULL, 881136, '2022-10-12 08:14:21', '2022-10-12 08:14:21'),
(67, NULL, 'James', 'Byrant', 'jb880260@gmail.com', '09750577988', NULL, NULL, 'James', '$2y$10$wp3rvf1WMdLNPZfLDup7uuxkRTyWKvyKYp/QJ5JL4m/a86YM3cdpS', 2, 0, '10', '2022', 1, 'Driver\'s License', 'download (13).jpg', 399288, '2022-10-12 08:19:38', '2022-10-12 08:20:55'),
(68, '272753309_725377061733854_4649468985766625365_n (1).jpg', 'ArnArn', 'Arnold', 'arnoldarn591@gmail.com', '09876547892', '', 'Male', 'Arnold', '$2y$10$hmQKe16TPHwCfmKiwONm9Ox/g9KmSd0WPwCJ4JYcwlag53Ql/1pfC', 1, 0, '10', '2022', 0, NULL, NULL, 987114, '2022-10-12 08:28:21', '2022-10-12 13:45:52'),
(72, NULL, 'Jesther', 'Costinar', 'jesther.jc15@gmail.com', '09218989341', NULL, NULL, 'kasmir', '$2y$10$kKNiPvwuM2Rdxl89FRWDB.bFsI2KwVE/kmjGidfCjwppq1g.wuwBu', 1, 0, '11', '2022', 0, NULL, NULL, 554794, '2022-11-08 19:18:09', '2022-11-08 19:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_address`
--

CREATE TABLE `accounts_address` (
  `id` int(11) NOT NULL,
  `accounts_id` int(11) NOT NULL,
  `shipping_firstname` varchar(255) DEFAULT NULL,
  `shipping_surname` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL COMMENT 'Billing Address | Shipping Address',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_address`
--

INSERT INTO `accounts_address` (`id`, `accounts_id`, `shipping_firstname`, `shipping_surname`, `contact`, `country`, `city`, `state`, `address`, `zip`, `category`, `created_at`, `updated_at`) VALUES
(1, 17, NULL, NULL, NULL, 'PH', 'Parañaque City', 'metro manila', 'blk.1 lot 3 spratley street barangay don bosco', '1700', 'Billing Address', '2022-09-26 16:21:12', '2022-09-26 16:21:12'),
(2, 18, 'Cedrick', 'Camerino', '09282620484', 'PH', 'Pasig City', 'Manila', '115 Sgt. P. Bernardo Street. Caniogan, Pasig City', '1606', 'Shipping Address', '2022-09-26 16:43:03', '2022-09-26 16:43:03'),
(3, 18, NULL, NULL, NULL, 'PH', 'Pasig City', 'Manila', '115 Sgt. P. Bernardo Street. Caniogan, Pasig City', '1606', 'Billing Address', '2022-09-26 16:43:27', '2022-09-26 16:43:27'),
(4, 20, NULL, NULL, NULL, 'PH', 'Pasig City', 'Kalawaan ', '2784 Suha st Kalawaan Pasig City ', '1600', 'Billing Address', '2022-09-27 00:44:15', '2022-09-27 00:44:15'),
(5, 20, 'John', 'Dival', '09750577988 ', 'PH', 'Pasig City', 'Kalawaan ', '2784 Suha st Kalawaan Pasig City ', '1600 ', 'Shipping Address', '2022-09-27 00:44:52', '2022-09-27 00:44:52'),
(6, 19, 'Mikka', 'Distajo', '09123456789', 'PH', 'Quezon City', 'Metro Manila', 'Cubao', '1103', 'Shipping Address', '2022-09-27 02:43:10', '2022-10-12 14:59:10'),
(7, 19, NULL, NULL, NULL, 'PH', 'Quezon City', 'Metro Manila', 'Cubao', '1103', 'Billing Address', '2022-09-27 02:49:04', '2022-10-12 14:59:44'),
(8, 17, 'Ronald', 'Valdez', '09278952219', 'PH', 'Parañaque City', 'Metro manila', 'blk.1 lot 3 spratley street barangay don bosco', '1700', 'Shipping Address', '2022-09-27 06:28:37', '2022-09-27 06:28:37'),
(9, 42, NULL, NULL, NULL, 'PH', 'Quezon City', 'Metro Manila', 'Block 1 Lot 50', '11212', NULL, '2022-09-29 18:47:37', '2022-09-29 19:05:46'),
(10, 42, NULL, NULL, NULL, 'PH', 'Quezon City', 'Metro Manila', 'Block 1 Lot 50', '1121', 'Billing Address', '2022-09-29 19:57:40', '2022-09-29 19:57:40'),
(11, 42, 'John David', 'Lozano', '09956425669', 'PH', 'Quezon City', 'Metro Manila', 'Block 1 Lot 50', '1121', 'Shipping Address', '2022-09-29 19:57:45', '2022-09-29 19:57:45'),
(12, 57, NULL, NULL, NULL, 'PH', 'Bangued', 'Abra', '143 St. ', '0183', NULL, '2022-09-30 07:16:58', '2022-09-30 07:16:58'),
(13, 23, NULL, NULL, NULL, 'PH', 'Baguio CIty', 'CAR', 'Brgy. 45', '5452', NULL, '2022-10-06 08:53:25', '2022-10-06 08:53:25'),
(14, 64, NULL, NULL, NULL, 'PH', 'Lagawe City', 'Ifugao', 'Brgy. Masipag', '1058', NULL, '2022-10-07 05:38:36', '2022-10-07 05:38:36'),
(15, 62, NULL, NULL, NULL, 'PH', 'Baguio', 'Cordillera', '45 Session Road, Baguio City', '1477', NULL, '2022-10-07 05:43:22', '2022-10-07 05:43:22'),
(16, 67, NULL, NULL, NULL, 'PH', 'Pasig', 'Manila', '2784 Uha st. Barangay Bambang', '1601', NULL, '2022-10-12 08:20:43', '2022-10-12 08:20:43'),
(17, 68, NULL, NULL, NULL, 'PH', 'Manila City', 'Manila', '2784 Suha Street,', '1866', 'Billing Address', '2022-10-12 13:53:18', '2022-10-12 13:53:18'),
(18, 68, 'ArnArn', 'Arnold', '09365477814', 'PH', 'Manila City', 'Manila', '2784 Suha Street,', '1866', 'Shipping Address', '2022-10-12 13:53:38', '2022-10-12 13:53:38'),
(19, 72, 'asdasd', 'sdasd', 'dasdasdddddd', 'PH', 'Tuguegarao City', 'asdasd', 'asdasd', 'dasd', 'Shipping Address', '2022-11-08 19:29:35', '2022-11-08 19:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `shipping_fee` decimal(10,2) NOT NULL,
  `title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `qty`, `price`, `user_id`, `vendor_id`, `variation_id`, `shipping_fee`, `title`) VALUES
(46, 2, 2, '900.00', 72, 21, 2, '50.00', 'Kalabasa'),
(49, 13, 1, '89.00', 72, 62, 16, '0.00', 'Lettuce');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `accounts_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `forum_id`, `accounts_id`, `name`, `comment`, `status`, `created_at`) VALUES
(1, 2, 68, 'Arn Arnold', 'Test', 0, '2022-10-12 10:10:48'),
(2, 6, 21, 'Princess Vasquez', 'Test', 0, '2022-10-12 11:28:36'),
(3, 5, 21, 'Princess Vasquez - Seller', 'Testsss', 0, '2022-10-12 11:29:00'),
(4, 6, 68, 'Arn Arnold - Customer', 'I may suggest Gab\'s Farm or JB Veggies. They also have account here so you can communicate on them\r\n', 0, '2022-10-12 13:11:28'),
(5, 8, 23, 'Ronald Valdez - Seller', 'Test', 0, '2022-10-12 13:46:36'),
(6, 8, 68, 'ArnArn Arnold - Customer', 't', 0, '2022-10-12 13:46:49'),
(7, 7, 19, 'Mikka Distajo - Customer', 'Test 2', 0, '2022-10-12 14:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `exchanger`
--

CREATE TABLE `exchanger` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `requestor_id` int(11) NOT NULL,
  `approver_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `variant` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Pending | 1 = Approved | 2 = Rejected',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exchanger`
--

INSERT INTO `exchanger` (`id`, `owner_id`, `requestor_id`, `approver_id`, `title`, `variant`, `product_id`, `variation_id`, `quantity`, `price`, `reference`, `status`, `created_at`) VALUES
(1, 62, 62, 61, 'Lettuce', 'Per Box', 13, 16, 2, '89.00', '798637', 1, '2022-10-07 03:59:40'),
(2, 62, 61, 62, 'Pechay', 'Per Bundle', 12, 15, 2, '9.00', '798637', 1, '2022-10-07 03:59:40'),
(3, 61, 61, 62, 'Pechay', 'Per Bundle', 12, 15, 2, '9.00', '601192', 1, '2022-10-07 05:17:22'),
(4, 61, 61, 62, 'Pechay', 'Per Bundle', 12, 15, 2, '9.00', '601192', 1, '2022-10-07 05:17:22'),
(5, 61, 62, 61, 'Lettuce', 'Per Box', 13, 16, 2, '89.00', '601192', 1, '2022-10-07 05:17:22'),
(6, 61, 62, 61, 'Lettuce', 'Per Box', 13, 16, 2, '89.00', '601192', 1, '2022-10-07 05:17:22'),
(7, 64, 64, 62, 'Celery', '1/2 ', 20, 23, 1, '80.00', '629560', 1, '2022-10-07 07:37:36'),
(8, 64, 62, 64, 'Lettuce', 'Per Box', 13, 16, 1, '89.00', '629560', 1, '2022-10-07 07:37:36'),
(9, 64, 64, 62, 'Celery', '1/2 ', 20, 23, 1, '80.00', '437733', 1, '2022-10-07 07:40:41'),
(10, 64, 62, 64, 'Lettuce', 'Per Box', 13, 16, 1, '89.00', '437733', 1, '2022-10-07 07:40:41'),
(11, 21, 21, 23, 'Pechay Baguio', 'Per Box', 1, 1, 3, '300.00', '595101', 2, '2022-10-09 14:00:25'),
(12, 21, 23, 21, 'kamote Yellow', 'per kilo', 4, 4, 3, '90.00', '595101', 2, '2022-10-09 14:00:25'),
(13, 21, 23, 21, 'kamote Yellow', 'per kilo', 4, 4, 6, '90.00', '595101', 2, '2022-10-09 14:00:25'),
(14, 21, 23, 21, 'kamote Yellow', 'per kilo', 4, 4, 1, '90.00', '595101', 2, '2022-10-09 14:00:25'),
(15, 64, 64, 23, 'Celery', '1/2 ', 20, 23, 1, '80.00', '706699', 2, '2022-10-10 13:14:19'),
(16, 64, 23, 64, 'spinach', '1/4 kilo', 6, 6, 1, '80.00', '706699', 2, '2022-10-10 13:14:19'),
(17, 23, 23, 64, 'spinach', '1/4 kilo', 6, 6, 2, '80.00', '868791', 2, '2022-10-12 15:33:34'),
(18, 23, 64, 23, 'Celery', '1/2 ', 20, 23, 2, '80.00', '868791', 2, '2022-10-12 15:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `topic` longtext NOT NULL,
  `accounts_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `topic`, `accounts_id`, `name`, `status`, `created_at`) VALUES
(1, '', 68, 'Arn Arnold', 0, '2022-10-12 10:10:07'),
(2, 'Test', 68, 'Arn Arnold', 0, '2022-10-12 10:10:28'),
(3, 'Test', 68, 'Arn Arnold', 0, '2022-10-12 10:11:21'),
(4, 'zxc', 68, 'Arn Arnold - Customer', 0, '2022-10-12 10:11:26'),
(5, 'How Can I preserve the crops?', 68, 'Arn Arnold - Customer', 0, '2022-10-12 10:20:05'),
(6, 'can someone suggest me a shop that exports from cagayan valley? ', 17, 'Ronald Valdez - Customer', 0, '2022-10-12 10:28:07'),
(7, 'Test', 21, 'Princess Vasquez - Customer', 0, '2022-10-12 11:28:22'),
(8, 'ASD', 21, 'Princess Vasquez - Seller', 0, '2022-10-12 11:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE `meta` (
  `id` int(11) NOT NULL,
  `identifier` varchar(11) DEFAULT NULL,
  `description` varchar(5000) NOT NULL,
  `keywords` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `accounts_id` int(11) NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `product_categories_id` int(11) NOT NULL,
  `product_sub_categories_id` int(11) NOT NULL,
  `title` varchar(3000) DEFAULT NULL,
  `short_description` varchar(5000) DEFAULT NULL,
  `long_description` longtext DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0,
  `meta_description` varchar(5000) DEFAULT NULL,
  `meta_keywords` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `accounts_id`, `featured_image`, `product_categories_id`, `product_sub_categories_id`, `title`, `short_description`, `long_description`, `is_featured`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 21, 'pechay b.jpg', 1, 2, 'Pechay Baguio', 'Freshly Picked Pechay Baguio', '<p>Natural and organic fertilizer used in fertilizing the crops with balanced temperature and free from the pests.</p>\r\n', 1, 'Pechay Baguio', 'Pechay, Baguio, Pechay B, Pech, Bag, Pechay Baguio', '2022-09-27 02:28:53', '2022-09-27 02:28:53'),
(2, 21, 'download (15).jpg', 3, 10, 'Kalabasa', 'Large to Medium kalabasa', '<p>Natural and organic fertilizer used in fertilizing the crops with balanced temperature and free from the pests.</p>\r\n', 1, 'large to medium kalabasa', 'Kalabasa, Pumpkin', '2022-09-27 02:57:00', '2022-09-27 02:57:00'),
(3, 21, 'etamok.jpg', 4, 14, 'Kamote', 'Freshly Harvested Kamote (White)', '<p>Natural and organic fertilizer used in fertilizing the crops with balanced temperature and free from the pests.</p>\r\n', 1, 'Freshly Harvested Kamote (White)', 'Kamote, kam, ote, kamo', '2022-09-27 05:57:07', '2022-09-27 05:57:07'),
(4, 23, 'Kamote-Yellow-768x1024.jpg', 4, 14, 'kamote Yellow', 'Fresh Harvest kamote/Sweet potato (YELLOW)', '<p>Kamote or Sweet Potato&nbsp;from Farmers in Pangasinan and Abra, and of course: from one of our very own Agribusiness Farms.</p>\r\n\r\n<p>By buying directly from the farmers, we are able to buy at a higher price. This means higher and fairer profit for them. At the same time, you can get them at a much cheaper price.</p>\r\n', 1, 'Fresh Harvest Kamote/Sweet Potato (YELLOW)', 'kamote, sweet potato', '2022-09-27 06:01:39', '2022-09-27 06:06:58'),
(5, 23, 'kammote-purple.jpg', 4, 14, 'kamote Purple', 'Fresh harvest kamote/Sweet potato (PURPLE)', '<p>Kamote or Sweet Potato&nbsp;from Partner Farmers in Pangasinan and Abra, and of course: from one of our very own Agribusiness Farms.</p>\r\n\r\n<p>By buying directly from the farmers, we are able to buy at a higher price. This means higher and fairer profit for them. At the same time, you can get them at a much cheaper price.</p>\r\n', 1, 'Fresh Harvest Kamote/Sweet Potato (PURPLE)', 'kamote, sweet potato', '2022-09-27 06:06:22', '2022-09-27 06:06:22'),
(6, 23, '308198794_376283424581608_512779202324091098_n.png', 1, 3, 'spinach', 'Spinach Ilocano/Kalunay', '', 1, 'Spinach Ilocano/Kalunay', 'spinach, kalunay', '2022-09-27 06:22:31', '2022-09-27 06:24:41'),
(12, 61, 'download (2).jfif', 1, 5, 'Pechay', 'Wild Pechay', '<p>Freshly Picked</p>\r\n', 1, 'Pechay', 'Pechay, PEch', '2022-10-07 03:34:53', '2022-10-07 03:34:53'),
(13, 62, 'images (1).jfif', 1, 4, 'Lettuce', 'Lettuce 1st variant', '<p>freshly watery lettuce</p>\r\n', 0, 'Lettuce', 'let, lettuce, Let, Lettu', '2022-10-07 03:58:26', '2022-10-07 03:58:26'),
(14, 61, 'images (1).jfif', 1, 4, 'Lettuce', 'Lettuce 1st variant', '<p>freshly watery lettuce</p>\r\n', 0, 'Lettuce', 'let, lettuce, Let, Lettu', '2022-10-07 04:01:27', '2022-10-07 04:01:27'),
(15, 62, 'download (2).jfif', 1, 5, 'Pechay', 'Wild Pechay', '<p>Freshly Picked</p>\r\n', 1, 'Pechay', 'Pechay, PEch', '2022-10-07 04:01:27', '2022-10-07 04:01:27'),
(16, 62, 'download (2).jfif', 1, 5, 'Pechay', 'Wild Pechay', '<p>Freshly Picked</p>\r\n', 1, 'Pechay', 'Pechay, PEch', '2022-10-07 05:18:06', '2022-10-07 05:18:06'),
(17, 62, 'download (2).jfif', 1, 5, 'Pechay', 'Wild Pechay', '<p>Freshly Picked</p>\r\n', 1, 'Pechay', 'Pechay, PEch', '2022-10-07 05:18:06', '2022-10-07 05:18:06'),
(18, 61, 'images (1).jfif', 1, 4, 'Lettuce', 'Lettuce 1st variant', '<p>freshly watery lettuce</p>\r\n', 0, 'Lettuce', 'let, lettuce, Let, Lettu', '2022-10-07 05:18:06', '2022-10-07 05:18:06'),
(19, 61, 'images (1).jfif', 1, 4, 'Lettuce', 'Lettuce 1st variant', '<p>freshly watery lettuce</p>\r\n', 0, 'Lettuce', 'let, lettuce, Let, Lettu', '2022-10-07 05:18:06', '2022-10-07 05:18:06'),
(20, 64, 'celery.jpg', 5, 16, 'Celery', 'Fresh Celery', '<p>Shelf Life: 1 Month</p>\r\n\r\n<p>Expiry Date: 2/12/2024</p>\r\n\r\n<p>Guaranteed 100% Fresh</p>\r\n\r\n<p>Order Now and we will deliver tomorrow.</p>\r\n', 1, 'Fresh Celery', 'celery, fresh veggies', '2022-10-07 05:53:19', '2022-10-07 05:53:19'),
(21, 64, 'sugar-sugar-cane.jpg', 5, 21, 'Sugar Cane', 'Freshly picked', '<p>10 inches</p>\r\n\r\n<p>The following points highlight the six main steps involved in manufacturing cane-sugar.</p>\r\n\r\n<p>1. Extraction of the Juice&nbsp;</p>\r\n\r\n<p>2.&nbsp;Clarification of Juice&nbsp;</p>\r\n\r\n<p>3.&nbsp;Concentration and Crystallization&nbsp;</p>\r\n\r\n<p>4.&nbsp;Separation of Crystals&nbsp;</p>\r\n\r\n<p>5.&nbsp;Refining of Sugar&nbsp;</p>\r\n\r\n<p>6.&nbsp;Recovery of Sugar Molasses.</p>\r\n', 1, 'freshly picked', 'sugarcane, sugar cane, edible stem plant', '2022-10-07 06:50:12', '2022-10-07 06:50:12'),
(22, 62, 'celery.jpg', 5, 16, 'Celery', 'Fresh Celery', '<p>Shelf Life: 1 Month</p>\r\n\r\n<p>Expiry Date: 2/12/2024</p>\r\n\r\n<p>Guaranteed 100% Fresh</p>\r\n\r\n<p>Order Now and we will deliver tomorrow.</p>\r\n', 1, 'Fresh Celery', 'celery, fresh veggies', '2022-10-07 07:39:38', '2022-10-07 07:39:38'),
(23, 64, 'red onion.png', 6, 18, 'Red Onion', 'Medium Red Onion', '<p>Shelf life: 1 Month</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Guaranteed 100% Fresh Red Onion</p>\r\n\r\n<p>Exactly Weight</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 'Medium Red Onion', 'red onion, onion, allium', '2022-10-07 07:39:38', '2022-10-12 15:52:15'),
(24, 62, 'celery.jpg', 5, 16, 'Celery', 'Fresh Celery', '<p>Shelf Life: 1 Month</p>\r\n\r\n<p>Expiry Date: 2/12/2024</p>\r\n\r\n<p>Guaranteed 100% Fresh</p>\r\n\r\n<p>Order Now and we will deliver tomorrow.</p>\r\n', 1, 'Fresh Celery', 'celery, fresh veggies', '2022-10-08 08:03:10', '2022-10-08 08:03:10'),
(25, 64, 'images.jfif', 5, 17, 'Asparagus', 'Freshly cut asparagus', '', 1, 'Freshly Asparagus', 'Asparagus, asparagus plant', '2022-10-08 08:03:10', '2022-10-12 15:27:36'),
(26, 23, 'pechay b.jpg', 1, 2, 'Pechay Baguio', 'Freshly Picked Pechay Baguio', '<p>Natural and organic fertilizer used in fertilizing the crops with balanced temperature and free from the pests.</p>\r\n', 1, 'Pechay Baguio', 'Pechay, Baguio, Pechay B, Pech, Bag, Pechay Baguio', '2022-10-11 21:21:53', '2022-10-11 21:21:53'),
(27, 21, 'Kamote-Yellow-768x1024.jpg', 4, 14, 'kamote Yellow', 'Fresh Harvest kamote/Sweet potato (YELLOW)', '<p>Kamote or Sweet Potato&nbsp;from Farmers in Pangasinan and Abra, and of course: from one of our very own Agribusiness Farms.</p>\r\n\r\n<p>By buying directly from the farmers, we are able to buy at a higher price. This means higher and fairer profit for them. At the same time, you can get them at a much cheaper price.</p>\r\n', 1, 'Fresh Harvest Kamote/Sweet Potato (YELLOW)', 'kamote, sweet potato', '2022-10-11 21:21:53', '2022-10-11 21:21:53'),
(28, 21, 'Kamote-Yellow-768x1024.jpg', 4, 14, 'kamote Yellow', 'Fresh Harvest kamote/Sweet potato (YELLOW)', '<p>Kamote or Sweet Potato&nbsp;from Farmers in Pangasinan and Abra, and of course: from one of our very own Agribusiness Farms.</p>\r\n\r\n<p>By buying directly from the farmers, we are able to buy at a higher price. This means higher and fairer profit for them. At the same time, you can get them at a much cheaper price.</p>\r\n', 1, 'Fresh Harvest Kamote/Sweet Potato (YELLOW)', 'kamote, sweet potato', '2022-10-11 21:21:53', '2022-10-11 21:21:53'),
(29, 21, 'Kamote-Yellow-768x1024.jpg', 4, 14, 'kamote Yellow', 'Fresh Harvest kamote/Sweet potato (YELLOW)', '<p>Kamote or Sweet Potato&nbsp;from Farmers in Pangasinan and Abra, and of course: from one of our very own Agribusiness Farms.</p>\r\n\r\n<p>By buying directly from the farmers, we are able to buy at a higher price. This means higher and fairer profit for them. At the same time, you can get them at a much cheaper price.</p>\r\n', 1, 'Fresh Harvest Kamote/Sweet Potato (YELLOW)', 'kamote, sweet potato', '2022-10-11 21:21:53', '2022-10-11 21:21:53'),
(30, 23, 'celery.jpg', 5, 16, 'Celery', 'Fresh Celery', '<p>Shelf Life: 1 Month</p>\r\n\r\n<p>Expiry Date: 2/12/2024</p>\r\n\r\n<p>Guaranteed 100% Fresh</p>\r\n\r\n<p>Order Now and we will deliver tomorrow.</p>\r\n', 1, 'Fresh Celery', 'celery, fresh veggies', '2022-10-11 21:22:09', '2022-10-11 21:22:09'),
(31, 64, '308198794_376283424581608_512779202324091098_n.png', 1, 3, 'spinach', 'Spinach Ilocano/Kalunay', '', 1, 'Spinach Ilocano/Kalunay', 'spinach, kalunay', '2022-10-11 21:22:09', '2022-10-11 21:22:09'),
(32, 64, '308198794_376283424581608_512779202324091098_n.png', 1, 3, 'spinach', 'Spinach Ilocano/Kalunay', '', 1, 'Spinach Ilocano/Kalunay', 'spinach, kalunay', '2022-10-12 15:34:31', '2022-10-12 15:34:31'),
(33, 23, 'celery.jpg', 5, 16, 'Celery', 'Fresh Celery', '<p>Shelf Life: 1 Month</p>\r\n\r\n<p>Expiry Date: 2/12/2024</p>\r\n\r\n<p>Guaranteed 100% Fresh</p>\r\n\r\n<p>Order Now and we will deliver tomorrow.</p>\r\n', 1, 'Fresh Celery', 'celery, fresh veggies', '2022-10-12 15:34:31', '2022-10-12 15:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `parent` varchar(255) DEFAULT NULL,
  `is_featured` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `images`, `parent`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'harvest.png', 'Vegetables', 1, '2022-09-02 09:07:34', '2022-10-12 15:06:28'),
(2, 'broccoli.png', 'Cruciferous', 1, '2022-09-02 09:07:46', '2022-09-29 01:46:25'),
(3, 'farm.png', 'Marrow', 1, '2022-09-02 09:07:50', '2022-09-29 01:39:25'),
(4, 'harvester.png', 'Root', 1, '2022-09-02 09:07:55', '2022-09-28 15:39:23'),
(5, 'Edible Stem Plant.png', 'EdibleStemPlant', 1, '2022-09-02 09:08:58', '2022-10-07 06:24:37'),
(6, 'onion.png', 'Allium', 1, '2022-09-02 09:09:06', '2022-09-29 01:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `images`, `created_at`, `updated_at`) VALUES
(1, 20, 'celery 1.jfif', '2022-10-07 05:54:28', '2022-10-07 05:54:28'),
(2, 30, 'asparagus 1.jfif', '2022-10-12 15:29:38', '2022-10-12 15:29:38'),
(3, 30, 'Asparagus_image.jpg', '2022-10-12 15:29:49', '2022-10-12 15:29:49'),
(4, 25, 'asparagus 1.jfif', '2022-10-12 15:38:05', '2022-10-12 15:38:05'),
(5, 25, 'Asparagus_image.jpg', '2022-10-12 15:38:19', '2022-10-12 15:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_categories`
--

CREATE TABLE `product_sub_categories` (
  `id` int(11) NOT NULL,
  `product_categories_id` int(11) NOT NULL,
  `child` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_sub_categories`
--

INSERT INTO `product_sub_categories` (`id`, `product_categories_id`, `child`, `created_at`, `updated_at`) VALUES
(1, 1, 'Leafy green', '2022-09-02 09:10:37', '2022-09-02 09:10:37'),
(2, 1, 'pechay baguio', '2022-09-02 09:10:44', '2022-09-02 09:10:44'),
(3, 1, 'spinach', '2022-09-02 09:10:56', '2022-09-02 09:10:56'),
(4, 1, 'lettuce', '2022-09-02 09:11:01', '2022-09-02 09:11:01'),
(5, 1, 'Pechay', '2022-09-02 09:11:06', '2022-09-02 09:11:06'),
(6, 1, 'Cruciferous', '2022-09-02 09:11:50', '2022-09-02 09:11:50'),
(7, 2, 'Cabbage', '2022-09-02 09:11:55', '2022-09-02 09:13:22'),
(8, 2, 'Cauliflower', '2022-09-02 09:11:58', '2022-09-02 09:13:30'),
(9, 2, 'Brocolli', '2022-09-02 09:12:02', '2022-09-02 09:13:38'),
(10, 3, 'pumpkin', '2022-09-02 09:14:57', '2022-09-02 09:14:57'),
(11, 3, 'cucumber', '2022-09-02 09:15:05', '2022-09-02 09:15:05'),
(12, 3, 'carrots', '2022-09-02 09:15:11', '2022-09-02 09:15:11'),
(13, 4, 'Potato', '2022-09-02 09:15:17', '2022-09-02 09:15:17'),
(14, 4, 'kamote', '2022-09-02 09:15:22', '2022-09-02 09:15:22'),
(15, 4, 'yam', '2022-09-02 09:15:28', '2022-09-02 09:15:28'),
(16, 5, 'celery', '2022-09-02 09:15:33', '2022-09-02 09:15:33'),
(17, 5, 'asparagus', '2022-09-02 09:15:37', '2022-09-02 09:15:37'),
(18, 6, 'onion', '2022-09-02 09:15:42', '2022-09-02 09:15:42'),
(19, 6, 'tomato', '2022-09-02 09:15:48', '2022-09-02 09:15:48'),
(20, 6, 'garlic', '2022-09-02 09:15:52', '2022-09-02 09:15:52'),
(21, 5, 'Sugar cane', '2022-10-07 06:01:34', '2022-10-07 06:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_tracking`
--

CREATE TABLE `product_tracking` (
  `id` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_tracking`
--

INSERT INTO `product_tracking` (`id`, `reference`, `vendor_id`, `status`, `message`, `created_at`) VALUES
(1, 'QWIAEDLZFJ', 0, 'Pending', 'Transaction has been success.', '2022-09-29 21:11:39'),
(2, 'QWIAEDLZFJ', 0, 'Pending', 'Transaction has been success.', '2022-09-29 21:11:39'),
(3, 'QWIAEDLZFJ', 0, 'Pending', 'Transaction has been success.', '2022-09-29 21:11:39'),
(4, 'QWIAEDLZFJ', 0, 'Pending', 'Transaction has been success.', '2022-09-29 21:11:39'),
(5, 'QWIAEDLZFJ', 24, '2', 'asdasdasd', '2022-09-29 21:16:55'),
(6, 'QWIAEDLZFJ', 21, '2', 'asdasdasd', '2022-09-29 23:07:46'),
(7, 'N2WCD15PTS', 0, 'Pending', 'Transaction has been success.', '2022-09-30 04:00:48'),
(8, 'N2WCD15PTS', 0, 'Pending', 'Transaction has been success.', '2022-09-30 04:00:48'),
(9, '3PB41TFJH7', 0, 'Pending', 'Transaction has been success.', '2022-09-30 07:22:32'),
(10, '3PB41TFJH7', 58, '1', 'Preparing', '2022-09-30 07:22:55'),
(11, '3PB41TFJH7', 58, '2', 'Complete', '2022-09-30 07:23:22'),
(12, 'UX5HZNOFEG', 0, 'Pending', 'Transaction has been success.', '2022-09-30 11:02:02'),
(13, 'N2WCD15PTS', 23, '1', 'Your order has been process', '2022-10-06 08:47:01'),
(14, 'N2WCD15PTS', 23, '3', 'Sorry, your order has been cancelled.', '2022-10-06 08:47:32'),
(15, 'LD14FKE5OS', 0, 'Pending', 'Transaction has been success.', '2022-10-07 06:43:34'),
(16, 'LD14FKE5OS', 0, 'Pending', 'Transaction has been success.', '2022-10-07 06:43:34'),
(17, 'LD14FKE5OS', 0, 'Pending', 'Transaction has been success.', '2022-10-07 06:43:34'),
(18, 'GW7B1C2ODK', 0, 'Pending', 'Transaction has been success.', '2022-10-07 07:24:20'),
(19, 'GW7B1C2ODK', 64, '1', 'Your order has been processing.', '2022-10-07 07:31:48'),
(20, '20221012BIZ269', 0, 'Pending', 'Transaction has been success.', '2022-10-12 03:28:04'),
(21, '20221012BIZ269', 64, '1', 'Yoyr order ', '2022-10-12 13:48:16'),
(22, '20221012BIZ269', 64, '2', 'Your order has been delivered', '2022-10-12 13:48:44'),
(23, '8AW3176Y5U', 0, 'Pending', 'Transaction has been success.', '2022-10-12 13:54:14'),
(24, '8AW3176Y5U', 23, '1', 'Preparing your order', '2022-10-12 13:54:38'),
(25, '8AW3176Y5U', 23, '2', 'Delivered!', '2022-10-12 13:55:07'),
(26, '20221012BMZ137', 0, 'Pending', 'Transaction has been success.', '2022-10-12 13:56:08'),
(27, '20221012BMZ137', 0, 'Pending', 'Transaction has been success.', '2022-10-12 13:56:08'),
(28, '20221012BMZ137', 23, '1', 'Preparing your order', '2022-10-12 13:56:22'),
(29, '20221012BMZ137', 23, '2', 'Delivered!', '2022-10-12 13:56:25'),
(30, '20221012BND572', 0, 'Pending', 'Transaction has been success.', '2022-10-12 14:00:38'),
(31, '20221012BND572', 23, '1', 'Preparing your order', '2022-10-12 14:00:46'),
(32, '20221012BND572', 23, '2', 'Delivered!', '2022-10-12 14:02:16'),
(33, '35IQLGAK1W', 0, 'Pending', 'Transaction has been success.', '2022-10-13 03:12:11'),
(34, '20221013BIZ221', 0, 'Pending', 'Transaction has been success.', '2022-10-13 03:12:37'),
(35, '20221013BIZ221', 23, '1', 'Preparing your order', '2022-10-13 03:13:12'),
(36, '20221013BIZ221', 23, '2', 'Delivered!', '2022-10-13 03:21:08'),
(37, '35IQLGAK1W', 23, '1', 'Preparing your order', '2022-10-13 03:21:53'),
(38, '35IQLGAK1W', 23, '2', 'Delivered!', '2022-10-13 03:21:59'),
(39, '20221013BJD136', 0, 'Pending', 'Transaction has been success.', '2022-10-13 03:51:29'),
(40, '20221013BJD136', 23, '1', 'Preparing your order', '2022-10-13 03:53:34'),
(41, '20221109BLZ709', 21, '0', 'Transaction has been success.', '2022-11-08 16:43:45'),
(42, '20221109BLZ794', 21, '0', 'Transaction has been success.', '2022-11-08 16:44:28'),
(43, 'DB5WJOV6TK', 21, '0', 'Transaction has been success.', '2022-11-08 16:45:39'),
(44, 'DB5WJOV6TK', 23, '0', 'Transaction has been success.', '2022-11-08 16:45:39'),
(45, '20221109BMR859', 21, '0', 'Transaction has been success.', '2022-11-08 18:24:38'),
(46, '20221109BMR859', 23, '0', 'Transaction has been success.', '2022-11-08 18:24:38'),
(47, 'FOGDK86UX9', 21, '0', 'Transaction has been success.', '2022-11-08 18:28:09'),
(48, 'FOGDK86UX9', 61, '0', 'Transaction has been success.', '2022-11-08 18:28:09'),
(49, '20221109BNC679', 61, '0', 'Transaction has been success.', '2022-11-08 19:32:42'),
(50, '20221109BNC679', 23, '0', 'Transaction has been success.', '2022-11-08 19:32:42'),
(51, '20221109BND578', 21, '0', 'Transaction has been success.', '2022-11-08 19:41:39'),
(52, '20221109BND578', 21, '0', 'Transaction has been success.', '2022-11-08 19:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stocks` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_variations`
--

INSERT INTO `product_variations` (`id`, `product_id`, `variant`, `price`, `stocks`, `discount`, `status`) VALUES
(1, 1, 'Per Box', 300, 679, 0, 0),
(2, 2, 'per Sack', 450, 863, 0, 0),
(3, 3, 'per Sack', 250, 889, 0, 0),
(4, 4, 'per kilo', 90, 90, 0, 0),
(5, 5, 'per kilo', 90, 94, 0, 0),
(6, 6, '1/4 kilo', 80, 89, 0, 0),
(7, 7, 'Per Kilo', 125, 95, 0, 0),
(8, 8, 'Per Kilo', 120, 48, 0, 0),
(9, 8, 'Per Crate', 400, 20, 0, 0),
(10, 9, 'Per 1/2 Kilo', 75, 100, 0, 0),
(11, 9, 'Per 1 kilo', 150, 10, 0, 0),
(12, 9, 'Per Box', 345, 5, 0, 0),
(13, 7, 'Per Box', 320, 10, 0, 0),
(14, 10, 'Per Crate', 89, 499, 0, 0),
(15, 12, 'Per Bundle', 9, 191, 0, 0),
(16, 13, 'Per Box', 89, 631, 0, 0),
(17, 14, 'Per Box', 89, 2, 0, 0),
(18, 15, 'Per Bundle', 9, 2, 0, 0),
(19, 16, 'Per Bundle', 9, 2, 0, 0),
(20, 17, 'Per Bundle', 9, 2, 0, 0),
(21, 18, 'Per Box', 89, 2, 0, 0),
(22, 19, 'Per Box', 89, 2, 0, 0),
(23, 20, '1/2 ', 80, 35, 0, 0),
(24, 20, '1 kilo', 165, 10, 5, 0),
(25, 21, '1 PC', 20, 200, 0, 0),
(26, 21, '1 Bundle', 250, 13, 0, 0),
(27, 22, '1/2 ', 80, 1, 0, 0),
(28, 23, 'Per Kilo', 40, 50, 0, 0),
(29, 24, '1/2 ', 80, 1, 0, 0),
(30, 25, 'Per Bundle', 67, 24, 5, 0),
(31, 26, 'Per Box', 300, 0, 0, 0),
(32, 27, 'per kilo', 90, 3, 0, 0),
(33, 28, 'per kilo', 90, 6, 5, 0),
(34, 29, 'per kilo', 90, 1, 0, 0),
(35, 30, '1/2 ', 80, 0, 0, 1),
(36, 31, '1/4 kilo', 80, 1, 0, 0),
(37, 32, '1/4 kilo', 80, 2, 0, 0),
(38, 33, '1/2 ', 80, 0, 0, 0),
(39, 28, 'Per Box', 300, 23, 10, 0),
(40, 23, 'Per Box', 200, 34, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `accounts_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `ratings` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `store_driver` varchar(255) DEFAULT NULL,
  `shipping_fee` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `vendor_id`, `images`, `store_name`, `store_driver`, `shipping_fee`, `status`) VALUES
(1, 21, 'sprout.png', 'Vasquez Gulayan', NULL, 50, 0),
(3, 23, 'sample.png', 'RBVegetables', NULL, 40, 0),
(5, 25, NULL, 'My Store', NULL, 0, 0),
(10, 48, NULL, 'My Store', NULL, 0, 0),
(11, 49, NULL, 'My Store', NULL, 0, 0),
(12, 50, NULL, 'My Store', NULL, 0, 0),
(14, 52, NULL, 'My Store', NULL, 0, 0),
(15, 53, NULL, 'My Store', NULL, 0, 0),
(23, 61, 'store.png', 'Raulo Veggies Store', NULL, 0, 0),
(24, 62, 'vegetables.png', 'Stephen Buckets', NULL, 0, 0),
(25, 64, 'sprout.png', 'Gab\'s Farm', NULL, 55, 0),
(26, 67, 'images.jpg', 'JB Veggies', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `accounts_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `product` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `shipping_fee` decimal(10,2) NOT NULL,
  `items` int(11) NOT NULL,
  `method_of_payment` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0 = Pending | 1 = Processing | 2 = Completed | 3 = Cancelled',
  `reference` varchar(255) DEFAULT NULL,
  `receipt_image` varchar(255) DEFAULT NULL,
  `notes` varchar(3000) DEFAULT NULL,
  `shipping_trigger` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `is_received` int(11) NOT NULL COMMENT '0 = Not Receive | 1 = Received',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `accounts_id`, `vendor_id`, `products_id`, `variation_id`, `product`, `quantity`, `price`, `shipping_fee`, `items`, `method_of_payment`, `status`, `reference`, `receipt_image`, `notes`, `shipping_trigger`, `month`, `year`, `is_received`, `created_at`, `updated_at`) VALUES
(1, 42, 21, 1, 1, 'Pechay Baguio - Per Box', 2, '300.00', '50.00', 2, 'Cash On Delivery', 2, 'QWIAEDLZFJ', NULL, '', 'No', '9', '2022', 1, '2022-09-29 21:11:39', '2022-09-29 23:07:46'),
(2, 42, 21, 3, 3, 'Kamote - per Sack', 1, '250.00', '50.00', 2, 'Cash On Delivery', 2, 'QWIAEDLZFJ', NULL, '', 'No', '9', '2022', 1, '2022-09-29 21:11:39', '2022-09-29 23:07:46'),
(3, 42, 23, 7, 7, 'Garlic - Per Kilo', 1, '125.00', '5.00', 2, 'Cash On Delivery', 2, 'QWIAEDLZFJ', NULL, '', 'No', '9', '2022', 1, '2022-09-29 21:11:39', '2022-11-08 03:16:47'),
(4, 42, 23, 9, 10, 'White Onion - Per 1/2 Kilo', 1, '75.00', '5.00', 2, 'Cash On Delivery', 2, 'QWIAEDLZFJ', NULL, '', 'No', '9', '2022', 1, '2022-09-29 21:11:39', '2022-11-08 03:16:50'),
(5, 19, 23, 5, 5, 'kamote Purple - per kilo', 1, '90.00', '40.00', 2, 'Cash On Delivery', 3, 'N2WCD15PTS', NULL, '', 'No', '9', '2022', 0, '2022-09-30 04:00:48', '2022-11-08 03:16:53'),
(6, 19, 23, 6, 6, 'spinach - 1/4 kilo', 1, '80.00', '40.00', 2, 'Cash On Delivery', 3, 'N2WCD15PTS', NULL, '', 'No', '9', '2022', 0, '2022-09-30 04:00:48', '2022-10-06 08:47:32'),
(7, 17, 23, 10, 14, 'Carrots - Per Crate', 1, '89.00', '0.00', 1, 'Cash On Delivery', 2, '3PB41TFJH7', NULL, '', 'No', '9', '2022', 1, '2022-09-30 07:22:32', '2022-11-08 03:16:59'),
(8, 19, 21, 1, 1, 'Pechay Baguio - Per Box', 1, '300.00', '50.00', 1, 'Cash On Delivery', 3, 'UX5HZNOFEG', NULL, '', 'No', '9', '2022', 0, '2022-09-30 11:02:02', '2022-10-07 06:39:43'),
(9, 19, 21, 1, 1, 'Pechay Baguio - Per Box', 8, '300.00', '50.00', 1, 'Cash On Delivery', 3, 'LD14FKE5OS', NULL, '', 'No', '10', '2022', 0, '2022-10-07 06:43:34', '2022-10-07 06:43:52'),
(10, 19, 64, 20, 24, 'Celery - 1 kilo', 3, '156.75', '55.00', 1, 'Cash On Delivery', 3, 'LD14FKE5OS', NULL, '', 'No', '10', '2022', 0, '2022-10-07 06:43:34', '2022-10-07 06:43:52'),
(11, 19, 62, 15, 18, 'Pechay - Per Bundle', 2, '9.00', '0.00', 1, 'Cash On Delivery', 3, 'LD14FKE5OS', NULL, '', 'No', '10', '2022', 0, '2022-10-07 06:43:34', '2022-10-07 06:43:52'),
(12, 19, 64, 21, 26, 'Sugar Cane - 1 Bundle', 2, '250.00', '55.00', 1, 'Cash On Delivery', 1, 'GW7B1C2ODK', NULL, '', 'No', '10', '2022', 0, '2022-10-07 07:24:20', '2022-10-07 07:31:48'),
(13, 19, 64, 20, 23, 'Celery - 1/2 ', 3, '80.00', '55.00', 2, 'GCash', 2, '20221012BIZ269', '295907869_738299760594637_7755132222363287172_n.png', '', 'No', '10', '2022', 0, '2022-10-12 03:28:04', '2022-10-12 13:48:44'),
(14, 68, 23, 26, 31, 'Pechay Baguio - Per Box', 3, '300.00', '40.00', 1, 'Cash On Delivery', 2, '8AW3176Y5U', NULL, '', 'No', '10', '2022', 1, '2022-10-12 13:54:14', '2022-10-12 13:56:51'),
(15, 68, 23, 6, 6, 'spinach - 1/4 kilo', 3, '80.00', '40.00', 3, 'GCash', 2, '20221012BMZ137', NULL, '', 'No', '10', '2022', 1, '2022-10-12 13:56:08', '2022-10-12 13:56:42'),
(16, 68, 23, 30, 35, 'Celery - 1/2 ', 1, '80.00', '40.00', 3, 'GCash', 2, '20221012BMZ137', NULL, '', 'No', '10', '2022', 1, '2022-10-12 13:56:08', '2022-10-12 13:56:42'),
(17, 68, 23, 5, 5, 'kamote Purple - per kilo', 3, '90.00', '40.00', 4, 'GCash', 2, '20221012BND572', NULL, '', 'No', '10', '2022', 1, '2022-10-12 14:00:38', '2022-10-12 14:02:33'),
(18, 68, 23, 4, 4, 'kamote Yellow - per kilo', 3, '90.00', '40.00', 1, 'Cash On Delivery', 2, '35IQLGAK1W', NULL, '', 'No', '10', '2022', 0, '2022-10-13 03:12:11', '2022-10-13 03:21:59'),
(19, 68, 23, 6, 6, 'spinach - 1/4 kilo', 5, '80.00', '40.00', 2, 'GCash', 2, '20221013BIZ221', NULL, '', 'No', '10', '2022', 1, '2022-10-13 03:12:37', '2022-10-13 03:21:19'),
(20, 68, 23, 33, 38, 'Celery - 1/2 ', 2, '80.00', '40.00', 3, 'GCash', 1, '20221013BJD136', '308332589_1115900005738503_7780747417506033588_n.jpg', '', 'No', '10', '2022', 0, '2022-10-13 03:51:29', '2022-10-13 03:54:05'),
(21, 17, 21, 2, 2, 'Kalabasa - per Sack', 3, '450.00', '50.00', 1, 'GCash', 0, '20221109BLZ709', NULL, '', 'No', '11', '2022', 0, '2022-11-08 16:43:45', '2022-11-08 16:43:45'),
(22, 17, 21, 3, 3, 'Kamote - per Sack', 2, '250.00', '50.00', 2, 'GCash', 0, '20221109BLZ794', NULL, '', 'No', '11', '2022', 0, '2022-11-08 16:44:28', '2022-11-08 16:44:28'),
(23, 17, 21, 1, 1, 'Pechay Baguio - Per Box', 2, '300.00', '50.00', 3, 'Cash On Delivery', 0, 'DB5WJOV6TK', NULL, '', 'No', '11', '2022', 0, '2022-11-08 16:45:39', '2022-11-08 16:45:39'),
(24, 17, 23, 4, 4, 'kamote Yellow - per kilo', 2, '90.00', '40.00', 1, 'Cash On Delivery', 0, 'DB5WJOV6TK', NULL, '', 'No', '11', '2022', 0, '2022-11-08 16:45:39', '2022-11-08 16:45:39'),
(25, 17, 21, 2, 2, 'Kalabasa - per Sack', 2, '900.00', '50.00', 2, 'GCash', 0, '20221109BMR859', NULL, '', 'No', '11', '2022', 0, '2022-11-08 18:24:38', '2022-11-08 18:24:38'),
(26, 17, 23, 5, 5, 'kamote Purple - per kilo', 1, '90.00', '40.00', 2, 'GCash', 0, '20221109BMR859', NULL, '', 'No', '11', '2022', 0, '2022-11-08 18:24:38', '2022-11-08 18:24:38'),
(27, 17, 21, 2, 2, 'Kalabasa - per Sack', 2, '900.00', '50.00', 2, 'Cash On Delivery', 0, 'FOGDK86UX9', NULL, '', 'No', '11', '2022', 0, '2022-11-08 18:28:09', '2022-11-08 18:28:09'),
(28, 17, 61, 12, 15, 'Pechay - Per Bundle', 2, '18.00', '0.00', 2, 'Cash On Delivery', 0, 'FOGDK86UX9', NULL, '', 'No', '11', '2022', 0, '2022-11-08 18:28:09', '2022-11-08 18:28:09'),
(29, 17, 61, 12, 15, 'Pechay - Per Bundle', 1, '9.00', '0.00', 2, 'GCash', 0, '20221109BNC679', NULL, '', 'No', '11', '2022', 0, '2022-11-08 19:32:42', '2022-11-08 19:32:42'),
(30, 17, 23, 4, 4, 'kamote Yellow - per kilo', 4, '360.00', '40.00', 2, 'GCash', 0, '20221109BNC679', NULL, '', 'No', '11', '2022', 0, '2022-11-08 19:32:42', '2022-11-08 19:32:42'),
(31, 17, 21, 2, 2, 'Kalabasa - per Sack', 5, '2250.00', '50.00', 2, 'GCash', 0, '20221109BND578', NULL, '', 'No', '11', '2022', 0, '2022-11-08 19:41:39', '2022-11-08 19:41:39'),
(32, 17, 21, 3, 3, 'Kamote - per Sack', 1, '250.00', '50.00', 2, 'GCash', 0, '20221109BND578', NULL, '', 'No', '11', '2022', 0, '2022-11-08 19:41:39', '2022-11-08 19:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, '2001:4451:41ec:7700:e8ae:1198:761a:fa2e', '9', '2022', '2022-09-26 15:04:57', '2022-09-26 15:04:57'),
(2, '2a03:2880:23ff:6::face:b00c', '9', '2022', '2022-09-26 15:08:18', '2022-09-26 15:08:18'),
(3, '2a03:2880:23ff:8::face:b00c', '9', '2022', '2022-09-26 15:08:19', '2022-09-26 15:08:19'),
(4, '2a03:2880:23ff:d::face:b00c', '9', '2022', '2022-09-26 15:08:31', '2022-09-26 15:08:31'),
(5, '2a03:2880:21ff:76::face:b00c', '9', '2022', '2022-09-26 15:08:34', '2022-09-26 15:08:34'),
(6, '2a03:2880:3ff:5::face:b00c', '9', '2022', '2022-09-26 15:09:12', '2022-09-26 15:09:12'),
(7, '136.158.28.109', '9', '2022', '2022-09-26 16:19:14', '2022-09-26 16:19:14'),
(8, '112.201.176.176', '9', '2022', '2022-09-26 16:21:56', '2022-09-26 16:21:56'),
(9, '175.176.19.215', '9', '2022', '2022-09-26 17:24:31', '2022-09-26 17:24:31'),
(10, '180.163.220.66', '9', '2022', '2022-09-26 18:21:51', '2022-09-26 18:21:51'),
(11, '27.115.124.6', '9', '2022', '2022-09-26 18:23:52', '2022-09-26 18:23:52'),
(12, '110.87.132.202', '9', '2022', '2022-09-26 18:23:54', '2022-09-26 18:23:54'),
(13, '182.54.16.32', '9', '2022', '2022-09-26 20:40:43', '2022-09-26 20:40:43'),
(14, '180.190.31.226', '9', '2022', '2022-09-26 22:45:35', '2022-09-26 22:45:35'),
(15, '202.90.152.68', '9', '2022', '2022-09-27 00:26:35', '2022-09-27 00:26:35'),
(16, '2404:3c00:254b:2100:4189:a44b:b283:ba35', '9', '2022', '2022-09-27 00:36:02', '2022-09-27 00:36:02'),
(17, '110.54.134.126', '9', '2022', '2022-09-27 01:36:16', '2022-09-27 01:36:16'),
(18, '34.207.194.89', '9', '2022', '2022-09-27 01:39:30', '2022-09-27 01:39:30'),
(19, '2001:4451:41ec:7700:89bb:7906:f8b0:4cd7', '9', '2022', '2022-09-27 02:08:33', '2022-09-27 02:08:33'),
(20, '2404:3c00:254b:2100:981f:ad53:12c3:983f', '9', '2022', '2022-09-27 02:22:15', '2022-09-27 02:22:15'),
(21, '2a03:2880:ff:7::face:b00c', '9', '2022', '2022-09-27 03:03:42', '2022-09-27 03:03:42'),
(22, '2a03:2880:ff:10::face:b00c', '9', '2022', '2022-09-27 03:03:44', '2022-09-27 03:03:44'),
(23, '2404:3c00:254b:2100:cddc:94d2:7045:ea62', '9', '2022', '2022-09-27 03:04:02', '2022-09-27 03:04:02'),
(24, '2404:3c00:254b:2100:95a4:3720:1872:dacd', '9', '2022', '2022-09-27 03:05:50', '2022-09-27 03:05:50'),
(25, '2404:3c00:254b:2100:5b9:42be:50df:a436', '9', '2022', '2022-09-27 05:40:32', '2022-09-27 05:40:32'),
(26, '2a03:2880:ff:12::face:b00c', '9', '2022', '2022-09-27 05:40:44', '2022-09-27 05:40:44'),
(27, '130.105.69.99', '9', '2022', '2022-09-27 05:40:59', '2022-09-27 05:40:59'),
(28, '202.90.152.70', '9', '2022', '2022-09-27 05:46:50', '2022-09-27 05:46:50'),
(29, '112.201.177.70', '9', '2022', '2022-09-27 06:20:24', '2022-09-27 06:20:24'),
(30, '199.59.150.183', '9', '2022', '2022-09-27 07:06:08', '2022-09-27 07:06:08'),
(31, '152.32.98.65', '9', '2022', '2022-09-27 07:12:46', '2022-09-27 07:12:46'),
(32, '35.246.65.127', '9', '2022', '2022-09-27 09:17:29', '2022-09-27 09:17:29'),
(33, '2001:4451:41ec:7700:3006:5f11:a6b0:386c', '9', '2022', '2022-09-27 16:41:11', '2022-09-27 16:41:11'),
(34, '2600:3c03::f03c:93ff:fe64:de2c', '9', '2022', '2022-09-27 16:50:26', '2022-09-27 16:50:26'),
(35, '93.158.91.196', '9', '2022', '2022-09-27 18:07:40', '2022-09-27 18:07:40'),
(36, '180.190.31.192', '9', '2022', '2022-09-28 07:22:58', '2022-09-28 07:22:58'),
(37, '202.90.152.69', '9', '2022', '2022-09-28 07:23:11', '2022-09-28 07:23:11'),
(38, '155.137.109.31', '9', '2022', '2022-09-28 08:55:43', '2022-09-28 08:55:43'),
(39, '112.200.229.5', '9', '2022', '2022-09-28 11:19:18', '2022-09-28 11:19:18'),
(40, '2001:4451:41c4:c200:30e6:ea6a:ba1d:95ac', '9', '2022', '2022-09-29 06:04:41', '2022-09-29 06:04:41'),
(41, '180.221.244.239', '9', '2022', '2022-09-29 06:11:42', '2022-09-29 06:11:42'),
(42, '2404:3c00:254b:2100:18fd:83bf:cf6d:65d', '9', '2022', '2022-09-29 08:38:05', '2022-09-29 08:38:05'),
(43, '2a03:2880:ff:77::face:b00c', '9', '2022', '2022-09-29 08:38:17', '2022-09-29 08:38:17'),
(44, '2a03:2880:ff:78::face:b00c', '9', '2022', '2022-09-29 08:38:18', '2022-09-29 08:38:18'),
(45, '2001:4451:87dd:1e00:c459:172f:8ad:63d9', '9', '2022', '2022-09-29 08:39:17', '2022-09-29 08:39:17'),
(46, '52.91.16.197', '9', '2022', '2022-09-29 12:56:08', '2022-09-29 12:56:08'),
(47, '14.102.171.5', '9', '2022', '2022-09-29 16:41:40', '2022-09-29 16:41:40'),
(48, '2001:4451:41c4:c200:858:6e7c:8e54:a34a', '9', '2022', '2022-09-29 18:20:42', '2022-09-29 18:20:42'),
(49, '209.146.16.5', '9', '2022', '2022-09-29 20:29:26', '2022-09-29 20:29:26'),
(50, '154.205.22.66', '9', '2022', '2022-09-30 03:19:59', '2022-09-30 03:19:59'),
(51, '175.176.17.156', '9', '2022', '2022-09-30 05:38:02', '2022-09-30 05:38:02'),
(52, '45.124.58.5', '9', '2022', '2022-09-30 06:41:26', '2022-09-30 06:41:26'),
(53, '209.35.160.248', '9', '2022', '2022-09-30 07:10:33', '2022-09-30 07:10:33'),
(54, '154.205.22.67', '9', '2022', '2022-09-30 07:14:30', '2022-09-30 07:14:30'),
(55, '209.35.160.246', '9', '2022', '2022-09-30 10:55:19', '2022-09-30 10:55:19'),
(56, '112.201.177.70', '10', '2022', '2022-09-30 19:37:18', '2022-09-30 19:37:18'),
(57, '34.238.136.78', '10', '2022', '2022-10-01 07:00:55', '2022-10-01 07:00:55'),
(58, '35.246.65.127', '10', '2022', '2022-10-01 09:17:29', '2022-10-01 09:17:29'),
(59, '198.235.24.27', '10', '2022', '2022-10-01 18:02:02', '2022-10-01 18:02:02'),
(60, '205.210.31.8', '10', '2022', '2022-10-01 22:49:18', '2022-10-01 22:49:18'),
(61, '54.81.219.182', '10', '2022', '2022-10-02 05:08:44', '2022-10-02 05:08:44'),
(62, '136.158.28.109', '10', '2022', '2022-10-03 08:21:57', '2022-10-03 08:21:57'),
(63, '2404:3c00:254b:2100:31d5:bbe7:b033:4dc6', '10', '2022', '2022-10-03 13:20:23', '2022-10-03 13:20:23'),
(64, '202.90.152.68', '10', '2022', '2022-10-03 13:21:20', '2022-10-03 13:21:20'),
(65, '45.128.160.157', '10', '2022', '2022-10-03 15:53:52', '2022-10-03 15:53:52'),
(66, '3.239.158.141', '10', '2022', '2022-10-03 16:32:49', '2022-10-03 16:32:49'),
(67, '167.71.169.55', '10', '2022', '2022-10-04 19:53:34', '2022-10-04 19:53:34'),
(68, '18.208.138.155', '10', '2022', '2022-10-04 20:43:00', '2022-10-04 20:43:00'),
(69, '2607:2200:0:2347:225:90ff:fe66:2576', '10', '2022', '2022-10-05 04:32:55', '2022-10-05 04:32:55'),
(70, '54.173.37.54', '10', '2022', '2022-10-05 06:43:56', '2022-10-05 06:43:56'),
(71, '3.93.31.173', '10', '2022', '2022-10-05 16:47:11', '2022-10-05 16:47:11'),
(72, '193.235.141.172', '10', '2022', '2022-10-05 20:37:29', '2022-10-05 20:37:29'),
(73, '112.200.228.53', '10', '2022', '2022-10-06 08:34:32', '2022-10-06 08:34:32'),
(74, '155.137.109.31', '10', '2022', '2022-10-06 08:35:28', '2022-10-06 08:35:28'),
(75, '124.6.179.38', '10', '2022', '2022-10-06 10:18:38', '2022-10-06 10:18:38'),
(76, '203.160.191.139', '10', '2022', '2022-10-07 03:12:59', '2022-10-07 03:12:59'),
(77, '14.102.171.5', '10', '2022', '2022-10-07 03:52:11', '2022-10-07 03:52:11'),
(78, '34.226.138.116', '10', '2022', '2022-10-07 04:13:47', '2022-10-07 04:13:47'),
(79, '3.89.92.182', '10', '2022', '2022-10-07 04:25:02', '2022-10-07 04:25:02'),
(80, '154.205.22.67', '10', '2022', '2022-10-07 05:12:46', '2022-10-07 05:12:46'),
(81, '154.205.22.66', '10', '2022', '2022-10-07 05:43:36', '2022-10-07 05:43:36'),
(82, '2404:3c00:254b:2100:f02f:6006:8627:bb1e', '10', '2022', '2022-10-07 13:06:41', '2022-10-07 13:06:41'),
(83, '185.39.144.147', '10', '2022', '2022-10-08 03:30:22', '2022-10-08 03:30:22'),
(84, '198.235.24.152', '10', '2022', '2022-10-09 00:18:19', '2022-10-09 00:18:19'),
(85, '136.158.39.2', '10', '2022', '2022-10-09 13:59:31', '2022-10-09 13:59:31'),
(86, '110.54.134.110', '10', '2022', '2022-10-09 14:58:43', '2022-10-09 14:58:43'),
(87, '2a03:94e0:ffff:185:181:60:0:12', '10', '2022', '2022-10-09 22:32:17', '2022-10-09 22:32:17'),
(88, '209.146.16.4', '10', '2022', '2022-10-10 03:37:36', '2022-10-10 03:37:36'),
(89, '120.28.65.52', '10', '2022', '2022-10-10 12:32:05', '2022-10-10 12:32:05'),
(90, '198.235.24.186', '10', '2022', '2022-10-10 13:21:54', '2022-10-10 13:21:54'),
(91, '209.141.41.193', '10', '2022', '2022-10-11 01:54:01', '2022-10-11 01:54:01'),
(92, '193.235.141.181', '10', '2022', '2022-10-11 05:13:49', '2022-10-11 05:13:49'),
(93, '209.141.51.222', '10', '2022', '2022-10-11 10:58:54', '2022-10-11 10:58:54'),
(94, '93.158.91.193', '10', '2022', '2022-10-12 06:30:10', '2022-10-12 06:30:10'),
(95, '209.146.16.5', '10', '2022', '2022-10-12 07:28:47', '2022-10-12 07:28:47'),
(96, '2404:3c00:254b:2100:9865:7b08:f607:d127', '10', '2022', '2022-10-12 08:11:39', '2022-10-12 08:11:39'),
(97, '2404:3c00:254b:2100:ad62:d218:9203:10d', '10', '2022', '2022-10-12 10:17:23', '2022-10-12 10:17:23'),
(98, '120.28.65.98', '10', '2022', '2022-10-12 13:47:19', '2022-10-12 13:47:19'),
(99, '2404:3c00:254b:2100:2891:bc05:7fdf:a327', '10', '2022', '2022-10-13 03:05:50', '2022-10-13 03:05:50'),
(100, '::1', '11', '2022', '2022-11-02 20:35:33', '2022-11-02 20:35:33'),
(101, '127.0.0.1', '11', '2022', '2022-11-09 00:50:47', '2022-11-09 00:50:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts_address`
--
ALTER TABLE `accounts_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchanger`
--
ALTER TABLE `exchanger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_id` (`accounts_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tracking`
--
ALTER TABLE `product_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `accounts_address`
--
ALTER TABLE `accounts_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exchanger`
--
ALTER TABLE `exchanger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_tracking`
--
ALTER TABLE `product_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`accounts_id`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
