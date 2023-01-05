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
        $logdatei = fopen("$logpath/logfile.txt", "a"); //Datei nur zum Schreiben öffnen und ggf. erzeugen
        fwrite($logdatei, $inhalt); // Inhalt schreiben
        fclose($logdatei);
    }


    if ($user !== false && password_verify($pw, $user->Password)) {
        $_SESSION['KC']['login'] = 'ok';
        $_SESSION['KC']['Userid'] = $user->Userid;
        
        $logmessage = "Erfolgreiches Login von $username auf $ip am $jetzt.\n";
        logschreiben($logmessage);
        //die('<p>Login erfolgreich. Weiter zum <a href="inhalt.php">internen Bereich</a></p>');
        header("Location: Spieluebersicht.php");
    } else {
        echo "<style> input.formulare{background-color: red;}  </style>";
        $logmessage = "fehlerhafter Loginversuch von $username auf $ip am $jetzt.\n";
        logschreiben($logmessage);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Login</title>
</head>

<style>
    input.formulare{
        margin: 10px;
        width: 300px;
        height: 40px;
        border-radius: 10px;
        
    }
</style>

<body>
    <header>
        
    </header>
    <main>
        <div class="container" style="margin: 100px;">
            <h2>Anmeldung</h2>
            <br>
            <form action="?login=1" method="POST" id="loginform" name="loginFormular" style="text-align: center;">
                <input class='formulare' type="text" name="username" id="username" placeholder="Benutzername" autofocus required><br>
                <input class='formulare' type="password" name="pw" id="passwort" placeholder="Passwort" autofocus required><br>
                <input class='register' type="submit" name="login" value="Login">
            </form>
            <br>
            <p style= "text-align: center;"> 
                 Noch nicht angemeldet?
                <a href="register.php">Registrierung</a>
            </p>
    
        <?php
        if (isset($errorMessage)) {
        echo "<p>$errorMessage</p>";
        }
        ?>
        </div>
    </main>
</body>

</html>