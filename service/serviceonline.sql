-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: apr. 02, 2022 la 03:12 PM
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
(1, 'Reparatie trotineta electrica', 'In asteptare', '2022-03-31', '23:41', 1, 'Niciun raspuns inca'),
(2, 'Trotineta defecta', 'In asteptare', '2022-04-27', '22:22', 1, 'Niciun raspuns inca');

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
-- Indexuri pentru tabele `conturi`
--
ALTER TABLE `conturi`
  ADD PRIMARY KEY (`ID`);

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `cereri`
--
ALTER TABLE `cereri`
  ADD CONSTRAINT `Fk_Cont` FOREIGN KEY (`IdCont`) REFERENCES `conturi` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
