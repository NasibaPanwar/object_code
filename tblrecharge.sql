-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 07:50 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblrecharge`
--

CREATE TABLE `tblrecharge` (
  `id` int(11) NOT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `amount` decimal(10,0) NOT NULL,
  `status` enum('Pending','Success','Failure') NOT NULL,
  `recharge_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblrecharge`
--

INSERT INTO `tblrecharge` (`id`, `mobile`, `company`, `amount`, `status`, `recharge_date`) VALUES
(1, '9876543210', 'Airtel', '1000', 'Pending', '2020-12-21'),
(2, '9876543210', 'Bsnl', '1500', 'Pending', '2020-12-21'),
(3, '9876543210', 'Vodafone', '1500', 'Pending', '2020-12-21'),
(4, '9876543210', 'Jio', '1500', 'Pending', '2020-12-21'),
(5, '9876543210', 'Airtel', '8000', 'Success', '2020-12-22'),
(6, '9876543210', 'Bsnl', '8500', 'Success', '2020-12-22'),
(7, '9876543210', 'Vodafone', '9000', 'Success', '2020-12-22'),
(8, '9876543210', 'Jio', '9500', 'Success', '2020-12-22'),
(9, '9876543210', 'Jio', '4500', 'Failure', '2020-12-18'),
(10, '9876543210', 'Vodafone', '9500', 'Failure', '2020-12-22'),
(11, '9876543210', 'Bsnl', '5500', 'Failure', '2020-12-22'),
(12, '9876543210', 'Airtel', '5500', 'Failure', '2020-12-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblrecharge`
--
ALTER TABLE `tblrecharge`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblrecharge`
--
ALTER TABLE `tblrecharge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
