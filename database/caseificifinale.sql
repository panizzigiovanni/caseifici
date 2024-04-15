-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 15, 2024 alle 09:30
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caseificifinale`
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
  `cas_ut_Id` int(5) NOT NULL,
  `cas_linkGoogleMaps` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `caseifici`
--

INSERT INTO `caseifici` (`cas_Id`, `cas_NomeCaseificio`, `cas_Indirizzo`, `cas_NomeTitolare`, `cas_Des`, `cas_NumTel`, `cas_pro_Id`, `cas_ut_Id`, `cas_linkGoogleMaps`) VALUES
(1, 'Caseificio Uno', 'Via Roma 1', 'Giovanni Rossi', 'Produzione di formaggi tradizionali', '1234567890', 1, 1, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d92686.69005986216!2d12.211414044472207!3d43.45101236686142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132c6d225e6c6ba7%3A0xfa1009fa38bf3aa7!2sCaseificio%20%22I%20formaggi%20di%20Candeggio%22!5'),
(2, 'Caseificio Due', 'Via Milano 2', 'Paola Bianchi', 'Specializzato in formaggi freschi', '0987654321', 2, 2, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d185763.56137479626!2d12.141827567415769!3d43.32356058768476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132ea8e73695ef83%3A0x78e5ab4e43f50ab1!2sEredi%20Sotgia%20Antonio%20Raimondo!'),
(3, 'Caseificio Tre', 'Via Napoli 3', 'Luigi Ferrari', 'Produce formaggi a latte crudo', '1029384756', 3, 3, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d374562.70257873886!2d11.225043134282489!3d42.82488661235908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13292fd1c3014809%3A0x63a3ed7a669664cd!2sFattorie%20Di%20Maremma%20Srl!5e0!3m2!1sit!2sit!4'),
(4, 'Caseificio Quattro', 'Via Firenze 4', 'Giorgia Rizzo', 'Caseificio biologico con produzione sostenibile', '6758493021', 4, 4, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d371256.0855205212!2d11.66307537258501!3d43.36786143303747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132be392b8348f59%3A0xa86a39aaeba835d7!2sCaseificio%20Matteassi%20Onelio%20S.%20R.%20L.!5e0!'),
(5, 'Caseificio Cinque', 'Via Torino 5', 'Giacomo Conti', 'Ampia varietà di formaggi stagionati', '3749201586', 5, 5, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d371756.57842110615!2d12.16307404442788!3d43.28602781185388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132c34441fc3a6cb%3A0xbbf45acb6dd14ff5!2sCaseificio%20Facchini!5e0!3m2!1sit!2sit!4v17131631'),
(6, 'Caseificio Sei', 'Via Venezia 6', 'Alberto Rossi', 'Caseificio specializzato nella produzione di formaggi freschi', '1234567890', 6, 6, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d369693.1051388622!2d12.168654616592532!3d43.6226261124017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132cfbf1e15347f9%3A0x8b2ce7b12668d6af!2sCaseificio%20Val%20D&#39;Apsa!5e0!3m2!1sit!2sit!4v1'),
(7, 'Caseificio Sette', 'Via Palermo 7', 'Paolo Bianchi', 'Caseificio artigianale che produce formaggi tradizionali', '0987654321', 7, 7, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1470606.4255001296!2d10.437637871959955!3d43.953610312937734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132cbf2d40302235%3A0x755f2440c520b3d8!2sCaseificio%20Pascoli!5e0!3m2!1sit!2sit!4v1713163'),
(8, 'Caseificio Otto', 'Via Genova 8', 'Giovanna Russo', 'Caseificio familiare con una vasta gamma di formaggi stagionati', '1029384756', 8, 8, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d744158.681456845!2d11.4038438675718!3d43.23318834938725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13294247b6d32477%3A0xf9dc51228dfc9cfe!2sCaseificio%20Val%20D&#39;Orcia!5e0!3m2!1sit!2sit!4v17'),
(9, 'Caseificio Nove', 'Via Bologna 9', 'Giulio Galli', 'Caseificio biologico certificato che produce formaggi a latte crudo', '6758493021', 9, 9, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d371672.93896751746!2d11.653043457489787!3d43.29971199840529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13295d5d973b06df%3A0x44048ddf55207fe7!2sCaseificio%20Pienza%20Solp!5e0!3m2!1sit!2sit!4v17'),
(10, 'Caseificio Dieci', 'Via Trieste 10', 'Laura Moretti', 'Caseificio innovativo con formaggi gourmet', '3749201586', 10, 10, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d185255.96026823102!2d11.809352223392164!3d43.489308712744595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132bed5f05cf01e5%3A0xfcdd1aaf9ec43fae!2sCaseificio%20Aretino!5e0!3m2!1sit!2sit!4v1713163'),
(11, 'Caseificio Undici', 'Via Trento 11', 'Giovanni Ferri', 'Produzione di formaggi locali di alta qualità', '1234567890', 11, 11, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d627710.2270892092!2d11.12230989514277!3d44.29106229756376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477fd358be6d78bb%3A0xa01551c781ef3a07!2sCaseificio%20Le%20Delizie%20Bufala%20%26%20passione'),
(12, 'Caseificio Dodici', 'Via Pisa 12', 'Simona Martini', 'Specialità di formaggi freschi e stagionati', '0987654321', 12, 12, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d371718.9670668247!2d11.63628995030165!3d43.29218180579247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132967a7599765c9%3A0xb1000cdf95b92649!2sCaseificio%20Di%20Mario!5e0!3m2!1sit!2sit!4v1713163'),
(13, 'Caseificio Tredici', 'Via Lecce 13', 'Davide Gallo', 'Caseificio che produce formaggi tipici della regione', '1029384756', 13, 13, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d743494.6853888188!2d11.407373645783904!3d43.287539032385745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13295c2cfc5c65ff%3A0x3f40f8372c743598!2sCaseificio%20Cugusi%20Silvana%20%26%'),
(14, 'Caseificio Quattordi', 'Via Agrigento 14', 'Sara Fabbri', 'Produzione artigianale di formaggi di montagna', '6758493021', 14, 14, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d744463.0836027615!2d11.30714901293786!3d43.208253501223766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13296d05431fff59%3A0xd90e5eb06e10e725!2sCaseificio%20Seggiano!5e0!3m2!1sit!2sit!4v17131637'),
(15, 'Caseificio Quindici', 'Via Bolzano 15', 'Matteo Rossini', 'Caseificio con specialità regionali e stagionature uniche', '3749201586', 15, 15, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d747449.2258412825!2d11.646175586078378!3d42.963030079167815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132efb6efab53c2d%3A0xfb914cdb8adb56dd!2sCaseificio%20Brufani%20Ubaldo%20Terni!5e0!3m2!1si');

-- --------------------------------------------------------

--
-- Struttura della tabella `clienti`
--

CREATE TABLE `clienti` (
  `cli_Id` int(3) NOT NULL,
  `cli_Nome` varchar(30) NOT NULL,
  `cli_Tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `clienti`
