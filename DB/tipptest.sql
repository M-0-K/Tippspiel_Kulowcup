
// Ein einfaches SQL Script, um die einzelnen Spiele nach Kategorien mit zufälligen Ergebnissen zu füllen.

Update spiel set ToreA = NULL, ToreB = NULL , Status = 0 where ToreA is not NULL;

Update spiel set ToreA = ROUND(RAND() * 6), ToreB = ROUND(RAND() * 6), Status = 2 where ToreA is NULL AND Phase = "A";
Update spiel set ToreA = ROUND(RAND() * 6), ToreB = ROUND(RAND() * 6), Status = 2 where ToreA is NULL AND Phase = "B";
Update spiel set ToreA = ROUND(RAND() * 6), ToreB = ROUND(RAND() * 6), Status = 2 where ToreA is NULL AND Phase = "VF";
Update spiel set ToreA = ROUND(RAND() * 6), ToreB = ROUND(RAND() * 6), Status = 2 where ToreA is NULL AND Phase = "HF";
Update spiel set ToreA = ROUND(RAND() * 6), ToreB = ROUND(RAND() * 6), Status = 1 where ToreA is NULL AND Phase = "BF";
Update spiel set ToreA = ROUND(RAND() * 6), ToreB = ROUND(RAND() * 6), Status = 1 where ToreA is NULL AND Phase = "TF";