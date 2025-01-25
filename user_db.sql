-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2025 at 07:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `car_name`, `price`, `category`, `image`) VALUES
(3, 'BMW X3', '70.80', 'SUV', 'car (1).jpg'),
(4, 'BMW M440', '159.99', 'Coupe', 'car (2).jpg'),
(5, 'Tesla Model 3', '58.74', 'Electric Vehicle', 'car (6).jpg'),
(6, 'Tesla Model 1', '210', 'Electric Vehicle', 'car (3).jpg'),
(7, 'Toyota ', '30', 'Coupe', 'car (4).jpg'),
(8, 'BMW X7', '150', 'SUV', 'car (9).jpg'),
(9, 'audi', '20', 'Coupe', '9pCIGdt.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `id` int(11) NOT NULL,
  `house_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`id`, `house_name`, `price`, `category`, `image`) VALUES
(1, 'Nijum Villa', '459', 'villa', 'home-decor-5187c3b1b3fc4b4d520000b9-vivienda-m2-monovolume-architecture-design-villa-moritzing-07-architecture-designs.webp'),
(2, 'Golden Horizon', '900', 'bungalow', 'R.jpg'),
(3, 'Studio Apartment', '199', 'studio apartment', 'R (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `id` int(11) NOT NULL,
  `laptop_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`id`, `laptop_name`, `price`, `category`, `image`) VALUES
(1, 'Asus TUF Gaming A15 FA506NFR Ryzen 7 7435HS RTX 2050 4GB Graphics 15.6\" FHD Gaming Laptop', '15', 'asus', '12-FX506_L-scaled-e1578407976730.webp'),
(2, 'Apple MacBook Air 15 inch M3 Chip (2024) Liquid Retina Display 8GB RAM 256GB SSD Midnight #MRYU3LL/A', '25', 'apple', 'macbookair-og-202402.jpg'),
(3, 'Lenovo Yoga 7 2-in-1 14AHP9 Ryzen 7 8840HS AI Integrated 14\" Touch Laptop', '20', 'lenovo', '71sdmlc7zwl._sl1500_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'renter'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'saki', 'mrmash420@gmail.com', '202cb962ac59075b964b07152d234b70', 'owner'),
(2, 'Sakivhai', 'mrmash42@gmail.com', '202cb962ac59075b964b07152d234b70', 'renter'),
(4, 'tanvir', 'tanvir@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'renter'),
(5, 'siam', 'siamahmed12@gmail.com', '202cb962ac59075b964b07152d234b70', 'renter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
