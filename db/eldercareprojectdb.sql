-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 08:51 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eldercareprojectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adults_info`
--

CREATE TABLE `adults_info` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `age` varchar(3) NOT NULL,
  `nic` varchar(100) NOT NULL,
  `guardian_name` varchar(100) NOT NULL,
  `guardian_contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adults_info`
--

INSERT INTO `adults_info` (`id`, `first_name`, `last_name`, `age`, `nic`, `guardian_name`, `guardian_contact`, `address`) VALUES
(4, 'Siripala', 'siripaala', '75', '980922170v', 'kumara', '+94711090525', 'NO 146 / 3B,, Hadigama,, Piliyandala.'),
(5, 'nanalatha', 'kusumalathaa', '85', '980922570v', 'kumara', '+94716564597', 'NO 146 / 3B,, Hadigama,, Piliyandala.'),
(6, 'Nipuni', 'Biyanwila', '85', '990922170v', 'nanalatha', '+94716564597', 'NO 146 / 3B,'),
(10, 'ohiunocmoc', 'kn cjmoimsc', '56', '9768756437V', 'linosinompc', '+94711090525', 'NO 146 / 3B,, Hadigama,, Piliyandala.'),
(14, 'h hnkjk', 'kj skj kjsscs', '56', '3519819145v', 'kusumalathaa', '+94716564597', 'NO 146 / 3B,, Hadigama,, Piliyandala.'),
(17, 'bdfjdddd', 'akamsndhd', '15', '28626262v', 'kusumalathaa', '+94716564597', 'NO 146 / 3B,, Hadigama,, Piliyandala.');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `DID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` int(10) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `mbbsid` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `LID` int(11) NOT NULL,
  `doc_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`DID`, `Name`, `email`, `mobile`, `nic`, `mbbsid`, `address`, `LID`, `doc_status`) VALUES
(10, 'Nipuni Biyanwila', 'doctor@gmail.com', 2147483647, '980922170v', '101520', 'NO 146 / 3B,', 20, '0'),
(11, 'Nipuni Biyanwila', 'ishankadoc@gmail.com', 714253697, '971081888v', '1234', 'No 6.8B/2F/15, UHKDU, Boralesgamuwa', 21, '0'),
(12, 'Nipuni Biyanwila', 'malithdoc@gmail.com', 773456789, '971081777v', '23456', 'No 65, Wadduwa.', 22, '1'),
(13, 'Nipuni Biyanwila', 'chanadoc@gmail.com', 714253876, '998767543v', '6543', 'Piliyandala', 23, '1'),
(14, 'Nipuni Biyanwila', 'disnakadoc@gmail.com', 714245678, '971887634v', '4354563', 'Dote', 24, '1');

-- --------------------------------------------------------

--
-- Table structure for table `health_records`
--

