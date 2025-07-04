-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: tippspiel_mariadb
-- Erstellungszeit: 04. Jul 2025 um 17:06
-- Server-Version: 10.11.13-MariaDB-ubu2204
-- PHP-Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `tippspiel`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mannschaft`
--

CREATE TABLE `mannschaft` (
  `Mid` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Abkuerzung` varchar(255) NOT NULL,
  `Bild` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `mannschaft`
--

INSERT INTO `mannschaft` (`Mid`, `Name`, `Abkuerzung`, `Bild`) VALUES
(0, '-', '-', 'non.png'),
(1, 'Flames of Pils', 'FoP', 'fop.svg'),
(2, 'WD-40', 'WD-40', 'wd40.svg'),
(3, 'Lange Garde', 'LG', 'langegarde.png'),
(4, 'Kulowminati', 'KM', 'kulowminati.svg'),
(5, 'Kocina-Kulow', 'KK', 'kocinakulow.png'),
(6, 'Kulow Section', 'KS', 'kulowsection.png'),
(7, 'Gut Kickerz', 'GK', 'gutkickerz.svg'),
(8, 'Die Feiglinge', 'DFG', 'feiglinge.png'),
(9, 'Dorftrottel', 'DT', 'dt.svg'),
(10, 'Grüne Garde', 'GG', 'gruene_garde.svg'),
(11, 'Bottles', 'BTS', 'bottles.svg'),
(12, 'Club der Einfallslosen', 'CDE', 'club_der_einfallslosen.svg'),
(13, 'Club ohne Namen', 'CON', 'con.svg'),
(14, 'Company of Kulow', 'COK', 'cok.svg'),
(15, 'Commodors', 'COM', 'commodors.svg'),
(16, 'Crackers', 'CRK', 'crackers.svg'),
(17, 'Die Anderen', 'AND', 'die_anderen.svg'),
(18, 'Die immer Blauen', 'DIB', 'dib.svg'),
(19, 'Die Kurzen', 'DK', 'dk.svg'),
(20, 'Deutsch Sorbische Fraktion', 'DSF', 'dsf.svg'),
(21, 'Gewerkschaft', 'GW', 'gewerkschaft.svg'),
(22, 'KDB', 'KDB', 'kdb.svg'),
(23, 'Kingston Club', 'KC', 'kingston_club.svg'),
(24, 'Kombinat', 'KBN', 'kombinat.svg'),
(25, 'Kopflos e.Vau', 'Kopflos', 'kopflos.svg'),
(26, 'Kulow Angels', 'K. Angels', 'kulow_angels.svg'),
(27, 'Kulow Chaos', 'KCH', 'kulow_chaos.svg'),
(28, 'RC Ungelenk', 'RC', 'rcungelenk.svg'),
(29, 'Smarties', 'SMT', 'smarties.svg'),
(30, 'Smofojs', 'SMF', 'smofojs.svg'),
(31, 'UCT', 'UCT', 'uct.svg'),
(32, 'Iwans', 'IW', 'iwans.png'),
(33, 'JC Dörgenhausen', 'JCD', 'jcd.png'),
(34, 'Söffner', 'SOE', 'soeffner.png'),
(35, 'Mountains Club Bergen', 'MC Bergen', 'mcb.png'),
(36, 'Rote Funken', 'RF', 'rf.svg'),
(37, 'Oberschule Wittichenau', 'OS Witt.', 'osw.png'),
(38, 'JC Schwarzkolm', 'JCS', 'jcschwarzkolm.png'),
(39, 'Scheune', 'SNE', 'scheune.png'),
(40, 'Feiglinge x Flames of Pils', 'FXF', 'fxf.png');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spiel`
--

CREATE TABLE `spiel` (
  `Spielid` int(11) NOT NULL,
  `Phase` varchar(4) NOT NULL,
  `ToreA` int(4) DEFAULT NULL,
  `ToreB` int(4) DEFAULT NULL,
  `MA` int(11) DEFAULT NULL,
  `MB` int(11) DEFAULT NULL,
  `Feld` int(4) DEFAULT NULL,
  `Tunier` int(11) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT 0,
  `Uhrzeit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `spiel`
--

INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB`, `Feld`, `Tunier`, `Status`, `Uhrzeit`) VALUES
(1, 'A', 0, 2, 37, 33, 1, 36, 2, '2024-06-15 12:00:00'),
(2, 'B', 2, 0, 1, 36, 2, 36, 2, '2024-06-15 12:00:00'),
(3, 'A', 3, 1, 10, 8, 1, 36, 2, '2024-06-15 12:17:00'),
(4, 'B', 1, 4, 5, 6, 2, 36, 2, '2024-06-15 12:17:00'),
(5, 'A', 2, 1, 33, 3, 1, 36, 2, '2024-06-15 12:34:00'),
(6, 'B', 1, 0, 36, 35, 2, 36, 2, '2024-06-15 12:34:00'),
(7, 'A', 2, 0, 8, 37, 1, 36, 2, '2024-06-15 12:51:00'),
(8, 'B', 4, 1, 6, 1, 2, 36, 2, '2024-06-15 12:51:00'),
(9, 'A', 0, 3, 3, 10, 1, 36, 2, '2024-06-15 13:08:00'),
(10, 'B', 1, 3, 35, 5, 2, 36, 2, '2024-06-15 13:08:00'),
(11, 'A', 2, 1, 33, 8, 1, 36, 2, '2024-06-15 13:25:00'),
(12, 'B', 0, 3, 36, 6, 2, 36, 2, '2024-06-15 13:25:00'),
(13, 'A', 2, 1, 3, 37, 1, 36, 2, '2024-06-15 13:42:00'),
(14, 'B', 6, 3, 35, 1, 2, 36, 2, '2024-06-15 13:42:00'),
(15, 'A', 0, 1, 10, 33, 1, 36, 2, '2024-06-15 13:59:00'),
(16, 'B', 2, 1, 5, 36, 2, 36, 2, '2024-06-15 13:59:00'),
(17, 'A', 0, 1, 8, 3, 1, 36, 2, '2024-06-15 14:16:00'),
(18, 'B', 5, 0, 6, 35, 2, 36, 2, '2024-06-15 14:16:00'),
(19, 'A', 0, 4, 37, 10, 1, 36, 2, '2024-06-15 14:33:00'),
(20, 'B', 0, 2, 1, 5, 2, 36, 2, '2024-06-15 14:33:00'),
(21, 'HF', 0, 3, 10, 6, 1, 36, 2, '2024-06-15 15:00:00'),
(22, 'HF', 0, 3, 5, 33, 2, 36, 2, '2024-06-15 15:00:00'),
(23, 'U9', 2, 3, 1, 37, 1, 36, 2, '2024-06-15 15:22:00'),
(24, 'U7', 3, 4, 8, 36, 1, 36, 2, '2024-06-15 15:47:00'),
(25, 'U5', 1, 0, 35, 3, 1, 36, 2, '2024-06-15 16:10:00'),
(26, 'U3', 3, 1, 10, 5, 1, 36, 2, '2024-06-15 16:27:00'),
(27, 'TF', 0, 1, 6, 33, 1, 36, 2, '2024-06-15 16:42:00'),
(28, 'A', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 11:00:00'),
(29, 'B', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 11:00:00'),
(30, 'A', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 11:17:00'),
(31, 'B', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 11:17:00'),
(32, 'A', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 11:34:00'),
(33, 'B', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 11:34:00'),
(34, 'A', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 11:51:00'),
(35, 'B', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 11:51:00'),
(36, 'A', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 12:08:00'),
(37, 'B', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 12:08:00'),
(38, 'A', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 12:25:00'),
(39, 'B', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 12:25:00'),
(40, 'A', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 12:42:00'),
(41, 'B', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 12:42:00'),
(42, 'A', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 12:59:00'),
(43, 'B', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 12:59:00'),
(44, 'A', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 13:16:00'),
(45, 'B', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 13:16:00'),
(46, 'A', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 13:33:00'),
(47, 'B', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 13:33:00'),
(48, 'HF', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 14:00:00'),
(49, 'HF', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 14:00:00'),
(50, 'U9', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 14:22:00'),
(51, 'U7', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 14:47:00'),
(52, 'U5', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 15:10:00'),
(53, 'U3', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 15:27:00'),
(54, 'TF', NULL, NULL, NULL, NULL, NULL, 50, 0, '2025-07-05 15:42:00'),
(55, 'A', 1, 2, 4, 37, 1, 49, 2, '2025-01-04 13:00:00'),
(56, 'B', 2, 5, 14, 5, 2, 49, 2, '2025-01-04 13:00:00'),
(57, 'A', 1, 1, 2, 10, 1, 49, 2, '2025-01-04 13:30:00'),
(58, 'B', 0, 2, 40, 6, 2, 49, 2, '2025-01-04 13:30:00'),
(59, 'A', 0, 0, 37, 2, 1, 49, 2, '2025-01-04 13:40:00'),
(60, 'B', 0, 2, 5, 40, 2, 49, 2, '2025-01-04 13:40:00'),
(61, 'A', 3, 0, 4, 10, 1, 49, 2, '2025-01-04 13:50:00'),
(62, 'B', 0, 2, 14, 6, 2, 49, 2, '2025-01-04 13:50:00'),
(63, 'A', 4, 1, 10, 37, 1, 49, 2, '2025-01-04 14:00:00'),
(64, 'B', 6, 1, 6, 5, 2, 49, 2, '2025-01-04 14:00:00'),
(65, 'A', 0, 2, 2, 4, 1, 49, 2, '2025-01-04 14:10:00'),
(66, 'B', 0, 4, 40, 14, 2, 49, 2, '2025-01-04 14:10:00'),
(67, 'HF', 4, 1, 4, 14, 1, 49, 2, '2025-01-04 14:27:00'),
(68, 'HF', 2, 0, 6, 10, 2, 49, 2, '2025-01-04 14:27:00'),
(69, 'U7', 3, 0, 2, 40, 1, 49, 2, '2025-01-04 14:37:00'),
(70, 'U5', 2, 3, 37, 5, 1, 49, 2, '2025-01-04 14:47:00'),
(71, 'U3', NULL, NULL, 14, 10, 1, 49, 2, '2025-01-04 14:57:00'),
(72, 'TF', NULL, NULL, 4, 6, 1, 49, 2, '2025-01-04 15:07:00'),
(100, 'A', 0, 1, 10, 4, 1, 48, 2, '2024-01-06 12:00:00'),
(101, 'B', 0, 2, 5, 2, 2, 48, 2, '2024-01-06 12:00:00'),
(102, 'A', 1, 3, 3, 10, 1, 48, 2, '2024-01-06 12:17:00'),
(103, 'B', 0, 6, 8, 5, 2, 48, 2, '2024-01-06 12:17:00'),
(104, 'A', 4, 1, 10, 1, 1, 48, 2, '2024-01-06 12:34:00'),
(105, 'B', 1, 0, 5, 6, 2, 48, 2, '2024-01-06 12:34:00'),
(106, 'A', 0, 1, 33, 10, 1, 48, 2, '2024-01-06 12:51:00'),
(107, 'B', 3, 2, 7, 5, 2, 48, 2, '2024-01-06 12:51:00'),
(108, 'A', 0, 5, 1, 4, 1, 48, 2, '2024-01-06 13:08:00'),
(109, 'B', 2, 1, 6, 2, 2, 48, 2, '2024-01-06 13:08:00'),
(110, 'A', 0, 3, 1, 33, 1, 48, 2, '2024-01-06 13:25:00'),
(111, 'B', 1, 2, 6, 7, 2, 48, 2, '2024-01-06 13:25:00'),
(112, 'A', 6, 0, 4, 33, 1, 48, 2, '2024-01-06 13:42:00'),
(113, 'B', 0, 3, 2, 7, 2, 48, 2, '2024-01-06 13:42:00'),
(114, 'A', 7, 1, 4, 3, 1, 48, 2, '2024-01-06 13:59:00'),
(115, 'B', 6, 0, 2, 8, 2, 48, 2, '2024-01-06 13:59:00'),
(116, 'A', 1, 4, 3, 1, 1, 48, 2, '2024-01-06 14:16:00'),
(117, 'B', 3, 7, 8, 6, 2, 48, 2, '2024-01-06 14:16:00'),
(118, 'A', 5, 2, 33, 4, 1, 48, 2, '2024-01-06 14:33:00'),
(119, 'B', 7, 0, 7, 8, 2, 48, 2, '2024-01-06 14:33:00'),
(120, 'HF', 1, 0, 4, 2, 1, 48, 2, '2024-01-06 15:00:00'),
(121, 'HF', 2, 1, 10, 7, 2, 48, 2, '2024-01-06 15:00:00'),
(122, 'U9', 4, 5, 8, 3, 1, 48, 2, '2024-01-06 15:22:00'),
(123, 'U7', 1, 9, 1, 6, 1, 48, 2, '2024-01-06 15:47:00'),
(124, 'U5', 2, 4, 33, 5, 1, 48, 2, '2024-01-06 16:10:00'),
(125, 'U3', 3, 0, 2, 7, 1, 48, 2, '2024-01-06 16:27:00'),
(126, 'TF', 1, 0, 4, 10, 1, 48, 2, '2024-01-06 16:42:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tipp`
--

