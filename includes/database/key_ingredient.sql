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
(1, 'Hyaluronic Acid', 'Hyaluronic acid is a sugar molecule that occurs naturally in the skin and it helps to bind water to collagen, trapping it in the skin, so that it appears plumper, dewier, and more hydrated.', 'assets/images/others/key-all.png'),
(2, 'Niacinamide', 'Niacinamide is a water-soluble vitamin that works with the natural substances in your skin to help visibly minimise enlarged pores, tighten lax pores, improve uneven skin tone, and soften fine lines and wrinkles, diminish dullness, and strengthen a weakened surface.', 'assets/images/others/key-all.png'),
(3, 'Vitamin E', 'Vitamin E is a fat-soluble vitamin that acts as an antioxidant, helping protect cells from damage throughout your body. It\'s found in our sebum (skin oil), which creates a natural barrier to keep moisture in your skin.', 'assets/images/others/key-all.png'),
(4, 'Antioxidants', 'Antioxidants are substances that help protect the skin\'s surface from oxidative damage caused by free radicals and environmental aggressors like UV and pollution. It\'s often found in skincare product formulas because of its powerful anti-ageing benefits.', 'assets/images/others/key-all.png'),
(5, 'Salicylic Acid', 'Salicylic acid is an FDA approved skin care ingredient used for the topical treatment of acne, and it\'s the only beta hydroxy acid (BHA) used in skin care products. Perfect for oily skin, it’s best known for its ability to deep clean excess oil out of pores and reduce oil production moving forward.', 'assets/images/others/key-all.png'),
(6, 'Amino Acids', 'Amino acids are essential components to maintaining the appearance of healthy skin. They serve as the building blocks for proteins such as collagen, which help to give skin its supple and smooth texture.', 'assets/images/others/key-all.png'),
(7, 'Butylene Glycol', 'Butylene glycol is a conditioning agent, it adds a layer of softness or improved texture to your skin. They\'re also called moisturizers or, in the case of butylene glycol, humectants. As a humectant, butylene glycol helps keep skin moisturized, hydrated, and looking its youngest!', 'assets/images/others/key-all.png'),
(8, 'Citric Acid', 'Citric Acid acts primarily as an exfoliant and an antioxidant. It is an AHA (Alpha Hydroxy Acid) and can be used in exfoliating formulations to help remove dead skin cells and dirt to reveal fresh, softer, smoother skin.', 'assets/images/others/key-all.png'),
(9, 'Glycerin', 'Glycerin is a humectant, a type of moisturizing agent that pulls water into the outer layer of your skin from deeper levels of your skin and the air.', 'assets/images/others/key-all.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
