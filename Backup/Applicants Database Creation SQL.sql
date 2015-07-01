-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2015 at 08:45 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `applicants`
--
CREATE DATABASE IF NOT EXISTS `applicants` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `applicants`;

-- --------------------------------------------------------

--
-- Table structure for table `admission_info`
--

DROP TABLE IF EXISTS `admission_info`;
CREATE TABLE IF NOT EXISTS `admission_info` (
  `ApplicationID` int(11) NOT NULL,
  `SemesterOfApplication` varchar(45) NOT NULL,
  `Year` year(4) NOT NULL,
  `AppliedSchool` varchar(45) NOT NULL,
  `IntendedMajor` varchar(5) NOT NULL,
  `TOEFLResults` int(4) DEFAULT NULL,
  `TOEFLDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admission_info`
--

INSERT INTO `admission_info` (`ApplicationID`, `SemesterOfApplication`, `Year`, `AppliedSchool`, `IntendedMajor`, `TOEFLResults`, `TOEFLDate`) VALUES
(1010046, 'Fall', 2010, 'CIT', 'CE', NULL, NULL),
(1010062, 'Fall', 2010, 'CIT', 'CE', NULL, NULL),
(1010063, 'Fall', 2010, 'CIT', 'CE', NULL, NULL),
(1210056, 'Fall', 2012, 'CIT', 'CE', NULL, NULL),
(1310037, 'Fall', 2013, 'CIT', 'CE', 0, '0000-00-00'),
(1310038, 'Fall', 2013, 'ENGR', 'ISEM', 0, '0000-00-00'),
(1610001, 'Fall', 2016, 'CIT', 'CE', 0, '0000-00-00'),
(1610002, 'Fall', 2016, 'CIT', 'CE', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

DROP TABLE IF EXISTS `applicant`;
CREATE TABLE IF NOT EXISTS `applicant` (
  `ApplicationID` int(11) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `MiddleName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `IsMale` bit(1) NOT NULL,
  `MilitaryStatus` varchar(45) DEFAULT NULL,
  `PlaceOfBirth` varchar(45) NOT NULL,
  `NationalID` varchar(45) DEFAULT NULL,
  `NationalIDExpiry` date DEFAULT NULL,
  `Passport` varchar(45) DEFAULT NULL,
  `PassportExpiry` date DEFAULT NULL,
  `ApplicationPassword` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`ApplicationID`, `FirstName`, `MiddleName`, `LastName`, `DateOfBirth`, `IsMale`, `MilitaryStatus`, `PlaceOfBirth`, `NationalID`, `NationalIDExpiry`, `Passport`, `PassportExpiry`, `ApplicationPassword`) VALUES
(1010046, 'Nevine', 'Mahmoud', 'Gouda', '1993-05-04', b'0', '', 'Egypt', '', '0000-00-00', '', '0000-00-00', ''),
(1010062, 'Hady', 'Mahmoud', 'Rashwan', '1992-12-01', b'1', 'Postponed', 'Egypt', '', '0000-00-00', '', '0000-00-00', ''),
(1010063, 'Ahmed', 'Ahmed', 'Mosharafa', '1993-09-02', b'1', 'Postponed', 'Egypt', '2930902298', '2020-02-02', '', '0000-00-00', ''),
(1210056, 'SeiF', 'Sameh', 'Saad', '1993-06-10', b'1', 'Postponed', 'Egypt', '29310072502394', '2016-02-02', '4176666', '2016-01-23', ''),
(1310037, 'Ahmed', 'Mahmoud', 'Abdelaziz', '1995-05-12', b'1', 'Postponed', 'Oman', '29505122501111', '2015-04-23', '', '0000-00-00', ''),
(1310038, 'Mayada', 'Effat', 'ElSherbiny', '1995-09-16', b'0', '', 'Cairo', '29509162501234', '2017-08-08', '', '0000-00-00', 'mayada927'),
(1610001, 'Seif', 'jdfhfkjsh', 'jhkjhkljhl', '1237-03-04', b'1', 'Completed', 'adfdf', '12345678909', '5676-12-04', '', '0000-00-00', '12345'),
(1610002, 'Seifsdjl', 'popopo', 'poppopoo', '1237-03-04', b'1', 'Completed', 'adfdf', '12345678909', '5676-12-04', '', '0000-00-00', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_applied_semester`
--

DROP TABLE IF EXISTS `applicant_applied_semester`;
CREATE TABLE IF NOT EXISTS `applicant_applied_semester` (
  `AppliedSemester` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicant_applied_semester`
--

INSERT INTO `applicant_applied_semester` (`AppliedSemester`) VALUES
('Fall'),
('Spring'),
('Summer');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_military_status`
--

DROP TABLE IF EXISTS `applicant_military_status`;
CREATE TABLE IF NOT EXISTS `applicant_military_status` (
  `MilitaryStatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicant_military_status`
--

INSERT INTO `applicant_military_status` (`MilitaryStatus`) VALUES
(''),
('Completed'),
('Exempted'),
('Postponed');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

DROP TABLE IF EXISTS `contact_info`;
CREATE TABLE IF NOT EXISTS `contact_info` (
  `ApplicationID` int(11) NOT NULL,
  `HomeAddress` text,
  `HomeTel` varchar(45) DEFAULT NULL,
  `HomeMobile` varchar(45) DEFAULT NULL,
  `HomeFax` varchar(45) DEFAULT NULL,
  `HomeEmail` varchar(45) DEFAULT NULL,
  `MailingAddress` text,
  `MailingTel` varchar(45) DEFAULT NULL,
  `MailingMobile` varchar(45) DEFAULT NULL,
  `MailingFax` varchar(45) DEFAULT NULL,
  `MailingEmail` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`ApplicationID`, `HomeAddress`, `HomeTel`, `HomeMobile`, `HomeFax`, `HomeEmail`, `MailingAddress`, `MailingTel`, `MailingMobile`, `MailingFax`, `MailingEmail`) VALUES
(1010046, 'mekka st. mohandessen', '0237483391', '01006715854', '', 'nevine.gouda@gmail.com', '', '', '', '', ''),
(1010062, 'Mosaddak Street, Dokki', '023032909', '+201009130913', '', 'h2rashwan@gmail.com', '', '', '', '', ''),
(1010063, 'Manyal', '0223640570', '+201000100772', '', 'ahmed.mosharafa@gmail.com', '', '', '', '', ''),
(1210056, '33, El Khalifa El Amir Street, Behind the International Park', '0223876207', '+201119156200', '', 's3.seif@gmail.com', '', '', '', '', ''),
(1310037, 'Maadi', '0229706863', '01140310961', '', 'a.3b3ziz@gmail.com', '', '', '', '', ''),
(1310038, 'Tagamo3', '1', '01111472146', '', 'mayada.elsherbiny@hotmail.com', '', '', '', '', ''),
(1610001, 'dkjdhskjah', '87687687', '86786786', '', 'hkjkljlk@mil.com', '', '', '', '', ''),
(1610002, 'dkjdhskjah', '87687687', '86786786', '', 'hkjkljlk@mil.com', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `father_info`
--

DROP TABLE IF EXISTS `father_info`;
CREATE TABLE IF NOT EXISTS `father_info` (
  `ApplicationID` int(11) NOT NULL,
  `FatherFirstName` varchar(45) NOT NULL,
  `FatherMiddleName` varchar(45) NOT NULL,
  `FatherLastName` varchar(45) NOT NULL,
  `FatherAddress` text,
  `FatherTel` varchar(45) DEFAULT NULL,
  `FatherMobile` varchar(45) DEFAULT NULL,
  `FatherOccupation` varchar(45) DEFAULT NULL,
  `FatherCompany` varchar(45) DEFAULT NULL,
  `FatherBusinessPhone` varchar(45) DEFAULT NULL,
  `FatherEmail` varchar(45) DEFAULT NULL,
  `FatherFax` varchar(45) DEFAULT NULL,
  `FatherBusinessAddress` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `father_info`
--

INSERT INTO `father_info` (`ApplicationID`, `FatherFirstName`, `FatherMiddleName`, `FatherLastName`, `FatherAddress`, `FatherTel`, `FatherMobile`, `FatherOccupation`, `FatherCompany`, `FatherBusinessPhone`, `FatherEmail`, `FatherFax`, `FatherBusinessAddress`) VALUES
(1010046, 'Mahmoud', 'Effat', 'Gouda', '', '0202930829', '0121398', 'Kbeer', '', '', 'msoliman@gmail.com', '', ''),
(1010062, 'Mahmoud', '7ag', 'Rashwan', '', '0202930829', '+20329849819', 'Business Man', '', '', 'h2rashwan@gmail.com', '', ''),
(1010063, 'Ahmed', 'Ahmed', 'Mosharafa', '', '0236627327', '+20103029380724', 'Kbeer', '', '', 'mosharafa@gmail.com', '', ''),
(1210056, 'Sameh', 'Saad', 'Ahmed', '', '0223876207', '+201224785284', 'Professor', '', '', 'sameh.mining@yahoo.com', '', ''),
(1310037, 'Mahmoud', 'Abdelaziz', 'Mohamed', '', '012384324', '01119832176', 'AJDSH', '', '', 'abo.3b3ziz@gmail.com', '', ''),
(1310038, 'El7ag', 'Abo', 'Mayada', '', '0123091874', '1098327123', 'Father', '', '', 'baba.mayada@hotmail.com', '', ''),
(1610001, 'jkhkljhlkjh', 'khlkjh', 'kjhkjh', '', '123456789', '23456789', 'kjhdkjh', '', '', 'ldkajsl@aik.com', '', ''),
(1610002, 'jkhkljhlkjh', 'khlkjh', 'kjhkjh', '', '123456789', '23456789', 'kjhdkjh', '', '', 'ldkajsl@aik.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `financial_info`
--

DROP TABLE IF EXISTS `financial_info`;
CREATE TABLE IF NOT EXISTS `financial_info` (
  `ApplicationID` int(11) NOT NULL,
  `Relationship` varchar(45) NOT NULL,
  `OtherFirstName` varchar(45) NOT NULL,
  `OtherMiddleName` varchar(45) NOT NULL,
  `OtherLastName` varchar(45) NOT NULL,
  `Other` varchar(45) DEFAULT NULL,
  `OtherAddress` text,
  `OtherTel` varchar(45) DEFAULT NULL,
  `OtherMobile` varchar(45) DEFAULT NULL,
  `OtherOccupation` varchar(45) DEFAULT NULL,
  `OtherCompany` varchar(45) DEFAULT NULL,
  `OtherBusinessPhone` varchar(45) DEFAULT NULL,
  `OtherEmail` varchar(45) DEFAULT NULL,
  `OtherFax` varchar(45) DEFAULT NULL,
  `OtherBusinessAddress` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `financial_info`
--

INSERT INTO `financial_info` (`ApplicationID`, `Relationship`, `OtherFirstName`, `OtherMiddleName`, `OtherLastName`, `Other`, `OtherAddress`, `OtherTel`, `OtherMobile`, `OtherOccupation`, `OtherCompany`, `OtherBusinessPhone`, `OtherEmail`, `OtherFax`, `OtherBusinessAddress`) VALUES
(1010046, 'Father', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1010062, 'Father', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1010063, 'Father', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1210056, 'Father', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1310037, 'Father', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1310038, 'Father', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1610001, 'Father', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1610002, 'Father', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `highschool_info`
--

DROP TABLE IF EXISTS `highschool_info`;
CREATE TABLE IF NOT EXISTS `highschool_info` (
  `ApplicationID` int(11) NOT NULL,
  `CurrentSchool` varchar(45) DEFAULT NULL,
  `TypeOfSchool` varchar(45) DEFAULT NULL,
  `TypeOfCertificate` varchar(45) DEFAULT NULL,
  `SchoolAddress` text,
  `LanguageOfInstruction` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `highschool_info_type_of_certificate`
--

DROP TABLE IF EXISTS `highschool_info_type_of_certificate`;
CREATE TABLE IF NOT EXISTS `highschool_info_type_of_certificate` (
  `TypeOfCertificate` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `highschool_info_type_of_certificate`
--

INSERT INTO `highschool_info_type_of_certificate` (`TypeOfCertificate`) VALUES
('American Diploma'),
('French Baccalaureate'),
('German Abitur'),
('IGCSE'),
('Thanaweya Amma'),
('Thanaweya Arab');

-- --------------------------------------------------------

--
-- Table structure for table `highschool_info_type_of_school`
--

DROP TABLE IF EXISTS `highschool_info_type_of_school`;
CREATE TABLE IF NOT EXISTS `highschool_info_type_of_school` (
  `TypeOfSchool` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `highschool_info_type_of_school`
--

INSERT INTO `highschool_info_type_of_school` (`TypeOfSchool`) VALUES
('Private'),
('Public');

-- --------------------------------------------------------

--
-- Table structure for table `mother_info`
--

DROP TABLE IF EXISTS `mother_info`;
CREATE TABLE IF NOT EXISTS `mother_info` (
  `ApplicationID` int(11) NOT NULL,
  `MotherFirstName` varchar(45) NOT NULL,
  `MotherMiddleName` varchar(45) NOT NULL,
  `MotherLastName` varchar(45) NOT NULL,
  `MotherAddress` text,
  `MotherTel` varchar(45) DEFAULT NULL,
  `MotherMobile` varchar(45) DEFAULT NULL,
  `MotherOccupation` varchar(45) DEFAULT NULL,
  `MotherCompany` varchar(45) DEFAULT NULL,
  `MotherBusinessPhone` varchar(45) DEFAULT NULL,
  `MotherEmail` varchar(45) DEFAULT NULL,
  `MotherFax` varchar(45) DEFAULT NULL,
  `MotherBusinessAddress` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mother_info`
--

INSERT INTO `mother_info` (`ApplicationID`, `MotherFirstName`, `MotherMiddleName`, `MotherLastName`, `MotherAddress`, `MotherTel`, `MotherMobile`, `MotherOccupation`, `MotherCompany`, `MotherBusinessPhone`, `MotherEmail`, `MotherFax`, `MotherBusinessAddress`) VALUES
(1010046, 'Azza', 'mahmoud', 'salem', '', '03209324897', '+2032984797', '-', '', '', 'dhfdhfd@gmail.com', '', ''),
(1010062, 'Neamat', 'Om', 'Hady', '', '03209324897', '+2032984797', 'Housewife', '', '', 'om_hodz@gmail.com', '', ''),
(1010063, 'Amal', 'Om', 'Mosharafa', '', '02203298', '+201030293280', 'UNESCO', '', '', 'om.mosharafa@gmail.com', '', ''),
(1210056, 'Manal', 'Yassin', 'Riad', '', '0223876207', '+201066681988', 'Housewife', '', '', 'my_riad@yahoo.com', '', ''),
(1310037, 'El7agga', 'Om', '3b3ziz', '', '10293783423', '123098120938', 'Mother', '', '', 'om.3b3ziz@gmail.com', '', ''),
(1310038, 'El7agga', 'Om', 'Mayada', '', '2094380981', '0123912873', 'Mother', '', '', 'om.mayada@hotmail.com', '', ''),
(1610001, 'dakljsd', 'dksljjlk', 'dsklj', '', '5765675', '456789', 'dadsal', '', '', 'lakjds@maill.com', '', ''),
(1610002, 'dakljsd', 'dksljjlk', 'dsklj', '', '5765675', '456789', 'dadsal', '', '', 'lakjds@maill.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `relationship_financial_info`
--

DROP TABLE IF EXISTS `relationship_financial_info`;
CREATE TABLE IF NOT EXISTS `relationship_financial_info` (
  `Relationship` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `relationship_financial_info`
--

INSERT INTO `relationship_financial_info` (`Relationship`) VALUES
('Father'),
('Mother'),
('Other');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_info`
--
ALTER TABLE `admission_info`
 ADD PRIMARY KEY (`ApplicationID`), ADD UNIQUE KEY `ApplicationID_UNIQUE` (`ApplicationID`), ADD KEY `admission_info_FK_idx` (`ApplicationID`), ADD KEY `applied_semester_FK_idx` (`SemesterOfApplication`), ADD KEY `IntendedMajor` (`IntendedMajor`), ADD KEY `applied_school_FK` (`AppliedSchool`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
 ADD PRIMARY KEY (`ApplicationID`), ADD UNIQUE KEY `ApplicationID_UNIQUE` (`ApplicationID`), ADD KEY `Military_Status_FK_idx` (`MilitaryStatus`);

--
-- Indexes for table `applicant_applied_semester`
--
ALTER TABLE `applicant_applied_semester`
 ADD PRIMARY KEY (`AppliedSemester`);

--
-- Indexes for table `applicant_military_status`
--
ALTER TABLE `applicant_military_status`
 ADD PRIMARY KEY (`MilitaryStatus`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
 ADD PRIMARY KEY (`ApplicationID`), ADD UNIQUE KEY `ApplicationID_UNIQUE` (`ApplicationID`), ADD KEY `contact_info_applicant_ID_FK_idx` (`ApplicationID`);

--
-- Indexes for table `father_info`
--
ALTER TABLE `father_info`
 ADD PRIMARY KEY (`ApplicationID`), ADD UNIQUE KEY `ApplicationID_UNIQUE` (`ApplicationID`), ADD KEY `father_info_applicant_ID_FK_idx` (`ApplicationID`);

--
-- Indexes for table `financial_info`
--
ALTER TABLE `financial_info`
 ADD PRIMARY KEY (`ApplicationID`), ADD UNIQUE KEY `ApplicationID_UNIQUE` (`ApplicationID`), ADD KEY `financial_info_applicant_ID_FK_idx` (`ApplicationID`), ADD KEY `financial_info_relationship_FK_idx` (`Relationship`);

--
-- Indexes for table `highschool_info`
--
ALTER TABLE `highschool_info`
 ADD PRIMARY KEY (`ApplicationID`), ADD UNIQUE KEY `ApplicationID_UNIQUE` (`ApplicationID`), ADD KEY `highschool_info_applicant_ID_FK_idx` (`ApplicationID`), ADD KEY `TypeOfSchool_FK_idx` (`TypeOfSchool`), ADD KEY `TypeOfCertificate_FK_idx` (`TypeOfCertificate`);

--
-- Indexes for table `highschool_info_type_of_certificate`
--
ALTER TABLE `highschool_info_type_of_certificate`
 ADD PRIMARY KEY (`TypeOfCertificate`);

--
-- Indexes for table `highschool_info_type_of_school`
--
ALTER TABLE `highschool_info_type_of_school`
 ADD PRIMARY KEY (`TypeOfSchool`);

--
-- Indexes for table `mother_info`
--
ALTER TABLE `mother_info`
 ADD PRIMARY KEY (`ApplicationID`), ADD UNIQUE KEY `ApplicationID_UNIQUE` (`ApplicationID`), ADD KEY `mother_info_applicant_ID_FK_idx` (`ApplicationID`);

--
-- Indexes for table `relationship_financial_info`
--
ALTER TABLE `relationship_financial_info`
 ADD PRIMARY KEY (`Relationship`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission_info`
--
ALTER TABLE `admission_info`
ADD CONSTRAINT `admission_info_FK` FOREIGN KEY (`ApplicationID`) REFERENCES `applicant` (`ApplicationID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `applied_semester_FK` FOREIGN KEY (`SemesterOfApplication`) REFERENCES `applicant_applied_semester` (`AppliedSemester`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
ADD CONSTRAINT `Military_Status_FK` FOREIGN KEY (`MilitaryStatus`) REFERENCES `applicant_military_status` (`MilitaryStatus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact_info`
--
ALTER TABLE `contact_info`
ADD CONSTRAINT `contact_info_applicant_ID_FK` FOREIGN KEY (`ApplicationID`) REFERENCES `applicant` (`ApplicationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `father_info`
--
ALTER TABLE `father_info`
ADD CONSTRAINT `father_info_applicant_ID_FK` FOREIGN KEY (`ApplicationID`) REFERENCES `applicant` (`ApplicationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `financial_info`
--
ALTER TABLE `financial_info`
ADD CONSTRAINT `financial_info_applicant_ID_FK` FOREIGN KEY (`ApplicationID`) REFERENCES `applicant` (`ApplicationID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `financial_info_relationship_FK` FOREIGN KEY (`Relationship`) REFERENCES `relationship_financial_info` (`Relationship`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `highschool_info`
--
ALTER TABLE `highschool_info`
ADD CONSTRAINT `TypeOfCertificate_FK` FOREIGN KEY (`TypeOfCertificate`) REFERENCES `highschool_info_type_of_certificate` (`TypeOfCertificate`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `TypeOfSchool_FK` FOREIGN KEY (`TypeOfSchool`) REFERENCES `highschool_info_type_of_school` (`TypeOfSchool`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `highschool_info_applicant_ID_FK` FOREIGN KEY (`ApplicationID`) REFERENCES `applicant` (`ApplicationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mother_info`
--
ALTER TABLE `mother_info`
ADD CONSTRAINT `mother_info_applicant_ID_FK` FOREIGN KEY (`ApplicationID`) REFERENCES `applicant` (`ApplicationID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
