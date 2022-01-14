-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 06, 2022 lúc 02:43 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbconstructionmanagement2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `activities`
--

CREATE TABLE `activities` (
  `ActivityID` int(11) NOT NULL,
  `ProjectTypeID` int(11) NOT NULL,
  `ActivityName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `activities`
--

INSERT INTO `activities` (`ActivityID`, `ProjectTypeID`, `ActivityName`) VALUES
(1, 1, 'Makes a mould, called formwork'),
(2, 1, 'Places in the steel reinforcement bars, and ties them in place using wire'),
(3, 1, 'Mixing cement, sand, stone chips and water in a cement mixer'),
(4, 1, 'Pouring in the liquid concrete into the formwork'),
(5, 2, 'Actual site survey, design plan'),
(6, 2, 'Design drawings for construction of steel frame houses'),
(7, 2, 'Build main frame'),
(8, 2, 'Manufacturing components at the factory'),
(9, 2, 'Tin-roofed'),
(10, 2, 'Check and acceptance and hand-over'),
(11, 3, 'Erection'),
(12, 3, 'Anchoring'),
(13, 3, 'Structural sheathing'),
(14, 3, 'Roor framing'),
(15, 3, 'External door and window frames'),
(16, 3, 'Internal door frames'),
(17, 3, 'External wall cladding'),
(18, 3, 'Internal wall lining'),
(19, 4, 'Erect the ground floor platform'),
(20, 4, 'Build all the walls upto a height of one storey'),
(21, 4, 'Build the next floor platform'),
(22, 4, 'Erect the next set of vertical walls'),
(23, 4, 'Build the sloping roof over the walls'),
(24, 5, 'Design of wall element axial/eccentric loads'),
(25, 5, 'Lateral load analysis and design'),
(26, 5, 'Design for shear'),
(27, 5, 'Location of the center of mass'),
(28, 5, 'Location of the center of stiffness'),
(29, 5, 'Stress in steel'),
(30, 5, 'Shear and bending force'),
(31, 5, 'Allowable shear stress'),
(32, 6, 'Foundations'),
(33, 6, 'Floor slab'),
(34, 6, 'Beams and columns (consists of factory-fabricated and factory-painted)'),
(35, 6, 'Ship columns to the site');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL,
  `EmployeeName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PositionID` int(11) NOT NULL,
  `Picture` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'defaultavatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`EmployeeID`, `EmployeeName`, `Gender`, `BirthDate`, `Address`, `Phone`, `Email`, `PositionID`, `Picture`) VALUES
(1, 'Thui', 'Female', '2000-12-12', 'Bình Định', '0377957930', 'Thuy@gmail.com', 1, 'defaultavatar.png'),
(2, 'Mina', 'Female', '1999-11-11', 'Đồng Nai', '0901523251', 'Mina@gmail.com', 2, 'defaultavatar.png'),
(3, 'Sara', 'Female', '1998-10-10', 'Bình Dương', '0901523252', 'Sara@gmail.com', 3, 'defaultavatar.png'),
(4, 'Ana', 'Female', '1997-10-09', 'Huế', '0901523253', 'Ana@gmail.com', 3, 'defaultavatar.png'),
(5, 'Louis', 'Nam', '1996-08-08', 'Tiền Giang', '0901523254', 'Louis@gmail.com', 4, 'defaultavatar.png'),
(6, 'Rtee', 'Male', '1995-07-07', 'Bình Phước', '0901523255', 'Rtee@gmail.com', 5, 'defaultavatar.png'),
(7, 'Issac', 'Male', '1994-06-06', 'Cà Mau', '0901523256', 'Issac@gmail.com', 6, 'defaultavatar.png'),
(8, 'Hell', 'Male', '1993-05-05', 'Bến Tre', '0901523257', 'Hell@gmail.com', 7, 'defaultavatar.png'),
(9, 'Max', 'Male', '1992-04-04', 'Quảng Ngãi', '0901523258', 'Max@gmail.com', 8, 'defaultavatar.png'),
(10, 'Ju', 'Male', '1991-03-03', 'Quảng Nam', '0901523259', 'Jun@gmail.com', 9, 'defaultavatar.png'),
(11, 'Adam', 'Male', '1990-04-04', 'Thái Bình', '0901523260', 'Adam@gmail.com', 2, 'defaultavatar.png'),
(12, 'Otis', 'Male', '1991-03-03', 'Price Lai', '0901523261', 'Otis@gmail.com', 6, 'defaultavatar.png'),
(13, 'Ha', 'Female', '1992-04-04', 'Hà Nội', '0901523262', 'Han@gmail.com', 5, 'defaultavatar.png'),
(14, 'My', 'Female', '1993-03-03', 'Bắc Kinh', '0901523263', 'My@gmail.com', 3, 'defaultavatar.png'),
(15, 'Thang', 'Male', '1994-04-04', 'Bắc Kạn', '0901523264', 'Thang@gmail.com', 4, 'defaultavatar.png'),
(16, 'Ji', 'Male', '1991-03-03', 'Quảng Trị', '0901523265', 'Jin@gmail.com', 6, 'defaultavatar.png'),
(17, 'Bobby', 'Male', '1995-07-07', 'Bình Phước', '0901523266', 'Bobby@gmail.com', 2, 'defaultavatar.png'),
(18, 'Mi', 'Male', '1994-06-06', 'Cà Mau', '0901523267', 'Min@gmail.com', 9, 'defaultavatar.png'),
(19, 'Moo', 'Male', '1993-05-05', 'Bến Tre', '0901523268', 'Moon@gmail.com', 1, 'defaultavatar.png'),
(20, 'Caesy', 'Female', '1991-05-22', 'Bến Tre', '0901523118', 'Caesy@gmail.com', 10, 'defaultavatar.png'),
(21, 'JK', 'Male', '1991-07-12', 'An Giang', '0901523128', 'JK@gmail.com', 10, 'defaultavatar.png'),
(22, 'Rose', 'Female', '1999-03-28', 'Tây Ninh', '0901523138', 'Rose@gmail.com', 10, 'defaultavatar.png'),
(23, 'Huy', 'Male', '1991-04-18', 'Vĩnh Long', '0901523148', 'Huy@gmail.com', 10, 'defaultavatar.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees_project`
--

CREATE TABLE `employees_project` (
  `EmployeeID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `StartDate` date DEFAULT NULL,
  `DayWorking` int(11) DEFAULT NULL,
  `Total` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employees_project`
--

INSERT INTO `employees_project` (`EmployeeID`, `ProjectID`, `StartDate`, `DayWorking`, `Total`) VALUES
(2, 1, '2001-04-07', 1400, 0),
(4, 1, '2001-01-01', 1500, 0),
(5, 1, '2001-02-02', 1720, 0),
(6, 1, '2001-03-03', 1290, 0),
(20, 1, '2000-10-10', 1965, 0),
(5, 2, '2003-06-08', 390, 0),
(9, 2, '2003-10-05', 460, 0),
(10, 2, '2003-10-05', 789, 0),
(11, 2, '2003-11-05', 990, 0),
(14, 2, '2003-11-05', 990, 0),
(16, 2, '2003-10-05', 789, 0),
(21, 2, '2002-05-10', 850, 0),
(6, 3, '2002-09-07', 2000, 0),
(7, 3, '2003-10-03', 290, 0),
(11, 3, '2002-10-03', 536, 0),
(13, 3, '2003-11-03', 1290, 0),
(15, 3, '2004-11-06', 596, 0),
(22, 3, '2001-01-09', 2900, 0),
(2, 4, '2004-08-06', 259, 0),
(6, 4, '2004-03-07', 2980, 0),
(8, 4, '2005-03-09', 534, 0),
(10, 4, '2005-04-03', 690, 0),
(12, 4, '2005-04-03', 890, 0),
(13, 4, '2004-04-03', 390, 0),
(14, 4, '2005-04-05', 890, 0),
(18, 4, '2004-05-03', 2930, 0),
(23, 4, '2003-02-09', 4500, 0),
(5, 5, '2005-11-03', 1190, 0),
(7, 5, '2005-11-03', 390, 0),
(9, 5, '2005-11-03', 690, 0),
(11, 5, '2005-11-08', 1290, 0),
(13, 5, '2005-12-03', 230, 0),
(15, 5, '2005-12-03', 1910, 0),
(20, 5, '2004-01-01', 1810, 0),
(7, 6, '2006-09-03', 1490, 0),
(10, 6, '2006-09-03', 1806, 0),
(11, 6, '2006-10-03', 990, 0),
(15, 6, '2006-11-03', 760, 0),
(16, 6, '2006-11-03', 1590, 0),
(17, 6, '2006-11-03', 1830, 0),
(21, 6, '2005-08-04', 1920, 0),
(6, 7, '2007-03-03', 790, 0),
(7, 7, '2007-03-03', 890, 0),
(8, 7, '2007-03-03', 2090, 0),
(10, 7, '2007-05-03', 2090, 0),
(16, 7, '2007-06-03', 950, 0),
(22, 7, '2006-07-05', 2390, 0),
(9, 8, '2007-08-06', 890, 0),
(11, 8, '2008-03-03', 567, 0),
(13, 8, '2008-03-03', 290, 0),
(15, 8, '2008-03-03', 1030, 0),
(23, 8, '2007-08-06', 1190, 0),
(6, 9, '2008-07-07', 901, 0),
(7, 9, '2008-07-07', 290, 0),
(9, 9, '2008-07-07', 567, 0),
(11, 9, '2008-07-07', 290, 0),
(12, 9, '2008-07-07', 690, 0),
(13, 9, '2008-07-07', 867, 0),
(14, 9, '2008-07-07', 1090, 0),
(15, 9, '2008-07-07', 1060, 0),
(20, 9, '2008-07-07', 1267, 0),
(8, 10, '2009-10-10', 290, 0),
(16, 10, '2009-10-10', 990, 0),
(17, 10, '2009-10-10', 467, 0),
(19, 10, '2009-10-10', 507, 0),
(21, 10, '2009-10-10', 2017, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `materials`
--

CREATE TABLE `materials` (
  `MaterialsID` int(11) NOT NULL,
  `MaterialsName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CalculationUnit` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `materials`
--

INSERT INTO `materials` (`MaterialsID`, `MaterialsName`, `CalculationUnit`) VALUES
(1, 'Trowel', 'Unit'),
(2, 'Float', 'Unit'),
(3, 'Hoe', 'Unit'),
(4, 'Cement', 'Bag'),
(5, 'Brick', 'Unit'),
(6, 'Zellige', 'Unit'),
(7, 'Dump Truck', 'Day'),
(8, 'Crane', 'Day'),
(9, 'Stone', 'Cubic meter'),
(10, 'Tile', 'Unit'),
(11, 'Concrete', 'Cubic meter'),
(12, 'Glass', 'Unit'),
(13, 'Wood', 'Unit'),
(14, 'Iron', 'Unit'),
(15, 'Nail', 'Kg'),
(16, 'Paint barrel', 'Kettle'),
(17, 'Hammer', 'Unit'),
(18, 'Wheelbarrow', 'Day'),
(19, 'Trough', 'Day'),
(20, 'Sand', 'Cubic meter');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `materials_project`
--

CREATE TABLE `materials_project` (
  `ProjectID` int(11) NOT NULL,
  `MaterialsID` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT 0,
  `Price` int(11) DEFAULT 0,
  `Total` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `materials_project`
--

INSERT INTO `materials_project` (`ProjectID`, `MaterialsID`, `Quantity`, `Price`, `Total`) VALUES
(1, 1, 30, 120000, 0),
(1, 2, 20, 10000, 0),
(1, 3, 10, 100000, 0),
(1, 4, 400, 210000, 0),
(1, 5, 10000, 20000, 0),
(1, 6, 6000, 9000, 0),
(1, 7, 5, 100000, 0),
(1, 8, 5, 100000, 0),
(1, 9, 30, 120000, 0),
(1, 10, 400, 210000, 0),
(1, 11, 30, 120000, 0),
(1, 12, 150, 280000, 0),
(1, 13, 250, 170000, 0),
(1, 14, 400, 210000, 0),
(1, 15, 30, 120000, 0),
(1, 16, 50, 90000, 0),
(1, 17, 6, 100000, 0),
(1, 18, 5, 100000, 0),
(1, 19, 10, 100000, 0),
(1, 20, 10, 100000, 0),
(2, 1, 30, 120000, 0),
(2, 2, 20, 10000, 0),
(2, 3, 10, 100000, 0),
(2, 4, 400, 210000, 0),
(2, 5, 10000, 20000, 0),
(2, 6, 6000, 9000, 0),
(2, 7, 5, 100000, 0),
(2, 8, 5, 100000, 0),
(2, 9, 30, 120000, 0),
(2, 10, 400, 210000, 0),
(2, 11, 30, 120000, 0),
(2, 12, 150, 280000, 0),
(2, 13, 250, 170000, 0),
(2, 14, 400, 210000, 0),
(2, 15, 30, 120000, 0),
(2, 16, 50, 90000, 0),
(2, 17, 6, 100000, 0),
(2, 18, 5, 100000, 0),
(2, 19, 10, 100000, 0),
(2, 20, 10, 100000, 0),
(3, 1, 30, 120000, 0),
(3, 2, 20, 10000, 0),
(3, 3, 10, 100000, 0),
(3, 4, 400, 210000, 0),
(3, 5, 10000, 20000, 0),
(3, 6, 6000, 9000, 0),
(3, 7, 5, 100000, 0),
(3, 8, 5, 100000, 0),
(3, 9, 30, 120000, 0),
(3, 10, 400, 210000, 0),
(3, 11, 30, 120000, 0),
(3, 12, 150, 280000, 0),
(3, 13, 250, 170000, 0),
(3, 14, 400, 210000, 0),
(3, 15, 30, 120000, 0),
(3, 16, 50, 90000, 0),
(3, 17, 6, 100000, 0),
(3, 18, 5, 100000, 0),
(3, 19, 10, 100000, 0),
(3, 20, 10, 100000, 0),
(4, 1, 30, 120000, 0),
(4, 2, 20, 10000, 0),
(4, 3, 10, 100000, 0),
(4, 4, 400, 210000, 0),
(4, 5, 10000, 20000, 0),
(4, 6, 6000, 9000, 0),
(4, 7, 5, 100000, 0),
(4, 8, 5, 100000, 0),
(4, 9, 30, 120000, 0),
(4, 10, 400, 210000, 0),
(4, 11, 30, 120000, 0),
(4, 12, 150, 280000, 0),
(4, 13, 250, 170000, 0),
(4, 14, 400, 210000, 0),
(4, 15, 30, 120000, 0),
(4, 16, 50, 90000, 0),
(4, 17, 6, 100000, 0),
(4, 18, 5, 100000, 0),
(4, 19, 10, 100000, 0),
(4, 20, 10, 100000, 0),
(5, 1, 30, 120000, 0),
(5, 2, 20, 10000, 0),
(5, 3, 10, 100000, 0),
(5, 4, 400, 210000, 0),
(5, 5, 10000, 20000, 0),
(5, 6, 6000, 9000, 0),
(5, 7, 5, 100000, 0),
(5, 8, 5, 100000, 0),
(5, 9, 30, 120000, 0),
(5, 10, 400, 210000, 0),
(5, 11, 30, 120000, 0),
(5, 12, 150, 280000, 0),
(5, 13, 250, 170000, 0),
(5, 14, 400, 210000, 0),
(5, 15, 30, 120000, 0),
(5, 16, 50, 90000, 0),
(5, 17, 6, 100000, 0),
(5, 18, 5, 100000, 0),
(5, 19, 10, 100000, 0),
(5, 20, 10, 100000, 0),
(6, 1, 30, 120000, 0),
(6, 2, 20, 10000, 0),
(6, 3, 10, 100000, 0),
(6, 4, 400, 210000, 0),
(6, 5, 10000, 20000, 0),
(6, 6, 6000, 9000, 0),
(6, 7, 5, 100000, 0),
(6, 8, 5, 100000, 0),
(6, 9, 30, 120000, 0),
(6, 10, 400, 210000, 0),
(6, 11, 30, 120000, 0),
(6, 12, 150, 280000, 0),
(6, 13, 250, 170000, 0),
(6, 14, 400, 210000, 0),
(6, 15, 30, 120000, 0),
(6, 16, 50, 90000, 0),
(6, 17, 6, 100000, 0),
(6, 18, 5, 100000, 0),
(6, 19, 10, 100000, 0),
(6, 20, 10, 100000, 0),
(7, 1, 30, 120000, 0),
(7, 2, 20, 10000, 0),
(7, 3, 10, 100000, 0),
(7, 4, 400, 210000, 0),
(7, 5, 10000, 20000, 0),
(7, 6, 6000, 9000, 0),
(7, 7, 5, 100000, 0),
(7, 8, 5, 100000, 0),
(7, 9, 30, 120000, 0),
(7, 10, 400, 210000, 0),
(7, 11, 30, 120000, 0),
(7, 12, 150, 280000, 0),
(7, 13, 250, 170000, 0),
(7, 14, 400, 210000, 0),
(7, 15, 30, 120000, 0),
(7, 16, 50, 90000, 0),
(7, 17, 6, 100000, 0),
(7, 18, 5, 100000, 0),
(7, 19, 10, 100000, 0),
(7, 20, 10, 100000, 0),
(8, 1, 30, 120000, 0),
(8, 2, 20, 10000, 0),
(8, 3, 10, 100000, 0),
(8, 4, 400, 210000, 0),
(8, 5, 10000, 20000, 0),
(8, 6, 6000, 9000, 0),
(8, 7, 5, 100000, 0),
(8, 8, 5, 100000, 0),
(8, 9, 30, 120000, 0),
(8, 10, 400, 210000, 0),
(8, 11, 30, 120000, 0),
(8, 12, 150, 280000, 0),
(8, 13, 250, 170000, 0),
(8, 14, 400, 210000, 0),
(8, 15, 30, 120000, 0),
(8, 16, 50, 90000, 0),
(8, 17, 6, 100000, 0),
(8, 18, 5, 100000, 0),
(8, 19, 10, 100000, 0),
(8, 20, 10, 100000, 0),
(9, 1, 30, 120000, 0),
(9, 2, 20, 10000, 0),
(9, 3, 10, 100000, 0),
(9, 4, 400, 210000, 0),
(9, 5, 10000, 20000, 0),
(9, 6, 6000, 9000, 0),
(9, 7, 5, 100000, 0),
(9, 8, 5, 100000, 0),
(9, 9, 30, 120000, 0),
(9, 10, 400, 210000, 0),
(9, 11, 30, 120000, 0),
(9, 12, 150, 280000, 0),
(9, 13, 250, 170000, 0),
(9, 14, 400, 210000, 0),
(9, 15, 30, 120000, 0),
(9, 16, 50, 90000, 0),
(9, 17, 6, 100000, 0),
(9, 18, 5, 100000, 0),
(9, 19, 10, 100000, 0),
(9, 20, 10, 100000, 0),
(10, 1, 30, 120000, 0),
(10, 2, 20, 10000, 0),
(10, 3, 10, 100000, 0),
(10, 4, 400, 210000, 0),
(10, 5, 10000, 20000, 0),
(10, 6, 6000, 9000, 0),
(10, 7, 5, 100000, 0),
(10, 8, 5, 100000, 0),
(10, 9, 30, 120000, 0),
(10, 10, 400, 210000, 0),
(10, 11, 30, 120000, 0),
(10, 12, 150, 280000, 0),
(10, 13, 250, 170000, 0),
(10, 14, 400, 210000, 0),
(10, 15, 30, 120000, 0),
(10, 16, 50, 90000, 0),
(10, 17, 6, 100000, 0),
(10, 18, 5, 100000, 0),
(10, 19, 10, 100000, 0),
(10, 20, 10, 100000, 0),
(35, 1, 0, 0, 0),
(35, 2, 0, 0, 0),
(35, 3, 0, 0, 0),
(35, 4, 0, 0, 0),
(35, 5, 0, 0, 0),
(35, 6, 0, 0, 0),
(35, 7, 0, 0, 0),
(35, 8, 0, 0, 0),
(35, 9, 0, 0, 0),
(35, 10, 0, 0, 0),
(35, 11, 0, 0, 0),
(35, 12, 0, 0, 0),
(35, 13, 0, 0, 0),
(35, 14, 0, 0, 0),
(35, 15, 0, 0, 0),
(35, 16, 0, 0, 0),
(35, 17, 0, 0, 0),
(35, 18, 0, 0, 0),
(35, 19, 0, 0, 0),
(35, 20, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `position`
--

CREATE TABLE `position` (
  `PositionID` int(11) NOT NULL,
  `PositionName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `position`
--

INSERT INTO `position` (`PositionID`, `PositionName`, `Salary`) VALUES
(1, 'Superintending', 3000),
(2, 'Resident', 3000),
(3, 'Electrical', 3000),
(4, 'Mechanical', 4000),
(5, 'Plasterer', 4000),
(6, 'Steel-fixer', 2500),
(7, 'Guard', 1000),
(8, 'Surveyor', 2500),
(9, 'Mate', 2000),
(10, 'Manager', 4000),
(11, 'Position', 1200),
(13, 'Test', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project`
--

CREATE TABLE `project` (
  `ProjectID` int(11) NOT NULL,
  `ProjectName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `Location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  `no_Worker` int(11) NOT NULL,
  `Cost` int(11) NOT NULL,
  `Descriptions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Picture` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'defaultproject.jpg',
  `ProjectTypeID` int(11) NOT NULL,
  `Status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `project`
--

INSERT INTO `project` (`ProjectID`, `ProjectName`, `EmployeeID`, `Location`, `StartDate`, `EndDate`, `no_Worker`, `Cost`, `Descriptions`, `Picture`, `ProjectTypeID`, `Status`) VALUES
(1, 'Dự án Anh Dương', 20, 'Đồng Nai', '2000-10-10', '2006-01-01', 5, 150000000, 'Đã hoàn thành', 'defaultproject.jpg', 1, 0),
(2, 'Dự án Cầu Ánh Trăng', 21, 'Bình Dương', '2002-10-05', '2010-03-03', 7, 190000000, 'Đã hoàn thành', 'defaultproject.jpg', 1, 0),
(3, 'Dự án Bệnh Viên Hòa Phát', 22, 'Đồng Nai', '2001-09-01', '2009-02-02', 7, 540000000, 'Đã hoàn thành', 'defaultproject.jpg', 2, 0),
(4, 'Dự án Công Viên Hải Hiền', 23, 'Lâm Đồng', '2003-02-09', '2010-09-02', 6, 720000000, 'Đang thực hiện', 'defaultproject.jpg', 3, 0),
(5, 'Dự án Công Viên Bình Bình', 20, 'tp.Hồ chí Minh', '2004-01-01', '2009-05-05', 5, 510000000, 'Đang tạm hoãn', 'defaultproject.jpg', 4, 0),
(6, 'Dự án Chung Cư An Lành', 21, 'tp.Hồ chí Minh', '2005-08-04', '2010-06-06', 9, 345000000, 'Đã hoàn thành', 'defaultproject.jpg', 4, 0),
(7, 'Dự án Khu du lịch Đại Phát', 22, 'Đồng Nai', '2006-07-05', '2012-07-07', 8, 960000000, 'Đang tạm hoãn', 'defaultproject.jpg', 4, 0),
(8, 'Dự án Khu Nghỉ Dưỡng An Nhiên', 23, 'tp.Hồ chí Minh', '2007-08-06', '2011-08-08', 7, 530000000, 'Đã hoàn thành', 'defaultproject.jpg', 5, 0),
(9, 'Dự án Khu Phức Hợp Đông Hùng', 20, 'Bình Dương', '2008-07-07', '2016-10-10', 6, 250000000, 'Đang thực hiện', 'defaultproject.jpg', 5, 0),
(10, 'Dự án Cao Ốc Hương Tâm', 21, 'Bình Dương', '2009-06-08', '2014-12-12', 9, 190000000, 'Đang thực hiện', 'defaultproject.jpg', 6, 1),
(35, 'Project Name 1', 20, 'Location 1', '2022-01-15', '2022-01-11', 5, 10000000, 'First Project', 'cong-trinh-dan-dung.jpg', 6, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `projecttype`
--

CREATE TABLE `projecttype` (
  `ProjectTypeID` int(11) NOT NULL,
  `ProjectTypeName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `projecttype`
--

INSERT INTO `projecttype` (`ProjectTypeID`, `ProjectTypeName`) VALUES
(1, 'Concrete frame construction'),
(2, 'Steel frame structures'),
(3, 'Light gauge steel structures'),
(4, 'Wood framed construction'),
(5, 'Load bearing masonry wall construction'),
(6, 'Pre engineered building construction');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project_progress`
--

CREATE TABLE `project_progress` (
  `ProjectID` int(11) NOT NULL,
  `ActivityID` int(11) NOT NULL,
  `ProjectTypeID` int(11) DEFAULT NULL,
  `Progress` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `project_progress`
--

INSERT INTO `project_progress` (`ProjectID`, `ActivityID`, `ProjectTypeID`, `Progress`) VALUES
(1, 1, NULL, 80),
(1, 2, NULL, 50),
(1, 3, NULL, 30),
(1, 4, NULL, 10),
(2, 1, NULL, 80),
(2, 2, NULL, 50),
(2, 3, NULL, 30),
(2, 4, NULL, 10),
(2, 5, NULL, 0),
(2, 6, NULL, 0),
(2, 7, NULL, 0),
(2, 8, NULL, 0),
(2, 9, NULL, 0),
(2, 10, NULL, 0),
(3, 5, NULL, NULL),
(3, 6, NULL, 100),
(3, 7, NULL, 100),
(3, 8, NULL, 100),
(3, 9, NULL, 100),
(3, 10, NULL, 100),
(4, 11, NULL, 30),
(4, 12, NULL, 10),
(4, 13, NULL, 80),
(4, 14, NULL, 50),
(4, 15, NULL, 30),
(4, 16, NULL, 10),
(4, 17, NULL, 80),
(4, 18, NULL, 50),
(5, 19, NULL, 30),
(5, 20, NULL, 10),
(5, 21, NULL, 80),
(5, 22, NULL, 50),
(5, 23, NULL, 30),
(6, 19, NULL, 10),
(6, 20, NULL, 80),
(6, 21, NULL, 50),
(6, 22, NULL, 30),
(6, 23, NULL, 10),
(6, 32, NULL, 0),
(6, 33, NULL, 0),
(6, 34, NULL, 0),
(6, 35, NULL, 0),
(7, 19, NULL, 80),
(7, 20, NULL, 50),
(7, 21, NULL, 30),
(7, 22, NULL, 10),
(7, 23, NULL, 80),
(8, 24, NULL, 50),
(8, 25, NULL, 30),
(8, 26, NULL, 10),
(8, 27, NULL, 50),
(8, 28, NULL, 30),
(8, 29, NULL, 10),
(8, 30, NULL, 50),
(8, 31, NULL, 30),
(9, 24, NULL, 10),
(9, 25, NULL, 50),
(9, 26, NULL, 30),
(9, 27, NULL, 10),
(9, 28, NULL, 50),
(9, 29, NULL, 30),
(9, 30, NULL, 10),
(9, 31, NULL, 50),
(10, 32, NULL, 100),
(10, 33, NULL, 100),
(10, 34, NULL, 100),
(10, 35, NULL, 100),
(35, 32, NULL, 100),
(35, 33, NULL, 100),
(35, 34, NULL, 100),
(35, 35, NULL, 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test`
--

CREATE TABLE `test` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `em` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lv` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `test`
--

INSERT INTO `test` (`id`, `name`, `em`, `pa`, `lv`) VALUES
(1, 'test', 'test@gmail.com', '$2y$10$sLq5HFckPg/gxCTOZBWT1ePTOXT9NSb2lLaMOVLlBb3B485UUxEVO', 3),
(2, 'test2', 'test2@gmail.com', '$2y$10$lbDiiqb/dnZA08WSKCoz6e7gh9hLUt1u3hJ2D9DVxHjlJpE67MrSi', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'thang', 'thang@gmail.com', 0, NULL, '12345678', NULL, NULL, NULL),
(2, 'thangtran', 'thang123@gmail.com', 0, NULL, '$2y$10$KHvBdUATD0icckG0HiFQQO3lDz78xO0clCH3gTftTD2PA8qAtUOjG', NULL, '2021-12-28 11:18:03', '2021-12-28 11:18:03'),
(3, '123', '123@gmail.com', 3, NULL, '$2y$10$0BqNi1ASaWVS.iwI6cJ0JusLSVuaDFkLmneeNMRkDMVg8rAUrZs/a', NULL, '2021-12-28 11:34:27', '2021-12-28 11:34:27'),
(4, 'Trần Quốc Thắng', '1854050107thang@ou.edu.vn', 3, NULL, '$2y$10$JYyZo6qiHfM8BlM8k48Z1eSnRgOvmviRBBlDjTya9fqk59ZkqQ3kG', NULL, '2021-12-28 20:40:53', '2021-12-28 20:40:53'),
(5, 'test3', 'test3@gmail.com', 3, NULL, '$2y$10$rNJXRFJvS5ZeJlKXH8HB4ex1BIE8zgMEXedf7vzjTJXgH35cdWjUW', NULL, '2021-12-29 04:34:05', '2021-12-29 04:34:05'),
(6, 'test4', 'test4@gmail.com', 3, NULL, '$2y$10$jFaSlmNIXcYztvInABUfeeI2wb4zGFaZbsFoqo/S6SOj5c6rTJ6Mu', NULL, '2021-12-29 06:02:28', '2021-12-29 06:02:28'),
(9, 'test6', 'test6@gmail.com', 3, NULL, '$2y$10$P8dNVGsIRbGud8sl/gGyweLFXrzUrZpnNS7diY2sPBUgw6qMJHMQG', NULL, '2021-12-29 07:15:56', '2021-12-29 08:10:22'),
(10, 'Admin', 'admin@gmail.com', 1, NULL, '$2y$10$O8.Y5SfUNGrWYi5fVFm5Z.RVknTZqOXRzH4x24c9TmCz29m8azqRC', NULL, '2021-12-30 02:41:43', '2021-12-30 02:41:43'),
(11, 'Manager', 'manager@gmail.com', 2, NULL, '$2y$10$w7UXL3zBDJJoKN21LeZMdObODLe0hegSqV1I8J9vcqfG.3RiTFac6', NULL, '2021-12-30 02:42:03', '2021-12-30 02:42:03'),
(12, 'Moderator', 'moderator@gmail.com', 3, NULL, '$2y$10$KcRR.0f/AmGn.wMS.z8ffOs8a3Kike77mVwlwQ6CJgrRgLjAN6Qya', NULL, '2021-12-30 02:42:21', '2021-12-30 02:42:21');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`ActivityID`),
  ADD KEY `ProjectTypeID` (`ProjectTypeID`);

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `employees_ibfk_1` (`PositionID`);

--
-- Chỉ mục cho bảng `employees_project`
--
ALTER TABLE `employees_project`
  ADD PRIMARY KEY (`ProjectID`,`EmployeeID`),
  ADD KEY `employees_project_ibfk_1` (`EmployeeID`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`MaterialsID`);

--
-- Chỉ mục cho bảng `materials_project`
--
ALTER TABLE `materials_project`
  ADD PRIMARY KEY (`ProjectID`,`MaterialsID`),
  ADD KEY `materials_project_ibfk_2` (`MaterialsID`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`PositionID`);

--
-- Chỉ mục cho bảng `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ProjectID`),
  ADD KEY `project_ibfk_1` (`ProjectTypeID`),
  ADD KEY `project_ibfk_2` (`EmployeeID`);

--
-- Chỉ mục cho bảng `projecttype`
--
ALTER TABLE `projecttype`
  ADD PRIMARY KEY (`ProjectTypeID`);

--
-- Chỉ mục cho bảng `project_progress`
--
ALTER TABLE `project_progress`
  ADD PRIMARY KEY (`ProjectID`,`ActivityID`),
  ADD KEY `project_progress_ibfk_2` (`ActivityID`),
  ADD KEY `project_progress_ibfk_3` (`ProjectTypeID`);

--
-- Chỉ mục cho bảng `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `em` (`em`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `activities`
--
ALTER TABLE `activities`
  MODIFY `ActivityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `materials`
--
ALTER TABLE `materials`
  MODIFY `MaterialsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `position`
--
ALTER TABLE `position`
  MODIFY `PositionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `project`
--
ALTER TABLE `project`
  MODIFY `ProjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `projecttype`
--
ALTER TABLE `projecttype`
  MODIFY `ProjectTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`ProjectTypeID`) REFERENCES `projecttype` (`ProjectTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`PositionID`) REFERENCES `position` (`PositionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `employees_project`
--
ALTER TABLE `employees_project`
  ADD CONSTRAINT `employees_project_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_project_ibfk_2` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ProjectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `materials_project`
--
ALTER TABLE `materials_project`
  ADD CONSTRAINT `materials_project_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ProjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materials_project_ibfk_2` FOREIGN KEY (`MaterialsID`) REFERENCES `materials` (`MaterialsID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`ProjectTypeID`) REFERENCES `projecttype` (`ProjectTypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `project_progress`
--
ALTER TABLE `project_progress`
  ADD CONSTRAINT `project_progress_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ProjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_progress_ibfk_2` FOREIGN KEY (`ActivityID`) REFERENCES `activities` (`ActivityID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_progress_ibfk_3` FOREIGN KEY (`ProjectTypeID`) REFERENCES `projecttype` (`ProjectTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
