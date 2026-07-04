
    <script>
        function syncDropdownState() {
            const menuItems = document.getElementById('menuItems');
            if (menuItems) {
                menuItems.classList.toggle('dropdown-open', menuItems.querySelector('.dropdown.open') !== null);
            }
        }
        function closeAllDropdowns() {
            document.querySelectorAll('.dropdown.open').forEach(function (d) {
                d.classList.remove('open');
            });
            syncDropdownState();
        }
        function toggleMenu() {
            const menuItems = document.getElementById('menuItems');
            menuItems.classList.toggle('show');
            // Beim Schließen des Hamburgers offene Dropdowns zurücksetzen
            if (!menuItems.classList.contains('show')) {
                closeAllDropdowns();
            }
        }
        function toggleDropdown(event, el) {
            event.preventDefault();
            const dd = el.closest('.dropdown');
            const wasOpen = dd.classList.contains('open');
            // andere offene Dropdowns schließen
            document.querySelectorAll('.dropdown.open').forEach(function (d) {
                if (d !== dd) d.classList.remove('open');
            });
            dd.classList.toggle('open', !wasOpen);
            syncDropdownState();
        }
        // Klick außerhalb schließt offene Dropdowns
        document.addEventListener('click', function (e) {
            if (!e.target.closest('.dropdown')) {
                closeAllDropdowns();
            }
        });
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
                <div class="col dropdown">
                    <a href="#" class="dropdown-toggle" onclick="toggleDropdown(event, this)"><h3>Turnier <span class="caret">▾</span></h3></a>
                    <div class="dropdown-menu">
                        <a href="../../html/liveview/liveview.php"><h3>Liveansicht</h3></a>
                        <a href="../../html/spieluebersicht/spieluebersicht.php"><h3>Übersicht</h3></a>
                        <a href="../../html/zeitplan/zeitplan.php"><h3>Zeitplan</h3></a>
                        <a href="../../html/punktestand/punktestand.php"><h3>Punkte</h3></a>
                    </div>
                </div>
                <div class="col"><a href="../../html/tippen/tippen.php"><h3>Tippen</h3></a></div>
                <div class="col"><a href="../../html/ranking/ranking.php"><h3>Ranking</h3></a></div>
                <div class="col"><a href="../../html/statistik/statistik.php"><h3>Statistik</h3></a></div>
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