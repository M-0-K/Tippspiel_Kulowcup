<?php
error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
date_default_timezone_set("Europe/Berlin");

include_once("../../script/db_connection.php");



$errorMessage = "";


if (isset($_POST['login'])) {

    $username = htmlspecialchars(trim($_POST['username']));
    $password = trim($_POST['pw']);

    $barkeeperPassword = $_ENV["BARKEEPER_PASSWORD"];
    $adminPassword = $_ENV["ADMIN_PASSWORD"];


    if ($username === 'Barkeeper' && $password === $barkeeperPassword) {

        $_SESSION['KC']['login'] = "Barkeeper";
        header("Location:uservalidation.php");
        exit;
    } elseif ($username === 'Admin' && $password === $adminPassword) {
        $_SESSION['KC']['isadmin'] = true;
        $_SESSION['KC']['login'] = "ok";
        header("Location:../adminuebersicht/adminuebersicht.php");
        exit;
    }
    else {
        $errorMessage = "Benutzername oder Passwort ist falsch.";
    }
}

$PageTitle="Login";
function additionalHeaders(){?>
<!-- define additional headers here -->
<script src="../../script/jquery-3.6.0.min.js" type="text/javascript"></script>
<?php }
include_once('../default/header.php');
include_once('../default/menu.php');
include_once('login_content.php');
include_once('../default/footer.php');
?>


