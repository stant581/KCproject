-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2019 at 06:55 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10330685_intern`
--
CREATE DATABASE IF NOT EXISTS `id10330685_intern` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id10330685_intern`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `eid` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `FullName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Number` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`eid`, `FullName`, `Number`, `email`, `password`, `Type`) VALUES
('EID121221', 'admin', '7276983171', 'admin@gmail.com', '5c428d8875d2948607f3e3fe134d71b4', 0),
('EID5dd7756803145', 'Suraj ', '8638237491', 'fakenotsuraj@gmail.com', '95044d2ddf576b139ecd45c1cf636a2b', 1),
('E1D234', 'Animesh Banerjee', '7904977045', 'stant581@gmail.com', 'f5dd8f016f851c2ad4aa124ecd36b6f9', 1),
('E1D234', 'Animesh Banerjee', '7904977045', 'stant581@gmail.com', 'f5dd8f016f851c2ad4aa124ecd36b6f9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `cid` varchar(50) NOT NULL,
  `CompanyName` varchar(20) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Job` varchar(50) NOT NULL,
  `Contact_Person` varchar(50) NOT NULL,
  `Contact_Email` varchar(50) NOT NULL,
  `Contact_Mob` varchar(10) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`cid`, `CompanyName`, `Location`, `Job`, `Contact_Person`, `Contact_Email`, `Contact_Mob`, `CreationDate`, `Status`) VALUES
('CID5d4c566fefb96', 'Infosys', 'Bengaluru', 'Programmer', 'Chandan', 'chandu@gmail.com', '65454545', '2019-08-08 17:05:51', '1'),
('CID5d4c603fa7452', 'tisco', 'mumbai', 'Sweeping', 'Swtha', 'swetha@yahoo.in', '1231234', '2019-08-08 17:47:43', '1'),
('CID5d4d37b6b7ba7', 'ABC', 'jaipur', 'JOb1', 'Sam', 'Jack@yahoo.com', '9878667778', '2019-08-09 09:07:02', '1'),
('CID5d5514cc1d488', 'Tata Steel', 'Jameshudpur', 'Recovery Boiler', 'Surruthi', 'surru@yahoo.com', '878675672', '2019-08-15 08:16:12', '1'),
('CID5d551822aa534', 'ValuLabs', 'Hyderabad', 'Devlop', 'cHANDU', 'Bhand@bhai.com', '9846546516', '2019-08-15 08:30:26', '1'),
('CID5d566c470819e', 'TataSteel', 'Nagpur', 'ESP Boiler', 'Yogarani', 'yogarani.n@kcces.in', '897665434', '2019-08-16 08:41:43', '1'),
('CID5d738055a9381', 'NTPC LIMITED', 'DELHI', 'R & M of ESP', 'xxx', 'n.yogarani@kccottrell-es.com', '4466764500', '2019-09-07 10:03:01', '1'),
('CID5d8388c9289af', 'Hyperverge', 'Isaka', 'Essential', 'Mr Y', 'mry@gmail.com', '8777878787', '2019-09-19 13:55:21', '1'),
('CID5d8599be8e325', 'HashedIn', 'Bangalore', 'Sorftware related', 'Mr Z', 'mrz@gmail.com', '8787878788', '2019-09-21 03:32:14', '1'),
('CID5d8724699e708', 'Syscloud', 'Osaka', 'Software Related', 'Mr X', 'mrx@gmail.com', '7878787878', '2019-09-22 07:36:09', '1'),
('CID5d88cb765a26c', 'Bridge Solutions', 'Poland', 'Software Related', 'Mr A', 'mra@gmail.com', '8989899989', '2019-09-23 13:41:10', '1'),
('CID5d8de9f1b4f87', 'TATA POWER', 'JHAMSHEDPUR', 'OVERHAULING ESP', 'yoga', 'n.yogarani@kccottrell-es.com', '4466764500', '2019-09-27 10:52:33', '1'),
('CID5d92465f437ba', 'qwqw', 'wq', 'w', 'w', 'qw@gmail.com', '8787878787', '2019-09-30 18:15:59', '1'),
('CID5d924671c467e', 'wqeqqdasd', 'adsd', 'qq', 's', 'qs@gmail.com', '8787878787', '2019-09-30 18:16:17', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `eid` varchar(30) NOT NULL,
  `FullName` varchar(20) NOT NULL,
  `Number` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `RegDate` datetime NOT NULL,
  `status` int(10) NOT NULL,
  `Type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`eid`, `FullName`, `Number`, `email`, `password`, `RegDate`, `status`, `Type`) VALUES
