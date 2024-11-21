-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Host: wdb2.hs-mittweida.de:3306
-- Erstellungszeit: 21. Nov 2024 um 12:09
-- Server-Version: 10.11.6-MariaDB-0+deb12u1
-- PHP-Version: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mkockert`
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
(37, 'Oberschule Wittichenau', 'OS Witt.', 'osw.png');

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
(27, 'TF', 0, 1, 6, 33, 1, 36, 2, '2024-06-15 16:42:00');

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
(1, 1, 1, 2, 3),
(2, 3, 1, 1, 5),
(3, 5, 1, 0, 2),
(4, 7, 1, 2, 6),
(5, 9, 1, 2, 1),
(6, 11, 1, 2, 4),
(7, 13, 1, 3, 1),
(8, 15, 1, 5, 4),
(9, 17, 1, 2, 1),
(10, 19, 1, 6, 4),
(11, 2, 1, 2, 3),
(12, 4, 1, 2, 5),
(13, 6, 1, 1, 0),
(14, 8, 1, 2, 2),
(15, 10, 1, 1, 5),
(16, 12, 1, 4, 3),
(17, 14, 1, 1, 2),
(18, 16, 1, 2, 3),
(19, 18, 1, 6, 3),
(20, 20, 1, 5, 2),
(21, 21, 1, 2, 1),
(22, 22, 1, 2, 5),
(23, 23, 1, 2, 3),
(24, 24, 1, 1, 5),
(25, 25, 1, 1, 5),
(26, 26, 1, 100, 2),
(27, 27, 1, 2, 3),
(28, 1, 6, 1, 4),
(29, 3, 6, 3, 0),
(30, 5, 6, 2, 0),
(31, 7, 6, 1, 2),
(32, 9, 6, 0, 2),
(33, 11, 6, 4, 1),
(34, 13, 6, 1, 1),
(35, 15, 6, 2, 1),
(36, 17, 6, 0, 1),
(37, 19, 6, 0, 2),
(38, 2, 6, 1, 0),
(39, 4, 6, 3, 2),
(40, 6, 6, 0, 3),
(41, 8, 6, 2, 0),
(42, 10, 6, 2, 2),
(43, 12, 6, 1, 3),
(44, 14, 6, 2, 0),
(45, 16, 6, 5, 0),
(46, 18, 6, 3, 2),
(47, 20, 6, 1, 5),
(48, 1, 7, 0, 2),
(49, 3, 7, 3, 0),
(50, 5, 7, 1, 0),
(51, 7, 7, 1, 1),
(52, 9, 7, 1, 3),
(53, 11, 7, 5, 0),
(54, 13, 7, 3, 0),
(55, 15, 7, 1, 3),
(56, 17, 7, 0, 3),
(57, 19, 7, 0, 5),
(58, 2, 7, 2, 0),
(59, 4, 7, 3, 1),
(60, 6, 7, 1, 4),
(61, 8, 7, 3, 1),
(62, 10, 7, 0, 2),
(63, 12, 7, 0, 3),
(64, 14, 7, 2, 1),
(65, 16, 7, 4, 0),
(66, 18, 7, 2, 1),
(67, 20, 7, 0, 2),
(68, 21, 7, 1, 3),
(69, 22, 7, 0, 3),
(70, 23, 7, 2, 1),
(71, 24, 7, 2, 1),
(72, 25, 7, 1, 2),
(73, 26, 7, 3, 1),
(74, 27, 7, 1, 3),
(75, 1, 9, 1, 5),
(76, 3, 9, 3, 1),
(77, 5, 9, 3, 1),
(78, 7, 9, 3, 2),
(79, 9, 9, 2, 2),
(80, 11, 9, 2, 2),
(81, 13, 9, 5, 1),
(82, 15, 9, 1, 4),
(83, 17, 9, 2, 3),
(84, 19, 9, 0, 2),
(85, 2, 9, 1, 2),
(86, 4, 9, 2, 4),
(87, 6, 9, 1, 3),
(88, 8, 9, 2, 3),
(89, 10, 9, 1, 2),
(90, 12, 9, 3, 1),
(91, 14, 9, 2, 0),
(92, 16, 9, 4, 1),
(93, 18, 9, 1, 5),
(94, 20, 9, 1, 3),
(95, 21, 9, 3, 1),
(96, 22, 9, 1, 4),
(97, 23, 9, 1, 4),
(98, 24, 9, 2, 4),
(99, 25, 9, 3, 0),
(100, 26, 9, 4, 2),
(101, 27, 9, 3, 1),
(102, 1, 12, 0, 5),
(103, 3, 12, 4, 0),
(104, 5, 12, 3, 1),
(105, 7, 12, 2, 1),
(106, 9, 12, 1, 2),
(107, 11, 12, 4, 0),
(108, 13, 12, 2, 1),
(109, 15, 12, 1, 2),
(110, 17, 12, 1, 2),
(111, 19, 12, 0, 4),
(112, 2, 12, 2, 1),
(113, 4, 12, 3, 1),
(114, 6, 12, 0, 3),
(115, 8, 12, 3, 0),
(116, 10, 12, 1, 2),
(117, 12, 12, 0, 3),
(118, 14, 12, 3, 0),
(119, 16, 12, 4, 0),
(120, 18, 12, 1, 2),
(121, 20, 12, 0, 4),
(122, 1, 18, 1, 3),
(123, 3, 18, 3, 1),
(124, 1, 11, 1, 4),
(125, 3, 11, 3, 1),
(126, 2, 11, 4, 1),
(127, 4, 11, 4, 1),
(128, 1, 8, 0, 3),
(129, 3, 8, 4, 0),
(130, 5, 8, 2, 2),
(131, 7, 8, 2, 1),
(132, 9, 8, 0, 2),
(133, 11, 8, 5, 1),
(134, 13, 8, 1, 2),
(135, 15, 8, 2, 0),
(136, 17, 8, 1, 1),
(137, 19, 8, 1, 3),
(138, 2, 8, 1, 2),
(139, 4, 8, 2, 0),
(140, 6, 8, 0, 4),
(141, 8, 8, 2, 0),
(142, 10, 8, 2, 1),
(143, 12, 8, 1, 0),
(144, 14, 8, 3, 2),
(145, 16, 8, 2, 1),
(146, 18, 8, 1, 2),
(147, 20, 8, 1, 4),
(148, 1, 4, 0, 3),
(149, 3, 4, 3, 1),
(150, 5, 4, 1, 1),
(151, 7, 4, 0, 1),
(152, 9, 4, 1, 2),
(153, 11, 4, 2, 0),
(154, 13, 4, 1, 0),
(155, 15, 4, 1, 1),
(156, 17, 4, 0, 2),
(157, 19, 4, 1, 5),
(158, 2, 4, 1, 1),
(159, 4, 4, 1, 2),
(160, 6, 4, 1, 2),
(161, 8, 4, 2, 0),
(162, 10, 4, 1, 1),
(163, 12, 4, 1, 2),
(164, 14, 4, 3, 0),
(165, 16, 4, 1, 1),
(166, 18, 4, 2, 0),
(167, 20, 4, 0, 1),
(168, 1, 20, 1, 2),
(169, 3, 20, 3, 0),
(170, 5, 20, 2, 2),
(171, 7, 20, 1, 1),
(172, 9, 20, 0, 2),
(173, 11, 20, 2, 0),
(174, 13, 20, 3, 1),
(175, 15, 20, 2, 1),
(176, 17, 20, 1, 3),
(177, 19, 20, 1, 4),
(178, 2, 20, 1, 5),
(179, 4, 20, 4, 3),
(180, 6, 20, 2, 3),
(181, 8, 20, 4, 1),
(182, 10, 20, 1, 2),
(183, 12, 20, 3, 1),
(184, 14, 20, 4, 0),
(185, 16, 20, 2, 0),
(186, 18, 20, 3, 3),
(187, 20, 20, 1, 0),
(188, 21, 20, 3, 1),
(189, 22, 20, 3, 1),
(190, 23, 20, 3, 1),
(191, 24, 20, 3, 1),
(192, 25, 20, 3, 1),
(193, 26, 20, 3, 1),
(194, 27, 20, 2, 1),
(195, 1, 19, 0, 5),
(196, 3, 19, 3, 0),
(197, 5, 19, 3, 1),
(198, 7, 19, 2, 1),
(199, 9, 19, 0, 2),
(200, 11, 19, 4, 0),
(201, 13, 19, 2, 2),
(202, 15, 19, 2, 1),
(203, 17, 19, 3, 1),
(204, 19, 19, 1, 3),
(205, 2, 19, 0, 3),
(206, 4, 19, 2, 1),
(207, 6, 19, 1, 3),
(208, 8, 19, 4, 1),
(209, 10, 19, 1, 3),
(210, 12, 19, 1, 3),
(211, 14, 19, 3, 0),
(212, 16, 19, 3, 1),
(213, 18, 19, 2, 1),
(214, 20, 19, 0, 5),
(215, 1, 16, 0, 5),
(216, 3, 16, 3, 0),
(217, 5, 16, 3, 1),
(218, 7, 16, 2, 3),
(219, 9, 16, 2, 2),
(220, 11, 16, 4, 0),
(221, 13, 16, 2, 1),
(222, 15, 16, 1, 2),
(223, 17, 16, 2, 2),
(224, 19, 16, 0, 3),
(225, 2, 16, 0, 3),
(226, 4, 16, 3, 2),
(227, 6, 16, 1, 3),
(228, 8, 16, 3, 0),
(229, 10, 16, 1, 3),
(230, 12, 16, 2, 2),
(231, 14, 16, 4, 0),
(232, 16, 16, 3, 1),
(233, 18, 16, 1, 3),
(234, 20, 16, 1, 3),
(235, 1, 10, 1, 3),
(236, 3, 10, 3, 0),
(237, 2, 10, 2, 4),
(238, 4, 10, 0, 1),
(239, 3, 26, 3, 0),
(240, 5, 26, 1, 1),
(241, 7, 26, 1, 2),
(242, 9, 26, 1, 2),
(243, 11, 26, 1, 2),
(244, 13, 26, 4, 3),
(245, 15, 26, 3, 1),
(246, 17, 26, 2, 4),
(247, 19, 26, 1, 2),
(248, 4, 26, 1, 2),
(249, 6, 26, 1, 2),
(250, 8, 26, 1, 2),
(251, 10, 26, 2, 1),
(252, 12, 26, 3, 2),
(253, 14, 26, 1, 2),
(254, 16, 26, 2, 1),
(255, 18, 26, 3, 3),
(256, 20, 26, 2, 5),
(257, 3, 17, 1, 2),
(258, 5, 17, 2, 0),
(259, 7, 17, 1, 1),
(260, 9, 17, 1, 2),
(261, 11, 17, 3, 1),
(262, 13, 17, 2, 2),
(263, 15, 17, 0, 2),
(264, 17, 17, 1, 1),
(265, 19, 17, 2, 1),
(266, 4, 17, 2, 1),
(267, 6, 17, 1, 4),
(268, 8, 17, 2, 1),
(269, 10, 17, 3, 2),
(270, 12, 17, 1, 1),
(271, 14, 17, 4, 1),
(272, 16, 17, 2, 1),
(273, 18, 17, 2, 5),
(274, 20, 17, 1, 8),
(275, 3, 28, 1, 1),
(276, 4, 28, 1, 2),
(277, 4, 18, 1, 2),
(278, 5, 18, 2, 1),
(279, 7, 18, 1, 1),
(280, 6, 18, 2, 1),
(281, 8, 18, 2, 1),
(282, 5, 28, 1, 2),
(283, 7, 28, 1, 2),
(284, 9, 28, 1, 2),
(285, 11, 28, 2, 1),
(286, 13, 28, 3, 1),
(287, 15, 28, 2, 1),
(288, 17, 28, 1, 2),
(289, 19, 28, 1, 3),
(290, 6, 28, 2, 2),
(291, 8, 28, 1, 1),
(292, 10, 28, 2, 1),
(293, 12, 28, 1, 2),
(294, 14, 28, 1, 2),
(295, 16, 28, 2, 1),
(296, 18, 28, 2, 1),
(297, 20, 28, 1, 1),
(298, 5, 10, 1, 3),
(299, 7, 10, 3, 0),
(300, 6, 10, 1, 3),
(301, 8, 10, 4, 0),
(302, 5, 29, 2, 1),
(303, 7, 29, 3, 1),
(304, 9, 29, 1, 2),
(305, 11, 29, 1, 2),
(306, 13, 29, 2, 0),
(307, 15, 29, 2, 1),
(308, 17, 29, 3, 1),
(309, 19, 29, 1, 2),
(310, 6, 29, 0, 3),
(311, 8, 29, 2, 1),
(312, 10, 29, 2, 1),
(313, 12, 29, 1, 3),
(314, 14, 29, 1, 3),
(315, 16, 29, 1, 2),
(316, 18, 29, 2, 0),
(317, 20, 29, 2, 1),
(318, 7, 11, 1, 2),
(319, 9, 11, 1, 4),
(320, 11, 11, 4, 1),
(321, 13, 11, 1, 2),
(322, 15, 11, 1, 2),
(323, 17, 11, 2, 1),
(324, 19, 11, 1, 3),
(325, 6, 11, 1, 3),
(326, 8, 11, 3, 1),
(327, 10, 11, 2, 1),
(328, 12, 11, 1, 3),
(329, 14, 11, 2, 0),
(330, 16, 11, 3, 1),
(331, 18, 11, 2, 2),
(332, 20, 11, 1, 2),
(333, 9, 18, 2, 1),
(334, 11, 18, 1, 1),
(335, 10, 18, 2, 1),
(336, 9, 10, 3, 3),
(337, 10, 10, 2, 1),
(338, 12, 10, 0, 4),
(339, 9, 31, 1, 1),
(340, 11, 31, 0, 2),
(341, 13, 31, 3, 0),
(342, 15, 31, 1, 1),
(343, 17, 31, 2, 1),
(344, 19, 31, 0, 3),
(345, 10, 31, 0, 1),
(346, 12, 31, 1, 1),
(347, 14, 31, 0, 2),
(348, 16, 31, 1, 1),
(349, 18, 31, 1, 0),
(350, 20, 31, 2, 2),
(351, 11, 33, 2, 2),
(352, 13, 33, 3, 2),
(353, 15, 33, 2, 1),
(354, 17, 33, 3, 0),
(355, 19, 33, 0, 3),
(356, 12, 33, 2, 1),
(357, 14, 33, 2, 2),
(358, 16, 33, 1, 2),
(359, 18, 33, 3, 0),
(360, 20, 33, 1, 2),
(361, 13, 18, 2, 1),
(362, 15, 18, 1, 2),
(363, 17, 18, 1, 0),
(364, 19, 18, 1, 2),
(365, 14, 18, 2, 1),
(366, 16, 18, 2, 1),
(367, 18, 18, 2, 1),
(368, 20, 18, 1, 0),
(369, 15, 10, 2, 0),
(370, 17, 10, 2, 1),
(371, 19, 10, 0, 4),
(372, 16, 10, 2, 0),
(373, 18, 10, 4, 1),
(374, 20, 10, 1, 4),
(375, 21, 8, 2, 0),
(376, 22, 8, 0, 4),
(377, 21, 10, 1, 4),
(378, 22, 10, 2, 1),
(379, 23, 8, 2, 0),
(380, 24, 8, 0, 1),
(381, 25, 8, 3, 0),
(382, 26, 8, 1, 0),
(383, 27, 8, 2, 1),
(384, 21, 12, 1, 2),
(385, 22, 12, 0, 2),
(386, 23, 12, 1, 2),
(387, 24, 12, 1, 2),
(388, 25, 12, 3, 1),
(389, 21, 6, 1, 3),
(390, 22, 6, 0, 2),
(391, 23, 6, 0, 1),
(392, 24, 6, 2, 0),
(393, 25, 6, 1, 2),
(394, 21, 17, 2, 4),
(395, 22, 17, 1, 3),
(396, 23, 17, 2, 0),
(397, 24, 17, 1, 3),
(398, 25, 17, 3, 1),
(399, 26, 17, 2, 6),
(400, 27, 17, 1, 2),
(401, 21, 4, 2, 1),
(402, 22, 4, 1, 2),
(403, 23, 4, 1, 0),
(404, 24, 4, 2, 1),
(405, 25, 4, 0, 2),
(406, 21, 18, 1, 3),
(407, 22, 18, 1, 2),
(408, 23, 18, 2, 1),
(409, 24, 18, 1, 2),
(410, 25, 18, 1, 2),
(411, 21, 26, 3, 1),
(412, 22, 26, 2, 1),
(413, 23, 26, 1, 2),
(414, 24, 26, 0, 1),
(415, 25, 26, 1, 2),
(416, 21, 33, 1, 4),
(417, 22, 33, 2, 4),
(418, 23, 10, 2, 0),
(419, 24, 10, 1, 2),
(420, 25, 10, 2, 1),
(421, 26, 10, 2, 0),
(422, 27, 10, 3, 1),
(423, 23, 33, 2, 0),
(424, 24, 33, 3, 2),
(425, 25, 33, 2, 1),
(426, 26, 33, 2, 1),
(427, 26, 18, 1, 2),
(428, 27, 18, 1, 2),
(429, 24, 29, 0, 1),
(430, 25, 29, 2, 1),
(431, 26, 29, 2, 0),
(432, 27, 29, 3, 1),
(433, 26, 12, 2, 1),
(434, 27, 12, 1, 2),
(435, 26, 26, 2, 1),
(436, 27, 26, 2, 1),
(437, 27, 4, 0, 1);

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
(48, 'Winter', 2024, 4);

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
(1, 'Julian', '$2y$10$3nVzanPMrLTqx.Ikn6KB.umP5.F.PI.6Zvre/xmlfKzHXTYW.Tgie', 1),
(2, '1111', '$2y$10$CHtiKWvX3I9NQEvzDeNP5OzS2xufChJE4qDI5mduTRptGNZX7XJdG', 1),
(3, 'Hasi', '$2y$10$n.jqxx6iCGwyIa.CIN/DLeFcBPgFqi8HGs.6CafvPLM2fbT.hJyFO', 1),
(4, 'Jonas', '$2y$10$x1epTxVlgiZJFUx4BiPObOatUxe/qOT.2P8C0Fky9DZvvhwjnj22q', 1),
(5, 'JoBeKo', '$2y$10$/ldnXh0H7kIkebNZQqTT.eg//tXcdNzj5QyJp36uDoLF/DXyIPe5C', 1),
(6, 'Koppi', '$2y$10$VdIeE6givqqbkAF8srgZL.lZBvAtXD0ZJOoiqANzSeJQtWxbMzR36', 1),
(7, 'derSnoppa', '$2y$10$0TnmMORSFZIzEw4Rghp5n.0Yoj0QRQPTmhazQ6VAUut4cgMwEYhrO', 1),
(8, 'Snyder', '$2y$10$niJ2D8oap4VHZa6BOJ0Px.q64mPHzUxXkyz8ghG8SyklAchuYZ4wa', 1),
(9, 'Schalkeandy', '$2y$10$5ZRQzRzFze4dS970kaBvqOi3Vzh.9Mf97HSl9cMCTgVHSD59I2.Zu', 1),
(10, 'Schaefi19', '$2y$10$vwZ7mRt5SfmAMcHICqbdpenbAvrHBZfmcooe1cisbzRuhwf.oLbUS', 1),
(11, 'Nockel', '$2y$10$6iwxLWOLTviXYOQ9h1rEXe8l9phmU2NAdlV1zl560rm726HUDiPh2', 1),
(12, 'Lauri', '$2y$10$P3QlFi8uizzRT67pQyrfV.Ol13YH6IciDhidx4g.LxvbFq8KACfqG', 1),
(13, 'Lauri JCD', '$2y$10$Prlwvfa/4kauEBNch4dJ..MxxqXFhKjhC.TRh6W7fCmuQ7xeRqV0W', 1),
(14, 'maximilian', '$2y$10$ZHUoeTiDRsjba3p1hzAWcuZ5db020F4bY0cdJYtuOQS5EXsw6btWO', 1),
(15, 'PaulR00', '$2y$10$0J.MRHZ3UIcm2zqOoHFvcOFqE12YPAvR6./4SkYJxYYH1ON1.cG/2', 1),
(16, 'Kocina Kulow', '$2y$10$wAEL1u6wPdN3zU1WBHIDHOK0Dtq.yp8ytaxCKTs4hWr7rtEGOAojS', 1),
(17, 'Maximilian Grimm', '$2y$10$Rj2biHzbpCcJ1taW78tx1.nmlF/WrpDslfeCY1Y2R1vxW3wIQdQUe', 1),
(18, 'Noel Sauer', '$2y$10$OsjwHiphEujl1AcSdKQtC.zgEQJBCwoCiJDGEMyejhjKLW2R/Gvry', 1),
(19, 'Moppy', '$2y$10$Fh2NR0npqO.6WmaBbaBZnelrQmEh6/1vBFhSIgESStWEwZIB4qz06', 1),
(20, 'Joergel', '$2y$10$ne59ltXTMvJnEFtqPaIW3uQfTSRdv.a3xW66B588/q5Rk7QkQ5hiC', 1),
(21, 'Marlon', '$2y$10$bc3vrLLgXRDOpT7TBtUBA.h6qtom137d8r7iVof/FCYr9CMxdwgOy', 1),
(22, 'juritielemans', '$2y$10$dZSuSJp4YRnElH9/7g70nuBAv4K7uU0w4axIQb3L7KNHzfoS6Szqe', 1),
(23, 'jurjanz', '$2y$10$CoBdDo5TGNsWw1LdzaGAH.P45i61FatQJWCorbIqK/ZQcm.vyEjFG', 1),
(24, 'LisiWi', '$2y$10$X5.oReF1LPxTHGF.PB08G.y6aq/.adNSADAOSzwkjHIc/MvaKkVgq', 1),
(25, 'Elias RichterE', '$2y$10$bkehOjgVmtNUPSRBzl6id.xltCdCf3rpy/yKQAky.7iOrb1BslTs2', 1),
(26, 'Tritziiii', '$2y$10$0iFbUSzjweWnnrler2ysAOG1I0mAJXuogeh9bmdNhS3lSYEyvomsO', 1),
(27, 'Elias richter', '$2y$10$YMItImzE56OK9xC8Uk9CwOBsqRq/0cVMVdMJGk3gO603Tr2oyffUW', 1),
(28, 'Elias der Don', '$2y$10$XlKR7tusZs8W2yKKf3sjrufHYkRWP5hlhT1NOhcIMQRdyby9NEjZW', 1),
(29, 'Johanna', '$2y$10$5pvtj2SQjSUS8thZ9PEyTeENc.7lMXDdV3vuL5hCnCB7OdeSzSt0.', 1),
(30, 'Magda', '$2y$10$/bWuoDfIQ0jytIHMuXLaFuBW.R.BZlOqjExArp0lW9ePFI7IiXUoq', 1),
(31, 'MAGDALENA', '$2y$10$vgVLDT3VvrxJMZ5Ohb8hLOUj1KSKOyM7M3gYuOPcU3rreDbXKABT2', 1),
(32, 'Philipp', '$2y$10$.qObS88pzvhmlQFjM3KCh.pgJZmsW5m4bJb0HjzqcZXkEBLqzeTG6', 1),
(33, 'Clemens', '$2y$10$.dsQS0.dAWwk6ZJYrgpjcOigYzcjEa8KhMy17OUXeryNu6.VzS5Bq', 1),
(34, 'Dennis Bilik', '$2y$10$opckzWIeFwHqjIlDsxYLNe/Bn3VaxpcZdQZsBUdD6/0NDesu.T71C', 1),
(35, 'mkockert', '$2y$10$JS0lOBwWMNuiXFSTEitfcOZ7Y8XFhH5p7U5srkQ3ewuLmAxWekit.', 1),
(36, 'afeilke1', '$2y$10$/uoZTbhfg/g4Xj5PZQxtOOsp7mqqn8hSAJ2DIQmdUezFrHKFq1cya', 0);

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
  MODIFY `Mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT für Tabelle `spiel`
--
ALTER TABLE `spiel`
  MODIFY `Spielid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT für Tabelle `tipp`
--
ALTER TABLE `tipp`
  MODIFY `Tippid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=438;

--
-- AUTO_INCREMENT für Tabelle `tunier`
--
ALTER TABLE `tunier`
  MODIFY `Tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `Userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
