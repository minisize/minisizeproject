-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 20, 2022 at 06:52 PM
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `encrypted_pass` varchar(100) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `age_range` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `skin_type` varchar(50) NOT NULL,
  `skin_concern` varchar(50) NOT NULL,
  `points` int(11) NOT NULL,
  `num_wishlist` int(11) NOT NULL,
  `registered_on` date NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `encrypted_pass`, `first_name`, `last_name`, `gender`, `age_range`, `email`, `skin_type`, `skin_concern`, `points`, `num_wishlist`, `registered_on`, `profile_img`) VALUES
(1, 'sjunseiawal', '96e79218965eb72c92a549dd5a330112', 'Sjunsei', 'Awal', '', '', 'sjunseiawal@email.com', 'Oily', 'Age Prevention', 0, 2, '2022-04-21', 'assets/images/profile_pics/default.png'),
(2, 'akilahlapure', 'e10adc3949ba59abbe56e057f20f883e', 'Akilah', 'Lapure', 'Female', '18-24 years old', 'akilah.lapure@gmail.com', 'Combination', 'Hydration', 0, 0, '2022-05-20', '../../assets/images/website/placeholder/pp_placeholder.png'),
(3, 'waawee', 'b6c1c2ed7463f81431b8602eab8336ee', 'waa', 'wee', '', '', 'wii@email.com', 'Sensitive', 'Troubled Skin', 0, 0, '2022-05-20', '../../assets/images/website/placeholder/pp_placeholder.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
