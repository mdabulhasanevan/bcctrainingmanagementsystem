-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2018 at 10:31 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitc`
--
CREATE DATABASE IF NOT EXISTS `bitc` DEFAULT CHARACTER SET utf16 COLLATE utf16_general_ci;
USE `bitc`;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `BId` int(11) NOT NULL,
  `BatchName` varchar(20) NOT NULL,
  `CreatedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`BId`, `BatchName`, `CreatedBy`) VALUES
(1, '1st', 1),
(2, '2nd', 1),
(3, '3rd', 1),
(4, '4th', 1),
(5, '5th', 1),
(6, '6th', 1);

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `ID` int(11) NOT NULL,
  `BoardName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`ID`, `BoardName`) VALUES
(1, 'Barisal'),
(2, 'Dhaka'),
(3, 'Kummila'),
(4, 'Chitagong'),
(5, 'Khulna'),
(6, 'Rajshahi'),
(7, 'Jessor'),
(8, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `BranchId` int(11) NOT NULL,
  `Branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BranchId`, `Branch`) VALUES
(1, 'Main');

-- --------------------------------------------------------

--
-- Table structure for table `breakingnews`
--

CREATE TABLE `breakingnews` (
  `BrId` int(11) NOT NULL,
  `Headline` varchar(200) CHARACTER SET utf16le NOT NULL,
  `Detail` varchar(500) CHARACTER SET utf16 NOT NULL,
  `Date` date NOT NULL,
  `Other` varchar(200) NOT NULL,
  `NewsType` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `breakingnews`
--

INSERT INTO `breakingnews` (`BrId`, `Headline`, `Detail`, `Date`, `Other`, `NewsType`) VALUES
(39, 'পবিত্র ঈদ-উল-আযহা উপলক্ষ্যে ছুটি সংক্রান্ত নোটিশ', ' †††††††††㼿㼿㼿‿㼭㼿ⴿ㼿㼠㼿㼿㼿㼿㼠㼿㼿‿㼿㼿㼿㼿‿㼿㼿', '2018-09-19', '', 'General'),
(40, 'Admission Going on BITC Barisal', 'C卅⁂䉁⁡摭楳獩潮⁧潩湧⁯渠㈰ㄸ⼲〱㤮⁎慴楯渠畮楶敲獩瑹⁡晦楬楡瑥搮††††††††', '2018-09-19', 'circular3.pdf', 'Breaking');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ClassId` int(11) NOT NULL,
  `Class` varchar(50) NOT NULL,
  `isGroup` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassId`, `Class`, `isGroup`) VALUES
(1, 'One', 0),
(2, 'Two', 0),
(3, 'Three', 0),
(4, 'Four', 0),
(5, 'Five', 0),
(6, 'Six', 0),
(7, 'Seven', 0),
(8, 'Eight', 0),
(9, 'Nine', 1),
(10, 'Ten', 1),
(11, 'Eleven', 1),
(12, 'Twelve', 1);

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `visitor` int(11) NOT NULL,
  `other` int(11) DEFAULT NULL,
  `IP` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `visitor`, `other`, `IP`) VALUES
(1, 100439, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `DistrictId` int(11) NOT NULL,
  `DistrictName` varchar(100) NOT NULL,
  `Other` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`DistrictId`, `DistrictName`, `Other`) VALUES
(1, 'Barisal', 0),
(2, 'Jhalokatrhi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `FId` int(11) NOT NULL,
  `FullMeaning` varchar(100) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `CreatedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FId`, `FullMeaning`, `Name`, `CreatedBy`) VALUES
(1, 'Computer Science and Engineering', 'CSE', 1),
(2, 'Bachelor of Business Administration ', 'BBA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `GroupId` int(11) NOT NULL,
  `Group` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`GroupId`, `Group`) VALUES
(1, 'Science'),
(2, 'Commerce'),
(3, 'Arts'),
(4, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`Id`, `Name`, `Type`) VALUES
(1, 'Male', 'Gender'),
(2, 'Female', 'Gender'),
(3, 'A+', 'BloodGroup'),
(4, 'A-', 'BloodGroup'),
(5, 'B+', 'BloodGroup'),
(6, 'B-', 'BloodGroup'),
(7, 'AB+', 'BloodGroup'),
(8, 'AB-', 'BloodGroup'),
(9, 'O+', 'BloodGroup'),
(10, 'O-', 'BloodGroup'),
(11, 'Yes', 'Physical'),
(12, 'No', 'Physical'),
(13, 'Islam', 'Religion'),
(14, 'Hindu', 'Religion'),
(15, 'Buddhism', 'Religion'),
(16, 'Hinduism', 'Religion'),
(17, 'Christianity', 'Religion'),
(18, 'Others', 'Religion');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `PId` int(11) NOT NULL,
  `PostName` varchar(50) NOT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `Other` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`PId`, `PostName`, `CreatedBy`, `Other`) VALUES
(1, 'Principal', NULL, NULL),
(2, 'Ast.Principal', NULL, NULL),
(3, 'Professor', NULL, NULL),
(4, 'Associated professor', NULL, NULL),
(5, 'Lecturer', NULL, NULL),
(6, 'Teacher', NULL, NULL),
(7, 'Staff', NULL, NULL),
(8, 'Others', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `DOB` date NOT NULL,
  `Role` int(11) NOT NULL,
  `CreateDate` date NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Post` int(3) NOT NULL,
  `AcademicQualification` varchar(200) NOT NULL,
  `Photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Id`, `Name`, `Gender`, `Email`, `Mobile`, `Address`, `DOB`, `Role`, `CreateDate`, `Password`, `Post`, `AcademicQualification`, `Photo`) VALUES
