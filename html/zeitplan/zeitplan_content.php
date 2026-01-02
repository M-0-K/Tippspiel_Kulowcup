<main class="zeitplan-page">
    <div id="tframe">
        <div class="zeitplan-filter">
            <label for="zeitplan-team-filter">Mannschaft:</label>
            <select id="zeitplan-team-filter">
                <option value="">Alle Mannschaften</option>
            </select>
        </div>
        <div class="row header">
            <div class="cell">Zeit</div>
            <div class="cell">Feld</div>
            <div class="cell">Phase</div>
            <div class="cell">Team A</div>
            <div class="cell">Ergebnis</div>
            <div class="cell">Team B</div>
        </div>
        <div id="zeitplan-table"></div>
    </div>
</main>

<script>
    // Lädt alle Spiele des aktuellen Turniers und zeigt sie nach Zeit sortiert an
    $(function () {
        $.get("../spiele_backend.php", { action: "getSpiele" }, function (data) {
            var slist = JSON.parse(data);
            if (!slist || !slist.Spiele) {
                return;
            }

            var spiele = slist.Spiele.slice();

            // Sortierung: zuerst Uhrzeit (HH:MM), dann Feld
            spiele.sort(function (a, b) {
                var ta = a.time || "99:99";
                var tb = b.time || "99:99";

                if (ta === tb) {
                    return (a.feld || 0) - (b.feld || 0);
                }
                return ta.localeCompare(tb);
            });

            var container = document.getElementById("zeitplan-table");
            var filterSelect = document.getElementById("zeitplan-team-filter");
            var teamSet = new Set();

            spiele.forEach(function (spiel) {
                var row = document.createElement("div");
                row.className = "table row";

                function createCell(text) {
                    var c = document.createElement("div");
                    c.className = "cell";
                    c.textContent = text;
                    return c;
                }

                var zeitText = spiel.time && spiel.time !== 1 ? spiel.time + " Uhr" : "-";
                var feldText = spiel.feld ? "Feld " + spiel.feld : "-";

                var phaseMap = {
                    "A": "Gruppe A",
                    "B": "Gruppe B",
                    "C": "Gruppe C",
                    "D": "Gruppe D",
                    "VF": "Viertelfinale",
                    "HF": "Halbfinale",
                    "TF": "Finale",
                    "U9": "Spiel um Platz 9",
                    "U7": "Spiel um Platz 7",
                    "U5": "Spiel um Platz 5",
                    "U3": "Spiel um Platz 3"
                };

                var phaseText = phaseMap[spiel.phase] || spiel.phase || "-";

                var teamA = (spiel.mA && spiel.mA.name) ? spiel.mA.name : "-";
                var teamB = (spiel.mB && spiel.mB.name) ? spiel.mB.name : "-";

                // Teams für Filter sammeln
                if (teamA && teamA !== "-") {
                    teamSet.add(teamA);
                }
                if (teamB && teamB !== "-") {
                    teamSet.add(teamB);
                }

                // Daten für Filter auf der Zeile speichern
                row.dataset.teamA = teamA;
                row.dataset.teamB = teamB;

                var ergebnis;
                if (spiel.toreA === null || spiel.toreA === undefined ||
                    spiel.toreB === null || spiel.toreB === undefined) {
                    ergebnis = "-";
                } else {
                    ergebnis = spiel.toreA + " : " + spiel.toreB;
                }

                row.appendChild(createCell(zeitText));
                row.appendChild(createCell(feldText));
                row.appendChild(createCell(phaseText));
                row.appendChild(createCell(teamA));
                row.appendChild(createCell(ergebnis));
                row.appendChild(createCell(teamB));

                container.appendChild(row);
            });

            // Dropdown mit Mannschaften befüllen
            if (filterSelect) {
                Array.from(teamSet).sort().forEach(function (teamName) {
                    var opt = document.createElement("option");
                    opt.value = teamName;
                    opt.textContent = teamName;
                    filterSelect.appendChild(opt);
                });

                filterSelect.addEventListener("change", function () {
                    var selected = this.value;
                    var rows = container.querySelectorAll(".table.row");

                    rows.forEach(function (row) {
                        if (!selected) {
                            row.style.display = "";
                            return;
                        }

                        var a = row.dataset.teamA || "";
                        var b = row.dataset.teamB || "";

                        if (a === selected || b === selected) {
                            row.style.display = "";
                        } else {
                            row.style.display = "none";
                        }
                    });
                });
            }
        });
    });
</script>
