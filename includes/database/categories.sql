-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 27, 2022 at 07:16 AM
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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `short_description` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `short_description`, `description`, `image`) VALUES
(1, 'Bundles', 'Small set of skincare products for 1 time use', 'If you’re looking to test a skin routine, these bundles are perfect for you! There’s a moisturizer, toner, serum & essence, cleanser and mask compiled from the best brands.', ''),
(2, 'Cleanser', 'Prevent skin dehydration with nourishing face moisturizer for your skin type', 'Lock in hydration all day long with the right nourishing face moisturizer for your skin type. Choose between moisturizers, creams, gel-creams, and emulsions to find your go-to formula!', ''),
(3, 'Toner', 'Gently refresh your skin without stripping it of its natural moisture', 'Soften and rebalance the skin with toner to maximize absorption of next steps.', ''),
(4, 'Serum & Essence', 'Targets skin imperfections on the face to revitalize and enhance it back to its original perfection', 'Daily concentrates to target your skin\'s unique needs & lightweight, multi-tasking heroes for the perfect skin prep.', ''),
(5, 'Moisturizer', 'The second step of your double cleansing routine, tailored to fit your skin\'s needs.', 'Cleanses the skin and washes away the daily grime like makeup, dead skin cells, excess oil, and pollutants.', ''),
(6, 'Masks', 'Single-use staples for that signature glow.', 'Driving ingredients closer and deeper into the skin, infusing your pores and allowing the skin to soak up more of the product.', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
