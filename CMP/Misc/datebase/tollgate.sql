-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2017 at 10:07 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tollgate`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `acc_no` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `bankblc` varchar(100) NOT NULL,
  `sts` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`acc_no`, `pin`, `bankblc`, `sts`) VALUES
('Tx2341', '6442', '1660', ''),
('Tx6868', '8441', '1500', '');

-- --------------------------------------------------------

--
-- Table structure for table `bank1`
--

CREATE TABLE IF NOT EXISTS `bank1` (
  `acc_no` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `bankblc` varchar(100) NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `sts` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank1`
--

INSERT INTO `bank1` (`acc_no`, `pin`, `bankblc`, `bankname`, `sts`) VALUES
('Tx5372', '6374', '2000', 'TMB', ''),
('Tx7863', '5320', '3000', 'SBI', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `name` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `comments` varchar(100) NOT NULL,
  `sts` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `email_id`, `comments`, `sts`) VALUES
('ariyanayagi', 'nugarsana@gmail.com', 'good', ''),
('vigneshwari', 'vigneshwari@gmail.com', 'ffgfwegwgg', '');

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE IF NOT EXISTS `logindetails` (
  `sno` int(12) NOT NULL AUTO_INCREMENT,
  `uname` mediumtext NOT NULL,
  `passwd` mediumtext NOT NULL,
  `id` mediumtext NOT NULL,
  `fullname` mediumtext NOT NULL,
  `grp` mediumtext NOT NULL,
  `sts` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`sno`, `uname`, `passwd`, `id`, `fullname`, `grp`, `sts`) VALUES
(1, 'admin', '12345', '001', 'Arun', 'grp01', 0),
(7, 'U001', '1234', 'U001', 'Ragu1', 'grp03', 0),
(6, 'M001', '12345', 'M001', 'Arun', 'grp02', 0),
(8, 'Kavi', '123456', 'Kavi', 'Kavi Barathy', 'grp03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `sno` int(12) NOT NULL AUTO_INCREMENT,
  `from` mediumtext NOT NULL,
  `to` mediumtext NOT NULL,
  `subj` mediumtext NOT NULL,
  `msg` mediumtext NOT NULL,
  `date` mediumtext NOT NULL,
  `time` mediumtext NOT NULL,
  `sts` tinyint(4) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`sno`, `from`, `to`, `subj`, `msg`, `date`, `time`, `sts`) VALUES
(1, 'admin@yahoo.com', 'arun@gmail.com', 'hiii', 'sdsdfdsfsdf', '04/03/13', '20:20:18', 0),
(2, 'arun@gmail.com', 'admin@yahoo.com', '111', 'ASAsADsdsd', '04/03/13', '21:25:09', 0),
(3, 'admin@yahoo.com', 'ragu@gmail.com', 'wishes', 'Which you a advance happy new year...', '04/04/13', '18:21:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `sno` int(12) NOT NULL AUTO_INCREMENT,
  `year1` mediumtext NOT NULL,
  `amount1` mediumtext NOT NULL,
  `benifits` mediumtext NOT NULL,
  `sts` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`sno`, `year1`, `amount1`, `benifits`, `sts`) VALUES
(1, 'I Month', '5000', 'sdasdasdasdasd,\r\nasdasdasdasdasd', 0),
(2, 'II Months', '10000', 'adasdasdasdasd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `images` mediumtext NOT NULL,
  `sts` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`name`, `password`, `gender`, `state`, `address`, `email_id`, `mobile`, `zipcode`, `images`, `sts`) VALUES
