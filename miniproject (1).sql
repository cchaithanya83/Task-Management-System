-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 02:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `Email` text NOT NULL,
  `task` text NOT NULL,
  `progress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `user_name`, `Email`, `task`, `progress`) VALUES
(1, 'Charishma', '21d13.charshima@sjec.ac.in', 'Create a database for the project', '40'),
(2, 'Charishma', '21d13.charshima@sjec.ac.in', 'Project Report submission', '50'),
(3, 'Charishma', '21d13.charshima@sjec.ac.in', 'Recheck your work', '30'),
(4, 'Charishma', '21d13.charshima@sjec.ac.in', 'Recheck your work', '30'),
(5, 'Ashburn', '21d09.ashburn@sjec.ac.in', 'Hack college wifi', '2'),
(6, 'Ashburn', '21d09.ashburn@sjec.ac.in', 'Learn to print hello world', '60'),
(7, 'Ashburn', '21d09.ashburn@sjec.ac.in', 'Complete DAA Report', '80'),
(8, 'Ashburn', '21d09.ashburn@sjec.ac.in', 'Complete DAA Report', '80'),
(9, 'Disha', '21d18.disha@sjec.ac.in', 'Build your resume', '74'),
(10, 'Disha', '21d18.disha@sjec.ac.in', 'Add a navigation tab', '62'),
(11, 'Disha', '21d18.disha@sjec.ac.in', 'Change your UPI pin', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`title`, `description`, `status`, `ticket_id`, `username`) VALUES
('Build your resume', 'Is there any specifications to be followed?', 'closed', 17, 'Disha'),
('Navigation tab', 'There seems to be a complication in the system.', 'open', 18, 'Disha'),
('Database', 'Can you share the details to be included in the database.', 'open', 19, 'Charishma'),
('Project report', 'when is the deadline?', 'open', 20, 'Charishma'),
('Hack college wifi', 'Will it be legally accepted?', 'open', 21, 'Ashburn'),
('DAA Report', 'Can you share the specifications', 'open', 22, 'Ashburn'),
('example', 'example', 'open', 23, 'Charishma');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `email`, `password`, `type`) VALUES
(1, 'Charishma', '21d13.charshima@sjec.ac.in', '123456', 'user'),
(2, 'Ashburn', '21d09.ashburn@sjec.ac.in', '123456', 'user'),
(3, 'Disha', '21d18.disha@sjec.ac.in', '123456', 'user'),
(4, 'chaithanya', '21d12.chaithanya@sjec.ac.in', '123456', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
