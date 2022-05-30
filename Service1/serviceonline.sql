-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 07:11 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serviceonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `cereri`
--

CREATE TABLE `cereri` (
  `ID` int(10) NOT NULL,
  `TextUtilizator` varchar(2000) NOT NULL,
  `StatusCerere` varchar(20) NOT NULL,
  `DataDorita` varchar(40) NOT NULL,
  `OraDorita` varchar(40) NOT NULL,
  `IdCont` int(10) NOT NULL,
  `Raspuns` varchar(200) NOT NULL,
  `imagename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cereri`
--

INSERT INTO `cereri` (`ID`, `TextUtilizator`, `StatusCerere`, `DataDorita`, `OraDorita`, `IdCont`, `Raspuns`, `imagename`) VALUES
(1, 'TEST1', 'Aprobat', '2022-6-1', '8:00', 7, 'ok', 'bicicleta-stricata-accident.jpg'),
(2, 'TEST2', 'Aprobat', '2022-6-2', '8:00', 7, 'ok', 'trotineta-lime-stricata-586x630.jpg'),
(3, 'TEST2', 'Aprobat', '2022-6-2', '9:00', 7, 'ok', 'trotineta-lime-stricata-586x630.jpg'),
(4, 'TEST3', 'Aprobat', '2022-6-2', '10:00', 7, 'ok', 'trotineta-lime-stricata-586x630.jpg'),
(5, 'TEST3', 'Aprobat', '2022-6-2', '12:00', 7, 'ok', ''),
(6, 'TEST6', 'Aprobat', '2022-6-2', '11:00', 7, 'ok', 'trotineta-lime-stricata-586x630.jpg'),
(7, 'TEST7', 'Aprobat', '2022-6-3', '13:00', 7, 'ok', 'trotineta-lime-stricata-586x630.jpg'),
(8, 'TESTimagine', 'In asteptare', '2022-6-3', '12:00', 7, 'Niciun raspuns inca', 'trotineta-lime-stricata-586x630.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cererifurnizori`
--

CREATE TABLE `cererifurnizori` (
  `ID` int(10) NOT NULL,
  `NumeFurnizor` varchar(50) NOT NULL,
  `DataCererii` varchar(50) NOT NULL,
  `Cantitate` int(10) NOT NULL,
  `Piesa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cererifurnizori`
--

INSERT INTO `cererifurnizori` (`ID`, `NumeFurnizor`, `DataCererii`, `Cantitate`, `Piesa`) VALUES
(1, 'Piese SRL', '13 04 2022', 11, 'Baterie'),
(2, 'F1', '15 04 2022', 70, 'Test'),
(3, 'emag', '28 04 2022', 4, 'roata'),
(4, 'emag', '17 05 2022', 20, 'Cauciucuri'),
(5, 'emag', '22 05 2022', 2, 'Cauciucuri'),
(6, 'emag', '22 05 2022', 11, 'test'),
(7, 'Service', '22 05 2022', 2, 'Frane'),
(8, 'Service', '22 05 2022', 3, 'Cauciucuri'),
(9, 'emag', '30 05 2022', 10, 'Frane'),
(10, 'emag', '30 05 2022', 10, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `conturi`
--

CREATE TABLE `conturi` (
  `ID` int(10) NOT NULL,
  `Nume` varchar(100) NOT NULL,
  `Prenume` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Parola` varchar(100) NOT NULL,
  `NumarTelefon` varchar(100) NOT NULL,
  `rol` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conturi`
--

INSERT INTO `conturi` (`ID`, `Nume`, `Prenume`, `Email`, `Parola`, `NumarTelefon`, `rol`) VALUES
(3, 'Admin', 'Admin', 'admin@yahoo.com', '$2y$10$DEz/PbdpCX6/xVV8gjuOvuL4f7Ir6VyMsYOOYDW.yJ1Q89ClXLl4G', '965734203', 1),
(7, 'Carp', 'Valentin', 'valentin.carp15@gmail.com', '$2y$10$7s7IxZzlF0cIF8qTd1UHlOYxljJ2O2uCXFyECBik8FT7U1EjXX3UW', '0746799227', 0),
(8, 'Misu', 'Mihai', 'misu@yahoo.com', '$2y$10$1eUZiguMfoRV9uUZ7UbKSeRCzoBH0BMM937ih8EKDUe2OS4tCBc9W', '0756888111', 0),
(9, 'Popescu', 'Ion', 'popescu@yahoo.com', '$2y$10$duhAfTSWAYMFidm5zHKN1eUSAvEJeZ8rIEICuQCcQTtsCG3zi8wrK', '0789999123', 0),
(10, 'gigi', 'bufon', 'gigi@yahoo.com', '$2y$10$7jdM6edapTiG03fK.qLoQuOduTG8dAupo61fu8anXXQhc8gDlAL4i', '0722222222', 0),
(11, 'Ion', 'ION', 'ion@yahoo.com', '$2y$10$7Ao7xAUU5wrNe/RQZ67pJu6Mod.3yf5IXlneGPzi/Yst/QAq8j7EO', '0767727111', 0);

-- --------------------------------------------------------

--
-- Table structure for table `piese`
--

CREATE TABLE `piese` (
  `ID` int(10) NOT NULL,
  `NumePiesa` varchar(100) NOT NULL,
  `Numar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `piese`
--

INSERT INTO `piese` (`ID`, `NumePiesa`, `Numar`) VALUES
(0, 'test', 91),
(1, 'Baterie', 220),
(2, 'Cauciucuri', 165),
(3, 'Frane', 102),
(4, 'Suspensii', 54),
(5, 'Incarcatoare', 40),
(6, 'Surub', 30),
(7, 'Piesa22', 7),
(8, 'Test', 91),
(9, 'bateriedual', 0),
(10, 'roata', 4),
(11, 'piston', 0),
(12, '', 0),
(13, 'qweq', 0),
(14, 'qq', 0);

-- --------------------------------------------------------

--
-- Table structure for table `programari`
--

CREATE TABLE `programari` (
  `ID` int(10) NOT NULL,
  `DataProgramarii` varchar(40) NOT NULL,
  `OraProgramarii` varchar(40) NOT NULL,
  `IdUser` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programari`
--

INSERT INTO `programari` (`ID`, `DataProgramarii`, `OraProgramarii`, `IdUser`) VALUES
(1, '2022-6-01', '8:00', 7),
(2, '2022-6-02', '8:00', 7),
(3, '2022-6-02', '9:00', 7),
(4, '2022-6-02', '10:00', 7),
(5, '2022-6-02', '12:00', 7),
(6, '2022-6-02', '11:00', 7),
(7, '2022-6-03', '13:00', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cereri`
--
ALTER TABLE `cereri`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Fk_Cont` (`IdCont`);

--
-- Indexes for table `cererifurnizori`
--
ALTER TABLE `cererifurnizori`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `conturi`
--
ALTER TABLE `conturi`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `piese`
--
ALTER TABLE `piese`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `programari`
--
ALTER TABLE `programari`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_programare` (`IdUser`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cereri`
--
ALTER TABLE `cereri`
  ADD CONSTRAINT `Fk_Cont` FOREIGN KEY (`IdCont`) REFERENCES `conturi` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `programari`
--
ALTER TABLE `programari`
  ADD CONSTRAINT `fk_programare` FOREIGN KEY (`IdUser`) REFERENCES `conturi` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
