<script>
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

        let nameA = document.createElement("select");
        let nameB = document.createElement("select");
        nameA.className = 'team-name';
        nameB.className = 'team-name';
        nameA.gameid = spiel.sid;
        nameB.gameid = spiel.sid;
        nameA.side = "A";
        nameB.side = "B";

        for ( var i = 0; i < teamList.length ; i++){
            let currTeam = teamList[i].Name;
            let optionA = new Option(currTeam,i);
            let optionB = new Option(currTeam,i);
            nameA.add(optionA,undefined);
            nameB.add(optionB,undefined);

            if(spiel.mA.name == currTeam) nameA.value = i;
            if(spiel.mB.name == currTeam) nameB.value = i;

            nameA.onchange = function(){addAttributes(nameA,logoA)};
            nameB.onchange = function(){addAttributes(nameB,logoB)};

        }

        let scoreA = document.createElement("button");
        scoreA.className = 'score';
        scoreA.style.width = '2em';
        let scoreB = document.createElement("button");
        scoreB.className = 'score';
        scoreB.style.width = '2em';
        
        let statusToggle = document.createElement("button");
        statusToggle.textContent = "Beenden";
        
        switch (spiel.status) {
            case 2:
                scoreA.disabled = true;
                scoreB.disabled = true;
            case 1:
                nameA.disabled = true;
                nameB.disabled = true;
                statusToggle.onclick = function() { endGame(spiel.sid);}
            case 0:
                attachScoreHandlers(scoreA, "A", spiel.sid);
                attachScoreHandlers(scoreB, "B", spiel.sid);
                break;
        
            default:
                break;
        }

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
        if (spiel.status == 1) {
            gameinfo.appendChild(statusToggle);
        }

        bracket.appendChild(gameinfo);
        bracket.appendChild(playertop);
        bracket.appendChild(playerbot);


        if (document.getElementById(spiel.phase)) {
            document.getElementById(spiel.phase).appendChild(bracket);
        }
    }

    function attachScoreHandlers(button, team, spielId) {
        button.addEventListener('click', (e) => {
            setScore(spielId, team, button);
        });

        button.addEventListener('contextmenu', (e) => {
            e.preventDefault();
            setScore(spielId, team, button, true);
        });
    }

    function setLogo(imgFrame, logopath) {
        if (logopath != "non.png") {
                fetch("../../data/logo/" + logopath)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Die Datei existiert nicht.');
                        }
                        imgFrame.src = "../../data/logo/" + logopath;
                    })
                    .catch(error => {
                        console.error(error);
                        //logoB.src = '../../data/none.png';
                    });
    
        }
    }

    function addAttributes(selectObject, associatedLogo){
        let teamID = teamList[selectObject.value].Mid;
        console.log(teamID);
        setLogo(associatedLogo,teamList[selectObject.value].Bild);

        let params = new URLSearchParams({
            action: 'setTeam',
            id: selectObject.gameid,
            side: selectObject.side,
            teamid: teamID
        }).toString();

        return fetchStatement(params);
        
    }


    var xhr = new XMLHttpRequest();
    var teamList;
    $.get("../../html/spiele_backend.php", { action: "getTeams" }, function (data) {
        teamList = JSON.parse(data);
    });

    var xhr = new XMLHttpRequest();
    var slist;
    $.get("../../html/spiele_backend.php", { action: "getSpiele" }, function (data) {
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

    function setScore(gameid, team, button, decrease = false) {

        startGame = "active"
        scoreText = button.textContent;
        if (scoreText == "-") {
            startGame = "activate";
            score = -1;
        }

        newScore = (decrease) ? (parseInt(scoreText) - 1) : (parseInt(scoreText) + 1);
        newScore = Math.max(newScore, 0);

        let params = new URLSearchParams({
            action: 'updateGame',
            id: gameid,
            team: team,
            score: newScore,
            status: startGame
        }).toString();

        return fetchStatement(params);
    }

    function endGame(gameid) {
        let params = new URLSearchParams({
            action: 'updateGame',
            id: gameid,
            status: "finished"
        }).toString();
        return fetchStatement(params);
    }

    function fetchStatement(params) {

        var request = new Request('../spiele_backend.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: params
        });
        console.log(params);
        var response = fetch(request)
            .then(answer => {
                if (answer.status == 200) {
                    location.reload();
                    return;
                }
                button.textContent = "Error";
            })
            .catch(error => {
                // error logic
                console.log(error);
            })
    }

</script>

<div class="flex-container" style="justify-content: center; justify-content: space-between;">
    <div class="flex-item" id="A">
        <h3>Gruppe A</h3>
    </div>
    <div class="flex-item" id="B">
        <h3>Gruppe B</h3>
    </div>
    <div class="flex-item" id="C">
        <h3>Gruppe C</h3>
    </div>
    <div class="flex-item" id="D">
        <h3>Gruppe D</h3>
    </div>
    <div class="flex-item" id="VF">
        <h3>Viertelfinale</h3>
    </div>
    <div id="tfbfcont" style="flex:1">
        <div class="flex-item" id="HF">
            <h3>Halbfinale</h3>
        </div>
        <div class="flex-item" id="U9" style="margin-top: 1em">
            <h3>Spiel um Platz 9</h3>
        </div>
        <div class="flex-item" id="U7" style="margin-top: 1em">
            <h3>Spiel um Platz 7</h3>
        </div>
        <div class="flex-item" id="U5" style="margin-top: 1em">
            <h3>Spiel um Platz 5</h3>
        </div>
        <div class="flex-item" id="U3" style="margin-top: 1em">
            <h3>Spiel um Platz 3</h3>
        </div>
    </div>
    <div id="tfbfcont" style="flex:1">
        <div class="flex-item" id="TF" style="Background-color: gold;">
            <h3>Finale</h3>
        </div>
    </div>
    <div>