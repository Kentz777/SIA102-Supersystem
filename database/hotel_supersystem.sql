-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 11:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_supersystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `sr_no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `total_pay` int(11) NOT NULL,
  `room_no` varchar(100) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `phonenum` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`sr_no`, `booking_id`, `room_name`, `price`, `total_pay`, `room_no`, `user_name`, `phonenum`, `address`) VALUES
(1, 1, 'Deluxe Room', 1000, 1000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(2, 2, 'Deluxe Room', 1000, 1000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(3, 3, 'Deluxe Room', 1000, 1000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(4, 4, 'Deluxe Room', 1000, 1000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(5, 5, 'Deluxe Room', 1000, 1000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(6, 6, 'Deluxe Room', 1000, 2000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(7, 7, 'Deluxe Room', 1000, 1000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(8, 8, 'Deluxe Room', 1000, 1000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(9, 9, 'Deluxe Room', 1000, 1000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(10, 10, 'Deluxe Room', 1000, 1000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(11, 11, 'Deluxe Room', 1000, 1000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(12, 12, 'Deluxe Room', 1000, 1000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(13, 13, 'Deluxe Room', 1000, 1000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(14, 14, 'Deluxe Room', 1000, 1000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(15, 15, 'Deluxe Room', 1000, 1000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(16, 16, 'Deluxe Room', 1000, 1000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(17, 17, 'Deluxe Room', 1000, 1000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(18, 18, 'Deluxe Room', 1000, 1000, '0', 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(19, 19, 'Deluxe Room', 1000, 4000, 'a5', 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(20, 20, 'Deluxe Room', 1000, 11000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2'),
(21, 21, 'Deluxe Room', 1000, 28000, NULL, 'Jheremie Magat', '09279174628', '242 Mapayapa st. Freedm Park 2');

-- --------------------------------------------------------

--
-- Table structure for table `booking_order`
--

CREATE TABLE `booking_order` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `arrival` int(11) NOT NULL DEFAULT 0,
  `refund` int(11) DEFAULT NULL,
  `booking_status` varchar(100) NOT NULL DEFAULT 'reserved',
  `order_id` varchar(200) NOT NULL,
  `trans_id` varchar(200) DEFAULT NULL,
  `trans_amt` int(11) NOT NULL,
  `trans_status` varchar(100) NOT NULL DEFAULT 'pending',
  `trans_resp_msg` varchar(200) DEFAULT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_order`
--