--

INSERT INTO `clienti` (`cli_Id`, `cli_Nome`, `cli_Tipo`) VALUES
(1, 'Negozio del Formaggio', 'Negozio specializzat'),
(2, 'Supermercato Freschi & Co.', 'Supermercato'),
(3, 'Ristorante La Cantina', 'Ristorante'),
(4, 'Locanda del Borgo', 'Ristorante'),
(5, 'Casa della Mozzarella', 'Caseificio e vendita'),
(6, 'Alimentari Da Maria', 'Alimentari'),
(7, 'Emporio del Gusto', 'Negozio di alimentar'),
(8, 'Ristorante Al Bosco', 'Ristorante'),
(9, 'Gastronomia Alpina', 'Gastronomia e negozi'),
(10, 'Trattoria del Borgo', 'Trattoria'),
(11, 'Cooperativa Agricola Terra Ver', 'Cooperativa agricola'),
(12, 'Salumeria da Giovanni', 'Salumeria e alimenta'),
(13, 'La Bottega del Gusto', 'Negozio di alimentar'),
(14, 'Osteria dei Sapori', 'Osteria e vendita di'),
(15, 'Supermercato Bio Terra', 'Supermercato special');

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

--
-- Dump dei dati per la tabella `forme`
--

INSERT INTO `forme` (`for_Id`, `for_DataProduzione`, `for_Venduta`, `for_Progressivo`, `for_Stagionatura`, `for_Scelta`, `for_cas_Id`) VALUES
(1, '2024-03-01', 1, 1001, '12', 0, 1),
(2, '2024-03-02', 1, 1002, '16', 1, 2),
(3, '2024-03-03', 1, 1003, '24', 1, 3),
(4, '2024-03-04', 1, 1004, '16', 1, 4),
(5, '2024-03-05', 1, 1005, '24', 1, 5),
(6, '2024-03-06', 1, 1006, '12', 1, 6),
(7, '2024-03-07', 1, 1007, '16', 1, 7),
(9, '2024-03-09', 1, 1009, '12', 1, 9),
(11, '2024-03-11', 1, 1011, '12', 1, 11),
(12, '2024-03-12', 1, 1012, '24', 1, 12),
(13, '2024-03-13', 1, 1013, '12', 1, 13),
(14, '2024-03-14', 1, 1014, '24', 1, 14),
(15, '2024-03-15', 1, 1015, '12', 1, 15),
(30, '2024-04-12', 1, 0, '12', 1, 1),
(31, '2024-04-12', 1, 1, '24', 1, 1),
(33, '2024-04-12', 1, 3, '36', 1, 1),
(34, '2024-04-12', 1, 4, '36', 1, 1),
(35, '2024-04-13', 0, 4, '12', 1, 1),
(36, '2024-04-13', 1, 5, '12', 1, 1),
(37, '2024-04-13', 1, 6, '12', 1, 1),
(38, '2024-04-13', 1, 7, '12', 1, 1),
(39, '2024-04-13', 0, 8, '12', 0, 1),
(40, '2024-04-13', 1, 9, '24', 0, 1),
(41, '2024-04-13', 1, 10, '24', 1, 1),
(42, '2024-04-13', 1, 11, '24', 1, 1),
(44, '2024-04-13', 1, 13, '36', 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `fotografie`
--

CREATE TABLE `fotografie` (
  `fot_Id` int(9) NOT NULL,
  `fot_Percorso` varchar(255) NOT NULL,
  `fot_cas_Id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `fotografie`
--

INSERT INTO `fotografie` (`fot_Id`, `fot_Percorso`, `fot_cas_Id`) VALUES
(1, 'immagini/cas1.jpg', 1),
(2, 'immagini/cas12.jpg', 2),
(3, 'immagini/cas2.jpg', 3),
(4, 'immagini/cas3.jpg', 4),
(5, 'immagini/cas5.jpg', 5),
(6, 'immagini/cas4.jpg', 6),
(7, 'immagini/cas8.jpg', 7),
(8, 'immagini/cas7.jpg', 8),
(9, 'immagini/cas6.jpg', 9),
(10, 'immagini/cas11.jpg', 10),
(11, 'immagini/cas9.jpeg', 11),
(12, 'immagini/cas10.jpg', 12),
(13, 'immagini/cas15.jpg', 13),
(14, 'immagini/cas13.jpg', 14),
(15, 'immagini/cas16.jpg', 15);

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

--
-- Dump dei dati per la tabella `giornatelav`
--

INSERT INTO `giornatelav` (`gioLav_Id`, `gioLav_date`, `gioLav_LatteLavo`, `gioLav_LatteFormag`, `gioLav_QuaPro`, `gioLav_QuaVend`, `gioLav_cas_Id`) VALUES
(2, '2024-03-02', 1200, 600, 250, 350, 2),
(3, '2024-03-03', 1100, 550, 210, 320, 3),
(4, '2024-03-04', 1050, 520, 220, 330, 4),
(5, '2024-03-05', 1250, 630, 240, 360, 5),
(6, '2024-03-06', 1300, 650, 260, 380, 6),
(7, '2024-03-07', 1150, 575, 230, 340, 7),
(8, '2024-03-08', 1180, 590, 235, 345, 8),
(9, '2024-03-09', 1220, 610, 245, 355, 9),
(10, '2024-03-10', 1120, 560, 225, 335, 10),
(11, '2024-03-11', 1140, 570, 228, 338, 11),
(12, '2024-03-12', 1080, 540, 220, 330, 12),
(13, '2024-03-13', 1280, 640, 250, 350, 13),
(14, '2024-03-14', 1070, 535, 215, 325, 14),
(15, '2024-03-15', 1350, 675, 270, 405, 15),
(36, '2024-04-13', 100, 80, 10, 4, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `province`
--

CREATE TABLE `province` (
  `pro_Id` int(3) NOT NULL,
  `pro_Sigla` varchar(2) NOT NULL,
  `pro_Regione` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `province`
--

INSERT INTO `province` (`pro_Id`, `pro_Sigla`, `pro_Regione`) VALUES
(1, 'TO', 'Piemonte'),
(2, 'MI', 'Lombardia'),
(3, 'NA', 'Campania'),
(4, 'FI', 'Toscana'),
(5, 'RM', 'Lazio'),
(6, 'CA', 'Sardegna'),
(7, 'VE', 'Veneto'),
(8, 'PA', 'Sicilia'),
(9, 'BO', 'Emilia-Romagna'),
(10, 'NU', 'Puglia'),
(11, 'AN', 'Marche'),
(12, 'PE', 'Abruzzo'),
(13, 'AO', 'Valle d\'Aosta'),
(14, 'SI', 'Toscana'),
(15, 'TN', 'Trentino-Alto Adige');

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

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`ut_Id`, `ut_username`, `ut_password`, `ut_nome`, `ut_cognome`) VALUES
(1, 'user1', 'password1', 'Mario', 'Rossi'),
(2, 'user2', 'password2', 'Luca', 'Bianchi'),
(3, 'user3', 'password3', 'Giulia', 'Ferrari'),
(4, 'user4', 'password4', 'Alessia', 'Rizzo'),
(5, 'user5', 'password5', 'Marco', 'Conti'),
(6, 'user6', 'password6', 'Giorgio', 'Verdi'),
(7, 'user7', 'password7', 'Anna', 'Bianchi'),
(8, 'user8', 'password8', 'Francesca', 'Russo'),
(9, 'user9', 'password9', 'Roberto', 'Galli'),
(10, 'user10', 'password10', 'Laura', 'Moretti'),
(11, 'user11', 'password11', 'Giovanni', 'Ferri'),
(12, 'user12', 'password12', 'Simona', 'Martini'),
(13, 'user13', 'password13', 'Davide', 'Gallo'),
(14, 'user14', 'password14', 'Sara', 'Fabbri'),
(15, 'user15', 'password15', 'Matteo', 'Rossini');

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
-- Dump dei dati per la tabella `vendite`
--

INSERT INTO `vendite` (`ven_Id`, `ven_Data`, `ven_for_Id`, `ven_cli_Id`) VALUES
(1, '2024-04-12', 1, 1),
(2, '2024-03-02', 2, 2),
(3, '2024-03-03', 3, 3),
(4, '2024-03-04', 4, 4),
(5, '2024-03-05', 5, 5),
(6, '2024-03-06', 6, 6),
(7, '2024-03-07', 7, 7),
(11, '2024-03-11', 11, 11),
(12, '2024-03-12', 12, 12),
(13, '2024-03-13', 13, 13),
(14, '2024-03-14', 14, 14),
(15, '2024-03-15', 15, 15),
(16, '2024-04-13', 30, 1),
(17, '2024-04-13', 31, 1),
(18, '2024-04-13', 33, 2),
(19, '2024-04-13', 34, 3),
(20, '2024-04-13', 37, 13),
(21, '2024-04-13', 42, 13),
(22, '2024-04-13', 44, 13),
(23, '2024-04-13', 38, 8),
(24, '2024-04-13', 41, 8),
(25, '2024-04-15', 36, 13),
(26, '2024-04-15', 40, 13);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `caseifici`
--
ALTER TABLE `caseifici`
  ADD PRIMARY KEY (`cas_Id`),
  ADD KEY `fk_cas_pro_Id` (`cas_pro_Id`),
  ADD KEY `cas_ut_Id` (`cas_ut_Id`);

--
-- Indici per le tabelle `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`cli_Id`);

--
-- Indici per le tabelle `forme`
--
ALTER TABLE `forme`
  ADD PRIMARY KEY (`for_Id`),
  ADD KEY `fk_for_cas_Id` (`for_cas_Id`);

--
-- Indici per le tabelle `fotografie`
--
ALTER TABLE `fotografie`
  ADD PRIMARY KEY (`fot_Id`),
  ADD KEY `fk_fot_cas_Id` (`fot_cas_Id`);

--
-- Indici per le tabelle `giornatelav`
--
ALTER TABLE `giornatelav`
  ADD PRIMARY KEY (`gioLav_Id`),
  ADD KEY `fk_gioLav_cas_Id` (`gioLav_cas_Id`);

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
  ADD PRIMARY KEY (`ven_Id`),
  ADD KEY `fk_ven_cli_Id` (`ven_cli_Id`),
  ADD KEY `fk_ven_for_Id` (`ven_for_Id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `caseifici`
--
ALTER TABLE `caseifici`
  MODIFY `cas_Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `clienti`
--
ALTER TABLE `clienti`
  MODIFY `cli_Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `forme`
--
ALTER TABLE `forme`
  MODIFY `for_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT per la tabella `fotografie`
--
ALTER TABLE `fotografie`
  MODIFY `fot_Id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `giornatelav`
--
ALTER TABLE `giornatelav`
  MODIFY `gioLav_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT per la tabella `province`
--
ALTER TABLE `province`
  MODIFY `pro_Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ut_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `vendite`
--
ALTER TABLE `vendite`
  MODIFY `ven_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `caseifici`
--
ALTER TABLE `caseifici`
  ADD CONSTRAINT `caseifici_ibfk_1` FOREIGN KEY (`cas_ut_Id`) REFERENCES `utenti` (`ut_Id`),
  ADD CONSTRAINT `fk_cas_pro_Id` FOREIGN KEY (`cas_pro_Id`) REFERENCES `province` (`pro_Id`);

--
-- Limiti per la tabella `forme`
--
ALTER TABLE `forme`
  ADD CONSTRAINT `fk_for_cas_Id` FOREIGN KEY (`for_cas_Id`) REFERENCES `caseifici` (`cas_Id`);

--
-- Limiti per la tabella `fotografie`
--
ALTER TABLE `fotografie`
  ADD CONSTRAINT `fk_fot_cas_Id` FOREIGN KEY (`fot_cas_Id`) REFERENCES `caseifici` (`cas_Id`);

--
-- Limiti per la tabella `giornatelav`
--
ALTER TABLE `giornatelav`
  ADD CONSTRAINT `fk_gioLav_cas_Id` FOREIGN KEY (`gioLav_cas_Id`) REFERENCES `caseifici` (`cas_Id`);

--
-- Limiti per la tabella `vendite`
--
ALTER TABLE `vendite`
  ADD CONSTRAINT `fk_ven_cli_Id` FOREIGN KEY (`ven_cli_Id`) REFERENCES `clienti` (`cli_Id`),
  ADD CONSTRAINT `fk_ven_for_Id` FOREIGN KEY (`ven_for_Id`) REFERENCES `forme` (`for_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
