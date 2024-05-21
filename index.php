<?php
error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['KC']['login'] !== 'ok') {
    $_SESSION['KC']['login'] = 'no';
}
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/index.css" rel="stylesheet">
    <title>KulowCup</title>
    
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
        }

        header {
            background-color: black;
            color: white;
        }

        .embed-container {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 ratio */
            height: 100%;
            overflow: hidden;
            width: 100%;
        }

        .embed-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none; /* Entfernen des Rahmens */
        }

        main{
            
            height: inherit;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            width: 100%;
        }

        .col {
            margin-left: 15px;
            vertical-align: bottom;
            
        }

        a {
            color: white;
            text-decoration: none;
        }

        .menu {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .menu-items {
            display: flex;
            justify-content: flex-end;
            margin-right: 30px;
        }

        .menu-toggle {
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            margin-right: 10px;
        }

        .menu-toggle div {
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 4px 0;
        }

        @media (max-width: 600px) {
            header {
                padding: 10px;
            }

            .menu-items {
                display: none;
                flex-direction: column;
                align-items: center;
                width: 100%;
            }

            .menu-items.show {
                display: flex;
            }

            .menu-toggle {
                display: flex;
            }

            header .col h1 {
                font-size: 1.5em;
                text-align: center;
                width: 100%;
            }

            header .col h3 {
                font-size: 1.2em;
            }

            .embed-container {
                height: 100%;
                padding-bottom: 100%;
                /* Adjust height ratio for mobile */
            }

            .embed-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        }
    </style>
</head>

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
                <div class="col"><a target="body" href="html/Spieluebersicht.php"><h3>Übersicht</h3></a></div>
                <div class="col"><a target="body" href="html/Tippen.php"><h3>Tippen</h3></a></div>
                <div class="col"><a target="body" href="html/Ranking.php"><h3>Ranking</h3></a></div>
                <div class="col"><a target="body" href="html/logout.php"><h3>
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
    <main>
        <div class="embed-container">
            <iframe name="body" width="100%" src="html/Spieluebersicht.php"></iframe>
        </div>
    </main>

    <script>
        function toggleMenu() {
            const menuItems = document.getElementById('menuItems');
            menuItems.classList.toggle('show');
        }
    </script>
</body>

</html>
