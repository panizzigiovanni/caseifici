-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 02, 2024 alle 15:26
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caseifici`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `caseifici`
--

CREATE TABLE `caseifici` (
  `cas_Id` int(4) NOT NULL,
  `cas_NomeCaseificio` varchar(20) NOT NULL,
  `cas_Indirizzo` varchar(30) NOT NULL,
  `cas_NomeTitolare` varchar(30) NOT NULL,
  `cas_Des` varchar(160) NOT NULL,
  `cas_NumTel` varchar(12) NOT NULL,
  `cas_pro_Id` int(3) NOT NULL,
  `cas_ut_Id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `clienti`
--

CREATE TABLE `clienti` (
  `cli_Id` int(3) NOT NULL,
  `cli_Nome` varchar(30) NOT NULL,
  `cli_Tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `forme`
--

CREATE TABLE `forme` (
  `for_Id` int(10) NOT NULL,
  `for_DataProduzione` date NOT NULL,
  `for_Venduta` tinyint(1) NOT NULL,
  `for_Progressivo` int(5) NOT NULL,
  `for_Stagionatura` varchar(8) NOT NULL,
  `for_Scelta` tinyint(1) NOT NULL,
  `for_cas_Id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `fotografie`
--

CREATE TABLE `fotografie` (
  `fot_Id` int(9) NOT NULL,
  `fot_Percorso` varchar(255) NOT NULL,
  `fot_cas_Id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `giornatelav`
--

CREATE TABLE `giornatelav` (
  `gioLav_Id` int(11) NOT NULL,
  `gioLav_date` date NOT NULL,
  `gioLav_LatteLavo` int(4) NOT NULL,
  `gioLav_LatteFormag` int(4) NOT NULL,
  `gioLav_QuaPro` int(3) NOT NULL,
  `gioLav_QuaVend` int(4) NOT NULL,
  `gioLav_cas_Id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `province`
--

CREATE TABLE `province` (
  `pro_Id` int(3) NOT NULL,
  `pro_Sigla` varchar(2) NOT NULL,
  `pro_Regione` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `ut_Id` int(5) NOT NULL,
  `ut_username` varchar(30) NOT NULL,
  `ut_password` varchar(255) NOT NULL,
  `ut_nome` varchar(20) NOT NULL,
  `ut_cognome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `vendite`
--

CREATE TABLE `vendite` (
  `ven_Id` int(10) NOT NULL,
  `ven_Data` date NOT NULL,
  `ven_for_Id` int(10) NOT NULL,
  `ven_cli_Id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `caseifici`
--
ALTER TABLE `caseifici`
  ADD PRIMARY KEY (`cas_Id`);

--
-- Indici per le tabelle `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`cli_Id`);

--
-- Indici per le tabelle `forme`
--
ALTER TABLE `forme`
  ADD PRIMARY KEY (`for_Id`);

--
-- Indici per le tabelle `fotografie`
--
ALTER TABLE `fotografie`
  ADD PRIMARY KEY (`fot_Id`);

--
-- Indici per le tabelle `giornatelav`
--
ALTER TABLE `giornatelav`
  ADD PRIMARY KEY (`gioLav_Id`);

--
-- Indici per le tabelle `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`pro_Id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`ut_Id`);

--
-- Indici per le tabelle `vendite`
--
ALTER TABLE `vendite`
  ADD PRIMARY KEY (`ven_Id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `caseifici`
--
ALTER TABLE `caseifici`
  MODIFY `cas_Id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `clienti`
--
ALTER TABLE `clienti`
  MODIFY `cli_Id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `forme`
--
ALTER TABLE `forme`
  MODIFY `for_Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `fotografie`
--
ALTER TABLE `fotografie`
  MODIFY `fot_Id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `giornatelav`
--
ALTER TABLE `giornatelav`
  MODIFY `gioLav_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `province`
--
ALTER TABLE `province`
  MODIFY `pro_Id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ut_Id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `vendite`
--
ALTER TABLE `vendite`
  MODIFY `ven_Id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
