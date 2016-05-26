-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2016 at 04:58 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_aila`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE IF NOT EXISTS `tbl_about` (
  `about_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `about_desc` text NOT NULL,
  `about_thumb_image` varchar(255) NOT NULL,
  PRIMARY KEY (`about_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`about_id`, `about_desc`, `about_thumb_image`) VALUES
(8, 'Ai-La Restaurant in Kumaripati is a multi-cuisine restaurant best known for its Ai-La signature dishes. The items on the menu are Ai-La Pizza, Ai-La Platter, Tangry Kebab, Tiger Chicken, Satay Kai, Jhol Momo, Mini Momo etc.\r\n ', '16_01_02_44_01_16_Capture1.PNG'),
(9, '<p style="text-align:justify">Ai-La Restaurant in Kumaripati is a multi-cuisine restaurant best known for its Ai-La signature dishes. The items on the menu are Ai-La Pizza, Ai-La Platter, Tangry Kebab, Tiger Chicken, Satay Kai, Jhol Momo, Mini Momo etc.</p>\r\n\r\n<p style="text-align:justify">&nbsp;</p>\r\n\r\n<p style="text-align:justify">Ai-La can accommodate a reasonably sized crowd of 120 pax, indoors, outdoors, and in the terrace. The wooden furniture, false ceiling, formal circular seating arranemgent, nice lightings, all add to the ambience. The restaurant is recommended for casual family gatherings, banquets, conferences, events, parties etc. The space is divided into fine dining and casual seatings. Vibrant colours in the decor bring about a youthful energy to the place. A lot of bamboo has been used to add to the interior texture of this lovely restaurant.&nbsp;</p>\r\n', '16_01_05_47_01_26_11206966_356712161192878_3109747998641904495_n.jpg'),
(10, '<p style="text-align:justify">Ai-La Restaurant in Kumaripati is a multi-cuisine restaurant best known for its Ai-La signature dishes. The items on the menu are Ai-La Pizza, Ai-La Platter, Tangry Kebab, Tiger Chicken, Satay Kai, Jhol Momo, Mini Momo etc.</p>\r\n\r\n<p style="text-align:justify">&nbsp;</p>\r\n\r\n<p style="text-align:justify">Ai-La can accommodate a reasonably sized crowd of 120 pax, indoors, outdoors, and in the terrace. The wooden furniture, false ceiling, formal circular seating arranemgent, nice lightings, all add to the ambience.</p>\r\n', '16_01_05_49_01_19_11667323_375605179303576_2827035242316534593_n.jpg'),
(11, '<p style="text-align:justify">Ai-La Restaurant in Kumaripati is a multi-cuisine restaurant best known for its Ai-La signature dishes. The items on the menu are Ai-La Pizza, Ai-La Platter, Tangry Kebab, Tiger Chicken, Satay Kai, Jhol Momo, Mini Momo etc.</p>\r\n\r\n<p style="text-align:justify">&nbsp;</p>\r\n\r\n<p style="text-align:justify">Ai-La can accommodate a reasonably sized crowd of 120 pax, indoors, outdoors, and in the terrace. The wooden furniture, false ceiling, formal circular seating arranemgent, nice lightings, all add to the ambience.</p>\r\n', '16_01_05_50_01_04_11667323_375605179303576_2827035242316534593_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `category_thumb_image` varchar(200) NOT NULL,
  `category_title` varchar(200) NOT NULL,
  `menu_title` varchar(200) NOT NULL,
  `menu_price` varchar(200) NOT NULL,
  `menu_quantity` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_title` varchar(200) NOT NULL,
  `category_thumb_image` varchar(200) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_title`, `category_thumb_image`) VALUES
(1, 'Momo', '16_01_01_11_01_32_momo.jpg'),
(2, 'Chowmin', '16_01_01_11_01_52_chowmin.jpg'),
(3, 'Burger', '16_01_01_12_01_10_burger.jpg'),
(4, 'sekuwa', '16_01_01_12_01_29_sekuwa.jpg'),
(5, 'Pizza', '16_01_20_39_01_39_15_12_29_56_12_22_download.jpg'),
(6, 'Rice ', '16_01_06_31_01_55_rice.jpg'),
(7, 'Sausage', '16_01_07_44_01_21_download (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dish`
--

CREATE TABLE IF NOT EXISTS `tbl_dish` (
  `dish_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dish_price` varchar(255) NOT NULL,
  `dish_title` varchar(255) NOT NULL,
  PRIMARY KEY (`dish_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_dish`
--

INSERT INTO `tbl_dish` (`dish_id`, `dish_price`, `dish_title`) VALUES
(2, ' 100', '		MOMO'),
(3, ' 700', '	Aila Pizza'),
(4, '    20', '	Burger'),
(6, ' 385', 'Ai-La Platter');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE IF NOT EXISTS `tbl_events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) NOT NULL,
  `event_desc` text NOT NULL,
  `event_date` date NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2024 ;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`event_id`, `event_title`, `event_desc`, `event_date`) VALUES
(2018, 'Social Events at Ai-la Restaurant', ' Social events whether it is a reunion, charity ball, holiday celebration or any other special occasions, our associates and our facilities make each event unique and memorable.', '2015-11-30'),
(2019, 'movie night ', 'movie night at aila ', '2015-11-30'),
(2020, 'MUsic Night', ' Live music by anil SAGAR and group', '2015-12-09'),
(2021, 'Music Night with Mt. 8848', '<p>Enjoy the live music by Mt. 8848 at Ai-La Loune Restaurnat.</p>\r\n', '2016-01-08'),
(2022, 'DJ night ', '<p>Dance with DJ prabin&nbsp;</p>\r\n', '2016-01-07'),
(2023, 'Match Day', '<p>Real Madrid Vs Barcelona</p>\r\n', '2016-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facilities`
--

CREATE TABLE IF NOT EXISTS `tbl_facilities` (
  `facility_id` int(11) NOT NULL AUTO_INCREMENT,
  `facility_phone` int(11) NOT NULL,
  `facility_desc` text NOT NULL,
  `facility_photo` blob NOT NULL,
  PRIMARY KEY (`facility_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_features`
--

CREATE TABLE IF NOT EXISTS `tbl_features` (
  `feature_id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_title` varchar(255) NOT NULL,
  `feature_desc` text NOT NULL,
  PRIMARY KEY (`feature_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_features`
--

INSERT INTO `tbl_features` (`feature_id`, `feature_title`, `feature_desc`) VALUES
(1, 'Meeting and Events', 'we believe in the power of the meeting because nothing is quite so personal, quite so human, as meeting in person.'),
(2, 'Restaurant Food ', 'Bar and multi- cuisine gourmet restaurant serves delicious breakfast , lunch , dinner , indian food..'),
(4, '		Hunger Order Now', '		Order Food From any where you wish. To order first be our meber and than order. You can pay your bill. You can pay your bill on delivery orÂ via Esewa\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `menu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `menu_title` varchar(200) NOT NULL,
  `menu_price` varchar(200) NOT NULL,
  `category_title` varchar(200) NOT NULL,
  `menu_category` varchar(200) NOT NULL,
  PRIMARY KEY (`menu_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `category_id`, `menu_title`, `menu_price`, `category_title`, `menu_category`) VALUES
(2, 0, '				Cheese Pizza', '                        37', '', '5'),
(3, 0, '		Chicken Pizza', '    20', '', '5'),
(4, 0, '		Mixed Pizza', '    25', '', '5'),
(5, 0, '		Buff Momo', '    10', '', '1'),
(6, 0, 'Veg Momo', '80', '', '1'),
(8, 0, '		Chicken Momo', '    15', '', '1'),
(9, 0, 'Mutton Momo', '200', '', '1'),
(10, 0, '						Mutton Sekuwa', '            25', '', '4'),
(11, 0, '		Veg Chowmin', '            7', '', '2'),
(12, 0, '		Chicken Chowmin', '    12', '', '2'),
(13, 0, 'mixed momo', '67', '', '1'),
(14, 0, 'Plain Rice ', '75', '', '6'),
(15, 0, 'Buff Sausage', 'Rs 100', '', '7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_order`
--

CREATE TABLE IF NOT EXISTS `tbl_menu_order` (
  `order_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_order`
--

INSERT INTO `tbl_menu_order` (`order_id`, `menu_id`, `quantity`, `price`) VALUES
(1, 9, 1, 0),
(2, 4, 1, 0),
(3, 5, 1, 0),
(5, 9, 1, 0),
(7, 11, 1, 0),
(8, 12, 2, 0),
(8, 11, 1, 0),
(8, 13, 1, 0),
(8, 9, 1, 0),
(8, 6, 1, 0),
(8, 5, 1, 0),
(8, 10, 2, 0),
(8, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE IF NOT EXISTS `tbl_message` (
  `visitor_id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_name` varchar(255) NOT NULL,
  `visitor_email` varchar(255) NOT NULL,
  `visitor_message` text NOT NULL,
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`visitor_id`, `visitor_name`, `visitor_email`, `visitor_message`) VALUES
(2, 'Sunil', 'sunil@gmail.com', 'hello there '),
(3, 'Hari Gharti Magar', 'hari@gmail.com', 'Food was awesome but service was poor. '),
(5, 'Nijan Sign Thakuri ', 'info@nijanthakuri.com.np', 'The food as well as service was good. view from roof top garden as mind blowing. will visit again ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `user_id`) VALUES
(1, 17),
(2, 22),
(3, 22),
(4, 22),
(5, 22),
(6, 22),
(7, 17),
(8, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE IF NOT EXISTS `tbl_reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservationname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone_home` varchar(255) NOT NULL,
  `telephone_business` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_of_arrival` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `no_of_people` int(11) NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`reservation_id`, `reservationname`, `address`, `telephone_home`, `telephone_business`, `email`, `date_of_arrival`, `no_of_people`, `comments`) VALUES
(3, 'Anil chapai', 'Baneshwor', '9848156035', '9812510080', 'anilchapai@hotmail.com', '2016-01-04 18:15:00', 2, 'no comments '),
(4, 'Hari', 'Jawlakheh', '9867564512', '736749292', 'hari@yahoo.com', '2016-01-04 18:15:00', 1, 'i will be there in time '),
(5, 'Sandip Parajuli', 'New Baneshwor', '9878767564', '9876564534', 'sandip@yahoo.com', '2016-01-06 18:15:00', 5, 'We will arrive there at 6 for live music ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE IF NOT EXISTS `tbl_service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_title` varchar(255) NOT NULL,
  `service_desc` text NOT NULL,
  `service_thumb_image` varchar(255) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `service_title`, `service_desc`, `service_thumb_image`) VALUES
(7, 'Services at Ai-La', '<p><span style="color:rgb(85, 85, 85); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:medium">Takes Reservations</span><br />\r\n<span style="color:rgb(85, 85, 85); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:medium">Walk-Ins Welcome</span><br />\r\n<span style="color:rgb(85, 85, 85); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:medium">Good For Groups and Catering and online ordering&nbsp;</span></p>\r\n', '16_01_07_29_01_01_11206966_356712161192878_3109747998641904495_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_signup`
--

CREATE TABLE IF NOT EXISTS `tbl_signup` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password_check` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `telephone` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tbl_signup`
--

INSERT INTO `tbl_signup` (`user_id`, `fullname`, `username`, `password`, `password_check`, `address`, `telephone`, `email`) VALUES
(14, 'shar', 'shar', '8a7b25e0a54a3b5871b8104ab11396a3', '8a7b25e0a54a3b5871b8104ab11396a3', '0', 898, 'su@gmail.com'),
(16, 'ukesh gaiju', 'ukesh', '8d55875f3c4630a6a36940ddfd8ff51c', '8d55875f3c4630a6a36940ddfd8ff51c', '0', 1234, 'ukesh2010@gmail.com'),
(17, 'anil', 'anil', '71b9b5bc1094ee6eaeae8253e787d654', '71b9b5bc1094ee6eaeae8253e787d654', '0', 98989878, 'anil@gmail.com'),
(19, 'prabin maharjan', 'prabin', '65db11c35e330498cbe58380aad94c83', '65db11c35e330498cbe58380aad94c83', '0', 2147483647, 'prabin@gmail.com'),
(20, 'applee', 'apple', '1f3870be274f6c49b3e31a0c6728957f', '1f3870be274f6c49b3e31a0c6728957f', '0', 2147483647, 'aaron@hotmail.com'),
(21, 'anup chapai', 'anup007', '20b5e651d7623615f082ff234c1c75a2', '20b5e651d7623615f082ff234c1c75a2', '0', 2147483647, 'anupchapai@gmail.com'),
(22, 'Suman Lama', 'Suman', '1533c67e5e70ae7439a9aa993d6a3393', '1533c67e5e70ae7439a9aa993d6a3393', '0', 2147483647, 'sumanlama'),
(23, 'Suman Lama', 'Suman', '1533c67e5e70ae7439a9aa993d6a3393', '1533c67e5e70ae7439a9aa993d6a3393', '0', 2147483647, 'sumanlama'),
(24, 'Suman Lama', 'Suman', '1533c67e5e70ae7439a9aa993d6a3393', '1533c67e5e70ae7439a9aa993d6a3393', '0', 2147483647, 'sumanlama@gmail.com'),
(25, 'Suman Thapa', 'Suman', '1533c67e5e70ae7439a9aa993d6a3393', '1533c67e5e70ae7439a9aa993d6a3393', '0', 2147483647, 'sumanlama@gmail.com'),
(26, 'Prabin Maharjan', 'Pasa', '65db11c35e330498cbe58380aad94c83', '65db11c35e330498cbe58380aad94c83', '0', 2147483647, 'prabin@gmail.com'),
(27, 'Bill Gates', 'Bill', '21549be07d194533792adb217d1e57e2', '21549be07d194533792adb217d1e57e2', '0', 2147483647, 'bill@outlook.com'),
(28, 'Sammi Thapa', 'Sammi', '2564ead42b0e95078f497f60c2b01ba9', '2564ead42b0e95078f497f60c2b01ba9', '0', 2147483647, 'sami@hotmail.com'),
(29, 'Bishal Gurung ', 'Bishal', '8aacadda30664ec65812aafa0f8edd50', '8aacadda30664ec65812aafa0f8edd50', '0', 2147483647, 'bisal@yahoo.com'),
(30, 'Subah Nuepane', 'tori', 'f1487126b5bcc7850c0fce2e1ad4a9ec', 'f1487126b5bcc7850c0fce2e1ad4a9ec', 'Jhamsekhel', 2147483647, 'here_chatme@yahoo.com'),
(31, 'dev Gurung', 'dev', '20814b005ad91d9f142f41391ded4c0a', '20814b005ad91d9f142f41391ded4c0a', 'Jawlakheh', 2147483647, 'dev@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_specialdishes`
--

CREATE TABLE IF NOT EXISTS `tbl_specialdishes` (
  `dishes_id` int(11) NOT NULL AUTO_INCREMENT,
  `dishes_name` varchar(255) NOT NULL,
  `dishes_price` varchar(255) NOT NULL,
  PRIMARY KEY (`dishes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
