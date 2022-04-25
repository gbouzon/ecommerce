-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 04:50 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapplication`
--

-- --------------------------------------------------------

--
-- Table structure for table `addressapi`
--

CREATE TABLE `addressapi` (
  `postal` varchar(10) NOT NULL,
  `result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addressapi`
--

INSERT INTO `addressapi` (`postal`, `result`) VALUES
('H4G', '{\"post code\": \"H4G\", \"country\": \"Canada\", \"country abbreviation\": \"CA\", \"places\": [{\"place name\": \"Verdun North\", \"longitude\": \"-73.5798\", \"state\": \"Quebec\", \"state abbreviation\": \"QC\", \"latitude\": \"45.4644\"}]}'),
('H4L', '{\"post code\": \"H4L\", \"country\": \"Canada\", \"country abbreviation\": \"CA\", \"places\": [{\"place name\": \"Saint-Laurent Inner Northeast\", \"longitude\": \"-73.6974\", \"state\": \"Quebec\", \"state abbreviation\": \"QC\", \"latitude\": \"45.5269\"}]}');

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `animal_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `picture` varchar(50) NOT NULL DEFAULT 'blank.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animal_id`, `client_id`, `name`, `dob`, `picture`) VALUES
(1, 1, 'red dog', '1972-02-01', 'blank.jpg'),
(10, 1, 'doggo', '2021-10-18', '6213e5225c4f7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `first_name`, `last_name`, `notes`, `phone`) VALUES
(1, 'Giuliana', 'Bouzon', '1234567', '123-456-1234');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(63) NOT NULL,
  `secret_key` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `secret_key`) VALUES
(2, 'tarzan', '$2y$10$NSbpHn1uYycF80txl67TVe9CjPI1ScW0CSMk.CEOlsbx2oWIafQVG', 'BJNTPD7OUJH6E53Y'),
(3, 'gbouzon', '$2y$10$agCeMS/9Ye.qB.n8s4M13.e3fpPfr1TY3/9o4ykmGisKt55h05MbG', 'EQQ4EIPZUMCWIFJ5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addressapi`
--
ALTER TABLE `addressapi`
  ADD PRIMARY KEY (`postal`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `animal_to_client` (`client_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_to_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
