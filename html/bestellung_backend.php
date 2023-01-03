<?php
error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
if($_SESSION['WT13']['login'] !== 'ok'){
  exit(header("Location:login.php"));
}

error_reporting(0);

include '../script/db_connection.php'; // DB-Verbindung herstellen

class Geraet
{   
    public $dabei;
    public $G_id;
    public $Bezeichnung;
    public $Mietpreisklasse1;
    public $Mietpreisklasse2;
    public $Mietpreisklasse3;
    public $Produktgruppe;
}

class Bestellung 
{
    public $B_id;
    public $K_id;
    public $bestellliste;
    public $Abgabe;
    public $Rueckgabe;
}


class bestellt
{
    public $be_id;
    public $geraet;
    public $status;
}


$getaction = htmlspecialchars($_GET["action"]);
$postaction = htmlspecialchars($_POST["action"]);

    if($getaction == "getGeraet"){
        //$bgeraete = $db->query("SELECT `B_id`, geraet.`G_id`, `Bezeichnung`, `Mietpreisklasse1`, `Mietpreisklasse2`, `Mietpreisklasse3`, `Produktgruppe` FROM `geraet` LEFT OUTER JOIN bestellt ON bestellt.G_id = geraet.G_id  WHERE B_id =".$_SESSION['WT13']['B_id']." GROUP BY geraet.`G_id`;");
        $geraete = $db->query("SELECT * FROM `geraet`");
        $jgereaete = array(); 
        $i = 0;
        foreach($geraete as $row){
            $jgereaete[$i] = new Geraet();
            $da = false;
            $bgeraete = $db->query("SELECT `B_id`, geraet.`G_id`, `Bezeichnung`, `Mietpreisklasse1`, `Mietpreisklasse2`, `Mietpreisklasse3`, `Produktgruppe` FROM `geraet` LEFT OUTER JOIN bestellt ON bestellt.G_id = geraet.G_id  WHERE B_id =".$_SESSION['WT13']['B_id']." GROUP BY geraet.`G_id`;");
            foreach($bgeraete as $brow){
                //echo $brow->G_id ." Hier ";
                if($brow->G_id == $row->G_id){
                    $da = true;
                    break;
                }else {$da = false;}
            }
        $jgereaete[$i]->dabei = $da;
        $jgereaete[$i]->G_id = $row->G_id;
        $jgereaete[$i]->Bezeichnung = $row->Bezeichnung;
        $jgereaete[$i]->Mietpreisklasse1 = $row->Mietpreisklasse1;
        $jgereaete[$i]->Mietpreisklasse2 = $row->Mietpreisklasse2; 
        $jgereaete[$i]->Mietpreisklasse3 = $row->Mietpreisklasse3;
        $jgereaete[$i]->Produktgruppe = $row->Produktgruppe;
        $i++;
        }

        $jsonArray = '{ "geraete" : [';
        foreach($jgereaete as $g){
            $jsonArray = $jsonArray.json_encode($g).",";
        }
        $jsonArray = substr($jsonArray, 0, -1)."]}";

        echo $jsonArray;
    }

    if($getaction == "getBestellung"){
        $dbbestellung = $db->query("SELECT `B_id`, `K_id`, `Abgabe`, `Rueckgabe` FROM `bestellung` WHERE K_id = ".$_SESSION['WT13']['K_id']);
        $abestell = array(); 
        $i = 0;
        foreach($dbbestellung as $row){
            
            
            //$bestellt = $db->query("SELECT `be_id`, `G_id`, `Status` FROM `bestellt` WHERE `B_id` = ".$id.";");
            $bestellt = $db->query("SELECT `be_id`, `G_id`, `Status` FROM `bestellt` WHERE `B_id` = ".$row->B_id.";");
            $j = 0;
            $b = null;
            foreach($bestellt as $rowb){
                $b[$j] = new bestellt();
                $b[$j]->be_id = $rowb->be_id;
                $g = new Geraet;

                $geraete = $db->query("SELECT `G_id`, `Bezeichnung`, `Mietpreisklasse1`, `Mietpreisklasse2`, `Mietpreisklasse3`, `Produktgruppe` FROM `geraet` WHERE `G_id` = ".$rowb->G_id.";");
                foreach($geraete as $rowg){
                    $g->G_id = $rowg->G_id;
                    $g->Bezeichnung = $rowg->Bezeichnung;
                    $g->Mietpreisklasse1 = $rowg->Mietpreisklasse1;
                    $g->Mietpreisklasse2 = $rowg->Mietpreisklasse2; 
                    $g->Mietpreisklasse3 = $rowg->Mietpreisklasse3;
                    $g->Produktgruppe = $rowg->Produktgruppe;
                    $i++;
                }
                $b[$j]->geraet = $g;
                $b[$j]->Status = $rowb->Status;
                $j++; 
            }

            $abestell[$i] = new Bestellung();
            $abestell[$i]->B_id = $row->B_id;    
            $abestell[$i]->K_id = $_SESSION['WT13']['K_id'];  
            $abestell[$i]->bestellliste = $b;
            $abestell[$i]->Abgabe = $row->Abgabe; 
            $abestell[$i]->Rueckgabe = $row->Rueckgabe;
            $i++;
        }

        $jsonArray = '{ "bestellung" : [';
        foreach($abestell as $g){
            $jsonArray = $jsonArray.json_encode($g).",";
        }
        $jsonArray = substr($jsonArray, 0, -1)."]}";

        echo $jsonArray;
        
    }
    


    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        
        

        if($_POST['action'] == "setBestellung"){
            $stmt = $db->prepare("INSERT INTO `bestellung`(`K_id`, `Abgabe`, `Rueckgabe`) VALUES (:K_id, :Abgabe, :Rueckgabe)");
            $stmt->bindParam("K_id", $_SESSION['WT13']['K_id']);
            $stmt->bindParam("Abgabe", $_POST["Abgabe"]);

            $stmt->bindParam("Rueckgabe", $_POST["Rueckgabe"]);
            echo $_SESSION['WT13']['K_id'];
            echo $_POST["Abgabe"];
            echo $_POST["Rueckgabe"];
            echo $_POST['action'];
            
            $stmt->execute();
            //echo $stmt;

            $id = $db->query("SELECT MAX(B_id) as B_id FROM bestellung");
            foreach($id as $nid){
                $_SESSION['WT13']['B_id'] = $nid->B_id;
                echo $nid->B_id;
            }
            
        }
    
        if($_POST['action'] == "setBestellt"){
            $stmt = $db->prepare("INSERT INTO `bestellt`(`G_id`, `B_id`, `Status`) VALUES (:G_id, :B_id, 0)");
            $stmt->bindParam("G_id", htmlspecialchars($_POST["G_id"]));
            $stmt->bindParam("B_id", $_SESSION['WT13']['B_id']);
            $stmt->execute();

        }
    
        if($_POST['action'] == "delBestellt"){
            $stmt = $db->prepare("DELETE FROM `bestellt` WHERE G_id = :G_id AND B_id = :B_id");
            $stmt->bindParam("B_id", $_SESSION['WT13']['B_id']);
            $stmt->bindParam("G_id", htmlspecialchars($_POST["G_id"]));
            $stmt->execute();
        }

        if($_POST['action'] == "setB_id"){
            $_SESSION['WT13']['B_id'] = htmlspecialchars($_POST["B_id"]);
        }

        if($_POST['action'] == "delBestellung"){
            $stmt = $db->prepare("DELETE FROM `bestellt` WHERE B_id = :B_id");
            $stmt->bindParam("B_id", htmlspecialchars($_POST["B_id"]));	
            $stmt->execute();

            $stmt = $db->prepare("DELETE FROM `bestellung` WHERE B_id = :B_id");
            $stmt->bindParam("B_id", htmlspecialchars($_POST["B_id"]));	
            $stmt->execute();
        }
    }



    function getbestellt($id){
       // echo "SELECT `be_id`, `G_id`, `Status` FROM `bestellt` WHERE `B_id` = ".$id.";";
        $bestellt = $db->query("SELECT `be_id`, `G_id`, `Status` FROM `bestellt` WHERE `B_id` = ".$id.";");
        $j = 0;
        $b = array();
        foreach($bestellt as $row){
            $b[$j] = new bestellt();
            $b[$j]->be_id = $row->be_id;
            $b[$j]->geraet = getGeraet($row->G_id);
            //$b[$j]->Status = $row->Status;
            $j++; 
        }
        return $b;  
    }


    function getGeraet($id){
        $g = new Geraet;
        $geraete = $db->query("SELECT `G_id`, `Bezeichnung`, `Mietpreisklasse1`, `Mietpreisklasse2`, `Mietpreisklasse3`, `Produktgruppe` FROM `geraet` WHERE `G_id` = ".$id.";");
        foreach($geraete as $row){
            $g->G_id = $row->G_id;
            $g->Bezeichnung = $row->Bezeichnung;
            $g->Mietpreisklasse1 = $row->Mietpreisklasse1;
            $g->Mietpreisklasse2 = $row->Mietpreisklasse2; 
            $g->Mietpreisklasse3 = $row->Mietpreisklasse3;
            $g->Produktgruppe = $row->Produktgruppe;
            $i++;
        }
        return $g;
    }

?>