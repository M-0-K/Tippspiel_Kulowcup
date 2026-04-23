$(function () {
    $.get("../spiele_backend.php", { action: "getStatistik" }, function (data) {
        var result = (typeof data === "string") ? JSON.parse(data) : data;
        var container = document.getElementById("statistik-rows");
        
        if (!result.Statistik) return;

        result.Statistik.forEach(function (team) {
            var row = document.createElement("div");
            row.className = "statistik-grid statistik-row clickablerow";
            row.style.cursor = "pointer";
            row.onclick = function() { openTeamStats(team); };

            row.innerHTML = `
                <div class="cell-center">
                    <img src="../../data/logo/${team.Bild}" style="width: 2.3em; height: 2.3em; border-radius: 50%;" onerror="this.src='../../data/fragezeichen.png'">
                </div>
                <div class="cell-left" style="font-size: 1rem;">
                    <span>${team.Name}</span>
                </div>
                <div class="cell-center" style="font-size: 1rem;">${team.Teilnahmen}</div>
                <div class="cell-center" style="font-size: 1rem;">${team.Spiele}</div>
                <div class="cell-center" style="font-size: 1rem; font-weight: bold; color: #ff8c00;">${team.Punkte}</div>
                <div class="cell-center" style="font-size: 1rem;">${team.Tore}:${team.Gegentore}</div>
            `;
            container.appendChild(row);
        });
    });
});

let teamChart = null;

function openTeamStats(t) {
    const modal = document.getElementById("statsModal");
    const content = document.getElementById("modal-content");
    
    // Aktiviert die Flex-Zentrierung
    modal.style.display = "flex";

    const teilnahmen = parseInt(t.Teilnahmen) || 1;
    const avgSiege = (t.Siege / teilnahmen).toFixed(2);
    const avgPunkte = (t.Punkte / teilnahmen).toFixed(2);

    content.innerHTML = `
        <img src="../../data/logo/${t.Bild}" style="width: 80px; height: 80px; margin-bottom: 10px;" onerror="this.src='../../data/fragezeichen.png'">
        <h2 style="margin-bottom: 20px; color: #1a1a2e; font-size: 1.8rem;">${t.Name}</h2>
        
        <div style="display:flex; justify-content:space-between; background: #f8fafc; padding: 15px; border-radius: 12px; margin-bottom: 20px; border: 1px solid #e2e8f0;">
            <div style="flex:1"><strong>Titel</strong><br><span style="font-size: 1.4em;">🏆 ${t.Gesamttitel}</span></div>
            <div style="flex:1; border-left: 1px solid #e2e8f0; border-right: 1px solid #e2e8f0;"><strong>Finals</strong><br><span style="font-size: 1.4em;">🏁 ${t.Finalteilnahmen}</span></div>
            <div style="flex:1"><strong>W. Westen</strong><br><span style="font-size: 1.4em;">🛡️ ${t.WeisseWesten}</span></div>
        </div>

        <div style="text-align: left; margin-bottom: 25px; font-size: 1.05rem;">
            <p style="margin: 10px 0; border-bottom: 1px dashed #ddd; padding-bottom: 5px;">Ø Siege / Teilnahme: <strong style="float: right;">${avgSiege}</strong></p>
            <p style="margin: 10px 0;">Ø Punkte / Teilnahme: <strong style="float: right;">${avgPunkte}</strong></p>
        </div>

        <div style="width: 100%; height: 240px;">
            <canvas id="successChart"></canvas>
        </div>
    `;

    if (teamChart !== null) { teamChart.destroy(); }

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