CREATE TABLE `health_records` (
  `id` int(11) NOT NULL,
  `sugar_level` varchar(10) NOT NULL,
  `pressure_level` varchar(10) NOT NULL,
  `body_temp` varchar(10) NOT NULL,
  `BMI` char(200) NOT NULL,
  `input_date` date DEFAULT NULL,
  `record_status` varchar(10) DEFAULT NULL,
  `adult_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `health_records`
--

INSERT INTO `health_records` (`id`, `sugar_level`, `pressure_level`, `body_temp`, `BMI`, `input_date`, `record_status`, `adult_id`) VALUES
(1, '140', '140', '35', '23', '2021-08-26', '0', '971081783v'),
(2, '140', '140', '35', '35', '2021-08-26', '0', '981081786v'),
(5, '140', '200', '40', '30', '2021-08-26', '0', '991087852v'),
(6, '140', '140', '35', '25', '2021-08-26', '0', '980922170v'),
(7, '140', '140', '35', '24', '2021-08-26', '0', '980922570v'),
(9, '250', '250', '250', '29', '2021-08-26', '0', '990922170v'),
(10, '20', '20', '20', '20', '2021-08-25', '0', '981081786v'),
(11, '30', '30', '30', '30', '2021-08-25', '0', '991087852v'),
(17, '100', '80', '37', '25', '2021-08-26', '0', '981081786v'),
(18, '150', '80', '37', '25', '2021-08-26', '1', '971081783v'),
(19, '100', '80', '38', '25', '2021-08-26', '1', '981081786v'),
(20, '100', '80', '37', '25', '2021-08-26', '0', '981081786v'),
(21, '150', '80', '37', '25', '2021-08-26', '1', '981081786v'),
(22, '100', '80', '37', '25', '2021-08-26', '0', '971081783v'),
(23, '100', '80', '37', '25', '2021-08-26', '0', '971081783v'),
(24, '100', '80', '38', '25', '2021-08-26', '1', '971081783v'),
(25, '100', '80', '38', '25', '2021-08-26', '1', '971081783v'),
(27, '100', '80', '38', '25', '2021-08-26', '1', '971081783v'),
(28, '100', '80', '37', '25', '2021-08-26', '0', '981081786v'),
(32, '100', '80', '37', '25', '2021-08-26', '0', '991087852v'),
(33, '100', '80', '38', '25', '2021-08-26', '1', '990922170v'),
(34, '100', '80', '38', '25', '2021-08-26', '1', '990922170v'),
(35, '100', '80', '37', '25', '2021-08-26', '0', '971081783v'),
(36, '100', '46', '37', '25', '2021-08-26', '0', '980922170v'),
(37, '150', '80', '45', '25', '2021-08-26', '1', '991087852v'),
(38, '120', '80', '37', '25', '2021-08-26', '0', '981081786v'),
(45, '100', '80', '37', '67', '2021-08-26', '0', '971081783v'),
(46, '180', '80', '38', '67', '2021-08-26', '1', '991087852v'),
(47, '100', '80', '45', '25', '2021-08-26', '1', '990922170v'),
(48, '150', '80', '37', '25', '2021-08-26', '1', '971081783v'),
(49, '180', '80', '37', '45', '2021-08-26', '1', '980922170v'),
(50, '200', '80', '37', '45', '2021-08-26', '1', '980922170v'),
(51, '180', '80', '37', '25', '2021-08-26', '1', '981081786v'),
(52, '250', '1', '250', '250', '2021-08-26', '1', '971081783v'),
(53, '1', '1', '1', '1', '2021-08-26', '0', '971081783v'),
(54, '', '', '', '', '2021-08-26', '0', 'null'),
(55, '500', '500', '500', '500', '2021-08-26', '1', '971081783v'),
(56, '100', '101', '35', '20', '2021-08-26', '1', '971081783v'),
(57, '140', '140', '40', '40', '2021-08-26', NULL, NULL),
(58, '200', '200', '250', '250', '2021-08-26', '0', ''),
(59, '200', '200', '200', '200', '2021-08-26', '1', ''),
(60, '200', '200', '200', '200', '2021-08-26', '1', ''),
(61, '140', '140', '140', '140', '2021-08-26', '1', '28626262v'),
(62, '500', '500', '500', '400', '2021-08-26', '1', '981081786v'),
(63, '500', '500', '500', '400', '2021-08-26', '1', '981081786v'),
(64, '500', '500', '500', '250', '2021-08-26', '1', '981081786v'),
(65, '50', '50', '40', '30', '2021-08-26', '1', '981081786v'),
(66, '250', '250', '250', '400', '2021-08-26', '1', '991087852v'),
(67, '200', '200', '200', '200', '2021-08-26', '1', '80808080v'),
(68, '50', '30', '40', '30', '2021-08-26', '1', '981081786v');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `LID` int(11) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`LID`, `Username`, `Password`, `Type`) VALUES
(19, 'admin@gmail.com', '$2y$10$/nU0v.9bfadsE7BgLDIBVuRelFamC2ZR44GrwLncCS0w9ud.v8qsG', 0),
(20, 'doctor@gmail.com', '$2y$10$fbQHjuWkT8agCD9TwQi7leCoy.LnEzn5Efih9jltzZRUGj5wqhfTC', 1),
(21, 'nipunibiyanwila1@gmail.com', '$2y$10$.CTf.g2zEgy1Vk6D6.A2qOkA0Z7xzdTLfg.fBUcCPKuB9kWAK6p9W', 1),
(22, 'nipunibiyanwila2@gmail.com', '$2y$10$TyD6qH/CukJGlOVK98uele0X4za5nXC5FHU7ANA1aOgOuZdlAS4Gy', 1),
(23, 'nipunibiyanwila3@gmail.com', '$2y$10$Cl5/03kN8LFwk0FjJyJx6Oz1QJQA.yzToNsKLFYWPddcCoTTI.8X6', 1),
(24, 'nipunibiyanwila4@gmail.com', '$2y$10$qjOwS0OsIGtxuhj9FwadROlFbzd1eERsV5tirzmiEZbLn3cd/0ANW', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adults_info`
--
ALTER TABLE `adults_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nic` (`nic`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`DID`);

--
-- Indexes for table `health_records`
--
ALTER TABLE `health_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adults_info`
--
ALTER TABLE `adults_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `DID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `health_records`
--
ALTER TABLE `health_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
