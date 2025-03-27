-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2025 at 08:02 PM
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
-- Database: `fatturazione`
--

-- --------------------------------------------------------

--
-- Table structure for table `articoli`
--

CREATE TABLE `articoli` (
  `ID_articolo` int(11) NOT NULL,
  `descrizione` varchar(100) NOT NULL,
  `prezzo_unitario` decimal(10,2) NOT NULL,
  `id_fattura` int(11) NOT NULL,
  `importo` decimal(10,2) NOT NULL,
  `evaso` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articoli`
--

INSERT INTO `articoli` (`ID_articolo`, `descrizione`, `prezzo_unitario`, `id_fattura`, `importo`, `evaso`) VALUES
(1, 'Monitor 24\" Full HD', 199.99, 1, 199.99, 1),
(2, 'Tastiera wireless', 49.99, 1, 49.99, 1),
(3, 'Scrivania ufficio', 299.00, 2, 299.00, 0),
(4, 'Sedia ergonomica', 159.00, 2, 159.00, 0),
(5, 'Laptop i7 16GB RAM', 899.00, 3, 899.00, 1),
(6, 'Stampante laser', 249.00, 3, 249.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `ID_cliente` int(11) NOT NULL,
  `ragione_sociale` varchar(100) NOT NULL,
  `indirizzo` varchar(100) DEFAULT NULL,
  `citta` varchar(50) DEFAULT NULL,
  `cod_fiscale` varchar(16) DEFAULT NULL,
  `partita_iva` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`ID_cliente`, `ragione_sociale`, `indirizzo`, `citta`, `cod_fiscale`, `partita_iva`) VALUES
(1, 'Mario Rossi SRL', 'Via Roma 123', 'Milano', 'RSSMRA80A01F205X', '12345678901'),
(2, 'Luigi Bianchi SPA', 'Corso Italia 45', 'Torino', 'BNCLGU75B02L219Y', '98765432109'),
(3, 'Giovanni Verdi & C.', 'Piazza Garibaldi 12', 'Napoli', 'VRDGNN70C03H501Z', '45678912345');

-- --------------------------------------------------------

--
-- Table structure for table `fatture`
--

CREATE TABLE `fatture` (
  `ID_fattura` int(11) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `pagata` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fatture`
--

INSERT INTO `fatture` (`ID_fattura`, `numero`, `data`, `id_cliente`, `pagata`) VALUES
(1, 'F2023001', '2023-01-15', 1, 1),
(2, 'F2023002', '2023-01-18', 2, 0),
(3, 'F2023003', '2023-02-05', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articoli`
--
ALTER TABLE `articoli`
  ADD PRIMARY KEY (`ID_articolo`),
  ADD KEY `id_fattura` (`id_fattura`);

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`ID_cliente`);

--
-- Indexes for table `fatture`
--
ALTER TABLE `fatture`
  ADD PRIMARY KEY (`ID_fattura`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articoli`
--
ALTER TABLE `articoli`
  MODIFY `ID_articolo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
  MODIFY `ID_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fatture`
--
ALTER TABLE `fatture`
  MODIFY `ID_fattura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articoli`
--
ALTER TABLE `articoli`
  ADD CONSTRAINT `articoli_ibfk_1` FOREIGN KEY (`id_fattura`) REFERENCES `fatture` (`ID_fattura`);

--
-- Constraints for table `fatture`
--
ALTER TABLE `fatture`
  ADD CONSTRAINT `fatture_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clienti` (`ID_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
