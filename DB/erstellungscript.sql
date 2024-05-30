CREATE TABLE `mannschaft` (
  `Mid` int(11) PRIMARY KEY AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Abkuerzung` varchar(255) NOT NULL,
  `Bild` varchar(255) NOT NULL
);

CREATE TABLE `tunier` (
  `Tid` int(11) PRIMARY KEY AUTO_INCREMENT,
  `Saison` enum('Sommer','Winter') NOT NULL,
  `Jahr` int(11) NOT NULL,
  `Gewinner` int(11),
  FOREIGN KEY (`Gewinner`) REFERENCES `mannschaft`(`Mid`)
);

CREATE TABLE `spiel` (
  `Spielid` int(11) PRIMARY KEY AUTO_INCREMENT,
  `Phase` varchar(4) NOT NULL,
  `ToreA` int(4),
  `ToreB` int(4),
  `MA` int(11),
  `MB` int(11),
  `Tunier` int(11),
  `Status` BOOLEAN DEFAULT 0,
  FOREIGN KEY (`MA`) REFERENCES `mannschaft`(`Mid`),
  FOREIGN KEY (`MB`) REFERENCES `mannschaft`(`Mid`),
  FOREIGN KEY (`Tunier`) REFERENCES `tunier`(`Tid`)
);

CREATE TABLE `user` (
  `Userid` int(11) PRIMARY KEY AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Enabled` BOOLEAN DEFAULT 0
);

CREATE TABLE `tipp` (
  `Tippid` int(11) PRIMARY KEY AUTO_INCREMENT,
  `Spielid` int(11) NOT NULL,
  `Userid` int(11) NOT NULL,
  `ToreA` int(11) NOT NULL,
  `ToreB` int(11) NOT NULL,
  FOREIGN KEY (`Spielid`) REFERENCES `spiel`(`Spielid`),
  FOREIGN KEY (`Userid`) REFERENCES `user`(`Userid`)
);

INSERT INTO `mannschaft` (`Name`, `Abkuerzung`, `Bild`) VALUES
('Flames of Pils', 'FoP', 'fop.svg'),
('WD-40', 'WD4', 'wd40.svg'),
('Lange Garde', 'LG', 'lg.svg'),
('Kulowminati', 'KM', 'kulowminati.svg'),
('Kocina Kulow', 'KK', 'kk.svg'),
('Kulow Section', 'KS', 'ks.svg'),
('Gut Kickerz', 'GK', 'gutkickerz.svg'),
('Feiglinge', 'FG', 'fg.svg'),
('Dorftrottel', 'DT', 'dt.svg'),
('Grüne Garde', 'GG', 'gruene_garde.svg'),
('Bottles', '', 'bottles.svg'),
('Club der Einfallslosen', 'CDE', 'club_der_einfallslosen.svg'),
('Club ohne Namen', 'CON', 'con.svg'),
('Company of Kulow', 'COK', 'cok.svg'),
('Commodors', 'COM', 'commodors.svg'),
('Crackers', 'CRK', 'crackers.svg'),
('Die Anderen', 'AND', 'die_anderen.svg'),
('Die immer Blauen', 'DIB', 'dib.svg'),
('Die Kurzen', 'DK', 'dk.svg'),
('DSF', 'DSF', 'dsf.svg'),
('Gewerkschaft', 'GW', 'gewerkschaft.svg'),
('KDB', 'KDB', 'kdb.svg'),
('Kingston Club', 'KC', 'kingston_club.svg'),
('Kombinat', 'KBN', 'kombinat.svg'),
('Kopflos e.Vau', 'KPF', 'kopflos.svg'),
('Kulow Angels', 'KA', 'kulow_angels.svg'),
('Kulow Chaos', 'KCH', 'kulow_chaos.svg'),
('RC Ungelenk', 'RC', 'rcungelenk.svg'),
('Smarties', 'SMT', 'smarties.svg'),
('Smofojs', 'SMF', 'smofojs.svg'),
('UCT', 'UCT', 'uct.svg'),
('Iwans', 'IW', 'iwans.svg'),
('JC Dörgenhausen', 'JCD', 'jc_doergenhausen.svg'),
('Söffner', 'SOE', 'soeffner.svg');

