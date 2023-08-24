-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 05:39 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iminsured_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_message`
--

CREATE TABLE `admin_message` (
  `admin_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `request_id` text NOT NULL,
  `requestReason` text NOT NULL,
  `datetime` datetime NOT NULL,
  `message` text NOT NULL,
  `type` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_message`
--

INSERT INTO `admin_message` (`admin_id`, `client_id`, `request_id`, `requestReason`, `datetime`, `message`, `type`, `status`) VALUES
(1, 2, '1', 'Hospital income benefit', '2021-09-10 21:01:46', 'asdasdasdasfgdfgd', 'Request', 'read'),
(2, 2, '', 'N/A', '2021-10-20 20:59:33', 'qqweqw', 'Message', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `beneficiary_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `age` text NOT NULL,
  `relationship` text NOT NULL,
  `contact_num` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`beneficiary_id`, `client_id`, `name`, `age`, `relationship`, `contact_num`) VALUES
(1, 2, 'asdasdasd', '20', 'asdasdasdas', '09121212122'),
(2, 2, 'asdasdasd', '34', 'asdasdasd', '09121212122'),
(3, 2, 'asdasdasd', '33', 'asdasdasd', '09121212122'),
(4, 3, 'sadasdasd', '34', 'sadasdasd', '09357272125'),
(5, 3, 'asdasdsa', '33', 'adasdasd', '09357272125'),
(6, 3, 'adasdasd', '32', 'asdasdsad', '09357272125'),
(7, 4, 'asdasdsa', '29', 'asdasdas', '09357272125'),
(8, 4, 'asdasdsa', '34', 'asdasdsa', '09357272125'),
(9, 4, 'asdasdsa', '33', 'asdasdsa', '09357272125'),
(10, 5, 'asdasdasdsa', '33', 'asdasdasdsa', '09434343434'),
(11, 5, 'asdasdasdsa', '33', 'asdasdasdsa', '09434343434'),
(12, 5, 'asdasdasdsa', '31', 'asdasdasdsa', '09434343434'),
(13, 6, 'asdasdasdsadsa', '19', 'asdasdasdsadsa', '09357272124'),
(14, 6, 'asdasdasdsadsa', '33', 'asdasdasdsadsa', '09357272124'),
(15, 6, 'asdasdasdsadsa', '18', 'asdasdasdsadsa', '09357272124');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `plan_type` text NOT NULL,
  `payment_mode` text NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `age` text NOT NULL,
  `birthday` text NOT NULL,
  `place_of_birth` text NOT NULL,
  `gender` text NOT NULL,
  `height` text NOT NULL,
  `weight` text NOT NULL,
  `occupation` text NOT NULL,
  `civil_status` text NOT NULL,
  `contact_number` text NOT NULL,
  `email_address` text NOT NULL,
  `residential_address` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_registered` datetime NOT NULL,
  `status` text NOT NULL,
  `notif_status` text NOT NULL,
  `payment_status` text NOT NULL,
  `due_status` text NOT NULL,
  `update_status` text NOT NULL,
  `photo` text NOT NULL,
  `user_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `plan_type`, `payment_mode`, `fname`, `mname`, `lname`, `age`, `birthday`, `place_of_birth`, `gender`, `height`, `weight`, `occupation`, `civil_status`, `contact_number`, `email_address`, `residential_address`, `username`, `password`, `date_registered`, `status`, `notif_status`, `payment_status`, `due_status`, `update_status`, `photo`, `user_type`) VALUES
