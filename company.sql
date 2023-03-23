-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 08:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `rules` int(11) NOT NULL,
  `img` varchar(100) NOT NULL DEFAULT 'fake.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `rules`, `img`) VALUES
(1, 'george', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, '1679085469photo.jpeg'),
(3, 'merna ', 'fc1200c7a7aa52109d762a9f005b149abef01479', 2, '1679083451ana.png'),
(4, 'Geoeid', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 3, '1679084915pexels-photo-992734.jpeg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `adminalldata`
-- (See below for the actual view)
--
CREATE TABLE `adminalldata` (
`id` int(11)
,`name` varchar(20)
,`img` varchar(100)
,`description` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `adminsrule`
-- (See below for the actual view)
--
CREATE TABLE `adminsrule` (
`id` int(11)
,`name` varchar(20)
,`description` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `create_at`) VALUES
(2, 'it', '2023-03-01 16:24:57'),
(3, 'marketing', '2023-03-01 16:25:02'),
(5, 'off', '2023-03-01 17:26:19'),
(7, 'management', '2023-03-01 18:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `salary` float NOT NULL,
  `img` text NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `departmentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `salary`, `img`, `create_at`, `departmentid`) VALUES
(5, 'George ashraf', 333333000, '', '2023-03-01 18:01:41', 5),
(7, 'Mina', 555555, '', '2023-03-01 18:19:10', 7),
(8, 'eid ashraf', 60000, '', '2023-03-01 19:00:12', 2),
(9, 'abdo', 0, '', '2023-03-05 21:04:11', 5),
(10, 'Geo Eid', 1000, '', '2023-03-05 21:06:11', 2),
(29, 'jojo', 5000, '1678299215george.jpg', '2023-03-08 19:23:11', 5),
(38, 'وردة حبنا', 20000000, '1679074399photo2.jpeg', '2023-03-17 19:33:19', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `employeewithdepartment`
-- (See below for the actual view)
--
CREATE TABLE `employeewithdepartment` (
`id` int(11)
,`empname` varchar(50)
,`salary` float
,`img` text
,`depname` varchar(50)
,`depid` int(11)
,`create_at` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL DEFAULT 'fake.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profileimg`
--

INSERT INTO `profileimg` (`id`, `img`) VALUES
(1, 'fake.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `description`) VALUES
(1, 'super admin for all app'),
(2, 'accesss employee and department'),
(3, 'department only');

-- --------------------------------------------------------

--
-- Structure for view `adminalldata`
--
DROP TABLE IF EXISTS `adminalldata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `adminalldata`  AS SELECT `admin`.`id` AS `id`, `admin`.`name` AS `name`, `admin`.`img` AS `img`, `rules`.`description` AS `description` FROM (`admin` join `rules` on(`admin`.`rules` = `rules`.`id`)) ORDER BY `admin`.`id` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `adminsrule`
--
DROP TABLE IF EXISTS `adminsrule`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `adminsrule`  AS SELECT `admin`.`id` AS `id`, `admin`.`name` AS `name`, `rules`.`description` AS `description` FROM (`admin` join `rules` on(`admin`.`rules` = `rules`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `employeewithdepartment`
--
DROP TABLE IF EXISTS `employeewithdepartment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employeewithdepartment`  AS SELECT `employees`.`id` AS `id`, `employees`.`name` AS `empname`, `employees`.`salary` AS `salary`, `employees`.`img` AS `img`, `department`.`name` AS `depname`, `department`.`id` AS `depid`, `employees`.`create_at` AS `create_at` FROM (`employees` join `department` on(`employees`.`departmentid` = `department`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `password` (`password`),
  ADD KEY `rules` (`rules`),
  ADD KEY `imgid` (`img`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departmentid` (`departmentid`);

--
-- Indexes for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`rules`) REFERENCES `rules` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`departmentid`) REFERENCES `department` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
