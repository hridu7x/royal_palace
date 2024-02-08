-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 10:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_blackstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_password`) VALUES
(1, 'hridoy', '112233');

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
(61, 'IMG_90390.jpg'),
(62, 'IMG_84803.jpg'),
(63, 'IMG_18592.jpg'),
(64, 'IMG_30342.jpg'),
(65, 'IMG_78221.jpg'),
(67, 'IMG_34867.jpg'),
(68, 'IMG_12631.jpg'),
(69, 'IMG_51592.jpg'),
(70, 'IMG_38537.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `address` varchar(150) NOT NULL,
  `gmap` varchar(300) NOT NULL,
  `pn-1` bigint(20) NOT NULL,
  `pn-2` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tw` varchar(150) NOT NULL,
  `fb` varchar(150) NOT NULL,
  `insta` varchar(150) NOT NULL,
  `li` varchar(150) NOT NULL,
  `iframe` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `pn-1`, `pn-2`, `email`, `tw`, `fb`, `insta`, `li`, `iframe`) VALUES
(1, '1 Minto Road Dhaka 1000 Bangladesh Check in: 3:00 PM | Check out: 12:00 PM', 'https://maps.app.goo.gl/hEXZ8A4HgwwynWeU8', 99999999999, 77777777777, 'royalpalace@info.com', 'https://x.com/itshridu3', 'https://www.facebook.com/hridu7x', 'https://www.instagram.com/itshridu3', 'https://www.linkind.com/hridoykumer', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.46186135208!2d90.40887479999999!3d23.730904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8f6e757cedf:0x5ca4d3249af210bd!2sHotel Royal Palace!5e0!3m2!1sen!2sbd!4v1702545187893!5m2!1sen!2sbd');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `icon`, `name`, `description`) VALUES
(36, 'IMG_61700.svg', 'GYM', 'Free GYM center entry'),
(37, 'IMG_18004.svg', 'SPA', 'Free SAP  center entry'),
(38, 'IMG_48357.svg', 'TV', '55 inch TV'),
(40, 'IMG_52826.svg', 'AC', 'Free AC'),
(41, 'IMG_45521.svg', 'BED', 'Master BED'),
(42, 'IMG_82909.svg', 'HAIR DRYER', 'Room HAIR DRYER'),
(43, 'IMG_99518.svg', 'REFRIGERATOR', 'Room REFRIGERATOR'),
(45, 'IMG_39355.svg', 'SLIPPER', 'Room SLIPPER'),
(46, 'IMG_11177.svg', 'MICROWAVEN', 'Room MICROWAVEN'),
(47, 'IMG_79148.svg', 'SOFA', 'Room SOFA'),
(48, 'IMG_31745.svg', 'TELEPHONE', 'Room TELEPHONE'),
(49, 'IMG_84667.svg', 'HOUSEKEEPING', 'HOUSEKEEPING Service'),
(50, 'IMG_44362.svg', 'WIFI', 'Free WIFI'),
(51, 'IMG_93865.svg', 'SWIMMING POOL', 'Free SWIMMING POOL'),
(52, 'IMG_23105.svg', 'PARKING', 'Car PARKING'),
(53, 'IMG_46293.svg', '24HR SECURITY', '24HR SECURITY');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(28, '2 Bathrooms'),
(29, '2 Balcony'),
(30, '2 Rooms'),
(31, '2 Sofa'),
(32, 'Kitchen'),
(33, 'In-room safe deposit box'),
(34, 'Private balcony'),
(35, 'Bathroom Amenity Set'),
(36, 'Laundry and Dry Cleaning Service'),
(37, 'Separate Shower and Toilet Room'),
(38, 'Daily coﬀee, tea and 2 bottled water'),
(39, 'Working desk'),
(40, 'Room Service'),
(41, 'Dining table with tableware');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `phonenum` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `price` text DEFAULT NULL,
  `card_number` text DEFAULT NULL,
  `card_expirymonth` text DEFAULT NULL,
  `card_expiryyear` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `paymentid` text DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `phonenum`, `address`, `checkin`, `checkout`, `price`, `card_number`, `card_expirymonth`, `card_expiryyear`, `status`, `paymentid`, `date`) VALUES
