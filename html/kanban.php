<?php
error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
if($_SESSION['WT13']['login'] !== 'ok'){
    exit(header("Location:login.php"));
}


date_default_timezone_set("Europe/Berlin"); // Zeitzone korrekt setzen
include '../script/db_connection.php'; // DB-Verbindung herstellen
//----------------------------------------------
$title = "Meine Aufgabeverwaltung";
$buttontext = 'speichern';
//------------------------------------------------------------------------------
if (isset($_GET)) {
    if ($_GET['status'] === 'offen' or $_GET['status'] === 'begonnen' or $_GET['status'] === 'erledigt') {
        $update_aufgabe = "UPDATE aufgabe SET status='$_GET[status]' WHERE a_id ='$_GET[id]' AND K_id='{$_SESSION['WT13']['K_id']}'";
        $sql_status = $db->query($update_aufgabe);
    }
    if ($_GET['aktion'] === 'delete') {
        $aufgabe_entfernen = "DELETE FROM aufgabe WHERE a_id='$_GET[id]' AND K_id='{$_SESSION['WT13']['K_id']}'";
        $sql_status = $db->query($aufgabe_entfernen);
    }
    if ($_GET['aktion'] === 'edit') {
        $buttontext = 'ändern';
        $aufgabedetails = "SELECT * FROM aufgabe WHERE a_id='$_GET[a_id]'";
        $sql_status = $db->query($aufgabedetails);
        foreach ($sql_status as $aufgabeinfo) {
            $aufgabetext = $aufgabeinfo->aufgabe;
            $aufgabeotiz = $aufgabeinfo->bemerkung;
            $aufgabetermin = date("Y-m-d", strtotime($aufgabeinfo->termin));
        }
    }
}
//------------------------------------------------------------------------------
if (isset($_POST['speichern'])) {

    foreach ($_POST as $key => $value) { // Leerzeichen entfernen, Sonderzeichen kodieren
        $neueaufgabe[$key] = trim(htmlentities($value, ENT_QUOTES, "utf-8"));
    }
    $aufgabetermin = date("Y-m-d", strtotime($neueaufgabe['termin']));
    if (isset($_POST['a_id'])) {
        $aufgabe_speichern = "REPLACE INTO aufgabe (a_id, K_id, bezeichnung, termin, bemerkung) VALUES ('{$_POST['a_id']}','{$_SESSION['WT13']['K_id']}','$neueaufgabe[bezeichnung]','$aufgabetermin','$neueaufgabe[bemerkung]')";
    } else {
        $stmt = $db->prepare("INSERT INTO aufgabe(K_id, bezeichnung, termin, bemerkung) VALUES(:K_id, :bezeichnung, :termin, :bemerkung)");
        $stmt->bindParam("K_id", $_SESSION['WT13']['K_id']);
        $stmt->bindParam("bezeichnung", $_POST['bezeichnung']);
        $stmt->bindParam("termin", $aufgabetermin);
        $stmt->bindParam("bemerkung", $_POST['bemerkung']);
        $stmt->execute();
    }
}
//-------------------- alte Termine löschen ------------------------------------
if (isset($_GET)) {
    if (isset($_GET['delete']) and $_GET['delete'] === 'termine_alt') {
        $ds_loeschen = "DELETE FROM aufgabe WHERE K_id='" . $_SESSION['WT13']['K_id'] . "' AND status='erledigt'";
        $db_erg = $db->query($ds_loeschen);

        if (!$db_erg) {
            die("<h3>Fehler beim Datenbankzugriff!</h3>");
        } else {
            $anzahl_ds = $db_erg->rowCount();
            $db_status = "$anzahl_ds Einträge wurden gelöscht.";
            echo "<script>alert('$db_status');</script>";
        }
    }
}
//------------------------------------------------------------------------------
$morgen = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")));
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="../css/index.css">

    <script>
        function switch_bemerkung() {
            var bemerkung = document.getElementById('bemerkung');

            if (bemerkung.style.display === 'none') {
                bemerkung.style.display = 'inline';
            } else {
                bemerkung.style.display = 'none';
            }
        }

        function abfrage() {
            var eingabe;
            eingabe = confirm("Möchten Sie wirklich löschen?");
            if (eingabe === true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</head>

<style> 


    .row {
        display: flex;
        align-items : center;
        justify-content : center;
        
    }

    .col {
        padding: 5px;
        margin: 5px;
        width: 30%;
        border: solid black;
        height: 500px;
        background-color: lightgray;
    }

  
    


</style>

<body onload="document.getElementById('bezeichnung').focus();">
    <header>
        <h2><?php echo $title; ?></h2>
    </header>

    <div>
        <form action="kanban.php?" method="POST"> <?php // ? um GET-Array zu leeren      
                                                    ?>
            <fieldset style="width: 99%; margin: auto; text-align: center; border: 0px solid black;">
                <label for="bezeichnung" onclick="document.getElementById('bezeichnung').value = '';document.getElementById('termin').value = '';document.getElementById('submitbutton').value = 'speichern';">Aufgabe:</label>
                <input class="formulare" type="text" name="bezeichnung" id="bezeichnung" style="width: 400px;" required="required" value="<?php echo $aufgabetext; ?>">
                <input class="register" type="button" value="Beschreibung" onclick="switch_bemerkung();">
                <label for="termin">Termin: </label>
                <input class="formulare" type="date" name="termin" id="termin" value="<?php
                                                                                        if (isset($aufgabetermin)) {
                                                                                            echo $aufgabetermin;
                                                                                        } else {
                                                                                            echo $morgen;
                                                                                        }
                                                                                        ?>">
                <input class="register" type="submit" name="speichern" id="submitbutton" value="<?php echo $buttontext; ?>" style="margin-left: 20px;">
                <a href="kanban.php?"><input class="register" type='button' value="neue Aufgabe"></a>
                <br>
                <input class="formulare" type="text" name="bemerkung" id='bemerkung' placeholder="Beschreibung der Aufgabe" value="<?php echo $aufgabeotiz; ?>" style="width: 90%; margin: 10px auto;  display: none;">
                <?php
                if (isset($_GET['a_id'])) {
                    echo "<input type='hidden' name='a_id' value='{$_GET['a_id']}'>";
                }
                ?>
            </fieldset>
        </form>
    </div>

    <div class="row" style="width: 100%;">
        <div class="col">
            <h3 style="font-weight: bold; color: red">offen</h3>
            <table style="width: 100%;">
                <?php
                $abfrage_aufgabe = "SELECT a_id, bezeichnung, termin AS datum, DATE_FORMAT(termin,'%d.%m.') AS termin, bemerkung, status FROM aufgabe WHERE K_id='{$_SESSION['WT13']['K_id']}' ORDER BY datum, bezeichnung";
                $aufgabeliste = $db->query($abfrage_aufgabe);
                foreach ($aufgabeliste as $aufgabe) {
                    if ($aufgabe->status === 'offen') {
                        echo "<tr>";
                        echo "<td style='min-width: 40px;'>";
                        echo "$aufgabe->termin:&nbsp;";
                        echo "</td>";
                        echo "<td title='$aufgabe->bemerkung'>";
                        echo "<a href='?a_id=$aufgabe->a_id&aktion=edit'>$aufgabe->bezeichnung</a> ";
                        echo "</td>";
                        echo "<td style='min-width: 36px; float: right;'>";
                        echo "<a href='?id=$aufgabe->a_id&status=begonnen'><img src='../data/begonnen.png' class='schalter' title='begonnen' alt='begonnen'width='30px'/></a>";
                        echo "<a href='?id=$aufgabe->a_id&status=erledigt'><img src='../data/erledigt.png' class='schalter' title='erledigt' alt='erledigt'width='30px'/></a> ";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>
        <div class="col">
            <h3 style="font-weight: bold; color: orange">begonnen</h3>
            <table style="width: 100%;">
                <?php
                $abfrage_aufgabe = "SELECT a_id, bezeichnung, DATE_FORMAT(termin,'%d.%m.') AS termin, bemerkung, status FROM aufgabe WHERE K_id='{$_SESSION['WT13']['K_id']}' ORDER BY termin";
                $aufgabeliste = $db->query($abfrage_aufgabe);
                foreach ($aufgabeliste as $aufgabe) {
                    if ($aufgabe->status === 'begonnen') {
                        echo "<tr>";
                        echo "<td style='min-width: 40px;'>";
                        echo "$aufgabe->termin:&nbsp;";
                        echo "</td>";
                        echo "<td title='$aufgabe->bemerkung'>";
                        echo "<span style='font-style: italic;'>$aufgabe->bezeichnung</span>";
                        echo "</td>";
                        echo "<td style='min-width: 36px; float: right;'>";
                        echo "<a href='?id=$aufgabe->a_id&status=offen'><img src='../data/offen.png' class='schalter' title='offen' alt='offen'width='30px'/></a>";
                        echo "<a href='?id=$aufgabe->a_id&status=erledigt'><img src='../data/erledigt.png' class='schalter' title='erledigt' alt='erledigt'width='30px'/></a> ";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>
        <div class="col">
            <h3 style="font-weight: bold; color: green">erledigt</h3>
            <table style="width: 100%;">
                <?php
                $anz_erledigt = 0;
                $abfrage_aufgabe = "SELECT a_id, bezeichnung, DATE_FORMAT(termin,'%d.%m.') AS termin, bemerkung, status FROM aufgabe WHERE K_id='{$_SESSION['WT13']['K_id']}' ORDER BY termin";
                $aufgabeliste = $db->query($abfrage_aufgabe);
                foreach ($aufgabeliste as $aufgabe) {
                    if ($aufgabe->status === 'erledigt') {
                        $anz_erledigt++;
                        echo "<tr>";
                        echo "<td style='min-width: 40px;'>";
                        echo "$aufgabe->termin:&nbsp;";
                        echo "</td>";
                        echo "<td title='$aufgabe->bemerkung'>";
                        echo "<span style='text-decoration: line-through; opacity: 0.7;'>$aufgabe->bezeichnung</span>";
                        echo "</td>";
                        echo "<td style='min-width: 52px; float: right;'>";
                        echo "<a href='?id=$aufgabe->a_id&status=offen'><img src='../data/offen.png' class='schalter' title='offen' alt='offen' width='30px'/></a>";
                        echo "<a href='?id=$aufgabe->a_id&status=begonnen'><img src='../data/begonnen.png' class='schalter' title='begonnen' alt='begonnen' width='30px'/></a>";
                        echo "<a href='?id=$aufgabe->a_id&aktion=delete'><img src='../data/muelleimer.png' class='schalter delete' title='Aufgabe löschen' alt='löschen' width='30px'/></a> ";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
            <?php
            if ($anz_erledigt > 0) {
            ?>
                <a href="kanban.php?delete=termine_alt" class="link_button" onclick='return abfrage();' title="alle erledigten aufgabe löschen" style="margin: 10px auto; padding-left: 18px; width: 240px; background-image: url('../bilder/papierkorb-mini.png'); background-repeat: no-repeat; background-position: 5px 3px; font-size: 0.95rem; font-weight: normal; ">
                    alle erledigten aufgabe löschen
                </a>
            <?php
            }
            ?>
        </div>
    </div>
    <div style="position: relative; text-align: center; padding-top: 6px; clear: both; border: none; font-family: Georgia; font-style: italic;">
    </div>
</body>

</html>