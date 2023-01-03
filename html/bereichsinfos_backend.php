<?php

if (!isset($_SESSION)) {
    session_start(); // SESSION-Verwaltung starten
}
//------------------------------------------------------------------------------
date_default_timezone_set("Europe/Berlin");
//------------------------------------------------------------------------------
include '../script/db_connection.php';
//------------------------------------------------------------------------------

$done = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $benutzer_id = intval($_SESSION['wt13']['user_id']);

    if ($_POST['action'] == 'store' AND strlen($_POST['infotext']) > 0 AND isset($_POST['bereichsid'])) {

        $bereich_id = intval($_POST['bereichsid']);
        $eintragstitel = "Titel";
        $eintragsinhalt = strip_tags(trim($_POST['infotext']));

        $db_eingabe = $db->prepare("INSERT INTO bereichseintrag (k_id, bereich_id, eintragstitel, eintragsinhalt) "
                ."VALUES (:k_id, :bereich_id, :eintragstitel, :eintragsinhalt)");

        $params = [':k_id' => $_SESSION['WT13']['K_id'], ':bereich_id' => $bereich_id, ':eintragstitel' => $eintragstitel, ':eintragsinhalt' => $eintragsinhalt];
        $db_eintrag = $db_eingabe->execute($params);
        if ($db_eintrag) {
            $done = true;
        }
    }

    if ($_POST['action'] == 'delete' AND isset($_POST['eintragid'])) {

        $eintrag_id = intval($_POST['eintragid']);

        $db_delete = $db->prepare("DELETE FROM bereichseintrag WHERE k_id = :k_id AND beintrag_id = :beintrag_id");
        $params = [':k_id' => $_SESSION['WT13']['K_id'], ':beintrag_id' => $eintrag_id];
        $db_query = $db_delete->execute($params);
        if ($db_query) {
            $done = true;
        }
    }

}

header("Content-type: text/html; carset=utf-8");
if ($done == true) {
    echo "Aufgabe erledigt.";
} else {
    echo "Die Aufgabe konnte nicht ausgeführt werden.";
}