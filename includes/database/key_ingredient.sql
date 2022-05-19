-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2022 at 06:42 AM
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
-- Table structure for table `key_ingredient`
--

DROP TABLE IF EXISTS `key_ingredient`;
CREATE TABLE IF NOT EXISTS `key_ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `key_ingredient`
--

INSERT INTO `key_ingredient` (`id`, `name`, `description`, `image`) VALUES
(1, 'Hyaluronic Acid', '', 'assets/images/others/key-all.png'),
(2, 'Niacinamide', '', 'assets/images/others/key-all.png'),
(3, 'Vitamin E', '', 'assets/images/others/key-all.png'),
(4, 'Antioxidants', '', 'assets/images/others/key-all.png'),
(5, 'Salicylic Acid', '', 'assets/images/others/key-all.png'),
(6, 'Amino Acids', '', 'assets/images/others/key-all.png'),
(7, 'Butylene Glycol', '', 'assets/images/others/key-all.png'),
(8, 'Citric Acid', '', 'assets/images/others/key-all.png'),
(9, 'Glycerin', '', 'assets/images/others/key-all.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
