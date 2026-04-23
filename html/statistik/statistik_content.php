<main class="punktestand-page">
    <style>
        /* CSS Grid für absolute bündige Ausrichtung */
        .statistik-grid {
            display: grid;
            grid-template-columns: 60px 1fr 80px 80px 80px 100px;
            align-items: center;
            width: 100%;
        }
        .statistik-header {
            background: rgba(0, 0, 0, 0.7);
            color: white;
            font-weight: bold;
            padding: 12px 0;
            border-radius: 10px 10px 0 0;
        }
        .statistik-row {
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 1px solid #eee;
            padding: 10px 0;
            transition: background 0.2s;
            color: #333;
        }
        .statistik-row:hover {
            background: #f9f9f9;
        }
        .statistik-row:last-child {
            border-radius: 0 0 10px 10px;
        }
        .cell-center { text-align: center; }
        .cell-left { text-align: left; padding-left: 15px; }
        
        /* Modal: Perfekte Zentrierung im Bildschirm */
        #statsModal {
            display: none; /* Wird per JS auf 'flex' gesetzt */
            position: fixed;
            z-index: 10000;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.8);
            backdrop-filter: blur(8px);
            justify-content: center;
            align-items: center;
        }
    </style>

    <div id="tframe">
        <h1 class="punktestand-title">Die Ewige Tabelle</h1>
        
        <div id="statistik-table-container">
            <div class="statistik-grid statistik-header">
                <div class="cell-center"></div>
                <div class="cell-left">Team</div>
                <div class="cell-center">Teiln.</div>
                <div class="cell-center">Spiele</div>
                <div class="cell-center" style="color: #ff8c00;">Pkt.</div>
                <div class="cell-center">Tore</div>
            </div>
            <div id="statistik-rows"></div>
        </div>
        
        <p class="punktestand-hint">Klicke auf ein Team, um die detaillierte Erfolgsbilanz zu sehen.</p>
    </div>

    <div id="statsModal" onclick="if(event.target == this) closeModal()">
        <div class="container" style="width: 95%; max-width:480px; padding: 30px; background: white; border-radius: 20px; position:relative; color: #333; box-shadow: 0 20px 60px rgba(0,0,0,0.7); margin: 0;">
            <span onclick="closeModal()" style="position:absolute; right:20px; top:10px; font-size:40px; cursor:pointer; color: #bbb;">&times;</span>
            <div id="modal-content" style="text-align:center;"></div>
        </div>
    </div>
</main>