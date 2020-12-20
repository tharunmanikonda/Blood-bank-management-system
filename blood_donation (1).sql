-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 11:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank`
--

CREATE TABLE `blood_bank` (
  `B_ID` int(11) NOT NULL,
  `BLOOD_ID` int(11) DEFAULT NULL,
  `UNITS` int(11) NOT NULL,
  `ADDRESS` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `BLOOD_ID` int(11) NOT NULL,
  `TYPE_OF_BLOOD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `D_ID` int(11) NOT NULL,
  `NAME` varchar(30) DEFAULT NULL,
  `PHONENO` bigint(11) NOT NULL,
  `EMAIL` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `doctor`
--
DELIMITER $$
CREATE TRIGGER `capital1` BEFORE INSERT ON `doctor` FOR EACH ROW set new.NAME =UPPER(NEW.NAME)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_signin`
--

CREATE TABLE `doctor_signin` (
  `ID` int(11) NOT NULL,
  `D_ID` int(11) DEFAULT NULL,
  `USERNAME` varchar(40) DEFAULT NULL,
  `PASSWORD` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doner`
--

CREATE TABLE `doner` (
  `D_ID` int(11) NOT NULL,
  `D_NAME` varchar(50) DEFAULT NULL,
  `D_AGE` int(11) NOT NULL,
  `D_PHONENO` bigint(11) NOT NULL,
  `D_EMAIL` varchar(50) DEFAULT NULL,
  `D_ADDRESS` varchar(100) DEFAULT NULL,
  `D_AMOUNT` int(11) DEFAULT NULL,
  `blood_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `doner`
--
DELIMITER $$
CREATE TRIGGER `capital` BEFORE INSERT ON `doner` FOR EACH ROW set new.D_NAME =UPPER(NEW.D_NAME)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `doner_signin`
--

CREATE TABLE `doner_signin` (
  `id` int(11) NOT NULL,
  `D_ID` int(11) NOT NULL,
  `USERNAME` varchar(40) DEFAULT NULL,
  `PASSWORD` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `R_ID` int(11) NOT NULL,
  `BLOOD_ID` int(11) NOT NULL,
  `R_NAME` varchar(50) NOT NULL,
  `R_PHONENO` int(11) NOT NULL,
  `R_UNITS` int(11) NOT NULL,
  `R_ADDRESS` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sold`
--

CREATE TABLE `sold` (
  `ID` int(11) NOT NULL,
  `R_ID` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `B_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD PRIMARY KEY (`B_ID`),
  ADD KEY `BLOOD_ID` (`BLOOD_ID`);

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`BLOOD_ID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`D_ID`);

--
-- Indexes for table `doctor_signin`
--
ALTER TABLE `doctor_signin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `D_ID` (`D_ID`);

--
-- Indexes for table `doner`
--
ALTER TABLE `doner`
  ADD PRIMARY KEY (`D_ID`),
  ADD KEY `blood_id` (`blood_id`);

--
-- Indexes for table `doner_signin`
--
ALTER TABLE `doner_signin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `D_ID` (`D_ID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`R_ID`),
  ADD KEY `BLOOD_ID` (`BLOOD_ID`);

--
-- Indexes for table `sold`
--
ALTER TABLE `sold`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `R_ID` (`R_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_bank`
--
ALTER TABLE `blood_bank`
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `BLOOD_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `D_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_signin`
--
ALTER TABLE `doctor_signin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doner`
--
ALTER TABLE `doner`
  MODIFY `D_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doner_signin`
--
ALTER TABLE `doner_signin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `R_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sold`
--
ALTER TABLE `sold`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD CONSTRAINT `blood_bank_ibfk_1` FOREIGN KEY (`BLOOD_ID`) REFERENCES `blood_group` (`BLOOD_ID`);

--
-- Constraints for table `doctor_signin`
--
ALTER TABLE `doctor_signin`
  ADD CONSTRAINT `doctor_signin_ibfk_1` FOREIGN KEY (`D_ID`) REFERENCES `doctor` (`D_ID`);

--
-- Constraints for table `doner`
--
ALTER TABLE `doner`
  ADD CONSTRAINT `doner_ibfk_1` FOREIGN KEY (`blood_id`) REFERENCES `blood_group` (`BLOOD_ID`);

--
-- Constraints for table `doner_signin`
--
ALTER TABLE `doner_signin`
  ADD CONSTRAINT `doner_signin_ibfk_1` FOREIGN KEY (`D_ID`) REFERENCES `doner` (`D_ID`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`BLOOD_ID`) REFERENCES `blood_group` (`BLOOD_ID`);

--
-- Constraints for table `sold`
--
ALTER TABLE `sold`
  ADD CONSTRAINT `sold_ibfk_1` FOREIGN KEY (`R_ID`) REFERENCES `request` (`R_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
