-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2015 at 05:47 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `enrollements`
--
CREATE DATABASE IF NOT EXISTS `enrollements` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `enrollements`;
-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` varchar(10) NOT NULL,
  `CategoryName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
('BCR', 'Business Core Requirements'),
('BFE', 'Business Free Electives'),
('CERC', 'Computer Engineering Required Courses'),
('CETE', 'Computer Engineering Technical Electives'),
('ECERC', 'Electronics & Communications Engineering Requ'),
('ECETE', 'Electronics & Communications Engineering Tech'),
('ECR', 'Engineering Core Requirements'),
('ESBME', 'Entrepreneurship & Small Business Management '),
('ESBMRC', 'Entrepreneurship & Small Business Management '),
('FE', 'Finance Electives'),
('FRC', 'Finance Required Courses'),
('GBE', 'General Business Electives'),
('GBRC', 'General Business Required Courses'),
('IMEBE', 'Industrial and Manufacturing Engineering Brea'),
('IMERC', 'Industrial and Manufacturing Engineering Requ'),
('ISEMBR', 'ISEM Breadth Requirements'),
('ME', 'Marketing Electives'),
('MEBE', 'Mechanical Engineering Breadth Requirements'),
('MITE', 'Management of Information Technology Elective'),
('MITRC', 'Management of Information Technology Required'),
('MRC', 'Marketing Required Courses'),
('MT1BE', 'Mechatronics Track One Breadth Electives'),
('MT1RC', 'Mechatronics Track One Required Courses'),
('MT2BC', 'Mechatronics Track Two Breadth Electives'),
('MT2RC', 'Mechatronics Track Two Required Courses'),
('OSCME', 'Operations & Supply Chain Management Elective'),
('OSCMRC', 'Operations & Supply Chain Management Required'),
('SEMSBE', 'Service Engineering and Management Systems Br'),
('SEMSRC', 'Service Engineering and Management Systems Re'),
('UGER', 'University General Education Requirements');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `CourseID` varchar(11) NOT NULL,
  `CourseName` varchar(45) DEFAULT NULL,
  `CreditHours` int(1) DEFAULT NULL,
  `MinimumPrereq` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseName`, `CreditHours`, `MinimumPrereq`) VALUES
('ACCT201', 'Financial Accounting', 3, 0),
('ACCT202', 'Managerial Accounting', 3, 0),
('BSAD301', 'Business Ethics', 3, 0),
('BSAD401', 'Business Law', 3, 0),
('BSAD420', 'Strategic Management', 3, 0),
('CHEM101', 'Chemical Principles', 3, 0),
('COMM401', 'Internship & Service Learning', 3, 0),
('CSCE101', 'Computer & Information Skills', 3, 0),
('CSCE201', 'Introduction to Programming', 3, 1),
('ECEN101', 'Electric Circuits', 3, 1),
('ECEN202', 'Fundamentals of Electrical Engineering', 3, 2),
('ECEN203', 'Fundamentals of Computer Engineering', 3, 1),
('ECEN301', 'Analysis & Design of Analog Circuits', 3, 1),
('ECEN302', 'Analysis & Design of Digital Circuits', 3, 2),
('ECEN303', 'Introduction to Computer Systems', 3, 1),
('ECEN304', 'Fundamentals of Computer Systems Software', 3, 1),
('ECEN305', 'Signals & Systems', 3, 1),
('ECEN306', 'Fundamentals of Communications', 3, 2),
('ECEN307', 'Fundamentals of Data Structures & Algorithms', 3, 1),
('ECEN308', 'Fundamentals of Semiconductor Devices', 3, 1),
('ECEN309', 'Digital Integrated Circuit Design', 3, 1),
('ECEN310', 'Fundamentals of Electromagnetics', 3, 1),
('ECEN401', 'Introduction to Computer Networks', 3, 1),
('ECEN402', 'Introduction to Computer Architecture', 3, 2),
('ECEN403', 'Electric Machines', 3, 1),
('ECEN404', 'Introduction to Database Systems', 3, 1),
('ECEN406', 'Fundamentals of Control', 3, 1),
('ECEN407', 'Operating Systems', 3, 1),
('ECEN408', 'Advanced Computer Architecture', 3, 1),
('ECEN409', 'Microprocessor System Design', 3, 1),
('ECEN411', 'Phys. Sensors,Transducers & Instrumentation', 3, 2),
('ECEN412', 'Applied Electromagnetics', 3, 1),
('ECEN413', 'Digital Communications', 3, 1),
('ECEN414', 'Communications Networks', 3, 1),
('ECEN501', 'Machine Intelligence', 3, 1),
('ECEN502', 'Introduction to Computer Security', 3, 1),
('ECEN503', 'Embedded & Discrete Control Systems', 3, 1),
('ECEN504', 'Wireless Communications', 3, 1),
('ECEN510', 'Introduction to Optical Comm. Systems', 3, 1),
('ECEN511', 'Micro & Nano Systems Fabrications', 3, 1),
('ECEN512', 'Analog Integrated Circuit Design', 3, 1),
('ECEN513', 'Radio Frequency Integrated Circuit Design and', 3, 1),
('ECEN514', 'Analog & Digital Filters & Comm. Circuits', 3, 1),
('ECEN515', 'FPGA & ASIC Design', 3, 1),
('ECEN516', 'Intro. to Electric Design Automation', 3, 1),
('ECEN521', 'Embedded System Engineering', 3, 1),
('ECEN522', 'Embedded Real-Time Systems', 3, 1),
('ECEN523', 'Digital Signal Processing', 3, 1),
('ECEN524', 'Image Processing & Bio-Image Informatics', 3, 1),
('ECEN525', 'Mechatronic Design', 3, 1),
('ECEN526', 'Wireless and Mobile Networks', 3, 0),
('ECEN527', 'Software Engineering', 3, 1),
('ECEN528', 'Numerical Methods & Math Precision', 3, 1),
('ECEN529', 'Compiler Construction', 3, 1),
('ECEN530', 'Introduction to Parallel Computing', 3, 1),
('ECEN540 ', 'Selected Topics in Communications', 3, 0),
('ECEN550', 'Selected Topics in Computer Engineering', 3, 0),
('ECON202', 'Microeconomics', 3, 0),
('ENGL100', 'Intensive English', 3, 0),
('ENGL101', 'English 101', 3, 0),
('ENGL102', 'English 102', 3, 1),
('ENGL201', 'Writing Skills', 3, 1),
('ENGL202', 'Communication & Presentation Skills', 3, 1),
('ENGR101', 'Introduction to Engineering Disciplines', 3, 0),
('ENGR102', 'Engineering Design', 3, 1),
('ENGR201', 'Solid Modeling & Workshop', 3, 1),
('ENGR540', 'Graduation Project I', 3, 1),
('ENGR541', 'Graduation Project II', 3, 1),
('FINC301', 'Introduction to Finance', 3, 0),
('FINC401', 'Corporate Financial Management', 3, 0),
('HUMA101', 'Introduction to Logic and Critical Thinking', 2, 0),
('HUMA102', 'Introduction to Ethics', 1, 0),
('HUMA103', 'Selected Topics in Humanities & Arts', 3, 0),
('IENG201', 'Intro. to Industrial & Service Engineering', 3, 0),
('IENG202', 'Manufacturing Technology', 3, 0),
('IENG301 ', 'Engineering Economics', 3, 0),
('IENG302', 'Safety Engineering', 3, 0),
('IENG303', 'Operations Research', 3, 0),
('IENG305', 'Service Science, Management and Engineering', 3, 0),
('IENG306', 'Operations Management', 3, 0),
('IENG307', 'Advanced Statistics and Quality Engineering', 3, 0),
('IENG308', 'Human Factors Engineering', 3, 0),
('IENG309', 'Logistics and Supply Chain Management', 3, 0),
('IENG401', 'Project Management', 3, 0),
('IENG402', 'Materials Technologies and Processes', 3, 0),
('IENG403', 'Engineering Cost Analysis', 3, 0),
('IENG404', 'Product Realization', 3, 0),
('IENG405', 'Facilities Planning and Design', 3, 0),
('IENG406', 'Modeling and Simulation', 3, 0),
('IENG408', 'Managment Information Systems', 3, 0),
('IENG409', 'Advanced Manufacturing Systems', 3, 0),
('IENG410', 'Operations Management in Service Industries', 3, 0),
('IENG411', 'Engineering Management', 3, 0),
('IENG412', 'Intro. to Enterpreneurship & Small Bus. Mgmt', 3, 0),
('IENG413', 'Warehouse Science and Operations', 3, 0),
('IENG501', 'Practical Training', 3, 0),
('IENG502', 'Non-Traditional Manufacturing Technology', 3, 0),
('IENG503', 'Modeling of Industrial and Service Systems', 3, 0),
('IENG504', 'Reverse Engineering', 3, 0),
('IENG505', 'International Business Management', 3, 0),
('IENG506', 'Systems Engineering', 3, 0),
('IENG507', 'Industrial Distribution Systems', 3, 0),
('IENG508', 'Information and Decision Support', 3, 0),
('IENG509', 'Reliability Engineering', 3, 0),
('IENG510', 'Maintenance Management ', 3, 0),
('IENG511', 'Total Quality Management', 3, 0),
('IENG512', 'Intro. to Management of Technology', 3, 0),
('IENG513', 'Design of Experiments', 3, 0),
('IENG517', 'Design of Experiments', 3, 0),
('MATH110', 'Concepts of Mathematics', 3, 0),
('MATH111', 'Analytical Geometry & Calculus I', 3, 0),
('MATH112', 'Calculus II', 4, 1),
('MATH201', 'Introduction to Probability & Statistics', 3, 1),
('MATH203', 'Differential Equations', 4, 1),
('MATH301', 'Linear Algebra', 4, 1),
('MATH302', 'Probability & Statistics for Engineers', 4, 2),
('MENG101', 'Engineering Mechanics', 3, 1),
('MENG201', 'Intro. to Solid Mech. & Strength of Materials', 3, 0),
('MENG202', 'Manufacturing Technology', 3, 0),
('MENG301', 'Mechanical Behavior of Materials', 2, 0),
('MENG302', 'Mechanics II', 3, 0),
('MENG303', 'Introduction to Engineering Materials', 2, 0),
('MENG304', 'Mechanical Measurements', 2, 0),
('MENG305', 'Machine Design', 3, 0),
('MENG307', 'Thermodynamics I', 3, 0),
('MENG308', 'Fluid Mechanics I', 3, 0),
('MENG309', 'Heat Transfer I', 3, 0),
('MENG311', 'Kinematics & Dynamics of Mech. Systems', 3, 0),
('MENG312', 'Modeling & Simulation of Dynamic Sys.', 3, 0),
('MENG401', 'Intro. to Finite Elements in Mech. Eng.', 2, 0),
('MENG405', 'Electronics,Instrument. & Power Ccts', 2, 0),
('MENG501', 'Practical Training', 3, 0),
('MGMT201', 'Fundamentals of Management', 3, 0),
('MGMT303', 'Human Resources Management', 3, 0),
('MKTG301', 'Principles of Marketing', 3, 0),
('MKTG307', 'Marketing Research', 3, 0),
('MOIT301', 'Information Systems and Technologies', 3, 0),
('NSCI102', 'Selected Topics in Natural Sciences', 3, 0),
('NSH***', 'NSCI/SSCI/HUMA', 3, 0),
('OPMG301', 'Operations Management', 3, 0),
('OPMG302', 'Quantitative Methods for Business', 3, 0),
('PHYS101', 'Physics I', 4, 1),
('PHYS201', 'Physics II', 4, 2),
('SEIF101', 'Seif Updated', 3, 0),
('SSCI101', 'Selected Topics in Egyptian & Arab Heritage', 3, 0),
('SSCI102', 'Selected Topics in World Cultures & Diversity', 3, 0),
('SSCI103', 'Selected Topics in Social Sciences', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_major`
--

