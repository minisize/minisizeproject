-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 14, 2022 at 12:30 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `key_ingredient_id`, `skin_concern_id`, `name`, `cosdna_link`, `description`, `for_skin_type`, `for_skin_concern`, `category`, `brand`, `main_ingredient`, `in_cart`, `in_wishlist`, `base_price`, `price`, `images`, `num_ratings`, `sum_ratings`) VALUES
(1, 2, 1, 1, 'Hydrating Facial Cleanser', 'http://www.cosdna.com/eng/cosmetic_3183346169.html', 'A cleanser can remove dirt, makeup and other debris, but a hydrating cleanser, like CeraVe Hydrating Facial Cleanser, can do all that without disrupting the skin’s natural protective barrier or stripping the skin of its natural moisture.', 'Normal, Dry', 'Hydration', 'Cleanser', 'CeraVe', '3 essential ceramides', 0, 0, '14', '0', '{\"images\": [\"assets/images/products/cleanser/hydrating-cerave-1.jpg\", \"assets/images/products/cleanser/hydrating-cerave-2.jpg\", \"assets/images/products/cleanser/hydrating-cerave-3.jpg\"]}', 0, 0),
(2, 2, 2, 4, 'Brightening & Pore-caring Facial Cleanser', 'http://www.cosdna.com/eng/cosmetic_1488318714.html', 'Hydrating, white clay-infused cleansing foam that helps remove impurities from pores for clear, refreshed skin.', 'All', 'Dullness & Uneven Skin Tone', 'Cleanser', 'InnisFree', 'Jeju tangerine peel extract', 0, 0, '17', '0', '{\"images\": [\"assets/images/products/cleanser/brightening-innisfree-1.jpg\", \"assets/images/products/cleanser/brightening-innisfree-2.jpg\", \"assets/images/products/cleanser/brightening-innisfree-3.jpg\"]}', 0, 0),
(3, 2, 3, 1, 'Gentle Milk Cleanser', 'http://www.cosdna.com/eng/cosmetic_c837457675.html', 'Gentle, no-rinse cleanser for dry skin removes make-up, dirt and oil while providing moisture and antioxidant protection. Skin is left smooth, soft and supple.', 'Dry', 'Hydration', 'Cleanser', 'Avene', 'Avene Thermal Spring Water', 0, 0, '20', '0', '{\"images\": [\"assets/images/products/cleanser/perfect-laneige-1.jpg\", \"assets/images/products/cleanser/perfect-laneige-2.jpg\", \"assets/images/products/cleanser/perfect-laneige-3.jpg\"]}', 0, 0),
(4, 2, 6, 6, 'Perfect Renew Youth Skin Refiner', 'http://www.cosdna.com/eng/cosmetic_f8c4539848.html', 'An anti-aging toner used as the first step after cleansing to nourish, hydrate, and soften skin, helping prep it to better absorb the rest of your skincare products.', 'All', 'Age Prevention', 'Cleanser', 'Laneige', 'Wild Butterfly Ginger', 0, 0, '39', '0', '{\"images\": [\"assets/images/products/cleanser/perfect-laneige-1.jpg\", \"assets/images/products/cleanser/perfect-laneige-2.jpg\", \"assets/images/products/cleanser/perfect-laneige-3.jpg\"]}', 0, 0),
(5, 2, 5, 2, 'Peach Slices Acne Clarifying Cleanser', 'http://www.cosdna.com/eng/cosmetic_140b567382.html', 'Clinically-proven cleanser helps clear & prevent acne rapidly, deep cleans, and soothes. Gentle yet effective clinically-proven cleanser easily removes stubborn impurities and oil for a deep clean that leaves skin visibly clear, smooth and calm.', 'Combination, Normal, Oily, Dry', 'Pore Solutions', 'Cleanser', 'Peach & Lily', 'Acerola', 0, 0, '11', '0', '{\"images\": [\"assets/images/products/cleanser/peach-peach_lily-1.jpg\", \"assets/images/products/cleanser/peach-peach_lily-2.jpg\", \"assets/images/products/cleanser/peach-peach_lily-3.jpg\", \"assets/images/products/cleanser/peach-peach_lily-4.jpg\", \"assets/images/products/cleanser/peach-peach_lily-5.jpg\", \"assets/images/products/cleanser/peach-peach_lily-6.jpg\"]}', 0, 0),
(6, 2, 6, 7, 'REDEFINE Daily Foaming Cleanser', 'http://www.cosdna.com/eng/cosmetic_c235534547.html', 'Lather away impurities. Our foaming cleanser with AHAs gently exfoliates and purifies skin as it removes dirt, oil + makeup.', 'All', 'Pore Solutions, Lifting & Firming, Age Prevention', 'Cleanser', 'Rodan+Fields', 'Alpha hydroxy acids', 0, 0, '45', '0', '{\"images\": [\"assets/images/products/cleanser/redefine-rodan+fields-1.jpg\", \"assets/images/products/cleanser/redefine-rodan+fields-2.jpg\", \"assets/images/products/cleanser/redefine-rodan+fields-3.jpg\"]}', 0, 0),
(7, 2, 8, 1, 'Purifying Face Wash', 'http://www.cosdna.com/eng/cosmetic_a5dd566043.html', 'An ultra-fresh face wash that cleanses, calms and soothes skin whilst maintaining your skin\'s moisture levels. Formulated with Neem, Hyssop to balance sebum productin and Aloe Vera to calm and moisturise your skin. Suitable for oily and combination skin.', 'Oily, Combination', 'Hydration', 'Cleanser', 'Herbal Essentials', 'Neem & Hyssop extracts', 0, 0, '8', '0', '{\"images\": [\"assets/images/products/cleanser/purifying-herbalessentials-1.jpg\", \"assets/images/products/cleanser/purifying-herbalessentials-2.jpg\", \"assets/images/products/cleanser/purifying-herbalessentials-3.jpg\", \"assets/images/products/cleanser/purifying-herbalessentials-4.jpg\"]}', 0, 0),
(8, 2, 8, 3, 'SoonJung pH 6.5 Whip Cleanser 350ml', 'http://www.cosdna.com/eng/cosmetic_456c499150.html', 'Whipped cream-textured cleanser with weakly acidic bubbles for moisturizing facial cleansing.', 'Sensitive, Irrated, Weak', 'Troubled Skin, Sensitive Skin', 'Cleanser', 'Etude', 'Weakly acidic bubbles', 0, 0, '32', '0', '{\"images\": [\"assets/images/products/cleanser/soonjung-etude-1.jpg\", \"assets/images/products/cleanser/soonjung-etude-2.jpg\", \"assets/images/products/cleanser/soonjung-etude-3.jpg\"]}', 0, 0),
(9, 2, 9, 2, 'Tea Tree Balancing Foaming Cleanser', 'https://www.cosdna.com/eng/cosmetic_57f4518318.html', 'A gentle foaming cleanser formulated with USDA organic aloe vera and tea tree oil to effectively remove dirt and makeup to leave skin feeling purified, fresh and toned without stripping away natural oils. Burdock and comfrey root extracts provide calm and hydrating effects.', 'Oily', 'Pore Solutions', 'Cleanser', 'Peach & Lily', 'Aloe Vera', 0, 0, '22', '0', '{\"images\": [\"assets/images/products/cleanser/aromatica-peach_lily-1.jpg\", \"assets/images/products/cleanser/aromatica-peach_lily-2.jpg\", \"assets/images/products/cleanser/aromatica-peach_lily-3.jpg\", \"assets/images/products/cleanser/aromatica-peach_lily-4.jpg\"]}', 0, 0),
(10, 3, 3, 3, 'Gentle Toning Lotion', 'https://www.cosdna.com/eng/cosmetic_7201577740.html', 'Gentle, bi-phase toner softens and helps protect skin against external aggressors while resetting skin\'s pH after cleansing.', 'All', 'Troubled Skin', 'Toner', 'Avene', 'Avene Thermal Spring Water', 0, 0, '20', '0', '{\"images\": [\"assets/images/products/toner/gentle-avene-1.jpg\", \"assets/images/products/toner/gentle-avene-2.jpg\", \"assets/images/products/toner/gentle-avene-3.jpg\"]}', 0, 0),
(11, 3, 1, 1, 'Hydrating Toner', 'https://www.cosdna.com/eng/cosmetic_5fe5585332.html', 'Facial toners are used after cleansers to help remove any residue left after cleansing. CeraVe’s Hydrating Toner, our first ever pH balanced and non-drying toner for the face, helps skin feel energized while moisturizing and helping restore the protective skin barrier.', 'Normal, Dry, Sensitive', 'Hydration', 'Toner', 'CeraVe', '3 essential ceramides', 0, 0, '9', '0', '{\"images\": [\"assets/images/products/toner/hydrating-cerave-1.jpg\", \"assets/images/products/toner/hydrating-cerave-2.jpg\", \"assets/images/products/toner/hydrating-cerave-3.jpg\", \"assets/images/products/toner/hydrating-cerave-4.jpg\"]}', 0, 0),
(12, 3, 7, 2, 'Balancing Toner', 'https://www.cosdna.com/eng/cosmetic_7e67252867.html', 'A refreshing watery-gel toner that replenishes skin with lightweight hydration from Jeju green tea. Balance oil levels and complexion with this green tea toner.', 'Combination, Oily, Normal, Dry', 'Pore Solutions, Hydration', 'Toner', 'InnisFree', 'Green Tea', 0, 0, '17', '0', '{\"images\": [\"assets/images/products/toner/balancing-innisfree-1.jpg\", \"assets/images/products/toner/balancing-innisfree-2.jpg\", \"assets/images/products/toner/balancing-innisfree-3.jpg\", \"assets/images/products/toner/balancing-innisfree-4.jpg\"]}', 0, 0),
(13, 3, 4, 1, 'Cream Skin Toner & Moisturizer', 'https://www.cosdna.com/eng/cosmetic_c980445737.html', 'A two-in-one formula that preps and softens like a toner and moisturizes like a cream for maximum hydration benefits in one simple step.', 'All, Oily, Sensitive', 'Hydration', 'Toner', 'Laneige', 'White Leaf Tea Water', 0, 0, '33', '0', '{\"images\": [\"assets/images/products/toner/cream-laneige-1.jpg\", \"assets/images/products/toner/cream-laneige-2.jpg\", \"assets/images/products/toner/cream-laneige-3.jpg\", \"assets/images/products/toner/cream-laneige-4.jpg\", \"assets/images/products/toner/cream-laneige-5.jpg\"]}', 0, 0),
(14, 3, 8, 5, 'Botanical Pore Toner', 'https://www.cosdna.com/eng/cosmetic_f4f8311897.html', 'A serum packed with natural ingredients and formulated to soothe the skin and minimize the appearance of pores. Botanical herbs, Alaskan glacier water and sea plants hydrate while helping to control oil production. Ideal for normal to oily skin.', 'Normal, Oily', 'Sensitive Skin', 'Toner', 'Peach & Lily', 'Glacial Water', 0, 0, '25', '0', '{\"images\": [\"assets/images/products/toner/be-peach_lily-1.jpg\", \"assets/images/products/toner/be-peach_lily-2.jpg\", \"assets/images/products/toner/be-peach_lily-3.jpg\"]}', 0, 0),
(15, 3, 2, 7, 'REDEFINE Pore Refining Toner', 'https://www.cosdna.com/eng/cosmetic_4b83534472.html', 'Tone up! Our skin-softening toner minimizes + unclogs pores, gently exfoliates + helps promote natural cell turnover.', 'All', 'Lifting & Firming, Pore Solutions', 'Toner', 'Rodan+Fields', 'Fruit Acids', 0, 0, '45', '0', '{\"images\": [\"assets/images/products/toner/redefine-rodan+fields-1.jpg\", \"assets/images/products/toner/redefine-rodan+fields-2.jpg\", \"assets/images/products/toner/redefine-rodan+fields-3.jpg\"]}', 0, 0),
(16, 3, 8, 2, 'Purifying Toner with Neem extract & Peppermint Oil', '#', 'Our Purifying Toner works to reduce the appearance of pores, refresh the skin and remove excess sebum, leaving your skin clearer and smoother.', 'Oily, Combination', 'Pore Solutions', 'Toner', 'Herbal Essentials', 'Neem extract & Peppermint oil', 0, 0, '15', '0', '{\"images\": [\"assets/images/products/toner/purifying-herbalessentials-1.jpg\", \"assets/images/products/toner/purifying-herbalessentials-2.jpg\", \"assets/images/products/toner/purifying-herbalessentials-3.jpg\", \"assets/images/products/toner/purifying-herbalessentials-4.jpg\"]}', 0, 0),
(17, 3, 3, 2, 'SoonJung Centella Relief Toner', 'https://www.cosdna.com/eng/cosmetic_7f02551873.html', 'Low-irritant, weakly acidic toner soothes irritated skin caused by external stimulation', 'Sensitive', 'Pore Solutions', 'Toner', 'Etude', 'Centella Asiatica', 0, 0, '20', '0', '{\"images\": [\"assets/images/products/toner/centella-etude-1.jpg\", \"assets/images/products/toner/centella-etude-2.jpg\", \"assets/images/products/toner/centella-etude-3.jpg\", \"assets/images/products/toner/centella-etude-4.jpg\"]}', 0, 0),
(18, 3, 2, 4, 'UNBLEMISH Clarifying Toner', 'https://www.cosdna.com/eng/cosmetic_c63094460.html', 'Let your pores breathe. This toner for acne-prone skin uses mild Alpha-Hydroxy Acids to help unclog pores while brightening, soothing + firming skin.', 'All', 'Dullness * Uneven Skin Tone, Pore Solutions', 'Toner', 'Rodan+Fields', 'Green Tea extracts', 0, 0, '50', '0', '{\"images\": [\"assets/images/products/toner/unblemish-rodan+fields-1.jpg\", \"assets/images/products/toner/unblemish-rodan+fields-2.jpg\", \"assets/images/products/toner/unblemish-rodan+fields-3.jpg\"]}', 0, 0),
(19, 4, 3, 2, 'Cleanance Concentrate Blemish Control Serum', 'https://www.cosdna.com/eng/cosmetic_7db0553465.html', 'Innovative serum is free from harsh ingredients & formulated with plant-based extracts & Avène Thermal Spring Water to help reduce excess oil & appearance of blemishes for visibly clearer skin in as soon as 7 days.', 'Oily, Combination', 'Pore Solutions', 'Serum & Essence', 'Avene', 'Silica', 0, 0, '28', '0', '{\"images\": [\"assets/images/products/serum-essence/cleanance-avene-1.jpg\", \"assets/images/products/serum-essence/cleanance-avene-2.jpg\", \"assets/images/products/serum-essence/cleanance-avene-3.jpg\", \"assets/images/products/serum-essence/cleanance-avene-4.jpg\"]}', 0, 0),
(20, 4, 1, 6, 'Skin Renewing Nightly Exfoliating Treatment', 'https://www.cosdna.com/eng/cosmetic_6505575720.html', 'Developed with dermatologists, CeraVe Skin Renewing Nightly Exfoliating Treatment is an AHA serum with a 5% blend of glycolic acid and for gentle exfoliation to help smooth fine lines, accelerate skin\'s surface cell renewal and clear away dead skin cells, without causing flaking or redness.', 'Dry, Sensitive, Combination', 'Age Prevention, Sensitive Skin', 'Serum & Essence', 'CeraVe', 'Licorice Root extract', 0, 0, '30', '0', '{\"images\": [\"assets/images/products/serum-essence/skin-cerave-1.jpg\", \"assets/images/products/serum-essence/skin-cerave-2.jpg\", \"assets/images/products/serum-essence/skin-cerave-3.jpg\", \"assets/images/products/serum-essence/skin-cerave-4.jpg\"]}', 0, 0),
(21, 4, 4, 7, 'Firming Energy Essence', 'https://www.cosdna.com/eng/cosmetic_9062398995.html', '6-in-1 liquid skin hero with a water-light feel helps visibly improve skin\'s firmness, brightness, tone, smoothness, dewiness and moisture barrier. Formulated with high concentrations of antioxidant-rich Fermented Jeju Soybean Extract and Oil.', 'All', 'Lifting & Firming, Age Prevention', 'Serum & Essence', 'InnisFree', 'Fermented Soybean', 0, 0, '39', '0', '{\"images\": [\"assets/images/products/serum-essence/firming-innisfree-1.jpg\", \"assets/images/products/serum-essence/firming-innisfree-2.jpg\", \"assets/images/products/serum-essence/firming-innisfree-3.jpg\", \"assets/images/products/serum-essence/firming-innisfree-4.jpg\", \"assets/images/products/serum-essence/firming-innisfree-5.jpg\", \"assets/images/products/serum-essence/firming-innisfree-6.jpg\"]}', 0, 0),
(22, 4, 3, 4, 'Glowy Makeup Serum', 'https://www.cosdna.com/eng/cosmetic_adc1443248.html', 'Get your glow on with a lightweight, hydrating serum and glass skin primer that keeps oil in check for visibly smoother skin and long-lasting makeup wear.', 'Normal, Dry', 'Dullness & Uneven Skin Tone', 'Serum & Essence', 'Laneige', 'Diamond Mineral Powder', 0, 0, '32', '0', '{\"images\": [\"assets/images/products/serum-essence/glowy-laneige-1.jpg\", \"assets/images/products/serum-essence/glowy-laneige-2.jpg\", \"assets/images/products/serum-essence/glowy-laneige-3.jpg\", \"assets/images/products/serum-essence/glowy-laneige-4.jpg\", \"assets/images/products/serum-essence/glowy-laneige-5.jpg\", \"assets/images/products/serum-essence/glowy-laneige-6.jpg\", \"assets/images/products/serum-essence/glowy-laneige-7.jpg\"]}', 0, 0),
(23, 4, 2, 6, 'Green Tea Eco Brightening Essence', 'https://www.cosdna.com/eng/cosmetic_8d2e337632.html', 'Green tea is the key ingredient in this hydrating and brightening essence. Green tea has long been used in health and wellness as well as skincare, as it is chock full of antioxidants which go to work to protect your skin.', 'Dry, Normal, Oily', 'Age Prevention, Pore Solutions', 'Serum & Essence', 'Peach & Lily', 'Allantoin', 0, 0, '21', '0', '{\"images\": [\"assets/images/products/serum-essence/green-peach_lily-1.jpg\", \"assets/images/products/serum-essence/green-peach_lily-2.jpg\", \"assets/images/products/serum-essence/green-peach_lily-3.jpg\"]}', 0, 0),
(24, 4, 1, 1, 'Active Hydration Serum', 'cosdna.com/eng/cosmetic_5999288967.html', 'Quench thirsty skin. Instantly boosts hydration levels by 200% + locks in moisture on the surface of the skin. Add to any Regimen for even better results.', 'Dry', 'Hydration', 'Serum & Essence', 'Rodan+Fields', 'Glycerin', 0, 0, '112', '0', '{\"images\": [\"assets/images/products/serum-essence/active-rodan+fields-1.jpg\", \"assets/images/products/serum-essence/active-rodan+fields-2.jpg\", \"assets/images/products/serum-essence/active-rodan+fields-3.jpg\", \"assets/images/products/serum-essence/active-rodan+fields-4.jpg\"]}', 0, 0),
(25, 4, 6, 6, 'Real Propolis Enriched Serum 48ml', '#', 'Nutrition & skin elasticity care serum with honey-like texture', 'All', 'Hydration, Age Prevention', 'Serum & Essence', 'Etude', 'Royal Jelly Protein', 0, 0, '36', '0', '{\"images\": [\"assets/images/products/serum-essence/real-etude-1.jpg\", \"assets/images/products/serum-essence/real-etude-2.jpg\", \"assets/images/products/serum-essence/real-etude-3.jpg\"]}', 0, 0),
(26, 4, 7, 4, '9 Solutions Serum', 'https://www.cosdna.com/eng/cosmetic_5e4b417201.html', 'Highly-concentrated serum formulated with Jeju Yeongjucho Mushroom that helps address common signs of aging.', 'Combination, Normal, Oily, Dry', 'Age Prevention, Dullness & Uneven Skin Tone', 'Serum & Essence', 'InnisFree', 'Yeongjucho Mushroom', 0, 0, '69', '0', '{\"images\": [\"assets/images/products/serum-essence/9-innisfree-1.jpg\", \"assets/images/products/serum-essence/9-innisfree-2.jpg\", \"assets/images/products/serum-essence/9-innisfree-3.jpg\"]}', 0, 0),
(27, 4, 5, 3, 'Clarifying Spot Serum', '#', 'A daily, non-stripping gel spot serum for acne-prone skin to help purify and smooth troubled complexions—without the flaking!', 'All', 'Troubled Skin', 'Serum & Essence', 'InnisFree', 'Bija Seed Oil', 0, 0, '18', '0', '{\"images\": [\"assets/images/products/serum-essence/clarifying-innisfree-1.jpg\", \"assets/images/products/serum-essence/clarifying-innisfree-2.jpg\", \"assets/images/products/serum-essence/clarifying-innisfree-3.jpg\", \"assets/images/products/serum-essence/clarifying-innisfree-4.jpg\", \"assets/images/products/serum-essence/clarifying-innisfree-5.jpg\", \"assets/images/products/serum-essence/clarifying-innisfree-6.jpg\", \"assets/images/products/serum-essence/clarifying-innisfree-7.jpg\"]}', 0, 0),
(28, 5, 9, 2, 'Cleanance Mattifying Emulsion', 'https://www.cosdna.com/eng/cosmetic_c3f4562352.html', 'Daily mattifying moisturizer provides 24-hour hydration with a powdery, matte finish. Makes an ideal mattifying primer.', 'Oily', 'Hydration, Nourishing, Pore Solutions', 'Moisturizer', 'Avene', 'Comedoclastin', 0, 0, '26', '0', '{\"images\": [\"assets/images/products/moisturizer/cleanance-avene-1.jpg\", \"assets/images/products/moisturizer/cleanance-avene-2.jpg\", \"assets/images/products/moisturizer/cleanance-avene-3.jpg\", \"assets/images/products/moisturizer/cleanance-avene-4.jpg\"]}', 0, 0),
(29, 5, 2, 1, 'PM Facial Moisturizing Lotion', 'https://www.cosdna.com/eng/cosmetic_4992437239.html', 'No matter what your skin type is—even if it\'s oily—your skin needs moisture around the clock. But it may need other things too—like soothing ingredients, softer texture, and help restoring its natural moisture barrier.', 'Normal, Oily', 'Hydration, Pore Solutions', 'Moisturizer', 'CeraVe', '3 essential ceramides', 0, 0, '16', '0', '{\"images\": [\"assets/images/products/moisturizer/pm-cerave-1.jpg\", \"assets/images/products/moisturizer/pm-cerave-2.jpg\", \"assets/images/products/moisturizer/pm-cerave-3.jpg\", \"assets/images/products/moisturizer/pm-cerave-4.jpg\"]}', 0, 0),
(30, 5, 7, 1, 'Soft Lip Balm Intensive Moisture', 'https://www.cosdna.com/eng/cosmetic_9c8d477610.html', 'Deeply moisturizing stick balm with Jeju Canola Honey to help soften and moisturize dry lips.', 'All', 'Hydration, Nourishing', 'Moisturizer', 'InnisFree', 'Canola Honey', 0, 0, '8', '0', '{\"images\": [\"assets/images/products/moisturizer/soft-innisfree-1.jpg\", \"assets/images/products/moisturizer/soft-innisfree-2.jpg\", \"assets/images/products/moisturizer/soft-innisfree-3.jpg\"]}', 0, 0),
(31, 5, 6, 1, 'Cream Skin Toner & Moisturizer', 'https://www.cosdna.com/eng/cosmetic_c980445737.html', 'A two-in-one formula that preps and softens like a toner and moisturizes like a cream for maximum hydration benefits in one simple step.', 'All', 'Hydration', 'Moisturizer', 'Laneige', 'White Leaf Tea Water', 0, 0, '33', '0', '{\"images\": [\"assets/images/products/moisturizer/cream-laneige-1.jpg\", \"assets/images/products/moisturizer/cream-laneige-2.jpg\", \"assets/images/products/moisturizer/cream-laneige-3.jpg\"]}', 0, 0),
(32, 5, 9, 6, 'Cellus White Moisture Cream', 'https://www.cosdna.com/eng/cosmetic_76fe386306.html', 'Healthy, lit-from-within dewy skin has never been easier to achieve. This lightweight cream absorbs quickly and helps to brighten a dull, lackluster complexion with the help of natural extracts.', 'Combination, Dry', 'Age Prevention, Sensitive Skin, Hydration', 'Moisturizer', 'Peach & Lily', 'Korean Wild Native Flower', 0, 0, '36', '0', '{\"images\": [\"assets/images/products/moisturizer/cellus-peach_lily-1.jpg\", \"assets/images/products/moisturizer/cellus-peach_lily-2.jpg\", \"assets/images/products/moisturizer/cellus-peach_lily-3.jpg\"]}', 0, 0),
(33, 5, 1, 1, 'Rodan + Fields Active Hydration Body Replenish', 'https://www.cosdna.com/eng/cosmetic_a94f393952.html', 'All-over hydration. Get younger-looking, younger-acting skin with our breakthrough body moisturizer that instantly + continuously hydrates.', 'Normal, Dry, Oily, Combination', 'Hydration', 'Moisturizer', 'Rodan+Fields', 'Glycerin', 0, 0, '66', '0', '{\"images\": [\"assets/images/products/moisturizer/active-rodan+fields-1.jpg\", \"assets/images/products/moisturizer/active-rodan+fields-2.jpg\", \"assets/images/products/moisturizer/active-rodan+fields-3.jpg\", \"assets/images/products/moisturizer/active-rodan+fields-4.jpg\", \"assets/images/products/moisturizer/active-rodan+fields-5.jpg\"]}', 0, 0),
(34, 5, 4, 1, 'Get Up & Go Cream', '#', 'Restore moisture and suppleness with this fast-absorbing, lightweight daily moisturiser. Bursting with antioxidant-rich Wheat Germ Oil and deliciously nourishing Shea Butter. Suitable for all skin types.', 'Sensitive, Combination', 'Hydration', 'Moisturizer', 'Herbal Essentials', 'Wheat Germ Oil & Shea Butter', 0, 0, '12', '0', '{\"images\": [\"assets/images/products/moisturizer/getup-herbalessentials-1.jpg\", \"assets/images/products/moisturizer/getup-herbalessentials-2.jpg\", \"assets/images/products/moisturizer/getup-herbalessentials-3.jpg\", \"assets/images/products/moisturizer/getup-herbalessentials-4.jpg\"]}', 0, 0),
(35, 5, 7, 1, 'Moistfull Collagen Cream', 'https://www.cosdna.com/eng/cosmetic_ddf0177761.html', 'The small particles of the Super CollagenTM water(HYDROLYZED COLLAGEN) in the Moistfull Cream makes skin full of firming moisture and feeling bouncy.', 'All', 'Hydration', 'Moisturizer', 'Etude', 'Lupinus Albus protein', 0, 0, '21', '0', '{\"images\": [\"assets/images/products/moisturizer/moistfull-etude-1.jpg\", \"assets/images/products/moisturizer/moistfull-etude-2.jpg\", \"assets/images/products/moisturizer/moistfull-etude-3.jpg\", \"assets/images/products/moisturizer/moistfull-etude-4.jpg\"]}', 0, 0),
(36, 6, 7, 2, 'Pore Clearing Clay Mask', 'http://www.cosdna.com/eng/cosmetic_8717494338.html', 'Creamy clay mask with the extraordinary absorbing powers of Jeju Volcanic Cluster.', 'Oily, Combination', 'Pore Solutions', 'Masks', 'InnisFree', 'Volcanic Clusters', 0, 0, '14', '0', '{\"images\": [\"assets/images/products/masks/pore-innisfree-1.jpg\", \"assets/images/products/masks/pore-innisfree-2.jpg\", \"assets/images/products/masks/pore-innisfree-3.jpg\", \"assets/images/products/masks/pore-innisfree-4.jpg\"]}', 0, 0),
(37, 6, 7, 1, 'Special Care Mask-Hand', 'http://www.cosdna.com/eng/cosmetic_cd0b162902.html', 'Pair of glove-like hand masks specially designed to hydrate and care for hands.', 'All', 'Hydration', 'Masks', 'InnisFree', 'Ionicera Flower', 0, 0, '4', '0', '{\"images\": [\"assets/images/products/masks/special-innisfree-1.jpg\", \"assets/images/products/masks/special-innisfree-2.jpg\", \"assets/images/products/masks/special-innisfree-3.jpg\", \"assets/images/products/masks/special-innisfree-4.jpg\", \"assets/images/products/masks/special-innisfree-5.jpg\"]}', 0, 0),
(38, 6, 9, 1, 'Hydrance Aqua-Gel', 'http://www.cosdna.com/eng/cosmetic_e1e9545900.html', 'All-in-one hydration powerhouse can be used as a daily moisturizer, overnight mask and along the eye contour. Fortify skin\'s natural moisturizing and protective barrier leaving skin intensely hydrated, dewy and smooth.', 'All', 'Hydration', 'Masks', 'Avene', 'Avene Thermal Spring Water', 0, 0, '36', '0', '{\"images\": [\"assets/images/products/masks/hydrance-avene-1.jpg\", \"assets/images/products/masks/hydrance-avene-2.jpg\", \"assets/images/products/masks/hydrance-avene-3.jpg\", \"assets/images/products/masks/hydrance-avene-4.jpg\", \"assets/images/products/masks/hydrance-avene-5.jpg\"]}', 0, 0),
(39, 6, 5, 2, 'Cleanance Mask Mask-Scrub', 'https://www.cosdna.com/eng/cosmetic_4077216701.html', 'A 2-in-1 mask for use alongside any Cleanance skincare (Cleanance Comedomed or Cleanance Mattifying Emulsion) – use once or twice a week. Formulated with white clay (Kaolin), it gently cleanses, absorbs excess oil and unclogs pores whilst respecting oily and blemish-prone skin.', 'Oily', 'Pore Solutions', 'Masks', 'Avene', 'White Clay', 0, 0, '13', '0', '{\"images\": [\"assets/images/products/masks/cleanance-avene-1.jpg\", \"assets/images/products/masks/cleanance-avene-2.jpg\", \"assets/images/products/masks/cleanance-avene-3.jpg\"]}', 0, 0),
(40, 6, 7, 1, 'Lavender Water Sleeping Mask', 'http://www.cosdna.com/eng/cosmetic_6347289713.html', 'Lavender-scented version of the cult-favorite Water Sleeping Mask that is powerfully effective for long-lasting hydration while you sleep.', 'Dry', 'Hydration', 'Masks', 'Laneige', 'Hydro Ionized Mineral Water', 0, 0, '25', '0', '{\"images\": [\"assets/images/products/masks/lavender-laneige-1.jpg\", \"assets/images/products/masks/lavender-laneige-2.jpg\", \"assets/images/products/masks/lavender-laneige-3.jpg\", \"assets/images/products/masks/lavender-laneige-4.jpg\", \"assets/images/products/masks/lavender-laneige-5.jpg\"]}', 0, 0),
(41, 6, 9, 6, 'Soothing & Brightening Mask', 'http://www.cosdna.com/eng/cosmetic_6581519567.html', 'This single mask is formulated with the extract of the sacred Lotus and fortified with natural botanicals, tackling dark spots and signs of aging while soothing skin so otherwise irritated skin is calm and clear.', 'Combination, Dry, Oily, Normal', 'Age Prevention, Hydration', 'Masks', 'Peach & Lily', 'Green Tea extract', 0, 0, '8', '0', '{\"images\": [\"assets/images/products/masks/soothing-peach_lily-1.jpg\", \"assets/images/products/masks/soothing-peach_lily-2.jpg\"]}', 0, 0),
(42, 6, 9, 2, 'UNBLEMISH Clarifying Mask', 'http://www.cosdna.com/eng/cosmetic_fa0c511828.html', 'Unmask clear skin. Our blemish-fighting mask instantly reduces excessive oil + shine and helps prevent new pimples from forming.', 'All', 'Pore Solutions', 'Masks', 'Rodan+Fields', 'Oat Bran extract', 0, 0, '60', '0', '{\"images\": [\"assets/images/products/masks/unblemish-rodan+fields-1.jpg\", \"assets/images/products/masks/unblemish-rodan+fields-2.jpg\", \"assets/images/products/masks/unblemish-rodan+fields-3.jpg\"]}', 0, 0),
(43, 6, 8, 1, 'Gentle Renewal Scrub with Sunflower Seed Oil & Kaolin', '#', 'This is a gentle and effective natural facial scrub containing natural exfoliants & oil-absorbing Kaolin clay to slough away dead skin, revealing a visibly fresh, smooth complexion.', 'Sensitive', 'Hydration', 'Masks', 'Herbal Essentials', 'Walnut Shell Powder', 0, 0, '12', '0', '{\"images\": [\"assets/images/products/masks/gentle-herbalessentials-1.jpg\", \"assets/images/products/masks/gentle-herbalessentials-2.jpg\", \"assets/images/products/masks/gentle-herbalessentials-3.jpg\", \"assets/images/products/masks/gentle-herbalessentials-4.jpg\"]}', 0, 0),
(44, 6, 7, 7, '0.2 Therapy Air Masks 10pcs -Snail', 'https://www.cosdna.com/eng/cosmetic_ed39423449.html', 'Soothes and firms the skin.', 'Sensitive', 'Lifting & Firming', 'Masks', 'Etude', 'Snail', 0, 0, '18', '0', '{\"images\": [\"assets/images/products/masks/air-etude-1.jpg\", \"assets/images/products/masks/air-etude-2.jpg\"]}', 0, 0);

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
