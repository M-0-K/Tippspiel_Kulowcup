-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: tippspiel_mariadb
-- Erstellungszeit: 16. Aug 2025 um 10:37
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

--
-- Daten für Tabelle `tipp`
--

INSERT INTO `tipp` (`Tippid`, `Spielid`, `Userid`, `ToreA`, `ToreB`) VALUES
(193, 28, 24, 2, 4),
(194, 30, 24, 2, 3),
(195, 32, 24, 3, 2),
(196, 34, 24, 3, 1),
(197, 36, 24, 1, 2),
(198, 38, 24, 1, 0),
(199, 40, 24, 3, 0),
(200, 42, 24, 1, 2),
(201, 44, 24, 4, 1),
(202, 46, 24, 2, 1),
(203, 28, 25, 2, 2),
(204, 29, 25, 0, 4),
(205, 28, 28, 2, 1),
(206, 30, 28, 2, 1),
(207, 30, 27, 2, 0),
(208, 32, 27, 2, 1),
(209, 34, 27, 2, 1),
(210, 36, 27, 3, 0),
(211, 38, 27, 2, 1),
(212, 40, 27, 2, 1),
(213, 42, 27, 3, 0),
(214, 44, 27, 2, 1),
(215, 46, 27, 1, 2),
(216, 31, 27, 2, 2),
(217, 33, 27, 1, 1),
(218, 35, 27, 1, 2),
(219, 37, 27, 1, 3),
(220, 39, 27, 1, 0),
(221, 41, 27, 2, 1),
(222, 43, 27, 1, 3),
(223, 45, 27, 2, 0),
(224, 47, 27, 1, 3),
(225, 30, 30, 4, 1),
(226, 32, 30, 2, 2),
(227, 34, 30, 0, 2),
(228, 36, 30, 4, 0),
(229, 38, 30, 1, 2),
(230, 40, 30, 3, 0),
(231, 42, 30, 3, 0),
(232, 44, 30, 3, 0),
(233, 46, 30, 1, 3),
(234, 31, 30, 3, 0),
(235, 33, 30, 2, 0),
(236, 35, 30, 1, 1),
(237, 37, 30, 2, 0),
(238, 39, 30, 3, 2),
(239, 41, 30, 1, 3),
(240, 43, 30, 0, 2),
(241, 45, 30, 2, 2),
(242, 47, 30, 2, 0),
(243, 32, 22, 2, 1),
(244, 34, 22, 3, 0),
(245, 36, 22, 2, 0),
(246, 38, 22, 2, 1),
(247, 40, 22, 3, 0),
(248, 42, 22, 2, 0),
(249, 44, 22, 3, 1),
(250, 46, 22, 1, 1),
(251, 33, 22, 1, 1),
(252, 35, 22, 1, 2),
(253, 37, 22, 1, 1),
(254, 39, 22, 0, 2),
(255, 41, 22, 3, 0),
(256, 43, 22, 0, 2),
(257, 45, 22, 2, 1),
(258, 47, 22, 0, 1),
(259, 32, 38, 2, 1),
(260, 34, 38, 3, 0),
(261, 33, 38, 1, 2),
(262, 35, 38, 2, 1),
(263, 32, 26, 0, 1),
(264, 34, 26, 2, 1),
(265, 36, 26, 0, 1),
(266, 38, 26, 1, 1),
(267, 40, 26, 1, 0),
(268, 42, 26, 1, 1),
(269, 44, 26, 2, 1),
(270, 46, 26, 1, 0),
(271, 33, 26, 1, 2),
(272, 35, 26, 0, 1),
(273, 37, 26, 0, 1),
(274, 39, 26, 2, 1),
(275, 41, 26, 1, 0),
(276, 43, 26, 1, 2),
(277, 45, 26, 1, 2),
(278, 47, 26, 0, 2),
(279, 36, 38, 3, 1),
(280, 38, 38, 2, 1),
(281, 40, 38, 1, 0),
(282, 42, 38, 2, 0),
(283, 44, 38, 3, 0),
(284, 46, 38, 2, 0),
(285, 37, 38, 0, 2),
(286, 39, 38, 1, 1),
(287, 41, 38, 3, 0),
(288, 43, 38, 0, 4),
(289, 45, 38, 3, 0),
(290, 47, 38, 0, 2),
(291, 38, 41, 2, 1),
(292, 40, 41, 1, 2),
(293, 39, 41, 0, 3),
(294, 41, 41, 3, 0),
(295, 42, 41, 2, 0),
(296, 44, 41, 2, 1),
(297, 46, 41, 1, 1),
(298, 43, 41, 1, 3),
(299, 45, 41, 3, 0),
(300, 47, 41, 1, 2),
(301, 73, 38, 2, 0),
(302, 74, 38, 2, 1),
(303, 48, 38, 3, 0),
(304, 49, 38, 1, 2),
(305, 50, 38, 1, 3),
(306, 51, 38, 0, 4),
(307, 52, 38, 0, 2),
(308, 53, 38, 1, 3),
(309, 54, 38, 1, 1),
(310, 52, 24, 2, 0),
(311, 53, 24, 1, 0),
(312, 54, 24, 2, 1);

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
(50, 'Sommer', 2025, 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `Userid` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Enabled` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`Userid`, `Username`, `Password`, `Enabled`) VALUES
(22, 'Micky97', '$2y$10$dGp137qoyRvOvFTdGReScu1vJ9hFmcXVlBpG.SY1ZGNZPCBHPGdlq', 1),
(23, 'Jonas12813', '$2y$10$whTQofZfzciYXYfxjGl/qu7x8yvTfKA4oXIaMUihbzi/MzRZcDKUS', 1),
(24, 'Ganter', '$2y$10$fPW8rxU5Pt.TrBN.ZWCoXuooMHjWDDKWqhWR73v9YYuqITGCogOEu', 1),
(25, 'TimMarkgraf', '$2y$10$l.F7KYJzqsGcBrwAFI/EDO.0/rwIhKCSLTLkf9M4V09mKDuk5xAmm', 1),
(26, 'Christian', '$2y$10$5fYShJ25ljqRZ0EvaQo5CuAGkWNdbcZ3ESPasB48xY1yNp1fZaQfa', 1),
(27, 'JoJoJonas12813', '$2y$10$.BYejEp3KMmS/6bzO9rGheYRkqrXFHEK6PVF0ZMKVa.aYP1Zissda', 1),
(28, 'Heri die Erdbeere', '$2y$10$aXDrgWd3UWoDxNZt1t2zGepi8UKt5MnNMlwIcwYzMhb0vn7MKMcki', 1),
(29, 'Schwako', '$2y$10$csrnamH9tafDlZhKu4xJsua86Daph2m8oWEj1BS9ExJhtkCqHuskW', 1),
(30, 'SchwakoJungs', '$2y$10$p5yToxCYR.aMOikLw1G3/eDR3Uegl.zf02ep.jpRL4ae19n2s849K', 1),
(31, 'LauriR', '$2y$10$/jbzoBre.JvpZqjbRCeRAu8tgO9S.18woPRtPsaXnn66WP8aqrDeO', 1),
(32, 'LaurentinRossow', '$2y$10$141FcxmrDCEA4399klmBzuN8KM7ZxqY8AUBxR.VSgDGXvsuM/9OfC', 1),
(33, 'LaurentinRossow7', '$2y$10$g2FJu6SsdQ4pJxArYv4.dOEF2y/21KwNO.USHLqTKB/DpXpdHJZZW', 1),
(34, 'Adrian Wocko', '$2y$10$AsINoM7GbPIE50QMQJxu.OMWk1qgdhmW7Xw.TpWOoXJ8d7gmiHzD6', 1),
(35, 'Hasi', '$2y$10$AhPdy12CT/3lqqrAUVmzLumj9Vzn0iTC1lXYKnEaPa.cvROlHe7fW', 1),
(36, 'Timon', '$2y$10$eXaqtaKT/3rDTbVsIgzJeeBCQ9jyGt6tercLpacd2s9brpCPqKZ8e', 1),
(37, 'Sebastian  84', '$2y$10$CaES6065PRXDZw1YFFrFr.LtFvxI9aXz1lKyMQFkpLb8WEqnAJZHS', 1),
(38, 'Clemens Georg Piatza', '$2y$10$VZH5XqTIYbSqLvrpGNy/I.f4LY3UivfFsUfPYZ7.YTc2riO3gegRO', 1),
(39, 'SebastianMuller2610', '$2y$10$6m8IlK4pi2DEHpfUnmfv6O3w/nJUs3cKRKH2xIXveUgjlezbwrWfK', 1),
(40, 'Xandl', '$2y$10$5efZY1QckMoY.SpisWtmauJobVmMuIDiN8jTNMn0MHmmSBcZHQciW', 1),
(41, 'Kaschti', '$2y$10$DbqTBEWGU7A8jNZCfYOZw.9u6gPSbvxULfEgGhdYrvdld7PBO.P7K', 1),
(42, 'Iche', '$2y$10$A8.sazy2hXr9zlFZHQ2DiujxBAVSQwo2Esb7gaZdcaEIRofT1G7y6', 1),
(43, 'Fxm99', '$2y$10$Tpo4reRuUvXZgSLubz8xYuJ5cDXvVHNaWG4MFcBFuN944DlnPMIBm', 1),
(44, 'Jonas hat Angst', '$2y$10$7EsQCdJFI/4nnQ83cI676.cALoCOWrJ8FJAbZv8nnsFnnC0iFrnj6', 1),
(45, 'Moritz', '$2y$10$P7gV2HwIS93Its8ZiJFew.uU6n4GyYY2aKRFWMhbCCYB9MoNIgak.', 1),
(46, 'MoritzK', '$2y$10$YylHiT50zXUeSL/B4BlFg.SiO4s1wG7z5RawGg6leM0C5BWZ0Clxi', 1);

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
  MODIFY `Tippid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT für Tabelle `tunier`
--
ALTER TABLE `tunier`
  MODIFY `Tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `Userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
