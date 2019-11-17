-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 17, 2019 at 06:54 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `conductors`
--

DROP TABLE IF EXISTS `conductors`;
CREATE TABLE IF NOT EXISTS `conductors` (
  `conID` int(255) NOT NULL AUTO_INCREMENT,
  `conFname` varchar(255) NOT NULL,
  `conLname` varchar(255) NOT NULL,
  `YearsExperience` int(255) NOT NULL,
  `TrainID` int(255) DEFAULT NULL,
  `EngineerID` int(255) DEFAULT NULL,
  `Salary` int(11) DEFAULT NULL,
  PRIMARY KEY (`conID`),
  UNIQUE KEY `TrainID` (`TrainID`),
  KEY `CTID_TO_ID` (`TrainID`),
  KEY `CID_TO_EID` (`EngineerID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=ascii;

--
-- Dumping data for table `conductors`
--

INSERT INTO `conductors` (`conID`, `conFname`, `conLname`, `YearsExperience`, `TrainID`, `EngineerID`, `Salary`) VALUES
(7, 'Tomso', 'Singh', 3, 3, 3, 65000),
(8, 'Elis', 'Redman', 7, 4, 8, 89000),
(9, 'Nathanial', 'Bauer', 15, 5, 13, 70000),
(10, 'Anne', 'Villalobos', 3, 6, 7, 75000),
(11, 'Alton', 'Desrosiers', 2, 7, 11, 75000),
(12, 'Samuel', 'Terry', 35, 8, 9, 150000),
(13, 'Karen', 'Leslie', 1, 9, 10, 60000),
(14, 'Mike', 'Hawk', 11, 10, 12, 125000),
(15, 'Joe', 'Kong', 5, 13, 5, 97000),
(16, 'Richard', 'Pound', 18, 12, 2, 97900),
(17, 'William', 'Stroker', 6, 11, 1, 57000),
(18, 'Jennifer', 'Talia', 23, 2, 6, 130000),
(19, 'Shay', 'Kitoff', 10, 1, 4, 100000),
(21, 'Mully', 'Nully', 5, NULL, 14, 100000),
(22, 'Jack', 'Whack', 6, NULL, 16, 90000);

-- --------------------------------------------------------

--
-- Table structure for table `engineers`
--

DROP TABLE IF EXISTS `engineers`;
CREATE TABLE IF NOT EXISTS `engineers` (
  `engID` int(255) NOT NULL AUTO_INCREMENT,
  `engFname` varchar(255) NOT NULL,
  `engLname` varchar(255) NOT NULL,
  `YearsExperience` int(255) NOT NULL,
  `TrainID` int(255) DEFAULT NULL,
  `ConductorID` int(255) DEFAULT NULL,
  `Salary` int(11) DEFAULT NULL,
  PRIMARY KEY (`engID`),
  UNIQUE KEY `TrainID` (`TrainID`),
  KEY `ETID_to_ID` (`TrainID`),
  KEY `EID_TO_CID` (`ConductorID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=ascii;

--
-- Dumping data for table `engineers`
--

INSERT INTO `engineers` (`engID`, `engFname`, `engLname`, `YearsExperience`, `TrainID`, `ConductorID`, `Salary`) VALUES
(1, 'Rikki', 'Hendrix', 15, 11, 18, 95000),
(2, 'Michelle', 'Alston', 20, 12, 8, 120000),
(3, 'Arianna', 'Mcphee', 24, 3, 7, 140000),
(4, 'Traci', 'Warren', 9, 1, 11, 86000),
(5, 'Mason', 'Ferguson', 23, 13, 17, 120000),
(6, 'Parker', 'Wilkinson', 8, 2, 19, 68000),
(7, 'Hamza', 'Harrington', 11, 6, 12, 99000),
(8, 'Charlie', 'Preece', 40, 4, 9, 165000),
(9, 'Jax', 'Herman', 1, 8, 14, 67000),
(10, 'Kate', 'Norton', 2, 9, 15, 69000),
(11, 'Iona', 'Galvan', 7, 7, 13, 74000),
(12, 'Lewys', 'Stacey', 36, 10, 16, 140000),
(13, 'Darryl', 'James', 18, 5, 10, 97000),
(14, 'Jacob', 'Sarts', 4, NULL, 21, 81000),
(15, 'Martin', 'Money', 1, NULL, NULL, 67000),
(16, 'Michael', 'Stank', 19, NULL, 22, 79000);

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

DROP TABLE IF EXISTS `passengers`;
CREATE TABLE IF NOT EXISTS `passengers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(255) DEFAULT NULL,
  `Lname` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `DepartureTo` int(11) DEFAULT NULL,
  `DepartureFrom` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `DepartureTo` (`DepartureTo`),
  KEY `DepartureFrom` (`DepartureFrom`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`ID`, `Fname`, `Lname`, `Address`, `DepartureTo`, `DepartureFrom`) VALUES
(1, 'Jordan', 'Young', '500 Kingston Rd Toronto ON M4L 1V3', 1, 5),
(2, 'Marcus', 'Broman', '315 St Germain Ave Toronto ON M5M 1W4', 1, 7),
(3, 'Jacob', 'Snarkorbious', '234 Willow Ave Toronto ON M4E 3K7', 1, 7),
(4, 'Kelly', 'Kelly', '26 Goodwood Park Cres East York ON M4C 2G5', 1, 6),
(5, 'Earl', 'Sweatshirt', '1350 Golden Line Rd Almonte ON K0A 1A0', 2, 10),
(6, 'Luke', 'Longhaul', '170 Lees Ave Ottawa ON K1S 5G5', 2, 7),
(7, 'Johnny', 'Guitar', '8 Birchview Rd Nepean ON K2G 3G4', 2, 8),
(8, 'Scott', 'Pilgrim', '63 Kerney Hill Crt Dryden ON P8N 3K6', 1, 11),
(9, 'Woodie', 'Woodson', '433 Woodfield Dr Nepean ON K2G 4B8', 2, 1),
(10, 'Anwar', 'Abdalbari', '27 Highview Rd Barrie ON L4M 2M1', 9, 12),
(11, 'Aaron', 'Seth', '39 Shirley Ave Barrie ON L4N 1M8', 9, 13),
(12, 'Alex', 'Alexander', '143 Edgehill Dr Barrie ON L4N 1L9', 9, 8),
(13, 'Myron', 'Oak', '196 Tunbridge Rd Barrie ON L4M 6S1', 9, 6),
(14, 'Adam', 'Smith', '15 Brookbank Crt Brampton ON L6Z 3G4', 1, 3),
(15, 'George', 'Cope', '52 Camberley Cres Brampton ON L6V 3L4', 1, 7),
(16, 'Josh', 'Coolguy', '55 Brower Crt Brampton ON L6Z 4S6', 1, 5),
(17, 'Mary', 'Runninouttanames', '103 Whitwell Dr Brampton ON L6P 1E3', 1, 4),
(18, 'Yvonne', 'Bompton', '4205 Shipp Dr Mississauga ON L4Z 2Y9', 1, 2),
(19, 'Yung', 'Lean', '310 Burnhamthorpe Rd W Mississauga ON L5B 4P9', 1, 4),
(20, 'Emily', 'Scotts', '873 Lovingston Cres Mississauga ON L4W 3S6', 1, 10),
(21, 'Julius', 'Caesar', '46 Compton Dr Scarborough ON M1R 4A7', 1, 3),
(22, 'Lenny', 'Lampshade', '100 Aird Pl 410 Kanata ON K2L 4H8', 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rails`
--

DROP TABLE IF EXISTS `rails`;
CREATE TABLE IF NOT EXISTS `rails` (
  `RailID` int(11) NOT NULL,
  `StartStation` int(10) DEFAULT NULL,
  `EndStation` int(10) DEFAULT NULL,
  `Distance` int(100) NOT NULL,
  PRIMARY KEY (`RailID`),
  KEY `StartStation` (`StartStation`),
  KEY `EndStation` (`EndStation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rails`
--

INSERT INTO `rails` (`RailID`, `StartStation`, `EndStation`, `Distance`) VALUES
(1, 7, 5, 175),
(2, 5, 7, 176),
(3, 5, 4, 80),
(4, 4, 5, 80),
(5, 4, 10, 18),
(6, 10, 4, 18),
(7, 10, 9, 102),
(8, 9, 10, 102),
(9, 10, 13, 32),
(10, 13, 10, 32),
(11, 10, 3, 46),
(12, 3, 10, 46),
(13, 3, 8, 59),
(14, 8, 3, 59),
(15, 3, 13, 29),
(16, 13, 3, 29),
(17, 13, 1, 50),
(18, 1, 13, 50),
(19, 1, 9, 80),
(20, 9, 1, 80),
(21, 1, 6, 45),
(22, 6, 1, 45),
(23, 6, 11, 188),
(24, 11, 6, 188),
(25, 11, 12, 132),
(26, 12, 11, 132),
(27, 11, 2, 145),
(28, 2, 11, 145),
(29, 12, 2, 16),
(30, 2, 12, 16);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

DROP TABLE IF EXISTS `station`;
CREATE TABLE IF NOT EXISTS `station` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `City` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `NumberOfPlatforms` int(6) NOT NULL,
  `NumOccupiedPlatforms` int(6) NOT NULL,
  `TrainStorageFacilitySize` int(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=ascii;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`ID`, `City`, `Location`, `NumberOfPlatforms`, `NumOccupiedPlatforms`, `TrainStorageFacilitySize`) VALUES
(1, 'Toronto', 'ON', 5, 0, 10),
(2, 'Ottawa', 'ON', 3, 0, 5),
(3, 'Hamilton', 'ON', 4, 0, 10),
(4, 'Kitchener', 'ON', 3, 0, 9),
(5, 'London', 'ON', 4, 0, 7),
(6, 'Oshawa', 'ON', 3, 0, 6),
(7, 'Windsor', 'ON', 4, 0, 8),
(8, 'Niagara', 'ON', 2, 0, 4),
(9, 'Barrie', 'ON', 4, 0, 4),
(10, 'Guelph', 'ON', 2, 0, 5),
(11, 'Kingston', 'ON', 2, 0, 4),
(12, 'Kanata', 'ON', 2, 0, 3),
(13, 'Milton', 'ON', 2, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

DROP TABLE IF EXISTS `train`;
CREATE TABLE IF NOT EXISTS `train` (
  `trainID` int(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `StartStation` int(255) NOT NULL,
  `CurrentStation` int(255) NOT NULL,
  `EndStation` int(255) NOT NULL,
  `PlatformNumber` int(255) NOT NULL,
  `DepartureDate` datetime NOT NULL,
  `ExpectedArrival` datetime NOT NULL,
  `MaxPassengers` int(255) NOT NULL,
  PRIMARY KEY (`trainID`),
  KEY `CS_to_ID` (`CurrentStation`),
  KEY `StartStation` (`StartStation`),
  KEY `StartStation_2` (`StartStation`),
  KEY `ES_to_ID` (`EndStation`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`trainID`, `Model`, `StartStation`, `CurrentStation`, `EndStation`, `PlatformNumber`, `DepartureDate`, `ExpectedArrival`, `MaxPassengers`) VALUES
(1, 'WKW BUDD Observation', 9, 9, 10, 1, '2019-11-28 00:00:00', '2019-11-28 06:20:00', 180),
(2, 'MLW RS 18', 10, 10, 3, 1, '2019-11-05 00:00:00', '2019-11-06 00:00:00', 200),
(3, 'ALCO C-420 NYC', 3, 3, 12, 1, '2019-11-07 00:00:00', '2019-11-08 00:00:00', 200),
(4, 'ALCO DL-701', 12, 12, 11, 1, '2019-11-09 00:00:00', '2019-11-10 00:00:00', 220),
(5, 'ALCO SD40 CN NOODLE', 11, 11, 4, 1, '2019-11-11 00:00:00', '2019-11-12 00:00:00', 150),
(6, 'ATH F7A/B W/DCC/SOUND CN', 4, 4, 5, 1, '2019-11-13 00:00:00', '2019-11-14 00:00:00', 175),
(7, 'ATH GP-9 CN 1954', 5, 5, 13, 1, '2019-11-14 00:00:00', '2019-11-15 00:00:00', 190),
(8, 'ATH GP38-2', 13, 13, 8, 1, '2019-11-18 00:00:00', '2019-11-19 00:00:00', 210),
(9, 'BACH 4-4-0', 8, 8, 6, 1, '2019-11-19 00:00:00', '2019-11-20 00:00:00', 120),
(10, 'BACH GE 45 ton DIESEL', 6, 6, 2, 1, '2019-11-25 00:00:00', '2019-11-26 00:00:00', 250),
(11, 'BOWS SD402 ONR', 2, 2, 1, 1, '2019-11-26 00:00:00', '2019-11-27 00:00:00', 210),
(12, 'BOWS M636', 1, 1, 7, 1, '2019-11-28 00:00:00', '2019-11-29 00:00:00', 180),
(13, 'BOWS F-7A-B', 7, 7, 9, 1, '2019-11-29 00:00:00', '2019-11-30 00:00:00', 170);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conductors`
--
ALTER TABLE `conductors`
  ADD CONSTRAINT `CID_TO_EID` FOREIGN KEY (`EngineerID`) REFERENCES `engineers` (`engID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CTID_TO_ID` FOREIGN KEY (`TrainID`) REFERENCES `train` (`trainID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `engineers`
--
ALTER TABLE `engineers`
  ADD CONSTRAINT `EID_TO_CID` FOREIGN KEY (`ConductorID`) REFERENCES `conductors` (`conID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `ETID_to_ID` FOREIGN KEY (`TrainID`) REFERENCES `train` (`trainID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `train`
--
ALTER TABLE `train`
  ADD CONSTRAINT `CS_to_ID` FOREIGN KEY (`CurrentStation`) REFERENCES `station` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ES_to_ID` FOREIGN KEY (`EndStation`) REFERENCES `station` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SS_to_ID` FOREIGN KEY (`StartStation`) REFERENCES `station` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
