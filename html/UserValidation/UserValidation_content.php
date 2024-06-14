<main>
    <div id="tframe">
        <div id="table">
            <div class="row header">
                <div class="cell">Benutzer</div>
                <div class="cell">Akttivieren</div>
            </div>
        </div>
    </div>
</main>

    <script>
        $.get("../spiele_backend.php", { action: "getDisabledUser" }, function(data) {
            console.log(data);
            let user = JSON.parse(data);
        });

        function ausgabe(spieler) {
            let bracket = document.createElement("div");
            bracket.className = 'table row';
            let user = document.createElement("div");
            user.className = 'cell user';
            let score = document.createElement("div");
            score.className = 'cell score';
            user.appendChild(document.createTextNode(spieler.username));
            score.appendChild(document.createTextNode(spieler.enabled));
            bracket.appendChild(user);
            bracket.appendChild(score);
            document.getElementById("table").appendChild(bracket);
        }
    </script>