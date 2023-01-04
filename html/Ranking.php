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
        bracket.className = 'bracket-game';

        let playertop = document.createElement("div");
        playertop.appendChild(document.createTextNode(spieler.username));
        playertop.appendChild(document.createTextNode(spieler.punkte));
        bracket.appendChild(playertop);

        document.getElementById("main").appendChild(bracket);


      }
      
</script>
<body>
    <header>
        <h2> Ranking </h2>
   </header>
   <main id="main">


    
   </main>
   <footer>
   </footer>

</body>

</html>