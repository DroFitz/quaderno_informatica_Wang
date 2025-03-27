-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2025 at 09:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atletica`
--

-- --------------------------------------------------------

--
-- Table structure for table `ammonizioni`
--

CREATE TABLE `ammonizioni` (
  `ID_ammonizione` int(11) NOT NULL,
  `id_gara` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `data_ammonizione` timestamp NOT NULL DEFAULT current_timestamp(),
  `motivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ammonizioni`
--

INSERT INTO `ammonizioni` (`ID_ammonizione`, `id_gara`, `id_atleta`, `data_ammonizione`, `motivo`) VALUES
(1, 1, 2, '2025-03-27 19:44:48', 'Taglio percorso'),
(2, 1, 2, '2025-03-27 19:44:48', 'Doping'),
(3, 1, 2, '2025-03-27 19:44:48', 'Comportamento antisportivo'),
(4, 3, 7, '2025-03-27 19:44:48', 'Partenza anticipata'),
(5, 5, 3, '2025-03-27 19:44:48', 'Ostruzione avversario'),
(6, 5, 3, '2025-03-27 19:44:48', 'Uso linguaggio inappropriato');

-- --------------------------------------------------------

--
-- Table structure for table `atleti`
--

CREATE TABLE `atleti` (
  `ID_atleta` int(11) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `indirizzo` varchar(100) DEFAULT NULL,
  `cod_fiscale` char(16) NOT NULL,
  `data_nascita` date NOT NULL,
  `sesso` char(1) DEFAULT NULL CHECK (`sesso` in ('M','F')),
  `ID_categoria` int(11) NOT NULL,
  `ID_squadra` int(11) NOT NULL,
  `numero_pettorale` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `atleti`
--

INSERT INTO `atleti` (`ID_atleta`, `cognome`, `nome`, `indirizzo`, `cod_fiscale`, `data_nascita`, `sesso`, `ID_categoria`, `ID_squadra`, `numero_pettorale`) VALUES
(1, 'Rossi', 'Mario', 'Via Roma 1, Roma', 'RSSMRA80A01H501Z', '1980-01-01', 'M', 2, 1, 101),
(2, 'Bianchi', 'Luigi', 'Corso Milano 2, Milano', 'BNCLGU75B02F205Y', '1975-02-02', 'M', 3, 2, 102),
(3, 'Verdi', 'Giovanna', 'Piazza Torino 3, Torino', 'VRDGNN70C03H501X', '1970-03-03', 'F', 4, 3, 103),
(4, 'Neri', 'Paola', 'Viale Firenze 4, Firenze', 'NRIPLA85D04G912W', '1985-04-04', 'F', 2, 4, 104),
(5, 'Gialli', 'Marco', 'Via Napoli 5, Napoli', 'GLLMRC90E05F839V', '1990-05-05', 'M', 1, 5, 105),
(6, 'Blu', 'Anna', 'Corso Italia 6, Roma', 'BLUANN95F06H501U', '1995-06-06', 'F', 1, 1, 106),
(7, 'Arancioni', 'Luca', 'Piazza Duomo 7, Milano', 'RNCLCU88G07F205T', '1988-07-07', 'M', 2, 2, 107),
(8, 'Viola', 'Sara', 'Via Po 8, Torino', 'VLASRA92H08H501S', '1992-08-08', 'F', 1, 3, 108),
(9, 'Rosa', 'Giorgio', 'Viale dei Mille 9, Firenze', 'RSAGRG99I09G912R', '1999-09-09', 'M', 5, 4, 109),
(10, 'Marrone', 'Elena', 'Via Partenope 10, Napoli', 'MRRLNE00L10F839Q', '2000-10-10', 'F', 5, 5, 110);

-- --------------------------------------------------------

--
-- Table structure for table `atleti_gare`
--

CREATE TABLE `atleti_gare` (
  `id_atleta` int(11) NOT NULL,
  `id_gara` int(11) NOT NULL,
  `posizione` int(11) DEFAULT NULL,
  `tempo` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `atleti_gare`
--

INSERT INTO `atleti_gare` (`id_atleta`, `id_gara`, `posizione`, `tempo`) VALUES
(1, 1, 1, '02:15:30'),
(1, 4, 2, '00:46:35'),
(2, 1, 2, '02:16:45'),
(2, 4, 3, '00:47:50'),
(3, 1, 3, '02:18:20'),
(3, 5, 1, '00:20:05'),
(4, 2, 1, '01:05:15'),
(4, 5, 2, '00:21:15'),
(5, 2, 2, '01:06:30'),
(5, 5, 3, '00:22:25'),
(6, 2, 3, '01:07:45'),
(7, 3, 1, '00:30:10'),
(8, 3, 2, '00:31:25'),
(9, 3, 3, '00:32:40'),
(10, 4, 1, '00:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `ID_categoria` int(11) NOT NULL,
  `descrizione` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`ID_categoria`, `descrizione`) VALUES
(1, 'Junior U20'),
(2, 'Senior'),
(3, 'Master 35'),
(4, 'Master 45'),
(5, 'Esordienti');

-- --------------------------------------------------------

--
-- Table structure for table `gare`
--

CREATE TABLE `gare` (
  `ID_gara` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gare`
