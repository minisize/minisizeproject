-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2022 at 06:10 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minisize_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `skin_concern`
--

DROP TABLE IF EXISTS `skin_concern`;
CREATE TABLE IF NOT EXISTS `skin_concern` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skin_concern`
--

INSERT INTO `skin_concern` (`id`, `name`, `description`, `image`) VALUES
(1, 'Hydration', '', 'assets/images/others/skin-all.png'),
(2, 'Pore Solutions', '', 'assets/images/others/skin-all.png'),
(3, 'Troubled Skin', '', 'assets/images/others/skin-all.png'),
(4, 'Dullness & Uneven Skin Tone', '', 'assets/images/others/skin-all.png'),
(5, 'Sensitive Skin', '', 'assets/images/others/skin-all.png'),
(6, 'Age Prevention', '', 'assets/images/others/skin-all.png'),
(7, 'Lifting & Firming', '', 'assets/images/others/skin-all.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
