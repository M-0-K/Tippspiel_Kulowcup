<?php
/*
error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
if($_SESSION['KC']['login'] !== 'ok'){
  exit(header("Location:login.php"));
}
*/
include '../script/db_connection.php'; // DB-Verbindung herstellen
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <script src="../script/jquery-3.6.0.min.js" type="text/javascript"></script>
    <link href="../css/index.css" rel="stylesheet">
    <style>
        /* Global Styles */

        body {
            background-color: #f5f5f5;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: top;
            min-height: 100vh;
            background-image: url("../data/background.jpg")
        }

        main {
            width: 90%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 1%;
        }

        .row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .row.header {
            background-color: #000;
            color: #fff;
            border: none;
        }

        .cell {
            flex: 1;
            text-align: center;
        }

        .user {
            text-align: center;
        }

        .score {
            text-align: center;
        }


        @media (max-width: 600px) {
            .row {
                flex-direction: column;
                align-items: flex-start;
            }

            .cell {
                text-align: left;
                padding: 5px 0;
            }

            .score {
                text-align: left;
            }
        }
    </style>
</head>

<body>
    <main id="main">
        <div id="table">
            <div class="row header">
                <div class="cell">User</div>
                <div class="cell">Score</div>
            </div>
        </div>
    </main>

    <script>
        $.get("spiele_backend.php", { action: "getPunkte" }, function(data) {
            let slist = JSON.parse(data);
            for (let i = 0; i < slist.User.length; i++) {
                ausgabe(slist.User[i]);
            }
        });

        function ausgabe(spieler) {
            let bracket = document.createElement("div");
            bracket.className = 'row';
            let user = document.createElement("div");
            user.className = 'cell user';
            let score = document.createElement("div");
            score.className = 'cell score';
            user.appendChild(document.createTextNode(spieler.username));
            score.appendChild(document.createTextNode(spieler.punkte));
            bracket.appendChild(user);
            bracket.appendChild(score);
            document.getElementById("table").appendChild(bracket);
        }
    </script>
</body>

</html>