--

INSERT INTO `gare` (`ID_gara`, `nome`, `citta`, `data`) VALUES
(1, 'Maratona di Roma', 'Roma', '2023-10-15'),
(2, 'Mezza Maratona di Milano', 'Milano', '2023-11-05'),
(3, '10km di Torino', 'Torino', '2023-09-20'),
(4, 'Gara Podistica Firenze', 'Firenze', '2023-12-10'),
(5, 'Sprint Napoli', 'Napoli', '2023-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `squadre`
--

CREATE TABLE `squadre` (
  `ID_squadra` int(11) NOT NULL,
  `descrizione` varchar(100) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `nazione` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `squadre`
--

INSERT INTO `squadre` (`ID_squadra`, `descrizione`, `citta`, `nazione`) VALUES
(1, 'Atletica Roma', 'Roma', 'Italia'),
(2, 'Milano Running', 'Milano', 'Italia'),
(3, 'Torino Podismo', 'Torino', 'Italia'),
(4, 'Firenze Corri', 'Firenze', 'Italia'),
(5, 'Napoli Sprint', 'Napoli', 'Italia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ammonizioni`
--
ALTER TABLE `ammonizioni`
  ADD PRIMARY KEY (`ID_ammonizione`),
  ADD KEY `id_gara` (`id_gara`),
  ADD KEY `id_atleta` (`id_atleta`);

--
-- Indexes for table `atleti`
--
ALTER TABLE `atleti`
  ADD PRIMARY KEY (`ID_atleta`),
  ADD UNIQUE KEY `cod_fiscale` (`cod_fiscale`),
  ADD UNIQUE KEY `numero_pettorale` (`numero_pettorale`),
  ADD KEY `ID_categoria` (`ID_categoria`),
  ADD KEY `ID_squadra` (`ID_squadra`);

--
-- Indexes for table `atleti_gare`
--
ALTER TABLE `atleti_gare`
  ADD PRIMARY KEY (`id_atleta`,`id_gara`),
  ADD KEY `id_gara` (`id_gara`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID_categoria`);

--
-- Indexes for table `gare`
--
ALTER TABLE `gare`
  ADD PRIMARY KEY (`ID_gara`);

--
-- Indexes for table `squadre`
--
ALTER TABLE `squadre`
  ADD PRIMARY KEY (`ID_squadra`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ammonizioni`
--
ALTER TABLE `ammonizioni`
  MODIFY `ID_ammonizione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `atleti`
--
ALTER TABLE `atleti`
  MODIFY `ID_atleta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gare`
--
ALTER TABLE `gare`
  MODIFY `ID_gara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `squadre`
--
ALTER TABLE `squadre`
  MODIFY `ID_squadra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ammonizioni`
--
ALTER TABLE `ammonizioni`
  ADD CONSTRAINT `ammonizioni_ibfk_1` FOREIGN KEY (`id_gara`) REFERENCES `gare` (`ID_gara`),
  ADD CONSTRAINT `ammonizioni_ibfk_2` FOREIGN KEY (`id_atleta`) REFERENCES `atleti` (`ID_atleta`);

--
-- Constraints for table `atleti`
--
ALTER TABLE `atleti`
  ADD CONSTRAINT `atleti_ibfk_1` FOREIGN KEY (`ID_categoria`) REFERENCES `categorie` (`ID_categoria`),
  ADD CONSTRAINT `atleti_ibfk_2` FOREIGN KEY (`ID_squadra`) REFERENCES `squadre` (`ID_squadra`);

--
-- Constraints for table `atleti_gare`
--
ALTER TABLE `atleti_gare`
  ADD CONSTRAINT `atleti_gare_ibfk_1` FOREIGN KEY (`id_atleta`) REFERENCES `atleti` (`ID_atleta`),
  ADD CONSTRAINT `atleti_gare_ibfk_2` FOREIGN KEY (`id_gara`) REFERENCES `gare` (`ID_gara`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
