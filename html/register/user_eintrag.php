<?php



date_default_timezone_set("Europe/Berlin");
include_once("../../script/db_connection.php");

//Daten
$uname = trim($_POST['uname']);
$passwort1 = $_POST['pw'];
$passwort2 = $_POST['pw2'];

$error = false;
if (strlen($uname) < 2) {
    echo "<script>
        alert('Bitte einen Username eingeben!');
        location.replace('../../html/register/register.php');
        </script>";
    $error = true;
}

if (strlen($passwort1) < 4) {
    echo "<script>
        alert('Passwörter zu kurz!');
        location.replace('../../html/register/register.php');
        </script>";
    $error = true;
}
if ($passwort1 !== $passwort2) {
    echo "<script>
        alert('Passwörter ungleich!');
        location.replace('../../html/register/register.php');
        </script>";
    
    $error = true;
}

//Überprüfung ob Benutzer vorhanden
if (!$error) {
    $statement = $db->prepare("SELECT COUNT(userid) AS anzahl FROM user WHERE Username =:Username");
    $result = $statement->execute(array('Username' => $uname));
    $zeile = $statement->fetch();
    if ($zeile->anzahl > 0) {

        echo "<script>
        alert('Benutzer bereist Registriert!');
        location.replace('../../html/register/register.php');
        </script>";
        $error = true;
    }
}

if (!$error) {
    $hashed_pw = password_hash($passwort1, PASSWORD_DEFAULT);
    $statement = $db->prepare("INSERT INTO `user` (`Username`, `Password`) VALUES ( :Username, :Password)");
    $result = $statement->execute(array('Username' => $uname, 'Password' => $hashed_pw));

    if ($result) {
        header("Location: ../../html/login/login.php");
        $showFormular = false;
    } else {
        echo "<p>Leider ist ein Fehler aufgetreten!<p>";
    }
} 


