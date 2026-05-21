-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2026 at 10:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cakebliss_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Profile_image` varchar(255) DEFAULT NULL,
  `password` char(60) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Name`, `Profile_image`, `password`, `website`, `location`, `email`, `created_at`) VALUES
(1, 'Admin1', 'emp_1.png', '121212', 'https://www.example.com/about', 'chandighar', 'admin@gmail.com', '2025-06-05 18:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_as` tinyint(1) DEFAULT 0 COMMENT '0=user, 1=admin, 2=seller',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `firstname`, `lastname`, `email`, `password`, `role_as`, `created_at`) VALUES
(1, 'Arvind Nagpal', 'Nagpal', 'nagpalintustries@gmail.com', '6dd9aa0b0606270d0875acb21546bedb', 1, '2026-02-20 02:52:05'),
(4, 'Arvind', 'mehta', 'theSourdough@gmail.com', '96e79218965eb72c92a549dd5a330112', 2, '2026-02-20 04:18:20'),
(5, 'Vinay', 'gupta', 'guptavinay@gmail.com', '470793e036b9db245ac460dc89b15913', 0, '2026-02-20 05:40:37'),
(6, 'Bhavna', 'madan', 'wildflour@gmail.com', 'defa50a7babc2b727c44fe4e03905bf4', 2, '2026-02-20 06:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `bakers`
--

CREATE TABLE `bakers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bakery_name` varchar(150) NOT NULL,
  `bakery_type` varchar(150) DEFAULT NULL,
  `location` varchar(150) DEFAULT NULL,
  `story` text DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `contact_email` varchar(150) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `shop_status` tinyint(1) DEFAULT 0 COMMENT '0=pending, 1=active, 2=reject, 3=block',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bakers`
--

INSERT INTO `bakers` (`id`, `user_id`, `bakery_name`, `bakery_type`, `location`, `story`, `profile_image`, `banner_image`, `contact_email`, `phone`, `shop_status`, `created_at`) VALUES
(1, 4, 'The Sourdough Co.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-02-20 04:18:20'),
(2, 6, 'wildflour.co', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-02-20 06:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(191) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_id`, `category_name`, `image`, `created_at`) VALUES
(1, 0, 'Cake', 'uploads/1774018268_images.jpg', '2026-03-20 14:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` int(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dietary_category`
--

CREATE TABLE `dietary_category` (
  `id` int(11) NOT NULL,
  `dietary` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dietary_category`
--

INSERT INTO `dietary_category` (`id`, `dietary`, `status`, `created_at`) VALUES
(5, 'Vegan', 1, '2026-03-17 14:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `occasion_category`
--

CREATE TABLE `occasion_category` (
  `id` int(11) NOT NULL,
  `occasion` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `occasion_category`
--

INSERT INTO `occasion_category` (`id`, `occasion`, `status`, `created_at`) VALUES
(2, 'Wedding', 1, '2026-03-20 06:35:55'),
(3, 'Anniversy', 1, '2026-03-20 06:36:11'),
(4, 'Birthday', 1, '2026-03-20 06:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pastries`
--

CREATE TABLE `pastries` (
  `id` int(11) NOT NULL,
  `pastry_name` varchar(150) NOT NULL,
  `pastry_price` decimal(10,2) NOT NULL,
  `pastry_description` varchar(255) NOT NULL,
  `pastry_image` varchar(255) DEFAULT NULL,
  `pastry_stock` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL,
  `baker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pastries`
--

INSERT INTO `pastries` (`id`, `pastry_name`, `pastry_price`, `pastry_description`, `pastry_image`, `pastry_stock`, `created_at`, `category_id`, `baker_id`) VALUES
(14, 'Chocolate Truffle Cake', 680.00, 'Rich, moist, and intensely chocolatey—our Chocolate Truffle Cake is a dream come true for all chocolate lovers. Made with layers of soft chocolate sponge, filled and coated in luscious dark chocolate ganache, and topped with premium chocolate truffles and', '1769282440_3628_Chocolate-Truffel--Cake_01.png,1769282440_7861_Chocolate-Truffel--Cake_02.png,1769282440_3774_Chocolate-Truffel--Cake_03.png,1769282440_6564_Chocolate-Truffel--Cake_04.png', 1, '2026-01-24 19:20:40', 2, 1),
(17, 'Butter Scotch', 1250.00, 'Indulge in a delightful assortment of 12 handcrafted cupcakes, perfect for any celebration or sweet craving. Choose from classic flavors like Chocolate Fudge, Red Velvet, Vanilla Bean, and Butterscotch, or customize your box with a mix of your favorites.\r', '1769546716_4379_butterscotch_cupcake1.png,1769546716_9547_butterscotch_cupcake2.png,1769546716_4066_butterscotch_cupcake3.png,1769546716_5181_butterscotch_cupcake4.png', 1, '2026-01-27 20:45:16', 7, 1),
(18, 'Butter Cookies', 1200.00, 'a classic, simple European-style biscuit known for their rich, buttery flavor, delicate texture, and minimal ingredients. ', '1770953577_1156_buttercookies_01.png,1770953577_6979_buttercookies_02.png,1770953577_6296_buttercookies_03.png,1770953577_9628_buttercookies_04.png', 1, '2026-02-13 03:32:57', 15, 1),
(19, 'Blueberry Cupcake', 1260.00, 'a moist, tender, vanilla-based cake packed with juicy, bursting blueberries, often featuring a tangy cream cheese or vibrant blueberry buttercream frosting. ', '1770953739_1525_blueberry_cupcake1.png,1770953739_3556_blueberry_cupcake2.png,1770953739_6983_blueberry_cupcake3.png,1770953739_3263_blueberry_cupcake4.png', 1, '2026-02-13 03:35:39', 7, 2),
(20, 'Vanilla Dream Cake', 700.00, 'Light, elegant, and irresistibly smooth – the Vanilla Dream Cake is perfect for those who love subtle sweetness and classic flavours. Crafted with layers of soft, fluffy vanilla sponge and filled with airy vanilla bean whipped cream or buttercream.\r\n', '1770978284_5359_Vanilla-Dream--Cake_01.png,1770978284_1445_Vanilla-Dream--Cake_02.png,1770978284_2554_Vanilla-Dream--Cake_03.png,1770978284_6145_Vanilla-Dream--Cake_04.png', 0, '2026-02-13 10:24:45', 0, 2),
(21, 'Vanilla Dream Cake', 649.00, 'A timeless favorite that never goes out of style. Our Black Forest Cake features layers of moist chocolate sponge soaked in cherry syrup, filled with fluffy whipped cream and sweet black cherries. Topped with cream swirls and dark chocolate shavings.\r\n', '1771567953_8333_Vanilla-Dream--Cake_01.png,1771567953_6595_Vanilla-Dream--Cake_02.png,1771567953_4438_Vanilla-Dream--Cake_03.png,1771567953_8486_Vanilla-Dream--Cake_04.png', 1, '2026-02-20 06:12:33', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `bakers`
--
ALTER TABLE `bakers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `dietary_category`
--
ALTER TABLE `dietary_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occasion_category`
--
ALTER TABLE `occasion_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pastries`
--
ALTER TABLE `pastries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bakers`
--
ALTER TABLE `bakers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dietary_category`
--
ALTER TABLE `dietary_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `occasion_category`
--
ALTER TABLE `occasion_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pastries`
--
ALTER TABLE `pastries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bakers`
--
ALTER TABLE `bakers`
  ADD CONSTRAINT `bakers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `auth` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `auth` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
