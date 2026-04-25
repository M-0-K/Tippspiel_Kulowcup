USE `tippspiel`;

CREATE TABLE IF NOT EXISTS `schiedsrichter` (
  `Sid` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `spiel` ADD COLUMN IF NOT EXISTS `Schiri_ID` int(11) DEFAULT NULL;

INSERT IGNORE INTO `schiedsrichter` (`Sid`, `Name`) VALUES 
(1, 'Fixi Hartman'), 
(2, 'Lexi Hartman'), 
(3, 'Max Mustermann'), 
(4, 'Paul Lehman'),
(5, 'Donald Trump');