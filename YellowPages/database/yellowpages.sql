-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 11, 2018 at 12:46 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yellowpages`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `Area_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Area_Name` varchar(25) NOT NULL,
  `Area_City_Id` int(11) NOT NULL,
  PRIMARY KEY (`Area_Id`),
  KEY `City_Id_fk` (`Area_City_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`Area_Id`, `Area_Name`, `Area_City_Id`) VALUES
(1, 'new-cairo', 1),
(2, 'shroq', 1),
(3, 'agami', 2),
(4, 'maamora', 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `Category_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Category_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_Id`, `Category_Name`) VALUES
(1, 'HR'),
(2, 'Marketing'),
(3, 'Sales'),
(4, 'Services'),
(5, 'web');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `City_Id` int(11) NOT NULL AUTO_INCREMENT,
  `City_Name` varchar(25) NOT NULL,
  PRIMARY KEY (`City_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`City_Id`, `City_Name`) VALUES
(1, 'Cairo'),
(2, 'Alex'),
(3, 'Ismalia'),
(4, 'Luxor'),
(5, 'Aswan'),
(6, 'Port-said');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `Company_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Company_Name` varchar(255) NOT NULL,
  `Company_PhoneNum` int(11) NOT NULL,
  `Company_City` varchar(255) DEFAULT NULL,
  `Company_Area` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Company_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_categories`
--

DROP TABLE IF EXISTS `company_categories`;
CREATE TABLE IF NOT EXISTS `company_categories` (
  `Categ_Comp_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Categ_Id` int(11) NOT NULL,
  `Comp_Id` int(11) NOT NULL,
  PRIMARY KEY (`Categ_Comp_Id`),
  KEY `Categ_Id_fk` (`Categ_Id`),
  KEY `Comp_Id_fk` (`Comp_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_images`
--

DROP TABLE IF EXISTS `company_images`;
CREATE TABLE IF NOT EXISTS `company_images` (
  `Img_Comp_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Comp_Id` int(11) NOT NULL,
  `Image_name` varchar(50) NOT NULL,
  `Image` longblob NOT NULL,
  PRIMARY KEY (`Img_Comp_Id`),
  KEY `Company_Img_Id_fk` (`Comp_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `User_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(10) NOT NULL,
  PRIMARY KEY (`User_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `Fname`, `Lname`, `Username`, `Email`, `Password`) VALUES
(1, 'Ahmed', 'Mohamed', 'Ahmed_Mohamed', 'Ahmed.Mohamed@gmail.com', '0000');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