CREATE TABLE IF NOT EXISTS `course_major` (
  `CourseID` varchar(11) NOT NULL,
  `MajorID` varchar(5) NOT NULL DEFAULT '0',
  `CategoryID` varchar(10) DEFAULT NULL,
  `TrackID` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_major`
--

INSERT INTO `course_major` (`CourseID`, `MajorID`, `CategoryID`, `TrackID`) VALUES
('ACCT201', 'BUS', 'BCR', NULL),
('ACCT202', 'BUS', 'BCR', NULL),
('BSAD301', 'BUS', 'BCR', NULL),
('BSAD401', 'BUS', 'BCR', NULL),
('BSAD420', 'BUS', 'BCR', NULL),
('CHEM101', 'CE', 'ECR', NULL),
('CHEM101', 'ECE', 'ECR', NULL),
('CHEM101', 'ISEM', 'ECR', NULL),
('CHEM101', 'MENG', 'ECR', NULL),
('COMM401', 'BUS', 'UGER', NULL),
('COMM401', 'CE', 'UGER', NULL),
('COMM401', 'ECE', 'UGER', NULL),
('COMM401', 'ISEM', 'UGER', NULL),
('COMM401', 'MENG', 'UGER', NULL),
('CSCE101', 'BUS', 'UGER', NULL),
('CSCE101', 'CE', 'UGER', NULL),
('CSCE101', 'ECE', 'UGER', NULL),
('CSCE101', 'ISEM', 'UGER', NULL),
('CSCE101', 'MENG', 'UGER', NULL),
('CSCE201', 'CE', 'ECR', NULL),
('CSCE201', 'ECE', 'ECR', NULL),
('CSCE201', 'ISEM', 'ECR', NULL),
('CSCE201', 'MENG', 'ECR', NULL),
('ECEN101', 'CE', 'ECR', NULL),
('ECEN101', 'ECE', 'ECR', NULL),
('ECEN101', 'ISEM', 'ECR', NULL),
('ECEN101', 'MENG', 'ECR', NULL),
('ECEN202', 'CE', 'CERC', NULL),
('ECEN202', 'ECE', 'ECERC', NULL),
('ECEN203', 'CE', 'CERC', NULL),
('ECEN203', 'ECE', 'ECERC', NULL),
('ECEN301', 'CE', 'CERC', NULL),
('ECEN301', 'ECE', 'ECERC', NULL),
('ECEN302', 'CE', 'CERC', NULL),
('ECEN302', 'ECE', 'ECERC', NULL),
('ECEN303', 'CE', 'CERC', NULL),
('ECEN303', 'ECE', 'ECERC', NULL),
('ECEN304', 'CE', 'CERC', NULL),
('ECEN305', 'CE', 'CERC', NULL),
('ECEN305', 'ECE', 'ECERC', NULL),
('ECEN306', 'CE', 'CERC', NULL),
('ECEN306', 'ECE', 'ECERC', NULL),
('ECEN307', 'CE', 'CERC', NULL),
('ECEN308', 'ECE', 'ECERC', NULL),
('ECEN309', 'ECE', 'ECERC', NULL),
('ECEN310', 'ECE', 'ECERC', NULL),
('ECEN401', 'CE', 'CERC', NULL),
('ECEN402', 'CE', 'CERC', NULL),
('ECEN402', 'ECE', 'ECETE', NULL),
('ECEN403', 'CE', 'CERC', NULL),
('ECEN403', 'ECE', 'ECERC', NULL),
('ECEN404', 'CE', 'CERC', NULL),
('ECEN406', 'CE', 'CERC', NULL),
('ECEN406', 'ECE', 'ECERC', NULL),
('ECEN407', 'CE', 'CERC', NULL),
('ECEN408', 'CE', 'CERC', NULL),
('ECEN409', 'CE ', 'CERC', NULL),
('ECEN409', 'ECE', 'ECERC', NULL),
('ECEN411', 'ECE', 'ECERC', NULL),
('ECEN412', 'ECE', 'ECERC', NULL),
('ECEN413', 'ECE', 'ECERC', NULL),
('ECEN414', 'ECE', 'ECERC', NULL),
('ECEN501', 'CE', 'CERC', NULL),
('ECEN502', 'CE', 'CERC', NULL),
('ECEN503', 'ECE', 'ECERC', NULL),
('ECEN504', 'ECE', 'ECERC', NULL),
('ECEN510', 'ECE', 'ECETE', NULL),
('ECEN511', 'ECE', 'ECETE', NULL),
('ECEN512', 'ECE', 'ECETE', NULL),
('ECEN513', 'ECE', 'ECETE', NULL),
('ECEN514', 'ECE', 'ECETE', NULL),
('ECEN515', 'ECE', 'ECETE', NULL),
('ECEN516', 'ECE', 'ECETE', NULL),
('ECEN521', 'CE', 'CETE', NULL),
('ECEN522', 'CE', 'CETE', NULL),
('ECEN523', 'CE', 'CETE', NULL),
('ECEN523', 'ECE', 'ECETE', NULL),
('ECEN524', 'CE', 'CETE', NULL),
('ECEN525', 'CE', 'CETE', NULL),
('ECEN525', 'ECE', 'ECETE', NULL),
('ECEN526', 'CE', 'CETE', NULL),
('ECEN527', 'CE', 'CETE', NULL),
('ECEN528', 'CE', 'CETE', NULL),
('ECEN529', 'CE', 'CETE', NULL),
('ECEN530', 'CE', 'CETE', NULL),
('ECEN540', 'ECE', 'ECETE', NULL),
('ECEN550', 'CE', 'CETE', NULL),
('ECON202', 'BUS', 'BCR', NULL),
('ENGL100', 'BUS', 'UGER', NULL),
('ENGL100', 'CE', 'UGER', NULL),
('ENGL100', 'ECE', 'UGER', NULL),
('ENGL100', 'ISEM', 'UGER', NULL),
('ENGL100', 'MENG', 'UGER', NULL),
('ENGL101', 'BUS', 'UGER', NULL),
('ENGL101', 'CE', 'UGER', NULL),
('ENGL101', 'ECE', 'UGER', NULL),
('ENGL101', 'ISEM', 'UGER', NULL),
('ENGL101', 'MENG', 'UGER', NULL),
('ENGL102', 'BUS', 'UGER', NULL),
('ENGL102', 'CE', 'UGER', NULL),
('ENGL102', 'ECE', 'UGER', NULL),
('ENGL102', 'ISEM', 'UGER', NULL),
('ENGL102', 'MENG', 'UGER', NULL),
('ENGL201', 'BUS', 'UGER', NULL),
('ENGL201', 'CE', 'UGER', NULL),
('ENGL201', 'ECE', 'UGER', NULL),
('ENGL201', 'ISEM', 'UGER', NULL),
('ENGL201', 'MENG', 'UGER', NULL),
('ENGL202', 'BUS', 'UGER', NULL),
('ENGL202', 'CE', 'UGER', NULL),
('ENGL202', 'ECE', 'UGER', NULL),
('ENGL202', 'ISEM', 'UGER', NULL),
('ENGL202', 'MENG', 'UGER', NULL),
('ENGR101', 'CE', 'ECR', NULL),
('ENGR101', 'ECE', 'ECR', NULL),
('ENGR101', 'ISEM', 'ECR', NULL),
('ENGR101', 'MENG', 'ECR', NULL),
('ENGR102', 'CE', 'ECR', NULL),
('ENGR102', 'ECE', 'ECR', NULL),
('ENGR102', 'ISEM', 'ECR', NULL),
('ENGR102', 'MENG', 'ECR', NULL),
('ENGR201', 'CE', 'ECR', NULL),
('ENGR201', 'ECE', 'ECR', NULL),
('ENGR201', 'ISEM', 'ECR', NULL),
('ENGR201', 'MENG', 'ECR', NULL),
('ENGR540', 'CE', 'ECR', NULL),
('ENGR540', 'ECE', 'ECR', NULL),
('ENGR540', 'ISEM', 'ECR', NULL),
('ENGR540', 'MENG', 'ECR', NULL),
('ENGR541', 'CE', 'ECR', NULL),
('ENGR541', 'ECE', 'ECR', NULL),
('ENGR541', 'ISEM', 'ECR', NULL),
('ENGR541', 'MENG', 'ECR', NULL),
('FINC301', 'BUS', 'BCR', NULL),
('FINC401', 'BUS', 'BCR', NULL),
('HUMA101', 'BUS', 'UGER', NULL),
('HUMA101', 'CE', 'UGER', NULL),
('HUMA101', 'ECE', 'UGER', NULL),
('HUMA101', 'ISEM', 'UGER', NULL),
('HUMA101', 'MENG', 'UGER', NULL),
('HUMA102', 'BUS', 'UGER', NULL),
('HUMA102', 'CE', 'UGER', NULL),
('HUMA102', 'ECE', 'UGER', NULL),
('HUMA102', 'ISEM', 'UGER', NULL),
('HUMA102', 'MENG', 'UGER', NULL),
('HUMA103', 'BUS', 'UGER', NULL),
('HUMA103', 'CE', 'UGER', NULL),
('HUMA103', 'ECE', 'UGER', NULL),
('HUMA103', 'ISEM', 'UGER', NULL),
('HUMA103', 'MENG', 'UGER', NULL),
('IENG201', 'ISEM', 'ISEMBR', NULL),
('IENG202 ', 'ISEM', 'ISEMBR', NULL),
('IENG301 ', 'CE', 'ECR', NULL),
('IENG301 ', 'ECE', 'ECR', NULL),
('IENG301 ', 'ISEM', 'ECR', NULL),
('IENG301 ', 'MENG', 'ECR', NULL),
('IENG302', 'CE', 'ECR', NULL),
('IENG302', 'ECE', 'ECR', NULL),
('IENG302', 'ISEM', 'ECR', NULL),
('IENG302', 'MENG', 'ECR', NULL),
('IENG303', 'ISEM', 'ISEMBR', NULL),
('IENG305', 'ISEM', 'ISEMBR', NULL),
('IENG306', 'ISEM', 'ISEMBR', NULL),
('IENG307', 'ISEM', 'ISEMBR', NULL),
('IENG308', 'ISEM', 'ISEMBR', NULL),
('IENG309', 'ISEM', 'ISEMBR', NULL),
('IENG401', 'ISEM', 'ISEMBR', NULL),
('IENG402', 'ISEM', 'IMERC', NULL),
('IENG403', 'ISEM', 'IMERC', NULL),
('IENG404', 'ISEM', 'IMERC', NULL),
('IENG405', 'ISEM', 'ISEMBR', NULL),
('IENG406', 'ISEM', 'ISEMBR', NULL),
('IENG408', 'ISEM', 'ISEMBR', NULL),
('IENG409', 'ISEM', 'IMERC', NULL),
('IENG410', 'ISEM', 'IMEBE', NULL),
('IENG411', 'ISEM', 'IMEBE', NULL),
('IENG412', 'ISEM', 'IMEBE', NULL),
('IENG413', 'ISEM', 'IMEBE', NULL),
('IENG501', 'ISEM', 'ISEMBR', NULL),
('IENG502', 'ISEM', 'IMERC', NULL),
('IENG503', 'ISEM', 'IMEBE', NULL),
('IENG504', 'ISEM', 'IMEBE', NULL),
('IENG505', 'ISEM', 'IMEBE', NULL),
('IENG506', 'ISEM', 'IMEBE', NULL),
('IENG507', 'ISEM', 'IMEBE', NULL),
('IENG508', 'ISEM', 'IMEBE', NULL),
('IENG509', 'ISEM', 'IMEBE', NULL),
('IENG510', 'ISEM', 'IMEBE', NULL),
('IENG511', 'ISEM', 'IMEBE', NULL),
('IENG512', 'ISEM', 'IMEBE', NULL),
('IENG517', 'ISEM', 'IMEBE', NULL),
('MATH110', 'BUS', 'UGER', NULL),
('MATH111', 'CE', 'UGER', NULL),
('MATH111', 'ECE', 'UGER', NULL),
('MATH111', 'ISEM', 'UGER', NULL),
('MATH111', 'MENG', 'UGER', NULL),
('MATH112', 'CE', 'ECR', NULL),
('MATH112', 'ECE', 'ECR', NULL),
('MATH112', 'ISEM', 'ECR', NULL),
('MATH112', 'MENG', 'ECR', NULL),
('MATH201', 'BUS', 'UGER', NULL),
('MATH201', 'CE', 'UGER', NULL),
('MATH201', 'ECE', 'UGER', NULL),
('MATH201', 'ISEM', 'UGER', NULL),
('MATH201', 'MENG', 'UGER', NULL),
('MATH203', 'CE', 'ECR', NULL),
('MATH203', 'ECE', 'ECR', NULL),
('MATH203', 'ISEM', 'ECR', NULL),
('MATH203', 'MENG', 'ECR', NULL),
('MATH301', 'CE', 'ECR', NULL),
('MATH301', 'ECE', 'ECR', NULL),
('MATH301', 'ISEM', 'ECR', NULL),
('MATH301', 'MENG', 'ECR', NULL),
('MATH302', 'CE', 'ECR', NULL),
('MATH302', 'ECE', 'ECR', NULL),
('MATH302', 'ISEM', 'ECR', NULL),
('MATH302', 'MENG', 'ECR', NULL),
('MENG101', 'CE', 'ECR', NULL),
('MENG101', 'ECE', 'ECR', NULL),
('MENG101', 'ISEM', 'ECR', NULL),
('MENG101', 'MENG', 'ECR', NULL),
('MENG201', 'MENG', 'MEBE', NULL),
('MENG202', 'MENG', 'MEBE', NULL),
('MENG301', 'MENG', 'MEBE', NULL),
('MENG302', 'MENG', 'MEBE', NULL),
('MENG303', 'MENG', 'MEBE', NULL),
('MENG304', 'MENG', 'MEBE', NULL),
('MENG305', 'MENG', 'MEBE', NULL),
('MENG307', 'MENG', 'MEBE', NULL),
('MENG308', 'MENG', 'MEBE', NULL),
('MENG309', 'MENG', 'MEBE', NULL),
('MENG311', 'MENG', 'MEBE', NULL),
('MENG312', 'MENG', 'MEBE', NULL),
('MENG401', 'MENG', 'MEBE', NULL),
('MENG405', 'MENG', 'MEBE', NULL),
('MENG501', 'MENG', 'MEBE', NULL),
('MGMT201', 'BUS', 'BCR', NULL),
('MGMT303', 'BUS', 'BCR', NULL),
('MKTG301', 'BUS', 'BCR', NULL),
('MKTG307', 'BUS', 'BCR', NULL),
('MOIT301', 'BUS', 'BCR', NULL),
('NSCI102', 'BUS', 'UGER', NULL),
('NSCI102', 'CE', 'UGER', NULL),
('NSCI102', 'ECE', 'UGER', NULL),
('NSCI102', 'ISEM', 'UGER', NULL),
('NSCI102', 'MENG', 'UGER', NULL),
('NSH***', 'BUS', 'UGER', NULL),
('NSH***', 'CE', 'UGER', NULL),
('NSH***', 'ECE', 'UGER', NULL),
('NSH***', 'ISEM', 'UGER', NULL),
('NSH***', 'MENG', 'UGER', NULL),
('OPMG301', 'BUS', 'BCR', NULL),
('OPMG302', 'BUS', 'BCR', NULL),
('PHYS101', 'CE', 'ECR', NULL),
('PHYS101', 'ECE', 'ECR', NULL),
('PHYS101', 'ISEM', 'ECR', NULL),
('PHYS101', 'MENG', 'ECR', NULL),
('PHYS201', 'CE', 'ECR', NULL),
('PHYS201', 'ECE', 'ECR', NULL),
('PHYS201', 'ISEM', 'ECR', NULL),
('PHYS201', 'MENG', 'ECR', NULL),
('SSCI101', 'BUS', 'UGER', NULL),
('SSCI101', 'CE', 'UGER', NULL),
('SSCI101', 'ECE', 'UGER', NULL),
('SSCI101', 'ISEM', 'UGER', NULL),
('SSCI101', 'MENG', 'UGER', NULL),
('SSCI102', 'BUS', 'UGER', NULL),
('SSCI102', 'CE', 'UGER', NULL),
('SSCI102', 'ECE', 'UGER', NULL),
('SSCI102', 'ISEM', 'UGER', NULL),
('SSCI102', 'MENG', 'UGER', NULL),
('SSCI103', 'BUS', 'UGER', NULL),
('SSCI103', 'CE', 'UGER', NULL),
('SSCI103', 'ECE', 'UGER', NULL),
('SSCI103', 'ISEM', 'UGER', NULL),
('SSCI103', 'MENG', 'UGER', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE IF NOT EXISTS `credits` (
  `CreditHours` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `credits`
--

INSERT INTO `credits` (`CreditHours`) VALUES
(0),
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `grading_points`
--

CREATE TABLE IF NOT EXISTS `grading_points` (
  `GradeLetter` varchar(2) NOT NULL,
  `QualityPoints` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grading_points`
--

INSERT INTO `grading_points` (`GradeLetter`, `QualityPoints`) VALUES
('A', 4),
('A+', 4),
('A-', 3.7),
('B', 3),
('B+', 3.3),
('B-', 2.7),
('C', 2),
('C+', 2.3),
('C-', 1.7),
('D', 1),
('D+', 1.3),
('F', 0),
('I', 0);

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE IF NOT EXISTS `major` (
  `MajorID` varchar(5) NOT NULL,
  `MajorName` varchar(200) DEFAULT NULL,
  `SchoolID` varchar(5) DEFAULT NULL,
  `ProgramDirector` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`MajorID`, `MajorName`, `SchoolID`, `ProgramDirector`) VALUES
('BUS', 'General Business', 'BBA', NULL),
('CE', 'Computer Engineering', 'CIT', 'Mahmoud Allam'),
('ECE', 'Electronics & Communications Engineering', 'CIT', 'Rafiq Guindi'),
('ENTR', 'Entrepreneurship & Small Business Management', 'BBA', NULL),
('FINC', 'Finance', 'BBA', NULL),
('ISEM', 'Industrial Engineering & Service Management', 'ENGR', 'Ahmed Deif'),
('MENG', 'Mechanics & Mechatronics', 'ENGR', 'Wael Akl'),
('MKTG', 'Marketing', 'BBA', NULL),
('MOIT', 'Management of Information Technology', 'BBA', NULL),
('OPMG', 'Operations & Supply Chain Management', 'BBA', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `possible_years`
--

CREATE TABLE IF NOT EXISTS `possible_years` (
  `Year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `possible_years`
--

INSERT INTO `possible_years` (`Year`) VALUES
(2009),
(2010),
(2011),
(2012),
(2013),
(2014),
(2015),
(2016);

-- --------------------------------------------------------

--
-- Table structure for table `prerequisites`
--

CREATE TABLE IF NOT EXISTS `prerequisites` (
  `CourseID` varchar(10) NOT NULL,
  `PrereqID` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prerequisites`
--

INSERT INTO `prerequisites` (`CourseID`, `PrereqID`) VALUES
('CSCE201', 'CSCE101'),
('ECEN203', 'CSCE101'),
('ECEN307', 'CSCE201'),
('ECEN402', 'CSCE201'),
('ECEN202', 'ECEN101'),
('ECEN301', 'ECEN202'),
('ECEN302', 'ECEN202'),
('ECEN306', 'ECEN202'),
('ECEN308', 'ECEN202'),
('ECEN310', 'ECEN202'),
('ECEN403', 'ECEN202'),
('ECEN302', 'ECEN203'),
('ECEN303', 'ECEN203'),
('ECEN304', 'ECEN203'),
('ECEN401', 'ECEN203'),
('ECEN402', 'ECEN203'),
('ECEN512', 'ECEN301'),
('ECEN309', 'ECEN302'),
('ECEN521', 'ECEN303'),
('ECEN522', 'ECEN303'),
('ECEN409', 'ECEN304'),
('ECEN501', 'ECEN304'),
('ECEN527', 'ECEN304'),
('ECEN306', 'ECEN305'),
('ECEN406', 'ECEN305'),
('ECEN523', 'ECEN305'),
('ECEN524', 'ECEN305'),
('ECEN413', 'ECEN306'),
('ECEN414', 'ECEN306'),
('ECEN504', 'ECEN306'),
('ECEN514', 'ECEN306'),
('ECEN404', 'ECEN307'),
('ECEN407', 'ECEN307'),
('ECEN528', 'ECEN307'),
('ECEN529', 'ECEN307'),
('ECEN530', 'ECEN307'),
('ECEN411', 'ECEN308'),
('ECEN510', 'ECEN308'),
('ECEN511', 'ECEN308'),
('ECEN515', 'ECEN309'),
('ECEN516', 'ECEN309'),
('ECEN411', 'ECEN310'),
('ECEN412', 'ECEN310'),
('ECEN502', 'ECEN401'),
('ECEN408', 'ECEN402'),
('ECEN503', 'ECEN406'),
('ECEN525', 'ECEN503'),
('ECEN513', 'ECEN512'),
('ECEN525', 'ECEN521'),
('ENGL201', 'ENGL102'),
('ENGL202', 'ENGL201'),
('ENGR102', 'ENGR101'),
('ENGR201', 'ENGR102'),
('ENGR541', 'ENGR540'),
('MATH112', 'MATH111'),
('MATH201', 'MATH111'),
('MENG101', 'MATH111'),
('PHYS101', 'MATH111'),
('PHYS201', 'MATH111'),
('MATH203', 'MATH112'),
('MATH302', 'MATH201'),
('ECEN202', 'MATH203'),
('ECEN305', 'MATH203'),
('MATH301', 'MATH203'),
('MATH302', 'MATH203'),
('ECEN101', 'PHYS101'),
('PHYS201', 'PHYS101');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `SchoolID` varchar(5) NOT NULL,
  `SchoolName` varchar(100) NOT NULL,
  `DeanName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`SchoolID`, `SchoolName`, `DeanName`) VALUES
('BBA', 'School Of Business', 'Khaled Hegazy'),
('CIT', 'School of Communications and Information Technology', 'Hussien Anis'),
('ENGR', 'School of Engineering & Applied Sciences', 'Hussien Anis');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `SectionID` int(11) NOT NULL,
  `CourseID` varchar(11) NOT NULL,
  `SemesterOfOfferedSection` varchar(45) NOT NULL,
  `YearOfOfferedSection` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`SectionID`, `CourseID`, `SemesterOfOfferedSection`, `YearOfOfferedSection`) VALUES
(1, 'CHEM101', 'Fall', 2011),
(1, 'CSCE101', 'Fall', 2011),
(1, 'CSCE201', 'Fall', 2011),
(1, 'ECEN101', 'Fall', 2011),
(1, 'ECEN202', 'Fall', 2011),
(1, 'ECEN303', 'Fall', 2011),
(1, 'ECEN305', 'Fall', 2011),
(1, 'ECON202', 'Fall', 2011),
(1, 'ENGL100', 'Fall', 2011),
(1, 'ENGL101', 'Fall', 2011),
(1, 'ENGL102', 'Fall', 2011),
(1, 'ENGL201', 'Fall', 2011),
(1, 'ENGL202', 'Fall', 2011),
(1, 'ENGR101', 'Fall', 2011),
(1, 'HUMA101', 'Fall', 2011),
(1, 'HUMA102', 'Fall', 2011),
(1, 'IENG303', 'Fall', 2011),
(1, 'IENG305', 'Fall', 2011),
(1, 'MATH110', 'Fall', 2011),
(1, 'MATH111', 'Fall', 2011),
(1, 'MATH112', 'Fall', 2011),
(1, 'MATH201', 'Fall', 2011),
(1, 'MATH203', 'Fall', 2011),
(1, 'MATH302', 'Fall', 2011),
(1, 'MENG101', 'Fall', 2011),
(1, 'OPMG302', 'Fall', 2011),
(1, 'PHYS101', 'Fall', 2011),
(1, 'PHYS201', 'Fall', 2011),
(1, 'SSCI102', 'Fall', 2011),
(2, 'ENGL201', 'Fall', 2011),
(1, 'ACCT201', 'Fall', 2012),
(1, 'ACCT201', 'Spring', 2012),
(1, 'BSAD401', 'Spring', 2012),
(1, 'CHEM101', 'Spring', 2012),
(1, 'CSCE101', 'Fall', 2012),
(1, 'CSCE201', 'Fall', 2012),
(1, 'CSCE201', 'Spring', 2012),
(1, 'ECEN101', 'Fall', 2012),
(1, 'ECEN101', 'Spring', 2012),
(1, 'ECEN202', 'Spring', 2012),
(1, 'ECEN203', 'Spring', 2012),
(1, 'ECEN301', 'Fall', 2012),
(1, 'ECEN302', 'Spring', 2012),
(1, 'ECEN304', 'Spring', 2012),
(1, 'ECEN305', 'Fall', 2012),
(1, 'ECEN305', 'Spring', 2012),
(1, 'ECEN306', 'Spring', 2012),
(1, 'ECEN307', 'Fall', 2012),
(1, 'ECEN310', 'Fall', 2012),
(1, 'ECEN402', 'Fall', 2012),
(1, 'ECEN403', 'Fall', 2012),
(1, 'ECEN406', 'Fall', 2012),
(1, 'ECEN413', 'Fall', 2012),
(1, 'ENGL100', 'Fall', 2012),
(1, 'ENGL101', 'Fall', 2012),
(1, 'ENGL102', 'Fall', 2012),
(1, 'ENGL102', 'Spring', 2012),
(1, 'ENGL201', 'Fall', 2012),
(1, 'ENGL201', 'Spring', 2012),
(1, 'ENGL202', 'Fall', 2012),
(1, 'ENGL202', 'Spring', 2012),
(1, 'ENGR101', 'Fall', 2012),
(1, 'ENGR102', 'Spring', 2012),
(1, 'ENGR201', 'Fall', 2012),
(1, 'FINC301', 'Spring', 2012),
(1, 'HUMA101', 'Spring', 2012),
(1, 'HUMA102', 'Spring', 2012),
(1, 'HUMA103', 'Fall', 2012),
(1, 'IENG201', 'Spring', 2012),
(1, 'IENG301 ', 'Fall', 2012),
(1, 'IENG303', 'Fall', 2012),
(1, 'IENG305', 'Fall', 2012),
(1, 'IENG306', 'Spring', 2012),
(1, 'IENG307', 'Spring', 2012),
(1, 'IENG308', 'Spring', 2012),
(1, 'IENG309', 'Fall', 2012),
(1, 'IENG401', 'Fall', 2012),
(1, 'IENG405', 'Fall', 2012),
(1, 'IENG408', 'Fall', 2012),
(1, 'MATH110', 'Fall', 2012),
(1, 'MATH111', 'Fall', 2012),
(1, 'MATH112', 'Spring', 2012),
(1, 'MATH201', 'Fall', 2012),
(1, 'MATH201', 'Spring', 2012),
(1, 'MATH203', 'Fall', 2012),
(1, 'MATH203', 'Spring', 2012),
(1, 'MATH301', 'Spring', 2012),
(1, 'MATH302', 'Spring', 2012),
(1, 'MENG101', 'Fall', 2012),
(1, 'MENG101', 'Spring', 2012),
(1, 'MENG201', 'Spring', 2012),
(1, 'MGMT201', 'Spring', 2012),
(1, 'MKTG301', 'Spring', 2012),
(1, 'OPMG301', 'Spring', 2012),
(1, 'OPMG302', 'Fall', 2012),
(1, 'PHYS101', 'Spring', 2012),
(1, 'PHYS201', 'Fall', 2012),
(1, 'PHYS201', 'Spring', 2012),
(1, 'SSCI101', 'Fall', 2012),
(1, 'SSCI102', 'Spring', 2012),
(1, 'BSAD301', 'Spring', 2013),
(1, 'BSAD401', 'Spring', 2013),
(1, 'BSAD420', 'Spring', 2013),
(1, 'CHEM101', 'Fall', 2013),
(1, 'CSCE101', 'Fall', 2013),
(1, 'CSCE201', 'Spring', 2013),
(1, 'ECEN101', 'Fall', 2013),
(1, 'ECEN202', 'Spring', 2013),
(1, 'ECEN203', 'Spring', 2013),
(1, 'ECEN301', 'Spring', 2013),
(1, 'ECEN302', 'Fall', 2013),
(1, 'ECEN303', 'Spring', 2013),
(1, 'ECEN304', 'Fall', 2013),
(1, 'ECEN305', 'Fall', 2013),
(1, 'ECEN306', 'Fall', 2013),
(1, 'ECEN308', 'Spring', 2013),
(1, 'ECEN309', 'Fall', 2013),
(1, 'ECEN310', 'Fall', 2013),
(1, 'ECEN401', 'Spring', 2013),
(1, 'ECEN404', 'Spring', 2013),
(1, 'ECEN407', 'Spring', 2013),
(1, 'ECEN408', 'Spring', 2013),
(1, 'ECEN409', 'Spring', 2013),
(1, 'ECEN412', 'Spring', 2013),
(1, 'ECEN414', 'Spring', 2013),
(1, 'ECEN501', 'Fall', 2013),
(1, 'ECEN502', 'Fall', 2013),
(1, 'ECEN504', 'Spring', 2013),
(1, 'ECEN512', 'Fall', 2013),
(1, 'ECEN523', 'Fall', 2013),
(1, 'ENGL100', 'Fall', 2013),
(1, 'ENGL100', 'Spring', 2013),
(1, 'ENGL101', 'Fall', 2013),
(1, 'ENGL101', 'Spring', 2013),
(1, 'ENGL102', 'Fall', 2013),
(1, 'ENGL102', 'Spring', 2013),
(1, 'ENGL201', 'Fall', 2013),
(1, 'ENGL202', 'Fall', 2013),
(1, 'ENGL202', 'Spring', 2013),
(1, 'ENGR101', 'Fall', 2013),
(1, 'ENGR102', 'Spring', 2013),
(1, 'ENGR201', 'Fall', 2013),
(1, 'HUMA101', 'Spring', 2013),
(1, 'HUMA102', 'Spring', 2013),
(1, 'IENG201', 'Spring', 2013),
(1, 'IENG302', 'Fall', 2013),
(1, 'IENG303', 'Fall', 2013),
(1, 'IENG305', 'Fall', 2013),
(1, 'IENG306', 'Spring', 2013),
(1, 'IENG307', 'Spring', 2013),
(1, 'IENG308', 'Spring', 2013),
(1, 'IENG401', 'Fall', 2013),
(1, 'IENG404', 'Fall', 2013),
(1, 'IENG406', 'Spring', 2013),
(1, 'IENG409', 'Spring', 2013),
(1, 'IENG411', 'Spring', 2013),
(1, 'IENG412', 'Spring', 2013),
(1, 'IENG505', 'Spring', 2013),
(1, 'MATH111', 'Fall', 2013),
(1, 'MATH112', 'Spring', 2013),
(1, 'MATH201', 'Fall', 2013),
(1, 'MATH203', 'Fall', 2013),
(1, 'MATH301', 'Spring', 2013),
(1, 'MATH302', 'Spring', 2013),
(1, 'MENG101', 'Fall', 2013),
(1, 'MGMT201', 'Spring', 2013),
(1, 'MOIT301', 'Spring', 2013),
(1, 'NSCI102', 'Spring', 2013),
(1, 'OPMG301', 'Spring', 2013),
(1, 'PHYS101', 'Spring', 2013),
(1, 'PHYS201', 'Fall', 2013),
(1, 'SSCI102', 'Fall', 2013),
(1, 'SSCI102', 'Spring', 2013),
(1, 'SSCI103', 'Fall', 2013),
(1, 'SSCI103', 'Spring', 2013),
(2, 'ENGL201', 'Fall', 2013),
(3, 'ENGL201', 'Fall', 2013),
(1, 'ACCT202', 'Fall', 2014),
(1, 'BSAD301', 'Fall', 2014),
(1, 'BSAD401', 'Spring', 2014),
(1, 'BSAD420', 'Spring', 2014),
(1, 'CSCE101', 'Fall', 2014),
(1, 'CSCE201', 'Spring', 2014),
(1, 'ECEN101', 'Fall', 2014),
(1, 'ECEN202', 'Spring', 2014),
(1, 'ECEN203', 'Spring', 2014),
(1, 'ECEN301', 'Spring', 2014),
(1, 'ECEN303', 'Spring', 2014),
(1, 'ECEN305', 'Spring', 2014),
(1, 'ECEN306', 'Fall', 2014),
(1, 'ECEN307', 'Spring', 2014),
(1, 'ECEN309', 'Fall', 2014),
(1, 'ECEN401', 'Fall', 2014),
(1, 'ECEN402', 'Spring', 2014),
(1, 'ECEN403', 'Spring', 2014),
(1, 'ECEN404', 'Fall', 2014),
(1, 'ECEN406', 'Spring', 2014),
(1, 'ECEN407', 'Fall', 2014),
(1, 'ECEN408', 'Fall', 2014),
(1, 'ECEN409', 'Spring', 2014),
(1, 'ECEN412', 'Fall', 2014),
(1, 'ECEN413', 'Fall', 2014),
(1, 'ECEN414', 'Fall', 2014),
(1, 'ECEN501', 'Fall', 2014),
(1, 'ECEN503', 'Spring', 2014),
(1, 'ECEN504', 'Fall', 2014),
(1, 'ECEN510', 'Spring', 2014),
(1, 'ECEN521', 'Spring', 2014),
(1, 'ECEN550', 'Fall', 2014),
(1, 'ENGL100', 'Fall', 2014),
(1, 'ENGL100', 'Spring', 2014),
(1, 'ENGL101', 'Fall', 2014),
(1, 'ENGL101', 'Spring', 2014),
(1, 'ENGL102', 'Fall', 2014),
(1, 'ENGL102', 'Spring', 2014),
(1, 'ENGL201', 'Fall', 2014),
(1, 'ENGL201', 'Spring', 2014),
(1, 'ENGL202', 'Fall', 2014),
(1, 'ENGL202', 'Spring', 2014),
(1, 'ENGR101', 'Fall', 2014),
(1, 'ENGR102', 'Spring', 2014),
(1, 'ENGR201', 'Fall', 2014),
(1, 'HUMA101', 'Spring', 2014),
(1, 'HUMA102', 'Spring', 2014),
(1, 'HUMA103', 'Fall', 2014),
(1, 'IENG201', 'Spring', 2014),
(1, 'IENG202', 'Spring', 2014),
(1, 'IENG303', 'Fall', 2014),
(1, 'IENG305', 'Fall', 2014),
(1, 'IENG307', 'Spring', 2014),
(1, 'IENG308', 'Spring', 2014),
(1, 'IENG403', 'Spring', 2014),
(1, 'IENG405', 'Spring', 2014),
(1, 'IENG406', 'Spring', 2014),
(1, 'IENG408', 'Spring', 2014),
(1, 'IENG409', 'Fall', 2014),
(1, 'IENG410', 'Fall', 2014),
(1, 'IENG411', 'Spring', 2014),
(1, 'IENG412', 'Spring', 2014),
(1, 'IENG413', 'Spring', 2014),
(1, 'IENG503', 'Fall', 2014),
(1, 'IENG508', 'Fall', 2014),
(1, 'IENG512', 'Spring', 2014),
(1, 'MATH110', 'Fall', 2014),
(1, 'MATH111', 'Fall', 2014),
(1, 'MATH112', 'Spring', 2014),
(1, 'MATH201', 'Fall', 2014),
(1, 'MATH203', 'Fall', 2014),
(1, 'MATH301', 'Spring', 2014),
(1, 'MATH302', 'Fall', 2014),
(1, 'MATH302', 'Spring', 2014),
(1, 'MENG101', 'Fall', 2014),
(1, 'MENG201', 'Fall', 2014),
(1, 'MENG304', 'Fall', 2014),
(1, 'NSCI102', 'Spring', 2014),
(1, 'PHYS101', 'Spring', 2014),
(1, 'PHYS201', 'Fall', 2014),
(1, 'SSCI101', 'Spring', 2014),
(2, 'ENGL100', 'Fall', 2014),
(2, 'ENGL101', 'Fall', 2014),
(2, 'ENGL102', 'Spring', 2014),
(2, 'ENGL201', 'Fall', 2014),
(2, 'ENGL202', 'Spring', 2014),
(1, 'ACCT201', 'Spring', 2015),
(1, 'BSAD401', 'Spring', 2015),
(1, 'BSAD420', 'Spring', 2015),
(1, 'CHEM101', 'Spring', 2015),
(1, 'COMM401', 'Fall', 2015),
(1, 'CSCE101', 'Fall', 2015),
(1, 'CSCE201', 'Spring', 2015),
(1, 'ECEN101', 'Fall', 2015),
(1, 'ECEN202', 'Spring', 2015),
(1, 'ECEN203', 'Spring', 2015),
(1, 'ECEN301', 'Spring', 2015),
(1, 'ECEN302', 'Spring', 2015),
(1, 'ECEN303', 'Spring', 2015),
(1, 'ECEN307', 'Spring', 2015),
(1, 'ECEN412', 'Spring', 2015),
(1, 'ECEN502', 'Spring', 2015),
(1, 'ECEN504', 'Spring', 2015),
(1, 'ECEN515', 'Spring', 2015),
(1, 'ECEN521', 'Spring', 2015),
(1, 'ECEN527', 'Spring', 2015),
(1, 'ECEN528', 'Spring', 2015),
(1, 'ECEN540 ', 'Spring', 2015),
(1, 'ECEN550', 'Spring', 2015),
(1, 'ENGL100', 'Spring', 2015),
(1, 'ENGL101', 'Spring', 2015),
(1, 'ENGL102', 'Spring', 2015),
(1, 'ENGL201', 'Spring', 2015),
(1, 'ENGL202', 'Spring', 2015),
(1, 'ENGR101', 'Spring', 2015),
(1, 'ENGR102', 'Spring', 2015),
(1, 'HUMA101', 'Spring', 2015),
(1, 'HUMA102', 'Spring', 2015),
(1, 'IENG201', 'Spring', 2015),
(1, 'IENG306', 'Spring', 2015),
(1, 'IENG401', 'Spring', 2015),
(1, 'IENG403', 'Spring', 2015),
(1, 'IENG404', 'Spring', 2015),
(1, 'IENG406', 'Spring', 2015),
(1, 'IENG408', 'Spring', 2015),
(1, 'IENG412', 'Spring', 2015),
(1, 'IENG413', 'Spring', 2015),
(1, 'IENG512', 'Spring', 2015),
(1, 'MATH112', 'Spring', 2015),
(1, 'MATH201', 'Spring', 2015),
(1, 'MATH301', 'Spring', 2015),
(1, 'MENG302', 'Spring', 2015),
(1, 'MENG307', 'Spring', 2015),
(1, 'MENG308', 'Spring', 2015),
(1, 'NSCI102', 'Spring', 2015),
(1, 'PHYS101', 'Spring', 2015),
(1, 'SSCI103', 'Spring', 2015),
(2, 'CSCE201', 'Spring', 2015),
(2, 'ECEN101', 'Fall', 2015),
(2, 'ENGL101', 'Spring', 2015),
(2, 'ENGL102', 'Spring', 2015),
(2, 'ENGL201', 'Spring', 2015),
(2, 'ENGL202', 'Spring', 2015),
(2, 'MATH112', 'Spring', 2015),
(2, 'MATH201', 'Spring', 2015),
(3, 'ENGL101', 'Spring', 2015),
(3, 'ENGL102', 'Spring', 2015),
(4, 'ENGL102', 'Spring', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `StudentID` int(11) NOT NULL,
  `GPA` float DEFAULT NULL,
  `CreditsTaken` int(11) DEFAULT NULL,
  `MajorID` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `GPA`, `CreditsTaken`, `MajorID`) VALUES
(1010046, 0, 0, 'CE'),
(1010062, 0, 0, 'CE'),
(1010063, 0, 0, 'CE'),
(1210056, 0, 0, 'CE'),
(1310037, 0, 0, 'CE'),
(1310038, 0, 0, 'ISEM'),
(1610001, 0, 0, 'CE'),
(1610002, 0, 0, 'CE');

-- --------------------------------------------------------

--
-- Table structure for table `takes`
--

CREATE TABLE IF NOT EXISTS `takes` (
  `StudentID` int(11) NOT NULL,
  `CourseID` varchar(11) NOT NULL,
  `SectionID` int(11) NOT NULL,
  `SemesterTaken` varchar(45) NOT NULL,
  `YearTaken` year(4) NOT NULL,
  `Grade` varchar(2) NOT NULL DEFAULT 'I'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `takes`
--

INSERT INTO `takes` (`StudentID`, `CourseID`, `SectionID`, `SemesterTaken`, `YearTaken`, `Grade`) VALUES
(1210056, 'CSCE101', 1, 'Fall', 2012, 'I');

--
-- Triggers `takes`
--
DELIMITER //
CREATE TRIGGER `takes_AFTER_DELETE` AFTER DELETE ON `takes`
 FOR EACH ROW BEGIN
	update student 
	inner join 
	(select takes.StudentID, sum(course.CreditHours) as 'Credits' 
	from takes,course, student 
	where course.CourseID=takes.CourseID 
			and student.StudentID=takes.StudentID 
			and takes.Grade != 'I'
	Group by takes.StudentID
	) as StudentTotalCredits on student.StudentID = StudentTotalCredits.StudentID
	set CreditsTaken=StudentTotalCredits.Credits;

	update student
	inner join
	(select GroupStudentsByYearAndSemester.StudentID,ROUND((sum(GroupStudentsByYearAndSemester.SummingGPA))/student.CreditsTaken,2)as 'GPA'
	from student,
		(select takes.StudentID, takes.SemesterTaken ,takes.YearTaken, count(takes.CourseID) as 'Number of courses per semester' , sum(course.CreditHours*grading_points.QualityPoints) as 'SummingGPA'
		from takes,course, student, applicants.applicant_applied_semester, grading_points
		where course.CourseID=takes.CourseID 
		and takes.SemesterTaken=applicants.applicant_applied_semester.AppliedSemester
		and student.StudentID=takes.StudentID 
		and takes.Grade=grading_points.GradeLetter
		and takes.Grade != 'I'
		Group by takes.StudentID,takes.SemesterTaken ,takes.YearTaken) as GroupStudentsByYearAndSemester
	where student.StudentID=GroupStudentsByYearAndSemester.StudentID
	Group by GroupStudentsByYearAndSemester.StudentID
	) as UpdateGPA on student.StudentID = UpdateGPA.StudentID
	set student.GPA=UpdateGPA.GPA;
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `takes_AFTER_INSERT` AFTER INSERT ON `takes`
 FOR EACH ROW BEGIN
if (new.Grade != 'I') THEN
	update student 
	inner join 
	(select takes.StudentID, sum(course.CreditHours) as 'Credits' 
	from takes,course, student 
	where course.CourseID=takes.CourseID 
	and student.StudentID=takes.StudentID 
	Group by takes.StudentID
	) as StudentTotalCredits on student.StudentID = StudentTotalCredits.StudentID
	set CreditsTaken=StudentTotalCredits.Credits;


	update student
	inner join
	(select GroupStudentsByYearAndSemester.StudentID,ROUND((sum(GroupStudentsByYearAndSemester.SummingGPA))/student.CreditsTaken,2)as 'GPA'
	from student,(select takes.StudentID, takes.SemesterTaken ,takes.YearTaken, count(takes.CourseID) as 'Number of courses per semester' , sum(course.CreditHours*grading_points.QualityPoints) as 'SummingGPA'
	from takes,course, student, applicants.applicant_applied_semester, grading_points
	where course.CourseID=takes.CourseID 
	and takes.SemesterTaken=applicants.applicant_applied_semester.AppliedSemester
	and student.StudentID=takes.StudentID 
	and takes.Grade=grading_points.GradeLetter
	Group by takes.StudentID,takes.SemesterTaken ,takes.YearTaken) as GroupStudentsByYearAndSemester
	where student.StudentID=GroupStudentsByYearAndSemester.StudentID
	Group by GroupStudentsByYearAndSemester.StudentID
	) as UpdateGPA on student.StudentID = UpdateGPA.StudentID
	set student.GPA=UpdateGPA.GPA;
END IF;

END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `takes_AFTER_UPDATE` AFTER UPDATE ON `takes`
 FOR EACH ROW BEGIN
if (new.Grade != 'I') THEN
	update student 
	inner join 
	(select takes.StudentID, sum(course.CreditHours) as 'Credits' 
	from takes,course, student 
	where course.CourseID=takes.CourseID 
	and student.StudentID=takes.StudentID 
    and takes.Grade!='I'
	Group by takes.StudentID
	) as StudentTotalCredits on student.StudentID = StudentTotalCredits.StudentID
	set CreditsTaken=StudentTotalCredits.Credits;


	update student
	inner join
	(select GroupStudentsByYearAndSemester.StudentID,ROUND((sum(GroupStudentsByYearAndSemester.SummingGPA))/student.CreditsTaken,2)as 'GPA'
	from student,
		(select takes.StudentID, takes.SemesterTaken ,takes.YearTaken, count(takes.CourseID) as 'Number of courses per semester' , sum(course.CreditHours*grading_points.QualityPoints) as 'SummingGPA'
		from takes,course, student, applicants.applicant_applied_semester, grading_points
		where course.CourseID=takes.CourseID 
		and takes.SemesterTaken=applicants.applicant_applied_semester.AppliedSemester
		and student.StudentID=takes.StudentID 
		and takes.Grade=grading_points.GradeLetter
        and takes.Grade!='I'
		Group by takes.StudentID,takes.SemesterTaken ,takes.YearTaken) as GroupStudentsByYearAndSemester
	where student.StudentID=GroupStudentsByYearAndSemester.StudentID
	Group by GroupStudentsByYearAndSemester.StudentID
	) as UpdateGPA on student.StudentID = UpdateGPA.StudentID
	set student.GPA=UpdateGPA.GPA;
END IF;

IF(new.grade = 'I') THEN
	update student 
	inner join 
	(select takes.StudentID, sum(course.CreditHours) as 'Credits' 
	from takes,course, student 
	where course.CourseID=takes.CourseID 
			and student.StudentID=takes.StudentID 
			and takes.Grade != 'I'
	Group by takes.StudentID
	) as StudentTotalCredits on student.StudentID = StudentTotalCredits.StudentID
	set CreditsTaken=StudentTotalCredits.Credits;

	update student
	inner join
	(select GroupStudentsByYearAndSemester.StudentID,ROUND((sum(GroupStudentsByYearAndSemester.SummingGPA))/student.CreditsTaken,2)as 'GPA'
	from student,
		(select takes.StudentID, takes.SemesterTaken ,takes.YearTaken, count(takes.CourseID) as 'Number of courses per semester' , sum(course.CreditHours*grading_points.QualityPoints) as 'SummingGPA'
		from takes,course, student, applicants.applicant_applied_semester, grading_points
		where course.CourseID=takes.CourseID 
		and takes.SemesterTaken=applicants.applicant_applied_semester.AppliedSemester
		and student.StudentID=takes.StudentID 
		and takes.Grade=grading_points.GradeLetter
		and takes.Grade != 'I'
		Group by takes.StudentID,takes.SemesterTaken ,takes.YearTaken) as GroupStudentsByYearAndSemester
	where student.StudentID=GroupStudentsByYearAndSemester.StudentID
	Group by GroupStudentsByYearAndSemester.StudentID
	) as UpdateGPA on student.StudentID = UpdateGPA.StudentID
	set student.GPA=UpdateGPA.GPA;

END IF;

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE IF NOT EXISTS `track` (
  `TrackID` varchar(5) NOT NULL,
  `MajorID` varchar(5) DEFAULT NULL,
  `TrackName` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`TrackID`, `MajorID`, `TrackName`) VALUES
('IMET', 'ISEM', 'Industrial and Manufacturing Engineering Track'),
('MT1', 'MENG', 'Mechatronics Track One'),
('MT2', 'MENG', 'Mechatronics Track Two'),
('SEMST', 'ISEM', 'Service Engineering and Management Systems Track');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`CourseID`), ADD KEY `CreditHours_FK_idx` (`CreditHours`);

--
-- Indexes for table `course_major`
--
ALTER TABLE `course_major`
 ADD PRIMARY KEY (`CourseID`,`MajorID`), ADD KEY `course_MajorID_FK` (`MajorID`), ADD KEY `category_FK_idx` (`CategoryID`), ADD KEY `track_FK_idx` (`TrackID`);

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
 ADD PRIMARY KEY (`CreditHours`), ADD UNIQUE KEY `CreditHours_UNIQUE` (`CreditHours`);

--
-- Indexes for table `grading_points`
--
ALTER TABLE `grading_points`
 ADD PRIMARY KEY (`GradeLetter`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
 ADD PRIMARY KEY (`MajorID`), ADD KEY `major_ibfk_1` (`SchoolID`);

--
-- Indexes for table `possible_years`
--
ALTER TABLE `possible_years`
 ADD PRIMARY KEY (`Year`);

--
-- Indexes for table `prerequisites`
--
ALTER TABLE `prerequisites`
 ADD PRIMARY KEY (`CourseID`,`PrereqID`), ADD KEY `CourseID_FK_idx` (`CourseID`,`PrereqID`), ADD KEY `PrereqID_FK_idx` (`PrereqID`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
 ADD PRIMARY KEY (`SchoolID`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
 ADD PRIMARY KEY (`SectionID`,`CourseID`,`SemesterOfOfferedSection`,`YearOfOfferedSection`), ADD KEY `section_ibfk_1_idx` (`CourseID`), ADD KEY `semester_applicant_applied_semester_FK_idx` (`SemesterOfOfferedSection`), ADD KEY `section_year_fk` (`YearOfOfferedSection`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`StudentID`), ADD UNIQUE KEY `StudentID_UNIQUE` (`StudentID`), ADD KEY `MajorID_FK_idx` (`MajorID`);

--
-- Indexes for table `takes`
--
ALTER TABLE `takes`
 ADD PRIMARY KEY (`StudentID`,`CourseID`,`SectionID`,`SemesterTaken`,`YearTaken`), ADD KEY `SectionID` (`SectionID`), ADD KEY `Grade_FK_idx` (`Grade`), ADD KEY `SemesterTaken_FK_idx` (`SemesterTaken`), ADD KEY `takes_ibfk_2_idx` (`CourseID`), ADD KEY `year_fk_idx2` (`YearTaken`), ADD KEY `year_fk_idx` (`YearTaken`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
 ADD PRIMARY KEY (`TrackID`), ADD KEY `MajorID_idx` (`MajorID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
ADD CONSTRAINT `CreditHours_FK` FOREIGN KEY (`CreditHours`) REFERENCES `credits` (`CreditHours`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_major`
--
ALTER TABLE `course_major`
ADD CONSTRAINT `category_FK` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `course_MajorID_FK` FOREIGN KEY (`MajorID`) REFERENCES `major` (`MajorID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `course_major_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `track_FK` FOREIGN KEY (`TrackID`) REFERENCES `track` (`TrackID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `major`
--
ALTER TABLE `major`
ADD CONSTRAINT `major_ibfk_1` FOREIGN KEY (`SchoolID`) REFERENCES `school` (`SchoolID`);

--
-- Constraints for table `prerequisites`
--
ALTER TABLE `prerequisites`
ADD CONSTRAINT `CourseID_FK` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `PrereqID_FK` FOREIGN KEY (`PrereqID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `section_year_fk` FOREIGN KEY (`YearOfOfferedSection`) REFERENCES `possible_years` (`Year`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `semester_applicant_applied_semester_FK` FOREIGN KEY (`SemesterOfOfferedSection`) REFERENCES `applicants`.`applicant_applied_semester` (`AppliedSemester`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `MajorID_FK` FOREIGN KEY (`MajorID`) REFERENCES `major` (`MajorID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `studentID_FK` FOREIGN KEY (`StudentID`) REFERENCES `applicants`.`applicant` (`ApplicationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `takes`
--
ALTER TABLE `takes`
ADD CONSTRAINT `Grade_FK` FOREIGN KEY (`Grade`) REFERENCES `grading_points` (`GradeLetter`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `SemesterTaken_FK` FOREIGN KEY (`SemesterTaken`) REFERENCES `section` (`SemesterOfOfferedSection`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `takes_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `takes_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `section` (`CourseID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `takes_ibfk_3` FOREIGN KEY (`SectionID`) REFERENCES `section` (`SectionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `track`
--
ALTER TABLE `track`
ADD CONSTRAINT `MajorID` FOREIGN KEY (`MajorID`) REFERENCES `major` (`MajorID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
