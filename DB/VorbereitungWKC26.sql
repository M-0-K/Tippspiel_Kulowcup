START TRANSACTION;

-- Falls es die IDs schon gibt: erst löschen (optional, aber praktisch beim Neu-Lauf)
DELETE FROM mannschaft
WHERE Mid BETWEEN 1001 AND 1020;

-- A1..A10 (1001..1010)
INSERT INTO mannschaft (Mid, Name, Abkuerzung, Bild) VALUES
(1001, 'A1', 'A1', 'non.png'),
(1002, 'A2', 'A2', 'non.png'),
(1003, 'A3', 'A3', 'non.png'),
(1004, 'A4', 'A4', 'non.png'),
(1005, 'A5', 'A5', 'non.png'),
(1006, 'A6', 'A6', 'non.png'),
(1007, 'A7', 'A7', 'non.png'),
(1008, 'A8', 'A8', 'non.png'),
(1009, 'A9', 'A9', 'non.png'),
(1010, 'A10','A10','non.png');

-- B1..B10 (1011..1020)
INSERT INTO mannschaft (Mid, Name, Abkuerzung, Bild) VALUES
(1011, 'B1', 'B1', 'non.png'),
(1012, 'B2', 'B2', 'non.png'),
(1013, 'B3', 'B3', 'non.png'),
(1014, 'B4', 'B4', 'non.png'),
(1015, 'B5', 'B5', 'non.png'),
(1016, 'B6', 'B6', 'non.png'),
(1017, 'B7', 'B7', 'non.png'),
(1018, 'B8', 'B8', 'non.png'),
(1019, 'B9', 'B9', 'non.png'),
(1020, 'B10','B10','non.png');

-- Auto-Increment nach oben schieben, damit echte Teams nicht versehentlich in den Bereich laufen
ALTER TABLE mannschaft AUTO_INCREMENT = 2000;

INSERT INTO spiel
(Phase, ToreA, ToreB, MA, MB, Feld, Tunier, Status, Uhrzeit)
VALUES
-- Gruppenphase (laut Turnierplan-Bild)

-- 11:30  Gruppe A  A1 vs A4
('A', NULL, NULL, 1001, 1004, 1, 51, 0, '2026-01-03 11:30:00'),

-- 11:45  Gruppe B  B1 vs B4
('B', NULL, NULL, 1011, 1014, 1, 51, 0, '2026-01-03 11:45:00'),

-- 12:00  Gruppe A  A2 vs A3
('A', NULL, NULL, 1002, 1003, 1, 51, 0, '2026-01-03 12:00:00'),

-- 12:15  Gruppe B  B2 vs B3
('B', NULL, NULL, 1012, 1013, 1, 51, 0, '2026-01-03 12:15:00'),

-- 12:30  Gruppe A  A4 vs A2
('A', NULL, NULL, 1004, 1002, 1, 51, 0, '2026-01-03 12:30:00'),

-- 12:45  Gruppe B  B4 vs B2
('B', NULL, NULL, 1014, 1012, 1, 51, 0, '2026-01-03 12:45:00'),

-- 13:00  Gruppe A  A1 vs A3
('A', NULL, NULL, 1001, 1003, 1, 51, 0, '2026-01-03 13:00:00'),

-- 13:15  Gruppe B  B1 vs B3
('B', NULL, NULL, 1011, 1013, 1, 51, 0, '2026-01-03 13:15:00'),

-- 13:30  Gruppe A  A1 vs A2
('A', NULL, NULL, 1001, 1002, 1, 51, 0, '2026-01-03 13:30:00'),

-- 13:45  Gruppe B  B1 vs B2
('B', NULL, NULL, 1011, 1012, 1, 51, 0, '2026-01-03 13:45:00'),

-- 14:00  Gruppe A  A3 vs A4
('A', NULL, NULL, 1003, 1004, 1, 51, 0, '2026-01-03 14:00:00'),

-- 14:15  Gruppe B  B3 vs B4
('B', NULL, NULL, 1013, 1014, 1, 51, 0, '2026-01-03 14:15:00');

COMMIT;

INSERT INTO `spiel`
(`Phase`, `ToreA`, `ToreB`, `MA`, `MB`, `Feld`, `Tunier`, `Status`, `Uhrzeit`)
VALUES


-- Halbfinale
('HF', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 14:30:00'),
('HF', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 15:00:00'),

-- Platzierungsspiele
('U5', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 15:30:00'),
('U7', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 16:00:00'),

-- Spiel um Platz 3
('U3', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 16:15:00'),

-- Turnierfinale
('TF', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 16:30:00');



Kocina Kulow → 5 
Grüne Garde → c
Oberschule Wittichenau → 37
FOPxFeiglinge → 40 
Gut Kickers → 7 
JC Dörgenhausen → 33
Kulowminati → 4
Kulow Section → 6

UPDATE spiel
SET
  MA = CASE
    WHEN MA = 1001 THEN 1
    WHEN MA = 1002 THEN 2
    WHEN MA = 1003 THEN 3
    WHEN MA = 1004 THEN 4
    WHEN MA = 1011 THEN 5
    WHEN MA = 1012 THEN 6
    WHEN MA = 1013 THEN 7
    WHEN MA = 1014 THEN 8
    ELSE MA
  END,
  MB = CASE
    WHEN MB = 1001 THEN 1
    WHEN MB = 1002 THEN 2
    WHEN MB = 1003 THEN 3
    WHEN MB = 1004 THEN 4
    WHEN MB = 1011 THEN 5
    WHEN MB = 1012 THEN 6
    WHEN MB = 1013 THEN 7
    WHEN MB = 1014 THEN 8
    ELSE MB
  END
WHERE Tunier = 51
  AND (
    MA IN (1001,1002,1003,1004,1011,1012,1013,1014)
    OR
    MB IN (1001,1002,1003,1004,1011,1012,1013,1014)
  );



