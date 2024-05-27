-- SQL Erstellungsscript 

CREATE TABLE `mannschaft` (
  `Mid` int(11) PRIMARY KEY AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Abkuerzung` varchar(255) NOT NULL,
  `Bild` varchar(255) NOT NULL
);



CREATE TABLE `spiel` (
  `Spielid` int(11) PRIMARY KEY AUTO_INCREMENT,
  `Phase` varchar(4) NOT NULL,
  `ToreA` int(11),
  `ToreB` int(11),
  `MA` int(11) ,
  `MB` int(11) ,
  `Status` BOOLEAN
);

CREATE TABLE `tipp` (
  `Tippid` int(11) PRIMARY KEY AUTO_INCREMENT,
  `Spielid` int(11) NOT NULL,
  `Userid` int(11) NOT NULL,
  `ToreA` int(11) NOT NULL,
  `ToreB` int(11) NOT NULL
);

CREATE TABLE `user` (
  `Userid` int(11) PRIMARY KEY AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Enabled` BOOLEAN DEFAULT 0
);

Alter Table spiel Add constraint beinhaltet1 foreign key(MA) references mannschaft(Mid);
Alter Table spiel Add constraint beinhaltet2 foreign key(MB) references mannschaft(Mid);

Alter Table tipp Add constraint bekommt foreign key(Spielid) references spiel(Spielid);
Alter Table tipp Add constraint gehoert foreign key(Userid) references user(Userid);




 
--

INSERT INTO `mannschaft` (`Mid`, `Name`, `Abkuerzung`, `Bild`) VALUES
(1, 'Flames of Pils', 'FoP', 'fop.png'),
(2, 'WD-40', 'WD4', 'wd40.png'),
(3, 'Lange Garde', 'LG', 'lg.png'),
(4, 'Kulowminati', 'KM', 'kulowminati.png'),
(5, 'Kocina Kulow', 'KK', 'kk.png'),
(6, 'Kulow Section', 'KS', 'ks.png'),
(7, 'Gut Kickerz', 'GK', 'gutkickerz.png'),
(8, 'Feiglinge', 'FG', 'fg.png'),
(9, 'Dorftrottel', 'DT', 'dt.png'),
(10, 'Grüne Garde', 'GG', 'gg.png'),
(11, 'Bottles','','bottles.svg'),
(12, 'Club der Einfallslosen','CDE','club_der_einfallslosen.svg'),
(13, 'Club ohne Namen','CON','con.svg'),
(14, 'Company of Kulow','COK','cok.svg'),
(15, 'Commodors','COM','commodors.svg'),
(16, 'Crackers','CRK','crackers.svg'),
(17, 'Die Anderen','AND','die_anderen.svg'),
(18, 'Die immer Blauen','DIB','dib.svg'),
(19, 'Die Kurzen','DK','dk.svg'),
(20, 'DSF','DSF','dsf.svg'),
(21, 'Gewerkschaft','GW','gewerkschaft.svg'),
(22, 'KDB','KDB','kdb.svg'),
(23, 'Kingston Club','KC','kingston_club.svg'),
(24, 'Kombinat','KBN','kombinat.svg'),
(25, 'Kopflos e.Vau','KPF','kopflos.svg'),
(26, 'Kulow Angels','KA','kulow_angels.svg'),
(27, 'Kulow Chaos','KCH','kulow_chaos.svg'),
(28, 'RC Ungelenk','RC','rcungelenk.svg'),
(29, 'Smarties','SMT','smarties.svg'),
(30, 'Smofojs','SMF','smofojs.svg'),
(31, 'UCT','UCT','uct.svg');



INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'A', '1', '2', '1', '2', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'A', '2', '2', '1', '3', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'A', '2', '2', '1', '4', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'A', '3', '2', '1', '5', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'A', '3', '2', '2', '3', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'A', '5', '2', '2', '4', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'A', NULL, NULL, '2', '5', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'A', NULL, NULL, '3', '4', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'A', NULL, NULL, '3', '5', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'A', NULL, NULL, '4', '5', NULL);

INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'B', '3', '2', '6', '7', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'B', '4', '2', '6', '8', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'B', '3', '2', '6', '9', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'B', '6', '2', '6', '10', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'B', '3', '2', '7', '8', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'B', NULL, NULL, '7', '9', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'B', NULL, NULL, '7', '10', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'B', NULL, NULL, '8', '9', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'B', NULL, NULL, '8', '10', NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'B', NULL, NULL, '9', '10', NULL);

INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'U3', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `spiel` (`Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` ,`Status`) VALUES (NULL, 'U1', NULL, NULL, NULL, NULL, NULL);



INSERT INTO `user`(`Username`, `Password`) VALUES ('Mike','[value-3]');
INSERT INTO `user`(`Username`, `Password`) VALUES ('Ike','[value-3]');
INSERT INTO `user`(`Username`, `Password`) VALUES ('Ricke','[value-3]');

INSERT INTO `tipp`(`Spielid`, `Userid`, `ToreA`, `ToreB`) VALUES ('1','1','2','3');
INSERT INTO `tipp`(`Spielid`, `Userid`, `ToreA`, `ToreB`) VALUES ('1','2','2','1');
INSERT INTO `tipp`(`Spielid`, `Userid`, `ToreA`, `ToreB`) VALUES ('1','3','3','6');
INSERT INTO `tipp`(`Spielid`, `Userid`, `ToreA`, `ToreB`) VALUES ('2','1','2','3');
INSERT INTO `tipp`(`Spielid`, `Userid`, `ToreA`, `ToreB`) VALUES ('2','2','2','1');
INSERT INTO `tipp`(`Spielid`, `Userid`, `ToreA`, `ToreB`) VALUES ('2','3','3','6');


