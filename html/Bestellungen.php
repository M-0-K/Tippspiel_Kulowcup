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
    <title>Bestellungen</title>
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
        width: 70%;
        border: solid black;
        background-color: lightgray;
        text-align: center;
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

    .img{
        width: 30px;
    }

    .icons {
        display: inline-block;
        position: relative;
        bottom: 100%;
        right: -95%;
    }
            



</style>

<script> 
    var blist;
    var xhr = new XMLHttpRequest();

    $.get("bestellung_backend.php",{action: "getBestellung"}, function(data){
            // Display the returned data in browser
            alert(data);
            //blist = JSON.parse(data);

            for(let i = 0; i < blist.bestellung.length; i++){
                ladeBestellung(blist.bestellung[i]);
            }
    });


    
    function ladeBestellung(bestellung){
        ziel = document.getElementById('auswahl');
        let div = document.createElement("div");
        div.setAttribute("class", "inhalt");
        let text = document.createTextNode("ID: " +bestellung.B_id+"   Abgabe:"+bestellung.Abgabe +"   Rückgabe"+ bestellung.Rueckgabe+"   ");
        let divhead = document.createElement("div");
        div.appendChild(text);
        $(divhead).css("justify-content", "left");
        //alert(bestellung.bestellliste.length);
        if(bestellung.bestellliste != null){
            let ul = document.createElement("ul");
            div.appendChild(ul);
            for(let i = 0;i < bestellung.bestellliste.length; i++){
            $(ul).append("<li>"+ bestellung.bestellliste[i].geraet.Bezeichnung +"  " +bestellung.bestellliste[i].geraet.Mietpreisklasse<?php echo $_SESSION['WT13']['mitglied'] ?>+"Euro  </li>");
            }
        }
        div.appendChild(document.createElement("br"));
        div.appendChild(divhead);
        divhead.setAttribute("class", "icons");
        let imgbea = document.createElement("img");
        imgbea.src = "../data/zahnrad.png";
        imgbea.setAttribute("class", "img");
        divhead.appendChild(imgbea);

        let imgdel = document.createElement("img");
        imgdel.src = "../data/muelleimer.png";
        imgdel.setAttribute("class", "img");
        divhead.appendChild(imgdel);

        $(imgbea).click(function () {
            xhr.open('POST', 'bestellung_backend.php', true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = infoanzeige;
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    window.location.replace('neueBestellung.php');
                }
            }
            xhr.send("action=setB_id&B_id="+bestellung.B_id);
        });

        $(imgdel).click(function () {
            xhr.open('POST', 'bestellung_backend.php', true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = infoanzeige;
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    div.parentElement.removeChild(div);
                }
            }
            xhr.send("action=delBestellung&B_id="+bestellung.B_id);
        });



        ziel.insertBefore(div, ziel.childNodes[1]);
    }

    function hinzufuegen (){
        xhr.open('POST', 'bestellung_backend.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = infoanzeige;
         xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    window.location.replace('neueBestellung.php');
                }
            }
        xhr.send('action=setBestellung&Abgabe='+document.getElementById('Abgabe').value+'&Rueckgabe='+document.getElementById('Rueckgabe').value);
        //xhr.send("action=setBestellung");
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
        //alert('Caught Exception: ' + e.description);
    }
}
    
</script>
<body>
    <header><h2>Bestellübersicht</h2></header>
    <main> 
    <div class="row">
        <div class="col">
            <label for="start">Abgabe:</label>
            <input type="date" id="Abgabe" name="Abgabe">

            <label for="start">Rückgabe:</label>
            <input type="date" id="Rueckgabe" name="Rueckgabe">

            <button  onclick="hinzufuegen()">Hinzufügen</button>
        </div>
    </div>
    <div class="row">
    <div class="col" id="auswahl"> </div>
    </div>

</main>
    
</body>
</html>