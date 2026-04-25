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
        feld.textContent = "Feld " + spiel.feld;
        let time = document.createElement("p");
        time.textContent = spiel.time;
        gameinfo.appendChild(feld);
        gameinfo.appendChild(time);

        let schiri = document.createElement("div");
        schiri.style.fontSize = "0.75em";
        schiri.style.textAlign = "center"; 
        schiri.style.padding = "2px 1mm 8px 1mm"; // 1mm Abstand links und rechts
        schiri.style.color = "#000000"; 
        
        if (spiel.schiriName) {
            schiri.innerHTML = "<b>Schiedsrichter:</b> " + spiel.schiriName;
        } else {
            schiri.innerHTML = "Kein Schiedsrichter eingetragen";
        }

        bracket.appendChild(gameinfo);
        bracket.appendChild(playertop);
        bracket.appendChild(playerbot);
        bracket.appendChild(schiri);

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

    var xhr = new XMLHttpRequest();
    var slist;
    $.get("../../html/spiele_backend.php", { action: "getSpiele", tunierid: turnierid }, function (data) {
        // Display the returned data in browser
        // console.log(data.canApprove);
        // console.log(data);
        slist = JSON.parse(data);
        //console.log(data);
        //alert(data);

        for (let i = 0; i < slist.Spiele.length; i++) {
            spiel(slist.Spiele[i]);
        }
        hideUnused();
        
    });

    function hideUnused() {
        var elems = document.getElementsByTagName('*'), i;
        for (i in elems) {
            if ((' ' + elems[i].className + ' ').indexOf(' ' + 'flex-item' + ' ') > -1) {
                if (elems[i].children.length <= 1) {
                    elems[i].style.display = 'none';
                }
            }
        }
        
        let tf = document.getElementById('TF');
        let bf = document.getElementById('BF');
        let tfbfcont = document.getElementById('tfbfcont');

        let tfHidden = !tf || tf.style.display === "none";
        let bfHidden = !bf || bf.style.display === "none";

        if (tfHidden && bfHidden && tfbfcont) {
            tfbfcont.style.display = 'none';
        }
    }