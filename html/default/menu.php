
    <script>
        function toggleMenu() {
            const menuItems = document.getElementById('menuItems');
            menuItems.classList.toggle('show');
        }
    </script><body>
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
                <div class="col"><a href="../../html/liveview/liveview.php"><h3>Liveansicht</h3></a></div>
                <div class="col"><a href="../../html/spieluebersicht/spieluebersicht.php"><h3>Übersicht</h3></a></div>
                <div class="col"><a href="../../html/zeitplan/zeitplan.php"><h3>Zeitplan</h3></a></div>
                <div class="col"><a href="../../html/tippen/tippen.php"><h3>Tippen</h3></a></div>
                <div class="col"><a href="../../html/ranking/ranking.php"><h3>Ranking</h3></a></div>
                <div class="col"><a href="../../html/punktestand/punktestand.php"><h3>Punkte</h3></a></div>
                <div class="col"><a href="../../html/history/history.php"><h3>Geschichte</h3></a></div>
                <div class="col"><a href="../../html/logout/logout.php"><h3>
                    <?php
                    error_reporting(0);
                    if (1){
                        if ($_SESSION['KC']['login'] !== 'ok') {
                            echo 'Login';
                        } else {
                            echo 'Logout';
                        }
                    }
                    
                    ?></h3></a></div>
                <?php
                # Header if logged in as Admin
                error_reporting(0);
                if (1){
                    if ($_SESSION['KC']['isadmin'] == true) {
                        echo '<div class="col"><a href="../../html/adminuebersicht/adminuebersicht.php"><h3>Admin</h3></a></div>';
                    }
                }
                    
                ?>
            </div>
        </div>
    </header>