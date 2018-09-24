-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2018 at 06:51 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `advice`
--

CREATE TABLE `advice` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advice`
--

INSERT INTO `advice` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ad1', '2018-09-12 08:07:47', '0000-00-00 00:00:00'),
(2, 'ad2', '2018-09-13 04:47:40', '0000-00-00 00:00:00'),
(10, 'ad3', '2018-09-13 04:48:06', '0000-00-00 00:00:00'),
(11, 'ad4', '2018-09-13 04:48:08', '0000-00-00 00:00:00'),
(14, 'ad5', '2018-09-13 04:48:10', '0000-00-00 00:00:00'),
(17, 'ad6', '2018-09-13 04:48:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `advice_item`
--

CREATE TABLE `advice_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `advice_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advice_item`
--

INSERT INTO `advice_item` (`id`, `name`, `advice_id`, `created_at`, `updated_at`) VALUES
(6, 'item1', 10, '2018-09-11 06:09:52', '0000-00-00 00:00:00'),
(7, 'item5', 10, '2018-09-11 06:21:38', '0000-00-00 00:00:00'),
(8, 'item3', 2, '2018-09-11 06:23:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_booking`
--

CREATE TABLE `appointment_booking` (
  `appointment_booking_id` int(11) NOT NULL,
  `order_number` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `contact_number` varchar(13) NOT NULL,
  `appointment_date` datetime NOT NULL,
  `consultant_fee` int(11) DEFAULT NULL,
  `booked_by` varchar(255) NOT NULL,
  `fee_paid_at` datetime NOT NULL,
  `fee_collected_by` varchar(255) DEFAULT NULL,
  `ett_fee` int(11) NOT NULL,
  `ett_fee_paid_at` datetime NOT NULL,
  `ett_fee_collected_by` varchar(255) NOT NULL,
  `echo_fee` int(11) NOT NULL,
  `echo_fee_paid_at` datetime NOT NULL,
  `echo_fee_collected_by` varchar(255) NOT NULL,
  `refund` int(11) NOT NULL,
  `fee_paid_status` int(1) NOT NULL,
  `booking_flag` varchar(20) NOT NULL,
  `creation_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_booking`
--

INSERT INTO `appointment_booking` (`appointment_booking_id`, `order_number`, `full_name`, `contact_number`, `appointment_date`, `consultant_fee`, `booked_by`, `fee_paid_at`, `fee_collected_by`, `ett_fee`, `ett_fee_paid_at`, `ett_fee_collected_by`, `echo_fee`, `echo_fee_paid_at`, `echo_fee_collected_by`, `refund`, `fee_paid_status`, `booking_flag`, `creation_time`, `updation_time`) VALUES
(14, 7, 'yaseen', '03445455656', '2018-09-06 10:14:04', 0, '', '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 4, 'on_walk', '2018-09-06 10:14:04', '2018-09-06 15:20:18'),
(15, 1, '', '78564', '2018-09-06 10:42:41', 500, '', '2018-09-19 19:44:11', NULL, 500, '2018-09-19 19:40:56', '', 0, '0000-00-00 00:00:00', '', 0, 1, 'vip', '2018-09-06 10:42:41', '2018-09-19 19:44:11'),
(16, 2, 'sohaib', '03445456565', '2018-09-06 10:53:05', 500, '', '2018-09-19 19:31:52', NULL, 500, '2018-09-06 11:39:32', 'admin', 0, '0000-00-00 00:00:00', '', 0, 1, 'vip', '2018-09-06 10:53:05', '2018-09-19 19:31:52'),
(18, 9, 'yasir', '03434545454', '2018-09-06 11:23:56', 500, '', '2018-09-06 11:38:53', 'admin', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 0, 'on_call', '2018-09-06 11:23:56', '2018-09-06 15:21:12'),
(20, 3, 'sohaib', '', '2018-09-06 12:16:56', 0, '', '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 0, 'vip', '2018-09-06 12:16:56', '2018-09-15 10:54:51'),
(21, 4, 'sohaib', '', '2018-09-06 13:25:51', 0, '', '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 0, 'vip', '2018-09-06 13:25:51', '2018-09-15 11:28:22'),
(22, 10, 'hasan', '54543554656', '2018-09-06 15:51:46', 500, '', '2018-09-06 16:12:11', 'admin', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 0, 'vip', '2018-09-06 15:51:46', '2018-09-06 16:12:11'),
(23, 1, '', '78564', '2018-09-07 15:02:01', 500, '', '2018-09-19 19:44:11', NULL, 500, '2018-09-19 19:40:56', '', 0, '0000-00-00 00:00:00', '', 0, 1, 'vip', '2018-09-07 15:02:01', '2018-09-19 19:44:11'),
(29, 6, 'zawar', '90438590843', '2018-09-07 15:47:23', 500, '', '2018-09-07 16:15:12', 'admin', 300, '2018-09-07 16:17:46', 'admin', 500, '2018-09-08 12:55:23', 'admin', 0, 6, 'vip', '2018-09-07 15:47:23', '2018-09-08 12:55:23'),
(30, 7, 'ali', '03434545546', '2018-09-07 15:56:52', 0, '', '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 0, 'on_walk', '2018-09-07 15:56:52', '0000-00-00 00:00:00'),
(31, 8, 'hamza', '03434545454', '2018-09-07 15:57:13', 500, '', '2018-09-07 16:17:56', 'admin', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 0, 'on_call', '2018-09-07 15:57:13', '2018-09-07 16:17:56'),
(32, 2, 'sohaib', '03445456565', '2018-09-07 16:10:35', 500, '', '2018-09-19 19:31:52', NULL, 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 1, 'vip', '2018-09-07 16:10:35', '2018-09-19 19:31:52'),
(33, 1, '', '78564', '2018-09-08 09:49:33', 500, '', '2018-09-19 19:44:11', NULL, 500, '2018-09-19 19:40:56', '', 0, '0000-00-00 00:00:00', '', 0, 1, 'vip', '2018-09-08 09:49:33', '2018-09-19 19:44:11'),
(44, 6, 'javed', '03314716890', '2018-09-10 11:26:19', 500, '', '2018-09-10 11:26:19', 'admin', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 4, 'on_walk', '2018-09-10 11:26:19', '2018-09-10 11:48:25'),
(45, 1, '', '78564', '2018-09-10 11:26:34', 500, '', '2018-09-19 19:44:11', NULL, 500, '2018-09-19 19:40:56', '', 0, '0000-00-00 00:00:00', '', 0, 1, 'vip', '2018-09-10 11:26:34', '2018-09-19 19:44:11'),
(46, 2, 'sohaib', '', '2018-09-10 11:41:45', 500, '', '2018-09-19 19:31:52', NULL, 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 1, 'vip', '2018-09-10 11:41:45', '2018-09-19 19:31:52'),
(47, 7, 'wasim', '03314716890', '2018-09-10 11:43:56', 1500, '', '2018-09-10 11:43:56', 'admin', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 1, 'on_walk', '2018-09-10 11:43:56', '0000-00-00 00:00:00'),
(48, 3, 'sohaib', '', '2018-09-10 11:45:30', 0, '', '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 0, 'vip', '2018-09-10 11:45:30', '2018-09-15 10:54:51'),
(49, 4, 'sohaib', '', '2018-09-10 11:45:36', 0, '', '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 0, 'vip', '2018-09-10 11:45:36', '2018-09-15 11:28:22'),
(50, 5, 'sohaib', '', '2018-09-10 11:45:39', 500, '', '2018-09-15 14:42:35', 'admin', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 1, 'vip', '2018-09-10 11:45:39', '2018-09-15 14:42:35'),
(51, 8, 'now', '03333', '2018-09-10 11:45:57', 0, '', '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 0, 'on_call', '2018-09-10 11:45:57', '2018-09-10 11:48:41'),
(71, 1, 'javed', '78564', '2018-09-15 14:40:01', 500, '', '2018-09-19 19:44:11', NULL, 500, '2018-09-19 19:40:56', '', 0, '0000-00-00 00:00:00', '', 0, 1, 'vip', '2018-09-15 14:40:01', '2018-09-19 19:44:11'),
(72, 2, 'wasim', '', '2018-09-15 14:40:20', 500, '', '2018-09-19 19:31:52', NULL, 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 1, 'vip', '2018-09-15 14:40:20', '2018-09-19 19:31:52'),
(73, 3, 'anjum', '', '2018-09-15 14:40:26', 0, '', '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 0, 'vip', '2018-09-15 14:40:26', '0000-00-00 00:00:00'),
(74, 4, 'sohaib', '', '2018-09-15 14:40:34', 0, '', '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 0, 'vip', '2018-09-15 14:40:34', '0000-00-00 00:00:00'),
(75, 5, 'sohaib', '', '2018-09-15 14:40:40', 500, '', '2018-09-15 14:42:35', 'admin', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 1, 'vip', '2018-09-15 14:40:40', '2018-09-15 14:42:35'),
(76, 6, 'p1', '1321321321', '2018-09-15 14:41:36', 1200, '', '2018-09-15 14:41:36', 'admin', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 7, 'vip', '2018-09-15 14:41:36', '2018-09-15 14:42:23'),
(77, 7, 'lkjlkjkl', '4654654', '2018-09-15 14:43:05', 555, '', '2018-09-19 17:32:32', '', 323, '2018-09-19 17:33:16', '', 323, '2018-09-19 17:35:05', '', 0, 1, 'on_walk', '2018-09-15 14:43:05', '2018-09-19 17:35:05'),
(78, 8, 'hkjhkjh', '1132132', '2018-09-15 14:44:00', 1200, '', '2018-09-15 14:44:00', 'admin', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 1, 'on_call', '2018-09-15 14:44:00', '0000-00-00 00:00:00'),
(80, 1, 'abs', '78564', '2018-09-18 09:58:38', 500, '', '2018-09-19 19:44:11', NULL, 500, '2018-09-19 19:40:56', '', 0, '0000-00-00 00:00:00', '', 0, 1, 'vip', '2018-09-18 09:58:38', '2018-09-19 19:44:11'),
(81, 7, 'hgd', '78568756876', '2018-09-18 10:00:30', 500, '', '2018-09-18 10:00:30', 'admin', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 5, 'on_walk', '2018-09-18 10:00:30', '2018-09-18 10:01:32'),
(82, 6, 'zaryab', '1234567', '2018-09-19 10:05:43', 1000, '', '2018-09-19 10:06:06', 'admin', 333, '2018-09-19 19:56:13', 'admin', 121, '2018-09-19 20:10:10', 'admin', 0, 1, 'on_call', '2018-09-19 10:05:43', '2018-09-19 20:10:10'),
(83, 7, 'hamza', '03435445454', '2018-09-19 18:16:33', 300, '', '2018-09-19 19:54:07', 'admin', 200, '2018-09-19 19:54:11', 'admin', 0, '0000-00-00 00:00:00', '', 0, 4, 'on_call', '2018-09-19 18:16:33', '2018-09-19 20:12:02'),
(84, 1, 'zdfg', '', '2018-09-19 19:22:15', 500, '', '2018-09-19 19:44:11', NULL, 500, '2018-09-19 19:40:56', '', 0, '0000-00-00 00:00:00', '', 0, 1, 'vip', '2018-09-19 19:22:15', '2018-09-19 19:44:11'),
(85, 2, 'dsfsdf', '', '2018-09-19 19:23:44', 500, '', '2018-09-19 19:31:52', '', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 1, 'vip', '2018-09-19 19:23:44', '2018-09-19 19:42:44'),
(86, 3, 'dsfsdf', '', '2018-09-19 19:24:31', 0, '', '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 0, 'vip', '2018-09-19 19:24:31', '0000-00-00 00:00:00'),
(87, 8, 'sfddsf', '567456', '2018-09-19 19:24:41', 200, '', '2018-09-19 19:48:09', 'admin', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 1, 'vip', '2018-09-19 19:24:41', '2018-09-19 19:48:09'),
(88, 6, 'sdffsdf', '45645645', '2018-09-20 19:25:20', 0, '', '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 4, 'vip', '2018-09-19 19:25:20', '2018-09-19 20:05:47'),
(89, 9, 'sdfdsf', '456345345', '2018-09-19 19:26:42', 500, '', '2018-09-19 20:06:06', 'admin', 200, '2018-09-19 20:06:13', 'admin', 0, '0000-00-00 00:00:00', '', 0, 1, 'on_walk', '2018-09-19 19:26:42', '2018-09-19 20:06:13'),
(92, 10, 'sdfsdff', '435345', '2018-09-19 19:53:53', 0, '', '0000-00-00 00:00:00', NULL, 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', 0, 0, 'on_call', '2018-09-19 19:53:53', '0000-00-00 00:00:00'),
(93, 11, 'dgfdfg', '546456', '2018-09-19 19:53:58', 546, '', '2018-09-19 19:53:58', NULL, 300, '2018-09-19 19:54:18', 'admin', 0, '0000-00-00 00:00:00', '', 0, 1, 'on_call', '2018-09-19 19:53:58', '2018-09-19 19:54:18'),
(94, 12, 'ksdfkhjsd', '84375345', '2018-09-19 19:56:37', 500, '', '2018-09-19 19:57:58', 'admin', 300, '2018-09-19 20:02:06', 'admin', 0, '0000-00-00 00:00:00', '', 0, 1, 'on_call', '2018-09-19 19:56:37', '2018-09-19 20:02:06'),
(95, 13, 'hamer', '45456565656', '2018-09-19 20:02:25', 500, '', '2018-09-19 20:02:29', 'admin', 300, '2018-09-19 20:02:33', 'admin', 200, '2018-09-19 20:02:37', 'admin', 0, 1, 'vip', '2018-09-19 20:02:25', '2018-09-19 20:02:37'),
(96, 14, 'dfgdfg', '546456', '2018-09-19 20:05:59', 300, '', '2018-09-19 20:06:10', 'admin', 300, '2018-09-19 20:06:17', 'admin', 0, '0000-00-00 00:00:00', '', 0, 1, 'on_walk', '2018-09-19 20:05:59', '2018-09-19 20:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `booking_limiter`
--

CREATE TABLE `booking_limiter` (
  `limiter_id` int(11) NOT NULL,
  `limiter` int(11) NOT NULL,
  `limiter_date` date NOT NULL,
  `clinic_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_limiter`
--

INSERT INTO `booking_limiter` (`limiter_id`, `limiter`, `limiter_date`, `clinic_time`) VALUES
(1, 15, '2018-09-04', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category_measurement`
--

CREATE TABLE `category_measurement` (
  `id` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_measurement`
--

INSERT INTO `category_measurement` (`id`, `item`, `value`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'item1', 'v1', 1, '2018-09-18 08:01:24', '0000-00-00 00:00:00'),
(2, 'item2', 'v1', 1, '2018-09-18 08:01:29', '0000-00-00 00:00:00'),
(3, 'item3', 'v3', 1, '2018-09-18 07:50:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `structure_id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `name`, `structure_id`, `disease_id`, `created_at`, `updated_at`) VALUES
(1, 'd1', 1, 0, '2018-09-18 05:11:55', '0000-00-00 00:00:00'),
(2, 'd2', 1, 1, '2018-09-18 05:11:55', '0000-00-00 00:00:00'),
(3, 'd3', 1, 0, '2018-09-18 04:56:13', '0000-00-00 00:00:00'),
(4, 'd4', 1, 0, '2018-09-17 07:42:00', '0000-00-00 00:00:00'),
(5, 'd5', 1, 0, '2018-09-17 08:12:42', '0000-00-00 00:00:00'),
(7, 'd1', 2, 0, '2018-09-17 07:50:14', '0000-00-00 00:00:00'),
(8, 'd2', 2, 0, '2018-09-18 05:34:24', '0000-00-00 00:00:00'),
(9, 'd3', 2, 2, '2018-09-18 05:34:24', '0000-00-00 00:00:00'),
(10, 'f1', 3, 0, '2018-09-17 10:30:17', '0000-00-00 00:00:00'),
(11, 'f2', 3, 2, '2018-09-18 04:56:36', '0000-00-00 00:00:00'),
(12, 'f3', 3, 0, '2018-09-17 10:30:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `finding_id` int(11) NOT NULL,
  `diagnose_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`id`, `name`, `finding_id`, `diagnose_id`, `created_at`, `updated_at`) VALUES
(1, 'disease1', 2, 0, '2018-09-17 12:08:09', '0000-00-00 00:00:00'),
(2, 'disease2', 3, 2, '2018-09-17 12:07:31', '0000-00-00 00:00:00'),
(3, 'disease3', 0, 0, '2018-09-17 08:16:11', '0000-00-00 00:00:00'),
(4, 'disease4', 4, 0, '2018-09-17 12:02:02', '0000-00-00 00:00:00'),
(6, 'disease5', 0, 0, '2018-09-17 08:19:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `districts_tbl`
--

CREATE TABLE `districts_tbl` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts_tbl`
--

INSERT INTO `districts_tbl` (`district_id`, `district_name`) VALUES
(1, 'Attock'),
(2, 'Lodhran'),
(3, 'Bahawalnagar'),
(4, 'Mandi Bahauddin'),
(5, 'Bahawalpur'),
(6, 'Mianwali'),
(7, 'Bhakkar'),
(8, 'Multan'),
(9, 'Chakwal'),
(10, 'Muzaffargarh'),
(11, 'Chiniot'),
(12, 'Narowal'),
(13, 'Dera Ghazi Khan'),
(14, 'Nankana Sahib'),
(15, 'Faisalabad'),
(16, 'Okara'),
(17, 'Gujranwala'),
(18, 'Pakpattan'),
(19, 'Gujrat'),
(20, 'Rahim Yar Khan'),
(21, 'Hafizabad'),
(22, 'Rajanpur'),
(23, 'Jhang'),
(24, 'Rawalpindi'),
(25, 'Jhelum'),
(26, 'Sahiwal'),
(27, 'Kasur'),
(28, 'Sargodha'),
(29, 'Khanewal'),
(30, 'Sheikhupura'),
(31, 'Khushab'),
(32, 'Sialkot'),
(33, 'Lahore'),
(34, 'Toba Tek Singh'),
(35, 'Layyah'),
(36, 'Vehari'),
(37, 'Badin'),
(38, 'Dadu'),
(39, 'Ghotki'),
(40, 'Hyderabad'),
(41, 'Jacobabad'),
(42, 'Jamshoro'),
(43, 'Karachi'),
(44, 'Kashmore'),
(45, 'Khairpur'),
(46, 'Larkana'),
(47, 'Matiari'),
(48, 'Mirpurkhas'),
(49, 'Naushahro Firoz'),
(50, 'Nawab Shah'),
(51, 'Qamber and Shahdad Kot'),
(52, 'Sanghar'),
(53, 'Shikarpur'),
(54, 'Sukkur'),
(55, 'Tando Allahyar'),
(56, 'Tando Muhammad Khan'),
(57, 'Tharparkar'),
(58, 'Thatta'),
(59, 'Umer Kot'),
(60, 'Sujawal'),
(61, 'Malir'),
(62, 'Korangi'),
(63, 'Sujawal'),
(64, 'Abbottabad'),
(65, 'Bannu'),
(66, 'Batagram'),
(67, 'Buner'),
(68, 'Charsadda'),
(69, 'Chitral'),
(70, 'Dera Ismail Khan'),
(71, 'Hangu'),
(72, 'Haripur'),
(73, 'Karak'),
(74, 'Kohat'),
(75, 'Upper Kohistan'),
(76, 'Lakki Marwat'),
(77, 'Lower Dir'),
(78, 'Malakand'),
(79, 'Mansehra'),
(80, 'Mardan'),
(81, 'Nowshera'),
(82, 'Peshawar'),
(83, 'Shangla'),
(84, 'Swabi'),
(85, 'Swat'),
(86, 'Tank'),
(87, 'Upper Dir'),
(88, 'Torghar'),
(89, 'Lower Kohistan'),
(90, 'Awaran'),
(91, 'Barkhan'),
(92, 'Bolan'),
(93, 'Chagai'),
(94, 'Dera Bugti'),
(95, 'Gwadar'),
(96, 'Harnai'),
(97, 'Jafarabad'),
(98, 'Jhal Magsi'),
(99, 'Kalat'),
(100, 'Kech'),
(101, 'Kharan'),
(102, 'Khuzdar'),
(103, 'Kohlu'),
(104, 'Lasbela'),
(105, 'Loralai'),
(106, 'Mastung'),
(107, 'Musakhel'),
(108, 'Naseerabad'),
(109, 'Nushki'),
(110, 'Panjgur'),
(111, 'Pishin'),
(112, 'Qilla Abdullah'),
(113, 'Qilla Saifullah'),
(114, 'Quetta'),
(115, 'Sheerani'),
(116, 'Sibi'),
(117, 'Washuk'),
(118, 'Zhob'),
(119, 'Ziarat'),
(120, 'Sohbatpur'),
(121, 'Lehri'),
(122, 'Ghanche'),
(123, 'Gilgit'),
(124, 'Skardu'),
(125, 'Hunza'),
(126, 'Astore'),
(127, 'Kharmang'),
(128, 'Diamer'),
(129, 'Shigar'),
(130, 'Ghizer'),
(131, 'Nagar'),
(132, 'Bajaur'),
(133, 'North Waziristan'),
(134, 'Khyber'),
(135, 'Orakzai'),
(136, 'Kurram'),
(137, 'South Waziristan'),
(138, 'Mohmand'),
(139, 'Bhimber'),
(140, 'Hattian'),
(141, 'Kotli'),
(142, 'Sudhnati'),
(143, 'Mirpur'),
(144, 'Muzaffarabad'),
(145, 'Bagh'),
(146, 'Neelum'),
(147, 'Poonch'),
(148, 'Sudhnati'),
(149, 'fsdf');

-- --------------------------------------------------------

--
-- Table structure for table `dosage`
--

CREATE TABLE `dosage` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosage`
--

INSERT INTO `dosage` (`id`, `name`, `medicine_id`, `created_at`, `updated_at`) VALUES
(1, 'dose1', 1, '2018-09-14 09:47:44', '0000-00-00 00:00:00'),
(2, 'dose2', 2, '2018-09-14 07:16:33', '0000-00-00 00:00:00'),
(3, 'dose3', 1, '2018-09-14 07:44:37', '0000-00-00 00:00:00'),
(4, 'dose4', 2, '2018-09-14 07:16:48', '0000-00-00 00:00:00'),
(5, 'dose5', 1, '2018-09-14 07:17:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `echo_category`
--

CREATE TABLE `echo_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `main_category` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `echo_category`
--

INSERT INTO `echo_category` (`id`, `name`, `main_category`, `created_at`, `updated_at`) VALUES
(1, 'c1', 'dooplers', '2018-09-18 06:34:04', '0000-00-00 00:00:00'),
(2, 'c2', 'dooplers', '2018-09-18 06:35:24', '0000-00-00 00:00:00'),
(4, 'c3', 'dooplers', '2018-09-18 06:36:16', '0000-00-00 00:00:00'),
(5, 'c4', 'dooplers', '2018-09-18 06:41:16', '0000-00-00 00:00:00'),
(6, 'c6', 'mmode', '2018-09-18 06:43:01', '0000-00-00 00:00:00'),
(7, 'c1', 'mmode', '2018-09-18 06:54:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ett_conclusion`
--

CREATE TABLE `ett_conclusion` (
  `id` int(11) NOT NULL,
  `conclusion` varchar(255) NOT NULL,
  `created at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ett_conclusion`
--

INSERT INTO `ett_conclusion` (`id`, `conclusion`, `created at`, `updated at`) VALUES
(1, 'conc 1', '2018-09-17 07:57:30', '0000-00-00 00:00:00'),
(4, 'conc 2', '2018-09-17 08:06:47', '0000-00-00 00:00:00'),
(9, 'conc 4', '2018-09-18 07:42:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ett_description`
--

CREATE TABLE `ett_description` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ett_description`
--

INSERT INTO `ett_description` (`id`, `description`, `created at`, `updated at`) VALUES
(3, 'desc 1', '2018-09-17 07:26:23', '0000-00-00 00:00:00'),
(4, 'conc 21', '2018-09-17 07:29:03', '0000-00-00 00:00:00'),
(5, 'tut78u67', '2018-09-18 07:36:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ett_ending_reason`
--

CREATE TABLE `ett_ending_reason` (
  `id` int(11) NOT NULL,
  `ending_reason` varchar(255) NOT NULL,
  `created at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ett_ending_reason`
--

INSERT INTO `ett_ending_reason` (`id`, `ending_reason`, `created at`, `updated at`) VALUES
(2, 'ereason 1', '2018-09-17 06:38:14', '0000-00-00 00:00:00'),
(3, 'ereason 2', '2018-09-17 06:39:03', '0000-00-00 00:00:00'),
(5, 'ereason 3', '2018-09-18 07:43:43', '0000-00-00 00:00:00'),
(6, 'ereason4', '2018-09-18 08:19:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ett_protocols`
--

CREATE TABLE `ett_protocols` (
  `id` int(11) NOT NULL,
  `protocol` varchar(255) NOT NULL,
  `stages` int(3) NOT NULL,
  `recovery` int(3) NOT NULL,
  `created at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ett_protocols`
--

INSERT INTO `ett_protocols` (`id`, `protocol`, `stages`, `recovery`, `created at`, `updated at`) VALUES
(2, 'protocol 1', 3, 3, '2018-09-17 11:52:38', '0000-00-00 00:00:00'),
(3, 'protocol 2', 4, 34, '2018-09-17 11:53:35', '0000-00-00 00:00:00'),
(4, 'protocol 3', 4, 34, '2018-09-17 11:55:05', '0000-00-00 00:00:00'),
(5, 'protocol 4', 3, 4, '2018-09-17 12:02:21', '0000-00-00 00:00:00'),
(6, 'Rest', 3, 2, '2018-09-18 05:29:22', '0000-00-00 00:00:00'),
(8, 'protocol', 3, 4, '2018-09-18 06:03:18', '0000-00-00 00:00:00'),
(9, 'protocol 8', 4, 4, '2018-09-18 06:04:07', '0000-00-00 00:00:00'),
(10, 'protocol 9', 3, 4, '2018-09-18 06:06:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ett_protocol_details`
--

CREATE TABLE `ett_protocol_details` (
  `id` int(11) NOT NULL,
  `stage_name` varchar(255) NOT NULL,
  `speed_mph` int(5) NOT NULL,
  `grade` int(5) NOT NULL,
  `stage_time` int(5) NOT NULL,
  `mets` int(5) NOT NULL,
  `protocol_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ett_protocol_details`
--

INSERT INTO `ett_protocol_details` (`id`, `stage_name`, `speed_mph`, `grade`, `stage_time`, `mets`, `protocol_id`, `created_at`, `updated at`) VALUES
(1, 'Rest', 0, 0, 0, 0, 8, '2018-09-18 06:03:18', '0000-00-00 00:00:00'),
(2, 'Stage 1', 0, 0, 0, 0, 8, '2018-09-18 06:03:18', '0000-00-00 00:00:00'),
(3, 'Stage 2', 0, 0, 0, 0, 8, '2018-09-18 06:03:18', '0000-00-00 00:00:00'),
(4, 'Stage 3', 0, 0, 0, 0, 8, '2018-09-18 06:03:18', '0000-00-00 00:00:00'),
(5, 'Recovery 1', 0, 0, 0, 0, 8, '2018-09-18 06:03:18', '0000-00-00 00:00:00'),
(6, 'Rest', 10, 20, 0, 0, 9, '2018-09-18 06:04:07', '0000-00-00 00:00:00'),
(7, 'Stage 1', 0, 0, 0, 0, 9, '2018-09-18 06:04:07', '0000-00-00 00:00:00'),
(8, 'Stage 2', 0, 0, 0, 0, 9, '2018-09-18 06:04:07', '0000-00-00 00:00:00'),
(9, 'Stage 3', 0, 0, 0, 0, 9, '2018-09-18 06:04:07', '0000-00-00 00:00:00'),
(10, 'Stage 4', 0, 0, 3, 0, 9, '2018-09-18 06:04:07', '0000-00-00 00:00:00'),
(11, 'Recovery 1', 0, 0, 0, 0, 9, '2018-09-18 06:04:07', '0000-00-00 00:00:00'),
(12, 'Rest', 0, 0, 0, 0, 10, '2018-09-18 06:06:10', '0000-00-00 00:00:00'),
(13, 'Stage 1', 0, 0, 0, 0, 10, '2018-09-18 06:06:10', '0000-00-00 00:00:00'),
(14, 'Stage 2', 0, 0, 0, 0, 10, '2018-09-18 06:06:10', '0000-00-00 00:00:00'),
(15, 'Stage 3', 20, 0, 0, 0, 10, '2018-09-18 06:06:10', '0000-00-00 00:00:00'),
(16, 'Recovery 1', 0, 0, 0, 0, 10, '2018-09-18 06:06:10', '0000-00-00 00:00:00'),
(17, 'Recovery 2', 0, 0, 0, 0, 10, '2018-09-18 06:06:10', '0000-00-00 00:00:00'),
(18, 'Recovery 3', 0, 0, 0, 0, 10, '2018-09-18 06:06:10', '0000-00-00 00:00:00'),
(19, 'Recovery 4', 0, 0, 0, 0, 10, '2018-09-18 06:06:10', '0000-00-00 00:00:00'),
(20, 'Rest', 0, 0, 0, 0, 11, '2018-09-18 07:44:50', '0000-00-00 00:00:00'),
(21, 'Stage 1', 0, 0, 0, 0, 11, '2018-09-18 07:44:50', '0000-00-00 00:00:00'),
(22, 'Stage 2', 0, 0, 0, 0, 11, '2018-09-18 07:44:50', '0000-00-00 00:00:00'),
(23, 'Recovery 1', 0, 0, 0, 0, 11, '2018-09-18 07:44:50', '0000-00-00 00:00:00'),
(24, 'Recovery 2', 0, 0, 0, 0, 11, '2018-09-18 07:44:50', '0000-00-00 00:00:00'),
(25, 'Recovery 3', 0, 0, 0, 0, 11, '2018-09-18 07:44:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ett_test_reason`
--

CREATE TABLE `ett_test_reason` (
  `id` int(11) NOT NULL,
  `test_reason` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ett_test_reason`
--

INSERT INTO `ett_test_reason` (`id`, `test_reason`, `created_at`, `updated_at`) VALUES
(1, 'reason1', '2018-09-14 07:14:26', '0000-00-00 00:00:00'),
(2, 'protocol 1', '2018-09-14 07:17:18', '0000-00-00 00:00:00'),
(3, 'protocol 2', '2018-09-14 07:18:09', '0000-00-00 00:00:00'),
(4, 'protocol 3', '2018-09-14 07:18:29', '0000-00-00 00:00:00'),
(5, 'protocol 1', '2018-09-14 07:20:02', '0000-00-00 00:00:00'),
(6, 'reason4', '2018-09-14 07:21:46', '0000-00-00 00:00:00'),
(7, 'reason4', '2018-09-14 07:22:28', '0000-00-00 00:00:00'),
(8, 'reason4', '2018-09-14 07:22:53', '0000-00-00 00:00:00'),
(9, 'reason4', '2018-09-14 07:23:57', '0000-00-00 00:00:00'),
(10, 'reason6', '2018-09-14 07:24:27', '0000-00-00 00:00:00'),
(11, 'reason7', '2018-09-14 07:30:50', '0000-00-00 00:00:00'),
(12, 'reason8', '2018-09-14 07:32:47', '0000-00-00 00:00:00'),
(13, 'reason9', '2018-09-14 07:37:31', '0000-00-00 00:00:00'),
(14, 'reason10', '2018-09-14 07:38:19', '0000-00-00 00:00:00'),
(15, 'reason 0', '2018-09-18 07:35:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE `examination` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examination`
--

INSERT INTO `examination` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'examination2', '2018-09-13 05:45:08', '0000-00-00 00:00:00'),
(3, 'examination3', '2018-09-13 06:00:48', '0000-00-00 00:00:00'),
(6, 'examination4', '2018-09-13 06:00:55', '0000-00-00 00:00:00'),
(7, 'iem 6', '2018-09-19 04:57:32', '0000-00-00 00:00:00'),
(8, 'examination 6', '2018-09-19 04:57:03', '0000-00-00 00:00:00'),
(9, 'examination 7', '2018-09-19 04:58:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `examination_item`
--

CREATE TABLE `examination_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `examination_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examination_item`
--

INSERT INTO `examination_item` (`id`, `name`, `description`, `examination_id`, `created_at`, `updated_at`) VALUES
(4, 'item4', 'ghghfghf', 6, '2018-09-18 05:07:02', '0000-00-00 00:00:00'),
(5, 'item5', 'ddddd', 6, '2018-09-19 13:05:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `finding`
--

CREATE TABLE `finding` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `structure_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history_item`
--

CREATE TABLE `history_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `profile_history_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_item`
--

INSERT INTO `history_item` (`id`, `name`, `profile_history_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'item1', 1, 'item description', '2018-09-18 11:27:12', '0000-00-00 00:00:00'),
(2, 'item2', 1, '', '2018-09-18 11:09:48', '0000-00-00 00:00:00'),
(3, 'item3', 1, '', '2018-09-18 11:09:52', '0000-00-00 00:00:00'),
(4, 'item4', 2, '', '2018-09-18 11:09:59', '0000-00-00 00:00:00'),
(5, 'item5', 3, '', '2018-09-18 11:10:06', '0000-00-00 00:00:00'),
(6, 'item6', 4, 'yyyy', '2018-09-19 13:01:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `instruction`
--

CREATE TABLE `instruction` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instruction`
--

INSERT INTO `instruction` (`id`, `name`, `category`, `created_at`, `updated_at`) VALUES
(1, 'inst1dd', 'special', '2018-09-18 12:22:50', '0000-00-00 00:00:00'),
(2, 'inst2', 'special', '2018-09-13 10:44:29', '0000-00-00 00:00:00'),
(4, 'inst3d', 'special', '2018-09-18 12:22:51', '0000-00-00 00:00:00'),
(5, 'inst4', 'special', '2018-09-13 10:44:45', '0000-00-00 00:00:00'),
(6, 'inst5d', 'special', '2018-09-18 12:22:52', '0000-00-00 00:00:00'),
(8, 'inst6d', 'special', '2018-09-18 12:22:53', '0000-00-00 00:00:00'),
(13, 'cinst1', 'clinical', '2018-09-18 12:21:38', '0000-00-00 00:00:00'),
(14, 'cinst2', 'clinical', '2018-09-18 12:21:40', '0000-00-00 00:00:00'),
(15, 'cinst3', 'clinical', '2018-09-18 12:21:40', '0000-00-00 00:00:00'),
(16, 'cinst4', 'clinical', '2018-09-18 12:21:44', '0000-00-00 00:00:00'),
(18, 'cinst5', 'clinical', '2018-09-19 04:59:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `instruction_item`
--

CREATE TABLE `instruction_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `instruction_id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instruction_item`
--

INSERT INTO `instruction_item` (`id`, `name`, `description`, `instruction_id`, `category`, `created_at`, `updated_at`) VALUES
(3, 'item3d', 'isnt1 item', 1, 'special', '2018-09-18 12:23:06', '0000-00-00 00:00:00'),
(4, 'item4d', 'isnt1 item', 1, 'special', '2018-09-18 12:23:06', '0000-00-00 00:00:00'),
(5, 'item5d', 'isnth saved', 2, 'special', '2018-09-18 12:23:07', '0000-00-00 00:00:00'),
(9, 'item1d', 'this is about special instruction', 1, 'special', '2018-09-18 12:23:09', '0000-00-00 00:00:00'),
(11, 'cinst1', '', 13, 'clinical', '2018-09-18 12:22:30', '0000-00-00 00:00:00'),
(12, 'cinst2', '', 13, 'clinical', '2018-09-18 12:22:36', '0000-00-00 00:00:00'),
(13, 'cinst3', 'this is about clinical', 13, 'clinical', '2018-09-18 12:22:37', '0000-00-00 00:00:00'),
(14, 'item4 ', '', 18, 'clinical', '2018-09-19 05:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `investigation`
--

CREATE TABLE `investigation` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigation`
--

INSERT INTO `investigation` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'investigation1', '2018-09-19 09:43:24', '0000-00-00 00:00:00'),
(2, 'investigation2', '2018-09-13 07:14:24', '0000-00-00 00:00:00'),
(3, 'investigation3', '2018-09-13 07:14:27', '0000-00-00 00:00:00'),
(5, 'investigation5', '2018-09-13 07:14:34', '0000-00-00 00:00:00'),
(8, 'investigation 6', '2018-09-19 13:14:47', '0000-00-00 00:00:00'),
(9, 'investigation 8', '2018-09-19 04:56:44', '0000-00-00 00:00:00'),
(10, 'investigation 9', '2018-09-19 05:01:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `investigation_item`
--

CREATE TABLE `investigation_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `investigation_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigation_item`
--

INSERT INTO `investigation_item` (`id`, `name`, `description`, `investigation_id`, `created_at`, `updated_at`) VALUES
(6, 'item 1', 'description', 1, '2018-09-19 05:02:25', '0000-00-00 00:00:00'),
(7, 'item 2', '', 9, '2018-09-19 05:02:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lab_category`
--

CREATE TABLE `lab_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_category`
--

INSERT INTO `lab_category` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'category1', 'category1 descriptionh', '2018-09-12 06:39:57', '0000-00-00 00:00:00'),
(2, 'category2', 'category2 description', '2018-09-12 06:03:11', '0000-00-00 00:00:00'),
(3, 'category3', 'hhh', '2018-09-11 10:53:34', '0000-00-00 00:00:00'),
(4, 'category4', 'jj', '2018-09-11 11:34:56', '0000-00-00 00:00:00'),
(5, 'category5', 'LLLLL', '2018-09-11 10:53:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lab_test`
--

CREATE TABLE `lab_test` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `lab_category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_test`
--

INSERT INTO `lab_test` (`id`, `name`, `description`, `lab_category_id`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'test1 description', 1, '2018-09-12 07:13:51', '0000-00-00 00:00:00'),
(2, 'test2', 'test2 description', 2, '2018-09-12 07:13:55', '0000-00-00 00:00:00'),
(3, 'test3', 'test3 description', 3, '2018-09-12 04:56:00', '0000-00-00 00:00:00'),
(4, 'test4', 'test4 description', 4, '2018-09-12 07:07:38', '0000-00-00 00:00:00'),
(5, 'test5', 'test5 description', 1, '2018-09-12 07:06:49', '0000-00-00 00:00:00'),
(6, 'test6', 'test6 description', 1, '2018-09-12 07:05:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lab_test_item`
--

CREATE TABLE `lab_test_item` (
  `id` int(11) NOT NULL,
  `lab_test_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `units` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_test_item`
--

INSERT INTO `lab_test_item` (`id`, `lab_test_id`, `name`, `description`, `units`, `created_at`, `updated_at`) VALUES
(1, 1, 'item1', 'item1 description', 'sec 12', '2018-09-12 07:23:20', '0000-00-00 00:00:00'),
(2, 1, 'item2', 'item2 description', 'gm 1.2', '2018-09-12 07:24:20', '0000-00-00 00:00:00'),
(3, 1, 'item3', 'item3 description', 'sec130', '2018-09-12 07:23:08', '0000-00-00 00:00:00'),
(4, 2, 'item4', 'item4 description', 'sec123', '2018-09-12 07:23:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `login_rights_group_id` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `password`, `is_admin`, `login_rights_group_id`, `creation_time`) VALUES
(1, 'admin', '$2y$12$NndomAMgP9IOZDiwUwhfMe7ChFCEzk68XP3bEaqIf1yZH36zrUUtu', 1, 1, '2018-08-01 11:49:31'),
(2, 'test', '$2y$12$b0UqqQ7arEpvQUPdF7IiiesVMV84W7HJ1NfmR.hsqlTdMwC8kzgVi', 0, 2, '2018-08-03 13:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `login_rights_group`
--

CREATE TABLE `login_rights_group` (
  `login_rights_group_id` int(11) NOT NULL,
  `menu_group_id` int(11) NOT NULL,
  `other_rights_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_rights_group`
--

INSERT INTO `login_rights_group` (`login_rights_group_id`, `menu_group_id`, `other_rights_group_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'med1', '2018-09-14 05:06:07', '0000-00-00 00:00:00'),
(2, 'med2', '2018-09-14 05:06:11', '0000-00-00 00:00:00'),
(3, 'med3', '2018-09-14 05:06:16', '0000-00-00 00:00:00'),
(4, 'med4', '2018-09-14 05:06:19', '0000-00-00 00:00:00'),
(5, 'med5', '2018-09-14 05:06:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_item`
--

CREATE TABLE `medicine_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_item`
--

INSERT INTO `medicine_item` (`id`, `name`, `description`, `medicine_id`, `created_at`, `updated_at`) VALUES
(1, 'item1', 'item description now', 1, '2018-09-14 05:43:57', '0000-00-00 00:00:00'),
(2, 'item2', '', 2, '2018-09-14 05:11:38', '0000-00-00 00:00:00'),
(3, 'item3', '', 1, '2018-09-14 05:11:43', '0000-00-00 00:00:00'),
(4, 'item4', '', 4, '2018-09-14 05:38:54', '0000-00-00 00:00:00'),
(5, 'item5', '', 3, '2018-09-14 05:11:55', '0000-00-00 00:00:00'),
(6, 'item6', '', 5, '2018-09-14 05:38:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `menu_name` varchar(50) NOT NULL,
  `func_called` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `parent_id`, `menu_name`, `func_called`, `class`, `created_by`, `creation_time`, `status`) VALUES
(1, NULL, 'Profile', '', 'fas fa-angle-down', 1, '2018-09-19 12:45:39', 1),
(2, 1, 'Profession', 'profession', '', 1, '2018-09-19 12:53:00', 1),
(3, 1, 'District', 'diestrict', '', 1, '2018-09-19 05:07:56', 1),
(4, 1, 'History', 'history', '', 1, '2018-09-19 05:08:35', 1),
(5, NULL, 'Clinical', 'clinical', 'fas fa-angle-down', 1, '2018-09-19 12:45:45', 1),
(6, 5, 'Examination', 'examination', '', 1, '2018-09-19 05:11:19', 1),
(7, 5, 'Investigation', 'investigation', '', 1, '2018-09-19 05:14:40', 1),
(8, 5, 'Angio Recommendations', 'recommendation', '', 1, '2018-09-19 05:15:28', 1),
(9, 5, 'Instructions', 'instruction', '', 1, '2018-09-19 13:19:43', 1),
(10, 5, 'Medicine', 'medicine', '', 1, '2018-09-19 05:16:39', 1),
(11, 5, 'Echo', 'echo_index', '', 1, '2018-09-19 13:32:14', 1),
(12, 5, 'ETT', 'ett', '', 1, '2018-09-19 05:17:36', 1),
(13, NULL, 'Setting', 'setting', 'fas fa-angle-down', 1, '2018-09-19 12:45:48', 1),
(14, 13, 'Advice', 'advice', '', 1, '2018-09-19 05:19:57', 1),
(15, 13, 'Research', 'research', '', 1, '2018-09-19 05:22:46', 1),
(16, 13, 'Manages Research', 'manage_research', '', 1, '2018-09-19 05:22:46', 1),
(17, 13, 'Register New User', 'register_user', '', 1, '2018-09-19 05:22:46', 1),
(18, 13, 'Change Permissions', 'permission', '', 1, '2018-09-19 05:26:26', 1),
(19, 13, 'Delete Patient', 'delete_patient', '', 1, '2018-09-19 05:26:26', 1),
(20, 13, 'Limiter', 'limiter', '', 1, '2018-09-19 05:26:26', 1),
(21, 13, 'Laboratory Test', 'laboratory_test', '', 1, '2018-09-19 05:26:26', 1),
(22, 13, 'Special Instructions', 'special_instructions', '', 1, '2018-09-19 05:26:26', 1),
(23, 13, 'Doctor Signature', 'signature', '', 1, '2018-09-19 05:26:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_group`
--

CREATE TABLE `menu_group` (
  `menu_group_id` int(11) NOT NULL,
  `menu_group_name` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_group`
--

INSERT INTO `menu_group` (`menu_group_id`, `menu_group_name`, `created_by`, `creation_time`, `status`) VALUES
(1, 'Admin', 1, '2018-09-19 05:53:38', 1),
(2, 'Test', 1, '2018-09-19 10:54:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_group_detail`
--

CREATE TABLE `menu_group_detail` (
  `menu_group_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_group_detail`
--

INSERT INTO `menu_group_detail` (`menu_group_id`, `menu_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23);

-- --------------------------------------------------------

--
-- Table structure for table `other_rights`
--

CREATE TABLE `other_rights` (
  `other_rights_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `other_rights_name` varchar(50) NOT NULL,
  `func_called` varchar(100) NOT NULL,
  `class` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_rights`
--

INSERT INTO `other_rights` (`other_rights_id`, `parent_id`, `other_rights_name`, `func_called`, `class`, `created_by`, `creation_time`, `status`) VALUES
(1, 0, '', '', '', 1, '2018-09-19 09:34:03', 1),
(2, 1, 'profile', '', 'create_new_profile', 1, '2018-09-19 10:44:29', 1),
(3, 1, 'profile', '', 'edit_profile', 1, '2018-09-19 08:15:42', 1),
(4, 1, 'profile', '', 'delete_profile', 1, '2018-09-19 10:45:18', 1),
(5, 0, 'appointments', '', '', 1, '2018-09-19 11:01:57', 1),
(6, 5, 'appointments', '', 'on_call', 1, '2018-09-19 11:02:34', 1),
(7, 5, 'appointments', '', 'onwalk', 1, '2018-09-19 11:03:00', 1),
(8, 5, 'appointments', '', 'print', 1, '2018-09-19 11:03:36', 1),
(9, 5, 'appointments', '', 'mark_status', 1, '2018-09-19 11:04:30', 1),
(10, 5, 'appointments', '', 'view_wallet', 1, '2018-09-19 11:05:21', 1),
(11, 5, 'appointments', '', 'can_edit', 1, '2018-09-19 11:10:28', 1),
(12, 5, 'appointment', '', 'can_delete', 1, '2018-09-19 11:10:28', 1),
(13, 5, 'appointments', '', 'can_consult', 1, '2018-09-19 11:22:04', 1),
(14, 5, 'appointments', '', 'can_complete', 1, '2018-09-19 11:52:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `other_rights_group`
--

CREATE TABLE `other_rights_group` (
  `other_rights_group_id` int(11) NOT NULL,
  `other_rights_group_name` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_rights_group`
--

INSERT INTO `other_rights_group` (`other_rights_group_id`, `other_rights_group_name`, `created_by`, `creation_time`, `status`) VALUES
(1, 'admin', 1, '2018-09-19 09:35:23', 1),
(2, 'test', 1, '2018-09-19 10:54:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `other_rights_group_detail`
--

CREATE TABLE `other_rights_group_detail` (
  `other_rights_group_id` int(11) NOT NULL,
  `other_rights_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_rights_group_detail`
--

INSERT INTO `other_rights_group_detail` (`other_rights_group_id`, `other_rights_id`, `status`) VALUES
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(1, 11, 1),
(1, 12, 1),
(2, 1, 0),
(2, 2, 0),
(2, 3, 0),
(2, 4, 0),
(2, 5, 0),
(2, 6, 0),
(2, 7, 0),
(2, 8, 0),
(2, 9, 0),
(2, 10, 0),
(2, 11, 0),
(2, 12, 0),
(1, 13, 1),
(2, 13, 0),
(1, 14, 1),
(2, 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_profile`
--

CREATE TABLE `patient_profile` (
  `id` int(11) NOT NULL,
  `pat_name` varchar(255) NOT NULL,
  `pat_relative` varchar(255) NOT NULL,
  `pat_age` varchar(100) NOT NULL,
  `pat_profession` varchar(100) NOT NULL,
  `pat_sex` varchar(20) NOT NULL,
  `pat_contact` varchar(255) NOT NULL,
  `pat_height` int(5) NOT NULL,
  `pat_weight` int(5) NOT NULL,
  `pat_bmi` int(5) NOT NULL,
  `pat_bsa` int(5) NOT NULL,
  `pat_email` varchar(255) NOT NULL,
  `pat_district` varchar(100) NOT NULL,
  `pat_address` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profession_tbl`
--

CREATE TABLE `profession_tbl` (
  `profession_id` int(11) NOT NULL,
  `profession_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profession_tbl`
--

INSERT INTO `profession_tbl` (`profession_id`, `profession_name`) VALUES
(1, 'accountant'),
(2, 'actor'),
(3, 'actress'),
(4, 'air traffic controller'),
(5, 'architect'),
(6, 'artist'),
(7, 'attorney'),
(8, 'banker'),
(10, 'barber'),
(11, 'bookkeeper'),
(12, 'builder'),
(13, 'businessman'),
(14, 'businesswoman'),
(15, 'businessperson'),
(16, 'butcher'),
(17, 'carpenter'),
(18, 'cashier'),
(19, 'chef'),
(20, 'coach'),
(21, 'dental hygienist'),
(22, 'dentist'),
(23, 'designer'),
(24, 'developer'),
(25, 'dietician'),
(26, 'doctor'),
(27, 'economist'),
(28, 'editor'),
(29, 'electrician'),
(30, 'engineer'),
(32, 'student'),
(33, 'dfdfg');

-- --------------------------------------------------------

--
-- Table structure for table `profile_history`
--

CREATE TABLE `profile_history` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_history`
--

INSERT INTO `profile_history` (`id`, `name`, `description`, `created at`, `updated at`) VALUES
(1, 'h1', 'hhhh', '2018-09-18 10:49:59', '0000-00-00 00:00:00'),
(2, 'h2', 'dsdfs', '2018-09-18 10:50:04', '0000-00-00 00:00:00'),
(3, 'h3', 'dfgdfgdf', '2018-09-18 10:50:08', '0000-00-00 00:00:00'),
(4, 'h4', 'sdfsd', '2018-09-18 10:50:11', '0000-00-00 00:00:00'),
(5, 'h5', 'sdfsdf', '2018-09-18 10:50:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `recommendation`
--

CREATE TABLE `recommendation` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommendation`
--

INSERT INTO `recommendation` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'rec1', '2018-09-13 10:07:11', '0000-00-00 00:00:00'),
(2, 'rec2', '2018-09-19 13:16:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'research1', 'hhhh', '2018-09-13 04:48:47', '0000-00-00 00:00:00'),
(2, 'research2', 'dddd', '2018-09-13 04:47:54', '0000-00-00 00:00:00'),
(3, 'research3', 'sdfsdf', '2018-09-19 13:50:15', '0000-00-00 00:00:00'),
(4, 'research4', 'sdfsdf', '2018-09-19 13:50:06', '0000-00-00 00:00:00'),
(5, 'research5', '', '2018-09-11 08:14:20', '0000-00-00 00:00:00'),
(6, 'research6', 'sssdy', '2018-09-11 09:10:27', '0000-00-00 00:00:00'),
(7, 'research7', '', '2018-09-11 08:14:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `structure`
--

CREATE TABLE `structure` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `structure`
--

INSERT INTO `structure` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'st1', '2018-09-15 06:59:36', '0000-00-00 00:00:00'),
(2, 'st2', '2018-09-17 06:27:45', '0000-00-00 00:00:00'),
(3, 'st3', '2018-09-15 06:59:46', '0000-00-00 00:00:00'),
(8, 'st5', '2018-09-15 07:09:08', '0000-00-00 00:00:00'),
(9, 'st6', '2018-09-15 07:12:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `structure_finding`
--

CREATE TABLE `structure_finding` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `structure_id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `structure_finding`
--

INSERT INTO `structure_finding` (`id`, `name`, `structure_id`, `disease_id`, `created_at`, `updated_at`) VALUES
(1, 'st1f1', 1, 0, '2018-09-18 05:06:46', '0000-00-00 00:00:00'),
(2, 'st1f1', 1, 1, '2018-09-18 05:06:46', '0000-00-00 00:00:00'),
(3, 'st1f3', 1, 0, '2018-09-17 06:11:32', '0000-00-00 00:00:00'),
(4, 'st1f4', 1, 0, '2018-09-17 07:57:22', '0000-00-00 00:00:00'),
(5, 'st2f1', 2, 0, '2018-09-17 06:11:53', '0000-00-00 00:00:00'),
(6, 'st2f2', 2, 0, '2018-09-18 05:33:56', '0000-00-00 00:00:00'),
(7, 'st2f3', 2, 0, '2018-09-18 05:34:13', '0000-00-00 00:00:00'),
(10, 'f1', 3, 0, '2018-09-17 06:34:38', '0000-00-00 00:00:00'),
(11, 'f2', 3, 0, '2018-09-17 06:48:53', '0000-00-00 00:00:00'),
(12, 'f3', 3, 2, '2018-09-18 05:04:37', '0000-00-00 00:00:00'),
(13, 'f4', 3, 0, '2018-09-17 06:49:00', '0000-00-00 00:00:00'),
(15, 'f1', 8, 0, '2018-09-17 06:54:46', '0000-00-00 00:00:00'),
(16, 'f2', 8, 0, '2018-09-17 06:54:50', '0000-00-00 00:00:00'),
(17, 'f3', 8, 0, '2018-09-17 06:54:53', '0000-00-00 00:00:00'),
(18, 'f4', 8, 0, '2018-09-17 06:54:55', '0000-00-00 00:00:00'),
(20, 'f1', 9, 0, '2018-09-17 07:07:57', '0000-00-00 00:00:00'),
(22, 'f2', 9, 0, '2018-09-17 07:11:00', '0000-00-00 00:00:00'),
(23, 'f3', 9, 0, '2018-09-17 07:11:02', '0000-00-00 00:00:00'),
(28, 'st2f4', 2, 2, '2018-09-18 05:34:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_priviliges`
--

CREATE TABLE `user_priviliges` (
  `id` int(11) NOT NULL,
  `menu_group_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_right`
--

CREATE TABLE `user_right` (
  `user_right_id` int(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advice`
--
ALTER TABLE `advice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advice_item`
--
ALTER TABLE `advice_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_booking`
--
ALTER TABLE `appointment_booking`
  ADD PRIMARY KEY (`appointment_booking_id`);

--
-- Indexes for table `booking_limiter`
--
ALTER TABLE `booking_limiter`
  ADD PRIMARY KEY (`limiter_id`);

--
-- Indexes for table `category_measurement`
--
ALTER TABLE `category_measurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts_tbl`
--
ALTER TABLE `districts_tbl`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `dosage`
--
ALTER TABLE `dosage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `echo_category`
--
ALTER TABLE `echo_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ett_conclusion`
--
ALTER TABLE `ett_conclusion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ett_description`
--
ALTER TABLE `ett_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ett_ending_reason`
--
ALTER TABLE `ett_ending_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ett_protocols`
--
ALTER TABLE `ett_protocols`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ett_protocol_details`
--
ALTER TABLE `ett_protocol_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ett_test_reason`
--
ALTER TABLE `ett_test_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examination_item`
--
ALTER TABLE `examination_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_item`
--
ALTER TABLE `history_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instruction`
--
ALTER TABLE `instruction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instruction_item`
--
ALTER TABLE `instruction_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investigation`
--
ALTER TABLE `investigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investigation_item`
--
ALTER TABLE `investigation_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_category`
--
ALTER TABLE `lab_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_test_item`
--
ALTER TABLE `lab_test_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `login_rights_group`
--
ALTER TABLE `login_rights_group`
  ADD PRIMARY KEY (`login_rights_group_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_item`
--
ALTER TABLE `medicine_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_group`
--
ALTER TABLE `menu_group`
  ADD PRIMARY KEY (`menu_group_id`);

--
-- Indexes for table `other_rights`
--
ALTER TABLE `other_rights`
  ADD PRIMARY KEY (`other_rights_id`);

--
-- Indexes for table `other_rights_group`
--
ALTER TABLE `other_rights_group`
  ADD PRIMARY KEY (`other_rights_group_id`);

--
-- Indexes for table `patient_profile`
--
ALTER TABLE `patient_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profession_tbl`
--
ALTER TABLE `profession_tbl`
  ADD PRIMARY KEY (`profession_id`);

--
-- Indexes for table `profile_history`
--
ALTER TABLE `profile_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendation`
--
ALTER TABLE `recommendation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `structure_finding`
--
ALTER TABLE `structure_finding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_priviliges`
--
ALTER TABLE `user_priviliges`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advice`
--
ALTER TABLE `advice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `advice_item`
--
ALTER TABLE `advice_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `appointment_booking`
--
ALTER TABLE `appointment_booking`
  MODIFY `appointment_booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `booking_limiter`
--
ALTER TABLE `booking_limiter`
  MODIFY `limiter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_measurement`
--
ALTER TABLE `category_measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `districts_tbl`
--
ALTER TABLE `districts_tbl`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `dosage`
--
ALTER TABLE `dosage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `echo_category`
--
ALTER TABLE `echo_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ett_conclusion`
--
ALTER TABLE `ett_conclusion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ett_description`
--
ALTER TABLE `ett_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ett_ending_reason`
--
ALTER TABLE `ett_ending_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ett_protocols`
--
ALTER TABLE `ett_protocols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ett_protocol_details`
--
ALTER TABLE `ett_protocol_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ett_test_reason`
--
ALTER TABLE `ett_test_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `examination_item`
--
ALTER TABLE `examination_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history_item`
--
ALTER TABLE `history_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `instruction`
--
ALTER TABLE `instruction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `instruction_item`
--
ALTER TABLE `instruction_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `investigation`
--
ALTER TABLE `investigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `investigation_item`
--
ALTER TABLE `investigation_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lab_category`
--
ALTER TABLE `lab_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lab_test`
--
ALTER TABLE `lab_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lab_test_item`
--
ALTER TABLE `lab_test_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_rights_group`
--
ALTER TABLE `login_rights_group`
  MODIFY `login_rights_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medicine_item`
--
ALTER TABLE `medicine_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `menu_group`
--
ALTER TABLE `menu_group`
  MODIFY `menu_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `other_rights`
--
ALTER TABLE `other_rights`
  MODIFY `other_rights_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `other_rights_group`
--
ALTER TABLE `other_rights_group`
  MODIFY `other_rights_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profession_tbl`
--
ALTER TABLE `profession_tbl`
  MODIFY `profession_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `profile_history`
--
ALTER TABLE `profile_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recommendation`
--
ALTER TABLE `recommendation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `structure`
--
ALTER TABLE `structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `structure_finding`
--
ALTER TABLE `structure_finding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_priviliges`
--
ALTER TABLE `user_priviliges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
