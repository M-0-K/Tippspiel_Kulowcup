<main class="punktestand-page">
    <div id="tframe">
        <h1 class="punktestand-title">Punktestand Gruppenphase</h1>
        <div id="group-tables"></div>
        <p class="punktestand-hint">3 Punkte f&uuml;r Sieg, 1 Punkt f&uuml;r Unentschieden, 0 Punkte f&uuml;r Niederlage.</p>
    </div>
</main>

<script>
    $.get("../spiele_backend.php", { action: "getGroupTable" }, function (data) {
        try {
            var result = (typeof data === "string") ? JSON.parse(data) : data;
            if (!result.groups) {
                return;
            }
            result.groups.forEach(function (group) {
                renderGroupTable(group);
            });
        } catch (e) {
            console.error("Fehler beim Laden der Gruppentabelle", e);
        }
    });

    function renderGroupTable(group) {
        var container = document.getElementById("group-tables");
        if (!container) {
            return;
        }

        var wrapper = document.createElement("div");
        wrapper.className = "group-table-wrapper";

        var title = document.createElement("h2");
        title.style.color = "black";
        title.textContent = "Gruppe " + group.phase;
        wrapper.appendChild(title);

        var table = document.createElement("div");
        table.className = "group-table";

        var header = document.createElement("div");
        header.className = "row header";

        ["Platz", "Team", "Sp", "S", "U", "N", "Tore", "+/-", "Pkt"].forEach(function (text) {
            var cell = document.createElement("div");
            cell.className = "cell";
            cell.textContent = text;
            header.appendChild(cell);
        });

        table.appendChild(header);

        if (group.teams) {
            group.teams.forEach(function (team, index) {
                var row = document.createElement("div");
                row.className = "row";

                var platz = document.createElement("div");
                platz.className = "cell";
                platz.setAttribute("data-label", "Platz");
                platz.textContent = index + 1;
                row.appendChild(platz);

                var teamCell = document.createElement("div");
                teamCell.className = "cell team-cell";
                teamCell.setAttribute("data-label", "Team");

                var logo = document.createElement("img");
                logo.className = "team-logo punktestand-logo";
                logo.alt = team.name || "";
                logo.src = "../../data/logo/" + (team.bild || "non.png");

                var nameSpan = document.createElement("span");
                nameSpan.className = "team-name";
                nameSpan.textContent = team.abkuerzung || team.name || "-";
                if (team.name) {
                    nameSpan.title = team.name;
                }

                teamCell.appendChild(logo);
                teamCell.appendChild(nameSpan);
                row.appendChild(teamCell);

                var sp = document.createElement("div");
                sp.className = "cell";
                sp.setAttribute("data-label", "Spiele");
                sp.textContent = team.spiele;
                row.appendChild(sp);

                var s = document.createElement("div");
                s.className = "cell";
                s.setAttribute("data-label", "Siege");
                s.textContent = team.siege;
                row.appendChild(s);

                var u = document.createElement("div");
                u.className = "cell";
                u.setAttribute("data-label", "Unentschieden");
                u.textContent = team.unentschieden;
                row.appendChild(u);

                var n = document.createElement("div");
                n.className = "cell";
                n.setAttribute("data-label", "Niederlagen");
                n.textContent = team.niederlagen;
                row.appendChild(n);

                var tore = document.createElement("div");
                tore.className = "cell";
                tore.setAttribute("data-label", "Tore");
                tore.textContent = team.tore + ":" + team.gegentore;
                row.appendChild(tore);

                var diff = document.createElement("div");
                diff.className = "cell";
                diff.setAttribute("data-label", "+/-");
                diff.textContent = team.differenz;
                row.appendChild(diff);

                var pkt = document.createElement("div");
                pkt.className = "cell";
                pkt.setAttribute("data-label", "Punkte");
                pkt.textContent = team.punkte;
                row.appendChild(pkt);

                table.appendChild(row);
            });
        }

        wrapper.appendChild(table);
        container.appendChild(wrapper);
    }
</script>
