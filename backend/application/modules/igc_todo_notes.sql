-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2019 at 08:36 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccsnepalcom`
--

-- --------------------------------------------------------

--
-- Table structure for table `igc_todo_notes`
--

CREATE TABLE `igc_todo_notes` (
  `note_id` int(11) NOT NULL,
  `todo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note_detail` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `igc_todo_notes`
--

INSERT INTO `igc_todo_notes` (`note_id`, `todo_id`, `user_id`, `note_detail`, `created`) VALUES
(1, 3, 3, 'helloo\r\ni am working for css nepal', '2019-01-04 07:15:05'),
(2, 3, 3, 'vDvACEf', '2019-01-04 07:24:52'),
(3, 2, 3, 'test notes 1', '2019-01-04 07:43:12'),
(4, 5, 27, 'I a working for bank 1 ', '2019-01-04 07:44:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `igc_todo_notes`
--
ALTER TABLE `igc_todo_notes`
  ADD PRIMARY KEY (`note_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `igc_todo_notes`
--
ALTER TABLE `igc_todo_notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
