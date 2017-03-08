-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 08, 2017 at 04:13 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(200) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `name`) VALUES
(2, 'attendance_03_02_2017'),
(3, 'attendance_03_03_2017'),
(4, 'attendance_03_04_2017'),
(5, 'attendance_03_08_2017');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_03_02_2017`
--

CREATE TABLE `attendance_03_02_2017` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `dept` varchar(30) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_03_02_2017`
--

INSERT INTO `attendance_03_02_2017` (`id`, `name`, `level`, `phone`, `dept`, `unit`, `address`, `dob`, `time`) VALUES
(6, 'Mem idowu', 'hjkk', '987676', 'gjgjg', 'null', 'gjgj', 'jhgj', '11:21');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_03_03_2017`
--

CREATE TABLE `attendance_03_03_2017` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `dept` varchar(30) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_03_03_2017`
--

INSERT INTO `attendance_03_03_2017` (`id`, `name`, `level`, `phone`, `dept`, `unit`, `address`, `dob`, `time`) VALUES
(11, 'mem highdee', 'jlkjj', '89', 'hkhk', 'null', 'l', 'hkhk', '11:47'),
(13, 'Mem idowu', 'hjkk', '987676', 'gjgjg', 'null', 'gjgj', 'jhgj', '11:47');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_03_04_2017`
--

CREATE TABLE `attendance_03_04_2017` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `dept` varchar(30) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_03_04_2017`
--

INSERT INTO `attendance_03_04_2017` (`id`, `name`, `level`, `phone`, `dept`, `unit`, `address`, `dob`, `time`) VALUES
(3, 'OSO OLAYINKA', '100', '8142067461', 'ESC', 'welfare', 'Under G', '12-Sep', '12:48'),
(4, 'IRABOR CHRISTIANA', '100', '8146614657', 'PAC', 'media', 'King david villa', '5-Dec', '12:48'),
(7, 'ODUNMOSU AYOMIDE', '100', '7018967523', 'PAP', 'welfare', 'Under G', '7-Jul', '19:20'),
(8, 'ALLI OLUWATOSIN', '200L', '7038190983', 'PSG', 'welfare', 'Under G', '5-May', '19:20'),
(9, 'Mem idowu', 'hjkk', '987676', 'gjgjg', 'null', 'gjgj', 'jhgj', '19:20');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_03_08_2017`
--

CREATE TABLE `attendance_03_08_2017` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `dept` varchar(30) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `unit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `level`, `phone`, `dept`, `address`, `dob`, `unit`) VALUES
(8, 'Mem idowu', 'hjkk', '987676', 'gjgjg', 'gjgj', 'jhgj', NULL),
(9, 'mem highdee', 'jlkjj', '89', 'hkhk', 'l', 'hkhk', NULL),
(10, 'mem sola', 'lhkjkh', '7878', 'gjhgj', 'j', 'gjg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `name`, `level`, `phone`, `unit`, `dept`, `dob`, `address`) VALUES
(47, 'NAME', 'LEVEL', 'PHONE', 'UNIT', 'DEPT', 'DOB', 'ADDRESS'),
(48, 'POPOOLA FAITH', 'Fresher', '7069653353', 'Technical', 'ANB', '7-Sep', 'Under G'),
(49, 'ADEKUNLE BLESSING', '400', '8132080836', 'Evang', 'PAM', '11-Apr', 'Under G'),
(50, 'ODUNMOSU AYOMIDE', '100', '7018967523', 'welfare', 'PAP', '7-Jul', 'Under G'),
(51, 'ALLI OLUWATOSIN', '200L', '7038190983', 'welfare', 'PSG', '5-May', 'Under G'),
(52, 'AKANDE OIANIYI ABIOLA', '400L', '7062893439', 'Protocol', 'ANA', '27-Aug', 'Under G'),
(53, 'BAMIGBOYE OLUMIDE', '200', '8151384266', 'Logistics', 'PSG', '16-May', 'Manchester,under g'),
(54, 'ALADESIUN IDOWU ADEDAMOLA', '200', '07063716919', 'Academy,', 'CSE', 'july/22', 'JLJKHKHK\r\n'),
(55, 'AYODEJI BLESSING', 'Fresher', '8135773745', 'media', 'MRK', '26-May', 'Under G'),
(56, 'OSO OLAYINKA', '100', '8142067461', 'welfare', 'ESC', '12-Sep', 'Under G'),
(57, 'IRABOR CHRISTIANA', '100', '8146614657', 'media', 'PAC', '5-Dec', 'King david villa'),
(58, 'ADESIYAN AKINKUNMI OLAMIDE', '200', '8101232790', 'Choir', 'CHE', '17-Mar', 'Nottinham, under g'),
(59, 'OLONADE ABIODUN EMMANUEL', '100', '8183580261', 'Protocol', 'EEE', '25-Dec', 'Oke afin'),
(60, 'DIKE DANIEL', 'Fresher', '9037954117', 'Evang', 'ENV', '4-Jul', 'Under G');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_03_02_2017`
--
ALTER TABLE `attendance_03_02_2017`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_03_03_2017`
--
ALTER TABLE `attendance_03_03_2017`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_03_04_2017`
--
ALTER TABLE `attendance_03_04_2017`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_03_08_2017`
--
ALTER TABLE `attendance_03_08_2017`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `attendance_03_02_2017`
--
ALTER TABLE `attendance_03_02_2017`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `attendance_03_03_2017`
--
ALTER TABLE `attendance_03_03_2017`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `attendance_03_04_2017`
--
ALTER TABLE `attendance_03_04_2017`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `attendance_03_08_2017`
--
ALTER TABLE `attendance_03_08_2017`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
