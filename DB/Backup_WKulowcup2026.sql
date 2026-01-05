-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Erstellungszeit: 05. Jan 2026 um 20:12
-- Server-Version: 10.11.15-MariaDB-ubu2204
-- PHP-Version: 8.3.26

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
(40, 'Feiglinge x Flames of Pils', 'FXF', 'fxf.png'),
(1001, 'A1', 'A1', 'non.png'),
(1002, 'A2', 'A2', 'non.png'),
(1003, 'A3', 'A3', 'non.png'),
(1004, 'A4', 'A4', 'non.png'),
(1005, 'A5', 'A5', 'non.png'),
(1006, 'A6', 'A6', 'non.png'),
(1007, 'A7', 'A7', 'non.png'),
(1008, 'A8', 'A8', 'non.png'),
(1009, 'A9', 'A9', 'non.png'),
(1010, 'A10', 'A10', 'non.png'),
(1011, 'B1', 'B1', 'non.png'),
(1012, 'B2', 'B2', 'non.png'),
(1013, 'B3', 'B3', 'non.png'),
(1014, 'B4', 'B4', 'non.png'),
(1015, 'B5', 'B5', 'non.png'),
(1016, 'B6', 'B6', 'non.png'),
(1017, 'B7', 'B7', 'non.png'),
(1018, 'B8', 'B8', 'non.png'),
(1019, 'B9', 'B9', 'non.png'),
(1020, 'B10', 'B10', 'non.png');

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
(28, 'A', 1, 1, 5, 4, 1, 50, 2, '2025-07-05 11:00:00'),
(29, 'B', 1, 2, 40, 10, 2, 50, 2, '2025-07-05 11:00:00'),
(30, 'A', 1, 0, 33, 3, 1, 50, 2, '2025-07-05 11:15:00'),
(31, 'B', 1, 0, 6, 39, 2, 50, 2, '2025-07-05 11:15:00'),
(32, 'A', 0, 2, 5, 33, 1, 50, 2, '2025-07-05 11:30:00'),
(33, 'B', 0, 0, 40, 37, 2, 50, 2, '2025-07-05 11:30:00'),
(34, 'A', 4, 1, 4, 38, 1, 50, 2, '2025-07-05 11:45:00'),
(35, 'B', 1, 3, 10, 6, 2, 50, 2, '2025-07-05 11:45:00'),
(36, 'A', 3, 0, 5, 3, 1, 50, 2, '2025-07-05 12:00:00'),
(37, 'B', 0, 1, 39, 40, 2, 50, 2, '2025-07-05 12:00:00'),
(38, 'A', 0, 0, 4, 33, 1, 50, 2, '2025-07-05 12:15:00'),
(39, 'B', 4, 1, 37, 6, 2, 50, 2, '2025-07-05 12:15:00'),
(40, 'A', 2, 0, 5, 38, 1, 50, 2, '2025-07-05 12:30:00'),
(41, 'B', 0, 0, 10, 39, 2, 50, 2, '2025-07-05 12:30:00'),
(42, 'A', 0, 0, 4, 3, 1, 50, 2, '2025-07-05 12:45:00'),
(43, 'B', 3, 0, 40, 6, 2, 50, 2, '2025-07-05 12:45:00'),
(44, 'A', 1, 2, 33, 38, 1, 50, 2, '2025-07-05 13:00:00'),
(45, 'B', 2, 1, 10, 37, 2, 50, 2, '2025-07-05 13:00:00'),
(46, 'A', 0, 3, 3, 38, 1, 50, 2, '2025-07-05 13:15:00'),
(47, 'B', 1, 5, 39, 37, 2, 50, 2, '2025-07-05 13:15:00'),
(48, 'HF', 0, 1, 5, 4, 2, 50, 2, '2025-07-05 14:20:00'),
(49, 'HF', 1, 0, 33, 37, 1, 50, 2, '2025-07-05 14:20:00'),
(50, 'U9', 1, 0, 3, 39, 1, 50, 2, '2025-07-05 14:05:00'),
(51, 'U7', 1, 1, 38, 6, 2, 50, 2, '2025-07-05 14:05:00'),
(52, 'U5', 0, 2, 40, 10, 1, 50, 2, '2025-07-05 14:45:00'),
(53, 'U3', 1, 0, 5, 37, 1, 50, 2, '2025-07-05 14:45:00'),
(54, 'TF', 1, 0, 4, 33, 1, 50, 2, '2025-07-05 15:00:00'),
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
(73, 'VF', 0, 0, 33, 10, 1, 50, 2, '2024-06-15 13:45:00'),
(74, 'VF', 4, 0, 4, 40, 2, 50, 2, '2024-06-15 13:45:00'),
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
(126, 'TF', 1, 0, 4, 10, 1, 48, 2, '2024-01-06 16:42:00'),
(261, 'A', 1, 4, 6, 37, 1, 51, 2, '2026-01-03 11:30:00'),
(262, 'B', 4, 0, 4, 5, 1, 51, 2, '2026-01-03 11:45:00'),
(263, 'A', 1, 0, 10, 40, 1, 51, 2, '2026-01-03 12:00:00'),
(264, 'B', 1, 3, 33, 7, 1, 51, 2, '2026-01-03 12:15:00'),
(265, 'A', 0, 1, 37, 10, 1, 51, 2, '2026-01-03 12:30:00'),
(266, 'B', 0, 2, 5, 33, 1, 51, 2, '2026-01-03 12:45:00'),
(267, 'A', 6, 3, 6, 40, 1, 51, 2, '2026-01-03 13:00:00'),
(268, 'B', 1, 3, 4, 7, 1, 51, 2, '2026-01-03 13:15:00'),
(269, 'A', 0, 2, 6, 10, 1, 51, 2, '2026-01-03 13:30:00'),
(270, 'B', 1, 0, 4, 33, 1, 51, 2, '2026-01-03 13:45:00'),
(271, 'A', 0, 8, 40, 37, 1, 51, 2, '2026-01-03 14:00:00'),
(272, 'B', 3, 4, 7, 5, 1, 51, 2, '2026-01-03 14:15:00'),
(273, 'HF', 5, 4, 7, 37, 1, 51, 2, '2026-01-03 14:45:00'),
(274, 'HF', 0, 3, 10, 4, 1, 51, 2, '2026-01-03 14:30:00'),
(275, 'U5', 4, 1, 6, 33, 1, 51, 2, '2026-01-03 15:15:00'),
(276, 'U7', 1, 0, 40, 5, 1, 51, 2, '2026-01-03 15:00:00'),
(277, 'U3', 5, 3, 37, 10, 1, 51, 2, '2026-01-03 15:30:00'),
(278, 'TF', 3, 1, 4, 7, 1, 51, 2, '2026-01-03 15:45:00');

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

