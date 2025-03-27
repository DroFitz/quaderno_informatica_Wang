-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2025 at 09:40 AM
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
-- Database: `azienda_commerciale`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categoria` varchar(30) NOT NULL,
  `descrizione` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categoria`, `descrizione`) VALUES
('CAT1', 'Elettronica'),
('CAT2', 'Abbigliamento'),
('CAT3', 'Alimentari');

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `id_cliente` varchar(30) NOT NULL,
  `ragione_sociale` varchar(150) NOT NULL,
  `indirizzo` varchar(30) NOT NULL,
  `città` varchar(30) NOT NULL,
  `cap` int(10) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `n_telefono` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`id_cliente`, `ragione_sociale`, `indirizzo`, `città`, `cap`, `provincia`, `n_telefono`) VALUES
('C01', 'Mario Rossi SRL', 'Via Roma 1', 'Roma', 100, 'RM', '0612345678'),
('C02', 'Luigi Bianchi SPA', 'Via Milano 2', 'Milano', 20100, 'MI', '0223456789'),
('C03', 'Giuseppe Verdi SNC', 'Via Napoli 3', 'Napoli', 80100, 'NA', '0812345678');

-- --------------------------------------------------------

--
-- Table structure for table `dettagli_ordini`
--

CREATE TABLE `dettagli_ordini` (
  `id_ordine` varchar(30) NOT NULL,
  `id_prodotto` varchar(30) NOT NULL,
  `quantità` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dettagli_ordini`
--

INSERT INTO `dettagli_ordini` (`id_ordine`, `id_prodotto`, `quantità`) VALUES
('O01', 'P01', '2'),
('O01', 'P35', '5'),
('O02', 'P41', '10'),
('O03', 'P01', '1'),
('O03', 'P41', '20');

-- --------------------------------------------------------

--
-- Table structure for table `fornitori`
--

CREATE TABLE `fornitori` (
  `id_fornitore` varchar(30) NOT NULL,
  `ragione_sociale` varchar(150) NOT NULL,
  `indirizzo` varchar(30) NOT NULL,
  `città` varchar(30) NOT NULL,
  `cap` int(10) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `n_telefono` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fornitori`
--

INSERT INTO `fornitori` (`id_fornitore`, `ragione_sociale`, `indirizzo`, `città`, `cap`, `provincia`, `n_telefono`) VALUES
('F01', 'Fornitore Alpha SRL', 'Via Torino 10', 'Torino', 10100, 'TO', '0112345678'),
('F02', 'Fornitore Beta SPA', 'Via Firenze 20', 'Firenze', 50100, 'FI', '0552345678'),
('F03', 'Fornitore Gamma SNC', 'Via Palermo 30', 'Palermo', 90100, 'PA', '0912345678');

-- --------------------------------------------------------

--
-- Table structure for table `ordini`
--

CREATE TABLE `ordini` (
  `id_ordine` varchar(30) NOT NULL,
  `data_ricezione` datetime DEFAULT NULL,
  `data_evasione` datetime DEFAULT NULL,
  `id_cliente` varchar(30) DEFAULT NULL,
  `spese_trasporto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordini`
--

INSERT INTO `ordini` (`id_ordine`, `data_ricezione`, `data_evasione`, `id_cliente`, `spese_trasporto`) VALUES
('O01', '2023-01-15 00:00:00', '2023-01-20 00:00:00', 'C01', 10.00),
('O02', '2023-02-10 00:00:00', '2023-02-15 00:00:00', 'C02', 15.00),
('O03', '2023-03-05 00:00:00', '2023-03-10 00:00:00', 'C03', 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `prodotti`
--

CREATE TABLE `prodotti` (
  `id_prodotto` varchar(30) NOT NULL,
  `nome_prodotto` varchar(30) NOT NULL,
  `id_categoria` varchar(30) DEFAULT NULL,
  `id_fornitore` varchar(30) DEFAULT NULL,
  `prezzo_acquisto` decimal(10,2) NOT NULL,
  `prezzo_vendita` decimal(10,2) NOT NULL,
  `giacenza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodotti`
--

INSERT INTO `prodotti` (`id_prodotto`, `nome_prodotto`, `id_categoria`, `id_fornitore`, `prezzo_acquisto`, `prezzo_vendita`, `giacenza`) VALUES
('P01', 'Smartphone X', 'CAT1', 'F01', 300.00, 500.00, 100),
('P35', 'Maglietta Uomo', 'CAT2', 'F02', 10.00, 25.00, 200),
('P41', 'Pasta di Gragnano', 'CAT3', 'F03', 1.50, 3.00, 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `n_telefono` (`n_telefono`);

--
-- Indexes for table `dettagli_ordini`
--
ALTER TABLE `dettagli_ordini`
  ADD PRIMARY KEY (`id_ordine`,`id_prodotto`),
  ADD KEY `id_prodotto` (`id_prodotto`);

--
-- Indexes for table `fornitori`
--
ALTER TABLE `fornitori`
  ADD PRIMARY KEY (`id_fornitore`),
  ADD UNIQUE KEY `n_telefono` (`n_telefono`);

--
-- Indexes for table `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`id_ordine`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id_prodotto`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_fornitore` (`id_fornitore`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dettagli_ordini`
--
ALTER TABLE `dettagli_ordini`
  ADD CONSTRAINT `dettagli_ordini_ibfk_1` FOREIGN KEY (`id_ordine`) REFERENCES `ordini` (`id_ordine`),
  ADD CONSTRAINT `dettagli_ordini_ibfk_2` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotti` (`id_prodotto`);

--
-- Constraints for table `ordini`
--
ALTER TABLE `ordini`
  ADD CONSTRAINT `ordini_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clienti` (`id_cliente`);

--
-- Constraints for table `prodotti`
--
ALTER TABLE `prodotti`
  ADD CONSTRAINT `prodotti_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorie` (`id_categoria`),
  ADD CONSTRAINT `prodotti_ibfk_2` FOREIGN KEY (`id_fornitore`) REFERENCES `fornitori` (`id_fornitore`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;