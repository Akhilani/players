-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2014 at 12:49 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prowtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `team_id` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `first_name`, `last_name`, `image`, `team_id`) VALUES
(1, 'Alex', 'Song', 'http://cdn.soccerwiki.org/images/player/5676.jpg', 1),
(2, 'Mark', 'Noble', 'http://cdn.soccerwiki.org/images/player/1983.jpg', 1),
(3, 'Diafra', 'Sakho', 'http://cdn.soccerwiki.org/images/player/46222.jpg', 1),
(4, 'Andrew', 'Carrol', 'http://cdn.soccerwiki.org/images/player/21288.jpg', 1),
(5, 'Victor', 'Wanyama', 'http://cdn.soccerwiki.org/images/player/42358.jpg', 2),
(6, 'Morgan', 'Schneiderlin', 'http://cdn.soccerwiki.org/images/player/22401.jpg', 2),
(7, 'Seamus', 'Coleman', 'http://cdn.soccerwiki.org/images/player/19431.jpg', 3),
(8, 'James', 'McCarthy', 'http://cdn.soccerwiki.org/images/player/18766.jpg', 3),
(9, 'Tim', 'Howard', 'http://cdn.soccerwiki.org/images/player/1109.jpg', 3),
(10, 'Steven', 'Naismith', 'http://cdn.soccerwiki.org/images/player/4977.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `logo`) VALUES
(1, 'West Ham United', 'http://smimgs.com/images/logos/clubs/85_1193758928.gif'),
(2, 'Southampton', 'http://smimgs.com/images/logos/clubs/72_1204087089.gif'),
(3, 'Everton', 'http://smimgs.com/images/logos/clubs/31.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `team_player` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
