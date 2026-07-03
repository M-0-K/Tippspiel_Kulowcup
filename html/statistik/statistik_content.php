<main class="punktestand-page">
    <style>
        #statistik-table-container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.12);
        }
        /* CSS Grid für absolute bündige Ausrichtung */
        .statistik-grid {
            display: grid;
            grid-template-columns: 52px minmax(0, 1fr) 64px 64px 64px 60px 92px;
            align-items: center;
            width: 100%;
            box-sizing: border-box;
        }
        .statistik-header {
            background: rgba(0, 0, 0, 0.7);
            color: white;
            font-weight: bold;
            padding: 12px 0;
        }
        .statistik-row {
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 1px solid #eee;
            padding: 10px 0;
            transition: background 0.2s;
            color: #333;
            font-size: 1rem;
        }
        .statistik-row:hover {
            background: #f9f9f9;
        }
        .statistik-row:last-child {
            border-bottom: none;
        }
        .cell-center { text-align: center; }
        .cell-left { text-align: left; padding-left: 15px; }
        .cell-titel { color: #d97706; font-weight: bold; }
        .cell-pkt { font-weight: bold; color: #ff8c00; }
        .cell-logo { text-align: center; }
        .cell-logo img {
            width: 2.3em;
            height: 2.3em;
            border-radius: 50%;
            vertical-align: middle;
        }
        .cell-team {
            font-weight: 600;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .statistik-row.no-data .cell-team { font-weight: 500; }

        /* Umschalter Historie / Erfasste Turniere */
        .statistik-toggle {
            display: inline-flex;
            background: rgba(0, 0, 0, 0.35);
            border-radius: 999px;
            padding: 4px;
            margin: 0 auto 8px;
            gap: 4px;
        }
        .statistik-toggle button {
            border: none;
            background: transparent;
            color: #e5e7eb;
            font: inherit;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 8px 18px;
            border-radius: 999px;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .statistik-toggle button.active {
            background: #ff8c00;
            color: #1a1a2e;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }
        .statistik-mode-hint {
            font-size: 0.85rem;
            color: #6b7280;
            margin: 0 0 14px;
        }
        /* Teams ohne erfasste Bilanzdaten (nur Titelhistorie) dezent absetzen */
        .statistik-row.no-data { opacity: 0.75; }
        .statistik-row.no-data .cell-muted { color: #9ca3af; }

        /* ---------- Handy: Karten-Ansicht statt Grid ---------- */
        @media (max-width: 600px) {
            #statistik-table-container {
                box-shadow: none;
                overflow: visible;
                background: transparent;
            }
            .statistik-header { display: none; }

            .statistik-grid.statistik-row {
                grid-template-columns: auto 1fr 1fr 1fr;
                grid-template-areas:
                    "logo  team   team   team"
                    "titel teiln  spiele pkt"
                    "tore  tore   .      .";
                column-gap: 8px;
                row-gap: 10px;
                margin: 10px 0;
                padding: 14px;
                border: none;
                border-radius: 12px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
            }
            .statistik-row .cell-logo  { grid-area: logo; }
            .statistik-row .cell-team {
                grid-area: team;
                align-self: center;
                padding-left: 0;
                font-size: 1.15rem;
                white-space: normal;
            }
            .statistik-row .cell-logo img { width: 2.6em; height: 2.6em; }
            .statistik-row .cell-titel                 { grid-area: titel; }
            .statistik-row [data-label="Teiln."]       { grid-area: teiln; }
            .statistik-row [data-label="Spiele"]       { grid-area: spiele; }
            .statistik-row .cell-pkt                   { grid-area: pkt; }
            .statistik-row [data-label="Tore"]         { grid-area: tore; }

            /* Zahlen-Zellen als beschriftete Chips */
            .statistik-row .cell-center {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
                font-size: 1.05rem;
            }
            .statistik-row .cell-center::before {
                content: attr(data-label);
                display: block;
                font-size: 0.68rem;
                font-weight: 600;
                color: #64748b;
                text-transform: uppercase;
                letter-spacing: 0.03em;
                margin-bottom: 1px;
            }
        }

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
            padding: 16px;
            box-sizing: border-box;
        }
        #statsModal .container {
            max-height: 90vh;
            overflow-y: auto;
        }
    </style>

    <div id="tframe">
        <h1 class="punktestand-title">Die Ewige Tabelle</h1>

        <div style="text-align:center;">
            <div class="statistik-toggle" role="tablist">
                <button type="button" id="mode-gesamt" class="active" onclick="setMode('gesamt')">Gesamte Historie</button>
                <button type="button" id="mode-erfasst" onclick="setMode('erfasst')">Erfasste Turniere</button>
            </div>
        </div>
        <p class="statistik-mode-hint" id="statistik-mode-hint"></p>

        <div id="statistik-table-container">
            <div class="statistik-grid statistik-header">
                <div class="cell-center"></div>
                <div class="cell-left">Team</div>
                <div class="cell-center" title="Titel">🏆</div>
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