(1, '', '', 'MIS', 'Perpetual', 'Admin', '22', '1999-03-15', 'asdasdasdasd', 'Male', '', '', '', '', '09357272125', 'misperpetual@gmail.com', 'sadasdasdasd', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00 00:00:00', '', '', '', '', '', '', 'admin'),
(2, 'Plan 1', 'Monthly', 'Rhen Heart', '', 'Gatera', '22', '1999-03-15', 'Taguig City, Metro Manila', 'Male', '165', '65', 'Student', 'Single', '+639357272125', 'rhenheartgolis@gmail.com', 'Purok 5, Pinayagan Norte, TUbigon Bohol', 'reinheart_marl', 'e2be6152d9b1d16765a62b74a821c8fc', '2021-08-26 13:53:33', 'active', 'unread', 'unfinished', 'due', 'updated', 'images (4).jpeg', 'client'),
(3, 'Plan 3', 'Semi-Annual', 'sadasdas', '', 'asdasda', '34', '2021-09-10', 'asdsadasdasd', 'Male', '123', '123', 'asdasda', 'Single', '+639357272125', 'asasdasd@gmail.com', 'asdasdasdasd', 'newacc', '80228804a380482e66e256f340e9ede8', '2021-09-10 20:42:02', 'active', 'unread', 'unfinished', 'undue', 'updated', '', 'client'),
(4, 'Plan 3', 'Annual', 'asdasdas', 'asdasdasd', 'asdasdasd', '26', '2021-09-10', 'asdasdasda', 'Male', '123', '123', 'asdasdasd', 'Single', '+639655660067', 'gardson112@gmail.com', 'asdasdasdasd', 'paymentnotify', 'cc2c47e52bb76ab37cdd056de4cc0faf', '2021-09-10 20:48:41', 'active', 'read', 'unfinished', 'undue', 'updated', '', 'client'),
(5, 'Plan 1', 'Monthly', 'Rhen Heart', '', 'Gatera', '36', '2021-09-27', 'asdasdasd', 'Female', '123', '123', 'asdsad', 'Single', '+639357272125', 'sadsadasd@gmail.com', 'asdasdasdsa', 'prototype', 'c18462a35a7af69a3eea94f84b7d6a46', '2021-09-27 14:45:16', 'active', 'unread', 'finished', 'undue', 'updated', '', 'client'),
(6, 'Plan 3', 'Semi-Annual', 'asdasdasdsadsa', 'asdasdasdsadsa', 'asdasdasdsadsa', '20', '2022-03-13', 'asasdasdasdsadsa', 'Female', '123', '123', 'asdasdasdsadsa', 'Single', '+639357272125', 'dsjjsdj@gmail.com', 'asdasdasd', 'yondaime', '827ccb0eea8a706c4c34a16891f84e7b', '2022-03-13 20:24:27', 'active', 'unread', 'unfinished', 'undue', 'empty', '', 'client');

-- --------------------------------------------------------

--
-- Table structure for table `clients_references`
--

CREATE TABLE `clients_references` (
  `reference_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `contact_num` text NOT NULL,
  `relation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients_references`
--

INSERT INTO `clients_references` (`reference_id`, `client_id`, `name`, `address`, `contact_num`, `relation`) VALUES
(1, 2, 'asdasdasd', 'asdasdasd', '09121212122', 'asdasdasd'),
(2, 2, 'asdasdasd', 'asdasdasd', '09121212122', 'asdasdasd'),
(3, 2, 'asdasdasd', 'asdasdasd', '09121212122', 'asdasdasd'),
(4, 3, 'asdadasd', 'asdasdas', '09357272125', 'asdasdasd'),
(5, 3, 'asdasdas', 'asdasdas', '09357272125', 'asdasdasd'),
(6, 3, 'asdasd', 'adasdas', '09357272125', 'asdasdas'),
(7, 4, 'asdasdsa', 'asdasdsa', '09357272125', 'asdasdsa'),
(8, 4, 'asdasdsa', 'asdasdsa', '09357272125', 'asdasdsa'),
(9, 4, 'asdasdsa', 'asdasdsa', '09357272125', 'asdasdsa'),
(10, 5, 'asdasdasdsa', 'asdasdasdsa', '09434343434', 'asdasdasdsa'),
(11, 5, 'asdasdasdsa', 'asdasdasdsa', '09434343434', 'asdasdasdsa'),
(12, 5, 'asdasdasdsa', 'asdasdasdsa', '09434343434', 'asdasdasdsa'),
(13, 6, 'asdasdasdsadsa', 'asdasdasdsadsa', '09357272124', 'asdasdasdsadsa'),
(14, 6, 'asdasdasdsadsa', 'asdasdasdsadsa', '09357272124', 'asdasdasdsadsa'),
(15, 6, 'asdasdasdsadsa', 'asdasdasdsadsa', '09357272124', 'asdasdasdsadsa');

-- --------------------------------------------------------

--
-- Table structure for table `clients_request`
--

CREATE TABLE `clients_request` (
  `request_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `plan_type` text NOT NULL,
  `payment_mode` text NOT NULL,
  `fullName` text NOT NULL,
  `contact_number` text NOT NULL,
  `residential_address` text NOT NULL,
  `contractPrice` float(11,2) NOT NULL,
  `payment` float(11,2) NOT NULL,
  `balance` float(11,2) NOT NULL,
  `first_payment` text NOT NULL,
  `last_payment` text NOT NULL,
  `requestReason` text NOT NULL,
  `date` datetime NOT NULL,
  `date_granted` datetime NOT NULL,
  `status` text NOT NULL,
  `request_status` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients_request`
--

INSERT INTO `clients_request` (`request_id`, `client_id`, `plan_type`, `payment_mode`, `fullName`, `contact_number`, `residential_address`, `contractPrice`, `payment`, `balance`, `first_payment`, `last_payment`, `requestReason`, `date`, `date_granted`, `status`, `request_status`, `type`) VALUES
(1, 2, 'Plan 1', 'Monthly', 'Rhen Heart Gatera Gatera', '+639357272125', 'Purok 5, Pinayagan Norte, TUbigon Bohol', 15000.00, 1000.00, 14000.00, 'August 10, 2021 / 5:40 pm', 'August 7, 2021 / 7:52 pm', 'Hospital income benefit', '2021-09-10 21:00:40', '2021-09-10 21:01:45', 'read', 'rejected', 'request'),
(2, 2, 'Plan 1', 'Monthly', 'Rhen Heart Gatera Gatera', '+639357272125', 'Purok 5, Pinayagan Norte, TUbigon Bohol', 15000.00, 1000.00, 14000.00, 'August 10, 2021 / 5:40 pm', 'August 7, 2021 / 7:52 pm', 'Damage to properties due to fire or lightning', '2021-09-10 21:02:54', '2021-09-10 21:03:19', 'read', 'granted', 'request'),
(3, 2, 'Plan 1', 'Monthly', 'Rhen Heart Gatera Gatera', '+639357272125', 'Purok 5, Pinayagan Norte, TUbigon Bohol', 15000.00, 1000.00, 14000.00, 'August 10, 2021 / 5:40 pm', 'August 7, 2021 / 7:52 pm', 'Damage to properties due to fire or lightning', '2021-09-27 15:11:08', '0000-00-00 00:00:00', 'unread', 'ungranted', 'request'),
(4, 2, 'Plan 1', 'Monthly', 'Rhen Heart Gatera Gatera', '+639357272125', 'Purok 5, Pinayagan Norte, TUbigon Bohol', 15000.00, 1000.00, 14000.00, 'August 10, 2021 / 5:40 pm', 'August 7, 2021 / 7:52 pm', 'Death due to accident (1 month observation period)', '2021-09-27 15:11:14', '2021-09-27 15:14:48', 'read', 'granted', 'request');

-- --------------------------------------------------------

--
-- Table structure for table `client_activation`
--

CREATE TABLE `client_activation` (
  `client_activationID` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `plan_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_activation`
--

INSERT INTO `client_activation` (`client_activationID`, `client_id`, `plan_type`) VALUES
(1, 2, 'Plan 1'),
(2, 3, 'Plan 2'),
(3, 4, 'Plan 3'),
(4, 5, 'Plan 1'),
(5, 6, 'Plan 3');

-- --------------------------------------------------------

--
-- Table structure for table `client_message`
--

CREATE TABLE `client_message` (
  `message_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `contact_number` text NOT NULL,
  `message` text NOT NULL,
  `type` text NOT NULL,
  `status` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_message`
--

INSERT INTO `client_message` (`message_id`, `client_id`, `full_name`, `contact_number`, `message`, `type`, `status`, `datetime`) VALUES
(1, 2, 'Rhen Heart Gatera Gatera', '+639357272125', 'asdasdasdas', 'message', 'read', '2021-09-27 15:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `contact_number` text NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `fullname`, `email`, `contact_number`, `message`, `status`, `date`) VALUES
(1, 'Rhen Heart Gatera', 'asdasd@gmail.com', '09357272125', 'asdasda', 'read', '2021-09-27 15:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `next_payment`
--

CREATE TABLE `next_payment` (
  `nextPayment_id` int(11) NOT NULL,
  `client_id` text NOT NULL,
  `nextPayment_date` datetime NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `next_payment`
--

INSERT INTO `next_payment` (`nextPayment_id`, `client_id`, `nextPayment_date`, `status`) VALUES
(1, '2', '2021-08-09 11:56:29', 'due'),
(2, '2', '2021-08-09 11:56:29', 'due'),
(3, '2', '2021-08-09 11:56:29', 'due'),
(4, '2', '2021-08-09 11:56:29', 'due'),
(5, '2', '2021-09-09 11:56:29', 'due'),
(6, '2', '2021-09-09 11:56:29', 'due'),
(7, '2', '2021-09-09 11:56:29', 'due'),
(8, '2', '2021-09-09 11:56:29', 'due'),
(9, '2', '2021-09-09 11:56:29', 'due'),
(10, '2', '2021-09-09 11:56:29', 'due'),
(11, '2', '2021-09-09 11:56:29', 'due'),
(12, '2', '2021-09-09 11:56:29', 'due'),
(13, '2', '2021-09-09 11:56:29', 'due'),
(14, '2', '2021-09-09 11:56:29', 'due'),
(15, '2', '2021-09-09 11:56:29', 'due'),
(16, '2', '2021-09-09 11:56:29', 'due'),
(17, '2', '2021-08-07 19:52:58', 'due'),
(18, '2', '2021-08-07 19:52:58', 'due'),
(19, '2', '2021-08-07 19:52:58', 'due'),
(20, '2', '2021-08-07 19:52:58', 'due'),
(21, '2', '2021-09-07 19:52:58', 'due'),
(22, '2', '2021-09-07 19:52:58', 'due'),
(23, '2', '2021-09-07 19:52:58', 'due'),
(24, '2', '2021-09-07 19:52:58', 'due'),
(25, '2', '2021-09-07 19:52:58', 'due'),
(26, '2', '2021-09-07 19:52:58', 'due'),
(27, '2', '2021-09-07 19:52:58', 'due'),
(28, '2', '2021-09-07 19:52:58', 'due'),
(29, '2', '2021-09-07 19:52:58', 'due'),
(30, '2', '2021-09-07 19:52:58', 'due'),
(31, '2', '2021-09-07 19:52:58', 'due'),
(32, '2', '2021-09-07 19:52:58', 'due'),
(33, '2', '2021-09-07 19:52:58', 'due'),
(34, '2', '2021-09-07 19:52:58', 'due'),
(35, '2', '2021-09-07 19:52:58', 'due'),
(36, '2', '2021-09-07 19:52:58', 'due'),
(37, '2', '2021-09-07 19:52:58', 'due'),
(38, '2', '2021-09-07 19:52:58', 'due'),
(39, '2', '2021-09-07 19:52:58', 'due'),
(40, '2', '2021-09-07 19:52:58', 'due'),
(41, '2', '2021-09-07 19:52:58', 'due'),
(42, '2', '2021-09-07 19:52:58', 'due'),
(43, '2', '2021-09-07 19:52:58', 'due'),
(44, '2', '2021-09-07 19:52:58', 'due'),
(45, '2', '2021-09-07 19:52:58', 'due'),
(46, '2', '2021-09-07 19:52:58', 'due'),
(47, '2', '2021-09-07 19:52:58', 'due'),
(48, '2', '2021-09-07 19:52:58', 'due'),
(49, '2', '2021-09-07 19:52:58', 'due'),
(50, '2', '2021-08-07 19:52:58', 'due'),
(51, '2', '2021-08-07 19:52:58', 'due'),
(52, '2', '2021-08-07 19:52:58', 'due'),
(53, '2', '2021-08-07 19:52:58', 'due'),
(54, '2', '2021-08-07 19:52:58', 'due'),
(55, '2', '2021-08-07 19:52:58', 'due'),
(56, '2', '2021-08-07 19:52:58', 'due'),
(57, '2', '2021-08-07 19:52:58', 'due'),
(58, '2', '2021-08-07 19:52:58', 'due'),
(59, '2', '2021-08-07 19:52:58', 'due'),
(60, '2', '2021-08-07 19:52:58', 'due'),
(61, '2', '2021-08-07 19:52:58', 'due'),
(62, '2', '2021-08-07 19:52:58', 'due'),
(63, '2', '2021-08-07 19:52:58', 'due'),
(64, '2', '2021-08-07 19:52:58', 'due'),
(65, '2', '2021-08-07 19:52:58', 'due'),
(66, '2', '2021-08-07 19:52:58', 'due'),
(67, '2', '2021-10-27 16:07:46', 'due'),
(68, '2', '2021-10-27 16:07:46', 'due'),
(69, '2', '2021-10-27 16:07:46', 'due'),
(70, '2', '2021-10-27 16:07:46', 'due'),
(71, '2', '2021-10-27 16:07:46', 'due'),
(72, '2', '2021-10-27 16:07:46', 'due'),
(73, '2', '2021-10-27 16:07:46', 'due'),
(74, '2', '2021-10-27 16:07:46', 'due'),
(75, '2', '2021-10-27 16:07:46', 'due'),
(76, '2', '2021-10-27 16:07:46', 'due'),
(77, '2', '2021-10-27 16:07:46', 'due'),
(78, '2', '2022-04-11 14:07:34', 'due'),
(79, '2', '2022-04-11 14:07:34', 'due'),
(80, '2', '2022-04-11 14:07:34', 'due'),
(81, '2', '2022-04-11 14:07:34', 'due'),
(82, '2', '2022-04-11 14:07:34', 'due'),
(83, '2', '2022-04-11 14:07:34', 'due'),
(84, '2', '2022-04-11 14:07:34', 'due');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `amount` float(10,2) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `client_id`, `date`, `amount`, `status`) VALUES
(1, 1, '2021-08-26 00:00:00', 0.00, 'undue'),
(2, 2, '2021-08-10 17:40:59', 250.00, 'due'),
(3, 2, '2021-06-07 11:56:29', 250.00, 'due'),
(4, 2, '2021-09-10 19:49:49', 250.00, 'due'),
(5, 2, '2021-07-07 19:52:58', 250.00, 'due'),
(6, 4, '2021-07-08 20:51:15', 5238.00, 'undue'),
(7, 4, '2021-09-10 21:03:46', 5238.00, 'undue'),
(8, 5, '2021-09-27 14:58:59', 15000.00, 'undue'),
(9, 4, '2021-09-27 15:58:33', 5238.00, 'undue'),
(10, 2, '2021-09-27 16:07:46', 250.00, 'due'),
(11, 4, '2021-09-27 16:15:05', 5238.00, 'undue'),
(12, 2, '2022-03-11 14:07:34', 250.00, 'due');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_message`
--
ALTER TABLE `admin_message`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD PRIMARY KEY (`beneficiary_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `clients_references`
--
ALTER TABLE `clients_references`
  ADD PRIMARY KEY (`reference_id`);

--
-- Indexes for table `clients_request`
--
ALTER TABLE `clients_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `client_activation`
--
ALTER TABLE `client_activation`
  ADD PRIMARY KEY (`client_activationID`);

--
-- Indexes for table `client_message`
--
ALTER TABLE `client_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `next_payment`
--
ALTER TABLE `next_payment`
  ADD PRIMARY KEY (`nextPayment_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_message`
--
ALTER TABLE `admin_message`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `beneficiary`
--
ALTER TABLE `beneficiary`
  MODIFY `beneficiary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `clients_references`
--
ALTER TABLE `clients_references`
  MODIFY `reference_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `clients_request`
--
ALTER TABLE `clients_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `client_activation`
--
ALTER TABLE `client_activation`
  MODIFY `client_activationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `client_message`
--
ALTER TABLE `client_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `next_payment`
--
ALTER TABLE `next_payment`
  MODIFY `nextPayment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