CREATE TABLE `tipp` (
  `Tippid` int(11) NOT NULL,
  `Spielid` int(11) NOT NULL,
  `Userid` int(11) NOT NULL,
  `ToreA` int(11) NOT NULL,
  `ToreB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tunier`
--

CREATE TABLE `tunier` (
  `Tid` int(11) NOT NULL,
  `Saison` enum('Sommer','Winter') NOT NULL,
  `Jahr` int(11) NOT NULL,
  `Gewinner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `tunier`
--

INSERT INTO `tunier` (`Tid`, `Saison`, `Jahr`, `Gewinner`) VALUES
(1, 'Sommer', 1990, 32),
(2, 'Sommer', 1991, 12),
(3, 'Sommer', 1992, 26),
(4, 'Sommer', 1993, 26),
(5, 'Sommer', 1994, 12),
(6, 'Sommer', 1995, 26),
(7, 'Sommer', 1996, 26),
(8, 'Sommer', 1997, 26),
(9, 'Sommer', 1998, 25),
(10, 'Sommer', 1999, 15),
(11, 'Sommer', 1999, 23),
(12, 'Sommer', 2000, 30),
(13, 'Sommer', 2001, 25),
(14, 'Sommer', 2002, 28),
(15, 'Sommer', 2003, 25),
(16, 'Sommer', 2004, 28),
(17, 'Sommer', 2005, 30),
(18, 'Sommer', 2006, 27),
(19, 'Sommer', 2007, 21),
(20, 'Sommer', 2008, 30),
(21, 'Sommer', 2008, 27),
(22, 'Sommer', 2009, 14),
(23, 'Sommer', 2010, 20),
(24, 'Sommer', 2011, 27),
(25, 'Sommer', 2012, 20),
(26, 'Sommer', 2013, 20),
(27, 'Sommer', 2014, 21),
(28, 'Sommer', 2015, 4),
(29, 'Sommer', 2016, 14),
(30, 'Sommer', 2017, 34),
(31, 'Sommer', 2018, 4),
(32, 'Sommer', 2019, 20),
(33, 'Sommer', 2021, 33),
(34, 'Sommer', 2022, 5),
(35, 'Sommer', 2023, 10),
(36, 'Sommer', 2024, 33),
(37, 'Winter', 2013, 14),
(38, 'Winter', 2014, 4),
(39, 'Winter', 2015, 4),
(40, 'Winter', 2016, 4),
(41, 'Winter', 2017, 4),
(42, 'Winter', 2018, 4),
(43, 'Winter', 2019, 4),
(44, 'Winter', 2020, 10),
(45, 'Winter', 2021, 4),
(46, 'Winter', 2022, 4),
(47, 'Winter', 2023, 4),
(48, 'Winter', 2024, 4),
(49, 'Winter', 2025, 6),
(50, 'Sommer', 2025, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `Userid` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Enabled` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `mannschaft`
--
ALTER TABLE `mannschaft`
  ADD PRIMARY KEY (`Mid`);

--
-- Indizes für die Tabelle `spiel`
--
ALTER TABLE `spiel`
  ADD PRIMARY KEY (`Spielid`),
  ADD KEY `MA` (`MA`),
  ADD KEY `MB` (`MB`),
  ADD KEY `Tunier` (`Tunier`);

--
-- Indizes für die Tabelle `tipp`
--
ALTER TABLE `tipp`
  ADD PRIMARY KEY (`Tippid`),
  ADD KEY `Spielid` (`Spielid`),
  ADD KEY `Userid` (`Userid`);

--
-- Indizes für die Tabelle `tunier`
--
ALTER TABLE `tunier`
  ADD PRIMARY KEY (`Tid`),
  ADD KEY `Gewinner` (`Gewinner`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Userid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `mannschaft`
--
ALTER TABLE `mannschaft`
  MODIFY `Mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT für Tabelle `spiel`
--
ALTER TABLE `spiel`
  MODIFY `Spielid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT für Tabelle `tipp`
--
ALTER TABLE `tipp`
  MODIFY `Tippid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tunier`
--
ALTER TABLE `tunier`
  MODIFY `Tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `Userid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `spiel`
--
ALTER TABLE `spiel`
  ADD CONSTRAINT `spiel_ibfk_1` FOREIGN KEY (`MA`) REFERENCES `mannschaft` (`Mid`),
  ADD CONSTRAINT `spiel_ibfk_2` FOREIGN KEY (`MB`) REFERENCES `mannschaft` (`Mid`),
  ADD CONSTRAINT `spiel_ibfk_3` FOREIGN KEY (`Tunier`) REFERENCES `tunier` (`Tid`);

--
-- Constraints der Tabelle `tipp`
--
ALTER TABLE `tipp`
  ADD CONSTRAINT `tipp_ibfk_1` FOREIGN KEY (`Spielid`) REFERENCES `spiel` (`Spielid`),
  ADD CONSTRAINT `tipp_ibfk_2` FOREIGN KEY (`Userid`) REFERENCES `user` (`Userid`);

--
-- Constraints der Tabelle `tunier`
--
ALTER TABLE `tunier`
  ADD CONSTRAINT `tunier_ibfk_1` FOREIGN KEY (`Gewinner`) REFERENCES `mannschaft` (`Mid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
