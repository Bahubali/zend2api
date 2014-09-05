-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 05, 2014 at 05:31 PM
-- Server version: 5.5.37-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zend-demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  `create_dt_tm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_dt_tm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `description`, `delete_flag`, `create_dt_tm`, `update_dt_tm`) VALUES
(1, 1, 'You can make a custom repository to do what you want to do. This is also explained in the doctrine documentation. It allows you to build your custom queries on a central spot and keeps your entity definitions clean.', 0, '2014-09-01 18:15:58', '0000-00-00 00:00:00'),
(2, 1, 'As timdev suggested, you can create a MemberService which will wrap such call by being aware of the EntityManager.', 0, '2014-09-01 18:16:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(60) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  `create_dt_tm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_dt_tm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `delete_flag`, `create_dt_tm`, `update_dt_tm`) VALUES
(1, 'Bahubali', 'N', 'bahubali.sn@costrategix.com', 'f4a9368e04d5b5b60f1fc1b0637352ec', 0, '2014-09-01 18:15:16', '0000-00-00 00:00:00'),
(2, 'Chandresh', 'Modi', 'chandresh@costrategix.com', 'ef2b030d2e26d13c6bd984cdabdd6a19', 0, '2014-09-01 18:15:16', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
