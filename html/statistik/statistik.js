let currentMode = "gesamt";

const MODE_HINTS = {
    gesamt: "Komplette Titelhistorie – auch frühere Meister ohne erfasste Spieldaten sind gelistet. Spiele, Punkte und Tore stammen nur aus den digital erfassten Turnieren und sind daher unvollständig.",
    erfasst: "Nur die digital erfassten Turniere. Titel, Bilanz und Durchschnittswerte sind hier zueinander konsistent."
};

$(function () {
    loadStatistik(currentMode);
});

function setMode(mode) {
    if (mode === currentMode) return;
    currentMode = mode;
    document.getElementById("mode-gesamt").classList.toggle("active", mode === "gesamt");
    document.getElementById("mode-erfasst").classList.toggle("active", mode === "erfasst");
    loadStatistik(mode);
}

function loadStatistik(mode) {
    var hint = document.getElementById("statistik-mode-hint");
    if (hint) hint.textContent = MODE_HINTS[mode] || "";

    $.get("../spiele_backend.php", { action: "getStatistik", mode: mode }, function (data) {
        var result = (typeof data === "string") ? JSON.parse(data) : data;
        var container = document.getElementById("statistik-rows");
        container.innerHTML = "";

        if (!result.Statistik) return;

        result.Statistik.forEach(function (team) {
            var hasData = parseInt(team.Spiele) > 0;
            var row = document.createElement("div");
            row.className = "statistik-grid statistik-row clickablerow" + (hasData ? "" : " no-data");
            row.style.cursor = "pointer";
            row.onclick = function() { openTeamStats(team); };

            // Ohne Spieldaten sind Bilanzwerte nicht aussagekräftig -> "–" statt 0
            var teiln  = hasData ? team.Teilnahmen : "–";
            var spiele = hasData ? team.Spiele : "–";
            var punkte = hasData ? team.Punkte : "–";
            var tore   = hasData ? (team.Tore + ":" + team.Gegentore) : "–";
            var mutedClass = hasData ? "" : " cell-muted";

            row.innerHTML = `
                <div class="cell-logo">
                    <img src="../../data/logo/${team.Bild}" onerror="this.src='../../data/fragezeichen.png'">
                </div>
                <div class="cell-left cell-team">
                    <span>${team.Name}</span>
                </div>
                <div class="cell-center cell-titel" data-label="🏆 Titel">${team.Gesamttitel}</div>
                <div class="cell-center${mutedClass}" data-label="Teiln.">${teiln}</div>
                <div class="cell-center${mutedClass}" data-label="Spiele">${spiele}</div>
                <div class="cell-center cell-pkt${mutedClass}" data-label="Punkte">${punkte}</div>
                <div class="cell-center${mutedClass}" data-label="Tore">${tore}</div>
            `;
            container.appendChild(row);
        });
    });
}

let teamChart = null;

function openTeamStats(t) {
    const modal = document.getElementById("statsModal");
    const content = document.getElementById("modal-content");
    
    // Aktiviert die Flex-Zentrierung
    modal.style.display = "flex";

    const hasData = parseInt(t.Spiele) > 0;
    const teilnahmen = parseInt(t.Teilnahmen) || 0;
    const avgSiege = teilnahmen > 0 ? (t.Siege / teilnahmen).toFixed(2) : "–";
    const avgPunkte = teilnahmen > 0 ? (t.Punkte / teilnahmen).toFixed(2) : "–";

    // Bilanz-Block nur zeigen, wenn Spieldaten vorhanden sind
    const bilanzBlock = hasData ? `
        <div style="text-align: left; margin-bottom: 25px; font-size: 1.05rem;">
            <p style="margin: 10px 0; border-bottom: 1px dashed #ddd; padding-bottom: 5px;">Ø Siege / Teilnahme: <strong style="float: right;">${avgSiege}</strong></p>
            <p style="margin: 10px 0;">Ø Punkte / Teilnahme: <strong style="float: right;">${avgPunkte}</strong></p>
        </div>

        <div style="width: 100%; height: 240px;">
            <canvas id="successChart"></canvas>
        </div>
    ` : `
        <p style="color:#64748b; font-size: 0.95rem; margin: 10px 0 5px; padding: 15px; background:#f8fafc; border-radius:12px; border:1px solid #e2e8f0;">
            Für dieses Team liegen noch keine erfassten Spieldaten vor – gelistet ist nur die Titelhistorie.
        </p>
    `;

    content.innerHTML = `
        <img src="../../data/logo/${t.Bild}" style="width: 80px; height: 80px; margin-bottom: 10px;" onerror="this.src='../../data/fragezeichen.png'">
        <h2 style="margin-bottom: 20px; color: #1a1a2e; font-size: 1.8rem;">${t.Name}</h2>

        <div style="display:flex; justify-content:space-between; background: #f8fafc; padding: 15px; border-radius: 12px; margin-bottom: 20px; border: 1px solid #e2e8f0;">
            <div style="flex:1"><strong>Titel</strong><br><span style="font-size: 1.4em;">🏆 ${t.Gesamttitel}</span></div>
            <div style="flex:1; border-left: 1px solid #e2e8f0; border-right: 1px solid #e2e8f0;"><strong>Finals</strong><br><span style="font-size: 1.4em;">🏁 ${t.Finalteilnahmen}</span></div>
            <div style="flex:1"><strong>W. Westen</strong><br><span style="font-size: 1.4em;">🛡️ ${t.WeisseWesten}</span></div>
        </div>

        ${bilanzBlock}
    `;

    if (teamChart !== null) { teamChart.destroy(); teamChart = null; }
    if (!hasData) { return; }

    const ctx = document.getElementById('successChart').getContext('2d');
    teamChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Siege', 'Remis', 'Niederlagen'],
            datasets: [{
                data: [t.Siege, t.Unentschieden, t.Niederlagen],
                backgroundColor: ['#22c55e', '#eab308', '#ef4444'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { 
                legend: { 
                    position: 'bottom',
                    labels: { font: { size: 14 } }
                } 
            }
        }
    });
}

function closeModal() {
    document.getElementById("statsModal").style.display = "none";
}