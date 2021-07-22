-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 22, 2021 at 09:55 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art_gallery`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `display1` ()  SELECT *, case when (startdate <= sysdate() && enddate >= sysdate()) then 'Ongoing' when (startdate > sysdate()) then 'yet to start' else 'Finished' end as STAT from exhibition order by enddate desc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAge` ()  SELECT *, year(current_date())-year(dob) as AGE from CUSTOMER$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `acontacts`
--

CREATE TABLE `acontacts` (
  `AID` varchar(20) NOT NULL,
  `PHONE1` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acontacts`
--

INSERT INTO `acontacts` (`AID`, `PHONE1`) VALUES
('AR115', '9783244325'),
('AR117', '9980132560'),
('AR120', '7834321980'),
('AR120', '9089796954');

-- --------------------------------------------------------

--
-- Table structure for table `afterbid`
--

CREATE TABLE `afterbid` (
  `ARTID` varchar(20) NOT NULL,
  `TOPBID` int(11) NOT NULL,
  `CID` varchar(20) DEFAULT NULL,
  `AID` varchar(20) DEFAULT NULL,
  `TITLE` varchar(30) DEFAULT NULL,
  `TYPE` varchar(30) DEFAULT NULL,
  `INITIALPRICE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `afterbid`
--

INSERT INTO `afterbid` (`ARTID`, `TOPBID`, `CID`, `AID`, `TITLE`, `TYPE`, `INITIALPRICE`) VALUES
('A157', 9500, 'C123', 'AR115', 'Freestyle', 'Freestyle', 7500),
('A171', 8000, 'C123', 'AR120', 'NightSky', 'Freestyle', 5000),
('A238', 10000, 'C871', 'AR120', 'Nature', 'Oil painting', 9500),
('A456', 9500, 'C894', 'AR115', 'Lifestyle', 'Freestyle', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `AID` varchar(20) NOT NULL,
  `EID` varchar(20) DEFAULT NULL,
  `FNAME` char(20) DEFAULT NULL,
  `LNAME` char(20) DEFAULT NULL,
  `PLACE` char(20) DEFAULT NULL,
  `STYLE` char(20) DEFAULT NULL,
  `MAILID1` varchar(50) DEFAULT NULL,
  `PW1` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`AID`, `EID`, `FNAME`, `LNAME`, `PLACE`, `STYLE`, `MAILID1`, `PW1`) VALUES
('AR115', 'EX124', 'Mary', 'Stone', 'Delhi', 'Portraits', 'marysto@hotmail.com', 'c95836934fcd05e73c2371dcb3583a951ddc882f'),
('AR117', 'EX008', 'Rose', 'Darling', 'Bangalore', 'Free style', 'darling@gmail.com', '376adec67e274d7a7c5098716d811c7bbe7acc7d'),
('AR120', 'EX123', 'Kat', 'White', 'Mumbai', 'Portraits', 'kwhite@hotmail.com', '376adec67e274d7a7c5098716d811c7bbe7acc7d');

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `ARTID` varchar(20) NOT NULL,
  `TITLE` varchar(20) DEFAULT NULL,
  `YEAR` int(11) DEFAULT NULL,
  `TYPE` varchar(20) DEFAULT NULL,
  `INITIALPRICE` int(11) DEFAULT NULL,
  `AID` varchar(20) DEFAULT NULL,
  `IMAGE` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artwork`
--

INSERT INTO `artwork` (`ARTID`, `TITLE`, `YEAR`, `TYPE`, `INITIALPRICE`, `AID`, `IMAGE`) VALUES
('A156', 'Landscape', 2020, 'Freestyle', 6000, 'AR120', '1pic2.jpeg'),
('A167', 'Landscape', 2019, 'Freestyle', 8000, 'AR115', 'pic5.jpg'),
('A987', 'Freestyle', 2020, 'Freestyle', 6000, 'AR115', 'pic11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `ARTID` varchar(20) NOT NULL,
  `STAT` varchar(20) NOT NULL,
  `TOPBID` int(11) DEFAULT NULL,
  `CID` varchar(20) DEFAULT NULL,
  `AID` varchar(20) DEFAULT NULL,
  `STARTTIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `ENDTIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`ARTID`, `STAT`, `TOPBID`, `CID`, `AID`, `STARTTIME`, `ENDTIME`) VALUES
('A156', 'finished', NULL, NULL, 'AR120', '2021-01-14 05:32:00', '2021-01-16 05:32:00'),
('A167', 'finished', NULL, NULL, 'AR115', '2021-02-03 08:33:00', '2021-02-11 08:33:00'),
('A987', 'finished', NULL, NULL, 'AR115', '2021-01-18 10:26:00', '2021-01-18 10:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `CID` varchar(20) NOT NULL,
  `PHONE3` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`CID`, `PHONE3`) VALUES
('C123', '8967453432'),
('C125', '9449944875'),
('C774', '9342761616'),
('C871', '8901234567'),
('C894', '9449944875');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CID` varchar(20) NOT NULL,
  `GID` varchar(20) DEFAULT NULL,
  `FNAME1` char(20) DEFAULT NULL,
  `LNAME1` char(20) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `ADDRESS` char(20) DEFAULT NULL,
  `PW3` varchar(60) NOT NULL,
  `MAILID3` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CID`, `GID`, `FNAME1`, `LNAME1`, `DOB`, `ADDRESS`, `PW3`, `MAILID3`) VALUES
('C123', 'GA17', 'Xavier', 'Knight', '1995-07-12', 'Delhi', '343fb6217ac80239825a5994b9a7273511c7a19a', 'knightx@gmail.com'),
('C125', 'GA10', 'Nidhi', 'S', '2000-03-01', 'Bangalore', '7208aa9c65fd3ad314ec831fccea181eb344885a', 'hpotter@gmail.com'),
('C774', 'GA16', 'Harry', 'Potter', '1991-03-11', 'Bengaluru', 'd75f604cceb84ecbf90b5158b557c9b971c124e4', 'harrypo@hotmail.com'),
('C871', 'GA16', 'Jack', 'Wilder', '1999-03-01', 'Chennai', 'e35cb03f0c64b55da4c7cd1d52cde26946be3064', 'jack1999@gmail.com'),
('C894', 'GA15', 'Oliver', 'Queen', '1984-05-18', 'Mumbai', 'd75f604cceb84ecbf90b5158b557c9b971c124e4', 'oqueen84@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `exhibition`
--

CREATE TABLE `exhibition` (
  `EID` varchar(20) NOT NULL,
  `GID` varchar(20) DEFAULT NULL,
  `STARTDATE` date DEFAULT NULL,
  `ENDDATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exhibition`
--

INSERT INTO `exhibition` (`EID`, `GID`, `STARTDATE`, `ENDDATE`) VALUES
('EX001', 'GA15', '2020-12-25', '2021-01-02'),
('EX006', 'GA17', '2020-12-28', '2021-01-12'),
('EX008', 'GA17', '2021-01-02', '2021-01-15'),
('EX123', 'GA16', '2021-03-01', '2021-05-01'),
('EX124', 'GA15', '2021-01-22', '2021-01-30'),
('EX175', 'GA16', '2021-02-28', '2021-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `GID` varchar(20) NOT NULL,
  `GNAME` char(20) DEFAULT NULL,
  `LOCATION` char(20) DEFAULT NULL,
  `MAILID2` varchar(50) DEFAULT NULL,
  `PW2` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`GID`, `GNAME`, `LOCATION`, `MAILID2`, `PW2`) VALUES
('GA10', 'Nidhi', 'Bangalore', 'abc@gmail.com', '7208aa9c65fd3ad314ec831fccea181eb344885a'),
('GA15', 'Paintafact', 'Bengaluru', 'abc@gmail.com', 'c89e1c76c308088a3d2b9d4cb06728bd086667c2'),
('GA16', 'Passion Arts', 'Mumbai', 'xyz@redmail.com', 'cc7539684033d966148cd728c37314782b0ccca6'),
('GA17', 'House Of Arts', 'Delhi', 'houseart@gmail.com', '9c2bd3479e251e586e7a5a8f50c6aaae51cb2765');

-- --------------------------------------------------------

--
-- Table structure for table `gcontacts`
--

CREATE TABLE `gcontacts` (
  `GID` varchar(20) NOT NULL,
  `PHONE2` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gcontacts`
--

INSERT INTO `gcontacts` (`GID`, `PHONE2`) VALUES
('GA10', '9449947621'),
('GA15', '7831209349'),
('GA16', '8976345670'),
('GA17', '7890123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acontacts`
--
ALTER TABLE `acontacts`
  ADD PRIMARY KEY (`AID`,`PHONE1`),
  ADD KEY `AID` (`AID`);

--
-- Indexes for table `afterbid`
--
ALTER TABLE `afterbid`
  ADD PRIMARY KEY (`ARTID`,`TOPBID`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`AID`),
  ADD KEY `EID` (`EID`);

--
-- Indexes for table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`ARTID`),
  ADD KEY `AID` (`AID`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`ARTID`,`STAT`),
  ADD KEY `aid` (`AID`),
  ADD KEY `cid` (`CID`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`CID`,`PHONE3`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CID`),
  ADD KEY `GID` (`GID`);

--
-- Indexes for table `exhibition`
--
ALTER TABLE `exhibition`
  ADD PRIMARY KEY (`EID`),
  ADD KEY `GID` (`GID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`GID`);

--
-- Indexes for table `gcontacts`
--
ALTER TABLE `gcontacts`
  ADD PRIMARY KEY (`GID`,`PHONE2`),
  ADD KEY `GID` (`GID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acontacts`
--
ALTER TABLE `acontacts`
  ADD CONSTRAINT `acontacts_ibfk_1` FOREIGN KEY (`AID`) REFERENCES `artist` (`AID`) ON DELETE CASCADE;

--
-- Constraints for table `artist`
--
ALTER TABLE `artist`
  ADD CONSTRAINT `artist_ibfk_1` FOREIGN KEY (`EID`) REFERENCES `exhibition` (`EID`) ON DELETE CASCADE;

--
-- Constraints for table `artwork`
--
ALTER TABLE `artwork`
  ADD CONSTRAINT `artwork_ibfk_1` FOREIGN KEY (`AID`) REFERENCES `artist` (`AID`) ON DELETE CASCADE;

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`artid`) REFERENCES `artwork` (`ARTID`) ON DELETE CASCADE,
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `artist` (`AID`),
  ADD CONSTRAINT `bid_ibfk_3` FOREIGN KEY (`cid`) REFERENCES `customer` (`CID`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `customer` (`CID`) ON DELETE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`GID`) REFERENCES `gallery` (`GID`) ON DELETE CASCADE;

--
-- Constraints for table `exhibition`
--
ALTER TABLE `exhibition`
  ADD CONSTRAINT `exhibition_ibfk_1` FOREIGN KEY (`GID`) REFERENCES `gallery` (`GID`) ON DELETE CASCADE;

--
-- Constraints for table `gcontacts`
--
ALTER TABLE `gcontacts`
  ADD CONSTRAINT `gcontacts_ibfk_1` FOREIGN KEY (`GID`) REFERENCES `gallery` (`GID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
