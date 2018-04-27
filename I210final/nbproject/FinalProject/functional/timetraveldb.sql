-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 03:47 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timetraveldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_num` int(13) NOT NULL,
  `title` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author_id` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_num`, `title`, `message`, `date_posted`, `author_id`) VALUES
(1, 'Winning the Lottery', 'The Time Travel Agency really got me what I wanted. I am a lottery winning multimillionaire!', '2018-04-09 18:05:11', 5),
(2, 'Al Stone Threatens to offer nukes to Soviet Union', 'I swear to you, if they don''t listen to me, I''ll go right to 2600 and take some right back to Stalin and destroy their technology for good!', '2018-04-09 18:08:10', 3),
(3, 'Anglos: British and Americans Reunite over Hunting', 'Ye my boy Bobby Dowenger here took us back to some dodo hunting, then I offered him some buffalos up in Indiana. Good times.', '2018-04-09 18:11:13', 4),
(4, 'A Message to my Boy John by Henry Winchester', 'John, I swear to you I never meant to leave you this way. Also your boys are fine.', '2018-04-09 18:14:09', 2),
(5, 'Moore goes back in time nearly two years', 'The speed of computers will double every 18 months.', '2018-04-09 18:15:47', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order#` int(13) NOT NULL,
  `paid` float(9,2) NOT NULL,
  `purchasedate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order#`, `paid`, `purchasedate`, `user_id`) VALUES
(3, 38.99, '2018-04-10 10:33:03', 2),
(4, 38.99, '2018-04-10 10:33:04', 3),
(5, 58.99, '2018-04-10 10:33:51', 4),
(6, 1833.99, '2018-04-10 10:33:51', 5),
(7, 58.99, '2018-04-10 10:33:51', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_num` int(13) NOT NULL,
  `destination` varchar(13) NOT NULL,
  `time_period` date NOT NULL,
  `cost` float(9,2) NOT NULL,
  `user_id` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_num`, `destination`, `time_period`, `cost`, `user_id`) VALUES
(2, 'Marion County', '1824-03-22', 79.99, 4),
(4, 'Soviet Union', '1949-08-29', 19.49, 3),
(6, 'Next of Kin', '2013-04-18', 20.13, 2),
(8, 'IBM', '2017-05-13', 20.17, 8),
(10, 'Virginia', '1787-09-17', 18.25, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(13) NOT NULL,
  `firstname` varchar(14) NOT NULL,
  `lastname` varchar(16) NOT NULL,
  `email` varchar(24) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `username`, `password`) VALUES
(2, 'Henry', 'Winchester', 'hwinchester@aol.com', 'ManofLetters', 'SorrySon'),
(3, 'Albert', 'Einstein', 'alstone@aol.com', 'TimeforChang', 'NukesAreRelative'),
(4, 'Hemet', 'Nesingwary', 'OlNessMonster@aol.com', 'BigGameHunters', 'HuntingForever'),
(5, 'John', 'Locke', 'jlocke@excellency.com', 'LetFreedomRing', 'GloriousRev'),
(8, 'Gordon', 'Moore', 'gmoore@gmail.com', 'MooreTime', 'Getmoore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_num`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order#`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_num`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `username_3` (`username`),
  ADD UNIQUE KEY `username_4` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_num` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order#` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_num` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`user_id`) REFERENCES `messages` (`message_num`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
