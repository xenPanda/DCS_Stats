-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 12:58 AM
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

--
-- Dumping data for table `airframe_stats`
--

INSERT INTO `airframe_stats` (`airframe`, `playerid`, `total_time`, `air_time`, `pilot_deaths`, `crash_deaths`, `ejection_deaths`) VALUES
('F-14B', 'd0d05373438ed1f751df1bfa56652e25', 4312.4038, 3141.7070, 0, 0, 0),
('FA-18C_hornet', '2c84ce2b2cfed6fa7cf5bf273eeb0b30', 74242.6250, 56459.1523, 10, 9, 0),
('FA-18C_hornet', '3e76131dca1d1c1d4c52c0d9a33612f1', 9054.2520, 5732.7910, 0, 0, 0),
('FA-18C_hornet', '444d9d41fdd42b10e83e3a57bc199870', 19350.4375, 15198.5439, 0, 0, 0),
('FA-18C_hornet', '485d8bd5d5fb19beb1e2c6430e4fb966', 20120.7441, 16909.2754, 0, 1, 0),
('FA-18C_hornet', '595190fc243385d744b1cc3117ba9ff1', 10766.3740, 8025.1338, 0, 0, 0),
('FA-18C_hornet', '8502672f5e3b83d5be49924a5ddc129f', 31126.1641, 24052.9922, 1, 1, 0),
('FA-18C_hornet', 'bb369ece022304521617dea849e36697', 6243.9302, 4112.5132, 0, 0, 0),
('FA-18C_hornet', 'd0d05373438ed1f751df1bfa56652e25', 20993.3398, 17081.5078, 0, 0, 0),
('FA-18C_hornet', 'd0f014d4b248d778f6107883007b9f6b', 2200.8740, 2200.8740, 1, 0, 0),
('FA-18C_hornet', 'd3378b4e056070b9bc7af236cf02f151', 21441.3730, 16119.0596, 0, 0, 0),
('FA-18C_hornet', 'e02ec783bd6fba9500cc6bd9b0f998cb', 27025.9902, 21393.4219, 1, 1, 0),
('FA-18C_hornet', 'e6d2c091cb174ca4d9af20918b8392d9', 10934.8809, 6863.1982, 1, 1, 0),
('FA-18C_hornet', 'e81b882c29639302ef8661626ce87658', 5203.1108, 3872.4131, 0, 0, 0),
('FA-18C_hornet', 'ee7b0f5da263b7cb0166ec6681c39c68', 6894.6528, 4673.3550, 0, 0, 0),
('FA-18C_hornet', 'f1b82866bc1ba54356a706b1fa1f7827', 8635.3877, 7424.7578, 0, 0, 0);

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

--
-- Dumping data for table `kills`
--

