-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 04:58 PM
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
-- Database: `latest_hotel_supersystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `information` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `admin_id`, `date_time`, `information`) VALUES
(1, 3, '2023-05-03 21:06:43', 'You just logged in.'),
(2, 2, '2023-05-03 22:02:40', 'You just logged out.'),
(3, 0, '2023-05-03 22:02:40', 'You just logged out.'),
(4, 2, '2023-05-03 22:02:43', 'You just logged in.');

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
  `status` varchar(255) NOT NULL,
  `permission` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_admin`
--

INSERT INTO `billing_admin` (`id`, `username`, `admin_name`, `pass`, `status`, `permission`) VALUES
(2, 'admin', 'Admin', 'admin', 'Inactive', 1);

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
(4, 4, 'Deluxe Room', 100, 300, 'DR1', 'Jheremie O Magat', '09279174621', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC');

-- --------------------------------------------------------

--
-- Table structure for table `booking_order`
--

CREATE TABLE `booking_order` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `arrival` int(11) NOT NULL DEFAULT '0',
  `cancel` int(11) DEFAULT NULL,
  `booking_status` varchar(100) NOT NULL DEFAULT 'pending',
  `order_id` varchar(200) NOT NULL,
  `initial_payment` int(20) NOT NULL,
  `trans_id` varchar(200) DEFAULT NULL,
  `trans_amt` int(11) NOT NULL,
  `trans_status` varchar(100) NOT NULL DEFAULT 'pending',
  `trans_resp_msg` varchar(200) DEFAULT NULL,
  `rate_review` int(11) DEFAULT NULL,
  `datentime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `booking_state` varchar(128) NOT NULL,
  `cut_off` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_order`
--

INSERT INTO `booking_order` (`booking_id`, `user_id`, `room_id`, `email`, `check_in`, `check_out`, `arrival`, `cancel`, `booking_status`, `order_id`, `initial_payment`, `trans_id`, `trans_amt`, `trans_status`, `trans_resp_msg`, `rate_review`, `datentime`, `booking_state`, `cut_off`) VALUES
(4, 5, 4, 'jheremiemagat@gmail.com', '2023-05-03 21:38:00', '2023-05-04 00:38:00', 1, NULL, 'reserved', 'ORD_51380300', 60, NULL, 300, 'pending', NULL, 0, '2023-05-03 21:38:49', 'Ongoing', '2023-05-04 02:38:00');

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
(9, 'IMG_16181.jpg'),
(10, 'IMG_73831.jpg'),
(11, 'IMG_25009.jpg'),
(12, 'IMG_64546.jpg'),
(13, 'IMG_32296.jpg'),
(14, 'IMG_38085.jpg');

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
(13, 'Breakfast'),
(14, 'High Tea Menu'),
(15, 'Luncheon Menu'),
(16, 'Dinner Menu');

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
(1, 2, 'Hi crush po kita', '2023-05-03 21:07:08'),
(2, 3, 'Ay gago crush din pala kita', '2023-05-03 21:07:20'),
(3, 2, 'ganern?', '2023-05-03 21:07:34');

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

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `pn1`, `pn2`, `email`, `fb`, `insta`, `tw`, `iframe`) VALUES
(1, '135 West Avenue 1400 Quezon City National Capital', 'https://goo.gl/maps/8vGYD1tmvAqtgNMk9', 9279174628, 9051261206, 'axiaahotel@gmail.com', 'https://www.facebook.com/axiaa', '', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.0184302031325!2d121.02710397581372!3d14.654895275743696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b6fcc6400001:0x893f9b322240ccce!2sAxiaa Hotel Manila!5e0!3m2!1sen!2sph!4v1683020510515!5m2!1sen!2sph&quot; width=&quot;600&quot; ');

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
(8, 'IMG_54722.svg', 'Heater', ''),
(16, 'IMG_92130.svg', 'Aircondition', 'Aircondition'),
(19, 'IMG_80796.svg', 'Minibar', ''),
(20, 'IMG_96037.svg', 'Balcony', ''),
(21, 'IMG_91532.svg', 'Tea &amp; Coffee', '');

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
(18, '1 Double Bed'),
(19, 'Telephone'),
(20, 'Electronic Safe Box'),
(21, 'Electronic Lock Key System'),
(22, 'Iron &amp; Ironing Board'),
(23, 'Hairdryer'),
(24, '2 Twin Bed'),
(25, 'Flat Screen TV'),
(26, '1 Double and 2 Twin Beds'),
(28, '1 Queen Size Bed'),
(29, 'Key Card');

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
  `invoice_date` datetime DEFAULT NULL,
  `payment_due` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices_draft`
--

INSERT INTO `invoices_draft` (`id`, `invoiceno`, `customer_name`, `customer_address`, `customer_no`, `customer_email`, `invoice_date`, `payment_due`, `date_created`) VALUES
(4, 67937181, 'Tae ko matigas', 'addresstae street', '09999999999', 'tae@gmail.com', '2023-04-29 00:00:00', '2023-04-30 00:00:00', '2023-04-29 17:22:07'),
(5, 12847285, 'Bruce Wayne', 'batman st. ', '09296039363', 'batman@gmail.com', '2023-05-01 15:22:00', '2023-05-02 15:22:00', '2023-05-01 15:23:02');

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
(7, 4, '1', 1, 1, 1),
(8, 5, 'Room1', 1, 1, 1),
(9, 5, 'Item1', 1, 1, 1);

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
(5, 'ORD_47721834', 5, 1, 'DR1', 3, '2023-05-03 20:38:29'),
(6, 'ORD_92174040', 5, 1, 'DR1', 0, '2023-05-03 20:54:20');

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
(1, 'ORD_47721834', 38, 1, 160),
(2, 'ORD_92174040', 38, 2, 320);

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
(10, 33, 5),
(11, 49, 0),
(12, 38, 1),
(13, 44, 5),
(15, 42, 5),
(16, 47, 5),
(17, 34, 5);

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
(32, 13, 'Oatmeal', 'Good for 1 person', 150, '1682971860_Oatmeal.png', 1, 3),
(33, 13, 'Bacon and Eggs', '1 pc egg and bacon', 250, '1682971920_Bacon and Eggs.png', 1, 5),
(34, 13, 'Hashbrowns', '4 pcs hashbrowns', 190, '1682971920_Hash Browns.png', 1, 5),
(35, 13, 'Pancake', '3 pcs pancake', 275, '1682971980_Pancake.png', 1, 0),
(36, 13, 'Waffles', '7 pcs waffles Good for family', 435, '1682972040_Waffles.png', 1, 0),
(37, 13, 'Toast Bread', '12 pcs Toast Bread, Good for family', 475, '1683002640_Toast Bread.png', 1, 0),
(38, 13, 'Brewed Coffee', '', 160, '1683002760_brew-gourmet-espresso-energy-plant_1172-486.avif', 1, 1),
(39, 14, 'Pastries', 'Strawberry cake, Chocolate cake, Rhubarb tartlet, Baklava.', 250, '1683002820_64463630.cms', 1, 0),
(40, 13, 'Salad', 'Good for Family', 450, '1683002880_Salad.png', 1, 0),
(41, 14, 'Samosa', '', 540, '1683002940_20210909-SAMOSAS-ANDREWJANJIGIAN-86-ca872c2eae8e4e7eb4e7b47cfad8715e.jpg', 1, 0),
(42, 13, 'Cutlet', '2 pcs cutlets w/ lemon grass', 240, '1683003000_download.jfif', 1, 5),
(43, 14, 'Ice Cream', '', 425, '1683003000_Ice_cream_with_whipped_cream,_chocolate_syrup,_and_a_wafer_(cropped).jpg', 1, 0),
(44, 14, 'Coffee and Tea', '', 375, '1683003120_download (1).jfif', 1, 5),
(45, 15, 'Burgers', '', 450, '1683003120_garlic-burger-patties-333503-hero-01-e4df660ff27b4e5194fdff6d703a4f83.jpg', 1, 5),
(46, 15, 'Salad', 'Good for Family', 625, '1683003300_sub-buzz-2097-1659105797-15.webp', 1, 0),
(47, 15, 'Fried Fish', 'Fried Sea Bass, Good for Family', 495, '1683003420_fish+lemongrass-3.jpg', 1, 5),
(48, 14, 'Hot and Cold Beverages', 'Lemon Tea, Cranberry, Macchiato, Milk tea', 200, '1683003540_download (2).jfif', 1, 0),
(49, 16, 'Beef Short Ribs', 'Good for family', 725, '1683003600_Slow-Cooked-Braised-Beef-Short-Ribs_3.webp', 1, 0),
(50, 16, 'Mushroom Risotto', 'Good for family', 575, '1683003660_1504128527-delish-mushroom-risotto.jpg', 1, 0),
(52, 14, 'sample 2 ', 'asdsad', 233, '1683031980_room2 (5).png', 1, 0);

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
  `description` varchar(1000) NOT NULL,
  `policy` varchar(1000) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `removed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `guest`, `description`, `policy`, `status`, `removed`) VALUES
