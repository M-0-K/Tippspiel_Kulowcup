<script>
    function spiel(spiel) {
        let bracket = document.createElement("div");
        bracket.className = 'bracket-live';

        let playera = document.createElement("div");
        playera.className = 'teama teamdiv';

        let playerb = document.createElement("div");
        playerb.className = 'teamb teamdiv';

        let logoA = document.createElement("img");
        //logoA.className = 'team-logo';
        fetch("../../data/logo/" + spiel.mA.bild)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Die Datei existiert nicht.');
                }
                logoA.src = "../../data/logo/" + spiel.mA.bild;
            })
            .catch(error => {
                console.error(error);
                logoA.src = '../../data/none.png';
            });
            if (spiel.mA.bild.match(/.svg/g) == ".svg") {
                logoA.style.filter = "invert(100%) sepia(73%) saturate(1%) hue-rotate(97deg) brightness(105%) contrast(101%)";
            }

        let logoB = document.createElement("img");
        //logoB.className = 'team-logo';
        fetch("../../data/logo/" + spiel.mB.bild)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Die Datei existiert nicht.');
                }
                logoB.src = "../../data/logo/" + spiel.mB.bild;
            })
            .catch(error => {
                console.error(error);
                logoB.src = '../../data/none.png';
            });
            if (spiel.mB.bild.match(/.svg/g) == ".svg") {
                logoB.style.filter = "invert(100%) sepia(73%) saturate(1%) hue-rotate(97deg) brightness(105%) contrast(101%)";
            }

        let nameA = document.createElement("h3");
        nameA.textContent = spiel.mA.name;

        let nameB = document.createElement("h3");
        nameB.textContent = spiel.mB.name;

        let score = document.createElement("div");
        score.className = 'scorediv';
        score.id = "sid" + spiel.sid;
        score.textContent = spiel.toreA + ":" + spiel.toreB;

        playera.appendChild(logoA);
        playera.appendChild(nameA);

        playerb.appendChild(logoB);
        playerb.appendChild(nameB);

        bracket.appendChild(playera);
        bracket.appendChild(score);
        bracket.appendChild(playerb);

        document.getElementById("live").appendChild(bracket);
    }

    function update(){
        var xhr = new XMLHttpRequest();
        var slist;
        $.get("../../html/spiele_backend.php", { action: "getActiveSpiele" }, function (data) {
            slist = JSON.parse(data);

            for (let i = 0; i < slist.Spiele.length; i++) {
                document.getElementById("sid" + slist.Spiele[i].sid).textContent = slist.Spiele[i].toreA + ":" + slist.Spiele[i].toreB;
            }

        });
    }

    function init(){
        var xhr = new XMLHttpRequest();
        var slist;
        $.get("../../html/spiele_backend.php", { action: "getActiveSpiele" }, function (data) {
            slist = JSON.parse(data);


            if (slist.Spiele.length == 0) {
                let bracket = document.createElement("div");
                bracket.className = 'bracket-live';

                let score = document.createElement("div");
                score.className = 'scorediv';
                score.textContent = "Kein aktives Spiel";
                bracket.append(score);
                document.getElementById("live").appendChild(bracket);
                return;
            }

            for (let i = 0; i < slist.Spiele.length; i++) {
                spiel(slist.Spiele[i]);
            }

        });
    }

    init();
    var intervalId = setInterval(function() {
    // document.getElementById("live").innerHTML = '';
    update()
    }, 5000);
       var intervalId = setInterval(function() {
    document.getElementById("live").innerHTML = '';
    init()
    }, 60000);

</script>

<div class="flex-container" id="live">
</div>