INSERT INTO `kills` (`playerid`, `airframe`, `kill_type`, `kill_sub_type`, `kill_no`) VALUES
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 'Ground Units', 'EWR', 1),
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 'Ground Units', 'SAM', 6),
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 'Ground Units', 'Unarmored', 1),
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 'GroundUnits', 'EWR', 1),
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 'GroundUnits', 'SAM', 6),
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 'GroundUnits', 'Unarmored', 1),
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 'Planes', 'Bombers', 2),
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 'Planes', 'Fighters', 2),
('444d9d41fdd42b10e83e3a57bc199870', 'FA-18C_hornet', 'Ground Units', 'SAM', 1),
('444d9d41fdd42b10e83e3a57bc199870', 'FA-18C_hornet', 'GroundUnits', 'SAM', 1),
('444d9d41fdd42b10e83e3a57bc199870', 'FA-18C_hornet', 'GroundUnits', 'Unarmored', 3),
('485d8bd5d5fb19beb1e2c6430e4fb966', 'FA-18C_hornet', 'Buildings', 'Static', 4),
('485d8bd5d5fb19beb1e2c6430e4fb966', 'FA-18C_hornet', 'GroundUnits', 'APCs', 4),
('485d8bd5d5fb19beb1e2c6430e4fb966', 'FA-18C_hornet', 'Planes', 'Fighters', 1),
('595190fc243385d744b1cc3117ba9ff1', 'FA-18C_hornet', 'Ground Units', 'SAM', 1),
('595190fc243385d744b1cc3117ba9ff1', 'FA-18C_hornet', 'GroundUnits', 'SAM', 1),
('8502672f5e3b83d5be49924a5ddc129f', 'FA-18C_hornet', 'Ground Units', 'Infantry', 11),
('8502672f5e3b83d5be49924a5ddc129f', 'FA-18C_hornet', 'Ground Units', 'SAM', 2),
('8502672f5e3b83d5be49924a5ddc129f', 'FA-18C_hornet', 'GroundUnits', 'Infantry', 11),
('8502672f5e3b83d5be49924a5ddc129f', 'FA-18C_hornet', 'GroundUnits', 'SAM', 2),
('8502672f5e3b83d5be49924a5ddc129f', 'FA-18C_hornet', 'Helicopters', 'Utility', 2),
('d0d05373438ed1f751df1bfa56652e25', 'F-14B', 'Planes', 'Attack', 3),
('d0d05373438ed1f751df1bfa56652e25', 'F-14B', 'Planes', 'Fighters', 3),
('d0d05373438ed1f751df1bfa56652e25', 'FA-18C_hornet', 'Buildings', 'Static', 1),
('d0d05373438ed1f751df1bfa56652e25', 'FA-18C_hornet', 'Planes', 'Fighters', 7),
('d0f014d4b248d778f6107883007b9f6b', 'FA-18C_hornet', 'Planes', 'Fighters', 1),
('d3378b4e056070b9bc7af236cf02f151', 'FA-18C_hornet', 'Ground Units', 'SAM', 1),
('d3378b4e056070b9bc7af236cf02f151', 'FA-18C_hornet', 'GroundUnits', 'SAM', 1),
('e02ec783bd6fba9500cc6bd9b0f998cb', 'FA-18C_hornet', 'Ground Units', 'SAM', 2),
('e02ec783bd6fba9500cc6bd9b0f998cb', 'FA-18C_hornet', 'Ground Units', 'Unarmored', 1),
('e02ec783bd6fba9500cc6bd9b0f998cb', 'FA-18C_hornet', 'GroundUnits', 'AAA', 1),
('e02ec783bd6fba9500cc6bd9b0f998cb', 'FA-18C_hornet', 'GroundUnits', 'SAM', 2),
('e02ec783bd6fba9500cc6bd9b0f998cb', 'FA-18C_hornet', 'GroundUnits', 'Unarmored', 1),
('e02ec783bd6fba9500cc6bd9b0f998cb', 'FA-18C_hornet', 'Helicopters', 'Utility', 2),
('e02ec783bd6fba9500cc6bd9b0f998cb', 'FA-18C_hornet', 'Planes', 'Fighters', 8),
('e6d2c091cb174ca4d9af20918b8392d9', 'FA-18C_hornet', 'GroundUnits', 'APCs', 3),
('e6d2c091cb174ca4d9af20918b8392d9', 'FA-18C_hornet', 'GroundUnits', 'Unarmored', 1),
('ee7b0f5da263b7cb0166ec6681c39c68', 'FA-18C_hornet', 'Planes', 'Fighters', 1);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `playername` varchar(50) NOT NULL,
  `id` varchar(32) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`playername`, `id`, `created`, `updated`) VALUES
('CSG-3|Panda|312', '2c84ce2b2cfed6fa7cf5bf273eeb0b30', '2020-10-22', '2020-10-22'),
('CSG-3|TAZER|301', '3e76131dca1d1c1d4c52c0d9a33612f1', '2020-10-22', '2020-10-22'),
('CSG-3|Caveman|314', '444d9d41fdd42b10e83e3a57bc199870', '2020-10-22', '2020-10-22'),
('CSG-3|MAC|306', '485d8bd5d5fb19beb1e2c6430e4fb966', '2020-10-22', '2020-10-22'),
('CSG-3|Yip-Yip|310', '595190fc243385d744b1cc3117ba9ff1', '2020-10-22', '2020-10-22'),
('CSG-3.CaptBob311', '8502672f5e3b83d5be49924a5ddc129f', '2020-10-22', '2020-10-22'),
('CSG-3|Pancake|302', 'bb369ece022304521617dea849e36697', '2020-10-22', '2020-10-22'),
('CSG-3|Jasper|305', 'd0d05373438ed1f751df1bfa56652e25', '2020-10-22', '2020-10-22'),
('CSG-3|Wazir|011', 'd0f014d4b248d778f6107883007b9f6b', '2020-10-22', '2020-10-22'),
('CSG-3|Lucky|315', 'd3378b4e056070b9bc7af236cf02f151', '2020-10-22', '2020-10-22'),
('CSG-3|Zerostar|309', 'e02ec783bd6fba9500cc6bd9b0f998cb', '2020-10-22', '2020-10-22'),
('CSG-3|Karma|012', 'e6d2c091cb174ca4d9af20918b8392d9', '2020-10-22', '2020-10-22'),
('CSG-3|Whirly|205', 'e81b882c29639302ef8661626ce87658', '2020-10-22', '2020-10-22'),
('CSG-3|Flyspud|014', 'ee7b0f5da263b7cb0166ec6681c39c68', '2020-10-22', '2020-10-22'),
('CSG-3|Zoran|010', 'f1b82866bc1ba54356a706b1fa1f7827', '2020-10-22', '2020-10-22');

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

