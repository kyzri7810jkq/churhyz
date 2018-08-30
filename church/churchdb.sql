-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2018 at 01:18 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `churchdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `peopletbl`
--

CREATE TABLE `peopletbl` (
  `people_id` int(12) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `spouse` varchar(50) DEFAULT NULL,
  `date_added` varchar(20) NOT NULL,
  `added_by` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peopletbl`
--

INSERT INTO `peopletbl` (`people_id`, `firstname`, `middlename`, `lastname`, `birthday`, `address`, `contact`, `spouse`, `date_added`, `added_by`) VALUES
(1, 'hgjhdgf', 'dhfgj', 'amador', 'jhgjdgfj', 'hjdhgdhj', 'hgjdgfjdh', 'jhgdjgj', '2018-08-30 09:10:09', 0),
(2, 'hgjhdgfjh', 'hdjgfj', 'sdf', 'gjhdgfjhg', 'jdgfdjh', 'jhgdjfhg', 'jhgdjg', '2018-08-30 09:10:26', 0),
(3, 'jhdgjhg', 'gjhsdjhg', 'asdajh', 'jhgdjgf', 'gjhdgjhg', 'hjgjdghjh', 'gjhdgdhgjh', '2018-08-30 09:10:53', 0),
(4, 'jhkdjfhkj', 'jhskdh', 'asd', 'kjhvkdjhk', 'kdjhfkd', 'jhdkjfdhkj', 'kjdhkfjh', '2018-08-30 09:12:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userstbl`
--

CREATE TABLE `userstbl` (
  `user_id` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_added` varchar(50) NOT NULL,
  `role_id` int(12) NOT NULL,
  `branch_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userstbl`
--

INSERT INTO `userstbl` (`user_id`, `username`, `password`, `date_added`, `role_id`, `branch_id`) VALUES
(1, 'sam', '332532dcfaa1cbf61e2a266bd723612c', '', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peopletbl`
--
ALTER TABLE `peopletbl`
  ADD PRIMARY KEY (`people_id`);

--
-- Indexes for table `userstbl`
--
ALTER TABLE `userstbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peopletbl`
--
ALTER TABLE `peopletbl`
  MODIFY `people_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userstbl`
--
ALTER TABLE `userstbl`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
