-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2021 at 11:24 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PDM_Bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMER`
--

CREATE TABLE `CUSTOMER` (
  `custid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mobno` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cur_bal` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CUSTOMER`
--

INSERT INTO `CUSTOMER` (`custid`, `fname`, `lname`, `mobno`, `email`, `cur_bal`) VALUES
(1000, 'Ramesh', 'Sharma', '9543198345', 'rs@gmail.com', '20000.00'),
(1001, 'Rajani', 'Shaikh', '9943175345', 'rajanis@gmail.com', '40000.00'),
(1002, 'Anjali', 'Pawar', '9943175565', 'anjalipawar@gmail.com', '1000.00'),
(1003, 'Rahul', 'Pawar', '9442165565', 'rahulpawar@gmail.com', '10000.00'),
(1004, 'Avinash', 'Sunder', '9942165455', 'asunder@gmail.com ', '3000.00'),
(1005, 'Parul', 'Gill', '9642145495', 'parulg1@gmail.com', '7000.00'),
(1006, 'Mahi', 'Mehra', '9746148493', 'mahim@gmail.com', '5000.00'),
(1007, 'Geeta', 'Dhoni', '9786138493', 'dhoni07@gmail.com', '50000.00'),
(1008, 'Shankar', 'Nair', '9885638483', ' nairs01@gmail.com', '6000.00'),
(1009, 'Vinayak', 'Patil', '9685638563', 'vip01@gmail.com', '66500.00');

-- --------------------------------------------------------

--
-- Table structure for table `TRANSACTION`
--

CREATE TABLE `TRANSACTION` (
  `transid` int(11) NOT NULL,
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `amount` decimal(7,2) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `TRANSACTION`
--

INSERT INTO `TRANSACTION` (`transid`, `sender`, `receiver`, `amount`, `time`) VALUES
(1000, 'Ramesh', 'Rajani', '1000.00', '2021-07-22 13:30:54'),
(1001, 'Anjali', 'Rahul', '100.00', '2021-07-22 13:38:24'),
(1002, 'Rahul', 'Anjali', '100.00', '2021-07-22 13:39:17'),
(1003, 'Vinayak', 'Shankar', '500.00', '2021-07-22 13:41:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  ADD PRIMARY KEY (`custid`);

--
-- Indexes for table `TRANSACTION`
--
ALTER TABLE `TRANSACTION`
  ADD PRIMARY KEY (`transid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `TRANSACTION`
--
ALTER TABLE `TRANSACTION`
  MODIFY `transid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
