-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2019 at 08:31 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

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
(1, 'IL612A4r30', 'mohammadsaifulcsepstu@gmail.com');

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
(3, 'sdgfrth', '                    iuyfyt', '04.jpg', '2019-01-18 19:40:47'),
(4, 'sdgfrth', '                   lkhh ', '02.jpg', '2019-01-18 19:41:41');

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
(6, 1, 1, 'bitnami.ico'),
(7, 1, 1, 'Book1.xls');

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
(1, '2019-01-16 09:09:29', 't1', 'n1'),
(2, '2019-01-16 09:18:29', 'new title', '                 gsg   '),
(3, '2019-01-16 09:18:37', 'new titlegsdg', '                    ghdtyhdtyhfh657y6rtghrth\r\n                    ghdtyhdtyhfh657y6rtghrth\r\n                    ghdtyhdtyhfh657y6rtghrth\r\n                    ghdtyhdtyhfh657y6rtghrth\r\n                    ghdtyhdtyhfh657y6rtghrth\r\n                    ghdtyhdtyhfh657y6rtghrth\r\n                    ghdtyhdtyhfh657y6rtghrth\r\n                    ghdtyhdtyhfh657y6rtghrth\r\n                    ghdtyhdtyhfh657y6rtghrth\r\n                    ghdtyhdtyhfh657y6rtghrth\r\n                    ghdtyhdtyhfh657y6rtghrth\r\n                    ghdtyhdtyhfh657y6rtghrth\r\n                    ghdtyhdtyhfh657y6rtghrth\r\n                    ghdtyhdtyhfh657y6rtghrth\r\n                    ghdtyhdtyhfh657y6rtghrth\r\n                    ghdtyhdtyhfh657y6rtghrth\r\n                    ghdtyhdtyhfh657y6rtghrth\r\n                    ghdtyhdtyhfh657y6rtghrth');

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
(5, 'saiful12@cse.pstu.ac.bd', 1, 2, 'Fee', '2019-01-11 21:12:20', 1245, '01773241151', 'dsgjm', 1, 0),
(6, 'mohammadsaifulcsepstu@gmail.com', 1, 1, 'Fee', '2019-01-12 21:12:20', 1245, '01773241151', 'dsgjm', 0, 0),
(7, 'mohammadsaifulcsepstu@gmail.com', 1, 1, 'Fee', '2019-01-12 21:12:20', 1245, '01773241151', 'dsgjm', 0, 0),
(9, 'saiful12@cse.pstu.ac.bd', 1, 2, 'Fee', '2019-01-11 21:12:20', 1245, '01773241151', 'dsgjm', 1, 0);

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
(2, 1, 4, 'new title', '   Enter post                 ', '2019-01-14 19:10:03'),
(3, 1, 3, 'sdgfrth', '                    tyjhuyfjk', '2019-01-14 19:12:23'),
(4, 1, 3, 'sdgfrth', '                    tyjhuyfjk', '2019-01-14 19:12:23'),
(5, 2, 1, 'asv2', 'ghfh', '2019-01-14 19:07:42'),
(6, 2, 1, 'asv3', 'ghfh', '2019-01-14 19:07:42');

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
(1, 1, 2, 1, 1, 2018, 'bangla', 55, 0, 0),
(2, 2, 2, 1, 1, 2018, 'bangla', 65, 0, 0),
(3, 3, 2, 1, 1, 2018, 'bangla', 75, 0, 0),
(4, 4, 2, 1, 1, 2018, 'bangla', 85, 0, 0),
(5, 5, 2, 1, 1, 2018, 'bangla', 95, 0, 0),
(6, 1, 2, 1, 1, 2018, 'english', 0, 55, 0),
(7, 2, 2, 1, 1, 2018, 'english', 0, 65, 0),
(8, 3, 2, 1, 1, 2018, 'english', 0, 75, 0),
(9, 4, 2, 1, 1, 2018, 'english', 0, 85, 0),
(10, 5, 2, 1, 1, 2018, 'english', 0, 95, 0),
(11, 1, 2, 1, 1, 2018, 'math', 0, 0, 55),
(12, 2, 2, 1, 1, 2018, 'math', 0, 0, 65),
(13, 3, 2, 1, 1, 2018, 'math', 0, 0, 75),
(14, 4, 2, 1, 1, 2018, 'math', 0, 0, 85),
(15, 5, 2, 1, 1, 2018, 'math', 0, 0, 95),
(16, 1, 1, 1, 2, 2018, 'math', 0, 0, 55),
(17, 2, 1, 1, 2, 2018, 'math', 0, 0, 65),
(18, 3, 1, 1, 2, 2018, 'math', 0, 0, 75),
(19, 4, 1, 1, 2, 2018, 'math', 0, 0, 85),
(20, 5, 1, 1, 2, 2018, 'math', 0, 0, 95),
(21, 1, 1, 2, 1, 2018, 'bangla', 55, 0, 0),
(22, 2, 1, 2, 1, 2018, 'bangla', 65, 0, 0),
(23, 3, 1, 2, 1, 2018, 'bangla', 75, 0, 0),
(24, 4, 1, 2, 1, 2018, 'bangla', 85, 0, 0),
(25, 5, 1, 2, 1, 2018, 'bangla', 95, 0, 0),
(26, 1, 1, 1, 2, 2018, 'bangla', 55, 0, 0),
(27, 2, 1, 1, 2, 2018, 'bangla', 65, 0, 0),
(28, 3, 1, 1, 2, 2018, 'bangla', 75, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `roll`, `class`, `name`, `email`, `contact`, `Address`, `password`) VALUES
(1, 1, 1, 'Salma', 'mohammadsaifulcsepstu@gmail.com', '019111111', 'Dumki', '12345'),
(2, 2, 1, 'sakib', 'saiful12@cse.pstu.ac.bd', '019222222', 'Dumki', '12345'),
(3, 3, 1, 'Sajjad', 'mosaifulislamkhan21@gmail.com', '01933333', 'Dumki', '12345'),
(5, 1, 2, 'Salma', 'mohammadsaifulcsepstu@gmail.com', '019111111', 'Dumki', '12345'),
(6, 2, 2, 'Aslam', 'aslam', '01822222', 'Dumki', '12345');

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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`id`, `name`, `email`, `contact`, `Address`, `password`) VALUES
(1, 'Asif', 'asif@d.com', '017772222', 'patuakhali', '12345'),
(2, 'Shamim222', 'shamim@d.com', '017773333', 'Dhaka', '12345');

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
  `pass` int(11) NOT NULL,
  `send` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ternresult`
--

INSERT INTO `tbl_ternresult` (`id`, `roll`, `class`, `term`, `year`, `bangla`, `english`, `math`, `result`, `position`, `pass`, `send`) VALUES
(1, 1, 1, 1, 2018, 55, 55, 55, 165, 2, 1, 0),
(2, 2, 1, 1, 2018, 65, 65, 65, 195, 2, 1, 1),
(3, 3, 1, 1, 2018, 75, 75, 75, 225, 2, 1, 1);

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
(1, 'admin111111', 'admin@d.com', '12345');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `random`
--
ALTER TABLE `random`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_result`
--
ALTER TABLE `tbl_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