--
-- Daten für Tabelle `tipp`
--

INSERT INTO `tipp` (`Tippid`, `Spielid`, `Userid`, `ToreA`, `ToreB`) VALUES
(35, 261, 10, 1, 2),
(36, 263, 10, 4, 1),
(37, 265, 10, 1, 1),
(38, 267, 10, 2, 1),
(39, 269, 10, 0, 1),
(40, 271, 10, 1, 4),
(41, 262, 10, 1, 2),
(42, 264, 10, 3, 0),
(43, 266, 10, 0, 2),
(44, 268, 10, 1, 0),
(45, 270, 10, 1, 2),
(46, 272, 10, 0, 2),
(47, 261, 12, 4, 1),
(48, 263, 12, 3, 0),
(49, 265, 12, 1, 3),
(50, 267, 12, 3, 0),
(51, 269, 12, 1, 2),
(52, 271, 12, 2, 1),
(53, 262, 12, 5, 0),
(54, 264, 12, 2, 1),
(55, 266, 12, 0, 2),
(56, 268, 12, 2, 0),
(57, 270, 12, 2, 1),
(58, 272, 12, 2, 2),
(59, 261, 16, 3, 1),
(60, 263, 16, 3, 0),
(61, 265, 16, 1, 2),
(62, 267, 16, 2, 1),
(63, 269, 16, 0, 2),
(64, 271, 16, 1, 3),
(65, 262, 16, 2, 1),
(66, 264, 16, 2, 1),
(67, 266, 16, 1, 2),
(68, 268, 16, 2, 1),
(69, 270, 16, 3, 1),
(70, 272, 16, 4, 0),
(71, 261, 14, 1, 4),
(72, 263, 14, 1, 3),
(73, 265, 14, 4, 1),
(74, 267, 14, 3, 2),
(75, 269, 14, 2, 1),
(76, 271, 14, 1, 3),
(77, 262, 14, 2, 1),
(78, 264, 14, 1, 1),
(79, 266, 14, 3, 1),
(80, 268, 14, 3, 1),
(81, 270, 14, 3, 0),
(82, 272, 14, 2, 3),
(95, 261, 15, 1, 2),
(96, 263, 15, 2, 1),
(97, 265, 15, 1, 2),
(98, 267, 15, 2, 1),
(99, 269, 15, 1, 3),
(100, 271, 15, 1, 2),
(101, 261, 20, 4, 1),
(102, 262, 15, 1, 2),
(103, 264, 15, 2, 0),
(104, 266, 15, 1, 2),
(105, 268, 15, 1, 2),
(106, 270, 15, 1, 3),
(107, 272, 15, 2, 1),
(108, 261, 19, 6, 0),
(109, 263, 19, 3, 1),
(110, 265, 19, 2, 7),
(111, 267, 19, 5, 3),
(112, 269, 19, 5, 5),
(113, 271, 19, 6, 1),
(114, 262, 19, 3, 4),
(115, 264, 19, 7, 0),
(116, 266, 19, 0, 5),
(117, 268, 19, 4, 1),
(118, 270, 19, 1, 8),
(119, 272, 19, 0, 5),
(120, 263, 20, 3, 1),
(121, 265, 20, 2, 4),
(122, 267, 20, 5, 2),
(123, 269, 20, 3, 2),
(124, 271, 20, 2, 3),
(125, 262, 20, 6, 2),
(126, 264, 20, 2, 3),
(127, 266, 20, 3, 1),
(128, 268, 20, 4, 1),
(129, 270, 20, 2, 0),
(130, 272, 20, 2, 0),
(131, 263, 21, 4, 1),
(132, 265, 21, 1, 3),
(133, 267, 21, 5, 2),
(134, 269, 21, 2, 1),
(135, 271, 21, 3, 2),
(136, 262, 21, 2, 1),
(137, 264, 21, 1, 3),
(138, 266, 21, 2, 1),
(139, 268, 21, 1, 3),
(140, 270, 21, 2, 2),
(141, 272, 21, 2, 1),
(142, 263, 22, 2, 0),
(143, 265, 22, 1, 1),
(144, 267, 22, 1, 2),
(145, 269, 22, 1, 2),
(146, 271, 22, 5, 1),
(147, 262, 22, 1, 0),
(148, 264, 22, 2, 2),
(149, 266, 22, 1, 1),
(150, 268, 22, 2, 0),
(151, 270, 22, 2, 1),
(152, 272, 22, 1, 5),
(153, 263, 23, 3, 1),
(154, 265, 23, 3, 1),
(155, 267, 23, 3, 0),
(156, 269, 23, 2, 1),
(157, 271, 23, 0, 3),
(158, 262, 23, 3, 1),
(159, 264, 23, 2, 3),
(160, 266, 23, 2, 1),
(161, 268, 23, 1, 0),
(162, 270, 23, 5, 0),
(163, 272, 23, 3, 2),
(164, 263, 24, 2, 1),
(165, 265, 24, 3, 1),
(166, 267, 24, 1, 3),
(167, 269, 24, 2, 2),
(168, 271, 24, 0, 4),
(169, 262, 24, 1, 2),
(170, 264, 24, 1, 3),
(171, 266, 24, 2, 3),
(172, 268, 24, 1, 4),
(173, 270, 24, 1, 3),
(174, 272, 24, 3, 1),
(175, 273, 23, 0, 2),
(176, 274, 23, 3, 0),
(179, 273, 14, 3, 1),
(180, 274, 14, 3, 1),
(181, 276, 14, 1, 4),
(182, 275, 14, 2, 1),
(183, 273, 21, 3, 1),
(184, 274, 21, 1, 3),
(185, 273, 16, 4, 0),
(186, 274, 16, 3, 0),
(187, 276, 16, 0, 5),
(188, 275, 16, 2, 3),
(189, 273, 22, 0, 1),
(190, 274, 22, 1, 2),
(191, 276, 22, 0, 3),
(192, 275, 22, 1, 2),
(193, 273, 20, 2, 3),
(194, 274, 20, 1, 3),
(195, 276, 20, 0, 3),
(196, 275, 20, 3, 2),
(197, 276, 21, 1, 4),
(198, 275, 21, 1, 3),
(201, 273, 15, 3, 1),
(202, 276, 15, 0, 5),
(203, 275, 15, 0, 2),
(204, 277, 15, 3, 1),
(205, 278, 15, 2, 1),
(206, 273, 19, 4, 2),
(207, 276, 19, 3, 1),
(208, 275, 19, 2, 3),
(209, 277, 19, 4, 1),
(210, 278, 19, 3, 1),
(211, 273, 12, 1, 2),
(212, 276, 12, 0, 3),
(213, 275, 12, 0, 2),
(216, 277, 21, 1, 2),
(217, 278, 21, 1, 2),
(218, 277, 20, 3, 1),
(219, 278, 20, 3, 1),
(220, 277, 16, 2, 3),
(221, 278, 16, 2, 1),
(222, 278, 14, 3, 2),
(223, 278, 12, 3, 1);

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
(50, 'Sommer', 2025, 4),
(51, 'Winter', 2026, NULL);

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
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`Userid`, `Username`, `Password`, `Enabled`) VALUES
(9, 'Roenschi', '$2y$10$L9kF.Z2t2RA2k.14kTErYOaUkKEm/uxDNJdZFKUGtCV.JYZJyVhU2', 1),
(10, 'Philipxxp', '$2y$10$STuYI5vQLgitSQE4P5TKm.QVq06OEuoLD2gdSb9L8xCkSXN/6xhdS', 1),
(11, 'Sieger', '$2y$10$07vLrclyiP26ibMQGSMp9u9yIl3lXnrjh9xxWiW.Q8uB/bSah8ZzO', 1),
(12, 'Tim Markgraf', '$2y$10$z.wcvExMNV1y.5wuC1.1/eNLS2SKR7W7ViJmS4/PZx2aVkN4t9e4y', 1),
(14, 'Linus', '$2y$10$.WtwTxkwDctxQ7v5hqoou.FI3QBnX0Sokg1Ca.bd4fgOCpqnvZQhW', 1),
(15, 'Lauri', '$2y$10$05fqcBnqG0YRKSy7y.EEWOXBUex39cwAbp7eDxol5wx81S5jc8puq', 1),
(16, 'Nils Blonschefzka', '$2y$10$qqu992NeTI3lG6CR8e2xLO6FuKrRCcmXRRO8jnIzxB2/gHhjwdxQ6', 1),
(17, 'Marleen', '$2y$10$IbdAVeVEA9292.T9UbQRL.LWFofwvc6baBhAOkDZpt7I0LK93G/f.', 1),
(18, 'MaxMustermann', '$2y$10$TVI62Q6OrfrLI1nXAUd8F.qoo284aRiybru6ETSQ1JYIN9/QgTxIK', 1),
(19, 'Tim2111', '$2y$10$OHQwg1SA051xRpGDd/eUa.h25WU54dbiPla.Y94scO5TynO9EkdZO', 1),
(20, 'Schippi', '$2y$10$PgSXpdtwMks3mj1v3ZzWT.7scw0vrD59zci4kK0kIBGQBL.0MjLem', 1),
(21, 'Fabian robel', '$2y$10$49s3jvLRyMvpyCNvaiT7TODnowfynZFNT0EXpwfTUd..0xdKE1hde', 1),
(22, 'Haupai Puha', '$2y$10$/Rtd.BWW90.A42Yjf9sipeQgEvcttE.BVdSTJKQb9wuoqWwRbJOgq', 1),
(23, 'Kulowminati', '$2y$10$X07t8jcUeniO8Xnokby1I.wWi6jIjZ71SVRK3tVDmu4kJFeMihAP6', 1),
(24, 'Falle', '$2y$10$JSsp3HVoO9kR/KI5tQk8s.B2F91mwutqf2KVSwQh3fOAMr4i43irG', 1),
(25, 'Mickyp18', '$2y$10$6jI5L6BSE.sMBIWvvHVq/OitGXiI071Ez4USDPJofGSV4w.Whu8Km', 1),
(26, 'Noelmlr', '$2y$10$TvXWa3obNpVqILTfE.EjP.x0zSwoTB5hytZJRE58NnVeRJrxv92vW', 1),
(27, 'Niki', '$2y$10$E2qeJZiqWRYoIdKHDfnS4.DnccOCsLEjH/ZQ1OtmerYOOSGHK88rS', 1),
(28, 'Hampelmann', '$2y$10$O7wR7agK/LpxHObCXDNtquDodFSkRmvMDla/.gnKXjzOCU.DW2DY6', 1),
(29, 'Posti', '$2y$10$ve6ZuL.QfxRm7XiRlhjUfehrj1mM/WDD5Suj/djtAeqgEBPad.lh6', 1),
(30, 'Lukas Winzer', '$2y$10$xRA9oM/.dwKWLLsIM5Fr5.xGe2FHD8TW1fs7grNENJYdQtbFNpW5G', 1),
(31, 'Nockel', '$2y$10$M/1NrUEUvxXibx1OHwFTguhY4AwxCkTZDO8k/9YYtK3p1idYMoBV2', 1),
(32, 'Caesar', '$2y$10$PqtZRSfGifsmEOgsKlVhYuw6Y.EIb/6iyoH8XDnxhxvqEOo1xu2Kq', 1);

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
  MODIFY `Mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000;

--
-- AUTO_INCREMENT für Tabelle `spiel`
--
ALTER TABLE `spiel`
  MODIFY `Spielid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT für Tabelle `tipp`
--
ALTER TABLE `tipp`
  MODIFY `Tippid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT für Tabelle `tunier`
--
ALTER TABLE `tunier`
  MODIFY `Tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `Userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
