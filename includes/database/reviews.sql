-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2022 at 03:09 PM
-- Server version: 8.0.21
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
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `timestamp` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `images` json NOT NULL,
  `rating` int NOT NULL,
  `likes` int NOT NULL,
  `dislikes` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_review_fk` (`product_id`),
  KEY `user_review_fk` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `reviews`
--
DROP TRIGGER IF EXISTS `after_review_insert`;
DELIMITER $$
CREATE TRIGGER `after_review_insert` AFTER INSERT ON `reviews` FOR EACH ROW UPDATE products 
    SET products.ave_rating = (SELECT AVG(rating) FROM reviews WHERE reviews.product_id = products.id)
$$
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `product_review_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_review_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
