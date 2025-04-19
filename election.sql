-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2025 at 08:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `election`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `date`, `time_start`, `time_end`) VALUES
(1, 'admin', '$2y$10$At.EmgqJjqG36SvnpESqbuK3ijn/lijtS5xq219MxNuwm1NM90d7i', '2025-12-31', '00:00:00', '23:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `number` int(11) NOT NULL,
  `std_name` varchar(55) NOT NULL,
  `std_code` varchar(55) NOT NULL,
  `std_img` varchar(55) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `point` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`number`, `std_name`, `std_code`, `std_img`, `slogan`, `point`) VALUES
(1, 'นายวัชรพล พึ่งฤทธิ', '127', '1127.png', 'พื้นที่แสดง คำขวัญ คำอธิบายสั้นๆ', 0),
(2, 'นางสาวกัญญา พานทอง', '128', '2128.png', 'Lorem ipsum dolor sit amet consectetur adipisicing.', 0),
(3, 'นายอิทธิพล ออมสิน', '125', '3125.png', 'Lorem ipsum dolor sit amet consectetur adipisicing.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` int(11) NOT NULL,
  `std_name` varchar(55) NOT NULL,
  `std_code` varchar(55) NOT NULL,
  `id_card` varchar(55) NOT NULL,
  `vote` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=student, 1=candidate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `std_name`, `std_code`, `id_card`, `vote`, `status`) VALUES
(1, 'นายธีรภัทร สุขสำอางค์', '011', '011 ', NULL, 0),
(2, 'นายภัศกร กันภัย', '024', '024', NULL, 0),
(3, 'นายวินทกร สุวนิทิ', '034', '034', NULL, 0),
(4, 'นายก้องไกร วงศ์มอญ', '123', '123', NULL, 0),
(5, 'นายพิททินัย ชัยนเรศ', '124', '124', NULL, 0),
(6, 'นายอิทธิพล ออมสิน', '125', '125', NULL, 1),
(7, 'นายธีรยุทธ ปาแก้ว', '126', '126', NULL, 0),
(8, 'นายวัชรพล พึ่งฤทธิ', '127', '127', NULL, 1),
(9, 'นางสาวกัญญา พานทอง', '128', '128', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
