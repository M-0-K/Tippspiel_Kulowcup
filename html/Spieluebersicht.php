<?php

if (!isset($_SESSION)) {
  session_start();
}
include '../script/db_connection.php'; // DB-Verbindung herstellen

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang='en'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
<title>Turnierbaum</title>

<script src="../script/jquery-3.6.0.min.js" type="text/javascript"></script>
<link href="../css/bracked.css" rel="stylesheet">
<link href="../css/index.css" rel="stylesheet">


<style type="text/css">



</style>
</head>

<script>
    function spiel(spiel){

        let bracket = document.createElement("div");
        bracket.className = 'bracket-game';

        let playertop = document.createElement("div");
        
        let scoreA = document.createElement("div");
        scoreA.className = 'score';
        let playerbot = document.createElement("div");
        
        let scoreB = document.createElement("div");
        scoreB.className = 'score';

      

        if ( spiel.toreA > spiel.toreB){
          playertop.className = 'player top win'; 
          playerbot.className = 'player bot loss';
        } else if (spiel.toreA < spiel.toreB){ 
          playerbot.className = 'player bot win';
          playertop.className = 'player top loss'; 
        } else if (spiel.toreA == spiel.toreB){
          playerbot.className = 'player bot non';
          playertop.className = 'player top non'; 
        } 

        playertop.appendChild(document.createTextNode(spiel.mA.abkuerzung));
        playerbot.appendChild(document.createTextNode(spiel.mB.abkuerzung));
        scoreA.appendChild(document.createTextNode(spiel.toreA));
        scoreB.appendChild(document.createTextNode(spiel.toreB));

        playertop.appendChild(scoreA);
        playerbot.appendChild(scoreB);

        bracket.appendChild(playertop);
        bracket.appendChild(playerbot);

        document.getElementById(spiel.phase).appendChild(bracket);
    }

    var xhr = new XMLHttpRequest();
    var slist;
    $.get("spiele_backend.php",{action: "getSpiele"}, function(data){
            // Display the returned data in browser
            //console.log(data.canApprove);
            console.log(data);
            slist = JSON.parse(data);
            console.log(data);
            //alert(data);
            //slist = JSON.parse('{ "Spiele" : [{"sid":1,"phase":"A","mA":{"id":null,"name":"Flames of Pils","abkuerzung":"FoP","bild":"fop.png","mid":1},"toreA":3,"mB":{"id":null,"name":"WD-40","abkuerzung":"WD4","bild":"wd.png","mid":2},"toreB":2}]}');

            for(let i = 0; i < slist.Spiele.length; i++){
                spiel(slist.Spiele[i]);
            }

      });



</script>
<body>

<div class="flex-container" style="justify-content: center; justify-content: space-between;">
            <div class="flex-item" id="A">
              <h3>Gruppe A</h3>
            </div>
            <div class="flex-item" id="B">
            <h3>Gruppe B</h3>
            </div>
            <div class="flex-item" id="VF">
            <h3>Viertel Finale</h3>
            </div>
            <div class="flex-item" id="HF">
            <h3>Halb Finale</h3>
            </div>
            <div class="flex-item" id="F">
            <h3>Finale</h3>
            </div>

            

</div>


  
</body>
</html>