('  santhosh', '  1234 ', ' male', '  tamilnadu', ' chennai', 'santhosh@gmail.com', ' 54112', '2121', '', ''),
('navas', '123', 'male', 'tamilnadu', 'madurai', 'navas@gmail.com', '545645', '1131', '', ''),
('kumar', 'kumar123', 'male', 'tamilnadu', 'madurai', 'kumar@gmail.com', '515612', '625002', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `staffdetails`
--

CREATE TABLE IF NOT EXISTS `staffdetails` (
  `sno` int(17) NOT NULL AUTO_INCREMENT,
  `staffid` mediumtext NOT NULL,
  `name` mediumtext NOT NULL,
  `dob` mediumtext NOT NULL,
  `gender` mediumtext NOT NULL,
  `age` mediumtext NOT NULL,
  `address` mediumtext NOT NULL,
  `phone` mediumtext NOT NULL,
  `mobile` mediumtext NOT NULL,
  `mailid` mediumtext NOT NULL,
  `doj` mediumtext NOT NULL,
  `salary` mediumtext NOT NULL,
  `country` mediumtext NOT NULL,
  `location` mediumtext NOT NULL,
  `passwrd` mediumtext NOT NULL,
  `grpid` mediumtext NOT NULL,
  `designation` mediumtext NOT NULL,
  `branchid` mediumtext NOT NULL,
  `image` mediumtext NOT NULL,
  `sts` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `staffdetails`
--

INSERT INTO `staffdetails` (`sno`, `staffid`, `name`, `dob`, `gender`, `age`, `address`, `phone`, `mobile`, `mailid`, `doj`, `salary`, `country`, `location`, `passwrd`, `grpid`, `designation`, `branchid`, `image`, `sts`) VALUES
(28, '001', 'Administrator', '12/04/1012', 'Male', '25', '2/113 ,dsdadasdas,sadasdasd.', '653725', '9998872203', 'admin@yahoo.com', '12/04/1012', '12000', 'India', 'Tamilnadu', '12345', 'grp01', 'Admin', '00', '../staff_image/001admin-user-man-icon.png', 0),
(39, 'M001', 'Arun', '01/04/2005', 'Male', '26', ' 3/12 dasdasdasd,asdasdasd\r\nsadasdasd.', '2682649', '9123337745', 'arun@gmail.com', '01/04/2005', '10,000', 'India', 'Madurai', '12345', 'CEO', 'Toll Gate Staff', 'M001', '../staff_image/M001User.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tolladd`
--

CREATE TABLE IF NOT EXISTS `tolladd` (
  `tollname` varchar(100) NOT NULL,
  `tollarea` varchar(100) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `weburl` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `tollemail` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `startdate` varchar(100) NOT NULL,
  `tollimage` mediumtext NOT NULL,
  `sts` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tolladd`
--

INSERT INTO `tolladd` (`tollname`, `tollarea`, `zipcode`, `weburl`, `phone`, `tollemail`, `fax`, `startdate`, `tollimage`, `sts`) VALUES
('vasanth', 'madurai', '620542', 'http://www.dynamicdrive.com/forums/showthread.php?80477-how-to-fetch-data-from-database-in-php-and-d', '54512', 'vasanth@gmail.com', '54515', '15/03/2017', '../staff_image/toll.JPG', '');

-- --------------------------------------------------------

--
-- Table structure for table `tollboothdetails`
--

CREATE TABLE IF NOT EXISTS `tollboothdetails` (
  `sno` int(17) NOT NULL AUTO_INCREMENT,
  `bid` mediumtext NOT NULL,
  `bname` mediumtext NOT NULL,
  `location` mediumtext NOT NULL,
  `address` mediumtext NOT NULL,
  `postal` mediumtext NOT NULL,
  `country` mediumtext NOT NULL,
  `mobile` mediumtext NOT NULL,
  `phone` mediumtext NOT NULL,
  `mailid` mediumtext NOT NULL,
  `faxno` mediumtext NOT NULL,
  `no_of_staff` mediumtext NOT NULL,
  `image` mediumtext NOT NULL,
  `start_date` mediumtext NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tollboothdetails`
--

INSERT INTO `tollboothdetails` (`sno`, `bid`, `bname`, `location`, `address`, `postal`, `country`, `mobile`, `phone`, `mailid`, `faxno`, `no_of_staff`, `image`, `start_date`) VALUES
(1, 'M001', 'Round Road Booth', 'Madurai', '2/34 sadasdasd,asdasd\r\nasdasd,asdasda.', '687678', 'India', '9123337745', '2683456', 'mtollgate@gmail.com', '111-333-111-333-0', '7', '../staff_image/M001company-building-icon.png', '03/04/1985'),
(2, 'C001', 'Ring Road Booth', 'Madurai', '3/65 asdasdasdas,da\r\nasdasdasd,asd.', '687678', 'India', '9123337745', '2683456', 'rtollgate@gmail.com', '111-333-111-333-0', '5', '../staff_image/C001company-building-icon11.png', '19/04/1995');

-- --------------------------------------------------------

--
-- Table structure for table `tollfare`
--

CREATE TABLE IF NOT EXISTS `tollfare` (
  `year` varchar(100) NOT NULL,
  `vehicle` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `tolllarea` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tollfare`
--

INSERT INTO `tollfare` (`year`, `vehicle`, `amount`, `tolllarea`) VALUES
(' 2017', 'Car', '20', 'madurai'),
(' 2017', 'Truck', '50', 'chennai'),
(' 2017', 'Truck', '50', 'chennai'),
('2016', 'van', '1500', 'mdu'),
('2015', 'van', '1300', 'mdu'),
('2015', 'van', '1300', 'mdu');

-- --------------------------------------------------------

--
-- Table structure for table `tollgatedetail`
--

CREATE TABLE IF NOT EXISTS `tollgatedetail` (
  `sno` int(17) NOT NULL AUTO_INCREMENT,
  `tid` mediumtext NOT NULL,
  `tname` mediumtext NOT NULL,
  `location` mediumtext NOT NULL,
  `address` mediumtext NOT NULL,
  `postal` mediumtext NOT NULL,
  `URL` mediumtext NOT NULL,
  `country` mediumtext NOT NULL,
  `mobile` mediumtext NOT NULL,
  `phone` mediumtext NOT NULL,
  `mailid` mediumtext NOT NULL,
  `faxno` mediumtext NOT NULL,
  `image` mediumtext NOT NULL,
  `start_date` mediumtext NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tollgatedetail`
--

INSERT INTO `tollgatedetail` (`sno`, `tid`, `tname`, `location`, `address`, `postal`, `URL`, `country`, `mobile`, `phone`, `mailid`, `faxno`, `image`, `start_date`) VALUES
(1, 'T001', 'Toll Gate Head Quaters', 'Delhi', '2/12 asdasdasd,asdasdasd\r\nadasdsad.', '687678', 'http://www.tollgate.com/', 'India', '9123337745', '2683456', 'tollgate@gmail.com', '111-333-111-333-1', '../staff_image/hotel-building-icon.png', '03/04/1986');

-- --------------------------------------------------------

--
-- Table structure for table `tollpass`
--

CREATE TABLE IF NOT EXISTS `tollpass` (
  `username` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `vehicle` varchar(100) NOT NULL,
  `vehicle_number` varchar(100) NOT NULL,
  `tollarea` varchar(100) NOT NULL,
  `date1` varchar(100) NOT NULL,
  `time1` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `sts` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tollpass`
--

INSERT INTO `tollpass` (`username`, `year`, `vehicle`, `vehicle_number`, `tollarea`, `date1`, `time1`, `amount`, `sts`) VALUES
('santhosh', '2016', 'Car', 'TN58 B2843', '', '29-03-2017', '12.00', '20', ''),
('santhosh', '2016', 'Bike', 'TN 45 B7769', '', '29-03-2017', '11.30', '20', ''),
('santhosh', '2016', 'Bus', 'TN58 B2843', 'saff', '01-02-2017', '12.00', '20', '');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE IF NOT EXISTS `userdetails` (
  `sno` int(12) NOT NULL AUTO_INCREMENT,
  `bid` mediumtext NOT NULL,
  `stfid` mediumtext NOT NULL,
  `date` mediumtext NOT NULL,
  `time` mediumtext NOT NULL,
  `cid` mediumtext NOT NULL,
  `cname` mediumtext NOT NULL,
  `image` mediumtext NOT NULL,
  `passwd` mediumtext NOT NULL,
  `mailid` mediumtext NOT NULL,
  `grp` mediumtext NOT NULL,
  `licno` mediumtext NOT NULL,
  `vecno` mediumtext NOT NULL,
  `vectype` mediumtext NOT NULL,
  `permittype` mediumtext NOT NULL,
  `permitno` mediumtext NOT NULL,
  `from` mediumtext NOT NULL,
  `to` mediumtext NOT NULL,
  `amount` mediumtext NOT NULL,
  `bankname` mediumtext,
  `pid` mediumtext,
  `accno` mediumtext,
  `creditno` mediumtext,
  `validitydate` mediumtext,
  `sts` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`sno`, `bid`, `stfid`, `date`, `time`, `cid`, `cname`, `image`, `passwd`, `mailid`, `grp`, `licno`, `vecno`, `vectype`, `permittype`, `permitno`, `from`, `to`, `amount`, `bankname`, `pid`, `accno`, `creditno`, `validitydate`, `sts`) VALUES
(1, 'M001', 'M001', '05/03/13', '22:12:52', 'U001', 'Ragu1', '../staff_image/5.png', '1234', 'ragu@gmail.com', 'grp03', '23466671193', 'TN 59 AJ 001', 'Car', 'Own Board', '2131231', 'Madurai', 'Chennai', '5000', 'Bank Of India', 'I Month', '4449871234222', '4448722883937', '05/04/2013', 0),
(2, '', '', '', '', 'Kavi', 'Kavi Barathy', '../staff_image/5.png', '123456', 'kavi@gmail.com', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
