-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2025 at 07:14 PM
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
-- Database: `vendite`
--

-- --------------------------------------------------------

--
-- Table structure for table `articoli`
--

CREATE TABLE `articoli` (
  `ID_articolo` int(11) NOT NULL,
  `descrizione` varchar(100) NOT NULL,
  `prezzo_unitario` decimal(10,2) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articoli`
--

INSERT INTO `articoli` (`ID_articolo`, `descrizione`, `prezzo_unitario`, `id_categoria`) VALUES
(1, 'Smartphone', 500.00, 1),
(2, 'Maglietta', 20.00, 2),
(3, 'Pasta', 1.50, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `ID_categoria` int(11) NOT NULL,
  `descrizione` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`ID_categoria`, `descrizione`) VALUES
(1, 'Elettronica'),
(2, 'Abbigliamento'),
(3, 'Alimentari'),
(4, 'Elettronica'),
(5, 'Abbigliamento'),
(6, 'Alimentari');

-- --------------------------------------------------------

--
-- Table structure for table `citta`
--

CREATE TABLE `citta` (
  `ID_citta` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `CAP` varchar(10) NOT NULL,
  `regione` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `citta`
--

INSERT INTO `citta` (`ID_citta`, `nome`, `CAP`, `regione`) VALUES
(1, 'Milano', '20100', 'Lombardia'),
(2, 'Roma', '00100', 'Lazio'),
(3, 'Torino', '10100', 'Piemonte');

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `ID_clienti` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `cod_fiscale` varchar(16) DEFAULT NULL,
  `partita_iva` varchar(11) DEFAULT NULL,
  `id_citta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`ID_clienti`, `nome`, `indirizzo`, `cod_fiscale`, `partita_iva`, `id_citta`) VALUES
(1, 'Mario Rossi', 'Via Roma 1', 'RSSMRA80A01H501U', '12345678901', 1),
(2, 'Luigi Verdi', 'Via Torino 2', 'VRDLGU81B02H502V', '23456789012', 2),
(3, 'Giovanni Bianchi', 'Via Milano 3', 'BNCGNN82C03H503W', '34567890123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `dettagli`
--

CREATE TABLE `dettagli` (
  `ID_dettaglio` int(11) NOT NULL,
  `id_articolo` int(11) DEFAULT NULL,
  `id_fattura` int(11) DEFAULT NULL,
  `quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dettagli`
--

INSERT INTO `dettagli` (`ID_dettaglio`, `id_articolo`, `id_fattura`, `quantita`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 3, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fatture`
--

CREATE TABLE `fatture` (
  `ID_fatture` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `data` date NOT NULL,
  `num_fattura` varchar(50) NOT NULL,
  `importo` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fatture`
--

INSERT INTO `fatture` (`ID_fatture`, `id_cliente`, `data`, `num_fattura`, `importo`) VALUES
(1, 1, '2021-05-15', 'F001', 520.00),
(2, 2, '2021-06-20', 'F002', 21.50),
(3, 3, '2021-12-10', 'F003', 503.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articoli`
--
ALTER TABLE `articoli`
  ADD PRIMARY KEY (`ID_articolo`),
  ADD KEY `fk_articoli_categoria` (`id_categoria`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_categoria`);

--
-- Indexes for table `citta`
--
ALTER TABLE `citta`
  ADD PRIMARY KEY (`ID_citta`);

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`ID_clienti`),
  ADD KEY `fk_clienti_citta` (`id_citta`);

--
-- Indexes for table `dettagli`
--
ALTER TABLE `dettagli`
  ADD PRIMARY KEY (`ID_dettaglio`),
  ADD KEY `fk_dettagli_articoli` (`id_articolo`),
  ADD KEY `fk_dettagli_fatture` (`id_fattura`);

--
-- Indexes for table `fatture`
--
ALTER TABLE `fatture`
  ADD PRIMARY KEY (`ID_fatture`),
  ADD KEY `fk_fatture_clienti` (`id_cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articoli`
--
ALTER TABLE `articoli`
  MODIFY `ID_articolo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `citta`
--
ALTER TABLE `citta`
  MODIFY `ID_citta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
  MODIFY `ID_clienti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dettagli`
--
ALTER TABLE `dettagli`
  MODIFY `ID_dettaglio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fatture`
--
ALTER TABLE `fatture`
  MODIFY `ID_fatture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articoli`
--
ALTER TABLE `articoli`
  ADD CONSTRAINT `fk_articoli_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`ID_categoria`);

--
-- Constraints for table `clienti`
--
ALTER TABLE `clienti`
  ADD CONSTRAINT `fk_clienti_citta` FOREIGN KEY (`id_citta`) REFERENCES `citta` (`ID_citta`);

--
-- Constraints for table `dettagli`
--
ALTER TABLE `dettagli`
  ADD CONSTRAINT `fk_dettagli_articoli` FOREIGN KEY (`id_articolo`) REFERENCES `articoli` (`ID_articolo`),
  ADD CONSTRAINT `fk_dettagli_fatture` FOREIGN KEY (`id_fattura`) REFERENCES `fatture` (`ID_fatture`);

--
-- Constraints for table `fatture`
--
ALTER TABLE `fatture`
  ADD CONSTRAINT `fk_fatture_clienti` FOREIGN KEY (`id_cliente`) REFERENCES `clienti` (`ID_clienti`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
