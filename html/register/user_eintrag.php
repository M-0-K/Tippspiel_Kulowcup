<?php


error_reporting(0);
date_default_timezone_set("Europe/Berlin");
include_once("../../script/db_connection.php");

//Daten
$uname = trim($_POST['uname']);
$passwort1 = $_POST['pw'];
$passwort2 = $_POST['pw2'];

$error = false;
if (strlen($uname) < 2) {
    $ErrorUSR = "Nutzername zu kurz!";
    $error = true;
}

if (strlen($passwort1) < 4) {
    $ErrorPWD = "Passwort zu kurz!";
    $usrName = $uname;
    echo "<style> input.formulare{background-color: red;}  </style>";
    $error = true;
}
if ($passwort1 !== $passwort2) {
    $ErrorPWD = "Passwörter ungleich!";
    $usrName = $uname;
    echo "<style> input.formulare{background-color: red;}  </style>";
    $error = true;
}

//Überprüfung ob Benutzer vorhanden
if (!$error) {
    $statement = $db->prepare("SELECT COUNT(userid) AS anzahl FROM user WHERE Username =:Username");
    $result = $statement->execute(array('Username' => $uname));
    $zeile = $statement->fetch();
    if ($zeile->anzahl > 0) {

        $ErrorPWD = "Der Benutzer existiert bereits.";
        $error = true;
    }
}

if (!$error) {
    $hashed_pw = password_hash($passwort1, PASSWORD_DEFAULT);
    $statement = $db->prepare("INSERT INTO `user` (`Username`, `Password`) VALUES ( :Username, :Password)");
    $result = $statement->execute(array('Username' => $uname, 'Password' => $hashed_pw));

    if ($result) {
        echo "<style> input.formulare{background-color: green;}</style>";
        $ErrorPWD = "Deine Registrierung war erfolgreich! Nun kannst du dich am Tresen mit deinem Benutzernamen anmelden.";
        //usleep(3000000);
        //header("Location: ../../html/login/login.php");
        echo "<script>
        setTimeout(function() {
            window.location.href = '../../html/login/login.php';
        }, 2000);
        </script>";
        $showFormular = false;
    } else {
        echo "<p>Leider ist ein Fehler aufgetreten!<p>";
    }

    
} 