--
-- Dumping data for table `pvp`
--

INSERT INTO `pvp` (`playerid`, `airframe`, `result`, `number`) VALUES
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 'losses', 1),
('485d8bd5d5fb19beb1e2c6430e4fb966', 'FA-18C_hornet', 'kills', 1),
('485d8bd5d5fb19beb1e2c6430e4fb966', 'FA-18C_hornet', 'losses', 1),
('8502672f5e3b83d5be49924a5ddc129f', 'FA-18C_hornet', 'losses', 1),
('e02ec783bd6fba9500cc6bd9b0f998cb', 'FA-18C_hornet', 'kills', 2);

-- --------------------------------------------------------

--
-- Table structure for table `traps`
--

CREATE TABLE `traps` (
  `playerid` varchar(32) NOT NULL,
  `airframe` varchar(30) NOT NULL,
  `trap_no` int(10) NOT NULL,
  `wire` int(10) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `traps`
--

INSERT INTO `traps` (`playerid`, `airframe`, `trap_no`, `wire`, `grade`, `comment`, `date`) VALUES
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 1, 2, 'C', 'WX  (NX)  (DLX)  _LULIM_  3PTSIW  _EGIW_  WIRE# 2[BC]', '2020-09-12'),
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 2, 3, 'C', 'LOIM  _LOIC_  _LULIC_  WO(AFU)TL  (LLIW)  (EGIW)  WIRE# 3[BC]', '2020-09-12');

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
-- Dumping data for table `weapons`
--