INSERT INTO `tunier` (`Saison`, `Jahr`, `Gewinner`) VALUES
('Sommer', 1990, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Iwans')),
('Sommer', 1991, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Club der Einfallslosen')),
('Sommer', 1992, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kulow Angels')),
('Sommer', 1993, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kulow Angels')),
('Sommer', 1994, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Club der Einfallslosen')),
('Sommer', 1995, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kulow Angels')),
('Sommer', 1996, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kulow Angels')),
('Sommer', 1997, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kulow Angels')),
('Sommer', 1998, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kopflos e.Vau')),
('Sommer', 1999, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Commodors')),
('Sommer', 1999, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kingston Club')),
('Sommer', 2000, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Smofojs')),
('Sommer', 2001, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kopflos e.Vau')),
('Sommer', 2002, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'RC Ungelenk')),
('Sommer', 2003, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kopflos e.Vau')),
('Sommer', 2004, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'RC Ungelenk')),
('Sommer', 2005, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Smofojs')),
('Sommer', 2006, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kulow Chaos')),
('Sommer', 2007, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Gewerkschaft')),
('Sommer', 2008, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Smofojs')),
('Sommer', 2008, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kulow Chaos')),
('Sommer', 2009, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Company of Kulow')),
('Sommer', 2010, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'DSF')),
('Sommer', 2011, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kulow Chaos')),
('Sommer', 2012, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'DSF')),
('Sommer', 2013, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'DSF')),
('Sommer', 2014, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Gewerkschaft')),
('Sommer', 2015, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kulowminati')),
('Sommer', 2016, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Company of Kulow')),
('Sommer', 2017, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Söffner')),
('Sommer', 2018, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kulowminati')),
('Sommer', 2019, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'DSF')),
('Sommer', 2020, NULL),
('Sommer', 2021, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'JC Dörgenhausen')),
('Sommer', 2022, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kocina Kulow')),
('Sommer', 2023, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Grüne Garde')),
('Sommer', 2024, NULL);

INSERT INTO `spiel` ( `Phase`, `ToreA`, `ToreB`, `MA`, `MB`, `Status`, `Tunier`) VALUES 
('A', 1, 2, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'KDB'), (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kombinat'), 1, (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('A', 3, 0, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Company of Kulow'), (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kopflos e.Vau'), 1, (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('A', 0, 1, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kulowminati'), (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'JC Dörgenhausen'), 1, (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('A', 0, 1, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Gewerkschaft'), (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kocina Kulow'), 1, (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('B', 1, 1, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Grüne Garde'), (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Lange Garde'), 1, (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('B', 2, 1, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Flames of Pils'), (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'WD-40'), 1, (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('B', 3, 0, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Gut Kickerz'), (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Dorftrottel'), 1, (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('B', 2, 1, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Feiglinge'), (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kulow Section'), 1, (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('A', 2, 2, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Club der Einfallslosen'), (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Commodors'), 1, (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('A', 0, 1, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Bottles'), (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Die Anderen'), 1, (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('A', 3, 1, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Company of Kulow'), (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kingston Club'), 1, (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('A', 2, 1, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Crackers'), (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Die immer Blauen'), 1, (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('B', 0, 0, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Die Kurzen'), (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'DSF'), 1, (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('B', 0, 1, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Feiglinge'), (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'KDB'), 1, (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('B', 1, 2, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'JC Dörgenhausen'), (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Gewerkschaft'), 1, (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('B', 1, 3, (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kopflos e.Vau'), (SELECT `Mid` FROM `mannschaft` WHERE `Name` = 'Kulowminati'), 1, (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('VF', NULL, NULL, NULL, NULL, 0 , (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('VF', NULL, NULL, NULL, NULL, 0 , (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('VF', NULL, NULL, NULL, NULL, 0 , (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('VF', NULL, NULL, NULL, NULL, 0 , (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('HF', NULL, NULL, NULL, NULL, 0 , (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('HF', NULL, NULL, NULL, NULL, 0 , (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023)),
('TF', NULL, NULL, NULL, NULL, 0 , (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023));
('BF', NULL, NULL, NULL, NULL, 0 , (SELECT `Tid` FROM `tunier` WHERE `Saison` = 'Sommer' AND `Jahr` = 2023));

INSERT INTO `user` (`Username`, `Password`, `Enabled`) VALUES 
('Max', '[hashed_password]', 1),
('Anna', '[hashed_password]', 1),
('Peter', '[hashed_password]', 1),
('Julian', '[hashed_password]', 1);


INSERT INTO `tipp` (`Spielid`, `Userid`, `ToreA`, `ToreB`) VALUES
(5, 1, 1, 2), 
(5, 2, 2, 1), 
(5, 3, 2, 2), 
(6, 1, 3, 0), 
(6, 2, 2, 2), 
(6, 3, 1, 2), 
(7, 1, 1, 1), 
(7, 2, 2, 1), 
(7, 3, 1, 2), 
(8, 1, 3, 2), 
(8, 2, 1, 2), 
(8, 3, 2, 2); 