-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: apr. 15, 2022 la 09:04 AM
-- Versiune server: 10.4.18-MariaDB
-- Versiune PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `serviceonline`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cereri`
--

CREATE TABLE `cereri` (
  `ID` int(10) NOT NULL,
  `TextUtilizator` varchar(2000) NOT NULL,
  `StatusCerere` varchar(20) NOT NULL,
  `DataDorita` varchar(40) NOT NULL,
  `OraDorita` varchar(40) NOT NULL,
  `IdCont` int(10) NOT NULL,
  `Raspuns` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `cereri`
--

INSERT INTO `cereri` (`ID`, `TextUtilizator`, `StatusCerere`, `DataDorita`, `OraDorita`, `IdCont`, `Raspuns`) VALUES
(1, 'La la la', 'Respins', '2022-04-15', '10:00', 3, 'Nu '),
(2, 'Problema la franare', 'Aprobat', '2022-04-19', '10:00', 3, 'Va asteptam la ora dorita'),
(3, 'Baterie stricata', 'Aprobat', '2022-04-13', '12:00', 1, 'Va asteptam la ora dorita'),
(4, 'aaaaaaa', 'Respins', '2022-04-22', '23:00', 3, 'nu'),
(5, 'Reparatie baterie', 'Aprobat', '2022-04-21', '11:00', 3, 'Va asteptam la ora dorita'),
(6, 'test', 'In asteptare', '2022-04-27', '10:00', 3, 'Niciun raspuns inca');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cererifurnizori`
--

CREATE TABLE `cererifurnizori` (
  `ID` int(10) NOT NULL,
  `NumeFurnizor` varchar(50) NOT NULL,
  `DataCererii` varchar(50) NOT NULL,
  `Cantitate` int(10) NOT NULL,
  `Piesa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `cererifurnizori`
--

INSERT INTO `cererifurnizori` (`ID`, `NumeFurnizor`, `DataCererii`, `Cantitate`, `Piesa`) VALUES
(1, 'Piese SRL', '13 04 2022', 11, 'Baterie'),
(2, 'F1', '15 04 2022', 70, 'Test');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `conturi`
--

CREATE TABLE `conturi` (
  `ID` int(10) NOT NULL,
  `Nume` varchar(100) NOT NULL,
  `Prenume` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Parola` varchar(100) NOT NULL,
  `NumarTelefon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `conturi`
--

INSERT INTO `conturi` (`ID`, `Nume`, `Prenume`, `Email`, `Parola`, `NumarTelefon`) VALUES
(1, 'Nume1', 'Prenume1', 'user1@yahoo.com', 'PAROLA22', '3124214219'),
(2, 'Valentin', 'Carp', 'valenta@gmail.com', 'parola22', '057435437'),
(3, 'Admin', 'Admin', 'admin@yahoo.com', 'parola22', '965734203');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `piese`
--

CREATE TABLE `piese` (
  `ID` int(10) NOT NULL,
  `NumePiesa` varchar(100) NOT NULL,
  `Numar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `piese`
--

INSERT INTO `piese` (`ID`, `NumePiesa`, `Numar`) VALUES
(1, 'Baterie', 220),
(2, 'Cauciucuri', 140),
(3, 'Frane', 90),
(4, 'Suspensii', 56),
(5, 'Incarcatoare', 80),
(6, 'Surub', 50),
(7, 'Piesa22', 10),
(8, 'Test', 70);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `programari`
--

CREATE TABLE `programari` (
  `ID` int(10) NOT NULL,
  `DataProgramarii` varchar(40) NOT NULL,
  `OraProgramarii` varchar(40) NOT NULL,
  `IdUser` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `programari`
--

INSERT INTO `programari` (`ID`, `DataProgramarii`, `OraProgramarii`, `IdUser`) VALUES
(1, '2022-04-15', '10:00', 3),
(2, '2022-04-19', '10:00', 3),
(3, '2022-04-13', '12:00', 1),
(4, '2022-04-22', '23:00', 3),
(5, '2022-04-21', '11:00', 3),
(6, '2022-04-27', '10:00', 3);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `cereri`
--
ALTER TABLE `cereri`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Fk_Cont` (`IdCont`);

--
-- Indexuri pentru tabele `cererifurnizori`
--
ALTER TABLE `cererifurnizori`
  ADD PRIMARY KEY (`ID`);

--
-- Indexuri pentru tabele `conturi`
--
ALTER TABLE `conturi`
  ADD PRIMARY KEY (`ID`);

--
-- Indexuri pentru tabele `piese`
--
ALTER TABLE `piese`
  ADD PRIMARY KEY (`ID`);

--
-- Indexuri pentru tabele `programari`
--
ALTER TABLE `programari`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_programare` (`IdUser`);

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `cereri`
--
ALTER TABLE `cereri`
  ADD CONSTRAINT `Fk_Cont` FOREIGN KEY (`IdCont`) REFERENCES `conturi` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `programari`
--
ALTER TABLE `programari`
  ADD CONSTRAINT `fk_programare` FOREIGN KEY (`IdUser`) REFERENCES `conturi` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
