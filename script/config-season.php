<?php
/**
 * Kulowcup Jahreszeit-Konfiguration
 * Ermittelt automatisch, ob das aktuelle Turnier ein Sommer- oder Winterturnier ist.
 * Grundlage ist die Tabelle `tunier` (Spalte `Saison`) und die CURRENT_TURNIER-ID.
 */

// Standard: Sommer, falls DB/Turnier nicht erreichbar ist
$kulowcupSeason = 'sommer';

try {
	// DB-Verbindung laden (stellt $db und $_ENV['CURRENT_TURNIER'] bereit)
	require_once __DIR__ . '/db_connection.php';

	// Aktuelles Turnier ermitteln
	$currentTid = 0;
	if (isset($_ENV['CURRENT_TURNIER'])) {
		$currentTid = (int) $_ENV['CURRENT_TURNIER'];
	} elseif (getenv('CURRENT_TURNIER')) {
		$currentTid = (int) getenv('CURRENT_TURNIER');
	}

	if ($currentTid > 0 && isset($db) && $db instanceof PDO) {
		$stmt = $db->prepare('SELECT Saison FROM tunier WHERE Tid = :tid LIMIT 1');
		$stmt->execute([':tid' => $currentTid]);
		$row = $stmt->fetch();

		if ($row && !empty($row->Saison)) {
			// DB-Werte sind 'Sommer' oder 'Winter' -> auf kleingeschriebenes Mapping abbilden
			$saison = strtolower($row->Saison);
			$kulowcupSeason = ($saison === 'winter') ? 'winter' : 'sommer';
		}
	}
} catch (Throwable $e) {
	// Bei Fehlern in der DB-Abfrage einfach bei der Default-Saison bleiben
}

// Globale Konstante für das Frontend/CSS
if (!defined('KULOWCUP_SEASON')) {
	define('KULOWCUP_SEASON', $kulowcupSeason); // 'sommer' oder 'winter'
}
