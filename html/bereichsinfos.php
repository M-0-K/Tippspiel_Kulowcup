<?php
if (!isset($_SESSION)) {
    session_start(); // SESSION-Verwaltung starten
}

if($_SESSION['WT13']['login'] !== 'ok'){
    exit(header("Location:login.php"));
}

date_default_timezone_set("Europe/Berlin"); // Zeitzone korrekt setzen
include '../script/db_connection.php'; // DB-Verbindung herstellen
//----------------------------------------------
$title = "Bereichsinformationen verwalten";
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <link href="../css/index.css" rel="stylesheet" type="text/css"/>
        <script src="../script/jquery-3.6.0.min.js" type="text/javascript"></script>
        <style>
            p {
                margin: 1px;
            }
            div.bereich {

                padding: 5px;
                margin: 5px;
                width: 30%;
                border: solid black;
                 height: 500px;
                background-color: lightgray;
            }

            p.plus_gross {
                font-size: 1.2rem; 
                font-weight: bold; 
                text-align:right; 
                padding-right: 5px;
            }
            .delbutton {
                font-size: 7pt;
                color: red;
                padding: 0px;
                height: 18px;
                width: 35px;
                text-align: center;
            }
    
    
            h3{
                font-weight: bold;
    
            }

            .muelleimer {
                display: inline-block;
                position: relative;
                top: 5px;
                left: 95%;
            }
            
            .row {
                display: flex;
                align-items : center;
                justify-content : center;
        
             }

             .inhalt {
                background-color: white;
                margin: 5px;
                border: thin solid black;
                min-height: 10px;
                padding: 2px;
                margin: 2px 0px;
                border-radius: 5px;
            }

        </style>
        <script>
             var xhr = new XMLHttpRequest();

function eingabe(element, bereichsid) {
    let ziel = element;
    let info = prompt("Geben Sie eine Info ein");
    if (info.length >= 2) {
        // jquery - vor dem ausgewählten Element wird div erzeugt (geht auch mit .insertBefore)
        $(ziel).before('<div class="inhalt">' + info + '<br><p style="font-size: 0.7rem; color: red; margin: 0px; text-align: right;" onclick="entfernen(this);">delete</p></div>');
        dbeintrag(info, bereichsid);
    }
}

function entfernen(element, eintragid) {
    let button = element;
    let ziel = button.parentElement.parentElement;
    ziel.parentElement.removeChild(ziel);
    xhr.open('POST', 'bereichsinfos_backend.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("action=delete&eintragid=" + eintragid);
}


function dbeintrag(info, bereichsid) {
    xhr.open('POST', 'bereichsinfos_backend.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = infoanzeige;
    xhr.send("action=store&infotext=" + info + "&bereichsid=" + bereichsid);
}

function infoanzeige() {
    try {
        let DONE = 4; // readyState 4 means the request is done.
        let OK = 200; // status 200 is a successful return.
        if (xhr.readyState === DONE) {
            if (xhr.status === OK) {
                console.log(xhr.responseText);
            } else {
                console.log('Error: ' + xhr.status);
            }
        }
        location.reload();
    } catch (e) {
        alert('Caught Exception: ' + e.description);
    }
}
</script>
</head>

<body>
<header>
<h2><?php echo $title; ?></h2>
</header>
<div class="row">
<?php
$abfrage = $db->query("SELECT bereich_id, bezeichnung FROM bereich ORDER BY bezeichnung");
foreach ($abfrage as $bereich) {
    echo "<div class='bereich'><h3>$bereich->bezeichnung</h3>";
    //echo "SELECT bereichseintrag_id, eintragstitel, eintragsinhalt FROM bereichseintrag WHERE bereich_id='" . $bereich->bereich_id . "'";
    $abfrage_infos = $db->query("SELECT beintrag_id, eintragstitel, eintragsinhalt FROM bereichseintrag WHERE bereich_id='" . $bereich->bereich_id . "'");
    foreach ($abfrage_infos as $info) {
        //echo "<div class='inhalt'><h4>$info->eintragstitel</h4>$info->eintragsinhalt";
        echo "<div class='inhalt'>$info->eintragsinhalt <br> ";
        echo "<div class='muelleimer'><img src='../data/muelleimer.png' style='text-align: center;' width='30px' alt='löschen'onclick='entfernen(this, $info->beintrag_id);'></div></div>";
    }
    echo "<p class='plus_gross' onclick='eingabe(this, $bereich->bereich_id);'>&#10011;</p>";
    echo "</div>";
}
?>
</div>
</body>

</html>