INSERT INTO `weapons` (`playerid`, `airframe`, `weapon`, `hit`, `kills`, `shot`, `numHits`) VALUES
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 'AGM-88C', 0, 8, 15, 18),
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 'AIM-120C', 0, 3, 21, 5),
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 'AIM-9M', 0, 1, 1, 2),
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 'AIM-9X', 0, 0, 4, 1),
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 'kamikaze', 0, 0, 0, 0),
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 'M-61', 0, 0, 584, 0),
('2c84ce2b2cfed6fa7cf5bf273eeb0b30', 'FA-18C_hornet', 'Mk-82', 0, 0, 16, 3),
('3e76131dca1d1c1d4c52c0d9a33612f1', 'FA-18C_hornet', 'Mk-82Y', 0, 0, 4, 0),
('444d9d41fdd42b10e83e3a57bc199870', 'FA-18C_hornet', 'AGM-88C', 0, 1, 2, 1),
('444d9d41fdd42b10e83e3a57bc199870', 'FA-18C_hornet', 'Mk-20 Rockeye', 0, 0, 2, 0),
('444d9d41fdd42b10e83e3a57bc199870', 'FA-18C_hornet', 'Mk-20Rockeye', 0, 0, 2, 0),
('444d9d41fdd42b10e83e3a57bc199870', 'FA-18C_hornet', 'Mk-82Y', 0, 3, 6, 27),
('485d8bd5d5fb19beb1e2c6430e4fb966', 'FA-18C_hornet', 'AIM-120C', 0, 1, 6, 1),
('485d8bd5d5fb19beb1e2c6430e4fb966', 'FA-18C_hornet', 'AIM-9X', 0, 0, 1, 0),
('485d8bd5d5fb19beb1e2c6430e4fb966', 'FA-18C_hornet', 'kamikaze', 0, 4, 0, 8),
('485d8bd5d5fb19beb1e2c6430e4fb966', 'FA-18C_hornet', 'Mk-82', 0, 4, 12, 37),
('595190fc243385d744b1cc3117ba9ff1', 'FA-18C_hornet', 'AGM-88C', 0, 0, 1, 1),
('595190fc243385d744b1cc3117ba9ff1', 'FA-18C_hornet', 'Mk-20 Rockeye', 0, 1, 2, 4),
('595190fc243385d744b1cc3117ba9ff1', 'FA-18C_hornet', 'Mk-20Rockeye', 0, 1, 2, 4),
('8502672f5e3b83d5be49924a5ddc129f', 'FA-18C_hornet', 'AGM-154C', 0, 2, 4, 11),
('8502672f5e3b83d5be49924a5ddc129f', 'FA-18C_hornet', 'AGM-88C', 0, 13, 4, 39),
('8502672f5e3b83d5be49924a5ddc129f', 'FA-18C_hornet', 'AIM-120C', 0, 0, 7, 0),
('8502672f5e3b83d5be49924a5ddc129f', 'FA-18C_hornet', 'Mk-82Y', 0, 0, 4, 0),
('bb369ece022304521617dea849e36697', 'FA-18C_hornet', 'Mk-82', 0, 0, 4, 0),
('d0d05373438ed1f751df1bfa56652e25', 'F-14B', 'AIM-9M', 0, 3, 4, 4),
('d0d05373438ed1f751df1bfa56652e25', 'F-14B', 'AIM_54C_Mk47', 0, 3, 4, 4),
('d0d05373438ed1f751df1bfa56652e25', 'F-14B', 'M-61A1', 0, 0, 28, 0),
('d0d05373438ed1f751df1bfa56652e25', 'FA-18C_hornet', 'AIM-120C', 3, 7, 10, 7),
('d0d05373438ed1f751df1bfa56652e25', 'FA-18C_hornet', 'kamikaze', 0, 1, 0, 1),
('d0d05373438ed1f751df1bfa56652e25', 'FA-18C_hornet', 'Mk-82 SnakeEye', 0, 0, 6, 0),
('d0d05373438ed1f751df1bfa56652e25', 'FA-18C_hornet', 'Mk-82SnakeEye', 0, 0, 6, 0),
('d0d05373438ed1f751df1bfa56652e25', 'FA-18C_hornet', 'Mk-82Y', 0, 0, 4, 0),
('d0f014d4b248d778f6107883007b9f6b', 'FA-18C_hornet', 'AIM-120C', 0, 1, 4, 2),
('d0f014d4b248d778f6107883007b9f6b', 'FA-18C_hornet', 'M-61', 0, 0, 146, 0),
('d3378b4e056070b9bc7af236cf02f151', 'FA-18C_hornet', 'AIM-120C', 0, 0, 2, 2),
('d3378b4e056070b9bc7af236cf02f151', 'FA-18C_hornet', 'Mk-20 Rockeye', 0, 1, 2, 1),
('d3378b4e056070b9bc7af236cf02f151', 'FA-18C_hornet', 'Mk-20Rockeye', 0, 1, 2, 1),
('d3378b4e056070b9bc7af236cf02f151', 'FA-18C_hornet', 'Mk-82', 0, 0, 6, 9),
('e02ec783bd6fba9500cc6bd9b0f998cb', 'FA-18C_hornet', 'AGM-154C', 0, 2, 4, 23),
('e02ec783bd6fba9500cc6bd9b0f998cb', 'FA-18C_hornet', 'AGM-88C', 0, 2, 1, 2),
('e02ec783bd6fba9500cc6bd9b0f998cb', 'FA-18C_hornet', 'AIM-120C', 1, 8, 12, 8),
('e02ec783bd6fba9500cc6bd9b0f998cb', 'FA-18C_hornet', 'AIM-9X', 0, 0, 1, 0),
('e02ec783bd6fba9500cc6bd9b0f998cb', 'FA-18C_hornet', 'M-61', 0, 0, 501, 0),
('e02ec783bd6fba9500cc6bd9b0f998cb', 'FA-18C_hornet', 'Mk-20 Rockeye', 0, 1, 2, 1),
('e02ec783bd6fba9500cc6bd9b0f998cb', 'FA-18C_hornet', 'Mk-20Rockeye', 0, 1, 2, 1),
('e02ec783bd6fba9500cc6bd9b0f998cb', 'FA-18C_hornet', 'Mk-82Y', 0, 1, 4, 2),
('e6d2c091cb174ca4d9af20918b8392d9', 'FA-18C_hornet', 'AGM-154C', 0, 0, 4, 0),
('e6d2c091cb174ca4d9af20918b8392d9', 'FA-18C_hornet', 'Mk-82Y', 0, 4, 6, 8),
('e81b882c29639302ef8661626ce87658', 'FA-18C_hornet', 'Mk-82', 0, 0, 3, 0),
('ee7b0f5da263b7cb0166ec6681c39c68', 'FA-18C_hornet', 'AIM-120C', 0, 1, 4, 2),
('f1b82866bc1ba54356a706b1fa1f7827', 'FA-18C_hornet', 'kamikaze', 0, 0, 0, 0),
('f1b82866bc1ba54356a706b1fa1f7827', 'FA-18C_hornet', 'Mk-82', 0, 0, 6, 0);

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
