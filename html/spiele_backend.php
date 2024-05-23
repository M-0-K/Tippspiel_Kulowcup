<?php
error_reporting(0);

if (!isset($_SESSION)) {
    session_start();
}
/*
if($_SESSION['KC']['login'] !== 'ok'){
  exit(header("Location:login.php"));
}
*/
error_reporting(0);

include '../script/db_connection.php'; // DB-Verbindung herstellen

error_reporting(0);
class Mannschaft{
    public $id;
    public $name;
    public $abkuerzung;
    public $bild;
}

class Spiel
{   
    public $sid;
    public $phase;
    public $mA;
    public $toreA;
    public $mB;
    public $toreB;
    public $status;

}

class Tipp
{
    public $tippid;
    public $uid;
    public $sid;
    public $tippA;
    public $tippB;
}

class User
{
    public $userid;
    public $username;
    //public $tipps;
    public $punkte;
}

class Spieletipps{
    public $userid;
    public $spiel;
    public $tipp;
}

function getMannschaft($db, $id){
    $sqlmannschaft = $db->query("SELECT `Mid`, `Name`, `Abkuerzung`, `Bild` FROM mannschaft WHERE Mid=".$id);
    $mannschaft = new Mannschaft();
    foreach($sqlmannschaft as $row){
        $mannschaft -> mid =  $row->Mid;
        $mannschaft -> name =  $row->Name;
        $mannschaft -> abkuerzung =  $row->Abkuerzung;
        $mannschaft -> bild =  $row->Bild;
    }
    return $mannschaft;
}

function getSpiel($db, $id){
    $leereMannschaft = new Mannschaft();
    $leereMannschaft-> mid = 0;
    $leereMannschaft-> name = '-';
    $leereMannschaft-> abkuerzung = '-';
    $leereMannschaft-> bild = 'non.png';
    $leereMannschaft-> status = 0;

    $sqlspiel = $db->query("SELECT `Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB`, `Status` FROM `spiel` WHERE Spielid=".$id);
    $jspiel = new Spiel();
    foreach($sqlspiel as $row){
        $jspiel ->sid = $row->Spielid;
        $jspiel->phase = $row->Phase;

        if($row->MA == NULL){
            $jspiel->mA = $leereMannschaft;
            //echo $row->Spielid;
        } else {
            $jspiel ->mA = getMannschaft($db, $row->MA);
        }

        if($row->ToreA == NULL){
            $jspiel ->toreA = 0;
        } else {
            $jspiel ->toreA = $row->ToreA;
        }

        if($row->MB == NULL){
            $jspiel->mB = $leereMannschaft;
        } else {
            $jspiel ->mB = getMannschaft($db, $row->MB);
        }

        if($row->ToreB == NULL){
            $jspiel ->toreB = 0;
        } else {
            $jspiel->toreB = $row->ToreB;
        }
        if($row->Status == NULL){
            $jspiel ->status = 0;
        } else {
            $jspiel->status = $row->Status;
        }
    }
    return $jspiel;
}


