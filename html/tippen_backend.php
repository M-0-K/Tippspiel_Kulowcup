<?php
error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
if($_SESSION['KC']['login'] !== 'ok'){
  exit(header("Location:login.php"));
}

error_reporting(0);

include '../script/db_connection.php'; // DB-Verbindung herstellen

function getMannschaft($db, $id){
    $sqlmannschaft = $db->query("SELECT `Mid`, `Name`, `Abkuerzung`, `Bild` FROM Mannschaft WHERE Mid=".$id);
    $mannschaft = new Mannschaft();
    foreach($sqlmannschaft as $row){
        $mannschaft -> mid =  $row->Mid;
        $mannschaft -> name =  $row->Name;
        $mannschaft -> abkuerzung =  $row->Abkuerzung;
        $mannschaft -> bild =  $row->Bild;
    }
    return $mannschaft;
}


$getaction = htmlspecialchars($_GET["action"]);
$postaction = htmlspecialchars($_POST["action"]);

if($getaction = "getSpiele"){
    $spiele = $db->query("SELECT `Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` FROM `spiel`");
    $jspiele = array();
    $i = 0;
    foreach($spiele as $row){
        $jspiele[$i] = new Spiel();
        $jspiele[$i] ->sid = $row->Spielid;
        $jspiele[$i] ->phase = $row->Phase;
        $jspiele[$i] ->mA = getMannschaft($db, $row->MA);
        $jspiele[$i] ->toreA = $row->ToreA;
        $jspiele[$i] ->mB = getMannschaft($db, $row->MB);
        $jspiele[$i] ->toreB = $row->ToreB;
        $i++;
    }

    $jsonArray = ' { "Spiele" : [';
        foreach($jspiele as $s){
            $jsonArray = $jsonArray.json_encode($s).",";
        }
        $jsonArray = substr($jsonArray, 0, -1)."]}";

        echo $jsonArray;
}