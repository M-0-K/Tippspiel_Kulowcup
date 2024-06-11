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
        fetch("../../data/logo/" + spiel.mA.bild)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Die Datei existiert nicht.');
                }
                logoA.src = "../../data/logo/" + spiel.mA.bild;
            })
            .catch(error => {
                console.error(error);
                logoA.src = '../../data/none.jpg';
            });

        let logoB = document.createElement("img");
        logoB.className = 'team-logo';
        fetch("../../data/logo/" + spiel.mB.bild)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Die Datei existiert nicht.');
                }
                logoB.src = "../../data/logo/" + spiel.mB.bild;
            })
            .catch(error => {
                console.error(error);
                logoB.src = '../../data/none.jpg';
            });

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
        } else if (spiel.toreA == spiel.toreB && spiel.status == 2 ) {
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



    var xhr = new XMLHttpRequest();
    var slist;
    $.get("../../html/spiele_backend.php", { action: "getSpiele" }, function (data) {
        // Display the returned data in browser
        //  console.log(data.canApprove);
        // console.log(data);
        slist = JSON.parse(data);
        //console.log(data);
        //alert(data);
        //slist = JSON.parse('{ "Spiele" : [{"sid":1,"phase":"A","mA":{"id":null,"name":"Flames of Pils","abkuerzung":"FoP","bild":"fop.png","mid":1},"toreA":1,"mB":{"id":null,"name":"WD-40","abkuerzung":"WD4","bild":"wd.png","mid":2},"toreB":2},{"sid":2,"phase":"A","mA":{"id":null,"name":"Flames of Pils","abkuerzung":"FoP","bild":"fop.png","mid":1},"toreA":2,"mB":{"id":null,"name":"Lange Garde","abkuerzung":"LG","bild":"lg.png","mid":3},"toreB":2},{"sid":3,"phase":"A","mA":{"id":null,"name":"Flames of Pils","abkuerzung":"FoP","bild":"fop.png","mid":1},"toreA":2,"mB":{"id":null,"name":"Kulowminati","abkuerzung":"KM","bild":"km.png","mid":4},"toreB":2},{"sid":4,"phase":"A","mA":{"id":null,"name":"Flames of Pils","abkuerzung":"FoP","bild":"fop.png","mid":1},"toreA":3,"mB":{"id":null,"name":"Kocina Kulow","abkuerzung":"KK","bild":"kk.png","mid":5},"toreB":2},{"sid":5,"phase":"A","mA":{"id":null,"name":"WD-40","abkuerzung":"WD4","bild":"wd.png","mid":2},"toreA":3,"mB":{"id":null,"name":"Lange Garde","abkuerzung":"LG","bild":"lg.png","mid":3},"toreB":2},{"sid":6,"phase":"A","mA":{"id":null,"name":"WD-40","abkuerzung":"WD4","bild":"wd.png","mid":2},"toreA":5,"mB":{"id":null,"name":"Kulowminati","abkuerzung":"KM","bild":"km.png","mid":4},"toreB":2},{"sid":7,"phase":"A","mA":{"id":null,"name":"WD-40","abkuerzung":"WD4","bild":"wd.png","mid":2},"toreA":3,"mB":{"id":null,"name":"Kocina Kulow","abkuerzung":"KK","bild":"kk.png","mid":5},"toreB":2},{"sid":8,"phase":"A","mA":{"id":null,"name":"Lange Garde","abkuerzung":"LG","bild":"lg.png","mid":3},"toreA":0,"mB":{"id":null,"name":"Kulowminati","abkuerzung":"KM","bild":"km.png","mid":4},"toreB":2},{"sid":9,"phase":"A","mA":{"id":null,"name":"Lange Garde","abkuerzung":"LG","bild":"lg.png","mid":3},"toreA":0,"mB":{"id":null,"name":"Kocina Kulow","abkuerzung":"KK","bild":"kk.png","mid":5},"toreB":2},{"sid":10,"phase":"A","mA":{"id":null,"name":"Kulowminati","abkuerzung":"KM","bild":"km.png","mid":4},"toreA":1,"mB":{"id":null,"name":"Kocina Kulow","abkuerzung":"KK","bild":"kk.png","mid":5},"toreB":2},{"sid":11,"phase":"B","mA":{"id":null,"name":"Kulow Section","abkuerzung":"KS","bild":"ks.png","mid":6},"toreA":3,"mB":{"id":null,"name":"Gut Kickerz","abkuerzung":"GK","bild":"gk.png","mid":7},"toreB":2},{"sid":12,"phase":"B","mA":{"id":null,"name":"Kulow Section","abkuerzung":"KS","bild":"ks.png","mid":6},"toreA":4,"mB":{"id":null,"name":"Feiglinge","abkuerzung":"FG","bild":"fg.png","mid":8},"toreB":2},{"sid":13,"phase":"B","mA":{"id":null,"name":"Kulow Section","abkuerzung":"KS","bild":"ks.png","mid":6},"toreA":3,"mB":{"id":null,"name":"Dorftrottel","abkuerzung":"DT","bild":"dt.png","mid":9},"toreB":2},{"sid":14,"phase":"B","mA":{"id":null,"name":"Kulow Section","abkuerzung":"KS","bild":"ks.png","mid":6},"toreA":6,"mB":{"id":null,"name":"Gr\u00fcne Garde","abkuerzung":"GG","bild":"gg.png","mid":10},"toreB":2},{"sid":15,"phase":"B","mA":{"id":null,"name":"Gut Kickerz","abkuerzung":"GK","bild":"gk.png","mid":7},"toreA":3,"mB":{"id":null,"name":"Feiglinge","abkuerzung":"FG","bild":"fg.png","mid":8},"toreB":2},{"sid":16,"phase":"B","mA":{"id":null,"name":"Gut Kickerz","abkuerzung":"GK","bild":"gk.png","mid":7},"toreA":2,"mB":{"id":null,"name":"Dorftrottel","abkuerzung":"DT","bild":"dt.png","mid":9},"toreB":2},{"sid":17,"phase":"B","mA":{"id":null,"name":"Gut Kickerz","abkuerzung":"GK","bild":"gk.png","mid":7},"toreA":0,"mB":{"id":null,"name":"Gr\u00fcne Garde","abkuerzung":"GG","bild":"gg.png","mid":10},"toreB":0},{"sid":18,"phase":"B","mA":{"id":null,"name":"Feiglinge","abkuerzung":"FG","bild":"fg.png","mid":8},"toreA":0,"mB":{"id":null,"name":"Dorftrottel","abkuerzung":"DT","bild":"dt.png","mid":9},"toreB":0},{"sid":19,"phase":"B","mA":{"id":null,"name":"Feiglinge","abkuerzung":"FG","bild":"fg.png","mid":8},"toreA":0,"mB":{"id":null,"name":"Gr\u00fcne Garde","abkuerzung":"GG","bild":"gg.png","mid":10},"toreB":0},{"sid":20,"phase":"B","mA":{"id":null,"name":"Dorftrottel","abkuerzung":"DT","bild":"dt.png","mid":9},"toreA":0,"mB":{"id":null,"name":"Gr\u00fcne Garde","abkuerzung":"GG","bild":"gg.png","mid":10},"toreB":0},{"sid":21,"phase":"U3","mA":{"id":null,"name":"-","abkuerzung":"-","bild":"non.png","mid":0},"toreA":0,"mB":{"id":null,"name":"-","abkuerzung":"-","bild":"non.png","mid":0},"toreB":0},{"sid":22,"phase":"U1","mA":{"id":null,"name":"-","abkuerzung":"-","bild":"non.png","mid":0},"toreA":0,"mB":{"id":null,"name":"-","abkuerzung":"-","bild":"non.png","mid":0},"toreB":0}]}');

        for (let i = 0; i < slist.Spiele.length; i++) {
            spiel(slist.Spiele[i]);
        }
        hideUnused();

    });

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
<div>