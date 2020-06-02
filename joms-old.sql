-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 05:03 PM
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
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `hashed_password`, `email`, `phone`, `court_id`, `court_division`, `court_type`, `level`, `created_on`, `deleted`) VALUES
(1, 'Admin', 'one', '$2y$10$gDw28Ujut6fB5nIISeWVpuZdSYgjAciHpaMddeNzhJAJvJuVjEF4u', 'Admin@test.com', '08025478352', 1, '', 0, 1, '2019-12-19 17:22:49', 0),
(2, 'John', 'Doe', '$2y$10$9F2HoBUCir.4LTFU/2GwbOAmSob2./4nFPQ1KO6UQz0r/E9jTHuAO', 'cregistrar@gmail.com', '09025486328', 2, '', 0, 2, '2020-02-05 15:01:13', 0),
(3, 'Jane', 'Doe', '$2y$10$Ws5v3U./PIZAdSXZrJqtweemMSuRjd70Lq/ITCvnp8VSbdau5LQ4C', 'judge@gmail.com', '08054621358', 1, '', 0, 3, '2020-02-05 15:01:35', 0),
(4, 'Meji', 'Mark', '$2y$10$JAwWa1VrjIKFNZvzvL03SOCx1y3eoAmRcFKCb6AeCN01jFvX.JvDO', 'registrar@gmail.com', '09073758033', 1, '1', 1, 4, '2020-02-05 15:01:58', 0),
(5, 'Tobiola', 'Anifowose', '$2y$10$dHWOozbO8GQvwShthAIvB.nUIDGhBn58jBdRNRYgt30CVU6oI155i', 'bursar@gmail.com', '09073758034', 1, '1', 2, 5, '2020-02-05 15:02:16', 0),
(6, 'Antonio', 'Mark', '$2y$10$IBN4atM9AseY3ws2GB40XOd9uCKb8fr0y7PIxGKJgVdM0LH5mD2/K', 'Antonio@gmail.com', '08024532678', 1, '2', 3, 7, '2020-02-05 13:56:04', 0),
(7, 'Alex', 'Patrick', '$2y$10$fj5RQXkJ3cDffYQVTZGtXu3MOGh4r0rams0XVLkQsioDwzOs9MC5O', 'Patrick@gmail.com', '08054236789', 1, '3', 4, 8, '2020-02-05 13:56:08', 0),
(8, 'Ayodeji', 'Kareem', '$2y$10$UrZgXG10aRMNPI9FLhHGa.AyWlsnXHERImAu1zXHW.LGmWWnPnaD2', 'Ayodeji@gmail.com', '08054782145', 1, '2', 5, 8, '2020-02-05 14:24:18', 0),
(9, 'Dele', 'Muhammed', '$2y$10$yFzntXemE8dIfi9u/G3n7OOCCGfxrG4qqmoEf2Ro2xX6gVb78MRMm', 'mjudge@gmail.com', '06970493845', 2, '3', 6, 4, '2020-01-16 11:40:02', 0),
(10, 'Micheal', 'Bossy', '$2y$10$EHCLQEcNO71etNp6XzQSaeVt8vb38/BrQLwuzYbTZy6BA3x0//FD2', 'micheal@gmail.com', '08035214457', 1, '2', 11, 4, '2020-01-16 14:43:58', 0),
(11, 'Adebisi', 'Rafiu', '$2y$10$.k/lZoiinSJMBvRVyH.T5.gLxR8xtce5dYTpJMGtA.N/PBog7Xpym', 'Adebisi@gmail.com', '08024456632', 1, '3', 10, 4, '2020-01-16 02:48:35', 0),
(12, 'Sumbo', 'Adelaja', '$2y$10$hWcLlh1lorfZGaIqTuZk9OIpH.a.vGuRfYw.XrVT1wcZTsmLncSNW', 'abursar@gmail.com', '09073758034', 1, '1', 0, 6, '2020-02-05 15:02:42', 0),
(13, 'Adelaje', 'Supolati', '$2y$10$kZ6LsuSw4YJSpSiLKt.vJOppHud45Py.feR5MykBvhYFMYJsNCtRi', 'Supolati@gmail.com', '08075321456', 2, '3', 6, 4, '2020-01-17 11:06:27', 0);

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

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `case_name`, `submitted_on`, `type_of_matter`, `case_description`, `assigned_by`, `case_number`, `assigned_to`, `date_assigned`, `last_hearing`, `next_hearing`, `status`, `court_type`, `division`, `court_room`, `uploads`, `evidence`, `assigned`, `created_at`, `deleted`) VALUES
(1, 'Donald VS James', '2020-02-04 04:23:21', '2', 'Land use', 1, 'CRM-1001', '1', '2020-02-06 00:00:00', NULL, NULL, 2, '1', '2', 'Court D', NULL, NULL, 1, '2020-02-04 05:21:54', NULL);

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
(1, 2, 'All-Tech', '', '', 'info@alltsnetwork.com', '$2y$10$gDw28Ujut6fB5nIISeWVpuZdSYgjAciHpaMddeNzhJAJvJuVjEF4u', '08024568742', '1025468791', '102456325478', '101245632547', 'Block 115 Alaka Estate ', '2019-12-19 13:22:40', 0),
(2, 1, '', 'Ayodeji', 'Kareem', 'Kareem@test.com', '$2y$10$aplgAymufeyBXuf8KcKRxuCEG9Rqsf0DB7E3ofcqq.3NmZrPTQEAO', '09045218324', '10245385348', '', '', '7 Odunlami Str', '2019-12-19 13:22:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `court_case`
--

CREATE TABLE `court_case` (
  `id` int(11) NOT NULL,
  `court_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `court_type` varchar(255) NOT NULL,
  `court_division` varchar(255) NOT NULL,
  `court_matter` varchar(255) NOT NULL,
  `judge_incharge_id` int(11) NOT NULL,
  `court_case_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `assigned_to_judge_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `court_case`
--

INSERT INTO `court_case` (`id`, `court_id`, `client_id`, `court_type`, `court_division`, `court_matter`, `judge_incharge_id`, `court_case_name`, `description`, `document`, `created_on`, `assigned_to_judge_on`, `deleted`) VALUES
(1, 1, 1, '', '2', '1', 8, 'UBA vs Demond ', 'UBA vs Demond ', 'shipments-tracking-api-manual.pdf', '2020-01-17 09:30:52', '2020-02-03 11:57:28', 0),
(2, 1, 2, '', '1', '1', 8, 'Salamadar', 'Salamadar', 'aron.pdf', '2020-01-17 10:46:21', '2020-01-31 05:24:30', 0),
(3, 2, 2, '', '2', '1', 9, 'war', 'War War War', 'The Quran and Modern Science Compatible or Incompatible.pdf', '2020-01-17 10:46:06', '2020-01-17 10:53:06', 0),
(4, 1, 2, '', '1', '1', 8, 'Abidie VS lagos', 'Abc', 'Adebisi Rafiu-invoice.pdf', '2020-01-28 04:30:59', '2020-02-03 09:03:01', 0);

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
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
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

INSERT INTO `transactions` (`id`, `trans_no`, `payment_purpose`, `payment_mode`, `subscriber_id`, `receipt_no`, `approval`, `doc_name`, `doc_type`, `approve_by`, `approve_date`, `sealed`, `created_by`, `created_at`, `deleted`) VALUES
(1, 'RRR-1001', 'Litigation', '2', 1, 'RS-JSC-1001', 1, 'Case of Adebisi vs Makadaba', '2', 1, '2020-02-04 06:15:16', NULL, 1, '2020-02-04 10:20:20', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `court_case`
--
ALTER TABLE `court_case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `court_type`
--
ALTER TABLE `court_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
