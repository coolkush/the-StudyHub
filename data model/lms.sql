-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2021 at 02:22 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `cid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `link` varchar(250) DEFAULT NULL,
  `docname` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`cid`, `tid`, `cname`, `type`, `link`, `docname`) VALUES
(1, 1, 'Video lecture 1', 'video', 'https://www.youtube.com/watch?v=l9WtESmtrcM', ''),
(2, 2, 'Video Lecture 2', 'video', 'https://www.youtube.com/watch?v=l9WtESmtrcM', ''),
(4, 1, 'Video lecture 2', 'video', 'https://www.youtube.com/watch?v=bjv3qpjwxAk', ''),
(5, 5, 'Video lecture 1', 'video', 'https://www.youtube.com/watch?v=bjv3qpjwxAk', ''),
(6, 1, 'Document 1', 'document', '', 'normalization.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `contenttype`
--

CREATE TABLE `contenttype` (
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contenttype`
--

INSERT INTO `contenttype` (`type`) VALUES
('document'),
('video');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE `enrolled` (
  `email` varchar(50) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`email`, `sid`) VALUES
('student', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `rolename` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rolename`) VALUES
('admin'),
('student'),
('teacher');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sid` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sid`, `sname`) VALUES
(1, 'teacher added subject 1'),
(2, 'teacher added subject 2'),
(3, 'teacher added subject 3');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `tid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `tname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`tid`, `sid`, `tname`) VALUES
(1, 1, 'subject 1 topic 1'),
(2, 1, 'subject 1 topic 2'),
(3, 2, 'subject 2 topic 1'),
(4, 2, 'subject 2 topic 2'),
(5, 3, 'subject 3 topic 1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `time` text NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `pswd` text NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`time`, `name`, `email`, `pswd`, `role`) VALUES
('1615641519', 'admin', 'admin', 'jerjr', 'admin'),
('1613920639', 'adminadd', 'adminadd', 'jgsipjge', 'student'),
('1613920649', 'adminadd2', 'adminadd2', 'jhsipjge', 'teacher'),
('1613940570', 'login', 'login1', 'lvlir:', 'student'),
('1613921628', 'reset', 'reset', '949', 'student'),
('1615640931', 'student', 'student', 'tw~dity', 'student'),
('1615640903', 'teacher', 'teacher', 'wejclkw', 'teacher'),
('1613934510', 'test1', 'test1', 'tfxx', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `contenttype`
--
ALTER TABLE `contenttype`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD PRIMARY KEY (`email`,`sid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rolename`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `topics` (`tid`);

--
-- Constraints for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD CONSTRAINT `enrolled_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `subjects` (`sid`);

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `subjects` (`sid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