(19, 'Hridoy', '1999999999', 'Dhaka', '2023-12-12', '2023-12-20', '160000', '5105105105105100', '4', '25', 'succeeded', 'txn_3OMC7eHX0UI3JzFA08S4yBgG', '2023-11-08 17:10:09'),
(20, 'Abir', '1756787878', 'Tangail', '2023-12-16', '2023-12-20', '40000', '4242424242424242', '2', '24', 'succeeded', 'txn_3OMCBKHX0UI3JzFA1Ah2lvXa', '2023-12-11 17:17:58'),
(21, 'Sumaiya', '1634457362', 'Gazipur', '2023-12-12', '2023-12-14', '14000', '4000056655665556', '9', '27', 'succeeded', 'txn_3OMCGOHX0UI3JzFA0M16Xfkh', '2023-12-11 17:23:12'),
(22, 'Meem', '1864987543', 'Bramnbaria', '2023-12-20', '2023-12-25', '50000', '5105105105105100', '7', '28', 'succeeded', 'txn_3OMCLTHX0UI3JzFA1GAAnhBF', '2023-12-11 17:28:27'),
(23, 'Hridoy', '1999999999', 'Dhaka', '2023-12-12', '2023-12-22', '200000', '5200828282828210', '3', '28', 'succeeded', 'txn_3OMCRlHX0UI3JzFA0RKVMvtz', '2023-12-11 17:34:57'),
(25, 'Hridoy', '1999999999', 'Dhaka', '2023-12-12', '2023-12-23', '110000', '4000056655665556', '7', '27', 'succeeded', 'txn_3OMCd5HX0UI3JzFA0J1rSHpn', '2023-12-11 17:46:39'),
(26, 'Hridoy', '1999999999', 'Dhaka', '2023-12-12', '2023-12-14', '20000', '4000056655665556', '7', '27', 'succeeded', 'txn_3OMCenHX0UI3JzFA0CIOuY0r', '2023-12-11 17:48:24'),
(30, 'Hridoy', '1999999999', 'Dhaka', '2023-12-15', '2023-12-18', '30000', '4242424242424242', '3', '25', 'succeeded', 'txn_3ONA9UHX0UI3JzFA0hvGbKAM', '2023-12-14 09:20:02'),
(31, 'Hridoy', '1999999999', 'Dhaka', '2023-12-17', '2023-12-21', '20000', '4242424242424242', '8', '29', 'succeeded', 'txn_3ONwd6HX0UI3JzFA1pWt2zXh', '2023-12-16 13:06:04'),
(32, 'Hridoy', '1999999999', 'Dhaka', '2023-12-18', '2023-12-27', '63000', '4242424242424242', '9', '25', 'succeeded', 'txn_3ONwngHX0UI3JzFA1PX7dp19', '2023-12-16 13:16:59'),
(33, 'Miraz', '1999999888', 'Gazipur', '2023-12-18', '2023-12-26', '40000', '4242424242424242', '1', '25', 'succeeded', 'txn_3ONwrlHX0UI3JzFA1dFLcNsl', '2023-12-16 13:21:13'),
(34, 'Ome', '1999999111', 'Rampura', '2023-12-17', '2023-12-20', '15000', '4242424242424242', '1', '27', 'succeeded', 'txn_3ONx2LHX0UI3JzFA0tRTnkrT', '2023-12-16 13:32:08'),
(35, 'Hridoy', '1999999999', 'Dhaka', '2023-12-18', '2023-12-21', '21000', '4242424242424242', '1', '25', 'succeeded', 'txn_3OO3mZHX0UI3JzFA0fwkwN6q', '2023-12-16 20:44:17');

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
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `status`, `removed`) VALUES
(13, 'VIP Room', 55, 700, 14, 7, 4, 'VIP Room . VIP Service', 1, 1),
(14, 'Deluxe Room', 34, 550, 21, 5, 3, 'Deluxe Room Service', 0, 1),
(15, 'Simple Room', 33, 370, 35, 4, 3, 'Simple Room Service', 1, 1),
(16, 'Simple Room', 33, 350, 35, 4, 2, 'Simple Room', 1, 1),
(17, 'Deluxe Room', 33, 350, 35, 4, 2, 'Treat yourself to new heights of relaxation. Deluxe seaview rooms are located on high floors, each offering unparalleled sea views, and come with a private balcony. Guests can relax in the comfortable beds and enjoy the range of in-room entertainment facilities, or simply observe the sea views from high above. Decoration is inspired by the mystical night sky that both energize and soothe, providing guests enhanced sense of relaxation.', 1, 1),
(18, 'Luxury Room', 45, 7000, 35, 5, 3, 'What makes a hotel room luxurious? The options and possibilities for luxury are many, but we think what it comes down to is how a room makes you feel when you’re in it.\r\n\r\nWe don’t want your vacation with us to be just about getting away from home…we want it to be way better than that!\r\n\r\nOur luxury rooms are designed to make you feel comfortable, serene, relaxed, pampered, and completely carefree!\r\nCreating this is all in the details, so we pay close attention and include every important elemen', 1, 0),
(19, 'Super Deluxe Room', 55, 10000, 17, 7, 5, 'Super Deluxe rooms offer you a grand staying experience with grandiose design and premium amenities. These rooms are equipped with air-conditioning, television, wardrobe, In-room safe, mini-bar, tea-coffee maker and round the clock room service, and laundry service. Our rooms come with our superior services by committed staff who will serve your needs and requirements to enhance your experience of stay.', 1, 0),
(20, 'VIP Deluxe Room', 55, 10000, 7, 7, 5, 'Perfect for the individual traveller or for a couple’s retreat, the Superior seaview is 34 sqm in size and offers guests spectacular sea views in a contemporary style ambiance with touches of the universe’s alluring charms. These rooms are beautifully appointed with bespoke furniture, an en-suite shower room, and also has a private balcony.\r\n\r\nHoliday makers will fall in love with the sunset view from the room’s unique sea facing location.', 1, 0),
(21, 'Panoramic Suite Seaview', 65, 20000, 14, 6, 4, 'Soak up panoramic views of the sparkling Pattaya bay and Wong Amat area from every room in this suite, whose palatial bedroom and bath feature floor-to-ceiling windows that invite in natural light during the day and invigorating views at night. Guests will find plenty of space to relax and unwind, and can choose to watch the sun go down from the plush beds, private balcony, or while soaking in the picturesque bathtub which also offers a perfect vantage point.', 1, 0),
(22, 'Deluxe Room', 35, 5000, 22, 4, 2, 'Super Deluxe rooms offer you a grand staying experience with grandiose design and premium amenities. These rooms are equipped with air-conditioning, television, wardrobe, In-room safe, mini-bar, tea-coffee maker and round the clock room service, and laundry service. Our rooms come with our superior services by committed staff who will serve your needs and requirements to enhance your experience of stay.', 1, 0);

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
(243, 19, 36),
(244, 19, 37),
(245, 19, 38),
(246, 19, 40),
(247, 19, 41),
(248, 19, 42),
(249, 19, 43),
(250, 19, 45),
(251, 19, 46),
(252, 19, 47),
(253, 19, 48),
(254, 19, 49),
(255, 19, 50),
(256, 19, 51),
(257, 19, 52),
(258, 19, 53),
(259, 18, 36),
(260, 18, 37),
(261, 18, 38),
(262, 18, 40),
(263, 18, 41),
(264, 18, 42),
(265, 18, 43),
(266, 18, 45),
(267, 18, 46),
(268, 18, 47),
(269, 18, 48),
(270, 18, 49),
(271, 18, 50),
(272, 18, 51),
(273, 18, 52),
(274, 18, 53),
(275, 20, 36),
(276, 20, 37),
(277, 20, 38),
(278, 20, 40),
(279, 20, 41),
(280, 20, 42),
(281, 20, 43),
(282, 20, 45),
(283, 20, 46),
(284, 20, 47),
(285, 20, 48),
(286, 20, 49),
(287, 20, 50),
(288, 20, 51),
(289, 20, 52),
(290, 20, 53),
(307, 21, 36),
(308, 21, 37),
(309, 21, 38),
(310, 21, 40),
(311, 21, 41),
(312, 21, 42),
(313, 21, 43),
(314, 21, 45),
(315, 21, 46),
(316, 21, 47),
(317, 21, 48),
(318, 21, 49),
(319, 21, 50),
(320, 21, 51),
(321, 21, 52),
(322, 21, 53),
(323, 22, 36),
(324, 22, 38),
(325, 22, 40),
(326, 22, 41),
(327, 22, 42),
(328, 22, 43),
(329, 22, 45),
(330, 22, 46),
(331, 22, 47),
(332, 22, 48),
(333, 22, 49),
(334, 22, 50),
(335, 22, 53);

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
(266, 19, 28),
(267, 19, 29),
(268, 19, 30),
(269, 19, 31),
(270, 19, 32),
(271, 19, 33),
(272, 19, 34),
(273, 19, 35),
(274, 19, 36),
(275, 19, 37),
(276, 19, 38),
(277, 19, 39),
(278, 19, 40),
(279, 19, 41),
(280, 18, 28),
(281, 18, 29),
(282, 18, 30),
(283, 18, 31),
(284, 18, 32),
(285, 18, 33),
(286, 18, 34),
(287, 18, 35),
(288, 18, 36),
(289, 18, 37),
(290, 18, 38),
(291, 18, 39),
(292, 18, 40),
(293, 18, 41),
(294, 20, 28),
(295, 20, 29),
(296, 20, 30),
(297, 20, 31),
(298, 20, 32),
(299, 20, 33),
(300, 20, 34),
(301, 20, 35),
(302, 20, 36),
(303, 20, 37),
(304, 20, 38),
(305, 20, 39),
(306, 20, 40),
(307, 20, 41),
(322, 21, 28),
(323, 21, 29),
(324, 21, 30),
(325, 21, 31),
(326, 21, 32),
(327, 21, 33),
(328, 21, 34),
(329, 21, 35),
(330, 21, 36),
(331, 21, 37),
(332, 21, 38),
(333, 21, 39),
(334, 21, 40),
(335, 21, 41),
(336, 22, 28),
(337, 22, 31),
(338, 22, 32),
(339, 22, 33),
(340, 22, 35),
(341, 22, 36),
(342, 22, 38),
(343, 22, 40),
(344, 22, 41);

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`sr_no`, `room_id`, `image`, `thumb`) VALUES
(71, 18, 'IMG_86425.jpg', 0),
(72, 19, 'IMG_64049.jpg', 0),
(73, 20, 'IMG_25379.png', 1),
(74, 18, 'IMG_79252.png', 0),
(76, 18, 'IMG_54752.jpg', 0),
(77, 18, 'IMG_59756.png', 1),
(78, 19, 'IMG_13281.png', 1),
(79, 19, 'IMG_77213.png', 0),
(80, 19, 'IMG_44328.png', 0),
(82, 20, 'IMG_64827.jpg', 0),
(83, 20, 'IMG_90485.jpg', 0),
(84, 20, 'IMG_97316.png', 0),
(85, 21, 'IMG_25471.jpg', 0),
(86, 21, 'IMG_22538.jpg', 0),
(87, 21, 'IMG_98149.png', 0),
(88, 21, 'IMG_63964.png', 1),
(89, 22, 'IMG_53850.png', 1),
(90, 22, 'IMG_37288.png', 0),
(91, 22, 'IMG_29214.jpg', 0),
(92, 22, 'IMG_11462.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(150) NOT NULL,
  `site_about` varchar(600) NOT NULL,
  `shutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'Royal Palace', 'Located in the prestigious downtown business district, InterContinental Dhaka is the foremost name in luxury. The hotel boasts a Millennium modern outlook with a touch of local culture. It features 226 luxury rooms and suites, a selection of restaurants offering exquisite gastronomic experiences. Host your events in our state-of-the-art meeting spaces. Our outdoor Temperature-Controlled Swimming Pool, Fitness Centre and The Spa are the perfect destinations for unwinding during your travel.', 0);

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
(16, 'Hridoy', 'IMG_52681.jpg'),
(17, 'ABC', 'IMG_73251.jpg'),
(18, 'Danger', 'IMG_99171.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phonenum` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`id`, `name`, `email`, `address`, `phonenum`, `dob`, `password`, `status`, `datetime`) VALUES
(3, '111', '111@gmail.com', '11', '111', '2023-10-31', '$2y$10$DwbVPuQg/wqBhqFaGwPK8OxpmgesfVUIcAAR5Ma/T2xZA3oyt3g0O', 0, '2023-10-31 08:44:22'),
(4, 'Hridoy', 'hridoy@gmail.com', 'Dhaka', '01999999999', '2023-10-31', '$2y$10$3up.lFqGeaoOh.E0GNRZGekJ6B2CZAIvkx7cXL7OO1Bj2pWXYov9e', 1, '2023-10-31 09:46:38'),
(5, 'Mofiz', 'mawiceg145@hupoi.com', 'Kishorganj', '01788888888', '2010-01-09', '$2y$10$YxjEqApGTx3NBVMUF31GyOJ2DQ6R0fA9d1O3pPFFrINj0HSrVA9gy', 0, '2023-12-08 00:12:16'),
(6, 'Shakira', 'sakira@gmail.com', 'barishal', '0000000000', '2023-12-01', '$2y$10$J6bOIZuytycbg3HWQ0Uu0eJXMI8xhe.FzExa3IJr6Wn.q.67RDdwa', 0, '2023-12-11 16:49:36'),
(7, 'Abir', 'abir@gmail.com', 'Tangail', '01756787878', '2000-06-06', '$2y$10$KQoI/0zG6Ssy3MMMympDPeva4uih/adllqrvpUEcpTkhyUBICGlr.', 1, '2023-12-11 22:16:40'),
(8, 'Sumaiya', 'sumaiya@gmail.com', 'Gazipur', '01634457362', '1998-12-28', '$2y$10$7JySQvD6b/3.AS2TTXo3heT3Jmaupc5KKnDAeX8feu2CzzS2TwOb2', 1, '2023-12-11 22:20:39'),
(9, 'Meem', 'meem@gmail.com', 'Bramnbaria', '01864987543', '2002-07-23', '$2y$10$Ys/dCWY.z6Hk7Z6tiIvvPudgep6f7.baEI6OQ.G2WPI60hz/xGtmW', 1, '2023-12-11 22:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(600) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`sr_no`, `name`, `email`, `subject`, `message`, `datetime`, `seen`) VALUES
(11, 'BlackStone', 'info@theblackstone.com', 'Test BlackStone', 'Test BlackStone Message', '2023-10-04 00:00:00', 1),
(14, 'BlackStone', 'info@theblackstone.com', 'Test BlackStone', 'Test BlackStone Message', '2023-10-04 00:00:00', 1),
(19, 'Sumaiya', 'sumaiya@gmail.com', 'sumaiya', 'sumaiya', '2023-10-11 00:00:00', 1),
(21, 'Abdul', 'Abdul@gmail.com', 'Abdul', 'Abdul', '2023-12-16 02:08:23', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`sr_no`);

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
-- Indexes for table `payment`
--
ALTER TABLE `payment`
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
  ADD KEY `room id` (`room_id`),
  ADD KEY `facilities id` (`facilities_id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `rm id` (`room_id`),
  ADD KEY `features id` (`features_id`);

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
-- Indexes for table `team_details`
--
ALTER TABLE `team_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_details`
--
ALTER TABLE `team_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD CONSTRAINT `facilities id` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `room id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_features`
--
ALTER TABLE `room_features`
  ADD CONSTRAINT `features id` FOREIGN KEY (`features_id`) REFERENCES `features` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `rm id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
