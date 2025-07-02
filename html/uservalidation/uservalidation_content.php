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
            // console.log(data);
            let user = JSON.parse(data);
            if (user.hasOwnProperty("message")) {
                document.getElementById("table").append(document.createTextNode(user.message));
            }
            for (var i = 0; i < user.length; i++){
                ausgabe(user[i]);
            }
        });



        function ausgabe(spieler) {
            let bracket = document.createElement("div");
            bracket.className = 'table row';
            let user = document.createElement("div");
            user.className = 'cell user';
            let score = document.createElement("button");
            score.className = 'cell score';
            user.appendChild(document.createTextNode(spieler.username));
            score.appendChild(document.createTextNode("Aktivieren"));
            score.onclick = function(){enable(spieler.userid, spieler.username, this);};
            bracket.appendChild(user);
            bracket.appendChild(score);
            document.getElementById("table").appendChild(bracket);
        }

        function enable(userid, name, button){

            let params = new URLSearchParams({
            action: 'enableUser',
            id: userid
            }).toString();

            let request = fetch('../spiele_backend.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: params
            });

            button.style["background-color"] = "green";
        }
    </script>