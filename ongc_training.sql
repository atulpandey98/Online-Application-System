-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2019 at 12:27 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ongc_training`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_details`
--

CREATE TABLE `academic_details` (
  `ID` int(10) NOT NULL,
  `INSTITUTE` varchar(200) NOT NULL,
  `COURSE` varchar(100) NOT NULL,
  `SEMESTER` varchar(50) NOT NULL,
  `CGPA` varchar(50) NOT NULL,
  `PERCENTAGE(10+2)` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `details_of_trainee`
--

CREATE TABLE `details_of_trainee` (
  `ID` int(10) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `CATEGORY` varchar(10) NOT NULL,
  `ADDRESS` varchar(200) NOT NULL,
  `MOBILE` varchar(10) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `PNAME` varchar(200) NOT NULL,
  `POCCUPATION` varchar(200) NOT NULL,
  `DESIGNATION` varchar(200) DEFAULT NULL,
  `CPF` varchar(50) DEFAULT NULL,
  `SECTION` varchar(200) DEFAULT NULL,
  `LOCATION` varchar(200) DEFAULT NULL,
  `PMOBILE` varchar(10) DEFAULT NULL,
  `PTELEPHONE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details_of_trainee`
--

INSERT INTO `details_of_trainee` (`ID`, `NAME`, `DOB`, `GENDER`, `CATEGORY`, `ADDRESS`, `MOBILE`, `EMAIL`, `PNAME`, `POCCUPATION`, `DESIGNATION`, `CPF`, `SECTION`, `LOCATION`, `PMOBILE`, `PTELEPHONE`) VALUES
(23, 'Atul Pandey', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents_and_guardian_name`
--

CREATE TABLE `documents_and_guardian_name` (
  `ID` int(10) NOT NULL,
  `PHOTO` varchar(100) NOT NULL,
  `TRAINING_LETTER` varchar(100) NOT NULL,
  `CGPA_SHEET` varchar(100) NOT NULL,
  `INTER_MARKSHEET` varchar(100) NOT NULL,
  `CATEGORY_CERTIFICATE` varchar(100) NOT NULL,
  `GUARDIAN_NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_details`
--
ALTER TABLE `academic_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `details_of_trainee`
--
ALTER TABLE `details_of_trainee`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `documents_and_guardian_name`
--
ALTER TABLE `documents_and_guardian_name`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_details`
--
ALTER TABLE `academic_details`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `details_of_trainee`
--
ALTER TABLE `details_of_trainee`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `documents_and_guardian_name`
--
ALTER TABLE `documents_and_guardian_name`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
