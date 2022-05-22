-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 09:02 PM
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
(1, 'La la la', 'Respins', '2022-04-15', '10:00', 3, 'Nu ', ''),
(2, 'Problema la franare', 'Aprobat', '2022-04-19', '10:00', 3, 'Va asteptam la ora dorita', ''),
(3, 'Baterie stricata', 'Aprobat', '2022-04-13', '12:00', 1, 'Va asteptam la ora dorita', ''),
(4, 'aaaaaaa', 'Respins', '2022-04-22', '23:00', 3, 'nu', ''),
(5, 'Reparatie baterie', 'Aprobat', '2022-04-21', '11:00', 3, 'Va asteptam la ora dorita', ''),
(6, 'test', 'Aprobat', '2022-04-27', '10:00', 3, 'accept', ''),
(7, 'Schimbare roata', 'Aprobat', '2022-04-29', '11:00', 1, 'ok', ''),
(8, 'roata bicicleta', 'Respins', '2022-04-28', '14:00', 1, 'tete', ''),
(9, 'aaa', 'Aprobat', '2022-04-29', '14:00', 1, 'nu avem', ''),
(10, 'aa', 'Respins', '2022-05-18', '23:00', 1, 'a', ''),
(11, 'aa', 'Aprobat', '2022-05-18', '23:00', 1, 'ok', ''),
(12, 'aaaa', 'In asteptare', '2022-05-12', '11:00', 2, 'Niciun raspuns inca', ''),
(13, 'aaa', 'In asteptare', '2022-05-12', '00:00', 1, 'Niciun raspuns inca', ''),
(14, 'aaaaaa', 'Aprobat', '2022-05-16', '10:00', 1, 'aa', ''),
(15, 'aaaaaa', 'Respins', '2022-05-16', '10:00', 1, 'aa', ''),
(16, 'aaa', 'In asteptare', '2022-05-16', '11:00', 1, 'Niciun raspuns inca', ''),
(17, 'aaaa', 'In asteptare', '2022-05-16', '00:00', 1, 'Niciun raspuns inca', ''),
(18, 'test imagine', 'In asteptare', '2022-05-17', '12:00', 1, 'Niciun raspuns inca', ''),
(19, 'asdadadad', 'In asteptare', '2022-05-18', '13:00', 1, 'Niciun raspuns inca', ''),
(20, 'qweqwe', 'In asteptare', '2022-05-24', '23:00', 4, 'Niciun raspuns inca', 'logo.png'),
(21, 'aaa', 'In asteptare', '2022-05-24', '11:00', 4, 'Niciun raspuns inca', 'logo.png'),
(22, 'erwer', 'In asteptare', '2022-05-23', '14:00', 1, 'Niciun raspuns inca', 'date.png'),
(23, '', 'In asteptare', '2022-05-30', '1:00', 1, 'Niciun raspuns inca', 'date.png'),
(24, 'qwewq', 'In asteptare', '2022-05-25', '2:00', 1, 'Niciun raspuns inca', 'date.png'),
(25, 'qwewq', 'In asteptare', '2022-05-25', '2:00', 1, 'Niciun raspuns inca', 'date.png'),
(26, 'Test215', 'In asteptare', '2022-05-23', '2:00', 1, 'Niciun raspuns inca', 'date.png'),
(27, 'ytwqe', 'In asteptare', '2022-05-19', '3:00', 1, 'Niciun raspuns inca', 'date.png'),
(28, 'Test1', 'In asteptare', '2022-05-25', '10:00', 1, 'Niciun raspuns inca', 'date.png'),
(29, 'Test2', 'In asteptare', '2022-05-25', '11:00', 1, 'Niciun raspuns inca', 'date.png'),
(30, 'Test3', 'In asteptare', '2022-05-25', '12:00', 1, 'Niciun raspuns inca', 'date.png'),
(31, 'test100', 'In asteptare', '2022-05-28', '17:00', 1, 'Niciun raspuns inca', 'date.png');

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
(8, 'Service', '22 05 2022', 3, 'Cauciucuri');

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
(1, 'Nume1', 'Prenume1', 'user1@yahoo.com', 'PAROLA22', '3124214219', 0),
(2, 'Valentin', 'Carp', 'valenta@gmail.com', 'parola22', '057435437', 0),
(3, 'Admin', 'Admin', 'admin@yahoo.com', 'parola22', '965734203', 1),
(4, 'Carp', 'Valentin', 'vali@yahoo.com', 'elenaelena', '0746799227', 0),
(5, 'Carp', 'Valentin', 'test11@yahoo.com', 'elenaelena', '0746799227', 0),
(6, '', '', '', '', '', 0);

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
(0, 'test', 81),
(1, 'Baterie', 220),
(2, 'Cauciucuri', 165),
(3, 'Frane', 92),
(4, 'Suspensii', 54),
(5, 'Incarcatoare', 40),
(6, 'Surub', 30),
(7, 'Piesa22', 7),
(8, 'Test', 81),
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
(1, '2022-04-15', '10:00', 3),
(2, '2022-04-19', '10:00', 3),
(3, '2022-04-13', '12:00', 1),
(4, '2022-04-22', '23:00', 3),
(5, '2022-04-21', '11:00', 3),
(6, '2022-04-27', '10:00', 3),
(7, '2022-04-29', '11:00', 1),
(8, '2022-04-28', '14:00', 1),
(9, '2022-04-29', '14:00', 1),
(10, '2022-05-18', '23:00', 1),
(11, '2022-05-18', '23:00', 1),
(12, '2022-05-12', '11:00', 2),
(13, '2022-05-12', '00:00', 1),
(14, '2022-05-16', '10:00', 1),
(15, '2022-05-16', '10:00', 1),
(16, '2022-05-16', '11:00', 1),
(17, '2022-05-16', '00:00', 1),
(18, '2022-05-17', '12:00', 1),
(19, '2022-05-18', '13:00', 1),
(20, '2022-05-24', '23:00', 4),
(21, '2022-05-24', '11:00', 4),
(22, '2022-05-23', '14:00', 1),
(23, '2022-05-30', '1:00', 1),
(24, '2022-05-25', '2:00', 1),
(25, '2022-05-25', '2:00', 1),
(26, '2022-05-23', '2:00', 1),
(27, '2022-05-19', '3:00', 1),
(28, '2022-05-25', '10:00', 1),
(29, '2022-05-25', '11:00', 1),
(30, '2022-05-25', '12:00', 1),
(31, '2022-05-28', '17:00', 1);

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
