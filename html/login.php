<?php
if (!isset($_SESSION)) {
    session_start();
}
date_default_timezone_set("Europe/Berlin");

include_once("../script/db_connection.php");

if (isset($_GET['login'])) {
    $username = $_POST['username'];
    $pw = $_POST['pw'];

    $statement = $db->prepare("SELECT * FROM user WHERE username = :username");
    $result = $statement->execute(array('username' => $username));
    $user = $statement->fetch();

    $zeitpunkt = new DateTime();
    $jetzt = $zeitpunkt->format('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'];

    function logschreiben($inhalt) {
        $logpath = '../log';
        if (!is_dir($logpath)) {
            mkdir($logpath, 0777);
        }
        $logdatei = fopen("$logpath/logfile.txt", "a");
        fwrite($logdatei, $inhalt);
        fclose($logdatei);
    }

    if ($user !== false && password_verify($pw, $user->Password)) {
        $_SESSION['KC']['login'] = 'ok';
        $_SESSION['KC']['Userid'] = $user->Userid;
        
        $logmessage = "Erfolgreiches Login von $username auf $ip am $jetzt.\n";
        logschreiben($logmessage);
        die('<p>Login erfolgreich. Weiter zum <a href="Tippen.php">internen Bereich</a></p>');
        header("Location: Spieluebersicht.php");
    } else {
        echo "<style> input.formulare{background-color: red;}  </style>";
        $logmessage = "fehlerhafter Loginversuch von $username auf $ip am $jetzt.\n";
        logschreiben($logmessage);
    }
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }



        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: white;
        }

        h2 {
            text-align: center;
            color: black;
        }

        input.formulare {
            margin: 10px 0;
            width: calc(100% - 20px);
            height: 40px;
            border-radius: 10px;
            padding: 0 10px;
            box-sizing: border-box;
        }

        input.register {
            width: 100%;
            height: 40px;
            margin: 10px 0;
            border-radius: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }

        input.register:hover {
            background-color: #0056b3;
        }

        p {
            text-align: center;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .container {
                margin: 20px;
                padding: 10px;
            }

            input.formulare, input.register {
                width: calc(100% - 10px);
            }
        }
    </style>
</head>

<body>
    <header></header>
    <main>
        <div class="container">
            <h2>Anmeldung</h2>
            <br>
            <form action="?login=1" method="POST" id="loginform" name="loginFormular">
                <input class='formulare' type="text" name="username" id="username" placeholder="Benutzername" autofocus required><br>
                <input class='formulare' type="password" name="pw" id="passwort" placeholder="Passwort" required><br>
                <input class='register' type="submit" name="login" value="Login">
            </form>
            <br>
            <p>Noch nicht angemeldet? <a href="register.php">Registrierung</a></p>
            <?php
            if (isset($errorMessage)) {
                echo "<p>$errorMessage</p>";
            }
            ?>
        </div>
    </main>
</body>

</html>
