<?php

if (!isset($_SESSION)) {
    session_start();
}


session_write_close();
//Sitzungsdaten können nicht für long polling verwendet werden. evtl. friert der Browsers vollständig ein
ignore_user_abort(true); //Script automatisch stoppen, wenn Browser die Anforderung unterbricht
set_time_limit(0); //maximale Ausführungszeit auf unendlich gesetzt
//------------------------------------------------------------------------------
include_once("../script/db_connection.php");
//------------------------------------------------------------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['store'] == 'true') {

        $eingabetext = strip_tags(trim($_POST['eingabetext']));

        $db_eingabe = $db->prepare("INSERT INTO `chatdaten`(`k_id`, `beitrag`, `anzeige`) VALUES (:k_id, :beitrag, 'j')");
        $params = [':k_id' => $_SESSION['WT13']['K_id'], ':beitrag' => $eingabetext];
        $db_eintrag = $db_eingabe->execute($params);
    }

//------------------------------------------------------------------------------   
    if (isset($_POST['anz_ds']) AND intval($_POST['anz_ds']) > 2) {
        $anz_ds = intval($_POST['anz_ds']);
    } else {
        $anz_ds = 16;
    }
//------------------------------------------------------------------------------
    if (isset($_POST['last_ds'])) {
        $last_ds = intval($_POST['$anz_ds']);
    } else {
        $last_ds = 0;
    }
    $dbabfrage = true;
//------------------------------------------------------------------------------
    while ($dbabfrage === true) {
        $abfrage_id = $db->query("SELECT max(e_id) AS lastId FROM chatdaten");
        $result_id = $abfrage_id->fetch();
        $last_id = intval($result_id->lastId);

        if ($last_ds < $last_id) {
            $abfrage = "SELECT e_id, DATE_FORMAT(eintragszeitpunkt, '%d.%m.%y %H:%i') AS datum, nachname, beitrag FROM chatdaten INNER JOIN Kunde ON Kunde.K_id = chatdaten.k_id ORDER BY eintragszeitpunkt DESC LIMIT $anz_ds";
            $result = $db->query($abfrage); // Abfrage ausführen

            $data = $result->fetchAll();
            if ($data) {
                $dbdata = json_encode($data);
            }
            $dbabfrage = false;
        }
        //usleep(10); // Ruhezeit in Millisekunden
        sleep(1); // Ruhezeit in Sekunden
    }
//------------------------------------------------------------------------------
//json-Zeichenkette zurückgeben
    if (isset($dbdata)) {
        header("Content-type: text/html; carset=utf-8");
        echo $dbdata;
    }
}

