  function spiel(spiel, tipps) {
    /*let tipp = null;
    //console.log(tipps);
    if (tipps != null) {
      for (let i = 0; i < tipps.Tipps.length; i++) {
        //console.log(tipps.Tipps[i].sid.sid + " == " + spiel.sid);
        if (tipps.Tipps[i].sid.sid == spiel.sid) {
          //console.log("gefunden");
          tipp = tipps.Tipps[i];
          break;
        }
      }
    }*/
    let tipp = tipps?.Tipps.find(t => t.sid.sid == spiel.sid) || null;


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
    numberA.id = "A" + spiel.sid;


    let numberB = document.createElement('input');
    numberB.type = 'number';
    numberB.className = 'number-input';
    numberB.min = 0;
    numberB.max = 99;
    numberB.id = "B" + spiel.sid;

    if (tipp != null) {
      numberA.value = tipp.tippA;
      numberB.value = tipp.tippB;
    }

    scoreA.textContent = "-";
    scoreB.textContent = "-";
    playertop.className = 'player top non';
    playerbot.className = 'player bot non';

    if (spiel.status >= 1 || spiel.toreA != null || spiel.toreB != null) {
      numberA.disabled = true;
      numberB.disabled = true;
      if (spiel.toreA == null && spiel.toreB == null) {

      } else {
        scoreA.textContent = spiel.toreA;
        scoreB.textContent = spiel.toreB;
      }

      if (tipp != null) {
        if (spiel.toreA == tipp.tippA && spiel.toreB == tipp.tippB) {
          playertop.className = 'player top win';
          playerbot.className = 'player bot win';
        } else if ((spiel.toreA > spiel.toreB) && (tipp.tippA > tipp.tippB) || (spiel.toreB > spiel.toreA) && (tipp.tippB > tipp.tippA) || (spiel.toreA - spiel.toreB == tipp.tippA - tipp.tippB)) {

          playertop.className = 'player top draw';
          playerbot.className = 'player bot draw';
        } else {
          playertop.className = 'player top los';
          playerbot.className = 'player bot los';
        }
      } else {
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

    if (document.getElementById(spiel.phase)) {
      document.getElementById(spiel.phase).appendChild(bracket);
    }
  }

  var xhr = new XMLHttpRequest();
  var slist;
  var tipps;
  
  function fetchTipps() {
    return new Promise((resolve, reject) => {
      $.get("../spiele_backend.php", { action: "getTipps" }, function (data) {
        try {
          const tipps = JSON.parse(data);
          resolve(tipps);
        } catch (error) {
          reject(error);
        }
      }).fail((jqXHR, textStatus, errorThrown) => {
        reject(new Error(`Fehler beim Abrufen der Tipps: ${textStatus}, ${errorThrown}`));
      });
    });
  }

  function fetchSpiele() {
    return new Promise((resolve, reject) => {
      $.get("../spiele_backend.php", { action: "getSpiele" }, function (data) {
        try {
          const slist = JSON.parse(data);
          resolve(slist);
        } catch (error) {
          reject(error);
        }
      }).fail((jqXHR, textStatus, errorThrown) => {
        reject(new Error(`Fehler beim Abrufen der Spiele: ${textStatus}, ${errorThrown}`));
      });
    });
  }

  async function loadData() {
    try {
      const tipps = await fetchTipps();
      const slist = await fetchSpiele();

      slist.Spiele.forEach(spielItem => {
        spiel(spielItem, tipps);
      });

      hideUnused();
    } catch (error) {
      console.error('Fehler beim Laden der Daten:', error);
    }
  }

  loadData();

  function speichern() {
    var inputs = document.getElementsByClassName('number-input');
    var tipps = new Object();
    tipps.spiele = [];

    for (let i = 0; i < inputs.length; i++) {
      if (!inputs[i].disabled && inputs[i].value && inputs[i + 1] && inputs[i + 1].value) {
        if (inputs[i].id.substring(1) == inputs[i + 1].id.substring(1)) {
        if (inputs[i].value == ""){i++; continue;}
          (function (toreA, toreB, spielid){
            var s = new Object();
            s.toreA = toreA.trim();
            s.toreB = toreB.trim();
            s.spielid = spielid;
            tipps.spiele.push(s);
          })(inputs[i].value, inputs[i + 1].value, inputs[i + 1].id.substring(1));
        }
      }
      i++;
    }
    //onsole.log(JSON.stringify(tipps));
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../spiele_backend.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        let savebutton = document.getElementById('savebutton');
        savebutton.classList.add("success");
        setTimeout(window.location.replace('tippen.php'), 5000);
        //alert(xhr.responseText);
      }
    }
    xhr.send("action=setTipp&tipps=" + JSON.stringify(tipps));
  }

  function hideUnused() {
    var elems = document.getElementsByTagName('*'), i;
    for (i in elems) {
      if ((' ' + elems[i].className + ' ').indexOf(' ' + 'flex-item' + ' ')
        > -1) {
        if (elems[i].children.length <= 1) {
          elems[i].style.display = 'none';
        }
      }
    }
    if (document.getElementById('TF').style.display == "none" && document.getElementById('BF').style.display == "none") {
      document.getElementById('tfbfcont').style.display = 'none'
    }
  }
