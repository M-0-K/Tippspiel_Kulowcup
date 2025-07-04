<main>
    <div id="tframe">
        <div id="table">
            <div class="row header">
                <div class="cell">User</div>
                <div class="cell">Score</div>
            </div>
        </div>
        <p>Die Punktevergabe erfolgt nach dem System von <a href="https://www.kicktip.de/spielregeln.43.0.html">kicktip.de</a>.</p>
    </div>
</main>

    <script>
        $.get("../spiele_backend.php", { action: "getPunkte" }, function(data) {
            console.log(data);
            let slist = JSON.parse(data);
            for (let i = 0; i < slist.User.length; i++) {
                ausgabe(slist.User[i]);
            }
        });

        function ausgabe(spieler) {
            let bracket = document.createElement("div");
            bracket.className = 'table row';
            let user = document.createElement("div");
            user.className = 'cell user';
            let score = document.createElement("div");
            score.className = 'cell score';
            user.appendChild(document.createTextNode(spieler.username));
            score.appendChild(document.createTextNode(spieler.punkte));
            bracket.appendChild(user);
            bracket.appendChild(score);
            document.getElementById("table").appendChild(bracket);
        }
    </script>