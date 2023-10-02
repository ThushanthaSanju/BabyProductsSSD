-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2020 at 07:26 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shanbaby`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(50) NOT NULL,
  `adminPassword` varchar(50) NOT NULL,
  `adminUsername` varchar(50) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `adminPassword`, `adminUsername`) VALUES
(1, 'sheyya', 'sheyya1234', 'adminSheyya');

-- --------------------------------------------------------

--
-- Table structure for table `billinginfo`
--

CREATE TABLE IF NOT EXISTS `billinginfo` (
  `billingID` int(11) NOT NULL AUTO_INCREMENT,
  `billingDate` date NOT NULL,
  `billingAddress` varchar(200) NOT NULL,
  `ccNum` int(16) NOT NULL,
  `ccCvv` int(4) NOT NULL,
  `ccExpDate` date NOT NULL,
  `ccNameOn` varchar(30) NOT NULL,
  PRIMARY KEY (`billingID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `billinginfo`
--


-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cartID` int(10) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(50) NOT NULL,
  `productID` int(11) NOT NULL,
  `numOfProducts` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  PRIMARY KEY (`cartID`),
  KEY `productID` (`productID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `userEmail`, `productID`, `numOfProducts`, `totalPrice`) VALUES
(41, 'sheyya@gmail.com', 1, 10, 10000),
(42, 'sheshan@gmail.com', 4, 1, 1),
(43, 'sheshan@gmail.com', 1, 1, 1000),
(44, 'sheshan@gmail.com', 6, 1, 33);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(20) NOT NULL,
  `discription` varchar(250) NOT NULL,
  `imageLocation` varchar(1000) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `discription`, `imageLocation`) VALUES
(1, 'Test2', 'Lorem Ipsum', ''),
(2, 'Test1', 'Lorem Ipsum', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customerID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `country` varchar(50) NOT NULL,
  `postalCode` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `firstName`, `lastName`, `email`, `address`, `country`, `postalCode`, `phone`, `password`, `city`) VALUES
(46, 'sheshan', 'narada', 'sheshan@gmail.com', 'mahasen mw', 'Sri Lanka', '50000', '0766191256', '12345678', 'anuradhapura');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `orderNum` int(11) NOT NULL AUTO_INCREMENT,
  `unitPrice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `unitTotalPrice` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  PRIMARY KEY (`orderNum`),
  KEY `orderID` (`orderID`),
  KEY `productID` (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `orderdetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orderDate` date NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `ShippedDate` date NOT NULL,
  `RequiredDate` date NOT NULL,
  `customerID` int(11) NOT NULL,
  `billingID` int(11) NOT NULL,
  `orderNum` int(11) NOT NULL,
  PRIMARY KEY (`orderID`),
  KEY `billingID` (`billingID`),
  KEY `customerID` (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `orders`
--


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitsOnOrder` int(11) NOT NULL DEFAULT '0',
  `unitPrice` int(6) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `discount` int(5) NOT NULL,
  `imageLocation` varchar(1000) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  PRIMARY KEY (`productID`),
  KEY `categoryID` (`categoryID`),
  KEY `adminID` (`adminID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `quantity`, `unitsOnOrder`, `unitPrice`, `description`, `discount`, `imageLocation`, `categoryID`, `adminID`) VALUES
(1, 'zzzzzzzzzzzzz', 10, 0, 1000, 'Lorem ipsum', 10, '', 2, 1),
(2, 'Testing2', 10, 0, 100000, 'sssss', 100, '02.jpg', 2, 1),
(3, 'ss', 12, 0, 2, 'sws', 2, '03.jpg', 1, 1),
(4, 'ss', 1, 0, 1, 'ede', 1, '04.jpg', 1, 1),
(5, 'd', 10, 0, 10, 'sfjn', 10, '05.jpg', 1, 1),
(6, 'aaaaaaaaaaaaaaa', 33, 0, 33, 'esgsgs', 3, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productstoke`
--

CREATE TABLE IF NOT EXISTS `productstoke` (
  `productID` int(50) NOT NULL AUTO_INCREMENT,
  `productName` varchar(100) NOT NULL,
  `quantity` double NOT NULL,
  `unitsOnOrder` double NOT NULL,
  `unitPrice` double NOT NULL,
  `description` varchar(255) NOT NULL,
  `discount` double NOT NULL,
  `imageLocation` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `productstoke`
--

INSERT INTO `productstoke` (`productID`, `productName`, `quantity`, `unitsOnOrder`, `unitPrice`, `description`, `discount`, `imageLocation`, `category`) VALUES
(7, 'CCTV', 12, 0, 2300, 'Best Camera', 1, 'CCHIHDCAMDS2CC12D8TAMM.jpg', '1'),
(9, 'CCTV', 12, 0, 1200, 'Good', 1, 'CCHIHDCAMDS2CE56D0TVPIR3F.jpg', '2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`billingID`) REFERENCES `billinginfo` (`billingID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`);
