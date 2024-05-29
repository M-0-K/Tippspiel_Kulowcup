<main>
    <div id="tframe">
        <div id="table">
            <div class="row header">
                <div class="cell">Jahr</div>
                <div class="cell">Sommer/Winter</div>
                <div class="cell">Gewinner</div>
            </div>
        </div>
    </div>
</main>


<script>

function displayTuniere(tuniereData) {
    const tuniere = tuniereData.Tuniere;
    const tableContainer = document.getElementById("tournamentTableBody");

    // Iteriere über jedes Turnier und erstelle eine Zeile in der Tabelle
    tuniere.forEach(tunier => {
        const row = document.createElement("div");
        row.className = "table row";

        // Füge das Jahr, die Saison und den Gewinner hinzu
        const jahrCell = document.createElement("div");
        jahrCell.className = "cell jahr";
        jahrCell.textContent = tunier.jahr;
        row.appendChild(jahrCell);

        const saisonCell = document.createElement("div");
        saisonCell.className = "cell saison";
        saisonCell.textContent = tunier.saison;
        row.appendChild(saisonCell);

        const gewinner = document.createElement("div");
        gewinner.className = "cell gewinner";

        const name = document.createElement("div");
        name.textContent = tunier.gewinner;


        const logoImg = document.createElement("img");
        logoImg.className = "cell logo-cell";
        
        fetch("../../data/logo/" + tunier.logo)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Die Datei existiert nicht.');
                }
                logoImg.src= "../../data/logo/" + tunier.logo;
            })
            .catch(error => {
                console.error(error);
                logoImg.src = '../../data/none.jpg';
            });
        gewinner.appendChild(name)
        gewinner.appendChild(logoImg);

        row.appendChild(gewinner);
        document.getElementById("table").appendChild(row);
    });
}

    

    var xhr = new XMLHttpRequest();
    var slist;
    $.get("../../html/spiele_backend.php", { action: "getTuniere" }, function (data) {

        //console.log(data);

        var tlist = JSON.parse(data);
        
        displayTuniere(tlist);

    });
</script>

</body>
</html>