(4, 'Deluxe Room', 0, 100, 5, 2, 'The Deluxe Room comprises of 1 Double Bed, 2 Bedside Tables, a Desk Chair. \r\n\r\nThe room is furnished with wall-to-wall carpeting, trendy furnishings and a balcony. \r\n\r\nA Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. \r\n\r\nElectric current: 220 Volts. \r\n\r\nSmoking rooms &amp;amp; inter-connecting rooms are also available.', 'Meals\r\nBreakfast is included in the room rate\r\n\r\nAdditional Fees\r\nExtra person is chargeable at P1,000/night with breakfast.', 1, 0),
(6, 'Superior Room', 0, 150, 5, 3, 'The Superior Room comprises of 2 Twin Beds, 2 Bedside Tables, a Desk Chair. \r\n\r\nThe room is furnished with wall-to-wall carpeting, trendy furnishings and a balcony. \r\n\r\nA Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. \r\n\r\nElectric current: 220 Volts. \r\n\r\nSmoking rooms &amp;amp; inter-connecting rooms are also available.', 'Meals\r\nBreakfast is included in the room rate.\r\n\r\nAdditional Fees\r\nExtra person is chargeable at P1,000/night with breakfast.', 1, 0),
(7, 'Premium Room', 0, 200, 5, 4, 'The Premium Room comprises of 1 Double and Twin Beds, 2 Bedside Tables, a Desk Chair. \r\n\r\nThe room is furnished with wall-to-wall carpeting, trendy furnishings and a balcony. \r\n\r\nA Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. \r\n\r\nElectric current: 220 Volts. \r\n\r\nSmoking rooms &amp;amp;amp;amp; inter-connecting rooms are also available.', 'Meals\r\nBreakfast is included in the room rate.\r\n\r\nAdditional Fees\r\nExtra person is chargeable at P1,000/night with breakfast.', 1, 0),
(8, 'Suite Room', 0, 250, 5, 5, 'The Suite Room comprises of Queen Size Beds, 2 Bedside Tables, a Desk Chair. \r\n\r\nThe room is furnished with wall-to-wall carpeting, trendy furnishings and a balcony. \r\n\r\nA Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. \r\n\r\nElectric current: 220 Volts. \r\n\r\nSmoking rooms &amp;amp;amp;amp; inter-connecting rooms are also available.', 'Meals\r\nBreakfast is included in the room rate.\r\n\r\nAdditional Fees\r\nExtra person is chargeable at P1,000/night with breakfast.', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `code` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`id`, `name`, `code`) VALUES
(10, '4', 'ad'),
(11, '4', 'asdsad'),
(12, '7', 'sadsd');

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
(308, 4, 5),
(309, 4, 8),
(310, 4, 16),
(311, 4, 19),
(312, 4, 20),
(313, 4, 21),
(314, 6, 5),
(315, 6, 8),
(316, 6, 16),
(317, 6, 19),
(318, 6, 20),
(319, 6, 21),
(320, 7, 5),
(321, 7, 8),
(322, 7, 16),
(323, 7, 19),
(324, 7, 20),
(325, 7, 21),
(326, 8, 5),
(327, 8, 8),
(328, 8, 16),
(329, 8, 19),
(330, 8, 20),
(331, 8, 21);

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
(402, 4, 18),
(403, 4, 19),
(404, 4, 20),
(405, 4, 21),
(406, 4, 22),
(407, 4, 23),
(408, 4, 25),
(409, 6, 19),
(410, 6, 20),
(411, 6, 21),
(412, 6, 22),
(413, 6, 23),
(414, 6, 24),
(415, 6, 25),
(416, 7, 19),
(417, 7, 20),
(418, 7, 21),
(419, 7, 22),
(420, 7, 23),
(421, 7, 25),
(422, 7, 26),
(423, 8, 19),
(424, 8, 20),
(425, 8, 21),
(426, 8, 22),
(427, 8, 23),
(428, 8, 25),
(429, 8, 28),
(430, 8, 29);

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
(15, 7, 'IMG_85739.jpg', 1),
(16, 7, 'IMG_73978.jpg', 0),
(17, 7, 'IMG_15698.jpg', 0),
(18, 8, 'IMG_21515.jpg', 0),
(19, 8, 'IMG_80326.jpg', 1),
(20, 8, 'IMG_87208.jpg', 0),
(21, 4, 'IMG_46657.jpg', 0),
(22, 4, 'IMG_63043.jpg', 1),
(23, 6, 'IMG_44773.jpg', 0),
(24, 6, 'IMG_35044.jpg', 1);

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
(1, 'Axiaa Hotel', 'Axiaa Hotel, a hidden gem nestled in the heart of a serene and picturesque cityside, is a small hotel that promises a truly enchanting experience. With only a handful of rooms, this boutique hotel offers an intimate and cozy ambiance, perfect for tho', 0);

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
(1, 'AXIAA', 'margh@gmail.com', '09192663306', '1681833180_1678877700_BANNER 1.jpg', '&lt;font color=&quot;#ffffff&quot; face=&quot;Poppins&quot;&gt;&lt;span style=&quot;color:rgb(0,0,0);font-size: 16px; white-space: pre-wrap;&quot;&gt;Strategically located at the heart of Quezon City. Corner North Edsa and West Avenue. Axiaa Hotel is a boutique hotel, events place and dining hub that offers unique stays and memorable experiences to each and every guest. A stone&rsquo;s throw away from the major shopping malls, dining venues, government offices and MRT/LRT station, Axiaa Hotel affirms the hotel&rsquo;s accessibility and convenience in the midst of the city&rsquo;s bustling life.&lt;/span&gt;&lt;/font&gt;&lt;br&gt;');

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
  `datentime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_type` varchar(128) NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`id`, `name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `profile`, `valid_id`, `password`, `is_verified`, `token`, `t_expire`, `status`, `datentime`, `account_type`) VALUES
(5, 'Jheremie O Magat', 'jheremiemagat@gmail.com', '242 Mapayapa St. Freedom Park 2 Batasan Hills QC', '09279174621', 1234, '2002-05-24', 'IMG_63147.jpeg', 'IMG_94816.jpeg', '$2y$10$B9DjSeguSi6RcE/1uMyZg.f6T1so60.B5aYUo6hqzM9A1.wzR8fL6', 1, '344da16d99e67b71645ca66f0f8b5672', NULL, 1, '2023-05-01 18:36:16', 'member'),
(6, 'Pam Pam', 'pampogi9@gmail.com', 'sample', '09279174623', 1234, '2002-05-24', 'IMG_40723.jpeg', 'IMG_40723.jpeg', '$2y$10$o/JFajQ6PTkgdHt/A5N5geaZnywChw2DCpbTwbzmjizSuD.uOpFB.', 1, '3c304c5573623b21ae2fae999caf1156', NULL, 1, '2023-05-02 15:33:26', 'member'),
(8, 'Rodel', 'rodel@gmail.com', 'awd', '09296039363', 1234, '0000-00-00', 'avatar.jpeg', 'valid', '$2y$10$ZIJC9s6ZKyB3ZdWMMZBEjOlE9fl81DO2ImBg.vZStmaLJa.4aw7ky', 1, NULL, NULL, 1, '2023-05-03 17:26:42', 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `r_id` int(10) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_no` varchar(250) NOT NULL,
  `category` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`r_id`, `booking_id`, `user_id`, `room_no`, `category`, `status`) VALUES
