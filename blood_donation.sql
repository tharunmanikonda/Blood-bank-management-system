-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 02:23 PM
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

--
-- Dumping data for table `blood_bank`
--

INSERT INTO `blood_bank` (`B_ID`, `BLOOD_ID`, `UNITS`, `ADDRESS`) VALUES
(1, 1, 5000, 'New Balaji Colony'),
(4, 1, 21, 'New Balaji Colony'),
(5, 1, 21, 'New Balaji Colony');

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `BLOOD_ID` int(11) NOT NULL,
  `TYPE_OF_BLOOD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`BLOOD_ID`, `TYPE_OF_BLOOD`) VALUES
(1, 'A POSITIVE (A+)'),
(6, 'A NEGATIVE (A-)'),
(7, 'B POSITIVE (B+)'),
(8, 'B NEGATIVE (B-)'),
(9, 'AB POSITIVE (AB+)'),
(10, 'AB NGATIVE (AB-)'),
(11, 'O POSITIVE (O+)'),
(12, 'O NEGATIVE (O-)');

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
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`D_ID`, `NAME`, `PHONENO`, `EMAIL`, `address`) VALUES
(12, 'Tharun Manikonda', 938480401, 'tharunmanikonda885@gmail.com', 'New Balaji Colony'),
(13, 'Tharun Manikonda', 938480401, 'tharunmanikonda885@gmail.com', 'New Balaji Colony'),
(14, 'as', 0, '', ''),
(15, ' 122', 0, 'qww@12', '22');

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

--
-- Dumping data for table `doctor_signin`
--

INSERT INTO `doctor_signin` (`ID`, `D_ID`, `USERNAME`, `PASSWORD`) VALUES
(8, 12, 'Tharun1234', 'Tharun1234'),
(9, 12, 'Tharun1234', 'Tharun1234'),
(10, 14, 'ss', ''),
(11, 15, 'qww', '222');

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
-- Dumping data for table `doner`
--

INSERT INTO `doner` (`D_ID`, `D_NAME`, `D_AGE`, `D_PHONENO`, `D_EMAIL`, `D_ADDRESS`, `D_AMOUNT`, `blood_id`) VALUES
(28, 'Tharun Manikonda122', 11, 11, 'tharunmanikonda885@gmail.com', 'New Balaji Colony', 1222, 12),
(31, 'Tharun Manikonda', 18, 938480401, 'tharunmanikonda885@gmail.com', 'New Balaji Colony', 1222, 1),
(32, 'Tharun Manikonda', 18, 938480401, 'tharunmanikonda885@gmail.com', 'New Balaji Colony', 1222, 1),
(33, 'Tharun Manikonda', 18, 938480401, 'tharunmanikonda885@gmail.com', 'New Balaji Colony', 1222, 7),
(34, 'Tharun Manikonda', 18, 938480401, 'tharunmanikonda885@gmail.com', 'New Balaji Colony', 1222, 7),
(35, 'Tharun Manikonda', 18, 938480401, 'tharunmanikonda885@gmail.com', 'New Balaji Colony', 1222, 7);

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

--
-- Dumping data for table `doner_signin`
--

INSERT INTO `doner_signin` (`id`, `D_ID`, `USERNAME`, `PASSWORD`) VALUES
(2, 28, '12123', '12345678'),
(7, 31, 'Tharun1234', '122233311'),
(8, 31, 'Tharun1234', '123456789'),
(9, 31, 'Tharun1234', '123456781');

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

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`R_ID`, `BLOOD_ID`, `R_NAME`, `R_PHONENO`, `R_UNITS`, `R_ADDRESS`) VALUES
(1, 7, 'Tharun Manikonda', 938480401, 21, 'New Balaji Colony'),
(6, 8, 'Tharun Manikonda', 938480401, 441, 'New Balaji Colony'),
(7, 1, '', 0, 0, ''),
(8, 7, 'asaa', 123213, 211, 'New Balaji Colony'),
(9, 1, '', 0, 0, '');

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
-- Dumping data for table `sold`
--

INSERT INTO `sold` (`ID`, `R_ID`, `Name`, `B_ID`) VALUES
(5, 8, 'asaa', 7),
(6, 1, 'Tharun Manikonda', 7),
(7, 6, 'Tharun Manikonda', 8),
(8, 7, '', 1),
(9, 1, 'Tharun Manikonda', 7),
(10, 6, 'Tharun Manikonda', 8),
(11, 1, 'Tharun Manikonda', 7);

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
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `BLOOD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `D_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `doctor_signin`
--
ALTER TABLE `doctor_signin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doner`
--
ALTER TABLE `doner`
  MODIFY `D_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `doner_signin`
--
ALTER TABLE `doner_signin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `R_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sold`
--
ALTER TABLE `sold`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
