<body>
    <header>
        <div class="menu">
            <div class="row" style="justify-content: flex-start; margin-left: 30px;">
                <div class="col">
                    <h1>KulowCup</h1>
                </div>
            </div>
            <div class="menu-toggle" onclick="toggleMenu()">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="menu-items" id="menuItems">
                <div class="col"><a target="body" href="/html/spieluebersicht/spieluebersicht.php"><h3>Übersicht</h3></a></div>
                <div class="col"><a target="body" href="/html/tippen/tippen.php"><h3>Tippen</h3></a></div>
                <div class="col"><a target="body" href="/html/ranking/ranking.php"><h3>Ranking</h3></a></div>
                <div class="col"><a target="body" href="/html/logout/logout.php"><h3>
                    <?php
                    if ($_SESSION['KC']['login'] !== 'ok') {
                        echo 'Login';
                    } else {
                        echo 'Logout';
                    }
                    ?></h3></a></div>
            </div>
        </div>
    </header>