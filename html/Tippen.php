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


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang='en'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
<title>Turnierbaum</title>

<script src="../script/jquery-3.6.0.min.js" type="text/javascript"></script>
<link href="../css/bracked.css" rel="stylesheet">
<link href="../css/index.css" rel="stylesheet">


<style type="text/css">

.number-input {
    /* Styles für das gesamte Input-Feld */
    display: inline-block;
    width: 4em;
    height: inherit;
    padding: 0 10px;
    border: 2px solid #ccc;
    border-radius: 10px;
    box-sizing: border-box;
    font-size: 16px;
    text-align: center;
    outline: none;
  }



</style>
</head>

<script>
    function spiel(spiel, tipps){
      let tipp = null;
      if(tipps != null){
      for(let i = 0; i < tipps.Tipps.length; i++){
        //console.log(tipps.Tipps[i].sid.sid + " == " + spiel.sid);
        if(tipps.Tipps[i].sid.sid == spiel.sid){
          console.log("gefunden");
          tipp = tipps.Tipps[i];
          break;
        }  
      }
    }

      console.log(tipp);

        let bracket = document.createElement("div");
        bracket.className = 'bracket-game';

        let playertop = document.createElement("div");

        let tippA = document.createElement("div");
        tippA.className = 'score';
        
        let scoreA = document.createElement("div");
        scoreA.className = 'score';


        let playerbot = document.createElement("div");

        let tippB = document.createElement("div");
        tippB.className = 'score';
        
        
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


      
        let numberA = document.createElement('input');
        numberA.type = 'number';
        numberA.className = 'number-input';
        numberA.min = 0;
        numberA.max = 99;
        numberA.id = "A"+ spiel.sid;
        

        let numberB = document.createElement('input');
        numberB.type = 'number';
        numberB.className = 'number-input';
        numberB.min = 0;
        numberB.max = 99;
        numberB.id = "B"+ spiel.sid;

        if(tipp != null){
          //console.log(tipp.ToreA);
          numberA.value = tipp.tippA;
          numberB.value = tipp.tippB;
          numberA.disabled = true;
          numberB.disabled = true;
        }

        if(spiel.toreA == null && spiel.toreB == null){
          scoreA.appendChild(document.createTextNode("-"));
          scoreB.appendChild(document.createTextNode("-")); 
        }else {
          scoreA.appendChild(document.createTextNode(spiel.toreA));
          scoreB.appendChild(document.createTextNode(spiel.toreB)); 
          numberA.disabled = true;
          numberB.disabled = true;
        }
        
        tippA.appendChild(numberA);
        tippB.appendChild(numberB);
        

        playertop.appendChild(tippA);
        playerbot.appendChild(tippB);

        

        bracket.appendChild(playertop);
        bracket.appendChild(playerbot);

        document.getElementById(spiel.phase).appendChild(bracket);
    }

    var xhr = new XMLHttpRequest();
    var slist;
    var tipps;
    $.get("spiele_backend.php",{action: "getTipps"}, function(data){
            //console.log(data);
            if(data.canApprove){
              tipps = JSON.parse(data);
            }
            

            $.get("spiele_backend.php",{action: "getSpiele"}, function(data){
            // Display the returned data in browser
            //console.log(data.canApprove);
            //console.log(data);
            slist = JSON.parse(data);
            //alert(data);
            //slist = JSON.parse('{ "Spiele" : [{"sid":1,"phase":"A","mA":{"id":null,"name":"Flames of Pils","abkuerzung":"FoP","bild":"fop.png","mid":1},"toreA":3,"mB":{"id":null,"name":"WD-40","abkuerzung":"WD4","bild":"wd.png","mid":2},"toreB":2}]}');

            for(let i = 0; i < slist.Spiele.length; i++){
                spiel(slist.Spiele[i], tipps);
            }

      });
      });

    
      function speichern(){
        alert("Speichern");

        var inputs = document.getElementsByClassName('number-input');

        for(var i = 0; i < inputs.length; i++) {
          
          if(inputs[i].disabled != true &&  inputs[i].value != null && inputs[i+1].value){
            console.log(inputs[i].id);
            if(inputs[i].id.substring(1) == inputs[i+1].id.substring(1)){
              console.log("action=setTipp&tA="+ inputs[i].value +"&tA="+ inputs[i+1].value + "&sid=" +inputs[i+1].id.substring(1));

              xhr.open('POST', 'spiele_backend.php', true);
              xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
              //xhr.onreadystatechange = infoanzeige;
              xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                  window.location.replace('Tippen.php');
                }
              }
              xhr.send("action=setTipp&ToreA="+ inputs[i].value +"&ToreB="+ inputs[i+1].value + "&Spielid=" +inputs[i+1].id.substring(1));
            }
          }
          i++;

          
            
          }
      }

</script>
<body>
<div class="flex-container" style="justify-content: center; justify-content: space-between;">
            <div class="flex-item" id="A">
              <h3>Gruppe A</h3>
            </div>
            <div class="flex-item" id="B">
            <h3>Gruppe B</h3>
            </div>
            <div class="flex-item" id="U3">
            <h3>Um den Dritten</h3>
            </div>
            <div class="flex-item" id="U1">
            <h3>Finale</h3>
            </div>
    </div>
<div> 
<div class="row"> <button onclick="speichern();">Fertig </button> </div>

 
</div>


  
</body>
</html>