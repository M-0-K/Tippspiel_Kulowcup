<?php
error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
if($_SESSION['WT13']['login'] !== 'ok'){
  exit(header("Location:login.php"));
}

include '../script/db_connection.php'; // DB-Verbindung herstellen
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/index.css" rel="stylesheet">
    <script src="../script/jquery-3.6.0.min.js" type="text/javascript"></script>
    <title>Bestellung</title>
</head>

<style> 

h3 {
    text-align: center;
    font-weight: bold;
}



    .row {
        display: flex;
        align-items : flex-start;
        justify-content : center;
        
    }

    .col {
        padding: 5px;
        margin: 5px;
        width: 30%;
        border: solid black;
        background-color: lightgray;
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
    var glist;
    var blist;
    var xhr = new XMLHttpRequest();
    $.get("bestellung_backend.php",{action: "getGeraet"}, function(data){
            // Display the returned data in browser
            //alert(data);
            glist = JSON.parse(data);

            for(let i = 0; i < glist.geraete.length; i++){
                if(glist.geraete[i].dabei){
                    ladeGeraete(glist.geraete[i], document.getElementById('auswahl'));
                }else{
                    ladeGeraete(glist.geraete[i], document.getElementById('wahl'));
                }
               
            }
    });

    //var gauswahl = new Array();

    function ladeGeraete(geraet, ziel){
        let div = document.createElement("div");
        div.setAttribute("class", "inhalt");
        let text = document.createTextNode(geraet.Bezeichnung +  " " +geraet.Mietpreisklasse<?php echo $_SESSION['WT13']['mitglied']; ?> + "Euro ");
        div.appendChild(text);
        $(div).click(function () {
            
            if (ziel == document.getElementById('auswahl'))
            {    
                xhr.open('POST', 'bestellung_backend.php', true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = infoanzeige;
                xhr.send("action=delBestellt&G_id=" + geraet.G_id);
                
                div.parentElement.removeChild(div);
                ladeGeraete(geraet, document.getElementById('wahl'));
            } else{
                
                xhr.open('POST', 'bestellung_backend.php', true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = infoanzeige;
                xhr.send("action=setBestellt&G_id=" + geraet.G_id);
                //alert(geraet.G_id);
                div.parentElement.removeChild(div);
                ladeGeraete(geraet, document.getElementById('auswahl'));
            }
            
            

        })
        ziel.insertBefore(div, ziel.childNodes[1]);
    }

    function infoanzeige() {
    try {
        let DONE = 4; // readyState 4 means the request is done.
        let OK = 200; // status 200 is a successful return.
        if (xhr.readyState === DONE) {
            if (xhr.status === OK) {
                //console.log(xhr.responseText);
            } else {
                console.log('Error: ' + xhr.status);
            }
        }
        //location.reload();
    } catch (e) {
        alert('Caught Exception: ' + e.description);
    }
}
    
</script>


<body>
    <header><h2>Bestellung</h2></header>
    <main>  
    <div class="row"> <button onclick="window.location.replace('Bestellungen.php');">Fertig </button> </div>
    <div id="row" class="row">
            <div id="wahl" class="col" ><h3>Auswahl</h3> </div>

            <div id="auswahl" class="col" ><h3>Wahl</h3> </div> 
        </div>
    </main>
    
</body>

</html>