(21, 4, 5, 'DR1', 'Deluxe Room', ''),
(22, 0, 0, 'DR2', 'Deluxe Room', ''),
(23, 0, 0, 'PR1', 'Premium Room', ''),
(24, 0, 0, 'SR1', 'Standard Room', ''),
(25, 0, 0, 'STR1', 'Suite Room', ''),
(26, 0, 0, 'SPR1', 'Superior Room', ''),
(27, 0, 0, 'DR3', 'Deluxe Room', ''),
(28, 0, 0, 'DR4', 'Deluxe Room', ''),
(29, 0, 0, 'PR2', 'Premium Room', ''),
(30, 0, 0, 'PR3', 'Premium Room', ''),
(31, 0, 0, 'PR4', 'Premium Room', '');

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
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_admin`
--
ALTER TABLE `billing_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booking_order`
--
ALTER TABLE `booking_order`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `business_detail`
--
ALTER TABLE `business_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices_draft`
--
ALTER TABLE `invoices_draft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items_draft`
--
ALTER TABLE `items_draft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_inventory`
--
ALTER TABLE `product_inventory`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
-- AUTO_INCREMENT for table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `r_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items_draft`
--
ALTER TABLE `items_draft`
  ADD CONSTRAINT `items_draft_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices_draft` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
