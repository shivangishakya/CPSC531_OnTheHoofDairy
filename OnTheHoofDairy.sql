-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 11, 2022 at 12:27 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `OnTheHoofDairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `Births`
--

CREATE TABLE `Births` (
  `BID` int(11) NOT NULL,
  `CowID` int(50) NOT NULL,
  `Date` date NOT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `Comments` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Births`
--

INSERT INTO `Births` (`BID`, `CowID`, `Date`, `Gender`, `Comments`) VALUES
(1, 11, '2022-05-01', 'Female', 'Good Health'),
(2, 11, '2022-05-01', 'Female', 'Good Health'),
(4, 14, '2022-05-04', 'Male', 'Need Vet');

-- --------------------------------------------------------

--
-- Table structure for table `Cow`
--

CREATE TABLE `Cow` (
  `CowID` int(11) NOT NULL,
  `CowName` varchar(50) NOT NULL,
  `DOB` date DEFAULT NULL,
  `DateAcquired` date DEFAULT NULL,
  `Source` varchar(50) DEFAULT NULL,
  `Breed` varchar(50) DEFAULT NULL,
  `Sire` varchar(50) DEFAULT NULL,
  `DateOfSold` date DEFAULT NULL,
  `DateOfDeath` date DEFAULT NULL,
  `Cause` text,
  `LineageComments` text,
  `HerdID` int(11) DEFAULT NULL,
  `Timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Cow`
--

INSERT INTO `Cow` (`CowID`, `CowName`, `DOB`, `DateAcquired`, `Source`, `Breed`, `Sire`, `DateOfSold`, `DateOfDeath`, `Cause`, `LineageComments`, `HerdID`, `Timestamp`) VALUES
(11, 'Shanti', '2022-04-13', '2022-04-02', 'sds11', 'asd', 'asw', '2022-04-04', '2022-04-22', 'draam', 'ssds', 4, '2022-04-14 02:10:45'),
(12, 'Ramesh', '2022-04-13', '2022-04-14', '', '', '', '2022-04-12', '2022-04-14', '', '', 4, '2022-04-14 03:01:29'),
(13, 'SSS', '2022-04-13', '2022-04-14', '', '', '', '2022-04-04', '2022-04-14', '', '', NULL, '2022-04-14 03:13:44'),
(14, 'Nik', '2022-05-03', '2022-05-01', 'Lake', 'Cow', 'Sire', '2022-05-11', '2022-05-27', 'NA', 'NA', 4, '2022-05-10 00:24:57'),
(16, 'AAA', '2022-05-04', '2022-05-10', '', '', '', '2022-05-05', '2022-05-20', '', '', 4, '2022-05-10 00:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `Disease_Treatment`
--

CREATE TABLE `Disease_Treatment` (
  `DiseaseID` int(11) NOT NULL,
  `DiseaseName` text NOT NULL,
  `SymSeverID` int(11) NOT NULL,
  `Treatment` text NOT NULL,
  `Medication` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Disease_Treatment`
--

INSERT INTO `Disease_Treatment` (`DiseaseID`, `DiseaseName`, `SymSeverID`, `Treatment`, `Medication`, `Quantity`, `Cost`) VALUES
(1, 'RingWorm', 1, 'vaccination and entire herd testing with slaughter of reactors', 'streptomycin and doxycycline', 10, 150),
(2, 'Q-Fever', 1, 'topical antifungal products', 'Betadine, chlorhexidine and dilute bleach', 10, 200),
(11, 'BSE', 28, 'avoid feeding cattle rendered material from slaughtered animals, and to isolate and destroy all infected animals', 'No Medication', 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `FeedInfo`
--

CREATE TABLE `FeedInfo` (
  `FeedInfoID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `HerdID` int(11) NOT NULL,
  `Date_Time` datetime NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Waste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FeedInfo`
--

INSERT INTO `FeedInfo` (`FeedInfoID`, `ID`, `HerdID`, `Date_Time`, `Quantity`, `Waste`) VALUES
(2, 23, 4, '2022-04-13 05:32:00', 20, 2),
(4, 22, 5, '2022-05-10 15:30:00', 23, 2),
(5, 22, 5, '2022-05-10 15:30:00', 23, 2),
(6, 22, 5, '2022-05-10 15:37:00', 23, 2),
(7, 22, 5, '2022-05-10 15:37:00', 23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `FeedItems`
--

CREATE TABLE `FeedItems` (
  `ItemID` int(11) NOT NULL,
  `ItemName` varchar(50) NOT NULL,
  `Protein` int(50) NOT NULL,
  `Cost` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FeedItems`
--

INSERT INTO `FeedItems` (`ItemID`, `ItemName`, `Protein`, `Cost`) VALUES
(1, 'Grass', 234, 150),
(2, 'Grass1', 30, 156),
(3, 'Grass2', 50, 200),
(5, 'manure', 12, 123),
(10, 'manu', 23, 123),
(11, 'aaaaa', 111, 212);

-- --------------------------------------------------------

--
-- Table structure for table `FeedPurchase`
--

CREATE TABLE `FeedPurchase` (
  `PurchaseID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `SupplierID` int(11) NOT NULL,
  `DeliveryCost` int(11) NOT NULL,
  `TotalCost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FeedPurchase`
--

INSERT INTO `FeedPurchase` (`PurchaseID`, `Date`, `SupplierID`, `DeliveryCost`, `TotalCost`) VALUES
(1, '2022-04-04', 1, 20, 1560),
(2, '2022-04-04', 1, 20, 1500),
(3, '2022-04-04', 1, 20, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `Herd`
--

CREATE TABLE `Herd` (
  `HerdID` int(11) NOT NULL,
  `Location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Herd`
--

INSERT INTO `Herd` (`HerdID`, `Location`) VALUES
(4, 'XYZ11'),
(5, 'RiverSide');

-- --------------------------------------------------------

--
-- Table structure for table `ItemPurchase`
--

CREATE TABLE `ItemPurchase` (
  `ID` int(11) NOT NULL,
  `PurchaseID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ItemPurchase`
--

INSERT INTO `ItemPurchase` (`ID`, `PurchaseID`, `ItemID`, `Quantity`, `Amount`) VALUES
(22, 1, 2, 10, 1560),
(23, 2, 1, 10, 1500),
(24, 3, 1, 20, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `MedicalHistory`
--

CREATE TABLE `MedicalHistory` (
  `TreatmentID` int(11) NOT NULL,
  `CowID` int(11) NOT NULL,
  `TreatmentDate` date NOT NULL,
  `BirthWeight` int(11) NOT NULL,
  `CurrentWeight` int(11) NOT NULL,
  `VetID` int(11) NOT NULL,
  `DiseaseID` int(11) NOT NULL,
  `TotCharges` int(11) NOT NULL,
  `Comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MedicalHistory`
--

INSERT INTO `MedicalHistory` (`TreatmentID`, `CowID`, `TreatmentDate`, `BirthWeight`, `CurrentWeight`, `VetID`, `DiseaseID`, `TotCharges`, `Comments`) VALUES
(10, 12, '2022-04-18', 200, 34, 5, 1, 295, 'take care'),
(11, 12, '2022-04-13', 200, 35, 5, 1, 295, 'Fine'),
(12, 12, '2022-04-13', 12, 35, 5, 1, 295, 'Fine'),
(13, 11, '2022-04-05', 12, 43, 5, 1, 295, 'Good'),
(14, 11, '2022-04-05', 12, 43, 5, 1, 295, 'Good'),
(15, 11, '2022-04-12', 12, 76, 5, 1, 295, 'Fine');

-- --------------------------------------------------------

--
-- Table structure for table `Milk`
--

CREATE TABLE `Milk` (
  `MID` int(11) NOT NULL,
  `CowID` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Comments` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Milk`
--

INSERT INTO `Milk` (`MID`, `CowID`, `Date`, `Quantity`, `Comments`) VALUES
(3, 12, '2022-05-09 23:28:00', 23, '1 time a day');

-- --------------------------------------------------------

--
-- Table structure for table `Supplier`
--

CREATE TABLE `Supplier` (
  `SupplierID` int(11) NOT NULL,
  `SupplierName` varchar(50) NOT NULL,
  `Phone` int(12) NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Zip` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Supplier`
--

INSERT INTO `Supplier` (`SupplierID`, `SupplierName`, `Phone`, `Address`, `City`, `State`, `Zip`) VALUES
(1, 'Ram Lakhan', 666655555, '1234, Wintergreen Ave', 'Irvine', 'California', 95566);

-- --------------------------------------------------------

--
-- Table structure for table `Symptoms`
--

CREATE TABLE `Symptoms` (
  `SymptomID` int(11) NOT NULL,
  `SymptomName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Symptoms`
--

INSERT INTO `Symptoms` (`SymptomID`, `SymptomName`) VALUES
(1, 'Grey-white skin areas'),
(2, 'reproductive disorders'),
(35, 'ww'),
(36, 'hello'),
(37, 'hello123'),
(38, 'Temperament Change'),
(39, 'Temperament Change'),
(40, 'XYZ'),
(41, 'XYZ1'),
(42, 'Fever'),
(43, 'Fever123'),
(44, 'FeverX');

-- --------------------------------------------------------

--
-- Table structure for table `SymptomSeverityRelationship`
--

CREATE TABLE `SymptomSeverityRelationship` (
  `SymSeverID` int(11) NOT NULL,
  `SymptomID` int(11) NOT NULL,
  `Severity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SymptomSeverityRelationship`
--

INSERT INTO `SymptomSeverityRelationship` (`SymSeverID`, `SymptomID`, `Severity`) VALUES
(1, 1, 'Low'),
(2, 1, 'High'),
(3, 39, 'Low'),
(4, 2, 'Medium'),
(5, 1, 'Low'),
(6, 2, 'Low'),
(25, 35, 'Low'),
(26, 36, 'Medium'),
(27, 37, 'Low'),
(28, 38, 'Medium'),
(29, 39, 'Medium'),
(30, 40, 'Medium'),
(31, 41, 'Medium'),
(32, 42, 'Low');

-- --------------------------------------------------------

--
-- Table structure for table `VetInfo`
--

CREATE TABLE `VetInfo` (
  `VetID` int(11) NOT NULL,
  `VetName` varchar(50) NOT NULL,
  `VetAddress` text NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Zip` varchar(50) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `VisitCost` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `VetInfo`
--

INSERT INTO `VetInfo` (`VetID`, `VetName`, `VetAddress`, `City`, `State`, `Zip`, `Phone`, `VisitCost`) VALUES
(5, 'Dr. Chris', '1234, Chapman Ave', 'Anaheim', 'California', '92342', '4444444444', '145'),
(7, 'Dr. Vance', '2345, Orangewood Ave', 'Fullerton', 'California', '92456', '65457648', '200');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Births`
--
ALTER TABLE `Births`
  ADD PRIMARY KEY (`BID`),
  ADD KEY `Test1` (`CowID`);

--
-- Indexes for table `Cow`
--
ALTER TABLE `Cow`
  ADD PRIMARY KEY (`CowID`),
  ADD KEY `test8` (`HerdID`);

--
-- Indexes for table `Disease_Treatment`
--
ALTER TABLE `Disease_Treatment`
  ADD PRIMARY KEY (`DiseaseID`),
  ADD KEY `test12` (`SymSeverID`);

--
-- Indexes for table `FeedInfo`
--
ALTER TABLE `FeedInfo`
  ADD PRIMARY KEY (`FeedInfoID`),
  ADD KEY `test7` (`HerdID`),
  ADD KEY `test6` (`ID`);

--
-- Indexes for table `FeedItems`
--
ALTER TABLE `FeedItems`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `FeedPurchase`
--
ALTER TABLE `FeedPurchase`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD KEY `Test3` (`SupplierID`);

--
-- Indexes for table `Herd`
--
ALTER TABLE `Herd`
  ADD PRIMARY KEY (`HerdID`);

--
-- Indexes for table `ItemPurchase`
--
ALTER TABLE `ItemPurchase`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `test5` (`ItemID`),
  ADD KEY `test18` (`PurchaseID`);

--
-- Indexes for table `MedicalHistory`
--
ALTER TABLE `MedicalHistory`
  ADD PRIMARY KEY (`TreatmentID`),
  ADD KEY `test9` (`CowID`),
  ADD KEY `test11` (`DiseaseID`),
  ADD KEY `test10` (`VetID`);

--
-- Indexes for table `Milk`
--
ALTER TABLE `Milk`
  ADD PRIMARY KEY (`MID`),
  ADD KEY `Test` (`CowID`);

--
-- Indexes for table `Supplier`
--
ALTER TABLE `Supplier`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Indexes for table `Symptoms`
--
ALTER TABLE `Symptoms`
  ADD PRIMARY KEY (`SymptomID`);

--
-- Indexes for table `SymptomSeverityRelationship`
--
ALTER TABLE `SymptomSeverityRelationship`
  ADD PRIMARY KEY (`SymSeverID`),
  ADD KEY `test13` (`SymptomID`);

--
-- Indexes for table `VetInfo`
--
ALTER TABLE `VetInfo`
  ADD PRIMARY KEY (`VetID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Births`
--
ALTER TABLE `Births`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Cow`
--
ALTER TABLE `Cow`
  MODIFY `CowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Disease_Treatment`
--
ALTER TABLE `Disease_Treatment`
  MODIFY `DiseaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `FeedInfo`
--
ALTER TABLE `FeedInfo`
  MODIFY `FeedInfoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `FeedItems`
--
ALTER TABLE `FeedItems`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `FeedPurchase`
--
ALTER TABLE `FeedPurchase`
  MODIFY `PurchaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Herd`
--
ALTER TABLE `Herd`
  MODIFY `HerdID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ItemPurchase`
--
ALTER TABLE `ItemPurchase`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `MedicalHistory`
--
ALTER TABLE `MedicalHistory`
  MODIFY `TreatmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Milk`
--
ALTER TABLE `Milk`
  MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Supplier`
--
ALTER TABLE `Supplier`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Symptoms`
--
ALTER TABLE `Symptoms`
  MODIFY `SymptomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `SymptomSeverityRelationship`
--
ALTER TABLE `SymptomSeverityRelationship`
  MODIFY `SymSeverID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `VetInfo`
--
ALTER TABLE `VetInfo`
  MODIFY `VetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Births`
--
ALTER TABLE `Births`
  ADD CONSTRAINT `Test1` FOREIGN KEY (`CowID`) REFERENCES `Cow` (`CowID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Cow`
--
ALTER TABLE `Cow`
  ADD CONSTRAINT `test8` FOREIGN KEY (`HerdID`) REFERENCES `Herd` (`HerdID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `Disease_Treatment`
--
ALTER TABLE `Disease_Treatment`
  ADD CONSTRAINT `test12` FOREIGN KEY (`SymSeverID`) REFERENCES `SymptomSeverityRelationship` (`SymSeverID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `FeedInfo`
--
ALTER TABLE `FeedInfo`
  ADD CONSTRAINT `test6` FOREIGN KEY (`ID`) REFERENCES `ItemPurchase` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `test7` FOREIGN KEY (`HerdID`) REFERENCES `Herd` (`HerdID`) ON UPDATE CASCADE;

--
-- Constraints for table `FeedPurchase`
--
ALTER TABLE `FeedPurchase`
  ADD CONSTRAINT `Test3` FOREIGN KEY (`SupplierID`) REFERENCES `Supplier` (`SupplierID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ItemPurchase`
--
ALTER TABLE `ItemPurchase`
  ADD CONSTRAINT `test18` FOREIGN KEY (`PurchaseID`) REFERENCES `FeedPurchase` (`PurchaseID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `test5` FOREIGN KEY (`ItemID`) REFERENCES `FeedItems` (`ItemID`) ON UPDATE CASCADE;

--
-- Constraints for table `MedicalHistory`
--
ALTER TABLE `MedicalHistory`
  ADD CONSTRAINT `test10` FOREIGN KEY (`VetID`) REFERENCES `VetInfo` (`VetID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test11` FOREIGN KEY (`DiseaseID`) REFERENCES `disease_treatment` (`DiseaseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test9` FOREIGN KEY (`CowID`) REFERENCES `Cow` (`CowID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Milk`
--
ALTER TABLE `Milk`
  ADD CONSTRAINT `Test` FOREIGN KEY (`CowID`) REFERENCES `Cow` (`CowID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `SymptomSeverityRelationship`
--
ALTER TABLE `SymptomSeverityRelationship`
  ADD CONSTRAINT `test13` FOREIGN KEY (`SymptomID`) REFERENCES `Symptoms` (`SymptomID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
