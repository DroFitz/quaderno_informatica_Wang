-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2025 at 10:06 PM
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
-- Database: agenzia marittima
--

-- --------------------------------------------------------

--
-- Table structure for table associazione
--

CREATE TABLE associazione (
  ID_Porti varchar(20) DEFAULT NULL,
  Bandiera varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table associazione
--

INSERT INTO associazione (ID_Porti, Bandiera) VALUES
('PT001', 'ITA001'),
('PT002', 'USA001'),
('PT003', 'CH001');

-- --------------------------------------------------------

--
-- Table structure for table cliente
--

CREATE TABLE cliente (
  ID_Cliente varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table cliente
--

INSERT INTO cliente (ID_Cliente) VALUES
('C001'),
('C002'),
('C003');

-- --------------------------------------------------------

--
-- Table structure for table effetuazione
--

CREATE TABLE effetuazione (
  Sigla varchar(20) DEFAULT NULL,
  Bandiera varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table effetuazione
--

INSERT INTO effetuazione (Sigla, Bandiera) VALUES
('S001', 'ITA001'),
('S002', 'USA001'),
('S003', 'CH001');

-- --------------------------------------------------------

--
-- Table structure for table fornitore
--

CREATE TABLE fornitore (
  ID_Fornitore varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table fornitore
--

INSERT INTO fornitore (ID_Fornitore) VALUES
('F001'),
('F002'),
('F003');

-- --------------------------------------------------------

--
-- Table structure for table merce
--

CREATE TABLE merce (
  ID_Merce varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table merce
--

INSERT INTO merce (ID_Merce) VALUES
('M001'),
('M002'),
('M003');

-- --------------------------------------------------------

--
-- Table structure for table navi
--

CREATE TABLE navi (
  Bandiera varchar(20) NOT NULL,
  Nome_Capitano char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table navi
--

INSERT INTO navi (Bandiera, Nome_Capitano) VALUES
('CH001', 'Steve'),
('ITA001', 'Mario Rossi'),
('USA001', 'Whitebeard');

-- --------------------------------------------------------

--
-- Table structure for table polizze_di_carico
--

CREATE TABLE polizze_di_carico (
  Codice_Alfanumerico varchar(20) NOT NULL,
  Tipo_Merce char(20) DEFAULT NULL,
  Tipo_Colli char(20) DEFAULT NULL,
  Numero_Colli int(10) DEFAULT NULL,
  Peso_Totale int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table polizze_di_carico
--

INSERT INTO polizze_di_carico (Codice_Alfanumerico, Tipo_Merce, Tipo_Colli, Numero_Colli, Peso_Totale) VALUES
('PZC001', 'Alimentare', 'Scatole', 50, 500),
('PZC002', 'Elettronica', 'Container', 10, 3000),
('PZC003', 'Abbigliamento', 'Pallet', 25, 1200);

-- --------------------------------------------------------

--
-- Table structure for table porti
--

CREATE TABLE porti (
  ID_Porti varchar(10) NOT NULL,
  Porto_Partenza char(20) DEFAULT NULL,
  Porto_Arrivo char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table porti
--

INSERT INTO porti (ID_Porti, Porto_Partenza, Porto_Arrivo) VALUES
('PT001', 'Genova', 'New York'),
('PT002', 'Torino', 'Cina'),
('PT003', 'Los Angeles', 'Singapore');

-- --------------------------------------------------------

--
-- Table structure for table ritiro
--

CREATE TABLE ritiro (
  ID_Cliente varchar(20) DEFAULT NULL,
  ID_Merce varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table ritiro
--

INSERT INTO ritiro (ID_Cliente, ID_Merce) VALUES
('C001', 'M001'),
('C002', 'M002'),
('C003', 'M003');

-- --------------------------------------------------------

--
-- Table structure for table spedizione
--

CREATE TABLE spedizione (
  ID_Fornitore varchar(20) DEFAULT NULL,
  ID_Merce varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table spedizione
--

INSERT INTO spedizione (ID_Fornitore, ID_Merce) VALUES
('F001', 'M001'),
('F002', 'M002'),
('F003', 'M003');

-- --------------------------------------------------------

--
-- Table structure for table trasporto
--

CREATE TABLE trasporto (
  ID_Merce varchar(20) DEFAULT NULL,
  Bandiera varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table trasporto
--

INSERT INTO trasporto (ID_Merce, Bandiera) VALUES
('M001', 'ITA001'),
('M002', 'USA001'),
('M003', 'CH001');

-- --------------------------------------------------------

--
-- Table structure for table viaggi
--

CREATE TABLE viaggi (
  Sigla varchar(20) NOT NULL,
  Data_Partenza date DEFAULT NULL,
  Data_Arrivo date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table viaggi
--

INSERT INTO viaggi (Sigla, Data_Partenza, Data_Arrivo) VALUES
('S001', '2025-01-01', '2025-01-31'),
('S002', '2025-02-01', '0000-00-00'),
('S003', '2025-03-01', '2025-03-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table associazione
--
ALTER TABLE associazione
  ADD KEY ID_Porti (ID_Porti),
  ADD KEY Bandiera (Bandiera);

--
-- Indexes for table cliente
--
ALTER TABLE cliente
  ADD PRIMARY KEY (ID_Cliente);

--
-- Indexes for table effetuazione
--
ALTER TABLE effetuazione
  ADD KEY Sigla (Sigla),
  ADD KEY Bandiera (Bandiera);

--
-- Indexes for table fornitore
--
ALTER TABLE fornitore
  ADD PRIMARY KEY (ID_Fornitore);

--
-- Indexes for table merce
--
ALTER TABLE merce
  ADD PRIMARY KEY (ID_Merce);

--
-- Indexes for table navi
--
ALTER TABLE navi
  ADD PRIMARY KEY (Bandiera);

--
-- Indexes for table polizze_di_carico
--
ALTER TABLE polizze_di_carico
  ADD PRIMARY KEY (Codice_Alfanumerico);

--
-- Indexes for table porti
--
ALTER TABLE porti
  ADD PRIMARY KEY (ID_Porti);

--
-- Indexes for table ritiro
--
ALTER TABLE ritiro
  ADD KEY ID_Cliente (ID_Cliente),
  ADD KEY ID_Merce (ID_Merce);

--
-- Indexes for table spedizione
--
ALTER TABLE spedizione
  ADD KEY ID_Fornitore (ID_Fornitore),
  ADD KEY ID_Merce (ID_Merce);

--
-- Indexes for table trasporto
--
ALTER TABLE trasporto
  ADD KEY ID_Merce (ID_Merce),
  ADD KEY Bandiera (Bandiera);

--
-- Indexes for table viaggi
--
ALTER TABLE viaggi
  ADD PRIMARY KEY (Sigla);

--
-- Constraints for dumped tables
--

--
-- Constraints for table associazione
--
ALTER TABLE associazione
  ADD CONSTRAINT associazione_ibfk_1 FOREIGN KEY (ID_Porti) REFERENCES porti (ID_Porti),
  ADD CONSTRAINT associazione_ibfk_2 FOREIGN KEY (Bandiera) REFERENCES navi (Bandiera);

--
-- Constraints for table effetuazione
--
ALTER TABLE effetuazione
  ADD CONSTRAINT effetuazione_ibfk_1 FOREIGN KEY (Sigla) REFERENCES viaggi (Sigla),
  ADD CONSTRAINT effetuazione_ibfk_2 FOREIGN KEY (Bandiera) REFERENCES navi (Bandiera);

--
-- Constraints for table ritiro
--
ALTER TABLE ritiro
  ADD CONSTRAINT ritiro_ibfk_1 FOREIGN KEY (ID_Cliente) REFERENCES cliente (ID_Cliente),
  ADD CONSTRAINT ritiro_ibfk_2 FOREIGN KEY (ID_Merce) REFERENCES merce (ID_Merce);

--
-- Constraints for table spedizione
--
ALTER TABLE spedizione
  ADD CONSTRAINT spedizione_ibfk_1 FOREIGN KEY (ID_Fornitore) REFERENCES fornitore (ID_Fornitore),
  ADD CONSTRAINT spedizione_ibfk_2 FOREIGN KEY (ID_Merce) REFERENCES merce (ID_Merce);

--
-- Constraints for table trasporto
--
ALTER TABLE trasporto
  ADD CONSTRAINT trasporto_ibfk_1 FOREIGN KEY (ID_Merce) REFERENCES merce (ID_Merce),
  ADD CONSTRAINT trasporto_ibfk_2 FOREIGN KEY (Bandiera) REFERENCES navi (Bandiera);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
agenzia_marittima.sql
Visualizzazione di agenzia_marittima.sql.
