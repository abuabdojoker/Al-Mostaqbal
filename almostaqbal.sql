-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2017 at 07:51 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `almostaqbal`
--

-- --------------------------------------------------------

--
-- Table structure for table `MA_Category`
--

CREATE TABLE `MA_Category` (
  `MA_ID` int(11) NOT NULL,
  `MA_Title` varchar(50) NOT NULL,
  `MA_CLass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `MA_Email_Settings`
--

CREATE TABLE `MA_Email_Settings` (
  `MA_ID` int(11) NOT NULL,
  `MA_Host` varchar(50) DEFAULT NULL,
  `MA_SMTPAuth` varchar(6) DEFAULT NULL,
  `MA_Username` varchar(50) DEFAULT NULL,
  `MA_Password` varchar(50) DEFAULT NULL,
  `MA_SMTPSecure` varchar(6) DEFAULT NULL,
  `MA_Port` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MA_Email_Settings`
--

INSERT INTO `MA_Email_Settings` (`MA_ID`, `MA_Host`, `MA_SMTPAuth`, `MA_Username`, `MA_Password`, `MA_SMTPSecure`, `MA_Port`) VALUES
(1, 'smtp.gmail.com', 'true', 'abuabdojoker22@gmail.com', 'sara@mrdevelop', 'tls', 587);

-- --------------------------------------------------------

--
-- Table structure for table `ma_mail`
--

CREATE TABLE `ma_mail` (
  `MA_ID` int(11) NOT NULL,
  `MA_Title` varchar(50) NOT NULL,
  `MA_Message` text NOT NULL,
  `MA_Data` datetime NOT NULL,
  `MA_Phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `MA_Products`
--

CREATE TABLE `MA_Products` (
  `MA_ID` int(11) NOT NULL,
  `MA_Title` varchar(50) NOT NULL,
  `MA_Description` text NOT NULL,
  `MA_Price` double NOT NULL,
  `MA_Picture` varchar(100) NOT NULL,
  `MA_Category` int(11) NOT NULL,
  `MA_Visitors` int(11) NOT NULL,
  `MA_Likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ma_settings`
--

CREATE TABLE `ma_settings` (
  `MA_ID` int(11) NOT NULL,
  `ma_title` varchar(50) NOT NULL,
  `MA_TitleOrIco` int(11) NOT NULL,
  `MA_Description` text NOT NULL,
  `MA_Meta` varchar(225) NOT NULL,
  `MA_Url` varchar(225) NOT NULL,
  `MA_Ico` varchar(255) NOT NULL,
  `MA_Phone` varchar(15) NOT NULL,
  `MA_Facebook` varchar(255) NOT NULL,
  `MA_Twitter` varchar(255) NOT NULL,
  `MA_Linkedin` varchar(255) NOT NULL,
  `MA_Google_Plus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ma_settings`
--

INSERT INTO `ma_settings` (`MA_ID`, `ma_title`, `MA_TitleOrIco`, `MA_Description`, `MA_Meta`, `MA_Url`, `MA_Ico`, `MA_Phone`, `MA_Facebook`, `MA_Twitter`, `MA_Linkedin`, `MA_Google_Plus`) VALUES
(1, 'Al-Mostaqbal', 1, '', '', '', '', '01008662177', 'Mohhw', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `Username` varchar(300) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `Permission` int(11) NOT NULL,
  `Picture` varchar(300) NOT NULL,
  `UserIp` varchar(50) NOT NULL,
  `ChangePass` varchar(60) NOT NULL,
  `MA_Active_Code` varchar(255) NOT NULL,
  `FullName` varchar(150) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Username`, `Email`, `Password`, `Permission`, `Picture`, `UserIp`, `ChangePass`, `MA_Active_Code`, `FullName`, `Status`) VALUES
(1, 'Mohamed', 'mnjn@nod.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, '', '127.0.0.1', '8', 'fvmldkmcdkml', 'Mohamed', 10),
(2, 'dvnadk', 'dklnsclkas@njn.com', 'cdscncnaksn', 10, 'vdsVlndskl', 'dslkvmadlkm', 'lefkmlekm', 'ladmflka', 'mdlkcmadakml', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `MA_Email_Settings`
--
ALTER TABLE `MA_Email_Settings`
  ADD PRIMARY KEY (`MA_ID`);

--
-- Indexes for table `ma_mail`
--
ALTER TABLE `ma_mail`
  ADD PRIMARY KEY (`MA_ID`);

--
-- Indexes for table `MA_Products`
--
ALTER TABLE `MA_Products`
  ADD PRIMARY KEY (`MA_ID`);

--
-- Indexes for table `ma_settings`
--
ALTER TABLE `ma_settings`
  ADD PRIMARY KEY (`MA_ID`) USING HASH;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `MA_Email_Settings`
--
ALTER TABLE `MA_Email_Settings`
  MODIFY `MA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ma_mail`
--
ALTER TABLE `ma_mail`
  MODIFY `MA_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `MA_Products`
--
ALTER TABLE `MA_Products`
  MODIFY `MA_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ma_settings`
--
ALTER TABLE `ma_settings`
  MODIFY `MA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
