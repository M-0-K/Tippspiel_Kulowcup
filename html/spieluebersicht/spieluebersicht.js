    function spiel(spiel) {
        let bracket = document.createElement("div");
        bracket.className = 'bracket-game';

        let playertop = document.createElement("div");
        playertop.className = 'player top';

        let playerbot = document.createElement("div");
        playerbot.className = 'player bot';

        let logoA = document.createElement("img");
        logoA.className = 'team-logo';
        setLogo(logoA,spiel.mA.bild);

        let logoB = document.createElement("img");
        logoB.className = 'team-logo';
        setLogo(logoB,spiel.mB.bild);

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

        bracket.appendChild(gameinfo);
        bracket.appendChild(playertop);
        bracket.appendChild(playerbot);


        if (document.getElementById(spiel.phase)) {
            document.getElementById(spiel.phase).appendChild(bracket);
        }
    }

    // try to set the logo image for the team
    function setLogo(imgFrame, logopath) {
        if (logopath != "non.png") {
                fetch("../../data/logo/" + logopath)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Die Datei existiert nicht.');
                        }
                        imgFrame.src = "../../data/logo/" + logopath;
                        return
                    })
                    .catch(error => {
                        console.error(error);
                    });
        }
        imgFrame.src = '../../data/fragezeichen.png';
    }



    var xhr = new XMLHttpRequest();
    var slist;
    $.get("../../html/spiele_backend.php", { action: "getSpiele", tunierid: tunierid }, function (data) {
        // Display the returned data in browser
        //  console.log(data.canApprove);
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