-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2020 at 05:54 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universityproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `userName`, `password`) VALUES
(1, 'admin1', 'admin1', 'password1');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numberOfCredits` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=105312 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `code`, `name`, `numberOfCredits`, `description`) VALUES
(100305, 'CSC305', 'Programming 1', 3, 'C++'),
(100306, 'CSC306', 'Programming 2', 3, 'Object Oriented C++'),
(101202, 'MAT202', 'Matlab', 3, 'Matlab'),
(100400, 'CSC400', 'Analysis and Design', 3, 'Analysis and Design'),
(100300, 'CSC300', 'Database', 3, 'Database design and SQL'),
(100301, 'CSC301', 'Software Engineering', 3, 'Software Engineering'),
(100302, 'CSC302', 'ITPM', 3, 'IT Project Management'),
(101213, 'MAT213', 'CalculusIII', 3, 'CalculusIII'),
(101215, 'MAT215', 'Linear Algebra I', 3, 'Linear Algebra I'),
(101224, 'MAT224', 'CalculusIV', 3, 'CalculusIV'),
(102212, 'PHS212', 'Electricity and Magnetism', 3, 'Electricity and Magnetism'),
(101325, 'MAT325', 'Elements of Probability', 3, 'Elements of Probability'),
(103220, 'STA220', 'Applied Statistics', 3, 'Applied Statistics'),
(104201, 'ACO201', 'Principle of Accounting I', 3, 'Principle of Accounting I'),
(105311, 'MGT311', 'Business Law', 3, 'Business Law');

-- --------------------------------------------------------

--
-- Table structure for table `courseoffering`
--

DROP TABLE IF EXISTS `courseoffering`;
CREATE TABLE IF NOT EXISTS `courseoffering` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semesterId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `scheduleId` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courseoffering`
--

INSERT INTO `courseoffering` (`id`, `semesterId`, `courseId`, `scheduleId`, `teacherId`) VALUES
(1, 60, 100305, 3, 80),
(2, 60, 100306, 4, 81),
(3, 60, 101202, 21, 80),
(4, 60, 100400, 22, 80),
(5, 60, 100300, 23, 81),
(6, 60, 100301, 24, 81),
(7, 61, 100305, 1, 80),
(8, 61, 100306, 20, 81),
(9, 61, 101202, 3, 80),
(10, 61, 100400, 20, 80),
(11, 61, 100300, 7, 81),
(12, 61, 100301, 8, 81),
(13, 61, 100302, 9, 81);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseOfferingId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `courseOfferingId`, `studentId`, `grade`) VALUES
(1, 1, 20183020, 64),
(2, 6, 20183020, 75),
(3, 2, 20193033, 82),
(4, 6, 20193033, 87),
(5, 1, 20193410, 89),
(6, 6, 20193410, 95),
(7, 8, 20183020, 0),
(8, 10, 20183020, 75),
(11, 9, 20193033, 85),
(12, 10, 20193033, 80),
(13, 11, 20193033, 0),
(14, 13, 20193033, 0),
(15, 8, 20193410, 0),
(16, 9, 20193410, 47),
(17, 10, 20193410, 50),
(18, 13, 20193410, 0);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `name`) VALUES
(1, 'MWF 8:00-9:00 AM'),
(2, 'MWF 9:00-10:00 AM'),
(3, 'MWF 11:00-12:00 AM'),
(4, 'MWF 12:00-1:00 PM'),
(5, 'MWF 1:00-2:00 PM'),
(6, 'MWF 2:00-3:00 PM'),
(7, 'MWF 3:00-4:00 PM'),
(8, 'MWF 4:00-5:00 PM'),
(9, 'MWF 5:00-6:00 PM'),
(10, 'MWF 6:00-7:00 PM'),
(20, 'TTh 8:00-9:15 AM'),
(21, 'TTh 9:30-10:45 AM'),
(22, 'TTh 11:00-12:15 PM'),
(23, 'TTh 12:30-1:45 PM'),
(24, 'TTh 2:00-3:15 PM'),
(25, 'TTh 3:30-4:45 PM'),
(26, 'TTh 5:00-6:15 PM'),
(27, 'TTh 6:30-7:45 PM');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

DROP TABLE IF EXISTS `semester`;
CREATE TABLE IF NOT EXISTS `semester` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `startingDate` date NOT NULL,
  `endingDate` date NOT NULL,
  `currentSemester` tinyint(1) NOT NULL DEFAULT '0' COMMENT '=1 if this semester is the current semester',
  `canRegister` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `name`, `startingDate`, `endingDate`, `currentSemester`, `canRegister`) VALUES
(60, 'Fall2019', '2019-10-01', '2020-01-31', 0, 1),
(61, 'Spring2020', '2020-02-17', '2020-06-17', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middleName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobileNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20193415 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstName`, `middleName`, `lastName`, `email`, `mobileNumber`, `password`) VALUES
(20183020, 'Iyad', 'Walid', 'Debian', 'iwd01@parkuni.edu.lb', '81/203022', 'iyad333'),
(20193033, 'Kareen', 'Moufid', 'Radi', 'kmr01@parkuni.edu.lb', '70/536399', 'kareen333'),
(20193410, 'Daniel', 'Louay', 'Beaini', 'dlb02@parkuni.edu.lb', '71/542968', 'daniel333'),
(20193411, 'Michelle', 'Toni', 'Daou', 'mtd01@parkuni.edu.lb', '71/598741', 'michelle333'),
(20193412, 'Patricia', 'Michel', 'Karam', 'pmk04@parkuni.edu.lb', '70/457410', 'patricia333'),
(20193413, 'Lodi', 'Faisal', 'Hussein', 'lfh01@parkuni.edu.lb', '71/625247', 'lodi333'),
(20193414, 'Hani', 'Moueen', 'Saab', 'hms01@parkuni.edu.lb', '70/006511', 'hani333');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middleName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobileNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `firstName`, `middleName`, `lastName`, `email`, `mobileNumber`, `password`) VALUES
(80, 'John', 'George', 'Brown', 'johnbrown01@parkuni.edu.lb', '76/506480', 'john333'),
(81, 'Kamel', 'Salman', 'Massoud', 'davidmassoud01@parkuni.edu.lb', '03/376844', 'david333'),
(82, 'Jessica', 'Halim', 'Saad', 'jessicasaad01@parkuni.edu.lb', '70/899700', 'jessica333'),
(83, 'Karen', 'Bassel', 'Fawaz', 'karenfawaz01@parkuni.edu.lb', '71/590014', 'karen333');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