function getPunkte($db, $id){
    error_reporting(1);
    $punkte = 0;
    
    $sqltipps = $db->query(
    "   SELECT `Tippid`, tipp.Spielid, tipp.ToreA AS 'tA' , tipp.ToreB AS 'tB' , spiel.ToreA AS 'sA',  spiel.ToreB AS 'sB' FROM tipp 
        INNER JOIN spiel ON tipp.Spielid = spiel.Spielid 
        WHERE spiel.Status = 1 AND Userid = ".$id);
    
    foreach($sqltipps as $row){
        if ($row->tA == $row->sA && $row->tB == $row->sB) {
            // Spieler hat das Spielergebnis richtig vorhergesagt
            $punkte = $punkte + 4;
        } elseif (($row->tA - $row->tB) == ($row->sA - $row->sB)) {
            // Spieler hat die Tordifferenz richtig vorhergesagt
            $punkte = $punkte + 3;
        } elseif (($row->tA > $row->tB && $row->sA > $row->sB) || ($row->tA < $row->tB && $row->sA < $row->sB)) {
            // Spieler hat die Spieltendenz (Sieg, Niederlage oder Unentschieden) richtig vorhergesagt
            $punkte = $punkte + 2;
        } else {
            // Spieler hat falsch getippt
            $punkte = $punkte + 0;
        }

    }
    return $punkte;
}


$getaction = htmlspecialchars($_GET["action"]);
$postaction = htmlspecialchars($_POST["action"]);
error_reporting(0);

if($getaction == "getSpiele"){
    $spiele = $db->query("SELECT `Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB`, `Status` FROM `spiel`");
    $jspiele = array();
    $i = 0;
    $leereMannschaft = new Mannschaft();
    $leereMannschaft-> mid = 0;
    $leereMannschaft-> name = '-';
    $leereMannschaft-> abkuerzung = '-';
    $leereMannschaft-> bild = 'non.png';
    $leereMannschaft-> status = 0;

    foreach($spiele as $row){
        $jspiele[$i] = new Spiel();
        $jspiele[$i] ->sid = $row->Spielid;
        $jspiele[$i] ->phase = $row->Phase;

        if($row->MA == NULL){
            $jspiele[$i] ->mA = $leereMannschaft;
            //echo $row->Spielid;
        } else {
            $jspiele[$i] ->mA = getMannschaft($db, $row->MA);
        }

        if($row->ToreA == NULL){
            $jspiele[$i] ->toreA = null;
        } else {
            $jspiele[$i] ->toreA = $row->ToreA;
        }

        if($row->MB == NULL){
            $jspiele[$i] ->mB = $leereMannschaft;
        } else {
            $jspiele[$i] ->mB = getMannschaft($db, $row->MB);
        }

        if($row->ToreB == NULL){
            $jspiele[$i] ->toreB = null;
        } else {
            $jspiele[$i] ->toreB = $row->ToreB;
        }

        if($row->Status == NULL){
            $jspiele[$i] ->status = 0;
        } else {
            $jspiele[$i]->status = $row->Status;
        }
        
        
       // $jspiele[$i] ->mB = getMannschaft($db, $row->MB);
        //$jspiele[$i] ->toreB = $row->ToreB;
        $i++;
    }

    $jsonArray = ' { "Spiele" : [';
        foreach($jspiele as $s){
            $jsonArray = $jsonArray.json_encode($s).",";
        }
        $jsonArray = substr($jsonArray, 0, -1)."]}";

        echo $jsonArray;

}

if ($getaction == "getTipps"){

    $tipps = $db->query("SELECT `Tippid`, `Spielid`, `ToreA`, `ToreB` FROM `tipp` WHERE `Userid` =".$_SESSION['KC']['Userid']);
    $jtipps = array();
    $i = 0;


    foreach($tipps as $row){
        $jtipps[$i] = new Tipp();
        $jtipps[$i] ->tippid = $row->Tippid;
        $jtipps[$i] ->sid =  getSpiel($db, $row->Spielid);
        $jtipps[$i] ->tippA =  $row->ToreA;
        $jtipps[$i] ->tippB =  $row->ToreB;

        
       // $jspiele[$i] ->mB = getMannschaft($db, $row->MB);
        //$jspiele[$i] ->toreB = $row->ToreB;
        $i++;
    }

    $jsonArray = ' { "Tipps" : [';
        foreach($jtipps as $s){
            $jsonArray = $jsonArray.json_encode($s).",";
        }
        $jsonArray = substr($jsonArray, 0, -1)."]}";

        echo $jsonArray;


}




if ($getaction == "getPunkte"){

    $tipps = $db->query("SELECT `Userid`, `Username`, `Password` FROM `user`");
    $jtipps = array();
    $i = 0;
    foreach($tipps as $row){
        
        $jtipps[$i] = new User();
        $jtipps[$i] ->username = $row->Username;
        $jtipps[$i] ->userid =  $row->Userid;
        
        $jtipps[$i] ->punkte =  getPunkte($db, $row->Userid);
        $i++;
        
    }

    usort($jtipps, function($a, $b) {
        return $b->punkte - $a->punkte;
    });

    $jsonArray = ' { "User" : [';
        foreach($jtipps as $s){
            $jsonArray = $jsonArray.json_encode($s).",";
        }
        $jsonArray = substr($jsonArray, 0, -1)."]}";

    echo $jsonArray;


}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "setTipp") {
    error_reporting(E_ALL);
    // Hier muss geprüft werden ob schon ein Eintrag da ist und ob der Eintrag gemacht werden darf
    
    // Parameter vorbereiten
    $userid = $_SESSION['KC']['Userid'];
    $spielid = $_POST["Spielid"];
    $toreA = $_POST["ToreA"];
    $toreB = $_POST["ToreB"];

    // SQL-Abfrage, um zu überprüfen, ob das Spiel bereits läuft
    $statement = $db->prepare("SELECT Status FROM spiel WHERE Spielid = :Spielid");
    $statement->execute(array('Spielid' => $spielid));
    $status = $statement->fetch(PDO::FETCH_ASSOC);

    // Prüfe, ob das Spiel schon läuft
    if ($status && $status['Status'] == '1') {
        echo "Das Spiel läuft bereits. Tipps können nicht mehr abgegeben werden.";
    } else {
        // SQL-Abfrage, um zu überprüfen, ob ein Tipp bereits existiert
        $statement = $db->prepare("SELECT Tippid FROM tipp WHERE Userid = :Userid AND Spielid = :Spielid");
        $statement->execute(array('Userid' => $userid, 'Spielid' => $spielid));
        $zeile = $statement->fetch(PDO::FETCH_ASSOC);

        // Prüfen, ob ein Eintrag gefunden wurde
        if ($zeile) {
            // Update-Anweisung, wenn der Tipp bereits existiert
            $stmt = $db->prepare("UPDATE tipp SET ToreA = :ToreA, ToreB = :ToreB WHERE Userid = :Userid AND Spielid = :Spielid");
        } else {
            // Insert-Anweisung, wenn der Tipp noch nicht existiert
            $stmt = $db->prepare("INSERT INTO tipp (Spielid, Userid, ToreA, ToreB) VALUES (:Spielid, :Userid, :ToreA, :ToreB)");
        }

        // Parameter binden und ausführen
        $new = $stmt->execute(array('Userid' => $userid, 'Spielid' => $spielid, 'ToreA' => $toreA, 'ToreB' => $toreB));

        // Ergebnis ausgeben
        echo $new ? "Tipp erfolgreich gespeichert." : "Fehler beim Speichern des Tipps.";
    }
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}




