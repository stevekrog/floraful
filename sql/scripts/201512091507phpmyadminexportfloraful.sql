-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2015 at 03:06 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `floraful`
--
DROP DATABASE IF EXISTS `floraful`;
CREATE DATABASE IF NOT EXISTS `floraful` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `floraful`;

-- --------------------------------------------------------

--
-- Table structure for table `observations`
--

DROP TABLE IF EXISTS `observations`;
CREATE TABLE IF NOT EXISTS `observations` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `observerName` varchar(200) NOT NULL,
  `observationDateTime` datetime NOT NULL,
  `weatherDesc` varchar(200) NOT NULL,
  `currentTemp` decimal(4,1) DEFAULT NULL,
  `highTemp` decimal(4,1) DEFAULT NULL,
  `lowTemp` decimal(4,1) DEFAULT NULL,
  `locationDesc` varchar(200) NOT NULL,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(9,6) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `plantName` varchar(200) DEFAULT NULL,
  `soilDesc` varchar(200) DEFAULT NULL,
  `animalClass` varchar(200) DEFAULT NULL,
  `species` varchar(200) DEFAULT NULL,
  `distanceFromAnimal` int(11) DEFAULT NULL,
  `howDetected` varchar(200) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `migrant` varchar(100) DEFAULT NULL,
  `nestObserved` tinyint(1) DEFAULT NULL,
  `numEggsInNest` int(11) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `obstypeid` int(11) NOT NULL,
  PRIMARY KEY (`oid`),
  KEY `fk_observationtype_obstypeid_idx` (`obstypeid`),
  KEY `fk_users_email_idx` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `observations`
--

INSERT INTO `observations` (`oid`, `observerName`, `observationDateTime`, `weatherDesc`, `currentTemp`, `highTemp`, `lowTemp`, `locationDesc`, `latitude`, `longitude`, `notes`, `plantName`, `soilDesc`, `animalClass`, `species`, `distanceFromAnimal`, `howDetected`, `sex`, `migrant`, `nestObserved`, `numEggsInNest`, `email`, `obstypeid`) VALUES
(1, 'user', '2015-12-05 22:17:40', 'windy and cloudy', 55.0, 65.0, 45.0, 'near', 104.430000, -105.250579, 'new note', 'Boston Fern', 'sandy with clay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user@mymail.com', 1),
(2, 'user', '2015-12-05 22:33:23', 'clear and sunny', 45.0, 54.0, 34.0, '3 milles S of Ouray', -105.340000, 40.650000, 'saw a bear', 'bluebell', 'fine loam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user@mymail.com', 1),
(3, 'user', '2015-12-01 15:10:05', 'cloudy', 55.0, 65.0, 45.0, 'near', 104.430000, 42.000000, 'note', 'rose', 'brown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user@mymail.com', 1),
(4, 'user', '0000-00-00 00:00:00', 'new weather', 67.0, 78.0, 45.0, 'new location', -105.670000, 41.450000, 'another note', 'tall pine', 'dark loam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user@mymail.com', 1),
(5, 'maggie simpson', '2015-12-07 23:18:12', 'lightning and thunder', 56.0, 76.0, 34.0, 'near nederland', -105.650000, 40.230000, 'hello mudda', 'audrey II', 'sandy loam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'maggie@mymail.com', 1),
(7, 'Homer sampson', '2015-12-08 22:01:30', 'sunny and nice', 89.0, 98.0, 67.0, 'near here', -105.600000, 41.300000, 'notey notes', 'piney pine', 'mud', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hs@mymail.com', 1),
(9, 'user', '2015-12-09 14:23:02', 'sunny and nice', 54.0, 43.0, 45.0, 'Near downtown', -105.430000, 40.650000, 'saw an eagle', 'green plant', 'brown dirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user@mymail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `observationtype`
--

DROP TABLE IF EXISTS `observationtype`;
CREATE TABLE IF NOT EXISTS `observationtype` (
  `obstypeid` int(11) NOT NULL AUTO_INCREMENT,
  `obsTypeName` varchar(100) DEFAULT NULL,
  `sortOrder` int(11) DEFAULT NULL,
  PRIMARY KEY (`obstypeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `observationtype`
--

INSERT INTO `observationtype` (`obstypeid`, `obsTypeName`, `sortOrder`) VALUES
(1, 'plant', 1),
(2, 'bird', 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(100) DEFAULT NULL,
  `sortOrder` int(11) DEFAULT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleid`, `roleName`, `sortOrder`) VALUES
(1, 'user', 1),
(2, 'adminViewOnly', 2),
(3, 'admin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `roleid` int(11) NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_roles_roleid_idx` (`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `name`, `password`, `created`, `lastLogin`, `roleid`) VALUES
('ac@mymail.com', 'Adam Cartwright', 'adamboy', '2015-12-09 15:04:16', NULL, 1),
('admin1@mymail.com', 'admin', 'admin', '2015-12-08 22:21:01', NULL, 3),
('admin@mymail.com', 'admin', 'admin', '2015-11-28 16:07:54', '2015-12-09 15:03:45', 3),
('aj@mymail.com', 'action jackson', 'newpass', '2015-12-09 01:14:45', '2015-12-09 01:15:20', 3),
('anonymous@email.com', 'anonymous', 'anonymous', '2015-12-01 15:00:00', '2015-12-01 15:00:00', 1),
('bc@mymail.com', 'Ben Cartwright', 'horse', '2015-12-09 14:53:28', '2015-12-09 14:54:11', 1),
('flanders@mymail.com', 'Ned Flanders', 'neddy1', '2015-12-07 13:52:37', '2015-12-07 23:05:04', 3),
('hs@mymail.com', 'Homer sampson', 'homer1', '2015-12-07 13:08:29', '2015-12-08 22:20:17', 3),
('maggie@mymail.com', 'maggie simpson', 'maggie1', '2015-12-07 14:37:33', '2015-12-07 23:13:14', 1),
('user@mymail.com', 'user', 'useruser', '2015-11-28 18:42:07', '2015-12-09 14:33:05', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `observations`
--
ALTER TABLE `observations`
  ADD CONSTRAINT `fk_observationtype_obstypeid` FOREIGN KEY (`obstypeid`) REFERENCES `observationtype` (`obstypeid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_email` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_roles_roleid` FOREIGN KEY (`roleid`) REFERENCES `roles` (`roleid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
