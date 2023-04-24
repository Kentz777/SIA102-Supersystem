-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 09:42 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `information` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `billing_admin`
--

CREATE TABLE `billing_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_admin`
--

INSERT INTO `billing_admin` (`id`, `username`, `admin_name`, `pass`, `status`) VALUES
(2, 'admin', 'Admin', 'admin', 'Inactive');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`sr_no`, `booking_id`, `room_name`, `price`, `total_pay`, `room_no`, `user_name`, `phonenum`, `address`) VALUES
(3, 3, 'Suite Room', 1000, 12000, '', 'Jheremie O Magat', '09279174623', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC'),
(4, 4, 'Deluxe Room', 400, 4800, NULL, 'Jheremie O Magat', '09279174626', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC'),
(5, 5, 'Suite Room', 1000, 24000, '', 'Jheremie O Magat', '09279174626', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC'),
(6, 6, 'Suite Room', 1000, 24000, '', 'Jheremie O Magat', '09279174626', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC'),
(7, 7, 'Standard Room', 200, 14400, '', 'Jheremie O Magat', '09279174626', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC'),
(8, 8, 'Suite Room', 1000, 48000, 'room3', 'Jheremie O Magat', '09279174626', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC'),
(9, 9, 'Suite Room', 1000, 48000, NULL, 'Jheremie O Magat', '09279174626', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC'),
(10, 10, 'Standard Room', 200, 4800, 'room2', 'Jheremie O Magat', '09279174621', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC'),
(11, 11, 'Deluxe Room', 400, 14400, NULL, 'Jheremie O Magat', '09279174621', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC'),
(12, 12, 'Deluxe Room', 400, 14400, '', 'Jheremie O Magat', '09279174621', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC'),
(13, 13, 'Deluxe Room', 400, 24000, 'room6', 'Jheremie O Magat', '09279174621', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC'),
(14, 14, 'Superior Room', 600, 7200, NULL, 'Jheremie O Magat', '09279174621', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC'),
(15, 15, 'Superior Room', 600, 7200, NULL, 'Jheremie O Magat', '09279174621', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC'),
(16, 16, 'Superior Room', 600, 14400, NULL, 'Jheremie O Magat', '09279174621', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC'),
(17, 17, 'Deluxe Room', 400, 9600, 'room3', 'Jheremie O Magat', '09279174621', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC');

-- --------------------------------------------------------

--
-- Table structure for table `booking_order`
--

CREATE TABLE `booking_order` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `arrival` int(11) NOT NULL DEFAULT '0',
  `cancel` int(11) DEFAULT NULL,
  `booking_status` varchar(100) NOT NULL DEFAULT 'pending',
  `order_id` varchar(200) NOT NULL,
  `trans_id` varchar(200) DEFAULT NULL,
  `trans_amt` int(11) NOT NULL,
  `trans_status` varchar(100) NOT NULL DEFAULT 'pending',
  `trans_resp_msg` varchar(200) DEFAULT NULL,
  `rate_review` int(11) DEFAULT NULL,
  `datentime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `booking_state` varchar(128) NOT NULL,
  `prev_booking_state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_order`
--

INSERT INTO `booking_order` (`booking_id`, `user_id`, `room_id`, `check_in`, `check_out`, `arrival`, `cancel`, `booking_status`, `order_id`, `trans_id`, `trans_amt`, `trans_status`, `trans_resp_msg`, `rate_review`, `datentime`, `booking_state`, `prev_booking_state`) VALUES
(3, 3, 8, '2023-04-20 04:16:00', '2023-04-20 16:16:00', 1, NULL, 'reserved', 'ORD_36592672', NULL, 12000, 'pending', NULL, 0, '2023-04-20 04:16:31', 'ongoing', 'ongoing'),
(4, 4, 4, '2023-04-20 04:44:00', '2023-04-20 16:44:00', 0, 1, 'cancelled', 'ORD_46526942', NULL, 4800, 'pending', NULL, NULL, '2023-04-20 04:44:56', 'ongoing', 'ongoing'),
(5, 4, 8, '2023-04-21 05:47:00', '2023-04-22 05:47:00', 1, NULL, 'reserved', 'ORD_4895774', NULL, 24000, 'pending', NULL, 0, '2023-04-20 05:47:56', 'ongoing', ''),
(6, 4, 8, '2023-04-29 07:58:00', '2023-04-30 07:58:00', 1, NULL, 'reserved', 'ORD_41742172', NULL, 24000, 'pending', NULL, 0, '2023-04-20 07:58:39', 'ongoing', ''),
(7, 4, 1, '2023-04-27 08:02:00', '2023-04-30 08:02:00', 1, NULL, 'reserved', 'ORD_47073183', NULL, 14400, 'pending', NULL, 0, '2023-04-20 08:02:19', 'ongoing', ''),
(8, 4, 8, '2023-05-01 08:09:00', '2023-05-03 08:09:00', 1, NULL, 'reserved', 'ORD_49912356', NULL, 48000, 'pending', NULL, 0, '2023-04-20 08:10:05', 'ongoing', ''),
(9, 4, 8, '2023-05-01 08:09:00', '2023-05-03 08:09:00', 0, NULL, 'pending', 'ORD_47965590', NULL, 48000, 'pending', NULL, NULL, '2023-04-20 08:10:08', 'ongoing', ''),
(10, 1, 1, '2023-05-05 10:46:00', '2023-05-06 10:47:00', 1, NULL, 'reserved', 'ORD_14737929', NULL, 4800, 'pending', NULL, 0, '2023-04-20 10:47:24', 'ongoing', ''),
(11, 1, 4, '2023-04-20 10:57:00', '2023-04-21 22:57:00', 0, NULL, 'pending', 'ORD_13363060', NULL, 14400, 'pending', NULL, NULL, '2023-04-20 10:57:45', 'ongoing', 'ongoing'),
(12, 1, 4, '2023-04-20 10:57:00', '2023-04-21 22:57:00', 0, 1, 'cancelled', 'ORD_15671354', NULL, 14400, 'pending', NULL, 0, '2023-04-20 10:57:53', 'ongoing', ''),
(13, 1, 4, '2023-05-03 11:03:00', '2023-05-05 23:03:00', 1, NULL, 'reserved', 'ORD_19126104', NULL, 24000, 'pending', NULL, 0, '2023-04-20 11:03:41', 'ongoing', ''),
(14, 1, 6, '2023-04-20 11:11:00', '2023-04-20 23:11:00', 0, 1, 'cancelled', 'ORD_14992706', NULL, 7200, 'pending', NULL, NULL, '2023-04-20 11:11:56', 'ongoing', ''),
(15, 1, 6, '2023-04-20 11:11:00', '2023-04-20 23:11:00', 0, 1, 'cancelled', 'ORD_14282320', NULL, 7200, 'pending', NULL, NULL, '2023-04-20 11:12:03', 'ongoing', ''),
(16, 1, 6, '2023-04-20 11:14:00', '2023-04-21 11:14:00', 0, 1, 'cancelled', 'ORD_19215934', NULL, 14400, 'pending', NULL, NULL, '2023-04-20 11:14:56', 'ongoing', ''),
(17, 1, 4, '2023-04-20 11:51:00', '2023-04-21 11:51:00', 1, NULL, 'reserved', 'ORD_19802060', NULL, 9600, 'pending', NULL, 0, '2023-04-20 11:51:56', 'paid', 'ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `business_detail`
--

CREATE TABLE `business_detail` (
  `id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_address` varchar(255) NOT NULL,
  `business_contact` varchar(255) NOT NULL,
  `business_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_detail`
--

INSERT INTO `business_detail` (`id`, `business_name`, `business_address`, `business_contact`, `business_email`) VALUES
(1, 'Novastar', 'Quirino Highway Patrol Group', '09296039363', 'justemailmefuck!@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `sr_no` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`sr_no`, `image`) VALUES
(1, 'IMG_68350.png');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`) VALUES
(1, 'Burgers'),
(2, 'Fried'),
(3, 'Soups'),
(4, 'Barger');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `datesent` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `admin_id`, `msg`, `datesent`) VALUES
(1, 2, 'hello bro', '2023-04-20 10:41:38'),
(2, 2, 'how are you ', '2023-04-20 10:41:41'),
(3, 2, 'my brother nigga', '2023-04-20 10:41:45'),
(4, 2, 'hi my malbs', '2023-04-20 12:02:11');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(128) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `icon`, `name`, `description`) VALUES
(5, 'IMG_39894.svg', 'WiFi', 'Free WiFi'),
(6, 'IMG_85801.svg', 'Massage', 'Massage Service'),
(7, 'IMG_19575.svg', 'Television 27\" LED TV', '27&quot; LED TV'),
(8, 'IMG_54722.svg', 'Heater', ''),
(12, 'IMG_39045.svg', 'Television 24&quot; LED TV', '24&quot; LED TV'),
(13, 'IMG_21972.svg', 'Television 32&quot; LED TV', '32&quot; LED TV'),
(14, 'IMG_64431.svg', 'Television 45&quot; LED TV', '45&quot; LED TV'),
(15, 'IMG_53618.svg', 'Television 45&quot; LED TV', '45&quot; LED TV');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(7, 'Bar &amp; Restaurants at the Roof deck'),
(8, 'Safety Deposit box'),
(9, 'Hot &amp; Cold bath'),
(10, 'Hair Dryer'),
(11, 'Free parking slots'),
(12, 'Complimentary Breakfast'),
(13, 'Kids Playground'),
(14, 'Restaurants at the Roof deck'),
(15, 'Private Swimming pool');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(30) NOT NULL,
  `supply_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL,
  `stock_type` tinyint(1) NOT NULL COMMENT '1= in , 2 = used',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoices_draft`
--

CREATE TABLE `invoices_draft` (
  `id` int(11) NOT NULL,
  `invoiceno` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_no` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `payment_due` date DEFAULT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices_draft`
--

INSERT INTO `invoices_draft` (`id`, `invoiceno`, `customer_name`, `customer_address`, `customer_no`, `customer_email`, `invoice_date`, `payment_due`, `date_created`) VALUES
(1, 10683042, 'Rodel Malupet', 'airaifhaoh', '09296039363', 'rodel@gmail.com', '2023-04-18', '2023-04-12', '2023-04-18'),
(2, 38024484, 'Kent Ortego', 'commonwealth', '09296039363', 'kent@gmail.com', '2023-04-20', '2023-04-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `items_draft`
--

CREATE TABLE `items_draft` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `item_name` varchar(128) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_per_unit` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items_draft`
--

INSERT INTO `items_draft` (`id`, `invoice_id`, `item_name`, `quantity`, `price_per_unit`, `total`) VALUES
(1, 1, 'Item1', 1, 1, 1),
(2, 1, 'Item2', 2, 2, 4),
(3, 2, 'Deluxe', 1, 400, 400),
(4, 2, 'Item1', 5, 20, 100);

-- --------------------------------------------------------

--
-- Table structure for table `laundry_categories`
--

CREATE TABLE `laundry_categories` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laundry_list`
--

CREATE TABLE `laundry_list` (
  `id` int(30) NOT NULL,
  `customer_name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Pending, 1 = ongoing,2= ready,3= claimed',
  `queue` int(30) NOT NULL,
  `total_amount` double NOT NULL,
  `pay_status` tinyint(1) DEFAULT '0',
  `amount_tendered` double NOT NULL,
  `amount_change` double NOT NULL,
  `remarks` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `order_id` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_id` int(30) NOT NULL,
  `address` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `booking_id`, `address`, `status`, `date`) VALUES
(25, 'order_6446bcabbc22d8889', 1, 10, 'room2', 3, '2023-04-25 02:35:22'),
(27, 'order_6446db7b90b1c2697', 1, 10, 'room2', 3, '2023-04-25 03:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(30) NOT NULL,
  `order_id` varchar(150) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `product_id`, `qty`, `amount`) VALUES
(27, 'order_6446bcabbc22d8889', 4, 4, 1332),
(28, 'order_6446cb55a44192879', 3, 8, 1864),
(29, 'order_6446db7b90b1c2697', 4, 1, 333);

-- --------------------------------------------------------

--
-- Table structure for table `product_inventory`
--

CREATE TABLE `product_inventory` (
  `id` int(30) NOT NULL,
  `prod_id` int(30) NOT NULL,
  `prod_qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_inventory`
--

INSERT INTO `product_inventory` (`id`, `prod_id`, `prod_qty`) VALUES
(1, 1, -48),
(2, 6, -5);

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `img_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0= unavailable, 2 Available',
  `prod_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `category_id`, `name`, `description`, `price`, `img_path`, `status`, `prod_qty`) VALUES
(3, 2, 'Calamares', 'sample', 233, '1681961940_1678877940_FOODS 7.jpg', 1, 0),
(4, 1, 'Burger', 'sampole', 333, '1681961940_1681807260_1678877940_FOODS 3.png', 1, 0),
(5, 3, 'Sopas', 'sample', 55, '1681962000_1681737900_Simply-Recipes-Butternut-Apple-Soup-Lead-3-06f4b89c9d564fd9815a1b6c2ed8e699.jpg', 1, 0),
(6, 1, 'Barger', 'sample', 233, '1681962000_1681961940_1681807260_1678877940_FOODS 3.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating_review`
--

CREATE TABLE `rating_review` (
  `sr_no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(300) NOT NULL,
  `seen` int(11) NOT NULL DEFAULT '0',
  `datentime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `area` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `guest` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `removed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `guest`, `description`, `status`, `removed`) VALUES
(1, 'Standard Room', 30, 200, 1, 5, 'Standard Room for tropas', 1, 0),
(4, 'Deluxe Room', 0, 400, 1, 2, 'Good for 2 pax Special Conditions: Free Breakfast Meals for 2 adults included in the room rate Occupancy: Rate is good for 2 adults. Extra person is chargeable at P800/night with breakfast. It should ', 1, 0),
(5, 'Deluxe Room', 0, 400, 1, 2, 'Good for 2 pax Special Conditions: Free Breakfast Meals for 2 adults included in the room rate Occupancy: Rate is good for 2 adults. Extra person is chargeable at P800/night with breakfast. It should ', 1, 1),
(6, 'Superior Room', 0, 600, 1, 3, 'Good for 3 pax Special Conditions: Free Breakfast Meals for 2 adults included in the room rate Occupancy: Rate is good for 3 adults. Extra person is chargeable at P800/night with breakfast. It should ', 1, 0),
(7, 'Premium Room', 0, 800, 1, 4, 'Good for 4 pax Special Conditions: Free Breakfast Meals for 2 adults included in the room rate Occupancy: Rate is good for 4 adults. Extra person is chargeable at P800/night with breakfast. It should ', 1, 0),
(8, 'Suite Room', 0, 1000, 1, 5, 'Good for 3 pax Special Conditions: Free Breakfast Meals for 2 adults included in the room rate Occupancy: Rate is good for 4 adults. Extra person is chargeable at P800/night with breakfast. It should ', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_facilities`
--

INSERT INTO `room_facilities` (`sr_no`, `room_id`, `facilities_id`) VALUES
(64, 6, 5),
(65, 6, 6),
(66, 6, 7),
(67, 6, 8),
(68, 4, 5),
(69, 4, 6),
(70, 4, 8),
(71, 4, 12),
(93, 7, 5),
(94, 7, 6),
(95, 7, 13),
(96, 8, 5),
(97, 8, 6),
(98, 8, 15);

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_features`
--

INSERT INTO `room_features` (`sr_no`, `room_id`, `features_id`) VALUES
(75, 6, 8),
(76, 6, 11),
(77, 6, 12),
(78, 6, 13),
(79, 6, 14),
(80, 4, 8),
(81, 4, 11),
(82, 4, 14),
(127, 7, 8),
(128, 7, 9),
(129, 7, 10),
(130, 7, 11),
(131, 7, 12),
(132, 7, 13),
(133, 7, 14),
(134, 7, 15),
(135, 8, 7),
(136, 8, 8),
(137, 8, 9),
(138, 8, 10),
(139, 8, 11),
(140, 8, 12),
(141, 8, 13),
(142, 8, 15);

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`sr_no`, `room_id`, `image`, `thumb`) VALUES
(2, 4, 'IMG_24214.jpg', 1),
(3, 6, 'IMG_97341.jpg', 1),
(4, 7, 'IMG_86189.jpg', 1),
(5, 8, 'IMG_41417.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `site_about` varchar(250) NOT NULL,
  `shutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'Axiaa Hotel', 'ASDASDASDASDASDAS', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'AXIA', 'margh@gmail.com', '09192663306', '1681833180_1678877700_BANNER 1.jpg', 'xzxzxzxzx');

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `type` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1=admin , 2 = staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', '123456', 1);

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
  `valid_id` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '0',
  `token` varchar(200) DEFAULT NULL,
  `t_expire` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `datentime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`id`, `name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `profile`, `valid_id`, `password`, `is_verified`, `token`, `t_expire`, `status`, `datentime`) VALUES
(1, 'Jheremie O Magat', 'jheremiemagat@gmail.com', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC', '09279174621', 1234, '2023-04-18', 'IMG_39757.jpeg', 'IMG_28447.jpeg', '$2y$10$ooZACACRksgMdm2wUMsmt.pFa4HCGlN83WcFIo0chJUh/4zT2.kHG', 1, 'c1e5aa176146ef7e01e2df9978c66b37', NULL, 1, '2023-04-18 23:26:44'),
(3, 'Jheremie O Magat', 'jheremie.magat32@gmail.com', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC', '09279174623', 1234, '2023-04-20', 'IMG_68979.jpeg', 'IMG_82236.jpeg', '$2y$10$Bf.jkwymB6AXH9N9YC7a0Og0GpqDBdx0vR.uTI9oU4FzGIBUjJikm', 0, 'acf3fc81a47820e5575f9cb13136a839', NULL, 1, '2023-04-20 04:10:46'),
(4, 'Jheremie O Magat', 'pampogi9@gmail.com', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC', '09279174626', 1234, '2023-04-20', 'IMG_36782.jpeg', 'IMG_36782.jpeg', '$2y$10$fC9Y79KelLPRzwsci2Y85.ZWyGCLS/ImXCGdMmQcCoj4AOkVvwpF2', 0, '774853df0bc356a3ef6a2ee61c4908ba', NULL, 1, '2023-04-20 04:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `r_id` int(10) NOT NULL,
  `room_no` varchar(250) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`r_id`, `room_no`, `status`) VALUES
(1, 'room2', ''),
(2, 'room5', ''),
(3, 'room3', ''),
(4, 'room6', ''),
(5, 'room7', ''),
(6, 'room8', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL,
  `datentime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `billing_admin`
--
ALTER TABLE `billing_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `booking_details_ibfk_1` (`booking_id`);

--
-- Indexes for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `booking_order_ibfk_1` (`user_id`),
  ADD KEY `booking_order_ibfk_2` (`room_id`);

--
-- Indexes for table `business_detail`
--
ALTER TABLE `business_detail`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `invoices_draft`
--
ALTER TABLE `invoices_draft`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoiceno` (`invoiceno`);

--
-- Indexes for table `items_draft`
--
ALTER TABLE `items_draft`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

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
-- Indexes for table `rating_review`
--
ALTER TABLE `rating_review`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`);

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
  ADD KEY `facilities_id` (`facilities_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `features_id` (`features_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room_images_ibfk_1` (`room_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sr_no`);

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
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_admin`
--
ALTER TABLE `billing_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `booking_order`
--
ALTER TABLE `booking_order`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `business_detail`
--
ALTER TABLE `business_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices_draft`
--
ALTER TABLE `invoices_draft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items_draft`
--
ALTER TABLE `items_draft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laundry_categories`
--
ALTER TABLE `laundry_categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laundry_items`
--
ALTER TABLE `laundry_items`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laundry_list`
--
ALTER TABLE `laundry_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product_inventory`
--
ALTER TABLE `product_inventory`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rating_review`
--
ALTER TABLE `rating_review`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_details`
--
ALTER TABLE `team_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `r_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_order` (`booking_id`);

--
-- Constraints for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD CONSTRAINT `booking_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_cred` (`id`),
  ADD CONSTRAINT `booking_order_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `items_draft`
--
ALTER TABLE `items_draft`
  ADD CONSTRAINT `items_draft_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices_draft` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating_review`
--
ALTER TABLE `rating_review`
  ADD CONSTRAINT `rating_review_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_order` (`booking_id`),
  ADD CONSTRAINT `rating_review_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `rating_review_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user_cred` (`id`);

--
-- Constraints for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD CONSTRAINT `room_facilities_ibfk_1` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`),
  ADD CONSTRAINT `room_facilities_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `room_features`
--
ALTER TABLE `room_features`
  ADD CONSTRAINT `room_features_ibfk_1` FOREIGN KEY (`features_id`) REFERENCES `features` (`id`),
  ADD CONSTRAINT `room_features_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
