INSERT INTO `spiel`
(`Phase`, `ToreA`, `ToreB`, `MA`, `MB`, `Feld`, `Tunier`, `Status`, `Uhrzeit`)
VALUES
-- Gruppe A
('A', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 11:30:00'),
('A', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 12:00:00'),
('A', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 12:30:00'),
('A', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 13:00:00'),
('A', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 13:30:00'),
('A', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 14:00:00'),

-- Gruppe B
('B', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 11:45:00'),
('B', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 12:15:00'),
('B', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 12:45:00'),
('B', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 13:15:00'),
('B', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 13:45:00'),
('B', NULL, NULL, NULL, NULL, 1, 51, 0, '2026-01-03 14:15:00'),

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

-- Ausführen nachdem alle Manschaften gelost wurden (IDs anpassen)
DELETE FROM `spiel` WHERE `Tunier` = 51;

Kocina Kulow → 5 
Grüne Garde → 10
Oberschule Wittichenau → 37
FOPxFeiglinge → 40 
Gut Kickers → 7 
JC Dörgenhausen → 33
Kulowminati → 4
Kulow Section → 6

INSERT INTO `spiel`
(`Phase`, `ToreA`, `ToreB`, `MA`, `MB`, `Feld`, `Tunier`, `Status`, `Uhrzeit`)
VALUES
-- Gruppe A
('A', NULL, NULL, WILD1, WILD3, 1, 51, 0, '2026-01-03 11:30:00'),
('A', NULL, NULL, WILD1, WILD4, 1, 51, 0, '2026-01-03 12:00:00'),
('A', NULL, NULL, WILD2, WILD3, 1, 51, 0, '2026-01-03 12:30:00'),
('A', NULL, NULL, WILD2, WILD4, 1, 51, 0, '2026-01-03 13:00:00'),
('A', NULL, NULL, WILD3, WILD4, 1, 51, 0, '2026-01-03 13:30:00'),
('A', NULL, NULL, WILD2, WILD1, 1, 51, 0, '2026-01-03 14:00:00'),

-- Gruppe B
('B', NULL, NULL, WILD5, WILD7, 1, 51, 0, '2026-01-03 11:45:00'),
('B', NULL, NULL, WILD5, WILD8, 1, 51, 0, '2026-01-03 12:15:00'),
('B', NULL, NULL, WILD6, WILD7, 1, 51, 0, '2026-01-03 12:45:00'),
('B', NULL, NULL, WILD6, WILD8, 1, 51, 0, '2026-01-03 13:15:00'),
('B', NULL, NULL, WILD7, WILD8, 1, 51, 0, '2026-01-03 13:45:00'),
('B', NULL, NULL, WILD6, WILD5, 1, 51, 0, '2026-01-03 14:15:00'),
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