INSERT INTO `booking_order` (`booking_id`, `user_id`, `room_id`, `check_in`, `check_out`, `arrival`, `refund`, `booking_status`, `order_id`, `trans_id`, `trans_amt`, `trans_status`, `trans_resp_msg`, `datentime`) VALUES
(1, 25, 13, '2023-03-31', '2023-04-01', 0, NULL, 'pending', 'ORD_254344411', NULL, 0, 'pending', NULL, '2023-03-31 17:05:20'),
(2, 25, 13, '2023-03-31', '2023-04-01', 0, NULL, 'pending', 'ORD_257419962', NULL, 0, 'pending', NULL, '2023-03-31 17:34:53'),
(3, 25, 13, '2023-03-31', '2023-04-01', 0, NULL, 'pending', 'ORD_253710491', NULL, 0, 'pending', NULL, '2023-03-31 17:36:42'),
(4, 25, 13, '2023-03-31', '2023-04-01', 0, NULL, 'pending', 'ORD_255996665', NULL, 0, 'pending', NULL, '2023-03-31 20:50:41'),
(5, 25, 13, '2023-04-01', '2023-04-02', 0, NULL, 'pending', 'ORD_251266911', NULL, 0, 'pending', NULL, '2023-03-31 20:56:46'),
(6, 25, 13, '2023-04-01', '2023-04-03', 0, NULL, 'pending', 'ORD_254075504', NULL, 0, 'pending', NULL, '2023-03-31 20:56:57'),
(7, 25, 13, '2023-03-31', '2023-04-01', 0, NULL, 'pending', 'ORD_251398489', NULL, 0, 'pending', NULL, '2023-03-31 21:00:22'),
(8, 25, 13, '2023-03-31', '2023-04-01', 0, NULL, 'pending', 'ORD_252697607', NULL, 0, 'pending', NULL, '2023-03-31 21:04:11'),
(9, 25, 13, '2023-03-31', '2023-04-01', 0, NULL, 'pending', 'ORD_258964539', NULL, 0, 'pending', NULL, '2023-03-31 21:31:57'),
(10, 25, 13, '2023-03-31', '2023-04-01', 0, NULL, 'pending', 'ORD_25659841', NULL, 0, 'pending', NULL, '2023-03-31 21:35:21'),
(11, 25, 13, '2023-03-31', '2023-04-01', 0, NULL, 'pending', 'ORD_253636034', NULL, 0, 'pending', NULL, '2023-03-31 21:40:20'),
(12, 25, 13, '2023-03-31', '2023-04-01', 0, NULL, 'pending', 'ORD_251078919', NULL, 0, 'pending', NULL, '2023-03-31 22:00:35'),
(13, 25, 13, '2023-03-31', '2023-04-01', 0, NULL, 'pending', 'ORD_2529978', NULL, 0, 'pending', NULL, '2023-03-31 22:01:06'),
(14, 25, 13, '2023-03-31', '2023-04-01', 0, NULL, 'pending', 'ORD_2515992', NULL, 0, 'pending', NULL, '2023-03-31 22:01:07'),
(15, 25, 13, '2023-03-31', '2023-04-01', 0, NULL, 'pending', 'ORD_254539353', NULL, 0, 'pending', NULL, '2023-03-31 22:01:09'),
(16, 25, 13, '2023-03-31', '2023-04-01', 0, NULL, 'pending', 'ORD_253073741', NULL, 0, 'pending', NULL, '2023-03-31 22:01:16'),
(17, 25, 13, '2023-03-31', '2023-04-01', 0, NULL, 'pending', 'ORD_25268875', NULL, 1000, 'pending', NULL, '2023-03-31 22:01:59'),
(18, 25, 13, '2023-04-01', '2023-04-02', 0, 0, 'cancelled', 'ORD_258265377', NULL, 1000, 'pending', NULL, '2023-04-01 12:16:34'),
(19, 25, 13, '2023-04-02', '2023-04-06', 1, NULL, 'reserved', 'ORD_253288388', NULL, 1000, 'pending', NULL, '2023-04-01 12:23:31'),
(20, 25, 13, '2023-04-02', '2023-04-13', 0, 0, 'cancelled', 'ORD_255481860', NULL, 11000, 'pending', NULL, '2023-04-01 12:24:33'),
(21, 25, 13, '2023-04-01', '2023-04-29', 0, NULL, 'cancelled', 'ORD_255888148', NULL, 28000, 'pending', NULL, '2023-04-01 17:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `sr_no` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`sr_no`, `image`) VALUES
(25, 'IMG_54183.png'),
(26, 'IMG_25068.png'),
(27, 'IMG_41838.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(30) NOT NULL,
  `client_ip` varchar(20) NOT NULL,
  `user_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `client_ip`, `user_id`, `product_id`, `qty`, `amount`) VALUES
(1, '', 4, 20, 1, 0),
(3, '', 4, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`) VALUES
(12, 'Beverages'),
(13, 'Desserts'),
(14, 'Soup'),
(16, 'Essentials'),
(17, 'Appetizers');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gmap` varchar(100) NOT NULL,
  `pn1` bigint(20) NOT NULL,
  `pn2` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fb` varchar(30) NOT NULL,
  `insta` varchar(30) NOT NULL,
  `tw` varchar(30) NOT NULL,
  `iframe` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `pn1`, `pn2`, `email`, `fb`, `insta`, `tw`, `iframe`) VALUES
