<?php
if (!isset($_SESSION)) {
    session_start();
}
date_default_timezone_set("Europe/Berlin");

include_once("../../script/db_connection.php");

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
        $logpath = '../../log';
        //if (!is_dir($logpath)) {
        //    mkdir($logpath, 0777);
        //}
        //$logdatei = fopen("$logpath/logfile.txt", "a");
        //fwrite($logdatei, $inhalt);
        //fclose($logdatei);
    }

    $username = htmlspecialchars(trim($_POST['username']));
    $password = trim($_POST['pw']);

    $barkeeperPassword = $_ENV["BARKEEPER_PASSWORD"];
    $adminPassword = $_ENV["ADMIN_PASSWORD"];


    if ($username === 'Barkeeper' && $password === $barkeeperPassword) {

        $_SESSION['KC']['login'] = "Barkeeper";
        header("Location:../uservalidation/uservalidation.php");
        exit;
    } elseif ($username === 'Admin' && $password === $adminPassword) {
        $_SESSION['KC']['isadmin'] = true;
        $_SESSION['KC']['login'] = "ok";
        header("Location:../adminuebersicht/adminuebersicht.php");
        exit;
    }

    if ($user !== false && password_verify($pw, $user->Password)) {
        if ($user->Enabled == 1){
            $_SESSION['KC']['login'] = 'ok';
            $_SESSION['KC']['Userid'] = $user->Userid;

            $logmessage = "Erfolgreiches Login von $username auf $ip am $jetzt.\n";
            logschreiben($logmessage);
            header("Location: ../../html/tippen/tippen.php");
        } else {
        echo "<style> input.formulare{background-color: red;}  </style>";
        $ErrorMSG = "Das Konto ist noch nicht freigeschalten!";
        }
    } else {
        echo "<style> input.formulare{background-color: red;}  </style>";
        $ErrorMSG = "Benutzername oder Kennwort ist falsch.";
        $logmessage = "fehlerhafter Loginversuch von $username auf $ip am $jetzt.\n";
        logschreiben($logmessage);
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