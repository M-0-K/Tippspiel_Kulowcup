<?php

error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
if($_SESSION['KC']['login'] !== 'ok'){
  exit(header("Location:login.php"));
}
include '../script/db_connection.php'; // DB-Verbindung herstellen

?>


<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
<script src="../script/jquery-3.6.0.min.js" type="text/javascript"></script>
<link href="../css/bracked.css" rel="stylesheet">
<link href="../css/index.css" rel="stylesheet">
</head>
<style>

.table {
  display: flex; /* Verwende flexbox, um die Elemente anzuordnen */
  flex-wrap: wrap; /* Erlaube, dass sich die Elemente auf mehrere Zeilen aufteilen */
  align-items: center; /* Zentriere die Elemente vertikal */
  justify-content: space-between; /* Verteile die Elemente gleichmäßig entlang der Hauptachse */
}

.row {
  width: 50%; /* Setze die Breite der Elemente auf 50% */
  background-color: lightgray; /* Füge einen Hintergrund hinzu */
  display: flex;
}



.cell {
  padding: 20px; /* Füge Padding hinzu */
  box-sizing: border-box; /* Berücksichtige Padding und Border bei der Berechnung der Größe */
  border-radius: 5px; /* Füge abgerundete Ecken hinzu */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Füge einen Schatten hinzu */
}

.cell.player{
    width: 300px;
}

.cell.score{
    width: 50px;
}

</style>



<script>
    $.get("spiele_backend.php",{action: "getPunkte"}, function(data){
            // Display the returned data in browser
            //console.log(data.canApprove);
            console.log(data);
            slist = JSON.parse(data);
            //console.log(data);
            //alert(data);
            

            for(let i = 0; i < slist.User.length; i++){
                ausgabe(slist.User[i]);
            }

      });
      
      function ausgabe(spieler){

        let bracket = document.createElement("div");
        bracket.className = 'row';
        let user = document.createElement("div");
        user.className = 'cell user';
        let score = document.createElement("div");
        score.className = 'cell score';
        user.appendChild(document.createTextNode(spieler.username));
        score.appendChild(document.createTextNode(spieler.punkte));
        bracket.appendChild(user);
        bracket.appendChild(score);

        document.getElementById("table").appendChild(bracket);


      }
      
</script>
<body>
    <header>
        <h2> Ranking </h2>
   </header>
   <main id="main">
   <div id ="table">
   <div class="row">
    <div class="cell">User</div>
    <div class="cell">Score</div>
  </div>


    </div>
   </main>
   <footer>
   </footer>

</body>

</html>