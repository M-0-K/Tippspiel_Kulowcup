<script>
    function spiel(spiel, tipps){
      let tipp = null;
      //console.log(tipps);
      if(tipps != null){
      for(let i = 0; i < tipps.Tipps.length; i++){
        //console.log(tipps.Tipps[i].sid.sid + " == " + spiel.sid);
        if(tipps.Tipps[i].sid.sid == spiel.sid){
          //console.log("gefunden");
          tipp = tipps.Tipps[i];
          break;
        }
      }
    }


        let bracket = document.createElement("div");
        bracket.className = 'bracket-game';

        let playertop = document.createElement("div");

        let tippA = document.createElement("div");
        tippA.className = 'tipp';

        let scoreA = document.createElement("div");
        scoreA.className = 'score';


        let playerbot = document.createElement("div");

        let tippB = document.createElement("div");
        tippB.className = 'tipp';


        let scoreB = document.createElement("div");
        scoreB.className = 'score';

        let nameA = document.createElement("span");
        nameA.className = 'team-name';
        nameA.textContent = spiel.mA.name.length > 20 ? spiel.mA.abkuerzung : spiel.mA.name;

        let nameB = document.createElement("span");
        nameB.className = 'team-name';
        nameB.textContent = spiel.mB.name.length > 20 ? spiel.mB.abkuerzung : spiel.mB.name;
        

        playertop.appendChild(nameA);
        playerbot.appendChild(nameB);


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
          numberA.value = tipp.tippA;
          numberB.value = tipp.tippB;
        }

        scoreA.textContent = "-";
        scoreB.textContent = "-";
        playertop.className = 'player top non';
        playerbot.className = 'player bot non';

        if(spiel.status >= 1 || spiel.toreA != null || spiel.toreB != null){
          numberA.disabled = true;
          numberB.disabled = true;
          if (spiel.toreA == null && spiel.toreB == null) {

            } else {
            scoreA.textContent = spiel.toreA;
            scoreB.textContent = spiel.toreB;
          }

          if (tipp != null){
          if(spiel.toreA == tipp.tippA && spiel.toreB == tipp.tippB){
            playertop.className = 'player top win';
            playerbot.className = 'player bot win';
          } else if ( (spiel.toreA  > spiel.toreB)  && (tipp.tippA > tipp.tippB) || (spiel.toreB > spiel.toreA) && (tipp.tippB > tipp.tippA) ||  (spiel.toreA - spiel.toreB == tipp.tippA - tipp.tippB ) ){

            playertop.className = 'player top draw';
            playerbot.className = 'player bot draw';
          } else {
            playertop.className = 'player top los';
            playerbot.className = 'player bot los';
          }
        }else{
            playertop.className = 'player top los';
            playerbot.className = 'player bot los';
          }

        }


        tippA.appendChild(numberA);
        tippB.appendChild(numberB);


        playertop.appendChild(tippA);
        playerbot.appendChild(tippB);
        playertop.appendChild(scoreA);
        playerbot.appendChild(scoreB);

        bracket.appendChild(playertop);
        bracket.appendChild(playerbot);

        if(document.getElementById(spiel.phase)){
      document.getElementById(spiel.phase).appendChild(bracket);
        }
    }

    var xhr = new XMLHttpRequest();
    var slist;
    var tipps;
    $.get("../spiele_backend.php",{action: "getTipps"}, function(data){
            //console.log(data);
            tipps = JSON.parse(data);
            } );


    $.get("../spiele_backend.php",{action: "getSpiele"}, function(data){
            // Display the returned data in browser
            //console.log(data.canApprove);
            //console.log(data);
            slist = JSON.parse(data);
           // alert(data);
            //slist = JSON.parse('{ "Spiele" : [{"sid":1,"phase":"A","mA":{"id":null,"name":"Flames of Pils","abkuerzung":"FoP","bild":"fop.png","mid":1},"toreA":3,"mB":{"id":null,"name":"WD-40","abkuerzung":"WD4","bild":"wd.png","mid":2},"toreB":2}]}');
            for(let i = 0; i < slist.Spiele.length; i++){
                spiel(slist.Spiele[i], tipps);
            }
        hideUnused();
      });

      function speichern(){
    // alert("Speichern");

    var inputs = document.getElementsByClassName('number-input');

    for(var i = 0; i < inputs.length; i++) {

        if(inputs[i].disabled != true &&  inputs[i].value != null && inputs[i+1].value != null){
            console.log(inputs[i].id);
            if(inputs[i].id.substring(1) == inputs[i+1].id.substring(1)){
                //console.log("action=setTipp&ToreA="+ inputs[i].value +"&ToreB="+ inputs[i+1].value + "&Spielid=" +inputs[i+1].id.substring(1));

                // Um die xhr-Variable in einer Schleife zu kapseln, erstellen wir eine Funktion
                (function(toreA, toreB, spielid) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '../spiele_backend.php', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            window.location.replace('tippen.php');
                            //alert(xhr.responseText);
                        }
                    }
                    xhr.send("action=setTipp&ToreA="+ toreA +"&ToreB="+ toreB + "&Spielid=" + spielid);
                })(inputs[i].value, inputs[i+1].value, inputs[i+1].id.substring(1));
            }
        }
        i++;
    }
}

function hideUnused(){
var elems = document.getElementsByTagName('*'), i;
for (i in elems) {
    if((' ' + elems[i].className + ' ').indexOf(' ' + 'flex-item' + ' ')
            > -1) {
            if(elems[i].children.length <= 1)
            {
            elems[i].style.display = 'none';
            }
        }
    }
    if(document.getElementById('TF').style.display == "none" && document.getElementById('BF').style.display == "none")
    {
        document.getElementById('tfbfcont').style.display = 'none'
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
            <div class="flex-item" id="VF">
            <h3>Viertelfinale</h3>
            </div>
            <div class="flex-item" id="HF">
            <h3>Halbfinale</h3>
            </div>
            <div id="tfbfcont" style="flex:1">
                <div class="flex-item" id="TF">
                <h3>Finale</h3>
                </div>
                <div class="flex-item" id="BF" style="margin-top: 1em">
                <h3>Spiel um Platz 3</h3>
                </div>
            </div>
    </div>
    <div class="button-container"> <button onclick="speichern();"  class="button"  > Tipp Speichern </button> </div>
</div>
<div>
  