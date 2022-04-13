-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2022 at 06:10 AM
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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `building` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_address_fk` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(100) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `body` text NOT NULL,
  `date_posted` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_items_id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `added_on` date NOT NULL,
  `expired_on` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_items_fk` (`cart_items_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total_cost` decimal(10,0) NOT NULL,
  `added_on` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_cart_items_fk` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Bundles', '', '', ''),
(2, 'Cleanser', '', '', ''),
(3, 'Toner', '', '', ''),
(4, 'Serum & Essence', '', '', ''),
(5, 'Moisturizer', '', '', ''),
(6, 'Masks', '', '', '');

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
(1, 'Hyaluronic Acid', '', ''),
(2, 'Niacinamide', '', ''),
(3, 'Vitamin E', '', ''),
(4, 'Antioxidants', '', ''),
(5, 'Salicylic Acid', '', ''),
(6, 'Amino Acids', '', ''),
(7, 'Butylene Glycol', '', ''),
(8, 'Citric Acid', '', ''),
(9, 'Glycerin', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `ordered_on` date NOT NULL,
  `shipped_on` date NOT NULL,
  `num_orders` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_order_fk` (`user_id`),
  KEY `cart_order_fk` (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `amount` int(11) NOT NULL,
  `currency` varchar(25) NOT NULL,
  `verified_token` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_payment_fk` (`user_id`),
  KEY `order_payment_fk` (`order_id`),
  KEY `address_order_fk` (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `key_ingredient_id` int(11) NOT NULL,
  `skin_concern_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cosdna_link` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `for_skin_type` varchar(50) NOT NULL,
  `for_skin_concern` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `main_ingredient` varchar(50) NOT NULL,
  `in_cart` tinyint(1) NOT NULL,
  `in_wishlist` tinyint(1) NOT NULL,
  `base_price` decimal(10,0) NOT NULL,
  `price` json NOT NULL,
  `images` json NOT NULL,
  `num_ratings` int(11) DEFAULT NULL,
  `sum_ratings` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_product_fk` (`category_id`),
  KEY `key_ingredient_product_fk` (`key_ingredient_id`),
  KEY `skin_concern_product_fk` (`skin_concern_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `key_ingredient_id`, `skin_concern_id`, `name`, `cosdna_link`, `description`, `for_skin_type`, `for_skin_concern`, `category`, `brand`, `main_ingredient`, `in_cart`, `in_wishlist`, `base_price`, `price`, `images`, `num_ratings`, `sum_ratings`) VALUES
(1, 2, 1, 1, 'Hydrating Facial Cleanser', 'http://www.cosdna.com/eng/cosmetic_3183346169.html', 'A cleanser can remove dirt, makeup and other debris, but a hydrating cleanser, like CeraVe Hydrating Facial Cleanser, can do all that without disrupting the skin’s natural protective barrier or stripping the skin of its natural moisture.', 'Normal, Dry', 'Hydration', 'Cleanser', 'CeraVe', '3 essential ceramides', 0, 0, '14', '0', '0', 0, 0),
(2, 2, 2, 4, 'Brightening & Pore-caring Facial Cleanser', 'http://www.cosdna.com/eng/cosmetic_1488318714.html', 'Hydrating, white clay-infused cleansing foam that helps remove impurities from pores for clear, refreshed skin.', 'All', 'Dullness & Uneven Skin Tone', 'Cleanser', 'InnisFree', 'Jeju tangerine peel extract', 0, 0, '17', '0', '0', 0, 0),
(6, 2, 3, 1, 'Gentle Milk Cleanser', 'http://www.cosdna.com/eng/cosmetic_c837457675.html', 'Gentle, no-rinse cleanser for dry skin removes make-up, dirt and oil while providing moisture and antioxidant protection. Skin is left smooth, soft and supple.', 'Dry', 'Hydration', 'Cleanser', 'Avene', 'Avene Thermal Spring Water', 0, 0, '20', '0', '0', 0, 0),
(7, 2, 6, 6, 'Perfect Renew Youth Skin Refiner', 'http://www.cosdna.com/eng/cosmetic_f8c4539848.html', 'An anti-aging toner used as the first step after cleansing to nourish, hydrate, and soften skin, helping prep it to better absorb the rest of your skincare products.', 'All', 'Age Prevention', 'Cleanser', 'Laneige', 'Wild Butterfly Ginger', 0, 0, '39', '0', '0', 0, 0),
(8, 2, 5, 2, 'Peach Slices Acne Clarifying Cleanser', 'http://www.cosdna.com/eng/cosmetic_140b567382.html', 'Clinically-proven cleanser helps clear & prevent acne rapidly, deep cleans, and soothes. Gentle yet effective clinically-proven cleanser easily removes stubborn impurities and oil for a deep clean that leaves skin visibly clear, smooth and calm.', 'Combination, Normal, Oily, Dry', 'Pore Solutions', 'Cleanser', 'Peach & Lily', 'Acerola', 0, 0, '11', '0', '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `timestamp` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_review_fk` (`product_id`),
  KEY `user_review_fk` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Hydration', '', ''),
(2, 'Pore Solutions', '', ''),
(3, 'Troubled Skin', '', ''),
(4, 'Dullness & Uneven Skin Tone', '', ''),
(5, 'Sensitive Skin', '', ''),
(6, 'Age Prevention', '', ''),
(7, 'Lifting & Firming', '', '');

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
  `email` varchar(50) NOT NULL,
  `skin_type` varchar(25) NOT NULL,
  `skin_concern` varchar(25) NOT NULL,
  `points` int(11) NOT NULL,
  `registered_on` date NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `added_on` date NOT NULL,
  `num_products` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_wishlist_fk` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `user_address_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_items_fk` FOREIGN KEY (`cart_items_id`) REFERENCES `cart_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `product_cart_items_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `cart_order_fk` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `user_order_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `address_order_fk` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_payment_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_payment_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_product_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `key_ingredient_product_fk` FOREIGN KEY (`key_ingredient_id`) REFERENCES `key_ingredient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skin_concern_product_fk` FOREIGN KEY (`skin_concern_id`) REFERENCES `skin_concern` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `product_review_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_review_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `product_wishlist_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
