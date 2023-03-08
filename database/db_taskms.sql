-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 10:18 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_taskms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_child_task`
--

CREATE TABLE `tbl_child_task` (
  `cTask_id` int(8) NOT NULL,
  `ParentTask_id` int(8) DEFAULT NULL,
  `cTask_user_id` int(8) DEFAULT NULL,
  `cTask_title` varchar(32) DEFAULT NULL,
  `cTask_description` varchar(180) DEFAULT NULL,
  `cTask_create_date` date DEFAULT NULL,
  `cTask_create_time` time DEFAULT NULL,
  `cTask_end_date` date DEFAULT NULL,
  `cTask_end_time` time DEFAULT NULL,
  `cTask_activity` char(1) DEFAULT NULL,
  `cTask_update_date` date DEFAULT NULL,
  `cTask_updatetime` time DEFAULT NULL,
  `cTask_completeTIME` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_child_task`
--

INSERT INTO `tbl_child_task` (`cTask_id`, `ParentTask_id`, `cTask_user_id`, `cTask_title`, `cTask_description`, `cTask_create_date`, `cTask_create_time`, `cTask_end_date`, `cTask_end_time`, `cTask_activity`, `cTask_update_date`, `cTask_updatetime`, `cTask_completeTIME`) VALUES
(1, 3, 1, 't1', 't1', '2022-03-03', '03:15:00', '2022-03-03', '04:15:00', 'C', '2022-03-02', '03:16:00', '2022-03-02 22:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parenttask`
--

CREATE TABLE `tbl_parenttask` (
  `pTask_id` int(8) NOT NULL,
  `pTask_user_id` int(8) DEFAULT NULL,
  `pTask_title` varchar(32) DEFAULT NULL,
  `pTask_description` varchar(180) DEFAULT NULL,
  `pTask_create_date` date DEFAULT NULL,
  `pTask_create_time` time DEFAULT NULL,
  `pTask_end_date` date DEFAULT NULL,
  `pTask_end_time` time DEFAULT NULL,
  `pTask_activity` char(1) DEFAULT NULL,
  `pTask_update_date` date DEFAULT NULL,
  `pTask_updatetime` time DEFAULT NULL,
  `pTask_completeTIME` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_parenttask`
--

INSERT INTO `tbl_parenttask` (`pTask_id`, `pTask_user_id`, `pTask_title`, `pTask_description`, `pTask_create_date`, `pTask_create_time`, `pTask_end_date`, `pTask_end_time`, `pTask_activity`, `pTask_update_date`, `pTask_updatetime`, `pTask_completeTIME`) VALUES
(2, 1, 'aaa', 'ccc', '2022-03-03', '03:04:00', '2022-03-04', '04:06:00', 'D', '2022-03-02', '03:07:30', '2022-03-02 22:07:30'),
(3, 1, 'test', 'test', '2022-03-03', '03:13:00', '2022-03-03', '04:13:00', 'A', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(8) NOT NULL,
  `user_fname` varchar(16) DEFAULT NULL,
  `user_lname` varchar(32) DEFAULT NULL,
  `user_email` varchar(64) DEFAULT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  `user_password` varchar(64) DEFAULT NULL,
  `user_activity` char(1) DEFAULT NULL COMMENT 'A=active,D=delete,I=Inactive',
  `user_create_time` datetime DEFAULT NULL,
  `user_update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_phone`, `user_password`, `user_activity`, `user_create_time`, `user_update_time`) VALUES
(1, 'Md', 'Nasim', 'nasim.parvazii@gmail.com', '01720025149', 'DOtsNXUgCPf6mHIehSZigJlJDr3pi5Oq', 'A', '2022-03-02 21:31:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_child_task`
--
ALTER TABLE `tbl_child_task`
  ADD PRIMARY KEY (`cTask_id`);

--
-- Indexes for table `tbl_parenttask`
--
ALTER TABLE `tbl_parenttask`
  ADD PRIMARY KEY (`pTask_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_child_task`
--
ALTER TABLE `tbl_child_task`
  MODIFY `cTask_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_parenttask`
--
ALTER TABLE `tbl_parenttask`
  MODIFY `pTask_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `delete completed` ON SCHEDULE EVERY 1 MINUTE STARTS '2022-03-03 02:50:59' ENDS '2024-03-01 02:50:59' ON COMPLETION NOT PRESERVE ENABLE DO update  tbl_parenttask SET pTask_activity ='D' WHERE pTask_completeTIME < (NOW() - INTERVAL 2 DAY)$$

CREATE DEFINER=`root`@`localhost` EVENT `childTaskDelete` ON SCHEDULE EVERY 1 MINUTE STARTS '2022-03-03 03:11:59' ON COMPLETION NOT PRESERVE ENABLE DO update  tbl_child_task SET cTask_activity ='D' WHERE cTask_completeTIME < (NOW() - INTERVAL 2 DAY)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