('E1D234', 'Animesh Banerjee', '7904977045', 'stant581@gmail.com', 'f5dd8f016f851c2ad4aa124ecd36b6f9', '2019-08-08 15:15:09', 1, 1),
('EID5d4428a53e0de', 'Durgesh', '7889966443', 'sahudurgesh1998@gmail.com', '95044d2ddf576b139ecd45c1cf636a2b', '2019-08-02 12:12:21', 0, 2),
('EID5d5517ad072c6', 'Chandan Shaw', '8567895262', 'stant@sdjfh.com', '6eea9b7ef19179a06954edd0f6c05ceb', '2019-08-15 08:28:29', 0, 2),
('EID5d563e050dc5a', 'Shravani', '9867356788', 'indumathym@gmail.com', 'a9c4684026f56b20c886e84a157b9c7f', '2019-08-16 05:24:21', 1, 2),
('EID5d5668d2d67e9', 'Yogarani', '8754491750', 'yogarani.s@kcces.in', 'c06db68e819be6ec3d26c6038d8e8d1f', '2019-08-16 08:26:58', 1, 2),
('EID5dd68c1458c25', 'Ani', '2323232323', 'baba@baby.com', 'f5dd8f016f851c2ad4aa124ecd36b6f9', '2019-11-21 13:07:32', 1, 2),
('EID5dd7756803145', 'Suraj ', '8638237491', 'fakenotsuraj@gmail.com', '95044d2ddf576b139ecd45c1cf636a2b', '2019-11-22 05:43:04', 1, 1),
('EID5ddd666e22b6c', 'Indumathy', '9444144325', 'i_mathy@yahoo.com', '32250170a0dca92d53ec9624f336ca24', '2019-11-26 17:52:46', 1, 2),
('EID5de7bcfdc7a04', 'Somexemp', '7276983171', 'somexemp@gmail.com', '3fc0a7acf087f549ac2b266baf94b8b1', '2019-12-04 14:04:45', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblholiday`
--

CREATE TABLE `tblholiday` (
  `Date` date NOT NULL,
  `Cause` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblholiday`
--

INSERT INTO `tblholiday` (`Date`, `Cause`) VALUES
('2020-02-21', 'Ganesh Chathurthi'),
('2019-04-19', 'Guru Nanak Birthday');

-- --------------------------------------------------------

--
-- Table structure for table `tblopportunity`
--

CREATE TABLE `tblopportunity` (
  `Opportunity_No` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `OldOpportunity` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Reference` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Opportunity_Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Opportunity_Des` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Plant` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Business_unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Entity` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Contract_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Contract_scope` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `LEB` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Forecast_val` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Net_contribution` decimal(20,0) NOT NULL,
  `Booking_reporting_val` decimal(20,0) NOT NULL,
  `Proposal_man` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Sales_man` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Creator` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Bid_request_actual` date NOT NULL,
  `Proposal_expected` date NOT NULL,
  `Proposal_last` date NOT NULL,
  `Ord_date_expected` date NOT NULL,
  `Ord_date_actual` date NOT NULL,
  `Estimated` int(30) NOT NULL,
  `Type` int(3) NOT NULL,
  `Manager_Id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Conv` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblopportunity`
--

INSERT INTO `tblopportunity` (`Opportunity_No`, `OldOpportunity`, `Reference`, `Opportunity_Name`, `Opportunity_Des`, `Plant`, `Business_unit`, `Entity`, `Contract_type`, `Contract_scope`, `LEB`, `Forecast_val`, `Net_contribution`, `Booking_reporting_val`, `Proposal_man`, `Sales_man`, `Creator`, `Status`, `Bid_request_actual`, `Proposal_expected`, `Proposal_last`, `Ord_date_expected`, `Ord_date_actual`, `Estimated`, `Type`, `Manager_Id`, `Conv`) VALUES
('P19122057', 'nA', 'surajthing', 'some', 'i don\'t know', 'ABc XYZ', 'Flue gas Desulphurization', 'KCIN', 'Service Only', 'Engg+Supp+Erection (Incl.Civil)', 'A', '1200', 1124, 0, 'Animesh Banerjee', 'Ani', 'Suraj ', 'Won', '2020-12-01', '2020-12-02', '2019-12-04', '2020-02-03', '0000-00-00', 20, 1, 'E1D234', 1),
('P19128688', 'P18199921', 'Xeon', 'Crucial', 'Urgent Request', 'Haryana', 'Flue gas Desulphurization', 'KCIN', 'Renovation', 'Engg + Materail Only', 'B', '48888', 2, 0, 'Shravani', 'Ani', 'Indumathy', 'Buyer Defined', '2016-12-30', '2018-12-31', '2019-12-04', '2018-12-30', '0000-00-00', 700, 1, 'EID5dd7756803145', 0),
('C19122057', 'nA', 'surajthing', 'some', 'i don\'t know', 'ABc XYZ', 'Flue gas Desulphurization', 'KCIN', 'Service Only', 'Engg+Supp+Erection (Incl.Civil)', 'A', '1200', 1124, 78000, 'Animesh Banerjee', 'Ani', 'Suraj', 'Won', '2020-12-01', '2020-12-02', '2019-12-06', '2020-02-03', '2017-10-31', 20, 2, 'E1D234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblproject`
--

CREATE TABLE `tblproject` (
  `eid` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `FullName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Number` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblproject`
--

INSERT INTO `tblproject` (`eid`, `FullName`, `Number`, `email`, `ID`) VALUES
('EID5d563e050dc5a', 'Shravani', '9867356788', 'indumathym@gmail.com', 'P19122057'),
('EID5d5668d2d67e9', 'Yogarani', '8754491750', 'yogarani.s@kcces.in', 'P19122057'),
('EID5dd68c1458c25', 'Ani', '2323232323', 'baba@baby.com', 'P19122057'),
('E1D234', 'Animesh Banerjee', '7904977045', 'stant581@gmail.com', ''),
('EID5d563e050dc5a', 'Shravani', '9867356788', 'indumathym@gmail.com', 'P19128688'),
('EID5ddd666e22b6c', 'Indumathy', '9444144325', 'i_mathy@yahoo.com', 'P19128688'),
('EID5de7bcfdc7a04', 'Somexemp', '7276983171', 'somexemp@gmail.com', 'P19128688');

-- --------------------------------------------------------

--
-- Table structure for table `tbltimesheet`
--

CREATE TABLE `tbltimesheet` (
  `CID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `EID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hr` int(11) NOT NULL,
  `date` date NOT NULL,
  `approve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbltimesheet`
--

INSERT INTO `tbltimesheet` (`CID`, `EID`, `hr`, `date`, `approve`) VALUES
('P19122057', 'EID5dd68c1458c25', 7, '2019-02-15', 1),
('P19122057', 'EID5dd68c1458c25', 5, '2019-02-13', 1),
('P19122057', 'EID5dd68c1458c25', 2, '2019-12-14', 0),
('P19122057', 'EID5dd68c1458c25', 2, '2002-08-19', 0),
('P19122057', 'EID5dd68c1458c25', 1, '2019-12-29', 0),
('P19122057', 'EID5dd68c1458c25', 1, '2019-12-05', 0),
('P19128688', 'EID5de7bcfdc7a04', 7, '2018-10-01', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`eid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
