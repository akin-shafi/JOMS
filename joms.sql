-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 05:20 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `hashed_password` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `court_id` int(11) NOT NULL,
  `court_division` varchar(30) NOT NULL,
  `court_type` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `hashed_password`, `email`, `phone`, `court_id`, `court_division`, `court_type`, `level`, `created_by`, `created_on`, `deleted`) VALUES
(1, 'IT', 'Officer', '$2y$10$nWMQdwn774yXFB/ljLotm.CApFlXPs/ZliyOXlkSlSlezwP.DdMdC', 'it@gmail.com', '08012345678', 1, '1', 1, 10, 1, '2020-02-17 13:36:41', 0),
(2, 'Adegbile', 'Alaganla', '$2y$10$il0rw1JD2DaStaSwid1NX.RmvB6xDZTuyFgJyYRsU4rN9UyV72.Lu', 'cjudge@gmail.com', '08098290445', 1, '1', 1, 1, 1, '2020-02-17 14:34:44', 0),
(3, 'Agunlejika', 'Akinmadueke', '$2y$10$8OOad4q8kN8UPFbr1f2ac.QgCbKxLMFw/pfaXu1BLvFm1IhBvYWuG', 'badminjudge@gmail.com', '08012345678', 1, '2', 1, 2, 1, '2020-02-17 02:59:16', 0),
(4, 'Bakare', 'Pastor', '$2y$10$T1n/4MlX2KBKXHSj2xHVKeOk8ZhgNxDM9welmZHH.wKFZ6FhqU31u', 'ladminjudge@gmail.com', '08076345683', 1, '1', 1, 2, 1, '2020-02-17 03:30:16', 0),
(5, 'Registrar', 'Folorunsho', '$2y$10$JQVDkyjZM6/4N46jkjPoLOybo3MZNm88K1zWHyiV4N3OaGjmksIFu', 'cashier@gmail.com', '09012345678', 1, '1', 1, 5, 1, '2020-02-18 00:52:57', 0),
(6, 'Alafialojulo', 'Agunbiaro', '$2y$10$mp95Djws3TILLU0PCKmh6etIl0YNmH9zTyFHsP1QbgUa.Xs5MsApq', 'judge@gmail.com', '09012345678', 1, '1', 1, 3, 1, '2020-02-18 03:46:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `case_name` varchar(50) DEFAULT NULL,
  `submitted_on` datetime DEFAULT NULL,
  `type_of_matter` varchar(50) DEFAULT NULL,
  `case_description` varchar(255) DEFAULT NULL,
  `assigned_by` int(11) DEFAULT NULL,
  `case_number` varchar(50) DEFAULT NULL,
  `assigned_to` varchar(50) DEFAULT NULL,
  `date_assigned` datetime DEFAULT NULL,
  `last_hearing` datetime DEFAULT NULL,
  `next_hearing` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `court_type` varchar(50) DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL,
  `court_room` varchar(50) DEFAULT NULL,
  `uploads` varchar(100) DEFAULT NULL,
  `evidence` varchar(100) DEFAULT NULL,
  `assigned` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `clientcat` int(11) NOT NULL,
  `firm_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hashed_password` varchar(60) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `call_no` varchar(255) NOT NULL,
  `cac_reg_no` varchar(255) NOT NULL,
  `tin_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `clientcat`, `firm_name`, `first_name`, `last_name`, `email`, `hashed_password`, `phone`, `call_no`, `cac_reg_no`, `tin_number`, `address`, `created_on`, `deleted`) VALUES
(1, 0, '', 'Barrister', 'Alakuko', 'lawyer@gmail.com', '$2y$10$bNDh77gkYOIrOkxg/yt2NuM6SDdshW/88eYzs90I2t/p3TnK3AO2S', '08012345678', '20201', '', '', 'St. John, Agunbiaro street, Kosoro, Lagos', '2020-02-18 00:47:19', 0),
(2, 0, '', 'ibrahim', 'oladigbo', 'ibrodegree@gmail.com', '$2y$10$.XvBsnspKqyOgDjdRG6UV.VRl0jtgt31OHJ8Z/q5EsfnVPyGuQWYa', '08160142939', '12345', '', '', '21 akosile close, festac town, amuwo odofin local govt.', '2020-02-25 01:25:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `court_case`
--

CREATE TABLE `court_case` (
  `id` int(11) NOT NULL,
  `court_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT 'For Judge assign and unassigned',
  `case_progress` int(11) DEFAULT NULL,
  `approval` int(11) DEFAULT '0' COMMENT 'For cashier approval',
  `court_type` varchar(255) NOT NULL,
  `court_division` varchar(255) NOT NULL,
  `court_matter` varchar(255) NOT NULL,
  `judge_incharge_id` int(11) NOT NULL,
  `court_case_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_adjourned` date NOT NULL,
  `comments` text NOT NULL,
  `document` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `assigned_to_judge_on` timestamp NULL DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `assigned_by` int(11) DEFAULT NULL,
  `color` varchar(50) NOT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `court_case`
--

INSERT INTO `court_case` (`id`, `court_id`, `client_id`, `status`, `case_progress`, `approval`, `court_type`, `court_division`, `court_matter`, `judge_incharge_id`, `court_case_name`, `description`, `date_adjourned`, `comments`, `document`, `created_on`, `assigned_to_judge_on`, `end`, `assigned_by`, `color`, `deleted`) VALUES
(1, 2, 1, 1, 4, 1, '', '1', '2', 6, 'Criminal matter', 'This is a criminal matter', '2020-03-14', 'Ad', 'accounting-basics-explanation.pdf', '2020-03-05 14:19:26', '2020-02-21 14:37:50', '2020-02-20 10:24:21', 4, '#40E0D0', 0),
(2, 1, 2, 0, NULL, 0, '', '1', '7', 0, 'Carrot vs tarrot', 'assault of judicial officer', '0000-00-00', '', '01.pdf', '2020-02-25 02:04:15', '0000-00-00 00:00:00', NULL, 0, '', 0),
(3, 1, 1, 0, NULL, 0, '', '1', '2', 0, 'Criminal case', 'Isues', '0000-00-00', '', '08.pdf', '2020-02-28 00:24:26', '0000-00-00 00:00:00', NULL, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `court_type`
--

CREATE TABLE `court_type` (
  `id` int(11) NOT NULL,
  `court_id` varchar(255) NOT NULL,
  `court_division` varchar(255) NOT NULL,
  `court_name` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `court_type`
--

INSERT INTO `court_type` (`id`, `court_id`, `court_division`, `court_name`, `created_on`, `deleted`) VALUES
(1, '1', '1', 'Lagos Island Court 1', '2020-01-09 00:54:35', 0),
(2, '1', '1', 'Lagos Island Court 2', '2020-01-09 00:54:42', 0),
(3, '1', '2', 'Badagry Court 1', '2020-01-15 05:33:50', 0),
(4, '1', '3', 'Ikeja Court 1', '2020-01-15 05:34:50', 0),
(5, '1', '2', 'Badagry Court 2', '2020-01-15 05:37:29', 0),
(6, '2', '3', 'IkejaM Court 1', '2020-01-16 10:24:20', 0),
(10, '1', '3', 'Ikeja Court 2', '2020-01-16 02:30:30', 0),
(11, '1', '2', 'Badagry Court 3', '2020-01-16 02:33:36', 0),
(12, '1', '3', 'Court 1', '2020-01-28 04:09:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `non_judicial_officers`
--

CREATE TABLE `non_judicial_officers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `hashed_password` varchar(255) DEFAULT NULL,
  `administrative_level` varchar(20) DEFAULT NULL,
  `oracle_no` varchar(20) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `court_id` int(11) DEFAULT NULL,
  `court_division` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `non_judicial_officers`
--

INSERT INTO `non_judicial_officers` (`id`, `first_name`, `last_name`, `email`, `phone`, `hashed_password`, `administrative_level`, `oracle_no`, `department`, `court_id`, `court_division`, `created_by`, `created_at`, `deleted`) VALUES
(1, 'Super', 'Admin', 'super@gmail.com', '08098290445', '$2y$10$nWMQdwn774yXFB/ljLotm.CApFlXPs/ZliyOXlkSlSlezwP.DdMdC', '1', '123456', 1, 1, 1, 1, '2020-02-17 01:13:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `trans_no` varchar(50) DEFAULT NULL,
  `payment_purpose` varchar(50) DEFAULT NULL,
  `payment_mode` varchar(50) DEFAULT NULL,
  `subscriber_id` int(11) DEFAULT NULL,
  `receipt_no` varchar(50) DEFAULT NULL,
  `approval` int(11) NOT NULL,
  `doc_name` varchar(100) DEFAULT NULL,
  `doc_type` varchar(50) DEFAULT NULL,
  `approve_by` int(11) DEFAULT NULL,
  `approve_date` datetime DEFAULT NULL,
  `sealed` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `case_id`, `trans_no`, `payment_purpose`, `payment_mode`, `subscriber_id`, `receipt_no`, `approval`, `doc_name`, `doc_type`, `approve_by`, `approve_date`, `sealed`, `created_by`, `created_at`, `deleted`) VALUES
(1, 1, '100158', 'Criminal Matter', '2', 0, 'REF-100198', 1, '', '', 5, '2020-02-21 15:16:27', 0, 0, '2020-02-21 03:16:06', ''),
(2, 2, '100256', 'Carrot vs tarrot', '2', 0, '', 0, '', '', 0, '0000-00-00 00:00:00', 0, 0, '2020-02-25 03:04:15', ''),
(3, 3, '100316', 'Criminal case', '2', 0, '', 0, '', '', 0, '0000-00-00 00:00:00', 0, 0, '2020-02-28 01:24:26', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`court_type`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `court_case`
--
ALTER TABLE `court_case`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `court_type`
--
ALTER TABLE `court_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_judicial_officers`
--
ALTER TABLE `non_judicial_officers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `court_case`
--
ALTER TABLE `court_case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `court_type`
--
ALTER TABLE `court_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `non_judicial_officers`
--
ALTER TABLE `non_judicial_officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
