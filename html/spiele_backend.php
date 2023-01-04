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

}

class Tipp
{
    public $tippid
    public $uid;
    public $sid;
    public $tippA;
    public $tippB;
}

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

function getSpiel($db, $id){
    $leereMannschaft = new Mannschaft();
    $leereMannschaft-> mid = 0;
    $leereMannschaft-> name = '-';
    $leereMannschaft-> abkuerzung = '-';
    $leereMannschaft-> bild = 'non.png';

    $sqlspiel = $db->query("SELECT `Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` FROM `spiel` WHERE Spielid=".$id);
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
    }
    return $jspiel;
}


$getaction = htmlspecialchars($_GET["action"]);
$postaction = htmlspecialchars($_POST["action"]);
error_reporting(0);

if($getaction = "getSpiele"){
    $spiele = $db->query("SELECT `Spielid`, `Phase`, `ToreA`, `ToreB`, `MA`, `MB` FROM `spiel`");
    $jspiele = array();
    $i = 0;
    $leereMannschaft = new Mannschaft();
    $leereMannschaft-> mid = 0;
    $leereMannschaft-> name = '-';
    $leereMannschaft-> abkuerzung = '-';
    $leereMannschaft-> bild = 'non.png';

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
            $jspiele[$i] ->toreA = 0;
        } else {
            $jspiele[$i] ->toreA = $row->ToreA;
        }

        if($row->MB == NULL){
            $jspiele[$i] ->mB = $leereMannschaft;
        } else {
            $jspiele[$i] ->mB = getMannschaft($db, $row->MB);
        }

        if($row->ToreB == NULL){
            $jspiele[$i] ->toreB = 0;
        } else {
            $jspiele[$i] ->toreB = $row->ToreB;
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

if ($getaction = "getTipps"){

    $tipps = $db->query("SELECT `Tippid`, `Spielid`, `ToreA`, `ToreB` FROM `tipp` WHERE `Userid` =".$_SESSION['KC']['Userid']);
    $jtipps = array();
    $i = 0;


    foreach($tipps as $row){
        $jtipps[$i] = new Tipp();
        $jspiele[$i] ->tippid = $row->Tippid;
        $jspiele[$i] ->sid =  getSpiel($db, $row->Spielid);
        $jspiele[$i] ->tippA =  $row->ToreA;
        $jspiele[$i] ->tippB =  $row->ToreB;

        
       // $jspiele[$i] ->mB = getMannschaft($db, $row->MB);
        //$jspiele[$i] ->toreB = $row->ToreB;
        $i++;
    }

    $jsonArray = ' { "Tipps" : [';
        foreach($jspiele as $s){
            $jsonArray = $jsonArray.json_encode($s).",";
        }
        $jsonArray = substr($jsonArray, 0, -1)."]}";

        echo $jsonArray;


}


if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if($_POST['action'] == "setTipp"){
        $stmt = $db->prepare("INSERT INTO `tipp`(`Spielid`, `Userid`, `ToreA`, `ToreB`) VALUES (:Spielid, :Userid, :ToreA, :ToreB)");
        $stmt->bindParam("Userid", $_SESSION['KC']['Userid']);

        $stmt->bindParam("Spielid", $_POST["Spielid"]);
        $stmt->bindParam("ToreA", $_POST["ToreA"]);
        $stmt->bindParam("ToreB", $_POST["ToreB"]);
        $stmt->execute();
    
    }

}



