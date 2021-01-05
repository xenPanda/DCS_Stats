-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 07:50 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stats`
--

-- --------------------------------------------------------

--
-- Table structure for table `airframe_stats`
--

CREATE TABLE `airframe_stats` (
  `airframe` varchar(30) NOT NULL,
  `playerid` varchar(32) NOT NULL,
  `total_time` float(12,4) NOT NULL,
  `air_time` float(12,4) NOT NULL,
  `pilot_deaths` int(10) NOT NULL,
  `crash_deaths` int(10) NOT NULL,
  `ejection_deaths` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kills`
--

CREATE TABLE `kills` (
  `playerid` varchar(32) NOT NULL,
  `airframe` varchar(30) NOT NULL,
  `kill_type` varchar(30) NOT NULL,
  `kill_sub_type` varchar(30) NOT NULL,
  `kill_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `playername` varchar(50) NOT NULL,
  `id` varchar(32) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pvp`
--

CREATE TABLE `pvp` (
  `playerid` varchar(32) NOT NULL,
  `airframe` varchar(30) NOT NULL,
  `result` varchar(10) NOT NULL,
  `number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `traps`
--

CREATE TABLE `traps` (
  `playerid` varchar(32) NOT NULL,
  `airframe` varchar(30) NOT NULL,
  `trap_no` int(10) NOT NULL,
  `wire` int(10) NOT NULL,
  `pts` float DEFAULT NULL,
  `grade` varchar(10) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `weapons`
--

CREATE TABLE `weapons` (
  `playerid` varchar(32) NOT NULL,
  `airframe` varchar(30) NOT NULL,
  `weapon` varchar(30) NOT NULL,
  `hit` int(10) NOT NULL,
  `kills` int(10) NOT NULL,
  `shot` int(10) NOT NULL,
  `numHits` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airframe_stats`
--
ALTER TABLE `airframe_stats`
  ADD PRIMARY KEY (`airframe`,`playerid`),
  ADD KEY `playerid` (`playerid`);

--
-- Indexes for table `kills`
--
ALTER TABLE `kills`
  ADD PRIMARY KEY (`playerid`,`airframe`,`kill_type`,`kill_sub_type`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `pvp`
--
ALTER TABLE `pvp`
  ADD PRIMARY KEY (`playerid`,`airframe`,`result`) USING BTREE;

--
-- Indexes for table `traps`
--
ALTER TABLE `traps`
  ADD PRIMARY KEY (`playerid`,`airframe`,`trap_no`);

--
-- Indexes for table `weapons`
--
ALTER TABLE `weapons`
  ADD PRIMARY KEY (`playerid`,`airframe`,`weapon`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `airframe_stats`
--
ALTER TABLE `airframe_stats`
  ADD CONSTRAINT `airframe_stats_ibfk_1` FOREIGN KEY (`playerid`) REFERENCES `players` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
