-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 02:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_room`
--

CREATE TABLE `add_room` (
  `id` int(6) NOT NULL,
  `roomtype` varchar(15) NOT NULL,
  `numroom` int(6) NOT NULL,
  `numbed` int(6) NOT NULL,
  `bedtype` varchar(15) NOT NULL,
  `facility` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_room`
--

INSERT INTO `add_room` (`id`, `roomtype`, `numroom`, `numbed`, `bedtype`, `facility`, `price`) VALUES
(1, 'Duplex', 4, 2, 'single', 'TV, WIFI, Balcony, AC', '2000'),
(2, 'Family', 7, 4, 'double', 'Sofa, TV, WIFI, Balcony, AC, swimming pool', '6000');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `email`, `password`) VALUES
(1, '', 'admin', '', 'admin'),
(3, 'abc sharma', 'abcd', 'abc@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(5) NOT NULL,
  `category` varchar(20) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `category`, `checkin`, `checkout`, `name`, `phone`, `status`) VALUES
(7, 'Duplex', '2020-06-14', '2020-06-26', 'ad', '987456', 'True'),
(8, 'Duplex', '2020-06-14', '2020-06-19', 'a', '9874563214', 'True'),
(9, 'Duplex', '2020-06-14', '2020-06-19', 'a', '9874563214', 'True'),
(10, 'Family', '2020-06-21', '2020-06-23', 'admin1', '965822', 'True');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_room`
--
ALTER TABLE `add_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_room`
--
ALTER TABLE `add_room`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