(8, 'Evan Hasan', 'Male', 'abulhasanevan@gmail.com', '01737013139', 'Bangladesh Dhaka', '1991-11-30', 1, '2018-09-04', 'e10adc3949ba59abbe56e057f20f883e', 1, '', ''),
(13, 'Tanjila Salwa', 'Female', 'Sal@gmail.com', '01742507887', '            asfasfasfas   ', '2018-09-13', 1, '2018-09-10', 'e10adc3949ba59abbe56e057f20f883e', 1, '         adsfafsa           \r\n                   ', 'evan_photo.jpg'),
(14, 'Emran', 'Male', 'biplob@gmail.com', '01712700267', '            asfasfasfas   ', '2018-09-13', 1, '2018-09-10', 'e10adc3949ba59abbe56e057f20f883e', 3, '         adsfafsa           \r\n                   ', 'evan_photo1.jpg'),
(15, 'Marjia', 'Female', 'biplob@gmail.com', '01756388389', '            asfasfasfas   ', '2018-09-13', 1, '2018-09-10', 'e10adc3949ba59abbe56e057f20f883e', 3, '         adsfafsa           \r\n                   ', 'evan_photo2.jpg'),
(16, 'Jak', 'Male', 'biplob@gmail.com', '01742404929', '            asfasfasfas   ', '2018-09-13', 1, '2018-09-10', 'e10adc3949ba59abbe56e057f20f883e', 3, '         adsfafsa           \r\n                   ', 'evan_photo3.jpg'),
(17, 'BD Food', 'Female', 'salwa@gmail.com', '01719935716', ' effwefwefw', '2018-09-29', 4, '2018-09-10', 'e10adc3949ba59abbe56e057f20f883e', 1, 'wefwfwefw', '2044.jpg'),
(18, 'BIplob Hossain', 'Male', 'evan@gmail.com', '01719935716', 'rgergreerye', '2018-09-11', 4, '2018-09-14', 'e10adc3949ba59abbe56e057f20f883e', 1, ' efswesdg', 'Primo GM2 Plus_20180603_110147.jpeg'),
(19, 'Pangkaz', 'Male', 'tanim@gmail.com', '01724543072', '               cxvxsgsdg', '2018-09-05', 1, '2018-09-14', 'e10adc3949ba59abbe56e057f20f883e', 1, '              xzxvzx      \r\n                   ', 'tanim_ps_300.jpg'),
(20, 'Anisur Rahman Chanchol ', 'Male', 'chanchol@gmail.com', '01711175266', 'BITC Barisal               ', '1978-11-11', 1, '2018-09-19', 'e10adc3949ba59abbe56e057f20f883e', 1, 'MBA', 'chancholsir.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `researchproject`
--

CREATE TABLE `researchproject` (
  `RId` int(11) NOT NULL,
  `Headline` varchar(200) NOT NULL,
  `Detail` varchar(500) NOT NULL,
  `Link` varchar(300) DEFAULT NULL,
  `Name` varchar(100) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `researchproject`
--

INSERT INTO `researchproject` (`RId`, `Headline`, `Detail`, `Link`, `Name`, `StudentId`, `Type`) VALUES
(1, 'Admission System', 'This is a Admission system for bitc. ', 'https://www.facebook.com', 'Evan Hasan', 12345, 'Research'),
(3, 'Attendance System', 'Attendance SystemAttendance SystemAttendance SystemAttendance System', 'http://localhost/bitc.com/user_guide/database/query_builder.html?highlight=insert#inserting-data', 'BIplob Hossain', 1234567, ''),
(4, 'Network System', 'Network SystemNetwork SystemNetwork SystemNetwork System', 'http://localhost/bitc.com/user_guide/database/query_builder.html?highlight=insert#inserting-data', 'Home', 1234567, 'Project');

-- --------------------------------------------------------

--
-- Table structure for table `role_tbl`
--

CREATE TABLE `role_tbl` (
  `Id` int(11) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `CreatedBy` varchar(20) DEFAULT NULL,
  `Other` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `role_tbl`
--

INSERT INTO `role_tbl` (`Id`, `Role`, `CreatedBy`, `Other`) VALUES
(1, 'Admin', 'Evan', NULL),
(2, 'Co_Admin', 'Evan', NULL),
(3, 'Moderator', 'Evan', NULL),
(4, 'User', 'Evan', NULL),
(5, 'Other', 'Evan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `SectionId` int(11) NOT NULL,
  `Section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`SectionId`, `Section`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `sendsms`
--

CREATE TABLE `sendsms` (
  `SId` int(11) NOT NULL,
  `Numbers` varchar(500) NOT NULL,
  `Status` varchar(500) NOT NULL,
  `SMS` varchar(500) CHARACTER SET utf16 NOT NULL,
  `Date` datetime DEFAULT NULL,
  `SendBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `sendsms`
--

INSERT INTO `sendsms` (`SId`, `Numbers`, `Status`, `SMS`, `Date`, `SendBy`) VALUES
(1, '01737013139', '1900||01737013139||97395627/', '䡩⁦物敮摳⸠䤧洠扵楬摩湧⁡渠慰灬楣慴楯渠睩瑨⁓兌⁦牯湴敮搬⁒敡捴⁢慣步湤Ⱐ慮搠瑲祩湧⁴漠畳攠乯摥⁦潲⁴桥⁤慴慢慳攮⁐汥慳攠慤癩獥⸠周砮', '2018-09-15 19:47:50', NULL),
(2, '01737013139', '1903|| - ||Not enough balance.', 'অনেক খুঁজে একটাই তথ্য পাওয়া গেলো। তাও আত্মীয় সূত্রে। কাল রাত অবধি সেই তথ্যনুযায়ী, মুশফিক খেলছেন না। সুযোগ নেই।\nদুবাইয়ে হোয়াটস অ্যাপ, ম্যাসেঞ্জার, ভাইবার কোন কিছুই কাজ করে না।', '2018-09-15 19:55:04', NULL),
(3, '01737013139', '1900||01737013139||97395722/', 'অনেক খুঁজে একটাই তথ্য পাওয়া গেলো। তাও আত্মীয় সূত্রে। কাল রাত অবধি সেই তথ্যনুযায়ী, মুশফিক খেলছেন না। সুযোগ নেই।\nদুবাইয়ে হোয়াটস অ্যাপ, ম্যাসেঞ্জার, ভাইবার কোন কিছুই কাজ করে না।', '2018-09-15 19:59:04', NULL),
(4, '01737013139', '1900||01737013139||97395747/', '\"বাংলা কবিতায় আধুনিকতা\" শীর্ষক সাহিত্য আড্ডার খণ্ডচিত্র।\n\nবিশেষ কৃতজ্ঞতা জানাচ্ছি ঢাকা ইউনিভারসিটি আইটি সোসাইটি এবং Abdullah Al Imran ভাইয়ের প্রতি।', '2018-09-15 20:01:37', NULL),
(5, '01724543072', '1900||01724543072||97500882/', 'Pangkaz how are you, I love you so much. please come to me.', '2018-09-16 19:36:21', NULL),
(6, '01712700267', '1900||01712700267||97500896/', 'Emran how are you, I love you so much. please come to me.', '2018-09-16 19:37:49', NULL),
(7, '01742404929', '1900||01742404929||97753231/', 'Hi Jakaria how are you?? I love you.. call me plz 01712700267', '2018-09-18 17:38:19', NULL),
(8, '01724543072', '1900||01724543072||97878384/', 'Hi Pangkaz How are you', '2018-09-19 15:57:45', NULL),
(9, '01711175266', '1900||01711175266||97885096/', 'Sir', '2018-09-19 17:01:50', NULL),
(10, '01742507887', '1900||01742507887||97952643/', 'Hi Tanjila how are you?', '2018-09-20 10:17:23', NULL),
(11, '01742507887', '1900||01742507887||97964231/', 'Tanjila I know you want to know me.', '2018-09-20 11:39:09', NULL),
(12, '01742507887', '1900||01742507887||98160154/', 'Hi Tanjila How is going your day?', '2018-09-21 21:36:59', NULL),
(13, '01742507887', '1900||01742507887||98963039/', 'Tanjila How are you?? How is going your life.', '2018-09-29 07:49:25', 8);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `SessionId` int(11) NOT NULL,
  `Session` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`SessionId`, `Session`) VALUES
(1, '2018'),
(2, '2019'),
(3, '2020'),
(4, '2021');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `ShiftId` int(11) NOT NULL,
  `Shift` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`ShiftId`, `Shift`) VALUES
(1, 'Morning'),
(2, 'Day');

-- --------------------------------------------------------

--
-- Table structure for table `studentofthesemester`
--

CREATE TABLE `studentofthesemester` (
  `Id` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `Attendance` varchar(100) DEFAULT NULL,
  `Exam` varchar(100) DEFAULT NULL,
  `Behave` varchar(100) DEFAULT NULL,
  `Extra` varchar(100) DEFAULT NULL,
  `isShow` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `studentofthesemester`
--

INSERT INTO `studentofthesemester` (`Id`, `StudentID`, `Attendance`, `Exam`, `Behave`, `Extra`, `isShow`) VALUES
(2, 11123456, '95%', '75%', 'very Good', 'Good', 1),
(3, 12123, '92', '80', 'Very Good', NULL, 1),
(4, 22111, '92', '55', 'Good', NULL, 1),
(6, 2112345, '92', '80', 'Very Good', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `StudentID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `NameBangla` varchar(100) CHARACTER SET utf16 NOT NULL,
  `FatherName` varchar(100) NOT NULL,
  `MotherName` varchar(100) NOT NULL,
  `SMSNotificationNo` varchar(100) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` text NOT NULL,
  `Nationality` text NOT NULL,
  `Religion` int(11) NOT NULL,
  `BloodGroup` int(11) NOT NULL,
  `Height` int(11) NOT NULL,
  `Weight` int(11) NOT NULL,
  `VersionID` int(11) NOT NULL,
  `SessionId` int(11) NOT NULL,
  `BranchID` int(11) NOT NULL,
  `SectionId` int(11) NOT NULL,
  `RollNo` int(11) NOT NULL,
  `RegNo` int(11) NOT NULL,
  `PreAddress` varchar(200) NOT NULL,
  `PreThana` int(11) NOT NULL,
  `PreZila` int(11) NOT NULL,
  `PreDivision` int(11) NOT NULL,
  `PrePostOffice` varchar(50) NOT NULL,
  `PrePostCode` int(11) NOT NULL,
  `ParAddress` varchar(200) NOT NULL,
  `ParThana` int(11) NOT NULL,
  `ParZila` int(11) NOT NULL,
  `ParDivision` int(11) NOT NULL,
  `ParPostCode` int(11) NOT NULL,
  `ParPostOffice` varchar(50) NOT NULL,
  `FatherMobile` varchar(20) NOT NULL,
  `MotherMobile` varchar(20) NOT NULL,
  `CollegeRoll` int(11) NOT NULL,
  `Faculty` int(11) NOT NULL,
  `Batch` int(11) NOT NULL,
  `Photo` varchar(500) DEFAULT NULL,
  `ssc_year` int(11) DEFAULT NULL,
  `ssc_board` int(11) DEFAULT NULL,
  `ssc_roll` int(11) DEFAULT NULL,
  `ssc_gpa` float DEFAULT NULL,
  `ssc_school` varchar(200) DEFAULT NULL,
  `hsc_year` int(11) DEFAULT NULL,
  `hsc_board` int(11) DEFAULT NULL,
  `hsc_roll` int(11) DEFAULT NULL,
  `hsc_gpa` float DEFAULT NULL,
  `hsc_college` varchar(200) DEFAULT NULL,
  `StudentInsID` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`StudentID`, `FullName`, `NameBangla`, `FatherName`, `MotherName`, `SMSNotificationNo`, `DateOfBirth`, `Age`, `Gender`, `Nationality`, `Religion`, `BloodGroup`, `Height`, `Weight`, `VersionID`, `SessionId`, `BranchID`, `SectionId`, `RollNo`, `RegNo`, `PreAddress`, `PreThana`, `PreZila`, `PreDivision`, `PrePostOffice`, `PrePostCode`, `ParAddress`, `ParThana`, `ParZila`, `ParDivision`, `ParPostCode`, `ParPostOffice`, `FatherMobile`, `MotherMobile`, `CollegeRoll`, `Faculty`, `Batch`, `Photo`, `ssc_year`, `ssc_board`, `ssc_roll`, `ssc_gpa`, `ssc_school`, `hsc_year`, `hsc_board`, `hsc_roll`, `hsc_gpa`, `hsc_college`, `StudentInsID`) VALUES
(28, 'Biplob Hossain Khan', '', 'Md Rohoman', 'Majeda', '017636978242', '0000-00-00', 20, '1', 'Bangladeshi', 13, 3, 0, 0, 0, 1, 1, 1, 12345, 2121, '119 ward 25 sagordi bazaar', 3, 1, 0, 'Dhaka', 8200, '119 ward 25 sagordi bazaar', 4, 1, 0, 8200, 'Dhaka', '1719935716', '1719935716', 111, 2, 1, '1.jpg', 2007, 1, 12, 4, NULL, 2009, 1, 12, 4, NULL, '2112345'),
(29, 'Evan Hasan', '', 'Mossaraf Hoiiain', 'Selina Yasmin', '01737013139', '0000-00-00', NULL, '1', 'bd', 13, 3, 0, 0, 0, 1, 1, 1, 123456, 12345, '119 ward 25 sagordi bazaar\n119 ward 25 sagordi bazaar', 2, 1, 0, 'Barisal', 8200, '119 ward 25 sagordi bazaar\n119 ward 25 sagordi bazaar', 2, 1, 0, 8200, 'Barisal', '01816907560', '01719935716', 54321, 1, 1, '29.jpg', 2010, 1, 1234, 4, NULL, 2012, 2, 2345, 4, NULL, '11123456'),
(30, 'Tanjila Salwa', '', 'Mohammad Saha Alam', 'Sathi Begum', '01636978242', '0000-00-00', NULL, '2', 'Bangladeshi', 13, 9, 0, 0, 0, 2, 1, 1, 123, 12344, '120 ward 25 Potuakhali bazaar', 1, 1, 0, 'Barisal', 8200, '120 ward 25 Potuakhali bazaar', 12, 2, 0, 8420, 'Barisal', '19888888', '1788976776', 1234, 1, 2, '30', 2010, 1, 12334, 5, NULL, 2012, 1, 2222, 5, NULL, '12123'),
(31, 'Marjia Surovi', '', 'Mossaraf Hossain', 'Selina Yasmin', '01636978242', '0000-00-00', NULL, '2', 'Bangladeshi', 13, 7, 0, 0, 0, 2, 1, 1, 111, 222, '119 ward 25 sagordi bazaar', 8, 1, 0, 'Barisal', 8200, '119 ward 25 sagordi bazaar', 5, 1, 0, 8200, 'Barisal', '01816907560', '01737013139', 333, 2, 2, '4.jpg', 2010, 2, 1223, 4038, NULL, 2012, 2, 6676, 4.5, NULL, '22111'),
(102, '', '', '', '', '', '0000-00-00', NULL, '', '', 0, 0, 0, 0, 0, 1, 1, 1, 2147483647, 12344, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, '', '', '', 343, 1, 1, '102.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1132345435645'),
(103, '', '', '', '', '', '0000-00-00', NULL, '', '', 0, 0, 0, 0, 0, 1, 1, 1, 56464, 12344, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, '', '', '', 343, 1, 2, '103.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1156464'),
(104, '', '', '', '', '', '0000-00-00', NULL, '', '', 0, 0, 0, 0, 0, 1, 1, 1, 323445345, 12344, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, '', '', '', 343, 1, 2, '104.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11323445345');

-- --------------------------------------------------------

--
-- Table structure for table `thana`
--

CREATE TABLE `thana` (
  `PsId` int(11) NOT NULL,
  `PsName` varchar(110) NOT NULL,
  `DistrictId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `thana`
--

INSERT INTO `thana` (`PsId`, `PsName`, `DistrictId`) VALUES
(1, 'Barisal Sador', 1),
(2, 'Bakergong', 1),
(3, 'Mehendigong', 1),
(4, 'Babugong', 1),
(5, 'Hijla', 1),
(6, 'Muladi', 1),
(7, 'Aghoiljhara', 1),
(8, 'Ujirpur', 1),
(9, 'Gouronodi', 1),
(10, 'Banaripara', 1),
(11, 'Jhalakathi Sador', 2),
(12, 'Nalcity', 2),
(13, 'Rajapur', 2),
(14, 'Kathalia', 2);

-- --------------------------------------------------------

--
-- Table structure for table `version`
--

CREATE TABLE `version` (
  `VersionId` int(3) NOT NULL,
  `Version` varchar(50) NOT NULL,
  `Createdby` varchar(100) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `version`
--

INSERT INTO `version` (`VersionId`, `Version`, `Createdby`, `Date`) VALUES
(1, 'Bangla', '', '0000-00-00'),
(2, 'English', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`BId`);

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`BranchId`);

--
-- Indexes for table `breakingnews`
--
ALTER TABLE `breakingnews`
  ADD PRIMARY KEY (`BrId`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassId`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`DistrictId`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`FId`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`GroupId`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PId`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `researchproject`
--
ALTER TABLE `researchproject`
  ADD PRIMARY KEY (`RId`);

--
-- Indexes for table `role_tbl`
--
ALTER TABLE `role_tbl`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`SectionId`);

--
-- Indexes for table `sendsms`
--
ALTER TABLE `sendsms`
  ADD PRIMARY KEY (`SId`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`SessionId`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`ShiftId`);

--
-- Indexes for table `studentofthesemester`
--
ALTER TABLE `studentofthesemester`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `thana`
--
ALTER TABLE `thana`
  ADD PRIMARY KEY (`PsId`);

--
-- Indexes for table `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`VersionId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `BId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `BranchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `breakingnews`
--
ALTER TABLE `breakingnews`
  MODIFY `BrId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ClassId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `DistrictId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `FId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `GroupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `other`
--
ALTER TABLE `other`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `PId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `researchproject`
--
ALTER TABLE `researchproject`
  MODIFY `RId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_tbl`
--
ALTER TABLE `role_tbl`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `SectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sendsms`
--
ALTER TABLE `sendsms`
  MODIFY `SId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `SessionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `ShiftId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studentofthesemester`
--
ALTER TABLE `studentofthesemester`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `thana`
--
ALTER TABLE `thana`
  MODIFY `PsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `version`
--
ALTER TABLE `version`
  MODIFY `VersionId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `classicmodels`
--
CREATE DATABASE IF NOT EXISTS `classicmodels` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `classicmodels`;
--
-- Database: `employee`
--
CREATE DATABASE IF NOT EXISTS `employee` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `employee`;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmpId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Post` varchar(50) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmpId`, `Name`, `Post`, `UserName`, `Password`) VALUES
(1, 'Evan Hasan', 'DC', 'evanbsl', '1234'),
(2, 'Sanjana Islam ', 'Senior Officer', 'Sanjana', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `salaryhistoty`
--

CREATE TABLE `salaryhistoty` (
  `Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Month` varchar(50) DEFAULT NULL,
  `Salary` int(10) DEFAULT NULL,
  `Withdraw` int(10) DEFAULT NULL,
  `EmpId` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salaryhistoty`
--

INSERT INTO `salaryhistoty` (`Id`, `Date`, `Month`, `Salary`, `Withdraw`, `EmpId`) VALUES
(23, '2018-09-01', NULL, 1000, 800, 2),
(24, '2018-09-02', NULL, 500, 300, 2),
(25, '2018-09-12', NULL, 33, 33, 2),
(26, '2018-09-12', NULL, 3300, 3000, 2),
(27, '2018-09-19', NULL, 500, 600, 2),
(28, '2018-09-26', NULL, 200, 200, 2),
(32, '2018-09-06', NULL, 12222, 122, 1),
(33, '2018-09-13', NULL, 12222, 122, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmpId`);

--
-- Indexes for table `salaryhistoty`
--
ALTER TABLE `salaryhistoty`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmpId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salaryhistoty`
--
ALTER TABLE `salaryhistoty`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Database: `employee2`
--
CREATE DATABASE IF NOT EXISTS `employee2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `employee2`;

-- --------------------------------------------------------

--
-- Table structure for table `employeeinfo`
--

CREATE TABLE `employeeinfo` (
  `EmpId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Post` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Salary` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeinfo`
--

INSERT INTO `employeeinfo` (`EmpId`, `Name`, `Post`, `Address`, `Salary`) VALUES
(1, 'Evan Hasan', 'Assistant Programmer', ' Dhaka1', 50000),
(2, 'BIplob Hossain', 'IT Officer', 'Barisal', 34000),
(3, 'BD Food', 'Assistant Programmer', ' Dhaka1', 12222);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  ADD PRIMARY KEY (`EmpId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  MODIFY `EmpId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `personalassits`
--
CREATE DATABASE IF NOT EXISTS `personalassits` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `personalassits`;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `TaskID` int(11) NOT NULL,
  `TaskName` varchar(200) NOT NULL,
  `TaskDetail` varchar(500) DEFAULT NULL,
  `TaskDate` varchar(100) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`TaskID`, `TaskName`, `TaskDetail`, `TaskDate`, `UserId`) VALUES
(3, 'Job Viva', 'ICT Min', '2018-07-17', 1),
(4, 'Job Viva 2', 'ICT Min', '2018-07-25', 1),
(5, 'Dating', 'Sunday will Have to go', '2018-07-06', 1),
(6, 'Drawing', 'This class', '2018-07-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`ID`, `Name`, `UserName`, `Password`) VALUES
(1, 'Evan', 'evanbsl', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`TaskID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `TaskID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

--
-- Dumping data for table `pma__bookmark`
--

INSERT INTO `pma__bookmark` (`id`, `dbase`, `user`, `label`, `query`) VALUES
(1, 'bitc', 'root', 'Get Student', 'SELECT *,\r\n    f.Name AS FacultyName,\r\n    b.BatchName AS BatchName,\r\n    ss.Session AS SessionName,\r\n    br.Branch AS BranchName,\r\n    sc.Section AS SectionName,\r\n    ot.Name AS GenderName,\r\n    ot2.Name AS BloodGroupName,\r\n    ot3.Name AS ReligionName,\r\n    boards.BoardName AS SSCBoardName,\r\n    boardh.BoardName AS HSCBoardName,\r\n    ds1.DistrictName as PreZilaName,\r\n    ds2.DistrictName as parZilaName,\r\n    tn1.PsName as PreThana,\r\n    tn2.PsName as ParThana\r\nFROM\r\n    student_tbl st\r\nLEFT JOIN faculty f ON\r\n    f.FId = st.Faculty\r\nLEFT JOIN batch b ON\r\n    b.BId = st.Batch\r\nLEFT JOIN SESSION ss ON\r\n    ss.SessionId = st.SessionId\r\nLEFT JOIN section sc ON\r\n    sc.SectionId = st.SectionId\r\nLEFT JOIN branch br ON\r\n    br.BranchId = st.BranchID\r\nLEFT JOIN other ot ON\r\n    ot.Id = st.Gender\r\nLEFT JOIN other ot2 ON\r\n    ot2.Id = st.BloodGroup\r\nLEFT JOIN other ot3 ON\r\n    ot3.Id = st.Religion\r\nLEFT JOIN board boards ON\r\n    boards.ID = st.ssc_board\r\nLEFT JOIN board boardh ON\r\n    boardh.ID = st.hsc_board\r\nLEFT JOIN district ds1 on ds1.DistrictId=st.PreZila\r\nLEFT JOIN district ds2 on ds2.DistrictId=st.ParZila\r\nLEFT JOIN thana tn1 on tn1.PsId=st.PreThana\r\nLEFT JOIN thana tn2 on tn2.PsId=st.ParThana');

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"angular_direct\":\"direct\",\"relation_lines\":\"true\",\"snap_to_grid\":\"off\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'database', 'xx', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":[\"branch\",\"breakingnews\",\"class\",\"group\",\"post\",\"registration\",\"role_tbl\",\"section\",\"session\",\"shift\",\"student_tbl\",\"vesrion\"],\"table_structure[]\":[\"branch\",\"breakingnews\",\"class\",\"group\",\"post\",\"registration\",\"role_tbl\",\"section\",\"session\",\"shift\",\"student_tbl\",\"vesrion\"],\"table_data[]\":[\"branch\",\"breakingnews\",\"class\",\"group\",\"post\",\"registration\",\"role_tbl\",\"section\",\"session\",\"shift\",\"student_tbl\",\"vesrion\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"json_structure_or_data\":\"data\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"htmlword_columns\":null,\"json_pretty_print\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"bitc\",\"table\":\"student_tbl\"},{\"db\":\"bitc\",\"table\":\"studentofthesemester\"},{\"db\":\"employee\",\"table\":\"incomehistoty\"},{\"db\":\"employee\",\"table\":\"salaryhistoty\"},{\"db\":\"employee\",\"table\":\"employee\"},{\"db\":\"test\",\"table\":\"users\"},{\"db\":\"bitc\",\"table\":\"thana\"},{\"db\":\"bitc\",\"table\":\"session\"},{\"db\":\"bitc\",\"table\":\"StudentofTheSemester\"},{\"db\":\"bitc\",\"table\":\"district\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'bitc', 'student_tbl', '{\"sorted_col\":\"`SMSNotificationNo`  DESC\"}', '2018-10-02 21:07:10'),
('root', 'bitc', 'thana', '{\"sorted_col\":\"`thana`.`DistrictId` ASC\"}', '2018-09-29 17:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2018-10-03 08:30:39', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `schooldb`
--
CREATE DATABASE IF NOT EXISTS `schooldb` DEFAULT CHARACTER SET utf16 COLLATE utf16_general_ci;
USE `schooldb`;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `BranchId` int(11) NOT NULL,
  `Branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BranchId`, `Branch`) VALUES
(1, 'Main');

-- --------------------------------------------------------

--
-- Table structure for table `breakingnews`
--

CREATE TABLE `breakingnews` (
  `BrId` int(11) NOT NULL,
  `Headline` varchar(200) CHARACTER SET utf16le NOT NULL,
  `Detail` varchar(500) CHARACTER SET utf16 NOT NULL,
  `Date` date NOT NULL,
  `Other` varchar(200) NOT NULL,
  `NewsType` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `breakingnews`
--

INSERT INTO `breakingnews` (`BrId`, `Headline`, `Detail`, `Date`, `Other`, `NewsType`) VALUES
(39, 'পবিত্র ঈদ-উল-আযহা উপলক্ষ্যে ছুটি সংক্রান্ত নোটিশ', ' †††††††††㼿㼿㼿‿㼭㼿ⴿ㼿㼠㼿㼿㼿㼿㼠㼿㼿‿㼿㼿㼿㼿‿㼿㼿', '2018-09-19', '', 'General'),
(40, 'Admission Going on BITC Barisal', 'C卅⁂䉁⁡摭楳獩潮⁧潩湧⁯渠㈰ㄸ⼲〱㤮⁎慴楯渠畮楶敲獩瑹⁡晦楬楡瑥搮††††††††', '2018-09-19', 'circular3.pdf', 'Breaking');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ClassId` int(11) NOT NULL,
  `Class` varchar(50) NOT NULL,
  `isGroup` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassId`, `Class`, `isGroup`) VALUES
(13, 'First', 0),
(14, 'Second', 0),
(15, 'First', 0),
(16, 'Second', 0),
(17, 'Third', 0),
(18, 'Fourth', 0),
(19, 'Fifth', 0),
(20, 'Sisth', 0),
(21, 'Seventh', 0),
(22, 'Eight', 0);

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `visitor` int(11) NOT NULL,
  `other` int(11) DEFAULT NULL,
  `IP` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `visitor`, `other`, `IP`) VALUES
(1, 100052, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `GroupId` int(11) NOT NULL,
  `Group` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`GroupId`, `Group`) VALUES
(1, 'Science'),
(2, 'Commerce'),
(3, 'Arts'),
(4, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`Id`, `Name`, `Type`) VALUES
(1, 'Male', 'Gender'),
(2, 'Female', 'Gender'),
(3, 'A+', 'BloodGroup'),
(4, 'A-', 'BloodGroup'),
(5, 'B+', 'BloodGroup'),
(6, 'B-', 'BloodGroup'),
(7, 'AB+', 'BloodGroup'),
(8, 'AB-', 'BloodGroup'),
(9, 'O+', 'BloodGroup'),
(10, 'O-', 'BloodGroup'),
(11, 'Yes', 'Physical'),
(12, 'No', 'Physical'),
(13, 'Islam', 'Religion'),
(14, 'Hindu', 'Religion'),
(15, 'Buddhism', 'Religion'),
(16, 'Hinduism', 'Religion'),
(17, 'Christianity', 'Religion'),
(18, 'Others', 'Religion');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `PId` int(11) NOT NULL,
  `PostName` varchar(50) NOT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `Other` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`PId`, `PostName`, `CreatedBy`, `Other`) VALUES
(1, 'Principal', NULL, NULL),
(2, 'Ast.Principal', NULL, NULL),
(3, 'Professor', NULL, NULL),
(4, 'Associated professor', NULL, NULL),
(5, 'Lecturer', NULL, NULL),
(6, 'Teacher', NULL, NULL),
(7, 'Staff', NULL, NULL),
(8, 'Others', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `DOB` date NOT NULL,
  `Role` int(11) NOT NULL,
  `CreateDate` date NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Post` int(3) NOT NULL,
  `AcademicQualification` varchar(200) NOT NULL,
  `Photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Id`, `Name`, `Gender`, `Email`, `Mobile`, `Address`, `DOB`, `Role`, `CreateDate`, `Password`, `Post`, `AcademicQualification`, `Photo`) VALUES
(8, 'Evan Hasan', 'Male', 'abulhasanevan@gmail.com', '01737013139', 'Bangladesh Dhaka', '1991-11-30', 1, '2018-09-04', 'e10adc3949ba59abbe56e057f20f883e', 1, '', ''),
(13, 'Tanjila Salwa', 'Female', 'Sal@gmail.com', '01742507887', '            asfasfasfas   ', '2018-09-13', 1, '2018-09-10', 'e10adc3949ba59abbe56e057f20f883e', 1, '         adsfafsa           \r\n                   ', 'evan_photo.jpg'),
(14, 'Emran', 'Male', 'biplob@gmail.com', '01712700267', '            asfasfasfas   ', '2018-09-13', 1, '2018-09-10', 'e10adc3949ba59abbe56e057f20f883e', 3, '         adsfafsa           \r\n                   ', 'evan_photo1.jpg'),
(15, 'Marjia', 'Female', 'biplob@gmail.com', '01756388389', '            asfasfasfas   ', '2018-09-13', 1, '2018-09-10', 'e10adc3949ba59abbe56e057f20f883e', 3, '         adsfafsa           \r\n                   ', 'evan_photo2.jpg'),
(16, 'Jak', 'Male', 'biplob@gmail.com', '01742404929', '            asfasfasfas   ', '2018-09-13', 1, '2018-09-10', 'e10adc3949ba59abbe56e057f20f883e', 3, '         adsfafsa           \r\n                   ', 'evan_photo3.jpg'),
(17, 'BD Food', 'Female', 'salwa@gmail.com', '01719935716', ' effwefwefw', '2018-09-29', 4, '2018-09-10', 'e10adc3949ba59abbe56e057f20f883e', 1, 'wefwfwefw', '2044.jpg'),
(18, 'BIplob Hossain', 'Male', 'evan@gmail.com', '01719935716', 'rgergreerye', '2018-09-11', 4, '2018-09-14', 'e10adc3949ba59abbe56e057f20f883e', 1, ' efswesdg', 'Primo GM2 Plus_20180603_110147.jpeg'),
(19, 'Pangkaz', 'Male', 'tanim@gmail.com', '01724543072', '               cxvxsgsdg', '2018-09-05', 1, '2018-09-14', 'e10adc3949ba59abbe56e057f20f883e', 1, '              xzxvzx      \r\n                   ', 'tanim_ps_300.jpg'),
(20, 'Anisur Rahman Chanchol ', 'Male', 'chanchol@gmail.com', '01711175266', 'BITC Barisal               ', '1978-11-11', 1, '2018-09-19', 'e10adc3949ba59abbe56e057f20f883e', 1, 'MBA', 'chancholsir.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `researchproject`
--

CREATE TABLE `researchproject` (
  `RId` int(11) NOT NULL,
  `Headline` varchar(200) NOT NULL,
  `Detail` varchar(500) NOT NULL,
  `Link` varchar(300) DEFAULT NULL,
  `Name` varchar(100) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `researchproject`
--

INSERT INTO `researchproject` (`RId`, `Headline`, `Detail`, `Link`, `Name`, `StudentId`, `Type`) VALUES
(1, 'Admission System', 'This is a Admission system for bitc. ', 'https://www.facebook.com', 'Evan Hasan', 12345, 'Research'),
(3, 'Attendance System', 'Attendance SystemAttendance SystemAttendance SystemAttendance System', 'http://localhost/bitc.com/user_guide/database/query_builder.html?highlight=insert#inserting-data', 'BIplob Hossain', 1234567, ''),
(4, 'Network System', 'Network SystemNetwork SystemNetwork SystemNetwork System', 'http://localhost/bitc.com/user_guide/database/query_builder.html?highlight=insert#inserting-data', 'Home', 1234567, 'Project'),
(5, 'xx', 'gfgfg', 'hhhh', 'hhhhh', 5454, 'Project'),
(6, 'xx', 'gfgfg', 'hhhh', 'hhhhh', 5454, 'Project'),
(7, 'xx', 'gfgfg', 'hhhh', 'hhhhh', 5454, 'Project'),
(8, 'xx', 'gfgfg', 'hhhh', 'hhhhh', 5454, 'Project'),
(9, 'xx', 'gfgfg', 'hhhh', 'hhhhh', 5454, 'Project'),
(10, 'xx', 'gfgfg', 'hhhh', 'hhhhh', 5454, 'Project'),
(11, 'xx', 'gfgfg', 'hhhh', 'hhhhh', 5454, 'Project'),
(12, 'xx', 'gfgfg', 'hhhh', 'hhhhh', 5454, 'Project'),
(13, 'xx', 'gfgfg', 'hhhh', 'hhhhh', 5454, 'Project'),
(16, 'Bangladesh QUOTA Reform', 'fdsgdsgdf', 'gdfgdfgdf', 'BD Food', 1234567, 'Project');

-- --------------------------------------------------------

--
-- Table structure for table `role_tbl`
--

CREATE TABLE `role_tbl` (
  `Id` int(11) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `CreatedBy` varchar(20) DEFAULT NULL,
  `Other` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `role_tbl`
--

INSERT INTO `role_tbl` (`Id`, `Role`, `CreatedBy`, `Other`) VALUES
(1, 'Admin', 'Evan', NULL),
(2, 'Co_Admin', 'Evan', NULL),
(3, 'Moderator', 'Evan', NULL),
(4, 'User', 'Evan', NULL),
(5, 'Other', 'Evan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `SectionId` int(11) NOT NULL,
  `Section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`SectionId`, `Section`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `sendsms`
--

CREATE TABLE `sendsms` (
  `SId` int(11) NOT NULL,
  `Numbers` varchar(500) NOT NULL,
  `Status` varchar(500) NOT NULL,
  `SMS` varchar(500) CHARACTER SET utf16 NOT NULL,
  `Date` datetime DEFAULT NULL,
  `SendBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `sendsms`
--

INSERT INTO `sendsms` (`SId`, `Numbers`, `Status`, `SMS`, `Date`, `SendBy`) VALUES
(1, '01737013139', '1900||01737013139||97395627/', '䡩⁦物敮摳⸠䤧洠扵楬摩湧⁡渠慰灬楣慴楯渠睩瑨⁓兌⁦牯湴敮搬⁒敡捴⁢慣步湤Ⱐ慮搠瑲祩湧⁴漠畳攠乯摥⁦潲⁴桥⁤慴慢慳攮⁐汥慳攠慤癩獥⸠周砮', '2018-09-15 19:47:50', NULL),
(2, '01737013139', '1903|| - ||Not enough balance.', 'অনেক খুঁজে একটাই তথ্য পাওয়া গেলো। তাও আত্মীয় সূত্রে। কাল রাত অবধি সেই তথ্যনুযায়ী, মুশফিক খেলছেন না। সুযোগ নেই।\nদুবাইয়ে হোয়াটস অ্যাপ, ম্যাসেঞ্জার, ভাইবার কোন কিছুই কাজ করে না।', '2018-09-15 19:55:04', NULL),
(3, '01737013139', '1900||01737013139||97395722/', 'অনেক খুঁজে একটাই তথ্য পাওয়া গেলো। তাও আত্মীয় সূত্রে। কাল রাত অবধি সেই তথ্যনুযায়ী, মুশফিক খেলছেন না। সুযোগ নেই।\nদুবাইয়ে হোয়াটস অ্যাপ, ম্যাসেঞ্জার, ভাইবার কোন কিছুই কাজ করে না।', '2018-09-15 19:59:04', NULL),
(4, '01737013139', '1900||01737013139||97395747/', '\"বাংলা কবিতায় আধুনিকতা\" শীর্ষক সাহিত্য আড্ডার খণ্ডচিত্র।\n\nবিশেষ কৃতজ্ঞতা জানাচ্ছি ঢাকা ইউনিভারসিটি আইটি সোসাইটি এবং Abdullah Al Imran ভাইয়ের প্রতি।', '2018-09-15 20:01:37', NULL),
(5, '01724543072', '1900||01724543072||97500882/', 'Pangkaz how are you, I love you so much. please come to me.', '2018-09-16 19:36:21', NULL),
(6, '01712700267', '1900||01712700267||97500896/', 'Emran how are you, I love you so much. please come to me.', '2018-09-16 19:37:49', NULL),
(7, '01742404929', '1900||01742404929||97753231/', 'Hi Jakaria how are you?? I love you.. call me plz 01712700267', '2018-09-18 17:38:19', NULL),
(8, '01724543072', '1900||01724543072||97878384/', 'Hi Pangkaz How are you', '2018-09-19 15:57:45', NULL),
(9, '01711175266', '1900||01711175266||97885096/', 'Sir', '2018-09-19 17:01:50', NULL),
(10, '01742507887', '1900||01742507887||97952643/', 'Hi Tanjila how are you?', '2018-09-20 10:17:23', NULL),
(11, '01742507887', '1900||01742507887||97964231/', 'Tanjila I know you want to know me.', '2018-09-20 11:39:09', NULL),
(12, '01742507887', '1900||01742507887||98160154/', 'Hi Tanjila How is going your day?', '2018-09-21 21:36:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `SessionId` int(11) NOT NULL,
  `Session` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`SessionId`, `Session`) VALUES
(1, '2018'),
(2, '2019'),
(3, '2020'),
(4, '2021');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `ShiftId` int(11) NOT NULL,
  `Shift` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`ShiftId`, `Shift`) VALUES
(1, 'Morning'),
(2, 'Day');

-- --------------------------------------------------------

--
-- Table structure for table `studentofthesemester`
--

CREATE TABLE `studentofthesemester` (
  `SSId` int(11) NOT NULL,
  `Attendance` int(11) DEFAULT NULL,
  `Exam` int(11) DEFAULT NULL,
  `Details` varchar(200) DEFAULT NULL,
  `StudentID` varchar(100) NOT NULL,
  `Others` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `StudentID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `NameBangla` varchar(100) NOT NULL,
  `FatherName` varchar(100) NOT NULL,
  `MotherName` varchar(100) NOT NULL,
  `SMSNotificationNo` varchar(100) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` text NOT NULL,
  `Nationality` text NOT NULL,
  `Religion` int(11) NOT NULL,
  `BloodGroup` int(11) NOT NULL,
  `Height` int(11) NOT NULL,
  `Weight` int(11) NOT NULL,
  `VersionID` int(11) NOT NULL,
  `SessionId` int(11) NOT NULL,
  `BranchID` int(11) NOT NULL,
  `ShiftID` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `GroupId` int(11) NOT NULL,
  `SectionId` int(11) NOT NULL,
  `RollNo` int(11) NOT NULL,
  `RegiNo` int(11) NOT NULL,
  `PreAddress` varchar(200) NOT NULL,
  `Pre_Thana` int(11) NOT NULL,
  `Pre_Zila` int(11) NOT NULL,
  `Pre_Division` int(11) NOT NULL,
  `ParAddress` varchar(200) NOT NULL,
  `ParThana` int(11) NOT NULL,
  `ParZila` int(11) NOT NULL,
  `ParDivision` int(11) NOT NULL,
  `FatherMobile` int(11) NOT NULL,
  `MotherMobile` int(11) NOT NULL,
  `Photo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`StudentID`, `FullName`, `NameBangla`, `FatherName`, `MotherName`, `SMSNotificationNo`, `DateOfBirth`, `Age`, `Gender`, `Nationality`, `Religion`, `BloodGroup`, `Height`, `Weight`, `VersionID`, `SessionId`, `BranchID`, `ShiftID`, `ClassId`, `GroupId`, `SectionId`, `RollNo`, `RegiNo`, `PreAddress`, `Pre_Thana`, `Pre_Zila`, `Pre_Division`, `ParAddress`, `ParThana`, `ParZila`, `ParDivision`, `FatherMobile`, `MotherMobile`, `Photo`) VALUES
(2, 'Evan Hasan', 'Evan Hasan', 'Mossaraf Hossain', 'Mst Selina Yasmin', '01737013139', '1991-11-30', 23, 'Male', 'Bangladeshi', 1, 1, 68, 74, 1, 1, 1, 1, 1, 1, 1, 10, 123456, 'Barisal Sagordi', 1, 1, 1, 'Barisal Sagordi', 1, 1, 1, 1816907560, 1719935716, 'evanjpg'),
(3, 'Emran Hossain', 'Emran Hossain', 'Amir Hossain', 'Razia', '01737013139', '1991-11-30', 23, 'Male', 'Bangladeshi', 1, 1, 68, 74, 1, 1, 1, 1, 1, 1, 1, 10, 125656, 'Barisal Sagordi', 1, 1, 1, 'Barisal Sagordi', 1, 1, 1, 1816907560, 1719935716, 'emran.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `version`
--

CREATE TABLE `version` (
  `VersionId` int(3) NOT NULL,
  `Version` varchar(50) NOT NULL,
  `Createdby` varchar(100) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

--
-- Dumping data for table `version`
--

INSERT INTO `version` (`VersionId`, `Version`, `Createdby`, `Date`) VALUES
(1, 'Bangla', '', '0000-00-00'),
(2, 'English', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`BranchId`);

--
-- Indexes for table `breakingnews`
--
ALTER TABLE `breakingnews`
  ADD PRIMARY KEY (`BrId`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassId`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`GroupId`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PId`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `researchproject`
--
ALTER TABLE `researchproject`
  ADD PRIMARY KEY (`RId`);

--
-- Indexes for table `role_tbl`
--
ALTER TABLE `role_tbl`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`SectionId`);

--
-- Indexes for table `sendsms`
--
ALTER TABLE `sendsms`
  ADD PRIMARY KEY (`SId`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`SessionId`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`ShiftId`);

--
-- Indexes for table `studentofthesemester`
--
ALTER TABLE `studentofthesemester`
  ADD PRIMARY KEY (`SSId`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`VersionId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `BranchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `breakingnews`
--
ALTER TABLE `breakingnews`
  MODIFY `BrId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ClassId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `GroupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `other`
--
ALTER TABLE `other`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `PId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `researchproject`
--
ALTER TABLE `researchproject`
  MODIFY `RId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `role_tbl`
--
ALTER TABLE `role_tbl`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `SectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sendsms`
--
ALTER TABLE `sendsms`
  MODIFY `SId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `SessionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `ShiftId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studentofthesemester`
--
ALTER TABLE `studentofthesemester`
  MODIFY `SSId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `version`
--
ALTER TABLE `version`
  MODIFY `VersionId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