(1, 'Novaliches Bayans, Novaliches Quezon City', 'httpss://goo.gl/maps/oWYDsUh1zYEbEFjd7', 63123421111111, 631234222222, 'hotelmokko@gmail.com', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://twitter.com/', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15435.442482009095!2d121.037608!3d14.720470999999998!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b0fc3c2ea051:0xe53b12893e44650d!2sNovaliches Proper, Novaliches, Quezon City, Metro Manila!5e0!3m2!1sen!2sph!4v1676733784633!5m2!1sen!');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `icon`, `name`, `description`) VALUES
(6, 'IMG_60567.svg', 'WiFi', 'Fiber Internet'),
(7, 'IMG_46330.svg', 'Heater', 'Heater');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(8, 'Bedroom'),
(9, 'Kitchen'),
(10, 'Bathroom');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(30) NOT NULL,
  `supply_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL,
  `stock_type` tinyint(1) NOT NULL COMMENT '1= in , 2 = used',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `supply_id`, `qty`, `stock_type`, `date_created`) VALUES
(1, 1, 20, 1, '2020-09-23 14:08:04'),
(2, 2, 13, 0, '2020-09-23 14:08:14'),
(5, 3, 2333, 1, '2023-03-25 22:05:49'),
(7, 5, 200, 0, '2023-03-29 17:42:19'),
(15, 3, 1, 0, '2023-03-31 21:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_categories`
--

CREATE TABLE `laundry_categories` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laundry_categories`
--

INSERT INTO `laundry_categories` (`id`, `name`, `price`) VALUES
(1, 'Bed Sheets', 30),
(3, 'Clothes', 25),
(4, 'Undergarments', 20),
(6, 'sample', 290);

-- --------------------------------------------------------

--
-- Table structure for table `laundry_items`
--

CREATE TABLE `laundry_items` (
  `id` int(30) NOT NULL,
  `laundry_category_id` int(30) NOT NULL,
  `weight` double NOT NULL,
  `laundry_id` int(30) NOT NULL,
  `unit_price` double NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laundry_items`
--

INSERT INTO `laundry_items` (`id`, `laundry_category_id`, `weight`, `laundry_id`, `unit_price`, `amount`) VALUES
(13, 4, 3, 13, 20, 60);

-- --------------------------------------------------------

--
-- Table structure for table `laundry_list`
--

CREATE TABLE `laundry_list` (
  `id` int(30) NOT NULL,
  `customer_name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1 = ongoing,2= ready,3= claimed',
  `queue` int(30) NOT NULL,
  `total_amount` double NOT NULL,
  `pay_status` tinyint(1) DEFAULT 0,
  `amount_tendered` double NOT NULL,
  `amount_change` double NOT NULL,
  `remarks` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laundry_list`
--

INSERT INTO `laundry_list` (`id`, `customer_name`, `status`, `queue`, `total_amount`, `pay_status`, `amount_tendered`, `amount_change`, `remarks`, `date_created`) VALUES
(6, 'Kent', 3, 2, 0, 0, 0, -775, 'dasdassad', '2023-03-14 14:40:06'),
(7, 'Mark', 2, 3, 100, 1, 700, 600, 'asdsadsad', '2023-03-14 18:01:49'),
(8, 'Margh', 2, 4, 150, 0, 0, -150, 'sample remarks', '2023-03-14 19:36:51'),
(10, 'Kurt', 2, 5, 80, 0, 0, -80, 'sample', '2023-03-15 02:56:55'),
(11, 'Mark', 0, 6, 400, 0, 0, -400, 'sdsadsadsads', '2023-03-23 14:01:55'),
(12, 'Kent', 2, 7, 1160, 1, 2000, 840, 'sdsadsad', '2023-03-24 17:29:26'),
(13, 'Kent', 3, 8, 60, 1, 500, 440, 'sadasdsad', '2023-03-25 21:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `address` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `product_id`, `qty`, `amount`) VALUES
(25, 3, 20, 0, 0),
(26, 4, 20, 0, 0),
(27, 5, 19, 0, 0),
(28, 6, 21, 0, 0),
(29, 7, 23, 0, 0),
(30, 8, 22, 0, 0),
(31, 9, 20, 0, 0),
(32, 10, 24, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_inventory`
--

CREATE TABLE `product_inventory` (
  `id` int(30) NOT NULL,
  `prod_id` int(30) NOT NULL,
  `prod_qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_inventory`
--

INSERT INTO `product_inventory` (`id`, `prod_id`, `prod_qty`) VALUES
(14, 0, 122),
(15, 21, 21),
(16, 20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `img_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0= unavailable, 2 Available',
  `prod_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `category_id`, `name`, `description`, `price`, `img_path`, `status`, `prod_qty`) VALUES
(0, 17, 'Breakfast Bundle 1', 'sample ', 250, '1678901520_FOODS 8.jpeg', 1, 0),
(20, 16, 'Condoms', 'description', 40, '1678794360_64283281_906.jpg', 1, 0),
(21, 17, 'Calamares', 'sample', 259, '1678901520_FOODS 7.jpg', 1, 0),
(24, 14, 'Special Sopas', 'masarap', 150, '1680082140_special_sopas.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `guest` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `guest`, `description`, `status`, `removed`) VALUES
(1, 'Simple Room', 13, 13, 13, 13, 'adasdas', 1, 1),
(2, 'Simple Room', 13, 13, 13, 13, 'adsdadas', 1, 1),
(3, 'Simple Room', 13, 13, 13, 13, '13131sada', 1, 1),
(4, '313', 3131, 13, 13, 312, 'dasdas', 1, 1),
(5, 'last', 1, 1, 11, 1, 'd11', 1, 1),
(6, 'Simple Room12', 1, 1, 1, 1, 'ada', 1, 1),
(7, 'Standard', 15, 500, 1, 5, 'Standard room', 1, 1),
(8, 'Deluxe Room', 50, 5000, 1, 5, 'Grande', 1, 1),
(9, 'Standard', 150, 500, 1, 5, 'Standard Room affordable', 1, 1),
(10, 'Standard Room', 50, 1000, 1, 10, 'Standard room for family', 1, 1),
(11, 'Deluxe Room', 150, 5000, 1, 15, 'Deluxe Room for vacation', 1, 1),
(12, 'Standard Room', 50, 500, 1, 5, 'Standard Room', 1, 1),
(13, 'Deluxe Room', 100, 1000, 1, 10, 'Good for vacation', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_facilities`
--

INSERT INTO `room_facilities` (`sr_no`, `room_id`, `facilities_id`) VALUES
(29, 13, 6),
(30, 13, 7);

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_features`
--

INSERT INTO `room_features` (`sr_no`, `room_id`, `features_id`) VALUES
(27, 13, 8),
(28, 13, 9),
(29, 13, 10);

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`sr_no`, `room_id`, `image`, `thumb`) VALUES
(20, 13, 'IMG_75774.png', 0),
(21, 13, 'IMG_16308.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `site_about` varchar(250) NOT NULL,
  `shutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'Hotel Mokko', 'BLALALHLHALHLHALHAHAdasdasdasdasad123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supply_list`
--

CREATE TABLE `supply_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supply_list`
--

INSERT INTO `supply_list` (`id`, `name`) VALUES
(1, 'Fabric Detergent'),
(2, 'Fabric Conditioner'),
(3, 'Baking Soda'),
(4, 'Bar Soap'),
(5, 'dummy');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Axia Hotel Foods and Room Services', 'kentalexandre.cabacang.ortego@gmail.com', '12312312', '1678877700_BANNER 1.jpg', '&lt;p&gt;Welcome to our &lt;b&gt;Room and Food Services&lt;/b&gt; - your ultimate destination for a comfortable and convenient stay. We understand that staying away from home can be a challenge, which is why we are committed to providing you with the best of both worlds - cozy accommodations and delicious cuisine. Our team of dedicated professionals strives to make your stay as relaxing and hassle-free as possible, allowing you to focus on enjoying your time with us. From our luxurious rooms to our carefully crafted menus, every aspect of our services is designed to cater to your needs and preferences. So whether you&amp;#x2019;re traveling for business or pleasure, let us take care of you with our exceptional Room and Food Services. We look forward to welcoming you and providing you with a memorable experience that you&amp;#x2019;ll want to relive again and again.&lt;br&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_details`
--

INSERT INTO `team_details` (`sr_no`, `name`, `picture`) VALUES
(27, 'Aaron Agbalo', 'IMG_81003.png'),
(28, 'Cherry Ann Barcoma', 'IMG_44708.png'),
(29, 'Mikaela Tobiano', 'IMG_50661.png'),
(30, 'Mark Piolo Fabia', 'IMG_94165.png'),
(31, 'Jerricho Yusores', 'IMG_56076.png'),
(32, 'Arjay Ismael', 'IMG_73342.png'),
(33, 'Darwyn Maquirang', 'IMG_76798.png'),
(34, 'Dorothy Abella', 'IMG_98127.png'),
(35, 'Jheremie Magat', 'IMG_55803.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', '123456', 1),
(2, 'Admin', '', '', 2),
(5, 'Kent Ortego', '', '', 2),
(6, 'Kent Alexandre', '', '', 2),
(9, 'test', '', '', 2),
(10, 'qqqq', '', '', 2),
(11, 'qqqqqqq', '', '', 2),
(12, 'qqqqqq', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phonenum` varchar(20) NOT NULL,
  `pincode` int(11) NOT NULL,
  `dob` date NOT NULL,
  `profile` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `token` varchar(200) DEFAULT NULL,
  `t_expire` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`id`, `name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `profile`, `password`, `is_verified`, `token`, `t_expire`, `status`, `datentime`) VALUES
(25, 'Jheremie Magat', 'jheremiemagat@gmail.com', '242 Mapayapa st. Freedm Park 2', '09279174628', 1126, '2002-05-24', 'IMG_11276.jpeg', '$2y$10$GNkKgwhHA0apRWSN97rv3eGVDXCG92ju8/y3e6fPs6Ik/lQzS/aF6', 1, NULL, NULL, 1, '2023-03-30 07:58:22'),
(26, 'Margh', 'sample@gmail.com', 'Sheeesh', '09279174628', 1126, '2002-05-24', 'IMG_11276.jpeg', '123456', 1, NULL, NULL, 1, '2023-03-30 07:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `room_no` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `room_no`) VALUES
(1, 'room 1'),
(2, 'room 2'),
(3, 'room 3'),
(4, 'room 4'),
(5, 'room 5'),
(6, 'room 6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_categories`
--
ALTER TABLE `laundry_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_items`
--
ALTER TABLE `laundry_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_list`
--
ALTER TABLE `laundry_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_inventory`
--
ALTER TABLE `product_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `facilities id` (`facilities_id`),
  ADD KEY `room id` (`room_id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `features id` (`features_id`),
  ADD KEY `rm id` (`room_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `supply_list`
--
ALTER TABLE `supply_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_details`
--
ALTER TABLE `team_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `laundry_categories`
--
ALTER TABLE `laundry_categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `laundry_items`
--
ALTER TABLE `laundry_items`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `laundry_list`
--
ALTER TABLE `laundry_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_inventory`
--
ALTER TABLE `product_inventory`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `supply_list`
--
ALTER TABLE `supply_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
