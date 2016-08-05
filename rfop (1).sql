-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2016 at 07:48 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rfop`
--

-- --------------------------------------------------------

--
-- Table structure for table `aircraft`
--

CREATE TABLE IF NOT EXISTS `aircraft` (
  `aircraft_type_id` int(11) NOT NULL,
  `aircraft_type_name` varchar(50) NOT NULL,
  `aircraft_manufacturers` varchar(255) NOT NULL,
  PRIMARY KEY (`aircraft_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `airline`
--

CREATE TABLE IF NOT EXISTS `airline` (
  `airline_id` int(11) NOT NULL,
  `airline_name` varchar(255) NOT NULL,
  `airline_code` varchar(255) NOT NULL,
  PRIMARY KEY (`airline_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `baggage_services`
--

CREATE TABLE IF NOT EXISTS `baggage_services` (
  `first_piece` datetime NOT NULL,
  `last_piece` datetime NOT NULL,
  `found_property` text,
  `UM` int(11) NOT NULL,
  `YP` int(11) NOT NULL,
  `FIM_PAX` int(11) NOT NULL,
  `MISSING` int(11) NOT NULL,
  `MISSING_TEXT` text,
  `AHL` int(11) NOT NULL,
  `AHL_TEXT` text,
  `OHD` int(11) NOT NULL,
  `OHD_TEXT` text,
  `RXT` int(11) NOT NULL,
  `RXT_TEXT` text,
  `O/C` int(11) NOT NULL,
  `O/C_TEXT` text,
  `DEPU` int(11) NOT NULL,
  `DEPU_TEXT` text,
  `INAD` int(11) NOT NULL,
  `INAD_TEXT` text,
  `fop_id` bigint(20) NOT NULL,
  KEY `fop_id` (`fop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baggage_services`
--

INSERT INTO `baggage_services` (`first_piece`, `last_piece`, `found_property`, `UM`, `YP`, `FIM_PAX`, `MISSING`, `MISSING_TEXT`, `AHL`, `AHL_TEXT`, `OHD`, `OHD_TEXT`, `RXT`, `RXT_TEXT`, `O/C`, `O/C_TEXT`, `DEPU`, `DEPU_TEXT`, `INAD`, `INAD_TEXT`, `fop_id`) VALUES
('0000-00-00 00:00:00', '0000-00-00 00:00:00', 'djjd', 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 25);

-- --------------------------------------------------------

--
-- Table structure for table `flight_performance`
--

CREATE TABLE IF NOT EXISTS `flight_performance` (
  `fop_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `airline_id` int(6) NOT NULL,
  `aircraft_id` int(6) NOT NULL,
  `aircraft_reg` varchar(6) NOT NULL,
  `arr_flight_no` varchar(10) NOT NULL,
  `arr_flight_date` date NOT NULL,
  `arr_schedule_time` datetime NOT NULL,
  `arr_actual_time` datetime NOT NULL,
  `arr_is_early` tinyint(1) DEFAULT NULL,
  `arr_early_duration` decimal(10,0) NOT NULL,
  `arr_early_remarks` text,
  `arr_is_delay` tinyint(1) DEFAULT NULL,
  `arr_delay_duration` int(11) NOT NULL,
  `arr_delay_remarks` text,
  `arr_ontime` tinyint(1) NOT NULL,
  `arr_passengers_business` int(3) NOT NULL,
  `arr_passengers_economy` int(3) NOT NULL,
  `arr_infants` int(3) NOT NULL,
  `arr_wheelchairs` int(3) NOT NULL,
  `arr_wheelchair_remarks` text,
  `arr_cargo` decimal(10,0) NOT NULL,
  `arr_po_mail` decimal(10,0) NOT NULL,
  `flight_type` int(11) NOT NULL,
  `arr_remarks` text,
  `dep_flight_no` varchar(10) NOT NULL,
  `dep_flight_date` date NOT NULL,
  `dep_schedule_time` datetime NOT NULL,
  `dep_actual_time` datetime NOT NULL,
  `dep_is_early` tinyint(1) DEFAULT NULL,
  `dep_early_duration` int(11) NOT NULL,
  `dep_early_remarks` text,
  `dep_is_delay` tinyint(1) DEFAULT NULL,
  `dep_delay_duration` int(11) NOT NULL,
  `dep_delay_remarks` text,
  `dep_ontime` tinyint(1) NOT NULL,
  `dep_passengers_business` int(11) NOT NULL,
  `dep_passengers_economy` int(11) NOT NULL,
  `dep_infants` int(11) NOT NULL,
  `dep_wheelchairs` int(11) NOT NULL,
  `dep_wheelchair_remarks` text,
  `dep_cargo` decimal(7,0) NOT NULL,
  `dep_po_mail` decimal(7,0) NOT NULL,
  `dep_remarks` text,
  `dep_hirein` varchar(255) NOT NULL,
  `dep_ground_time` int(5) NOT NULL,
  `dep_ground_time_remarks` varchar(255) NOT NULL,
  `dep_um` int(3) NOT NULL,
  `dep_yp` int(3) NOT NULL,
  `dep_depu` int(3) NOT NULL,
  `dep_inaad` int(3) NOT NULL,
  `first_piece` time NOT NULL,
  `last_piece` time NOT NULL,
  `found_property` text NOT NULL,
  `found_property_remarks` text NOT NULL,
  `FIM` int(11) NOT NULL,
  `missing` int(11) NOT NULL,
  `ahl` int(11) NOT NULL,
  `ohd` int(11) NOT NULL,
  `rxt` int(11) NOT NULL,
  `um` int(11) NOT NULL,
  `yp` int(11) NOT NULL,
  `depu` int(11) NOT NULL,
  `depu_remarks` text NOT NULL,
  `oc` int(11) NOT NULL,
  `inad` int(11) NOT NULL,
  `inad_remarks` text NOT NULL,
  PRIMARY KEY (`fop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `flight_performance`
--

INSERT INTO `flight_performance` (`fop_id`, `airline_id`, `aircraft_id`, `aircraft_reg`, `arr_flight_no`, `arr_flight_date`, `arr_schedule_time`, `arr_actual_time`, `arr_is_early`, `arr_early_duration`, `arr_early_remarks`, `arr_is_delay`, `arr_delay_duration`, `arr_delay_remarks`, `arr_ontime`, `arr_passengers_business`, `arr_passengers_economy`, `arr_infants`, `arr_wheelchairs`, `arr_wheelchair_remarks`, `arr_cargo`, `arr_po_mail`, `flight_type`, `arr_remarks`, `dep_flight_no`, `dep_flight_date`, `dep_schedule_time`, `dep_actual_time`, `dep_is_early`, `dep_early_duration`, `dep_early_remarks`, `dep_is_delay`, `dep_delay_duration`, `dep_delay_remarks`, `dep_ontime`, `dep_passengers_business`, `dep_passengers_economy`, `dep_infants`, `dep_wheelchairs`, `dep_wheelchair_remarks`, `dep_cargo`, `dep_po_mail`, `dep_remarks`, `dep_hirein`, `dep_ground_time`, `dep_ground_time_remarks`, `dep_um`, `dep_yp`, `dep_depu`, `dep_inaad`, `first_piece`, `last_piece`, `found_property`, `found_property_remarks`, `FIM`, `missing`, `ahl`, `ohd`, `rxt`, `um`, `yp`, `depu`, `depu_remarks`, `oc`, `inad`, `inad_remarks`) VALUES
(25, 0, 0, '278', '', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '0', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, '0', '0', 0, NULL, '', '2016-08-17', '1899-12-21 00:00:00', '1899-12-31 02:00:00', NULL, 0, NULL, NULL, 0, NULL, 0, 4, 3, 3, 3, 'jdklls', '3', '2', 'hsjjkjjjs', 'dkss', 3, '', 3, 2, 2, 2, '00:00:00', '00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, ''),
(26, 0, 0, '', '', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '0', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, '0', '0', 0, NULL, '', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, '', '0', '0', '', '', 0, 'ddd', 0, 0, 0, 0, '00:00:00', '00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `lastlogin_at` datetime NOT NULL,
  `lastlogin_ip` datetime NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `is_active` datetime NOT NULL,
  `is_deleted` datetime NOT NULL,
  `is_active_at` datetime NOT NULL,
  `is_active_by` datetime NOT NULL,
  `is_deleted_at` datetime NOT NULL,
  `is_deleted_by` datetime NOT NULL,
  `station` char(3) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `user_name` (`username`,`email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email_id`, `designation`, `dept`, `contact`, `lastlogin_at`, `lastlogin_ip`, `user_role`, `is_active`, `is_deleted`, `is_active_at`, `is_active_by`, `is_deleted_at`, `is_deleted_by`, `station`) VALUES
('admin', '$2y$10$AhD.OYfs5QA4gAw9PvaHZe2NaMIJ/GRScGC/is/PsGojxoD8Ar.aG', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
('operator', '$2y$10$L5pzw15eSQ3QAif0LjYNGOsW0rFutbPuB89MjthpK0fZ0bSdj4lty', 'rop@royal.pk', 'rop', 'rop', '8888-888-8888', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'operator', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'khi'),
('operator1', '$2y$10$ihvPk.dkA5CD6ABAFRoJkebBEYZsCEHQzzJUhiHqDub90Vgea0GIa', 'asjks@sad.com', 'operator', 'ops', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'khi'),
('operator2', '$2y$10$tBQ3wEuIQUVkCTZNwvlgB.hvtPUNKgJrNlIvBULNvcV4Tvsw9fZpW', 'asjk23s@sad.com', 'operator', 'ops', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'operator', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'khi'),
('operator3', '$2y$10$noRLdqpKd29khBlNs/2PueS5aSmHzm6vqau0zzvC99Qzc0r9NGVxG', 'user@rop.com', 'rop', 'rop', '888-8888-888', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'operator', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'khi');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baggage_services`
--
ALTER TABLE `baggage_services`
  ADD CONSTRAINT `baggage_services_ibfk_1` FOREIGN KEY (`fop_id`) REFERENCES `flight_performance` (`fop_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
