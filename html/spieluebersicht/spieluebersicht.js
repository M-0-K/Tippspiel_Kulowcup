function spiel(spiel) {
    let bracket = document.createElement("div");
    bracket.className = 'bracket-game';

    let playertop = document.createElement("div");
    playertop.className = 'player top';

    let playerbot = document.createElement("div");
    playerbot.className = 'player bot';

    let logoA = document.createElement("img");
    logoA.className = 'team-logo';
    setLogo(logoA, spiel.mA.bild);

    let logoB = document.createElement("img");
    logoB.className = 'team-logo';
    setLogo(logoB, spiel.mB.bild);

    let nameA = document.createElement("span");
    nameA.className = 'team-name';
    nameA.textContent = spiel.mA.name.length > 12 ? spiel.mA.abkuerzung : spiel.mA.name;

    let nameB = document.createElement("span");
    nameB.className = 'team-name';
    nameB.textContent = spiel.mB.name.length > 12 ? spiel.mB.abkuerzung : spiel.mB.name;

    let scoreA = document.createElement("div");
    scoreA.className = 'score';
    let scoreB = document.createElement("div");
    scoreB.className = 'score';

    if (spiel.status == 1) {
        playertop.classList.add('run');
        playerbot.classList.add('run');
    } else if (spiel.toreA > spiel.toreB) {
        playertop.classList.add('win');
        playerbot.classList.add('los');
    } else if (spiel.toreA < spiel.toreB) {
        playertop.classList.add('los');
        playerbot.classList.add('win');
    } else if (spiel.toreA == spiel.toreB && spiel.status == 2) {
        playertop.classList.add('draw');
        playerbot.classList.add('draw');
    } else {
        playertop.classList.add('non');
        playerbot.classList.add('non');
    }

    if (spiel.toreA === null && spiel.toreB === null) {
        scoreA.textContent = "-";
        scoreB.textContent = "-";
    } else {
        scoreA.textContent = spiel.toreA + "";
        scoreB.textContent = spiel.toreB + "";
    }

    let topInfo = document.createElement("div");
    topInfo.className = 'team-info';
    topInfo.appendChild(logoA);
    topInfo.appendChild(nameA);

    let botInfo = document.createElement("div");
    botInfo.className = 'team-info';
    botInfo.appendChild(logoB);
    botInfo.appendChild(nameB);

    playertop.appendChild(topInfo);
    playertop.appendChild(scoreA);

    playerbot.appendChild(botInfo);
    playerbot.appendChild(scoreB);

    let gameinfo = document.createElement("div");
    gameinfo.className = 'gameinfo';

    let feld = document.createElement("p");
    feld.textContent = "Feld " + (spiel.feld || 1);
    let time = document.createElement("p");
    time.textContent = spiel.time || "00:00";
    gameinfo.appendChild(feld);
    gameinfo.appendChild(time);

    bracket.appendChild(gameinfo);
    bracket.appendChild(playertop);
    bracket.appendChild(playerbot);

    if (spiel.schiriName) {
        let schiri = document.createElement("div");
        schiri.className = "schiri-info"; 
        schiri.innerHTML = "<b>Schiedsrichter:</b> " + spiel.schiriName;
        bracket.appendChild(schiri);
    }

    if (document.getElementById(spiel.phase)) {
        document.getElementById(spiel.phase).appendChild(bracket);
    }
}

function setLogo(imgFrame, logopath) {
    if (logopath && logopath !== "non.png") {
        imgFrame.src = "../../data/logo/" + logopath;
        imgFrame.onerror = function() {
            this.src = '../../data/fragezeichen.png';
        };
    } else {
        imgFrame.src = '../../data/fragezeichen.png';
    }
}

$.get("../../html/spiele_backend.php", { action: "getSpiele", tunierid: turnierid }, function (data) {
    try {
        let slist = JSON.parse(data);
        if(slist && slist.Spiele) {
            for (let i = 0; i < slist.Spiele.length; i++) {
                spiel(slist.Spiele[i]);
            }
        }
        hideUnused();
    } catch (e) {
        console.error("JSON Error:", e, data);
    }
});

function hideUnused() {
    var elems = document.getElementsByClassName('flex-item');
    for (let i = 0; i < elems.length; i++) {
        if (elems[i].children.length <= 1) {
            elems[i].style.display = 'none';
        }
    }
}