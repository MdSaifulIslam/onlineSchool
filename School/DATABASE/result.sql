-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2019 at 02:05 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `result`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `query` text NOT NULL,
  `reply` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `query`, `reply`) VALUES
(1, 'Sakil', 'mohammadsaifulcsepstu@gmail.com', 'tghtr', 0),
(2, 'Jamal', 'mohammadsaifulcsepstu@gmail.com', 'sgerg', 0),
(3, 'Subroto', 'mohammadsaifulcsepstu@gmail.com', 'fgjfkufngfbngikuk,', 0),
(4, ' ghjngy', 'gjhn@gagd', 'ghcj', 0);

-- --------------------------------------------------------

--
-- Table structure for table `random`
--

CREATE TABLE `random` (
  `id` int(11) NOT NULL,
  `random` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `random`
--

INSERT INTO `random` (`id`, `random`, `email`) VALUES
(1, 'IL612A4r30', 'mohammadsaifulcsepstu@gmail.com'),
(2, '2rbKlYAEeM', 'mohammadsaifulcsepstu@gmail.com'),
(3, 'EI3malL452', 'mohammadsaifulcsepstu@gmail.com'),
(4, 'aEbGELI180', 'mohammadsaifulcsepstu@gmail.com'),
(5, 'e0MIOAKE4h', 'mohammadsaifulcsepstu@gmail.com'),
(6, '49m08Ysr1b', 'mohammadsaifulcsepstu@gmail.com'),
(7, 'eG25hI3LMa', 'mohammadsaifulcsepstu@gmail.com'),
(8, 'L6EIAeaK1l', 'mohammadsaifulcsepstu@gmail.com'),
(9, 'rIl298m0MY', 'mohammadsaifulcsepstu@gmail.com'),
(10, 'umGI5EAOs1', 'mohammadsaifulcsepstu@gmail.com'),
(11, 'Ie9hrb2mLE', 'mohammadsaifulcsepstu@gmail.com'),
(12, '16asI80LE9', 'mohammadsaifulcsepstu@gmail.com'),
(13, 'L9mhIObMrY', 'mohammadsaifulcsepstu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `event` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`id`, `title`, `event`, `image`, `date`) VALUES
(4, 'Math Olympiad Held ', 'Here is the all about of Math Olympiad.\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad.\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad.\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad.\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad', '02.jpg', '2019-01-18 19:41:41'),
(5, 'Inter National Mother Language Day Held ', 'Here is the all about of Math Olympiad.\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad.\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad.\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad.\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad\r\nHere is the all about of Math Olympiad', '02.jpg', '2019-01-18 19:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE `tbl_file` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_file`
--

INSERT INTO `tbl_file` (`id`, `tid`, `class`, `filename`) VALUES
(1, 2, 1, 'aaa.php'),
(2, 1, 2, 'new 2.txt'),
(3, 1, 2, 'Book1.xls'),
(4, 1, 3, 'MyCalculator.java'),
(5, 1, 1, 'xampp-control.exe'),
(6, 1, 3, 'bitnami.ico'),
(7, 1, 1, 'Book1.xls'),
(8, 1, 3, 'result.sql');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` text NOT NULL,
  `news` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `time`, `title`, `news`) VALUES
(2, '2019-01-16 09:18:29', 'This is news title one', 'Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.\r\nHere Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.\r\n\r\n\r\nHere Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.'),
(3, '2019-01-16 09:18:29', 'This is news title  two', 'Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.\r\nHere Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.\r\n\r\n\r\nHere Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.'),
(4, '2019-01-16 09:18:29', 'This is news title  three', 'Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.\r\nHere Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.\r\n\r\n\r\nHere Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.Here Will be all About news.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `semail` varchar(100) NOT NULL,
  `class` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` int(11) NOT NULL,
  `number` varchar(20) NOT NULL,
  `trid` varchar(255) NOT NULL,
  `approve` int(11) NOT NULL,
  `attach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `semail`, `class`, `roll`, `type`, `date`, `amount`, `number`, `trid`, `approve`, `attach`) VALUES
(6, 'mohammadsaifulcsepstu@gmail.com', 1, 1, 'Fee', '2019-01-12 21:12:20', 1245, '01773241151', 'dsgjm', 1, 0),
(7, 'mohammadsaifulcsepstu@gmail.com', 1, 2, 'Fee', '2019-01-12 21:12:20', 1245, '01773241151', '234324', 1, 0),
(8, 'mohammadsaifulcsepstu@gmail.com', 1, 3, 'Fee', '2019-01-12 21:12:20', 1245, '01773241151', 'dsgjm', 1, 0),
(9, 'mohammadsaifulcsepstu@gmail.com', 1, 4, 'Fee', '2019-01-12 21:12:20', 1245, '01773241151', 'dsgjm', 1, 0),
(10, 'mohammadsaifulcsepstu@gmail.com', 2, 1, 'Fee', '2019-01-12 21:12:20', 1245, '01773241151', 'dsgjm', 1, 0),
(11, 'mohammadsaifulcsepstu@gmail.com', 2, 2, 'Fee', '2019-01-12 21:12:20', 1245, '01773241151', 'dsgjm', 1, 0),
(12, 'mohammadsaifulcsepstu@gmail.com', 2, 3, 'Fee', '2019-01-12 21:12:20', 1245, '01773241151', 'dsgjm', 0, 0),
(13, 'mohammadsaifulcsepstu@gmail.com', 3, 1, 'Fee', '2019-01-12 21:12:20', 1245, '01773241151', 'dsgjm', 0, 0),
(14, 'mohammadsaifulcsepstu@gmail.com', 3, 2, 'Fee', '2019-01-12 21:12:20', 1245, '01773241151', 'dsgjm', 0, 0),
(15, 'mohammadsaifulcsepstu@gmail.com', 3, 3, 'Fee', '2019-01-12 21:12:20', 1245, '01773241151', 'dsgjm', 0, 0),
(16, 'mohammadsaifulcsepstu@gmail.com', 1, 1, 'Fee', '2019-03-07 22:19:46', 124, '01773241151', 'dsgjm', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `tid`, `class`, `title`, `post`, `date`) VALUES
(1, 2, 1, 'asv1', '<p>ghfhiugfdfbvhdfvfgbfgbuybhvjdbjhbbvfhjgbvhkvuiodgfbvkndfiovhuiagfhksdnflkjoifuibfjkdnvoiduyghdfbdkvbduiygbfrvrfvkuyg xcfvdhbkjvhiufgfdsbfusdgufdkbcdsygfbdcjhdvvdfvcvvfjvhjguysgfvuygvfhvfgvdfbvfcvfbfygvfuyvbdcvyurbfvbugdf vdfuygvdrvdfvrfr\r\nghfhiugfdfbvhdfvfgbfgbuybhvjdbjhbbvfhjgbvhkvuiodgfbvkndfiovhuiagfhksdnflkjoifuibfjkdnvoiduyghdfbdkvbduiygbfrvrfvkuyg xcfvdhbkjvhiufgfdsbfusdgufdkbcdsygfbdcjhdvvdfvcvvfjvhjguysgfvuygvfhvfgvdfbvfcvfbfygvfuyvbdcvyurbfvbugdf vdfuygvdrvdfvrfr\r\n\r\nghfhiugfdfbvhdfvfgbfgbuybhvjdbjhbbvfhjgbvhkvuiodgfbvkndfiovhuiagfhksdnflkjoifuibfjkdnvoiduyghdfbdkvbduiygbfrvrfvkuyg xcfvdhbkjvhiufgfdsbfusdgufdkbcdsygfbdcjhdvvdfvcvvfjvhjguysgfvuygvfhvfgvdfbvfcvfbfygvfuyvbdcvyurbfvbugdf vdfuygvdrvdfvrfr\r\n\r\nghfhiugfdfbvhdfvfgbfgbuybhvjdbjhbbvfhjgbvhkvuiodgfbvkndfiovhuiagfhksdnflkjoifuibfjkdnvoiduyghdfbdkvbduiygbfrvrfvkuyg xcfvdhbkjvhiufgfdsbfusdgufdkbcdsygfbdcjhdvvdfvcvvfjvhjguysgfvuygvfhvfgvdfbvfcvfbfygvfuyvbdcvyurbfvbugdf vdfuygvdrvdfvrfr\r\n\r\nghfhiugfdfbvhdfvfgbfgbuybhvjdbjhbbvfhjgbvhkvuiodgfbvkndfiovhuiagfhksdnflkjoifuibfjkdnvoiduyghdfbdkvbduiygbfrvrfvkuyg xcfvdhbkjvhiufgfdsbfusdgufdkbcdsygfbdcjhdvvdfvcvvfjvhjguysgfvuygvfhvfgvdfbvfcvfbfygvfuyvbdcvyurbfvbugdf vdfuygvdrvdfvrfr\r\n</p>\r\n', '2019-01-14 19:07:42'),
(2, 1, 2, 'new title', '   Enter post                 ', '2019-01-14 19:10:03'),
(3, 1, 3, 'sdgfrth', '                    tyjhuyfjk', '2019-01-14 19:12:23'),
(4, 1, 3, 'sdgfrth', '                    tyjhuyfjk', '2019-01-14 19:12:23'),
(5, 2, 1, 'asv2', 'ghfh', '2019-01-14 19:07:42'),
(6, 2, 2, 'asv3', 'ghfh', '2019-01-14 19:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

CREATE TABLE `tbl_result` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `bangla` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `math` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_result`
--

INSERT INTO `tbl_result` (`id`, `roll`, `tid`, `class`, `term`, `time`, `subject`, `bangla`, `english`, `math`) VALUES
(1, 1, 1, 1, 1, 2018, 'bangla', 86, 0, 0),
(2, 2, 1, 1, 1, 2018, 'bangla', 99, 0, 0),
(3, 3, 1, 1, 1, 2018, 'bangla', 66, 0, 0),
(4, 1, 1, 1, 1, 2018, 'english', 0, 86, 0),
(5, 2, 1, 1, 1, 2018, 'english', 0, 99, 0),
(6, 3, 1, 1, 1, 2018, 'english', 0, 66, 0),
(7, 1, 1, 1, 1, 2018, 'math', 0, 0, 86),
(8, 2, 1, 1, 1, 2018, 'math', 0, 0, 99),
(9, 3, 1, 1, 1, 2018, 'math', 0, 0, 66);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `roll`, `class`, `name`, `image`, `email`, `contact`, `Address`, `password`) VALUES
(2, 2, 1, 'sakib', 'Screenshot (1).png', 'saiful12@cse.pstu.ac.bd', '019222222', 'Dumki', 'class12'),
(3, 3, 1, 'Sajjad', 'Screenshot (1).png', 'mdsantoislam.islam.395@gmail.com', '01933333', 'Dumki', 'class13'),
(6, 1, 1, 'Aslam', 'Screenshot (1).png', 'mohammadsaifulcsepstu@gmail.com', '01822222', 'Dumki', 'class11'),
(7, 1, 2, 'Asif Akbar', 'Screenshot (1).png', 'mohammadsaifulcsepstu@gmail.com', '', '', 'class21'),
(8, 2, 2, 'Asif Akbar', 'Screenshot (1).png', 'mdsantoislam.islam.395@gmail.com', '', '', 'class22'),
(9, 3, 2, 'Asif Akbar', 'Screenshot (1).png', 'saiful12@cse.pstu.ac.bd', '', '', 'class23'),
(10, 1, 3, 'Asif Akbar', 'Screenshot (1).png', 'saiful12@cse.pstu.ac.bd', '', '', 'class31'),
(11, 2, 3, 'Asif Akbar', 'Screenshot (1).png', 'mdsantoislam.islam.395@gmail.com', '', '', 'class32'),
(12, 3, 3, 'Asif Akbar', 'Screenshot (1).png', 'mohammadsaifulcsepstu@gmail.com', '', '', 'class33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`id`, `name`, `email`, `contact`, `Address`, `image`, `password`) VALUES
(1, 'Asif', 'mohammadsaifulcsepstu@gmail.com', '017772222', 'patuakhali', 'Screenshot (3).png', '12345'),
(2, 'Shamim', 'saiful12@cse.pstu.ac.bd', '017773333', 'Dhaka', 'Screenshot (3).png', '12345'),
(3, 'KawsarAminNirob', 'mdsantoislam.islam.395@gmail.com', '0177777777', 'Barishal', 'Screenshot (3).png', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ternresult`
--

CREATE TABLE `tbl_ternresult` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `bangla` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `math` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `send` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ternresult`
--

INSERT INTO `tbl_ternresult` (`id`, `roll`, `class`, `term`, `year`, `bangla`, `english`, `math`, `result`, `position`, `pass`, `send`) VALUES
(1, 1, 1, 1, 2018, 86, 86, 86, 258, 2, 'Passed', 0),
(2, 2, 1, 1, 2018, 99, 99, 99, 297, 2, 'Passed', 1),
(3, 3, 1, 1, 2018, 66, 66, 66, 198, 2, 'Passed', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@d.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `random`
--
ALTER TABLE `random`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_result`
--
ALTER TABLE `tbl_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`roll`,`class`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ternresult`
--
ALTER TABLE `tbl_ternresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `random`
--
ALTER TABLE `random`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_result`
--
ALTER TABLE `tbl_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_ternresult`
--
ALTER TABLE `tbl_ternresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
