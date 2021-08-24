-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2021 at 06:47 PM
-- Server version: 10.1.44-MariaDB-0+deb9u1
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event-booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `ebooking`
--

CREATE TABLE `ebooking` (
  `participation_id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_mail` varchar(255) NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `participation_fee` decimal(10,2) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ebooking`
--

INSERT INTO `ebooking` (`participation_id`, `employee_name`, `employee_mail`, `event_id`, `event_name`, `participation_fee`, `event_date`, `event_time`) VALUES
(1, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', '0.00', '2019-09-04', '08:00:00'),
(2, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 2, 'International PHP Conference', '1485.99', '2019-10-21', '10:00:00'),
(3, 'Leandro Bußmann', 'leandro.bussmann@no-reply.rexx-systems.com', 2, 'International PHP Conference', '657.50', '2019-10-21', '10:00:00'),
(4, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', '0.00', '2019-09-04', '06:00:00'),
(5, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', '0.00', '2019-09-04', '06:00:00'),
(6, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 2, 'International PHP Conference', '657.50', '2019-10-21', '08:00:00'),
(7, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 3, 'code.talks', '474.81', '2019-10-24', '08:00:00'),
(8, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 3, 'code.talks', '534.31', '2019-10-24', '06:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ebooking`
--
ALTER TABLE `ebooking`
  ADD PRIMARY KEY (`participation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ebooking`
--
ALTER TABLE `ebooking`
  MODIFY `participation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
