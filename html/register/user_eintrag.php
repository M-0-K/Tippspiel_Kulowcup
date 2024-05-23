<?php



date_default_timezone_set("Europe/Berlin");
include_once("../../script/db_connection.php");

//Daten
$uname = trim($_POST['uname']);
$passwort1 = $_POST['pw'];
$passwort2 = $_POST['pw2'];

$error = false;
if (strlen($uname) < 2) {
    echo "Bitte einen Vornamen eingeben!<br>";
    $error = true;
}

if (strlen($passwort1) < 6) {
    echo "Bitte Passwort eingeben!<br>";
    $error = true;
}
if ($passwort1 !== $passwort2) {
    echo "Passwörter ungleich!<br>";
    $error = true;
}

//Überprüfung ob Benutzer vorhanden
if (!$error) {
    $statement = $db->prepare("SELECT COUNT(userid) AS anzahl FROM user WHERE Username =:Username");
    $result = $statement->execute(array('Username' => $uname));
    $zeile = $statement->fetch();
    if ($zeile->anzahl > 0) {
        echo "E-Mail bereits registriert!<br>";
        $error = true;
    }
}

if (!$error) {
    $hashed_pw = password_hash($passwort1, PASSWORD_DEFAULT);
    $statement = $db->prepare("INSERT INTO `user` (`Username`, `Password`) VALUES ( :Username, :Password)");
    $result = $statement->execute(array('Username' => $uname, 'Password' => $hashed_pw));
}
if ($result) {
    echo "<p>Du wurdest erfolgreich registriert. <a href='../login/login.php'>Zum Login</a></p>";
    $showFormular = false;
} else {
    echo "<p>Leider ist ein Fehler aufgetreten!<p>";
}
