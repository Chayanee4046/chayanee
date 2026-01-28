-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2025 at 10:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4046db`
--
CREATE DATABASE IF NOT EXISTS `4046db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `4046db`;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `a_id` int(6) NOT NULL,
  `a_JobPosition` varchar(255) NOT NULL,
  `a_prefix` varchar(255) NOT NULL,
  `a_firstName` varchar(255) NOT NULL,
  `a_lastName` varchar(255) NOT NULL,
  `a_birthDate` varchar(255) NOT NULL,
  `a_phoneNumber` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_educationLevel` varchar(255) NOT NULL,
  `a_institutionName` varchar(255) NOT NULL,
  `a_faculty` varchar(255) NOT NULL,
  `a_gpa` float NOT NULL,
  `a_specialSkills` varchar(255) NOT NULL,
  `a_workExperience` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`a_id`, `a_JobPosition`, `a_prefix`, `a_firstName`, `a_lastName`, `a_birthDate`, `a_phoneNumber`, `a_email`, `a_educationLevel`, `a_institutionName`, `a_faculty`, `a_gpa`, `a_specialSkills`, `a_workExperience`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', 0, '', ''),
(2, 'Software_Engineer', 'นางสาว', 'ชญาณี ', 'รุ่งนภากานต์', '2025-12-26', '0836150305', '66010914046@mu.ac.th', 'ปริญญาตรี', 'มมส', 'คอมพิวเตออร์ธุรกิจ', 3.04, 'เขียนโค้ด', '2 ปี');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `r_id` int(6) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_phone` varchar(255) NOT NULL,
  `r_height` varchar(255) NOT NULL,
  `r_address` varchar(255) NOT NULL,
  `r_birthday` varchar(255) NOT NULL,
  `r_color` varchar(255) NOT NULL,
  `r_major` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`r_id`, `r_name`, `r_phone`, `r_height`, `r_address`, `r_birthday`, `r_color`, `r_major`) VALUES
(1, 'ชญาณี รุ่งนภากานต์', '', '', '', '', '', ''),
(2, 'ชญาณี รุ่งนภากานต์', '', '', '', '', '', ''),
(3, 'ชญาณี กรุตนิด', '', '', '', '', '', ''),
(4, 'ชญานี รุ่งนภากานต์', '', '', '', '', '', ''),
(5, 'ชญานี รุ่งนภากานต์', '', '', '', '', '', ''),
(6, 'ตังเม ชญาณี', '0906067274', '', '', '', '', ''),
(7, 'ปรียานันท์ อิอิ', '05678901234', '', '', '', '', ''),
(8, 'ปรียานันท์ อิอิ', '05678901234', '', '', '', '', ''),
(9, 'ชญานี รุ่งนภากานต์', '05678901234', '', '', '', '', ''),
(10, 'ชญานี รุ่งนภากานต์', '0906067274', '', '', '', '', ''),
(11, 'ชญาณี รุ่งนภากานต์', '0836150305', '165', 'msuu', '2004-07-09', '#69e889', 'คอมพิวเตอร์ธุรกิจ'),
(12, 'ชญาณี รุ่งนภากานต์', '0836150305', '165', 'msuu', '2004-07-09', '#3cb8d7', 'คอมพิวเตอร์ธุรกิจ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `a_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `r_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
